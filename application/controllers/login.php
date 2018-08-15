<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
    function __construct()
    {
        parent::__construct ();
        $this->load->model ( 'login_model', 'loginmodel' );
        $this->load->helper ( 'security' );
        $this->load->library ( 'form_validation' );
    }
    
    public function login_page()
    {
        $this->load->view('admin/login');
    }

    public function login_form()
    {
        $data ['msg'] = "";
        $this->load->view ( 'admin/login', $data );
    }
    
    public function index()
    {
        $this->form_validation->set_rules ( "email", "Email", 'trim|required|xss_clean' );
        $this->form_validation->set_rules ( "password", "Password", 'trim|required|xss_clean' );
        if ($this->form_validation->run () == FALSE)
        {
            $this->login_form ();
        }
        else
        {
            $email = $this->db->escape_str ( trim ( $this->input->post('email',true)));
            $password = $this->db->escape_str ( trim ($this->input->post('password',true)));
            $authentication_data = $this->loginmodel->check_authentication ( $email, $password );
            if (sizeof ( $authentication_data ) == 1) {
            	
            	$EmpId = $authentication_data [0]->EmpID;
                $Role = $authentication_data [0]->Role;
                $RoleID = $authentication_data [0]->RoleID;
                $Pass = $authentication_data [0]->Password;
                $EmpName = $authentication_data [0]->EmpName;
                $siteMap= $this->loginmodel->get_sitemap ($RoleID);
                
                $this->session->set_userdata ( 'loginStatus', TRUE );
                $this->session->set_userdata ( 'userId', $EmpId );
                $this->session->set_userdata ( 'username', $EmpName );
                $this->session->set_userdata ( 'Role', $Role );
                $this->session->set_userdata ( 'SiteMap', $siteMap );
                
                redirect ( 'dashboard' );
            }
            else
            {
                $data ['msg'] = "Incorrect Email or Password!";
                $this->load->view('admin/login',$data);
            }
        }
    }
    
    public function logout()
    {
        $this->session->sess_destroy ();
        redirect (base_url());
    }
	
}

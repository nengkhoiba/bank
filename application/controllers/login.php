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
            $email = $this->db->escape_str ( trim ( $_POST ['email'] ) );
            $password = $this->db->escape_str ( trim ( $_POST ['password'] ) );
            $authentication_data = $this->loginmodel->check_authentication ( $email, $password );
            if (sizeof ( $authentication_data ) == 1) {
                
                $get_user_id = $authentication_data [0]->user_id;
                $get_username = $authentication_data [0]->username;
                $get_email = $authentication_data [0]->email;
                $this->session->set_userdata ( 'loginStatus', TRUE );
                $this->session->set_userdata ( 'userId', $get_user_id );
                $this->session->set_userdata ( 'username', $get_username );
                $this->session->set_userdata ( 'email', $get_email );
                echo $this->session->userdata ( 'username' );
                redirect ( 'employee' );
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

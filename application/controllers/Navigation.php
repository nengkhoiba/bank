<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Navigation extends CI_Controller {

	public function index()
	{  
		if($this->session->userdata('loginStatus')){
			$sitemap=$this->session->userdata('SiteMap');
			$slug=$this->input->get('q',true);
			$view="";
			$page=false;
			foreach ($sitemap as $row){
				if($slug==$row->PageSlug){
					$view=$row->PageView;
					$page=true;
					break;
				}
			}
			if($page){
				$this->load->view($view);
			}else{
			    $this->load->view('errors/html/error_404');
			}
		}else{
			redirect('login');
		}
	}
	public function dashboard()
	{
	    $this->load->view('admin/dashboard');
	}	
		
}

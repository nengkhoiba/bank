<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Navigation extends CI_Controller {

	public function index()
	{  
		$this->load->view('login');
	}
	
	public function dashboard()
	{
	    $this->load->view('admin/dashboard');
	}
		
	public function employee()
	{  
		$this->load->view('admin/employee');
	}
		
}

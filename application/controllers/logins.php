<?php

class Logins extends CI_Controller
{
    function __construct() {
        parent::__construct();
        
    }
    
    function index()
    {
        $this->load->view('login/login_form');
    }

    function login(){
    	$data['email'] = $this->input->post('email');
    	$data['password'] = $this->input->post('password');
    	$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check');
    	$this->form_validation->set_rules('password', 'Password', 'required');
    	if($this->form_validation->run() == FALSE){
    		 $this->load->view('login/login_form');
    	}else{

    	}
    }

    function email_check($email)
	{
		if($this->Login->check_email($email)>0){
			return true;
		}else{
			$this->form_validation->set_message('email_check', 'The %s field is not correct!');
			return false;
		}
	}
}
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
    	$this->form_validation->set_rules('password', 'Password', 'required|callback_password_check');
    	if($this->form_validation->run() == FALSE){
    		 $this->load->view('login/login_form');
    	}else{
            $profile=$this->Login->check_login($data['email'],$data['password']);
           if($profile->num_rows()>0)
           {
              $this->session->set_userdata('first',$profile->row()->first_name);
               $this->session->set_userdata('person_id',$profile->row()->id);
               echo $this->session->userdata('first');
                echo $this->session->userdata('person_id');
           }
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
    function password_check($password)
    {
            if($this->Login->check_password($password)>0){
                return true;
            }else{
                    $this->form_validation->set_message('password_check', 'The %s field is not match!');
                    return false;
            }
    }
    
    
       
}
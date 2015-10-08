<?php
class Home extends CI_Controller
{
    function __construct() {
        parent::__construct();
        
    }
    
    function logout()
    {
        $this->session->unset_userdata(person_id);
        redirect('Logins/index');
    }
    
    function dashboard()
    {
       
       check_login($this->session->userdata('person_id'));
       $this->load->view('home/dashboard');
    }
}

?>

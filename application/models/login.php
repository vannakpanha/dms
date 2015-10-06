<?php 
class Login extends CI_Model
{
	function check_email($email){
		$this->db->where('email',$email);
		$query = $this->db->get('users');
		return $query->num_rows();
	}
        
        function check_password($password){
            $password_md5=  md5($password);
            $this->db->where('password',$password_md5);
            $query = $this->db->get('users');
            return $query->num_rows();
	}
        
        function check_login($email,$password)
        {
            $password_md5=  md5($password);
            $this->db->where('email',$email);
            $this->db->where('password',$password_md5);
            $query = $this->db->get('users');
             return $query;
        }
        
}

?>
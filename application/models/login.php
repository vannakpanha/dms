<?php 
class Login extends CI_Model
{
	function check_email($email){
		$this->db->where('email',$email);
		$query = $this->db->get('users');
		return $query->num_rows();
	}
}

?>
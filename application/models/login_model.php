<?php
class Login_model extends CI_Model
{
	function __construct()
	{
		parent::__construct ();
	}
	
	// ================== CHECK USER EXIST OR NOT =========================
	public function check_authentication($email, $password)
	{
		$check_user_exist = "SELECT `user_id`, `email`, `password` FROM `user_tbl` WHERE `email`='$email' AND `password`='$password';";
		$query = $this->db->query ( $check_user_exist );
		return $query->result ();
	}
	// ================== END OF CHECK USER EXIST OR NOT ==================
	
	
}
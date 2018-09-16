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
		$check_user_exist = "SELECT 
		emp.ID AS EmpID,
		role.Name AS Role,
		role.ID AS RoleID,
		empLogin.password AS Password,
		emp.name AS EmpName,
		emp.Branch_id AS Branch_id,
		(select ID FROM financial_year WHERE YEAR(Start_date)-1 < YEAR(NOW()) AND YEAR(End_date)+1 > YEAR(NOW()) LIMIT 1) AS Financial_id
		FROM emp_login empLogin
		LEFT JOIN role role ON role.ID=empLogin.role_id
		LEFT JOIN emp emp ON emp.ID=empLogin.ID
		WHERE empLogin.username='$email' 
		AND empLogin.password='$password'
		AND empLogin.isActive=1;";
		$query = $this->db->query ( $check_user_exist );
		return $query->result ();
	}
	public function get_sitemap($roleid){
		$sql="SELECT  
				page_table.ID AS ID,
				page_table.category AS PageCategory,
				page_table.IsDropDown AS IsDropDown,
				page_table.page_title AS PageTitle,
				page_table.page_icon AS PageIcon,
				page_table.page_slug AS PageSlug,
				page_table.page_view AS PageView
				FROM site_manager site_manager
				LEFT JOIN page_table page_table ON page_table.ID=site_manager.page_id
				WHERE site_manager.role_id='$roleid'
				AND site_manager.isActive=1";
		$query = $this->db->query ($sql);
		return $query->result ();
	}
	// ================== END OF CHECK USER EXIST OR NOT ==================
	
	
}
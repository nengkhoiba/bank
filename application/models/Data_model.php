<?php
class Data_model extends CI_Model{
	
    // COMMON CODE START HERE  -- Written by William

    function GetAllRecord($tabName)
    {
        //data is retrive from this query
        $query = $this->db->get($tabName);
        return $query->result_array();
    }
    
    function GetSelectListById($id,$compare_id,$tabName)
    {
        $query = $this->db->get_where($tabName, array($compare_id => $id));
        return $query->result_array();
    }
	function GetAllActiveRecord($tabName)  
	{  
	   //data is retrive from this query  
	    $query = $this->db->get_where($tabName, array('IsActive' => 1)); 
	    return $query->result_array();  
	} 
	function GetRecordById($id,$tabName)  
    { 
         $query = $this->db->get_where($tabName, array('ID' => $id,'IsActive' => 1)); 
         return $query->result_array();  
    }
    function GetRecordByForiegnKey($id,$fieldName,$tabName)
    {
        $query = $this->db->get_where($tabName, array($fieldName => $id,'IsActive' => 1));
        return $query->result_array();
    }    
    function RemoveRecordById($ArrIds,$tblName)
	{ 
		foreach ($ArrIds as $id)
		{ 	    
			$this->db->set('IsActive', 0);  //Set the column name and which value to set..
			$this->db->where('ID', $id); //set column_name and value in which row need to update
			$this->db->update($tblName); //Set your table name
		}
	}
	function UpdateRecordById($Id,$Val,$tblName)
	{
	    $data = array(
	        'status'=>  $Val
	    );
	    $this->db->where('ID',$Id);
	    $this->db->update('customer',$data);
	    
	    if($this->db->trans_status() === FALSE)
	    {
	        $this->db->trans_rollback();
	        return array('code' => 0);
	    }
	    else
	    {
	        $this->db->trans_commit();
	        $this->addLog("Update existing account status", "New Account Status is ".$Val."");
	        return array('code' => 1);
	    }
	}
	function CheckAadhaarNo($aadhaar_no)
	{
	    $query = $this->db->get_where('customer', array('aadhaar_no' => $aadhaar_no));
	    return $query->result ();
	}
	
	function addLog($logtitle,$logDescription){
	    $data = array(
	        'log_name'	=>  $logtitle ,
	        'log_detail'=>  $logDescription,
	        'ipaddress'=>   $this->get_client_ip(),
	        'user_id'=>     $this->session->userdata('userId')
	    );
	    $this->db->insert('log', $data);
	    $lastID=$this->db->insert_id();
	    
	    if($this->db->trans_status() === FALSE)
	    {
	        $this->db->trans_rollback();
	        return array('code' => 0);
	        
	    }
	    else
	    {
	        $this->db->trans_commit();
	        return array('code' => 1);
	    }
	}
	function get_client_ip()
	{
	    $ipaddress = '';
	    if (getenv('HTTP_CLIENT_IP'))
	        $ipaddress = getenv('HTTP_CLIENT_IP');
	        else if(getenv('HTTP_X_FORWARDED_FOR'))
	            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
	            else if(getenv('HTTP_X_FORWARDED'))
	                $ipaddress = getenv('HTTP_X_FORWARDED');
	                else if(getenv('HTTP_FORWARDED_FOR'))
	                    $ipaddress = getenv('HTTP_FORWARDED_FOR');
	                    else if(getenv('HTTP_FORWARDED'))
	                        $ipaddress = getenv('HTTP_FORWARDED');
	                        else if(getenv('REMOTE_ADDR'))
	                            $ipaddress = getenv('REMOTE_ADDR');
	                            else
	                                $ipaddress = 'UNKNOWN';
	                                
	                                return $ipaddress;
	}
	
	function get_member_registration($branch_id){
	    $sql="SELECT cus.ID,
				cus.name,
				cus.parmanent_address,
				cus.contact_no,
				cus.aadhaar_no,
				gm.Name AS sex,
				dst.Name AS district
				FROM customer cus
				LEFT JOIN gender_master gm on gm.ID=cus.sex
				LEFT JOIN district dst on dst.ID=cus.district
				
				WHERE cus.IsActive=1
				AND cus.Branch_id=$branch_id
				";
	    $query=$this->db->query($sql);
	    return $query->result_array();
	}

	// COMMON CODE END HERE  -- Written by William

	/* EMPLOYEE DATA ADD  -- Written by William */
	function addEmpModel( $employee_name, $employee_address,  $employee_country, $employee_state, $employee_city, $employee_district, $employee_pincode, $employee_designation, $employee_gender, $employee_dob, $employee_qualification, $employee_martial_status,$employee_branch)
	{
	         $data = array(
	             'name'	=>  $employee_name ,
	             'address'=>  $employee_address,
	             'country'=>  $employee_country,
	             'state'=>  $employee_state,
	             'city'=>  $employee_city,
	             'district'=>  $employee_district,
	             'pincode'=>  $employee_pincode,
	             'designation'=>  $employee_designation,
	             'gender'=>  $employee_gender,
	             'dob'=>  $employee_dob,
	             'qualification'	=>  $employee_qualification ,
	             'martial_status'=>  $employee_martial_status,
	             'Branch_id'=>  $employee_branch,
	             'IsActive'=>  1,
	         );
	         
	    $this->db->insert('emp', $data);
	    $lastID=$this->db->insert_id();	    
	   	
		if($this->db->trans_status() === FALSE)
		{
		    $this->db->trans_rollback();
			return array('code' => 0);			
		}
		else
		{
		    $this->db->trans_commit();
		    $this->addLog("Add new Employee", "Employee name ".$employee_name." is added.");
			return array('code' => 1);
		}
	}
	
	
	
	
	/* EMPLOYEE DATA UPDATE  -- Written by William */
	function updateEmpModel($emp_id, $employee_name, $employee_address, $employee_country, $employee_state, $employee_city, $employee_district, $employee_pincode, $employee_designation, $employee_gender, $employee_dob, $employee_qualification, $employee_martial_status,$employee_branch)
	{ 
	        $data = array(
	            'name'	=>  $employee_name ,
	            'address'=>  $employee_address,
	            'country'=>  $employee_country,
	            'state'=>  $employee_state,
	            'city'=>  $employee_city,
	            'district'=>  $employee_district,
	            'pincode'=>  $employee_pincode,
	            'designation'=>  $employee_designation,
	            'gender'=>  $employee_gender,
	            'dob'=>  $employee_dob,
	            'qualification'	=>  $employee_qualification ,
	            'martial_status'=>  $employee_martial_status,
	            'Branch_id'=>  $employee_branch
	        );
	   
	       
	   $this->db->where('ID',$emp_id);
	   $this->db->update('emp',$data);
	   
	   if($this->db->trans_status() === FALSE)
	   {
	       $this->db->trans_rollback();
	       return array('code' => 0);
	   }
	   else
	   {
	       $this->db->trans_commit();
	       $this->addLog("Update existing Emp", "Employee name ".$employee_name." is updated.");
	       return array('code' => 1);
	   }
	}
	
	/*PAGE MANAGER ROLE DATA ADD */
	function addRoleModel( $role_title )
	{
         $data = array(
             'Name'	=>  $role_title,
             'isActive'=>  1,
         );
	         
	    $this->db->insert('role', $data);
	    $lastID=$this->db->insert_id();
	    
	    if($this->db->trans_status() === FALSE)
	    {
	        $this->db->trans_rollback();
	        return array('code' => 0);
	    }
	    else
	    {
	        $this->db->trans_commit();
	        $this->addLog("Add new Role", "Role title ".$role_title." is added.");
	        return array('code' => 1);
	    }
	}
	
	/*PAGE MANAGER ROLE DATA UPDATE */
	function updateRoleModel($role_title, $role_id)
	{ 
	  
        $data = array(
            'role'	=>  $role_title 
        );
	    $this->db->where('ID',$role_id);
	    $this->db->update('Name',$data);
	    
	    if($this->db->trans_status() === FALSE)
	    {
	        $this->db->trans_rollback();
	        return array('code' => 0);
	    }
	    else
	    {
	        $this->db->trans_commit();
	        $this->addLog("Update existing Role", "New role title is ".$role_title."");
	        return array('code' => 1);
	    }
	}
	
	
	
	/*MEMBER DATA ADD  -- Written by William */
	function addMemModel( $member_name, $member_dob, $member_gender, $member_aadhaar, $member_husband, $member_address, 
	    $member_rural, $member_urban, $member_district, $member_contact, $member_bankaccount, $member_bankbranch, $member_work, 
	    $member_nominee, $member_nomineeaadhaar, $member_nomineeaddress, $member_nomineerural, $member_nomineeurban, $member_nomineedistrict, $member_nomineecontact)
	{
	    $data = array(
	        'name'	=>  $member_name,
	        'dob'	=>  $member_dob,
	        'sex'	=>  $member_gender ,
	        'aadhaar_no'=>  $member_aadhaar,
	        'husband_name'=>  $member_husband,
	        'parmanent_address'=>  $member_address,
	        'rural'=>  $member_rural,
	        'urban'=>  $member_urban,
	        'district'=>  $member_district,
	        'contact_no'=>  $member_contact,
	        'bank_ac_no'=>  $member_bankaccount,
	        'bank_branch'=>  $member_bankbranch,
	        'work'	=>  $member_work ,
	        'nominee_name'=>  $member_nominee,
	        'nominee_aadhaar_no'=>  $member_nomineeaadhaar,
	        'nominee_permanent_address'=>  $member_nomineeaddress,
	        'nominee_rural'=>  $member_nomineerural,
	        'nominee_urban'=>  $member_nomineeurban,
	        'nominee_district'	=>  $member_nomineedistrict ,
	        'nominee_contact_no'=>  $member_nomineecontact,
	        'IsActive'=>  1
	    );
	    
	    $this->db->insert('customer', $data);
	    $lastID=$this->db->insert_id();
	    
	    if($this->db->trans_status() === FALSE)
	    {
	        $this->db->trans_rollback();
	        return array('code' => 0);
	    }
	    else
	    {
	        $this->db->trans_commit();
	        $this->addLog("Add new Member", "Member name ".$member_name." is added.");
	        return array('code' => 1);
	    }
	}
	
	/*MEMBER DATA UPDATE  -- Written by William */
	function updateMemModel($mem_id, $member_name, $member_dob, $member_gender, $member_aadhaar, $member_husband, $member_address, $member_rural, $member_urban, $member_district, $member_contact, $member_bankaccount, $member_bankbranch, $member_work, $member_nominee, $member_nomineeaadhaar, $member_nomineeaddress, $member_nomineerural, $member_nomineeurban, $member_nomineedistrict, $member_nomineecontact)
	{
	        $data = array(
	            'name'	=>  $member_name,
	            'dob'	=>  $member_dob,
	            'sex'	=>  $member_gender ,
	            'aadhaar_no'=>  $member_aadhaar,
	            'husband_name'=>  $member_husband,
	            'parmanent_address'=>  $member_address,
	            'rural'=>  $member_rural,
	            'urban'=>  $member_urban,
	            'district'=>  $member_district,
	            'contact_no'=>  $member_contact,
	            'bank_ac_no'=>  $member_bankaccount,
	            'bank_branch'=>  $member_bankbranch,
	            'work'	=>  $member_work ,
	            'nominee_name'=>  $member_nominee,
	            'nominee_aadhaar_no'=>  $member_nomineeaadhaar,
	            'nominee_permanent_address'=>  $member_nomineeaddress,
	            'nominee_rural'=>  $member_nomineerural,
	            'nominee_urban'=>  $member_nomineeurban,
	            'nominee_district'	=>  $member_nomineedistrict ,
	            'nominee_contact_no'=>  $member_nomineecontact
	        );
	    
	    $this->db->where('ID',$mem_id);
	    $this->db->update('customer',$data);
	    
	    if($this->db->trans_status() === FALSE)
	    {
	        $this->db->trans_rollback();
	        return array('code' => 0);
	    }
	    else
	    {
	        $this->db->trans_commit();
	        $this->addLog("Update existing Mem", "Member name ".$member_name." is updated.");
	        return array('code' => 1);
	    }
	}
	
	
	//DESIGNATION start here
	/*DESIGNATION MANAGER DATA ADD */
	function addDesignModel( $design_title,$design_description )
	{
         $data = array(
             'Name'	=>  $design_title,
			  'description'	=>  $design_description,
             'IsActive'=>  1,
         );
	         
	    $this->db->insert('designation', $data);
	    $lastID=$this->db->insert_id();
	    
	    if($this->db->trans_status() === FALSE)
	    {
	        $this->db->trans_rollback();
	        return array('code' => 0);
	    }
	    else
	    {
	        $this->db->trans_commit();
	        $this->addLog("Add new Designation", "Designation title ".$design_title." is added.");
	        return array('code' => 1);
	    }
	}
	
	/*DESIGNATION MANAGER DATA UPDATE */
	function updateDesignModel($design_title,$deg_desc, $design_id)
	{	  
        $data = array(
            'Name'	=>  $design_title ,
        	'description'=>$deg_desc
        );
	    $this->db->where('ID',$design_id);
	    $this->db->update('designation',$data);
	    
	    if($this->db->trans_status() === FALSE)
	    {
	        $this->db->trans_rollback();
	        return array('code' => 0);
	    }
	    else
	    {
	        $this->db->trans_commit();
	        $this->addLog("Update existing Designation", "New designation title is ".$design_title."");
	        return array('code' => 1);
	    }
	}
	//DESIGNATION END HERE



	//SHG START HERE
	function addShgmasterModel(  $shg_code,$shg_name,$shg_address,$shg_area,$shg_member_count,$shg_extra )
	{
         $data = array(
            'Group_code'=>  $shg_code,
		    'Group_name'=>  $shg_name,
			'Address'	=>  $shg_address,
			'Area'		=>  $shg_area,
			'Member_count'=>  $shg_member_count,
			'Extra'		=>  $shg_extra,
			'Branch_id'	=> '1',
			'Added_by'	=> '1',
			'Added_on'	=> '1',			
            'IsActive'	=> '1',
         );
	         
	    $this->db->insert('shg_master', $data);
	    $lastID=$this->db->insert_id();
	    
	    if($this->db->trans_status() === FALSE)
	    {
	        $this->db->trans_rollback();
	        return array('code' => 0);
	    }
	    else
	    {
	        $this->db->trans_commit();
	        $this->addLog("Add new SHG Group", "Group Name ".$shg_name." is added.");
	        return array('code' => 1);
	    }
	}
	
	/*DESIGNATION MANAGER DATA UPDATE */
	function updateShgmasterModel( $shg_code,$shg_name,$shg_address,$shg_area,$shg_member_count,$shg_extra , $shg_master_id)
	{	  
        $data = array(
             'Group_code'=>  $shg_code,
		    'Group_name'=>  $shg_name,
			'Address'	=>  $shg_address,
			'Area'		=>  $shg_area,
			'Member_count'=>  $shg_member_count,
			'Extra'		=>  $shg_extra,
			'Modified_by'	=> '1',
			'Modified_on'	=> '1',			
			'Remark'	=> '1',						
            'IsActive'	=> '1',
        );
	    $this->db->where('ID',$shg_master_id);
	    $this->db->update('shg_master',$data);
	    
	    if($this->db->trans_status() === FALSE)
	    {
	        $this->db->trans_rollback();
	        return array('code' => 0);
	    }
	    else
	    {
	        $this->db->trans_commit();
	        $this->addLog("Update existing SHG Group", "New SHG Group title is ".$shg_name."");
	        return array('code' => 1);
	    }
	}

	//SHG END HERE
	
		/*FINANCIAL DATA ADD */
	function addFinancialModel( $financial_title,$financial_start,$financial_end)
	{		
		$financial_start = date("Y-m-d", strtotime($financial_start));
		$financial_end = date("Y-m-d", strtotime($financial_end));
         $data = array(
             'Financial_year'	=>  $financial_title,
			  'Start_date'	=>  $financial_start,
			  'End_date'	=>  $financial_end,			  
             'IsActive'=>  1,
         );
	         
	    $this->db->insert('financial_year', $data);
	    $lastID=$this->db->insert_id();
	    
	    if($this->db->trans_status() === FALSE)
	    {
	        $this->db->trans_rollback();
	        return array('code' => 0);
	    }
	    else
	    {
	        $this->db->trans_commit();
	        $this->addLog("Add new Financial year", "Financial year title ".$financial_title." is added.");
	        return array('code' => 1);
	    }
	}
	
	/*FINANCIAL YEAR DATA UPDATE */
	function updateFinancialModel($financial_id,$financial_title,$financial_start,$financial_end)
	{ 
	
		$financial_start = date("Y-m-d", strtotime($financial_start));
		$financial_end = date("Y-m-d", strtotime($financial_end));
	  
        $data = array(
            'Financial_year'=>  $financial_title,
			'Start_date'=>  $financial_start,
			'End_date'=>  $financial_end 			
        );
	    $this->db->where('ID',$financial_id);
	    $this->db->update('financial_year',$data);
	    
	    if($this->db->trans_status() === FALSE)
	    {
	        $this->db->trans_rollback();
	        return array('code' => 0);
	    }
	    else
	    {
	        $this->db->trans_commit();
	        $this->addLog("Update existing Financial year", "New Financial Year title is ".$financial_title."");
	        return array('code' => 1);
	    }
	}
	
	
	
		/*FINANCIAL DATA ADD */
	function addLoanmasterModel($loanmaster_loan_name,$loanmaster_loan_pc,$loanmaster_loan_pc_type,$loanmaster_tenure_type,$loanmaster_tenure_min,$loanmaster_tenure_max,$loanmaster_min_amount,$loanmaster_max_amount,$loanmaster_income_ledger,$loanmaster_expense_ledger)
	{	

		
         $data = array(
             'Loan_name'	=> $loanmaster_loan_name,
			'Loan_pc'	=>$loanmaster_loan_pc,
			'Loan_pc_type'	=>$loanmaster_loan_pc_type,
			'Tenure_type'	=>$loanmaster_tenure_type,
			'Tenure_min'	=>$loanmaster_tenure_min,
			'Tenure_max'	=>$loanmaster_tenure_max,
			'Min_amount'	=>$loanmaster_min_amount,
			'Min_amount'	=>$loanmaster_max_amount,
			'Income_ledger'	=>$loanmaster_income_ledger,
			'Expense_ledger'=>$loanmaster_expense_ledger,		  
			 'Branch_id'=>  1,
			  'Added_by'=>  1,
			  'Added_on'=>  1,
			 'IsActive'=>  1,
         );
	         
	    $this->db->insert('loan_master', $data);
	    $lastID=$this->db->insert_id();
	    
	    if($this->db->trans_status() === FALSE)
	    {
	        $this->db->trans_rollback();
	        return array('code' => 0);
	    }
	    else
	    {
		
	        $this->db->trans_commit();
	        $this->addLog("Add new Loan name","Loan name is ".$loanmaster_loan_name."  is added.");
	        return array('code' => 1);
	    }
	}
	
	/*LOANMASTER DATA UPDATE */
	function updateLoanmasterModel($loanmaster_id, $loanmaster_loan_name,$loanmaster_loan_pc,$loanmaster_loan_pc_type,$loanmaster_tenure_type,$loanmaster_tenure_min,$loanmaster_tenure_max,$loanmaster_min_amount,$loanmaster_max_amount,$loanmaster_income_ledger,$loanmaster_expense_ledger)
	{ 
	
	
        $data = array(
           'Loan_name'	=> $loanmaster_loan_name,
			'Loan_pc'	=>$loanmaster_loan_pc,
			'Loan_pc_type'	=>$loanmaster_loan_pc_type,
			'Tenure_type'	=>$loanmaster_tenure_type,
			'Tenure_min'	=>$loanmaster_tenure_min,
			'Tenure_max'	=>$loanmaster_tenure_max,
			'Min_amount'	=>$loanmaster_min_amount,
			'Min_amount'	=>$loanmaster_max_amount,
			'Income_ledger'	=>$loanmaster_income_ledger,
			'Expense_ledger'=>$loanmaster_expense_ledger,
		  	 'Branch_id'=>  1,
			  'Modified_by'=>  1,
			 'IsActive'=>  1,
        );
	    $this->db->where('ID',$loanmaster_id);
	    $this->db->update('loan_master',$data);
	    
	    if($this->db->trans_status() === FALSE)
	    {
	        $this->db->trans_rollback();
	        return array('code' => 0);
	    }
	    else
	    {
	        $this->db->trans_commit();
	        $this->addLog("Update existing Loan details", "New Loan title is ".$loanmaster_loan_name."");
	        return array('code' => 1);
	    }
	}
	
	
	
	
	
	
	/*BRANCH DATA ADD */
	function addBranchModel($branch_name,$branch_code,$branch_address)
	{
         $data = array(
             'Name'	=>  $branch_name,
			  'branch_code'	=>  $branch_code,
			  'branch_address'	=>  $branch_address,			  
             'IsActive'=>  1,
         );
	         
	    $this->db->insert('branch',$data);
	    $lastID=$this->db->insert_id();
	    
	    if($this->db->trans_status() === FALSE)
	    {
	        $this->db->trans_rollback();
	        return array('code' => 0);
	    }
	    else
	    {
	        $this->db->trans_commit();
	        $this->addLog("Add new Branch  "," Branch name ".$branch_name."  is added.");
	        return array('code' => 1);
	    }
	}
	
	/*BRANCH DATA UPDATE */
	function updateBranchModel($branch_id,$branch_name,$branch_code,$branch_address)
	{ 
	
        $data = array(
            'Name'=>  $branch_name,
			'Branch_code'=>  $branch_code,
			'Branch_address'=>  $branch_address 			
        );
	    $this->db->where('ID',$branch_id);
	    $this->db->update('branch',$data);
	    
	    if($this->db->trans_status() === FALSE)
	    {
	        $this->db->trans_rollback();
	        return array('code' => 0);
	    }
	    else
	    {
	        $this->db->trans_commit();
	        $this->addLog("Update existing Branch ", "New branch name is ".$branch_name."");
	        return array('code' => 1);
	    }
	}
	
	
	
	
	/*CUSTOMER DOCUMENT DATA ADD  -- Written by William */
	function addCustomerDoc($customer_id, $customer_doc_type,$file)
	{
	    $file_extension = explode(':', substr($file, 0, strpos($file, ';')))[1];
	    $data = array(
	        'Cus_id'	=>  $customer_id,
	        'doc_type'	=>  $customer_doc_type,
	        'file_type'	=>  $file_extension,
	        'files'=>  $file,
	        'IsActive'=>  1
	    );
	    
	    $this->db->insert('customer_document', $data);
	    $lastID=$this->db->insert_id();
	    
	    if($this->db->trans_status() === FALSE)
	    {
	        $this->db->trans_rollback();
	        return array('code' => 0);
	    }
	    else
	    {
	        $this->db->trans_commit();
	        $this->addLog("Add new Document", "Customer ID ".$customer_id." is updated.");
	        return array('code' => 1);
	    }
	}
	/*GET CUSTOMER DATA  -- Written by William */
	function GetCustomerRecordById($id,$tabName)
	{
	    $sql = "SELECT account_status.Name as accStatus, customer.*
	    FROM customer
	    LEFT JOIN account_status
	    ON customer.status=account_status.ID
	    WHERE customer.isActive = 1 AND customer.ID = $id";
	    $query=$this->db->query($sql);
	      
// 	      $query = $this->db->select('account_status.Name as accStatus, customer.*')
// 	      ->from('customer')
// 	      ->join('account_status', 'customer.status = account_status.ID', 'left')
// 	      ->where_in('customer.isActive', 1)
// 	      ->where_in('customer.ID', $id);
	      
	    return $query->result_array();
	}

	
	/*PAGE MANAGER--Nengkhoiba*/
	function get_page_by_role($role){
		$sql="SELECT pt.ID,pt.category AS PageCategory,pt.IsDropDown,pt.Page_title, $role AS Role,		 
	    (SELECT count(ID) from site_manager sm where sm.page_id=pt.ID AND sm.role_id='$role' AND sm.isActive =1 ) AS pageEnable
		FROM page_table pt
		WHERE pt.isActive=1";
		$query=$this->db->query($sql);
		return $query->result_array();
		
	}
	function Update_page_role($role,$checkboxs){
		
		$this->db->trans_begin();
		
		$roleId=$role[0];
		$data = array(
				'isActive'=>  0
		);
		$where = array(
				'role_id'   => $roleId
		);
		$this->db->where($where);
		$this->db->update('site_manager',$data);
		foreach ($checkboxs AS $page){
			$sqlCheck="SELECT ID FROM site_manager WHERE page_id='$page' AND role_id='$roleId'";
			$queryCheck=$this->db->query($sqlCheck);
			if($queryCheck->num_rows()>0){
			$data = array(
						'isActive'=>  1
				);
			$where = array(
					'page_id' => $page,
					'role_id'   => $roleId
			);
				$this->db->where($where);
				$this->db->update('site_manager',$data);
			}else{
				$data = array(
						'page_id'	=>  $page ,
						'role_id'	=>  $roleId ,
						'isActive'=>  1
				);
				$this->db->insert('site_manager', $data);
				
			}
			
		}
		if($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return array('code' => 0);
		}
		else
		{
			$this->db->trans_commit();
			$this->addLog("Site Map Change", "Site Map change");
			return array('code' => 1);
		}
		
		
	}
	/*PAGE MANAGER--Nengkhoiba*/

}
    
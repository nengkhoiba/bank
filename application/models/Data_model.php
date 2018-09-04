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
    function RemoveRecordById($ArrIds,$tblName)
	{ 
		foreach ($ArrIds as $id)
		{ 	    
			$this->db->set('IsActive', 0);  //Set the column name and which value to set..
			$this->db->where('ID', $id); //set column_name and value in which row need to update
			$this->db->update($tblName); //Set your table name
		}
	}

	// COMMON CODE END HERE  -- Written by William

	/* EMPLOYEE DATA ADD  -- Written by William */
	function addEmpModel( $employee_name, $employee_address,  $employee_country, $employee_state, $employee_city, $employee_district, $employee_pincode, $employee_designation, $employee_gender, $employee_dob, $employee_qualification, $employee_martial_status, $fileName )
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
	             'image'=>  $fileName,
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
	function updateEmpModel($emp_id, $employee_name, $employee_address, $employee_country, $employee_state, $employee_city, $employee_district, $employee_pincode, $employee_designation, $employee_gender, $employee_dob, $employee_qualification, $employee_martial_status, $fileName, $previous_emp_image)
	{ 
	    if($fileName == '') 
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
	            'martial_status'=>  $employee_martial_status
	        );
	    }
	    else 
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
	            'image'=>  $fileName
	        );
	        unlink("assets/upload/employee/".$previous_emp_image);
	    }
	    
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
             'role'	=>  $role_title,
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
	    $this->db->update('role',$data);
	    
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
	
	
	
	/*DESIGNATION MANAGER DATA ADD */
	function addDesignModel( $design_title,$design_description )
	{
         $data = array(
             'title'	=>  $design_title,
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
	function updateDesignModel($design_title, $design_id)
	{	  
        $data = array(
            'title'	=>  $design_title 
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
	        $this->addLog("Add new Financial Year title ".$financial_title."  is added.");
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
	
	
	/*BRANCH DATA ADD */
	function addBranchModel($branch_name,$branch_code,$branch_address)
	{
         $data = array(
             'branch_name'	=>  $branch_name,
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
            'Branch_name'=>  $branch_name,
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
	
	
	/*ACCOUNT GROUP DATA ADD  -- Written by William */
	function addAccountGrpModel( $accountGrp_name,$accountGrp_under,$accountGrp_nature )
	{
	    $data = array(
	        'Group_name'	=>  $accountGrp_name,
	        'Group_under'	=>  $accountGrp_under,
	        'Group_nature'	=>  $accountGrp_nature,
	        'IsActive'=>  1,
	    );
	    
	    $this->db->insert('account_group', $data);
	    $lastID=$this->db->insert_id();
	    
	    if($this->db->trans_status() === FALSE)
	    {
	        $this->db->trans_rollback();
	        return array('code' => 0);
	    }
	    else
	    {
	        $this->db->trans_commit();
	        $this->addLog("Add new account group ", "Account Group Name ".$accountGrp_name." is added.");
	        return array('code' => 1);
	    }
	}
	
	/*ACCOUNT GROUP DATA UPDATE  -- Written by William */
	function updateAccountGrpModel( $accountGrp_id,$accountGrp_name,$accountGrp_under,$accountGrp_nature)
	{
	    
	    $data = array(
	        'Group_name'	=>  $accountGrp_name,
	        'Group_under'	=>  $accountGrp_under,
	        'Group_nature'	=>  $accountGrp_nature,
	    );
	    $this->db->where('ID',$accountGrp_id);
	    $this->db->update('account_group',$data);
	    
	    if($this->db->trans_status() === FALSE)
	    {
	        $this->db->trans_rollback();
	        return array('code' => 0);
	    }
	    else
	    {
	        $this->db->trans_commit();
	        $this->addLog("Update existing Account Group", "New Account Group Name is ".$accountGrp_name."");
	        return array('code' => 1);
	    }
	}
	
	
	/*ACCOUNT LEDGER DATA ADD  -- Written by William */
	function addAccountLedgerModel( $accountLedger_name,$accountLedger_grpUnder,$accountLedger_open)
	{
	    $data = array(
	        'Ledger'	=>  $accountLedger_name,
	        'Group_ID'	=>  $accountLedger_grpUnder,
	        'Open_balance'	=>  $accountLedger_open,
	        'IsActive'=>  1,
	    );
	    
	    $this->db->insert('account_ledger', $data);
	    $lastID=$this->db->insert_id();
	    
	    if($this->db->trans_status() === FALSE)
	    {
	        $this->db->trans_rollback();
	        return array('code' => 0);
	    }
	    else
	    {
	        $this->db->trans_commit();
	        $this->addLog("Add new account ledger ", "Account Ledger Name ".$accountLedger_name." is added.");
	        return array('code' => 1);
	    }
	}
	
	/*ACCOUNT LEDGER DATA UPDATE  -- Written by William*/
	function updateAccountLedgerModel( $accountLedger_id,$accountLedger_name,$accountLedger_grpUnder,$accountLedger_open)
	{
	    
	    $data = array(
	        'Ledger'	=>  $accountLedger_name,
	        'Group_ID'	=>  $accountLedger_grpUnder,
	        'Open_balance'	=>  $accountLedger_open,
	    );
	    $this->db->where('ID',$accountLedger_id);
	    $this->db->update('account_ledger',$data);
	    
	    if($this->db->trans_status() === FALSE)
	    {
	        $this->db->trans_rollback();
	        return array('code' => 0);
	    }
	    else
	    {
	        $this->db->trans_commit();
	        $this->addLog("Update existing Account Ledger", "New Account Ledger Name is ".$accountLedger_name."");
	        return array('code' => 1);
	    }
	}

	
	/*CUSTOMER DOCUMENT DATA ADD  -- Written by William */
	function addCustomerDoc($customer_id, $customer_doc_type, $customer_doc_filetype,$file)
	{
	    $data = array(
	        'Cus_id'	=>  $customer_id,
	        'doc_type'	=>  $customer_doc_type,
	        'file_type'	=>  $customer_doc_filetype ,
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




}
    
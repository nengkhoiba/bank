<?php
class Data_model extends CI_Model{
	
    function __construct()
    {
        parent::__construct();
        $this->load->helper('date');
        if($this->session->userdata('loginStatus')){
           $GLOBALS['branch_id']=$this->session->userdata('Branch_id');
    		$GLOBALS['financial_id']=$this->session->userdata('Financial_id');
    		$GLOBALS['Added_by']=$this->session->userdata('userId');
    		$date = new \Datetime('now');
    		$GLOBALS['NOW']=date('Y-m-d H:i:s',now());
        }else{
            $output = array('success' =>false, 'msg'=> "EXP");
            echo json_encode($output);
            return;
        }
    }
    
/*GET ALL CUSTOMER DATA BY BRANCH ID -- Written by William */
    
    
    function GetCustomerDataByBranchId($id)
    {
        $sql =  "SELECT cus.ID as ID,cus.name as name,dob,aadhaar_no,parmanent_address,contact_no, accSt.Name as status, genMas.Name as sex, dis.Name as district FROM customer cus 
                LEFT JOIN branch br on br.ID=cus.Branch_id
                LEFT JOIN account_status accSt on accSt.ID=cus.status
                LEFT JOIN gender_master genMas on genMas.ID=cus.sex
                LEFT JOIN district dis on dis.ID=cus.district
                WHERE cus.IsActive=1 AND br.ID=$id ";
        
        $query=$this->db->query($sql);
        
        return $query->result_array();
    }
    
 
    
//Live Search from this query
    function loadDataBySearchKeyword($q)
    {
       $sql="SELECT customer_account.Acc_no AS id,customer.name  AS value  FROM customer_account
            LEFT JOIN customer on customer.ID=customer_account.Cus_id
            WHERE customer.name like '%$q%'
            OR customer_account.Acc_no like '%$q%'
            AND customer.IsActive=1
            AND customer.status=4
            AND customer_account.Acc_no !=''
            LIMIT 10
            ";
        $query=$this->db->query($sql);
        
        return $query->result_array();
    }
    
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
	function GetDropDownList($tabName)
	{
	    $sql=  "SELECT ID, Name
    			from $tabName
                WHERE IsActive = 1";	    
	    $query = $this->db->query($sql);
	    return $query->result_array();
	}
	function GetRecordById($id,$tabName)  
    { 
         $query = $this->db->get_where($tabName, array('ID' => $id)); 
         return $query->result_array();  
    }
    function GetRecordByForiegnKey($id)
    {
        $sql =  "SELECT cusDoc.Cus_id as ID, docType.name as doc_type, cusDoc.file_type as file_type, cusDoc.Added_by as Added_by, cusDoc.Added_on as Added_on, cusDoc.files as files
                FROM customer_document cusDoc
                LEFT JOIN customer cus on cus.ID=cusDoc.Cus_id
                LEFT JOIN document_type docType on docType.ID=cusDoc.doc_type
                WHERE cus.IsActive=1 AND cusDoc.Cus_id = $id ";
        $query=$this->db->query($sql);
        
        return $query->result_array();
    }    
    function RemoveRecordById($ArrIds,$tblName)
	{ 
		$this->db->trans_begin();
		$ids="";
		foreach ($ArrIds as $id)
		{ 	    
			$this->db->set('IsActive', 0);  //Set the column name and which value to set..
			$this->db->where('ID', $id); //set column_name and value in which row need to update
			$this->db->update($tblName); //Set your table name
		    $ids=$ids.",".$id;
	        if($this->db->trans_status() === FALSE)
	        {
	        	$this->db->trans_rollback();
	        	return array('code' => 0);
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
	    	$this->addLog("Soft delete Record From ".$tblName, "record deleted with ids. ".$ids."");
	    	return array('code' => 1);
	    }
	}
	function HardRemoveRecordById($ArrIds,$tblName)
	{
		$this->db->trans_begin();
		$ids="";
	    foreach ($ArrIds as $id)
	    {
	        $this->db->where('ID', $id); //set column_name and value in which row need to update
	        $this->db->delete($tblName); //Set your table name
	        $ids=$ids.",".$id;
	        if($this->db->trans_status() === FALSE)
	        {
	        	$this->db->trans_rollback();
	        	return array('code' => 0);
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
	    	$this->addLog("Hard delete Record From ".$tblName, "record deleted with ids. ".$ids."");
	    	return array('code' => 1);
	    }
	}
	function UndoRemoveRecordById($ArrIds,$tblName)
	{
		$this->db->trans_begin();
		$ids="";
	    foreach ($ArrIds as $id)
	    {
	        $this->db->set('IsActive', 1);  //Set the column name and which value to set..
	        $this->db->where('ID', $id); //set column_name and value in which row need to update
	        $this->db->update($tblName); //Set your table name
	        $ids=$ids.",".$id;
	        if($this->db->trans_status() === FALSE)
	        {
	        	$this->db->trans_rollback();
	        	return array('code' => 0);
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
	    	$this->addLog("Undo Soft delete Record From ".$tblName, "record deleted with ids. ".$ids."");
	    	return array('code' => 1);
	    }
	}

	function UpdateRecordById($Id,$Val,$tblName)
	{
		$this->db->trans_begin();
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
	function CheckDocument($docTypeVal,$cusId)
	{
	    $query = $this->db->get_where('customer_document', array('Cus_id' => $cusId,'doc_type' => $docTypeVal, 'IsActive' => '1'));
	    return $query->result ();
	}
	
	function GetAccountStatusById($Id,$tabName)
	{
	    //data is retrive from this query
	    $query = $this->db->get_where($tabName, array('Cus_id' => $Id));
	    return $query->result_array();
	} 
	
	/*GENERATE CUSTOMER ACCOUNT NUMBER */
	function GenerateAccountById( $Id,$tabName )
	{	
		$this->db->trans_begin();
	    $date = new \Datetime('now');
	    $accountNo = $this->generateGetAccountNo($GLOBALS['financial_id'], $GLOBALS['branch_id']);
	    
	    $data = array(
	        'Cus_id'	=>  $Id,
	        'Acc_no'	=>  $accountNo,
	        'Branch_id'	=>  $GLOBALS['branch_id'],
	        'Added_by'	=>  $GLOBALS['Added_by'],
	        'Added_on'	=>   date('Y-m-d H:i:s',now()),
	        'isActive'=>  1,
	    );
	    
	    $this->db->insert($tabName, $data);
	    $lastID=$this->db->insert_id();
	    
	    if($this->db->trans_status() === FALSE)
	    {
	        $this->db->trans_rollback();
	        return array('code' => 0);
	    }
	    else
	    {
	        $this->db->trans_commit();
	        $this->addLog("Generate new customer account number", "A/c No ".$accountNo." is generated.");
	        return array('code' => 1);
	    }
	}
	
	private function generateGetAccountNo($financialYearId,$branchId){
	    $accountNo="";
	    $sql="SELECT YEAR(NOW()) AS FinancialYear";
	    $yearQuery=$this->db->query($sql);
	    $yearResult=$yearQuery->result_array();
	    $year=$yearResult[0]['FinancialYear'];
	    
	    $Branchquery = $this->db->select('Branch_code')
	    ->get_where('branch', array('ID' => $GLOBALS['branch_id']));
	    $BranchResult=$Branchquery->result_array();
	    $BranchCode = $BranchResult[0]['Branch_code'];
	    $this->db->select('COUNT(ID) AS AccountCount')
	    ->from('customer_account')
	    ->where(array('Branch_id' => $branchId));
	    $query = $this->db->get();
	    $Result=$query->result_array();
	    $Count=$Result[0]['AccountCount'];
	    
	    $accountNo=$BranchCode.$year.($Count+1);
	    return $accountNo;
	}
	
	function addLog($logtitle,$logDescription){
		$this->db->trans_begin();
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

	
	/*LOAD EMP TABLE */
	function GetEmpRecord()
	{
	    //data is retrive from this query
	    $sql=  "SELECT emp.Name,emp.address,emp.pincode,emp.dob,emp.qualification,emp.ID, des.Name as designation
    			from emp
    			LEFT JOIN designation des ON des.ID  = emp.designation
                WHERE emp.isActive = 1";
	    
	    $query = $this->db->query($sql);
	    return $query->result_array();
	}
	
	
	
	/* EMPLOYEE DATA ADD  -- Written by William */
	function addEmpModel( $employee_name, $employee_address,  $employee_country, $employee_state, $employee_city, $employee_district, $employee_pincode, $employee_designation, $employee_gender, $employee_dob, $employee_qualification, $employee_martial_status,$employee_branch)
	{
		$this->db->trans_begin();
	         $data = array(
	             'Name'	=>  $employee_name ,
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
	         		'Added_by' =>$GLOBALS['Added_by'],
	         		'Added_on' =>$GLOBALS['NOW'],
	         		'Modified_by'=>$GLOBALS['Added_by'],
	         		'Modified_on'=>$GLOBALS['NOW'],
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
		$this->db->trans_begin();
	        $data = array(
	            'Name'	=>  $employee_name ,
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
	        		'Modified_by'=>$GLOBALS['Added_by'],
	        		'Modified_on'=>$GLOBALS['NOW'],
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
		$this->db->trans_begin();
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
		$this->db->trans_begin();
        $data = array(
            'Name'	=>  $role_title 
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
		$this->db->trans_begin();
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
	        'status'=>  1,
	        'Branch_id'=>  $GLOBALS['branch_id'],
	        'Added_by' =>$GLOBALS['Added_by'],
	    	'Added_on' =>$GLOBALS['NOW'],
	    	'Modified_by'=>$GLOBALS['Added_by'],
	    	'Modified_on'=>$GLOBALS['NOW'],
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
		$this->db->trans_begin();
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
        		'Added_by' =>$GLOBALS['Added_by'],
        		'Added_on' =>$GLOBALS['NOW'],
        		'Modified_by'=>$GLOBALS['Added_by'],
        		'Modified_on'=>$GLOBALS['NOW']
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
		$this->db->trans_begin();
         $data = array(
             'Name'	=>  $design_title,
			 'description'	=>  $design_description,
         		'Added_by' =>$GLOBALS['Added_by'],
         		'Added_on' =>$GLOBALS['NOW'],
         		'Modified_by'=>$GLOBALS['Added_by'],
         		'Modified_on'=>$GLOBALS['NOW'],
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
		$this->db->trans_begin();
        $data = array(
            'Name'	=>  $design_title ,
        	'description'=>$deg_desc,
        		'Modified_by'=>$GLOBALS['Added_by'],
        		'Modified_on'=>$GLOBALS['NOW'],
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

	/*LOAD SHG TABLE */
	function GetShgRecord()
	{
	    //data is retrive from this query
	    $sql=  "SELECT shg.Group_code,shg.Group_name,shg.Address,shg.Area,shg.Member_count,shg.Extra,shg.Added_on,shg.ID,brn.Name as Branch_id
    			from shg_master shg
    			LEFT JOIN branch brn ON brn.ID  = shg.Branch_id
                WHERE shg.isActive = 1";
	    
	    $query = $this->db->query($sql);
	    return $query->result_array();
	}

	//SHG START HERE
	function addShgmasterModel(  $shg_code,$shg_name,$shg_address,$shg_area,$shg_member_count,$shg_extra )
	{
		$this->db->trans_begin();
         $data = array(
            'Group_code'=>  $shg_code,
		    'Group_name'=>  $shg_name,
			'Address'	=>  $shg_address,
			'Area'		=>  $shg_area,
			'Member_count'=>  $shg_member_count,
			'Extra'		=>  $shg_extra,
			'Branch_id'	=> $GLOBALS['branch_id'],
			'Added_by' =>$GLOBALS['Added_by'],
	    	'Added_on' =>$GLOBALS['NOW'],
	    	'Modified_by'=>$GLOBALS['Added_by'],
	    	'Modified_on'=>$GLOBALS['NOW'],		
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
		$this->db->trans_begin();
        $data = array(
             'Group_code'=>  $shg_code,
		    'Group_name'=>  $shg_name,
			'Address'	=>  $shg_address,
			'Area'		=>  $shg_area,
			'Member_count'=>  $shg_member_count,
			'Extra'		=>  $shg_extra,
	    	'Modified_by'=>$GLOBALS['Added_by'],
	    	'Modified_on'=>$GLOBALS['NOW'],					
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
		$this->db->trans_begin();
		$financial_start = date("Y-m-d", strtotime($financial_start));
		$financial_end = date("Y-m-d", strtotime($financial_end));
         $data = array(
             'Financial_year'	=>  $financial_title,
			 'Start_date'	=>  $financial_start,
			 'End_date'	=>  $financial_end,	
         		'Added_by' =>$GLOBALS['Added_by'],
         		'Added_on' =>$GLOBALS['NOW'],
         		'Modified_by'=>$GLOBALS['Added_by'],
         		'Modified_on'=>$GLOBALS['NOW'],
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
		$this->db->trans_begin();
		$financial_start = date("Y-m-d", strtotime($financial_start));
		$financial_end = date("Y-m-d", strtotime($financial_end));
	  
        $data = array(
            'Financial_year'=>  $financial_title,
			'Start_date'=>  $financial_start,
        		'Modified_by'=>$GLOBALS['Added_by'],
        		'Modified_on'=>$GLOBALS['NOW'],
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

/*LOAN MASTER TABLE */
	function GetLoanMasterRecord()
	{
	    //data is retrive from this query
	    $sql=  "SELECT pc.Name as Loan_pc_type, 
	    		ten.Name as Tenure_type, 
	    		lm.Loan_name, lm.Loan_pc, 
	    		lm.Tenure_min, lm.Tenure_max, 
	    		lm.Min_amount, lm.Max_amount, 
	    		lm.Added_on, lm.ID,
	    		ft.Name as Fine_type,
	    		lm.Fine_value,
	    		lm.Buffer_days,
	    		lct.Name as Loan_calculation_type
	    		
    			from loan_master lm					
    			LEFT JOIN pc_type_master pc ON pc.ID  = lm.Loan_pc_type
                LEFT JOIN tenure_type_master ten ON ten.ID  = lm.Tenure_type
                LEFT JOIN fine_type ft ON ft.ID  = lm.Fine_type
                LEFT JOIN loan_calculation_type lct ON lct.ID  = lm.Loan_calculation_type
                WHERE lm.isActive = 1";
	    
	    $query = $this->db->query($sql);
	    return $query->result_array();
	}
	
	
/*LOAN MASTER DATA ADD */
	function addLoanmasterModel($loanmaster_loan_name,$loanmaster_loan_pc,$loanmaster_loan_pc_type,$loanmaster_tenure_type,$loanmaster_tenure_min,$loanmaster_tenure_max,$loanmaster_min_amount,$loanmaster_max_amount,$Fine_type,$Fine_value,$buffer_day,$Loan_type)
	{	

		$this->db->trans_begin();
         $data = array(
             'Loan_name'	=> $loanmaster_loan_name,
			'Loan_pc'	=>$loanmaster_loan_pc,
			'Loan_pc_type'	=>$loanmaster_loan_pc_type,
			'Tenure_type'	=>$loanmaster_tenure_type,
			'Tenure_min'	=>$loanmaster_tenure_min,
			'Tenure_max'	=>$loanmaster_tenure_max,
			'Min_amount'	=>$loanmaster_min_amount,
			'Max_amount'	=>$loanmaster_max_amount,
         	'Fine_type'	=>$Fine_type,
			'Fine_value'=>$Fine_value,
        	'Buffer_days'=>$buffer_day,
        	'Loan_calculation_type'=>$Loan_type,	  
			'Branch_id'=>  $GLOBALS['branch_id'],
			'Added_by' =>$GLOBALS['Added_by'],
	    	'Added_on' =>$GLOBALS['NOW'],
	    	'Modified_by'=>$GLOBALS['Added_by'],
	    	'Modified_on'=>$GLOBALS['NOW'],
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
	function updateLoanmasterModel($loanmaster_id, $loanmaster_loan_name,$loanmaster_loan_pc,$loanmaster_loan_pc_type,$loanmaster_tenure_type,$loanmaster_tenure_min,$loanmaster_tenure_max,$loanmaster_min_amount,$loanmaster_max_amount,$Fine_type,$Fine_value,$buffer_day,$Loan_type)
	{ 
	
		$this->db->trans_begin();
        $data = array(
           'Loan_name'	=> $loanmaster_loan_name,
			'Loan_pc'	=>$loanmaster_loan_pc,
			'Loan_pc_type'	=>$loanmaster_loan_pc_type,
			'Tenure_type'	=>$loanmaster_tenure_type,
			'Tenure_min'	=>$loanmaster_tenure_min,
			'Tenure_max'	=>$loanmaster_tenure_max,
			'Min_amount'	=>$loanmaster_min_amount,
			'Max_amount'	=>$loanmaster_max_amount,
			'Fine_type'	=>$Fine_type,
			'Fine_value'=>$Fine_value,
        	'Buffer_days'=>$buffer_day,
        	'Loan_calculation_type'=>$Loan_type,
		  	'Branch_id'=>  $GLOBALS['branch_id'],
	    	'Modified_by'=>$GLOBALS['Added_by'],
	    	'Modified_on'=>$GLOBALS['NOW'],
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
		$this->db->trans_begin();
         $data = array(
             'Name'	=>  $branch_name,
			  'branch_code'	=>  $branch_code,
			  'branch_address'	=>  $branch_address,
         		'Added_by' =>$GLOBALS['Added_by'],
         		'Added_on' =>$GLOBALS['NOW'],
         		'Modified_by'=>$GLOBALS['Added_by'],
         		'Modified_on'=>$GLOBALS['NOW'],
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
		$this->db->trans_begin();
        $data = array(
            'Name'=>  $branch_name,
			'Branch_code'=>  $branch_code,
			'Branch_address'=>  $branch_address,
        		'Modified_by'=>$GLOBALS['Added_by'],
        		'Modified_on'=>$GLOBALS['NOW'],
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
		$this->db->trans_begin();
	    $file_extension = explode(':', substr($file, 0, strpos($file, ';')))[1];
	    $data = array(
	        'Cus_id'	=>  $customer_id,
	        'doc_type'	=>  $customer_doc_type,
	        'file_type'	=>  $file_extension,
	        'files'=>  $file,
    		'Added_by' =>$GLOBALS['Added_by'],
    		'Added_on' =>$GLOBALS['NOW'],
    		'Modified_by'=>$GLOBALS['Added_by'],
    		'Modified_on'=>$GLOBALS['NOW'],
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
	    $sql = "SELECT cus.ID as ID,cus.name as name,cus.Added_on as Added_on,dob,aadhaar_no,husband_name,parmanent_address,rural,
        urban,contact_no,bank_ac_no,bank_branch,work,nominee_name,nominee_aadhaar_no,nominee_permanent_address,
        nominee_rural,nominee_urban,nominee_district,nominee_contact_no, cusAcc.Acc_no as accNo,
        br.Name as branchName, br.Branch_address as Branch_address, br.Branch_code as Branch_code,
        accSt.ID as status, accSt.Name as accStatus, cusDoc.files as photo, genMas.Name as sex, dis.Name as district,
        nomiDis.Name as nominee_district FROM $tabName cus
        LEFT JOIN customer_account acc on acc.Cus_ID=cus.ID
        LEFT JOIN branch br on br.ID=cus.Branch_id
        LEFT JOIN account_status accSt on accSt.ID=cus.status
        LEFT JOIN customer_document cusDoc on cusDoc.Cus_id=cus.ID
        LEFT JOIN gender_master genMas on genMas.ID=cus.sex
        LEFT JOIN district dis on dis.ID=cus.district
        LEFT JOIN district nomiDis on nomiDis.ID=cus.nominee_district
        LEFT JOIN customer_account cusAcc on cusAcc.Cus_id=cus.ID WHERE cus.IsActive=1 AND cus.ID=$id ";
	    $query=$this->db->query($sql);
	      
	    return $query->result_array();
	}
	
	/*GET CUSTOMER DATA BY SEARCH KEYWORD -- Written by William */


	function GetRecordBySearchKeyWord($q)
	{
	    $sql =  "SELECT cus.ID as Cus_id,cus.name as name,cus.Added_on as Added_on,dob,aadhaar_no,husband_name,parmanent_address,rural,urban,
                contact_no,bank_ac_no,bank_branch,work,nominee_name,nominee_aadhaar_no,nominee_permanent_address,nominee_rural,
                nominee_urban,nominee_district,nominee_contact_no, cusAcc.Acc_no as accNo, br.Name as branchName,
                br.Branch_address as Branch_address, br.Branch_code as Branch_code,accSt.ID as status, accSt.Name as accStatus,
                cusDoc.files as photo, genMas.Name as sex, dis.Name as district, nomiDis.Name as nominee_district FROM customer cus
                LEFT JOIN customer_account acc on acc.Cus_ID=cus.ID
                LEFT JOIN branch br on br.ID=cus.Branch_id
                LEFT JOIN account_status accSt on accSt.ID=cus.status
                LEFT JOIN customer_document cusDoc on cusDoc.Cus_id=cus.ID
                LEFT JOIN gender_master genMas on genMas.ID=cus.sex
                LEFT JOIN district dis on dis.ID=cus.district
                LEFT JOIN district nomiDis on nomiDis.ID=cus.nominee_district
                LEFT JOIN customer_account cusAcc on cusAcc.Cus_id=cus.ID WHERE acc.IsActive=1 AND acc.Acc_no=$q ";

	    $query=$this->db->query($sql);
	    
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

	function GetAllSelectedMember($id)  
	{  
	   //data is retrive from this query 
	   $sql="SELECT customer.ID,
	   				customer.name,
	   				customer.aadhaar_no,
	   				customer.parmanent_address,
	   				customer.contact_no,
	   				customer_account.Acc_no,
	   				district.name AS district,
                    shg_master.Group_name,
                    group_customer_member.ID AS group_id
		        FROM customer 
		   		
		   		LEFT JOIN customer_account ON customer_account.Cus_id  = customer.ID
		   		LEFT JOIN group_customer_member ON  group_customer_member.Acc_no=customer_account.Acc_no
		   		LEFT JOIN district ON district.ID =customer.district
		   		LEFT JOIN shg_master ON shg_master.ID  = group_customer_member.Group_id

		   		WHERE group_customer_member.Group_id='$id'
		   		
		   		"; 
	    $query = $this->db->query($sql); 
	    return $query->result_array();  
	}
	

	/*Add member to shg group*/ 
	function AddCustomerToGroup($ac_id,$gr_id)
	{
		$this->db->trans_begin();
		$sql="SELECT ID FROM group_customer_member WHERE  Acc_no='$ac_id'";
		$query=$this->db->query($sql);
		if($query->num_rows()>0){
			return array('code' => 2);
		}else{

         $data = array(
             'Group_Id'	=>  $gr_id,
			 'Acc_no'	=>  $ac_id,
         );
	         
	    $this->db->insert('group_customer_member', $data);
	    $lastID=$this->db->insert_id();
	    
	    if($this->db->trans_status() === FALSE)
	    {
	        $this->db->trans_rollback();
	        return array('code' => 0);
	    }
	    else
	    {
	        $this->db->trans_commit();
	        $this->addLog("Add new Customer to group", "Customer A/C no. ".$ac_id." is added to group ID ".$gr_id);
	        return array('code' => 1);
	    }
		}

	}
	

	/*GET CUSTOMER BALANCE BY ID --Nengkhoiba*/
	
	function GetCustomerBalanceById($AccNo,$tableName)
	{
	    //data is retrive from this query
	    $sql=   "SELECT 
                DATE_FORMAT(transaction_footer.Added_on, '%d/%m/%Y') AS TransactionDate,
                transaction_header.Naration AS Particular,
                transaction_header.Tranction_id AS RefNo,
                transaction_header.Amount AS Amount,
                transaction_header.Closing AS balance,
                CASE WHEN transaction_header.Transaction_type='R' THEN transaction_footer.Amount ELSE '' END AS Diposit,
                CASE WHEN transaction_header.Transaction_type='P' THEN transaction_footer.Amount ELSE '' END AS Withdraw
                
                FROM transaction_footer 
                LEFT JOIN transaction_header ON transaction_footer.Voucher_no=transaction_header.Voucher_no
                WHERE 
                
                transaction_header.IsActive=1
                AND transaction_footer.IsActive=1
                AND transaction_footer.Ledger_type='CR'
                AND transaction_footer.Acc_no='$AccNo'
                ORDER BY transaction_footer.Added_on asc ";
	    $query = $this->db->query($sql);
	    return $query->result_array();
	}
	
	
	/*USER MASTER DATA ADD */
	function addUserModel(  $user_list,$user_name,$role_list)
	{
		$this->db->trans_begin();
	    $data = array(
	        'emp_id'	=>  $user_list,
	        'username'	=>  $user_name,
	        'role_id'	=>  $role_list,
	        'password'	=>  1,
	        'keycode'	=>  'jldsajdli2jsladj',
	        'IsActive'=>  1,
	    );
	    
	    $this->db->insert('emp_login', $data);
	    $lastID=$this->db->insert_id();
	    
	    if($this->db->trans_status() === FALSE)
	    {
	        $this->db->trans_rollback();
	        return array('code' => 0);
	    }
	    else
	    {
	        $this->db->trans_commit();
	        $this->addLog("Add new user", "Employee ID ".$user_list." is added as Role ID ".$role_list.".");
	        return array('code' => 1);
	    }
	}
	
	/*USER MASTER DATA UPDATE */
	function updateUserModel($userId,$user_list,$user_name,$role_list)
	{
		$this->db->trans_begin();
	    $data = array(
	        'emp_id'	=>  $user_list,
	        'username'	=>  $user_name,
	        'role_id'	=>  $role_list
	    );
	    $this->db->where('ID',$userId);
	    $this->db->update('emp_login',$data);
	    
	    if($this->db->trans_status() === FALSE)
	    {
	        $this->db->trans_rollback();
	        return array('code' => 0);
	    }
	    else
	    {
	        $this->db->trans_commit();
	        $this->addLog("Update existing userID $userId", "New username ".$user_name.", New RoleID ".$role_list."");
	        return array('code' => 1);
	    }
	}
	//DESIGNATION END HERE
	
	
	function GetUserTable()
	{
	    
	    $sql="SELECT emp.name as emp_id,role.Name as role_id, emp_login.username, emp_login.ID, emp_login.isActive as isActive FROM emp_login	        
	   		LEFT JOIN emp ON emp.ID  = emp_login.emp_id
            LEFT JOIN role ON role.ID  = emp_login.role_id";
	    $query = $this->db->query($sql);
	    
	    
	    return $query->result_array();
	}


	 function RemoveRecordByIdFromShgGroup($ArrIds)
	{

		foreach ($ArrIds as $id)
		{ 	    

			$this->db->where('ID', $id);
			$this->db->delete('group_customer_member');

		}
	}
	
	//USER ASSIGN CHECK START
	function CheckUserAssign($emp_id)
	{
	    $query = $this->db->get_where('emp_login', array('emp_id' => $emp_id));
	    return $query->result ();
	}
	//USER ASSIGN CHECK END

	function GetGroupDetails($id)  
	{  
	   //data is retrive from this query 
		$sql="SELECT shg_master.Group_name,
					shg_master.Group_code,
					shg_master.Address,
					shg_master.Area,
					shg_master.Member_count as max_member_count,

					count(group_customer_member.ID) as customer_count

					from shg_master

					LEFT JOIN group_customer_member ON group_customer_member.Group_id  = shg_master.ID

					WHERE shg_master.ID='$id'

		   		"; 
	    $query = $this->db->query($sql); 
	    return $query->result_array();  
	}
	
	
	//GET RO LIST
	function GetAllROList()
	{
	    $sql =  "SELECT em.ID,em.Name
                FROM emp_login user
                LEFT JOIN emp em on em.ID=user.emp_id
                WHERE user.IsActive=1 AND user.role_id = 2";
	    
	    $query=$this->db->query($sql);
	    
	    return $query->result_array();
	}
	
	
	//GET SHG MEMBER LIST BY GROUP CODE
	function GetAllSelectedMemberByGrpLoanAccNo($loan_acc_no_Grp)
	{
	    //data is retrive from this query
	    
	           $sql="SELECT customer.ID,
	   				customer.name,
	   				customer.aadhaar_no,
	   				customer.parmanent_address,
	   				customer.contact_no,
	   				customer_account.Acc_no,
	   				district.name AS district,
                    shg_master.Group_name,
                    loan_acc_relation.Loan_acc,
                    group_customer_member.ID AS group_id
		        FROM customer
		   		LEFT JOIN customer_account ON customer_account.Cus_id  = customer.ID
		   		LEFT JOIN group_customer_member ON  group_customer_member.Acc_no=customer_account.Acc_no
		   		LEFT JOIN district ON district.ID =customer.district
		   		LEFT JOIN shg_master ON shg_master.ID  = group_customer_member.Group_id
                LEFT JOIN loan_acc_relation ON loan_acc_relation.Acc_no  = group_customer_member.Acc_no
		   		LEFT JOIN loan_grp_relation ON loan_grp_relation.Group_ID  = group_customer_member.Group_id
		   		WHERE loan_grp_relation.isActive = 1 AND loan_grp_relation.Group_Loan_acc_no='$loan_acc_no_Grp'
		   		";
	    $query = $this->db->query($sql);
	    return $query->result_array();
	}
	
	
	//GET SHG DETAILS BY GROUP CODE
	function GetGroupDetailsByGrpLoanAccNo($loan_acc_no_Grp)
	{
	    //data is retrive from this query
	    
	        $sql="SELECT shg_master.ID,
                    shg_master.Group_name,
					shg_master.Group_code,
					shg_master.Address,
					shg_master.Area,
					shg_master.Member_count as max_member_count,
					shg_master.Member_count as max_member_count,
					count(group_customer_member.ID) as customer_count,
					loan_grp_relation.Group_Loan_acc_no
					from shg_master
					
					LEFT JOIN group_customer_member ON group_customer_member.Group_id  = shg_master.ID
					LEFT JOIN loan_grp_relation ON loan_grp_relation.Group_ID  = shg_master.ID
					WHERE loan_grp_relation.isActive = 1 AND loan_grp_relation.Group_Loan_acc_no='$loan_acc_no_Grp'
		   		";
	    
	    $query = $this->db->query($sql);
	    return $query->result_array();
	}
	
	/*GET MEMBER INFORMATION BY LOAN ACC NO  -- Written by William */
	function GetMemInfoByIndiLoanAccNo($loan_acc_no_Indi)
	{
	    $sql = "SELECT cus.ID as ID,cus.name as name,cus.Added_on as Added_on,dob,aadhaar_no,husband_name,parmanent_address,rural,
        urban,contact_no,bank_ac_no,bank_branch,work,nominee_name,nominee_aadhaar_no,nominee_permanent_address,
        nominee_rural,nominee_urban,nominee_district,nominee_contact_no, cusAcc.Acc_no as accNo,
        br.Name as branchName, br.Branch_address as Branch_address, br.Branch_code as Branch_code,
        accSt.ID as status, accSt.Name as accStatus, cusDoc.files as photo, genMas.Name as sex, dis.Name as district,
        nomiDis.Name as nominee_district,
        loanAccRel.Loan_acc_no as Loan_acc
        FROM customer cus
        LEFT JOIN customer_account acc on acc.Cus_ID=cus.ID
        LEFT JOIN branch br on br.ID=cus.Branch_id
        LEFT JOIN account_status accSt on accSt.ID=cus.status
        LEFT JOIN customer_document cusDoc on cusDoc.Cus_id=cus.ID
        LEFT JOIN gender_master genMas on genMas.ID=cus.sex
        LEFT JOIN district dis on dis.ID=cus.district
        LEFT JOIN district nomiDis on nomiDis.ID=cus.nominee_district
        LEFT JOIN customer_account cusAcc on cusAcc.Cus_id=cus.ID
        LEFT JOIN loan_app_details_relation loanAccRel on loanAccRel.Acc_no=acc.Acc_no
        WHERE loanAccRel.IsActive=1 
	    AND loanAccRel.Loan_acc_no='$loan_acc_no_Indi'
	    AND loanAccRel.Loan_status=5";
	    $query=$this->db->query($sql);
	    
	    return $query->result_array();
	}
	
	function AssignROGrpModel($loan_acc_no_Array,$ro_id,$grp_id,$grp_loan_acc_no)
	{
		$this->db->trans_begin();
	    foreach ($loan_acc_no_Array as $loan_acc_no)
	    {	        
	        $data = array(
	            'emp_id'	=>  $ro_id,
	            'loan_acc_no'	=>  $loan_acc_no,
	            'group_id' => $grp_id,
	            'group_loan_acc_no'	=>  $grp_loan_acc_no,
	            'Added_on' => date('Y-m-d H:i:s',now()),
	            'Added_by' => $GLOBALS['Added_by'],
	            'branch_id' => $GLOBALS['branch_id'],
	            'IsActive'=>  1,
	        );
	        
	        $this->db->insert('ro_assign', $data);
	        $lastID=$this->db->insert_id();
	        if($this->db->trans_status() === FALSE)
	        {
	        	$this->db->trans_rollback();
	        	return array('code' => 0);
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
	    	$this->addLog("Assign new RO", "Emp ID ".$ro_id." is assign to , Group ID ".$grp_id." and Group Loan Account No ".$grp_loan_acc_no." .");
	    	return array('code' => 1);
	    }
	}	
	
	function GetAssignROByGrpLoanAccNo($loan_acc_no_Grp)
	{
	   $sql =  "SELECT emp.Name, emp.address, ro_assign.Added_on, ro_assign.Added_by, added.Name as Added_by, ro_assign.ID as ID
                FROM ro_assign
                LEFT JOIN emp on emp.ID=ro_assign.emp_id
                LEFT JOIN emp added on added.ID=ro_assign.Added_by
                WHERE ro_assign.isActive=1 AND ro_assign.group_loan_acc_no = $loan_acc_no_Grp";	    
	    $query=$this->db->query($sql);
	    
// 	    $query = $this->db->get_where('ro_assign', array('group_loan_acc_no' => $loan_acc_no_Grp));
	    return $query->result_array();
	}
	
	function CheckAssignROGrp($ro_id,$grp_loan_acc_no)
	{
	    $query = $this->db->get_where('ro_assign', array('emp_id' => $ro_id,'group_loan_acc_no' => $grp_loan_acc_no));
	    return $query->result ();
	}
	
	function AssignROIndiModel($ro_id,$loan_acc_no)
	{
		$this->db->trans_begin();
	        $data = array(
	            'emp_id'	=>  $ro_id,
	            'loan_acc_no'	=>  $loan_acc_no,
	            'group_loan_acc_no'	=>  'N/A',
	            'group_id'	=>  'N/A',
	            'Added_on' => date('Y-m-d H:i:s',now()),
	            'Added_by' => $GLOBALS['Added_by'],
	            'branch_id' => $GLOBALS['branch_id'],
	            'IsActive'=>  1,
	        );
	        
	        $this->db->insert('ro_assign', $data);
	        $lastID=$this->db->insert_id();
	        
	        if($this->db->trans_status() === FALSE)
	        {
	            $this->db->trans_rollback();
	            return array('code' => 0);
	        }
	        else
	        {
	            $this->db->trans_commit();
	            $this->addLog("Assign new RO", "Emp ID ".$ro_id." is assign to Loan Acccount No ".$loan_acc_no.".");
	            return array('code' => 1);
	        }
	}
	
	function CheckAssignROIndi($ro_id,$loan_acc_no)
	{
	    $query = $this->db->get_where('ro_assign', array('emp_id' => $ro_id,'loan_acc_no' => $loan_acc_no,'group_loan_acc_no' => 'N/A','group_id' => 'N/A'));
	    return $query->result ();
	}
	
	function GetAssignROByLoanAccNo($loan_acc_no_Indi)
	{	    
	    $sql =  "SELECT emp.Name, emp.address, ro_assign.Added_on, ro_assign.Added_by, added.Name as Added_by, ro_assign.ID as ID
                FROM ro_assign
                LEFT JOIN emp on emp.ID=ro_assign.emp_id
                LEFT JOIN emp added on added.ID=ro_assign.Added_by
                WHERE ro_assign.isActive=1 AND ro_assign.group_loan_acc_no = 'N/A' AND ro_assign.group_id = 'N/A' AND ro_assign.loan_acc_no = '$loan_acc_no_Indi'";
	    $query=$this->db->query($sql);
	    
	    // 	    $query = $this->db->get_where('ro_assign', array('group_loan_acc_no' => $loan_acc_no_Grp));
	    return $query->result_array();
	}

	/*GET INDIVIDUAL INFORMATION BY ACC NO  -- Written by Rijay */
	function GetIndividualAccountInfo($individual_account_no)
	{
	    $sql = "SELECT cus.ID as ID,cus.name as name,cus.Added_on as Added_on,dob,aadhaar_no,husband_name,parmanent_address,rural,
        urban,contact_no,bank_ac_no,bank_branch,work,nominee_name,nominee_aadhaar_no,nominee_permanent_address,
        nominee_rural,nominee_urban,nominee_district,nominee_contact_no, cusAcc.Acc_no as accNo,
        br.Name as branchName, br.Branch_address as Branch_address, br.Branch_code as Branch_code,
        accSt.ID as status, accSt.Name as accStatus, cusDoc.files as photo, genMas.Name as sex, dis.Name as district,
        nomiDis.Name as nominee_district FROM customer cus
        LEFT JOIN customer_account acc on acc.Cus_ID=cus.ID
        LEFT JOIN branch br on br.ID=cus.Branch_id
        LEFT JOIN account_status accSt on accSt.ID=cus.status
        LEFT JOIN customer_document cusDoc on cusDoc.Cus_id=cus.ID
        LEFT JOIN gender_master genMas on genMas.ID=cus.sex
        LEFT JOIN district dis on dis.ID=cus.district
        LEFT JOIN district nomiDis on nomiDis.ID=cus.nominee_district
        LEFT JOIN customer_account cusAcc on cusAcc.Cus_id=cus.ID WHERE cus.IsActive=1 AND acc.Acc_no=$individual_account_no ";
	    $query=$this->db->query($sql);
	    return $query->result_array();
	}

		//GET Loan Type LIST
	function GetLoanTypeList()
	{
	    $sql =  "SELECT ID, Loan_name
                FROM loan_master
                WHERE IsActive=1";
	    
	    $query=$this->db->query($sql);
	    
	    return $query->result_array();
	}

	function GetLoanTypeDetialList($loan_type_id)
	{
		 $sql =  "SELECT 
		 loan_master.ID,
		 loan_master.Fine_type,
		 loan_master.Fine_value,
		 loan_master.Buffer_days,
		 loan_master.Loan_name, 
		 loan_master.Loan_pc, 
		 loan_master.Loan_pc_type as loan_pc_type,
		 loan_master.Tenure_type as loanmaster_tenure_type,
		 loan_master.Tenure_min,
		 loan_master.Tenure_max,
		 loan_master.Min_amount,
		 loan_master.Max_amount,
         loan_master.Loan_calculation_type,
		 loan_calculation_type.Name as Loan_calculation_type_name,
		 pc_type_master.ID as loan_pc_master_id,
		 pc_type_master.Name as pc_type_name, 
		 tenure_type_master.Name as tenure_type_name,
		 tenure_type_master.ID as tenure_type_master_id
    		FROM loan_master
    		LEFT JOIN pc_type_master
    		ON loan_master.Loan_pc_type = pc_type_master.ID
    		LEFT JOIN tenure_type_master
    		ON loan_master.Tenure_type= tenure_type_master.ID
            LEFT JOIN loan_calculation_type
    		ON loan_calculation_type.ID= loan_master.Loan_calculation_type
    
    		WHERE loan_master.ID='$loan_type_id'";
	    $query=$this->db->query($sql);
	    
	   return $query->result_array();



	}


	
	/* LOAN APPLICATION DATA ADD  -- Written by Riyaj */
	function addLoanAppDetails($account_number,$IsGroup,$loan_master_id,$loan_fine_type,$loan_fine_value,$loan_buffer_days,$loan_calculation_type,$loan_name,$loan_pc,$loan_pc_master_id,$tenure_type_master_id,$loanmaster_tenure_type,$tenure_length,$loan_purpose,$loan_amount,$loan_tenure_interval_type,$loan_tenure_interval_value)
	{
		$this->db->trans_begin();
		
		$grpAcc="";
		if($IsGroup=="1"){
			$grpAcc=$this->getLAN(1);
		}
		$loan_account_no=$this->getLAN(0);//1 for group and 0 for individual
		
	         $data = array(
	         	 'IsGroup'=>$IsGroup,
	         	 'Acc_no'=>  $account_number,
	         	 'Loan_acc_no'	=>  $loan_account_no ,
	         	 'Group_loan_acc_no'=>$grpAcc,
	         	 'Loan_master_id'=>  $loan_master_id,
	         	 'Fine_type'=>  $loan_fine_type,
	         	 'Fine_value'=>  $loan_fine_value,
	         	 'Buffer_days'=>  $loan_buffer_days,
	         	 'Loan_calculation_type'=>  $loan_calculation_type,
	         	 'Loan_name'=>  $loan_name,
	         	 'Loan_pc'=>  $loan_pc,
	         	 'Loan_pc_master_id'=>  $loan_pc_master_id,
	         	 'Tenure_type_master_id'=>  $tenure_type_master_id,
	         	 'loan_tenure_length'=>  $tenure_length,
	         	 'Loan_purpose'=>  $loan_purpose,
	         	 'Loan_amount'=>  $loan_amount,
	         	 'Loan_Tenure_interval_type'=>  $loan_tenure_interval_type,
	         	 'Loan_tenure_interval_value'=>  $loan_tenure_interval_value,
	         	 'Branch_id'=>$GLOBALS['branch_id'],
	         	'Added_by' =>$GLOBALS['Added_by'],
		    	'Added_on' =>$GLOBALS['NOW'],
		    	'Modified_by'=>$GLOBALS['Added_by'],
		    	'Modified_on'=>$GLOBALS['NOW'],
	         	 'IsActive'=>1
	         	 	
	         	 
	         );
	         
	    $this->db->insert('loan_app_details_relation', $data);
	    $lastID=$this->db->insert_id();	    
	   	
	    
	    
		if($this->db->trans_status() === FALSE)
		{
		    $this->db->trans_rollback();
			return array('code' => 0);			
		}
		else
		{
		    $this->db->trans_commit();
		    $this->addLog("Add new Loan application", "Loan Acount number ".$loan_account_no." is added.");
			return array('code' => 1);
		}
		
	}

	
	//loan recovery statement
	function GenerateLoan_statement($groupACC,$LAN,$principleAmount,$LoanPc,$loanPcType,$loanPayMentDate,$bufferDate,$FineType,$FineValue,$loanCalculationType,$loanTenure,$loanTenureType,$loanInterval,$loanIntervalType){
		$yearpc=0;
		switch ($loanPcType){
			case 1://PA
				$yearpc = $LoanPc/100;
				break;
			case 2://PM
				$yearpc = ($LoanPc/100)*12;
				break;
		}
		
		switch($loanIntervalType){
			case 1://days
				$interval="P".$loanInterval."D";
				$ratepc=($yearpc/365)*$loanInterval;
				switch($loanTenureType){
					case 1://days
						$time=ceil($loanTenure/$loanInterval);
						break;
					case 2: //week
						$loanTenure=$loanTenure*7;
						$time=ceil($loanTenure/$loanInterval);
						break;
					case 3: //month
						$loanTenure=$loanTenure*30;
						$time=ceil($loanTenure/$loanInterval);
						break;
					case 4: //year
						$loanTenure=$loanTenure*365;
						$time=ceil($loanTenure/$loanInterval);
						break;
				}
				break;
				
			case 2: //week
				$interval="P".$loanInterval."W";
				$ratepc=($yearpc/52.1429)*$loanInterval;
				switch($loanTenureType){
					case 1://days
						$time=ceil($loanTenure*7/$loanInterval);
						break;
					case 2: //week
						$time=ceil($loanTenure/$loanInterval);
						break;
					case 3: //month
						$loanTenure=$loanTenure*4.345;
						$time=ceil($loanTenure/$loanInterval);
						break;
					case 4: //year
						$loanTenure=$loanTenure*52.1429;
						$time=ceil($loanTenure/$loanInterval);
						break;
				}
				break;
			case 3: //month
				$interval="P".$loanInterval."M";
				$ratepc=($yearpc/12)*$loanInterval;
				switch($loanTenureType){
					case 1://days
						$time=ceil($loanTenure*30/$loanInterval);
						break;
					case 2: //week
						$loanTenure=$loanTenure*4.345;
						$time=ceil($loanTenure/$loanInterval);
						break;
					case 3: //month
						
						$time=ceil($loanTenure/$loanInterval);
						break;
					case 4: //year
						$loanTenure=$loanTenure*12;
						$time=ceil($loanTenure/$loanInterval);
						break;
				}
				break;
			case 4: //year
				$interval="P".$loanInterval."Y";
				$ratepc=($yearpc)*$loanInterval;
				switch($loanTenureType){
					case 1://days
						$time=ceil($loanTenure*365/$loanInterval);
						break;
					case 2: //week
						$loanTenure=$loanTenure*52.1429;
						$time=ceil($loanTenure/$loanInterval);
						break;
					case 3: //month
						$loanTenure=$loanTenure/12;
						$time=ceil($loanTenure/$loanInterval);
						break;
					case 4: //year
						$time=ceil($loanTenure/$loanInterval);
						break;
				}
				break;
		}
		
		if($loanCalculationType==1){
			$result=$this->getFlatEmi($principleAmount, $ratepc, $time, $loanPayMentDate, $interval);
		}else{
			$result=$this->getReducingEmi($principleAmount, $ratepc, $time, $loanPayMentDate, $interval);
		}
		
		return $result;
	}
	//calculate interval
	public function getNextInterval($date,$intValue){
		$date = new DateTime($date);
		$interval = new DateInterval($intValue);
		$date->add($interval);
		$nextInterval= $date->format('d-m-Y');
		return $nextInterval;
	}
	//calculate reducing emi
	public function getReducingEmi($principalAmount,$rate,$time,$date,$intValue){
		$x= pow(1+$rate,$time);
		$monthly = ($principalAmount*$x*$rate)/($x-1);
		$monthly = round($monthly);
		$mEmi=$monthly;
		$k= $time;
		$t=$principalAmount;
		$tl;
		$totalint=0;
		$tp=0;
		$sl=1;
		$emi= array();
		for($time;$time>0;$time--){
			$arr= array();
			$r = $t*$rate;
			$p = round($monthly-$r);
			$e= round($t-$p);
			if($time==2){
				$tl= $e;
			}
			if($time==1){
				$p= $tl;
				$e= round($t-$p);
				$monthly= round($p+$r);
			}
			$totalint = $totalint + $r;
			$tp = $tp+$monthly;
			$arr['sl']=$sl;
			$arr['date']=$date;
			$arr['interest']=round($r);
			$arr['opening']=$t;
			$arr['principal']=$p;
			$arr['emi']=$monthly;
			$arr['closing']=round($e);
			$emi[]=$arr;
			$date=$this->getNextInterval($date,$intValue);
			$t=$e;
			$sl++;
		}
		$output['principle']=round($principalAmount);
		$output['int']=round($rate);
		$output['totalInterest']=round($totalint);
		$output['totalWithprincipal']=round($tp);
		$output['emi']=round($mEmi);
		$output['details']=$emi;
		return $output;
	}
	//calculate flat emi
	public function getFlatEmi($principalAmount,$rate,$time,$date,$intValue){
		$interest=$principalAmount*$rate;
		$principalPaid=$principalAmount/$time;
	
		$monthly=$interest+$principalPaid;
	
		$mEmi=$monthly;
		$k= $time;
		$t=$principalAmount;
		$tl;
		$totalint=0;
		$tp=0;
		$sl=1;
		$emi= array();
		for($time;$time>0;$time--){
			$arr= array();
			$e=$t-$principalPaid;
			$totalint = $totalint + $interest;
			$tp = $tp+$monthly;
			$arr['sl']=$sl;
			$arr['date']=$date;
			$arr['interest']=round($interest);
			$arr['opening']=$t;
			$arr['principal']=$principalPaid;
			$arr['emi']=$monthly;
			$arr['closing']=round($e);
			$emi[]=$arr;
			$date=$this->getNextInterval($date,$intValue);
			$t=$e;
			$sl++;
		}
		$output['principle']=round($principalAmount);
		$output['int']=round($rate);
		$output['totalInterest']=round($totalint);
		$output['totalWithprincipal']=round($tp);
		$output['emi']=round($mEmi);
		$output['details']=$emi;
		return $output;
	}
	
	public function getLAN($isGroup){
		$LAN="";
		$sql="SELECT YEAR(NOW()) AS FinancialYear,MONTH(NOW()) AS FinancialMonth,DAY(NOW()) AS FinancialDay";
		$yearQuery=$this->db->query($sql);
		$yearResult=$yearQuery->result_array();
		$year=$yearResult[0]['FinancialYear'];
		$month=$yearResult[0]['FinancialMonth'];
		$day=$yearResult[0]['FinancialDay'];
		
		if($isGroup==1){
			$this->db->select('COUNT(ID) AS LoneeCount')
			->from('loan_app_details_relation')
			->where(array('IsGroup' => 1));
			$prefix="GLAN";
		}else{
			$this->db->select('COUNT(ID) AS LoneeCount')
			->from('loan_app_details_relation')
			->where(array('IsGroup' => 0));
			$prefix="LAN";
		}
		$query = $this->db->get();
		$Result=$query->result_array();
		$Count=$Result[0]['LoneeCount'];
		$LAN=$prefix.$year.$month.$day.($Count+1);
		return $LAN;
	}


	function Get_group_sanction_table_Record()
	{
		$sql =  "SELECT * FROM loan_app_details_relation WHERE IsActive='1' and IsGroup='0'";
	    $query=$this->db->query($sql);
	    return $query->result_array();
	}
	function Get_individual_sanction_table_Record()
	{
		$sql =  "SELECT 
				loan_app_details_relation.ID, 
				customer.Name as customer_name, 
				emp.Name as emp_name_approved_by, 
				loan_app_details_relation.Loan_acc_no, 
				loan_app_details_relation.Acc_no, 
				loan_app_details_relation.Loan_amount, 
				loan_app_details_relation.Loan_pc, 
				loan_app_details_relation.Added_on 
				FROM loan_app_details_relation
				LEFT JOIN emp on emp.ID = loan_app_details_relation.Added_by
				LEFT JOIN customer_account on customer_account.Acc_no = loan_app_details_relation.Acc_no
				LEFT JOIN customer on customer.ID = customer_account.Cus_id
				WHERE 
				loan_app_details_relation.IsActive='1' 
				AND loan_app_details_relation.IsGroup='0'
				AND loan_app_details_relation.Loan_status=3
				";
	    $query=$this->db->query($sql);
	    return $query->result_array();
	}

	function GetLoanSanctionInfoByIndiLoanAccNo($loan_app_id)
	{
	$sql =  "SELECT  customer.Name as customer_name, emp.Name as emp_name_approved_by, 
				loan_app_details_relation.ID,loan_app_details_relation.Loan_acc_no, loan_app_details_relation.Acc_no,
				loan_app_details_relation.Loan_tenure_length,
				loan_master.Loan_name as loan_name, 
				loan_app_details_relation.Loan_amount, loan_app_details_relation.Loan_pc, 
				tenure_type_master.Name as tenure_name,
				loan_app_details_relation.Added_on as approved_date,
				(select customer_document.files where customer_document.Doc_type = 1 and customer_document.Cus_id = customer_account.Cus_id) as customer_photo
				FROM loan_app_details_relation
				LEFT JOIN emp on emp.ID = loan_app_details_relation.Added_by
				LEFT JOIN loan_master on loan_master.ID = loan_app_details_relation.Loan_master_id              
				LEFT JOIN tenure_type_master on tenure_type_master.ID = loan_app_details_relation.Tenure_type_master_id                           

				LEFT JOIN customer_account on customer_account.Acc_no = loan_app_details_relation.Acc_no
				LEFT JOIN customer on customer.ID = customer_account.Cus_id
  				LEFT JOIN customer_document on customer_document.Cus_id = customer_account.Cus_id
   				LEFT JOIN document_type on document_type.ID = customer_document.doc_type
				WHERE loan_app_details_relation.IsActive='1' and loan_app_details_relation.IsGroup='0' AND loan_app_details_relation.ID='$loan_app_id' 
			";
	    $query=$this->db->query($sql);
	    return $query->result_array();

	}
	
	/*GET CUSTOMER DATA  -- Written by William */
	function GetCustomerRecordByAccNo($accNo,$tabName)
	{
	    $sql = "SELECT cus.ID as ID,cus.name as name,cus.Added_on as Added_on,dob,aadhaar_no,husband_name,parmanent_address,rural,
        urban,contact_no,bank_ac_no,bank_branch,work,nominee_name,nominee_aadhaar_no,nominee_permanent_address,
        nominee_rural,nominee_urban,nominee_district,nominee_contact_no, cusAcc.Acc_no as accNo,
        br.Name as branchName, br.Branch_address as Branch_address, br.Branch_code as Branch_code,
        accSt.ID as status, accSt.Name as accStatus, cusDoc.files as photo, genMas.Name as sex, dis.Name as district,
        nomiDis.Name as nominee_district FROM $tabName cus
        LEFT JOIN customer_account acc on acc.Cus_ID=cus.ID
        LEFT JOIN branch br on br.ID=cus.Branch_id
        LEFT JOIN account_status accSt on accSt.ID=cus.status
        LEFT JOIN customer_document cusDoc on cusDoc.Cus_id=cus.ID
        LEFT JOIN gender_master genMas on genMas.ID=cus.sex
        LEFT JOIN district dis on dis.ID=cus.district
        LEFT JOIN district nomiDis on nomiDis.ID=cus.nominee_district
        LEFT JOIN customer_account cusAcc on cusAcc.Cus_id=cus.ID WHERE acc.IsActive=1 AND acc.Acc_no=$accNo ";
	    $query=$this->db->query($sql);
	    
	    // 	      $query = $this->db->select('account_status.Name as accStatus, customer.*')
	    // 	      ->from('customer')
	    // 	      ->join('account_status', 'customer.status = account_status.ID', 'left')
	    // 	      ->where_in('customer.isActive', 1)
	    // 	      ->where_in('customer.ID', $id);
	    
	    return $query->result_array();
	}
	
	function GetCustomerDocByAccNo($accNo)
	{
	    $sql =  "SELECT cusDoc.Cus_id as ID, docType.name as doc_type, cusDoc.file_type as file_type, cusDoc.Added_by as Added_by, cusDoc.Added_on as Added_on, cusDoc.files as files
                FROM customer_document cusDoc
                LEFT JOIN customer cus on cus.ID=cusDoc.Cus_id
                LEFT JOIN document_type docType on docType.ID=cusDoc.doc_type
                LEFT JOIN customer_account cusAcc on cusAcc.Cus_id=cusDoc.Cus_id
                WHERE cusAcc.IsActive=1 AND cusAcc.Acc_no = $accNo ";
	    $query=$this->db->query($sql);
	    
	    return $query->result_array();
	}
	
	function GetLoanHistoryByAccNo($accNo)
	{
	    $sql =  "SELECT *
                FROM loan_app_details_relation LoanApp
                WHERE LoanApp.IsActive=1 AND LoanApp.Acc_no = $accNo ";
	    $query=$this->db->query($sql);
	    
	    return $query->result_array();
	}

	function updateLoanAppDetails($loan_app_id,$payment_mode,$cheque_no)
	{
			$this->db->trans_begin();

			$data=array('Payment_type'=>$payment_mode,
						'Cheque_no'=>$cheque_no,
						'Loan_status'=>5
						);

			$this->db->where('Loan_acc_no',$loan_app_id);
			$this->db->update('loan_app_details_relation',$data);
			
			$isGroup=0; //1 for group and 0 for individual
			$LoanPaymentStartdate="01-09-2018";
			
			
			
			if($this->db->trans_status() === FALSE)
			{
				$this->db->trans_rollback();
				return array('code' => 0);
			}
			else
			{
				$result=$this->generateAndSaveLoanStatement($isGroup, $loan_app_id, $LoanPaymentStartdate);
				if($result==1){
					$this->db->trans_commit();
					$this->addLog("Loan Sanction", "Loan Sanction for ".$loan_app_id."");
					return array('code' => 1);
				}else{
					$this->db->trans_rollback();
					return array('code' => 0);
				}
				
			}
	}
	private function generateAndSaveLoanStatement($isGroup,$LAN,$LoanPaymentStartdate){
		
		if($isGroup==1){
			
		}else{
			
			$IndividualInfo=$this->GetDetailsForIndividualLoanAccNo($LAN);
			$result=$this->GenerateLoan_statement("",$LAN,
					$IndividualInfo[0]['Loan_amount'],
					$IndividualInfo[0]['Loan_pc'],
					$IndividualInfo[0]['Loan_pc_master_id'],
					$LoanPaymentStartdate,
					$IndividualInfo[0]['Buffer_days'],
					$IndividualInfo[0]['Fine_type'],
					$IndividualInfo[0]['Fine_value'],
					$IndividualInfo[0]['Loan_calculation_type'],
					$IndividualInfo[0]['loan_tenure_length'],
					$IndividualInfo[0]['Tenure_type_master_id'],
					$IndividualInfo[0]['Loan_tenure_interval_value'],
					$IndividualInfo[0]['Loan_Tenure_interval_type']);
			
			$insertData=array();
			foreach($result['details'] AS $row){
				$singleRow=array();
				$singleRow['Grp_acc']="";
				$singleRow['IsGroup']=0;
				$singleRow['LAN']=$LAN;
				$singleRow['Opening']=$row['opening'];
				$singleRow['Interest']=$row['interest'];
				$singleRow['Principle']=$row['principal'];
				$singleRow['Emi']=$row['emi'];
				$singleRow['Closing']=$row['closing'];
				$singleRow['Payment_date']=date("Y-m-d", strtotime($row['date']));
				$interval="P".$IndividualInfo[0]['Buffer_days']."D";
				$date = new DateTime($row['date']);
				$date->add(new DateInterval($interval));
				$BufferDate = $date->format('Y-m-d');
				$singleRow['Buffer_date']=$BufferDate;
				
				$singleRow['Added_by']=$GLOBALS['Added_by'];
				$singleRow['Added_on']=$GLOBALS['NOW'];
				$singleRow['Modified_on']=$GLOBALS['NOW'];
				$singleRow['Modified_by']=$GLOBALS['Added_by'];
				$singleRow['IsActive']=1;
				$insertData[]=$singleRow;
				
			}
			$this->db->insert_batch('loan_recovery_statement',$insertData);
			
			if($this->db->trans_status() === FALSE)
			{
				$this->db->trans_rollback();
				return 0;
			}
			else
			{
				return 1;
			}
		}
		
		
	}
	
	private function GetDetailsForIndividualLoanAccNo($LAN){
		$sql="SELECT 
				Acc_no,
				Loan_master_id,
				Fine_type,
				Fine_value,
				Buffer_days,
				Loan_calculation_type,
				Loan_name,
				Loan_pc,
				Loan_pc_master_id,
				Tenure_type_master_id,
				loan_tenure_length,
				Loan_purpose,
				Loan_amount,
				Loan_Tenure_interval_type,
				Loan_tenure_interval_value
				
				FROM loan_app_details_relation WHERE 
				Loan_acc_no='$LAN'
				AND IsActive=1
				";
		$query=$this->db->query($sql);
		return $query->result_array();	
	}
	
	private function GetDetailsForGroupLan($grpLan){
		$sql="SELECT
		Loan_acc_no,
		Acc_no,
		Loan_master_id,
		Fine_type,
		Fine_value,
		Buffer_days,
		Loan_calculation_type,
		Loan_name,
		Loan_pc,
		Loan_pc_master_id,
		Tenure_type_master_id,
		loan_tenure_length,
		Loan_purpose,
		Loan_amount,
		Loan_Tenure_interval_type,
		Loan_tenure_interval_value
		
		FROM loan_app_details_relation WHERE
		Group_loan_acc_no='$grpLan'
		AND IsGroup=1
		AND IsActive=1
		";
		$query=$this->db->query($sql);
		return $query->result_array();
	}



//Group Live Search from this query
    function loadGroupDataBySearchKeyword($q)
    {
       $branch_id = $GLOBALS['branch_id'];
       $sql="SELECT shg_master.ID AS group_id, shg_master.Group_name  AS group_name, shg_master.Group_code  AS group_code  FROM shg_master
            WHERE shg_master.Group_name like '%$q%'
            OR shg_master.Group_code like '%$q%'
            AND shg_master.Branch_id='$branch_id'
            AND shg_master.IsActive='1'
           LIMIT 10
            ";
        $query=$this->db->query($sql);
        
        return $query->result_array();
    }

    /*GET GROUP DETAILS AND MEMBER DATA  -- Written by Riyaj */
	function GetGroupMemberBySearchKeyWord($accNo,$tabName)
	{
	    $sql = "SELECT cus.ID as ID,cus.name 
	    		as name,cus.Added_on 
	    		as Added_on,dob,aadhaar_no,husband_name,parmanent_address,rural,
       				 urban,contact_no,bank_ac_no,bank_branch,work,nominee_name,nominee_aadhaar_no,nominee_permanent_address,nominee_rural,nominee_urban,nominee_district,nominee_contact_no, cusAcc.Acc_no 
		        as accNo,br.Name 
        		as branchName, br.Branch_address as Branch_address, br.Branch_code as Branch_code,
        accSt.ID 
        		as status, accSt.Name 
        		as accStatus, cusDoc.files 
        		as photo, genMas.Name 
        		as sex, dis.Name 
        		as district,nomiDis.Name 
        		as nominee_district 
        		FROM $tabName cus
        LEFT JOIN customer_account acc on acc.Cus_ID=cus.ID
        LEFT JOIN branch br on br.ID=cus.Branch_id
        LEFT JOIN account_status accSt on accSt.ID=cus.status
        LEFT JOIN customer_document cusDoc on cusDoc.Cus_id=cus.ID
        LEFT JOIN gender_master genMas on genMas.ID=cus.sex
        LEFT JOIN district dis on dis.ID=cus.district
        LEFT JOIN district nomiDis on nomiDis.ID=cus.nominee_district
        LEFT JOIN customer_account cusAcc on cusAcc.Cus_id=cus.ID
        LEFT JOIN customer_account cusAcc on cusAcc.Cus_id=cus.ID 

        WHERE acc.IsActive=1 AND acc.Acc_no=$accNo ";
	    $query=$this->db->query($sql);
	    return $query->result_array();
	}
	
	
	function GetAllSelectedMemberForLoanDocUpload($id)
	{
	    //data is retrive from this query
	    $sql="  SELECT customer.ID,
   				customer.name,
   				customer.aadhaar_no,
   				customer.parmanent_address,
   				customer.contact_no,
   				customer_account.Acc_no,
   				district.name AS district,
                shg_master.Group_name,
                group_customer_member.ID AS group_id,
                loan_app_details_relation.Loan_acc_no,
                loan_app_details_relation.Loan_master_id
		        FROM customer
		        
		   		LEFT JOIN customer_account ON customer_account.Cus_id  = customer.ID
		   		LEFT JOIN group_customer_member ON  group_customer_member.Acc_no=customer_account.Acc_no
		   		LEFT JOIN district ON district.ID =customer.district
		   		LEFT JOIN shg_master ON shg_master.ID  = group_customer_member.Group_id
                LEFT JOIN loan_app_details_relation  ON loan_app_details_relation.Acc_no  = customer_account.Acc_no
		   		
		   		WHERE group_customer_member.Group_id='$id'
		   		
		   		";
	    $query = $this->db->query($sql);
	    return $query->result_array();
	}
	
	/*GET CUSTOMER DATA  -- Written by William */
	function GetCustomerRecordByLAN($loan_acc_no,$tabName)
	{
	    $sql = "SELECT cus.ID as ID,cus.name as name,cus.Added_on as Added_on,dob,aadhaar_no,husband_name,parmanent_address,rural,
        urban,contact_no,bank_ac_no,bank_branch,work,nominee_name,nominee_aadhaar_no,nominee_permanent_address,
        nominee_rural,nominee_urban,nominee_district,nominee_contact_no, cusAcc.Acc_no as accNo,
        br.Name as branchName, br.Branch_address as Branch_address, br.Branch_code as Branch_code,
        accSt.ID as status, accSt.Name as accStatus, cusDoc.files as photo, genMas.Name as sex, dis.Name as district,
        loan_app_details_relation.Loan_master_id as Loan_master_id, nomiDis.Name as nominee_district, loan_app_details_relation.Loan_acc_no as Loan_acc_no
        FROM $tabName cus
        LEFT JOIN customer_account acc on acc.Cus_ID=cus.ID
        LEFT JOIN branch br on br.ID=cus.Branch_id
        LEFT JOIN account_status accSt on accSt.ID=cus.status
        LEFT JOIN customer_document cusDoc on cusDoc.Cus_id=cus.ID
        LEFT JOIN gender_master genMas on genMas.ID=cus.sex
        LEFT JOIN district dis on dis.ID=cus.district
        LEFT JOIN district nomiDis on nomiDis.ID=cus.nominee_district
        LEFT JOIN customer_account cusAcc on cusAcc.Cus_id=cus.ID
        LEFT JOIN loan_app_details_relation  ON loan_app_details_relation.Acc_no  = cusAcc.Acc_no
        WHERE loan_app_details_relation.IsActive=1 AND loan_app_details_relation.Loan_acc_no='$loan_acc_no' ";
	    
	    $query=$this->db->query($sql);
	    
	    return $query->result_array();
	}
	
	
	function GetDocRecordByLAN($loan_acc_no)
	{
	    $sql =  "SELECT loanDoc.ID as ID, loanDocType.name as doc_type, loanDoc.file_type as file_type,  loanDoc.Remark, emp.Name as Added_by, loanDoc.Added_on as Added_on, loanDoc.files as files
                FROM loan_document loanDoc
                LEFT JOIN loan_document_type loanDocType on loanDocType.ID=loanDoc.doc_type
                LEFT JOIN emp on emp.ID=loanDoc.Added_by
                WHERE loanDoc.IsActive=1 AND loanDoc.loan_acc_no = '$loan_acc_no'";
	    $query=$this->db->query($sql);
	    
	    return $query->result_array();
	} 

	
	//Loan master live search from this query
	function loadLoanMasterDataBySearchKeyword($q)
	{
	    $branch_id = $GLOBALS['branch_id'];
	    $sql="SELECT ID,Loan_name FROM loan_master
            WHERE Loan_name like '%$q%'
            OR ID like '%$q%'
            AND Branch_id='$branch_id'
            AND IsActive='1'
           LIMIT 10
            ";
	    $query=$this->db->query($sql);
	    
	    return $query->result_array();
	}
	
	function getLoanMasterDocType($loan_type_id)
	{
	    $sql =  "SELECT loan_document_type.Name, loan_document_type.Added_on, loan_document_type.ID, emp.Name as Added_by, loan_document_type.Loan_master_id
                FROM loan_document_type
                LEFT JOIN emp on emp.ID=loan_document_type.Added_by
                WHERE loan_document_type.IsActive=1 AND loan_document_type.Loan_master_id = $loan_type_id";
	    
	    $query=$this->db->query($sql);
	    
	    return $query->result_array();
	}
	
	/*LOAN MASTER DOCUMENT TYPE DATA ADD */
	function addLoanDocTypeModel($loan_type, $document_type )
	{
	    $this->db->trans_begin();
	    $data = array(
	        'Name'	=>  $document_type,
	        'Loan_master_id'	=>  $loan_type,
	        'Added_by' =>$GLOBALS['Added_by'],
	        'Added_on' =>$GLOBALS['NOW'],
	        'Modified_by'=>$GLOBALS['Added_by'],
	        'Modified_on'=>$GLOBALS['NOW'],
	        'IsActive'=>  1,
	    );
	    
	    $this->db->insert('loan_document_type', $data);
	    $lastID=$this->db->insert_id();
	    
	    if($this->db->trans_status() === FALSE)
	    {
	        $this->db->trans_rollback();
	        return array('code' => 0);
	    }
	    else
	    {
	        $this->db->trans_commit();
	        $this->addLog("Add new loan document type", "Document type ".$document_type." is added to loan master ID ".$loan_type.".");
	        return array('code' => 1);
	    }
	}
	
	/*LOAN MASTER DOCUMENT TYPE DATA UPDATE */
	function updateLoanDocTypeModel($loan_type, $document_type,  $loan_doc_type_id)
	{
	    $this->db->trans_begin();
	    $data = array(
	        'Name'	=>  $document_type,
	        'Loan_master_id'	=>  $loan_type,
	        'Modified_by'=>$GLOBALS['Added_by'],
	        'Modified_on'=>$GLOBALS['NOW'],
	    );
	    $this->db->where('ID',$loan_doc_type_id);
	    $this->db->update('loan_document_type',$data);
	    
	    if($this->db->trans_status() === FALSE)
	    {
	        $this->db->trans_rollback();
	        return array('code' => 0);
	    }
	    else
	    {
	        $this->db->trans_commit();
	        $this->addLog("Update existing loan document type", "New document type is ".$document_type." in loan master ID ".$loan_type.".");
	        return array('code' => 1);
	    }
	}
	//LOAN MASTER DOCUMENT TYPE DATA UPDATE END HERE
	
	
	
	//LOAD LOAN VERIFIED TABLE START HERE//
	function GetVerifiedGrpLoanRecord()
	{
	    $sql =  "SELECT *
                FROM loan_app_details_relation
                WHERE IsActive=1 AND IsGroup=1 GROUP BY Group_id";
	    
	    $query=$this->db->query($sql);
	    
	    return $query->result_array();
	}
	
	/*CUSTOMER LOAN DOCUMENT DATA ADD  -- Written by William */
	function addCustomerLoanDoc($loan_acc_no, $customer_loan_doc_type,$customer_loan_doc_remark,$file)
	{
	    $this->db->trans_begin();
	    $file_extension = explode(':', substr($file, 0, strpos($file, ';')))[1];
	    $data = array(
	        'loan_acc_no'	=>  $loan_acc_no,
	        'doc_type'	=>  $customer_loan_doc_type,
	        'Remark' => $customer_loan_doc_remark,
	        'file_type'	=>  $file_extension,
	        'files'=>  $file,
	        'Added_by' =>$GLOBALS['Added_by'],
	        'Added_on' =>$GLOBALS['NOW'],
	        'Modified_by'=>$GLOBALS['Added_by'],
	        'Modified_on'=>$GLOBALS['NOW'],
	        'IsActive'=>  1
	    );
	    
	    $this->db->insert('loan_document', $data);
	    $lastID=$this->db->insert_id();
	    
	    if($this->db->trans_status() === FALSE)
	    {
	        $this->db->trans_rollback();
	        return array('code' => 0);
	    }
	    else
	    {
	        $this->db->trans_commit();
	        $this->addLog("Add new Customer loan document", "Loan Acc no ".$loan_acc_no." and document type ID ".$customer_loan_doc_type." is added.");
	        return array('code' => 1);
	    }
	}
	
	function CheckLoanDocument($docTypeVal,$loan_acc_no)
	{
	    $query = $this->db->get_where('loan_document', array('loan_acc_no' => $loan_acc_no,'doc_type' => $docTypeVal,'IsActive' => '1'));
	    return $query->result ();
	}
	
	
	function RemoveSingleRecordById($Id,$tblName)
	{
	    $this->db->trans_begin();
	        $this->db->set('IsActive', 0);  //Set the column name and which value to set..
	        $this->db->where('ID', $Id); //set column_name and value in which row need to update
	        $this->db->update($tblName); //Set your table name
	        if($this->db->trans_status() === FALSE)
	        {
	            $this->db->trans_rollback();
	            return array('code' => 0);
	        }
	    if($this->db->trans_status() === FALSE)
	    {
	        $this->db->trans_rollback();
	        return array('code' => 0);
	    }
	    else
	    {
	        $this->db->trans_commit();
	        $this->addLog("Soft delete Record From ".$tblName, "record deleted with ID ".$Id."");
	        return array('code' => 1);
	    }
	}
	
	//LOAD LOAN VERIFIED TABLE START HERE//
	function GetVerifiedIndiLoanRecord()
	{
	    $sql =  "SELECT customer.name as Name, customer_account.Acc_no as Acc_no, loan_app_details_relation.Loan_acc_no, loan_app_details_relation.Loan_name, loan_app_details_relation.Loan_master_id 
                FROM loan_app_details_relation
                LEFT JOIN customer_account on customer_account.Acc_no = loan_app_details_relation.Acc_no
                LEFT JOIN customer on customer.ID = customer_account.Cus_id
                WHERE loan_app_details_relation.IsActive=1 AND loan_app_details_relation.IsGroup=0";
	    
	    $query=$this->db->query($sql);
	    
	    return $query->result_array();
	}

}
    
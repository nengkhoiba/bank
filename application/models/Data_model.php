<?php
class Data_model extends CI_Model{
	
// COMMON CODE Start HERE

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
	    $query = $this->db->get_where($tabName, array('isActive' => 1)); 
	    return $query->result_array();  
	} 
	function GetRecordById($id,$tabName)  
    { 
         $query = $this->db->get_where($tabName, array('ID' => $id,'isActive' => 1)); 
         return $query->result_array();  
    }
    function RemoveRecordById($ArrIds,$tblName)
	{ 
		foreach ($ArrIds as $id)
		{ 	    
			$this->db->set('isActive', 0);  //Set the column name and which value to set..
			$this->db->where('ID', $id); //set column_name and value in which row need to update
			$this->db->update($tblName); //Set your table name
		}
	}

// COMMON CODE END HERE

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
	             'isActive'=>  1,
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
	
	/* Role Page Manager*/
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
    
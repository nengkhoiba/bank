<?php
class Data_model extends CI_Model{
	
// COMMON CODE Start HERE

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

	function addEmpModel( $employee_name, $employee_address, $employee_district, $employee_pincode, $employee_designation, $employee_gender, $employee_dob, $employee_qualification, $employee_martial_status, $fileName )
	{
	         $data = array(
	             'name'	=>  $employee_name ,
	             'address'=>  $employee_address,
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
	         
	    $query = $this->db->insert('emp', $data);
	    		
		if($query)
		{
			return array('code' => 1);
			
		}else
		{
			return array('code' => 0);
		}
	}
	function updateEmpModel($emp_id, $employee_name, $employee_address, $employee_district, $employee_pincode, $employee_designation, $employee_gender, $employee_dob, $employee_qualification, $employee_martial_status, $fileName, $previous_emp_image)
	{ 
	    if($fileName == '') 
	    {
	        $data = array(
	            'name'	=>  $employee_name ,
	            'address'=>  $employee_address,
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
	   $query = $this->db->update('emp',$data);
		
		if($query)
		{
			return array('code' => 1);
		}else
		{
			return array('code' => 0);
		}
	}
	

}
    
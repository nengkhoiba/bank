<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_controller extends CI_Controller {

	function __construct()
    {
    	parent::__construct();
    	$this->load->model('data_model', 'database');
    	$this->load->library ( 'form_validation' );
    	$this->load->helper ( 'security' );
    }
	
	public function index()
	{  
		$this->load->view('login');
	}
	public function loadEmp()
	{ 	
		try {
			$data['result']=$this->database->GetAllActiveRecord('emp');  
			$output = array(
	        'html'=>$this->load->view('datafragment/Emp_table',$data, true),
	        'success' =>true
	    	);
		} catch (Exception $ex) {
            $output = array(
	        'msg'=> $ex->getMessage(),
	        'success' => false
	    	);
        }
    	 echo json_encode($output);
	}


	public function loadRole()
	{ 	
		try {
			$data['result']=$this->database->GetAllActiveRecord('role');  
			$output = array(
	        'html'=>$this->load->view('datafragment/Role_table',$data, true),
	        'success' =>true
	    	);
		} catch (Exception $ex) {
            $output = array(
	        'msg'=> $ex->getMessage(),
	        'success' => false
	    	);
        }
    	 echo json_encode($output);
	}
	

	public function addEmp() 
	{    
	  $_POST = json_decode(trim(file_get_contents('php://input')), true);	
	  $errorMSG ='';
	try {
		/* name validation */
		if (empty($_POST["employee_name"])) {
		    $errorMSG = " Name is required";
		}
		/* address validation */
		elseif (empty($_POST["employee_address"])) {
		    $errorMSG .= " Address is required";
		} 
		/* district validation */
		elseif (empty($_POST["employee_district"])) {
		    $errorMSG .= " District is required";
		}
		/* pincode validation */
		elseif (empty($_POST["employee_pincode"])) {
		    $errorMSG .= " Pincode is required";
		}
		/* designation validation */
		elseif (empty($_POST["employee_designation"])) {
		    $errorMSG .= " Designation is required";
		}
		/* gender validation */
		elseif (empty($_POST["employee_gender"])) {
		    $errorMSG .= " Gender is required";
		}
		/* date of birth validation */
		elseif (empty($_POST["employee_dob"])) {
		    $errorMSG .= " Date of Birth is required";
		}
		/* qualification validation */
		elseif (empty($_POST["employee_qualification"])) {
		    $errorMSG .= " Qualification is required";
		}
		/* martial status validation */
		elseif (empty($_POST["employee_martial_status"])) {
		    $errorMSG .= " Martial Status is required";
		}
		/* image validation */
		elseif (empty($_POST["fileUpload"])) {
		    $errorMSG .= " Image is required";
		}
		
		   
		$status = array("success"=>false,"msg"=>$errorMSG);
		if(empty($errorMSG)){
		    
		    $employee_name = $this->db->escape_str ( trim ( $_POST ['employee_name'] ) );
		    $employee_address = $this->db->escape_str ( trim ( $_POST ['employee_address'] ) );
		    $employee_district = $this->db->escape_str ( trim ( $_POST ['employee_district'] ) );
		    $employee_pincode = $this->db->escape_str ( trim ( $_POST ['employee_pincode'] ) );
		    $employee_designation = $this->db->escape_str ( trim ( $_POST ['employee_designation'] ) );
		    $employee_gender = $this->db->escape_str ( trim ( $_POST ['employee_gender'] ) );
		    $employee_dob = $this->db->escape_str ( trim ( $_POST ['employee_dob'] ) );
		    $employee_qualification = $this->db->escape_str ( trim ( $_POST ['employee_qualification'] ) );
		    $employee_martial_status = $this->db->escape_str ( trim ( $_POST ['employee_martial_status'] ) );
		    
		    $fileName = sanitize_filename ( $_POST ['fileUploadName'] );
		    $file = $this->db->escape_str ( trim ( $_POST ['fileUpload'] ) );
		    $file = urldecode ( $file );
		    $file = str_replace ( 'data:image/png;base64,', '', $file );
		    $file = str_replace ( 'data:image/jpeg;base64,', '', $file );
		    $file = str_replace ( 'data:image/jpg;base64,', '', $file );
		    $file = str_replace ( ' ', '+', $file );
		    $file = base64_decode ( $file );
		    $fileName = time() . '_' . $fileName;
		    
		    $ouputDir = "assets/upload/employee/";
		    file_put_contents ( $ouputDir . $fileName, $file );
		    
		    $result = $this->database->addEmpModel( $employee_name, $employee_address, $employee_district, $employee_pincode, $employee_designation, $employee_gender, $employee_dob, $employee_qualification, $employee_martial_status, $fileName );
			if($result['code'] == 1){
			  $status = array("success" => true,"msg" => "Save sucessfull!"); 
			}else{
			  $status = array("success" => false,"msg" => "Fail to save !!!"); 
			}
		}
        } catch (Exception $ex) {
            $status = array("success" => false,"msg" => $ex->getMessage());
        }

	  echo json_encode($status) ; 
	 }
	 public function RemoveEmp()
	{ 		
		try {
			$IdsArray = json_decode($_POST['dataArr'], TRUE);

				$this->database->RemoveRecordById($IdsArray,'emp');
				$output = array('success' =>true, 'msg'=> "Deleted sucessfull");

		} catch (Exception $ex) {
            $output = array(
	        'msg'=> $ex->getMessage(),
	        'success' => false
	    	);
        }
    	 echo json_encode($output);
	}
	public function AddEmpform()
	{
	    try {
	                 $data['result'] = '';
	                 $output = array(
	                     'html'=>$this->load->view('datafragment/Emp_addForm',$data, true),
	                'success' =>true
	            );
	        
	    } catch (Exception $ex) {
	        $output = array(
	            'msg'=> $ex->getMessage(),
	            'success' => false
	        );
	    }
	    echo json_encode($output);
	}

	public function AddRoleform()
	{
	    try {
	                 $data['result'] = '';
	                 $output = array(
	                     'html'=>$this->load->view('datafragment/Role_addForm',$data, true),
	                'success' =>true
	            );
	        
	    } catch (Exception $ex) {
	        $output = array(
	            'msg'=> $ex->getMessage(),
	            'success' => false
	        );
	    }
	    echo json_encode($output);
	}

	public function EditEmp()
	{ 	
		try {
			$Id =  $_POST['reqId'];
			if($Id == ''){
				$output = array(
			        'msg'=> 'Resquest Error !!!',
			        'success' =>false
	    		);
			}else{
				$data['result'] = $this->database->GetRecordById($Id,'emp'); 
				$output = array(
		        'html'=>$this->load->view('datafragment/Emp_updateForm',$data, true),
		        'success' =>true
		    	);
			}
		} catch (Exception $ex) {
            $output = array(
	        'msg'=> $ex->getMessage(),
	        'success' => false
	    	);
        }
    	 echo json_encode($output);
	}
	public function updateEmp() 
		{    
		  $_POST = json_decode(trim(file_get_contents('php://input')), true);	
		  $errorMSG ='';
		try {
		    /* name validation */
		if (empty($_POST["employee_name"])) {
		    $errorMSG = " Name is required";
		}
		/* address validation */
		elseif (empty($_POST["employee_address"])) {
		    $errorMSG .= " Address is required";
		} 
		/* district validation */
		elseif (empty($_POST["employee_district"])) {
		    $errorMSG .= " District is required";
		}
		/* pincode validation */
		elseif (empty($_POST["employee_pincode"])) {
		    $errorMSG .= " Pincode is required";
		}
		/* designation validation */
		elseif (empty($_POST["employee_designation"])) {
		    $errorMSG .= " Designation is required";
		}
		/* gender validation */
		elseif (empty($_POST["employee_gender"])) {
		    $errorMSG .= " Gender is required";
		}
		/* date of birth validation */
		elseif (empty($_POST["employee_dob"])) {
		    $errorMSG .= " Date of Birth is required";
		}
		/* qualification validation */
		elseif (empty($_POST["employee_qualification"])) {
		    $errorMSG .= " Qualification is required";
		}
		/* martial status validation */
		elseif (empty($_POST["employee_martial_status"])) {
		    $errorMSG .= " Martial Status is required";
		}
		
			
			$status = array("success"=>false,"msg"=>$errorMSG);
			if(empty($errorMSG)){	
			    
			    $emp_id = $this->db->escape_str ( trim ( $_POST ['emp_id'] ) );
			    $previous_emp_image = $this->db->escape_str ( trim ( $_POST ['previous_emp_image'] ) );
			    $employee_name = $this->db->escape_str ( trim ( $_POST ['employee_name'] ) );
			    $employee_address = $this->db->escape_str ( trim ( $_POST ['employee_address'] ) );
			    $employee_district = $this->db->escape_str ( trim ( $_POST ['employee_district'] ) );
			    $employee_pincode = $this->db->escape_str ( trim ( $_POST ['employee_pincode'] ) );
			    $employee_designation = $this->db->escape_str ( trim ( $_POST ['employee_designation'] ) );
			    $employee_gender = $this->db->escape_str ( trim ( $_POST ['employee_gender'] ) );
			    $employee_dob = $this->db->escape_str ( trim ( $_POST ['employee_dob'] ) );
			    $employee_qualification = $this->db->escape_str ( trim ( $_POST ['employee_qualification'] ) );
			    $employee_martial_status = $this->db->escape_str ( trim ( $_POST ['employee_martial_status'] ) );
			   
			if($_POST['fileUpload'] != null)
			    { 
			    $fileName = sanitize_filename ( $_POST ['fileUploadName'] );
			    $file = $this->db->escape_str ( trim ( $_POST ['fileUpload'] ) );
			    $file = urldecode ( $file );
			    $file = str_replace ( 'data:image/png;base64,', '', $file );
			    $file = str_replace ( 'data:image/jpeg;base64,', '', $file );
			    $file = str_replace ( 'data:image/jpg;base64,', '', $file );
			    $file = str_replace ( ' ', '+', $file );
			    $file = base64_decode ( $file );
			    $fileName = time() . '_' . $fileName;
			    
			    $ouputDir = "assets/upload/employee/";
			    file_put_contents ( $ouputDir . $fileName, $file );
			    }
			else
			    {
			        $fileName = '';
			    }
			    
			    $result = $this->database->updateEmpModel($emp_id, $employee_name, $employee_address, $employee_district, $employee_pincode, $employee_designation, $employee_gender, $employee_dob, $employee_qualification, $employee_martial_status, $fileName, $previous_emp_image);
				if($result['code'] == 1)
				{
				  $status = array("success" => true,"msg" => "Update sucessfull!"); 
				}
				else
				{
				  $status = array("success" => false,"msg" => "Fail to Update !!!"); 
				}
			}
	        } catch (Exception $ex) {
	            $status = array("success" => false,"msg" => $ex->getMessage());
	        }
	
		  echo json_encode($status) ; 
	}
		
}

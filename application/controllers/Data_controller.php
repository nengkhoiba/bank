<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_controller extends CI_Controller {

	function __construct()
    {
    	parent::__construct();
    	$this->load->model('Data_model', 'database');
    	$this->load->library ( 'form_validation' );
    	$this->load->helper ( 'security' );
    }
	
	public function index()
	{  
		$this->load->view('login');
	}
	
	
	public function loadCountry()
	{
	    try {
	        $data['result']=$this->database->GetAllRecord('countries');
	        $output = array(
	            'html'=>$this->load->view('datafragment/dropDown/Select_countryList',$data, true),
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
	
	public function loadState()
	{
	    try {
	        $Id =  $this->input->post('reqId',true);
	        if($Id == ''){
	            $output = array(
	                'msg'=> 'Resquest Error !!!',
	                'success' =>false
	            );
	        }else{
	            $data['result'] = $this->database->GetSelectListById($Id,'country_id','states');
	            $output = array(
	                'html'=>$this->load->view('datafragment/dropDown/Select_stateList',$data, true),
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
	
	public function loadCity()
	{
	    try {
	        $Id =  $this->input->post('reqId',true);
	        if($Id == ''){
	            $output = array(
	                'msg'=> 'Resquest Error !!!',
	                'success' =>false
	            );
	        }else{
	            $data['result'] = $this->database->GetSelectListById($Id,'state_id','cities');
	            $output = array(
	                'html'=>$this->load->view('datafragment/dropDown/Select_cityList',$data, true),
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
	
	
	public function loadEmp()
	{
	    try {
	        $data['result']=$this->database->GetAllActiveRecord('emp');
	        $output = array(
	            'html'=>$this->load->view('datafragment/dataTable/Emp_table',$data, true),
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
	
	public function AddEmpform()
	{
	    try {
	        $data['result'] = '';
	        $output = array(
	            'html'=>$this->load->view('datafragment/addForm/Emp_addForm',$data, true),
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
	        $Id =  $this->input->post('reqId',true);
	        if($Id == ''){
	            $output = array(
	                'msg'=> 'Resquest Error !!!',
	                'success' =>false
	            );
	        }else{
	            $data['result'] = $this->database->GetRecordById($Id,'emp');
	            $output = array(
	                'html'=>$this->load->view('datafragment/updateForm/Emp_updateForm',$data, true),
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
	
	public function addEmp()
	{
	    $_POST = json_decode(trim(file_get_contents('php://input')), true);
	    $errorMSG ='';
	    try {
	        /* name validation */
	        if (empty($this->input->post('employee_name',true))) {
	            $errorMSG = " Name is required";
	        }
	        /* address validation */
	        elseif (empty($this->input->post('employee_address',true))) {
	            $errorMSG .= " Address is required";
	        }
	        /* country validation */
	        elseif (empty($this->input->post('employee_country',true))) {
	            $errorMSG .= " Country is required";
	        }
	        /* state validation */
	        elseif (empty($this->input->post('employee_state',true))) {
	            $errorMSG .= " State is required";
	        }
	        /* city validation */
	        elseif (empty($this->input->post('employee_city',true))) {
	            $errorMSG .= " City is required";
	        }
	        /* district validation */
	        elseif (empty($this->input->post('employee_district',true))) {
	            $errorMSG .= " District is required";
	        }
	        /* pincode validation */
	        elseif (empty($this->input->post('employee_pincode',true))) {
	            $errorMSG .= " Pincode is required";
	        }
	        /* designation validation */
	        elseif (empty($this->input->post('employee_designation',true))) {
	            $errorMSG .= " Designation is required";
	        }
	        /* gender validation */
	        elseif (empty($this->input->post('employee_gender',true))) {
	            $errorMSG .= " Gender is required";
	        }
	        /* date of birth validation */
	        elseif (empty($this->input->post('employee_dob',true))) {
	            $errorMSG .= " Date of Birth is required";
	        }
	        /* qualification validation */
	        elseif (empty($this->input->post('employee_qualification',true))) {
	            $errorMSG .= " Qualification is required";
	        }
	        /* martial status validation */
	        elseif (empty($this->input->post('employee_martial_status',true))) {
	            $errorMSG .= " Martial Status is required";
	        }
	        /* Passport validation */
	        elseif (empty($this->input->post('fileUpload',true))) {
	            $errorMSG .= " Passport is required";
	        }
	        
	        $status = array("success"=>false,"msg"=>$errorMSG);
	        if(empty($errorMSG)){
	            
	            $employee_name = $this->db->escape_str ( trim ( $this->input->post('employee_name',true) ) );
	            $employee_address = $this->db->escape_str ( trim ( $this->input->post('employee_address',true) ) );
	            $employee_country = $this->db->escape_str ( trim ( $this->input->post('employee_country',true) ) );
	            $employee_state = $this->db->escape_str ( trim ( $this->input->post('employee_state',true) ) );
	            $employee_city = $this->db->escape_str ( trim ( $this->input->post('employee_city',true) ) );
	            $employee_district = $this->db->escape_str ( trim ( $this->input->post('employee_district',true) ) );
	            $employee_pincode = $this->db->escape_str ( trim ( $this->input->post('employee_pincode',true) ) );
	            $employee_designation = $this->db->escape_str ( trim ( $this->input->post('employee_designation',true) ) );
	            $employee_gender = $this->db->escape_str ( trim ( $this->input->post('employee_gender',true) ) );
	            $employee_dob = $this->db->escape_str ( trim ( $this->input->post('employee_dob',true) ) );
	            $employee_qualification = $this->db->escape_str ( trim ( $this->input->post('employee_qualification',true) ) );
	            $employee_martial_status = $this->db->escape_str ( trim ( $this->input->post('employee_martial_status',true) ) );
	            
	            $fileName = sanitize_filename ( $this->input->post('fileUploadName',true) );
	            $file = $this->db->escape_str ( trim ( $this->input->post('fileUpload',true) ) );
	            $file = urldecode ( $file );
	            $file = str_replace ( 'data:image/png;base64,', '', $file );
	            $file = str_replace ( 'data:image/jpeg;base64,', '', $file );
	            $file = str_replace ( 'data:image/jpg;base64,', '', $file );
	            $file = str_replace ( ' ', '+', $file );
	            $file = base64_decode ( $file );
	            $fileName = time() . '_' . $fileName;
	            
	            $ouputDir = "assets/upload/employee/";
	            file_put_contents ( $ouputDir . $fileName, $file );
	            
	            $result = $this->database->addEmpModel( $employee_name, $employee_address, $employee_country, $employee_state, $employee_city, $employee_district, $employee_pincode, $employee_designation, $employee_gender, $employee_dob, $employee_qualification, $employee_martial_status, $fileName );
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
	
	public function updateEmp()
	{
	    $_POST = json_decode(trim(file_get_contents('php://input')), true);
	    $errorMSG ='';
	    try {
	        /* name validation */
	        if (empty($this->input->post('employee_name',true))) {
	            $errorMSG = " Name is required";
	        }
	        /* address validation */
	        elseif (empty($this->input->post('employee_address',true))) {
	            $errorMSG .= " Address is required";
	        }
	        /* country validation */
	        elseif (empty($this->input->post('employee_country',true))) {
	            $errorMSG .= " Country is required";
	        }
	        /* state validation */
	        elseif (empty($this->input->post('employee_state',true))) {
	            $errorMSG .= " State is required";
	        }
	        /* city validation */
	        elseif (empty($this->input->post('employee_city',true))) {
	            $errorMSG .= " City is required";
	        }
	        /* district validation */
	        elseif (empty($this->input->post('employee_district',true))) {
	            $errorMSG .= " District is required";
	        }
	        /* pincode validation */
	        elseif (empty($this->input->post('employee_pincode',true))) {
	            $errorMSG .= " Pincode is required";
	        }
	        /* designation validation */
	        elseif (empty($this->input->post('employee_designation',true))) {
	            $errorMSG .= " Designation is required";
	        }
	        /* gender validation */
	        elseif (empty($this->input->post('employee_gender',true))) {
	            $errorMSG .= " Gender is required";
	        }
	        /* date of birth validation */
	        elseif (empty($this->input->post('employee_dob',true))) {
	            $errorMSG .= " Date of Birth is required";
	        }
	        /* qualification validation */
	        elseif (empty($this->input->post('employee_qualification',true))) {
	            $errorMSG .= " Qualification is required";
	        }
	        /* martial status validation */
	        elseif (empty($this->input->post('employee_martial_status',true))) {
	            $errorMSG .= " Martial Status is required";
	        }
	        
	        
	        $status = array("success"=>false,"msg"=>$errorMSG);
	        if(empty($errorMSG)){
	            
	            $emp_id = $this->db->escape_str ( trim ( $this->input->post('emp_id',true) ) );
	            $previous_emp_image = $this->db->escape_str ( trim ( $this->input->post('previous_emp_image',true) ) );
	            $employee_name = $this->db->escape_str ( trim ( $this->input->post('employee_name',true) ) );
	            $employee_address = $this->db->escape_str ( trim ( $this->input->post('employee_address',true) ) );
	            $employee_country = $this->db->escape_str ( trim ( $this->input->post('employee_country',true) ) );
	            $employee_state = $this->db->escape_str ( trim ( $this->input->post('employee_state',true) ) );
	            $employee_city = $this->db->escape_str ( trim ( $this->input->post('employee_city',true) ) );
	            $employee_district = $this->db->escape_str ( trim ( $this->input->post('employee_district',true) ) );
	            $employee_pincode = $this->db->escape_str ( trim ( $this->input->post('employee_pincode',true) ) );
	            $employee_designation = $this->db->escape_str ( trim ( $this->input->post('employee_designation',true) ) );
	            $employee_gender = $this->db->escape_str ( trim ( $this->input->post('employee_gender',true) ) );
	            $employee_dob = $this->db->escape_str ( trim ( $this->input->post('employee_dob',true) ) );
	            $employee_qualification = $this->db->escape_str ( trim ( $this->input->post('employee_qualification',true) ) );
	            $employee_martial_status = $this->db->escape_str ( trim ( $this->input->post('employee_martial_status',true) ) );
	            
	            if($this->input->post('fileUpload',true) != null)
	            {
	                $fileName = sanitize_filename ( $this->input->post('fileUploadName',true) );
	                $file = $this->db->escape_str ( trim ( $this->input->post('fileUpload',true) ) );
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
	            
	            $result = $this->database->updateEmpModel($emp_id, $employee_name, $employee_address, $employee_country, $employee_state, $employee_city, $employee_district, $employee_pincode, $employee_designation, $employee_gender, $employee_dob, $employee_qualification, $employee_martial_status, $fileName, $previous_emp_image);
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
		
	public function RemoveEmp()
	{
	    try {
	        $IdsArray = json_decode($this->input->post('dataArr',true), TRUE);
	        
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

    /*ROLE SECTION LOAD AND START HERE*/
	public function loadRole()
	{ 	
		try {
			$data['result']=$this->database->GetAllActiveRecord('role');  
			$output = array(
	        'html'=>$this->load->view('datafragment/dataTable/Role_table',$data, true),
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
	
	/*ROLE FORM LOAD*/
	public function AddRoleform()
	{
	    try {
	                 $data['result'] = '';
	                 $output = array(
	                 'html'=>$this->load->view('datafragment/addForm/Role_addForm',$data, true),
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
	
	/*ROLE EDIT SECTION*/
	public function EditRole()
	{
	    try {
	        $Id =  $this->input->post('reqId',true);
	        if($Id == ''){
	            $output = array(
	                'msg'=> 'Resquest Error !!!',
	                'success' =>false
	            );
	        }else{
	            $data['result'] = $this->database->GetRecordById($Id,'role');
	            $output = array(
	                'html'=>$this->load->view('datafragment/updateForm/Role_updateForm',$data, true),
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
	
	/*ROLE DATA ADD*/
	public function addRole()
	{
	    $_POST = json_decode(trim(file_get_contents('php://input')), true);
	    $errorMSG ='';
	    try {
	        /* role title validation */
	        if (empty($this->input->post('role_title',true))) {
	            $errorMSG = " Title is required";
	        }
	        
	        
	        $status = array("success"=>false,"msg"=>$errorMSG);
	        if(empty($errorMSG)){
	            
	            $role_title = $this->db->escape_str ( trim ( $this->input->post('role_title',true) ) );
	            
	            
	            $result = $this->database->addRoleModel( $role_title);
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
	
	/*ROLE UPDATE*/
	public function updateRole()
	{
	    $_POST = json_decode(trim(file_get_contents('php://input')), true);
	    $errorMSG ='';
	    try {
	        /* role title validation */
	        if (empty($this->input->post('role_title',true))) {
	            $errorMSG = " Title is required";
	        }
	        
	        
	        $status = array("success"=>false,"msg"=>$errorMSG);
	        if(empty($errorMSG)){
	            
	            $role_id = $this->db->escape_str ( trim ( $this->input->post('role_id',true) ) );
	            $role_title = $this->db->escape_str ( trim ( $this->input->post('role_title',true) ) );
	            
	            
	            
	            $result = $this->database->updateRoleModel($role_title, $role_id);
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
	
	/*ROLE DATA REMOVE*/
	public function RemoveRole()
	{
	    try {
	        $IdsArray = json_decode($this->input->post('dataArr',true), TRUE);
	        
	        $this->database->RemoveRecordById($IdsArray,'role');
	        $output = array('success' =>true, 'msg'=> "Deleted sucessfull");
	        
	    } catch (Exception $ex) {
	        $output = array(
	            'msg'=> $ex->getMessage(),
	            'success' => false
	        );
	    }
	    echo json_encode($output);
	}
	
	
	
	
	
	
	
	public function loadMem()
	{
	    try {
	        $data['result']=$this->database->GetAllActiveRecord('member');
	        $output = array(
	            'html'=>$this->load->view('datafragment/dataTable/Mem_table',$data, true),
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
	
	public function AddMemform()
	{
	    try {
	        $data['result'] = '';
	        $output = array(
	            'html'=>$this->load->view('datafragment/addForm/Mem_addForm',$data, true),
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
	
	public function EditMemForm()
	{
	    try {
	        $Id =  $this->input->post('reqId',true);
	        if($Id == ''){
	            $output = array(
	                'msg'=> 'Resquest Error !!!',
	                'success' =>false
	            );
	        }else{
	            $data['result'] = $this->database->GetRecordById($Id,'member');
	            $output = array(
	                'html'=>$this->load->view('datafragment/updateForm/Mem_updateForm',$data, true),
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
	
	public function addMem()
	{
	    $_POST = json_decode(trim(file_get_contents('php://input')), true);
	    $errorMSG ='';
	    try {
	        /* name validation */
	        if (empty($this->input->post('member_name',true))) {
	            $errorMSG = " Name is required";
	        }
	        /* dob validation */
	        if (empty($this->input->post('member_dob',true))) {
	            $errorMSG = " Date of Birth is required";
	        }
	        /* gender validation */
	        if (empty($this->input->post('member_gender',true))) {
	            $errorMSG = " Gender is required";
	        }
	        /* Aadhaar no. validation */
	        if (empty($this->input->post('member_aadhaar',true))) {
	            $errorMSG = " Aadhaar No. is required";
	        }
	        /* husband name validation */
	        if (empty($this->input->post('member_husband',true))) {
	            $errorMSG = " Husband name is required";
	        }
	        /* dob validation */
	        if (empty($this->input->post('member_dob',true))) {
	            $errorMSG = " Date of birth is required";
	        }
	        /* member address validation */
	        if (empty($this->input->post('member_address',true))) {
	            $errorMSG = " Member address is required";
	        }
	        /* member rural validation */
	        if (empty($this->input->post('member_rural',true))) {
	            $errorMSG = " Member rural is required";
	        }
	        /* member urban validation */
	        if (empty($this->input->post('member_urban',true))) {
	            $errorMSG = " Member urban is required";
	        }
	        /* member district validation */
	        if (empty($this->input->post('member_district',true))) {
	            $errorMSG = " Member district is required";
	        }
	        /* member dob validation */
	        if (empty($this->input->post('member_dob',true))) {
	            $errorMSG = " Date of birth is required";
	        }
	        /* member contact validation */
	        if (empty($this->input->post('member_contact',true))) {
	            $errorMSG = " Member contact no. is required";
	        }
	        /* member bank ac validation */
	        if (empty($this->input->post('member_bankaccount',true))) {
	            $errorMSG = " Member bank account no. is required";
	        }
	        /* member bank branch name validation */
	        if (empty($this->input->post('member_bankbranch',true))) {
	            $errorMSG = " Member bank branch name is required";
	        }
	        /* member work validation */
	        if (empty($this->input->post('member_work',true))) {
	            $errorMSG = " Member work is required";
	        }
	        /* nominee name validation */
	        if (empty($this->input->post('member_nominee',true))) {
	            $errorMSG = " Nominee name is required";
	        }
	        /* nominee aadhaar no. validation */
	        if (empty($this->input->post('member_nomineeaadhaar',true))) {
	            $errorMSG = " Aadhaar no. is required";
	        }
	        /* nominee address validation */
	        if (empty($this->input->post('member_nomineeaddress',true))) {
	            $errorMSG = " Nominee address is required";
	        }
	        /* nominee rural validation */
	        if (empty($this->input->post('member_nomineerural',true))) {
	            $errorMSG = " Nominee rural is required";
	        }
	        /* nominee urban validation */
	        if (empty($this->input->post('member_nomineeurban',true))) {
	            $errorMSG = " Nominee urban is required";
	        }
	        /* nominee district. validation */
	        if (empty($this->input->post('member_nomineedistrict',true))) {
	            $errorMSG = " Nominee district is required";
	        }
	        /* nominee contact validation */
	        if (empty($this->input->post('member_nomineecontact',true))) {
	            $errorMSG = " Nominee contact is required";
	        }
	        /* passport validation */
	        elseif (empty($this->input->post('fileUpload',true))) {
	            $errorMSG .= " Passport is required";
	        }
	              
	        
	        
	        $status = array("success"=>false,"msg"=>$errorMSG);
	        if(empty($errorMSG)){
	            
	            $member_name = $this->db->escape_str ( trim ( $this->input->post('member_name',true) ) );
	            $member_dob = $this->db->escape_str ( trim ( $this->input->post('member_dob',true) ) );
	            $member_gender = $this->db->escape_str ( trim ( $this->input->post('member_gender',true) ) );
	            $member_aadhaar = $this->db->escape_str ( trim ( $this->input->post('member_aadhaar',true) ) );
	            $member_husband = $this->db->escape_str ( trim ( $this->input->post('member_husband',true) ) );
	            $member_address = $this->db->escape_str ( trim ( $this->input->post('member_address',true) ) );
	            $member_rural = $this->db->escape_str ( trim ( $this->input->post('member_rural',true) ) );
	            $member_urban = $this->db->escape_str ( trim ( $this->input->post('member_urban',true) ) );
	            $member_district = $this->db->escape_str ( trim ( $this->input->post('member_district',true) ) );
	            $member_contact = $this->db->escape_str ( trim ( $this->input->post('member_contact',true) ) );
	            $member_bankaccount = $this->db->escape_str ( trim ( $this->input->post('member_bankaccount',true) ) );
	            $member_bankbranch = $this->db->escape_str ( trim ( $this->input->post('member_bankbranch',true) ) );
	            $member_work = $this->db->escape_str ( trim ( $this->input->post('member_work',true) ) );
	            $member_nominee = $this->db->escape_str ( trim ( $this->input->post('member_nominee',true) ) );
	            $member_nomineeaadhaar = $this->db->escape_str ( trim ( $this->input->post('member_nomineeaadhaar',true) ) );
	            $member_nomineeaddress = $this->db->escape_str ( trim ( $this->input->post('member_nomineeaddress',true) ) );
	            $member_nomineerural = $this->db->escape_str ( trim ( $this->input->post('member_nomineerural',true) ) );
	            $member_nomineeurban = $this->db->escape_str ( trim ( $this->input->post('member_nomineeurban',true) ) );
	            $member_nomineedistrict = $this->db->escape_str ( trim ( $this->input->post('member_nomineedistrict',true) ) );
	            $member_nomineecontact = $this->db->escape_str ( trim ( $this->input->post('member_nomineecontact',true) ) );
	            
	            if($this->input->post('fileUpload',true) != null)
	            {
	                $fileName = sanitize_filename ( $this->input->post('fileUploadName',true) );
	                $file = $this->db->escape_str ( trim ( $this->input->post('fileUpload',true) ) );
	                $file = urldecode ( $file );
	                $file = str_replace ( 'data:image/png;base64,', '', $file );
	                $file = str_replace ( 'data:image/jpeg;base64,', '', $file );
	                $file = str_replace ( 'data:image/jpg;base64,', '', $file );
	                $file = str_replace ( ' ', '+', $file );
	                $file = base64_decode ( $file );
	                $fileName = time() . '_' . $fileName;
	                
	                $ouputDir = "assets/upload/member/";
	                file_put_contents ( $ouputDir . $fileName, $file );
	            }
	            else
	            {
	                $fileName = '';
	            }
	            
	            $result = $this->database->addMemModel( $member_name, $member_dob, $member_gender, $member_aadhaar, $member_husband, $member_address, $member_rural, $member_urban, $member_district, $member_contact, $member_bankaccount, $member_bankbranch, $member_work, $member_nominee, $member_nomineeaadhaar, $member_nomineeaddress, $member_nomineerural, $member_nomineeurban, $member_nomineedistrict, $member_nomineecontact, $fileName);
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
	
	
	
	/*MEMBER UPDATE*/
	public function updateMem()
	{
	    $_POST = json_decode(trim(file_get_contents('php://input')), true);
	    $errorMSG ='';
	    try {
	        /* name validation */
	        if (empty($this->input->post('member_name',true))) {
	            $errorMSG = " Name is required";
	        }
	        /* dob validation */
	        if (empty($this->input->post('member_dob',true))) {
	            $errorMSG = " Date of Birth is required";
	        }
	        /* gender validation */
	        if (empty($this->input->post('member_gender',true))) {
	            $errorMSG = " Gender is required";
	        }
	        /* Aadhaar no. validation */
	        if (empty($this->input->post('member_aadhaar',true))) {
	            $errorMSG = " Aadhaar No. is required";
	        }
	        /* husband name validation */
	        if (empty($this->input->post('member_husband',true))) {
	            $errorMSG = " Husband name is required";
	        }
	        /* dob validation */
	        if (empty($this->input->post('member_dob',true))) {
	            $errorMSG = " Date of birth is required";
	        }
	        /* member address validation */
	        if (empty($this->input->post('member_address',true))) {
	            $errorMSG = " Member address is required";
	        }
	        /* member rural validation */
	        if (empty($this->input->post('member_rural',true))) {
	            $errorMSG = " Member rural is required";
	        }
	        /* member urban validation */
	        if (empty($this->input->post('member_urban',true))) {
	            $errorMSG = " Member urban is required";
	        }
	        /* member district validation */
	        if (empty($this->input->post('member_district',true))) {
	            $errorMSG = " Member district is required";
	        }
	        /* member dob validation */
	        if (empty($this->input->post('member_dob',true))) {
	            $errorMSG = " Date of birth is required";
	        }
	        /* member contact validation */
	        if (empty($this->input->post('member_contact',true))) {
	            $errorMSG = " Member contact no. is required";
	        }
	        /* member bank ac validation */
	        if (empty($this->input->post('member_bankaccount',true))) {
	            $errorMSG = " Member bank account no. is required";
	        }
	        /* member bank branch name validation */
	        if (empty($this->input->post('member_bankbranch',true))) {
	            $errorMSG = " Member bank branch name is required";
	        }
	        /* member work validation */
	        if (empty($this->input->post('member_work',true))) {
	            $errorMSG = " Member work is required";
	        }
	        /* nominee name validation */
	        if (empty($this->input->post('member_nominee',true))) {
	            $errorMSG = " Nominee name is required";
	        }
	        /* nominee aadhaar no. validation */
	        if (empty($this->input->post('member_nomineeaadhaar',true))) {
	            $errorMSG = " Aadhaar no. is required";
	        }
	        /* nominee address validation */
	        if (empty($this->input->post('member_nomineeaddress',true))) {
	            $errorMSG = " Nominee address is required";
	        }
	        /* nominee rural validation */
	        if (empty($this->input->post('member_nomineerural',true))) {
	            $errorMSG = " Nominee rural is required";
	        }
	        /* nominee urban validation */
	        if (empty($this->input->post('member_nomineeurban',true))) {
	            $errorMSG = " Nominee urban is required";
	        }
	        /* nominee district. validation */
	        if (empty($this->input->post('member_nomineedistrict',true))) {
	            $errorMSG = " Nominee district is required";
	        }
	        /* nominee contact validation */
	        if (empty($this->input->post('member_nomineecontact',true))) {
	            $errorMSG = " Nominee contact is required";
	        }
	        
	        
	        $status = array("success"=>false,"msg"=>$errorMSG);
	        if(empty($errorMSG)){
	            
	            $mem_id = $this->db->escape_str ( trim ( $this->input->post('mem_id',true) ) );
	            $previous_mem_image = $this->db->escape_str ( trim ( $this->input->post('previous_mem_image',true) ) );
	            $member_name = $this->db->escape_str ( trim ( $this->input->post('member_name',true) ) );
	            $member_dob = $this->db->escape_str ( trim ( $this->input->post('member_dob',true) ) );
	            $member_gender = $this->db->escape_str ( trim ( $this->input->post('member_gender',true) ) );
	            $member_aadhaar = $this->db->escape_str ( trim ( $this->input->post('member_aadhaar',true) ) );
	            $member_husband = $this->db->escape_str ( trim ( $this->input->post('member_husband',true) ) );
	            $member_address = $this->db->escape_str ( trim ( $this->input->post('member_address',true) ) );
	            $member_rural = $this->db->escape_str ( trim ( $this->input->post('member_rural',true) ) );
	            $member_urban = $this->db->escape_str ( trim ( $this->input->post('member_urban',true) ) );
	            $member_district = $this->db->escape_str ( trim ( $this->input->post('member_district',true) ) );
	            $member_contact = $this->db->escape_str ( trim ( $this->input->post('member_contact',true) ) );
	            $member_bankaccount = $this->db->escape_str ( trim ( $this->input->post('member_bankaccount',true) ) );
	            $member_bankbranch = $this->db->escape_str ( trim ( $this->input->post('member_bankbranch',true) ) );
	            $member_work = $this->db->escape_str ( trim ( $this->input->post('member_work',true) ) );
	            $member_nominee = $this->db->escape_str ( trim ( $this->input->post('member_nominee',true) ) );
	            $member_nomineeaadhaar = $this->db->escape_str ( trim ( $this->input->post('member_nomineeaadhaar',true) ) );
	            $member_nomineeaddress = $this->db->escape_str ( trim ( $this->input->post('member_nomineeaddress',true) ) );
	            $member_nomineerural = $this->db->escape_str ( trim ( $this->input->post('member_nomineerural',true) ) );
	            $member_nomineeurban = $this->db->escape_str ( trim ( $this->input->post('member_nomineeurban',true) ) );
	            $member_nomineedistrict = $this->db->escape_str ( trim ( $this->input->post('member_nomineedistrict',true) ) );
	            $member_nomineecontact = $this->db->escape_str ( trim ( $this->input->post('member_nomineecontact',true) ) );
	            
	            if($this->input->post('fileUpload',true) != null)
	            {
	                $fileName = sanitize_filename ( $this->input->post('fileUploadName',true) );
	                $file = $this->db->escape_str ( trim ( $this->input->post('fileUpload',true) ) );
	                $file = urldecode ( $file );
	                $file = str_replace ( 'data:image/png;base64,', '', $file );
	                $file = str_replace ( 'data:image/jpeg;base64,', '', $file );
	                $file = str_replace ( 'data:image/jpg;base64,', '', $file );
	                $file = str_replace ( ' ', '+', $file );
	                $file = base64_decode ( $file );
	                $fileName = time() . '_' . $fileName;
	                
	                $ouputDir = "assets/upload/member/";
	                file_put_contents ( $ouputDir . $fileName, $file );
	            }
	            else
	            {
	                $fileName = '';
	            }
	            
	            $result = $this->database->updateMemModel($mem_id, $member_name, $member_dob, $member_gender, $member_aadhaar, $member_husband, $member_address, $member_rural, $member_urban, $member_district, $member_contact, $member_bankaccount, $member_bankbranch, $member_work, $member_nominee, $member_nomineeaadhaar, $member_nomineeaddress, $member_nomineerural, $member_nomineeurban, $member_nomineedistrict, $member_nomineecontact, $fileName, $previous_mem_image);
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
	
	
	
	/*MEMBER DATA REMOVE*/
	public function RemoveMem()
	{
	    try {
	        $IdsArray = json_decode($this->input->post('dataArr',true), TRUE);
	        
	        $this->database->RemoveRecordById($IdsArray,'member');
	        $output = array('success' =>true, 'msg'=> "Deleted sucessfull");
	        
	    } catch (Exception $ex) {
	        $output = array(
	            'msg'=> $ex->getMessage(),
	            'success' => false
	        );
	    }
	    echo json_encode($output);
	}
	



	/*DESIGNATION SECTION LOAD*/
	public function loadDesign()
	{ 	
		try {
			$data['result']=$this->database->GetAllActiveRecord('designation');  
			$output = array(
	        'html'=>$this->load->view('datafragment/dataTable/Design_table',$data, true),
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
	
	/*DESIGNATION FORM LOAD*/
	public function AddDesignform()
	{
	    try {
	                 $data['result'] = '';
	                 $output = array(
	                 'html'=>$this->load->view('datafragment/addForm/Design_addForm',$data, true),
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
	
	/*DESIGNATION EDIT SECTION*/
	public function EditDesign()
	{
	    try {
	        $Id =  $this->input->post('reqId',true);
	        if($Id == ''){
	            $output = array(
	                'msg'=> 'Resquest Error !!!',
	                'success' =>false
	            );
	        }else{
	            $data['result'] = $this->database->GetRecordById($Id,'designation');
	            $output = array(
	                'html'=>$this->load->view('datafragment/updateForm/Design_updateForm',$data, true),
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
	
	/*DESIGNATION DATA ADD*/
	public function addDesign()
	{
	    $_POST = json_decode(trim(file_get_contents('php://input')), true);
	    $errorMSG ='';
	    try {
	        /* designation title validation */
	        if (empty($this->input->post('design_title',true))) {
	            $errorMSG = " Title is required";
	        }
			 /* designation title validation */
	        if (empty($this->input->post('design_description',true))) {
	            $errorMSG = " Description is required";
	        }
	        
	        
	        $status = array("success"=>false,"msg"=>$errorMSG);
	        if(empty($errorMSG)){
	            
	            $design_title = $this->db->escape_str ( trim ( $this->input->post('design_title',true) ) );
				$design_description = $this->db->escape_str ( trim ( $this->input->post('design_description',true) ) );
	            
	            
	            $result = $this->database->addDesignModel( $design_title,$design_description);
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
	
	/*DESIGNATION UPDATE*/
	public function updateDesign()
	{
	    $_POST = json_decode(trim(file_get_contents('php://input')), true);
	    $errorMSG ='';
	    try {
	        /* designation title validation */
	        if (empty($this->input->post('design_title',true))) {
	            $errorMSG = " Title is required";
	        }
	        
	        
	        $status = array("success"=>false,"msg"=>$errorMSG);
	        if(empty($errorMSG)){
	            
	            $design_id = $this->db->escape_str ( trim ( $this->input->post('design_id',true) ) );
	            $design_title = $this->db->escape_str ( trim ( $this->input->post('design_title',true) ) );
	            
	            
	            
	            $result = $this->database->updateDesignModel($design_title, $design_id);
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
	
	/*DESIGNATION DATA REMOVE*/
	public function RemoveDesign()
	{
	    try {
	        $IdsArray = json_decode($this->input->post('dataArr',true), TRUE);
	        
	        $this->database->RemoveRecordById($IdsArray,'designation');
	        $output = array('success' =>true, 'msg'=> "Deleted sucessfull");
	        
	    } catch (Exception $ex) {
	        $output = array(
	            'msg'=> $ex->getMessage(),
	            'success' => false
	        );
	    }
	    echo json_encode($output);
	}

	
}
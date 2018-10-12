<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_controller extends CI_Controller {
	
	function __construct()
    {
    	parent::__construct();
    	$this->load->model('Data_model', 'database');
    	$this->load->model('Account_model', 'db_model');
    	$this->load->library ( 'form_validation' );
    	$this->load->helper ( 'security' );
    	if($this->session->userdata('loginStatus')){
    		$GLOBALS['branch_id']=$this->session->userdata('Branch_id');
    		$GLOBALS['financial_id']=$this->session->userdata('Financial_id');
    		$GLOBALS['Added_by']=$this->session->userdata('userId');
    	}else{
    		$output = array('success' =>false, 'msg'=> "EXP");
    		echo json_encode($output);
    		return;
    	}
    }
	
	public function index()
	{  
		$this->load->view('login');
	}
	/*LIVE SEARCH -- Written by William*/
	public function searchByKeyword()
	{
	    try {
	        $q =  $this->input->get('q',true);
	        $output = $this->database->loadDataBySearchKeyword($q);
	        if ($output == null)
	        {
	            //$output = array('id' => 'No Account Number','value' => 'No record found');
	            $output[0]['id'] = 'No Account Number';
	            $output[0]['value'] = 'No record found';
	        }
	       } catch (Exception $ex) {
	        $output = array(
	            'msg'=> $ex->getMessage(),
	            'success' => false
	        );
	    };
	    
	    
	    echo json_encode($output);
	}

// 	COMMON REMOVE AND UNDOREMOVE ITEM START HERE -- Written by William
	public function Remove()
	{
	    
	    try {
	        $IdsArray = json_decode($this->input->post('dataArr',true), TRUE);
	        $tableName = $this->input->post('table',true);
	        $this->database->RemoveRecordById($IdsArray,$tableName);
	        $output = array('success' =>true, 'msg'=> "Deleted sucessfull");
	        
	    } catch (Exception $ex) {
	        $output = array(
	            'msg'=> $ex->getMessage(),
	            'success' => false
	        );
	    }
	    echo json_encode($output);
	}
	
	public function deactivate()
	{
	    
	    try {
	        $IdsArray = json_decode($this->input->post('dataArr',true), TRUE);
	        $tableName = $this->input->post('table',true);
	        $this->database->RemoveRecordById($IdsArray,$tableName);
	        $output = array('success' =>true, 'msg'=> "Deactivated sucessfull");
	        
	    } catch (Exception $ex) {
	        $output = array(
	            'msg'=> $ex->getMessage(),
	            'success' => false
	        );
	    }
	    echo json_encode($output);
	}
	
	public function activate()
	{
	    
	    try {
	        $IdsArray = json_decode($this->input->post('dataArr',true), TRUE);
	        $tableName = $this->input->post('table',true);
	        $this->database->UndoRemoveRecordById($IdsArray,$tableName);
	        $output = array('success' =>true, 'msg'=> "Activated sucessfull");
	        
	    } catch (Exception $ex) {
	        $output = array(
	            'msg'=> $ex->getMessage(),
	            'success' => false
	        );
	    }
	    echo json_encode($output);
	}
	// 	COMMON REMOVE ITEM END HERE -- Written by William
	
// 	LOAD DROP DOWN DATA SECTION START HERE -- Written by William
	public function loadDropDown()
	{
	    try {
	        $tblName =  $this->input->post('tblName',true);
	        $selectedVal =  $this->input->post('selectedVal',true);
	        $data['result']=$this->database->GetAllActiveRecord($tblName);
	        $data['selectedVal']=$selectedVal;
	        $output = array(
	            'html'=>$this->load->view('datafragment/dropDown/Select_optionList',$data, true),
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
	
	public function loadDocType()
	{
	    try {
	        $data['result']=$this->database->GetAllRecord('document_type');
	        $output = array(
	            'html'=>$this->load->view('datafragment/dropDown/Select_docList',$data, true),
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
	
	public function loadGender()
	{
	    try {
	        $data['result']=$this->database->GetAllRecord('gender_master');
	        $output = array(
	            'html'=>$this->load->view('datafragment/dropDown/Select_genderList',$data, true),
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
	
	public function loadDistrict()
	{
	    try {
	        $data['result']=$this->database->GetAllRecord('district');
	        $output = array(
	            'html'=>$this->load->view('datafragment/dropDown/Select_districtList',$data, true),
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
	
	
	public function loadLoanPcType()
	{
	    try {
	        $data['result']=$this->database->GetAllActiveRecord('pc_type_master');
	        $output = array(
	            'html'=>$this->load->view('datafragment/dropDown/Select_loanPcType',$data, true),
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
	public function loadLoanTenureType()
	{
	    try {
	        $data['result']=$this->database->GetAllActiveRecord('tenure_type_master');
	        $output = array(
	            'html'=>$this->load->view('datafragment/dropDown/Select_loanTenureType',$data, true),
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
	
// 	LOAD DROP DOWN DATA SECTION END HERE -- Written by William

	
/* Check aadhaar number already exists or not */
	public function checkAadhaar()
	{
	    
	    
	    try {
	        $Id =  $this->input->post('reqId',true);
	        if($Id == ''){
	            $output = array(
	                'msg'=> 'Resquest Error !!!',
	                'success' => false
	            );
	        }else{
	            $check = $this->database->CheckAadhaarNo($Id);
	            if (sizeof ( $check ) == 1) {
	            $output = array(
	                'msg'=> ' Aadhaar No. is already used !',
	                'success' => true
	            );
	            }
	            else
	            {
	                $output = array(
	                    'msg'=> 'Aadhaar No. has been accepted',
	                    'success' => false
	                );
	            }
	        }
	    } catch (Exception $ex) {
	        $output = array(
	            'msg'=> $ex->getMessage(),
	            'success' => false
	        );
	    }
	    echo json_encode($output);
	    
	    
	        $Id =  $this->input->post('reqId',true);
	        $check = $this->database->CheckAadhaarNo($Id);
            if (sizeof ( $check ) == 1) {
                $errorMSG = " Aadhaar No. is already used";
            }
	}
	
	/* Check customer document type already exists or not */
	public function checkDocumentType()
	{
	    
	    
	    try {
	        $docTypeVal =  $this->input->post('reqId',true);
	        $cusId =  $this->input->post('cusId',true);
	        if($docTypeVal == ''){
	            $output = array(
	                'msg'=> 'Resquest Error !!!',
	                'success' => false
	            );
	        }else{
	            $check = $this->database->CheckDocument($docTypeVal,$cusId);
	            if (sizeof ( $check ) == 1) {
	                $output = array(
	                    'msg'=> ' Document is already uploaded !',
	                    'success' => true
	                );
	            }
	            else
	            {
	                $output = array(
	                    'msg'=> 'Document has been accepted',
	                    'success' => false
	                );
	            }
	        }
	    } catch (Exception $ex) {
	        $output = array(
	            'msg'=> $ex->getMessage(),
	            'success' => false
	        );
	    }
	    echo json_encode($output);
	    
	    
	    $Id =  $this->input->post('reqId',true);
	    $check = $this->database->CheckAadhaarNo($Id);
	    if (sizeof ( $check ) == 1) {
	        $errorMSG = " Aadhaar No. is already used";
	    }
	}

	
	public function loadEmp()
	{
	    try {
	        $data['result']=$this->database->GetEmpRecord();
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
	            $data = $this->database->GetRecordById($Id,'emp');
	            $output = array(
	                'json'=>$data,
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
	        /* branch name validation */
	        elseif (empty($this->input->post('employee_branch',true))) {
	            $errorMSG .= " Branch Name is required";
	        }
	        
	        
	        $status = array("success"=>false,"msg"=>$errorMSG);
	        if(empty($errorMSG)){
	            
	            $postType = $this->db->escape_str ( trim ( $this->input->post('postType',true) ) );
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
	            $employee_branch = $this->db->escape_str ( trim ( $this->input->post('employee_branch',true) ) );
	            
	            if($postType == 0)
	            {
	                $result = $this->database->addEmpModel( $employee_name, $employee_address, $employee_country, $employee_state, $employee_city, $employee_district, $employee_pincode, $employee_designation, $employee_gender, $employee_dob, $employee_qualification, $employee_martial_status,$employee_branch);
    	            if($result['code'] == 1){
    	                $status = array("success" => true,"msg" => "Save sucessfull!");
    	            }else{
    	                $status = array("success" => false,"msg" => "Fail to save !!!");
    	            }
	            }
	            else 
	            {
	                $result = $this->database->updateEmpModel($postType, $employee_name, $employee_address, $employee_country, $employee_state, $employee_city, $employee_district, $employee_pincode, $employee_designation, $employee_gender, $employee_dob, $employee_qualification, $employee_martial_status,$employee_branch);
    	            if($result['code'] == 1)
    	            {
    	                $status = array("success" => true,"msg" => "Update sucessfull!");
    	            }
    	            else
    	            {
    	                $status = array("success" => false,"msg" => "Fail to Update !!!");
    	            }
	            }
	        }
	    } catch (Exception $ex) {
	        $status = array("success" => false,"msg" => $ex->getMessage());
	    }
	    
	    echo json_encode($status) ;
	}
		
	
  

  /*ROLE SECTION LOAD AND START HERE*/
	public function loadRole()
	{ 	
		try {
		//	$data['result']=$this->database->GetAllActiveRecord('role');  
			$output = array(
	        'html'=>$this->load->view('datafragment/dataTable/Role_table','', true),
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
	            $data = $this->database->GetRecordById($Id,'role');
	            $output = array(
	                'json'=>$data,
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
            if($this->db->escape_str (trim($this->input->post('postType',true))) == 0)
            {
	            $role_title = $this->db->escape_str ( trim ( $this->input->post('role_title',true) ) );
	            $result = $this->database->addRoleModel( $role_title);
	            if($result['code'] == 1){
	                $status = array("success" => true,"msg" => "Save sucessfull!");
	            }else{
	                $status = array("success" => false,"msg" => "Fail to save !!!");
	            }
            }
            else {
                $role_id = $this->db->escape_str ( trim ( $this->input->post('postType',true) ) );
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
	        }
	    } catch (Exception $ex) {
	        $status = array("success" => false,"msg" => $ex->getMessage());
	    }
	    
	    echo json_encode($status) ;
	}
	
	
	

  /*FINANCIAL YEAR SECTION LOAD AND START HERE*/
	public function loadFinancial()
	{ 
		try {
			$data['result']=$this->database->GetAllActiveRecord('financial_year');  
			$output = array(
	        'html'=>$this->load->view('datafragment/dataTable/Financial_table',$data, true),
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
	public function EditFinancial()
	{
	    try {
	        $Id =  $this->input->post('reqId',true);
	        if($Id == ''){
	            $output = array(
	                'msg'=> 'Resquest Error !!!',
	                'success' =>false
	            );
	        }else{
	            $data = $this->database->GetRecordById($Id,'financial_year');
	            $output = array(
	                'json'=>$data,
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
	
	
	/*FINANCIAL UPDATE*/
	public function updateFinancial()
	{
	    $_POST = json_decode(trim(file_get_contents('php://input')), true);
	    $errorMSG ='';
	    try {
	        /* financial title validation */
	        if (empty($this->input->post('financial_title',true))) {
	            $errorMSG = " Title is required";
	        }
			if (empty($this->input->post('financial_start',true))) {
	            $errorMSG = " Financial start date is required";
	        }
			if (empty($this->input->post('financial_end',true))) {
	            $errorMSG = " Financial end date is required";
	        }
						
			        
	        $status = array("success"=>false,"msg"=>$errorMSG);
	        if(empty($errorMSG)){
	            
	            $postType = $this->db->escape_str ( trim ( $this->input->post('postType',true) ) );
	            $financial_title = $this->db->escape_str ( trim ( $this->input->post('financial_title',true) ) );
				$financial_start = $this->db->escape_str ( trim ( $this->input->post('financial_start',true) ) );
				$financial_end = $this->db->escape_str ( trim ( $this->input->post('financial_end',true) ) );
	            
				if($postType == 0)
				{
    				$result = $this->database->addFinancialModel( $financial_title,$financial_start,$financial_end);
    				if($result['code'] == 1){
    				    $status = array("success" => true,"msg" => "Save sucessfull!");
    				}else{
    				    $status = array("success" => false,"msg" => "Fail to save !!!");
    				}
				}
				else 
				{
    				$result = $this->database->updateFinancialModel($postType, $financial_title,$financial_start,$financial_end);
    	            if($result['code'] == 1)
    	            {
    	                $status = array("success" => true,"msg" => "Update sucessfull!");
    	            }
    	            else
    	            {
    	                $status = array("success" => false,"msg" => "Fail to Update !!!");
    	            }
				}
	        }
	    } catch (Exception $ex) {
	        $status = array("success" => false,"msg" => $ex->getMessage());
	    }
	    
	    echo json_encode($status) ;
	}
	
	
	

  /*FINANCIAL YEAR SECTION LOAD AND START HERE*/
	public function loadLoanmaster()
	{ 
		try {
			$data['result']=$this->database->GetLoanMasterRecord();  
			$output = array(
	        'html'=>$this->load->view('datafragment/dataTable/Loanmaster_table',$data, true),
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
	public function EditLoanmaster()
	{
	    try {
	        $Id =  $this->input->post('reqId',true);
	        if($Id == ''){
	            $output = array(
	                'msg'=> 'Resquest Error !!!',
	                'success' =>false
	            );
	        }else{
	            $data = $this->database->GetRecordById($Id,'loan_master');
	            $output = array(
	                'json'=>$data,
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
	
	
	/*FINANCIAL UPDATE*/
	public function updateLoanmaster()
	{
	    $_POST = json_decode(trim(file_get_contents('php://input')), true);
	    $errorMSG ='';
	    try {
	        /* Loan name validation */
	        if (empty($this->input->post('loanmaster_loan_name',true))) {
	            $errorMSG = " Loan name is required";
	        }
			  if (empty($this->input->post('loanmaster_loan_pc',true))) {
	            $errorMSG = " Loan PC is required";
	        }
			  if (empty($this->input->post('loanmaster_loan_pc_type',true))) {
	            $errorMSG = " Loan PC type is required";
	        }
			 if (empty($this->input->post('loanmaster_tenure_type',true))) {
	            $errorMSG = " Loan tenure type is required";
	        }
			 if (empty($this->input->post('loanmaster_tenure_min',true))) {
	            $errorMSG = " Loan tenure min is required";
	        }
			 if (empty($this->input->post('loanmaster_tenure_max',true))) {
	            $errorMSG = " Loan tenure max is required";
	        }
			 if (empty($this->input->post('loanmaster_min_amount',true))) {
	            $errorMSG = " Loan min amount is required";
	        }
			 if (empty($this->input->post('loanmaster_max_amount',true))) {
	            $errorMSG = " Loan max amount is required";
	        }
			 if (empty($this->input->post('loanmaster_income_ledger',true))) {
	            $errorMSG = " Income ledger is required";
	        }
			
			 if (empty($this->input->post('loanmaster_expense_ledger',true))) {
	            $errorMSG = " Expense ledger is required";
	        }
						
			        
	        $status = array("success"=>false,"msg"=>$errorMSG);
	        if(empty($errorMSG)){
	            
	            $postType = $this->db->escape_str ( trim ( $this->input->post('postType',true) ) );
	            $loanmaster_loan_name = $this->db->escape_str ( trim ( $this->input->post('loanmaster_loan_name',true) ) );
				$loanmaster_loan_pc = $this->db->escape_str ( trim ( $this->input->post('loanmaster_loan_pc',true) ) );
				$loanmaster_loan_pc_type = $this->db->escape_str ( trim ( $this->input->post('loanmaster_loan_pc_type',true) ) );
				$loanmaster_tenure_type = $this->db->escape_str ( trim ( $this->input->post('loanmaster_tenure_type',true) ) );
				$loanmaster_tenure_min = $this->db->escape_str ( trim ( $this->input->post('loanmaster_tenure_min',true) ) );
				$loanmaster_tenure_max = $this->db->escape_str ( trim ( $this->input->post('loanmaster_tenure_max',true) ) );
				$loanmaster_min_amount = $this->db->escape_str ( trim ( $this->input->post('loanmaster_min_amount',true) ) );
				$loanmaster_max_amount = $this->db->escape_str ( trim ( $this->input->post('loanmaster_max_amount',true) ) );
				$loanmaster_income_ledger = $this->db->escape_str ( trim ( $this->input->post('loanmaster_income_ledger',true) ) );
				$loanmaster_expense_ledger = $this->db->escape_str ( trim ( $this->input->post('loanmaster_expense_ledger',true) ) );
	            
				if($postType ==0)
				{
    				$result = $this->database->addLoanmasterModel( $loanmaster_loan_name,$loanmaster_loan_pc,$loanmaster_loan_pc_type,$loanmaster_tenure_type,$loanmaster_tenure_min,$loanmaster_tenure_max,$loanmaster_min_amount,$loanmaster_max_amount,$loanmaster_income_ledger,$loanmaster_expense_ledger);
    				if($result['code'] == 1){
    				    $status = array("success" => true,"msg" => "Save sucessfull!");
    				}else{
    				    $status = array("success" => false,"msg" => "Fail to save !!!");
    				}
				}
				else 
				{
				    $result = $this->database->updateLoanmasterModel($postType,$loanmaster_loan_name,$loanmaster_loan_pc,$loanmaster_loan_pc_type,$loanmaster_tenure_type,$loanmaster_tenure_min,$loanmaster_tenure_max,$loanmaster_min_amount,$loanmaster_max_amount,$loanmaster_income_ledger,$loanmaster_expense_ledger);
    	            if($result['code'] == 1)
    	            {
    	                $status = array("success" => true,"msg" => "Update sucessfull!");
    	            }
    	            else
    	            {
    	                $status = array("success" => false,"msg" => "Fail to Update !!!");
    	            }
				}
	        }
	    } catch (Exception $ex) {
	        $status = array("success" => false,"msg" => $ex->getMessage());
	    }
	    
	    echo json_encode($status) ;
	}
	

	
	
	
  /*BRANCH LOAD AND START HERE*/
	public function loadBranch()
	{ 
		try {
			$data['result']=$this->database->GetAllActiveRecord('branch');  
			$output = array(
	        'html'=>$this->load->view('datafragment/dataTable/Branch_table',$data, true),
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

	/*BRANCH EDIT SECTION*/
	public function EditBranch()
	{
	    try {
	        $Id =  $this->input->post('reqId',true);
	        if($Id == ''){
	            $output = array(
	                'msg'=> 'Resquest Error !!!',
	                'success' =>false
	            );
	        }else{
	            $data = $this->database->GetRecordById($Id,'branch');
	            $output = array(
	                'json'=>$data,
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
	
	
	/*BRANCH UPDATE*/
	public function updateBranch()
	{
	    $_POST = json_decode(trim(file_get_contents('php://input')), true);
	    $errorMSG ='';
	    try {
	        /* Branch name validation */
	        if (empty($this->input->post('branch_name',true))) {
	            $errorMSG = " Branch name is required";
	        }
			if (empty($this->input->post('branch_code',true))) {
	            $errorMSG = " Branch code is required";
	        }
			if (empty($this->input->post('branch_address',true))) {
	            $errorMSG = " Branch address is required";
	        }
						
			        
	        $status = array("success"=>false,"msg"=>$errorMSG);
	        if(empty($errorMSG)){
	            
	            $postType = $this->db->escape_str ( trim ( $this->input->post('postType',true) ) );
	            $branch_name = $this->db->escape_str ( trim ( $this->input->post('Name',true) ) );
				$branch_code = $this->db->escape_str ( trim ( $this->input->post('branch_code',true) ) );
				$branch_address = $this->db->escape_str ( trim ( $this->input->post('branch_address',true) ) );
	            
				if($postType == 0)
				{
    				$result = $this->database->addBranchModel($branch_name,$branch_code,$branch_address);
    				if($result['code'] == 1){
    				    $status = array("success" => true,"msg" => "Save sucessfull!");
    				}else{
    				    $status = array("success" => false,"msg" => "Fail to save !!!");
    				}
				}
				else
				{
				    $result = $this->database->updateBranchModel($postType,$branch_name,$branch_code,$branch_address);
    	            if($result['code'] == 1)
    	            {
    	                $status = array("success" => true,"msg" => "Update sucessfull!");
    	            }
    	            else
    	            {
    	                $status = array("success" => false,"msg" => "Fail to Update !!!");
    	            }
				}
	        }
	    } catch (Exception $ex) {
	        $status = array("success" => false,"msg" => $ex->getMessage());
	    }
	    
	    echo json_encode($status) ;
	}
	

	
// 	LOAD MEMBER DATA -- Written by William
	public function loadMem()
	{
	    try {
	        $data['result']=$this->database->get_member_registration($GLOBALS['branch_id']);
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
	
// 	EDIT MEMBER FORM -- Written by William
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
	            $data = $this->database->GetRecordById($Id,'customer');
	            $output = array(
	                'json'=>$data,
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
	
// 	UPDATE MEMBER -- Written by William
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
	        /* Aadhaar no. already used or not check */
	        $check = $this->database->CheckAadhaarNo($this->db->escape_str ( trim ( $this->input->post('member_aadhaar',true) ) ));
	        if (sizeof ( $check ) == 1) {
	            $errorMSG = " Aadhaar No. is already used";
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
	        
	        /* nominee district validation */
	        if (empty($this->input->post('member_nomineedistrict',true))) {
	            $errorMSG = " Nominee district is required";
	        }
	        /* nominee contact validation */
	        if (empty($this->input->post('member_nomineecontact',true))) {
	            $errorMSG = " Nominee contact is required";
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
	            $postype = $this->db->escape_str ( trim ( $this->input->post('postType',true) ) );
	            if($postype == 0)
	           	{
    	            $result = $this->database->addMemModel( $member_name, $member_dob, $member_gender, $member_aadhaar, $member_husband, $member_address, $member_rural, $member_urban, $member_district, $member_contact, $member_bankaccount, $member_bankbranch, $member_work, $member_nominee, $member_nomineeaadhaar, $member_nomineeaddress, $member_nomineerural, $member_nomineeurban, $member_nomineedistrict, $member_nomineecontact);
    	            if($result['code'] == 1){
    	                $status = array("success" => true,"msg" => "Save sucessfull!");
    	            }else{
    	                $status = array("success" => false,"msg" => "Fail to save !!!");
    	            }
	           	}
	            else
	            {
	                $result = $this->database->updateMemModel($postype, $member_name, $member_dob, $member_gender, $member_aadhaar, $member_husband, $member_address, $member_rural, $member_urban, $member_district, $member_contact, $member_bankaccount, $member_bankbranch, $member_work, $member_nominee, $member_nomineeaadhaar, $member_nomineeaddress, $member_nomineerural, $member_nomineeurban, $member_nomineedistrict, $member_nomineecontact);
	                if($result['code'] == 1)
	                {
	                    $status = array("success" => true,"msg" => "Update sucessfull!");
	                }
	                else
	                {
	                    $status = array("success" => false,"msg" => "Fail to Update !!!");
	                }
	            }
	        }
	    } catch (Exception $ex) {
	        $status = array("success" => false,"msg" => $ex->getMessage());
	    }
	    
	    echo json_encode($status) ;
	}
	
	
	
	
	//SHG SECTION START HERE
		/*Self Helf Group SHG SECTION LOAD*/
	public function loadShgmaster()
	{ 	
		try {
		    $data['result']=$this->database->GetShgRecord();  
			$output = array(
	        'html'=>$this->load->view('datafragment/dataTable/Shgmaster_table',$data, true),
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
	
		
	/*SHG EDIT SECTION*/
	public function EditShgmaster()
	{
	    try {
	        $Id =  $this->input->post('reqId',true);
	        if($Id == ''){
	            $output = array(
	                'msg'=> 'Resquest Error !!!',
	                'success' =>false
	            );
	        }else{
	            $data = $this->database->GetRecordById($Id,'shg_master');
	            $output = array(
	                'json'=>$data,
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
	
	/*SHG DATA ADD*/
	public function UpdateShgmaster()
	{
	    $_POST = json_decode(trim(file_get_contents('php://input')), true);
	    $errorMSG ='';
	    try {
	        /* designation title validation */
	        if (empty($this->input->post('shg_code',true))) {
	            $errorMSG = " SHG Code is required";
	        }
			 if (empty($this->input->post('shg_name',true))) {
	            $errorMSG = " SHG Name is required";
	        }
			 if (empty($this->input->post('shg_address',true))) {
	            $errorMSG = " Address is required";
	        }
			 if (empty($this->input->post('shg_area',true))) {
	            $errorMSG = " Area is required";
	        }
			 if (empty($this->input->post('shg_member_count',true))) {
	            $errorMSG = " Max member is required";
	        }
			
			
	        
	        
	        $status = array("success"=>false,"msg"=>$errorMSG);
	        if(empty($errorMSG)){
	    				
	            $postype = $this->db->escape_str ( trim ( $this->input->post('postType',true) ) );
	            $shg_code = $this->db->escape_str ( trim ( $this->input->post('shg_code',true) ) );
				$shg_name = $this->db->escape_str ( trim ( $this->input->post('shg_name',true) ) );
				$shg_address = $this->db->escape_str ( trim ( $this->input->post('shg_address',true) ) );
				$shg_area = $this->db->escape_str ( trim ( $this->input->post('shg_area',true) ) );
				$shg_member_count = $this->db->escape_str ( trim ( $this->input->post('shg_member_count',true) ) );
				$shg_extra = $this->db->escape_str ( trim ( $this->input->post('shg_extra',true) ) );
			
				
				if($postype==0){
					$result = $this->database->addShgmasterModel( $shg_code,$shg_name,$shg_address,$shg_area,$shg_member_count,$shg_extra);
					if($result['code'] == 1){
						$status = array("success" => true,"msg" => "Save sucessfull!");
					}else{
						$status = array("success" => false,"msg" => "Fail to save !!!");
					}
				}else{
					$result = $this->database->updateShgmasterModel( $shg_code,$shg_name,$shg_address,$shg_area,$shg_member_count,$shg_extra,$postype);
					if($result['code'] == 1)
					{
						$status = array("success" => true,"msg" => "Update sucessfull!");
					}
					else
					{
						$status = array("success" => false,"msg" => "Fail to Update !!!");
					}
				}
				
	            
	            
	        }
	    } catch (Exception $ex) {
	        $status = array("success" => false,"msg" => $ex->getMessage());
	    }
	    
	    echo json_encode($status) ;
	}
	
	//SHG GROUP END HERE
	
	
	//SHG GROUP MEMBER ADD START HERE

				/*Self Helf Group SHG MEMBER ADD SECTION LOAD*/
	public function loadShggrouplist()
	{ 	
		try {
		    $data['result']=$this->database->GetShgRecord();  
			$output = array(
	        'html'=>$this->load->view('datafragment/dataTable/Shg_group_list_table',$data, true),
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
	
		public function LoadSelected_memberlist()
	{ 	
		$id =  $this->input->get('id',true);
		try {
			$data['result']=$this->database->GetAllSelectedMember($id);  
			$data['group_details']=$this->database->GetGroupDetails($id);  

			$output = array(
			'html'=>$this->load->view('datafragment/dataTable/Selected_memberlist_table.php',$data,true),
			'Group_details'=>$this->load->view('datafragment/dataTable/Group_details.php',$data,true),
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
	
		public function loadMemberlist_for_shg_group()
	{ 	
		try {
			$data['result']=$this->database->GetAllActiveRecord('customer');  
			$output = array(
	        'html'=>$this->load->view('datafragment/dataTable/Memberlist_for_shg_group_table.php',$data,true),
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
	
	
	//SHG GROUP MEMBER ADD START HERE

				/*Self Helf Group SHG MEMBER ADD SECTION LOAD*/
	public function loadManageshg()
	{ 	
		try {
			$data['result']=$this->database->GetAllActiveRecord('shg_master');  
			$output = array(
	        'html'=>$this->load->view('datafragment/dataTable/Mem_shg_group_select_table',$data, true),
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
		public function loadMember_list_group()
	{ 	
		try {
			$data['result']=$this->database->GetAllActiveRecord('customer');  
			$output = array(
	        'html'=>$this->load->view('datafragment/dataTable/Memlist_group_table',$data, true),
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
	
	//SHG GROUP MEMBER ADD END HERE
	
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
	/*DESIGNATION EDIT SECTION*/
	public function EditDesignation()
	{
	    try {
	        $Id =  $this->input->post('reqId',true);
	        if($Id == ''){
	            $output = array(
	                'msg'=> 'Resquest Error !!!',
	                'success' =>false
	            );
	        }else{
	            $data = $this->database->GetRecordById($Id,'designation');
	            $output = array(
	                'json'=>$data,
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
	public function UpdateDesignation()
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
	            
	            $postype = $this->db->escape_str ( trim ( $this->input->post('postType',true) ) );
	            $design_title = $this->db->escape_str ( trim ( $this->input->post('design_title',true) ) );
				$design_description = $this->db->escape_str ( trim ( $this->input->post('design_description',true) ) );
				
				if($postype==0){
					$result = $this->database->addDesignModel( $design_title,$design_description);
					if($result['code'] == 1){
						$status = array("success" => true,"msg" => "Save sucessfull!");
					}else{
						$status = array("success" => false,"msg" => "Fail to save !!!");
					}
				}else{
					$result = $this->database->updateDesignModel($design_title,$design_description, $postype);
					if($result['code'] == 1)
					{
						$status = array("success" => true,"msg" => "Update sucessfull!");
					}
					else
					{
						$status = array("success" => false,"msg" => "Fail to Update !!!");
					}
				}
				
	            
	            
	        }
	    } catch (Exception $ex) {
	        $status = array("success" => false,"msg" => $ex->getMessage());
	    }
	    
	    echo json_encode($status) ;
	}
	
	
	
	
	public function test(){
		$this->load->model('Account_model', 'db_model');
		$financialId=1;
		$branchId=2;
		$addedBy=1;
		$jsonData=array("header"=>array(
									"Acc_no"=>"1100223928920",
									"Amount"=>"1000",
									"TransactionID"=>"RD87191212",
									"Naration"=>"This is naration",
									"TransactionType"=>"R",
									"IsManual"=>"1"),
				      "footer"=>array(
									array(
									"Ledger_type"=>"CR",
									"Ledger_id"=>"1",
									"Ledger_name"=>"CASH",
									"Amount"=>"5000",
									"IsInward"=>"1"),
									array(
									"Ledger_type"=>"DR",
									"Ledger_id"=>"2",
									"Ledger_name"=>"Diposit",
									"Amount"=>"5000",
									"IsInward"=>"1")));
									
		$status=$this->db_model->updateTransaction($jsonData,$financialId,$branchId,$addedBy);	
		echo $status;
							
	} 
	
	
	
	
	
	/*CUSTOMER DOCUMENT UPLOAD TABLE LOAD -- Written by William*/
	public function loadCustomerDocUpload()
	{
	    try {
	        $data['result']=$this->database->GetCustomerDataByBranchId($GLOBALS['branch_id']);
	        $output = array(
	            'html'=>$this->load->view('datafragment/dataTable/CustomerDocUpload_table',$data, true),
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
	
	/*ADD CUSTOMER DOCUMENT -- Written by William*/
	public function AddCustomerDocUploadForm()
	{
	    try {
	        $Id =  $this->input->post('reqId',true);
	        if($Id == ''){
	            $output = array(
	                'msg'=> 'Resquest Error !!!',
	                'success' =>false
	            );
	        }else{
	            $data = $this->database->GetCustomerRecordById($Id,'customer');
	            $data1 = $this->database->GetRecordByForiegnKey($Id);
	            $output = array(
	                'json'=>$data,
	                'json1'=>$data1,
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
	
	/*UPDATE CUSTOMER DOCUMENT -- Written by William*/
	public function updateCustomerDoc()
	{
	    $_POST = json_decode(trim(file_get_contents('php://input')), true);
	    $errorMSG ='';
	    try {
	        /* customer doc type validation */
	        if (empty($this->input->post('customer_doc_type',true))) {
	            $errorMSG = " Document type is required";
	        }
	        /* file validation */
	        if (empty($this->input->post('fileUpload',true))) {
	            $errorMSG = " File is required";
	        }
	        
	        
	        $status = array("success"=>false,"msg"=>$errorMSG);
	        if(empty($errorMSG)){
	            
	            $postType = $this->db->escape_str ( trim ( $this->input->post('postType',true) ) );
	            $customer_doc_type = $this->db->escape_str ( trim ( $this->input->post('customer_doc_type',true) ) );
	            $file = $this->db->escape_str ( trim ( $_POST ['fileUpload'] ) );
	            $result = $this->database->addCustomerDoc($postType, $customer_doc_type,$file);
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
	
	/*CUSTOMER PROFILE TABLE LOAD -- Written by William*/
	public function loadCustomerProfile()
	{
	    try {
	        $data['result']=$this->database->GetCustomerDataByBranchId($GLOBALS['branch_id']);
	        $output = array(
	            'html'=>$this->load->view('datafragment/dataTable/CustomerProfile_table',$data, true),
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
	
	/*VIEW CUSTOMER PROFILE -- Written by William*/
	public function ViewCustomerProfile()
	{
	    try {
	        $Id =  $this->input->post('reqId',true);
	        if($Id == ''){
	            $output = array(
	                'msg'=> 'Resquest Error !!!',
	                'success' =>false
	            );
	        }else{
	            $data = $this->database->GetCustomerRecordById($Id,'customer');
	            $data1 = $this->database->GetRecordByForiegnKey($Id,'Cus_id','customer_document');
	            $output = array(
	                'json'=>$data,
	                'json1'=>$data1,
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
	
	// 	UPDATE ACCOUNT STATUS-- Written by William
	public function updateStatus()
	{
	    
	    try {
	        $Id = $this->input->post('reqId',true);
	        $Val = $this->input->post('statusVal',true);
	        $this->database->UpdateRecordById($Id,$Val,'customer');
	        $data = $this->database->GetCustomerRecordById($Id,'customer');
	        $output = array('json'=>$data,'success' =>true, 'msg'=> "Update sucessfull");
	        
	    } catch (Exception $ex) {
	        $output = array(
	            'msg'=> $ex->getMessage(),
	            'success' => false
	        );
	    }
	    echo json_encode($output);
	}
	
	// 	GENERATE ACCOUNT NUMBER-- Written by William
	public function generateAccNo()
	{
	    
	    try {
	        $Id = $this->input->post('reqId',true);
	        $accStatus = $this->database->GetAccountStatusById($Id,'customer_account');
	        if(sizeof ( $accStatus ) == 1)
	        {
	            $output = array(
	                'msg'=> 'Account already generated !!',
	                'success' =>false
	            );
	        }
	        else
	        {
    	        $this->database->GenerateAccountById($Id,'customer_account');
    	        $data = $this->database->GetCustomerRecordById($Id,'customer');
    	        $output = array('json'=>$data,'success' =>true, 'msg'=> "Generate sucessfull");
	        }
	        
	    } catch (Exception $ex) {
	        $output = array(
	            'msg'=> $ex->getMessage(),
	            'success' => false
	        );
	    }
	    echo json_encode($output);
	}
	
	/*CUSTOMER ADD DEPOSITE TABLE LOAD -- Written by William*/
	public function loadCustomerAddDeposite()
	{
	    try {
	        $data['result']=$this->database->GetAllActiveRecord('customer');
	        $output = array(
	            'html'=>$this->load->view('datafragment/dataTable/CustomerAddDeposite_table',$data, true),
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
	
	/*CUSTOMER ADD DEPOSITE FORM -- Written by William*/
	public function addCustomerDepositeForm()
	{
	    try {
	        $Id = $this->input->post('reqId',true);
	        $data['result']=$this->database->GetCustomerRecordById($Id,'customer');
	        $output = array(
	            'html'=>$this->load->view('datafragment/addForm/AddCustomerDepositeForm',$data, true),
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
	
	/*CUSTOMER ADD WITHDRAWALS FORM -- Written by William*/
	public function addCustomerWithdrawalsForm()
	{
	    try {
	        $Id = $this->input->post('reqId',true);
	        $data['result']=$this->database->GetCustomerRecordById($Id,'customer');
	        $output = array(
	            'html'=>$this->load->view('datafragment/addForm/AddCustomerWithdrawalsForm',$data, true),
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
	
	/*CUSTOMER PASSBOOK PREVIEW -- Written by William*/
	public function addPassbookPreview()
	{
	    try {
	        $Id = $this->input->post('reqId',true);
	        $data['result']=$this->database->GetCustomerRecordById($Id,'customer');
	        
	        $output = array(
	            'html'=>$this->load->view('datafragment/addForm/AddCustomerPassbookPreview',$data, true),
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
	
	/*CUSTOMER BALANCE SHEET -- Written by William*/
	public function addBalanceForm()
	{
	    try {
	        $AccNo = $this->input->post('reqId',true);
	        $data['result']=$this->database->GetCustomerBalanceById($AccNo,'transaction_footer');
	        $output = array(
	            'html'=>$this->load->view('datafragment/dataTable/CustomerBalance_table.php',$data, true),
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

	/*VIEW CUSTOMER PROFILE BY SEARCH KEYWORD -- Written by William*/
	public function loadSearchData()
	{
	    try {
	        $q =  $this->input->post('reqId',true);
	        if($q == ''){
	            $output = array(
	                'msg'=> 'Resquest Error !!!',
	                'success' =>false
	            );
	        }else{
	            $data = $this->database->GetRecordBySearchKeyWord($q);
	            $output = array(
	                'json'=>$data,
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
	
	/*ADD CUSTOMER DEPOSITE -- Written by William*/
	public function addCustomerDeposite()
	{
	    $_POST = json_decode(trim(file_get_contents('php://input')), true);
	    $errorMSG ='';
	    try {
	        /* deposite amount validation */
	        if (empty($this->input->post('customer_deposite_amount',true))) {
	            $errorMSG = " Deposite Amount is required";
	        }
	        /* deposite narration*/
	        if (empty($this->input->post('customer_deposite_narration',true))) {
	            $errorMSG = " Narration is required";
	        }
	        
	        
	        $status = array("success"=>false,"msg"=>$errorMSG);
	        if(empty($errorMSG)){
	            
	            $customer_account_no = $this->db->escape_str ( trim ( $this->input->post('customer_account_no',true) ) );
	            $customer_deposit_tranId = $this->db->escape_str ( trim ( $this->input->post('customer_deposit_tranId_hidden',true) ) );
	            $customer_deposite_amount = $this->db->escape_str ( trim ( $this->input->post('customer_deposite_amount',true) ) );
	            $customer_deposite_narration = $this->db->escape_str ( trim ( $this->input->post('customer_deposite_narration',true) ) );
	          
	            $jsonData=array("header"=>array(
	                "Acc_no"=>$customer_account_no,
	                "Amount"=>$customer_deposite_amount,
	                "TransactionID"=>$customer_deposit_tranId,
	                "Naration"=>$customer_deposite_narration,
	                "TransactionType"=>"R",
	                "IsManual"=>"0"),
	                "footer"=>array(
	                    array(
	                        "Ledger_type"=>"CR",
	                        "Ledger_id"=>"1",
	                        "Ledger_name"=>"CASH",
	                        "Amount"=>$customer_deposite_amount,
	                        "IsInward"=>"1"),
	                    array(
	                        "Ledger_type"=>"DR",
	                        "Ledger_id"=>"2",
	                        "Ledger_name"=>"Diposit",
	                        "Amount"=>$customer_deposite_amount,
	                        "IsInward"=>"1")));
	                    
	                    $result=$this->db_model->updateTransaction($jsonData, $GLOBALS['financial_id'],$GLOBALS['branch_id'],$GLOBALS['Added_by']);	
	                    
	                if($result != '')
	                {
	                    $status = array("success" => true,"msg" => 'Voucher no. '.$result.' is generated for diposite (Amount '.$customer_deposite_amount.')',"voucherNo" => $result);
	                }
	                else
	                {
	                    $status = array("success" => false,"msg" => "Fail to generate voucher no !!!");
	                }
	        }
	    } catch (Exception $ex) {
	        $status = array("success" => false,"msg" => $ex->getMessage());
	    }
	    
	    echo json_encode($status) ;
	}
	
	/*ADD CUSTOMER WITHDRAWALS -- Written by William*/
	public function addCustomerWithdrawals()
	{
	    $_POST = json_decode(trim(file_get_contents('php://input')), true);
	    $errorMSG ='';
	    try {
	        /* withdrawals amount validation */
	        if (empty($this->input->post('customer_withdrawals_amount',true))) {
	            $errorMSG = " Deposite Amount is required";
	        }
	        /* withdrawals narration */
	        if (empty($this->input->post('customer_withdrawals_narration',true))) {
	            $errorMSG = " Narration is required";
	        }
	        
	        
	        $status = array("success"=>false,"msg"=>$errorMSG);
	        if(empty($errorMSG)){
	            
	            $customer_account_no = $this->db->escape_str ( trim ( $this->input->post('customer_account_no',true) ) );
	            $customer_withdrawals_tranId = $this->db->escape_str ( trim ( $this->input->post('customer_withdrawals_tranId_hidden',true) ) );
	            $customer_withdrawals_amount = $this->db->escape_str ( trim ( $this->input->post('customer_withdrawals_amount',true) ) );
	            $customer_withdrawals_narration = $this->db->escape_str ( trim ( $this->input->post('customer_withdrawals_narration',true) ) );
	            
	            $jsonData=array("header"=>array(
	                "Acc_no"=>$customer_account_no,
	                "Amount"=>$customer_withdrawals_amount,
	                "TransactionID"=>$customer_withdrawals_tranId,
	                "Naration"=>$customer_withdrawals_narration,
	                "TransactionType"=>"P",
	                "IsManual"=>"0"),
	                "footer"=>array(
	                    array(
	                        "Ledger_type"=>"CR",
	                        "Ledger_id"=>"1",
	                        "Ledger_name"=>"CASH",
	                        "Amount"=>$customer_withdrawals_amount,
	                        "IsInward"=>"0"),
	                    array(
	                        "Ledger_type"=>"DR",
	                        "Ledger_id"=>"3",
	                        "Ledger_name"=>"Withdrawals",
	                        "Amount"=>$customer_withdrawals_amount,
	                        "IsInward"=>"0")));
	                    
	                    $result=$this->db_model->updateTransaction($jsonData, $GLOBALS['financial_id'],$GLOBALS['branch_id'],$GLOBALS['Added_by']);
	                    
	                    if($result != '')
	                    {
	                        $status = array("success" => true,"msg" => 'Voucher no. '.$result.' is generated for withdrawals (Amount '.$customer_withdrawals_amount.')',"voucherNo" => $result);
	                    }
	                    else
	                    {
	                        $status = array("success" => false,"msg" => "Fail to generate voucher no !!!");
	                    }
	        }
	    } catch (Exception $ex) {
	        $status = array("success" => false,"msg" => $ex->getMessage());
	    }
	    
	    echo json_encode($status) ;
	}
	
	
	
	
	/*PAGE MANAGER--Nengkhoiba*/
	public function loadPageByRole()
	{
		$_POST = json_decode(trim(file_get_contents('php://input')), true);
		try {
			$Id =  $this->input->post('Role',true);
			if($Id == ''){
				$output = array(
						'msg'=> 'Resquest Error !!!',
						'success' =>false
				);
			}else{
					$data['result']=$this->database->get_page_by_role($Id);
			$output = array(
					'html'=>$this->load->view('datafragment/dataTable/role_page_table',$data, true),
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
	public function UpdatePageSitemap()
	{
		$_POST = json_decode(trim(file_get_contents('php://input')), true);
		try {
			$checkboxs =  $this->input->post('pageCheckBox[]',true);
			$roles =  $this->input->post('roleId[]',true);
			
			if($roles[0] == ''){
				$output = array(
						'msg'=> 'Resquest Error !!!',
						'success' =>false
				);
				
			}else{
				$result=$this->database->Update_page_role($roles,$checkboxs);
				if($result['code'] == 1)
				{
					$output = array(
							'msg'=>'Updated successfully!',
							'success' =>true
					);
				}
				
			}
		} catch (Exception $ex) {
			$output = array(
					'msg'=> $ex->getMessage(),
					'success' => false
			);
			
		}
		echo json_encode($output);
	}
	/*PAGE MANAGER--Nengkhoiba*/
	
	
		/*Add member to group*/
	public function addCustomer_to_group()
	{
	    try {
	        $ac_id = $this->input->post('ac_id',true);
			$gr_id = $this->input->post('gr_id',true);
	        $result=$this->database->AddCustomerToGroup($ac_id,$gr_id);
			
			if($result['code']==1){
				$data['result']=$this->database->GetAllSelectedMember($gr_id );  	
			
				 $output = array(
				'msg'=>$ac_id .' is added successfully!',
				'html'=>$this->load->view('datafragment/dataTable/Selected_memberlist_table.php',$data,true),
	            'success' =>true
	        );
				}else if($result['code']==2){
					 $output = array(
					'msg'=>$ac_id .' is already added!',
	            	'success' =>false
	           		 );
				}else{
					$output = array(
					'msg'=>'Request error.',
	            	'success' =>false
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

	//REMOVED SELECTED MEMBER FROM SHG GROUP 
	public function RemoveSelectedMember()
	{
	    
	    try {
	        $IdsArray = json_decode($this->input->post('dataArr',true), TRUE);
	        
	        $this->database->RemoveRecordByIdFromShgGroup($IdsArray);
	        $output = array('success' =>true, 'msg'=> "Deleted sucessfull");
	        
	    } catch (Exception $ex) {
	        $output = array(
	            'msg'=> $ex->getMessage(),
	            'success' => false
	        );
	    }
	    echo json_encode($output);
	}
	//
	
	/*USER TABLE LOAD*/
	public function loadUser()
	{
	    try {
	        $data['result']=$this->database->GetUserTable();
	        $output = array(
	            'html'=>$this->load->view('datafragment/dataTable/User_table',$data, true),
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
	
	/*USER EDIT SECTION*/
	public function EditUser()
	{
	    try {
	        $Id =  $this->input->post('reqId',true);
	        if($Id == ''){
	            $output = array(
	                'msg'=> 'Resquest Error !!!',
	                'success' =>false
	            );
	        }else{
	            $data = $this->database->GetRecordById($Id,'emp_login');
	            $output = array(
	                'json'=>$data,
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
	
	/*USER DATA ADD*/
	public function UpdateUser()
	{
	    $_POST = json_decode(trim(file_get_contents('php://input')), true);
	    $errorMSG ='';
	    try {
	        /* employee name validation */
	        if (empty($this->input->post('user_list',true))) {
	            $errorMSG = " Employee name is required";
	        }
	        /* user role validation */
	        if (empty($this->input->post('role_list',true))) {
	            $errorMSG = " User role is required";
	        }
	        
	        
	        $status = array("success"=>false,"msg"=>$errorMSG);
	        if(empty($errorMSG)){
	            
	            $userId = $this->db->escape_str ( trim ( $this->input->post('postType',true) ) );
	            $user_list = $this->db->escape_str ( trim ( $this->input->post('user_list',true) ) );
	            $user_name = $this->db->escape_str ( trim ( $this->input->post('user_name',true) ) );
	            $role_list = $this->db->escape_str ( trim ( $this->input->post('role_list',true) ) );
	            
	            if($userId==0){
	                $result = $this->database->addUserModel( $user_list,$user_name,$role_list);
	                if($result['code'] == 1){
	                    $status = array("success" => true,"msg" => "Save sucessfull!");
	                }else{
	                    $status = array("success" => false,"msg" => "Fail to save !!!");
	                }
	            }else{
	                $result = $this->database->updateUserModel($userId,$user_list,$user_name,$role_list);
	                if($result['code'] == 1)
	                {
	                    $status = array("success" => true,"msg" => "Update sucessfull!");
	                }
	                else
	                {
	                    $status = array("success" => false,"msg" => "Fail to Update !!!");
	                }
	            }
	            
	            
	            
	        }
	    } catch (Exception $ex) {
	        $status = array("success" => false,"msg" => $ex->getMessage());
	    }
	    
	    echo json_encode($status) ;
	}
	
	public function createUserName()
	{
	    try {
	        $Id =  $this->input->post('reqId',true);
	        if($Id == ''){
	            $output = array(
	                'msg'=> 'Resquest Error !!!',
	                'success' =>false
	            );
	        }else{
	            $check = $this->database->CheckUserAssign($Id);
	            if (sizeof ( $check ) == 1)
	            {
	                $output = array(
	                    'userName'=> '',
	                    'success' => true
	                );
	            }
	            else
	            {
    	            $data = $this->database->GetRecordById($Id,'emp');
    	            $output = array(
    	                'userName'=>$data[0]['Name'].' '.$data[0]['ID'],
    	                'success' =>true
    	            );
	            }
	        }
	    } catch (Exception $ex) {
	        $output = array(
	            'msg'=> $ex->getMessage(),
	            'success' => false
	        );
	    }
	    echo json_encode($output);
	}
	
	
	/*CUSTOMER PASSBOOK PREVIEW -- Written by William*/
	public function customerInformation()
	{
	    try 
	    {
	        $Id = $this->input->get('cusId',true);
	        $data['result']=$this->database->GetCustomerRecordById($Id,'customer');
	        $this->load->view('admin/independentpage',$data);
	        //echo json_encode($data['result']);
	    } 
	    catch (Exception $ex)
	    {
	        
	    }	    
	}
	
	
	/*LOAD RO LIST -- Written by William*/
	public function loadROList()
	{
	    try {
	        $data['result']=$this->database->GetAllROList();
	        $output = array(
	            'html'=>$this->load->view('datafragment/dropDown/Select_ROList',$data, true),
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
	
	
	/*SEARCH LOAN APPLICATION FORM GROUP -- Written by William*/
	public function searchLoanApplicationGrp()
	{
	    $_POST = json_decode(trim(file_get_contents('php://input')), true);
	    try {
	        $loan_acc_no_Grp =  $this->input->post('loan_acc_no_Grp',true);
	        if($loan_acc_no_Grp == ''){
	            $output = array(
	                'msg'=> 'Resquest Error !!!',
	                'success' =>false
	            );
	        }else{
	            
	            $data['result']=$this->database->GetAllSelectedMemberByGrpLoanAccNo($loan_acc_no_Grp);
	            $data['group_details']=$this->database->GetGroupDetailsByGrpLoanAccNo($loan_acc_no_Grp);
	            $data['assignRO']=$this->database->GetAssignROByGrpLoanAccNo($loan_acc_no_Grp);
	            $output = array(
	            'check' => $data['result'],
	            'html'=>$this->load->view('datafragment/dataTable/Loan_application_memberlist_table',$data,true),
	            'Group_details'=>$this->load->view('admin/LoanAccGrpInfo',$data,true),
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
	
	/*SEARCH LOAN APPLICATION FORM INDIVIDUALS -- Written by William*/
	public function searchLoanApplicationIndi()
	{
	    $_POST = json_decode(trim(file_get_contents('php://input')), true);
	    try {
	        $loan_acc_no_Indi =  $this->input->post('loan_acc_no_Indi',true);
	        if($loan_acc_no_Indi == ''){
	            $output = array(
	                'msg'=> 'Resquest Error !!!',
	                'success' =>false
	            );
	        }else{
	            $data['result']=$this->database->GetMemInfoByIndiLoanAccNo($loan_acc_no_Indi);
  	            $data['assignRO']=$this->database->GetAssignROByLoanAccNo($loan_acc_no_Indi);
	            $output = array(
	                'html'=>$this->load->view('admin/MemberInformation',$data,true),
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
	
	// 	ASSIGN RO FOR GROUP -- Written by William
	public function assignROGrp()
	{
	    
	    try {
	        $loan_acc_no_Array = json_decode($this->input->post('dataArr',true), TRUE);
	        $ro_id = $this->input->post('roID',true);
	        $grp_id = $this->input->post('grpID',true);
	        $grp_loan_acc_no = $this->input->post('grpLoanAcc',true);
	        
	        $check = $this->database->CheckAssignROGrp($ro_id,$grp_loan_acc_no);
	        if (sizeof ( $check ) == 1) {
	            $output = array(
	                'msg'=> "EmpID ".$ro_id." is already assigned !",
	                'success' => false
	            );
	        }
	        else
	        {	        
	        $this->database->AssignROGrpModel($loan_acc_no_Array,$ro_id,$grp_id,$grp_loan_acc_no);
	        $output = array('success' =>true, 'msg'=> "Successfully assign to EmpID ".$ro_id);
	        }
	        
	    } catch (Exception $ex) {
	        $output = array(
	            'msg'=> $ex->getMessage(),
	            'success' => false
	        );
	    }
	    echo json_encode($output);
	}
	
	// 	ASSIGN RO FOR INDIVIDUALS -- Written by William
	public function assignROIndi()
	{
	    try {	        
	        $ro_id = $this->input->post('roID',true);
	        $loan_acc_no = $this->input->post('loan_acc_no',true);
	        if($loan_acc_no == ''){
	            $output = array(
	                'msg'=> 'Resquest Error !!!',
	                'success' =>false
	            );
	        }else{	        
	        $check = $this->database->CheckAssignROIndi($ro_id,$loan_acc_no);
	        if (sizeof ( $check ) == 1) {
	            $output = array(
	                'msg'=> "EmpID ".$ro_id." is already assigned !",
	                'success' => false
	            );
	        }
	        else
	        {
	            $this->database->AssignROIndiModel($ro_id,$loan_acc_no);
	            $output = array('success' =>true, 'msg'=> "Successfully assign to EmpID ".$ro_id);
	        }
	        }
	        
	    } catch (Exception $ex) {
	        $output = array(
	            'msg'=> $ex->getMessage(),
	            'success' => false
	        );
	    }
	    echo json_encode($output);
	}
	
	
	/*SEARCH LOAN APPLICATION FORM GROUP -- Written by William*/
	public function searchLoanApplicationGrpRecovery()
	{
	    $_POST = json_decode(trim(file_get_contents('php://input')), true);
	    try {
	        $loan_acc_no_Grp =  $this->input->post('loan_acc_no_Grp',true);
	        if($loan_acc_no_Grp == ''){
	            $output = array(
	                'msg'=> 'Resquest Error !!!',
	                'success' =>false
	            );
	        }else{
	            
	            $data['result']=$this->database->GetAllSelectedMemberByGrpLoanAccNo($loan_acc_no_Grp);
	            $data['group_details']=$this->database->GetGroupDetailsByGrpLoanAccNo($loan_acc_no_Grp);
	            $data['assignRO']=$this->database->GetAssignROByGrpLoanAccNo($loan_acc_no_Grp);
	            $output = array(
	                'check' => $data['result'],
	                'html'=>$this->load->view('datafragment/dataTable/Loan_application_memberlist_recovery_table',$data,true),
	                'Group_details'=>$this->load->view('admin/LoanAccGrpInfo',$data,true),
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
	
}

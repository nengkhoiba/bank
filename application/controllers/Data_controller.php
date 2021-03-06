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
	
	public function HardRemove()
	{
	    
	    try {
	        $IdsArray = json_decode($this->input->post('dataArr',true), TRUE);
	        $tableName = $this->input->post('table',true);
	        $this->database->HardRemoveRecordById($IdsArray,$tableName);
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
	        $data['result']=$this->database->GetDropDownList($tblName);
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
			 if (empty($this->input->post('buffer_day',true))) {
	            $errorMSG = " Buffer days is required";
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
				$Fine_type = $this->db->escape_str ( trim ( $this->input->post('Fine_type',true) ) );
				$Fine_value = $this->db->escape_str ( trim ( $this->input->post('Fine_value',true) ) );
				$buffer_day = $this->db->escape_str ( trim ( $this->input->post('buffer_day',true) ) );
				$Loan_type = $this->db->escape_str ( trim ( $this->input->post('Loan_type',true) ) );
	            
				if($postType ==0)
				{
    				$result = $this->database->addLoanmasterModel( $loanmaster_loan_name,$loanmaster_loan_pc,$loanmaster_loan_pc_type,$loanmaster_tenure_type,$loanmaster_tenure_min,$loanmaster_tenure_max,$loanmaster_min_amount,$loanmaster_max_amount,$Fine_type,$Fine_value,$buffer_day,$Loan_type);
    				if($result['code'] == 1){
    				    $status = array("success" => true,"msg" => "Save sucessfull!");
    				}else{
    				    $status = array("success" => false,"msg" => "Fail to save !!!");
    				}
				}
				else 
				{
				    $result = $this->database->updateLoanmasterModel($postType,$loanmaster_loan_name,$loanmaster_loan_pc,$loanmaster_loan_pc_type,$loanmaster_tenure_type,$loanmaster_tenure_min,$loanmaster_tenure_max,$loanmaster_min_amount,$loanmaster_max_amount,$Fine_type,$Fine_value,$buffer_day,$Loan_type);
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
	            $branch_name = $this->db->escape_str ( trim ( $this->input->post('branch_name',true) ) );
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
	            $LegerArray=$this->db_model->getLedgerIdFromMapping("DIPOSIT");
	            $opening=$this->db_model->getCustomerBalance($customer_account_no);
	            $closing=$this->db_model->getCustomerBalance($customer_account_no)+$customer_deposite_amount;
	             
	            $jsonData=array("header"=>array(
	                "Acc_no"=>$customer_account_no,
	            	"opening"=>$opening,
	            	"closing"=>$closing,
	                "Amount"=>$customer_deposite_amount,
	                "TransactionID"=>$customer_deposit_tranId,
	                "Naration"=>$customer_deposite_narration,
	                "TransactionType"=>"R",
	                "IsManual"=>"0"),
	                "footer"=>array(
	                    array(
	                        "Ledger_type"=>"CR",
	                        "Ledger_id"=>$LegerArray["CR"],
	                        "Ledger_name"=>$this->db_model->GetLedgerName($LegerArray["CR"]),
	                        "Amount"=>$customer_deposite_amount,
	                        "IsInward"=>"1"),
	                    array(
	                        "Ledger_type"=>"DR",
	                        "Ledger_id"=>$LegerArray["DR"],
	                        "Ledger_name"=>$this->db_model->GetLedgerName($LegerArray["DR"]),
	                        "Amount"=>$customer_deposite_amount,
	                        "IsInward"=>"1")));
	                    
	                    $result=$this->db_model->updateTransaction($jsonData, $GLOBALS['financial_id'],$GLOBALS['branch_id'],$GLOBALS['Added_by']);	
	                    
	                if($result != '')
	                {
	                    $status = array("success" => true,"msg" => 'Voucher no. '.$result.' is generated for diposite (Amount '.$customer_deposite_amount.')',"voucherNo" => $result,"Balance"=>$closing);
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
	            
	            $LegerArray=$this->db_model->getLedgerIdFromMapping("WITHDRAW");
	            $opening=$this->db_model->getCustomerBalance($customer_account_no);
	            $closing=$this->db_model->getCustomerBalance($customer_account_no)-$customer_withdrawals_amount;
	            $jsonData=array("header"=>array(
	                "Acc_no"=>$customer_account_no,
	            	"opening"=>$opening,
	            	"closing"=>$closing,
	                "Amount"=>$customer_withdrawals_amount,
	                "TransactionID"=>$customer_withdrawals_tranId,
	                "Naration"=>$customer_withdrawals_narration,
	                "TransactionType"=>"P",
	                "IsManual"=>"0"),
	                "footer"=>array(
	                    array(
	                        "Ledger_type"=>"CR",
	                        "Ledger_id"=>$LegerArray["CR"],
	                        "Ledger_name"=>$this->db_model->GetLedgerName($LegerArray["CR"]),
	                        "Amount"=>$customer_withdrawals_amount,
	                        "IsInward"=>"0"),
	                    array(
	                        "Ledger_type"=>"DR",
	                        "Ledger_id"=>$LegerArray["DR"],
	                        "Ledger_name"=>$this->db_model->GetLedgerName($LegerArray["DR"]),
	                        "Amount"=>$customer_withdrawals_amount,
	                        "IsInward"=>"0")));
	                    
	                    $result=$this->db_model->updateTransaction($jsonData, $GLOBALS['financial_id'],$GLOBALS['branch_id'],$GLOBALS['Added_by']);
	                    
	                    if($result != '')
	                    {
	                        $status = array("success" => true,"msg" => 'Voucher no. '.$result.' is generated for withdrawals (Amount '.$customer_withdrawals_amount.')',"voucherNo" => $result,"Balance"=>$closing);
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

	/*SEARCH INDIVIDUAL ACCOUNT FOR LOAN APPLY -- Written by Riyaj*/
	public function searchIndividualAccountForLoan()
	{
	    $_POST = json_decode(trim(file_get_contents('php://input')), true);
	    try {
	        $individual_account_no =  $this->input->post('individual_account_no',true);
	        if($individual_account_no == ''){
	            $output = array(
	                'msg'=> 'Resquest Error !!!',
	                'success' =>false
	            );
	        }else{
	            $data['result']=$this->database->GetIndividualAccountInfo($individual_account_no);
	            $data['loantype']=$this->database->GetLoanTypeList();	
	            $output = array(
	            	'loantype_html'=>$this->load->view('datafragment/dropDown/LoanTypeList',$data, true),
	                'html'=>$this->load->view('datafragment/info/IndividualInfoForLoan',$data,true),
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


	/*SEARCH LOAN TYPE DETAILS -- Written by Riyaj*/
	public function searchLoanTypeDetails()
	{
	    try {
	        $loan_type_id =  $this->input->post('loan_type_id',true);
	        if($loan_type_id == ''){
	            $output = array(
	                'msg'=> 'Resquest Error !!!',
	                'success' =>false
	            );
	        }else{
	            $data['result']=$this->database->GetLoanTypeDetialList($loan_type_id);
	            $output = array(
	            	'html'=>$this->load->view('datafragment/dataTable/loan_type_details',$data,true),
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

	
	
	/*Loan calculator--Nengkhoiba */
	public function calculateLoan(){
		$data['loan']=$this->database->GenerateLoan_statement("GRP123","LAN123",25000,36,1,"01-09-2018",5,2,0.5,1,1,4,1,3); 
		$this->load->view('datafragment/interest_calculation_table',$data);
	}
 
	
	/*UPLOAD LOAN DETAILS -- Written by Riyaj*/
	public function Loan_Details_upload()
	{
	    $_POST = json_decode(trim(file_get_contents('php://input')), true);
	    $errorMSG ='';
	    try {
	         
	         if (empty($this->input->post('account_number',true))) {
	            $errorMSG = " Account no. is mandatory";
	        }
			if (empty($this->input->post('loan_amount',true))) {
	            $errorMSG = " Loan amount is mandatory";
	        }
	          if (empty($this->input->post('loanmaster_tenure_type',true))) {
	            $errorMSG = " Please select Loan Tenure interval type ";
	        }
	          if (empty($this->input->post('loan_tenure_interval_value',true))) {
	            $errorMSG = " Loan Tenure Interval value is mendatory ";
	        }
	          if (empty($this->input->post('tenure_length',true))) {
	            $errorMSG = " Loan Tenure length is mandatory";
	        }
	          if (empty($this->input->post('loan_purpose',true))) {
	            $errorMSG = " Loan purpose is mandatory";
	        }


	        
	        $status = array("success"=>false,"msg"=>$errorMSG);
	        if(empty($errorMSG)){
				
	     		$account_number = $this->db->escape_str ( trim ( $this->input->post('account_number',true) ) );
	     		$loan_master_id = $this->db->escape_str ( trim ( $this->input->post('loan_master_id',true) ) );
	     		$loan_fine_type = $this->db->escape_str ( trim ( $this->input->post('loan_fine_type',true) ) );
	     		$loan_fine_value = $this->db->escape_str ( trim ( $this->input->post('loan_fine_value',true) ) );
	     		$loan_buffer_days = $this->db->escape_str ( trim ( $this->input->post('loan_buffer_days',true) ) );
	     		$loan_calculation_type = $this->db->escape_str ( trim ( $this->input->post('loan_calculation_type',true) ) );
	     		$loan_name = $this->db->escape_str ( trim ( $this->input->post('loan_name',true) ) );
	     		$loan_pc = $this->db->escape_str ( trim ( $this->input->post('loan_pc',true) ) );
	     		$loan_pc_master_id = $this->db->escape_str ( trim ( $this->input->post('loan_pc_master_id',true) ) );
	     		$tenure_type_master_id = $this->db->escape_str ( trim ( $this->input->post('tenure_type_master_id',true) ) );
	     		$loanmaster_tenure_type = $this->db->escape_str ( trim ( $this->input->post('loanmaster_tenure_type',true) ) );
	     		$tenure_length = $this->db->escape_str ( trim ( $this->input->post('tenure_length',true) ) );
	     		$loan_purpose = $this->db->escape_str ( trim ( $this->input->post('loan_purpose',true) ) );
	     		$loan_amount = $this->db->escape_str ( trim ( $this->input->post('loan_amount',true) ) );
	     		$loan_tenure_interval_type = $this->db->escape_str ( trim ( $this->input->post('loanmaster_tenure_type',true) ) );
	     		$loan_tenure_interval_value = $this->db->escape_str ( trim ( $this->input->post('loan_tenure_interval_value',true) ) );
	     		$IsGroup = $this->db->escape_str ( trim ( $this->input->post('isGroup',true) ) );
	           
	            $result = $this->database->addLoanAppDetails($account_number,$IsGroup,$loan_master_id,$loan_fine_type,$loan_fine_value,$loan_buffer_days,$loan_calculation_type,$loan_name,$loan_pc,$loan_pc_master_id,$tenure_type_master_id,$loanmaster_tenure_type,$tenure_length,$loan_purpose,$loan_amount,$loan_tenure_interval_type,$loan_tenure_interval_value);


	            if($result['code'] == 1)
	            {
	                $status = array("success" => true,"msg" => "Add sucessfull!");
	            }
	            else
	            {
	                $status = array("success" => false,"msg" => "Fail to Add !!!");
	            }
	        }
	    } catch (Exception $ex) {
	        $status = array("success" => false,"msg" => $ex->getMessage());
	    }
	    
	    echo json_encode($status) ;
	}


	 /* GROUP LOAN SANCTION TABLE */
	public function group_sanction_table()
	{ 
		try {
			$data['result']=$this->database->Get_group_sanction_table_Record();  
			$output = array(
	        'html'=>$this->load->view('datafragment/dataTable/Group_sanction_table',$data, true),
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
	/* INDIVIDUAL LOAN SANCTION TABLE */
	public function individual_sanction_table()
	{ 
		try {
			$data['result']=$this->database->Get_individual_sanction_table_Record();  
			$output = array(
	        'html'=>$this->load->view('datafragment/dataTable/Individual_sanction_table',$data, true),
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

	/*LOAD LOAN SANCTION FORM FOR INDIVIDUAL -- Written by Riyaj*/
	public function add_loan_sanction_form()
	{
	    try {
	        $loan_app_id =  $this->input->post('loan_app_id',true);
	        if($loan_app_id == ''){
	            $output = array(
	                'msg'=> 'Resquest Error !!!',
	                'success' =>false
	            );
	        }else{

	            $data['result']=$this->database->GetLoanSanctionInfoByIndiLoanAccNo($loan_app_id);
  	            $output = array(
  	            	'html'=>$this->load->view('datafragment/addForm/individual_loan_sanction_form',$data,true),
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

	public function Loan_calculate()
	{
		$_POST = json_decode(trim(file_get_contents('php://input')), true);
		$errorMSG ='';
		try {
	
			if (empty($this->input->post('account_number',true))) {
				$errorMSG = " Account no. is mandatory";
			}
			if (empty($this->input->post('loan_amount',true))) {
				$errorMSG = " Loan amount is mandatory";
			}
			if (empty($this->input->post('loanmaster_tenure_type',true))) {
				$errorMSG = " Please select Loan Tenure interval type ";
			}
			if (empty($this->input->post('loan_tenure_interval_value',true))) {
				$errorMSG = " Loan Tenure Interval value is mendatory ";
			}
			if (empty($this->input->post('tenure_length',true))) {
				$errorMSG = " Loan Tenure length is mandatory";
			}
			
	
			 
			$status = array("success"=>false,"msg"=>$errorMSG);
			if(empty($errorMSG)){
	
				$account_number = $this->db->escape_str ( trim ( $this->input->post('account_number',true) ) );
				$loan_master_id = $this->db->escape_str ( trim ( $this->input->post('loan_master_id',true) ) );
				$loan_fine_type = $this->db->escape_str ( trim ( $this->input->post('loan_fine_type',true) ) );
				$loan_fine_value = $this->db->escape_str ( trim ( $this->input->post('loan_fine_value',true) ) );
				$loan_buffer_days = $this->db->escape_str ( trim ( $this->input->post('loan_buffer_days',true) ) );
				$loan_calculation_type = $this->db->escape_str ( trim ( $this->input->post('loan_calculation_type',true) ) );
				$loan_name = $this->db->escape_str ( trim ( $this->input->post('loan_name',true) ) );
				$loan_pc = $this->db->escape_str ( trim ( $this->input->post('loan_pc',true) ) );
				$loan_pc_master_id = $this->db->escape_str ( trim ( $this->input->post('loan_pc_master_id',true) ) );
				$tenure_type_master_id = $this->db->escape_str ( trim ( $this->input->post('tenure_type_master_id',true) ) );
				$loanmaster_tenure_type = $this->db->escape_str ( trim ( $this->input->post('loanmaster_tenure_type',true) ) );
				$tenure_length = $this->db->escape_str ( trim ( $this->input->post('tenure_length',true) ) );
				$loan_purpose = $this->db->escape_str ( trim ( $this->input->post('loan_purpose',true) ) );
				$loan_amount = $this->db->escape_str ( trim ( $this->input->post('loan_amount',true) ) );
				$loan_tenure_interval_type = $this->db->escape_str ( trim ( $this->input->post('loanmaster_tenure_type',true) ) );
				$loan_tenure_interval_value = $this->db->escape_str ( trim ( $this->input->post('loan_tenure_interval_value',true) ) );
				$IsGroup = $this->db->escape_str ( trim ( $this->input->post('isGroup',true) ) );
				                        // GenerateLoan_statement($groupACC,$LAN,$principleAmount,$LoanPc,$loanPcType,$loanPayMentDate,$bufferDate,$FineType,$FineValue,$loanCalculationType,$loanTenure,$loanTenureType,$loanInterval,$loanIntervalType)
				$data['loan']=$this->database->GenerateLoan_statement("","",$loan_amount,$loan_pc,$loan_pc_master_id,date("d-m-Y"),$loan_buffer_days,$loan_fine_type,$loan_fine_value,$loan_calculation_type,$tenure_length,$tenure_type_master_id,$loan_tenure_interval_value,$loan_tenure_interval_type);
				$status = array("success" => true,"html" => $this->load->view('datafragment/interest_calculation_table',$data,true));
			}
		} catch (Exception $ex) {
			$status = array("success" => false,"msg" => $ex->getMessage());
		}
		 
		echo json_encode($status) ;
	}

	/*UPDATE LOAN SANCTION RECORD -- Written by Riyaj*/
	public function addSanctionDetails()
	{
	    $_POST = json_decode(trim(file_get_contents('php://input')), true);
	    $errorMSG ='';
	    try {
	         
	         if (empty($this->input->post('loan_app_id',true))) {
	            $errorMSG = " Loan Account No. is mandator y";
	        }
	        
	        else
	        {
	        	$payment_mode_value=$this->input->post('payment_mode',true);
	        	if($payment_mode_value=='2')
	        	{
		        	  	if (empty($this->input->post('cheque_no',true))) {
		            	$errorMSG = " Cheque No. is mendatory ";
		        	}	        		
	        	}

	        }

	        $status = array("success"=>false,"msg"=>$errorMSG);
	        if(empty($errorMSG)){
				
	     		$loan_app_id = $this->db->escape_str ( trim ( $this->input->post('loan_app_id',true) ) );
	     		$payment_mode = $this->db->escape_str ( trim ( $this->input->post('payment_mode',true) ) );
	     		
	     		if($payment_mode=="2")
	     		{
	     			$cheque_no = $this->db->escape_str ( trim ( $this->input->post('cheque_no',true) ) );
	     		}
	     		else
	     		{
	     			$cheque_no="";
	     		}

	            $result = $this->database->updateLoanAppDetails($loan_app_id,$payment_mode,$cheque_no);


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

	
	/* LOAD APPLIED LOAN TABLE */
	public function loadAppliedLoan()
	{
	    try {
	        $data['result']=$this->database->Get_individual_sanction_table_Record();
	        $output = array(
	            'html'=>$this->load->view('datafragment/dataTable/Applied_loan_table',$data, true),
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
	public function viewLoanApplicationForm()
	{
	    try {
	        $accNo =  $this->input->post('reqId',true);
	        if($accNo == ''){
	            $output = array(
	                'msg'=> 'Resquest Error !!!',
	                'success' =>false
	            );
	        }else{
	            $data = $this->database->GetCustomerRecordByAccNo($accNo,'customer');
	            $data1 = $this->database->GetCustomerDocByAccNo($accNo);
	            $loanHistory['result'] = $this->database->GetLoanHistoryByAccNo($accNo);
	            $output = array(
	                'json'=>$data,
	                'json1'=>$data1,
	                'loan_history_html'=>$this->load->view('datafragment/dataTable/Loan_history_table',$loanHistory, true),
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

	/*GROUP LIVE SEARCH -- Written by Riyaj*/
	public function GroupSearchByKeyword()
	{
	    try {
	        $q =  $this->input->get('q',true);
	        $output = $this->database->loadGroupDataBySearchKeyword($q);
	        if ($output == null)
	        {

	        }
	       } catch (Exception $ex) {
	        $output = array(
	            'msg'=> $ex->getMessage(),
	            'success' => false
	        );
	    };
	    
	    
	    echo json_encode($output);
	}

	/*VIEW GROUP DETAILS AND MEMBERS DETAILS BY SEARCH KEYWORD -- Written by Riyaj*/
	public function searchGroupAccountForLoan()
	{
	    try {
	        $q =  $this->input->post('group_id',true);
	        if($q == ''){
	            $output = array(
	                'msg'=> 'Resquest Error !!!',
	                'success' =>false
	            );
	        }else{
	            $data['result'] = $this->database->GetGroupMemberBySearchKeyWord($q);
	            $output = array(
   	            'group_details_html'=>$this->load->view('datafragment/dataTable/',$data, true),
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


	/*SELECT GROUP DETAILS AND SELECTED MEMBERS*/
		public function LoadGroupSelected_memberlistForLoan()
	{ 	
		$id =  $this->input->get('id',true);
		try {
			$data['result']=$this->database->GetAllSelectedMember($id);  
			$data['group_details']=$this->database->GetGroupDetails($id);  
			$data['loantype']=$this->database->GetLoanTypeList();

			$output = array(
			'loantype_html'=>$this->load->view('datafragment/dropDown/LoanTypeList',$data, true),	
			'html'=>$this->load->view('datafragment/dataTable/Selected_memberlist_for_loan.php',$data,true),
			'Group_details'=>$this->load->view('datafragment/dataTable/Group_details_for_loan_app.php',$data,true),
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
	
	/*SELECT GROUP DETAILS AND SELECTED MEMBERS FOR UPLOAD LOAN DOCUMENT*/
	public function LoadGroupSelected_memberlistForUploadLoanDoc()
	{
	    $id =  $this->input->get('id',true);
	    try {
	        $data['result']=$this->database->GetAllSelectedMemberForLoanDocUpload($id);
	        $data['group_details']=$this->database->GetGroupDetails($id);
	        
	        $output = array(
	            'Selected_group_memberlist'=>$this->load->view('datafragment/dataTable/Selected_memberlist_for_loan_doc_table.php',$data,true),
	            'Group_details'=>$this->load->view('datafragment/dataTable/Group_details_for_loan_app.php',$data,true),
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
	public function AddGroupLoanDocUploadForm()
	{
	    try {
	        $loan_acc_no =  $this->input->post('loan_acc_no',true);
	        if($loan_acc_no == ''){
	            $output = array(
	                'msg'=> 'Resquest Error !!!',
	                'success' =>false
	            );
	        }else{
	            $data['member_details'] = $this->database->GetCustomerRecordByLAN($loan_acc_no,'customer');
	            $data['member_loan_doc'] = $this->database->GetDocRecordByLAN($loan_acc_no);
	            $output = array(
	                'member_info_grp_loan'=>$this->load->view('datafragment/info/Member_info_group_loan',$data,true),
	                'group_member_doc_loan'=>$this->load->view('datafragment/dataTable/Member_group_loan_doc',$data,true),
	                'group_member_doc_upload_form'=>$this->load->view('datafragment/addForm/Group_loanDocUploadForm','',true),
	                'loanAccNo' => $data['member_details'][0]['Loan_acc_no'],
	                'loanMasterId' => $data['member_details'][0]['Loan_master_id'],	                
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
	
	
	/*ADD CUSTOMER DOCUMENT -- Written by William*/
	public function AddLoanDocUploadIndividualForm()
	{
	    try {
	        $loan_acc_no =  $this->input->post('loan_acc_no',true);
	        if($loan_acc_no == ''){
	            $output = array(
	                'msg'=> 'Resquest Error !!!',
	                'success' =>false
	            );
	        }else{
	            $data['member_details'] = $this->database->GetCustomerRecordByLAN($loan_acc_no,'customer');
	            $data['member_loan_doc'] = $this->database->GetDocRecordByLAN($loan_acc_no);
	            $output = array(
	                'member_info_individual_loan'=>$this->load->view('datafragment/info/Member_info_individual_loan',$data,true),
	                'member_individual_doc_loan'=>$this->load->view('datafragment/dataTable/Member_individual_loan_doc',$data,true),
	                'member_individual_doc_upload_form'=>$this->load->view('datafragment/addForm/Individual_loanDocUploadForm','',true),
	                'loanAccNo' => $data['member_details'][0]['Loan_acc_no'],
	                'loanMasterId' => $data['member_details'][0]['Loan_master_id'],
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
	
	
	/*ADD CUSTOMER DOCUMENT -- Written by William*/
	public function loadLoanDocType()
	{
	    try {
	        $Id =  $this->input->post('reqId',true);
	        if($Id == ''){
	            $output = array(
	                'msg'=> 'Resquest Error !!!',
	                'success' =>false
	            );
	        }else{
	            $data['result'] = $this->database->GetSelectListById($Id,'Loan_master_id','loan_document_type');
	            $output = array(
	                'html'=>$this->load->view('datafragment/dropDown/Select_loanDocList',$data, true),
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
	
	
	/*LOAN TYPE DROPDOWN -- Written by William*/
	public function loadLoanType()
	{
	    try {
	            $data['loantype']=$this->database->GetLoanTypeList();
	            $output = array(
	                'html'=>$this->load->view('datafragment/dropDown/LoanTypeList',$data, true),
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
	
	/*Loan Master Document Type Load*/
	public function searchLoanMasterDocType()
	{
	    try { 	        
	        $loan_type =  $this->input->post('loan_type',true);
	        if($loan_type == ''){
	            $output = array(
	                'msg'=> 'Resquest Error !!!',
	                'success' =>false
	            );
	        }else{	            
	                $data['result'] = $this->database->getLoanMasterDocType($loan_type);
	                $output = array(
	                    'loanType'=>$loan_type,
	                    'html'=>$this->load->view('datafragment/dataTable/LoanMasterDocType_table',$data, true),
	                    'success' =>true
	                );	
	        }
	                
	    } catch (Exception $ex) {
	               $status = array("success" => false,"msg" => $ex->getMessage());
	    }
	    
	    echo json_encode($output) ;
	}
	
	/*LOAN DOCUMENT TYPE EDIT SECTION*/
	public function EditLoanDocType()
	{
	    try {
	        $Id =  $this->input->post('reqId',true);
	        if($Id == ''){
	            $output = array(
	                'msg'=> 'Resquest Error !!!',
	                'success' =>false
	            );
	        }else{
	            $data = $this->database->GetRecordById($Id,'loan_document_type');
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
	
	/*LOAN DOCUMENT TYPE ADD AND UPDATE*/
	public function UpdateLoanDocType()
	{
	    $_POST = json_decode(trim(file_get_contents('php://input')), true);
	    $errorMSG ='';
	    try {
	        /* document type validation */
	        if (empty($this->input->post('document_type',true))) {
	            $errorMSG = " Title is required";
	        }
	        
	        
	        $status = array("success"=>false,"msg"=>$errorMSG);
	        if(empty($errorMSG)){
	            
	            $postype = $this->db->escape_str ( trim ( $this->input->post('postType',true) ) );
	            $loan_type = $this->db->escape_str ( trim ( $this->input->post('loanType',true) ) );
	            $document_type = $this->db->escape_str ( trim ( $this->input->post('document_type',true) ) );
	            
	            if($postype==0){
	                $result = $this->database->addLoanDocTypeModel($loan_type, $document_type);
	                if($result['code'] == 1){
	                    $status = array(
	                        "success" => true,
	                        "msg" => "Save sucessfull!",
	                        "loan_type" => $loan_type
	                    );
	                }else{
	                    $status = array("success" => false,"msg" => "Fail to save !!!");
	                }
	            }else{
	                $result = $this->database->updateLoanDocTypeModel($loan_type, $document_type, $postype);
	                if($result['code'] == 1)
	                {
	                    $status = array("success" => true,"msg" => "Update sucessfull!","loan_type" => $loan_type);
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
	
	/*LOAD LOAN VERIFIED TABLE START HERE*/
	public function loadVerifiedGrpLoan()
	{
	    try {
	        $data['result']=$this->database->GetVerifiedGrpLoanRecord();
	        $output = array(
	            'html'=>$this->load->view('datafragment/dataTable/VerifiedGrpLoan_table',$data, true),
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
	
	
	/*UPDATE CUSTOMER LOAN DOCUMENT -- Written by William*/
	public function updateCustomerLoanDoc_Grp()
	{
	    $_POST = json_decode(trim(file_get_contents('php://input')), true);
	    $errorMSG ='';
	    try {
	        /* customer loan doc type validation */
	        if (empty($this->input->post('customer_loan_doc_type_Grp',true))) {
	            $errorMSG = " Document type is required";
	        }
	        
	        /* customer loan doc type validation */
	        if (empty($this->input->post('customer_loan_doc_remark_Grp',true))) {
	            $errorMSG = " Remark is required";
	        }
	        
	        /* file validation */
	        if (empty($this->input->post('fileUpload',true))) {
	            $errorMSG = " File is required";
	        }
	        
	        
	        $status = array("success"=>false,"msg"=>$errorMSG);
	        if(empty($errorMSG)){
	            
	            $loan_acc_no = $this->db->escape_str ( trim ( $this->input->post('loanAccNo_Grp',true) ) );
	            $loan_master_id = $this->db->escape_str ( trim ( $this->input->post('loanMasterId_Grp',true) ) );
	            $customer_loan_doc_type = $this->db->escape_str ( trim ( $this->input->post('customer_loan_doc_type_Grp',true) ) );
	            $customer_loan_doc_remark = $this->db->escape_str ( trim ( $this->input->post('customer_loan_doc_remark_Grp',true) ) );
	            $file = $this->db->escape_str ( trim ( $_POST ['fileUpload'] ) );
	            $result = $this->database->addCustomerLoanDoc($loan_acc_no, $customer_loan_doc_type,$customer_loan_doc_remark,$file);
	            if($result['code'] == 1)
	            {
	                $status = array("success" => true,"msg" => "Update sucessfull!", "loanAccNo" => $loan_acc_no, "loanMasterId" => $loan_master_id);
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
	
	
	
	/*UPDATE CUSTOMER LOAN DOCUMENT -- Written by William*/
	public function updateCustomerLoanDoc_Indi()
	{
	    $_POST = json_decode(trim(file_get_contents('php://input')), true);
	    $errorMSG ='';
	    try {
	        /* customer loan doc type validation */
	        if (empty($this->input->post('customer_loan_doc_type_Indi',true))) {
	            $errorMSG = " Document type is required";
	        }
	        
	        /* customer loan doc type validation */
	        if (empty($this->input->post('customer_loan_doc_remark_Indi',true))) {
	            $errorMSG = " Remark is required";
	        }
	        
	        /* file validation */
	        if (empty($this->input->post('fileUpload_Indi',true))) {
	            $errorMSG = " File is required";
	        }
	        
	        
	        $status = array("success"=>false,"msg"=>$errorMSG);
	        if(empty($errorMSG)){
	            
	            $loan_acc_no = $this->db->escape_str ( trim ( $this->input->post('loanAccNo_Indi',true) ) );
	            $loan_master_id = $this->db->escape_str ( trim ( $this->input->post('loanMasterId_Indi',true) ) );
	            $customer_loan_doc_type = $this->db->escape_str ( trim ( $this->input->post('customer_loan_doc_type_Indi',true) ) );
	            $customer_loan_doc_remark = $this->db->escape_str ( trim ( $this->input->post('customer_loan_doc_remark_Indi',true) ) );
	            $file = $this->db->escape_str ( trim ( $_POST ['fileUpload_Indi'] ) );
	            $result = $this->database->addCustomerLoanDoc($loan_acc_no, $customer_loan_doc_type,$customer_loan_doc_remark,$file);
	            if($result['code'] == 1)
	            {
	                $status = array("success" => true,"msg" => "Update sucessfull!", "loanAccNo" => $loan_acc_no, "loanMasterId" => $loan_master_id);
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
	
	
	
	/* Check customer document type already exists or not */
	public function checkLoanDocumentType()
	{
	    
	    
	    try {
	        $docTypeVal =  $this->input->post('doc_type',true);
	        $loan_acc_no =  $this->input->post('loan_acc_no',true);
	        if($docTypeVal == ''){
	            $output = array(
	                'msg'=> 'Resquest Error !!!',
	                'success' => false
	            );
	        }else{
	            $check = $this->database->CheckLoanDocument($docTypeVal,$loan_acc_no);
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
	    
	}
	
	
	/*DELET CUSTOMER LOAN DOCUMENT*/
	public function deleteLoanDocumentGrp()
	{
	      $IdsArray = json_decode($this->input->post('loan_acc_no_master_id',true), TRUE);
	    try {
	        $loan_acc_no = $IdsArray['loanAccNo_Grp'];
	        $loan_master_id = $IdsArray['loanMasterId_Grp'];
	        $loan_cus_doc_type_id =  $this->input->post('loan_cus_doc_type_id',true);
	        if($loan_cus_doc_type_id == ''){
	            $output = array(
	                'msg'=> 'Resquest Error !!!',
	                'success' =>false
	            );
	        }else{
	            $data = $this->database->RemoveSingleRecordById($loan_cus_doc_type_id,'loan_document');
	            $output = array(
	                'msg'=> 'Deleted sucessfull',
	                "loanAccNo" => $loan_acc_no, "loanMasterId" => $loan_master_id,
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
	
	/*DELET CUSTOMER LOAN DOCUMENT*/
	public function deleteLoanDocumentIndi()
	{
	    $IdsArray = json_decode($this->input->post('loan_acc_no_master_id',true), TRUE);
	    try {
	        $loan_acc_no = $IdsArray['loanAccNo_Indi'];
	        $loan_master_id = $IdsArray['loanMasterId_Indi'];
	        $loan_cus_doc_type_id =  $this->input->post('loan_cus_doc_type_id',true);
	        if($loan_cus_doc_type_id == ''){
	            $output = array(
	                'msg'=> 'Resquest Error !!!',
	                'success' =>false
	            );
	        }else{
	            $data = $this->database->RemoveSingleRecordById($loan_cus_doc_type_id,'loan_document');
	            $output = array(
	                'msg'=> 'Deleted sucessfull',
	                "loanAccNo" => $loan_acc_no, "loanMasterId" => $loan_master_id,
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
	
	
	/*LOAD INDIVIDUAL LOAN VERIFIED TABLE START HERE*/
	public function loadVerifiedIndiLoan()
	{
	    try {
	        $data['result']=$this->database->GetVerifiedIndiLoanRecord();
	        $output = array(
	            'html'=>$this->load->view('datafragment/dataTable/VerifiedIndiLoan_table',$data, true),
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
	
}

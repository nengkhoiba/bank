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

// 	COMMON REMOVE ITEM START HERE -- Written by William
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
	// 	COMMON REMOVE ITEM END HERE -- Written by William
	
// 	LOAD DROP DOWN DATA SECTION START HERE -- Written by William
	public function loadDropDown()
	{
	    try {
	        $tblName =  $this->input->post('tblName',true);
	        $selectedVal =  $this->input->post('selectedVal',true);
	        $data['result']=$this->database->GetAllRecord($tblName);
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
	
	public function loadAccountGrpUnder()
	{
	    try {
	        $data['result']=$this->database->GetAllActiveRecord('account_group');
	        $output = array(
	            'html'=>$this->load->view('datafragment/account/dropDown/Select_GrpUnder',$data, true),
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
	
	public function loadAccountGrpNature()
	{
	    try {
	        $data['result']=$this->database->GetAllActiveRecord('account_nature');
	        $output = array(
	            'html'=>$this->load->view('datafragment/account/dropDown/Select_GrpNature',$data, true),
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
			$data['result']=$this->database->GetAllActiveRecord('loan_master');  
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
	        if (empty($this->input->post('Name',true))) {
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
	        $data['result']=$this->database->GetAllActiveRecord('customer');
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
	
	
	
	
	
		/*Self Helf Group SHG SECTION LOAD*/
	public function loadShgmaster()
	{ 	
		try {
			$data['result']=$this->database->GetAllActiveRecord('shg_master');  
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
	        if (empty($this->input->post('design_title',true))) {
	            $errorMSG = " Title is required";
	        }
			 if (empty($this->input->post('design_title',true))) {
	            $errorMSG = " Title is required";
	        }
			 if (empty($this->input->post('design_title',true))) {
	            $errorMSG = " Title is required";
	        }
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
	
	//SHG GROUP END HERE
	
	
	
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
	
	
	/*ACCOUNT GROUP LOAD -- Written by William*/
	public function loadAccountGrp()
	{
	    try {
	        $data['result']=$this->database->GetAllActiveRecord('account_group');
	        $output = array(
	            'html'=>$this->load->view('datafragment/account/dataTable/AccountGrp_table',$data, true),
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
	
	
	/*ACCOUNT GROUP EDIT SECTION -- Written by William*/
	public function EditAccountGrp()
	{
	    try {
	        $Id =  $this->input->post('reqId',true);
	        if($Id == ''){
	            $output = array(
	                'msg'=> 'Resquest Error !!!',
	                'success' =>false
	            );
	        }else{
	            $data = $this->database->GetRecordById($Id,'account_group');
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
	
	
	
	/*ACCOUNT GROUP UPDATE  -- Written by William*/
	public function updateAccountGrp()
	{
	    $_POST = json_decode(trim(file_get_contents('php://input')), true);
	    $errorMSG ='';
	    try {
	        /* account group name validation */
	        if (empty($this->input->post('accountGrp_name',true))) {
	            $errorMSG = " Group name is required";
	        }
	        /* account group under validation */
	        if (empty($this->input->post('accountGrp_under',true))) {
	            $errorMSG = " Group under is required";
	        }
	        /* account group nature validation */
	        if (empty($this->input->post('accountGrp_nature',true))) {
	            $errorMSG = " Group nature is required";
	        }
	        
	        
	        $status = array("success"=>false,"msg"=>$errorMSG);
	        if(empty($errorMSG)){
	            
	            $postType = $this->db->escape_str ( trim ( $this->input->post('postType',true) ) );
	            $accountGrp_name = $this->db->escape_str ( trim ( $this->input->post('accountGrp_name',true) ) );
	            $accountGrp_under = $this->db->escape_str ( trim ( $this->input->post('accountGrp_under',true) ) );
	            $accountGrp_nature = $this->db->escape_str ( trim ( $this->input->post('accountGrp_nature',true) ) );
	            
	            if($postType == 0)
	            {
    	            $result = $this->database->addAccountGrpModel( $accountGrp_name,$accountGrp_under,$accountGrp_nature);
    	            if($result['code'] == 1){
    	                $status = array("success" => true,"msg" => "Save sucessfull!");
    	            }else{
    	                $status = array("success" => false,"msg" => "Fail to save !!!");
    	            }
	            }
	            
	            else
	            {
	                $result = $this->database->updateAccountGrpModel( $postType,$accountGrp_name,$accountGrp_under,$accountGrp_nature);
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
	
	
	
	/*ACCOUNT LEDGER LOAD -- Written by William*/
	public function loadAccountLedger()
	{
	    try {
	        $data['result']=$this->database->GetAllActiveRecord('account_ledger');
	        $output = array(
	            'html'=>$this->load->view('datafragment/account/dataTable/AccountLedger_table',$data, true),
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
	
	/*ACCOUNT LEDGER EDIT SECTION -- Written by William*/
	public function EditAccountLedger()
	{
	    try {
	        $Id =  $this->input->post('reqId',true);
	        if($Id == ''){
	            $output = array(
	                'msg'=> 'Resquest Error !!!',
	                'success' =>false
	            );
	        }else{
	            $data = $this->database->GetRecordById($Id,'account_ledger');
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
	
	
	/*ACCOUNT GROUP UPDATE -- Written by William*/
	public function updateAccountLedger()
	{
	    $_POST = json_decode(trim(file_get_contents('php://input')), true);
	    $errorMSG ='';
	    try {
	        /* account ledger name validation */
	        if (empty($this->input->post('accountLedger_name',true))) {
	            $errorMSG = " Group name is required";
	        }
	        /* account ledger under validation */
	        if (empty($this->input->post('accountLedger_grpUnder',true))) {
	            $errorMSG = " Account group under is required";
	        }
	        /* account ledger open validation */
	        if (empty($this->input->post('accountLedger_open',true))) {
	            $errorMSG = " Opening balance is required";
	        }
	        
	        
	        $status = array("success"=>false,"msg"=>$errorMSG);
	        if(empty($errorMSG)){
	            
	            $postType = $this->db->escape_str ( trim ( $this->input->post('postType',true) ) );
	            $accountLedger_name = $this->db->escape_str ( trim ( $this->input->post('accountLedger_name',true) ) );
	            $accountLedger_grpUnder = $this->db->escape_str ( trim ( $this->input->post('accountLedger_grpUnder',true) ) );
	            $accountLedger_open = $this->db->escape_str ( trim ( $this->input->post('accountLedger_open',true) ) );
	            
	            if($postType == 0)
	            {
    	            $result = $this->database->addAccountLedgerModel( $accountLedger_name,$accountLedger_grpUnder,$accountLedger_open);
    	            if($result['code'] == 1){
    	                $status = array("success" => true,"msg" => "Save sucessfull!");
    	            }else{
    	                $status = array("success" => false,"msg" => "Fail to save !!!");
    	            }
	            }
	            else
	            {
    	            $result = $this->database->updateAccountLedgerModel( $postType,$accountLedger_name,$accountLedger_grpUnder,$accountLedger_open);
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
	        $data['result']=$this->database->GetAllActiveRecord('customer');
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
	            $data['result'] = $this->database->GetRecordById($Id,'customer');
	            $output = array(
	                'html'=>$this->load->view('datafragment/updateForm/CustomerDocUpload_addForm',$data, true),
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
	        /* file type validation */
	        if (empty($this->input->post('customer_doc_filetype',true))) {
	            $errorMSG = " File type of Birth is required";
	        }
	        /* file validation */
	        if (empty($this->input->post('fileUpload',true))) {
	            $errorMSG = " File is required";
	        }
	        
	        
	        $status = array("success"=>false,"msg"=>$errorMSG);
	        if(empty($errorMSG)){
	            
	            $customer_id = $this->db->escape_str ( trim ( $this->input->post('customer_id',true) ) );
	            $customer_doc_type = $this->db->escape_str ( trim ( $this->input->post('customer_doc_type',true) ) );
	            $customer_doc_filetype = $this->db->escape_str ( trim ( $this->input->post('customer_doc_filetype',true) ) );
	            $file = $this->db->escape_str ( trim ( $this->input->post('fileUpload',true) ) );
	            
	            $result = $this->database->addCustomerDoc($customer_id, $customer_doc_type, $customer_doc_filetype,$file);
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

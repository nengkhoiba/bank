<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_controller extends CI_Controller {
	
	function __construct()
    {
    	parent::__construct();
    	$this->load->model('Account_model', 'account');
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
	
    public function loadAccountGrpUnder()
    {
        try {
            $data['result']=$this->account->GetAllActiveRecord('account_group');
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
            $data['result']=$this->account->GetAllActiveRecord('account_nature');
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
    
    public function loadAccountLedgerDropDown()
    {
        try {
            $data['result']=$this->account->GetAllActiveRecord('account_ledger');
            $output = array(
                'html'=>$this->load->view('datafragment/account/dropDown/Select_LedgerHead',$data, true),
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
    
    /*ACCOUNT GROUP LOAD -- Written by William*/
    public function loadAccountGrp()
    {
        try {
            $data['result']=$this->account->GetAccountGrpRecord();
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
                $data = $this->account->GetRecordById($Id,'account_group');
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
                    $result = $this->account->addAccountGrpModel( $accountGrp_name,$accountGrp_under,$accountGrp_nature);
                    if($result['code'] == 1){
                        $status = array("success" => true,"msg" => "Save sucessfull!");
                    }else{
                        $status = array("success" => false,"msg" => "Fail to save !!!");
                    }
                }
                
                else
                {
                    $result = $this->account->updateAccountGrpModel( $postType,$accountGrp_name,$accountGrp_under,$accountGrp_nature);
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
            $data['result']=$this->account->GetAccountLedgerRecord();
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
                $data = $this->account->GetRecordById($Id,'account_ledger');
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
                    $result = $this->account->addAccountLedgerModel( $accountLedger_name,$accountLedger_grpUnder,$accountLedger_open);
                    if($result['code'] == 1){
                        $status = array("success" => true,"msg" => "Save sucessfull!");
                    }else{
                        $status = array("success" => false,"msg" => "Fail to save !!!");
                    }
                }
                else
                {
                    $result = $this->account->updateAccountLedgerModel( $postType,$accountLedger_name,$accountLedger_grpUnder,$accountLedger_open);
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
    
    /*LOAD TRANSACTION TABLE -- Written by William*/
    public function loadAccTran()
    {
        try {
            $data['result']=$this->account->LoadAccTransaction();
            $output = array(
                'html'=>$this->load->view('datafragment/dataTable/Acc_tran_table.php',$data, true),
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

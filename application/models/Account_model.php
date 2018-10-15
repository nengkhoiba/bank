<?php
class Account_model extends CI_Model
{
	function __construct()
	{
		parent::__construct ();
		$this->load->helper('date');
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
	function CheckAadhaarNo($aadhaar_no)
	{
	    $query = $this->db->get_where('customer', array('aadhaar_no' => $aadhaar_no));
	    return $query->result ();
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
	
	
	/*LOAD ACCOUNT GROUP TABLE */
	function GetAccountGrpRecord()
	{
	    //data is retrive from this query
	    $sql=  "SELECT ag.Group_name,agu.Group_name as Group_under,anu.Name as Group_nature, ag.ID
    			from account_group ag
                LEFT JOIN account_group agu ON agu.ID  = ag.Group_under
    			LEFT JOIN account_nature anu ON anu.ID  = ag.Group_nature
                WHERE ag.isActive = 1";
	    
	    $query = $this->db->query($sql);
	    return $query->result_array();
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
	
	
	/*LOAD ACCOUNT LEDGER TABLE */
	function GetAccountLedgerRecord()
	{
	    //data is retrive from this query
	    $sql=  "SELECT al.Ledger,al.Open_balance,agu.Group_name as Group_ID, al.ID
    			from account_ledger al
                LEFT JOIN account_group agu ON agu.ID  = al.Group_ID
                WHERE al.isActive = 1";
	    
	    $query = $this->db->query($sql);
	    return $query->result_array();
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
	
	
	
	//Generate Voucher
	private function generateVoucher($transactionType,$financialYearId,$branchId){
		$voucher="";
		$sql="SELECT YEAR(NOW()) AS FinancialYear";
		$yearQuery=$this->db->query($sql);
		$yearResult=$yearQuery->result_array();
		$year=$yearResult[0]['FinancialYear'];
		$this->db->select('COUNT(ID) AS voucherCount')
		->from('transaction_header')
		->where(array('FinancialYear_id' => $financialYearId,'Branch_id' => $branchId));
		$query = $this->db->get();
		$Result=$query->result_array();
		$Count=$Result[0]['voucherCount'];
		$voucher=$transactionType.$year.($Count+1);
		return $voucher;
	}
	
	public function updateAccountHeader($accountNo,$amount,$transactionId,$naration,$tranType,$isManual,$financialYearId,$branchId,$added_by){
		$voucherNo=$this->generateVoucher($tranType, $financialYearId, $branchId);
		$date = new \Datetime('now');
		$data = array(
				'Voucher_no'=> $voucherNo ,
				'Acc_no'=>  $accountNo,
				'Amount'=>  $amount,
				'Tranction_id'=>  $transactionId,
				'Naration'=>  $naration,
				'Transaction_type'=>  $tranType,
				'IsManual'=>  $isManual,
				'FinancialYear_id'=>  $financialYearId,
				'Branch_id'=>  $branchId,
				'Added_by'=>  $added_by,
				'Added_on'=>  date('Y-m-d H:i:s',now()),
				'IsActive'=>  '1'
		);
		$this->db->insert('transaction_header', $data);
		$last_id = $this->db->insert_id();
		
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			$voucherNo="0";
		}else{
			
		}
		return $voucherNo;
	}
	
	public function updateAccountFooter($voucherNo,$accountNo,$ledgerType,$ledger_id,$ledger_name,$amount,$IsInward,$financialYearId,$branchId,$added_by){
		$status="1";
		$date = new \Datetime('now');
		$data = array(
				'Voucher_no'=> $voucherNo ,
				'Acc_no'=> $accountNo ,
				'Ledger_type'=>  $ledgerType,
				'Ledger_id'=>  $ledger_id,
				'Ledger_name'=>  $ledger_name,
				'Amount'=>  $amount,
				'IsInward'=>  $IsInward,
				'FinancialYear_id'=>  $financialYearId,
				'Branch_id'=>  $branchId,
				'Added_by'=>  $added_by,
				'Added_on'=>  date('Y-m-d H:i:s',now()),
				'IsActive'=>  '1'
		);
		$this->db->insert('transaction_footer', $data);
		$last_id = $this->db->insert_id();
		
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			$status="0";
		}
		return $status;
	}
	public function updateTransaction($jsonData,$financialId,$branchId,$addedBy){
		//var table = $('#example-table').tableToJSON();
		//$_POST = json_decode(trim(file_get_contents('php://input')), true);
		$return="0";
		$this->db->trans_begin();
		
		$header=$jsonData['header'];
		$footer=$jsonData['footer'];
		
		$voucher=$this->updateAccountHeader($header['Acc_no'],$header['Amount'] , $header['TransactionID'], $header['Naration'], $header['TransactionType'], $header['IsManual'], $financialId, $branchId, $addedBy);
		
		if($voucher!="0"){
			foreach ($footer AS $row){
				$status=$this->updateAccountFooter($voucher, $header['Acc_no'], $row['Ledger_type'], $row['Ledger_id'], $row['Ledger_name'], $row['Amount'], $row['IsInward'], $financialId, $branchId, $addedBy);
				if($status!="0"){
					$return="1";
				}else{
					$return="0";
					break;
				}
			}
		}else{
			$return="0";
		}
		if($return!="0"){
			$this->db->trans_commit();
			$return=$voucher;
		}else{
			$this->db->trans_rollback();
		}
		return $return;	
	}
	
	/*GET ACCOUNT TRANSACTION -- William*/
	
	function LoadAccTransaction()
	{
	    //data is retrive from this query
	    $sql=   "SELECT
                DATE_FORMAT(transaction_footer.Added_on, '%d/%m/%Y') AS TransactionDate,
                transaction_header.Naration AS Particular,
                transaction_header.Tranction_id AS RefNo,
                transaction_header.Amount AS Amount,
                (10000) AS balance,
                CASE WHEN transaction_header.Transaction_type='R' THEN transaction_footer.Amount ELSE '' END AS Diposit,
                CASE WHEN transaction_header.Transaction_type='P' THEN transaction_footer.Amount ELSE '' END AS Withdraw
                
                FROM transaction_footer
                LEFT JOIN transaction_header ON transaction_footer.Voucher_no=transaction_header.Voucher_no
                WHERE
                
                transaction_header.IsActive=1
                AND transaction_footer.IsActive=1
                AND transaction_footer.Ledger_type='CR'
                ORDER BY transaction_footer.ID asc ";
	    $query = $this->db->query($sql);
	    return $query->result_array();
	}
	
}
<?php
class Account_model extends CI_Model
{
	function __construct()
	{
		parent::__construct ();
		$this->load->helper('date');
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
	
}
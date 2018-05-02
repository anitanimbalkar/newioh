<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');
class Controller_Caccountmanager extends Controller  {
	//Get my account details
	public function action_getbalance()
	{		
		try {
			$obj_user 		= Auth::instance()->get_user();
			$objAccounts 	= ORM::factory('billingaccount');
			$accountdetails = $objAccounts->where('refaccountuserid_c','=',$obj_user->id)->find()->as_array();
			$data = array();
			$data['type'] = "done";
			$data['data'] = json_encode($accountdetails);
			die(json_encode($data));
		} catch (Exception $e) {
			$data = array();
			$data['type'] ="error";
			$data['message'] = 'Exception Message: '.$e->getMessage().'<br/><br/> Please report this as a bug.';
			die(json_encode($data));
		}
	}
	public function action_rechabyreceipt()
	{
		$data = array();
		try {
					$objAccounts=ORM::factory('ayushreceipt')->where('rcptno_c','=',$_POST['receid'])->find();
					$recstatus = $objAccounts->status_c; 	
				if($recstatus == 'accepted'){
						$rechargeamount = $_POST['amountbyreceipt'];
						$obj_user = Auth::instance()->get_user();
							$patient_id = $obj_user->id;			
							$object_patient = ORM::factory('user')->where('id','=',$patient_id)->find();
							$user_account_object = ORM::factory('billingaccount')->where('refaccountuserid_c', '=', $object_patient->id)->find();
							$arr_accounts = include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/config/accounts.php');
							$result = transaction::transfer(ORM::factory('billingaccount')->where('refaccountuserid_c','=',$arr_accounts['provisionaccountuserid'])->find()->accountcode_c,$user_account_object->accountcode_c,6,$rechargeamount,6);
						
						$objAccounts=ORM::factory('ayushreceipt')->where('rcptno_c','=',$_POST['receid'])->find();
							$objAccounts->status_c 	= 'Claimed';
							$objAccounts->update();
						
						$data['type'] ="success";
						die(json_encode($data));
				}else{
						showNotification('300','20','invalide','Please enter valide Receipt no.','notification','diaconfirmation',5000);
					
				}
			} catch (Exception $e) {			
				$data['type'] ="error";
				$data['message'] = 'Exception Message: '.$e->getMessage().'<br/><br/> Please report this as a bug.';
				die(json_encode($data));
		}
	}
	
	public function action_approvedreceipt()
	{			
		$data = array();
		try {
			$objAccounts=ORM::factory('ayushreceipt')->where('rcptno_c','=',$_GET['receid'])->find();
				$recstatus = $objAccounts->status_c; 	
				if($recstatus != 'Approved'){
						$rechargeamount = $_GET['amountbyreceipt'];
							$patient_id = $objAccounts->refuserid_c;			
							$object_patient = ORM::factory('user')->where('id','=',$patient_id)->find();
							$user_account_object = ORM::factory('billingaccount')->where('refaccountuserid_c', '=', $object_patient->id)->find();
							$arr_accounts = include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/config/accounts.php');
							$result = transaction::transfer(ORM::factory('billingaccount')->where('refaccountuserid_c','=',$arr_accounts['provisionaccountuserid'])->find()->accountcode_c,$user_account_object->accountcode_c,6,$rechargeamount,6);
						
							$objAccounts->status_c 	= 'Approved';
							$objAccounts->update();						
				}
		}
	catch (Exception $e) {			
	$data['type'] ="error";
	$data['message'] = 'Exception Message: '.$e->getMessage().'<br/><br/> Please report this as a bug.';
	die(json_encode($data));
	}					
	
			$data['type'] ="success";
			die(json_encode($data));
}
	
	
	public function action_getreceiptdetails()
	{	
	try {
			$objAccounts 	= ORM::factory('ayushreceipt')->where('rcptno_c','=',$_GET['receiptno'])->find();
			//$accountdetails = $objAccounts->mobileno_c;
			$data = array();
			$data['type'] = "done";
			$data['amount'] = $objAccounts ->amount_c;						
			$data['rcptno'] = $objAccounts ->rcptno_c;
			$data['rcptdate'] = $objAccounts ->rcptdate_c;
			$data['description'] = $objAccounts ->description_c;
				
					$obj_user = Auth::instance()->get_user();
					$id = $obj_user->id;
					$objuser = ORM::factory('user')->where('id','=',$id)->find();
						$data['mobilenumber'] = $objuser ->mobileno1_c;
						$data['userId'] = $objuser ->id;
			
			die(json_encode($data));
		} catch (Exception $e) {
			$data = array();
			$data['type'] ="error";
			$data['message'] = 'Exception Message: '.$e->getMessage().'<br/><br/> Please report this as a bug.';
			die(json_encode($data));
		}
	}
	public function action_getreceiptchkdetails()
	{		
	try {
		$data = array();
			$objAccounts = ORM::factory('allreceipt')->where('rcptno','=',$_GET['receiptno'])->find();
				$data['mobilenumber']= $objAccounts->mobileno;
				$data['amount'] 	 = $objAccounts->amount;
				$data['userId'] 	 = $objAccounts->payeruserid;			
				$data['rcptno']	     = $objAccounts->rcptno;
				$data['rcptdate']    = $objAccounts->rcptdate;
				$data['description'] = $objAccounts->description;
				$data['chequeId']    = $objAccounts->chequeno;			
				$data['bank']        = $objAccounts->bankname;
				$data['chequedate']  = $objAccounts->chequedate;
				$data['bankbranch']  = $objAccounts->branchname;					
				$data['fname'] 		 = $objAccounts->firstname;
				$data['lname'] 		 = $objAccounts->lastname;
				$data['emailid'] 	 = $objAccounts->email;	
				$data['alladd']      = $objAccounts->fulladdress;
				$data['landmark']    = $objAccounts->nearlandmark;
				$data['flineadd']    = $objAccounts->line1;
				$data['state']       = $objAccounts->state;					
				$data['country']     = $objAccounts->country;
				$data['pincode']     = $objAccounts->pin;
				$data['locality']    = $objAccounts->location;	
				$data['city']        = $objAccounts->city;
				$data['payname']     = $objAccounts->payername;
				$data['sta']         = $objAccounts->status;
				$data['fsename']     = $objAccounts->csrname;
				$data['paymode']     = $objAccounts->modeofpayment;
				$data['depositsta']     = $objAccounts->depositstatus;
				$data['reasonforreject']     = $objAccounts->reasonforrejection;
				$data['dateforreject']     = $objAccounts->dateofrejection;
			die(json_encode($data));
		} catch (Exception $e) {
			$data['type'] ="error";
			$data['message'] = 'Exception Message: '.$e->getMessage().'<br/><br/> Please report this as a bug.';
			die(json_encode($data));
		}
	}
	
	// Get Beneficiary account details
	public function action_getbeneficiarydetails()
	{		
		try {
			$obj_user 		= ORM::factory('user')->where('id','=',$_GET['beneficiaryid'])->find();
			$objAccounts 	= ORM::factory('billingaccount');
			$accountdetails = $objAccounts->where('refaccountuserid_c','=',$obj_user->id)->find()->as_array();
			$data = array();
			$data['type'] = "done";
			$data['data'] = json_encode($accountdetails);
			die(json_encode($data));
		} catch (Exception $e) {
			$data = array();
			$data['type'] ="error";
			$data['message'] = 'Exception Message: '.$e->getMessage().'<br/><br/> Please report this as a bug.';
			die(json_encode($data));
		}
	}
	
	//Common function to credit account
	private function creditaccount($beneficiaryUserId,$amount,$accountcode){
		$arr_accounts = include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/config/accounts.php');
		try {
			$obj_user 		= ORM::factory('user')->where('id','=',$beneficiaryUserId)->find();
			$objAccounts	= ORM::factory('billingaccount');
			$objAccounts 	= $objAccounts->where('refaccountuserid_c','=',$obj_user->id)->find();
			
			if($objAccounts->id == '')
			{
				$objAccounts=ORM::factory('billingaccount');
				$objAccounts->accountcode_c 		= 'IOH'.$obj_user->id.rand(10000,99999);
				$objAccounts->refaccountuserid_c 	= $obj_user->id;
				$objAccounts->createddate_c 		= date('Y-m-d g:i:s a');
				$objAccounts->debitedamount_c 		= 0;
				$objAccounts->creditedamount_c 		= 0;
				$objAccounts->netbalance_c	 		= 0;
				$objAccounts->lastupdateddate_c		= date('Y-m-d g:i:s a');
				$objAccounts->lastupdatedby_c 		= $obj_user->id;
				$objAccounts->save();
				$postfix = '';
				for($i=0;$i<(10-strlen($objAccounts->id));$i++)
				{
					$postfix = $postfix.'0';
				}
				$accountcode = 'IOH'.$postfix.$objAccounts->id;

				$objAccounts->accountcode_c			= $accountcode;	
				$objAccounts->update();
			}
						
			if($objAccounts->id != '')
			{
				$result = transaction::transferforebs(ORM::factory('billingaccount')->where('refaccountuserid_c','=',$arr_accounts['collectionaccountuserid'])->find()->accountcode_c,$accountcode,1,0,6);
			}
			
			$data = array();
			$data['amount'] = $amount;
			$data['reference_no'] = $result['data']['cr_code'];
			$data['description'] = 'recharge';
			
			return $data;
		} catch (Exception $e) {
			$data = array();
			$data['type'] ="error";
			$data['message'] = 'Exception Message: '.$e->getMessage().'<br/><br/> Please report this as a bug.';
			return $data;
		}
	}
	
	// Action to recharge others account
	public function action_rechargeOthersAccount()
	{
		$arr_ebs = include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/config/ebs.php');
		if($_POST)
		{
			$amount = $_POST['amount'];
			$convertedamount = $amount;
			if($_POST['currency'] != 'INR')
				$convertedamount = $this->convertcurrency($_POST['amount'],$_POST['currency'],'INR');
			$session = Session::instance();
			$session->set('convertedamount', $convertedamount);
			
			$data 	= $this->creditaccount($_POST['beneficiaryid'],$amount,$_POST['accountcode_c']);
			$returnurl 	= $arr_ebs['ebsreturnurl'];
			$mode		= $arr_ebs['ebsmode'];
			$hashData = $arr_ebs['ebskey']."|".$arr_ebs['ebsaccountid']."|".$amount."|".$data['reference_no']."|".$returnurl."|".$mode;
			$secure_hash = strtoupper(md5($hashData));
			$data['secure_hash'] = $secure_hash;
			die(json_encode($data));
		}
	}
	
	// recharge own account
	public function action_recharge()
	{
		$arr_ebs = include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/config/ebs.php');
		if($_POST)
		{
			$amount = $_POST['amount'];
			$convertedamount = $amount;
			if($_POST['currency'] != 'INR')
				$convertedamount = $this->convertcurrency($_POST['amount'],$_POST['currency'],'INR');
			
			$session = Session::instance();
			$session->set('convertedamount', $convertedamount);
			
			$data 	= $this->creditaccount(Auth::instance()->get_user()->id,$amount,$_POST['accountcode_c']);
	
			$returnurl 	= $arr_ebs['ebsreturnurl'];
			$mode		= $arr_ebs['ebsmode'];
			$hashData = $arr_ebs['ebskey']."|".$arr_ebs['ebsaccountid']."|".$amount."|".$data['reference_no']."|".$returnurl."|".$mode;
			$secure_hash = strtoupper(md5($hashData));
			$data['secure_hash'] = $secure_hash;
			die(json_encode($data));
		}
	}
public function action_claimreceipt()
	{
		$objAccounts=ORM::factory('ayushreceipt')->where('rcptno_c','=',$_GET['receid'])->find();
						$objAccounts->status_c 	= 'Claimed';
						$objAccounts->refuserid_c 	= $_GET['iohid'];
						$objAccounts->update();
			
			$data = array();
			$data['message'] = 'success';
			die(json_encode($data));
	}
public function action_claimreceiptclient()
	{
		$obj_user = Auth::instance()->get_user();
		$id = $obj_user->id;
		$objAccounts=ORM::factory('ayushreceipt')->where('rcptno_c','=',$_GET['receid'])->find();
						$objAccounts->status_c 	= 'Claimed';
						$objAccounts->refuserid_c 	= $id;
						$objAccounts->update();
			
			$data = array();
			$data['message'] = 'success';
			die(json_encode($data));
	}

public function action_claimreceiptcre()
	{
		$objAccounts = ORM::factory('ayushreceipt')->where('rcptno_c','=',$_GET['ReceiptNo2'])->find();
						$objAccounts->status_c 	= 'Claimed';
						$objAccounts->refuserid_c 	= $_GET['IOHid2'];
						$objAccounts->update();
			
			$data = array();
			$data['message'] = 'success';
			die(json_encode($data));
	}	
	private function convertcurrency($amount,$fromCurrency,$toCurrency){
	
		$amount = urlencode($amount);
		$from_Currency = urlencode($fromCurrency);
		$to_Currency = urlencode($toCurrency);
		$get = file_get_contents("https://www.google.com/finance/converter?a=$amount&from=$from_Currency&to=$to_Currency");

		$get = explode("<span class=bld>",$get);
		$get = explode("</span>",$get[1]);  
		$converted_amount = preg_replace("/[^0-9\.]/", null, $get[0]);
		
		return $converted_amount;
	}
	public function action_convertcurrency(){
		$amount 	= $_GET['amount'];
		$fromCurrency 	= $_GET['from'];
		$toCurrency 	= $_GET['to'];
		$convertedamount = $this->convertcurrency($amount,$fromCurrency,$toCurrency);
		$data = array();
 		$data['type'] = 'success';
		$data['data'] = $convertedamount;
		die(json_encode($data));
	}
	public function action_includeebsform(){
		try{
			$content = View::factory('vuser/vpayment/vebsform');
			$userId  = $this->request->post("userId");
			$reference_no  	= $this->request->post("reference_no");
			$description  	= $this->request->post("description");
			//$secure_hash  	= $this->request->post("secure_hash");
			$amount 	= $this->request->post("amount");
			$payment_option	= $this->request->post("payment_option");
			$display_currency = $this->request->post("display_currency");

			$arr_ebs 	= include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/config/ebs.php');
			$obj_user 	= ORM::factory('user')->where('id','=',$userId)->find();
			$objAdr		= ORM::factory('address')->where('id','=',$obj_user->refaddresshome1_c)->find();
			
			$accountid 	= $arr_ebs['ebsaccountid'];
			$returnurl 	= $arr_ebs['ebsreturnurl'];
			$mode		= $arr_ebs['ebsmode'];
			$billingname	= $obj_user->Firstname_c.' '.$obj_user->lastname_c;
			$billingaddr	= $objAdr->line1_c." ".$objAdr->nearlandmark_c.' '.$objAdr->location_c;
			$billingcity	= $objAdr->city_c;
			$billingstate	= $objAdr->state_c;
			$billingzip	= $objAdr->pin_c;
			$billingcountry	= $objAdr->country_c;
			$billingcountry	= 'IND';
			$billingemail	= $obj_user->email;
			$billingtelephone =  $obj_user->mobileno1_c;
			
			////Calculation of Secure hash /////
			$hashData = $arr_ebs['ebskey'];
			$channel = 0;
			$currency = "INR";
			$page_id = 6755;

				$arr_POST['account_id'] = trim($accountid);
				$arr_POST['address'] = trim($billingaddr);
				$arr_POST['city'] = trim($billingcity);
				$arr_POST['amount'] = trim($amount);
				$arr_POST['channel'] = trim($channel);
				$arr_POST['country'] = trim($billingcountry);
				$arr_POST['currency'] = trim($currency);
				$arr_POST['description'] = trim($description);
				$arr_POST['email'] = trim($billingemail);
				$arr_POST['mode'] = trim($mode);
				$arr_POST['name'] = trim($billingname);
				$arr_POST['page_id'] = trim($page_id);
			//	$arr_POST['payment_option'] = trim($payment_option);
				$arr_POST['phone'] = trim($billingtelephone);
				$arr_POST['postal_code'] = trim($billingzip);
				$arr_POST['reference_no'] = trim($reference_no);
				$arr_POST['returnurl'] = trim($returnurl);
				$arr_POST['state'] = trim($billingstate);
				
			ksort($arr_POST);
			foreach ($arr_POST as $key => $value){
				if (strlen($value) > 0) {
					$hashData .= '|'.$value;
				}
			}
			$secure_hash = strtoupper(md5($hashData));
			
			////////////////////////////////////
			
			$content->bind('account_id',$accountid);
			$content->bind('amount',$amount);
			$content->bind('description',$description);
			$content->bind('secure_hash',$secure_hash);
			$content->bind('reference_no',$reference_no);
			$content->bind('return_url',$returnurl);
			$content->bind('mode',$mode);
			$content->bind('name',$billingname);
			$content->bind('address',$billingaddr);
			$content->bind('city',$billingcity);	
			$content->bind('state',$billingstate);	
			$content->bind('postal_code',$billingzip);
			$content->bind('country',$billingcountry);
			$content->bind('email',$billingemail);
			$content->bind('phone',$billingtelephone);
			//$content->bind('display_currency',$display_currency);
			//$content->bind('payment_option',$payment_option);
			$content->bind('page_id',$page_id);
			$content->bind('currency',$currency);
			$content->bind('channel',$channel);
			
			$this->response->body($content);
		}catch(Exception $e){
			throw new Exception($e);
		}
		
	}
}

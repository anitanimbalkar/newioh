<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/notificationsender.php');

class Controller_Cpayment extends Controller_Ctemplatefornotfromsystem  {
	public function action_cancel(){
		$content 	= View::factory('vuser/vpayment/vpaymentcancellation');
		$this->template->content = $content;
		$session = Session::instance();
		$proceedlink = $session->get_once('followlink');
		$response = array();
		$response['ResponseMessage'] = 'Transaction Cancelled !!';
		$session->delete('followlink');
		$content->bind('response', $response);
		$content->bind('proceedlink', $proceedlink);
	}
	public function action_success()
	{
		$arr_ebs 	= include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/config/ebs.php');
       	$obj_user 	= Auth::instance()->get_user();
		$secret_key = $arr_ebs['ebskey'];	 // Your Secret Key
		
		if(isset($_GET['DR'])) {
			$DR = preg_replace("/\s/","+",$_GET['DR']);
			require($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/rc43.php');
			$rc4 = new Crypt_RC4($secret_key);
			$QueryString = base64_decode($DR);
			$rc4->decrypt($QueryString);
			$QueryString = explode('&',$QueryString);

			$response = array();
			foreach($QueryString as $param){
				$param = explode('=',$param);
				$response[$param[0]] = urldecode($param[1]);
			}
			if($response['ResponseCode'] == '0'){
		
				$session = Session::instance();
				$convertedamount = $session->get_once('convertedamount');
				$session->delete('convertedamount');
				$response['Amount'] = $convertedamount;
				$content 	= View::factory('vuser/vpatient/vsuccess');
				try{
					$objStatements	= ORM::factory('billingstatement')->where('statementcode_c','=',$response['MerchantRefNo'])->where('status_c','=','started')->find();
					if($objStatements->id != null){
						$objStatements->ammount_c 			= $response['Amount'];
						$objStatements->status_c 			= "completed";
						$objStatements->credit_c			= $response['Amount'];
						$objStatements->netbalance_c		= $objStatements->netbalance_c + $response['Amount'];
						$objStatements->bankpaymentid_c		= $response['PaymentID'];
						$objStatements->banktransactionid_c	= $response['TransactionID'];
						$objStatements->bankpaymentmethod_c	= $response['PaymentMethod'];
						$objStatements->bankresponsecode_c	= $response['ResponseCode'];
						$objStatements->bankdatecreated_c	= $response['DateCreated'];
						$objStatements->bankisflagged_c		= $response['IsFlagged'];
						$objStatements->bankmode_c			= $response['Mode'];
						$objStatements->bankmerchantrefno_c	= $response['MerchantRefNo'];
						$objStatements->update();
						$notification=  array();
						if($objStatements->accountuserid_c == $objStatements->updatedby_c){
							$notification['id']=$obj_user->id;$notification['template']='account_charged';$notification['sms']='true'; $notification['creditedamount']=$objStatements->credit_c;$notification['currentbalance']=$objStatements->netbalance_c;
							helper_notificationsender::sendnotification($notification);
						}else{
							//send notification to user who is charging account
							$notification['id']				= $objStatements->updatedby_c;
							$notification['email']			= 'true';
							$notification['template']		= 'others_account_charged';
							$notification['creditedamount']	= $objStatements->credit_c;
							
							$objBeneficary = ORM::factory('user')->where('id','=',$objStatements->accountuserid_c)->find();
							$notification['beneficiaryname']= $objBeneficary->Firstname_c.' '.$objBeneficary->lastname_c;
							
							$notification['username']		= $obj_user->Firstname_c.' '.$obj_user->lastname_c;
							helper_notificationsender::sendnotification($notification);
							
							// send notification to beneficiary
							$notification['id']				= $objStatements->accountuserid_c;
							$notification['template']		= 'account_charged';
							$notification['sms']			= 'true';
							$notification['creditedamount']	= $objStatements->credit_c;
							$notification['currentbalance']	= $objStatements->netbalance_c;
							helper_notificationsender::sendnotification($notification);
						}
										
						$cr_account 						= ORM::factory('billingaccount')->where('accountcode_c','=',$objStatements->accountcode_c)->find();
						$creditedamount 					= $cr_account->netbalance_c + $response['Amount'];
						$cr_account->netbalance_c 			= $creditedamount;
						$cr_account->creditedamount_c		= $cr_account->creditedamount_c + $response['Amount'];
						$cr_account->lastupdateddate_c		= date('Y-m-d g:i:s a');
						$cr_account->lastupdatedby_c 		= $obj_user->id;
						$cr_account->update();
						
						$objStatements	= ORM::factory('billingstatement')->where('id','=',($objStatements->id)+1)->find();
						$objStatements->ammount_c 			= $response['Amount'];
						$objStatements->debit_c				= $response['Amount'];
						$objStatements->status_c 			= "completed";
						$objStatements->netbalance_c		= $objStatements->netbalance_c - $response['Amount'];
						$objStatements->bankpaymentid_c		= $response['PaymentID'];
						$objStatements->banktransactionid_c	= $response['TransactionID'];
						$objStatements->bankpaymentmethod_c	= $response['PaymentMethod'];
						$objStatements->bankresponsecode_c	= $response['ResponseCode'];
						$objStatements->bankdatecreated_c	= $response['DateCreated'];
						$objStatements->bankisflagged_c		= $response['IsFlagged'];
						$objStatements->bankmode_c			= $response['Mode'];
						$objStatements->bankmerchantrefno_c	= $response['MerchantRefNo'];
						$objStatements->update();
						
						$dr_account 						= ORM::factory('billingaccount')->where('accountcode_c','=',$objStatements->accountcode_c)->find();
						$debitedamount 						= $dr_account->netbalance_c -  $response['Amount'];
						$dr_account->netbalance_c 			= $debitedamount;
						$dr_account->debitedamount_c 		= $dr_account->debitedamount_c + $response['Amount'];
						$dr_account->lastupdateddate_c		= date('Y-m-d g:i:s a');
						$dr_account->lastupdatedby_c 		= $obj_user->id;
						$dr_account->update();
					}
				}catch(Exception $e){
					throw new Exception($e);
				}
			}else{
				$content 	= View::factory('vuser/vpatient/vfailure');
				$objStatements	= ORM::factory('billingstatement')->where('statementcode_c','=',$response['MerchantRefNo'])->find();
				if($objStatements->id != null){
					$objStatements->ammount_c 			= $response['Amount'];
					$objStatements->status_c 			= "failed";
					$objStatements->credit_c			= $response['Amount'];
					$objStatements->netbalance_c		= $objStatements->netbalance_c;
					$objStatements->bankpaymentid_c		= $response['PaymentID'];
					$objStatements->banktransactionid_c	= $response['TransactionID'];
					$objStatements->bankpaymentmethod_c	= $response['PaymentMethod'];
					$objStatements->bankresponsecode_c	= $response['ResponseCode'];
					$objStatements->bankdatecreated_c	= $response['DateCreated'];
					$objStatements->bankisflagged_c		= $response['IsFlagged'];
					$objStatements->bankmode_c			= $response['Mode'];
					$objStatements->bankmerchantrefno_c	= $response['MerchantRefNo'];
					$objStatements->update();
				}else{
					throw new Exception('Transaction failed but failed to update India Online Health account.');
				}
			}
		}
		$content->bind('response', $response);
		$this->template->content = $content;
		$session = Session::instance();
		$proceedlink = $session->get_once('followlink');
		$session->delete('followlink');
		$content->bind('proceedlink', $proceedlink);
	}
}

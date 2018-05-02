<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/export.php');
include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');

class Controller_Cinvoicedata extends Controller  {
	public function action_getspdata()
	{
		$objServiceProvider = ORM::factory('allserviceprovider')->where('spuserid','=',$_GET['spid'])->find();
			$spname = $objServiceProvider->spname;
			$mobileno = $objServiceProvider->mobileno;
			$add = $objServiceProvider->spaddress;
			$data = array();
				$data['message'] = 'success';
				$data['spname'] = $spname;
				$data['spmono'] = $mobileno;
				$data['spadd'] = $add;
				die(json_encode($data));					
	}
	public function action_generatereceipt()
	{
			$receiptformat = 'INVRCP';				
				$objAccounts=ORM::factory('maxrecieptno')->where('datestr','=',$receiptformat)->find();
				$lastreceiptno = $objAccounts->latestno;
				$obj_user = ORM::factory('user')->where('id','=',$_POST['spiohid'])->find();
				$firstname = $obj_user->Firstname_c;
			
			if($lastreceiptno != null){	
								$chknoid = null;
								if($_POST['mySelect'] == 'Online' ){									
									$j = $lastreceiptno + 1;
										$postfix = '';
											for($a=0;$a<(6-strlen($j));$a++)
												{
													$postfix = $postfix.'0';
												}
											$rcptno = $receiptformat.$postfix.$j;	
											
											$objAccounts=ORM::factory('ayushreceipt');
											$objAccounts->rcptno_c 			= $rcptno;
											$objAccounts->rcptdate_c 		= $_POST['Receiptdate'];
											$objAccounts->status_c 		    = 'invoice';
											$objAccounts->amount_c 		    = $_POST['Amount'];
											$objAccounts->modeofpayment_c 	= $_POST['mySelect'];
											$objAccounts->mobileno_c 		= $_POST['Mobileno'];
											$objAccounts->description_c     = $_POST['Description'];
											$objAccounts->refuserid_c 		= $_POST['spiohid'];
											$objAccounts->refchequeid_c       = $chknoid;
											$objAccounts->save();									
										
										
										$notification=  array();
										$notification['id']= $_POST['spiohid'];
										$notification['template']='receiptmail';
										$notification['email']='true';
										$notification['name']=$firstname;
										$notification['rcptno']=$rcptno;
										$notification['amt']=$_POST['Amount'];
										$notification['sms']='true';
							
							$rechargeamount = $_POST['Amount'];		
							$patient_id = $_POST['spiohid'];			
							$object_patient = ORM::factory('user')->where('id','=',$patient_id)->find();
							$user_account_object = ORM::factory('billingaccount')->where('refaccountuserid_c', '=', $object_patient->id)->find();
							$arr_accounts = include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/config/accounts.php');
							$result = transaction::transfer(ORM::factory('billingaccount')->where('refaccountuserid_c','=',$arr_accounts['provisionaccountuserid'])->find()->accountcode_c,$user_account_object->accountcode_c,6,$rechargeamount,6);
						
									
									
									helper_notificationsender::sendnotification($notification);										
									$data = array();
									$data['message'] = 'success';
									$data['rcptno'] = $objAccounts->rcptno_c;
									$data['rcpdate'] = $_POST['Receiptdate'];
									$data['rcppayname'] = $_POST['serviceproviderName'];
									$data['rcptamt'] = $objAccounts->amount_c;
									die(json_encode($data));
								}else{
									if($_POST['mySelect'] == 'Cheque/DD' ){
											$objayushchqdd = ORM::factory('ayushchqdd');
												$objayushchqdd->chequeno_c 		= $_POST['chequeddNo'];
												$objayushchqdd->bankname_c 		= $_POST['BankName'];
												$objayushchqdd->branchname_c 	= $_POST['branch'];
												$objayushchqdd->chequedate_c 	= $_POST['chequedate'];
												$objayushchqdd->amount_c 		= $_POST['Amount'];
												$objayushchqdd->status_c 		= 'suspense';
												$objayushchqdd->save();
												$chknoid = $objayushchqdd->id;
									}
									$j = $lastreceiptno + 1;
										$postfix = '';
											for($a=0;$a<(6-strlen($j));$a++)
												{
													$postfix = $postfix.'0';
												}
											$rcptno = $receiptformat.$postfix.$j;	
											
											$objAccounts=ORM::factory('ayushreceipt');
											$objAccounts->rcptno_c 			= $rcptno;
											$objAccounts->rcptdate_c 		= $_POST['Receiptdate'];
											$objAccounts->status_c 		    = 'invoice';
											$objAccounts->amount_c 		    = $_POST['Amount'];
											$objAccounts->modeofpayment_c 	= $_POST['mySelect'];
											$objAccounts->mobileno_c 		= $_POST['Mobileno'];
											$objAccounts->description_c     = $_POST['Description'];
											$objAccounts->refuserid_c 		= $_POST['spiohid'];
											$objAccounts->refchequeid_c       = $chknoid;
											$objAccounts->save();									
										
										
										$notification=  array();
										$notification['id']= $_POST['spiohid'];
										$notification['template']='receiptmail';
										$notification['email']='true';
										$notification['name']=$firstname;
										$notification['rcptno']=$rcptno;
										$notification['amt']=$_POST['Amount'];
										$notification['sms']='true';
										helper_notificationsender::sendnotification($notification);
										
									$data = array();
									$data['message'] = 'success';
									$data['rcptno'] = $objAccounts->rcptno_c;
									$data['rcpdate'] = $_POST['Receiptdate'];
									$data['rcppayname'] = $_POST['serviceproviderName'];
									$data['rcptamt'] = $objAccounts->amount_c;
									die(json_encode($data));
								}
						}else{						
								if($_POST['mySelect'] == 'Online' ){
									
									$j = $lastreceiptno + 1;
											$postfix = '';
												for($a=0;$a<(6-strlen($j));$a++)
													{
														$postfix = $postfix.'0';
													}
												$rcptno = $receiptformat.$postfix.$j;	
							
							$rechargeamount = $_POST['Amount'];		
							$patient_id = $_POST['spiohid'];			
							$object_patient = ORM::factory('user')->where('id','=',$patient_id)->find();
							$user_account_object = ORM::factory('billingaccount')->where('refaccountuserid_c', '=', $object_patient->id)->find();
							$arr_accounts = include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/config/accounts.php');
							$result = transaction::transfer(ORM::factory('billingaccount')->where('refaccountuserid_c','=',$arr_accounts['provisionaccountuserid'])->find()->accountcode_c,$user_account_object->accountcode_c,6,$rechargeamount,6);
						
										

										$objAccounts=ORM::factory('ayushreceipt');
											$objAccounts->rcptno_c 			= $rcptno;
											$objAccounts->rcptdate_c 		= $_POST['Receiptdate'];
											$objAccounts->status_c 		    = 'invoice';
											$objAccounts->amount_c 		    = $_POST['Amount'];
											$objAccounts->modeofpayment_c 	= $_POST['mySelect'];
											$objAccounts->mobileno_c 		= $_POST['Mobileno'];
											$objAccounts->description_c     = $_POST['Description'];
											$objAccounts->refuserid_c 		= $_POST['spiohid'];
											$objAccounts->refchequeid_c       = $chknoid;
											$objAccounts->save();									
										
										
										$notification=  array();
										$notification['id']= $_POST['spiohid'];
										$notification['template']='receiptmail';
										$notification['email']='true';
										$notification['name']=$firstname;
										$notification['rcptno']=$rcptno;
										$notification['amt']=$_POST['Amount'];
										$notification['sms']='true';
									
						
									
									helper_notificationsender::sendnotification($notification);
										
									$data = array();
									$data['message'] = 'success';
									$data['rcptno'] = $objAccounts->rcptno_c;
									$data['rcpdate'] = $_POST['Receiptdate'];
									$data['rcppayname'] = $_POST['serviceproviderName'];
									$data['rcptamt'] = $objAccounts->amount_c;
									die(json_encode($data));
								}else{
										if($_POST['mySelect'] == 'Cheque/DD' ){
											$objayushchqdd=ORM::factory('ayushchqdd');
													$objayushchqdd->chequeno_c 		= $_POST['chequeddNo'];
													$objayushchqdd->bankname_c 		= $_POST['BankName'];
													$objayushchqdd->branchname_c 	= $_POST['branch'];
													$objayushchqdd->chequedate_c 	= $_POST['chequedate'];
													$objayushchqdd->amount_c 		= $_POST['Amount'];
													$objayushchqdd->status_c 		= 'suspense';
													$objayushchqdd->save();
										}
											$j = $lastreceiptno + 1;
											$postfix = '';
												for($a=0;$a<(6-strlen($j));$a++)
													{
														$postfix = $postfix.'0';
													}
												$rcptno = $receiptformat.$postfix.$j;	
												
										$objayushreceipt=ORM::factory('ayushreceipt');
													$objayushreceipt->rcptno_c 			= $rcptno;
													$objayushreceipt->amount_c  		= $_POST['Amount'];
													$objayushreceipt->rcptdate_c 		= $_POST['Receiptdate'];
													$objayushreceipt->description_c 	= $_POST['Description'];
													$objayushreceipt->modeofpayment_c 	= $_POST['mySelect'];	
													$objayushreceipt->status_c 		    = 'invoice';
													$objayushreceipt->mobileno_c 		= $_POST['Mobileno'];
													$objayushreceipt->refuserid_c 		= $_POST['spiohid'];
													$objayushreceipt->save();
													
											$notification=  array();
											$notification['id']= $_POST['spiohid'];
											$notification['template']='receiptmail';
											$notification['email']='true';
											$notification['name']=$firstname;
											$notification['rcptno']=$rcptno;
											$notification['amt']=$_POST['Amount'];
											$notification['sms']='true';
											helper_notificationsender::sendnotification($notification);
													
										$data = array();
										$data['message'] = 'success';
										$data['rcptno'] = $objayushreceipt->rcptno_c;
										$data['rcpdate'] = $_POST['Receiptdate'];
										$data['rcppayname'] = $_POST['serviceproviderName'];
										$data['rcptamt'] = $objayushreceipt->amount_c;
										die(json_encode($data));
									}
							}			
	}
	public function action_addinvoicedata()
	{
		$invoiceformat = $_GET['invformat'];	
		$objinvoicet=ORM::factory('invoice');		
			
				$objinvnosmax=ORM::factory('maxinvno')->where('datestr','=',$invoiceformat)->find();
				$lastinvno = $objinvnosmax->latestno;
				$i = 1 + $lastinvno;
				$postfix = '';
				for($a=0;$a<(6-strlen($i));$a++)
				{
					$postfix = $postfix.'0';
				}
				$invoiceno = $invoiceformat.$postfix.$i;							
  		
			$objinvoicet->refinvcuserid_c = $_GET['spidno'];
			$objinvoicet->invoiceid_c = $invoiceno;
			$objinvoicet->invoicedate_c = $_GET['invoicedate'];
			$rechargeamount = $_GET['netbalance'];		
		
		$patient_id = $_GET['spidno'];				
		$object_patient = ORM::factory('user')->where('id','=',$patient_id)->find();
		$user_account_object = ORM::factory('billingaccount')->where('refaccountuserid_c','=',$object_patient->id)->find();
		$arr_accounts = include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/config/accounts.php');
		$result = transaction::transfer($user_account_object->accountcode_c,ORM::factory('billingaccount')->where('refaccountuserid_c','=',$arr_accounts['provisionaccountuserid'])->find()->accountcode_c,6,$rechargeamount,6);
																																									
			
			$objinvoicet->description1_c = $_GET['description1'];
			$objinvoicet->description2_c = $_GET['description2'];
			$objinvoicet->description3_c = $_GET['description3'];
			$objinvoicet->description4_c = $_GET['description4'];
			$objinvoicet->description5_c = $_GET['description5'];
			$objinvoicet->description6_c = $_GET['description6'];
			$objinvoicet->description7_c = $_GET['description7'];
			$objinvoicet->description8_c = $_GET['description8'];
			$objinvoicet->description9_c = $_GET['description9'];
			$objinvoicet->description10_c = $_GET['description10'];
			
			$objinvoicet->charge1_c = $_GET['amt1'];
			$objinvoicet->charge2_c = $_GET['amt2'];
			$objinvoicet->charge3_c = $_GET['amt3'];
			$objinvoicet->charge4_c = $_GET['amt4'];
			$objinvoicet->charge5_c = $_GET['amt5'];
			$objinvoicet->charge6_c = $_GET['amt6'];
			$objinvoicet->charge7_c = $_GET['amt7'];
			$objinvoicet->charge8_c = $_GET['amt8'];
			$objinvoicet->charge9_c = $_GET['amt9'];
			$objinvoicet->charge10_c = $_GET['amt10'];
			
			$objinvoicet->qty1_c = $_GET['qty1'];
			$objinvoicet->qty2_c = $_GET['qty2'];
			$objinvoicet->qty3_c = $_GET['qty3'];
			$objinvoicet->qty4_c = $_GET['qty4'];
			$objinvoicet->qty5_c = $_GET['qty5'];
			$objinvoicet->qty6_c = $_GET['qty6'];
			$objinvoicet->qty7_c = $_GET['qty7'];
			$objinvoicet->qty8_c = $_GET['qty8'];
			$objinvoicet->qty9_c = $_GET['qty9'];
			$objinvoicet->qty10_c = $_GET['qty10'];
			
			$objinvoicet->rate1_c = $_GET['uamt1'];
			$objinvoicet->rate2_c = $_GET['uamt2'];
			$objinvoicet->rate3_c = $_GET['uamt3'];
			$objinvoicet->rate4_c = $_GET['uamt4'];
			$objinvoicet->rate5_c = $_GET['uamt5'];
			$objinvoicet->rate6_c = $_GET['uamt6'];
			$objinvoicet->rate7_c = $_GET['uamt7'];
			$objinvoicet->rate8_c = $_GET['uamt8'];
			$objinvoicet->rate9_c = $_GET['uamt9'];
			$objinvoicet->rate10_c = $_GET['uamt10'];
			
			$objinvoicet->totalamt_c = $_GET['total'];
			$objinvoicet->totalnetamt_c = $_GET['netbalance'];
			
			if (isset($_GET['des0']))
				$objinvoicet->taxdesc1_c = $_GET['des0'];
			if (isset($_GET['des1']))				
				$objinvoicet->taxdesc2_c = $_GET['des1'];
			if (isset($_GET['des2']))			
				$objinvoicet->taxdesc3_c = $_GET['des2'];
			if (isset($_GET['des3']))			
				$objinvoicet->taxdesc4_c = $_GET['des3'];
			if (isset($_GET['des4']))			
				$objinvoicet->taxdesc5_c = $_GET['des4'];
			
			if (isset($_GET['per0']))
				$objinvoicet->taxperc1_c = $_GET['per0'];
			if (isset($_GET['per1']))
				$objinvoicet->taxperc2_c = $_GET['per1'];
			if (isset($_GET['per2']))
				$objinvoicet->taxperc3_c = $_GET['per2'];
			if (isset($_GET['per3']))
				$objinvoicet->taxperc4_c = $_GET['per3'];
			if (isset($_GET['per4']))
				$objinvoicet->taxperc5_c = $_GET['per4'];			
			
			if (isset($_GET['net0']))
				$objinvoicet->taxnet1_c = $_GET['net0'];
			if (isset($_GET['net1']))
				$objinvoicet->taxnet2_c = $_GET['net1'];
			if (isset($_GET['net2']))
				$objinvoicet->taxnet3_c = $_GET['net2'];
			if (isset($_GET['net3']))
				$objinvoicet->taxnet4_c = $_GET['net3'];
			if (isset($_GET['net4']))
				$objinvoicet->taxnet5_c = $_GET['net4'];			
			
			$objinvoicet->status_c = 'Generated';			
			
			$objinvoicet->save();						
			$data = array();
			$data['message'] = 'success';
			$data['invid'] = $invoiceno;
			die(json_encode($data));
	}
}
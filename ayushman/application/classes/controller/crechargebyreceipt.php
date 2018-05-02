<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');
class Controller_Crechargebyreceipt extends Controller  {
		public function action_otpgenerate()
	{
		$obj_user = Auth::instance()->get_user();
		$firstname = $obj_user->Firstname_c;
		$id = $obj_user->id;
		$obj_user = ORM::factory('user')->where('id','=',$id)->find();
		$code = substr(md5(microtime()),rand(0,26),4);
		$obj_user->activationsmsotp_c= $code;		
		$obj_user->save();
		$notification=  array();
		$notification['id']=$obj_user->id;
		$notification['template']='onetimepasswd';
		$notification['email']='true';
		$notification['name']=$firstname;
		$notification['code']=$code;
		$notification['sms']='true';
		helper_notificationsender::sendnotification($notification);
		
	}
	public function action_otpgeneratebycre()
	{
		$id = $_GET['IOHid'];
		$obj_user = ORM::factory('user')->where('id','=',$id)->find();
		$code = substr(md5(microtime()),rand(0,26),4);
		$obj_user->activationsmsotp_c= $code;		
		$obj_user->save();
		$firstname = $obj_user->Firstname_c;
		$notification=  array();
		$notification['id']=$obj_user->id;
		$notification['template']='onetimepasswd';
		$notification['email']='true';
		$notification['name']=$firstname;
		$notification['code']=$code;
		$notification['sms']='true';
		helper_notificationsender::sendnotification($notification);		
	}
	public function action_getreceiptdetailssp()
	{
			$data = array(0);
			$data['datafname'] = [0];
			$data['datamobilenumb'] = [0];
			$data['dataiohi'] = [0];
			$data['dataspuseradd'] = [0];
			$i = 0 ;
			$mayname = $_GET['firstname'];
			if($_GET['firstname'] != ""){
				$mayname = '%'.$mayname.'%';
				$objAccounts = ORM::factory('allserviceprovider')->order_by('spnameofcenter','asc')->where('spnameofcenter','like',$mayname)->limit(10)->find_all();
					foreach ( $objAccounts as $objsp)
							{
										$data['datafname'][$i] = $objsp ->spnameofcenter;
										$data['datamobilenumb'][$i] = $objsp ->mobileno;
									//	$data['dataemailid'][$i] = $objsp ->email;
										$data['dataiohi'][$i] = $objsp ->spuserid;
										$data['dataspuseradd'][$i] = $objsp->spaddress;
										$i++;											
							}	
			}		
			if($_GET['mobilenum'] != ""){
				$objAccounts = ORM::factory('allserviceprovider')->order_by('spnameofcenter','asc')->where('mobileno','=',$_GET['mobilenum'] )->limit(10)->find_all();
				foreach ( $objAccounts as $objsp)
							{
										$data['datafname'][$i] = $objsp ->spnameofcenter;
										$data['datamobilenumb'][$i] = $objsp ->mobileno;
										//$data['dataemailid'][$i] = $objsp ->email;
										$data['dataiohi'][$i] = $objsp ->spuserid;
										$data['dataspuseradd'][$i] = $objsp->spaddress;
										$i++;											
							}	
			}
			if($_GET['mailid'] != ""){
				$objAccounts = ORM::factory('allserviceprovider')->order_by('spnameofcenter','asc')->where('mobileno','=',$_GET['mailid'] )->limit(10)->find_all();
				foreach ( $objAccounts as $objsp)
							{
										$data['datafname'][$i] = $objsp ->spnameofcenter;
										$data['datamobilenumb'][$i] = $objsp ->mobileno;
										//$data['dataemailid'][$i] = $objsp ->email;
										$data['dataiohi'][$i] = $objsp ->spuserid;
										$data['dataspuseradd'][$i] = $objsp->spaddress;
										$i++;											
							}	
			}
			if($_GET['IOHid'] != ""){
				$objAccounts = ORM::factory('allserviceprovider')->order_by('spnameofcenter','asc')->where('spuserid','=',$_GET['IOHid'] )->limit(10)->find_all();
				foreach ( $objAccounts as $objsp)
							{
										$data['datafname'][$i] = $objsp ->spnameofcenter;
										$data['datamobilenumb'][$i] = $objsp ->mobileno;
										//$data['dataemailid'][$i] = $objsp ->email;
										$data['dataiohi'][$i] = $objsp ->spuserid;
										$data['dataspuseradd'][$i] = $objsp->spaddress;
										$i++;											
							}	
			}
			$data['count'] = $i;
			$data['type'] ="error";
			$data['message'] = 'Exception Message: <br/><br/> Please report this as a bug.';
			die(json_encode($data));
			
	}
	public function action_getreceiptdetails()
	{
		try {
		if($_GET['IOHid'] != ''){
			$objAccounts 	= ORM::factory('allserviceprovider')->where('spuserid','=',$_GET['IOHid'])->find();
			$data = array();
			$data['type'] = "done";
			$data['spname'] = $objAccounts ->spnameofcenter;
			$data['address'] = $objAccounts ->spaddress;
			$data['mobilenumb'] = $objAccounts ->mobileno;
			$data['emailid'] = $objAccounts ->email;
			$data['iohid'] = $objAccounts ->spuserid;
		}
		/*if($_GET['mailid'] != '' ){
			$objAccounts 	= ORM::factory('user')->where('email','=',$_GET['mailid'])->find();
			$data['type'] = "done";
			$data['fname'] = $objAccounts ->Firstname_c;
			$data['lname'] = $objAccounts ->lastname_c;
			$data['mobilenumb'] = $objAccounts ->mobileno1_c;
			$data['emailid'] = $objAccounts ->email;
			$data['iohi'] = $objAccounts ->id;
			$data['refadd'] = $objAccounts->refaddresshome1_c;
		}
		if($_GET['firstname'] != ''){
			$objAccounts 	= ORM::factory('user')->where('Firstname_c','=',$_GET['firstname'])->where('lastname_c','=',$_GET['lastname'])->find();
			$data = array();
			$data['type'] = "done";
			$data['fname'] = $objAccounts ->Firstname_c;
			$data['lname'] = $objAccounts ->lastname_c;
			$data['mobilenumb'] = $objAccounts ->mobileno1_c;
			$data['emailid'] = $objAccounts ->email;
			$data['iohi'] = $objAccounts ->id;
			$data['refadd'] = $objAccounts->refaddresshome1_c;
		}
		if($_GET['mobilenum'] != '' && $_GET['firstname'] == ''){
			$objAccounts 	= ORM::factory('user')->where('mobileno1_c','=',$_GET['mobilenum'])->find();
			$data['type'] = "done";
			$data['fname'] = $objAccounts ->Firstname_c;
			$data['lname'] = $objAccounts ->lastname_c;
			$data['mobilenumb'] = $objAccounts ->mobileno1_c;
			$data['emailid'] = $objAccounts ->email;
			$data['iohi'] = $objAccounts ->id;
			$data['refadd'] = $objAccounts->refaddresshome1_c;
		}
		if($_GET['mobilenum'] != '' && $_GET['firstname'] != '' && $_GET['lastname'] != ''){
			$objAccounts 	= ORM::factory('user')->where('mobileno1_c','=',$_GET['mobilenum'])->where('Firstname_c','=',$_GET['firstname'])->where('lastname_c','=',$_GET['lastname'])->find();
			$data['type'] = "done";
			$data['fname'] = $objAccounts ->Firstname_c;
			$data['lname'] = $objAccounts ->lastname_c;
			$data['mobilenumb'] = $objAccounts ->mobileno1_c;
			$data['emailid'] = $objAccounts ->email;
			$data['iohi'] = $objAccounts ->id;
			$data['refadd'] = $objAccounts->refaddresshome1_c;
		}*/		
		die(json_encode($data));
		} catch (Exception $e) {
			$data = array();
			$data['type'] ="error";
			$data['message'] = 'Exception Message: '.$e->getMessage().'<br/><br/> Please report this as a bug.';
			die(json_encode($data));
		}
	}

	public function action_getotpdetails()
	{	
	try {
			$obj_user = Auth::instance()->get_user();
			$id = $obj_user->id;
			$objAccounts 	= ORM::factory('user')->where('id','=',$id)->find();
			$data = array();
			$data['type'] = "done";
			$data['otp'] = $objAccounts ->activationsmsotp_c;
			die(json_encode($data));
		} catch (Exception $e) {
			$data = array();
			$data['type'] ="error";
			$data['message'] = 'Exception Message: '.$e->getMessage().'<br/><br/> Please report this as a bug.';
			die(json_encode($data));
		}
	}
	public function action_getotpdetailsbycre()
	{	
	try {
			$objAccounts 	= ORM::factory('user')->where('id','=',$_GET['iohid'])->find();
			$data = array();
			$data['type'] = "done";
			$data['otp'] = $objAccounts ->activationsmsotp_c;
			die(json_encode($data));
		} catch (Exception $e) {
			$data = array();
			$data['type'] ="error";
			$data['message'] = 'Exception Message: '.$e->getMessage().'<br/><br/> Please report this as a bug.';
			die(json_encode($data));
		}
	}
	public function action_generatereceipts()
	{
		$fdate = null;
		$tdate = null;
		if($_GET['todt'] != ''){
			$todt = date_create($_GET['todt']);
				$tdate = date_format($todt,"Y-m-d");
		}
		if($_GET['fromdt'] != ''){
			$fromdt = date_create($_GET['fromdt']);
			$fdate = date_format($fromdt,"Y-m-d");
		}
				$fromdate		 = $_GET['fromdate']; 
				$noofreceipt 	 = $_GET['noofreceipt'];
				$receiptformat = $_GET['recformat'];
				
				$objAccountsmax=ORM::factory('maxrecieptno')->where('datestr','=',$receiptformat)->find();
				$lastreceiptno = $objAccountsmax->latestno;
			if($lastreceiptno != null){					
					$j = $lastreceiptno + $noofreceipt;
					for($i = $lastreceiptno + 1; $i <= $j; $i++)	
						{
							$postfix = '';
							for($a=0;$a<(6-strlen($i));$a++)
								{
									$postfix = $postfix.'0';
								}
							$rcptno = $receiptformat.$postfix.$i;
							
							$objAccounts=ORM::factory('ayushreceipt');
							$objAccounts->rcptno_c 			= $rcptno;
							$objAccounts->rcptdate_c 		= $fromdate;
							$objAccounts->status_c 		    = 'Generated';
							$objAccounts->amount_c 		    = $_GET['amt'];
							$objAccounts->description_c     = $_GET['discrip'];
							$objAccounts->validfromdate_c   = $fdate;
							$objAccounts->validtodate_c	    = $tdate;
							$objAccounts->refcorporateid_c  = $_GET['issueto'];
							$objAccounts->save();						
						}
				$data = array();
				$data['message'] = 'success';
				die(json_encode($data));						
			}else{					
					for($i = 1; $i <= $noofreceipt; $i++)	
						{
							$postfix = '';
							for($a=0;$a<(6-strlen($i));$a++)
								{
									$postfix = $postfix.'0';
								}
							$rcptno = $receiptformat.$postfix.$i;
							
							$objAccounts=ORM::factory('ayushreceipt');
							$objAccounts->rcptno_c 			= $rcptno;
							$objAccounts->rcptdate_c 		= $fromdate;
							$objAccounts->status_c 		    = 'Generated';
							$objAccounts->amount_c 		    = $_GET['amt'];
							$objAccounts->description_c     = $_GET['discrip'];
							$objAccounts->validfromdate_c   = $fdate;
							$objAccounts->validtodate_c	    = $tdate;
							$objAccounts->refcorporateid_c  = $_GET['issueto'];
							$objAccounts->save();						
						}
					$data = array();
					$data['message'] = 'success';
					die(json_encode($data));						
			}
								
	}	
	public function action_createsinglereceipt()
	{				
				$receiptformat = $_GET['recformat'];				
				$objAccounts=ORM::factory('maxrecieptno')->where('datestr','=',$receiptformat)->find();
				$lastreceiptno = $objAccounts->latestno;
				$obj_user = ORM::factory('user')->where('id','=',$_GET['IOHid'])->find();
				$firstname = $obj_user->Firstname_c;
			if($_GET['ReceiptNo'] != null){
					$objayush = ORM::factory('allreceipt')->where('rcptno','=',$_GET['ReceiptNo'])->find();
					if($objayush != null)
					{						
						if($_GET['mySelect'] == 'online' ){						
							
							$objayushreceipt=ORM::factory('ayushreceipt')->where('rcptno_c','=',$_GET['ReceiptNo'])->find();
											$objayushreceipt->amount_c  		= $_GET['Amount'];
											$objayushreceipt->description_c 	= $_GET['Description'];	
											$objayushreceipt->status_c 		    = 'Open';
											$objayushreceipt->depositstatus_c	= 'Notdeposit';
											$objayushreceipt->mobileno_c 		= $_GET['Mobileno'];
											$objayushreceipt->emailid_c 		= $_GET['Emailid'];
											$objayushreceipt->refuserid_c 		= $_GET['IOHid'];
											$objayushreceipt->onlinetrxid_c 	= $_GET['ontranNo'];
											$objayushreceipt->update();
											
									$notification=  array();
									$notification['id']= $_GET['IOHid'];
									$notification['template']='receiptmail';
									$notification['email']='true';
									$notification['name']=$firstname;
									$notification['rcptno']=$_GET['ReceiptNo'];
									$notification['amt']=$_GET['Amount'];
									$notification['sms']='true';
									helper_notificationsender::sendnotification($notification);
									
								$data = array();
								$data['message'] = 'success';
								$data['rcptno'] = $objayushreceipt->rcptno_c;
								die(json_encode($data));
					}else{
						if($_GET['mySelect'] == 'Cheque/DD' ){
									$objayushchqdd=ORM::factory('ayushchqdd');
											$objayushchqdd->chequeno_c 		= $_GET['chequeddNo'];
											$objayushchqdd->bankname_c 		= $_GET['BankName'];
											$objayushchqdd->branchname_c 	= $_GET['branch'];
											$objayushchqdd->chequedate_c 	= $_GET['chequedate'];
											$objayushchqdd->amount_c 		= $_GET['Amount'];
											$objayushchqdd->status_c 		= 'pendding';
											$objayushchqdd->save();
								}
																			
								$objayushreceipt=ORM::factory('ayushreceipt')->where('rcptno_c','=',$_GET['ReceiptNo'])->find();
											$objayushreceipt->amount_c  		= $_GET['Amount'];
											$objayushreceipt->description_c 	= $_GET['Description'];	
											$objayushreceipt->status_c 		    = 'Open';
											$objayushreceipt->depositstatus_c	= 'Notdeposit';
											$objayushreceipt->mobileno_c 		= $_GET['Mobileno'];
											$objayushreceipt->emailid_c 		= $_GET['Emailid'];
											$objayushreceipt->refuserid_c 		= $_GET['IOHid'];
											$objayushreceipt->update();
											
									$notification=  array();
									$notification['id']= $_GET['IOHid'];
									$notification['template']='receiptmail';
									$notification['email']='true';
									$notification['name']=$firstname;
									$notification['rcptno']=$_GET['ReceiptNo'];
									$notification['amt']=$_GET['Amount'];
									$notification['sms']='true';
									helper_notificationsender::sendnotification($notification);
									
								$data = array();
								$data['message'] = 'success';
								$data['rcptno'] = $objayushreceipt->rcptno_c;
								die(json_encode($data));
					}	
								
					}
			}else{						
						
					if($_GET['mySelect'] == 'online' ){						
							
						if($lastreceiptno != null){	
								$chknoid = null;							
								$j = $lastreceiptno + 1;
								for($i = $lastreceiptno + 1; $i <= $j; $i++)	
									{
										$postfix = '';
										for($a=0;$a<(6-strlen($i));$a++)
											{
												$postfix = $postfix.'0';
											}
										$rcptno = $receiptformat.$postfix.$i;							
										$objAccounts=ORM::factory('ayushreceipt');
										$objAccounts->rcptno_c 			= $rcptno;
										$objAccounts->rcptdate_c 		= $_GET['Receiptdate'];
										$objAccounts->status_c 		    = 'Open';
										$objAccounts->depositstatus_c	= 'Notdeposit';
										$objAccounts->amount_c 		    = $_GET['Amount'];
										$objAccounts->modeofpayment_c 	= $_GET['mySelect'];
										$objAccounts->mobileno_c 		= $_GET['Mobileno'];
										$objAccounts->description_c     = $_GET['Description'];
										$objAccounts->emailid_c 		= $_GET['Emailid'];
										$objAccounts->refuserid_c 		= $_GET['IOHid'];
										$objAccounts->onlinetrxid_c 	= $_GET['ontranNo'];
										$objAccounts->refchequeid_c       = $chknoid;
										$objAccounts->save();									
									}		
									
									$notification=  array();
									$notification['id']= $_GET['IOHid'];
									$notification['template']='receiptmail';
									$notification['email']='true';
									$notification['name']=$firstname;
									$notification['rcptno']=$rcptno;
									$notification['amt']=$_GET['Amount'];
									$notification['sms']='true';
									helper_notificationsender::sendnotification($notification);
									
								$data = array();
								$data['message'] = 'success';
								$data['rcptno'] = $objAccounts->rcptno_c;
								$data['mnumber'] = $objAccounts->mobileno_c;
								$data['mailid'] = $objAccounts->emailid_c;
								$data['rcptamt'] = $objAccounts->amount_c;
								die(json_encode($data));
						}else{						
								if($_GET['mySelect'] == 'Cheque/DD' ){
									$objayushchqdd=ORM::factory('ayushchqdd');
											$objayushchqdd->chequeno_c 		= $_GET['chequeddNo'];
											$objayushchqdd->bankname_c 		= $_GET['BankName'];
											$objayushchqdd->branchname_c 	= $_GET['branch'];
											$objayushchqdd->chequedate_c 	= $_GET['chequedate'];
											$objayushchqdd->amount_c 		= $_GET['Amount'];
											$objayushchqdd->status_c 		= 'pendding';
											$objayushchqdd->save();
								}
									$postfix = '';
									$i = 1;
										for($a=0; $a < 5; $a++)
											{
												$postfix = $postfix.'0';
											}
									$rcptno = $receiptformat.$postfix.$i;
										
								$objayushreceipt=ORM::factory('ayushreceipt');
											$objayushreceipt->rcptno_c 			= $rcptno;
											$objayushreceipt->amount_c  		= $_GET['Amount'];
											$objayushreceipt->rcptdate_c 		= $_GET['Receiptdate'];
											$objayushreceipt->description_c 	= $_GET['Description'];
											$objayushreceipt->modeofpayment_c 	= $_GET['mySelect'];	
											$objayushreceipt->status_c 		    = 'Open';
											$objayushreceipt->depositstatus_c	= 'Notdeposit';
											$objayushreceipt->mobileno_c 		= $_GET['Mobileno'];
											$objayushreceipt->emailid_c 		= $_GET['Emailid'];
											$objayushreceipt->refuserid_c 		= $_GET['IOHid'];
											$objayushreceipt->save();
											
									$notification=  array();
									$notification['id']= $_GET['IOHid'];
									$notification['template']='receiptmail';
									$notification['email']='true';
									$notification['name']=$firstname;
									$notification['rcptno']=$rcptno;
									$notification['amt']=$_GET['Amount'];
									$notification['sms']='true';
									helper_notificationsender::sendnotification($notification);
											
								$data = array();
								$data['message'] = 'success';
								$data['rcptno'] = $objayushreceipt->rcptno_c;
								die(json_encode($data));
						}
					}else{
						if($lastreceiptno != null){	
								$chknoid = null;
								if($_GET['mySelect'] == 'Cheque/DD' ){
									$objayushchqdd = ORM::factory('ayushchqdd');
											$objayushchqdd->chequeno_c 		= $_GET['chequeddNo'];
											$objayushchqdd->bankname_c 		= $_GET['BankName'];
											$objayushchqdd->branchname_c 	= $_GET['branch'];
											$objayushchqdd->chequedate_c 	= $_GET['chequedate'];
											$objayushchqdd->amount_c 		= $_GET['Amount'];
											$objayushchqdd->status_c 		= 'pendding';
											$objayushchqdd->save();
											$chknoid = $objayushchqdd->id;
								}
								$j = $lastreceiptno + 1;
								for($i = $lastreceiptno + 1; $i <= $j; $i++)	
									{
										$postfix = '';
										for($a=0;$a<(6-strlen($i));$a++)
											{
												$postfix = $postfix.'0';
											}
										$rcptno = $receiptformat.$postfix.$i;							
										$objAccounts=ORM::factory('ayushreceipt');
										$objAccounts->rcptno_c 			= $rcptno;
										$objAccounts->rcptdate_c 		= $_GET['Receiptdate'];
										$objAccounts->status_c 		    = 'Open';
										$objAccounts->depositstatus_c	= 'Notdeposit';
										$objAccounts->amount_c 		    = $_GET['Amount'];
										$objAccounts->modeofpayment_c 	= $_GET['mySelect'];
										$objAccounts->mobileno_c 		= $_GET['Mobileno'];
										$objAccounts->description_c     = $_GET['Description'];
										$objAccounts->emailid_c 		= $_GET['Emailid'];
										$objAccounts->refuserid_c 		= $_GET['IOHid'];
										$objAccounts->refchequeid_c       = $chknoid;
										$objAccounts->save();									
									}		
									
									$notification=  array();
									$notification['id']= $_GET['IOHid'];
									$notification['template']='receiptmail';
									$notification['email']='true';
									$notification['name']=$firstname;
									$notification['rcptno']=$rcptno;
									$notification['amt']=$_GET['Amount'];
									$notification['sms']='true';
									helper_notificationsender::sendnotification($notification);
									
								$data = array();
								$data['message'] = 'success';
								$data['rcptno'] = $objAccounts->rcptno_c;
								$data['mnumber'] = $objAccounts->mobileno_c;
								$data['mailid'] = $objAccounts->emailid_c;
								$data['rcptamt'] = $objAccounts->amount_c;
								die(json_encode($data));
						}else{						
								if($_GET['mySelect'] == 'Cheque/DD' ){
									$objayushchqdd=ORM::factory('ayushchqdd');
											$objayushchqdd->chequeno_c 		= $_GET['chequeddNo'];
											$objayushchqdd->bankname_c 		= $_GET['BankName'];
											$objayushchqdd->branchname_c 	= $_GET['branch'];
											$objayushchqdd->chequedate_c 	= $_GET['chequedate'];
											$objayushchqdd->amount_c 		= $_GET['Amount'];
											$objayushchqdd->status_c 		= 'pendding';
											$objayushchqdd->save();
								}
									$postfix = '';
									$i = 1;
										for($a=0; $a < 5; $a++)
											{
												$postfix = $postfix.'0';
											}
									$rcptno = $receiptformat.$postfix.$i;
										
								$objayushreceipt=ORM::factory('ayushreceipt');
											$objayushreceipt->rcptno_c 			= $rcptno;
											$objayushreceipt->amount_c  		= $_GET['Amount'];
											$objayushreceipt->rcptdate_c 		= $_GET['Receiptdate'];
											$objayushreceipt->description_c 	= $_GET['Description'];
											$objayushreceipt->modeofpayment_c 	= $_GET['mySelect'];	
											$objayushreceipt->status_c 		    = 'Open';
											$objayushreceipt->depositstatus_c	= 'Notdeposit';
											$objayushreceipt->mobileno_c 		= $_GET['Mobileno'];
											$objayushreceipt->emailid_c 		= $_GET['Emailid'];
											$objayushreceipt->refuserid_c 		= $_GET['IOHid'];
											$objayushreceipt->save();
											
									$notification=  array();
									$notification['id']= $_GET['IOHid'];
									$notification['template']='receiptmail';
									$notification['email']='true';
									$notification['name']=$firstname;
									$notification['rcptno']=$rcptno;
									$notification['amt']=$_GET['Amount'];
									$notification['sms']='true';
									helper_notificationsender::sendnotification($notification);
											
								$data = array();
								$data['message'] = 'success';
								$data['rcptno'] = $objayushreceipt->rcptno_c;
								die(json_encode($data));
						}
					}
				}
	}
	
	public function action_getprintdata()
	{
		$objayush = ORM::factory('allreceipt')->where('rcptno','=',$_GET['receiptno'])->find();
		$data['rcpno'] = $objayush->rcptno;
		$data['rcpdate'] = $objayush->rcptdate;		
		$data['rcpamt'] = $objayush->amount;
		$data['rcppayname'] = $objayush->payername;
		$data['paymode'] = $objayush->modeofpayment;
		$data['payiohid'] = $objayush->payeruserid;		
		$data['chequeno'] = $objayush->chequeno;		
		$data['chequedate'] = $objayush->chequedate;
		$data['bankname'] = $objayush->bankname;
		$data['branchname'] = $objayush->branchname;
		$data['onlinetrxid'] = $objayush->onlinetrxid;	
		$data['description'] = $objayush->description;			
		die(json_encode($data));
	}
	public function action_getprintdatarecpet()
	{
		$objayush = ORM::factory('allreceipt')->where('rcptno','=',$_GET['receiptno'])->where('status','=','Open')->find();
		$data['rcpno'] = $objayush->rcptno;
		$data['rcpdate'] = $objayush->rcptdate;		
		$data['rcpamt'] = $objayush->amount;
		$data['rcppayname'] = $objayush->payername;
		$data['paymode'] = $objayush->modeofpayment;
		$data['payiohid'] = $objayush->payeruserid;		
		$data['chequeno'] = $objayush->chequeno;		
		$data['chequedate'] = $objayush->chequedate;
		$data['bankname'] = $objayush->bankname;
		$data['branchname'] = $objayush->branchname;
		$data['onlinetrxid'] = $objayush->onlinetrxid;	
		$data['description'] = $objayush->description;			
		die(json_encode($data));
	}
	public function action_getdeposittransactiondata()
	{
			$objtrxdata = ORM::factory('csrtrxdetail')->where('trxid','=',$_GET['trxno'])->find();
			$data['trxid'] = $objtrxdata->trxid;
			$data['paymode'] = $objtrxdata->modeofpayment;		
			$data['trxamt'] = $objtrxdata->trxamount;
			$data['States'] = $objtrxdata->status;
			$data['allreceipt'] = $objtrxdata->allreceipts;
			$data['fsename'] = $objtrxdata->payername;		
			$data['bankname'] = $objtrxdata->bankname;
			$data['accountno'] = $objtrxdata->accountno;
			$data['accname'] = $objtrxdata->payeename;
			$data['reasonforrejection'] = $objtrxdata->reasonforrejection;
			$data['bankslip'] = $objtrxdata->slipdetails;
			$data['reject'] = $objtrxdata->reasonforrejection;
			$data['oldtranid'] = $objtrxdata->refoldid;	
		die(json_encode($data));
	}
	public function action_approvedeposittransaction()
	{
		$objtrxupdate = ORM::factory('csrtransaction')->where('id','=',$_GET['trxno'])->find();
		$objtrxupdate->status_c = 'Accepted'; 
		$objtrxupdate->update();
		$objttrxpdate = ORM::factory('csrtrxdetail')->where('trxid','=',$_GET['trxno'])->find();
		$data['mnumber'] = $objttrxpdate->payermobile;
		$data['mailid'] = $objttrxpdate->payeremail;
		
			$arra = explode(",",$_GET['allreceipt']);
			for($i = 0; $i < (count($arra)); $i++)
				{
					$objayushreceiptdeposit = ORM::factory('ayushreceipt')->where('rcptno_c','=',$arra[$i])->find();
						$objayushreceiptdeposit->refdepositid_c = $objcsrtransactions->id;
						$objayushreceiptdeposit->depositstatus_c = "Accepted";
						$objayushreceiptdeposit->update();
				}		
			$obj_user = Auth::instance()->get_user();
			$firstname = $obj_user->Firstname_c;
				$notification=  array();
				$notification['template']='rcptconfirmation';
				$notification['email']='true';
				$notification['csename']=$_GET['fsename'];
				$notification['acctmgrname']=$firstname;
				$notification['amount']=$_GET['trxamt'];
				$notification['sms']='true';
				helper_notificationsender::sendnotification($notification);
		
		
		$data = array();
		$data['message'] = 'success';
		die(json_encode($data));
	}

	public function action_setdeposite(){	
		$oldtrxid = '';
		if($_GET['oldtrxid'] != ''){
			$oldtrxid = $_GET['oldtrxid'];
			$objcsrtrans = ORM::factory('csrtransaction')->where('id','=',$_GET['oldtrxid'])->find();
			$objcsrtrans->status_c = 'Recreated';
			$objcsrtrans->update();
		}else{
			$oldtrxid = '';
		}
		$obj_user = Auth::instance()->get_user();
		$id = $obj_user->id;
		$objcsrtransactions = ORM::factory('csrtransaction');
		$objcsrtransactions->allreceipts_c = $_GET['rcArrayno'];
		$objcsrtransactions->trxamount_c   = $_GET['rcArrayamount'];
		$objcsrtransactions->payeruserid_c = $id;
		$objcsrtransactions->accountno_c   = $_GET['acctno'];
		$objcsrtransactions->payeeuserid_c = $_GET['accountantname'];
		$objcsrtransactions->description_c = $_GET['Description'];
		$objcsrtransactions->modeofpayment_c = $_GET['mySelect'];
		$objcsrtransactions->refoldid_c    = $oldtrxid;
		$objcsrtransactions->bankname_c    = $_GET['bankname'];
		$objcsrtransactions->slipdetails_c = $_GET['Bankslipno'];
		$objcsrtransactions->trxdate_c     = $_GET['depositedate'];
		$objcsrtransactions->status_c	   = 'Deposited';
		$objcsrtransactions->save();
				
		$arra = explode(",",$_GET['rcArrayno']);
			for($i = 0; $i < (count($arra)); $i++)
				{
					$objayushreceiptdeposit = ORM::factory('ayushreceipt')->where('rcptno_c','=',$arra[$i])->find();
						$objayushreceiptdeposit->refdepositid_c = $objcsrtransactions->id;
						$objayushreceiptdeposit->depositstatus_c = "Deposited";
						$objayushreceiptdeposit->update();
				}			
		$data = array();
		$data['message'] = 'success';
		$data['oldtrxid'] = $oldtrxid;
		$data['currtrxid'] = $objcsrtransactions->id;
		die(json_encode($data));
	}
	public function action_updatedeposidata(){
		
		$objcsrtrans = ORM::factory('csrtransaction')->where('id','=',$_GET['oldtrxid'])->find();
			$objcsrtrans->status_c = 'Recreated';
			$objcsrtrans->update();
		
		$data = array();
		$data['message'] = 'success';
		$data['oldtrxid'] = $oldtrxid;
		$data['currtrxid'] = $objcsrtransactions->id;
		die(json_encode($data));
	}
	public function action_updatereceiptdata()
	{				
		$chkid = null;
			if($_GET['mySelect'] == 'Cheque/DD'){
				$objayushchqdd=ORM::factory('ayushchqdd')->where('chequeno_c','=',$_GET['chequeddNo'])->find();
						$objayushchqdd->bankname_c 		= $_GET['BankName'];
						$objayushchqdd->branchname_c 	= $_GET['branch'];
						$objayushchqdd->chequedate_c 	= $_GET['chequedate'];
						$objayushchqdd->amount_c 		= $_GET['Amount'];
						$objayushchqdd->status_c 		= 'pendding';
						$objayushchqdd->update();
						$chkid = $objayushchqdd->id;
			}
				$objayushreceipt=ORM::factory('ayushreceipt')->where('rcptno_c','=',$_GET['ReceiptNo'])->find();
						$objayushreceipt->rcptdate_c 		= $_GET['Receiptdate'];
						$objayushreceipt->amount_c 		    = $_GET['Amount'];
						$objayushreceipt->description_c 	= $_GET['Description'];
						$objayushreceipt->modeofpayment_c 	= $_GET['mySelect'];		
						$objayushreceipt->refchequeid_c 	= $chkid;						
						$objayushreceipt->mobileno_c 	= $_GET['Mobileno'];
						$objayushreceipt->emailid_c 	= $_GET['Emailid'];						
						$objayushreceipt->refuserid_c 	= $_GET['IOHid'];
						$objayushreceipt->update();
			$data = array();
			$data['message'] = 'success';
			die(json_encode($data));
	}
	
	public function action_rechabyreceipt()
	{
		$data = array();
		try {
					$objAccounts=ORM::factory('ayushreceipt')->where('rcptno_c','=',$_POST['receid'])->find();
					$recstatus = $objAccounts->status_c; 	
				if($recstatus == 'claim'){
						$rechargeamount = $_POST['amountbyreceipt'];
						$obj_user = Auth::instance()->get_user();
							$patient_id = $obj_user->id;			
							$object_patient = ORM::factory('user')->where('id','=',$patient_id)->find();
							$user_account_object = ORM::factory('billingaccount')->where('refaccountuserid_c', '=', $object_patient->id)->find();
							$arr_accounts = include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/config/accounts.php');
							$result = transaction::transfer(ORM::factory('billingaccount')->where('refaccountuserid_c','=',$arr_accounts['provisionaccountuserid'])->find()->accountcode_c,$user_account_object->accountcode_c,6,$rechargeamount,6);
						
						$objAccounts=ORM::factory('ayushreceipt')->where('rcptno_c','=',$_POST['receid'])->find();
							$objAccounts->status_c 	= 'Approved';
							$objAccounts->update();
						
						$data['type'] ="success";
						die(json_encode($data));
				}
			} catch (Exception $e) {			
				$data['type'] ="error";
				$data['message'] = 'Exception Message: '.$e->getMessage().'<br/><br/> Please report this as a bug.';
				die(json_encode($data));
		}
	}
	
	public function action_cancelreceipt()
	{						
			$objAccounts=ORM::factory('ayushreceipt')->where('rcptno_c','=',$_GET['receid'])->find();
						$objAccounts->status_c 	= 'Rejected';
						$objAccounts->reasonforrejection_c 	= $_GET['reasontext'];
						$objAccounts->dateofrejection_c = date("d M Y");
						$objAccounts->update();
			
			$data = array();
			$data['message'] = 'success';
			die(json_encode($data));
	}
	public function action_rejectdeposittransaction()
	{
		$objtrxupdate = ORM::factory('csrtransaction')->where('id','=',$_GET['trxno'])->find();
		$objtrxupdate->status_c = 'Rejected'; 
		$objtrxupdate->reasonforrejection_c = $_GET['reasonforcancel']; 
		$objtrxupdate->update();
		
		$arra = explode(",",$_GET['allreceipt']);
			for($i = 0; $i < (count($arra)); $i++)
				{
					$objayushreceiptdeposit = ORM::factory('ayushreceipt')->where('rcptno_c','=',$arra[$i])->find();
						$objayushreceiptdeposit->depositstatus_c = 'Notdeposit';
						$objayushreceiptdeposit->update();
				}
				
		$data = array();
		$data['message'] = 'success';
		die(json_encode($data));
	}
	public function action_rejectdeposit()
	{
		$objtrxdata = ORM::factory('csrtransaction')->where('id','=',$_GET['trxid'])->find();
		$objtrxdata->status_c = 'Rejected'; 
		$objtrxdata->update();
		
		$data = array();
		$data['message'] = 'success';
		die(json_encode($data));
	}
	public function action_refundreceipt()
	{			
			$objAccounts=ORM::factory('ayushreceipt')->where('rcptno_c','=',$_GET['receid'])->find();
				$recstatus = $objAccounts->status_c; 						
					if($recstatus == 'Refund'){
						$rechargeamount = $_GET['amountbyreceipt'];
							$patient_id = $objAccounts->refuserid_c;			
							$object_patient = ORM::factory('user')->where('id','=',$patient_id)->find();
							$user_account_object = ORM::factory('billingaccount')->where('refaccountuserid_c', '=', $object_patient->id)->find();
							$arr_accounts = include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/config/accounts.php');
							$result = transaction::transfer($user_account_object->accountcode_c,ORM::factory('billingaccount')->where('refaccountuserid_c','=',$arr_accounts['provisionaccountuserid'])->find()->accountcode_c,6,$rechargeamount,20);
						
						
						
						$objAccounts->status_c 	= 'Refunded';
						$objAccounts->dateofrefund_c = date("d M Y");
						$objAccounts->update();
						
						$data['type'] ="success";
						die(json_encode($data));
					}
						
						
			$data = array();
			$data['message'] = 'success';
			die(json_encode($data));
	}
	public function action_approvedreceipt()
	{			
		$data = array();
		try {
			$objAccounts=ORM::factory('ayushreceipt')->where('rcptno_c','=',$_GET['receid'])->find();
				$recstatus = $objAccounts->status_c; 	
				if($recstatus == 'Claimed'){
						$rechargeamount = $_GET['amountbyreceipt'];
							$patient_id = $objAccounts->refuserid_c;			
							$object_patient = ORM::factory('user')->where('id','=',$patient_id)->find();
							$user_account_object = ORM::factory('billingaccount')->where('refaccountuserid_c', '=', $object_patient->id)->find();
							$arr_accounts = include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/config/accounts.php');
							$result = transaction::transfer(ORM::factory('billingaccount')->where('refaccountuserid_c','=',$arr_accounts['provisionaccountuserid'])->find()->accountcode_c,$user_account_object->accountcode_c,6,$rechargeamount,6);
						
						$objAccounts=ORM::factory('ayushreceipt')->where('rcptno_c','=',$_POST['receid'])->find();
							$objAccounts->status_c 	= 'Approved';
							$objAccounts->update();
						
						$data['type'] ="success";
						die(json_encode($data));
				}
		}
	catch (Exception $e) {			
	$data['type'] ="error";
	$data['message'] = 'Exception Message: '.$e->getMessage().'<br/><br/> Please report this as a bug.';
	die(json_encode($data));
	}			
}
	public function action_clearedcheque()
	{			
			$objAccounts=ORM::factory('ayushchqdd')->where('chequeno_c','=',$_GET['chequeid'])->find();
						$objAccounts->status_c 	= 'cleared';
						$objAccounts->update();
			
			$data = array();
			$data['message'] = 'success';
			die(json_encode($data));
	}
	public function action_cancelcheque()
	{				
		$objAccounts=ORM::factory('ayushchqdd')->where('chequeno_c','=',$_GET['chequeid'])->find();
				$objAccounts->status_c 	= 'notcleared';
				$objAccounts->update();
			
		$data = array();
		$data['message'] = 'success';
		die(json_encode($data));
	}
	
}

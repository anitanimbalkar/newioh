<?php defined('SYSPATH') or die('No direct script access.');

class Transaction  {

	public static function transfer($fromaccount, $toaccount, $paymentmode, $amount,$transactiontype,$arrTranferInfo=NUll)
	{
		$array_accounts = Kohana::$config->load('accounts');
		try{
			$obj_user = Auth::instance()->get_user();
			$userid="";
			if (!($obj_user))//check using cronjob to run function 
			{	
				$userid='-2';
			}
			else{
				$userid=$obj_user->id;
			}
			$objAccounts = ORM::factory('billingaccount')->where('accountcode_c','=',$fromaccount)->find();
			$netbalance = $objAccounts->netbalance_c;

			if(ORM::factory('billingaccount')->where('refaccountuserid_c','=',$array_accounts["collectionaccountuserid"])->find()->accountcode_c == $objAccounts->accountcode_c || ORM::factory('billingaccount')->where('refaccountuserid_c','=',$array_accounts["ayushmanincomeuserid"])->find()->accountcode_c == $objAccounts->accountcode_c || ORM::factory('billingaccount')->where('refaccountuserid_c','=',$array_accounts["provisionaccountuserid"])->find()->accountcode_c == $objAccounts->accountcode_c)
				$netbalance = $amount;

			if($netbalance >= $amount){
				$Obj_billingmastertransactiontype= ORM::factory('billingmastertransactiontype')->where('id','=',$transactiontype)->find();
				if($arrTranferInfo == NULL)
				{
					$transactiontype= $Obj_billingmastertransactiontype->typename_c;
				}
				else
				{
					$string_transactiontype= $Obj_billingmastertransactiontype->typename_c;
					$array_variables = $arrTranferInfo['variable'];
					foreach($array_variables as $variable)//replace variables 
					{
						if (array_key_exists($variable , $arrTranferInfo) == "true")//check for user given all required values.
						{	
							$$variable = $arrTranferInfo[$variable]; 
							$string_transactiontype =str_replace ('$'.$variable, $$variable , $string_transactiontype );
						}
						else 
						{
							throw new Exception("Complete Information is not provided for transaction type ".$variable);
						}
					
					}
					$transactiontype=$string_transactiontype;
				}
				$creditCode = transaction::credit($fromaccount, $toaccount, $paymentmode, $amount,$transactiontype);

				$debitCode = transaction::debit($fromaccount, $toaccount, $paymentmode, $amount,$transactiontype);

				$cr_account 					= ORM::factory('billingaccount')->where('accountcode_c','=',$toaccount)->find();
				$creditedamount 				= $cr_account->netbalance_c + $amount;
				$cr_account->netbalance_c 		= $creditedamount;
				$cr_account->creditedamount_c	= $cr_account->creditedamount_c + $amount;
				$cr_account->lastupdateddate_c	= date('Y-m-d g:i:s a');
				$cr_account->lastupdatedby_c 	= $userid;
				$cr_account->saveRecord();

				$dr_account 					= ORM::factory('billingaccount')->where('accountcode_c','=',$fromaccount)->find();
				$debitedamount 					= $dr_account->netbalance_c - $amount;
				$dr_account->netbalance_c 		= $debitedamount;
				$dr_account->debitedamount_c 	= $dr_account->debitedamount_c + $amount;
				$dr_account->lastupdateddate_c	= date('Y-m-d g:i:s a');
				$dr_account->lastupdatedby_c 	= $userid;
				$dr_account->saveRecord();
				
				$objStatements	= ORM::factory('billingstatement')->where('statementcode_c','=',$creditCode)->mustFind();
				$objStatements->status_c = 'completed';
				$objStatements->saveRecord();

				$objStatements	= ORM::factory('billingstatement')->where('statementcode_c','=',$debitCode)->mustFind();
				$objStatements->status_c = 'completed';
				$objStatements->saveRecord();
				
				$data = array();
				$data['type'] = "success";
				$data['data']['cr_code'] = $creditCode;
				$data['data']['dr_code'] = $debitCode;
				$data['message'] = 'Transaction Completed!';
				return $data;
			}
			else{
				$data = array();
				$data['type'] ="error";
				$data['message'] = 'insufficientbalance';
				return $data;
			}		
		}catch(Exception $e)
		{
			throw new Exception ($e);
		}
	}
	public static function saveBill($fromaccount, $toaccount, $paymentmode, $amount,$transactiontype,$billid,$transactionid=null)
	{
		try{
			if($transactionid == null){
				$objStatements						= ORM::factory('billingstatement');
				$objStatements->statementcode_c		= 'TRA'.rand(10000,99999);
				$objStatements->accountcode_c	 	= $toaccount;
				$objStatements->accountuserid_c	 	= ORM::factory('billingaccount')->where('accountcode_c','=',$toaccount)->find()->refaccountuserid_c;
				$objStatements->accountcodefrom_c 	= $fromaccount;
				$objStatements->accountcodeto_c 	= $toaccount;
				$objStatements->refpaymentmode_c	= $paymentmode;
				$objStatements->reftransactiontype_c= $transactiontype;
				$objStatements->updateddate_c		= date('Y-m-d H:i:s');
				$objStatements->ammount_c			= $amount;
				$objStatements->status_c			= 'started';
				$objStatements->cashpaymentflag_c = 1;
				$objStatements->saveRecord();
				$objStatements->status_c = 'completed';
				$objStatements->statementcode_c		= transaction::generatestatementcode($objStatements->id);
				$objStatements->saveRecord();
				
				$objStatementdetails	= ORM::factory('billingstatementdetail');
				$objStatementdetails->reftransactionid_c	= $objStatements->statementcode_c;
				$objStatementdetails->amount_c	= $amount;
				$objStatementdetails->userid_c	= ORM::factory('billingaccount')->where('accountcode_c','=',$toaccount)->find()->refaccountuserid_c;
				$objStatementdetails->fromuserid_c	=ORM::factory('billingaccount')->where('accountcode_c','=',$fromaccount)->find()->refaccountuserid_c;;
				$objStatementdetails->servicetax_c	= 0;
				$objStatementdetails->servicetaxpercentage_c	= 0;
				$objStatementdetails->touserid_c	= ORM::factory('billingaccount')->where('accountcode_c','=',$toaccount)->find()->refaccountuserid_c;;
				$objStatementdetails->servicetaxtransactionid_c = null ;
				$objStatementdetails->saveRecord();
				
				$objBill	= ORM::factory('bill');
				$objBill->refbillsuserid_c = ORM::factory('billingaccount')->where('accountcode_c','=',$toaccount)->find()->refaccountuserid_c;
				$objBill->statementcode_c = $objStatements->statementcode_c;
				$objBill->billid_c = $billid;
				$objBill->save();
			}else{
				$objStatements = ORM::factory('billingstatement')->where('statementcode_c','=',$transactionid)->find();
				$objStatements->ammount_c= $amount;
				$objStatements->reftransactiontype_c= $transactiontype;
				$objStatements->save();
				
				$objBill	= ORM::factory('bill')->where('statementcode_c','=',$transactionid)->find();
				$objBill->billid_c = $billid;
				$objBill->save();
			}
			
			$data = array();
			$data['type'] = "success";
			$data['data']['code'] = $objStatements->statementcode_c;
			$data['message'] = 'Bill Saved!';
			return $data;
		}catch(Exception $e){
			var_dump($e);
			die;
			throw new Exception ($e);
		}
	}
	public static function getLatestBillId($userid){
		try{
			$objBills = ORM::factory('bill')->where('refbillsuserid_c','=',$userid)->order_by('billid_c', 'desc')->find_all();
			if(count($objBills) == 0){
				return 1;
			}else{
				return $objBills[0]->billid_c + 1;
			}
		}catch(Exception $e){
			return $e->getMessage();
		}
	}
	
	public static function saveBillNumber($toaccount,$transactionid,$billid=null)
	{
		try{
			if($billid == null){
				$billid = transaction::getLatestBillId(ORM::factory('billingaccount')->where('accountcode_c','=',$toaccount)->find()->refaccountuserid_c);
				
				$objBill = ORM::factory('bill');
				$objBill->billid_c = $billid;
				$objBill->refbillsuserid_c = ORM::factory('billingaccount')->where('accountcode_c','=',$toaccount)->find()->refaccountuserid_c;
				$objBill->statementcode_c = $transactionid;
				$objBill->save();
			}else{
				$objBill = ORM::factory('bill')->where('billid_c','=',$billid);
				$objBill->refbillsuserid_c = ORM::factory('billingaccount')->where('accountcode_c','=',$toaccount)->find()->refaccountuserid_c;
				$objBill->statementcode_c = $transactionid;
				$objBill->billid_c = $billid;
				$objBill->save();
			}
			
			$data = array();
			$data['type'] = "success";
			$data['message'] = 'Bill Saved!';
			return $data;
		}catch(Exception $e){
			var_dump($e);
			die;
			throw new Exception ($e);
		}
	}
	public static function savedetails($transactionresult, $planid, $amount, $fromuserid, $touserid,$servicetax,$servicetaxpercentage,$servicetaxtransactionresult = null)
	{
		try{
			
			if($servicetaxtransactionresult == null){
				$drcode = null;
				$crcode = null;
			}else{
				$drcode = $servicetaxtransactionresult['data']['dr_code'];
				$crcode = $servicetaxtransactionresult['data']['cr_code'];
			}
			$objStatementdetails	= ORM::factory('billingstatementdetail');
			$objStatementdetails->reftransactionid_c	= $transactionresult['data']['cr_code'];
			$objStatementdetails->planid_c	= $planid;
			$objStatementdetails->amount_c	= $amount;
			$objStatementdetails->userid_c	= $touserid;
			$objStatementdetails->fromuserid_c	= $fromuserid;
			$objStatementdetails->servicetax_c	= $servicetax;
			$objStatementdetails->servicetaxpercentage_c	= $servicetaxpercentage;
			$objStatementdetails->touserid_c	= $touserid;
			$objStatementdetails->servicetaxtransactionid_c = $crcode ;
			$objStatementdetails->saveRecord();

			$objStatementdetails	= ORM::factory('billingstatementdetail');
			$objStatementdetails->reftransactionid_c	= $transactionresult['data']['dr_code'];
			$objStatementdetails->planid_c	= $planid;
			$objStatementdetails->amount_c	= $amount;
			$objStatementdetails->userid_c	= $fromuserid;
			$objStatementdetails->fromuserid_c	= $fromuserid;
			$objStatementdetails->servicetax_c	= $servicetax;
			$objStatementdetails->servicetaxpercentage_c	= $servicetaxpercentage;
			$objStatementdetails->touserid_c	= $touserid;
			$objStatementdetails->servicetaxtransactionid_c = $drcode;
			$objStatementdetails->saveRecord();
			return 'success';
					
		}catch(Exception $e)
		{
			var_dump($e);
			die();
			throw new Exception ($e);
		}
	}
	public static function transferforebs($fromaccount, $toaccount, $paymentmode, $amount,$transactiontype)
	{
		$array_accounts = Kohana::$config->load('accounts');
		try{
			$obj_user = Auth::instance()->get_user();
			if (!$obj_user)
				Request::current()->redirect('/home/index.html');
			else{
				$objAccounts = ORM::factory('billingaccount')->where('accountcode_c','=',$fromaccount)->find();
				$netbalance = $objAccounts->netbalance_c;
				$Obj_billingmastertransactiontype= ORM::factory('billingmastertransactiontype')->where('id','=',$transactiontype)->find();	
				$transactiontype= $Obj_billingmastertransactiontype->typename_c;
				
				if(ORM::factory('billingaccount')->where('refaccountuserid_c','=',$array_accounts["collectionaccountuserid"])->find()->accountcode_c == $objAccounts->accountcode_c || ORM::factory('billingaccount')->where('refaccountuserid_c','=',$array_accounts["ayushmanincomeuserid"])->find()->accountcode_c == $objAccounts->accountcode_c || ORM::factory('billingaccount')->where('refaccountuserid_c','=',$array_accounts["provisionaccountuserid"])->find()->accountcode_c == $objAccounts->accountcode_c)
					$netbalance = $amount;

				if($netbalance >= $amount){
					$creditCode = transaction::credit($fromaccount, $toaccount, $paymentmode, $amount,$transactiontype);

					$debitCode = transaction::debit($fromaccount, $toaccount, $paymentmode, $amount,$transactiontype);

					$cr_account 					= ORM::factory('billingaccount')->where('accountcode_c','=',$toaccount)->find();
					$creditedamount 				= $cr_account->netbalance_c + $amount;
					$cr_account->netbalance_c 		= $creditedamount;
					$cr_account->creditedamount_c	= $cr_account->creditedamount_c + $amount;
					$cr_account->lastupdateddate_c	= date('Y-m-d g:i:s a');
					$cr_account->lastupdatedby_c 	= $obj_user->id;
					$cr_account->saveRecord();
					
					$data = array();
					$data['type'] = "success";
					$data['data']['cr_code'] = $creditCode;
					$data['data']['dr_code'] = $debitCode;
					$data['message'] = 'ebs transaction started';
					return $data;
				}else{
					$data = array();
					$data['type'] ="error";
					$data['message'] = 'insufficientbalance';
					return $data;
				}
			}			
		}catch(Exception $e)
		{
			throw new Exception ($e);
		}
	}
	private static function debit($fromaccount, $toaccount, $paymentmode, $amount,$transactiontype)
	{
		try{
			$obj_user = Auth::instance()->get_user();
			$userid="";
			if (!($obj_user))
			{	
				$userid='-2';
			}
			else{
				$userid=$obj_user->id;
			}
			$objAccounts = ORM::factory('billingaccount')->where('accountcode_c','=',$fromaccount)->find();
			
			
			//debit amount from fromacount
			$objStatements						= ORM::factory('billingstatement');
			$objStatements->statementcode_c		= 'TRA'.$userid.rand(10000,99999);
			$objStatements->accountcode_c	 	= $fromaccount;
			$objStatements->accountuserid_c	 	= ORM::factory('billingaccount')->where('accountcode_c','=',$fromaccount)->find()->refaccountuserid_c;
			$objStatements->accountcodefrom_c 	= $fromaccount;
			$objStatements->accountcodeto_c 	= $toaccount;
			$objStatements->refpaymentmode_c	= $paymentmode;
			$objStatements->reftransactiontype_c= $transactiontype;
			$objStatements->updateddate_c		= date('Y-m-d H:i:s');
			$objStatements->ammount_c			= $amount;
			$objStatements->debit_c				= $amount;
			$objStatements->cr_dr_type			= 'dr';
			$objStatements->status_c			= 'started';
			$objStatements->updatedby_c			= $userid;
			$objStatements->netbalance_c		= (ORM::factory('billingaccount')->where('accountcode_c','=',$fromaccount)->find()->netbalance_c - $amount);
			$objStatements->saveRecord();
			$objStatements->statementcode_c		= transaction::generatestatementcode($objStatements->id);
			$objStatements->saveRecord();
			
			$fromstatementcode = $objStatements->statementcode_c;

			return $fromstatementcode;
		}catch(Exception $e)
		{
			throw new Exception ("Amount is not debited from $fromaccount.Transaction failed.");
		}
	}
	
	private static function credit($fromaccount, $toaccount, $paymentmode, $amount,$transactiontype)
	{
		try{
			$obj_user = Auth::instance()->get_user();
			$userid="";
			if (!($obj_user))
			{	
				$userid='-2';
			}
			else{
				$userid=$obj_user->id;
			}
			$objAccounts = ORM::factory('billingaccount')->where('accountcode_c','=',$fromaccount)->find();
			
			// credit amount in toaccount
			$objStatements						= ORM::factory('billingstatement');
			$objStatements->statementcode_c		= 'TRA'.$userid.rand(100000,999999);
			$objStatements->accountcode_c	 	= $toaccount;
			$objStatements->accountuserid_c	 	= ORM::factory('billingaccount')->where('accountcode_c','=',$toaccount)->find()->refaccountuserid_c;
			$objStatements->accountcodefrom_c 	= $fromaccount;
			$objStatements->accountcodeto_c 	= $toaccount;
			$objStatements->refpaymentmode_c	= $paymentmode;
			$objStatements->reftransactiontype_c= $transactiontype;
			$objStatements->updateddate_c		= date('Y-m-d H:i:s a');
			$objStatements->ammount_c			= $amount;
			$objStatements->credit_c			= $amount;
			$objStatements->cr_dr_type			= 'cr';
			$objStatements->status_c			= 'started';
			$objStatements->updatedby_c			= $userid;
			$objStatements->netbalance_c		= (ORM::factory('billingaccount')->where('accountcode_c','=',$toaccount)->find()->netbalance_c + $amount);
			$objStatements->saveRecord();
			$objStatements->statementcode_c		= transaction::generatestatementcode($objStatements->id);
			$objStatements->saveRecord();
			$tostatementcode = $objStatements->statementcode_c;

			return $tostatementcode;
		}catch(Exception $e)
		{
			throw new Exception ("Amount is not Credited to $toaccount. Transaction failed!!.");
		}
	}
	
	public static function createaccount($userid = null)
	{
		try{
			if($userid != null){
				$objUser = ORM::factory('user')->where('id','=',$userid)->find();
			}else{
				$objUser = Auth::instance()->get_user();
			}
			$objAccounts = ORM::factory('billingaccount');
			$objAccounts = $objAccounts->where('refaccountuserid_c','=',$objUser->id)->find();
			if($objAccounts->id == null)
			{
				$objAccounts=ORM::factory('billingaccount');
				$objAccounts->accountcode_c 		= 'IOH'.rand(10000,99999);
				$objAccounts->refaccountuserid_c 	= $objUser->id;
				$objAccounts->createddate_c 		= date('Y-m-d g:i:s a');
				$objAccounts->debitedamount_c 		= 0;
				$objAccounts->creditedamount_c 		= 0;
				$objAccounts->netbalance_c	 		= 0;
				$objAccounts->lastupdateddate_c		= date('Y-m-d g:i:s a');
				$objAccounts->lastupdatedby_c 		=  Auth::instance()->get_user()->id;
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
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
	
	public static function generatestatementcode($id)
	{
		$postfix = '';
		for($i=0;$i<(10-strlen($id));$i++)
		{
			$postfix = $postfix.'0';
		}
		$statementcode = 'TRA'.$postfix.$id;
		return $statementcode;
	}
}

<?php defined('SYSPATH') or die('No direct script access.');

class Rcpttransaction  {

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

	// For every receipt a new number is generated  
	// Running series per user (Doctor)
	//--------------------------------------------
	public static function getLatestRcptId($userid){
		try{ 
			$objRcpts = ORM::factory('receipt')->where('refDocuserid_c','=',$userid)->order_by('rcptid_c', 'desc')->find_all();
			if(count($objRcpts) == 0){
				return 1;
			}else{
				return $objRcpts[0]->rcptid_c + 1;
			}
		}catch(Exception $e){
			return $e->getMessage(); 
		}
	}
	// If transaction happening for first time then
	// create account for the user
	//---------------------------------------------
	public static function createaccount($userid = null)
	{ 
		try{
			if($userid != null){
				$objUser = ORM::factory('user')->where('id','=',$userid)->find();
			
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
				else
				{
					$accountcode = $objAccounts->accountcode_c;
				}
				return($accountcode);				
			}
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
	
	// Create cash Accounts for the user pair
	// Doctor-Patient
	// ------------------------------------------------------------
	public static function createCASHaccount($fromuserid = null,$touserid = null,$caseno = null )
	{ 
		// caseno -- is applicable when account is generated for the Hospitalised users
		// For OPD Consultations the caseno is null
		try{
			
			if (($fromuserid != null) AND ($touserid != null))
			{
				// Check whether from and to users have records in Users table
				$fromobjUser = ORM::factory('user')->where('id','=',$fromuserid)->find();
				$toobjUser = ORM::factory('user')->where('id','=',$touserid)->find();
				
				// whether users have account created in billingaccount table
				// If not transaction happening for first time so create account
				$fromobjAccounts = ORM::factory('billingaccount');
				$fromobjAccounts = $fromobjAccounts->where('refaccountuserid_c','=',$fromobjUser->id)->find();
				if($fromobjAccounts->id == null)
				{
					$fromaccountcode = rcpttransaction::createaccount($fromuserid );
				}
				else
				{
					$fromaccountcode = $fromobjAccounts->accountcode_c;
				}				
				$toobjAccounts = ORM::factory('billingaccount');
				$toobjAccounts = $toobjAccounts->where('refaccountuserid_c','=',$toobjUser->id)->find();
				if($toobjAccounts->id == null)
				{		
					$toaccountcode = rcpttransaction::createaccount($touserid );
				}
				else
				{
					$toaccountcode = $toobjAccounts->accountcode_c;
				}
				// Now that the accounts for both users are present then
				// create cashaccounts for the from/to pair in table
				//------------------------------------------------------
				// Two cash accounts created
				// one for each patient and doctor
				//------------------------------------------------------
				$objcashAccounts = ORM::factory('cashaccount');
				$objcashAccounts = $objcashAccounts->where('accountuserid_c','=',$fromobjUser->id)
									->where('accountuseridto_c','=',$toobjUser->id)
									->where('caseregno_c','=',$caseno)
									->where('active_c','=',1)->find();
				if($objcashAccounts->id == null)
				{
						// No account for the pair so create account
						// create active account 
						$objcashAccounts->accountuserid_c = $fromuserid;
						$objcashAccounts->accountuseridto_c = $touserid;
						$objcashAccounts->active_c = 1;  
						$objcashAccounts->accountcode_c	= $fromaccountcode;
						$objcashAccounts->accountcodeto_c = $toaccountcode;
						$objcashAccounts->caseregno_c = $caseno;  // Valid for Hospital
						$objcashAccounts->save();						
				}
				$objcashAccounts = ORM::factory('cashaccount');
				$objcashAccounts = $objcashAccounts->where('accountuserid_c','=',$toobjUser->id)
									->where('accountuseridto_c','=',$fromobjUser->id)
									->where('caseregno_c','=',$caseno)
									->where('active_c','=',1)->find();
				if($objcashAccounts->id == null)
				{
						// No account for the pair so create account
						// create active account 
						$objcashAccounts->accountuserid_c = $touserid;
						$objcashAccounts->accountuseridto_c = $fromuserid;
						$objcashAccounts->active_c = 1;  
						$objcashAccounts->accountcode_c	= $toaccountcode;
						$objcashAccounts->accountcodeto_c = $fromaccountcode;
						$objcashAccounts->caseregno_c = $caseno;  // Valid for Hospital
						$objcashAccounts->save();						
				}
			}
			
			}
			catch(Exception $e){
			throw new Exception($e);
		}
	}
	public static function saveRcpt($fromuserid,$touserid,$amount,$caseno = null,$Rcptid=null,$transactionid=null)
	{
	// $fromuserid -- patient id
	// $touserid -- doctors id
	// Two transactions to be generated 
	// Patient account is debited with amount 
	// Doctors account is credited with amount
	// One transactionid is generated 
			
		try{
		// New Receipt Record Generations
			
		if($fromuserid != null and $touserid!= null)
		{	
			// Find if account for the pair is generated 
			// else create account for pair
			$objcashAccounts = ORM::factory('cashaccount');
			$objcashAccounts = $objcashAccounts->where('accountuserid_c','=',$fromuserid)
							->where('accountuseridto_c','=',$touserid)
							->where('caseregno_c','=',$caseno)
							->find();
			//->where('active_c','=',1)
			if($objcashAccounts->id == null)
			{
				// Generate cash accounts for the pair
				rcpttransaction::createCASHaccount($fromuserid,$touserid,$caseno);
			}
				
			if ($Rcptid == null )
			{
				// Generate Transaction statements for Receipt
				// Two transactions statements recorded in 'billingstatement' table
				// with the same transactionid
				$fromobjAccounts = ORM::factory('billingaccount');
				$fromobjAccounts = $fromobjAccounts->where('refaccountuserid_c','=',$fromuserid)->find();
				$fromaccount = $fromobjAccounts->accountcode_c;
				
				$toobjAccounts = ORM::factory('billingaccount');
				$toobjAccounts = $toobjAccounts->where('refaccountuserid_c','=',$touserid)->find();
				$toaccount = $toobjAccounts->accountcode_c;
				$paymentmode = 5;  // Payment mode is Inclinic Cash
				$transactiontype = 'receipts';
				
				
				// On Receipt from Patient, Doctors Account is credited
				$objStatements						= ORM::factory('billingstatement');
				$objStatements->statementcode_c		= 'TRA'.$fromuserid.rand(100000,999999);
				$objStatements->accountcode_c	 	= $toaccount; // Doctors Account
				$objStatements->accountuserid_c	 	= $touserid;
				$objStatements->accountcodefrom_c 	= $fromaccount; // Patients account
				$objStatements->accountcodeto_c 	= $toaccount;
				$objStatements->refpaymentmode_c	= $paymentmode;
				$objStatements->reftransactiontype_c= $transactiontype;
				$objStatements->updateddate_c		= date('Y-m-d H:i:s a');
				$objStatements->ammount_c			= $amount;
				$objStatements->credit_c			= $amount;
				$objStatements->cr_dr_type			= 'cr';
				$objStatements->status_c			= 'completed';
				$objStatements->updatedby_c			= $touserid;
				$objStatements->cashpaymentflag_c   = 1;
				$objStatements->saveRecord();
				$objStatements->statementcode_c		= transaction::generatestatementcode($objStatements->id);
				$statementcode = $objStatements->statementcode_c;
				$objStatements->saveRecord();
				
				// Patients Account is debited 
				$objStatements						= ORM::factory('billingstatement');
				$objStatements->statementcode_c		= $statementcode;
				$objStatements->accountcode_c	 	= $fromaccount;
				$objStatements->accountuserid_c	 	= $fromuserid;
				$objStatements->accountcodefrom_c 	= $toaccount;
				$objStatements->accountcodeto_c 	= $fromaccount;
				$objStatements->refpaymentmode_c	= $paymentmode;
				$objStatements->reftransactiontype_c= $transactiontype;
				$objStatements->updateddate_c		= date('Y-m-d H:i:s a');
				$objStatements->ammount_c			= $amount;
				$objStatements->debit_c				= $amount;
				$objStatements->cr_dr_type			= 'dr';
				$objStatements->status_c			= 'completed';
				$objStatements->updatedby_c			= $touserid;
				$objStatements->cashpaymentflag_c   = 1;
				$objStatements->saveRecord();		
				// Update balances in their respective accounts
				// Credit doctors account
				$objcashAccounts = ORM::factory('cashaccount');
				$objcashAccounts = $objcashAccounts->where('accountuserid_c','=',$touserid)
							->where('accountuseridto_c','=',$fromuserid)
							->where('caseregno_c','=',$caseno)
							->find();  
				// Transaction for closed account also ->where('active_c','=',1)
				$objcashAccounts->creditedamount_c = $objcashAccounts->creditedamount_c + $amount;	
				$objcashAccounts->save();
				
				// Debit Patients account
				$objcashAccounts = ORM::factory('cashaccount');
				$objcashAccounts = $objcashAccounts->where('accountuserid_c','=',$fromuserid)
							->where('accountuseridto_c','=',$touserid)
							->where('caseregno_c','=',$caseno)
							->find();
				//->where('active_c','=',1)
				$objcashAccounts->debitedamount_c = $objcashAccounts->debitedamount_c + $amount;	
				$objcashAccounts->save();
			
				// Create a receipt record as
				$objRcpt						= ORM::factory('receipt');
				$objRcpt ->refRCPTuserid_c   = $fromuserid; // Patients id
				$objRcpt ->refDocuserid_c   = $touserid;   // Doctors id
				
				$objRcpt ->rcptid_c   = rcpttransaction::getLatestRcptId($touserid) ; // Latest Rcpt id
				$objRcpt ->statementcode_c    = $statementcode ;   // Statement code generated above
				$objRcpt ->amount_c   = $amount;   // Transaction Amount
				$objRcpt ->caseregno_c = $caseno ;
				$objRcpt ->extradesc_c   = $transactiontype; 
				$objRcpt ->saveRecord();
			}
			else
			{
				// Receipt was generated once and now for updation with new amount
				
				$objRcpt	= ORM::factory('receipt')->where('rcptid_c ','=',$Rcptid)
												->where('refRCPTuserid_c','=',$fromuserid)->find();
				
				// Revert back earlier transaction effect by updating existing amount
				// Update accounts
				
				$earlieramount = $objRcpt->amount_c;
				$statementcode = $objRcpt->statementcode_c;
				
				// Find both users account 
				$fromaccount = ORM::factory('billingaccount');
				$fromaccount = $fromaccount->where('refaccountuserid_c','=',$fromuserid)->find()->accountcode_c;
				$toaccount = ORM::factory('billingaccount');
				$toaccount = $toaccount->where('refaccountuserid_c','=',$touserid)->find()->accountcode_c;
				
				// Doctor's transaction
				$objstatements = ORM::factory('billingstatement');
				$objstatements = $objstatements->where('accountcode_c','=',$fromaccount)
									->where('statementcode_c','=',$statementcode)->find();
				$objstatements->credit_c = $amount;
				$objstatements->ammount_c = $amount;
				$objstatements->save();
				// Update cash Accounts
				// Doctors Account
				$objcashAccounts = ORM::factory('cashaccount');
				$objcashAccounts = $objcashAccounts->where('accountcode_c','=',$fromaccount)
									->where('accountcodeto_c','=',$toaccount)
									->where('caseregno_c','=',$caseno)
									->find();
				//->where('active_c','=',1)
				$objcashAccounts->creditedamount_c = $objcashAccounts->creditedamount_c - $earlieramount + $amount ;
				$objcashAccounts->save();

				// Patient transaction
				$objstatements = ORM::factory('billingstatement');
				$objstatements = $objstatements->where('accountcode_c','=',$toaccount)
									->where('statementcode_c','=',$statementcode)->find();
				$objstatements->debit_c = $amount;
				$objstatements->ammount_c = $amount;
				$objstatements->save();
					
				// Patients Account
				$objcashAccounts = ORM::factory('cashaccount');
				$objcashAccounts = $objcashAccounts->where('accountcode_c','=',$toaccount)
									->where('accountcodeto_c','=',$fromaccount)
									->where('caseregno_c','=',$caseno)
									->find();
				//->where('active_c','=',1)
				$objcashAccounts->debitedamount_c = $objcashAccounts->debitedamount_c - $earlieramount + $amount ;
				$objcashAccounts->save();
			}
		}
		else
		{
			// Error fromuserid and touserid are mustFind
		}
		}
		catch(Exception $e)
		{
			var_dump($e);
			die;
			throw new Exception ($e);
		}
	}		
}

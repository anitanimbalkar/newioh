<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');

class Controller_Cplancomponent extends Controller  {

	public function action_view()
	{
		$content = View::factory('vuser/vpatient/vplancomponent');
		$id 					= $this->request->post("id");
		$width 					= $this->request->post("width");	
		$height 				= $this->request->post("height");
		$planname 				= $this->request->post("planname");
		$regcharges 			= $this->request->post("regcharges");
		$subcharges 			= $this->request->post("subcharges");
		$plandetails 			= $this->request->post("plandetails");
		$usagechargesphone 		= $this->request->post("usagechargesphone");
		$usagechargesonline 	= $this->request->post("usagechargesonline");
		$usagechargesinclinic 	= $this->request->post("usagechargesinclinic");
		
		$content->bind('id',$id);
		$content->bind('name',$name);
		$content->bind('height',$height);
		$content->bind('planname',$planname);
		$content->bind('regcharges',$regcharges);
		$content->bind('subcharges',$subcharges);
		$content->bind('plandetails',$plandetails);
		$content->bind('usagechargesphone',$usagechargesphone);
		$content->bind('usagechargesonline',$usagechargesonline);
		$content->bind('usagechargesinclinic',$usagechargesinclinic);

		$this->response->body($content);
		//die($content);
	}
	public function action_showlicense(){
		
		$planid = $_GET['planid'];
		$objUser = Auth::instance()->get_user();
		$userid = $objUser->id;
		
		$array_accounts = include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/config/accounts.php');
		
		$objPlan = ORM::factory('billingplan')->where('id','=',$planid)->find();
		if($objPlan->ispackage_c != 1){
			Request::current()->redirect('cplancomponent/apply?planid='.$planid);
		}else{
			$session = Session::instance();
			$licenseaccepted = $session->get_once('licenseaccepted');
			if($licenseaccepted == 1){	
				$session->delete('licenseaccepted');
				Request::current()->redirect('cplancomponent/apply?planid='.$planid);
			}else{
				Request::current()->redirect('clicense/show?planid='.$planid);
			}
		}
	}
	public function action_apply()
	{
		try{
			$array_taxes = Kohana::$config->load('taxes');
			$session = Session::instance();
			$session->set('licenseaccepted', 1);
			$objUser = Auth::instance()->get_user();
			$userid = $objUser->id;
			
			$array_accounts = include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/config/accounts.php');
			$planid = $_GET['planid'];

			// Find active plan for the user and change the status to 'changed'
			$objPlans 		= ORM::factory('billingindividualplan')->where('refusersid_c','=',$userid)->find();
			$subscriptioncharges	= ORM::factory('billingplancharge')->where('ref_planid_c','=',$planid)->find()->subscriptioncharges_c;
			
			//Code 1 : start - If user selecting the plan first time, then deduct registration charges also. Get subscription charges for selected plan, check balance with subscription charges and deduct subscription charges if subscription charges is greater than net balance else return with error.		
			$objAccounts = ORM::factory('billingaccount');
			$objAccounts = $objAccounts->where('refaccountuserid_c','=',$userid)->find();
			if($objAccounts->id == null)
				$result = transaction::createaccount();
			
			$servicetax = $array_taxes['servicetax'];			
			
			
			/* $today=date('d-m-Y');
			$nextchagergesdate = date('01-m-Y',strtotime("+1 months"));
			$daylen = 60*60*24;
			$diffdays = (strtotime($nextchagergesdate)-strtotime($today))/$daylen;
			$objPlanCharges = ORM::factory('billingplancharge')->where('ref_planid_c','=',$planid)->find();
			
                	$subscriptioncharges = $objPlanCharges->subscriptioncharges_c;
                	$periodicity 	= $objPlanCharges->periodicity_c;
                	$subscriptioncharges_for_day =($subscriptioncharges/$periodicity)/30 ;
                	$chrargesTill_1st =$diffdays*$subscriptioncharges_for_day;
			*/

			if($objPlans->id == null){ // if user has not selected any plan before
				$registrationcharges 	= ORM::factory('billingplancharge')->where('ref_planid_c','=',$planid)->find()->registrationcharges_c;
				$totalcharges			= floatval($subscriptioncharges + ($subscriptioncharges * $servicetax/100)) + floatval($registrationcharges + ($registrationcharges * $servicetax / 100));
				
				if($totalcharges <= $objAccounts->netbalance_c){
					$result = transaction::transfer($objAccounts->accountcode_c,ORM::factory('billingaccount')->where('refaccountuserid_c','=',$array_accounts["ayushmanincomeuserid"])->find()->accountcode_c,1,$registrationcharges,4);

					$servicetaxresult = transaction::transfer($objAccounts->accountcode_c,ORM::factory('billingaccount')->where('refaccountuserid_c','=',$array_accounts["ayushmanincomeuserid"])->find()->accountcode_c,1,($registrationcharges * $servicetax / 100),11);
				
					$return = transaction::savedetails($result,$planid,$registrationcharges,$userid,$array_accounts["ayushmanincomeuserid"],($registrationcharges * $servicetax / 100),$servicetax,$servicetaxresult);	
					if($return != 'success'){
						throw new exception($return);
					}
				}
				else{
					$result['type'] 	= 'data';
					$data['message']	= 'You do not have sufficient balance in your account. Please recharge your account to use all services. </br>Current Balance : Rs.'.$objAccounts->netbalance_c."/-.</br> Do you want to recharge your account?";
					$link = 'cplancomponent/showlicense?planid='.$planid;
					$session = Session::instance();
					$session->set('followlink', $link);
					$session->set('cancellink', 'cplanselector/view');
					Request::current()->redirect('crecharge/displayinsufficientbalance?curbalance='.$objAccounts->netbalance_c."&reqbalance=".$totalcharges);

				}
				if($result['type'] == 'error')
				{
					$data = array();
					$data['type'] 			="error";
					$data['message']		= 'Message : Can not debit Registration charges from your account.<br/> Exception Message: '.$result['message'].'<br/><br/> Please report this as a bug.';
					Request::current()->redirect('cplanselector/showstatus?messages=&errors=Message : Can not debit Registration charges from your account.<br/> Exception Message: '.$result['message'].'<br/><br/> Please report this as a bug.');

					die(json_encode($data));
				}
			}
			//code 1 : end
			//Code 2 : start - Debit subscription charges.
			$totalcharges = $subscriptioncharges + ($subscriptioncharges * $servicetax / 100);			
			if($totalcharges <= $objAccounts->netbalance_c){
				$result = transaction::transfer($objAccounts->accountcode_c,ORM::factory('billingaccount')->where('refaccountuserid_c','=',$array_accounts["ayushmanincomeuserid"])->find()->accountcode_c,1,$subscriptioncharges,5);
				
				$servicetaxresult = transaction::transfer($objAccounts->accountcode_c,ORM::factory('billingaccount')->where('refaccountuserid_c','=',$array_accounts["ayushmanincomeuserid"])->find()->accountcode_c,1,($subscriptioncharges * $servicetax / 100),15);
			
				$return = transaction::savedetails($result,$planid,$subscriptioncharges,$userid,$array_accounts["ayushmanincomeuserid"],($subscriptioncharges * $servicetax / 100),$servicetax,$servicetaxresult);
				if($return != 'success'){
					throw new exception($return);
				}	
				
			}
			else{
				$link = 'cplancomponent/showlicense?planid='.$planid;
				$session = Session::instance();
				$session->set('followlink', $link);
				$session->set('cancellink', 'cplanselector/view');				
				Request::current()->redirect('crecharge/displayinsufficientbalance?curbalance='.$objAccounts->netbalance_c."&reqbalance=".$totalcharges);
			}
			// Code 2 : end
			$objPlans = ORM::factory('billingindividualplan');
			$objPlans = $objPlans->where('refusersid_c','=',$userid)->where('status_c','=','active')->findAll();
			foreach($objPlans as $plan)
			{
				$plan->status_c 	= 'changed';
				$plan->updateddate_c 	= date('Y-m-d g:i:s a');
				$plan->updatedby_c	= $userid;
				$plan->saveRecord();
				
				$atjob = new helper_atjobmanager();
				$objAtjobs = ORM::factory('atjob')->where('refsubscriberplanid_c','=',$plan->id)->find_all();
				foreach($objAtjobs as $objAtjob)
				{
					$atjob::unsetjob($objAtjob->jobid_c,'deleted');
				}

			}


			$objPlans = ORM::factory('billingindividualplan');	
			//save plan id against user if all transaction are successful
			$objPlans->refplanid_c 		= $planid;
			$objPlans->refusersid_c 	= $userid;		
			$objPlans->status_c 		= 'active';
			$objPlans->createddate_c 	= date('Y-m-d g:i:s a');
			$objPlans->updateddate_c 	= date('Y-m-d g:i:s a');
			$objPlans->subscriptiondate_c 	= date('Y-m-d g:i:s a'); 
			//$objPlans->nextpaymentdate_c=$nextchagergesdate;
			$objPlans->updatedby_c 		= $userid;
			$objPlans->saveRecord();
			$billingindividualplanid = $objPlans->id;
			//save selected plan against billingaccount 
			$objAccountPlans = ORM::factory('billingaccountplan');
			$objAccountPlans = $objAccountPlans->where('refmyaccountid_c','=',$objAccounts->id)->where('status_c','=','active')->find();
			$isplansaved = false;
			
			if($objAccountPlans->id == '')
			{
				$objAccountPlans						= ORM::factory('billingaccountplan');
				$objAccountPlans->refmappedaccountid_c 	= $objAccounts->id;
				$objAccountPlans->refmyaccountid_c 		= $objAccounts->id;
				$objAccountPlans->createddate_c 		= date('Y-m-d g:i:s a');
				$objAccountPlans->updateddate_c 		= date('Y-m-d g:i:s a');
				$objAccountPlans->updatedby_c 			= $userid;		
				$objAccountPlans->refplanid_c 			= $planid;	
				$objAccountPlans->status_c 			= 'active';	
				$objAccountPlans->save();
				$isplansaved = true;
			}
			else{
				$objAccountPlans->updateddate_c 		= date('Y-m-d g:i:s a');
				$objAccountPlans->updatedby_c 			= $userid;		
				$objAccountPlans->refplanid_c 			= $planid;
				$objAccountPlans->status_c 			= 'active';				
				$objAccountPlans->update();
				$isplansaved = true;
			}
			
			//set at job to alert user before expiry of the plan. (before 15 days, 5 days, and 1 day)
			if($isplansaved){
				$billingplan 	= ORM::factory('billingplancharge')->where('ref_planid_c','=',$planid)->find();
				
				$date = date('h:i A m/d/y', strtotime(' -15 day'));
				$atjobtime = date('h:i A m/d/y', strtotime('+'.$billingplan->periodicity_c.' month', strtotime($date)));
				
				$atjob = new helper_atjobmanager();
				$atjob::setjob('calerts/sendalerttosubscriber --id='.$billingindividualplanid.' --duration=15 days',$atjobtime,2,'refsubscriberplanid_c',$billingindividualplanid);
				
				$date = date('h:i A m/d/y', strtotime(' -7 day'));
				$atjobtime = date('h:i A m/d/y', strtotime('+'.$billingplan->periodicity_c.' month', strtotime($date)));
				$atjob::setjob('calerts/sendalerttosubscriber --id='.$billingindividualplanid.' --duration=7 days',$atjobtime,2,'refsubscriberplanid_c',$billingindividualplanid);
				
				$date = date('h:i A m/d/y', strtotime(' -1 day'));
				$atjobtime = date('h:i A m/d/y', strtotime('+'.$billingplan->periodicity_c.' month', strtotime($date)));
				$atjob::setjob('calerts/sendalerttosubscriber --id='.$billingindividualplanid.' --duration=1 days',$atjobtime,2,'refsubscriberplanid_c',$billingindividualplanid);
			}
			$objSelectedPlan = ORM::factory('billingplan')->where('id','=',$planid)->find();
			
			if($objUser->refintrowizardid_c == 2){
				$objUser->refintrowizardid_c = 1;
				$objUser->wizardstatus_c = 1;
				$objUser->save();
				Request::current()->redirect('cplanmanager/showselectedplan?messages=<div class="bodytext_bold">Thank you for choosing '.$objSelectedPlan->planname_c.'. </br></br>Our AyushCare Program Manager will contact you for the next steps shortly. In the mean time, we encourage you to complete your Profile and Medical History.</br></br></br></br> </div>&errors=');

			}
			else{
				Request::current()->redirect('cplanmanager/showselectedplan?messages=<div class="bodytext_bold">Thank you for choosing '.$objSelectedPlan->planname_c.'. </br></br>We encourage you to complete your Profile and Medical History.</br></br></br></br> </div>&errors=');

			}

			
		}catch(Exception $e)
		{
			Request::current()->redirect('cplanselector/showstatus?errors='.'Exception Message: '.$e->getMessage().'<br/><br/> Please report this as a bug.&messages=');
		}
	}
}

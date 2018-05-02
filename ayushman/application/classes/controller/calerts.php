<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Calerts extends Controller  {
	public function action_sendalerttosubscriber()
	{
		$refsubscriberid = '';
		$duration = '';
		if(php_sapi_name() == 'cli'){
					$refsubscriberid = CLI::options('id');
					$duration = CLI::options('duration');

			}else{
					$refsubscriberid = $_GET['id'];
					$duration = $_GET['duration'];
        }
			
		$atjob = orm::factory('atjob')->where('refsubscriberplanid_c','=',$refsubscriberid)->find();
			
		$objBillingIndividualPlan = orm::factory('billingindividualplan')->where('id','=',$refsubscriberid)->find();
		if($objBillingIndividualPlan->status_c == 'active'){
			$notification=  array();
			$notification['id'] = $objBillingIndividualPlan->refusersid_c;
			$notification['template'] = 'subscription_alert';
			$notification['sms']=true;
			$notification['email']='true';
			$notification['username']= ORM::factory('user')->where('id' ,'=', $objBillingIndividualPlan->refusersid_c)->find()->Firstname_c;
			
			$planid = $objBillingIndividualPlan->refplanid_c;
			$billingplan 	= ORM::factory('billingplancharge')->where('ref_planid_c','=',$planid)->find();
			$date =  date("d-m-Y", strtotime($objBillingIndividualPlan->subscriptiondate_c));
			$expirydate = date('d-m-Y', strtotime('+'.$billingplan->periodicity_c.' month', strtotime($date)));
			$notification['date']= $expirydate; 
			
			$array_taxes = Kohana::$config->load('taxes');
			$servicetax = $array_taxes['servicetax'];
			$subscriptioncharges	= ORM::factory('billingplancharge')->where('ref_planid_c','=',$planid)->find()->subscriptioncharges_c;
			$totalcharges = $subscriptioncharges + ($subscriptioncharges * $servicetax / 100);	
			$notification['amount']= $totalcharges;

			$notificationsender = new helper_notificationsender();
			$notificationsender->sendnotification($notification);

			$atjobmanager = new helper_atjobmanager();
			$atjobmanager::setstatus($atjob->id,'sent');
			echo 'success';
		}else{
			$atjobmanager = new helper_atjobmanager();
			
			$atjobmanager::setstatus($atjob->id,'Deactivated before reminder');
			echo 'failed';
		}
    }       
}   

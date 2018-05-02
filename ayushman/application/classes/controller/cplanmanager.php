<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cplanmanager extends Controller_Ctemplatewithmenu{

	public function action_view()
	{
		$errors = array();
		$messages = array();
		$this->displayplans($errors,$messages);
	}
	
	//Common function for displaying plan list page. $errors and $messages will be shown on page if it contains any data.
	private function displayplans($errors, $messages)
	{
		try{
			$obj_user 	= Auth::instance()->get_user();
			$userid 	= $obj_user->id;
			$username 	= $obj_user->Firstname_c;
			
			// retrieve Plan types (individual/corporate/non-corporate)
			$objPlanTypes 	= ORM::factory('billingmasterplantype')->get_plantypes();
			$types = array();
			if($objPlanTypes['type'] == 'success')
				$types = $objPlanTypes['data'];
			else if($objPlanTypes['type'] == 'error')
				$errors['plantypes'] = $objPlanTypes['data'];
			
			//Corporate names
			$objCorporates 	= ORM::factory('corporate')->findAll();

			$content 	= View::factory('vuser/vadmin/vplanmanager');
			$urole		= "admin";
			$breadcrumb = "Home>>Plans";
			$content->bind('errors', $errors);
			$content->bind('messages', $messages);
			$content->bind('userid', $userid);
			$content->bind('username', $username);
			$content->bind('types', $types);
			$content->bind('corporates', $objCorporates);
			$this->template->content = $content;
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
	
	//create or update plan
	public function action_save()
	{
		$messages = array();
		$errors = array();
		$db = Database::instance();
		$db->begin();
		try {
			if($_POST)
			{
				//get posted elements
				$planid 		= $_POST['planid'];
				$effectivedate	= $_POST['effectivedate'];
				$effectivetill 	= $_POST['effectivetilldate'];
				if(isset($_POST['corporateid'])){
					$corporateid 	= $_POST['corporateid'];
				}
				else{
				  $corporateid = null;
				  }
				$userid 		= Auth::instance()->get_user()->id;
				//insert record in Billingplans table
				$objPlans = ORM::factory('Billingplan');
				if($planid != -1) // if user is creating new plan, planid will be -1, otherwise it will be + number.
				{
					$objPlans = $objPlans->where('id', '=',$planid)->mustFind();
					if($objPlans->loaded() == false){
						throw new HTTP_Exception_500('objPlans object not loaded');
					}
				}else{
					$objPlans->refplantypeid_c 	= $_POST['plantype'];
				}
				$objPlans->effectivedate_c 		= date( 'Y-m-d g:i:s',strtotime( $effectivedate) );
				$objPlans->effectivetilldate_c 	= date( 'Y-m-d g:i:s',strtotime($effectivetill));
				$objPlans->createddate_c 		= date('Y-m-d g:i:s a');
				$objPlans->createdby_c 			= $userid;
				$objPlans->approvedby_c 		= $userid;
				$objPlans->workflowstatus_c 	= 'approved'; //right now we are approving the plan automatically but plan will be created by other role and it will be approved by super admin.
				$objPlans->planstatus_c 		= 'active';
				$objPlans->updateddate_c 		= date('Y-m-d g:i:s a');
				$objPlans->updatedby_c 			= $userid;
				$objPlans->towhomcorporateid_c	= $corporateid;
				$objPlans->saveRecord($_POST);

				//Insert records in Billingplancharges table
				$objPlanCharges = ORM::factory('Billingplancharge');
				$objPlanCharges->ref_planid_c 	= $objPlans->id;
				if($planid != -1)
				{
					$objPlanCharges = $objPlanCharges->where('ref_planid_c', '=',$objPlans->id)->mustFind();
					if($objPlanCharges->loaded() == false){
						throw new HTTP_Exception_500('objPlanCharges object not loaded');
					}
				}
				$objPlanCharges->createddate_c	= date('Y-m-d g:i:s a');
				$objPlanCharges->updateddate_c 	= date('Y-m-d g:i:s a');
				$objPlanCharges->updatedby_c 	= $userid;
				$objPlanCharges->status_c 		= 'approved'; //right now we are approving the plan automatically but plan will be created by other role and it will be approved by super admin.
				$objPlanCharges->saveRecord($_POST);
				$db->commit();
				$messages['success'] = 'Plan will be effective from '.$effectivedate.' till '.$effectivetill.', if admin approves it.';
				$this->displayplans($errors, $messages);
			}else{
				$errors['saveplan'] = 'Could not save plan charges.';
				$this->displayplans($errors, $messages);
			}
		} catch (Exception $e) {
			$db->rollback();
			throw new Exception($e);
		}
	}
	
	//Delete function updates the plan status of the plan to inactive & workflow status to deleted
	public function action_delete()
	{
		try{
			$messages	= array();
			$errors 	= array();
			$planid 	= $_GET['planid'];
			$userid 	= $_GET['userid'];
			$objPlans 	= ORM::factory('Billingplan');
			$objPlans 	= $objPlans->where('id', '=',$planid)->find();
			if($objPlans->loaded() == false){
				throw new HTTP_Exception_500('objPlans object not loaded');
			}
			$objPlans->workflowstatus_c 	= 'deleted';
			$objPlans->planstatus_c 		= 'inactive';
			$objPlans->updateddate_c 		= date('Y-m-d g:i:s a');
			$objPlans->effectivetilldate_c 	= date('Y-m-d g:i:s a');
			$objPlans->updatedby_c 			= $userid;
			$objPlans->saveRecord();
			if($objPlans->saved() == true)
				$messages['deleteplan'] = 'Plan and Plan charges are deleted successfully.';
			else{
				$errors['deleteplan'] = 'Could not delete plan.';
				$this->displayplans($errors, $messages);
			}
			$this->displayplans($errors, $messages);
		}catch(Exception $e)
		{
			throw new Exception($e);
		}
	}

	//Get details to edit plan / show plan. 
	public function action_getplandetails()
	{
		try{
			$planid = $_GET['planid'];

			$obj_user = Auth::instance()->get_user();
			$objCorporateMember = ORM::factory('corporatemember')->where('emailid_c','=',$obj_user->email)->where('status_c','=','active')->find();
			$objPlans = ORM::factory('adminviewbillingplan');
			$objPlans = $objPlans->where('id','=',$planid)->find()->as_array();
			if($objCorporateMember->id != null){
				$objPlans['regcharges'] = $objPlans['regcharges'] > 0 ? $objPlans['regcharges'] : ' - (Waived Off)';
				$objPlans['subcharges'] = $objPlans['subcharges'] > 0 ? $objPlans['subcharges'] : ' - (Waived Off)';
			}
			$objBillingPlan = ORM::factory('billingplan')->where('id','=',$planid)->find();
			$objCorporate = ORM::factory('corporate')->where('id','=',$objBillingPlan->towhomcorporateid_c)->find();
			if($objCorporate->id != null){
				$objPlans['corporateid'] = $objCorporate->corporatename_c;
			}

			$data = array();
			$data['type'] ="data";
			$data['data'] = $objPlans;
			die(json_encode($data));
		}catch(Exception $e){
			$data = array();
			$data['type'] ="error";
			$data['data'] = 'Exception Message: '.$e->getMessage().'<br/><br/> Please report this as a bug.';
			die(json_encode($data));
		}
	}
	
	//Show selected plan
	public function action_showselectedplan()
	{
		$errors = array();
		$messages = array();
		try{
			
			$obj_user 	= Auth::instance()->get_user();
			$content 	= View::factory('vuser/vpatient/vselectedplan');

			$objCorporateMember 	= ORM::factory('corporatemember')->where('emailid_c','=',$obj_user->email)->where('status_c','=','active')->find();
			$isCorporateMember = false;
			$planid = '';
			if(isset($_GET['messages'])){
				$messages['message'] = $_GET['messages'];
			}

			if($objCorporateMember->id != null){
				
				$planid = ORM::factory('billingindividualplan')->where('refusersid_c','=',$obj_user->id)->where('status_c','=','active')->find()->refplanid_c;
				$isCorporateMember = true;
				$firsttimeplan = false;
			}else{
				$isCorporateMember = false;
				$objPlans 	= ORM::factory('billingindividualplan')->where('refusersid_c','=',$obj_user->id)->where('status_c','=','active')->find();
				$planid 	= null;
				if($objPlans->id == NULL){
					$messages['noplan'] = "You have not selected plan yet or it is expired, Please Select plan and move ahead.";
					// No plan selected so display list of plans
					$firsttimeplan = true;
					$session = Session::instance();
					$licenseaccepted = $session->get_once('licenseaccepted');
					$session->delete('licenseaccepted');
					if($obj_user->refintrowizardid_c == 2){
						$this->displaypackages($errors, $messages);
					}
					else{
						$this->display($errors, $messages);
					}
				}else{
					$planid  	= $objPlans->refplanid_c;
					$firsttimeplan = false;
				}
			}
			if ($firsttimeplan== false)
			{
				$content->bind('errors', $errors);
				$content->bind('messages', $messages);
				$content->bind('planid',$planid);
				$content->bind('isCorporateMember',$isCorporateMember);
				$this->template->content 	= $content;
			}
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
	
	// Same as that defined in cplanselector
	private function displaypackages($errors, $messages){
		// Check if user is Ayushcare user "20244" 
		// Or if the user is registered as Relative of ayushcare
		
		$obj_user 	= Auth::instance()->get_user();
		$objRelative = ORM::factory("relative")->where("refprimaryusersid_c","=",20244)
							->where("refrelativeuserid_c","=",$obj_user->id)->find();
	
		if (($obj_user->id == 20244) OR ($objRelative->id != null))
			$showayushplan = 1;
		else
			$showayushplan = 0;
		
		$content = View::factory('vuser/vpatient/vplanselector');
		$onlypackages = 1;
		$content->bind('onlypackages',$onlypackages);
		$content->bind('errors',$errors);
		$content->bind('messages',$messages);
		$content->bind('showayushplan',$showayushplan);
		$this->template->content = $content;
	}
	
	// Same as that defined in cplanselector
	private function display($errors, $messages){
		// Check if user is Ayushcare user "20244" 
		// Or if the user is registered as Relative of ayushcare
		
		$obj_user 	= Auth::instance()->get_user();
		$objRelative = ORM::factory("relative")->where("refprimaryusersid_c","=",20244)
							->where("refrelativeuserid_c","=",$obj_user->id)->find();
		
		if (($obj_user->id == 20244) OR ($objRelative->id != null))
			$showayushplan = 1;
		else
			$showayushplan = 0;		
		
		$content = View::factory('vuser/vpatient/vplanselector');
		$onlypackages = 0;
		$content->bind('onlypackages',$onlypackages);

		$content->bind('errors',$errors);
		$content->bind('messages',$messages);
		$content->bind('showayushplan',$showayushplan);
		$this->template->content = $content;
	}
	
	//Returns the confirmation message to select plan with current plan charges and effective date.
	public function action_getplanselectionconfirmation()
	{
		try{
			$array_taxes = Kohana::$config->load('taxes');
			$planid = $_GET['planid'];
			$objNeededPlan = ORM::factory('viewbillingplan')->where('id','=',$planid)->mustFind();
			$obj_user 	= Auth::instance()->get_user();
			$objIndividualPlan = ORM::factory('billingindividualplan')->where('refusersid_c','=',$obj_user->id)->where('status_c','=','active')->find();
			$totalfees = 0;
			$confirmationmessage = '';
			if($objIndividualPlan->id != null){
				$objSelectedPlan = ORM::factory('viewbillingplan')->where('id','=',$objIndividualPlan->refplanid_c)->find();
				$totalfees = $objNeededPlan->subcharges;
				$servicetax = $array_taxes['servicetax'];			
				$servicetax = $totalfees * $servicetax / 100;	
				$totalfees = $servicetax + $totalfees;
				$confirmationmessage = '<div class="bodytext_normal">You have selected "'.$objNeededPlan->planname.'" plan. However, you are currently registered under "'.$objSelectedPlan->planname.'". Changing a plan may involve additional charges. Please review before proceeding further. </br> Following amount will be deducted from your account and any services availed by you, will be revoked. </br></br>&nbsp; Additional Registration Charges &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Rs. 0 </br> &nbsp; Subscription charges &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Rs. '.$objNeededPlan->subcharges.' </br> &nbsp; Credit for unused portion &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Rs. 0 </br>&nbsp; Service Tax &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Rs. '.$servicetax.'  <br/><br/> &nbsp;<span class="bodytext_bold">Total amount &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Rs.'.$totalfees.'</span>. <br/></br> Do you wish to proceed? </div>';
			}else{
				$totalfees = $objNeededPlan->regcharges+$objNeededPlan->subcharges;
				$servicetax = $array_taxes['servicetax'];			
				$servicetax = $totalfees * $servicetax / 100;
				$totalfees = $servicetax + $totalfees; 
				$confirmationmessage = '<div class="bodytext_normal">You are subscribing to a plan for the first time. </br>You have selected '.$objNeededPlan->planname.' plan. </br> Following amount will be deducted from your account. </br></br> &nbsp; Registration charges &nbsp;: Rs.'.$objNeededPlan->regcharges.' </br> &nbsp; Subscription charges : Rs.'.$objNeededPlan->subcharges.' </br> &nbsp; Service Tax &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Rs. '.$servicetax.' <br/><br/> &nbsp;<span class="bodytext_bold">Total amount &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Rs.'.$totalfees.'</span>. <br/></br> Do you wish to proceed? </div>';
			}
			$data = array();
			$data['type'] = "data";
			$data['data'] = $confirmationmessage;
			die(json_encode($data));
		}catch(Exception $e)
		{
			$data = array();
			$data['type'] ="error";
			$data['data'] = 'Exception Message: '.$e->getMessage().'<br/><br/> Please report this as a bug.';
			die(json_encode($data));
		}
	}
}

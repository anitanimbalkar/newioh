<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cfeesmanager extends Controller_Ctemplatewithmenu  {

	public function action_view()
	{
		try
		{
			$errors = array();
			$messages = array();
			$this->displayfeesform($errors, $messages);
		}
		catch (Exception $e) {
			throw new Exception($e);
		}
	}
	private function displayfeesform($errors, $messages)
	{
		try
		{
			$obj_user = Auth::instance()->get_user();
			$content = View::factory('vuser/vdoctor/vfeesmanager');
			$breadcrumb = "Home>>Fees";
			$content->bind('errors', $errors);
			$content->bind('messages', $messages);
			$this->template->breadcrumb = $breadcrumb;
			$this->template->content 	= $content;
		}
		catch (Exception $e) {
			throw new Exception($e);
		}
	}
	public function action_save()
	{
		if($_POST)
		{
			$errors = array();
			$messages = array();
			try {
				$collectfees  	= $_POST['hfcollectfees'];
				$effectivedate 	= $_POST['effectivedate'];
				$userid = Auth::instance()->get_user()->id;
				
				$objdoctor = new Model_Doctor;
				$doctorid = $objdoctor->where('refdoctorsid_c','=',$userid )->mustFind()->id;
				$status = '';
				date_default_timezone_set('Asia/Kolkata');
				$objFees 	= ORM::factory('Billingdoctorfee');
				if(date('d-m-Y') == date('d-m-Y',strtotime($effectivedate) ) || date('d-m-Y') > date( 'd-m-Y',strtotime($effectivedate) )){
					$status = 'active';
					$objFees = $objFees->where('ref_doctorid_c','=',$doctorid)->where('status_c','=','active')->findAll();
					$i = 0;
					foreach($objFees as $fees)
					{
						$fees->enddate_c 		= date('Y-m-d g:i:s a');
						$fees->updateddate_c 	= date('Y-m-d g:i:s a');
						$fees->updatedby_c 		= $userid ;
						$fees->status_c 		= 'updated';
						$fees->update();
					}
					$effectivedate = date('d-m-Y');
				}else if(date('d-m-Y') < date( 'd-m-Y',strtotime($effectivedate) )){
					$status 	= 'scheduled';
					$objFees 	= $objFees->where('ref_doctorid_c','=',$doctorid)->where('status_c','=','scheduled')->findAll();
					$i = 0;
					foreach($objFees as $fees)
					{
						$fees->updateddate_c 	= date('Y-m-d g:i:s a');
						$fees->updatedby_c 		= $userid;
						$fees->status_c 		= 'cancelled';
						$fees->update();
					}
				}

				$objFeesStandard = ORM::factory('Billingdoctorfee');
				//Insert Records for online/phone consultation for standard slots
				$objFeesStandard->ref_doctorid_c 		= $doctorid;
				$objFeesStandard->ref_modeid_c 			= 1;
				$objFeesStandard->ref_slottypeid_c 		= 1;
				$objFeesStandard->firsttimefees_c 		= $_POST['firsttimestandardonline'];
				$objFeesStandard->followupfees_c 		= $_POST['followupstandardonline'];
				$objFeesStandard->extensioncharges_c 	= $_POST['standardonlineext'];
				
				//Insert Records for clinic consultation for standard slots
				$objFeesStandard->firsttimefeesinclinic_c 	= $_POST['firsttimestandardinclinic'];
				$objFeesStandard->followupfeesinclinic_c 	= $_POST['followupstandardinclinic'];
				$objFeesStandard->effectivedate_c 			=  date( 'Y-m-d g:i:s',strtotime($effectivedate) ); 
				$objFeesStandard->paymentinclinic 			= $collectfees;
				$objFeesStandard->status_c 					= $status;

				/*$objFeesPremium = ORM::factory('Billingdoctorfee');
				//Insert Records for online/phone consultation for Premium slots
				$objFeesPremium->ref_doctorid_c 	= $doctorid;
				$objFeesPremium->ref_modeid_c 		= 2;
				$objFeesPremium->ref_slottypeid_c 	= 2;
				$objFeesPremium->firsttimefees_c 	= $_POST['firsttimepremiumonline'];
				$objFeesPremium->followupfees_c 	= $_POST['followuppremiumonline'];
				$objFeesPremium->extensioncharges_c = $_POST['premiumonlineext'];
				
				//Insert Records for clinic consultation for premium slots
				$objFeesPremium->firsttimefeesinclinic_c 	= $_POST['firsttimepremiuminclinic'];
				$objFeesPremium->followupfeesinclinic_c 	= $_POST['followuppremiuminclinic'];
				$objFeesPremium->effectivedate_c 			=	date( 'Y-m-d g:i:s',strtotime($effectivedate) );
				$objFeesPremium->paymentinclinic 			= $collectfees;
				$objFeesPremium->status_c 					= $status;

				$objFeesHappyHours = ORM::factory('Billingdoctorfee');
				//Insert Records for online/phone consultation for Happy Hours slots
				$objFeesHappyHours->ref_doctorid_c 		= $doctorid;
				$objFeesHappyHours->ref_modeid_c 		= 3;
				$objFeesHappyHours->ref_slottypeid_c 	= 3;
				$objFeesHappyHours->firsttimefees_c 	= $_POST['firsttimehappyhoursonline'];
				$objFeesHappyHours->followupfees_c 		= $_POST['followuphappyhoursonline'];
				$objFeesHappyHours->extensioncharges_c 	= $_POST['happyhoursonlineext'];            
				
				//Insert Records for clinic consultation for Happy Hours slots
				$objFeesHappyHours->firsttimefeesinclinic_c = $_POST['firsttimehappyhoursinclinic'];
				$objFeesHappyHours->followupfeesinclinic_c 	= $_POST['followuphappyhoursinclinic'];
				$objFeesHappyHours->effectivedate_c 		= date( 'Y-m-d g:i:s',strtotime($effectivedate) );
				$objFeesHappyHours->paymentinclinic 		= $collectfees;
				$objFeesHappyHours->status_c 				= $status;*/

				$objFeesStandard->saveRecord();
				//$objFeesPremium->saveRecord();
				//$objFeesHappyHours->saveRecord();
				$objActiveFees = ORM::factory('Billingdoctorfee')->where('ref_doctorid_c','=',$doctorid)->where('status_c','=','active')->findAll();
				foreach($objActiveFees as $fees)
				{
					$fees->enddate_c 		= date( 'Y-m-d g:i:s',strtotime($effectivedate) );
					$fees->update();
				}
				
		    	$user = Auth::instance()->get_user();
				$uspstepuser = ORM::factory('uspstepuser')->where('refuseruspstepsid_c','=','5')->where('refuspuserid_c','=',$user->id)->find();
				if($uspstepuser->refuseruspstepsid_c=='5'){
					$uspstepuser->update();
				}
				else{
					$uspstepuser->refuseruspstepsid_c='5';
					$uspstepuser->refuspuserid_c=$user->id;
					$uspstepuser->save();
				}

				$messages['success'] = 'Fees are set successfully';
				$this->displayfeesform($errors, $messages);
				
			} catch (Exception $e) {
				$errors['error'] 	= 'Exception Message: '.$e->getMessage().'<br/><br/> Please report this as a bug.';
				$this->displayfeesform($errors, $messages);
			}
		}
	}
	public function action_get()
	{
		try{
			if(empty($_GET['doctorid'])){
				$objdoctor = new Model_Doctor;
				$objdoctor->where('refdoctorsid_c','=',$_GET['userid'])->find();
				$doctorid = $objdoctor->id;
			}else if(empty($_GET['userid'])){
				$doctorid = $_GET['doctorid'];
			}
			$objFees = ORM::factory('Billingdoctorfee')->where('ref_doctorid_c','=',$doctorid)->where('status_c','=',$_GET['status'])->findAll()->as_array();
			$fees = array();
			$i = 0;
			foreach($objFees as $fee)
			{
				$fees[$i]['id'] 				= $fee->ref_slottypeid_c;
				$fees[$i]['firsttime'] 			= $fee->firsttimefees_c;
				$fees[$i]['followup'] 			= $fee->followupfees_c;
				$fees[$i]['extension'] 			= $fee->extensioncharges_c;
				$fees[$i]['firsttimeinclinic'] 	= $fee->firsttimefeesinclinic_c;
				$fees[$i]['followupinclinic'] 	= $fee->followupfeesinclinic_c;
				$fees[$i]['effectivedate'] 		= date('d-M-Y', strtotime($fee->effectivedate_c));
				$fees[$i]['collectfees'] 		= $fee->paymentinclinic;
				$i = $i+1;
			}
			$data = array();
			$data['type'] = "data";
			$data['data'] = json_encode($fees);
			die(json_encode($data));
		}catch(Exception $e)
		{
			$data = array();
			$data['type'] = "error";
			$data['data'] = 'Exception Message: '.$e->getMessage().'<br/><br/> Please report this as a bug.';
			die(json_encode($data));
		}
	}
}
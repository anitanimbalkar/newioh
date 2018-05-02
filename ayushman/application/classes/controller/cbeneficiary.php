<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/notificationsender.php');
class Controller_Cbeneficiary extends Controller_Ctemplatewithmenu{

	public function action_view()
	{
		$errors = array();
		$messages = array();
		$this->display($errors,$messages);
	}
	
	public function action_list()
	{
		$errors = array();
		$messages = array();
		try{
			$content 	= View::factory('vuser/vpatient/vbeneficiarylist');
			$content->bind('errors', $errors);
			$content->bind('messages', $messages);
			$this->template->content = $content;
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
	
	//Common function for displaying company profile page. $errors and $messages will be shown on page if it contains any data.
	private function display($errors, $messages)
	{
		try{
			$content 	= View::factory('vuser/vpatient/vbeneficiaryvalidation');
			$content->bind('errors', $errors);
			$content->bind('messages', $messages);
			$this->template->content = $content;
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
		
	// validate beneficiary
	public function action_validate()
	{
		$messages = array();
		$errors = array();
		try{
			if($_POST){
				$iohid		= $_POST['iohid'];
				$emailid 	= $_POST['emailid'];

				//user cannot add himself as beneficiary. check with iohid entered on validation page with logged in user.
				if(Auth::instance()->get_user()->id == $iohid){
					$messages['message'] = 'You cannot add yourself as a beneficiary.';
					$this->display($errors, $messages);
				}else{

					//Check iohid and emailid entered on validation page in users table.
					$objUser = ORM::factory('user')->where('email','=',$emailid)->where('id','=',$iohid)->find();
					if($objUser->id != null){
						$_POST['patientid'] = $iohid;
						$this->showBeneficiaryProfile($errors, $messages, $iohid);
					}
					else{
						$errors['error'] = 'Could not find a person matching with information provided by you.';
						$this->display($errors, $messages);
					}
				}
			}else{
				$errors['error'] = '$_Post is null';
				$this->display($errors, $messages);
			}
		}catch(Exception $e){
		
			throw new Exception($e);
		}
	}

	//Action to display Beneficiary
	private function showBeneficiaryProfile($errors, $messages, $beneficiaryUserId)
	{
		try
		{	
			$obj_user = Auth::instance()->get_user();
			$objUserForPatient 	= ORM::factory('user')->where('id','=',$beneficiaryUserId)->find();
			
			//Check if beneficiary is already exists or not.
			$objBeneficiary = ORM::factory('beneficiary')->where('refuserid_c','=',$obj_user->id)->where('beneficiaryid_c','=',$beneficiaryUserId)->find();
			$_POST['isBeneficiary'] = 'false';
			if($objBeneficiary->id != null){
				$_POST['isBeneficiary'] = 'true';
			}
			
			$content = View::factory('vuser/vpatient/vbeneficiaryprofile');
			$content->bind('objUserForPatient', $objUserForPatient);
			$content->bind('errors', $errors);
			$content->bind('messages', $messages);
			$this->template->content = $content;
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
	}
	
	//action to add beneficiary.
	public function action_add()
	{
		$messages = array();
		$errors = array();
		try{
			if($_POST){
				$obj_user = Auth::instance()->get_user();
				$patientid= $_POST['patientid'];
				$_POST['refuserid_c']		= $obj_user->id;
				$_POST['beneficiaryid_c'] 	= $patientid;
				$_POST['updatedby_c'] 		=  $obj_user->id;
				
				$objBeneficiary = ORM::factory('beneficiary')->where('refuserid_c','=',$obj_user->id)->where('beneficiaryid_c','=',$patientid)->find();
				$_POST['isBeneficiary'] = 'false';
				if($objBeneficiary->id != null){
					$_POST['isBeneficiary'] = 'true';
					$messages['message'] = 'Beneficiary is already added.';
					$this->showBeneficiaryProfile($errors, $messages, $patientid);
				}else{
					$objBeneficiary = ORM::factory('beneficiary');
					$objBeneficiary->saveRecord($_POST);
					$messages['message'] = 'Beneficiary added successfuly';
					Request::current()->redirect('cbeneficiary/list');
				}				
			}else{
				throw new Exception('$_POST is null in the action add of beneficiary controller on Line number 95.');
			}
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
	
	//action to remove beneficiary.
	public function action_remove()
	{
		try{
			$beneficiaryid = $_GET['beneficiaryid'];
			$objBeneficiary = ORM::factory('beneficiary')->where('refuserid_c','=',Auth::instance()->get_user()->id)->where('beneficiaryid_c','=',$beneficiaryid)->mustFind();
			$objBeneficiary->delete();
			Request::current()->redirect('cbeneficiary/list');
		}catch(Exception $e){
			throw new Exception($e);
		}
	}

	//action to add beneficiary.
	public function action_addCredits()
	{
		$arr_ebs = include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/config/ebs.php');
		$messages = array();
		$errors = array();
		try{
			$obj_user = Auth::instance()->get_user();
			$beneficiaryUserId = $_GET['beneficiaryid'];
			$obj_user 	= Auth::instance()->get_user();
			$content = View::factory('vuser/vpatient/vrechargeothersaccount');
			
			$content->bind('beneficiaryUserId',$beneficiaryUserId);
			$objBeneficiary = ORM::factory('user')->where('id','=',$beneficiaryUserId)->find();
			$beneficiaryname 	= $objBeneficiary->Firstname_c.' '.$objBeneficiary->lastname_c;
			$content->bind('beneficiaryname',$beneficiaryname);
			$username 	= $obj_user->Firstname_c;
			
			$obj_user 		= Auth::instance()->get_user();
			$objAdr			= ORM::factory('address')->where('id','=',$obj_user->refaddresshome1_c)->find();
			
			$accountid 			= $arr_ebs['ebsaccountid'];
			$content->bind('account_id',$accountid);
			$returnurl 			= $arr_ebs['ebsreturnurl'];
			$content->bind('return_url',$returnurl);
			$mode				= $arr_ebs['ebsmode'];
			$content->bind('mode',$mode);
			$billingname		=  $obj_user->Firstname_c.' '.$obj_user->lastname_c;
			$content->bind('name',$billingname);
			$billingaddr		=  $objAdr->line1_c." ".$objAdr->nearlandmark_c.' '.$objAdr->location_c;
			$content->bind('address',$billingaddr);
			$billingcity		=  $objAdr->city_c;
			$content->bind('city',$billingcity);	
			$billingstate		=  $objAdr->state_c;
			$content->bind('state',$billingstate);	
			$billingzip			=  $objAdr->pin_c;
			$content->bind('postal_code',$billingzip);
			$billingcountry		=  $objAdr->country_c;
			$billingcountry		=  'IND';
			$content->bind('country',$billingcountry);
			$billingemail		=  $obj_user->email;
			$content->bind('email',$billingemail);
			$billingtelephone	=  $obj_user->mobileno1_c;
			$content->bind('phone',$billingtelephone);

			$content->bind('errors', $errors);
			$content->bind('messages', $messages);
			$this->template->content = $content;
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
	
	
}
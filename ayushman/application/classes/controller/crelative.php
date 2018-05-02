<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/notificationsender.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/xmpp.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');

class Controller_Crelative extends Controller_Ctemplatewithmenu{

	public function action_view()
	{
		$errors = array();
		$messages = array();
		$this->display($errors,$messages);
	}
	private function display($errors, $messages)
	{
		try{
			$objUser = Auth::instance()->get_user();
			if($objUser->refintrowizardid_c == 3 && $objUser->wizardstatus_c == 4){
				$ayushcarestatus = "add";
			}
			else if($objUser->refintrowizardid_c == 3 && $objUser->wizardstatus_c == 5){
				$ayushcarestatus = "operate";
			}
			else{
				$ayushcarestatus = "no";
			}
			$content = View::factory('vuser/vpatient/vrelativelist');
			 $objCountries  = ORM::factory('countrymaster')->find_all()->as_array();
			$allCountries;$count=0;
			foreach($objCountries as $objCountry)
			{
				$allCountries[$count]['isd']=$objCountry->mobileisd_c;
				$allCountries[$count]['countrycode_c']=$objCountry->countrycode_c;
				$allCountries[$count]['country_c']=$objCountry->country_c;
				$count++;
			}
			
			$content->bind('objcountries', $allCountries);
			$content->bind('errors', $errors);
			$content->bind('messages', $messages);
			$content->bind('ayushcarestatus', $ayushcarestatus);
			$this->template->content = $content;
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
	public function action_add()
	{
		$errors = array();	
		$messages = array();
		
		try{
			if($_POST){
				$primaryuser	= Auth::instance()->get_user();
				$contactnumber 	= $_POST['number'];
				$isdcode 	= $_POST['isdrelativeno'];
				$firstname 	= $_POST['firstname'];
				$lastname 	= $_POST['lastname'];
				$relation	= $_POST['relation'];
				$email = '';
				$operateaccount = ($_POST['operateaccount']=='both')?1:1;
				$operateaccountforrelative = ($_POST['operateaccount']=='both')?1:0;
					
				if($operateaccountforrelative == 0){
					//$email = $firstname.'_'.rand(10000,99999).'@inhlth.com';
					
				}else{
					$email 	= $_POST['emailid'];
					$_POST['email'] = $email;
					// Bypass checking of unique emailid so comment code 
					/*
					$user = ORM::factory('user')->where('email','=',$email)->find();
					if($user->id != null){
						$errors['error'] = 'Email id must be unique. Please enter unique email id and try again';
						throw new Exception();
					}*/
				}
				
				$initialusername = strtolower($this->clean(($firstname)).$this->clean(($lastname)));
				$initialusername = substr($initialusername,0,25);
				$username = $initialusername;
				$userCount = 0;
				while(ORM::factory('user')->where('username','=',$username)->find()->id != null){
				  $userCount++;
				  $username = $initialusername . $userCount;
				}
							
				//password is must while creating a user. For now, passwordioh is default password for relative.
				$_POST['password'] = 'passwordioh';
				$_POST['password_confirm'] = 'passwordioh';
				$_POST['username'] = $username;
				
				
				$user = ORM::factory('user')->where('username','=',$username)->find();
				if($user->id != null){
					$errors['error'] = 'Email id must be unique. Please enter unique email id and try again';
				}else{
					try{
						
						$user = ORM::factory('user')->create_user($_POST, array(
							'username',
							'password',
								'email'
						));
						
						if($primaryuser->wizardstatus_c == 4){
							$user->refintrowizardid_c = 2;
							$user->wizardstatus_c = 3;
							$user->save();
							$primaryuser->refintrowizardid_c = 3;
							$primaryuser->wizardstatus_c = 5;
							$primaryuser->save();
						}
						$user->add('roles', ORM::factory('role', array('name' => 'login')));
						$userrole = 'patient'; 
						$user->add('roles', ORM::factory('role', array('name' => $userrole)));
						
						$obj_patient = ORM::factory('patient');
						$obj_patient->repatientsuserid_c = $user->id;
						$obj_patient->save();
						
						transaction::createaccount($user->id);	
		
						$arr_user['activationstatus_c']	= "active";				
						$activationcode	=  md5(uniqid(rand(), true));
						$arr_user['id'] 	= $user->id;	
						$arr_user['lastname_c'] 	= $lastname;	
						$arr_user['Firstname_c']	= $firstname;
						$arr_user['middlename_c']	= '';
						$arr_user['isdmobileno1_c']	= $isdcode;
						$arr_user['mobileno1_c']	= $contactnumber;
						$arr_user['email']		= $email;
						$arr_user['activationcode_c']	= $activationcode;
						$arr_user['refsecurityquestion_c'] = Auth::instance()->get_user()->refsecurityquestion_c;
						$arr_user['securityanswer_c'] = Auth::instance()->get_user()->securityanswer_c;
						$arr_user['accountcreatedby_c'] = 'other';
						$returned_value = ORM::factory('user')->save_userdetails($arr_user);
						if($returned_value['type'] == 'exception')
							throw new Exception($returned_value['data']);
						$obj_user = ORM::factory('user')->where('id','=',$returned_value['data'])->find();
						$op = xmpp::register($obj_user->id,$obj_user->xmpppassword_c,$obj_user->email);
						$obj_user->isdmobileno1_c = $isdcode;
						$obj_user->save();
						$objRelative = ORM::factory('relative');
						$objRelative->refprimaryusersid_c = $primaryuser->id;
						$objRelative->refrelativeuserid_c = $user->id;
						$objRelative->relation_c = $relation;
						$objRelative->operateaccount_c = $operateaccount;
						$objRelative->createddate_c = date('Y-m-d g:i:s a');
						$objRelative->updateddate_c = date('Y-m-d g:i:s a');
						$objRelative->updatedby_c = $primaryuser->id;
						$objRelative->save();

						/*$objRelative = ORM::factory('relative');
						$objRelative->refprimaryusersid_c = $user->id;
						$objRelative->refrelativeuserid_c = $primaryuser->id;
						$objRelative->relation_c = ORM::factory('relationmaster')->where('relationname_c','=',$relation)->find()->reciprocal_c;
						$objRelative->operateaccount_c = $operateaccountforrelative;
						$objRelative->createddate_c = date('Y-m-d g:i:s a');
						$objRelative->updateddate_c = date('Y-m-d g:i:s a');
						$objRelative->updatedby_c = $primaryuser->id;
						$objRelative->save();*/
						
						$objBeneficiary = ORM::factory('beneficiary')->where('refuserid_c','=',$primaryuser->id)->where('beneficiaryid_c','=',$user->id)->find();
						if($objBeneficiary->id == null){
							$objBeneficiary = ORM::factory('beneficiary');
							$objBeneficiary->refuserid_c = $primaryuser->id;
							$objBeneficiary->beneficiaryid_c = $user->id;
							$objBeneficiary->createddate_c = date('Y-m-d g:i:s a');
							$objBeneficiary->updatedby_c = $primaryuser->id;
							$objBeneficiary->save();
						}
				
						/*$objBeneficiary = ORM::factory('beneficiary')->where('refuserid_c','=',$user->id)->where('beneficiaryid_c','=',$primaryuser->id)->find();
						if($objBeneficiary->id == null){
							$objBeneficiary = ORM::factory('beneficiary');
							$objBeneficiary->refuserid_c = $user->id;
							$objBeneficiary->beneficiaryid_c = $primaryuser->id;
							$objBeneficiary->createddate_c = date('Y-m-d g:i:s a');
							$objBeneficiary->updatedby_c = $primaryuser->id;
							$objBeneficiary->save();
						}*/
						

						if($operateaccountforrelative == 1){
							//$obj_user = ORM::factory('user')->where('email','=',$email)->find();
							$encrypt = Encrypt::instance('default');
							$encrypted_id = urlencode($encrypt->encode($obj_user->id));
							$website_url= "http://".$_SERVER['HTTP_HOST']."/ayushman/cregistrar/completeregistration?uid=".$encrypted_id."&key=$activationcode";
							$notification=  array();
							$notification['id']=$obj_user->id;$notification['template']='relativeregistration';$notification['email']='true';$notification['username']=$firstname;$notification['website_url']=$website_url;$notification['sms']='true';
							helper_notificationsender::sendnotification($notification);	
						}
					
						$messages['message'] = 'Relative added as dependent in your account.';
					}catch(Exception $e){					
						throw new Exception($e);
					}
				}
				$this->display($errors,$messages);
		
			}else{
				$errors['error'] = 'Could not add relative in your account.';
				$this->display($errors,$messages);
			}	
		}catch(Exception $e){
			$this->display($errors,$messages);
		}
	}
	  private function clean($string) {
	   $string = str_replace(' ', '', $string); // Replaces all spaces with hyphens.
	   $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

	   return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
	  }
	public function action_remove(){
		try{
		
			$objRelative = ORM::factory('relative')->where('refrelativeuserid_c','=',$_GET['id'])->where('refprimaryusersid_c','=',Auth::instance()->get_user()->id)->find();
			$objRelative->delete();
		
			$errors = array();
			$messages = array();
			$relative = ORM::factory('user')->where('id','=',$_GET['id'])->find();

			$messages['message'] = $relative->Firstname_c.' '.$relative->lastname_c.' is removed from your network.';
			$this->display($errors,$messages);
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
	public function action_link(){
		try{
			$errors = array();
			$messages = array();
			if($_POST){
				// Remove check for unique identity of email id so
				// Comment following code 
				/*$user = ORM::factory('user')->where('email','=',$_POST['linkemailid'])->find();
				if($user->id != null){
					$errors['error'] = 'Email id must be unique. Please enter unique email id and try again';
				}else{*/
				
					$user = ORM::factory('user')->where('id','=',$_POST['linkrelativeid'])->find();
					
					$encrypt = Encrypt::instance('default');
					$encrypted_id = urlencode($encrypt->encode($user->id));
					$user->email =  $_POST['linkemailid'];
					$user->save();
			
					$website_url= "http://".$_SERVER['HTTP_HOST']."/ayushman/cregistrar/completeregistration?uid=".$encrypted_id."&key=".$user->activationcode_c;
					$notification=  array();
					$notification['id']=$user->id;$notification['template']='relativeregistration';$notification['email']='true';$notification['username']=$user->Firstname_c;$notification['website_url']=$website_url;$notification['sms']='true';
					helper_notificationsender::sendnotification($notification);
					$messages['message'] = $user->Firstname_c.' '.$user->lastname_c.' is linked to '.$user->email.'.';

				//}	
	
			}	

			$this->display($errors,$messages);
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
	public function action_searchForRelative(){
		try{
			// Do not search whole database 
			// Search for the patient that are registered by staff and the 
			// doctors attached to staff
			
			$objUser = Auth::instance()->get_user();
			$userId = $objUser->id;
			$patObjs = ORM::factory('patientsbyrelative')->where('primaryuserid','=',$userId);
			
			if(isset($_GET["patId"]) && $_GET["patId"] !== '' ){
				$patId = $_GET["patId"];
				if($patId !== ''){
					$patObjs = $patObjs->where('relativeuserid', '=', $patId);
				}	
			}else{
				if(isset($_GET["patName"])){
					$patName = $_GET["patName"];
					if($patName !== ''){
						$patObjs = $patObjs->where('Firstname_c', 'like', '%'.$patName.'%');
					}
				}	
				if(isset($_GET["patLastName"])){
					$patLastName = $_GET["patLastName"];
					if($patLastName !== ''){
						$patObjs = $patObjs->where('lastname_c', 'like', '%'.$patLastName.'%');
					}				
				}	
				if(isset($_GET["patContact"])){
					$patContact = $_GET["patContact"];
					if($patContact !== ''){
						$patObjs = $patObjs->where('mobileno1_c', 'like', '%'.$patContact.'%');
					}	
				}
				if(isset($_GET["patEmail"])){
					$patEmail = $_GET["patEmail"];
					if($patEmail !== ''){
						$patObjs = $patObjs->where('email', 'like', '%'.$patEmail.'%');
					}	
				}
				if(isset($_GET["patId"])){
					$patId = $_GET["patId"];
					if($patEmail !== ''){
						$patObjs = $patObjs->where('primaryuserid', 'like', '%'.$patId.'%');
					}	
				}
			}
			
			$patObjs = $patObjs->find_all();
			$searchResults = array();
			$encrypt = Encrypt::instance('default');
			foreach($patObjs as $patObj){
					$searchResult = array();
					$searchResult["name"] = $patObj->Firstname_c." ".$patObj->middlename_c." ".$patObj->lastname_c;
					$searchResult["contact"] = $patObj->mobileno1_c != null?$patObj->mobileno1_c:'Not Provided';
					$searchResult["id"] = $patObj->relativeuserid;
					$searchResult["operateaccount"] = $patObj->operateaccount;
					$searchResult["encodedid"] = urlencode($encrypt->encode($patObj->relativeuserid));
					if($patObj->DOB_c != '0000-00-00'){
						$searchResult["dob"] = date("d M Y", strtotime($patObj->DOB_c));
					}else{
						$searchResult["dob"] = 'Not Provided';
					}
					$searchResult["photo"] = $patObj->photo_c;
					array_push($searchResults, $searchResult);
				}
			die(json_encode($searchResults));
		}
		catch(Exception $e){throw new Exception($e);}	
	}
}

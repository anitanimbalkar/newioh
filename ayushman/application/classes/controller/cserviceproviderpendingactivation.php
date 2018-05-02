<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/notificationsender.php');
class Controller_Cserviceproviderpendingactivation extends Controller_Ctemplatewithmenu {

	public function action_pendingactivations()
	{
		$obj_user = Auth::instance()->get_user();
		$content = View::factory('vuser/vadmin/vserviceproviderpendingactivation');
		$content->bind('obj_user', $obj_user);
		$username = $obj_user->Firstname_c;
		$content->bind('username', $username);
		$urole = "admin";
		$breadcrumb = "Home>>";
		$this->template->breadcrumb = $breadcrumb;
		$this->template->content = $content;
		$this->template->user = $obj_user->Firstname_c;
		$this->template->urole = $urole;
	}
	public function action_activate()
	{
		$userid = $_GET['userid'];
		$role = $_GET['role'];
		$obj_user = new Model_User;
		$obj_user = $obj_user->where('id','=',$userid)->find();
		$notification=  array();
		$notification['id']=$userid;$notification['template']='registartion_activation_link_click';$notification['sms']='true'; $notification['iohId']=$userid;
		helper_notificationsender::sendnotification($notification);
		switch($role)
		{
			case 'Doctor': 
				$this->activatedoctor($obj_user);
				$role = "Doctor";
				break;
			case 'Pathologist' :
				$this->activatepathologist($obj_user);
				$role = "Diagnostic Center";
				break;
			case 'Chemist' :
				$this->activatechemist($obj_user);
				$role = "Medical Store";
				break;
		}
		$content = View::factory('vuser/vadmin/vserviceproviderstatusactivated');
		$content->bind('obj_user', $obj_user);
		$content->bind('role', $role);
		$username = $obj_user->Firstname_c;
		$content->bind('username', $username);
		$urole = "admin";
		$breadcrumb = "Home>>";
		$this->template->breadcrumb = $breadcrumb;
		$this->template->content = $content;
		$this->template->user = $obj_user->Firstname_c;
		$this->template->urole = $urole;
	}
	public function activatepathologist($obj_user)
	{
		$userid = $obj_user->id;
		$obj_user->activationstatus_c= "active";		
		$obj_user->save();
		$obj_pathologists = ORM::factory('pathologist')//check if doctor id is present in doctor table or not.
								->where('refpathologistsuserid_c','=',$userid)
								->find();
 		$array_obj_pathologists=$obj_pathologists->as_array();
 		if($array_obj_pathologists['id']==NULL){
			$obj_pathologists=new Model_Doctor;
   			$obj_pathologists->refpathologistsuserid_c =$userid;
			$obj_pathologists->save();
		}
		//send notification
		$username = trim($obj_user->Firstname_c) ." ".trim($obj_user->lastname_c);
		$notification=  array();
		$notification['id']=$userid;$notification['template']='pathologistformaccepted';$notification['email']='true';$notification['username']=$username;
		helper_notificationsender::sendnotification($notification);
	}
	public function activatechemist($obj_user)
	{
		$userid = $obj_user->id;
		$obj_user->activationstatus_c= "active";		
		$obj_user->save();
		$obj_chemists = ORM::factory('chemist')//check if doctor id is present in doctor table or not.
								->where('refchemistsuserid_c','=',$userid)
								->find();
 		$array_obj_chemists=$obj_chemists->as_array();
 		if($array_obj_chemists['id']==NULL){
			$obj_chemists=new Model_Doctor;
   			$obj_chemists->refdoctorsid_c =$userid;
			$obj_chemists->save();
		}
		//send notification
		$username = trim($obj_user->Firstname_c) ." ".trim($obj_user->lastname_c);
		$notification=  array();
		$notification['id']=$userid;$notification['template']='chemistformaccepted';$notification['email']='true';$notification['username']=$username;
		helper_notificationsender::sendnotification($notification);
	}
	public function activatedoctor($obj_user)
	{
		$userid = $obj_user->id;
		$obj_user->activationstatus_c= "active";		
		$obj_user->save();
		$obj_doctors = ORM::factory('doctor')//check if doctor id is present in doctor table or not.
								->where('refdoctorsid_c','=',$userid)
								->find();
		//send notification
		$username = trim($obj_user->Firstname_c) ." ".trim($obj_user->lastname_c);
		$notification=  array();
		$notification['id']=$userid;
		$notification['template']='doctorformaccepted';
		$notification['email']='true';
		$notification['username']=$username;
		helper_notificationsender::sendnotification($notification);
		
		//Create billing account -start

		$objAccounts=ORM::factory('billingaccount');

		$objAccounts = $objAccounts->where('refaccountuserid_c','=',$obj_user->id)->find();

		if($objAccounts->id == '')
		{
			$objAccounts=ORM::factory('billingaccount');
			$objAccounts->accountcode_c 		= 'IOH'.rand(10000,99999);
			$objAccounts->refaccountuserid_c 	= $obj_user->id;
			$objAccounts->createddate_c 		= date('Y-m-d g:i:s a');
			$objAccounts->debitedamount_c 		= 0;
			$objAccounts->creditedamount_c 		= 0;
			$objAccounts->netbalance_c	 		= 0;
			$objAccounts->lastupdateddate_c		= date('Y-m-d g:i:s a');
			$objAccounts->lastupdatedby_c 		= $obj_user->id;
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
		//create billing account - end

		  //create an online clinic
		  $online_clinic_object = ORM::factory('doctorclinic');
		  $online_clinic_object->refdoctorclinicdoctorid_c = $obj_doctors->id;
		  $online_clinic_object->refclinicaddressid_c = -1;
		  $online_clinic_object->clinicname_c = 'Online';
		  $online_clinic_object->mode_c = 'Online';
		  $online_clinic_object->save();
		  //create a schedule for clinic
		  $online_default_schedule = ORM::factory('schedule');
		  $default_schedule_id = $online_default_schedule->save();
		  //set that schedule as default
		  $online_clinic_schedule_object = ORM::factory('clinicschedule');
		  $online_clinic_schedule_object->refdoctorid_c = $obj_doctors->id;
		  $online_clinic_schedule_object->refclinicid_c = -1;
		  $online_clinic_schedule_object->refscheduleid_c = $default_schedule_id;
		  $online_clinic_schedule_object->save();
	}
	public function action_reject()
	{
		$userid = $_GET['userid'];
		$role = $_GET['role'];
		$obj_user = new Model_User;
		$obj_user->where('id','=',$userid)
			->find();
		switch($role)
		{
			case 'Doctor': 
				$this->rejectdoctor($obj_user);
				$role = "Doctor";
				break;
			case 'Pathologist' :
				$this->rejectpathologist($obj_user);
				$role = "Diagnostic Center";
				break;
			case 'Chemist' :
				$this->rejectchemist($obj_user);
				$role = "Medical Store";
				break;
		}
	}
	public function rejectpathologist($obj_user)
	{
		$userid = $obj_user->id;
		$userid = $obj_user->id;
		$activationcode = md5(uniqid(rand(), true));
 		$firstname=$obj_user->Firstname_c;
 		$obj_user->activationcode_c=$activationcode;
		$obj_user->activationstatus_c = 'inactivepathologist';
 		$obj_user->save();
 		//send notification
 		$username = trim($obj_user->Firstname_c) ." ".trim($obj_user->lastname_c);
		$website_url="http://".$_SERVER['HTTP_HOST']."/ayushman/cregistrar/activate?email=".$obj_user->email."&key=".$activationcode;
		$notification=  array();
		$notification['id']=$obj_user->id;$notification['template']='pathologistformrejected';$notification['email']='true';$notification['username']=$username;$notification['website_url']=$website_url;
		helper_notificationsender::sendnotification($notification);
		Request::current()->redirect("/cserviceproviderpendingactivation/displayrejectedserviceprovider?userid=".$userid."&role=Diagnostic Center");
	}
	public function rejectchemist($obj_user)
	{
		$userid = $obj_user->id;
		$userid = $obj_user->id;
		$activationcode = md5(uniqid(rand(), true));
 		$firstname=$obj_user->Firstname_c;
 		$obj_user->activationcode_c=$activationcode;
		$obj_user->activationstatus_c = 'inactivechemist';
 		$obj_user->save();
 		//send notification
 		$username= trim($obj_user->Firstname_c) ." ".trim($obj_user->lastname_c);
		$website_url="http://".$_SERVER['HTTP_HOST']."/ayushman/cregistrar/activate?email=".$obj_user->email."&key=".$activationcode;
		$notification=  array();
		$notification['id']=$obj_user->id;$notification['template']='chemistformrejected';$notification['email']='true';$notification['username']=$username;$notification['website_url']=$website_url;
		helper_notificationsender::sendnotification($notification);
		Request::current()->redirect("/cserviceproviderpendingactivation/displayrejectedserviceprovider?userid=".$userid."&role=Medical Store ");
	}
	public function rejectdoctor($obj_user)
	{
		$userid = $obj_user->id;
		$activationcode = md5(uniqid(rand(), true));
 		$firstname=$obj_user->Firstname_c;
 		$obj_user->activationcode_c=$activationcode;
		$obj_user->activationstatus_c = 'inactivedoctor';
 		$obj_user->save();

		$obj_userRegsteps = ORM::factory('uspstepuser')
			->where('refuspuserid_c','=',$userid)->where('refuseruspstepsid_c','=','1')
			->find();
		$obj_userRegsteps->delete();		

		$obj_userRegsteps = ORM::factory('uspstepuser')
			->where('refuspuserid_c','=',$userid)->where('refuseruspstepsid_c','=','2')
			->find();
		$obj_userRegsteps->delete();		

 		//send notification
 		$username= trim($obj_user->Firstname_c)." ".trim($obj_user->lastname_c);
		$website_url="http://".$_SERVER['HTTP_HOST']."/ayushman/cregistrar/activate?email=".$obj_user->email."&key=".$activationcode;
		$notification=  array();
		$notification['id']=$obj_user->id;$notification['template']='doctorformrejected';$notification['email']='true';$notification['username']=$username;$notification['website_url']=$website_url;
		helper_notificationsender::sendnotification($notification);
		Request::current()->redirect("/cserviceproviderpendingactivation/displayrejectedserviceprovider?userid=".$userid."&role=Doctor");
	}
	public function action_displayrejectedserviceprovider()
	{	
		$userid = $_GET['userid'];
		$role = $_GET['role'];
		$obj_user = new Model_User;
		$obj_user->where('id','=',$userid)->find();
		$content = View::factory('vuser/vadmin/vserviceproviderstatusrejected');
		$content->bind('obj_user', $obj_user);
		$content->bind('role', $role);
		$username = $obj_user->Firstname_c;
		$content->bind('username', $username);
		$urole = "admin";
		$breadcrumb = "Home>>";
		$this->template->breadcrumb = $breadcrumb;
		$this->template->content = $content;
		$this->template->user = $obj_user->Firstname_c;
		$this->template->urole = $urole;
	}
}

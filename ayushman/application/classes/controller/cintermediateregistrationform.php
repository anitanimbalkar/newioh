<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/notificationsender.php');

class Controller_Cintermediateregistrationform extends Controller_Ctemplatewithoutmenu {
	
	public function view($userId, $role, $errors=NULL){
		try
		{
			$objUser = ORM::factory('user')->where('id','=',$userId)->find();
			if(strpos($objUser->activationstatus_c, "activate"))
			{
				$this->finish($userId, $role);
			}
			switch($role)
			{
				case "Doctor":
					$content = View::factory('vuser/vregistration/vdoctorregistrationform');
					$objUser = Auth::instance()->get_user();
					$this->template->user = $objUser;
					  $this->template->urole = "doctor";
					  $content->bind('objuser', $objUser);
						$arr_xmpp = Kohana::$config->load('xmpp');
						$content->bind('arr_xmpp' , $arr_xmpp);
						$this->template->content = $content;
					$objDoctor = ORM::factory('doctor')->where('refdoctorsid_c','=',$userId)->mustFind();
				//	echo $objDoctor->RMPnumber_c
					$content->bind('objDoctor', $objDoctor);
				break;
				
				case "Chemist":
					$content = View::factory('vuser/vregistration/vchemistregistrationform');
				break;
				
				case "Pathologist":
					$content = View::factory('vuser/vregistration/vpathologistregistrationform');
				break;
			}
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
			$content->bind('objuser', $objUser);
			$content->bind('errors', $errors);
			$breadcrumb = "<a href='/ayushman/' class='bodytext_normal'>Home</a> >> <a href='javascript:void(0);' class='bodytext_normal'>Full $role Registration form</a>";
			$this->template->breadcrumb = $breadcrumb;
			$this->template->content 	= $content;
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
	}
	
	public function finish($userId, $role){
		$objUser = ORM::factory('user')->where('id','=',$userId)->find();
		$username = trim($objUser->Firstname_c." ".$objUser->lastname_c);
		$arr_notificationtouser=  array();
		$arr_notificationtouser['id']=$userId;$arr_notificationtouser['email']='true';$arr_notificationtouser['username']=$username;
		$date = date('d M Y'); 	
		$arr_notificationtoadmin=  array();
		$arr_notificationtoadmin['email']='true';$arr_notificationtoadmin['username']=$username;$arr_notificationtoadmin['date']=$date;
		
		switch($role)
		{
			case "Doctor":
				$emailbodyToUser = $arr_notificationtouser['template']='doctorregistrationsubmit_drmail';
				$emailbodyToAdmin = $arr_notificationtoadmin['template']='doctorregistrationsubmit_adminmail';
				Request::current()->redirect('cregistrar/activate');
			break;
			
			case "Chemist":
				
				$emailbodyToUser = $arr_notificationtouser['template']='chemistregistrationsubmit_chemistmail';
				$emailbodyToAdmin = $arr_notificationtoadmin['template']='chemistregistrationsubmit_adminmail';
				
				$content	= View::factory('vuser/vadmin/vserviceproviderformfilledstatus');
			break;
			
			case "Pathologist":
				
				$emailbodyToUser = $arr_notificationtouser['template']='pathologistregistrationsubmit_pathomail';
				$emailbodyToAdmin = $arr_notificationtoadmin['template']='pathologistregistrationsubmit_adminmail';
				
				$content = View::factory('vuser/vadmin/vserviceproviderformfilledstatus');
			break;
		}
		helper_notificationsender::sendnotification($arr_notificationtouser);
		$objUsers= new Model_User;
		$users = $objUsers->find_all();
		$adminIds = array();
		foreach($users as $user)
		{
			if($user->has('roles', ORM::factory('role', array('name' => 'admin'))))
				array_push($adminIds,$user->id);
		}
		foreach($adminIds as $id)
		{
			$arr_notificationtoadmin['id']=$id;
			helper_notificationsender::sendnotification($arr_notificationtoadmin);
		}
		
		$content->set('username', $objUser->Firstname_c);
		$content->set('formtype', $role);
 		if($role=="Doctor"){
		$this->template->breadcrumb = "<a href='/ayushman/cconsultation/view?#dashboard' class='bodytext_normal'>Back to Dashboard</a> >> <a href='javascript:void(0);' class='bodytext_normal'>Request acknowledgement</a>";
		}
		else{
        $this->template->breadcrumb = "<a href='/ayushman/' class='bodytext_normal'>Home</a> >> <a href='javascript:void(0);' class='bodytext_normal'>Request acknowledgement</a>";;
		}
		$this->template->content = $content;
	}
	
	public function action_acknowledge(){
		$encrypt = Encrypt::instance('default');
		$this->finish(urldecode($encrypt->decode($_GET['u'])), urldecode($encrypt->decode($_GET['r'])));
	}
}

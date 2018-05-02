<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cpatientprofile extends Controller_Ctemplatewithmenu {
//var $uploaddestination = "/wamp/www/ayushman/assets/userphotos/";
	public function action_displayProfile()
	{
		$errors = array();
		$messages = array();
		if(isset($_GET['patId'])){
			$objUser = ORM::factory('user')->where('id','=',$_GET['patId'])->find();
		}else{
			$objUser = Auth::instance()->get_user();
		}
		$this->displayPage($errors, $messages,$objUser->id);
	}
	
	public function action_buildnetwork(){
		$errors = array();
		$messages = array();
		if(isset($_GET['id'])){
			$objUser = ORM::factory('user')->where('id','=',$_GET['id'])->find();
		}else{
			$objUser = Auth::instance()->get_user();
		}
		$this->displaynetwork($errors, $messages,$objUser->id);
	}
	
	private function displaynetwork($errors, $messages,$profileuserid)
	{
		try
		{
			$user = ORM::factory('user')->where('id','=',$profileuserid)->find();
			
			$content	= View::factory('vuser/vpatient/vbuildnetwork');
			
			//$encrypt = Encrypt::instance('default'); 
			//$profileuserid = $encrypt->encode($objUser->id);
			
			$mobilenumber = $user->isdmobileno1_c.'-'.$user->mobileno1_c;
			$name = $user->Firstname_c.' '.$user->lastname_c;
			
			
			$content->bind('mobilenumber', $mobilenumber);
			$content->bind('name', $name);
			$content->bind('pid', $profileuserid);
			
			$content->bind('errors', $errors);
			$content->bind('messages', $messages);
			$this->template->content	= $content;
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
	}
	
	public function action_listnetwork(){
		$errors = array();
		$messages = array();
		if(isset($_GET['id'])){
			$objUser = ORM::factory('user')->where('id','=',$_GET['id'])->find();
		}else{
			$objUser = Auth::instance()->get_user();
		}
		$this->displaylist($errors, $messages,$objUser->id);
	}
	
	private function displaylist($errors, $messages,$profileuserid)
	{
		try
		{
			$user = ORM::factory('user')->where('id','=',$profileuserid)->find();
			
			$content	= View::factory('vuser/vpatient/vlistnetwork');
			
			//$encrypt = Encrypt::instance('default'); 
			//$profileuserid = $encrypt->encode($objUser->id);
			
			$mobilenumber = $user->isdmobileno1_c.'-'.$user->mobileno1_c;
			$name = $user->Firstname_c.' '.$user->lastname_c;
			
			
			$content->bind('mobilenumber', $mobilenumber);
			$content->bind('name', $name);
			$content->bind('pid', $profileuserid);
			
			$content->bind('errors', $errors);
			$content->bind('messages', $messages);
			$this->template->content	= $content;
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
	}
	
	private function displayPage($errors, $messages,$profileuserid)
	{
		try
		{
			$objUser = ORM::factory('user')->where('id','=',$profileuserid)->find();
			
			$content	= View::factory('vuser/vpatient/vpatientprofile');
			
			$objAddHome = ORM::factory('address')
							->where('id','=',$objUser->refaddresshome1_c)
							->find();
			
			$objAddWork = ORM::factory('address')
							->where('id','=',$objUser->refaddresswork_c)
							->find();
			
			$objPatient	= ORM::factory('patient')
							->where('repatientsuserid_c','=',$objUser->id)
							->mustFind();
							
			$objCountries  = ORM::factory('countrymaster')
							->find_all()
							->as_array();
			$allCountries;$count=0;
			foreach($objCountries as $objCountry)
			{
				$allCountries[$count]['isd']=$objCountry->mobileisd_c;
				$allCountries[$count]['countrycode_c']=$objCountry->countrycode_c;
				$allCountries[$count]['country_c']=$objCountry->country_c;
				$count++;
			}
			
			$patientId	= $objPatient->id;
			
			$encrypt = Encrypt::instance('default'); 
			$profileuserid = $encrypt->encode($objUser->id);
			
			$content->bind('patientid', $patientId);      
			$content->bind('profileuserid', $profileuserid);      
			$content->bind('user', $objUser);
			$content->bind('objaddhome', $objAddHome);
			$content->bind('objaddwork', $objAddWork);
			$content->bind('objpatient', $objPatient);
			$content->bind('errors', $errors);
			$content->bind('messages', $messages);
			$content->bind('objcountries', $allCountries);
			
			$this->template->content	= $content;
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
	}
	
	public function action_saveProfile()
	{
		try
		{
			$errors = array();
			$messages = array();
			
			$objAddressHome = new Model_Address();
			
			$objAddressHome ->line1_c			= $_POST["addhline1"];
			$objAddressHome ->nearlandmark_c 	= $_POST["addhlandmark"];
			$objAddressHome ->location_c 		= $_POST["addhloc"];
			$objAddressHome ->city_c 			= $_POST["addhcity"];
			$objAddressHome ->state_c 			= $_POST["addhstate"];
			$objAddressHome ->pin_c 			= $_POST["addhpin"];
			$objCountry = orm::factory('countrymaster')->where('countrycode_c','=',$_POST["addhcountry"])->find();
			$objAddressHome ->country_c 		= $objCountry->country_c;
			
			$objAddressWork = new Model_Address();
			
			$objAddressWork ->line1_c			= $_POST["addwline1"];
			$objAddressWork ->nearlandmark_c 	= $_POST["addwlandmark"];
			$objAddressWork ->location_c 		= $_POST["addwloc"];
			$objAddressWork ->city_c 			= $_POST["addwcity"];
			$objAddressWork ->state_c 			= $_POST["addwstate"];
			$objAddressWork ->pin_c 			= $_POST["addwpin"];
			$objCountry = orm::factory('countrymaster')->where('countrycode_c','=',$_POST["addwcountry"])->find();
			$objAddressWork ->country_c 		= $objCountry->country_c;
			
			
			 
			$encrypt = Encrypt::instance('default'); 
			$profileuserid = $encrypt->decode($_POST['profileuserid']);
			$objUser = ORM::factory('user')->where('id','=',$profileuserid)->find();
			
			
			$objUser ->Firstname_c				= trim($_POST["Firstname_c"]);
			$objUser ->middlename_c				= trim($_POST["middlename_c"]);
			$objUser ->lastname_c				= trim($_POST["lastname_c"]);
			$objUser ->gender_c				= $_POST["gender_c"];
			$objUser ->DOB_c				= date('Y-m-d',strtotime($_POST["dob"]));
			
			$objUser ->phonenohome_c			= $_POST["phonenohome_c"];
			$objUser ->isdphonenohome_c			= $_POST["isdphonenohome_c"];
			
			$objUser ->mobileno1_c				= $_POST["mobileno1_c"];
			$objUser ->isdmobileno1_c			= $_POST["isdmobileno1_c"];
			
			$objUser ->phonenowork_c			= $_POST["phonenowork_c"];
			$objUser ->isdphonenowork_c			= $_POST["isdphonenowork_c"];
			
			$objUser ->mobilenowork_c			= $_POST["mobilenowork_c"];
			$objUser ->isdmobilenowork_c			= $_POST["isdmobilenowork_c"];
			
			$objUser ->profileeditdate_c			= date('Y-m-d');
			$objUser ->maritalstatus_c 			= $_POST["maritalstatus_c"];
			$objUser ->email 				= $_POST["email"];
			$objUser ->uid 				= $_POST["uid"];
			
			/*$db = Database::instance();
			$db->begin();
			try
			{
				$objUser ->refaddresshome1_c	 = $objAddressHome ->saveRecord();
				$objUser ->refaddresswork_c		 = $objAddressWork ->saveRecord();
				$objUser ->save();
			}
			catch(Exception $f)
			{
				$db->rollback();
				throw new Exception($f);
			}
			$db->commit();*/
			try
			{
				$objAddressHome ->saveRecord();
				$objUser ->refaddresshome1_c = $objAddressHome->id;
			}
			catch(Exception $f)
			{
				throw new Exception ($f);
			}
			try
			{
				$objAddressWork ->saveRecord();
				$objUser ->refaddresswork_c		= $objAddressWork->id;
			}
			catch(Exception $g)
			{
				throw new Exception ($g);
			}
			try
			{
				$objUser ->save();
			}
			catch(Exception $h)
			{
				throw new Exception ($h);
			}
		}
		catch (Exception $e)
		{
			throw new Exception($e);
		}
		$messages['success'] = "Profile Updated Successfully!";
		$this->displayPage($errors, $messages,$profileuserid);
	}

	public function action_setDOB(){
		$obj_user	= Auth::instance()->get_user();
		if (!$obj_user)
		   Request::current()->redirect('cuser/login');
		else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'doctor')))){
   		     $objPatient = ORM::factory('user')->where('id','=',$_GET['patientId'])->find();
		     $objPatient->DOB_c =  date('Y-m-d',strtotime($_GET["dob"]));
		     $objPatient->save();     
		     die;
		}
		else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'patient')))){
     		     $obj_user->DOB_c =  date('Y-m-d',strtotime($_GET["dob"]));
		     $obj_user->save();     
		     die;
		}
	} 
} // End Welcome
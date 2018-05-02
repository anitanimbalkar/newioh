<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cstaffprofile extends Controller_Ctemplatewithmenu {
//var $uploaddestination = "/wamp/www/ayushman/assets/userphotos/";
	public function action_staffprofile()
	{
		$errors = array();
		$messages = array();
		$this->displayPage($errors, $messages);
	
	}
	public function displayPage($errors, $messages)
	{
		$obj_user = Auth::instance()->get_user();
		$content = View::factory('vuser/vstaff/vstaffprofile');
		$objaddhome = ORM::factory('address')
					->where('id','=',$obj_user->refaddresshome1_c)
						->find();
		$users = ORM::factory('user')
					->where('id','=',$obj_user->id)
						->find();				
		$objaddwork = ORM::factory('address')
					->where('id','=',$obj_user->refaddresswork_c)
						->find();
		
		$objstaff = ORM::factory('staff')
 							->where('refstaffuserid_c','=',$obj_user->id)
							->find();
		$staffid = $objstaff->id;
			
		
		//create language array for language dropdownlist
		
		$objlanguage = new Model_Languagemaster;
		$objlanguage = $objlanguage->find_all();
		$arrlanguage = array();
		foreach($objlanguage as $res)
		{
			if(! empty($res->language_c))
			array_push($arrlanguage,ucwords(strtolower($res->language_c)));
		}	
		
		//create city array for city dropdownlist
		
		$objcity = new Model_Citymaster;
		$objcity = $objcity->find_all();
		$arrcity = array();
		foreach($objcity as $res)
		{
			if(! empty($res->city_c))
			array_push($arrcity,ucwords(strtolower($res->city_c)));
		}
		sort($arrcity);
		$content->bind('staffid', $staffid);
		$content->bind('user', $obj_user);
		$content->bind('users', $users);
		$content->bind('objaddhome', $objaddhome);
		$content->bind('objaddwork', $objaddwork);
		
		$content->bind('arrlanguage', $arrlanguage);
		$content->bind('arrcity', $arrcity);
		$content->bind('objstaff', $objstaff);
		$content->bind('messages', $messages);
		
		$urole = "staff";
		$breadcrumb = "Home>>";
        $this->template->breadcrumb = $breadcrumb;
		$this->template->content = $content;
		$this->template->user = $obj_user->Firstname_c;
		$this->template->urole = $urole;	
		
		
	}
	public function action_autocomplete()
{
$strQuery=$_GET['term'];
$query=$_GET["query"];
$column=$_GET['column'];
$arrayreturn=array();
$strQuery=$strQuery."%";
$query=$query." like '".$strQuery."';";
$result = Db::query(Database::SELECT, $query)
->execute()
->as_array();
foreach($result as $data)
{
if(! empty($data[$column]))
{
if (!in_array($data[$column],$arrayreturn))
array_push($arrayreturn,trim(($data[$column])));
}
}

die(json_encode($arrayreturn));
}

	public function action_saveProfile()
	{
		try
		{
			$obj_user = Auth::instance()->get_user();
			$userid=$obj_user->id;
			
			$errors = array();
			$messages = array();
			
			$objAddressHome = new Model_Address();
			
			$objAddressHome ->line1_c			= $_POST["addhline1"];
			$objAddressHome ->nearlandmark_c 	= $_POST["addhlandmark"];
			$objAddressHome ->location_c 		= $_POST["addhloc"];
			$objAddressHome ->city_c 			= $_POST["addhcity"];
			$objAddressHome ->state_c 			= $_POST["addhstate"];
			$objAddressHome ->pin_c 			= $_POST["addhpin"];
			$objAddressHome ->country_c 		= $_POST["addhcountry"];
			
			
			$objAddressWork = new Model_Address();
			
			$objAddressWork ->line1_c			= $_POST["addwline1"];
			$objAddressWork ->nearlandmark_c 	= $_POST["addwlandmark"];
			$objAddressWork ->location_c 		= $_POST["addwloc"];
			$objAddressWork ->city_c 			= $_POST["addwcity"];
			$objAddressWork ->state_c 			= $_POST["addwstate"];
			$objAddressWork ->pin_c 			= $_POST["addwpin"];
			$objAddressWork ->country_c 		= $_POST["addwcountry"];
			
			 
			$objUser = Auth::instance()->get_user();
			
			$objUser ->Firstname_c				= trim($_POST["Firstname_c"]);
			$objUser ->middlename_c				= trim($_POST["middlename_c"]);
			$objUser ->lastname_c				= trim($_POST["lastname_c"]);
			$objUser ->gender_c					= $_POST["gender_c"];
			$objUser ->DOB_c					= date('Y-m-d',strtotime($_POST["dob"]));
			$objUser ->bloodgroup_c				= $_POST["bloodgroup_c"];
			$objUser ->phonenohome_c			= $_POST["phonenohome_c"];
			$objUser ->phonenowork_c			= $_POST["phonenowork_c"];
			$objUser ->mobileno1_c				= $_POST["mobileno1_c"];
			$objUser ->profileeditdate_c		= date('Y-m-d');
			$objUser ->mobilenowork_c			= $_POST["mobilenowork_c"];
			$objUser ->maritalstatus_c 			= $_POST["maritalstatus_c"];
			$objUser ->languages_c 				= $_POST["languages"];
			$objUser ->email	 				= $_POST["email"];
			
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
			$objstaffs = ORM::factory('staff')
 							->where('refstaffuserid_c','=',$userid)
							->find();
			$objstaffs->officename = $_POST["officename_c"];
			$objstaffs->qualification_c = $_POST["qualifications_c"];
		
			try{
				$objstaffs->save();;
			}
			catch(Exception $f)
			{
				throw new Exception($f);
			}
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
		$this->displayPage($errors, $messages);
	}
	
} // End Welcome


?>

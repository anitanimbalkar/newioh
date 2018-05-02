<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/xmpp.php');
class Controller_Cdoctorfavoritestaff extends Controller_Ctemplatewithmenu {
	public function action_addtofavorite()
	{
		$staffid=$_GET["staffid"];
		$userid=$_GET["userid"];
		$staffuserid=$_GET["staffuserid"];
		$this->addstafftofavorite($staffid,$userid);
		$arr_xmpp = include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/config/xmpp.php');
		$obj_user = Auth::instance()->get_user();		
		$var = xmpp::addRosterContact($staffuserid.'@'.$arr_xmpp['servername'],$staffuserid.'@'.$arr_xmpp['servername'],$userid.'@'.$arr_xmpp['servername'],$obj_user->password);
		Request::current()->redirect('cdoctorfavoritestaff/displayfavoritestaffonadds?staffuserid='.$staffuserid);
	}	
 	public function addstafftofavorite($staffid,$userid)
	{
		$obj_doctors = ORM::factory('doctor')
 				->where('refdoctorsid_c','=',$userid)
 				->find();
 		$doctorid=$obj_doctors->id;
		$sts="pending";
		$obj_favoritestaffbydoctors=ORM::factory('favoritestaffbydoctor')
										->where('reffavdoctorid','=',$doctorid)
										->where('reffavstaffid','=',$staffid)	
									
										->find();
 		$array_favoritestaffbydoctors=$obj_favoritestaffbydoctors->as_array();
 		if($array_favoritestaffbydoctors["id"] == null){
			$obj_favoritestaffbydoctors = ORM::factory('favoritestaffbydoctor');
			$obj_favoritestaffbydoctors->reffavdoctorid=$doctorid;
			$obj_favoritestaffbydoctors->reffavstaffid=$staffid;
			$obj_favoritestaffbydoctors->status=$sts;
			$obj_favoritestaffbydoctors->save();
		}
	}
	public function action_remove()
	{
		$staffid=$_GET["staffid"];
		$userid=$_GET["userid"];
		$staffuserid=$_GET["staffuserid"];
		$obj_doctors = ORM::factory('doctor')
			->where('refdoctorsid_c','=',$userid)
			->find();
 		$doctorid=$obj_doctors->id;
		$obj_favoritestaffbydoctor = ORM::factory('favoritestaffbydoctor')//would produce the SQL:select * from favoritedocterbypatients where reffavdocbypatpatientsid_c=userid and reffavdocbypatdoctorsid_c=doctorid
 										->where('reffavdoctorid','=',$doctorid)
 										->where('reffavstaffid','=',$staffid);

		foreach ($obj_favoritestaffbydoctor->find_all() as $orm)
		{
			$orm->delete();
		}
		$obj_user = Auth::instance()->get_user();		
		$arr_xmpp = include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/config/xmpp.php');
		$var = xmpp::deleteRosterContact($staffuserid.'@'.$arr_xmpp['servername'],$userid.'@'.$arr_xmpp['servername'],$obj_user->password);
		Request::current()->redirect('cdoctorfavoritestaff/displayfavoritestaffs');
	}
	public function action_displayfavoritestaffs()
	{$checkadd=0;
	$staffidadded="";
		$whereclause = "[staffname,like,%](or)[city_c,like,%](or)[location_c,like,%]";
		$this->displaystaffdashboard($whereclause,$checkadd,$staffidadded);
	}
	public function action_displayfavoritestaffonadds()
	{   $checkadd=1;
	 $staffidadded=$_GET["staffuserid"];
		$whereclause = "[staffname,like,%](or)[city_c,like,%](or)[location_c,like,%]";
		$this->displaystaffdashboard($whereclause,$checkadd,$staffidadded);
	}
	public function displaystaffdashboard($whereclause,$checkadd,$staffidadded)
	{	
		$obj_authuser = Auth::instance()->get_user();
		
		$obj_searchedstaffs = ORM::factory('searchedstaff')
							->distinct(TRUE)
							->find_all()
							->as_array();
		$result = $obj_searchedstaffs;
		$array_city=array();
		foreach($result as $res)
		{
			if(! empty($res->city_c))
			array_push($array_city, $res->city_c);
		}
		$array_qual=array();
		foreach($result as $res)
		{
			if(!empty($res->qualification_c) && $res->qualification_c != ' ')
			array_push($array_qual, $res->qualification_c);
		}
		
		
		$array_city=array_unique($array_city);
		$content = View::factory('vuser/vdoctor/vdoctorfavoritestaff');
		$userid = $obj_authuser->id;
		$content->bind('userid', $userid);
		$content->bind('checkadd', $checkadd);
		$content->bind('staffidadded', $staffidadded);
		$content->bind('array_city', $array_city);
		$content->bind('array_qual', $array_qual);
		
		$content->bind('whereclause', $whereclause);
		$obj_doctors = ORM::factory('doctor')
 				->where('refdoctorsid_c','=',$userid)
 				->find();
 		$doctorid=$obj_doctors->id;
		$content->bind('doctorid', $doctorid);		
		$content->bind('userid', $userid);
		$urole = "doctor";
		$breadcrumb = "Home>>";
		$this->template->breadcrumb = $breadcrumb;
		$this->template->content = $content;
		$this->template->user = "Dr. ".$obj_authuser->Firstname_c;
		$this->template->urole = $urole;
		
		if (!$obj_authuser)
		{
			// if a user is not logged in, redirect to login page
			Request::current()->redirect('cuser/login');
		}
		else
		{
			if ($obj_authuser->has('roles', ORM::factory('role', array('name' => 'doctor'))))
			{
				$urole = "doctor";
			}
			
		}
		$content->bind('urole', $urole);
		$breadcrumb = "Home>>";
		$this->template->breadcrumb = $breadcrumb;
		$this->template->content = $content;
		if($urole =="doctor"){
		$this->template->user = "Dr. ".trim($obj_authuser->Firstname_c);
		}
		else{
		$this->template->user = $obj_authuser->Firstname_c;
		}
		$this->template->urole = $urole;
	}
	public function action_searchbuttononclick()
	{
		//take all values.
		if(!($_POST['textfield']=='Name'))	
		{
			$name=$_POST['textfield'];
		}
		else
		{
			$name="";
		}
		$city=$_POST['city'];
		$location=$_POST['location'];
		$qualification=$_POST['qualification'];
	
		
		$whereclause ="";
		if( empty ($name) &&empty($city) && empty ($location))
		{
			$whereclause = "[staffname,like,%](or)[city_c,like,%](or)[location_c,like,%]";
		}
		else
		{
			if(!($name== ""))
			{
				$whereclause = "[staffname,like,".$name."%]";
			}
			if(!($city== ""))
			{
			  if((($location== "") or ($location== "Locality")))//only city seleted not location
			  { 
			     $whereclause = $whereclause."[city_c,like,%".$city."%]";
			  }
			 else//location also selected
			  {	
			  	$whereclause = $whereclause."[location_c,like,%".$location."%]";
			  }
			}
			if(!($qualification == 'Qualification'))
			{
				$whereclause = $whereclause."[qualification_c,like,%".$qualification."%]";
			}
			
		}
		$checkadd=0;
		$staffidadded="";
		$this->displaystaffdashboard($whereclause,$checkadd,$staffidadded);
	}
	public function action_selectedcity()
	{
		$city = $_GET['city'];
		$obj_address = ORM::factory('address')
						->where('city_c','=',$city)
						->find_all();
		$result = $obj_address;
		$array_location=array();
		foreach($result as $res)
		{
			if(! empty($res->location_c))
			array_push($array_location,trim(ucfirst($res->location_c)));
		}
		$array_location=array_unique($array_location);
		
		$result = array();
		$i=0;
		foreach ( $array_location as $key => $val )
		{
			$result[$i] = $val;
			$i++;
		}
		
		$obj=json_encode ($result);
		die($obj);
	}
} // End Welcome

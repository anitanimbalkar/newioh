<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cchemistfinder extends Controller_Ctemplatewithmenu  {

	public function action_displaychemistfindergrid()
	{		
		$whereclause = "[medicalname,like,%](or)[city,like,%](or)[location,like,%]";
		$this->displaychemistdashboard($whereclause);
	}
	public function displaychemistdashboard($whereclause)
	{	
		$obj_authuser = Auth::instance()->get_user();
		
		$obj_searchedchemists = ORM::factory('searchedchemist')
							->distinct(TRUE)
							->find_all()
							->as_array();
		$result = $obj_searchedchemists;
		$array_city=array();
		foreach($result as $res)
		{
			if(! empty($res->city))
			array_push($array_city, $res->city);
		}
		
		
		
		$array_workinghours=array();
		foreach($result as $res)
		{
			if(!empty($res->workinghours_c) && $res->workinghours_c != ' ')
			array_push($array_workinghours, $res->workinghours_c);
		}
		
		$array_homedeliveryfacility=array();
		foreach($result as $res)
		{
			if(!empty($res->homedeliveryfacility) && $res->homedeliveryfacility != ' ')
			array_push($array_homedeliveryfacility, $res->homedeliveryfacility);
		}
		$array_homedeliveryfacility=array_unique($array_homedeliveryfacility);
		$array_city=array_unique($array_city);
		$content = View::factory('vuser/vchemist/vchemistsfinder');
		$userid = $obj_authuser->id;
		$content->bind('userid', $userid);
		$content->bind('array_city', $array_city);
		$content->bind('array_workinghours', $array_workinghours);
		$content->bind('array_homedeliveryfacility', $array_homedeliveryfacility);
		$content->bind('whereclause', $whereclause);
		
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
			else if ($obj_authuser->has('roles', ORM::factory('role', array('name' => 'patient'))))
			{	
				$urole = "patient";			
			}
			else if ($obj_authuser->has('roles', ORM::factory('role', array('name' => 'staff'))))
			{	
				$urole = "staff";			
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
		
		$homedeliveryfacility=$_POST['homedeliveryfacility'];
		
		$whereclause ="";
		if( empty ($name) &&empty($city) && empty ($location))
		{
			$whereclause = "[medicalname,like,%](or)[city,like,%](or)[location,like,%]";
		}
		else
		{
			if(!($name== ""))
			{
				$whereclause = "[medicalname,like,".$name."%]";
			}
			if(!($city== ""))
			{
			  if((($location== "") or ($location== "Locality")))//only city seleted not location
			  { 
			     $whereclause = $whereclause."[city,like,%".$city."%]";
			  }
			 else//location also selected
			  {	
			  	$whereclause = $whereclause."[location,like,%".$location."%]";
			  }
			}
			if(!($homedeliveryfacility == 'Home Delivery Facility'))
			{
				$whereclause = $whereclause."[homedeliveryfacility,like,%".$homedeliveryfacility."%]";
			}
			
		}
		$this->displaychemistdashboard($whereclause);
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
}
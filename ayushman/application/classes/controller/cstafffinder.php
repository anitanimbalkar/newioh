<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cstafffinder extends Controller_Ctemplatewithmenu  {

	public function action_displaystafffindergrid()
	{		
		$whereclause = "[staffname,like,%](or)[city_c,like,%](or)[location_c,like,%]";
		$this->dispalystaffdashboard($whereclause);
	}
	public function dispalystaffdashboard($whereclause)
	{	
		$obj_authuser = Auth::instance()->get_user();
		
		$obj_searchedstaff1s = ORM::factory('searchedstaff')
							->distinct(TRUE)
							->find_all()
							->as_array();
		$result = $obj_searchedstaff1s;
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
		$array_work=array();
		foreach($result as $res)
		{
			if(!empty($res->workinghours) && $res->workinghours != ' ')
			array_push($array_work, $res->workinghours);
		}
		
		$array_city=array_unique($array_city);
		$content = View::factory('vuser/vstaff/vstafffinder');
		$userid = $obj_authuser->id;
		$content->bind('userid', $userid);
		$content->bind('array_city', $array_city);
		$content->bind('array_qual', $array_qual);
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
			
		}
		$content->bind('urole', $urole);
		$breadcrumb = "Home>>";
		$this->template->breadcrumb = $breadcrumb;
		$this->template->content = $content;
		if($urole =="doctor"){
		$this->template->user = "Dr. ".trim($obj_authuser->Firstname_c);
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
			if(!($qualification == "Qualification"))
			{
				$whereclause = $whereclause."[qualification_c,like,%".$qualification."%]";
			}
		
			
		}
		$this->dispalystaffdashboard($whereclause);
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
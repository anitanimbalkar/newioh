<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cicard extends Controller_Template {

public function action_displayCard()
	{		
		if($_GET)
		{
			$user = Auth::instance()->get_user();		
			$patId = $_GET['patId'];
			$objUser = ORM::factory('user')->where('id','=',$patId)->find();
			
			$fname = $objUser->Firstname_c;
			$mname= $objUser->middlename_c;
			$lname=$objUser->lastname_c;
			$gender=$objUser->gender_c;
			$dob=$objUser->DOB_c;
			$mob=$objUser->mobileno1_c;
			$emergencyno=$objUser->phonenohome_c;
			$bloodgroup=$objUser->bloodgroup_c;
			$medicalprob=$objUser->knownmedicalproblem_c;
			$userphoto=$objUser->photo_c;
			$addressid=$objUser->refaddresshome1_c;
			$objAddress = ORM::factory('address')->where('id','=',$addressid)->find();
			$line1=$objAddress->line1_c;
			$city=$objAddress->city_c;
			$state=$objAddress->state_c;
			$pin=$objAddress->pin_c;
			$objStaff = ORM::factory('staff')->where('refstaffuserid_c','=',$user)->find();
			$content = View::factory("vuser/vpatient/vicard");
			$content->bind("objStaff",$objStaff);
			$content->bind("line1",$line1);
			$content->bind("city",$city);
			$content->bind("state",$state);
			$content->bind("pin",$pin);
			$content->bind("patId",$patId);
			$content->bind("fname",$fname);
			$content->bind("mname",$mname);
			$content->bind("lname",$lname);
			$content->bind("gender",$gender);
			$content->bind("dob",$dob);
			$content->bind("mob",$mob);
			$content->bind("emergencyno",$emergencyno);
			$content->bind("medicalprob",$medicalprob);
			$content->bind("bloodgroup",$bloodgroup);
			$content->bind("userphoto",$userphoto);
			 $this->template->content = $content;
		}
	}
}
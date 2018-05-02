<?php defined('SYSPATH') or die('No direct script access.');
 
class Controller_Cdoctorcalendarforpat extends Controller_Template {
 public function action_showdoccaltopat()
 	{
		$appcalid=$_GET["appcalid"];
		$patuid=$_GET["userid"];
		$doctorid=$_GET["doctorid"];
		
 		$content = View::factory('vuser/vdoctorcalforpatient');
		$content->bind('appcalid', $appcalid);
		
 		$this->template->content = $content;
	}
	
	public function action_showdoccaltopatReschedule()
 	{
		$appcalid=$_GET["docappcalid"];		
 		$content = View::factory('user/doctorcalforpatient');
		$content->bind('appcalid', $appcalid);		
 		$this->template->content = $content;
	}	

}
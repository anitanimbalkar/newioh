<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cdoctorpastappointments extends Controller_Ctemplatewithmenu {
	public function action_viewpastappointments()
	{
			$obj_user = Auth::instance()->get_user();
					$url = '/cconsultation/view?#dashboard/docpastapp/';
					Request::current()->redirect($url);
					//$username = "Dr. ".trim($objUser->Firstname_c);
/*
			$content = View::factory('vuser/vdoctor/vdoctorpastappointments');
			$content->bind('obj_user', $obj_user);
			$username = "Dr. ".trim($obj_user->Firstname_c);
			$content->bind('username', $username);
			$urole = "doctor";
			$breadcrumb = "Home>>";
            $this->template->breadcrumb = $breadcrumb;
			$this->template->content = $content;
			$this->template->user = $username;
			$this->template->urole = $urole;
*/				
	}
	public function action_getdoctorpastappointments()
	{
		$doc_userid = $_GET['id'];
		$count = $_GET['count'];
		$objAppointments = new Model_Doctorpastappointments;
		echo($objAppointments);
		$apps['apps'] = $objAppointments->get_pastapps($doc_userid,'completed',$count);
		$apps['appscount'] = $objAppointments->get_pastappcount($doc_userid,'completed');
		$response = json_encode($apps);		
		header("Cache-Control: no-cache, must-revalidate");
		echo($response);
		die();

	}
	public function action_getdoctorpastappointmentdata()
	{
		$doc_userid = $_GET['id'];
		$objAppointments = new Model_Doctorpastappointments;
		echo($objAppointments);
		$apps['apps'] = $objAppointments->get_pastallappsdata($doc_userid,'completed');
		$apps['appscount'] = $objAppointments->get_pastappcount($doc_userid,'completed');
		$response = json_encode($apps);		
		header("Cache-Control: no-cache, must-revalidate");
		echo($response);
		die();
	}

} // End Welcome

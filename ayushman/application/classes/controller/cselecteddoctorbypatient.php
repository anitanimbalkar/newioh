<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cselecteddoctorbypatient extends Controller_Ctemplatewithmenu {
	public function action_displaypatient()
	{
			$obj_user = Auth::instance()->get_user();
			$obj_doctor = new Model_Doctor;
			$obj_doctor->where('refdoctorsid_c','=',$obj_user->id)
			->find();
			$doctorid=$obj_doctor->id;
			$content = View::factory('vuser/vdoctor/vselecteddoctorbypatient');
			$content->bind('obj_user', $obj_user);
			$content->bind('doctorid', $doctorid);
			$username = "Dr. ".trim($obj_user->Firstname_c);
			$content->bind('username', $username);
			$urole = "doctor";
			$breadcrumb = "Home>>";
			
            $this->template->breadcrumb = $breadcrumb;
			$this->template->content = $content;
			$this->template->user = $username;
			$this->template->urole = $urole;	
	}

} // End Welcome

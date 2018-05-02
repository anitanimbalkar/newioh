<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Crescheduleappwithdoc extends Controller_Ctemplatewithmenu {
	public function action_rescheduleappointment()
	{
		$obj_user = Auth::instance()->get_user();
		$content = View::factory('vuser/vpatient/vrescheduledappwithdoc');
		$doctorid=$_GET["doctorid"];
		$appdatetime = $_GET["appdate"];
		$rescheduledappointmentid=$_GET["rescheduledappointmentid"];
		$obj_oldappointment = ORM::factory('appointment')//create appointment object
						->where('id','=',$rescheduledappointmentid)
						->find();
		$time = strtotime($obj_oldappointment->scheduledstarttime_c);
		$olddate = date( 'd M Y', $time ); 
		$oldtime = date( 'H:i', $time );
		$objdoctorinfo = ORM::factory('user')
			->join('doctors')
			->on('user.id','=','doctors.refdoctorsid_c')
			->where('doctors.id','=',$doctorid)
			->find();
			$doctornm=$objdoctorinfo->Firstname_c." ".$objdoctorinfo->lastname_c;
			$doctoruserid=$objdoctorinfo->id;
			//$userid = $obj_user->id;
			$content->bind('doctornm', $doctornm);
			$content->bind('doctoruserid', $doctoruserid);
			$content->bind('olddate', $olddate);
			$content->bind('oldtime', $oldtime);
			//$content->bind('userid', $userid);
			$content->bind('appdatetime', $_GET["appdate"]);
			$user = $obj_user->Firstname_c;
			$urole = "patient";
			$breadcrumb = "Home>>";
			$this->template->breadcrumb = $breadcrumb;
			$this->template->content = $content;
			$this->template->user = $user;
			$this->template->urole = $urole;
	}
}
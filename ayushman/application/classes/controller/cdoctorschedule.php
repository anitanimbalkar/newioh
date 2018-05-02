<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Cdoctorschedule extends Controller_Ctemplatewithmenu   {
  public function action_view(){
    try{
      $objUser = Auth::instance()->get_user();
      if (!($objUser && $objUser->has('roles', ORM::factory('role', array('name' => 'doctor'))))){
        Request::current()->redirect('cuser/login');
      }
      $objDoctor = ORM::factory('doctor')->where('refdoctorsid_c','=',$objUser->id)->find();
      $schedule_helper = new helper_schedulehelper();
      $clinics = $schedule_helper->get_doctor_clinic_details($objDoctor->id);
	  //var_dump($clinics); die;
      $content = View::factory('/vuser/vdoctor/vdoctorschedule');
      $content->bind('clinics', $clinics);
      $this->template->breadcrumb = ">>Home";
      $this->template->content = $content;
      $this->template->user = $objUser;
      $this->template->urole = "doctor";
	  $content->bind('objuser', $objUser);
			$arr_xmpp = Kohana::$config->load('xmpp');
			$content->bind('arr_xmpp' , $arr_xmpp);
			$this->template->content = $content;
    }
    catch(Exception $e) { throw new Exception($e); }
  }
  public function action_getclinics()
{
	$objUser = Auth::instance()->get_user();
      if (!($objUser && $objUser->has('roles', ORM::factory('role', array('name' => 'doctor'))))){
        Request::current()->redirect('cuser/login');
      }
      $objDoctor = ORM::factory('doctor')->where('refdoctorsid_c','=',$objUser->id)->find();
      $schedule_helper = new helper_schedulehelper();
      $clinics = $schedule_helper->get_doctor_clinic_details($objDoctor->id);
	  echo(json_encode($clinics));die;
}
}

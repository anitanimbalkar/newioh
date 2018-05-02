<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Cconsultationtiming extends Controller{
  public function action_view(){
    try{
      $user_object = Auth::instance()->get_user();
      if (!($user_object && $user_object->has('roles', ORM::factory('role', array('name' => 'doctor'))))){
        Request::current()->redirect('cuser/login');
      }
      $doctor_object = ORM::factory('doctor')->where('refdoctorsid_c','=',$user_object->id)->find();
      $consultation_timing_id = $this->request->post('consultation_timing_id');
      $clinic_id = $this->request->post('clinic_id');
      $consultation_timing_object = ORM::factory('consultationtiming')->where('id', '=', $consultation_timing_id)->find();
      if($consultation_timing_object->loaded()){
        $content = View::factory('/vuser/vdoctor/vconsultationtiming');
        $content->bind('consultation_timing_object', $consultation_timing_object);
        $content->bind('clinic_id', $clinic_id);
        $this->response->body($content);
      }
    }
    catch(Exception $e) { throw new Exception($e); }
  }
}

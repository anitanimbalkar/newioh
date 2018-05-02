<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Callearliestappointment extends Controller_Ctemplatewithmenu {
	public function action_view(){
		try{
			$object_user = Auth::instance()->get_user();
			if (!$object_user ){
				Request::current()->redirect('cuser/login');
			}
			$doctors = ORM::factory('doctor')->where('refdoctorsid_c','=',$object_user->id)->find_all();
			if(count($doctors) > 0){
				$content = View::factory('/vuser/vdoctor/vmyschedule');
				$content->bind('object_doctors', $doctors);
				$this->template->breadcrumb = ">>Home";
				$this->template->breadcrumb = ">>Home";
				$this->template->content = $content;
				$this->template->user = $object_user;
				$this->template->urole = 'doctor';
			}else{

				$object_patient = ORM::factory('patient')->where('repatientsuserid_c','=',$object_user->id)->find();
				
				$objIndividualPlans = new Model_Billingindividualplan;
				$objIndividualPlans->where('refusersid_c','=', $object_user->id)->where('status_c','=', 'active')->find();
				if(!$objIndividualPlans->loaded()){
					$this->showmessage();
				}
				else{
					//check if redirected from reschedule option
					$session = Session::instance();
					if(($reschedule_appointment_id = $session->get('reschedule_appointment_id')) !== null){
						$reschedule_appointment_object = ORM::factory('appointment')->where('id', '=', $reschedule_appointment_id)->find();
						$object_fav_doctors = ORM::factory('favoritedocterbypatient')
						->where('reffavdocbypatpatientsid_c', '=', $object_patient->id)
						->where('reffavdocbypatdoctorsid_c','=',$reschedule_appointment_object->refappwithid_c)
						->find_all();
					}
					else{
						$object_fav_doctors = ORM::factory('favoritedocterbypatient')->where('reffavdocbypatpatientsid_c', '=', $object_patient->id)->find_all();
					}
					$doctor_ids = array();
					foreach($object_fav_doctors as $object_fav_doctor){
						array_push( $doctor_ids, $object_fav_doctor->reffavdocbypatdoctorsid_c);
					}
					if(count($doctor_ids) > 0){
						$object_doctors = ORM::factory('doctor')->where('id', 'in', $doctor_ids)->find_all();
					}
					else{
						$object_doctors = null;
					}
					$content = View::factory('/vuser/vpatient/vallearliestappointment');
					$content->bind('object_doctors', $object_doctors);
					$this->template->breadcrumb = ">>Home";
					$this->template->content = $content;
					$this->template->user = $object_user;
					$this->template->urole = 'patient';
				}
			}
		}
		catch(Exception $e) { throw new Exception($e); }
	}
  private function showmessage(){
		$content = View::factory('vuser/vpatient/vappointmentmessage');
		$obj_user = Auth::instance()->get_user();
		$greet = 'Hello, '.ucfirst($obj_user->Firstname_c).' '.ucfirst($obj_user->lastname_c);
		$content->bind('greet', $greet);
		$this->template->content = $content;
    $this->template->user = $obj_user;
    $this->template->urole = 'patient';
	}
}

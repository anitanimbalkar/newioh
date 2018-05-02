<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Patientinfo extends Controller_Ctemplatewithmenu {

		public function action_getpatientinfo(){
			
		if($_GET){
			$term = $_GET['pname'];
			$doctor = ORM::factory('doctor')->where('refdoctorsid_c','=',Auth::instance()->get_user()->id)->find();
			$patients = new Model_Selecteddoctorbypatient;
			//$patients = $patients->get_patients($term,$doctor->id);
			$patients = ORM::factory('selecteddoctorbypatient')->where('doctorid','=',$doctorid)->find_all()->as_array();
			
			$response = json_encode($patients);
			header("Cache-Control: no-cache, must-revalidate");
			echo($response);
			die();
		}else{
			header("Cache-Control: no-cache, must-revalidate");
			echo "Access Denied";
			die();
		}
	}
}
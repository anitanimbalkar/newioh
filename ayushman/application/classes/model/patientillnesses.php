<?php defined('SYSPATH') or die('No direct script access.');
class Model_Patientillnesses extends kohana_Ayushmanorm {
	protected $_table_name = 'patientillnesses';
  public function get_illness_ids($patient_id){
  	$illnesses = $this->where('refpatdiseasepatientsid_c','=',$patient_id)->find_all();
  	$response = array();
  	foreach($illnesses as $illness){
  	  array_push($response, $illness->refpatdiseasedieseasid_c);
  	}
  	return($response);
  }
  
  public function get_all_illness($patient_id){
  	$illnesses = $this->where('refpatdiseasepatientsid_c','=',$patient_id)->find_all();
  	$response = array();
	if(count($illnesses)>0){
	  	foreach($illnesses as $illness){
	  		$temp_array=array();
		    $object_disease_master = ORM::factory('diseasemasters')->where('id','=',$illness->refpatdiseasedieseasid_c)->find();
	  		$temp_array['disease_name']=$object_disease_master->diseasename_c;
	  		$temp_array['disease_peroid']=$illness->from_c;
	  		$temp_array['disease_detail']=$illness->medicationtaken_c;
	  		array_push($response,$temp_array);
  		}
	}
  	return($response);
  }
}
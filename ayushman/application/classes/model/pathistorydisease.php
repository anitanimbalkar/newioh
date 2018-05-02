<?php defined('SYSPATH') or die('No direct script access.');
class Model_Pathistorydisease extends kohana_Ayushmanorm {
	protected $_table_name = 'pathistorydiseases';

	public function get_diseases($disease_ids){
	if(count($disease_ids) > 0){
	  $diseases = $this->where('id', 'in', $disease_ids)->find_all();
	  $response = array();
	  foreach($diseases as $disease){
	    array_push($response, $disease->disease_c);
	  }
	}
	else{
	  $response = array();
	}  
	  return($response);
	}
	
	public function get_diseases_history($disease_ids){
		  $response = array();
		if(count($disease_ids) > 0){
			foreach($disease_ids as $diseasehistory){
		 		$diseases = ORM::factory('pathistorydisease')->where('id','=',$diseasehistory[0])->find();
		 		$diseases = $diseases->disease_c;
			   	 array_push($response,array($diseases,$diseasehistory[1],$diseasehistory[2]));
			}
		}
	  	return($response);
	}
	public function get_all_diseases(){
	  $diseases=ORM::factory('pathistorydisease')->order_by('sequence_c','asc')->find_all();
		$response = array();
		if(count($diseases)>0){
			foreach($diseases as $disease){
				array_push($response,array($disease->disease_c,$disease->id));
			}	
		}
	  return($response);
	}
}
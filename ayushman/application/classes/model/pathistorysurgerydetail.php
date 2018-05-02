<?php defined('SYSPATH') or die('No direct script access.');
class Model_Pathistorysurgerydetail extends kohana_Ayushmanorm {
	protected $_table_name = 'pathistorysurgerydetails';
	public function get_surgeries($patient_id){
	  $surgeries = $this->where('patientid_c','=',$patient_id)->find_all();
	  $response = array();
	  foreach($surgeries as $surgery){
	  	$temp_array=array();
	  	$temp_array['surgery_name']=$surgery->surgeryname_c;
	  	$temp_array['surgery_date']=$surgery->surgerydate_c;//date('d-m-Y',$surgery->surgerydate_c);
	  	$temp_array['surgery_desc']=$surgery->surgerydescription_c;
	    array_push($response, $temp_array);
	  }
	  return($response);
	}
}
<?php defined('SYSPATH') or die('No direct script access.');
class Model_Viewpatientallergie extends kohana_Ayushmanorm {
	protected $_table_name = 'viewpatientallergies';
	//protected $_has_many = array('favoritedocterbypatients' => array('model' => 'favoritedocterbypatient', 'foreign_key' => 'reffavdocbypatdoctorsid_c')

  public function get_all_allergies($patient_id){
    $allergies = $this->where('patientid','=',$patient_id)->find_all();
    $response = Array();
    foreach($allergies as $allergy){
      array_push($response, $allergy->allergyname_c);
    }
    return($response);
  }
  public function get_all_allergieswithtype($patient_id){
    $allergies = $this->where('patientid','=',$patient_id)->find_all();
    $response = Array();
    foreach($allergies as $allergy){
      array_push($response, array($allergy->type_c,$allergy->allergyname_c));
    }
    return($response);
  }
}
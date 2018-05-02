<?php defined('SYSPATH') or die('No direct script access.');
class Model_Drugformmaster extends kohana_Ayushmanorm {
	protected $_table_name = 'drugformmasters';

	public function get_all_dosage(){
	  $object_drug_forms = $this->find_all();
    $dosageSource;
    foreach($object_drug_forms as $object_drug_form){
    	$dosage  = $object_drug_form->dosage_c;
    	$dosage = explode(",", $dosage);
    	$dosageSource[$object_drug_form->drugform_c]=$dosage;
    }
    return $dosageSource;
	}
}

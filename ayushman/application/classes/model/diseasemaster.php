<?php defined('SYSPATH') or die('No direct script access.');
class Model_Diseasemaster extends kohana_Ayushmanorm {
	protected $_table_name = 'diseasemasters';
	protected $_has_many = array('diseases' => array('model' => 'diseasemaster', 'foreign_key' => 'reftreatdieseasid_c'));

	public function get_disease_names($disease_ids){
	if(count($disease_ids) > 0){
		$diseases = $this->where('id', 'in', $disease_ids)->find_all();
		$response = array();
		foreach($diseases as $disease){
		  array_push($response, $disease->diseasename_c);
		}
	}
	else{
	  $response = array();
	}
		return($response);
	}
}
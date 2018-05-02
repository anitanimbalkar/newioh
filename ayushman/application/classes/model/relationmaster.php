<?php defined('SYSPATH') or die('No direct script access.');
class Model_Relationmaster extends kohana_Ayushmanorm {
	protected $_table_name = 'relationmasters';

	public function get_all_relations(){
		$relations=$this->find_all();
		$response = array();
		foreach($relations as $relation){
			array_push($response,$relation->relationname_c);
		}
		return($response);
	}
}
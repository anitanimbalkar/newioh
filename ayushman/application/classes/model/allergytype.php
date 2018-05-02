<?php defined('SYSPATH') or die('No direct script access.');
class Model_Allergytype extends kohana_Ayushmanorm {
	protected $_table_name = 'allergytypes';
	public function get_allergytype($type){
		$allergytypes=$this->find_all();
		
		foreach($allergytypes as $allergy){
			if($allergy->id==$type){
				return($allergy->allergytype_c);
			}
		}
		return("");
	}

}
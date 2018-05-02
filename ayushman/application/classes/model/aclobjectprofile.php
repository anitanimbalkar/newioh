<?php defined('SYSPATH') or die('No direct script access.');
class Model_Aclobjectprofile extends kohana_Ayushmanorm{
	protected $_table_name = 'aclobjectprofiles';
	
	public function getProfile($aclobjectid){
		try{
			$attributes = $this->where('refaclobjectsid_c','=',$aclobjectid)->find_all()->as_array();
			return $attributes;
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
}
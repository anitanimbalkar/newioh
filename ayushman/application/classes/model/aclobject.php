<?php defined('SYSPATH') or die('No direct script access.');
class Model_Aclobject extends kohana_Ayushmanorm{
	protected $_table_name = 'aclobjects';
	
	public function getObjects($type,$roles){
		try{
			$objects = $this->where('type_c','=',$type)->where('ref_roleid_c','in',$roles)->find_all()->as_array();
			return $objects;
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
}
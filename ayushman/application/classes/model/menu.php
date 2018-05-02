<?php defined('SYSPATH') or die('No direct script access.');
class Model_Menu extends kohana_Ayushmanorm{
	protected $_table_name = 'menus';
	
	public function getAll($roles){
		try{
			$menus = $this->where('ref_roleid_c','in',$roles)->find_all()->as_array();
			return $menus;
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
}
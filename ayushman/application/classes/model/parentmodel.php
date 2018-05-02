<?php
defined('SYSPATH') or die('No direct script access.');

class Model_ParentModel extends ORM
{

	public function create_row(array $data) 
	{ 
		$this->values($data); 
		$this->save(); 
	}
	
	public function get_all($limit = 10, $offset = 0) 
	{ 
		$this->limit($limit) 
		->offset($offset); 
		return $this->find_all()->as_array(); 
	} 
	public function get_byappid($appid) 
	{ 
		return $this->where('refappointmentid_c','=',$appid)
				->find()->as_array(); 
	} 

	
	public function set_tablename($tablename) 
	{ 
		$_table_name = $tablename;
	}
	
	public function set_primarykey($primarykey) 
	{ 
		$_primary_key = $primarykey;
	}
	
	function get_current_insert_id($table)
	{
    	$sql = "SELECT LAST_INSERT_ID() FROM $table"; 
    	return $this->_db->query(Database::SELECT, $sql, FALSE);
	}
	
}


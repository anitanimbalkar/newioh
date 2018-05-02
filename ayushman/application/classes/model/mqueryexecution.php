<?php defined('SYSPATH') or die('No direct script access.');
class Model_Mqueryexecution extends kohana_Ayushmanorm {
	protected $_table_name = 'users';
	function executequery($query)	
	{
		$result = Db::query(Database::SELECT, $query)
			    ->execute()
			    ->as_array();
		return $result;
	}
}
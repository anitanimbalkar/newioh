<?php defined('SYSPATH') or die('No direct script access.');
class Model_Query extends ORM {
	protected $_table_name = 'users';

	private function getquery($data,$templateName){
		$template = include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/queries/queries.php');
		$query = $template[$templateName]['query'];
		$variable = $template[$templateName]['variables'];
		foreach($variable as $val)
		{
			if (array_key_exists($val , $data) == "true")//check for user given all required values.
			{
				$$val = $data[$val]; 
				$query =str_replace ('$'.$val, $$val , $query );
			}
			else 
			{
				throw new Exception("Complete Information is not provided for sms ".$val);
			}
		}
		return $query;
	}
	
	// this functin is used to fetch data in array format
	public function fetchdata($data,$classname){
		try{
			
			$query = "";
			$query = $this->getquery($data,$classname);
			
			$result = DB::query(Database::SELECT, $query)->execute()->as_array();
			return $result;
		}
		catch (Exception $e)
		{
			var_dump($e);
		}
	}
}

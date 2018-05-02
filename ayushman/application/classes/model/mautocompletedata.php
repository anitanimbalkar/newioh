<?php defined('SYSPATH') or die('No direct script access.');
class Model_Mautocompletedata extends kohana_Ayushmanorm {
	protected $_table_name = 'users';
	
	public function retrieve($_query, $text){
		$query = "$_query like '$text%' order by value";
		$result = Db::query(Database::SELECT, $query)
			 ->execute()
			  ->as_array();
		return $result;
	}
	public function retrievemiddle($_query, $text){
		$query = "$_query like '$text%' union $_query like '%$text%'";
		$result = Db::query(Database::SELECT, $query)
			 ->execute()
			  ->as_array();
		return $result;
	}
	
	public function retrievedata($colnm, $tablenm,$text)
	{
		//echo $colnm;echo $tablenm; echo $text;
		//die();
		$query = "select id as id, ".$colnm." as value from ".$tablenm." where ".$colnm." like '$text%' order by value limit 10";
		
		//echo $query;
		$result = Db::query(Database::SELECT, $query)
			 ->execute()
			  ->as_array();
		return $result;
	}
	public function retrieveall($_query){
		$query = $_query ;
		$result = Db::query(Database::SELECT, $query)
			 ->execute()
			  ->as_array();
		return $result;
	}
}

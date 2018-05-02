<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cautocompleter extends Controller {
//var $uploaddestination = "/wamp/www/ayushman/assets/userphotos/";
	public function action_city(){
		$strQuery = $_GET['term'];
		$arrayreturn = ORM::factory('masteraddress')->getData($strQuery,'city_c');
		die(json_encode($arrayreturn));
	}
	public function action_locality(){
		$strQuery = $_GET['term'];
		$arrayreturn = ORM::factory('masteraddress')->getData($strQuery,'locality_c');
		die(json_encode($arrayreturn));
	}
	public function action_pin(){
		$strQuery = $_GET['term'];
		$arrayreturn = ORM::factory('masteraddress')->getData($strQuery,'pincode_c');
		die(json_encode($arrayreturn));
	}
	public function action_state(){
		$strQuery = $_GET['term'];
		$arrayreturn = ORM::factory('masteraddress')->getData($strQuery,'state_c');
		die(json_encode($arrayreturn));
	}
	public function action_country(){
		$strQuery = $_GET['term'];
		$arrayreturn = ORM::factory('masteraddress')->getData($strQuery,'country_c');
		die(json_encode($arrayreturn));
	}
	public function action_autocomplete()
	{
		$strQuery=$_GET['term'];
		$query=$_GET["query"];
		$column=$_GET['column'];
		$arrayreturn=array();
		$strQuery=$strQuery."%";
		$query=$query." like '".$strQuery."' ORDER BY ".$column.";";
		
		$result = Db::query(Database::SELECT, $query)
			 ->execute()
			  ->as_array();
			foreach($result as $data)
			{
				if(! empty($data[$column]))
				{
					if (!in_array($data[$column],$arrayreturn))
					array_push($arrayreturn,trim(($data[$column])));
				}
			}
	
		die(json_encode($arrayreturn));
	}
	
} // End Welcome

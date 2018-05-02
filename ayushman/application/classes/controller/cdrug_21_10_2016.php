<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cdrug extends Controller {


	public function action_namesforPersonalization()
	{
		
		$_query1 = "select id as id, UPPER(drugname) as value, dosage as dosage from drugs where name like '".$_GET['term']."%'";
		$_query2 = "select id as id, UPPER(drugname) as value, dosage as dosage from drugs where name like '%".$_GET['term']."%' limit 15";
		$query = "$_query1 union $_query2";
		$result = Db::query(Database::SELECT, $query)
			 ->execute()
			  ->as_array();
		$this->response->body(json_encode($result));
	}
	public function action_names()
	{	$obj_user = Auth::instance()->get_user();
		$userid = $obj_user->id;	
		$obj_user = ORM::factory('doctor')->where('refdoctorsid_c','=',$userid)->find();
		$_query1 = "select drugid as drugid, UPPER(drugname) as value, dosage as dosage, drugdosage as drugdosage, 0 as flag, frequency as frequency, days as days, instruction as instruction,strength as strength,drugform as drugform,dosageinmg as dosageinmg  from doctordrugdetails where drugname like '".$_GET['term']."%' and doctorid=".$obj_user;
		$_query2 = "select drugid as drugid, UPPER(drugname) as value, dosage as dosage, drugdosage as drugdosage, 0 as flag, frequency as frequency, days as days, instruction as instruction,strength as strength,drugform as drugform,dosageinmg as dosageinmg  from doctordrugdetails where drugname like '%".$_GET['term']."%' and doctorid=".$obj_user." limit 20 ";
		$query = "$_query1 union $_query2";
		$result = Db::query(Database::SELECT, $query)
		->execute()
		->as_array();
		if(empty($result)){
			// drugname searched instead of name
		$_query1 = "select id as id, UPPER(drugname) as value, dosage as dosage, 1 as flag,strength as strength,drugform as drugform from drugs where drugname like '".$_GET['term']."%'";
		$_query2 = "select id as id, UPPER(drugname) as value, dosage as dosage, 1 as flag,strength as strength,drugform as drugform from drugs where drugname like '%".$_GET['term']."%' limit 20";
		$query = "$_query1 union $_query2";
		$result = Db::query(Database::SELECT, $query)
		->execute()
		->as_array();
		}
		$this->response->body(json_encode($result));		
	}
	public function action_drugnames()
	{
		$tempterm=explode(',',$_GET['term']);
		$index= count($tempterm)-1;
		$tempterm=trim($tempterm[$index]);
		$_query1 = "select id as id, UPPER(drugname) as value, dosage as dosage from drugs where name like '".$tempterm."%'";
		$_query2 = "select id as id, UPPER(drugname) as value, dosage as dosage from drugs where name like '%".$tempterm."%' limit 20";
		$query = "$_query1 union $_query2";
		$result = Db::query(Database::SELECT, $query)
			 ->execute()
			  ->as_array();
		$this->response->body(json_encode($result));
	}
}

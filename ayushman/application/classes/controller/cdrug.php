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
		$_query1 = "select drugid as drugid, UPPER(drugname) as value, dosage as dosage, drugdosage as drugdosage, 0 as flag, frequency as frequency, days as days, instruction as instruction,strength as strength,drugform as drugform,dosageinmg as dosageinmg,drugformid as drugformid,morndosage as morndosage,aftrdosage as aftrdosage,nightdosage as nightdosage,evendosage as evendosage,isweightbase as isweightbase,
					fromagerange1 as fromagerange1,toagerange1 as toagerange1,frqrange1 as frqrange1,days1 as days1,
					fromagerange2 as fromagerange2,toagerange2 as toagerange2,frqrange2 as frqrange2,days2 as days2,
					fromagerange3 as fromagerange3,toagerange3 as toagerange3,frqrange3 as frqrange3,days3 as days3,
					fromagerange4 as fromagerange4,toagerange4 as toagerange4,frqrange4 as frqrange4,days4 as days4,
					fromagerange5 as fromagerange5,toagerange5 as toagerange5,frqrange5 as frqrange5,days5 as days5,
					fromagerange6 as fromagerange6,toagerange6 as toagerange6,frqrange6 as frqrange6,days6 as days6 from doctordrugdetails where drugname like '".$_GET['term']."%' and doctorid=".$obj_user;
		$_query2 = "select drugid as drugid, UPPER(drugname) as value, dosage as dosage, drugdosage as drugdosage, 0 as flag, frequency as frequency, days as days, instruction as instruction,strength as strength,drugform as drugform,dosageinmg as dosageinmg,drugformid as drugformid,morndosage as morndosage,aftrdosage as aftrdosage,nightdosage as nightdosage,evendosage as evendosage,isweightbase as isweightbase,
					fromagerange1 as fromagerange1,toagerange1 as toagerange1,frqrange1 as frqrange1,days1 as days1,
					fromagerange2 as fromagerange2,toagerange2 as toagerange2,frqrange2 as frqrange2,days2 as days2,
					fromagerange3 as fromagerange3,toagerange3 as toagerange3,frqrange3 as frqrange3,days3 as days3,
					fromagerange4 as fromagerange4,toagerange4 as toagerange4,frqrange4 as frqrange4,days4 as days4,
					fromagerange5 as fromagerange5,toagerange5 as toagerange5,frqrange5 as frqrange5,days5 as days5,
					fromagerange6 as fromagerange6,toagerange6 as toagerange6,frqrange6 as frqrange6,days6 as days6 from doctordrugdetails where drugname like '%".$_GET['term']."%' and doctorid=".$obj_user." limit 20 ";
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

	public function action_followuplist()
	{	$obj_user = Auth::instance()->get_user();
		$userid = $obj_user->id;	
		$obj_user = ORM::factory('doctor')->where('refdoctorsid_c','=',$userid)->find();
		$_query1 = "select followupinstr_c as value from doctorfollowups where followupinstr_c like '%".$_GET['term']."%' and refdoctorsid_c=".$obj_user;
		$_query2 = "select followupinstr_c as value from doctorfollowups where followupinstr_c like '%".$_GET['term']."%' and refdoctorsid_c=".$obj_user." limit 20";
		$query = "$_query1 union $_query2";
		$result = Db::query(Database::SELECT, $query)
		->execute()
		->as_array();
		$this->response->body(json_encode($result));		
	}
}

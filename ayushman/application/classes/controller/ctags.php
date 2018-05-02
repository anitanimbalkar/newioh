<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Ctags extends Controller {


	public function action_doctorname()
	{
		$_query1 = "select id as id, UPPER(drname) as value from doctornames where drname like '".$_GET['term']."%'";
		$_query2 = "select id as id, UPPER(drname) as value from doctornames where drname like '%".$_GET['term']."%' limit 20";
		$query = "$_query1 union $_query2";
		$result = Db::query(Database::SELECT, $query)
			 ->execute()
			  ->as_array();
		$this->response->body(json_encode($result));
	}
	public function action_testnames()
	{
		$tempterm=explode(',',$_GET['term']);
		$index= count($tempterm)-1;
		$tempterm=trim($tempterm[$index]);
		$_query1 = "select id as id, UPPER(testname_c) as value from testmasters where testname_c like '".$tempterm."%'";
		$_query2 = "select id as id, UPPER(testname_c) as value from testmasters where testname_c like '%".$tempterm."%' limit 20";
		$query = "$_query1 union $_query2";
		$result = Db::query(Database::SELECT, $query)
			 ->execute()
			  ->as_array();
		$this->response->body(json_encode($result));
	}
	public function action_diagnosis()
	{
		$tempterm=explode(',',$_GET['term']);
		$index= count($tempterm)-1;
		$tempterm=trim($tempterm[$index]);
		$_query1 = "select id as id, UPPER(diseasename_c) as value from diseasemasters where diseasename_c like '".$tempterm."%'";
		$_query2 = "select id as id, UPPER(diseasename_c) as value from diseasemasters where diseasename_c like '%".$tempterm."%' limit 20";
		$query = "$_query1 union $_query2";
		$result = Db::query(Database::SELECT, $query)
			 ->execute()
			  ->as_array();
		$this->response->body(json_encode($result));
	}
	public function action_incident()
	{
		$userid = Auth::instance()->get_user()->id;
		$_query1="SELECT incidents.id as id, incidentsname_c as value from incidents join appointments on (appointments.refincidentid_c = incidents.id )WHERE appointments.refappfromid_c=".$userid." and incidentsname_c like '%".$_GET['term']."%'";
		$_query2="SELECT incidents.id as id, incidentsname_c as value from incidents join appointments on (appointments.refincidentid_c = incidents.id )WHERE appointments.refappfromid_c=".$userid." and incidentsname_c like '%".$_GET['term']."%' limit 20";
		//$_query1 = "select id as id, UPPER(drname) as value from doctornames where drname like '".$_GET['term']."%'";
		//$_query2 = "select id as id, UPPER(drname) as value from doctornames where drname like '%".$_GET['term']."%' limit 20";
		$query = "$_query1 union $_query2";
		$result = Db::query(Database::SELECT, $query)
			 ->execute()
			  ->as_array();
		$this->response->body(json_encode($result));
	}
}

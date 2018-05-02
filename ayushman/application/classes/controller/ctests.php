<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Ctests extends Controller {

	public function action_gettestsusingorderid()
	{
		$orderid = $_GET['orderid'];
		$objtests = ORM::factory('recommendedtest')->where('refrecomtestdiaglabsordersid_c','=',$orderid)->find_all();
		$tests = array();
		$i = 0;
		$tests = array();
		foreach($objtests as $test)
		{
			$tests[$i] = array();
			$testmasters = ORM::factory('testmaster')->where('id','=',$test->refrecomtestrecommtestid_c)->find();
			$tests[$i]["id"] = $testmasters->id;
			$tests[$i]["testname"] = $testmasters->testname_c;
			$pathologists = ORM::factory('pathologist')->where('id','=',$test->refrecomtestpathologists1id_c)->find();
			$users = ORM::factory('user')->where('id','=',$pathologists->refpathologistsuserid_c)->find();
			$tests[$i]["diagnosticcentername"] = $users->Firstname_c.' '.$users->lastname_c == ' ' ? "Not suggested":$users->Firstname_c.' '.$users->lastname_c;
			$i = $i + 1;
		}
		die(json_encode($tests));
	}
	public function action_gettestsusingappid()
	{
		$appid = $_GET['appid'];
		$objtests = ORM::factory('recommendedtest')->where('refrecomtestappointmentsid_c','=',$appid)->find_all();
		$tests = array();
		$i = 0;
		$tests = array();
		foreach($objtests as $test)
		{
			$tests[$i] = array();
			$testmasters = ORM::factory('testmaster')->where('id','=',$test->refrecomtestrecommtestid_c)->find();
			$tests[$i]["id"] = $testmasters->id;
			$tests[$i]["testname"] = $testmasters->testname_c;
			$pathologists = ORM::factory('pathologist')->where('id','=',$test->refrecomtestpathologists1id_c)->find();
			$users = ORM::factory('user')->where('id','=',$pathologists->refpathologistsuserid_c)->find();
			$tests[$i]["diagnosticcentername"] = $users->Firstname_c.' '.$users->lastname_c == ' ' ? "Not suggested":$users->Firstname_c.' '.$users->lastname_c;
			$i = $i + 1;
		}
		die(json_encode($tests));
	}
}
<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cpatientexamination extends Controller
{
	public function action_getbyappid()
	{
		$intAppId=$_GET['appid'];
		$emrexamination = new Model_EMREXAMINATION;
		$this->response->body(json_encode($emrexamination->get_byappid($intAppId)));
	}
	public function action_getexaminationdtls()
	{
		$intAppId=$_GET['appid'];
		$objpatexaminationfrms = new Model_Patientexaminationdetail;
		$objpatexaminationfrms=$objpatexaminationfrms->where('refexaminationappointmentid_c','=',$intAppId)-> find_all()->as_array();
		var_dump($objpatexaminationfrms);
		die();
		//$this->response->body(json_encode($objpatexaminationfrms));
	}
	public function action_getvitalparameters()
	{
		$arvitalsigns =array();
		$intAppId=$_GET['appid'];
		$objvitalsigns = new Model_Vitalsign;
		$arvitalsigns=$objvitalsigns->where('refappid_c','=',$intAppId)-> find()->as_array();
		echo json_encode($arvitalsigns);
	}
	public function action_getexaminationdetails()
	{
		$arappexaminations =array();
		$intAppId=$_GET['appid'];
		
		$objpatemrexamination = new Model_Patientemrexamination;
		$objpatemrexamination=$objpatemrexamination->where('refpatemrexaminationappid_c', '=', $intAppId)->find_all();
		foreach($objpatemrexamination as $res)
		{
			$arappexaminations[$res->formname_c]=$res->examinations_c;
			
		}
		
		echo json_encode($arappexaminations);
	}
} // End<?php
?>
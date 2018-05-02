<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Cshowpatientexaminationform extends Controller_Template
{
	public function action_create()
	{
		
		$content = View::factory('vuser/vpatient/vshowpatientexaminationform');
		$arrforms =array();
		$intAppId=$_GET['appid'];
		//$intAppId=11;
		$objpatexaminationfrms = new Model_Patientexaminationdetail;
		$objpatexaminationfrms=$objpatexaminationfrms->where('refexaminationappointmentid_c','=',$intAppId)-> find_all();
		
		$arquestions =array();
		$i = 0;
		foreach($objpatexaminationfrms as $res)
		{			
			if(!(array_key_exists(ucwords($res->formname_c),$arrforms)))
			{
				$arrsection =array();
			}
			if(!(array_key_exists(ucwords($res->section_c),$arrsection)))
			{
				$arquestions=array();
			}
			$arquestions[trim($res->questionnaire_c)]  = trim($res->value_c);
			$arrsection[ucwords($res->section_c)]=$arquestions;
			$arrforms[ucwords($res->formname_c)]=$arrsection;
		}
		$content->bind('arrforms', $arrforms);
		$this->template->content = $content;	
	}
	
		
} // End<?php
?>
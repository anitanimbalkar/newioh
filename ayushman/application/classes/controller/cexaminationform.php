<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Cexaminationform extends Controller_Template
{
	public function action_create()
	{
		
		$content = View::factory('vuser/vpatient/vexaminationforms');
		$arrforms =array();
		$intAppId=$_GET['appid'];
		//$intAppId=2;
		$i=0;
		$objexaminationfrms = new Model_Examinationform;
		$objexamfrms = $objexaminationfrms->distinct(true)->group_by('formname_c')->order_by('id','desc')-> find_all();
		foreach($objexamfrms as $res)
		{
			$objexaminationfrms = new Model_Examinationform;
			$objexaminationfrms=$objexaminationfrms->where('formname_c','=',$res->formname_c)-> distinct(true)-> find_all();
			$arrquestions =array();
			foreach($objexaminationfrms as $result)
			{
				$arquestions['questions']  = $result->questionnaire_c;		
				$arquestions['id'] = $result->id;		
				$arquestions['fieldtype'] = $result->fieldtype_c;
				$arrquestions[ucwords($result->section_c)][$result->id]=$arquestions;
			//	var_dump($arrquestions);
				$arrforms[$res->formname_c] =$arrquestions ;
			}
			
			//die();
		}
		$content->bind('arrforms', $arrforms);
		$this->template->content = $content;
		
		
	}
	
	public function action_saveexaminationform()
	{
		$intAppId=$_GET['appid'];
		$data =array();
			foreach(json_decode($_GET["val"]) as $json){
				if(!(empty($json[0]) ))
				$data[$json[0]] = $json[1];
			}
			$objOrm=new Model_Patientexamination;
			$objOrm->where('refexaminationappointmentid_c','=',$intAppId);
			foreach ($objOrm->find_all() as $orm)
			{
				$orm->delete();
			}
			
			foreach($data as $key=>$val)
			{
				$emrexamination = new Model_Patientexamination;
				$emrexamination->refexaminationappointmentid_c=$intAppId;
				$emrexamination->refexaminationsid_c=$key;
				$emrexamination->value_c=$val ;
				//echo $key ." and  ".$val ;
				$emrexamination->save();
				
			}		
			$content="";
			$this->template->content = $content;
	}
	
	
} // End<?php
?>
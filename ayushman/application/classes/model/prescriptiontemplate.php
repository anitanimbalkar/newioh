<?php defined('SYSPATH') or die('No direct script access.');
class Model_Prescriptiontemplate extends kohana_Ayushmanorm {
	protected $_table_name = 'prescriptiontemplates';	
	public function get(){
		try{
			$objUser = new Model_User;
			$user_info = $objUser->get_user_info();
			$templates = $this->where('doctoruserid_c','=',$user_info['id'])->order_by('name_c','asc')->find_all();
			
			$arr_templates = array();
			foreach($templates as $app){
				$temp = array();
				$temp['id'] = $app->id;
				$temp['name_c'] = ucfirst($app->name_c);
				$temp['medicines_c'] = $app->medicines_c;
				$temp['investigations_c'] = $app->investigations_c;
				$temp['symptoms_c'] = $app->symptoms_c;
				$temp['diagnosis_c'] = $app->diagnosis_c;
				$temp['followupadvice_c'] = $app->followupadvice_c;
				array_push($arr_templates, $temp);
			}
			return $arr_templates;
		}catch(Exception $e){throw new Exception($e);}
	}
}
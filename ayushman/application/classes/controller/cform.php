<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cform extends Controller {
	
	public function action_view()
	{
		$content 	= View::factory('vform');
		die($content);
	}
	
	public function action_getFormData()
	{
		$data;
		if(isset($_GET['formid']) && isset($_GET['formType']))
		{
			$fileName = $_GET['formType'].'/'.$_GET['formid'].".xml";
			$fileName = strtolower($fileName);
			$arr_examinationform =Kohana::$config->load('examinationform');
			
			$root = $arr_examinationform['root'];

			if (file_exists($root.$fileName))
			{
    			$xml = simplexml_load_file($root.$fileName);
				$json = json_encode($xml);
				$data['type'] = 'success';
				$data['value']= $json;
			}
			else
			{
				$data['type'] = 'error';
				$data['value']= 'File Not Found';
			}
		}
		else
		{
    		$data['type'] = 'error';
			$data['value']= 'No file name provided';
		}
		die(json_encode($data));
	}
	
	
	public function action_getFormDataa()
	{
		$data;
		if(isset($_GET['formid']) && isset($_GET['formType']))
		{
			$fileName = $_GET['formType'].'/'.$_GET['formid'].".xml";
			$fileName = strtolower($fileName);
			$arr_medicalhistoryform =Kohana::$config->load('examinationform');
			
			$root = $arr_medicalhistoryform['root'];

			if (file_exists($root.$fileName))
			{
    			$xml = simplexml_load_file($root.$fileName);
				$json = json_encode($xml);
				$data['type'] = 'success';
				$data['value']= $json;
			}
			else
			{
				$data['type'] = 'error';
				$data['value']= 'File Not Found';
			}
		}
		else
		{
    		$data['type'] = 'error';
			$data['value']= 'No file name provided';
		}
		die(json_encode($data));
	}	
}

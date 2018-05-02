<?php defined('SYSPATH') or die('No direct script access.');
class Model_Securityquestionmaster extends kohana_Ayushmanorm {
	protected $_table_name = 'securityquestionmaster';	

	public function get_questions(){
		$returnValue	= array();
		$return			= array();
		try{
			$obj_securityquestions 	= $this->find_all();			
			foreach($obj_securityquestions as $question)
				array_push($returnValue, $question);
			if(count($returnValue) == 0){
				$return['type'] = 'error';
				$return['data'] = "Security questions not found";
			}else{		
				sort($returnValue);			
				$return['type'] = 'success';
				$return['data'] = $returnValue;
			}
		}
		catch(Exception $e){
			$return['type'] = 'exception';
			$return['data'] = $e;
		}
		return $return;
	}
	public function get_question($id = NULL){
		$returnValue	= array();
		$return			= array();
		try{
			if($id != NULL){
				$question = $this->where('id','=',$id)->find();
				$returnValue = $question;
				$return['type'] = 'success';
				$return['data'] = $returnValue;
			}			
			else{
				$return['type'] = 'error';
				$return['data'] = 'get_question expects one parameter';
			}
		}
		catch(Exception $e){
			$return['type'] = 'exception';
			$return['data'] = $e;
		}
		return $return;
	}
}
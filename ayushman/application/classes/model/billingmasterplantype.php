<?php defined('SYSPATH') or die('No direct script access.');
class Model_Billingmasterplantype extends kohana_Ayushmanorm {
	protected $_table_name = 'billingmasterplantypes';
	public function get_plantypes(){
		$returnValue	= array();
		$return			= array();
		try{
			$returnValue = $this->ORDER_BY ('type_c', 'asc') -> find_all()->as_array();

			if(count($returnValue) == 0){
				$return['type'] = 'error';
				$return['data'] = "Plan Types not found";
			}else{
				sort($returnValue);
				$return['type'] = 'success';
				$return['data'] = $returnValue;
			}
		}
		catch(Exception $e){
			throw new Exception($e);
		}
		return $return;
	}
	public function get_plantype($id = NULL){
		$return			= array();
		try{
			if($id != NULL){
				$plantype	= $this->where('id','=',$id)->find();
				if($plantype == NULL){
					$return['type'] = 'error';
					$return['data'] = "record not found for id";
				}else{
					$return['type'] = 'success';
					$return['data'] = $plantype;
				}
			}
			else{
				$return['type'] = 'error';
				$return['data'] = "get_plantype function expects one parameter";
			}
		}
		catch(Exception $e){
			$return['type'] = 'exception';
			$return['data'] = $e;
		}
		return $return;
	}
}
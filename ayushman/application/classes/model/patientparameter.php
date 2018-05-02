<?php defined('SYSPATH') or die('No direct script access.');
class Model_patientparameter extends kohana_Ayushmanorm {
	protected $_table_name = 'patientparameters';	
	public function gettrackerparametervalues($trackersheetid){
		try{
				$responce=array();
				$patientparameters=$this->where('reftracksheetid_c','=',$trackersheetid)->find_all();
				if($patientparameters){
					foreach($patientparameters as $parameter){
						$data['id']=$parameter->reftestparameterid_c;
						$data['value']=$parameter->value_c;
						$paraname = ORM::factory('testparameter')->where('id','=',$parameter->reftestparameterid_c)->find()->parametername_c;
						$data['parametername']=$paraname;
						array_push($responce,$data);
					}
				}		
			}
		catch(Exception $e){var_dump($e);}
		return $responce;
	}

	public function getlatestparametervalue($parameterid){
		try{
				$responce='';
				$patientparameters=$this->where('reftestparameterid_c','=',$parameterid)->order_by('timestamp_c','desc')->find()->value_c;
				if($patientparameters){
					return $patientparameters;
				}		
			}
		catch(Exception $e){var_dump($e);}
		return $responce;
	}

	public function getparametervalues($parameterid){
		try{
				$responce=array();
				$patientparameters=$this->where('reftestparameterid_c','=',$parameterid)->order_by('timestamp_c','desc')->find_all();
				if(isset($patientparameters)){
					foreach($patientparameters as $patpara){
						array_push($responce,$patpara->value_c);
					}
				}		
			}
		catch(Exception $e){var_dump($e);}
		return $responce;
	}

	public function getreportparametervalues($reportid){
		try{
				$responce=array();
				$patientparameters=$this->where('refpatienttestreportid_c','=',$reportid)->find_all();
				if($patientparameters){
					foreach($patientparameters as $parameter){
						$data['parameterid']=$parameter->reftestparameterid_c;
						$data['value']=$parameter->value_c;
						$data['unit']=$parameter->refunitid_c;
						array_push($responce,$data);
					}
				}		
			}
		catch(Exception $e){var_dump($e);}
		return $responce;
	}

}
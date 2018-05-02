<?php defined('SYSPATH') or die('No direct script access.');
class Model_parametervalue extends kohana_Ayushmanorm {
	protected $_table_name = 'parametervalues';	

	public function getparametervalues($parameterid){
		try{
				$response=array();
				$parametervalues=$this->where('refparameterid_c','=',$parameterid)->find_all();
				$objvalue=array();						
				if($parametervalues){
					foreach($parametervalues as $paramvalue){
						$valuemaster=ORM::factory('valuesmaster')->where('id','=',$paramvalue->refvaluemasterid_c)->where('active_c','=','1')->find();
						if($valuemaster->id){
							$objvalue=array();
							$objvalue['valueid']=$valuemaster->parametervalue_c;
							$objvalue['valuename']=$valuemaster->parametervalue_c;
							array_push($response,$objvalue);
						}	
					}
				}
			}		
		catch(Exception $e){var_dump($e);}
		return $response;
	}	
}

<?php defined('SYSPATH') or die('No direct script access.');
class Model_testparameter extends kohana_Ayushmanorm {
	protected $_table_name = 'testparameters';	

	public function gettestparameter($testid){
		try{
				$responce=array();
				$testmaster=ORM::factory('testmaster')->where('id','=',$testid)->find();
				if($testmaster->ispanel==1){													//if test is a panel
					$testparameters=$this->where('reftestid_c','=',$testid)->find_all();
					if($testparameters){
						$parameterunits=new Model_parameterunit;
						$parametervalues= new Model_parametervalue;
						foreach($testparameters as $parameter){
							$data['id']=$parameter->id;
							$data['loinccode']=$parameter->loinccode_c;
							$data['parametername']=$parameter->parametername_c;
							$data['type']=$parameter->type_c;
							$data['defaultunit']=$parameter->refdefaultunitid_c;
							$data['units']=$parameterunits->getparameterunits($parameter->id);
							$data['paramvalues']=$parametervalues->getparametervalues($parameter->id);
							//array_push($data['units'],'other');
							array_push($responce,$data);
						}
					}
				}
				else{																		//if test is not a panel.i.e it contains a parameter with multiple loinc code.
					$testparameters=$this->where('reftestid_c','=',$testid)->find_all();
					$parameterunits=new Model_parameterunit;
					$parametervalues= new Model_parametervalue;
					if($testparameters){
						$flag=1;
						foreach($testparameters as $parameter){				//if parameter has presenece value
							if($parameter->type_c=='nonnumeric'){
								$data['id']=$parameter->id;
								$data['loinccode']=$parameter->loinccode_c;
								$data['parametername']=$parameter->parametername_c;
								$data['type']=$parameter->type_c;
								$data['defaultunit']=$parameter->refdefaultunitid_c;
								$data['units']=$parameterunits->getparameterunits($parameter->id);
								$data['paramvalues']=$parametervalues->getparametervalues($parameter->id);
								//array_push($data['units'],'other');
								array_push($responce,$data);
							}
							else{					
								if($flag==1){										//if only one parameter available
									$datapara['id']=$parameter->id;
									$datapara['loinccode']=$parameter->loinccode_c;
									$datapara['parametername']=$parameter->parametername_c;
									$datapara['type']=$parameter->type_c;
									$datapara['defaultunit']=$parameter->refdefaultunitid_c;
									$datapara['units']=$parameterunits->getparameterunits($parameter->id);
									$datapara['paramvalues']=$parametervalues->getparametervalues($parameter->id);
									$flag=0;
								}
								else{											//if only multiple parameters available so add units of all parameters
									$datapara['id']='NotApplicable';
									$datapara['loinccode']='NotApplicable';
									$datapara['parametername']=$testmaster->testname_c;
									$datapara['type']='commonparameter';
									$temp=$parameterunits->getparameterunits($parameter->id);
									$datapara['units']=array_merge($datapara['units'],$temp);
									$datapara['paramvalues']=$parametervalues->getparametervalues($parameter->id);
								}
							}
						}
						if($flag==0){
							array_push($responce,$datapara);
						}
						//var_dump($responce);
						//die;
					}
				}
			}
		catch(Exception $e){var_dump($e);}
		return $responce;
	}
	public function getparameter($id){
			try{
				$responce=array();
				$testparameters=$this->where('id','=',$id)->find_all();
				if($testparameters){
					$parameterunits=new Model_parameterunit;
					foreach($testparameters as $parameter){
						$data['id']=$parameter->id;
						$data['loinccode']=$parameter->loinccode_c;
						$data['parametername']=$parameter->parametername_c;
						$data['units']=$parameterunits->getparameterunits($parameter->id);
						//array_push($data['units'],'other');
						array_push($responce,$data);
					}
				}		
			}
		catch(Exception $e){var_dump($e);}
		return $responce;
	}
	public function getallparameter(){
		try{
				$responce=array();
				$testparameters=$this->find_all();
				$parameterunits=new Model_parameterunit;
				if($testparameters){
					foreach($testparameters as $parameter){
						$data['id']=$parameter->id;
						$data['loinccode']=$parameter->loinccode_c;
						$data['parametername']=$parameter->parametername_c;
						$data['aliasto']=$parameter->aliasto_c;
						$data['type']=$parameter->type_c;
						$data['defaultunit']=$parameter->refdefaultunitid_c;
						$data['units']=$parameterunits->getparameterunits($parameter->id);
						array_push($responce,$data);
					}
				}		
			}
		catch(Exception $e){var_dump($e);}
		return $responce;
	}
	
}
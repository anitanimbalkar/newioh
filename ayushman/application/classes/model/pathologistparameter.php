<?php defined('SYSPATH') or die('No direct script access.');
class Model_pathologistparameter extends kohana_Ayushmanorm {
	protected $_table_name = 'pathologistparameters';
	
	public function getPathtestparameter($testid,$pathologistid){
		try{
				$response=array();
				$testmaster=ORM::factory('testmaster')->where('id','=',$testid)->find();
				//var_dump($testmaster);
				if($testmaster->ispanel==1){													//if test is a panel
					$pathologistparameters=$this->where('reftestid_c','=',$testid)
											->where('refpathlogistid_c','=',$pathologistid)->find_all();
					$parameterunits=new Model_parameterunit;
					$parametervalues=new Model_parametervalue;
					
					//var_dump($pathologistparameters);
					if($pathologistparameters){					
						foreach($pathologistparameters as $parameter){
							$data['id']=$parameter->refparameterid_c;
							$data['parametername']=$parameter->parametername_c;
							$IOHparameter = ORM::factory('testparameter')->where('id','=',$parameter->refparameterid_c)->mustfind();
							$data['loinccode']=$IOHparameter->loinccode_c;
							$data['type']=$IOHparameter->type_c;
							$data['defaultunit']=$IOHparameter->refdefaultunitid_c;
							$data['units']=$parameterunits->getparameterunits($parameter->refparameterid_c);
							$data['paramvalues']=$parametervalues->getparametervalues($parameter->refparameterid_c);
							$data['reference']=$parameter->pararefrange_c;
							//$data['units']=$parameterunits->getparameterunits($parameter->id);
							//array_push($data['units'],'other');
							array_push($response,$data);
						}
					}
				}
				else{																		//if test is not a panel.i.e it contains a parameter with multiple loinc code.
					$pathologistparameters=$this->where('reftestid_c','=',$testid)
											->where('refpathlogistid_c','=',$pathologistid)->find_all();
					$parameterunits=new Model_parameterunit;
					$parametervalues=new Model_parametervalue;
					//var_dump($pathologistparameters);
					if($pathologistparameters){
						$flag=1;
						foreach($pathologistparameters as $parameter){							//if parameter has presenece value
							$IOHparameter = ORM::factory('testparameter')->where('id','=',$parameter->refparameterid_c)->mustfind();
							
							if($IOHparameter->type_c=='nonnumeric'){
								$data['id']=$parameter->refparameterid_c;
								$data['loinccode']=$IOHparameter->loinccode_c;
								$data['parametername']=$parameter->parametername_c;
								$data['type']=$IOHparameter->type_c;
								$data['defaultunit']=$IOHparameter->refdefaultunitid_c;
								$data['units']=$parameterunits->getparameterunits($parameter->refparameterid_c);
								$data['paramvalues']=$parametervalues->getparametervalues($parameter->refparameterid_c);
								$data['reference']=$parameter->pararefrange_c;
								//array_push($data['units'],'other');
								array_push($response,$data);
							}
							else{					
								if($flag==1){										//if only one parameter available
									$datapara['id']=$parameter->refparameterid_c;
									$datapara['loinccode']=$IOHparameter->loinccode_c;
									$datapara['parametername']=$parameter->parametername_c;
									$datapara['type']=$IOHparameter->type_c;
									$datapara['defaultunit']=$IOHparameter->refdefaultunitid_c;
									$datapara['units']=$parameterunits->getparameterunits($parameter->refparameterid_c);
									$datapara['paramvalues']=$parametervalues->getparametervalues($parameter->refparameterid_c);
									$datapara['reference']=$parameter->pararefrange_c;
								$flag=0;
								}
								else{											//if only multiple parameters available so add units of all parameters
									$datapara['id']='NotApplicable';
									$datapara['loinccode']='NotApplicable';
									$datapara['parametername']=$testmaster->testname_c;
									$datapara['type']='commonparameter';
									$datapara['defaultunit']=$IOHparameter->refdefaultunitid_c;
									$datapara['units']=$parameterunits->getparameterunits($parameter->refparameterid_c);
									$datapara['paramvalues']=$parametervalues->getparametervalues($parameter->refparameterid_c);
									$datapara['reference']=$parameter->pararefrange_c;
							//$datapara['units']=array_merge($datapara['units'],$temp);
								}
							}
						}
						if($flag==0){
							array_push($response,$datapara);
						}
					}
				}
			}
		catch(Exception $e){var_dump($e);}
		return $response;
	
	}
	
	
}
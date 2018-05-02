<?php defined('SYSPATH') or die('No direct script access.');
//include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/PDFMerger.php');
class helper_Universaltracker {
	public function saveParameterValueWithDate($parameterid, $parametervalue, $patientuserid ,$parameterdate){
		
		$unitid = ORM::factory('testparameter')->where('id','=',$parameterid)->find()->refdefaultunitid_c;
		
		$loinccode_c = ORM::factory('testparameter')->where('id','=',$parameterid)->find()->loinccode_c;
		
		$patientparameter=new Model_patientparameter;
		$patientparameter->reftestparameterid_c=$parameterid;
		$patientparameter->refpatientuserid_c=$patientuserid;
		$patientparameter->refunitid_c=$unitid;
		$patientparameter->loinccode_c=$loinccode_c;
		$patientparameter->value_c=$parametervalue;
		// Formulate timestamp from entered date and current time
		$currenttime = date("h:i:s");
		$parameterdate = $parameterdate." ".$currenttime;		
		$patientparameter->timestamp_c = strtotime($parameterdate);
		$patientparameter->save();
	}
	public function saveParameterValue($parameterid, $parametervalue, $patientuserid){
		
		$unitid = ORM::factory('testparameter')->where('id','=',$parameterid)->find()->refdefaultunitid_c;
		
		$loinccode_c = ORM::factory('testparameter')->where('id','=',$parameterid)->find()->loinccode_c;
		
		$patientparameter=new Model_patientparameter;
		$patientparameter->reftestparameterid_c=$parameterid;
		$patientparameter->refpatientuserid_c=$patientuserid;
		$patientparameter->refunitid_c=$unitid;
		$patientparameter->loinccode_c=$loinccode_c;
		$patientparameter->value_c=$parametervalue;
		
		$patientparameter->timestamp_c = strtotime(date("Y/m/d H:i:s"));
		$patientparameter->save();
	}
	
	public function getParameterName($parameterid){
		try{
				$testparameter=new Model_testparameter;
				
				$data = $testparameter->getparameter($parameterid);

				return $data[0]['parametername'];
			}
		catch(Exception $e){var_dump($e);}
	}
	public function getTestParameter($testid){
		$testparameter=new Model_testparameter;
		$data=$testparameter->gettestparameter($testid);
		return $data;
	} 
	public function getAllParameter(){
		$testparameter=new Model_testparameter;
		$data=$testparameter->getallparameter();
		return $data;
	} 
	public function addNewParameter($parametername){
		$testparameter=new Model_testparameter;
		$testparameter->parametername_c=$parametername;
		$testparameter->save();
	} 
	public function saveTestParameterval($testparameters,$reportexists){
		try{
				if($testparameters){
					foreach($testparameters as $parameter){
						if($reportexists=='oldreport'){
							$objpatientparameter=ORM::factory('patientparameter')->where('refpatienttestreportid_c','=',$parameter['patienttestreportid'])->where('reftestparameterid_c','=',$parameter['parameterid'])->find();
							if($objpatientparameter->id){
								$objpatientparameter->value_c=$parameter['value'];
								$objpatientparameter->refunitid_c=$parameter['unit'];
								$objpatientparameter->timestamp_c=$parameter['timestamp'];
								//$objpatientparameter->BIOLOGICALREFERENCE=$parameter['reference'];
								$objpatientparameter->save();
							}
							else{
								$patientparameter=new Model_patientparameter;
								$patientparameter->reftestparameterid_c=$parameter['parameterid'];
								$testparameterloinccode=ORM::factory('testparameter')->where('id','=',$parameter['parameterid'])->find()->loinccode_c;
								$patientparameter->loinccode_c=$testparameterloinccode;
								$patientparameter->refpatientuserid_c=$parameter['patientuserid'];
								$patientparameter->value_c=$parameter['value'];
								$patientparameter->refunitid_c=$parameter['unit'];
								//$patientparameter->BIOLOGICALREFERENCE=$parameter['reference'];
								$patientparameter->refpatienttestreportid_c=$parameter['patienttestreportid'];
								$patientparameter->timestamp_c=$parameter['timestamp'];
								$patientparameter->save();
							}
						}
						else{
							$patientparameter=new Model_patientparameter;
							$patientparameter->reftestparameterid_c=$parameter['parameterid'];
							$testparameterloinccode=ORM::factory('testparameter')->where('id','=',$parameter['parameterid'])->find()->loinccode_c;
							$patientparameter->loinccode_c=$testparameterloinccode;
							$patientparameter->refpatientuserid_c=$parameter['patientuserid'];
							$patientparameter->value_c=$parameter['value'];
							$patientparameter->refunitid_c=$parameter['unit'];
							//$patientparameter->BIOLOGICALREFERENCE=$parameter['reference'];
							$patientparameter->refpatienttestreportid_c=$parameter['patienttestreportid'];
							$patientparameter->timestamp_c=$parameter['timestamp'];
							$patientparameter->save();
						}
					}	
				}	
			}
		catch(Exception $e){var_dump($e);}
	}
	
	public function saveTrackerParameterval($trackerparameters,$patientid){
		try{
				if($trackerparameters){
					$objpatientparameter=ORM::factory('patientparameter')->where('refpatientuserid_c','=',$patientid)->find_all();
					$patient='';
					if(!empty($objpatientparameter)){
						$patient='patientdataexist';
					}
					else{
						$patient='patientdatanotexist';
					}
					foreach($trackerparameters as $parameter){
						if($patient=='patientdataexist'){
								$patientparametertable=ORM::factory('patientparameter')->where('refpatientuserid_c','=',$patientid)->where('loinccode_c','=',trim($parameter['loinccode']))->where('timestamp_c','=',$parameter['timestamp'])->where('value_c','=',$parameter['value'])->find();
								if($patientparametertable->id){
									$rowchange='nochange';
								}
								else{
									$patientparametertable=ORM::factory('patientparameter')->where('refpatientuserid_c','=',$patientid)->where('loinccode_c','=',trim($parameter['loinccode']))->where('timestamp_c','=',$parameter['timestamp'])->find();
									if($patientparametertable->id){
										$rowchange='onlyvaluechange';
									}
									else{
										$rowchange='newentry';
									}
								}							
								if($rowchange=='onlyvaluechange'){
									$patientparametertable->value_c=$parameter['value'];
									$patientparametertable->refunitid_c=$parameter['unit'];
									$patientparametertable->save();
								}
								if($rowchange=='newentry'){
									$patientparameter=new Model_patientparameter;
									$patientparameter->reftestparameterid_c=$parameter['parameterid'];
									$patientparameter->refpatientuserid_c=$parameter['patientuserid'];
									$patientparameter->value_c=$parameter['value'];
									$patientparameter->loinccode_c=trim($parameter['loinccode']);
									$patientparameter->refunitid_c=$parameter['unit'];
									$patientparameter->reftracksheetid_c=$parameter['tracksheetid'];
									$patientparameter->timestamp_c=$parameter['timestamp'];
									$patientparameter->save();
								}
						}
						else{
								$patientparameter=new Model_patientparameter;
								$patientparameter->reftestparameterid_c=$parameter['parameterid'];
								$patientparameter->refpatientuserid_c=$parameter['patientuserid'];
								$patientparameter->value_c=$parameter['value'];
								$patientparameter->refunitid_c=$parameter['unit'];
								$patientparameter->reftracksheetid_c=$parameter['tracksheetid'];
								$patientparameter->timestamp_c=$parameter['timestamp'];
								$patientparameter->save();
						}	
					}
				}	
			}
		catch(Exception $e){var_dump($e);}
	}
	public function getReportParametervalues($reportid){
		try{
				$patientparameter=new Model_patientparameter;
				$data=$patientparameter->getreportparametervalues($reportid);
				return $data;
			}
		catch(Exception $e){var_dump($e);}
	}
	
	public function getTrackerParametervalues($trackersheetid){
		try{
				$patientparameter=new Model_patientparameter;
				$data=$patientparameter->gettrackerparametervalues($trackersheetid);
				return $data;
			}
		catch(Exception $e){var_dump($e);}
	}
	public function getLatestParametervalue($parameterid){
		try{
				$patientparameter=new Model_patientparameter;
				$data=$patientparameter->getlatestparametervalue($parameterid);
				return $data;
			}
		catch(Exception $e){var_dump($e);}
	}
	public function getAllUnits(){
		try{
				$unitsmaster=new Model_unitsmaster;
				$data=$unitsmaster->getallunits();
				return $data;
			}
		catch(Exception $e){var_dump($e);}
	}
	public function addNewUnit($unitname,$parameterid){
		try{
				$unitsmaster=new Model_unitsmaster;
				$unitsmaster->unitname_c=$unitname;
				$unitsmaster->save();
				$objunitsmaster=ORM::factory('unitsmaster')->where('unitname_c','=',$unitname)->find();
				$parameterunit=new Model_parameterunit;
				$parameterunit->refparameterid_c=$parameterid;
				$parameterunit->refunitmasterid_c=$objunitsmaster->id;
				$parameterunit->save();
			}
		catch(Exception $e){var_dump($e);}
	}
	public function getParameterValues($parameterid){
		try{
				$unitsmaster=new Model_patientparameter;
				$data=$unitsmaster->getparametervalues($parameterid);
				return $data;
			}
		catch(Exception $e){var_dump($e);}
	}
	
}

<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/universaltracker.php');
class Controller_Cuniversaltracker extends Controller {
	/*public function action_getpara()
	{





//		$universaltracker = new universal_trcker();
//get perticular test parameter		$data=$universaltracker->getTestParameter(2344);
//get all test parameter		$data=$universaltracker->getAllParameter();
//add new parameter		$universaltracker->addNewParameter('123456');
/*		$response=array();
		$data['parameterid']=101;
		$data['patientuserid']='1001';
		$data['value']='aaa';
		$data['tracksheetid']='160';
//		$data['patienttestreportid']='150';
		array_push($response,$data);			
		$data['parameterid']=102;
		$data['patientuserid']='586';
		$data['value']='bbb';
		$data['tracksheetid']='162';
//		$data['patienttestreportid']='151';
		array_push($response,$data);			
	
//save test parameters 	$universaltracker->saveTestParameterval($response);

//save tracker parameters		$universaltracker->saveTrackerParameterval($response);
//get tracker parameter		$data=$universaltracker->getTrackerParametervalues(162);
//get latest parameter value	$data=$universaltracker->getLatestParametervalue(102);

		var_dump($data);
		die;
	}*/

	public function action_movedbtracker1(){
		//First add tracker parameters into testparameter table to get new parameter ids
		
		$trackparameters=ORM :: factory('trackparameter')->find_all();
		foreach($trackparameters as $trackparameter){
			$testparameters=ORM :: factory('testparameter')->where('parametername_c','=',$trackparameter->parametername_c)->find();
			
			if($testparameters->id){
			}
			else{
				$testparameters=new Model_testparameter;
				$testparameters->parametername_c=$trackparameter->parametername_c;
				$testparameters->isverified_c=0;

				$testparameters->save();
			}
		}	
		echo 'movedbtracker1 done';
	}
	public function action_movedbtracker2(){
		//Now change parameter ids of tracksheetparameter which newly added into testparameter table
		ini_set("max_execution_time", 0);
		$tracksheetparameters=ORM :: factory('tracksheetparameter')->find_all();
		
		foreach($tracksheetparameters as $tracksheetparameter){
			$testparameters=ORM :: factory('testparameter')->where('parametername_c','=',$tracksheetparameter->parametername_c)->find();
		
			if($testparameters->id){
				$tracksheetparameter->refparameterid_c=$testparameters->id;
				$tracksheetparameter->save();
			}
			else{
				$testparameters=new Model_testparameter;
				$testparameters->parametername_c=$tracksheetparameter->parametername_c;
				$testparameters->isverified_c=0;
				$testparameters->save();

				$tracksheetparameter->refparameterid_c=$testparameters->id;
				$tracksheetparameter->save();
			}
		}
		echo 'movedbtracker2 done';
	}
	public function action_movedbtracker3(){
		//change old parameter ids into new parameter ids from tracksheettemplate
		ini_set("max_execution_time", 0);
		$tracksheettemplate=ORM :: factory('tracksheettemplate')->find_all();
		
		foreach($tracksheettemplate as $template){
			$parameters=array();
			$parameters = explode(',', $template->parameters_c);
			$str='';
			foreach($parameters as $parameterid){
					if($str!=''){
						$str=$str.',';
					}
					$parametername=ORM :: factory('trackparameter')->where('id','=',$parameterid)->find()->parametername_c;
					$testparameters=ORM :: factory('testparameter')->where('parametername_c','=',$parametername)->find();
					$str=$str.$testparameters->id;
			}
		$template->parameters_c=$str;
		$template->save();
		}
		echo 'movedbtracker3 done';
	}
	
	public function action_movedbtracker4(){
		
		//Add each entry from trackvalue into patientparameter table
		ini_set("max_execution_time", 0);	
		$trackvalues=ORM::factory('trackvalue')->where('id','>',$_GET['from'])->where('id','<',$_GET['to'])->find_all();
		
		
		$tracksheets = ORM :: factory('tracksheet')->find_all();
		$arr = array();
		foreach($tracksheets as $tracksheet){
			$arr[$tracksheet->id] = $tracksheet->refpatientid_c;
		}
		
		foreach($trackvalues as $trackvalue){
		
				$testparameters=ORM :: factory('testparameter')->where('parametername_c','=',$trackvalue->parametername_c)->find();
				//$tracksheets=ORM :: factory('tracksheet')->where('id','=',$trackvalue->refsheetid_c)->find();
				$patientparameter=new Model_patientparameter;
				$patientparameter->reftestparameterid_c=$testparameters->id;
				if($testparameters->loinccode_c !=''){
					$patientparameter->loinccode_c=$testparameters->loinccode_c;
				}
				else{
					$patientparameter->loinccode_c=$testparameters->aliasto_c;
				}
				$patientparameter->refunitid_c=$testparameters->refdefaultunitid_c;
				$patientparameter->refpatientuserid_c=$arr[$trackvalue->refsheetid_c];
				$patientparameter->value_c=$trackvalue->value_c;
				$patientparameter->reftracksheetid_c=$trackvalue->refsheetid_c;
				$patientparameter->timestamp_c=$trackvalue->timestamp_c;
				$patientparameter->createdon_c=$trackvalue->createdon_c;
				$patientparameter->createdby_c=$trackvalue->createdby_c;
				$patientparameter->editedon_c=$trackvalue->editedon_c;
				$patientparameter->editedby_c=$trackvalue->editedby_c;
				
				$patientparameter->save();
		}
		echo 'movedbtracker4 done. - '.$_GET['from'].'-'.$_GET['to'];
	}	
/*
public function action_storetestparameter(){
	$file = fopen("/Users/apple/Downloads/Pathology_tests_parameters.csv","r");
		while($row=fgets($file)){  
			$myArray = explode(',', $row);
    		var_dump($myArray);
    		die;

   		}
   		
   		fclose($file);
}
*/
public function action_movedbpattestreport(){
	ini_set("max_execution_time", 0);
		$patienttestreports=ORM::factory('patienttestreport')->find_all();
		//var_dump(count($patienttestreports));
		//die;
		ini_set("max_execution_time", 0);	
		$response=array();
			foreach($patienttestreports as $patienttestreport){
			if($patienttestreport->createdby_c==1147){
				//Do nothing
			}
			else{
				$parameters=json_decode($patienttestreport->testparameters);
				$report=array();
				$paramarray=array();	
				if(isset($parameters->parameters)){
					foreach($parameters->parameters as $key=>$value){
						$paramet=array();
						$paraid=ORM::factory('testparameter')->where('parametername_c','=',$key)->find();
						if($paraid->id==NULL){
							$testparameter=new Model_testparameter;
							$testparameter->parametername_c=$key;
							$testparameter->refdefaultunitid_c='1';
							$testparameter->isverified_c='0';
							$testparameter->save();

							$paramet['pid']=$testparameter->id;
						}
						else{
							$paramet['pid']=$paraid->id;
						}
						if($paraid->refdefaultunitid_c==NULL){
							$paramet['defaultunitid']='1';
						}
						else{
							$paramet['defaultunitid']=$paraid->refdefaultunitid_c;
						}
						if($paraid->loinccode_c==NULL){
							$paramet['loinccode']=$paraid->aliasto_c;
						}
						else{
							$paramet['loinccode']=$paraid->loinccode_c;
						}
						$paramet['pvalue']=$value;
						array_push($paramarray,$paramet);
					}
				}
				$report['param']=$paramarray;
				$report['id']=$patienttestreport->id;
				$report['patuserid']=$patienttestreport->refpatientuserid_c;
				$report['created_on']=$patienttestreport->createdon_c;
				$report['created_by']=$patienttestreport->createdby_c;
				$report['editedon_c']=$patienttestreport->editedon_c;
				$report['editedby_c']=$patienttestreport->editedby_c;
				if($patienttestreport->editedon_c){
					$report['timestamp']=strtotime($patienttestreport->editedon_c);
				}
				else{
					$report['timestamp']=strtotime($patienttestreport->createdon_c);
				}
			array_push($response,$report);	
			}
		}
			if(!empty($response)){
				foreach($response as $data){
					if(count($data['param'])){
						foreach($data['param'] as $para){
						$patientparameter=new Model_patientparameter;
						$patientparameter->reftestparameterid_c=$para['pid'];
						$patientparameter->value_c=$para['pvalue'];
						$patientparameter->loinccode_c=$para['loinccode'];
						$patientparameter->refunitid_c=$para['defaultunitid'];
						$patientparameter->refpatientuserid_c=$data['patuserid'];
						$patientparameter->refpatienttestreportid_c=$data['id'];
						$patientparameter->timestamp_c=$data['timestamp'];
						$patientparameter->createdon_c=$data['created_on'];
						$patientparameter->createdby_c=$data['created_by'];
						$patientparameter->editedon_c=$data['editedon_c'];
						$patientparameter->editedby_c=$data['editedby_c'];
						$patientparameter->save();
						}
					}
				}
			}
	}

public function action_pathology(){
	$patienttestreports=ORM::factory('patienttestreport')->where('createdby_c','=',1147)->where('id','>',18000)->where('id','<',21914)->find_all();
	foreach($patienttestreports as $patienttestreport){
		var_dump($patienttestreport->id);
		$parameters=json_decode($patienttestreport->testparameters);
		if(isset($parameters->PARAMETER)){
			foreach($parameters->PARAMETER as $parameter){
		var_dump($parameter->NAME);
						$paraid=ORM::factory('testparameter')->where('parametername_c','=',$parameter->NAME)->find();
						if(!$paraid->id){
							$testparameter=new Model_testparameter;
							$testparameter->parametername_c=$parameter->NAME;
							$testparameter->refdefaultunitid_c='1';
							$testparameter->isverified_c='0';
							$testparameter->save();
						}
			}
		}
	}	
}
public function action_movedbpattestreport_pathology(){
	ini_set("max_execution_time", 0);
		$patienttestreports=ORM::factory('patienttestreport')->where('createdby_c','=',1147)->where('id','>',19314)->where('id','<',21500)->find_all();
		//var_dump(count($patienttestreports));
		//die;
		ini_set("max_execution_time", 0);	
		$response=array();
			foreach($patienttestreports as $patienttestreport){
				$parameters=json_decode($patienttestreport->testparameters);
				$report=array();
				$paramarray=array();	
				if(isset($parameters->PARAMETER)){
					foreach($parameters->PARAMETER as $parameter){
						$paramet=array();
						$paraid=ORM::factory('testparameter')->where('parametername_c','=',$parameter->NAME)->find();
						if($paraid->id==NULL){
							$testparameter=new Model_testparameter;
							$testparameter->parametername_c=$parameter->NAME;
							$testparameter->refdefaultunitid_c='1';
							$testparameter->isverified_c='0';
							$testparameter->save();

							$paramet['pid']=$testparameter->id;
						}
						else{
							$paramet['pid']=$paraid->id;
						}
						if(isset($parameter->UNIT)){
							$unitid=ORM::factory('unitsmaster')->where('unitname_c','=',$parameter->UNIT)->find();
							if($unitid->id){
								$paramet['defaultunitid']=$unitid->id;
							}
							else{
								$unitsmaster=new Model_unitsmaster;
								$unitsmaster->unitname_c=$parameter->UNIT;
								$unitsmaster->active_c=0;
								$unitsmaster->save();
								$paramet['defaultunitid']=$unitsmaster->id;
							}
						}
						else{
							$paramet['defaultunitid']='1';
						}
						if($paraid->loinccode_c==NULL){
							$paramet['loinccode']=$paraid->aliasto_c;
						}
						else{
							$paramet['loinccode']=$paraid->loinccode_c;
						}
						$paramet['pvalue']=$parameter->OBSERVEDVALUE;
						$paramet['BIOLOGICALREFERENCE']=isset($parameter->BIOLOGICALREFERENCE)?$parameter->BIOLOGICALREFERENCE:'';
						$paramet['ABNORMAL']=isset($parameter->ABNORMAL)?$parameter->ABNORMAL:'';
						
						array_push($paramarray,$paramet);
					}
				}
				$report['param']=$paramarray;
				$report['id']=$patienttestreport->id;
				$report['patuserid']=$patienttestreport->refpatientuserid_c;
				$report['created_on']=$patienttestreport->createdon_c;
				$report['created_by']=$patienttestreport->createdby_c;
				$report['editedon_c']=$patienttestreport->editedon_c;
				$report['editedby_c']=$patienttestreport->editedby_c;
				if($patienttestreport->editedon_c){
					$report['timestamp']=strtotime($patienttestreport->editedon_c);
				}
				else{
					$report['timestamp']=strtotime($patienttestreport->createdon_c);
				}
			array_push($response,$report);	
			}
			foreach($response as $data){
					if(count($data['param'])){
						foreach($data['param'] as $para){
						$patientparameter=new Model_patientparameter;
						$patientparameter->reftestparameterid_c=$para['pid'];
						$patientparameter->value_c=$para['pvalue'];
						$patientparameter->loinccode_c=$para['loinccode'];
						$patientparameter->refunitid_c=$para['defaultunitid'];
						$patientparameter->BIOLOGICALREFERENCE=$para['BIOLOGICALREFERENCE'];
						$patientparameter->ABNORMAL=$para['ABNORMAL'];
						$patientparameter->refpatientuserid_c=$data['patuserid'];
						$patientparameter->refpatienttestreportid_c=$data['id'];
						$patientparameter->timestamp_c=$data['timestamp'];
						$patientparameter->createdon_c=$data['created_on'];
						$patientparameter->createdby_c=$data['created_by'];
						$patientparameter->editedon_c=$data['editedon_c'];
						$patientparameter->editedby_c=$data['editedby_c'];
						$patientparameter->save();
						}
					}
			}
	
		echo 'done';
	}

/*
public function action_movedbpattestreport_pathology(){
	ini_set("max_execution_time", 0);
		$patienttestreports=ORM::factory('patienttestreport')->where('createdby_c','=',1147)->where('id','>',20999)->where('id','<',21500)->find_all();
		//var_dump(count($patienttestreports));
		//die;
		ini_set("max_execution_time", 0);	
		$response=array();
			foreach($patienttestreports as $patienttestreport){
				$parameters=json_decode($patienttestreport->testparameters);
				$report=array();
				$paramarray=array();	
				if(isset($parameters->PARAMETER)){
					foreach($parameters->PARAMETER as $parameter){
						$paramet=array();
						$paraid=ORM::factory('testparameter')->where('parametername_c','=',$parameter->NAME)->find();
						if($paraid->id==NULL){
							$testparameter=new Model_testparameter;
							$testparameter->parametername_c=$parameter->NAME;
							$testparameter->refdefaultunitid_c='1';
							$testparameter->isverified_c='0';
							$testparameter->save();

							$paramet['pid']=$testparameter->id;
						}
						else{
							$paramet['pid']=$paraid->id;
						}
						if(isset($parameter->UNIT)){
							$unitid=ORM::factory('unitsmaster')->where('unitname_c','=',$parameter->UNIT)->find();
							if($unitid->id){
								$paramet['defaultunitid']=$unitid->id;
							}
							else{
								$unitsmaster=new Model_unitsmaster;
								$unitsmaster->unitname_c=$parameter->UNIT;
								$unitsmaster->active_c=0;
								$unitsmaster->save();
								$paramet['defaultunitid']=$unitsmaster->id;
							}
						}
						else{
							$paramet['defaultunitid']='1';
						}
						if($paraid->loinccode_c==NULL){
							$paramet['loinccode']=$paraid->aliasto_c;
						}
						else{
							$paramet['loinccode']=$paraid->loinccode_c;
						}
						$paramet['pvalue']=$parameter->OBSERVEDVALUE;
						$paramet['BIOLOGICALREFERENCE']=isset($parameter->BIOLOGICALREFERENCE)?$parameter->BIOLOGICALREFERENCE:'';
						$paramet['ABNORMAL']=isset($parameter->ABNORMAL)?$parameter->ABNORMAL:'';
						
						array_push($paramarray,$paramet);
					}
				}
				$report['param']=$paramarray;
				$report['id']=$patienttestreport->id;
				$report['patuserid']=$patienttestreport->refpatientuserid_c;
				$report['created_on']=$patienttestreport->createdon_c;
				$report['created_by']=$patienttestreport->createdby_c;
				$report['editedon_c']=$patienttestreport->editedon_c;
				$report['editedby_c']=$patienttestreport->editedby_c;
				if($patienttestreport->editedon_c){
					$report['timestamp']=strtotime($patienttestreport->editedon_c);
				}
				else{
					$report['timestamp']=strtotime($patienttestreport->createdon_c);
				}
			array_push($response,$report);	
			}
			foreach($response as $data){
					if(count($data['param'])){
						foreach($data['param'] as $para){
						$patientparameter=new Model_patientparameter;
						$patientparameter->reftestparameterid_c=$para['pid'];
						$patientparameter->value_c=$para['pvalue'];
						$patientparameter->loinccode_c=$para['loinccode'];
						$patientparameter->refunitid_c=$para['defaultunitid'];
						$patientparameter->BIOLOGICALREFERENCE=$para['BIOLOGICALREFERENCE'];
						$patientparameter->ABNORMAL=$para['ABNORMAL'];
						$patientparameter->refpatientuserid_c=$data['patuserid'];
						$patientparameter->refpatienttestreportid_c=$data['id'];
						$patientparameter->timestamp_c=$data['timestamp'];
						$patientparameter->createdon_c=$data['created_on'];
						$patientparameter->createdby_c=$data['created_by'];
						$patientparameter->editedon_c=$data['editedon_c'];
						$patientparameter->editedby_c=$data['editedby_c'];
						$patientparameter->save();
						}
					}
			}
	
		echo 'done';
	}
*/
	
	}
	
	
	
	
	
	
	
	
	
	

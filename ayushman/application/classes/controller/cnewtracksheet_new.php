<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cnewtracksheet extends Controller_Ctemplatewithmenu{

/*	public function action_backupview(){
		try{
			$object_user = new Model_User;
			$user = $object_user->get_user_info();
			switch($_SERVER['REQUEST_METHOD']){
			case 'GET':
				if(!(isset($_GET['app_id']))){
					throw new HTTP_Exception_400;
				}  
				header("Cache-Control: no-cache, must-revalidate");
				$response = array();
				$app_id = $_GET['app_id'];
				$tracker_id = null;
				if(isset($_GET['tracker_id'])){
					$tracker_id = $_GET['tracker_id'];
					$tracker_data = $this->get_tracker_values($tracker_id);
					$tracker_object = new Model_Tracksheet;
					$tracker_info = $tracker_object->get_tracker($tracker_id);
					$response['tracker_data'] = $tracker_data;
					$response['tracker_parameterlist'][$tracker_id] = $this->get_tracker_parameterlist($tracker_id);
					if($user['id'] != $tracker_info['owner_id']){
						$owner_info = $object_user->get_info($tracker_info['owner_id']);
						$response['owner_info'] = $owner_info['name'];
					}  
					echo json_encode($response);die;
				}
				$app_object = new Model_Appointment;
				$app_info = $app_object->get_appointment_info($app_id);
				$tracker_object = new Model_Tracksheet;
				$all_trackers = $tracker_object->get_all_trackers($app_info['refappfromid_c']);
				$current_tracker_id = $this->find_by_incidentid($all_trackers, $app_info['refincidentid_c']);
				$template_object = new Model_Tracksheettemplate;
				$templates = $template_object->get_all_templates($user['id']);
				if($current_tracker_id){
					$current_tracker_data = $this->get_tracker_values($current_tracker_id);
					$response['tracker_data'][$current_tracker_id] = $current_tracker_data;
					$response['tracker_parameterlist'][$current_tracker_id] = $this->get_tracker_parameterlist($current_tracker_id);
				}
				$response['current_tracker_id'] = $current_tracker_id;
				$response['tracker_list'] = $all_trackers;
				$response['template_list'] = $templates;
				$result['tracker_info'] = $response;
				echo(json_encode($result));die;
				break;
			case 'DELETE':
				$DELETE = Request::current()->query();
				if(!(isset($DELETE['tracker_id']))){
					throw new HTTP_Exception_400;
				}
				$tracker_id = $DELETE['tracker_id'];
				$this->delete($tracker_id);
				die;
				break;
			case 'POST':
				if(!(isset($_POST['tracker_id']) && isset($_POST['tracker_data']) && isset($_POST['app_id']))){
					throw new HTTP_Exception_400;
				}
				$tracker_id = $_POST['tracker_id'];
				$tracker_data = json_decode($_POST['tracker_data']);
				$app_id = $_POST['app_id'];
				$tracker_cols = $tracker_data[0];
				if($tracker_id != 'null'){
					$tracker_param_object = new Model_Trackparameter;
					$parameter_details = $tracker_param_object->get_parameter_ids($tracker_cols);
					$tracksheet_param_object = new Model_Tracksheetparameter;
					$tracksheet_param_object->update_tracker_parameters($tracker_id, $parameter_details);
					unset($tracker_data[0]);
					$tracker_val_object = new Model_Trackvalue;
					$tracker_val_object->update_tracker_values($tracker_id, $tracker_data, $parameter_details);
					die;
				}
				else{
					if(isset($_POST['template_id']) && ($_POST['template_id'] != 'null')){
						$new_tracker_id = $this->createFromTemplate($app_id, $_POST['template_id']);
					}
					else{
						$new_tracker_id = $this->create_tracksheet($app_id);
					}
					$tracker_object = new Model_Tracksheet;
					$tracker_info = $tracker_object->get_tracker($new_tracker_id);
					$tracker_values = $this->get_tracker_values($new_tracker_id);
					$response = array();
					$response['info'] = $tracker_info;
					$response['values'] = $tracker_values;
					echo json_encode($response);die;
				}  
				break;  
			default:
				throw new HTTP_Exception_405;  
			}
		}  
		catch(Exception $e) { throw new Exception($e); }
	}
*/	
	public function action_saveparametervalue(){
		try{
			$object_user = new Model_User;
			$user = $object_user->get_user_info();
			switch($_SERVER['REQUEST_METHOD']){
				case 'POST':
					$app_id = $_POST['app_id'];
					$parameterid = $_POST['parameterid'];
					$parametervalue = $_POST['parametervalue'];
					$patientuserid = ORM::factory('appointment')->where('id','=',$app_id)->find()->refappfromid_c;
					$uni_Tracker = new helper_Universaltracker();
					$uni_Tracker->saveParameterValue($parameterid, $parametervalue, $patientuserid);
					echo 'success';die;
					break;  
				default:
					throw new HTTP_Exception_405;  
			}
		}  
		catch(Exception $e) { throw new Exception($e); }
	}
	public function action_patientview(){
		try{
			$object_user = new Model_User;
			$user = $object_user->get_user_info();
			$objroleuser=new Model_roleuser;
			$user_role=$objroleuser->get_userRole($user['id']);
			switch($_SERVER['REQUEST_METHOD']){
			case 'GET':
				$response = array();
				header("Cache-Control: no-cache, must-revalidate");
				$response['user_role']=$user_role;
				$response['user_id']=$user['id'];
				if(!(isset($_GET['patient_id'])) && $user_role=='doctor'){
					$template_object = new Model_Tracksheettemplate;
					$templates = $template_object->get_all_templates(Auth::instance()->get_user()->id);
					
					$response['template_list'] = $templates;
					$result['tracker_info'] = $response;
					echo(json_encode($result));die;
					throw new HTTP_Exception_400;
				}
				if($user_role=='doctor'){
					$patient_id = $_GET['patient_id'];
				}
				else{
					$patient_id = $user['id'];
				}
		
//				$app_id = $_GET['app_id'];
//				$app_object = new Model_Appointment;
//				$app_info = $app_object->get_appointment_info($app_id);
				$tracker_id = null;
				if(isset($_GET['tracker_id'])){
					$tracker_id = $_GET['tracker_id'];
					$tracker_object = new Model_Tracksheet;
					$tracker_info = $tracker_object->get_tracker($tracker_id);
					$response['tracker_parameterlist'] = $this->get_tracker_parameterlist($tracker_id);
					$startdate=ORM::factory('tracksheet')->where('id','=',$tracker_id)->find()->parameterstartdate_c;
					$arrange_trackerdata=$this->arrange_trackerdata($response['tracker_parameterlist'],$patient_id,$startdate,'Not_provided',$tracker_id);
					$response['tracker_data']= $arrange_trackerdata['timestamp_paravalue'];
					$response['paramdata_createdby'] =$arrange_trackerdata['paramdata_createdby'];

					if($user['id'] != $tracker_info['owner_id']){
						$owner_info = $object_user->get_info($tracker_info['owner_id']);
						$response['owner_info'] = $owner_info['name'];
					}  
					echo json_encode($response);die;
				}
				else{
					$tracker_object = new Model_Tracksheet;
					$all_trackers = $tracker_object->get_all_trackers($patient_id);
					if(count($all_trackers)>0){
						$current_tracker_id = $all_trackers[0]['id'];//$this->find_by_incidentid($all_trackers, $app_info['refincidentid_c']);
					}
					else{
						$current_tracker_id=$this->create_tracksheet($patient_id);
					}
					$template_object = new Model_Tracksheettemplate;
					if($user_role=='doctor'){
						$templates = $template_object->get_all_templates($user['id']);
					}
					else{
						$templates= $template_object->get_all_templates($patient_id);
					}
					if($current_tracker_id){
						$response['tracker_parameterlist'][$current_tracker_id] = $this->get_tracker_parameterlist($current_tracker_id);
						$startdate=ORM::factory('tracksheet')->where('id','=',$current_tracker_id)->find()->parameterstartdate_c;
						$arrange_trackerdata= $this->arrange_trackerdata($response['tracker_parameterlist'][$current_tracker_id],$patient_id,$startdate,'Not_provided',$current_tracker_id);
						$response['tracker_data'][$current_tracker_id] =$arrange_trackerdata['timestamp_paravalue'];
						$response['paramdata_createdby'][$current_tracker_id] =$arrange_trackerdata['paramdata_createdby'];
					}
					$response['current_tracker_id'] = $current_tracker_id;
					$response['tracker_list'] = $all_trackers;
					$response['template_list'] = $templates;
					$result['tracker_info'] = $response;
					echo(json_encode($result));die;
				}
				break;
			case 'DELETE':
				$DELETE = Request::current()->query();
				if(!(isset($DELETE['tracker_id']))){
					throw new HTTP_Exception_400;
				}
				$tracker_id = $DELETE['tracker_id'];
				$this->delete($tracker_id);
				die;
				break;
			case 'POST':
				if(!(isset($_POST['tracker_id']) && isset($_POST['tracker_data'])))
				{
					throw new HTTP_Exception_400;
				}
				if($user_role=='doctor'){
					$patient_id = $_POST['patient_id'];
				}
				else{
					$patient_id = $user['id'];
				}
				$tracker_id = $_POST['tracker_id'];
				$tracker_data = json_decode($_POST['tracker_data']);
//				$app_id = $_POST['app_id'];
//				$app_object = new Model_Appointment;
//				$app_info = $app_object->get_appointment_info($app_id);
				$tracker_cols = $tracker_data[0];
				if($tracker_id != 'null'){
					$parameter_details = $this->get_parameter_details($tracker_cols,$tracker_id);
					if($parameter_details){
						$tracksheet_param_object = new Model_Tracksheetparameter;
						$tracksheet_param_object->update_tracker_parameters($tracker_id, $parameter_details);
						$this->update_tracker_values($tracker_id,$tracker_data, $parameter_details,$patient_id);
					}	
					die;
				}
				else{
					if(isset($_POST['template_id']) && ($_POST['template_id'] != 'null')){
						$new_tracker_id = $this->createFromTemplate($patient_id, $_POST['template_id']);
					}
					else{
						$new_tracker_id = $this->create_tracksheet($patient_id);
					}
					$tracker_object = new Model_Tracksheet;
					$tracker_info = $tracker_object->get_tracker($new_tracker_id);
					$response['tracker_parameterlist'] = $this->get_tracker_parameterlist($new_tracker_id);
					$startdate=ORM::factory('tracksheet')->where('id','=',$new_tracker_id)->find()->parameterstartdate_c;
					$arrange_trackerdata= $this->arrange_trackerdata($response['tracker_parameterlist'],$patient_id,$startdate,'Not_provided',$new_tracker_id);

		
					//$tracker_values = $this->get_tracker_values($new_tracker_id);
					$response = array();
					$response['info'] = $tracker_info;
					$response['values'] = $arrange_trackerdata['timestamp_paravalue'];
					$response['paramdata_createdby'] =$arrange_trackerdata['paramdata_createdby'];
					echo json_encode($response);die;
				}  
				break;  
			default:
				throw new HTTP_Exception_405;  
			}
		}  
		catch(Exception $e) { throw new Exception($e); }
	}

	public function action_view(){
		try{
			$object_user = new Model_User;
			$user = $object_user->get_user_info();
			switch($_SERVER['REQUEST_METHOD']){
			case 'GET':
				$response = array();
				header("Cache-Control: no-cache, must-revalidate");
				if(!(isset($_GET['app_id']))){
					$template_object = new Model_Tracksheettemplate;
					$templates = $template_object->get_all_templates(Auth::instance()->get_user()->id);
					
					$response['template_list'] = $templates;
					$result['tracker_info'] = $response;
					echo(json_encode($result));die;
					throw new HTTP_Exception_400;
				}
		
				$app_id = $_GET['app_id'];
				$app_object = new Model_Appointment;
				$app_info = $app_object->get_appointment_info($app_id);
				$tracker_id = null;
				if(isset($_GET['tracker_id'])){
					$tracker_id = $_GET['tracker_id'];
					$tracker_object = new Model_Tracksheet;
					$tracker_info = $tracker_object->get_tracker($tracker_id);
					$response['tracker_parameterlist'] = $this->get_tracker_parameterlist($tracker_id);
					$startdate=ORM::factory('tracksheet')->where('id','=',$tracker_id)->find()->parameterstartdate_c;
					$response['tracker_data']= $this->arrange_trackerdata($response['tracker_parameterlist'],$app_info['refappfromid_c'],$startdate,'Not_provided',$tracker_id);
					if($user['id'] != $tracker_info['owner_id']){
						$owner_info = $object_user->get_info($tracker_info['owner_id']);
						$response['owner_info'] = $owner_info['name'];
					}  
					echo json_encode($response);die;
				}
				else{
					$tracker_object = new Model_Tracksheet;
					$all_trackers = $tracker_object->get_all_trackers($app_info['refappfromid_c']);
					$current_tracker_id = $this->find_by_incidentid($all_trackers, $app_info['refincidentid_c']);
					$template_object = new Model_Tracksheettemplate;
					$templates = $template_object->get_all_templates($user['id']);
					if($current_tracker_id){
						$response['tracker_parameterlist'][$current_tracker_id] = $this->get_tracker_parameterlist($current_tracker_id);
						$startdate=ORM::factory('tracksheet')->where('id','=',$current_tracker_id)->find()->parameterstartdate_c;
						$response['tracker_data'][$current_tracker_id] = $this->arrange_trackerdata($response['tracker_parameterlist'][$current_tracker_id],$app_info['refappfromid_c'],$startdate,'Not_provided',$current_tracker_id);
					}
					$response['current_tracker_id'] = $current_tracker_id;
					$response['tracker_list'] = $all_trackers;
					$response['template_list'] = $templates;
					$result['tracker_info'] = $response;
					echo(json_encode($result));die;
				}
				break;
			case 'DELETE':
				$DELETE = Request::current()->query();
				if(!(isset($DELETE['tracker_id']))){
					throw new HTTP_Exception_400;
				}
				$tracker_id = $DELETE['tracker_id'];
				$this->delete($tracker_id);
				die;
				break;
			case 'POST':
				if(!(isset($_POST['tracker_id']) && isset($_POST['tracker_data']) && isset($_POST['app_id']))){
					throw new HTTP_Exception_400;
				}
				$tracker_id = $_POST['tracker_id'];
				$tracker_data = json_decode($_POST['tracker_data']);
				$app_id = $_POST['app_id'];
				$app_object = new Model_Appointment;
				$app_info = $app_object->get_appointment_info($app_id);
				$tracker_cols = $tracker_data[0];
				if($tracker_id != 'null'){
					$parameter_details = $this->get_parameter_details($tracker_cols,$tracker_id);
					if($parameter_details){
						$tracksheet_param_object = new Model_Tracksheetparameter;
						$tracksheet_param_object->update_tracker_parameters($tracker_id, $parameter_details);
						$this->update_tracker_values($tracker_id,$tracker_data, $parameter_details,$app_info['refappfromid_c']);
					}	
					die;
				}
				else{
					if(isset($_POST['template_id']) && ($_POST['template_id'] != 'null')){
						$new_tracker_id = $this->createFromTemplate($app_id, $_POST['template_id']);
					}
					else{
						$new_tracker_id = $this->create_tracksheet($app_id);
					}
					$tracker_object = new Model_Tracksheet;
					$tracker_info = $tracker_object->get_tracker($new_tracker_id);
					$response['tracker_parameterlist'] = $this->get_tracker_parameterlist($new_tracker_id);
					$startdate=ORM::factory('tracksheet')->where('id','=',$new_tracker_id)->find()->parameterstartdate_c;
					$tracker_values= $this->arrange_trackerdata($response['tracker_parameterlist'],$app_info['refappfromid_c'],$startdate,'Not_provided',$new_tracker_id);
					//$tracker_values = $this->get_tracker_values($new_tracker_id);
					$response = array();
					$response['info'] = $tracker_info;
					$response['values'] = $tracker_values;
					echo json_encode($response);die;
				}  
				break;  
			default:
				throw new HTTP_Exception_405;  
			}
		}  
		catch(Exception $e) { throw new Exception($e); }
	} 
	public function action_universaltracker(){
		try{
			$object_user = new Model_User;
			$user = $object_user->get_user_info();
			switch($_SERVER['REQUEST_METHOD']){
			case 'GET':
				if(!(isset($_GET['tracker_id']))){
					throw new HTTP_Exception_400;
				}  
				header("Cache-Control: no-cache, must-revalidate");
				$response = array();
				$tracker_id = $_GET['tracker_id'];
				$patient_id = $_GET['patient_id'];
				if(isset($_GET['tracker_data'])){
					$tracker_data=json_decode($_GET['tracker_data']);
					$startdate=$_GET['start_date'];
					if($startdate=='Not_provided'){
						$startdate=ORM::factory('tracksheet')->where('id','=',$tracker_id)->find()->parameterstartdate_c;
					}
					else{
		//				var_dump($startdate);
						$startdate=strtotime($startdate);
						$tracksheet=ORM::factory('tracksheet')->where('id','=',$tracker_id)->find();
						if($tracksheet->id){
							$tracksheet->parameterstartdate_c=$startdate;//$startdate;
							$tracksheet->save();	
						}
					}
					$todate='Not_provided';
					if((isset($_GET['to_date']))){
						$todate=$_GET['to_date'];
					}  

					$data=array();
					foreach($tracker_data as $track){
						if($track !='Date'){
							array_push($data,$track);
						}
					}
					$arrange_trackerdata= $this->arrange_trackerdata($data,$patient_id,$startdate,$todate,$tracker_id);
					$response['tracker_data'] =$arrange_trackerdata['timestamp_paravalue'];
					$response['paramdata_createdby'] =$arrange_trackerdata['paramdata_createdby'];
					
					echo json_encode($response);die;
				}
			default:
				throw new HTTP_Exception_405;  
			}
		}  
		catch(Exception $e) { throw new Exception($e); }
	}
	
	public function action_getparameteruniversalvalues(){
	try{
		if(!isset($_GET['paramid'])){
			throw new HTTP_Exception_400;
		}
		else{
			$universaltracker = new helper_Universaltracker();
			$patientparameter=$universaltracker->getParameterValues($_GET['paramid']);
		}
		echo(json_encode($patientparameter)); die;
	}

	catch(Exception $e) { throw new Exception($e); }

	}
	public function action_gettrackerheader(){
		try{
			$object_user = new Model_User;
			$user = $object_user->get_user_info();

			switch($_SERVER['REQUEST_METHOD']){
			case 'GET':
				if(!(isset($_GET['app_id']))){
					throw new HTTP_Exception_400;
				}  
				header("Cache-Control: no-cache, must-revalidate");
				$response = array();
				$appid = $_GET['app_id'];
				$appointment = ORM::factory('appointment')->where('id','=',$appid)->find();

				$header = ORM::factory('doctorpatienttrackerheader')->where('patientuserid_c','=',$appointment->refappfromid_c)->find();
				if($header->id == null){
					
				}
				
				//result['tracker_info']
				
				echo(json_encode($result));die;
				break;
			default:
				throw new HTTP_Exception_405;  
			}
		}  
		catch(Exception $e) { throw new Exception($e); }
	}
	private function check_parameterdata($parameter,$patientuserid){
		$parameterunitsview=ORM::factory('parameterunitsview')->where('parametername','=',$parameter)->find();
		if($parameterunitsview->loinccode){
			$loinc=$parameterunitsview->loinccode;
		}
		else{
			$loinc=$parameterunitsview->alias;
		}
		$patientparameter=ORM::factory('patientparameter')->where('loinccode_c','=',$loinc)->where('refpatientuserid_c','=',$patientuserid)->find_all();
		if(count($patientparameter)){
			return 1;
		}
		else{
			return 0;
		}
	}
	private function arrange_trackerparameter($trackerdata,$patientuserid){
		if($trackerdata){
		$paranames=array();
			foreach($trackerdata as $track){
				$parameterunitsview=ORM::factory('parameterunitsview')->where('parametername','=',$track)->find();
					if(!isset($parameterunitsview->paraid)){
						array_push($paranames,$track);
					}
					else{
						if($parameterunitsview->loinccode){
							$loinc=$parameterunitsview->loinccode;
						}
						else{
							$loinc=$parameterunitsview->alias;
						}
						$testparameter = ORM::factory('testparameter')->where('loinccode_c','=',$loinc)->find_all();
							foreach($testparameter as $testpara){
								$testmaster = ORM::factory('testmaster')->where('id','=',$testpara->reftestid_c)->find();
								if($testmaster->id){
									if($testmaster->ispanel){
										$paracount=$this->check_parameterdata($track,$patientuserid);
										if($paracount){
											array_push($paranames,$track);
										}
									}
									else{
										$testparameter2 = ORM::factory('testparameter')->where('reftestid_c','=',$testmaster->id)->find_all();
										foreach($testparameter2 as $testpara2){
											$parameterunitsview=ORM::factory('parameterunitsview')->where('paraid','=',$testpara2->id)->find();
											$paracount=$this->check_parameterdata($parameterunitsview->parametername,$patientuserid);
											if($paracount){
												array_push($paranames,$parameterunitsview->parametername);
											}
										}
									}
								}
								else{
									array_push($paranames,$track); //For that parameter who doesn't hv testid
								}	
							}
					}				
			}		
		return(array_unique($paranames));
		}
	}
	private function trackerparametermerge($newpara,$oldpara){
		if(!isset($newpara)){
			return $oldpara;
		}
		else{
			$newarray=array();
			$loinccodearray=array();
			foreach($oldpara as $para){
				array_push($newarray,$para);
				$parameterunitsview=ORM::factory('parameterunitsview')->where('parametername','=',$para)->find();
				if($parameterunitsview->loinccode){
					$loinc=$parameterunitsview->loinccode;
				}
				else{
					$loinc=$parameterunitsview->alias;
				}
				array_push($loinccodearray,$loinc);
			}
			foreach($newpara as $para){
				$parameterunitsview=ORM::factory('parameterunitsview')->where('parametername','=',$para)->find();
				if($parameterunitsview->loinccode){
					$loinc=$parameterunitsview->loinccode;
				}
				else{
					$loinc=$parameterunitsview->alias;
				}
				if (!in_array($loinc,$loinccodearray)) {
					array_push($newarray,$para);
				}
			}
			return $newarray;
		}
	}	
	private function arrange_trackerdata($trackerdata,$patientuserid,$startdate,$todate,$tracker_id){
		try{
			$object_user = new Model_User;
			$user = $object_user->get_user_info();
			$paramdata_createdby=array();
			if($trackerdata){
				//var_dump($trackerdata);
				// Why need to arrange and then merge parameter
				// So commented two statements
					//$newtrackerdata=$this->arrange_trackerparameter($trackerdata,$patientuserid);
				//var_dump($newtrackerdata);
					//$trackerdata=$this->trackerparametermerge($newtrackerdata,$trackerdata);
				//$trackerdata=array_unique(array_merge($newtrackerdata,$trackerdata));
				//var_dump($trackerdata);
				//die;
					$whereClause="";
					$i='1';
					$param_ids=array();
					$param_names=array();
					$tracker_data=array();
					foreach($trackerdata as $item){
						if($item!=' ' && $item!=''){
							array_push($tracker_data,$item);
						}
					}
					array_push($param_names,'Date');
					foreach($tracker_data as $track){
						$parameterunitsview=ORM::factory('parameterunitsview')->where('parametername','=',$track)->find();
						
						if(!isset($parameterunitsview->paraid)){
							$testparameter = ORM::factory('testparameter');
							$testparameter->parametername_c = $track;
							$testparameter->loinccode_c = $track;
							$testparameter->refdefaultunitid_c = 1;
							$testparameter->save();
							if($tracker_id != null){
								$tracksheetParameter = ORM::factory('tracksheetparameter');
								$tracksheetParameter->refsheetid_c = $tracker_id;
								$tracksheetParameter->refparameterid_c = $testparameter->id;
								$tracksheetParameter->parametername_c = $track;
								$tracksheetParameter->save();
							}	
							$parameterunitsview=ORM::factory('parameterunitsview')->where('paraid','=',$testparameter->id)->find();
						}

						if($parameterunitsview->paraid){							
							$testparameterloinccode = ORM::factory('testparameter')->where('id','=',$parameterunitsview->paraid)->find()->loinccode_c;	//create where clause for query
							if(!$testparameterloinccode){
								$testparameteraliasloinccode = ORM::factory('testparameter')->where('id','=',$parameterunitsview->paraid)->find()->aliasto_c;
								$param_id[$testparameteraliasloinccode]=$i;
								array_push($param_names,$parameterunitsview->parametername);
								$testparameteraliasloinccode = "'".$testparameteraliasloinccode."'";
								$whereClause=$whereClause." (loinccode_c=".$testparameteraliasloinccode." and refunitid_c=".$parameterunitsview->defaultunitid.") ";
								if($i!=(count($tracker_data))){
									$whereClause=$whereClause."OR ";
								}
								$i++;
							}
							else{
								$param_id[$testparameterloinccode]=$i;
								array_push($param_names,$parameterunitsview->parametername);
								$testparameterloinccode = "'".$testparameterloinccode."'";
								$whereClause=$whereClause." (loinccode_c=".$testparameterloinccode." and refunitid_c=".$parameterunitsview->defaultunitid.") ";
								if($i!=(count($tracker_data))){
									$whereClause=$whereClause."OR ";
								}
								$i++;
							}
						}	
					}
		//			var_dump($param_id);
		//			die;
					if($startdate){
						$subquerystartdate='( timestamp_c >='.$startdate.' ) and ';	//add start date to query
					}
					else{
						$subquerystartdate='';
					}
					 $subquerytodate='';
					if($todate=='Not_provided'){							//add end date to query
						$date=date("d-m-Y");
						$todate=strtotime($date. "+1 days");
						$subquerytodate='( timestamp_c <='.$todate.' ) and ';
					}
					else{
						$todate = date("d-m-Y", strtotime($todate));
						
						if($todate == '01-01-1970'){
							$todate = date("d-m-Y");
						}
						
						$todate=strtotime($todate. "+1 days");
						$subquerytodate='( timestamp_c <='.$todate.' ) and ';
					}
					$subquerypatientuserid='( refpatientuserid_c='.$patientuserid.' ) and ';
					
					$query = 'select * from patientparameters where '.$subquerystartdate.$subquerytodate.$subquerypatientuserid.'('.$whereClause.') order by timestamp_c desc';
					$track_values = DB::query(Database::SELECT, $query)->execute()->as_array();
						
					$timestamp_paravalue=array();
					array_push($timestamp_paravalue,$param_names);
					if($track_values){
						$timestamp=array();
						foreach($track_values as $value){
							if(count($timestamp)>0){
								$flag=0;
								foreach($timestamp as $time){
									if($time==$value['timestamp_c']){
										$flag=1;
										break;
									}
								}
								if($flag==0){
									array_push($timestamp,$value['timestamp_c']);
								}
							}
							else{
								array_push($timestamp,$value['timestamp_c']);
							}	
						}
						foreach($timestamp as $stamp){
							$array=array();
							$date=date('d-M-Y H:i:s',$stamp);
							array_push($array,$date);
							array_push($timestamp_paravalue,$array);
						}
						for($x=0;$x<count($timestamp)+1;$x++){ //Initialize array of $paramdata_createdby with default value -1.
							for($y=0;$y<count($param_names);$y++){
								$paramdata_createdby[$x][$y]=-1;
							}
						}
						foreach($track_values as $track){
							$flag=0;
							$date=date('d-M-Y H:i:s',$track['timestamp_c']);
							for($i=1;$i<count($timestamp_paravalue);$i++){
								if($timestamp_paravalue[$i][0]==$date){
									$flag=1;
									break;
								}
							}
							if($flag){
								$timestamp_paravalue[$i][$param_id[$track['loinccode_c']]]=$track['value_c'];
								$obj_roleuser=new Model_roleuser;
								$objroles=$obj_roleuser->where('user_id','=',$track['createdby_c'])->where('role_id','!=','4')->find();
								if($user['id']==$track['createdby_c']){
									$paramdata_createdby[$i][$param_id[$track['loinccode_c']]]=-1;
								}
								else{
									if($objroles->role_id=='3' ){
										$paramdata_createdby[$i][$param_id[$track['loinccode_c']]]=3;
									}
									else if($objroles->role_id=='1' ){
										$paramdata_createdby[$i][$param_id[$track['loinccode_c']]]=1;
									}
									else{
										$paramdata_createdby[$i][$param_id[$track['loinccode_c']]]=5;
									}
								}
							}
						}
					}
				$responce=array();
				$responce['timestamp_paravalue']=$timestamp_paravalue;
				$responce['paramdata_createdby']=$paramdata_createdby;
					
				return $responce;
			}
			else{
					$timestamp_paravalue=array();
					$param_names=array();
					array_push($param_names,'Date');
					array_push($timestamp_paravalue,$param_names);
					$responce=array();
					$responce['timestamp_paravalue']=$timestamp_paravalue;
					$responce['paramdata_createdby']=$paramdata_createdby;
					
				return $responce;
			}
		}
	catch(Exception $e) { throw new Exception($e); }
	}
	private function get_tracker_parameterlist($current_tracker_id){
		try{
			if($current_tracker_id){
				$tracksheetparameter=new Model_Tracksheetparameter;	
				return($tracksheetparameter->gettrackerparameterslist($current_tracker_id));
			}
			return null;	
		}
	catch(Exception $e) { throw new Exception($e); }
	}
	private function update_tracker_values($tracker_id,$tracker_data, $parameter_details,$patientid){
		try{
				$para=array();
				$paraunit=array();
				$data=array();
				$i=1;
			if($tracker_id){
				foreach($parameter_details as $param){
					$para[$i++]=$param['param_id'];
					$defaultunit=ORM::factory('testparameter')->where('id','=',$param['param_id'])->find()->refdefaultunitid_c;
					$paraunit[$param['param_id']]=$defaultunit;	
				}
				for($i=2;$i<count($tracker_data);$i++){
					$row=$tracker_data[$i];
					$flag=0;
					foreach($tracker_data[$i] as $key=>$value){
						if($value!=""){
							if(!$flag){
								$timestamp=$value;
								$flag=1;
							}
							else{
									$parameter=array();						//Create Array to Insert parameter details into patientparameter table
									$parameter['parameterid']=$para[$key];
									$parameter['patientuserid']=$patientid;
									$testparameterloinccode=ORM::factory('testparameter')->where('id','=',$parameter['parameterid'])->find()->loinccode_c;
									if(!$testparameterloinccode){
										$testparameteraliasloinccode=ORM::factory('testparameter')->where('id','=',$parameter['parameterid'])->find()->aliasto_c;
										$parameter['loinccode']=$testparameteraliasloinccode;
									}
									else{
										$parameter['loinccode']=$testparameterloinccode;
									}
									$parameter['value']=$value;
									$parameter['tracksheetid']=$tracker_id;
									$parameter['unit']=$paraunit[$parameter['parameterid']];
									$parameter['timestamp']=strtotime($timestamp);
									array_push($data,$parameter);
							}
						}
					}
				}
			//	var_dump(json_encode($data));
			//	die;
				$universaltracker = new helper_Universaltracker();
				$universaltracker->saveTrackerParameterval($data,$patientid);	
			}
		}
	catch(Exception $e) { throw new Exception($e); }
	}

	private function get_parameter_details($tracker_colums,$tracker_id){
		try{
			$response=array();
			if($tracker_colums){
				foreach($tracker_colums as $col){
					if($col!='Date' && $col!=' ' && $col!=''){
						$parameter_detail=array();
						$parameterunitsview=ORM::factory('parameterunitsview')->where('parametername','=',$col)->find();
						if(isset($parameterunitsview->paraid)){
							$testparametername=ORM::factory('testparameter')->where('id','=',$parameterunitsview->paraid)->find()->parametername_c;
							$parameter_detail['param_id']=$parameterunitsview->paraid;
							$parameter_detail['param_name']= $testparametername;
							array_push($response,$parameter_detail);
						}else{
							$testparameter = ORM::factory('testparameter');
							$testparameter->parametername_c = $col;
							$testparameter->loinccode_c = $col;
							$testparameter->refdefaultunitid_c = 1;
							$testparameter->save();
							
							if($tracker_id != null){
								$tracksheetParameter = ORM::factory('tracksheetparameter');
								$tracksheetParameter->refsheetid_c = $tracker_id;
								$tracksheetParameter->refparameterid_c = $testparameter->id;
								$tracksheetParameter->parametername_c = $col;
								$tracksheetParameter->save();
							}
							
							$parameter_detail['param_id']=$testparameter->id;
							$parameter_detail['param_name']= $col;
							array_push($response,$parameter_detail);
						}						
					}
				}
				return $response;
			}
			return null;	
		}
	catch(Exception $e) { throw new Exception($e); }
	}

	private function find_by_incidentid($trackers, $incident_id){
		foreach($trackers as $key=>$tracker){
			if($tracker['incident_id'] == $incident_id){
				return $tracker["id"];
			}
		}
		foreach($trackers as $key=>$tracker){
			return $tracker["id"];
		}
		return null;
	}

	private function get_tracker_values($tracksheet_id){
		$tracksheet_param_object = new Model_Tracksheetparameter;
		$param_names = $tracksheet_param_object->get_all_parameters($tracksheet_id);
		$sub_query = 'select timestamp_c as "0"';
		$heading = array();
		array_push($heading, 'Date');
		$count = 1;
		foreach ($param_names as $param_name){
			array_push($heading, $param_name);
			$sub_query = $sub_query. ", MAX(IF(parametername_c = '".$param_name."', value_c, NULL)) AS "."'".$count++."'";
		}
		$sub_query = $sub_query. " from trackvalues where refsheetid_c=$tracksheet_id group by timestamp_c order by timestamp_c";
		$track_data = array();
		$track_values = DB::query(Database::SELECT, $sub_query)->execute()->as_array();
		usort($track_values, create_function('$a, $b','return ($a[0] >= $b[0]) ? -1 : 1;'));
		array_push($track_data, $heading);
		foreach($track_values as $key=>$value){
			$track_values[$key][0] = date('d-M-Y h:i', $value[0]);
			array_push($track_data, $track_values[$key]);	  
		}
		return($track_data);
	}
	
	private function createFromTemplate($patient_id, $template_id){
		$new_tracksheet_id = $this->create_tracksheet($patient_id);
		$template_object = ORM::factory('tracksheettemplate')->where('id', '=', $template_id)->find();
		
		$tracksheet = ORM::factory('tracksheet')->where('id','=',$new_tracksheet_id)->find();
		$tracksheet->headerid_c = $template_object->headerid_c;
		$tracksheet->save();
		
		$parameters = explode(',',trim($template_object->parameters_c, ','));
		foreach($parameters as $parameter){
			$parameter_object = ORM::factory('trackparameter')->where('id', '=', $parameter)->find();
			$trackvalue_object = ORM::factory('tracksheetparameter');
			$trackvalue_object->refparameterid_c = $parameter;
			$trackvalue_object->parametername_c = $parameter_object->parametername_c;
			$trackvalue_object->refsheetid_c = $new_tracksheet_id;
			$trackvalue_object->save();
		}
		return $new_tracksheet_id;
	}
/*	private function create_tracksheet($app_id){
		$app_object = ORM::factory('appointment')->where('id','=',$app_id)->find();
		$incident_object = ORM::factory('incident')->where('id', '=', $app_object->refincidentid_c)->find();
		$all_tracksheets = ORM::factory('tracksheet')->where('refincidentid_c', '=', $app_object->refincidentid_c)->find_all();
		$count = count($all_tracksheets);
		if($count > 0){
			$name = $incident_object->incidentsname_c."($count)";
		}
		else{
			$name = $incident_object->incidentsname_c;
		}
		$new_tracksheet = ORM::factory('tracksheet');
		$new_tracksheet->refpatientid_c = $app_object->refappfromid_c;
		$new_tracksheet->refincidentid_c = $incident_object->id;
		$new_tracksheet->tracksheetname_c = $name;
		$new_tracksheet->refcreaterid_c = Auth::instance()->get_user()->id;
		$new_tracksheet_id = $new_tracksheet->save()->id;
		return ($new_tracksheet_id);
	}
*/	
	private function create_tracksheet($patient_id){
		$all_tracksheets = ORM::factory('tracksheet')->where('refpatientid_c', '=',$patient_id)->find_all();
		$count = count($all_tracksheets);
		if($count > 0){
			$name = 'tracker'."($count)";
		}
		else{
			$name = 'tracker';
		}
		$new_tracksheet = ORM::factory('tracksheet');
		$new_tracksheet->refpatientid_c = $patient_id;
		$new_tracksheet->refincidentid_c = '1';
		$new_tracksheet->tracksheetname_c = $name;
		$new_tracksheet->refcreaterid_c = Auth::instance()->get_user()->id;
		$new_tracksheet_id = $new_tracksheet->save()->id;
		return ($new_tracksheet_id);
	}
	
	public function action_trackerList(){
		try{
			$sheet_name = $_POST['tracker_name'];
			$sheet_id = $_POST['tracker_id'];
			$sheet_object = ORM::factory('tracksheet')->where('id','=',$sheet_id)->find();
			if($sheet_object->loaded()){
				$sheet_object->tracksheetname_c = $sheet_name;
				$sheet_object->save();
			}
			else{
				throw new Exception;
			}
			die($sheet_object->id);
		}catch(Exception $e){throw new Exception ($e);}  
	}
	
	public function action_update(){
		try{
			$sheet_name = $_GET['sheet_name'];
			$sheet_id = $_GET['sheet_id'];
			$sheet_object = ORM::factory('tracksheet')->where('id','=',$sheet_id)->find();
			if($sheet_object->loaded()){
				$sheet_object->tracksheetname_c = $sheet_name;
				$sheet_object->save();
			}
			else{
				throw new Exception;
			}
			die();
		}catch(Exception $e){throw new Exception ($e);}
	}
	
	private function delete($tracker_id){
		try{
			$tracksheet_param_obj = new Model_Tracksheetparameter;
			$tracksheet_param_obj->delete_all($tracker_id);
			$tracker_value_obj = new Model_Trackvalue;
			$tracker_value_obj->delete_all($tracker_id);
			$tracker_object = new Model_Tracksheet;
			$tracker_object->delete_tracker($tracker_id);
			die();
		}catch(Exception $e){throw new Exception ($e);}
	}
	
	public function action_Template(){
		try{
			$object_user = new Model_User;
			$user = $object_user->get_user_info();
			switch($_SERVER['REQUEST_METHOD']){
			case 'POST':
				if(!(isset($_POST['name']) && isset($_POST['data']))){
					throw new HTTP_Exception_400;
				}  
				$headers = json_decode($_POST['data']);
				$parameter_details=$this->get_parameter_details($headers,null);
				$template_name = $_POST['name'];
			//	array_shift($headers);
			//	$track_param_obj = new Model_Trackparameter;
			//	$parameter_ids = $track_param_obj->get_parameter_ids($headers);
				$parameter_ids=array();
				foreach($parameter_details as $parameter_id){
					array_push($parameter_ids, $parameter_id['param_id']);
				}
				$parameter_ids = implode(',',$parameter_ids);
				$template_object = new Model_Tracksheettemplate;
				$template_id = $template_object->add_template($template_name, $parameter_ids, $user['id']);
				$response['template_id'] = $template_id;
				echo json_encode($response);
				die;
			}
		}catch(Exception $e){throw new Exception ($e);}
	}
	
	public function action_deleteTemplate(){
		try{
			$template_id = $_GET['template_id'];
			$template_object = ORM::factory('tracksheettemplate')->where('id','=',$template_id)->find();
			$template_object->delete();
			die();
		}catch(Exception $e){throw new Exception ($e);}

	}
}

<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/xmpp.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/notificationsender.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/controller/cpdfcreater.php');
include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/controller/catjob.php');

class Controller_Newcemrdashboard extends Controller_Ctemplatewithmenu {
	
	public function action_view(){
		$appid=$_GET['appid'];
		$name = $_GET['name'];
		
		$objApp = ORM::factory('appointment')->where('id','=',$appid)->find();
		if($objApp->refappointmentstatusesid_c != 2){
			die('Access denied to the appointment because appointment might be cancelled, completed or rescheduled status.');
		}
		
		$user = Auth::instance()->get_user();
		if (!$user){
			Request::current()->redirect('cuser/login');
		}
		if($name == "relative")
			$this->displayRelativeView($user, $appid, $name);
		else if ($user->has('roles', ORM::factory('role', array('name' => 'doctor'))))
			$this->displayDoctorView($user, $appid, $name);
		else if ($user->has('roles', ORM::factory('role', array('name' => 'patient'))))
			$this->displayPatientView($user, $appid, $name);
	}

	private function displayRelativeView($user, $intAppId, $name){
		$content 	= View::factory('/vuser/vpatient/vrelativeconsult');
		$datestring = htmlspecialchars(date ("dmYHis"), ENT_QUOTES);
		$objAppointmentInfo = new Model_Doctorappointment;
		$objAppointmentInfo	= $objAppointmentInfo->where('appointment_id','=',$intAppId)->find();
		$appointment= ORM::factory('appointment')->where('id','=',$intAppId)->find();
		//Find doctor name/
		$objDoctor = new Model_Doctor;
		$objDoctor->where('id','=',$appointment->refappwithid_c)->find();
		$objUser = new Model_User;
		$objUser->where('id','=',$objDoctor->refdoctorsid_c)->find();
		$relativeUser = Auth::instance()->get_user();
		$content->bind('name', $name);
		$content->bind('objDoctor', $objUser);
		$content->bind('appointmentinfo', $objAppointmentInfo);
		$content->bind('mode', $mode);
		$content->bind('appid', $intAppId);
		$content->bind('timestamp', $datestring);
		$content->bind('relative', $relativeUser);
		$maximize = true;
		$this->template->breadcrumb = ">>Home";
		$this->template->content = $content;
		$this->template->user = $relativeUser;
		$this->template->urole = "patient";
	}
	
	public function action_getPrimaryRelatives(){
		$patId = $_GET['patId'];
		$relativeObjs = ORM::factory('relative')->where('refrelativeuserid_c', '=', $patId)->find_all();
		$results = array();
		foreach($relativeObjs as $relativeObj){
			$relativeUserObj = ORM::factory('user')->where('id', '=', $relativeObj->refprimaryusersid_c)->find();
			$result = array();
			$result['name'] = $relativeUserObj->Firstname_c.' '.$relativeUserObj->middlename_c.' '.$relativeUserObj->lastname_c;
			$result['id'] = $relativeUserObj->id;
			array_push($results, $result);
		}
		die(json_encode($results));
	}

	public function action_connect(){
		$appid=$_GET['appid'];
		$user = Auth::instance()->get_user();
		if (!$user)
			Request::current()->redirect('cuser/login');
		if ($user->has('roles', ORM::factory('role', array('name' => 'doctor'))))
			$role = "doctor";
		else if ($user->has('roles', ORM::factory('role', array('name' => 'patient'))))
			$role = 'patient';
		$objConsultationSession = ORM::factory('consultationsession')->where('refappid_c', '=', $appid)->find();
		if(! $objConsultationSession->loaded()){
			switch($role){
				case 'doctor':
					$objConsultationSession->refappid_c		= $appid;
					$objConsultationSession->dstatus_c		= "waiting";
					$objConsultationSession->dstatustime_c	= date('Y-m-d H:i:s', time());
					$objConsultationSession->save();
					break;
				case 'patient':
					$objConsultationSession->refappid_c		= $appid;
					$objConsultationSession->pstatus_c		= "waiting";
					$objConsultationSession->pstatustime_c	= date('Y-m-d H:i:s', time());
					$objConsultationSession->save();
			}
		}
		else{
			switch($role){
				case 'doctor':
					$objConsultationSession->dstatus_c		= "waiting";
					$objConsultationSession->dstatustime_c	= date('Y-m-d H:i:s', time());
					$objConsultationSession->update();
					break;
				case 'patient':
					$objConsultationSession->pstatus_c		= "waiting";
					$objConsultationSession->pstatustime_c	= date('Y-m-d H:i:s', time());
					$objConsultationSession->update();
			}
		}
		$status = $this->updateSession($appid, $user);
		die($status);
	}
	
	public function action_disconnect(){
		$appid=$_GET['appid'];
		$user = Auth::instance()->get_user();
		if (!$user)
			Request::current()->redirect('cuser/login');
		if ($user->has('roles', ORM::factory('role', array('name' => 'doctor'))))
			$role = "doctor";
		else if ($user->has('roles', ORM::factory('role', array('name' => 'patient'))))
			$role = 'patient';
		$objConsultationSession = ORM::factory('consultationsession')->where('refappid_c', '=', $appid)->mustFind();
		switch($role){
			case 'doctor':
				$objConsultationSession->dstatus_c		= "aborted";
				$objConsultationSession->dstatustime_c	= date('Y-m-d H:i:s', time());
				$objConsultationSession->save();
				break;
			case 'patient':
				$objConsultationSession->pstatus_c		= "aborted";
				$objConsultationSession->pstatustime_c	= date('Y-m-d H:i:s', time());
				$objConsultationSession->save();
		}
		$status = $this->updateSession($appid, $user);
		die($status);
	}
	
	public function action_viewSummary(){
		try{
			if(!(isset($_POST['appid']))){
				return('error');
			}
			$appid = $_POST['appid'];
			$this->saveAppointmentData($_POST);
			$pdfPath = $this->generateAppointmentSummary($appid);
			die($pdfPath);
		}
		catch(Exception $e){throw new Exception($e);}
	}

	public function action_getPastMedicines(){
		$intAppId=$_GET['appid'];
		header("Cache-Control: no-cache, must-revalidate");
		$appointment = ORM::factory('appointment')->where('id','=',$intAppId)->find();
		$appointment = ORM::factory('appointment')->where('refappfromid_c','=',$appointment->refappfromid_c)->where('refappwithid_c','=',$appointment->refappwithid_c)->where('refappointmentstatusesid_c','=',1)->where('refincidentid_c','=',$appointment->refincidentid_c)->order_by('scheduledstarttime_c','desc')->find_all()->as_array();
		if(count($appointment) == 0){
		  echo 'no past data';die;
		}
    else{
		$result=$appointment[sizeof($appointment)-1];
		$id=$result->id;
		//get prescription id
		$prescription = array();
		$prescription_ids = ORM::factory('prescription')->where('refprescriptionsappoitmentid_c','=',$id)->find_all()->as_array();
		foreach($prescription_ids as $prescription_id){
			$prescription_detail = ORM::factory('prescriptiondetail')->where('refpdetailsprescriptionsid_c','=',$prescription_id)->find();
			$medicine = array();
			$drugMasterObj = ORM::factory('drugmaster')->where('id','=',$prescription_detail->refpdetailsdrugid_c)->find();
			$medicine[0]['value'] = $prescription_detail->drugtype_c.". ".strtoupper($drugMasterObj->DrugName_c)." ($drugMasterObj->drugStrength_c)";
			$medicine[1]['value'] = $prescription_detail->dosage_c;
			$medicine[2]['value'] = $prescription_detail->quantity_c;
			$medicine[3]['value'] = $prescription_detail->drugperiod_c;
			array_push($prescription,$medicine);
		}
		die(json_encode($prescription));
		}
	}
	public function action_getExaminationsummary(){
	$examsummary = array();
	$temp = array ();
		$intAppId=$_GET['patientid'];
		header("Cache-Control: no-cache, must-revalidate");		
		$appointment = ORM::factory('textexamination')->where('ref_app_id','=',$intAppId)->find();
	//	$examsummary["summary"] = $appointment['text'];
		$examsummary['summary'] = $appointment->text;
		die(json_encode($examsummary));
	}	
	
	public function action_getCurrentMedicines(){
		$intAppId = $_GET['appid'];
		//$result=$intAppId;
		$id = $intAppId;
		//get prescription id
		$prescription = array();
		$prescription_ids = ORM::factory('prescription')->where('refprescriptionsappoitmentid_c','=',$id)->find_all()->as_array();
		foreach($prescription_ids as $prescription_id){
			$prescription_detail = ORM::factory('prescriptiondetail')->where('refpdetailsprescriptionsid_c','=',$prescription_id)->find();
			$medicine = array();
			$temp = array();
			$drugMasterObj = ORM::factory('drugmaster')->where('id','=',$prescription_detail->refpdetailsdrugid_c)->find();
			$medicine['value'] = ($prescription_detail->drugtype_c == "")?strtoupper($drugMasterObj->DrugName_c):$prescription_detail->drugtype_c.". ".strtoupper($drugMasterObj->DrugName_c);
			array_push($temp,$medicine);
			$medicine['value'] = $prescription_detail->dosage_c;
			array_push($temp,$medicine);
			$medicine['value'] = $prescription_detail->quantity_c;
			array_push($temp,$medicine);
			$medicine['value'] = $prescription_detail->drugperiod_c;
			array_push($temp,$medicine);
			array_push($prescription,$temp);
		    
		}die(json_encode($prescription));
	}
	
	public function action_getCurrentInvestigations(){
		$intAppId = $_GET['appid'];
		$id = $intAppId;
		$tests = array();
		$recommendedtests = ORM::factory('recommendedtest')->where('refrecomtestappointmentsid_c','=',$id)->find_all()->as_array();
		  for($i=0;$i<count($recommendedtests);$i++){
			$test = array();
			$testMasterObj = ORM::factory('testmaster')->where('id','=',$recommendedtests[$i]->refrecomtestrecommtestid_c)->find();
			$test['value'] = $testMasterObj->testname_c;
			array_push($tests,$test);
		  }
		die(json_encode($tests));
	}
	
	
	public function action_getPastTests(){
		$intAppId=$_GET['appid'];
		$appointment = ORM::factory('appointment')->where('id','=',$intAppId)->find();
		$appointment = ORM::factory('appointment')->where('refappfromid_c','=',$appointment->refappfromid_c)->where('refappwithid_c','=',$appointment->refappwithid_c)->where('refappointmentstatusesid_c','=',1)->where('refincidentid_c','=',$appointment->refincidentid_c)->order_by('scheduledstarttime_c','desc')->find_all()->as_array();
		if(count($appointment) == 0){
		  echo 'no past data';die;
		}
		else{
		  $result=$appointment[sizeof($appointment)-1];
		  $id=$result->id;
		  $tests = array();
		  $recommendedtests = ORM::factory('recommendedtest')->where('refrecomtestappointmentsid_c','=',$id)->find_all()->as_array();
		  for($i=0;$i<count($recommendedtests);$i++){
			$test = array();
			$testMasterObj = ORM::factory('testmaster')->where('id','=',$recommendedtests[$i]->refrecomtestrecommtestid_c)->find();
			$test['value'] = $testMasterObj->testname_c." (sample : $testMasterObj->sample_c)";
			$test['id'] = $testMasterObj->id;
			array_push($tests,$test);
		  }
		die(json_encode($tests));
		}
	}	

	public function action_saveAppointmentData(){
		try{
			$this->saveAppointmentData();
			die('success');
		}
		catch(Exception $e){throw new Exception($e);}
	}	
	
	public function action_getPastData(){
	  $app_id=$_GET['appid'];
	  $appointment = ORM::factory('appointment')->where('id','=',$app_id)->find();
	  $appointment = ORM::factory('appointment')->where('refappfromid_c','=',$appointment->refappfromid_c)->where('refappwithid_c','=',$appointment->refappwithid_c)->where('refappointmentstatusesid_c','=',1)->where('refincidentid_c','=',$appointment->refincidentid_c)->order_by('scheduledstarttime_c','desc')->find_all()->as_array();
	  if(count($appointment) == 0){
	    echo 'no past data';die;
	  }
	  else{
	    $appointment = array_pop($appointment);
	    $id = $appointment->id;
	    $text = array();
		
		$incident = ORM::factory('incident')->where('id','=',$appointment->refincidentid_c)->find();
	    $text['incidentid'] = $incident->id;
		$text['incidentname'] = $incident->incidentsname_c;
		
		$textcomplaintobj = ORM::factory('textcomplaint')->where('ref_app_id','=',$id)->find()->as_array();
		$text["maincomplaint"] = $textcomplaintobj["text"];
		
		$textexaminationobj = ORM::factory('textexamination')->where('ref_app_id','=',$id)->find()->as_array();
		$text["examination"] = $textexaminationobj["json"];
		
		$textexaminationobj = ORM::factory('textexaminationsummary')->where('ref_app_id','=',$id)->find()->as_array();
		$text["examinationsummary"] = $textexaminationobj["text"];
		
		$textdiagnosisnoteobj = ORM::factory('textdiagnosisnote')->where('ref_app_id','=',$id)->find()->as_array();
		$text["diagnosis"] = $textdiagnosisnoteobj["text"];
		
		$textinvestigationobj = ORM::factory('textinvestigation')->where('ref_app_id','=',$id)->find()->as_array();
		$text["investigation"] = str_replace('\\n',' \n', $textinvestigationobj["text"]);

		$textreportobj = ORM::factory('textreportparameter')->where('ref_app_id','=',$id)->find()->as_array();
		$text["text_reportparameter"] = $textreportobj["text"];
		
		$textprescriptionobj = ORM::factory('textprescription')->where('ref_app_id','=',$id)->find()->as_array();
		$text["medicine"] = str_replace('\\n',' \n', $textprescriptionobj["text"]);

		
		$textfollowupobj = ORM::factory('textfollowupnote')->where('ref_app_id','=',$id)->find()->as_array();
		$text["followup"] = $textfollowupobj["text"];
	    $pastdata = json_encode($text);
	    die($pastdata);
	  }
	}
	
	public function action_getPastAllIncidenceData(){
	  $app_id=$_GET['appid'];
	  $appointment = ORM::factory('appointment')->where('id','=',$app_id)->find();
	  $appointments = ORM::factory('appointment')->where('refappfromid_c','=',$appointment->refappfromid_c)->where('refappwithid_c','=',$appointment->refappwithid_c)->where('refappointmentstatusesid_c','=',1)->order_by('scheduledstarttime_c','desc')->find_all()->as_array();
	  if(count($appointments) == 0){
	    echo 'no past data';die;
	  }
	  else{
	    $arr_appointments = array();
		foreach($appointments as $appointment){
			$id = $appointment->id;
			$text = array();
			$text['id'] = $id;
			
			$date = new DateTime($appointment->displaytime_c);
			$text['date'] =  $date->format('d M Y');
			
			$incident = ORM::factory('incident')->where('id','=',$appointment->refincidentid_c)->find();
			$text['incidentid'] = $incident->id;
			$text['incidentname'] = $incident->incidentsname_c;
			
			$textcomplaintobj = ORM::factory('textcomplaint')->where('ref_app_id','=',$id)->find()->as_array();
			$text["maincomplaint"] = $textcomplaintobj["text"];
			
			$textexaminationobj = ORM::factory('textexamination')->where('ref_app_id','=',$id)->find()->as_array();
			$text["examination"] = $textexaminationobj["json"];
			
			$textexaminationobj = ORM::factory('textexaminationsummary')->where('ref_app_id','=',$id)->find()->as_array();
			$text["examinationsummary"] = $textexaminationobj["text"];
			
			$textdiagnosisnoteobj = ORM::factory('textdiagnosisnote')->where('ref_app_id','=',$id)->find()->as_array();
			$text["diagnosis"] = $textdiagnosisnoteobj["text"];
			
			$textinvestigationobj = ORM::factory('textinvestigation')->where('ref_app_id','=',$id)->find()->as_array();
			$text["investigation"] = str_replace('\\n',' \n', $textinvestigationobj["text"]);
	
			
			$textprescriptionobj = ORM::factory('textprescription')->where('ref_app_id','=',$id)->find()->as_array();
			$text["medicine"] = str_replace('\\n',' \n', $textprescriptionobj["text"]);
	
			$textreportobj = ORM::factory('textreportparameter')->where('ref_app_id','=',$id)->find()->as_array();
			$text["text_reportparameter"] = $textreportobj["text"];
			
			$textfollowupobj = ORM::factory('textfollowupnote')->where('ref_app_id','=',$id)->find()->as_array();
			$text["followup"] = $textfollowupobj["text"];
			
			array_push($arr_appointments, $text);
		}
		$pastdata['data'] = $arr_appointments;
	    $pastdata = json_encode($pastdata);
	    die($pastdata);
	  }
	}
	
	public function action_getPastAllData(){
		$pattext = array();
		$patdata = array();
		if(isset($_GET['patientid']))
		{
			$patid = $_GET['patientid'];
			$patient = ORM::factory('user')->where('id','=',$patid)->find();
			$pattext['patname'] = $patient->Firstname_c.' '.$patient->lastname_c;
			array_push($patdata,$pattext);
		}
		
		$visibility = 0;
		$appointments=array();
		if(isset($_GET['appid'])){
			$app_id=$_GET['appid'];
			$appointment = ORM::factory('appointment')->where('id','=',$app_id)->find();
			$appointments = ORM::factory('appointment')->where('refappointmentstatusesid_c','=',1)->or_where('refappointmentstatusesid_c','=',6)->where('refappfromid_c','=',$appointment->refappfromid_c)->where('refappwithid_c','=',$appointment->refappwithid_c)->where('refincidentid_c','=',$appointment->refincidentid_c)->order_by('scheduledstarttime_c','desc')->find_all()->as_array();
			$visibility = array(1,0);
		}else if(isset($_GET['patientid'])){
			$patientid = $_GET['patientid'];
			$user = Auth::instance()->get_user();

			if (!$user){
				Request::current()->redirect('cuser/login');
			}
			if ($user->has('roles', ORM::factory('role', array('name' => 'doctor')))){
				$doctorid = ORM::factory('doctor')->where('refdoctorsid_c','=',$user->id)->find()->id;
				$appointments = ORM::factory('pastappointment')->where('refappfromid_c','=',$patientid)->order_by('scheduledstarttime_c','desc')->find_all()->as_array();
				$visibility = array(1,0);
			}else if($user->has('roles', ORM::factory('role', array('name' => 'patient')))){
				$appointments = ORM::factory('pastappointment')->where('refappfromid_c','=',$user->id)->order_by('scheduledstarttime_c','desc')->find_all()->as_array();
				$visibility = array(1);
			}
		}
		else
		{
			$user = Auth::instance()->get_user();
			$patientid = $user->id;
			if (!$user){
				Request::current()->redirect('cuser/login');
			}
			if ($user->has('roles', ORM::factory('role', array('name' => 'doctor')))){
				$doctorid = ORM::factory('doctor')->where('refdoctorsid_c','=',$user->id)->find()->id;
				$appointments = ORM::factory('pastappointment')->where('refappfromid_c','=',$patientid)->order_by('scheduledstarttime_c','desc')->find_all()->as_array();
				$visibility = array(1,0);
			}else if($user->has('roles', ORM::factory('role', array('name' => 'patient')))){
				$appointments = ORM::factory('pastappointment')->where('refappfromid_c','=',$user->id)->order_by('scheduledstarttime_c','desc')->find_all()->as_array();
				$visibility = array(1);
			}			
		}
	  if(count($appointments) == 0){
	    echo 'no past data';die;
	  }
	  else{
			$user = Auth::instance()->get_user();
			$doctorid = ORM::factory('doctor')->where('refdoctorsid_c','=',$user->id)->find()->id;

	    $arr_appointments = array();
		foreach($appointments as $appointment){
			$id = $appointment->id;
			$billGenerated=$appointment->reftransactionid_c;
			$text = array();
			$text['id'] = $id;
			$text['recordstatus']="completed";
			if($billGenerated == NULL){
				$text['billGenerated'] = 'no';
			}
			else{
				$text['billGenerated'] = 'yes';
			}
			$text['showbilloption'] = 'yes';
			
			$doctoruserid = ORM::Factory('doctor')->where('id','=',$appointment->refappwithid_c)->find()->refdoctorsid_c;
			$doctoruser = ORM::factory('user')->where('id','=',$doctoruserid)->find();
			$text['drname'] = 'Dr. '.$doctoruser->Firstname_c.' '.$doctoruser->lastname_c;
			if($doctoruserid == -1 and $appointment->refnonregdoctorid_c !=null)
			{
				$objnonregdoctor = ORM::factory('nonregdoctor')->where('id','=',$appointment->refnonregdoctorid_c)->find();
				$text['drname'] = 'Dr. '.$objnonregdoctor->doctorname_c;
			}

			if($user->has('roles', ORM::factory('role', array('name' => 'doctor')))){
				if($doctorid == $appointment->refappwithid_c){
					$text['showbilloption'] = 'yes';
				}
				else{
					$text['showbilloption'] = 'no';
				}
				$patientuser = ORM::factory('user')->where('id','=',$appointment->refappfromid_c)->find();
				$text['replyto'] = $patientuser->Firstname_c.' '.$patientuser->lastname_c;
				$text['replytoid'] =$doctoruserid;
			}else{
				$text['replyto'] = 'Dr. '.$doctoruser->Firstname_c.' '.$doctoruser->lastname_c;
				$text['replytoid'] =$doctoruserid;
			}
			$date = new DateTime($appointment->endconsultdate_c);	
			//$date = new DateTime($appointment->displaytime_c);
			$text['date'] =  $date->format('d M Y');
			
			if ($user->has('roles', ORM::factory('role', array('name' => 'patient')))){
				$messages = ORM::factory('queries')->get_messages($appointment->id,$appointment->refappfromid_c);
				$text['messages'] = ($messages == '[]')?'':$messages;
				$text['user_role'] = 'patient';
			}	
		
			if ($user->has('roles', ORM::factory('role', array('name' => 'doctor')))){
				$messages = ORM::factory('queries')->get_messages($appointment->id,$doctoruserid);
				$text['messages'] = ($messages == '[]')?'':$messages;
				$text['user_role'] ='doctor';
			}	
			
			$incident = ORM::factory('incident')->where('id','=',$appointment->refincidentid_c)->find();
			$text['incidentid'] = $incident->id;
			$text['incidentname'] = $incident->incidentsname_c;
			
			$textcomplaintobj = ORM::factory('textcomplaint')->where('ref_app_id','=',$id)->find()->as_array();
			$text["maincomplaint"] = preg_replace('#<br\s*/?>#i', "\n", $textcomplaintobj["text"]);
			
			$textexaminationobj = ORM::factory('textexamination')->where('ref_app_id','=',$id)->where('visibility','in',$visibility)->find()->as_array();
			$text["examination"] = $textexaminationobj["json"];
			
			$textexaminationobj = ORM::factory('textexaminationsummary')->where('ref_app_id','=',$id)->where('visibility','in',$visibility)->find()->as_array();
			$text["examinationsummary"] = preg_replace('#<br\s*/?>#i', "\n", $textexaminationobj["text"]); 
			
			$textdiagnosisnoteobj = ORM::factory('textdiagnosisnote')->where('ref_app_id','=',$id)->find()->as_array();
			$text["diagnosis"] = preg_replace('#<br\s*/?>#i', "\n", $textdiagnosisnoteobj["text"]);
			
			$textinvestigationobj = ORM::factory('textinvestigation')->where('ref_app_id','=',$id)->find()->as_array();
			$text["investigation"] = str_replace('\\n',' \n', $textinvestigationobj["text"]);
			
			$textprescriptionobj = ORM::factory('textprescription')->where('ref_app_id','=',$id)->find()->as_array();
			$text["medicine"] = str_replace('\\n',' \n', $textprescriptionobj["text"]);
	
			$textfollowupobj = ORM::factory('textfollowupnote')->where('ref_app_id','=',$id)->find()->as_array();
			$text["followup"] = $textfollowupobj["text"];

			$textreportobj = ORM::factory('textreportparameter')->where('ref_app_id','=',$id)->find()->as_array();
			$text["text_reportparameter"] = $textreportobj["text"];
			
		
			$text['status'] = $appointment->status_c;
            $prescriptionpath = ORM::factory('patientprescriptionsnapshot')->where('refappointmentidforprescriptionsnapshots_c','=',$appointment->id)->find()->pdfpath_c;
            $text['prescription'] = ($prescriptionpath == null)?'Informationnotyetfilled':$prescriptionpath;
            
			$reports = ORM::factory('patienttestreport')->where('refappointmentid_c','=',$appointment->id)->find_all();
			$file_paths=array();
			foreach($reports as $report){
				$file = new helper_Files();
				$return = $file->getFilePath($report->fileid_c);
				if($return != ''){
					$patientparameters=ORM::factory('patientparameter')->where('refpatienttestreportid_c','=',$report->id)->find_all();
					$array_para=array();
					if(count($patientparameters)>0){
						foreach($patientparameters as $patientparameter){
							$testparameter=ORM::factory('testparameter')->where('id','=',$patientparameter->reftestparameterid_c)->find();
							$paradata['parametername']=$testparameter->parametername_c;
							$unitsmaster=ORM::factory('unitsmaster')->where('id','=',$patientparameter->refunitid_c)->find();
							if($unitsmaster->unitname_c=='N/A' || $unitsmaster->unitname_c=='Other'){
								$paradata['parametervalue']=$patientparameter->value_c;
							}
							else{
								$paradata['parametervalue']=$patientparameter->value_c.' ('.$unitsmaster->unitname_c .')';
							}
							array_push($array_para,$paradata);
						}
					}
					array_push($file_paths,array("path"=>$return['abspath'],"Parameters"=>$array_para));
				}
			}
			$text['report'] = ($file_paths == null)?'Informationnotyetfilled':$file_paths;

			array_push($arr_appointments, $text);
		}
		$user = Auth::instance()->get_user();
		$network=array();

/*		if ($user->has('roles', ORM::factory('role', array('name' => 'patient')))){
			$objpatient=ORM::factory('patient')->where('repatientsuserid_c','=',$user->id)->find();

			$objfavoritedoctorsbypatientdetail=ORM::factory('favoritedoctorsbypatientdetail')->where('patientid','=',$objpatient->id)->find_all();
			foreach($objfavoritedoctorsbypatientdetail as $obj){
				$doctor=array();
				$doctor['id']=$obj->doctoruserid;
				$doctor['name']=$obj->doctorname;
				$doctor['role']='Doctor';
				array_push($network,$doctor);
			}
		
		}
*/
		if ($user->has('roles', ORM::factory('role', array('name' => 'doctor')))){
		//	if($user->id==$doctoruserid){
					$objselecteddoctorbydoctor=ORM::factory('selecteddoctorbydoctor')->where('doctorsid','=',$user->id)->find_all();

					$patient=array();
					$patient['id']=$patientuser->id;
					$patient['name']=$patientuser->Firstname_c.' '.$patientuser->lastname_c;
					$patient['role']='Patients';
					array_push($network,$patient);

					foreach($objselecteddoctorbydoctor as $obj){
						$doctor=array();
						$doctor['id']=$obj->favdoctorsid;
						$doctor['name']=$obj->doctorname;
						$doctor['role']='Doctors';
						array_push($network,$doctor);
					}
		//	}
		}
		$pastdata['network'] = $network;
		$pastdata['data'] = $arr_appointments;
	    $pastdata['patname'] = $patdata;		
		$pastdata = json_encode($pastdata);
	    die($pastdata);
	  }
	}
	public function action_putstatus(){
		$patienId = $_GET['patid'];
		$statusid = $_GET['statusid'];	
	}	

	public function action_getAppData(){
		$visibility = 0;
		$appointments=array();
		if(isset($_POST['appid'])){
			$app_id=$_POST['appid'];
			$appointment = ORM::factory('appointment')->where('id','=',$app_id)->find();
			$visibility = array(1,0);
		}
		else
		{			
			echo 'Access Denied';die;			
		}
	 
			$user = Auth::instance()->get_user();
			$doctorid = ORM::factory('doctor')->where('refdoctorsid_c','=',$user->id)->find()->id;

			$arr_appointments = array();
		
			$id = $appointment->id;
			$billGenerated=$appointment->reftransactionid_c;
			$text = array();
			$text['id'] = $id;
			if($billGenerated == NULL){
				$text['billGenerated'] = 'no';
			}
			else{
				$text['billGenerated'] = 'yes';
			}
			$text['showbilloption'] = 'yes';
			
			$doctoruserid = ORM::Factory('doctor')->where('id','=',$appointment->refappwithid_c)->find()->refdoctorsid_c;
			$doctoruser = ORM::factory('user')->where('id','=',$doctoruserid)->find();
			$text['drname'] = 'Dr. '.$doctoruser->Firstname_c.' '.$doctoruser->lastname_c;

			if($user->has('roles', ORM::factory('role', array('name' => 'doctor')))){
				if($doctorid == $appointment->refappwithid_c){
					$text['showbilloption'] = 'yes';
				}
				else{
					$text['showbilloption'] = 'no';
				}
				$patientuser = ORM::factory('user')->where('id','=',$appointment->refappfromid_c)->find();
				$text['replyto'] = $patientuser->Firstname_c.' '.$patientuser->lastname_c;
				$text['replytoid'] =$doctoruserid;
			}else{
				$text['replyto'] = 'Dr. '.$doctoruser->Firstname_c.' '.$doctoruser->lastname_c;
				$text['replytoid'] =$doctoruserid;
			}

			$date = new DateTime($appointment->displaytime_c);
			$text['date'] =  $date->format('d M Y');

			if ($user->has('roles', ORM::factory('role', array('name' => 'patient')))){
				$messages = ORM::factory('queries')->get_messages($appointment->id,$appointment->refappfromid_c);
				$text['messages'] = ($messages == '[]')?'':$messages;
			}	
			
			if ($user->has('roles', ORM::factory('role', array('name' => 'doctor')))){
				$messages = ORM::factory('queries')->get_messages($appointment->id,$doctoruserid);
				$text['messages'] = ($messages == '[]')?'':$messages;
			}	
			
			$incident = ORM::factory('incident')->where('id','=',$appointment->refincidentid_c)->find();
			$text['incidentid'] = $incident->id;
			$text['incidentname'] = $incident->incidentsname_c;
			
			$textcomplaintobj = ORM::factory('textcomplaint')->where('ref_app_id','=',$id)->find()->as_array();
			$text["maincomplaint"] = preg_replace('#<br\s*/?>#i', "\n", $textcomplaintobj["text"]);
			
			$textexaminationobj = ORM::factory('textexamination')->where('ref_app_id','=',$id)->where('visibility','in',$visibility)->find()->as_array();
			$text["examination"] =  json_decode($textexaminationobj["json"]);
			
			$textexaminationobj = ORM::factory('textexaminationsummary')->where('ref_app_id','=',$id)->where('visibility','in',$visibility)->find()->as_array();
			$text["examinationsummary"] = preg_replace('#<br\s*/?>#i', "\n", $textexaminationobj["text"]); 
			
			$textdiagnosisnoteobj = ORM::factory('textdiagnosisnote')->where('ref_app_id','=',$id)->find()->as_array();
			$text["diagnosis"] = preg_replace('#<br\s*/?>#i', "\n", $textdiagnosisnoteobj["text"]);
			

			
			$textinvestigationobj = ORM::factory('textinvestigation')->where('ref_app_id','=',$id)->find()->as_array();
			$text["investigation"] = str_replace('\\n',' \n', $textinvestigationobj["text"]);
	
			
			$textprescriptionobj = ORM::factory('textprescription')->where('ref_app_id','=',$id)->find()->as_array();
			$text["medicine"] = str_replace('\\n',' \n', $textprescriptionobj["text"]);
	
			$textreportobj = ORM::factory('textreportparameter')->where('ref_app_id','=',$id)->find()->as_array();
			$text["reportparameter"] =  $textreportobj["text"];

			$textfollowupobj = ORM::factory('textfollowupnote')->where('ref_app_id','=',$id)->find()->as_array();
			$text["followup"] = $textfollowupobj["text"] == null? '':$textfollowupobj["text"];
			
			$text['status'] = $appointment->status_c;
            $prescriptionpath = ORM::factory('patientprescriptionsnapshot')->where('refappointmentidforprescriptionsnapshots_c','=',$appointment->id)->find()->pdfpath_c;
            $text['prescription'] = ($prescriptionpath == null)?'Informationnotyetfilled':$prescriptionpath;
            
			$reports = ORM::factory('patienttestreport')->where('refappointmentid_c','=',$appointment->id)->find_all();
			$file_paths=array();
			foreach($reports as $report){
				$file = new helper_Files();
				$return = $file->getFilePath($report->fileid_c);
				if($return != ''){
					$patientparameters=ORM::factory('patientparameter')->where('refpatienttestreportid_c','=',$report->id)->find_all();
					$array_para=array();
					if(count($patientparameters)>0){
						foreach($patientparameters as $patientparameter){
							$testparameter=ORM::factory('testparameter')->where('id','=',$patientparameter->reftestparameterid_c)->find();
							$paradata['parametername']=$testparameter->parametername_c;
							$unitsmaster=ORM::factory('unitsmaster')->where('id','=',$patientparameter->refunitid_c)->find();
							if($unitsmaster->unitname_c=='N/A' || $unitsmaster->unitname_c=='Other'){
								$paradata['parametervalue']=$patientparameter->value_c;
							}
							else{
								$paradata['parametervalue']=$patientparameter->value_c.' ('.$unitsmaster->unitname_c .')';
							}
							array_push($array_para,$paradata);
						}
					}
					array_push($file_paths,array("path"=>$return['abspath'],"Parameters"=>$array_para));
				}
			}
			$text['report'] = ($file_paths == null)?'Informationnotyetfilled':$file_paths;

			array_push($arr_appointments, $text);

		$pastdata['data'] = $arr_appointments;
	    $pastdata = json_encode($pastdata);
	    die($pastdata);
	}
	
	public function action_endConsultationWithoutTransfer(){
		try{
			$session = Session::instance();
			$session->set('endconsultation', true);
			if(!(isset($_POST['appid']))){
				return('error');
			}
			$appid = $_POST['appid'];
			$this->saveparameter($_POST);
			$this->saveAppointmentData($_POST);

			//$pdfPath = $this->generateAppointmentSummary($appid);
			$this->endConsultationInDatabase($appid);
			die('success');	
		}
		catch(Exception $e){throw new Exception($e);}
	}
	
		public function action_AutosaveConsultationData(){
		try{
			if(!(isset($_POST['appid']))){
				return('error');
			}
			$session = Session::instance();
			$endflag=$session->get('endconsultation');
			$appid = $_POST['appid'];
			if($endflag == false){
				$obj=ORM::factory('appointment')->where('id','=',$appid)->mustFind();
				$obj->refappointmentstatusesid_c=6;
				$obj->endconsultdate_c = date('Y-m-d g:i:s a'); // Set endconsultation date
				$obj->save();
				$this->saveAppointmentData($_POST);
			}			

			//$pdfPath = $this->generateAppointmentSummary($appid);
			die('success');	
		}
		catch(Exception $e){throw new Exception($e);}
	}
	
	public function action_AutosaveonlyConsultationData(){
		try{
			if(!(isset($_POST['appid']))){
				return('error');
			}
			$session = Session::instance();
			$session->set('endconsultation', false);
			$endflag=$session->get('endconsultation');
			var_dump($endflag);
			$appid = $_POST['appid'];
			if($endflag == false){
				$obj=ORM::factory('appointment')->where('id','=',$appid)->mustFind();
				var_dump($obj);
				$obj->refappointmentstatusesid_c = 6;
				$obj->save();
				//var_dump("I am in action_AutosaveConsultationData");
			$this->saveAppointmentData($_POST);
			}			
			//$pdfPath = $this->generateAppointmentSummary($appid);
			die('success');	
		}
		catch(Exception $e){throw new Exception($e);}
	}
	
	public function action_endConsultationWithTransfer(){
		try{
			if(!(isset($_POST['appid']))){
				return('error');
			}
		
		if(!(isset($_POST['transferto']))){
				return('error');
			}
			$transferto = $_POST['transferto'];
			$appid = $_POST['appid'];
			$objApp = ORM::factory('appointment')->where('id','=',$appid)->find();
			if($objApp->refappointmentstatusesid_c == 2){
				$this->saveAppointmentData($_POST);
				$this->saveparameter($_POST);

				$pdfPath = $this->generateAppointmentSummary($appid);
				$this->finalTransfer($appid, $transferto);
				$this->endConsultationInDatabase($appid);
				die($pdfPath);
			}else{
				die('Appointment is ended already.');
			}
		}
		catch(Exception $e){throw new Exception($e);}
	}
	
	public function action_endAppWithTransferByStaff(){
		try{
			if(!(isset($_GET['endappid']))){
				echo 'error';
				die;
			}
			$transferto = 'doctor';
			$appid = $_GET['endappid'];
			$this->finalTransfer($appid, $transferto);
			$objApp = ORM::factory('appointment')->where('id','=',$appid)->mustFind();
			if($objApp->refappointmentstatusesid_c != 1){
				$this->endConsultationInDatabase($appid,6);
			}else{
				$this->endConsultationInDatabase($appid);
			}
			die();	
		}
		catch(Exception $e){
			var_dump($e);
			die;
		throw new Exception($e);}
	}
	
	public function action_endAppWithoutTransferByStaff(){
		try{
			if(!(isset($_GET['endappid']))){
				echo 'error';
				die;
			}
			$transferto = 'doctor';
			$appid = $_GET['endappid'];
			$objApp = ORM::factory('appointment')->where('id','=',$appid)->mustFind();
			if($objApp->refappointmentstatusesid_c != 1){
				$this->endConsultationInDatabase($appid,6);
			}else{
				$this->endConsultationInDatabase($appid);
			}
			die();	
		}
		catch(Exception $e){
			var_dump($e);
			die;
		throw new Exception($e);}
	}
	
	public function action_getDrugInfo(){
		try{
			$info = array();
			$drugName = urldecode($_GET['drug']);
			$drugName = str_replace('--','+',$drugName);
			$drugObj = ORM::factory('drug')->where('drugname','=',$drugName)->where('active_c','=','1')->find();
			$info['Drug Name'] = $drugName;
			$info['Generic Name'] = $drugObj->drugGenericName_c;
			$info['Other Brands'] = "";
			$info['Contraindications'] = $drugObj->cautions_c;
			$info['Side Effects'] = $drugObj->sideEffects_c;
			if($drugObj->drugGenericName_c != null || $drugObj->drugGenericName_c != "" )
			{
				$otherBrands = ORM::factory('drugmaster')->where('drugGenericName_c','=',$drugObj->drugGenericName_c)->find_all();
				foreach($otherBrands as $otherBrand){
					$info['Other Brands'] = $info['Other Brands'] . $otherBrand->DrugName_c . ', ';
				}
			}
			die(json_encode($info));
		}
		catch(Exception $e){throw New Exception($e);}
	}

	public function action_getTestInfo(){
		try{
			$info = array();
			$testName = $_GET['testName'];

			$testObj = ORM::factory('investigation')->where('active_c','=',1)->where('testname_c','=',$testName)->find();
			$info['Test Name'] = $testName;
			$info['Remarks'] = $testObj->remark_c;
			$info['Sample'] = $testObj->sample_c;
			$info['Precaution'] = $testObj->precaution_c;
			$info['Alias Names'] = $testObj->alaises;
			$info['Parametername'] = $testObj->parametername;
			die(json_encode($info));
		}
		catch(Exception $e){throw New Exception($e);}
	}

	public function action_getSearchResults(){
		try{
			$query = ($_GET['query']);
			$query = '%'.$query.'%';
			$allDrugs = ORM::factory('drugmaster')->where('drugGenericName_c','like',$query)->find_all();
			$result = array();
			foreach($allDrugs as $drug){
				$drugInfo = array();
				$drugInfo['drugform'] = ORM::factory('drugformmaster')->where('id','=',$drug->drugForm_c)->find()->drugform_c;
				$drugInfo['drugformid'] = $drug->drugForm_c;
				$drugInfo['drugName'] = $drug->DrugName_c;
				$drugInfo['drugGenericName'] = $drug->drugGenericName_c;
				$drugInfo['drugStrength'] = $drug->drugStrength_c;
				$drugInfo['drugManufacturer'] = $drug->drugManufacturer_c;
				array_push($result, $drugInfo);
			}
			die(json_encode($result));
		}
		catch(Exception $e){throw new Exception($e);}
	}

	private function endConsultationInDatabase($intAppId, $statusid=null){
		$user = Auth::instance()->get_user();
		$objOrm=ORM::factory('Appointment')->where('id','=',$intAppId);
		$objOrm->find();
		$objOrm->refappointmentstatusesid_c = 1;
		$objOrm->endconsultdate_c = date('Y-m-d g:i:s a');			//For storing Endconsultation Date This line added by Ravi 21/1/2016
		$objOrm->update();
		$var = xmpp::sendMessage($user->id,$user->xmpppassword_c,$user->id,'pullgriddata');
		
		
		
		// Placing automatic orders to chemist and pahtologist
		$patient = ORM::factory('patient')->where('repatientsuserid_c','=',$objOrm->refappfromid_c)->find();
			
			
		if($patient->allowedtoplacemedicineorder_c == 1){
			$prescriptions = ORM::factory('prescription')->where('refprescriptionsappoitmentid_c','=',$intAppId)->find_all();
			
			$favChemist = ORM::factory('favoritechemistbypatient')->where('reffavchembypatpatientid_c','=',$patient->id)
						->where('prefered_c','=',0)->find();
		
			$chemist = array();		
			foreach($prescriptions as $prescription){
				$prescriptiondetail = ORM::factory('prescriptiondetail')->where('refpdetailsprescriptionsid_c','=',$prescription->id)->find();
				$temp = array();
				$temp[0]= $prescriptiondetail->refpdetailsdrugid_c;
				$temp[1]= " ";
				$temp[2]= $favChemist->reffavchembypatchemistsid_c;
				array_push($chemist,$temp);
			}
			$orders = new helper_Orders();
			$orders->placemedicineorder($chemist,$intAppId);
		}
		
		$patient = ORM::factory('patient')->where('repatientsuserid_c','=',$objOrm->refappfromid_c)->find();
		if($patient->allowedtoplacepathorder_c == 1){
			$favLabs = ORM::factory('favoritepathologistbypatient')->where('reffavpathopatientsid_c','=',$patient->id)->order_by('prefered_c','asc')
						->find_all();
				//var_dump(count($favLabs));
			if(count($favLabs) > 0){
				$orders = new helper_Orders();
				$temp = 0;
				$pathologistsid = array();
				foreach($favLabs as $favLab){
					$pathologistsid[$temp] = $favLab->reffavpathopathologistsid_c;
					$temp=$temp + 1;
				}
				$orders->splittestorderfromappid($pathologistsid,$intAppId);
			}
		}
	}
	
	private function updateSession($appid, $user){
		$status = array (
		    "waiting"  => array("away" => "wait", "aborted" => "wait", "waiting" => "consult", "consulting"=> "consult"),
		    "away" => array("waiting" => "wait"),
			"aborted" => array("waiting" => "wait", "consulting" => "alertabort", "aborted" => ""),
			"consulting" =>array("waiting" => "consult", "aborted" => "alertabort", "consulting" => "")
		);
		$objConsultationSession = ORM::factory('consultationsession')->where('refappid_c', '=', $appid)->mustFind();
		$docStatus = $objConsultationSession->dstatus_c;
		$patStatus = $objConsultationSession->pstatus_c;
		$objAppointmentInfo = ORM::factory('doctorappointment')->where('appointment_id','=',$appid)->find();
		switch($status[$patStatus][$docStatus]){
			case "wait":
				$var = xmpp::sendMessage($user->id,$user->xmpppassword_c,$user->id,'Wait');
				break;
			case "consult":
				$objConsultationSession->dstatus_c = "consulting";
				$objConsultationSession->pstatus_c = "consulting";
				$objConsultationSession->update();
				$var = xmpp::sendMessage($user->id,$user->xmpppassword_c,$objAppointmentInfo->refappfromid_c,'Consult');
				$var = xmpp::sendMessage($user->id,$user->xmpppassword_c,$objAppointmentInfo->doctorid,'Consult');
				break;
			case "alertabort":
				$var = xmpp::sendMessage($user->id,$user->xmpppassword_c,$objAppointmentInfo->refappfromid_c,'Aborted');
				$var = xmpp::sendMessage($user->id,$user->xmpppassword_c,$objAppointmentInfo->doctorid,'Aborted');
				break;
		}
		return($status[$patStatus][$docStatus]);
	}

	private function saveprescription($intAppId, $strIds){
		try{
			$columns=7;
			$ids = json_decode($strIds);
			$objPres=ORM::factory('mprescription')->where('refprescriptionsappoitmentid_c','=',$intAppId)->find_all();
			foreach($objPres as $pres){
				$objOrm=ORM::factory('Appointmentprescription')->where('refpdetailsprescriptionsid_c','=',$pres->id);
				$prescriptions = $objOrm->find_all();
				foreach ($prescriptions as $orm){
					$orm->delete();
				}
			}
			foreach ($objPres as $pres){
				$pres->delete();
			}
			
			$section = ORM::factory("textprescription")->where('ref_app_id','=',$intAppId)->find();
			if($section->id != NULL){
				$section->delete();
			}
			//save appointment id in prescriptions table
			for($i=0;$i< count($ids);$i++){
				$drugName = json_decode($ids[$i])->drugname;
				$drugDosage = json_decode($ids[$i])->frequency;
				$drugFreq = json_decode($ids[$i])->frequency;
				$drugDuration = json_decode($ids[$i])->days;
				$drugInstruction = json_decode($ids[$i])->instruction;
				
				$section = ORM::factory("textprescription")->where('ref_app_id','=',$intAppId)->find();
				if($section->id == NULL){
					$section->ref_app_id = $intAppId;
					$section->text = $drugName.'     '.$drugDosage.'     '.$drugDuration.'     '.$drugInstruction;
					$section->visibility = true;
					$section->save();
				}
				else{
					$section->text = $section->text."\n".$drugName.'     '.$drugDosage.'     '.$drugDuration.'     '.$drugInstruction;
					$section->visibility = true;
					$section->update();
				}
				
				if($drugName != ""){
					$objPres = ORM::factory('mprescription');
					$objPres->refprescriptionsappoitmentid_c =$intAppId;
					$objPres->save();
                     
					$drugs = ORM::factory('drug')->where('drugname','=',$drugName)->where('active_c','=','1')->find();
					$drugId = $drugs->id;
					
					$drugType = $drugs->drugform;
					if($drugId != NULL){
						// add records in prescriptiondetails table
						$objOrm = ORM::factory('Appointmentprescription');
						$objOrm->refpdetailsprescriptionsid_c =$objPres->id;
						$objOrm->refpdetailsdrugid_c =$drugId;
						$objOrm->drugtype_c = $drugType;
						$objOrm->dosage_c = $drugFreq;
						$objOrm->quantity_c = $drugDuration;
						$objOrm->drugperiod_c=$drugInstruction;
						$objOrm->save();
					}
                    else{
						
						$drugs = ORM::factory('inactivedrug')->where('drugname_c','=',$drugName)->find();
						$drugId = $drugs->id;
					
							if($drugId != NULL){
								
								// add records in prescriptiondetails table
								$objOrm = ORM::factory('Appointmentprescription');
								$objOrm->refpdetailsprescriptionsid_c =$objPres->id;
								$objOrm->refpdetailsdrugid_c =$drugId;
								$objOrm->drugtype_c = $drugType;
								$objOrm->dosage_c = $drugFreq;
								$objOrm->quantity_c = $drugDuration;
								$objOrm->drugperiod_c=$drugInstruction;
								$objOrm->save();
							
							}
							else{
									//save recommended tests against appointment id if test is not present in drugmaster
									$objdrug = ORM::factory('Mdrug');
									$objdrug->DrugName_c = $drugName;
									$objdrug->save();
									
									$drugs = ORM::factory('inactivedrug')->where('drugname_c','=',$drugName)->find();
									$drugId = $drugs->id;
					
									$objOrm = ORM::factory('Appointmentprescription');
									$objOrm->refpdetailsprescriptionsid_c =$objPres->id;
									$objOrm->refpdetailsdrugid_c =$drugId;
									$objOrm->drugtype_c = $drugType;
									$objOrm->dosage_c = $drugFreq;
									$objOrm->quantity_c = $drugDuration;
									$objOrm->drugperiod_c=$drugInstruction;
									$objOrm->save();
								}
					}
				}
			}
		}
		catch(Excception $e){throw new Exception($e);}
	}

	private function savetest($intAppId, $strIds){
		try{	
			$ids = json_decode($strIds);
			//delete all previous recommended tests.
			$objPastTests=ORM::factory('Appointmenttest')->where('refrecomtestappointmentsid_c','=',$intAppId);
			$tests  = $objPastTests->find_all();
			foreach ($tests as $objPastTest){
				$objPastTest->delete();
			}
			$arr_orders = array();
			
			$section = ORM::factory("textinvestigation")->where('ref_app_id','=',$intAppId)->find();
			if($section->id != NULL){
				$section->delete();
			}
			
			for($i=0;$i< count($ids);$i++){
                $testName = $ids[$i]->value;
				$investigations = ORM::factory('investigation')->where('testname_c','=',$testName)->find();
				$section = ORM::factory("textinvestigation")->where('ref_app_id','=',$intAppId)->find();
				if($section->id == NULL){
					$section->ref_app_id = $intAppId;
					$section->text = $testName;
					$section->visibility = true;
					$section->save();
				}
				else{
					$section->text = $section->text."\n".$testName;
					$section->visibility = true;
					$section->update();
				}
				
				if($testName != ""){
					$testSample = $investigations->sample_c;
					$testId = $investigations->id;
					if($testId != NULL){	
						$objOrm = ORM::factory('Appointmenttest');
						$objOrm->refrecomtestrecommtestid_c =$testId;
						$objOrm->refrecomtestappointmentsid_c =$intAppId;
						$testid= $objOrm->save(); //save recommended tests against appointment id
					}
					else{	
							$test = ORM::factory('inactivetest')->where('testname_c','=',$testName)->find();
							$tId = $test->id;
							if($tId != NULL){
								
								$objOrm = ORM::factory('Appointmenttest');
								$objOrm->refrecomtestrecommtestid_c =$tId;
								$objOrm->refrecomtestappointmentsid_c =$intAppId;
								$tId= $objOrm->save();
							}
							else{

								//save recommended tests against appointment id if test is not present in testmaster
								$objtest = ORM::factory('mtest');
								$objtest->testname_c =ucfirst($testName);
								$objtest->sample_c = ucfirst($testSample);
								$objtest->active_c = '-1';
								$objtest->reftestsubcategoryid_c = 1;
								$objtest->save();
								
								$objOrm = ORM::factory('Appointmenttest');
								$objOrm->refrecomtestrecommtestid_c = $objtest->id;
								$objOrm->refrecomtestappointmentsid_c =$intAppId;
								$tId= $objOrm->save();
							}
							//$objTest=ORM::factory('mtest')->where('testname_c','=',ucfirst($testName))->find();
							//$objOrm = ORM::factory('Appointmenttest');
							//$objOrm->refrecomtestrecommtestid_c =$objTest->id;
							//$objOrm->refrecomtestappointmentsid_c =$intAppId;
							//$testid= $objOrm->save();			
					}
					
					//Create an order number and save in recommended tests table
					/*$pathologistId = $ids[$i*$limit+3][1];
					if( $pathologistId != -1 ){
						$objOrm=ORM::factory('Appointmenttest')->where('id','=',$testid)->find() ;
						$objOrm->refrecomtestpathologists1id_c = $pathologistId;
						$testid= $objOrm->save();
						if(!isset($arr_orders[$pathologistId])){
							$objOrders = ORM::factory('Diagnosticlabsorder');
							$today = date('Y-m-d g:i:s a');
							$objOrders->orderdate_c = $today;
							$objOrders->status_c = 'suggested';
							$objOrders->refdiaglabsorderspathologistsid_c = $pathologistId;
							$objOrders->updatestatusdate_c = $today;
							//$objOrders->save();
							$orderid = $objOrders->id;
							$arr_orders[$pathologistId] = $orderid;
						}else{
							$orderid = $arr_orders[$pathologistId];
						}
						$objOrm = new Model_Appointmenttest;
						$objOrm->where('id', '=',$testid)->find();	
						//$objOrm->refrecomtestdiaglabsordersid_c = $orderid;
						$objOrm->save();
					}*/
				}
			}
		}
		catch(Exception $e){throw new Exception($e);}
	}
	
	private function finalTransfer($intAppId, $target){
		$arr_accounts = include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/config/accounts.php');
		$appointment = ORM::factory('appointment')->where('id','=',$intAppId)->find();
		$amount = $appointment->rate_c;
		$from = ORM::factory('billingaccount')->where('refaccountuserid_c','=',$arr_accounts['provisionaccountuserid'])->find()->accountcode_c;
		if($target == "doctor"){
			$doctorinfo = ORM::factory('doctor')->where('id','=',$appointment->refappwithid_c)->find();
			$to = ORM::factory('billingaccount')->where('refaccountuserid_c','=',$doctorinfo->refdoctorsid_c)->find()->accountcode_c;
		}
		elseif($target == "patient"){
			$to = ORM::factory('billingaccount')->where('refaccountuserid_c','=',$appointment->refappfromid_c)->find()->accountcode_c;
		}
		
		$planid = ORM::factory('billingindividualplan')->where('refusersid_c','=', $appointment->refappfromid_c)->where('status_c','=', 'active')->find()->refplanid_c;

		$result = transaction::transfer($from,$to,1,$amount,2);
		$return = transaction::savedetails($result,$planid,$amount,$appointment->refappfromid_c,orm::factory('doctor')->where('id','=',$appointment->refappwithid_c)->find()->refdoctorsid_c,0,0);
		$appointment->reftransactionid_c = $result['data']['cr_code'];
		transaction::saveBillNumber($to,$result['data']['cr_code']);
		$appointment->save();
		
		$to=ORM::factory('billingaccount')->where('refaccountuserid_c','=',$arr_accounts['ayushmanincomeuserid'])->find()->accountcode_c;
		$plan_id = ORM::factory('billingindividualplan')->where('refusersid_c','=',$appointment->refappfromid_c)->find()->refplanid_c;
		$notificationToDr= array();
		$notificationToDr['sms']='true';
		$notificationToPatient= array();
		$notificationToPatient['sms']='true';
		$obj_doctorUser =ORM::factory('user')->join('doctors')->on('user.id','=','doctors.refdoctorsid_c')->where('doctors.id','=',$appointment->refappwithid_c)->find();
		$obj_PatientUser =ORM::factory('user')->where('id','=',$appointment->refappfromid_c)->find();
		switch($appointment->consultationmode_c){
			case "Online": 	
							$amount = ORM::factory('billingplancharge')->where('ref_planid_c','=',$plan_id)->find()->usagechargesonline_c;
							$notificationToDr['template']='end_online_consultation_drmsg';
							$notificationToDr['id']=$obj_doctorUser->id;
							$notificationToDr['creditedamount']=$amount;
							$notificationToDr['username']=$obj_PatientUser->Firstname_c;
							$notificationToPatient['template']='end_consultation';
							$notificationToPatient['id']=$appointment->refappfromid_c;
							$notificationToPatient['drname']=trim($obj_doctorUser->Firstname_c)." ".trim($obj_doctorUser->lastname_c) ;
							$notificationToPatient['debitedamount']=$amount;
							break;
			case "In-Clinic": $amount = ORM::factory('billingplancharge')->where('ref_planid_c','=',$plan_id)->find()->usagechargesinclinic;
				break;
			case "phone": $amount = ORM::factory('billingplancharge')->where('ref_planid_c','=',$plan_id)->find()->usagechargesphone_c;
				break;
		}
		
		$array_taxes = Kohana::$config->load('taxes');
		$result = transaction::transfer($from,$to,1,$amount,10);
		$servicetaxresult = transaction::transfer($from,$to,1, ($amount * $array_taxes['servicetax'] / 100),20);

		switch($appointment->consultationmode_c){
			case "Online": $obj_billingaccountForDr =ORM::factory('billingaccount')->where('refaccountuserid_c','=',$obj_doctorUser->id)->find();
							$notificationToDr['currentbalance']=$obj_billingaccountForDr->netbalance_c;
							$obj_billingaccountForPat =ORM::factory('billingaccount')->where('refaccountuserid_c','=',$appointment->refappfromid_c)->find();
							$notificationToPatient['currentbalance']=$obj_billingaccountForPat->netbalance_c;
							helper_notificationsender::sendnotification($notificationToDr);
							helper_notificationsender::sendnotification($notificationToPatient);
							break;
			case "In-Clinic": $amount = ORM::factory('billingplancharge')->where('ref_planid_c','=',$plan_id)->find()->usagechargesinclinic;
				break;
			case "phone": $amount = ORM::factory('billingplancharge')->where('ref_planid_c','=',$plan_id)->find()->usagechargesphone_c;
				break;
		}
		return;
	}

	private function generateAppointmentSummary($appid){
		try{
			/*$datestring = htmlspecialchars(date ("dmYHis"), ENT_QUOTES);
			$pdfCreaterObj = new Cpdfcreater;
			$pdfpath = $pdfCreaterObj->createpdf($appid, $datestring);
			return($pdfpath);*/
		}
		catch(Exception $e){throw new Exception($e);}
	}

	public function action_test(){

		$jsontextexamination = '{"examinations-health-card":{"examinations-health-card_q_1":{"q":"    ? Height(cms)","a":"123"},"examinations-health-card_q_2":{"q":"    ? Weight(kg)","a":"65"}}}';
		$arrTextExamination = json_decode($jsontextexamination);
		
		$universalTracker = new helper_Universaltracker;
		$parameters = $universalTracker->getAllParameter();

		foreach($arrTextExamination as $exams){
			foreach($exams as $exam){
				$name = explode('(',str_replace('?','',trim($exam->q)) );
				foreach($parameters as $parameter){
					$p = strtolower(trim($parameter["parametername"]));
					$name1 = strtolower(trim($name[0])); 

					if($p == $name1){
						//$universalTracker->saveParameterValue($parameter->aliasto_c,$exam->a,);
					}
				}
			}
		}
		die;
	}
	
	private function saveAppointmentData(){
		try{
			var_dump($_POST);
			if(isset($_POST['hfvalue'])){
				unset($_POST['hfvalue']);
			}
			if(isset($_POST['transferto'])){
				unset($_POST['transferto']);
			}
			if(isset($_POST['check'])){
				$checkarray = $_POST['check'];
				unset ($_POST['check']);
			}
			if(isset($_POST['appid'])){
				$appid = $_POST['appid'];
				unset ($_POST['appid']);
			}
			if(isset($_POST['testIds'])){
				$testIds = $_POST['testIds'];
				unset ($_POST['testIds']);
				if($testIds != "{}")
					$this->savetest($appid, $testIds);	
			}
			$appointments = ORM::factory('appointment')->where('id','=',$appid)->find();
			$checkarray['textcomplaint'] = true;
			$checkarray['textdiagnosisnote'] = true;
			$checkarray['textexaminationsummary'] = ($_POST['check_examinationsummary'] == 'true') ?1:0;
			$checkarray['textexamination'] = ($_POST['check_examinations'] == 'true') ?1:0;
			
			if(isset($_POST['medicineIds'])){
				$medicineIds = $_POST['medicineIds'];
				unset ($_POST['medicineIds']);
				if($medicineIds != "{}")
					$this->saveprescription($appid, $medicineIds);
			}
			var_dump($_POST);
			if(isset($_POST['jsontextexamination'])){
				$jsontextexamination = $_POST['jsontextexamination'];
				unset ($_POST['jsontextexamination']);
				if($jsontextexamination != "{}"){
					$section = ORM::factory('textexamination')->where('ref_app_id','=',$appid)->find();
					
					//$jsontextexamination = '{"examinations-health-card":{"examinations-health-card_q_1":{"q":"    ? Height(cms)","a":"123"},"examinations-health-card_q_2":{"q":"    ? Weight(kg)","a":"65"}}}';
					/*$arrTextExamination = json_decode($jsontextexamination);
					
					$universalTracker = new helper_Universaltracker;
					$parameters = $universalTracker->getAllParameter();
					foreach($arrTextExamination as $exams){
						foreach($exams as $exam){
							if(isset($exam->q)){
								$name = explode('(',str_replace('','',trim($exam->q)) );
								foreach($parameters as $parameter){
									$p = strtolower(trim($parameter["parametername"]));
									$name1 = strtolower(trim($name[0])); 

									if($p == $name1){
										if(isset($parameter['id']) && (trim($parameter["parametername"]) != trim($parameter["loinccode"]))){
											echo 'not null ---- '.$name1;
											$universalTracker->saveParameterValue($parameter['id'],$exam->a,$appointments->refappfromid_c);
										}									
									}
								}
							}
							
						}
					} // Written in seperate function and called only on end consultation*/
					if($section->id == NULL){
						$section->ref_app_id = $appid;
						$section->json = $jsontextexamination;
						$section->visibility = $checkarray['textexamination'];
						$section->save();
					}
					else{
						$section->json = $jsontextexamination;
						$section->visibility = $checkarray['textexamination'];
						$section->update();
					}
				}
			}
			var_dump($_POST);
			while (list($var, $val) = each($_POST)) {
				if(!class_exists('Model_'.$var)){
					continue;
				}
				var_dump('Model_'.$var);
					
				$section = ORM::factory($var)->where('ref_app_id','=',$appid)->find();
				if($section->id == NULL){
					$section->ref_app_id = $appid;
					$section->text = $val;
					$section->visibility = isset($checkarray[$var])?$checkarray[$var]:true;
					if($var == "textreportparameter")
						$section->parameterdata = $_POST["parameterids"];
					$section->save();
				}
				else{
					$section->text = $val;
					if($var == "textreportparameter")
						$section->parameterdata = $_POST["parameterids"];
					$section->visibility = isset($checkarray[$var])?$checkarray[$var]:true;
					$section->update();
				}
				var_dump($val);
			}
		}
		catch(Exception $e){
			var_dump($e);
			die;
		throw new Exception($e);}
	}
	private function saveparameter(){
		try{
			//var_dump('i am in saveparameter');
			
			if(isset($_POST['hfvalue'])){
				unset($_POST['hfvalue']);
			}
			if(isset($_POST['transferto'])){
				unset($_POST['transferto']);
			}
			if(isset($_POST['check'])){
				$checkarray = $_POST['check'];
			}
			if(isset($_POST['appid'])){
				$appid = $_POST['appid'];	
			}
			
			$appointments = ORM::factory('appointment')->where('id','=',$appid)->find();
			$checkarray['textcomplaint'] = true;
			$checkarray['textdiagnosisnote'] = true;
			$checkarray['textexaminationsummary'] = ($_POST['check_examinationsummary'] == 'true') ?1:0;
			$checkarray['textexamination'] = ($_POST['check_examinations'] == 'true') ?1:0;
			
			if(isset($_POST['parameterids'])){
				$paramdata = explode(',', $_POST['parameterids']);
				// Each parameter data is seperated by ";"
				// data paraid:paravalue:paradate
				//-----------------------------------
				$universalTracker = new helper_Universaltracker;
				$noofparam = count($paramdata) - 1;
				var_dump($paramdata);
				var_dump($noofparam);
				for($i=0; $i<$noofparam; $i++)
				{
					$data = explode(':',$paramdata[$i]) ;
					$universalTracker->saveParameterValueWithDate($data[0],$data[1],$appointments->refappfromid_c,$data[2]);
				}
			}			
			
			if(isset($_POST['jsontextexamination'])){
			$jsontextexamination = $_POST['jsontextexamination'];
			unset ($_POST['jsontextexamination']);
				
				if($jsontextexamination != "{}"){
					$section = ORM::factory('textexamination')->where('ref_app_id','=',$appid)->find();
					
					//$jsontextexamination = '{"examinations-health-card":{"examinations-health-card_q_1":{"q":"    ? Height(cms)","a":"123"},"examinations-health-card_q_2":{"q":"    ? Weight(kg)","a":"65"}}}';
					
					$arrTextExamination = json_decode($jsontextexamination);
					var_dump($arrTextExamination);
					
					$universalTracker = new helper_Universaltracker;
					
					$parameters = $universalTracker->getAllParameter();
					
					foreach($arrTextExamination as $exams){
						
						foreach($exams as $exam){
							
							if(isset($exam->q)){
								$name = explode('(',str_replace('?','',trim($exam->q)) );
								
								foreach($parameters as $parameter){
									$p = strtolower(trim($parameter["parametername"]));
									
									$name1 = strtolower(trim($name[0])); 
									//var_dump($name);
									//var_dump($p);
									if($p == $name1){
										//if(isset($parameter['id']) && (trim($parameter["parametername"]) != trim($parameter["loinccode"]))&&(($parameter['isverified'])==1)){
										if(isset($parameter['id']) && (trim($parameter["parametername"]) != trim($parameter["loinccode"]))){
											echo 'not null ---- '.$name1;
											$universalTracker->saveParameterValue($parameter['id'],$exam->a,$appointments->refappfromid_c);
											
										}									
									 }
									
								}
							}
						}
					}
					//die;
					if($section->id == NULL){
						$section->ref_app_id = $appid;
						$section->json = $jsontextexamination;
						$section->visibility = $checkarray['textexamination'];
						$section->save();
					}
					else{
						$section->json = $jsontextexamination;
						$section->visibility = $checkarray['textexamination'];
						$section->update();
					}
				}
			}

			while (list($var, $val) = each($_POST)) {
				if(!class_exists('Model_'.$var)){
					continue;
				}
				$section = ORM::factory($var)->where('ref_app_id','=',$appid)->find();
				if($section->id == NULL){
					$section->ref_app_id = $appid;
					$section->text = $val;
					$section->visibility = isset($checkarray[$var])?$checkarray[$var]:true;
					$section->save();
				}
				else{
					$section->text = $val;
					$section->visibility = isset($checkarray[$var])?$checkarray[$var]:true;
					$section->update();
				}
			}
		}
		catch(Exception $e){
			var_dump($e);
			die;
		throw new Exception($e);}
	}

	public function action_deletePrescriptionTemplate(){
		try{
			$this->deletePrescriptionTemplate();
			die('success');
		}
		catch(Exception $e){throw new Exception($e);}
	}	
	private function deletePrescriptionTemplate(){
		try{

			$template = array();
			$appid = '';
			if(isset($_POST['appid'])){
				$appid = $_POST['appid'];
				unset ($_POST['appid']);
			}
			$templates['doctoruserid_c'] = ORM::factory('doctor')->where('id','=',ORM::factory('appointment')->where('id','=',$appid)->find()->refappwithid_c)->find()->refdoctorsid_c;
			$templates['name_c'] = $_GET['name'];
			$templatename = $_GET['name'];
			
			// Find if the record with the same name already exist then delete those records 
			// and insert new values
			
				$objExistTemplates=ORM::factory('prescriptiontemplate')
								->where('name_c','=',$templatename)
								->and_where('doctoruserid_c','=',$templates['doctoruserid_c']);
				foreach ($objExistTemplates->find_all() as $objExistTemplate){
					$objExistTemplate->delete();
					}
			}
		catch(Exception $e){throw new Exception($e);}
	}
	
	public function action_savePrescriptionTemplate(){
		try{
			$this->savePrescriptionTemplate();
			die('success');
		}
		catch(Exception $e){throw new Exception($e);}
	}	
	
	private function savePrescriptionTemplate(){
		try{

			$template = array();
			$appid = '';
			if(isset($_POST['appid'])){
				$appid = $_POST['appid'];
				unset ($_POST['appid']);
			}
			$templates['doctoruserid_c'] = ORM::factory('doctor')->where('id','=',ORM::factory('appointment')->where('id','=',$appid)->find()->refappwithid_c)->find()->refdoctorsid_c;
			if(isset($_POST['testIds'])){
				$testIds = $_POST['testIds'];
				$templates['investigations_c'] = $testIds;
				unset ($_POST['testIds']);
			}
			
			if(isset($_POST['medicineIds'])){
				//var_dump($_POST['medicineIds']);
				$medicineIds = $_POST['medicineIds'];
				$templates['medicines_c'] = $medicineIds;
				unset ($_POST['medicineIds']);
			}
			if(isset($_POST['textcomplaint'])){
				$textcomplaint = $_POST['textcomplaint'];
				$templates['symptoms_c'] = $textcomplaint;
				unset ($_POST['textcomplaint']);
			}
			if(isset($_POST['textfollowupnote'])){
				$textfollowupnote = $_POST['textfollowupnote'];
				$templates['followupadvice_c'] = $textfollowupnote;
				unset ($_POST['textfollowupnote']);
			}
			if(isset($_POST['textdiagnosisnote'])){
				$textdiagnosisnote = $_POST['textdiagnosisnote'];
				$templates['diagnosis_c'] = $textdiagnosisnote;
				unset ($_POST['textdiagnosisnote']);
			}
			$templates['name_c'] = $_GET['name'];
			$templatename = $_GET['name'];
			
			// Find if the record with the same name already exist then delete those records 
			// and insert new values
			
				$objExistTemplates=ORM::factory('prescriptiontemplate')
								->where('name_c','=',$templatename)
								->and_where('doctoruserid_c','=',$templates['doctoruserid_c']);
				foreach ($objExistTemplates->find_all() as $objExistTemplate){
					$objExistTemplate->delete();
					}
				$prescriptiontemplate = ORM::factory('prescriptiontemplate');
				$prescriptiontemplate->saveValues($templates);
			}
		catch(Exception $e){throw new Exception($e);}
	}
	public function action_loadPrescriptionTemplate(){
		try{
			$this->loadPrescriptionTemplate();
			die('success');
		}
		catch(Exception $e){throw new Exception($e);}
	}	
	
	private function loadPrescriptionTemplate(){
		try{

			$template = array();
			$id =$_GET['id'];
			$prescriptiontemplate = ORM::factory('prescriptiontemplate')->where('id','=',$id)->find()->as_array();
			die(json_encode($prescriptiontemplate));
		}
		catch(Exception $e){throw new Exception($e);}
	}
	
	public function action_getPastprescription(){
		try{
			$this->getPastprescription();
			
			die('success');
		}
		catch(Exception $e){throw new Exception($e);}
	}		
	private function getPastprescription(){
	  	try{
			$app_id=$_GET['id'];
	 
			$appointment = ORM::factory('appointment')->where('id','=',$app_id)->find();
	 
			$appointment = ORM::factory('appointment')->where('refappfromid_c','=',$appointment->refappfromid_c)->where('refappwithid_c','=',$appointment->refappwithid_c)->where('refappointmentstatusesid_c','=',1)->order_by('id','desc')->where('id','!=',$app_id)->limit(1)->find_all()->as_array();
			//var_dump($appointment);
			if(count($appointment) == 0){
				echo 'no  past data';die;
			}
			else{
				$appointment = array_pop($appointment);
				$id = $appointment->id;
				// var_dump($id);
				$text = array();
					
				$textcomplaintobj = ORM::factory('textcomplaint')->where('ref_app_id','=',$id)->find()->as_array();
				$text["maincomplaint"] = $textcomplaintobj["text"];
					
				$textexaminationobj = ORM::factory('textexamination')->where('ref_app_id','=',$id)->find()->as_array();
				$text["examination"] = $textexaminationobj["json"];
				$text["examination"] = json_decode($textexaminationobj["json"]);
						
				$textexaminationobj = ORM::factory('textexaminationsummary')->where('ref_app_id','=',$id)->find()->as_array();
				$text["examinationsummary"] = $textexaminationobj["text"];
					
				$textdiagnosisnoteobj = ORM::factory('textdiagnosisnote')->where('ref_app_id','=',$id)->find()->as_array();
				$text["diagnosis"] = $textdiagnosisnoteobj["text"];

				$textreportobj = ORM::factory('textreportparameter')->where('ref_app_id','=',$id)->find()->as_array();
				$text["reportparameter"] = $textreportobj["text"];
					
				/*$textinvestigationobj = ORM::factory('textinvestigation')->where('ref_app_id','=',$id)->find()->as_array();
				$text["investigation"] = str_replace('\\n',' \n', $textinvestigationobj["text"]);
				
				$textprescriptionobj = ORM::factory('textprescription')->where('ref_app_id','=',$id)->find()->as_array();
				//$text["medicine"] = str_replace('\\n',' \n', $textprescriptionobj["text"]);
				$text["medicine"]= json_encode( str_replace('\\n',' \n', $textprescriptionobj["text"]));*/

				$textfollowupobj = ORM::factory('textfollowupnote')->where('ref_app_id','=',$id)->find()->as_array();
				$text["followup"] = $textfollowupobj["text"];
					
				$prescription = array();
				$prescription_ids = ORM::factory('prescription')->where('refprescriptionsappoitmentid_c','=',$id)->find_all()->as_array();
				foreach($prescription_ids as $prescription_id){			
					$prescription_detail = ORM::factory('prescriptiondetail')->where('refpdetailsprescriptionsid_c','=',$prescription_id)->find();
					$medicine = array();
					$drugMasterObj = ORM::factory('drugmaster')->where('id','=',$prescription_detail->refpdetailsdrugid_c)->find();
					if ($prescription_detail->drugtype_c == null || $prescription_detail->drugtype_c =='')
					{
						$medicine[0]['value'] = strtoupper($drugMasterObj->DrugName_c);
					}
					else
					{
						$medicine[0]['value'] = $prescription_detail->drugtype_c.". ".strtoupper($drugMasterObj->DrugName_c);
					}
					
					$medicine[1]['value'] = $prescription_detail->dosage_c;
					$medicine[2]['value'] = $prescription_detail->quantity_c;
					$medicine[3]['value'] = $prescription_detail->drugperiod_c;
					array_push($prescription,$medicine);
					$text['medicine']=json_encode($prescription);								
				}
		
				$tests = array();
				$recommendedtests = ORM::factory('recommendedtest')->where('refrecomtestappointmentsid_c','=',$id)->find_all()->as_array();
				for($i=0;$i<count($recommendedtests);$i++){
					$test = array();
					$testMasterObj = ORM::factory('testmaster')->where('id','=',$recommendedtests[$i]->refrecomtestrecommtestid_c)->find();
					$test['value'] = $testMasterObj->testname_c." (sample : $testMasterObj->sample_c)";
					$test['id'] = $testMasterObj->id;
					array_push($tests,$test);
					$text['investigation']=json_encode($tests);
				}
				$prevdata = json_encode($text);
				die($prevdata);
			}
		}
		catch(Exception $e){throw new Exception($e);}
	}
		
	private function displayDoctorView($user, $intAppId, $name){
		$content 	= View::factory('vemrdashboard');
		$datestring = htmlspecialchars(date ("dmYHis"), ENT_QUOTES);
		$userid 	= $user->id;
		$objAppointmentInfo = new Model_Doctorappointment;
		$objAppointmentInfo = $objAppointmentInfo->where('appointment_id','=',$intAppId)->find();
		$appointment= ORM::factory('appointment')->where('id','=',$intAppId)->find();
		$mode 		= $appointment->consultationmode_c;
		$is_paid 	= $appointment->paid_c;
		$examinationViews	= array();
		$symptomaticViews	= array();
		$consultationViewObj = ORM::factory('consultationview')->where('refdoctorid_c','=',$appointment->refappwithid_c)->find();
		if(!($consultationViewObj->loaded())){
			$consultationViewObj = ORM::factory('consultationview')->where('refdoctorid_c','=','-1')->mustFind();
		}
		$examinationViewIds = $consultationViewObj->examinationviews;
		$symptomaticViewIds = $consultationViewObj->symptomaticviews;
		if($symptomaticViewIds != ""){
			$symptomaticViewIds = explode(',',$symptomaticViewIds);
			foreach($symptomaticViewIds as $symptomaticViewId){
				$symptomaticFormObj = ORM::factory('symptomaticform')->where('id','=',$symptomaticViewId)->mustFind();
				$symptomaticViews[$symptomaticFormObj->formlabel_c] = $symptomaticFormObj->formname_c;
			}
		}
		if($examinationViewIds != ""){
			$examinationViewIds = explode(',',$examinationViewIds);
			foreach($examinationViewIds as $examinationViewId){
				$examinationFormObj = ORM::factory('examinationform')->where('id','=',$examinationViewId)->mustFind();
				$examinationViews[$examinationFormObj->formlabel_c] = $examinationFormObj->formname_c;
			}
		}
		$objsDrugFormMaster = ORM::factory('drugformmaster')->find_all();
		$dosageSource;
		foreach($objsDrugFormMaster as $objDrugFormMaster)
		{
			$dosage  = $objDrugFormMaster->dosage_c;
			$dosage = explode(",", $dosage);
			$dosageSource[$objDrugFormMaster->drugform_c]=$dosage;
		}

		$content->bind('examinationViews', $examinationViews);
		$content->bind('dosageSource', $dosageSource);
		$content->bind('symptomaticViews', $symptomaticViews);
		$content->bind('appointmentinfo', $objAppointmentInfo);
		$content->bind('mode', $mode);
		$content->bind('userid', $userid);
		$content->bind('is_paid', $is_paid);
		$content->bind('name', $name);
		$content->bind('appid', $intAppId);
		$content->bind('timestamp', $datestring);
		$maximize = true;
		$this->template->breadcrumb = ">>Home";
		$this->template->content = $content;
		$this->template->user = $user;
		$this->template->urole = "doctor";
	}
	
	private function displayPatientView($user, $intAppId, $name){
		$content 	= View::factory('/vuser/vpatient/vpatientemr');
		$datestring = htmlspecialchars(date ("dmYHis"), ENT_QUOTES);
		$objAppointmentInfo = new Model_Doctorappointment;
		$objAppointmentInfo	= $objAppointmentInfo->where('appointment_id','=',$intAppId)->find();
		$appointment= ORM::factory('appointment')->where('id','=',$intAppId)->find();
		$mode		= $appointment->consultationmode_c;
		//Find doctor name/
		$objDoctor = new Model_Doctor;
		$objDoctor->where('id','=',$appointment->refappwithid_c)->find();
		$objUser = new Model_User;
		$objUser->where('id','=',$objDoctor->refdoctorsid_c)->find();
		$content->bind('name', $name);
		$content->bind('objDoctor', $objUser);
		$content->bind('appointmentinfo', $objAppointmentInfo);
		$content->bind('mode', $mode);
		$content->bind('appid', $intAppId);
		$content->bind('timestamp', $datestring);
		$maximize = true;
		$this->template->breadcrumb = ">>Home";
		$this->template->content = $content;
		$this->template->user = $user;
		$this->template->urole = "patient";
	}

	public function action_sendmessage(){
		if($_POST){
			$user = Auth::instance()->get_user();
			
			$queries = ORM::factory('queries');
			$queries->refappid_c 	= $_POST['appid'];
			$queries->query_c 		= $_POST['message'];
			$queries->sentby_c 		= $user->id;
			$queries->isread_c 		= 0;
			$queries->receivedby_c=$_POST['sendtoid'];

//			if($user->has('roles', ORM::factory('role', array('name' => 'doctor')))){
//				$queries->receivedby_c 		= ORM::factory('appointment')->where('id','=',$_POST['appid'])->find()->refappfromid_c;
//			}else{
//				$queries->receivedby_c = ORM::factory('doctor')->where('id','=',ORM::factory('appointment')->where('id','=',$_POST['appid'])->find()->refappwithid_c)->find()->refdoctorsid_c;
//			}

		$var = xmpp::sendMessage($user->id,$user->xmpppassword_c,$queries->receivedby_c,'Query');
			$queries->save();			
			echo 'done'; die;
		}else{	
			echo 'Access Denied';die;
		}
	}
	public function action_getmessages(){
		$user = Auth::instance()->get_user();
		$queries = ORM::factory('queries')->get_receivedmessages($user->id);
		$messages['unreadmessages'] = ORM::factory('queries')->get_unreadmessagecount($user->id);
		$messages['messages'] = $queries;
		$messages = json_encode($messages);
		echo $messages;die;
	}
	
	public function action_readMessage(){
		if($_POST){
			$queries = ORM::factory('queries')->where('id','=',$_POST['appid'])->find();
			$queries->isread_c = 1;
			$queries->save();			
			echo 'done'; die;
		}else{	
			echo 'Access Denied';die;
		}
	}
	
	public function action_deleteUploadedPres(){
		try{
			if(!(isset($_GET['appid']))){
				echo 'Error'; die;
			}
			$appid = $_GET['appid'];
			$objAppointment = ORM::factory("appointment")->where("id","=",$appid)->find();
			$objAppointment->refappointmentstatusesid_c = 7;  // Mark record as deleted
			$objAppointment->save();
			echo 'Success';
			die ;
		}
		catch(Exception $e){throw new Exception($e);}
	}
	public function action_deleteUploadedReport(){
		try{
			if(!(isset($_GET['reportid']))){
				echo 'Error'; die;
			}
			$reportid = $_GET['reportid'];
			$objReport = ORM::factory("patienttestreport")->where("id","=",$reportid)->find();
			if($objReport->id != null)
			{
				$objReport->active_c = 0;
				$objReport->save();
			}
			echo 'Success';
			die ;
		}
		catch(Exception $e){throw new Exception($e);}
	}
	public function action_saveIncidence(){
		try{
			if(!(isset($_GET['reportid']))){
				echo 'Error'; die;
			}
			if(!(isset($_GET['incidence']))){
				echo 'Error'; die;
			}
			$reportid = $_GET['reportid'];
			$incidenceValue = $_GET['incidence'];
			$objInc = ORM::factory("incident")->where("incidentsname_c","=",$incidenceValue)->find();
			if($objInc->id == null)
			{
				// If incidence not defined in master  then record it
				$objInc->incidentsname_c = $incidenceValue;
				$objInc->save();
			}
			$objReport = ORM::factory("patienttestreport")->where("id","=",$reportid)->find()->as_array();
			if($objReport['id'] != null)
			{
				$param = json_decode($objReport['testparameters'],true);
				var_dump($param);
				$param['incident']= $incidenceValue;
				$objReport['testparameters'] = json_encode($param);
				var_dump($objReport['testparameters']);
				$objReportSave = ORM::factory("patienttestreport")->where("id","=",$reportid)->find();
				{
					$objReportSave->testparameters = $objReport['testparameters'];
					$objReportSave->save();
				}
			}
			echo 'Success';
			die ;
		}
		catch(Exception $e){throw new Exception($e);}
	}
	public function action_saveIncidencePresc(){
		try{
			if(!(isset($_GET['appid']))){
				echo 'Error'; die;
			}
			if(!(isset($_GET['incidence']))){
				echo 'Error'; die;
			}
			$appid = $_GET['appid'];
			$incidenceValue = $_GET['incidence'];
			$objInc = ORM::factory("incident")->where("incidentsname_c","=",$incidenceValue)->find();
			if($objInc->id == null)
			{
				// If incidence not defined in master  then record it
				$objInc->incidentsname_c = $incidenceValue;
				$objInc->save();
			}
			$objApp = ORM::factory("appointment")->where("id","=",$appid)->find();
			if($objApp->id != null)
			{
				$objApp->refincidentid_c = $objInc->id;
				$objApp->save();
			}
			echo 'Success';
			die ;
		}
		catch(Exception $e){throw new Exception($e);}
	}
}

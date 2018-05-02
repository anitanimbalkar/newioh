<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/xmpp.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/notificationsender.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/controller/cpdfcreater.php');

class Controller_Cemrdashboard extends Controller_Ctemplatewithmenu {
	
	public function action_view(){
		$appid=$_GET['appid'];
		$name = $_GET['name'];
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
		$appointment = ORM::factory('appointment')->where('id','=',$intAppId)->find();
		$appointment = ORM::factory('appointment')->where('refappfromid_c','=',$appointment->refappfromid_c)->where('refappwithid_c','=',$appointment->refappwithid_c)->where('refappointmentstatusesid_c','=',1)->where('refincidentid_c','=',$appointment->refincidentid_c)->order_by('scheduledstarttime_c')->find_all()->as_array();
		$result=$appointment[sizeof($appointment)-1];
		$id=$result->id;
		//get prescription id
		$prescription = array();
		$prescription_ids = ORM::factory('prescription')->where('refprescriptionsappoitmentid_c','=',$id)->find_all()->as_array();
		foreach($prescription_ids as $prescription_id){
			$prescription_detail = ORM::factory('prescriptiondetail')->where('refpdetailsprescriptionsid_c','=',$prescription_id)->find();
			$medicine = array();
			$drugMasterObj = ORM::factory('drugmaster')->where('id','=',$prescription_detail->refpdetailsdrugid_c)->find();
			$medicine['0'] = ORM::factory('drugformmaster')->where('id','=',$drugMasterObj->drugForm_c)->find()->drugform_c;
			$medicine['1'] = $drugMasterObj->drugForm_c;
			$medicine['2'] = $drugMasterObj->DrugName_c;
			$medicine['3'] = $prescription_detail->refpdetailsdrugid_c;
			$medicine['4'] = $drugMasterObj->drugStrength_c;
			$medicine['5'] = NULL;
			$medicine['6'] =  $prescription_detail->drugtype_c;
			$medicine['7'] = NULL;
			$medicine['8'] = $prescription_detail->dosage_c;
			$medicine['9'] = NULL;
			$medicine['10'] = $prescription_detail->quantity_c;
			$medicine['11'] = NULL;
			$medicine['12'] = $prescription_detail->drugperiod_c;
			$medicine['13'] = NULL;
			array_push($prescription,$medicine);
		}
		die(json_encode($prescription));
	}
	
	public function action_getPastTests(){
		$intAppId=$_GET['appid'];
		$appointment = ORM::factory('appointment')->where('id','=',$intAppId)->find();
		$appointment = ORM::factory('appointment')->where('refappfromid_c','=',$appointment->refappfromid_c)->where('refappwithid_c','=',$appointment->refappwithid_c)->where('refappointmentstatusesid_c','=',1)->where('refincidentid_c','=',$appointment->refincidentid_c)->order_by('scheduledstarttime_c')->find_all()->as_array();
		$result=$appointment[sizeof($appointment)-1];
		$id=$result->id;
		$tests = array();
		$recommendedtests = ORM::factory('recommendedtest')->where('refrecomtestappointmentsid_c','=',$id)->find_all()->as_array();
		for($i=0;$i<count($recommendedtests);$i++){
			$test = array();
			$testMasterObj = ORM::factory('testmaster')->where('id','=',$recommendedtests[$i]->refrecomtestrecommtestid_c)->find();
			$test['0'] = ORM::factory('testsubcategorymaster')->where('id','=',$testMasterObj->reftestsubcategoryid_c)->find()->testsubcategoryname_c;
			$test['1'] = $testMasterObj->reftestsubcategoryid_c;
			$test['2'] = $testMasterObj->testname_c;
			$test['3'] = $testMasterObj->id;
			$test['4'] = $testMasterObj->sample_c;
			$test['5'] = NULL;
			$test['6'] = ORM::factory('pathologist')->where('id','=',$recommendedtests[$i]->refrecomtestpathologists1id_c)->find()->nameofcenter_c;
			$test['7'] = $recommendedtests[$i]->refrecomtestpathologists1id_c;
			$tests[$i] = $test;	
		}
		die(json_encode($tests));
	}	

	public function action_saveAppointmentData(){
		try{
			$this->saveAppointmentData();
			die('success');
		}
		catch(Exception $e){throw new Exception($e);}
	}	
	
	public function action_getdata(){
		$id=$_GET['appid'];
		$text = array();
		$textcomplaintobj = ORM::factory('textcomplaint')->where('ref_app_id','=',$id)->where('visibility','=',1)->find()->as_array();
		if($textcomplaintobj["visibility"] = 1)
			$text["maincomplaint"] = $textcomplaintobj["text"];
		$textvitalobj = ORM::factory('textvital')->where('ref_app_id','=',$id)->where('visibility','=',1)->find()->as_array();
		if($textvitalobj["visibility"] = 1)
			$text["vitalsigns"] = $textvitalobj["text"];
		$textsymptomobj = ORM::factory('textsymptom')->where('ref_app_id','=',$id)->where('visibility','=',1)->find()->as_array();
		if($textsymptomobj["visibilty"] = 1)
			$text["symptomaticreview"] = $textsymptomobj["text"];
		$textexaminationobj = ORM::factory('textexamination')->where('ref_app_id','=',$id)->where('visibility','in',array(1,0))->find()->as_array();
		//$text["examinations"] = $textexaminationobj["text"];

		$arr = json_decode($textexaminationobj["json"], true); //i prefer associative array in this context
		
		//var_dump($arr);die;
		$text["examinations"]  =  "<table>";
		foreach($arr as $k=>$v){
			$text["examinations"] = $text["examinations"]."<tr><td class='bodytext_bold' valign='top'>".ucwords($k)."</td><td><table>";
			foreach($v as $itemkey=>$itemVal){
				//var_dump($itemVal['q']);die;
				$text["examinations"] = $text["examinations"] .'<tr>';
				 $text["examinations"] = $text["examinations"] . '<td class="bodytext_normal">
							<p style="white-space: pre-line;">'.$itemVal['q'].' - '.$itemVal['a'].'</p>
						</td>';
				$text["examinations"] = $text["examinations"] .'</tr>';
			}
			$text["examinations"] = $text["examinations"]."</table></td></tr>";
		}
		$text["examinations"] = $text["examinations"] . "</table>";
			
		$textdiagnosisnoteobj = ORM::factory('textdiagnosisnote')->where('ref_app_id','=',$id)->where('visibility','=',1)->find()->as_array();
		if($textdiagnosisnoteobj["visibility"] = 1)
			$text["diagnosis"] = $textdiagnosisnoteobj["text"];
		$textinvestigationobj = ORM::factory('textinvestigation')->where('ref_app_id','=',$id)->where('visibility','=',1)->find()->as_array();
		if($textinvestigationobj["visibility"] =1)
			$text["investigation"] = $textinvestigationobj["text"];
		$textprescriptionobj = ORM::factory('textprescription')->where('ref_app_id','=',$id)->where('visibility','=',1)->find()->as_array();
		if($textprescriptionobj["visibilty"] = 1)
			$text["medicine"] = $textprescriptionobj["text"];
		$textfollowupnoteobj = ORM::factory('textfollowupnote')->where('ref_app_id','=',$id)->where('visibility','=',1)->find()->as_array();
		if($textfollowupnoteobj["visibilty"] = 1)
			$text["followup"] = $textfollowupnoteobj["text"];
		$textsummaryynoteobj = ORM::factory('textsummarynote')->where('ref_app_id','=',$id)->where('visibility','=',1)->find()->as_array();
		if($textsummaryynoteobj["visibility"] = 1)
			$text["summary"] = $textsummaryynoteobj["text"];
		$pastdata = json_encode($text);
		die($pastdata);
	}
	
	public function action_endConsultationWithoutTransfer(){
		try{
			if(!(isset($_POST['appid']))){
				return('error');
			}
			$appid = $_POST['appid'];
			$this->saveAppointmentData($_POST);
			$pdfPath = $this->generateAppointmentSummary($appid);
			$this->endConsultationInDatabase($appid);
			die($pdfPath);	
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
			$this->saveAppointmentData($_POST);
			$pdfPath = $this->generateAppointmentSummary($appid);
			$this->finalTransfer($appid, $transferto);
			$this->endConsultationInDatabase($appid);
			die($pdfPath);	
		}
		catch(Exception $e){throw new Exception($e);}
	}
	
	public function action_getDrugInfo(){
		try{
			$info = array();
			$drugType = $_GET['drugType'];
			$drugName = $_GET['drugName'];
			$drugStrength = $_GET['drugStrength'];
			$drugObj = ORM::factory('drugmaster')->where('active_c','=',1)->where('DrugName_c','=',$drugName)->find();
			$info['Drug Name'] = $drugName;
			$info['Generic Name'] = $drugObj->drugGenericName_c;
			$info['Other Brands'] = "";
			$info['Contraindications'] = $drugObj->cautions_c;
			$info['Side Effects'] = $drugObj->sideEffects_c;
			$otherBrands = ORM::factory('drugmaster')->where('drugGenericName_c','=',$drugObj->drugGenericName_c)->find_all();
			foreach($otherBrands as $otherBrand){
				$info['Other Brands'] = $info['Other Brands'] . $otherBrand->DrugName_c . ', ';
			}
			die(json_encode($info));
		}
		catch(Exception $e){throw New Exception($e);}
	}

	public function action_getTestInfo(){
		try{
			$info = array();
			$testName = $_GET['testName'];
			$testSample = $_GET['testSample'];
			$testObj = ORM::factory('testmaster')->where('active_c','=',1)->where('testname_c','=',$testName)->where('sample_c','=',$testSample)->find();
			$info['Test Name'] = $testName;
			$info['Remarks'] = $testObj->remark_c;
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

	private function endConsultationInDatabase($intAppId){
		$objOrm=ORM::factory('Appointment')->where('id','=',$intAppId);
		$objOrm->find();
		$objOrm->refappointmentstatusesid_c = 1;
		$objOrm->update();
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
				foreach ($objOrm->find_all() as $orm){
					$orm->delete();
				}
			}
			foreach ($objPres as $pres){
				$pres->delete();
			}
			//save appointment id in prescriptions table
			for($i=0;$i< count($ids);$i++){
				$drugName = json_decode($ids[$i])->drugname;
				$drugDosage = json_decode($ids[$i])->frequency;
				$drugFreq = json_decode($ids[$i])->frequency;
				$drugDuration = json_decode($ids[$i])->days;
				$drugInstruction = json_decode($ids[$i])->instruction;
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
						$objdrug = ORM::factory('Mdrug');
						$objdrug->DrugName_c = $drugName;
						$objdrug->save();
						$objDrugs=ORM::factory('Mdrug')->where('DrugName_c','=', $drugName)->find();
						// add records in prescriptiondetails table
						$objOrm = ORM::factory('Appointmentprescription');
						$objOrm->refpdetailsprescriptionsid_c =$objPres->id;
						$objOrm->refpdetailsdrugid_c =$objDrugs->id;
						$objOrm->drugtype_c = $drugType;
						$objOrm->dosage_c = $drugFreq;
						$objOrm->quantity_c = $drugDuration;
						$objOrm->drugperiod_c=$drugInstruction;
						$objOrm->save();
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
			foreach ($objPastTests->find_all() as $objPastTest){
				$objPastTest->delete();
			}
			$arr_orders = array();
			for($i=0;$i< count($ids);$i++){
                $testName = $ids[$i]->value;
				$investigations = ORM::factory('investigation')->where('testname_c','=',$testName)->find();
				
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
						//save recommended tests against appointment id if test is not present in testmaster
						$objtest = ORM::factory('mtest');
						$objtest->testname_c =ucfirst($testName);
						$objtest->sample_c = ucfirst($testSample);
						$objtest->active_c = 0;
						$objtest->reftestsubcategoryid_c = 1;
						$objtest->save();
						$objTest=ORM::factory('mtest')->where('testname_c','=',ucfirst($testName))->find();
						$objOrm = ORM::factory('Appointmenttest');
						$objOrm->refrecomtestrecommtestid_c =$objTest->id;
						$objOrm->refrecomtestappointmentsid_c =$intAppId;
						$testid= $objOrm->save();			
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
			$datestring = htmlspecialchars(date ("dmYHis"), ENT_QUOTES);
			$pdfCreaterObj = new Cpdfcreater;
			$pdfpath = $pdfCreaterObj->createpdf($appid, $datestring);
			return($pdfpath);
		}
		catch(Exception $e){throw new Exception($e);}
	}

	private function saveAppointmentData(){
		try{	
			if(isset($_POST['transferto'])){
				unset($_POST['transferto']);
			}
			if(isset($_POST['check'])){
				$checkarray = $_POST['check'];
				unset ($_POST['check']);
			}
			$appid = '';
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
			
			if(isset($_POST['medicineIds'])){
				$medicineIds = $_POST['medicineIds'];
				unset ($_POST['medicineIds']);
				if($medicineIds != "{}")
					$this->saveprescription($appid, $medicineIds);
			}
			while (list($var, $val) = each($_POST)) {
				$section = ORM::factory($var)->where('ref_app_id','=',$appid)->find();
				if($section->id == NULL){
					$section->ref_app_id = $appid;
					$section->text = $val;
					$section->visibility = isset($checkarray[$var]) ? TRUE : false;
					$section->save();
				}
				else{
					$section->text = $val;
					$section->visibility = isset($checkarray[$var]) ? TRUE : false;
					$section->update();
				}
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
}

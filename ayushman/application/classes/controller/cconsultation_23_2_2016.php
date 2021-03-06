<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/controller/cpdfcreater.php');
include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');
include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/files.php');

class Controller_Cconsultation extends Controller_Ctemplatewithmenu {
	public function action_view(){
		if(!isset($_GET['appid'])){
			$this->displayDashboard();
		}else{
			$appid=$_GET['appid'];
			$name = $_GET['name'];
			$profileid = !(isset($_GET['p']))?'':$_GET['p'];

			$objApp = ORM::factory('appointment')->where('id','=',$appid)->find();
			if($objApp->refappointmentstatusesid_c == 1 || $objApp->refappointmentstatusesid_c == 3 || $objApp->refappointmentstatusesid_c == 4 || $objApp->refappointmentstatusesid_c == 5){
				die('Access denied to the appointment because appointment might be cancelled, completed or rescheduled status. <a href="/" >Click Here</a> to go back to dashboard');
			}
			
			$objIncident = ORM::factory('incident')->where('id','=',$objApp->refincidentid_c)->find();
			if($profileid == ''){
				$profileid = $objIncident->profileid_c;
			}else{
				$objIncident->profileid_c = $profileid;
				$objIncident->save();
			}
			$session= Session::instance();
			$session->set('consultationprofile', $profileid);
			$session->set('endconsultation', false);
			$user = Auth::instance()->get_user();
			if (!$user){
				Request::current()->redirect('cuser/login');
			}
			if ($user->has('roles', ORM::factory('role', array('name' => 'doctor'))))
			$this->displayDoctorApp($user,$appid);
		}
	}
	private function displayDashboard(){
		
		$user = Auth::instance()->get_user();
		if (!$user){
			Request::current()->redirect('cuser/login');
		}
		if ($user->has('roles', ORM::factory('role', array('name' => 'doctor')))){
			$content = View::factory('vdoctordashboard');
			$content->bind('objuser', $user);
			$arr_xmpp = Kohana::$config->load('xmpp');
			$content->bind('arr_xmpp' , $arr_xmpp);
			$this->template->content = $content;
		}
		if ($user->has('roles', ORM::factory('role', array('name' => 'patient')))){
			$content = View::factory('vpatienttemplate');
			$content->bind('objuser', $user);
			$arr_xmpp = Kohana::$config->load('xmpp');
			$content->bind('arr_xmpp' , $arr_xmpp);
			$this->template->content = $content;
		}
	}
	private function displayDoctorApp($user, $appId){
		$content = View::factory('newvconsultationapp');
		$appointment= ORM::factory('appointment')->where('id','=',$appId)->find();
		$patientid = $appointment->refappfromid_c;
		$content->bind('patientid', $patientid);
		$content->bind('appId', $appId);
		$content->bind('objuser', $user);
		$arr_xmpp = Kohana::$config->load('xmpp');
		$content->bind('arr_xmpp' , $arr_xmpp);
		$this->template->breadcrumb = ">>Home";
		$this->template->content = $content;
		$this->template->user = $user;
		$this->template->urole = "doctor";
	}
	public function action_getmyprofile(){
		$user = Auth::instance()->get_user();
		if ($user->has('roles', ORM::factory('role', array('name' => 'doctor')))){
			$objUser = new Model_User;
			$objdoctorpsecialization = new Model_Doctorspecialization;
			
			$objdoctorpracticedomain = new Model_Doctorpracticedomain;
			
			$objdoctoreducation = new Model_Doctoreducation;
			
			$objdoctorknownlanguage = new Model_Doctorknownlanguage;		
			
			$user_info['userinfo'] = $objUser->get_user_info();
			$user_info['userspecialization'] = $objdoctorpsecialization->get_doctor_specialization();
			
			$user_info['userdomain'] = $objdoctorpracticedomain->get_doctor_domain();
			$user_info['usereducation'] = $objdoctoreducation->get_doctor_education();
			$user_info['userknownlanguage'] = $objdoctorknownlanguage->get_doctor_knownlanguage();
			
			$object_doctor = new Model_Doctor();
			$doctor_id = $object_doctor->get_doctor_id($user_info['userinfo']['id']);
			$doctor = ORM::factory('doctor')->where('id','=',$doctor_id)->find();
			$user_info['userinfo']['signature'] =$doctor->signature_c;
			// Added to accept user header/Footer files and flag
			$user_info['userinfo']['header'] =$doctor->header_c;
			$user_info['userinfo']['footer'] =$doctor->footer_c;
			$user_info['userinfo']['systemGenflag'] =$doctor->headerfooterSysGenflag_c;
			
			$user_info['userinfo']['doctorid']=$doctor_id;
			$user_info['user_role']='doctor';
			$user_info['current_date']=date("d M Y h:i a", time());
			$consultationViewObj = ORM::factory('consultationview')->where('refdoctorid_c','=',$doctor_id)->find_all();
			$arr = array();

				foreach($consultationViewObj as $view){
					array_push($arr,array($view->profilename_c,$view->id));
				}
			$user_info['con_profile'] = $arr;
			
			$alternatebill = ORM::factory('Alternatebill')->where('refiohid','=',$user_info['userinfo']['id'])->find();
			if($alternatebill->id == null){
				$alternatebill = ORM::factory('Alternatebill')->where('refiohid','=',-1)->find();
			}
			$user_info['billhtml'] = $alternatebill->filename_c;
			$response = json_encode($user_info);
			header("Cache-Control: no-cache, must-revalidate");
			echo($response);
			die();
		}else{
			$objUser = new Model_User;
		
			$user_info['userinfo'] = $objUser->get_user_info();
			$user_info['user_role'] ='patient';
			$response = json_encode($user_info);
			header("Cache-Control: no-cache, must-revalidate");
			echo($response);
			die();
		
		}		
	}
	public function action_htmlToPdf(){
		$htmlfile = $_POST['htmlfile'];
		//$htmlfile = str_replace('/ayushman/assets/doctorsignature/',$_SERVER['DOCUMENT_ROOT'].'/ayushman/assets/doctorsignature/',$htmlfile);
		$htmlfile = str_replace('/ayushman/assets/',$_SERVER['DOCUMENT_ROOT'].'/ayushman/assets/',$htmlfile);
		$appointmentid = $_POST['appointmentid'];
		$objHtml 	= new simple_html_dom();
		$objHtml->load($htmlfile);
		$files = new helper_Files();
		$temp=$files->savePdfFile($objHtml);
		$objappointment=ORM::factory('appointment')->where('id','=',$appointmentid)->find();
		$objappointment->prescriptionfileid_c=$temp["id"];
		$objappointment->save();
		echo(json_encode($temp));
		die();
	}
	
	public function action_saveCertificate(){
		$htmlfile = $_POST['htmlfile'];
		$htmlfile = str_replace('/ayushman/assets/',$_SERVER['DOCUMENT_ROOT'].'/ayushman/assets/',$htmlfile);
		$certificatetype = $_POST['type'];
		$userid = $_POST['userid'];
		$objHtml 	= new simple_html_dom();
		$objHtml->load($htmlfile);
		$files = new helper_Files();
		$temp=$files->savePdfFile($objHtml);
		$objcertificate=new Model_Certificate;
		$objcertificate->ref_userid_c=$userid;
		$objcertificate->reffileid_c=$temp["id"];
		$objcertificate->cerficatetype=$certificatetype;
		$objcertificate->save();
		echo(json_encode($temp));
		die();
	}
	public function action_getdocprofile(){
		$appid = $_GET['appid'];
		$user = Auth::instance()->get_user();
		if ($user->has('roles', ORM::factory('role', array('name' => 'doctor')))){
			$objUser = new Model_User;
			$objdoctorpsecialization = new Model_Doctorspecialization;
			
			$objdoctorpracticedomain = new Model_Doctorpracticedomain;
			
			$objdoctoreducation = new Model_Doctoreducation;
			
			$objdoctorknownlanguage = new Model_Doctorknownlanguage;		
			
			$user_info['userinfo'] = $objUser->get_user_info();
			$user_info['userspecialization'] = $objdoctorpsecialization->get_doctor_specialization();
			
			$user_info['userdomain'] = $objdoctorpracticedomain->get_doctor_domain();
			$user_info['usereducation'] = $objdoctoreducation->get_doctor_education();
			$user_info['userknownlanguage'] = $objdoctorknownlanguage->get_doctor_knownlanguage();
			
			$object_doctor = new Model_Doctor();
			$doctor_id = $object_doctor->get_doctor_id($user_info['userinfo']['id']);
			$doctor = ORM::factory('doctor')->where('id','=',$doctor_id)->find();
			$user_info['userinfo']['signature'] =$doctor->signature_c;
			$user_info['userinfo']['doctorid']=$doctor_id;
			$consultationViewObj = ORM::factory('consultationview')->where('refdoctorid_c','=',$doctor_id)->find_all();
			$arr = array();

				foreach($consultationViewObj as $view){
					array_push($arr,array($view->profilename_c,$view->id));
				}
			$user_info['con_profile'] = $arr;
			
			$alternatebill = ORM::factory('Alternatebill')->where('refiohid','=',$user_info['userinfo']['id'])->find();
			if($alternatebill->id == null){
				$alternatebill = ORM::factory('Alternatebill')->where('refiohid','=',-1)->find();
			}
			$user_info['billhtml'] = $alternatebill->filename_c;
			$response = json_encode($user_info);
			header("Cache-Control: no-cache, must-revalidate");
			echo($response);
			die();
		}else{
			$appointment = ORM::factory('appointment')->where('id','=',$appid)->find();
			$doctor = ORM::factory('doctor')->where('id','=',$appointment->refappwithid_c)->find();
			
			$objdoctorpsecialization = new Model_Doctorspecialization;
			$objdoctorpracticedomain = new Model_Doctorpracticedomain;
			$objdoctoreducation = new Model_Doctoreducation;
			$objdoctorknownlanguage = new Model_Doctorknownlanguage;		
			
			$user_info['userinfo'] 				= ORM::factory('user')->get_info($doctor->refdoctorsid_c);
			$user_info['userspecialization'] 	= $objdoctorpsecialization->get_doctor_specialization($doctor->refdoctorsid_c);
			$user_info['userdomain'] 			= $objdoctorpracticedomain->get_doctor_domain($doctor->refdoctorsid_c);
			$user_info['usereducation'] 		= $objdoctoreducation->get_doctor_education($doctor->refdoctorsid_c);
			$user_info['userknownlanguage'] 	= $objdoctorknownlanguage->get_doctor_knownlanguage($doctor->refdoctorsid_c);
			
			$object_doctor = new Model_Doctor();
			$doctor_id = $object_doctor->get_doctor_id($user_info['userinfo']['id']);
			$user_info['userinfo']['doctorid']=$doctor_id;
			$consultationViewObj = ORM::factory('consultationview')->where('refdoctorid_c','=',$doctor_id)->find_all();
			$arr = array();

				foreach($consultationViewObj as $view){
					array_push($arr,array($view->profilename_c,$view->id));
				}
			$user_info['con_profile'] = $arr;
			
			$alternatebill = ORM::factory('Alternatebill')->where('refiohid','=',$user_info['userinfo']['id'])->find();
			if($alternatebill->id == null){
				$alternatebill = ORM::factory('Alternatebill')->where('refiohid','=',-1)->find();
			}
			$user_info['billhtml'] = $alternatebill->filename_c;
			$response = json_encode($user_info);
			header("Cache-Control: no-cache, must-revalidate");
			echo($response);
			die();
		}		
	}
	public function action_getmyclinics(){
		$objClinics = new Model_Doctoractiveclinic;
		if(isset($_GET['userid'])){
			$userid = $_GET['userid'];
			$clinics['clinicinfo'] = $objClinics->get($userid);
		}else{
			$clinics['clinicinfo'] = $objClinics->get();
		}
		$response = json_encode($clinics);
		header("Cache-Control: no-cache, must-revalidate");
		echo($response);
		die();
	}
	public function action_getmytemplates(){
		$objTemplates = new Model_Prescriptiontemplate;
		$templates['templates'] = $objTemplates->get();
		$response = json_encode($templates);
		header("Cache-Control: no-cache, must-revalidate");
		echo($response);
		die();
	}
	public function action_getbilldata(){
		$appid = $_GET['appid'];
		$objapp=ORM::factory('appointment')->where('id','=',$appid)->find();
		$objbill=ORM::factory('bill')->where('statementcode_c','=',$objapp->reftransactionid_c)->find();
		$billdata=array();
		$billdata['charge_injection']=$objbill->charge_injection;
		$billdata['charge_dressing']=$objbill->charge_dressing;
		$billdata['charge_labtest']=$objbill->charge_labtest;
		$billdata['charge_reconsultation']=$objbill->charge_reconsultation;
		$billdata['charge_ecg']=$objbill->charge_ecg;
		$billdata['charge_visit']=$objbill->charge_visit;
		$billdata['charge_misc']=$objbill->charge_misc;
		$billdata['patrelative']=$objbill->patrelative;
		$billdata['treatmentfrom']=$objbill->treatmentfrom;
		$billdata['treatmentto']=$objbill->treatmentto;
		$billdata['generateddate']=$objbill->createdon_c;
		
		// Fields specific for Dental Doctor
		$billdata['charge_silverfilling']=$objbill->charge_silverfilling;
		$billdata['charge_compositefilling']=$objbill->charge_compositefilling;
		$billdata['charge_rootcanal']=$objbill->charge_rootcanal;
		$billdata['charge_periodental']=$objbill->charge_periodental;
		$billdata['charge_oralsurgery']=$objbill->charge_oralsurgery;
		$billdata['charge_orthodentic']=$objbill->charge_orthodentic;
		$billdata['charge_metalcapping']=$objbill->charge_metalcapping;
		$billdata['charge_ceramiccrown']=$objbill->charge_ceramiccrown;
		$billdata['charge_ceramicbridge']=$objbill->charge_ceramicbridge;
		$billdata['charge_metalbridge']=$objbill->charge_metalbridge;
		//$billdata['charge_misc']=$objbill->charge_misc;
		// Miscellaneous charges same field used to store as above
		// ------------------------------------------
		
		$response = json_encode($billdata);
		header("Cache-Control: no-cache, must-revalidate");
		echo($response);
		die();
	
		
	}	
	public function action_getappointmentinfo(){
		$appid = $_GET['appid'];
		$objAppointmentInfo = new Model_Doctorappointment;
		$app_info = $objAppointmentInfo->get_app_info($appid);
		$objuser=ORM::factory('user')->where('id','=',$app_info['refappfromid_c'])->find();
		$objaddress=ORM::factory('address')->where('id','=',$objuser->refaddresshome1_c)->find();
		$app_info['Patientaddress']=$objaddress->line1_c.', '.$objaddress->line1_c.', '.$objaddress->nearlandmark_c.', '.$objaddress->city_c;	
		$defaultPhoto = '/ayushman/assets/userphotos/pic02.png';
		if(strtolower($app_info['PatientGender']) == 'male'){
			$defaultPhoto = '/ayushman/assets/userphotos/male.jpg';
		}else if(strtolower($app_info['PatientGender']) == 'female'){
			$defaultPhoto = '/ayushman/assets/userphotos/female.jpg';
		}
		
		if($app_info['PatientPhoto'] != null && (!file_exists($_SERVER['DOCUMENT_ROOT'].$app_info['PatientPhoto']))){
			$app_info['PatientPhoto'] = $defaultPhoto;
		}
		$app_info['PatientPhoto'] = ($app_info['PatientPhoto'] == null)?$defaultPhoto:$app_info['PatientPhoto'];
		$objApp= ORM::factory('appointment')->where('id','=',$appid)->find();
		$doctorid=$objApp->refappwithid_c;
		$app_info['appdate']=date("d-M-y", strtotime($objApp->displaytime_c));
		$app_info['incidentid']=$objApp->refincidentid_c;
		$toaccount=ORM::factory('doctor')->where('id', '=', $doctorid)->find()->refdoctorsid_c;
		$users=ORM::factory('user')->where('id','=',$toaccount)->find();
		$docname='Dr.'.$users->Firstname_c.' '.$users->lastname_c;
		$app_info['doctorname']=$docname;
		$app_info['clinicid']=$objApp->clinicid_c;
		$totalamt=0.00;
		$newId=transaction::getLatestBillId($toaccount);;
		$transactionid=$objApp->reftransactionid_c;
		if($transactionid != null)
		{
			$objStatements	= ORM::factory('billingstatement')->where('statementcode_c','=',$transactionid)->find();
			$totalamt=$objStatements->ammount_c;
			$diagnosis=$objStatements->reftransactiontype_c;
			$bill = ORM::factory('bill')->where('statementcode_c','=',$transactionid)->find();
			$newBillId = $bill->billid_c;
			
		}else{
			$newBillId = transaction::getLatestBillId($toaccount);
			$totalamt = $objApp->rate_c;
		}
		$app_info['DateAndTime'] = date("d M Y h:i a", time());
		$app_info['billid'] = $newBillId;
		$app_info['newbillid'] = $newId;
		$app_info['amount'] = $totalamt;
		
		$reports = ORM::factory('patienttestreport')->where('refappointmentid_c','=',$appid)->find_all();
		$file_paths=array();
		foreach($reports as $report){
			$file = new helper_Files();
			$return = $file->getFilePath($report->fileid_c);
			if($return != ''){
				array_push($file_paths,array("path"=>$return['abspath'],"Parameters"=>json_decode($report->testparameters)));
			}
		}
		
		$app_info['attachment'] = $file_paths;
		
		$response = json_encode($app_info);
		header("Cache-Control: no-cache, must-revalidate");
		echo($response);
		die();
	}

	public function action_getpatients(){
		if($_POST){
			$term = $_POST['data'];
			$doctor = ORM::factory('doctor')->where('refdoctorsid_c','=',Auth::instance()->get_user()->id)->find();
			$patients = new Model_Selecteddoctorbypatient;
			$patients = $patients->get_patients($term,$doctor->id);
			$response = json_encode($patients);
			header("Cache-Control: no-cache, must-revalidate");
			echo($response);
			die();
		}else{
			header("Cache-Control: no-cache, must-revalidate");
			echo "Access Denied";
			die();
		}
	}
	public function action_getpatientinfo(){
		if($_POST){
			
			$user = Auth::instance()->get_user();
			if ($user->has('roles', ORM::factory('role', array('name' => 'doctor')))){
				$user_id = $_POST['data'];
			}else{
				$user_id = $user->id;
			}
			$user = new Model_User;
			$user = $user->get_info($user_id);
			$response = json_encode($user);
			header("Cache-Control: no-cache, must-revalidate");
			echo($response);
			die();
		}else{
			header("Cache-Control: no-cache, must-revalidate");
			echo "Access Denied";
			die();
		}
	}
	public function action_getappointments(){
		$doc_userid = $_GET['id'];
		
		$objAppointments = new Model_Doctorappointment;
		$apps['apps'] = $objAppointments->get_apps($doc_userid,'schedule');
		$response = json_encode($apps);
		header("Cache-Control: no-cache, must-revalidate");
		echo($response);
		die();
	}
	
	public function action_getregularpatients(){
		//$doc_userid = $_GET['id'];
		$doctor = ORM::factory('doctor')->where('refdoctorsid_c','=',Auth::instance()->get_user()->id)->find();
		
		$patients = new Model_Selecteddoctorbypatient;
		$apps['apps'] = $patients->get_regularpatients($doctor->id);
		$response = json_encode($apps);
		header("Cache-Control: no-cache, must-revalidate");
		echo($response);
		die();
	}

	public function action_quickprescription(){
		$appId = $_GET['id'];
		$objAppointmentInfo = new Model_Doctorappointment;
		$app_info = $objAppointmentInfo->get_app_info($appId);
		$response = json_encode($app_info);
		
		$content = View::factory('/vuser/vdoctor/vquickprescription');
		$content->bind('app_info', $response);
		$this->template->content = $content;
	}

	private function get_text($elements){
		$text = '';
		foreach($elements as $element){
			if(isset($element->value)){
				$text = $text . $element->label[0] . ': ' .$element->value . "\t";
			}	
		}
		return $text;
	}  	

	private function get_all_text($form_elements){
		$text = '';
		foreach($form_elements as $form_name=>$form_element){
			$text = $text . ucfirst($form_name) . ": ";
			foreach($form_element as $element){
				if(isset($element->value)){
					$text = $text . $element->label[0]. ': '.$element->value."\t"; 
				}	
			}
		}  
		return($text);
	}  	

	public function action_generateSummary(){
		try{
			switch($_SERVER['REQUEST_METHOD']){
			case 'POST':
				$object_user = new Model_User;
				$user = $object_user->get_user_info();
				if(!(isset($_POST['appid']) && isset($_POST['app_data']))){
					throw new HTTP_Exception_400;
				}
				$appointment_id = $_POST['appid'];
				$all_appointment_data = json_decode($_POST['app_data']);
				$appointment_object = new Model_Appointment;
				$appointment_info = $appointment_object->get_appointment_info($appointment_id);
				$doctor_object = new Model_Doctor;
				$doctor_id = $doctor_object->get_doctor_id($user['id']);
				if($doctor_id != $appointment_info['refappwithid_c']){
					throw new HTTP_Exception_400;
				}
				foreach($all_appointment_data as $key=>$value){
					switch($key){
					case 'main_complaint':
						$text = $value->value;
						$main_com_obj = new Model_TextComplaint;
						$main_com_obj->saveText($text, $appointment_id, 1);
						break;
					case 'follow_up':
						$text = $value->value;
						$follow_obj = new Model_Textfollowupnote;
						$follow_obj->saveText($text, $appointment_id, 1);
						break;
					case 'vital_signs':
						$text = $this->get_text($value);
						$vital_obj = new Model_TextVital;
						$vital_obj->saveText($text, $appointment_id, 1);
						break;
					case 'examinations':
						$text = $this->get_all_text($value);
						$exam_obj = new Model_Textexamination();
						$exam_obj->saveText($text, $appointment_id, 1);
						break;
					case 'symptomatic_review';
						$text = $this->get_all_text($value);
						$symp_obj = new Model_Textsymptom;
						$symp_obj->saveText($text, $appointment_id, 1);
						break;	
					}
				}  
				$pdfPath = $this->generateAppointmentSummary($appointment_id);	  
				$response['pdf_path'] = $pdfPath;
				header("Cache-Control: no-cache, must-revalidate");
				echo json_encode($response);die;

			default:
				throw new HTTP_Exception_405;
			}
		}catch(Exception $e){throw new Exception($e);}
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
	public function action_notes(){
		try{
			switch($_SERVER['REQUEST_METHOD']){
			case 'GET':
				$user = Auth::instance()->get_user();
				if ($user->has('roles', ORM::factory('role', array('name' => 'doctor')))){
					$doctor_user_id = $user->id;
				}else{
					echo 'access denied'; die;
				}
				if(isset($_GET['patient_id'])){
					$patient_user_id = $_GET['patient_id'];
				}
				else{
					throw new HTTP_Exception_400;
				}
				$object_doctor = new Model_doctor;
				$doctor_id = $object_doctor->get_doctor_id($doctor_user_id);
				$object_doctornote = new Model_Doctornote;
				$notes = $object_doctornote->get_notes($doctor_id, $patient_user_id);
				
				$file = new helper_Files();
				$filepath = $file->getFilePath($notes->file_c);
				
				$response['notes'] = $notes->notes_c;
				$response['historynotes'] = isset($filepath['abspath'])?$filepath['abspath']:'';
				header("Cache-Control: no-cache, must-revalidate");
				echo json_encode($response);die;
			 case 'DELETE':
				  $DELETE = Request::current()->query();
				  if(!(isset($DELETE['patientid']))){
					throw new HTTP_Exception_400;
				  }
				  $patientid = $DELETE['patientid'];
				  $doctor_object = new Model_Doctor;
				  $object_user = new Model_User;
				  $user = $object_user->get_user_info();
					$doctor_id = $doctor_object->get_doctor_id($user['id']);
					$object_note = new Model_Doctornote();
					$object_note->delete_historynote($doctor_id, $patientid);
				  die;
			case 'POST':
				$object_user = new Model_User;
				$user = $object_user->get_user_info();
				if(!(isset($_POST['notes']))){
					throw new HTTP_Exception_400;
				}
				
				$notes_text = $_POST['notes'];
				$patientId = $_POST['patient_id'];
				$doctor_object = new Model_Doctor;
				$doctor_id = $doctor_object->get_doctor_id($user['id']);

				$object_note = new Model_Doctornote();
				$object_note->save_note($doctor_id, $patientId, $notes_text);
				echo json_encode('Note saved successfully');die;

			default:
				throw new HTTP_Exception_405;
			}
		}catch(Exception $e){throw new Exception($e);}
	}

	public function action_newConsultationRequisite(){
		try{
			$object_user = new Model_User;
			$user = $object_user->get_user_info();
			switch($_SERVER['REQUEST_METHOD']){
			case 'GET':
				$object_doctor = new Model_Doctor();
				$doctor_id = $object_doctor->get_doctor_id($user['id']);
				$mainMenu = array();
				$temp = array();
				$temp['label'] = 'Main Complaint';
				$temp['type'] = 'text';
				$temp['id'] = 'main_complaint';
				array_push($mainMenu, $temp);
				$temp['label'] = 'Vital Signs';
				$temp['type'] = 'form';
				$temp['data'] = 'vitals';
				$temp['id'] = 'vital_signs';
				array_push($mainMenu, $temp);
				$temp['label'] = 'Symptomatic Review';
				$temp['type'] = 'menu';
				$temp['id'] = 'symptomatic_review';
				$consultationViews = array();
				$examinationViews	= array();
				$symptomaticViews	= array();
				$consultationViewObj = ORM::factory('consultationview')->where('refdoctorid_c','=',$doctor_id)->find();
				if(!($consultationViewObj->loaded())){
					$consultationViewObj = ORM::factory('consultationview')->where('refdoctorid_c','=','-1')->mustFind();
				}
				$examinationViewIds = $consultationViewObj->examinationviews;
				$symptomaticViewIds = $consultationViewObj->symptomaticviews;
				if($symptomaticViewIds != ""){
					$symptomaticViewIds = explode(',',$symptomaticViewIds);
					foreach($symptomaticViewIds as $symptomaticViewId){
						$symptomaticFormObj = ORM::factory('symptomaticform')->where('id','=',$symptomaticViewId)->mustFind();
						$inner_temp = array();
						$inner_temp['label'] = $symptomaticFormObj->formlabel_c;
						$inner_temp['type'] = 'form';
						$inner_temp['data'] = $symptomaticFormObj->formname_c;
						$inner_temp['id'] = $symptomaticFormObj->formname_c;
						array_push($symptomaticViews,$inner_temp);
					}
				}
				if($examinationViewIds != ""){
					$examinationViewIds = explode(',',$examinationViewIds);
					foreach($examinationViewIds as $examinationViewId){
						$examinationFormObj = ORM::factory('examinationform')->where('id','=',$examinationViewId)->mustFind();
						$inner_temp = array();
						$inner_temp['label'] = $examinationFormObj->formlabel_c;
						$inner_temp['type'] = 'form';
						$inner_temp['data'] = $examinationFormObj->formname_c;
						$inner_temp['id'] = $examinationFormObj->formname_c;
						array_push($examinationViews,$inner_temp);
					}
				}
				$temp['data'] = $symptomaticViews;
				array_push($mainMenu,$temp);
				$temp['label'] = 'Examinations';
				$temp['type'] = 'menu';
				$temp['data'] = $examinationViews;
				$temp['id'] = 'examinations';
				array_push($mainMenu,$temp);
				$temp['label'] = 'Follow Up';
				$temp['type'] = 'text';
				$temp['id'] = 'follow_up';
				array_push($mainMenu,$temp);
				$response['main_menu'] = $mainMenu;
				header("Cache-Control: no-cache, must-revalidate");
				echo json_encode($response);die;

			default:
				throw new HTTP_Exception_405;
			}
		}catch(Exception $e){throw new Exception($e);}
	}

	public function action_ConsultationRequisite(){
		try{
			$session= Session::instance();
			$profileid = $session->get('consultationprofile');
			$examinationViews	= array();
			$symptomaticViews	= array();
			$object_user = new Model_User;
			$user = $object_user->get_user_info();
			switch($_SERVER['REQUEST_METHOD']){
			case 'GET':
				if($profileid != ''){
					$consultationViewObj = ORM::factory('consultationview')->where('id','=',$profileid)->find();
					if(!($consultationViewObj->loaded())){
						$consultationViewObj = ORM::factory('consultationview')->where('refdoctorid_c','=','-1')->mustFind();
					}
				}
				else{
					$object_doctor = new Model_Doctor();
					$doctor_id = $object_doctor->get_doctor_id($user['id']);
					$examinationViews	= array();
					$symptomaticViews	= array();
					$consultationViewObj = ORM::factory('consultationview')->where('refdoctorid_c','=',$doctor_id)->find();
					if(!($consultationViewObj->loaded())){
						$consultationViewObj = ORM::factory('consultationview')->where('refdoctorid_c','=','-1')->mustFind();
					}
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
				$response['examination'] = $examinationViews;
				$response['symptomatic'] = $symptomaticViews;
				header("Cache-Control: no-cache, must-revalidate");
				echo json_encode($response);die;

			default:
				throw new HTTP_Exception_405;
			}
		}catch(Exception $e){throw new Exception($e);}
	}

	public function action_dosage(){
		try{
			$object_user = new Model_User;
			$user = $object_user->get_user_info();
			switch($_SERVER['REQUEST_METHOD']){
			case 'GET':
				$object_drug_form = new Model_Drugformmaster;
				$dosage = $object_drug_form->get_all_dosage();
				$response['dosage'] = $dosage;
				header("Cache-Control: no-cache, must-revalidate");
				echo json_encode($response);die;

			default:
				throw new HTTP_Exception_405;
			}
		}catch(Exception $e){throw new Exception($e);}
	}
}

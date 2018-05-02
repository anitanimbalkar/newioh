<?php defined('SYSPATH') or die('No direct script access.');
include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/xmpp.php');
include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/notificationsender.php');

class Controller_Ctakeappointment extends Controller_Ctemplatewithmenu {
	public function action_takeAppointmentByStaff(){	
		try{
			$objUser = Auth::instance()->get_user();
			$userId = $objUser->id;
			$objStaff = ORM::factory('staff')->where('refstaffuserid_c','=',$userId)->find();
			$staffId=$objStaff->id;
			
			$objFavoriteStaffByDoctors = ORM::factory('favoritestaffbydoctordetail')// find all doctors who selected that staff.
									->where('staffid','=',$staffId)
									->where('status','=','accepted')
									->find_all()
									->as_array();
			$array_doctor=array();
			if(count($objFavoriteStaffByDoctors != 0))// get all doctor's name.
			{
				$result=$objFavoriteStaffByDoctors;
				foreach($result as $res)
				{
					if((!empty($res->doctorName)) && ($res->doctorName != ' ') && !(in_array($res->doctorName,$array_doctor)))
					$array_doctor[$res->doctorUserId]=$res->doctorName ;
				}
			}
			
			$content = View::factory('vuser/vstaff/vtakeappointmentpatientform')->bind('fname', $fname)->bind('lname', $lname)->bind('contactno', $contactno)->bind('errors', $errors);
			$content->bind('userid', $staffId);
			$content->bind('array_doctor', $array_doctor);	
			$this->template->content = $content;
		}
		catch(Exception $e){throw new Exception($e);}
	}
	public function action_newPatientRegistratonByStaff(){	
		try{
			$objUser = Auth::instance()->get_user();
			$userId = $objUser->id;
			$objStaff = ORM::factory('staff')->where('refstaffuserid_c','=',$userId)->find();
			$staffId=$objStaff->id;
			
			$objFavoriteStaffByDoctors = ORM::factory('favoritestaffbydoctordetail')// find all doctors who selected that staff.
									->where('staffid','=',$staffId)
									->where('status','=','accepted')
									->find_all()
									->as_array();
			$array_doctor=array();
			if(count($objFavoriteStaffByDoctors != 0))// get all doctor's name.
			{
				$result=$objFavoriteStaffByDoctors;
				foreach($result as $res)
				{
					if((!empty($res->doctorName)) && ($res->doctorName != ' ') && !(in_array($res->doctorName,$array_doctor)))
					$array_doctor[$res->doctorUserId]=$res->doctorName ;
				}
			}
			
			
			$content = View::factory('vuser/vstaff/vnewpatientregistrationbystaff')->bind('fname', $fname)->bind('lname', $lname)->bind('contactno', $contactno)->bind('errors', $errors);
			$content->bind('userid', $staffId);
			$content->bind('array_doctor', $array_doctor);	
			$this->template->content = $content;
		}
		catch(Exception $e){throw new Exception($e);}
	}

	public function action_searchForPatientbyStaff(){
		try{
			// Do not search whole database 
			// Search for the patient that are registered by staff and the 
			// doctors attached to staff
			
			$objUser = Auth::instance()->get_user();
			$userId = $objUser->id;
			$objStaff = ORM::factory('staff')->where('refstaffuserid_c','=',$userId)->find();
			$staffId=$objStaff->id;
			$patObjs = ORM::factory('patientsbystaff')->where('staffid','=',$staffId);
			
			if(isset($_GET["patId"]) && $_GET["patId"] !== '' ){
				$patId = $_GET["patId"];
				if($patId !== ''){
					$patObjs = $patObjs->where('id', '=', $patId);
				}	
			}else{
				if(isset($_GET["patName"])){
					$patName = $_GET["patName"];
					if($patName !== ''){
						$patObjs = $patObjs->where('Firstname_c', 'like', '%'.$patName.'%');
					}
				}	
				if(isset($_GET["patLastName"])){
					$patLastName = $_GET["patLastName"];
					if($patLastName !== ''){
						$patObjs = $patObjs->where('lastname_c', 'like', '%'.$patLastName.'%');
					}				
				}	
				if(isset($_GET["patContact"])){
					$patContact = $_GET["patContact"];
					if($patContact !== ''){
						$patObjs = $patObjs->where('mobileno1_c', 'like', '%'.$patContact.'%');
					}	
				}
				if(isset($_GET["patEmail"])){
					$patEmail = $_GET["patEmail"];
					if($patEmail !== ''){
						$patObjs = $patObjs->where('email', 'like', '%'.$patEmail.'%');
					}	
				}
				if(isset($_GET["patId"])){
					$patId = $_GET["patId"];
					if($patEmail !== ''){
						$patObjs = $patObjs->where('id', 'like', '%'.$patId.'%');
					}	
				}
				$dob = '--';
				if(isset($_GET["dob"])){
					$dateInfo = date_parse_from_format('d M Y', trim($_GET['dob']));
					$dob = $dateInfo['year'].'-'.$dateInfo['month'].'-'.$dateInfo['day'];
					if($dob != '--'){
						$patObjs = $patObjs->where('DOB_c', '=', $dob);
					}
				}
			}

			$patObjs = $patObjs->find_all();
			$searchResults = array();
			foreach($patObjs as $patObj){
					$searchResult = array();
					$searchResult["name"] = $patObj->Firstname_c." ".$patObj->middlename_c." ".$patObj->lastname_c;
					$searchResult["contact"] = $patObj->mobileno1_c != null?$patObj->mobileno1_c:'Not Provided';
					$searchResult["id"] = $patObj->id;
					if($patObj->DOB_c != '0000-00-00'){
						$searchResult["dob"] = date("d M Y", strtotime($patObj->DOB_c));
					}else{
						$searchResult["dob"] = 'Not Provided';
					}
					$searchResult["photo"] = $patObj->photo_c;
					array_push($searchResults, $searchResult);
				}
			die(json_encode($searchResults));
		}
		catch(Exception $e){throw new Exception($e);}	
	}
	public function action_searchForPatient(){
		try{
			$patObjs = ORM::factory('user');
			
			if(isset($_GET["patId"]) && $_GET["patId"] !== '' ){
				$patId = $_GET["patId"];
				if($patId !== ''){
					$patObjs = $patObjs->where('id', '=', $patId);
				}	
			}else{
				if(isset($_GET["patName"])){
					$patName = $_GET["patName"];
					if($patName !== ''){
						$patObjs = $patObjs->where('Firstname_c', 'like', '%'.$patName.'%');
					}
				}	
				if(isset($_GET["patLastName"])){
					$patLastName = $_GET["patLastName"];
					if($patLastName !== ''){
						$patObjs = $patObjs->where('lastname_c', 'like', '%'.$patLastName.'%');
					}				
				}	
				if(isset($_GET["patContact"])){
					$patContact = $_GET["patContact"];
					if($patContact !== ''){
						$patObjs = $patObjs->where('mobileno1_c', 'like', '%'.$patContact.'%');
					}	
				}
				if(isset($_GET["patEmail"])){
					$patEmail = $_GET["patEmail"];
					if($patEmail !== ''){
						$patObjs = $patObjs->where('email', 'like', '%'.$patEmail.'%');
					}	
				}
				if(isset($_GET["patId"])){
					$patId = $_GET["patId"];
					if($patEmail !== ''){
						$patObjs = $patObjs->where('id', 'like', '%'.$patId.'%');
					}	
				}
				$dob = '--';
				if(isset($_GET["dob"])){
					$dateInfo = date_parse_from_format('d M Y', trim($_GET['dob']));
					$dob = $dateInfo['year'].'-'.$dateInfo['month'].'-'.$dateInfo['day'];
					if($dob != '--'){
						$patObjs = $patObjs->where('DOB_c', '=', $dob);
					}
				}
			}

			$patObjs = $patObjs->find_all();
			$searchResults = array();
			foreach($patObjs as $patObj){
				if ($patObj->has('roles', ORM::factory('role', array('name' => 'patient')))){
					$searchResult = array();
					$searchResult["name"] = $patObj->Firstname_c." ".$patObj->middlename_c." ".$patObj->lastname_c;
					$searchResult["contact"] = $patObj->mobileno1_c != null?$patObj->mobileno1_c:'Not Provided';
					$searchResult["id"] = $patObj->id;
					if($patObj->DOB_c != '0000-00-00'){
						$searchResult["dob"] = date("d M Y", strtotime($patObj->DOB_c));
					}else{
						$searchResult["dob"] = 'Not Provided';
					}
					$searchResult["photo"] = $patObj->photo_c;
					array_push($searchResults, $searchResult);
				}
			}
			die(json_encode($searchResults));
		}
		catch(Exception $e){throw new Exception($e);}
	}

	public function action_chooseSlot(){
		try{
			$object_user 	= Auth::instance()->get_user();
      if (!($object_user)){
        Request::current()->redirect('cuser/login');
      }
			$patient_id		= $_GET["patId"];
      $session = Session::instance();
      $session->set('patient_id', $patient_id);
      $session = Session::instance();
      if(($reschedule_appointment_id = $session->get('reschedule_appointment_id')) !== null){
        $reschedule_appointment_object = ORM::factory('appointment')->where('id', '=', $reschedule_appointment_id)->find();
        $object_fav_doctors = ORM::factory('doctorpanelbystaffdetail')
          ->where('staffuserid', '=', $object_user->id)
          ->where('doctorid','=',$reschedule_appointment_object->refappwithid_c)
          ->find_all();
      }
      else{
        $object_fav_doctors = ORM::factory('doctorpanelbystaffdetail')->where('staffuserid','=',$object_user->id)->find_all();
      }
      $doctor_ids = array();
      foreach($object_fav_doctors as $object_fav_doctor){
        array_push( $doctor_ids, $object_fav_doctor->doctorid);
      }
      $object_doctors = ORM::factory('doctor')->where('id', 'in', $doctor_ids)->find_all();
      $content = View::factory('/vuser/vpatient/vallearliestappointment');
      $content->bind('object_doctors', $object_doctors);
      $this->template->breadcrumb = ">>Home";
      $this->template->content = $content;
      $this->template->user = $object_user;
      $this->template->urole = 'staff';
		}
		catch(Exception $e){throw new Exception($e);}
	}

	private function adddoctortofavoritetotable($doctorid,$userid){
		try{
			$obj_pat=ORM::factory('patient')->where('repatientsuserid_c','=',$userid)->find();
			$patientid=$obj_pat->id;
			$obj_favoritedocterbypatients = ORM::factory('favoritedocterbypatient')->where('reffavdocbypatpatientsid_c','=',$patientid)->where('reffavdocbypatdoctorsid_c','=',$doctorid)->find();
			$array_favoritedocterbypatients=$obj_favoritedocterbypatients->as_array();
			if($array_favoritedocterbypatients['id']==NULL){
				$obj_favoritedocterbypatients = ORM::factory('favoritedocterbypatient');
				$obj_favoritedocterbypatients->reffavdocbypatpatientsid_c=$patientid;
				$obj_favoritedocterbypatients->reffavdocbypatdoctorsid_c=$doctorid;
				$obj_favoritedocterbypatients->save();
			}
		}
		catch(Exception $e){throw new Exception($e);}
	}

	public function action_saveappointment(){
		try{
			$arr_accounts = include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/config/accounts.php');
			$doctorid = $_GET['id'];
			$type	= $_GET['type'];
			$mode	= $_GET['mode'];
			$selecteddates	= $_GET['dates'];
			$incidentid= $_GET['incidenceid'];
			$incidentname	= $_GET['incidencename'];
			$paymentmode	=  $_GET["paymentmode"];
			$noofslots	=  $_GET["noofslots"];
			$rescheduledappid	=  $_GET["rescheduledappid"];
			$shortvisitduration	=  $_GET["shortvisitduration"];
			$longvisit	=  $_GET["longvisit"];
			$appstrategytype = $_GET["appstrategytype"];
			$blockslotduration = $_GET["blockslotduration"];
			$currentlocation="";
			if($_GET["currentlocation"]){
				$currentlocation= $_GET["currentlocation"];
				$currentlocation = strstr($currentlocation, '/ayushman/');
				$currentlocation = str_replace('ayushman/', '', $currentlocation);
			}
			$fees = 0;
			$onlinecharges = 0;
			$objFees = ORM::factory('Billingdoctorfee')->where('ref_doctorid_c','=',$doctorid)->where('ref_slottypeid_c','=',$type)->where('status_c','=','active')->find();
			if(isset($_GET['patId']))
				$obj_user= ORM::factory('user')->where('id','=',$_GET['patId'])->find();
			if($incidentid == ""){
				$objinc = ORM::factory('incident');
				$objinc->incidentsname_c= $incidentname;
				$objinc->incidentdate_c	= date('Y-m-d g:i:s a');
				$objinc->save();
				$incidentid = $objinc->id;
			}
			$selecteddates	= json_decode($selecteddates);
			$time = '';
			$appstdate = $selecteddates[0];
			$objapp = ORM::factory('appointment');
			switch($longvisit){
				case 'true':
					if(strtolower($mode) == 'in-clinic')
						$fees = $fees + $objFees->firsttimefeesinclinic_c;
					else
						$fees = $fees + $objFees->firsttimefees_c;
					break;
				case 'false':
					if(strtolower($mode) == 'in-clinic')
						$fees = $fees + $objFees->followupfeesinclinic_c;
					else
						$fees = $fees + $objFees->followupfees_c;
					break;
			}
			$objapp->refappfromid_c 			= $obj_user->id;
			$objapp->refappwithid_c 			= $doctorid;
			$objapp->scheduledstarttime_c 		= date( 'Y-m-d H:i:s l',strtotime($appstdate));
			$objapp->refincidentid_c	 		= $incidentid;
			$objapp->refappointmentstatusesid_c = 2;
			$objapp->status_c					= "fromsystem";
			$objapp->slottype_c					= $type;
			$objapp->rate_c						= $fees;
			$objapp->paymentmode_c				= ($paymentmode == 0)?'online':"In-Clinic";
			$objapp->consultationmode_c			= $mode;
			$objapp->noofappslots_c				= $noofslots;
			$objapp->paid_c = 0;
			$objapp->slotduration_c				= $shortvisitduration;
			if($appstrategytype == "blockslot")
				$time = date(' g:i A',strtotime($appstdate) ). ' on ' . date( 'j S F Y l',strtotime($appstdate))."<br>Maximum waiting time could be ".$blockslotduration." minutes." ;
			else
				$time = date(' g:i A',strtotime($appstdate) ). ' on ' . date( 'j S F Y l',strtotime($appstdate));
			$time = $time.", Your appointment is through <u>".$mode."</u> mode. ";
			$objapp->save();

			//collect information for send notification 
			$notification=  array();
			$objdoctorinfo = ORM::factory('user')->join('doctors')->on('user.id','=','doctors.refdoctorsid_c')->where('doctors.id','=',$doctorid)->find();
			$drname=$objdoctorinfo->Firstname_c." ".$objdoctorinfo->lastname_c;
			$starttime= $objapp->scheduledstarttime_c ;
			$date = date_format(date_create($starttime),'d M Y' ); 
			$time = date(' g:i A',strtotime($appstdate) );
			$notification=  array();
			$notification['id']=$objapp->refappfromid_c ; $notification['template']='take_appointment_patientmsg'; $notification['sms']='true'; $notification['drname']=$drname; $notification['time']=$time; $notification['date']=$date;  $notification['mode']=$objapp->consultationmode_c;

			if($rescheduledappid !="" || $rescheduledappid !=NULL ){
				$obj_beforeRescheduleappointment = ORM::factory('appointment')->where('id','=',$rescheduledappid)->find();
				$obj_afterRescheduleappointment = ORM::factory('appointment')->where('id','=',$objapp->id)->find();
				$obj_beforeRescheduleappointment->refappointmentstatusesid_c = 3;
				$obj_beforeRescheduleappointment->save();
				$starttime= $obj_beforeRescheduleappointment->scheduledstarttime_c ;
				$datebefore = $obj_beforeRescheduleappointment->scheduledstarttime_c;
				$timebefore = $obj_beforeRescheduleappointment->scheduledstarttime_c;
				$dateafter = $obj_afterRescheduleappointment->scheduledstarttime_c;
				$timeafter = $obj_afterRescheduleappointment->scheduledstarttime_c;
				$datebefore = date_format(date_create( $datebefore),'d M Y' );
				$timebefore = date(' g:i A',strtotime($timebefore));
				$dateafter = date_format(date_create( $dateafter),'d M Y' );
				$timeafter = date(' g:i A',strtotime($timeafter));
				$notification['id']=$obj_beforeRescheduleappointment->refappfromid_c ; $notification['template']='rescheduled_appointment'; $notification['sms']='true'; $notification['drname']=$drname; $notification['timeafter']=$timeafter; $notification['dateafter']=$dateafter;  $notification['beforeresheduletime']=$timebefore;$notification['beforeresheduledate']=$datebefore;$notification['modebefore']=$obj_beforeRescheduleappointment->consultationmode_c;$notification['modeafter']=$obj_afterRescheduleappointment->consultationmode_c;
			}
			//send notification by sms to patient
			helper_notificationsender::sendnotification($notification);
			if(array_key_exists('representative', $_GET))
			{
				$arr_xmpp =Kohana::$config->load('xmpp');
				$var = xmpp::addRosterContact($obj_user.'@'.$arr_xmpp['servername'],'',$objdoctorinfo->id.'@'.$arr_xmpp['servername'],$objdoctorinfo->xmpppassword_c);
			}
			die($time);
		}
		catch(Exception $e){throw new Exception($e);}
	}
} // End Welcome

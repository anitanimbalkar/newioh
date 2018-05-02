<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cadhocappointmentmanger extends Controller {
	
	public function action_connectinclinc()
	{
		try{
			$obj_user 	= Auth::instance()->get_user();
			$patientuserid	= $_GET["patientuserid"];
			$newIncidence = $_GET["newIncidence"];
			$incidence = $_GET["incidence"];
			$consultationprofile = '';
			if(isset($_GET["p"])){
					$consultationprofile = $_GET["p"];
			}
			$objdoctor = new Model_Doctor;
			$objdoctor->where('refdoctorsid_c','=', $obj_user->id)->find();
			$obj_appointment = ORM::factory('appointment');//create  appointment object
			$obj_appointment->refappfromid_c = $patientuserid;
			$obj_appointment->refappwithid_c = $objdoctor->id;
			$incidenceId="";
			
			//standard slot type for inclinic appointment
			$objFeesPremium = ORM::factory('Billingdoctorfee')->where('ref_doctorid_c','=', $objdoctor->id)->where('ref_modeid_c','=','1')->where('status_c','=','active')->find();
			if($newIncidence == "true")
			{
				$obj_incident = ORM::factory('incident');
				$obj_incident->incidentsname_c = $incidence;
				$obj_incident->incidentdate_c = date('Y-m-d H:i', time());
				$obj_incident->save();
				$incidenceId =$obj_incident->id;
				//$obj_appointment->reasonsymptom_c = $incidence;
				if($objFeesPremium->firsttimefeesinclinic_c != "")
					$obj_appointment->rate_c = $objFeesPremium->firsttimefeesinclinic_c;
				else
					$obj_appointment->rate_c = "0.00";
			}
			else
			{
				$obj_incident = ORM::factory('incident')
								->where('id','=',$incidence)
								->mustfind();
				//$obj_appointment->reasonsymptom_c = $obj_incident->incidentsname_c;
				$incidenceId =$incidence;
				if($objFeesPremium->followupfeesinclinic_c != "")
					$obj_appointment->rate_c = $objFeesPremium->followupfeesinclinic_c;
				else
					$obj_appointment->rate_c = "0.00";
			}

			$obj_appointment->scheduledstarttime_c = date('Y-m-d H:i', time());
			$obj_appointment->displaytime_c = $obj_appointment->scheduledstarttime_c;
			$obj_appointment->refappointmentstatusesid_c=2;
			$obj_appointment->status_c= 'fromsystem';
			$obj_appointment->refmode_c='3';
			$obj_appointment->paymentmode_c='In-Clinic';
			
			$obj_appointment->consultationmode_c = 'In-Clinic';
			$obj_appointment->noofappslots_c= '1';
			$obj_appointment->refincidentid_c = $incidenceId;
			$obj_appointment->consultationtype_c = "Ad-hoc";
			$obj_appointment->save();
			//$string_URL ='cemrdashboard/view?appid='.$obj_appointment->id.'&role=doc&name=Dr.'.$obj_user->Firstname_c; // connect to old emr page
			//$new_doctors = Kohana::$config->load('test_doctors');
			//$is_new_doctor = in_array($obj_user->id, $new_doctors['doctors']);
			//if($is_new_doctor){
				if(isset($_GET["quick"]) && $_GET["quick"] == 1){
					$string_URL ='cconsultation/view?appid='.$obj_appointment->id.'&role=doc&name=Dr.'.$obj_user->Firstname_c.'&quick=1';
				}else{
					if($newIncidence == "true"){
						$string_URL ='cconsultation/view?appid='.$obj_appointment->id.'&role=doc&name=Dr.'.$obj_user->Firstname_c.'&p='.$consultationprofile;
					}else{
						$string_URL ='cconsultation/view?appid='.$obj_appointment->id.'&role=doc&name=Dr.'.$obj_user->Firstname_c.'&p='.$consultationprofile;
						$string_URL = $string_URL.'#/';
					}
				}
			//}
			if(isset($_POST)){
				if(isset($_POST['ajax'])){
					if($_POST['ajax'] == 'true'){
						echo '/ayushman/'.$string_URL;die;
					}
				}
			}
			Request::current()->redirect($string_URL);
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}			
	}
	
		public function action_connectnewinclinc()
	{
		try{
			$patientuserid	= $_GET["patientuserid"];
			if($patientuserid != 'undefined')
			{
			$obj_user 	= Auth::instance()->get_user();
			
			$newIncidence = $_GET["newIncidence"];
			$incidence = $_GET["incidence"];
			$consultationprofile = '';
			if(isset($_GET["p"])){
					$consultationprofile = $_GET["p"];
			}
			$objdoctor = new Model_Doctor;
			$objdoctor->where('refdoctorsid_c','=', $obj_user->id)->find();
			$obj_appointment = ORM::factory('appointment');//create  appointment object
			$obj_appointment->refappfromid_c = $patientuserid;
			$obj_appointment->refappwithid_c = $objdoctor->id;
			$incidenceId="";
			
			//standard slot type for inclinic appointment
			$objFeesPremium = ORM::factory('Billingdoctorfee')->where('ref_doctorid_c','=', $objdoctor->id)->where('ref_modeid_c','=','1')->where('status_c','=','active')->find();
			if($newIncidence == "true")
			{
				$obj_incident = ORM::factory('incident');
				$obj_incident->incidentsname_c = $incidence;
				$obj_incident->incidentdate_c = date('Y-m-d H:i', time());
				$obj_incident->save();
				$incidenceId =$obj_incident->id;
				//$obj_appointment->reasonsymptom_c = $incidence;
				if($objFeesPremium->firsttimefeesinclinic_c != "")
					$obj_appointment->rate_c = $objFeesPremium->firsttimefeesinclinic_c;
				else
					$obj_appointment->rate_c = "0.00";
			}
			else
			{
				$obj_incident = ORM::factory('incident')
								->where('id','=',$incidence)
								->mustfind();
				//$obj_appointment->reasonsymptom_c = $obj_incident->incidentsname_c;
				$incidenceId =$incidence;
				if($objFeesPremium->followupfeesinclinic_c != "")
					$obj_appointment->rate_c = $objFeesPremium->followupfeesinclinic_c;
				else
					$obj_appointment->rate_c = "0.00";
			}

			$obj_appointment->scheduledstarttime_c = date('Y-m-d H:i', time());
			$obj_appointment->displaytime_c = $obj_appointment->scheduledstarttime_c;
			$obj_appointment->refappointmentstatusesid_c=2;
			$obj_appointment->status_c= 'fromsystem';
			$obj_appointment->refmode_c='3';
			$obj_appointment->paymentmode_c='In-Clinic';
			
			$obj_appointment->consultationmode_c = 'In-Clinic';
			$obj_appointment->noofappslots_c= '1';
			$obj_appointment->refincidentid_c = $incidenceId;
			$obj_appointment->consultationtype_c = "Ad-hoc";
			$obj_appointment->save();
			//$string_URL ='cemrdashboard/view?appid='.$obj_appointment->id.'&role=doc&name=Dr.'.$obj_user->Firstname_c; // connect to old emr page
			//$new_doctors = Kohana::$config->load('test_doctors');
			//$is_new_doctor = in_array($obj_user->id, $new_doctors['doctors']);
			//if($is_new_doctor){
				if(isset($_GET["quick"]) && $_GET["quick"] == 1){
					$string_URL ='cconsultation/view#/doctordashboardconsultation?appid='.$obj_appointment->id.'&patient_id='.$patientuserid.'&role=doc&name=Dr.'.$obj_user->Firstname_c.'&drid='.$obj_appointment->refappwithid_c.'&quick=1';
				}else{
					if($newIncidence == "true"){
						//$string_URL ='cconsultation/view#/doctordashboardconsultation?appid='.$obj_appointment->id.'&role=doc&name=Dr.'.$obj_user->Firstname_c.'&p='.$consultationprofile;
					}else{
					//	$string_URL ='cconsultation/view#/doctordashboardconsultation?appid='.$obj_appointment->id.'&role=doc&name=Dr.'.$obj_user->Firstname_c.'&p='.$consultationprofile;
						$string_URL = $string_URL.'#/';
					}
				}
			//}
			if(isset($_POST)){
				if(isset($_POST['ajax'])){
					if($_POST['ajax'] == 'true'){
						echo '/ayushman/'.$string_URL;die;
					}
				}
			}
			Request::current()->redirect($string_URL);
		}
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}			
	}
	
	public function action_connectincompleteconsultation()
	{
		try{
			
			$patientuserid	= $_GET["patientuserid"];
			$patientuserappid	= $_GET["patientappid"];
			if($patientuserid != 'undefined')
			{
					$obj_user 	= Auth::instance()->get_user();
				$newIncidence = $_GET["newIncidence"];
				$incidence = $_GET["incidence"];
				$consultationprofile = '';
				if(isset($_GET["p"])){
						$consultationprofile = $_GET["p"];
				}
			$objdoctor = new Model_Doctor;
			$objdoctor->where('refdoctorsid_c','=', $obj_user->id)->find();
			$obj_appointment = ORM::factory('appointment');//create  appointment object
			$obj_appointment->refappfromid_c = $patientuserid;
			$obj_appointment->refappwithid_c = $objdoctor->id;
			$incidenceId="";	
					if(isset($_GET["quick"]) && $_GET["quick"] == 1){
						$string_URL ='cconsultation/view#/doctordashboardconsultation?appid='.$patientuserappid.'&patient_id='.$patientuserid.'&role=doc&name=Dr.'.$obj_user->Firstname_c.'&drid='.$obj_appointment->refappwithid_c.'&quick=1';
					}else{
						if($newIncidence == "true"){
							//$string_URL ='cconsultation/view#/doctordashboardconsultation?appid='.$patientuserappid.'&patient_id='.$patientuserid.'&role=doc&name=Dr.'.$obj_user->Firstname_c.'&p='.$consultationprofile;
						}else{
						//	$string_URL ='cconsultation/view#/doctordashboardconsultation?appid='.$patientuserappid.'&patient_id='.$patientuserid.'&role=doc&name=Dr.'.$obj_user->Firstname_c.'&p='.$consultationprofile;
							$string_URL = $string_URL.'#/';
						}
					}
				//}
					if(isset($_POST)){
						if(isset($_POST['ajax'])){
							if($_POST['ajax'] == 'true'){
								echo '/ayushman/'.$string_URL;die;
							}
						}
					}
				Request::current()->redirect($string_URL);
			}
		}
			catch(Exception $e)
			{
				throw new Exception($e);
			}			
	}
}

<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Cmigrate extends Controller{

  public function action_operationdetail(){
    $patientArray = include_once("/var/www/html/ayushman/db/out/Patient.php");
    $success_file_name = "/var/www/html/ayushman/db/out/OperationSuccess.php";
    $errors_file_name = "/var/www/html/ayushman/db/out/OperationErrors.php";
    $patientArray = $patientArray["report"];
    $handle = fopen("/var/www/html/ayushman/db/Operation details.csv", "r");
    $cols = fgetcsv($handle);
    $errors = Array();
    $success = Array();
    while(($record = fgetcsv($handle)) != False){
      $record_patient_id = $record[1];
      if(!isset($patientArray[$record_patient_id])){
	array_push($errors, $record[0]);
        file_put_contents($errors_file_name, "<?php defined ('SYSPATH'); return array( 'report' => " . var_export($errors, true) . ");?>");
	continue;
      }
      $patientId =  $patientArray[$record_patient_id];
      $app_start_time = $record[2];
      if($record[8] == ""){
        $app_start_time = $record[9];
      }	
      $app_start_time = date('Y-m-d',strtotime(str_replace('/','-',$app_start_time)));
      $appObj = ORM::factory('appointment');
      $appObj->refappfromid_c = $patientId;
      $appObj->refappwithid_c = 85;
      $appObj->reasonsymptom_c = "Operation";
      $appObj->scheduledstarttime_c = $app_start_time;
      $appObj->displaytime_c 	    = $app_start_time;
      $appObj->refappointmentstatusesid_c = 1;
      $appObj->refincidentid_c = 3010;
      $appObj->consultationmode_c = "In-clinic";
      $first_appointment_id		  =      $appObj->save();

      $exam_data = $this->prepare_operation_data($record);
      $examObj = ORM::factory('textexamination');
      $examObj->ref_app_id = $first_appointment_id;
      $examObj->text 	   = $exam_data;
      $examObj->visibility = 1;
      $examObj->save();

      $success[$record[0]] = $first_appointment_id->id;
      file_put_contents($success_file_name, "<?php defined ('SYSPATH'); return array( 'report' => " . var_export($success, true) . ");?>");
    } 
  }

  public function action_semenanalysis(){
    $caseArray = include_once("/var/www/html/ayushman/db/out/SterileCasesSuccess.php");
    $handle = fopen("/var/www/html/ayushman/db/Semen Analysis.csv", "r");
    $success_file_name = "/var/www/html/ayushman/db/out/SemenAnalysisSuccess.php";
    $errors_file_name = "/var/www/html/ayushman/db/out/SemenAnalysisErrors.php";

    $caseArray = $caseArray['report'];
    $success = array();
    $errors = array();
    $completed_record = array();

    $cols = fgetcsv($handle);
    $tracker_cols = array();
    foreach($cols as $key=>$value){
      if($key >= 2 && $key != 14)
        array_push($tracker_cols, $value);
    }
    $tracker_param_object = new Model_Trackparameter;
    $parameter_details = $tracker_param_object->get_parameter_ids($tracker_cols);
    while(($record = fgetcsv($handle)) != False){
      $tracker_data = array_slice($record, 2);
      $tracker_data[0] = strtotime(date('Y-m-d',strtotime(str_replace('/','-',$tracker_data[0]))));
      $sterile_id = $record[1];
      if(!isset($caseArray[$sterile_id])){
        array_push($errors, $record[0]);
        file_put_contents($errors_file_name, "<?php defined ('SYSPATH'); return array( 'report' => " . var_export($errors, true) . ");?>");
	continue;
      }
      $app_info = $caseArray[$sterile_id];
      foreach($app_info as $key=>$value){
        $appointment_id = $key;
      }
      if(isset($completed_record[$sterile_id])){
        $tracker_id = $completed_record[$sterile_id];
      }
      else{
        $tracker_id = $this->create_tracksheet($appointment_id);
        $tracksheet_param_object = new Model_Tracksheetparameter;
        $tracksheet_param_object->update_tracker_parameters($tracker_id, $parameter_details);
      }

      $tracker_val_object = new Model_Trackvalue;
      $tracker_val_object->add_tracker_record($tracker_id, $tracker_data, $parameter_details);
      $appObj = ORM::factory('appointment')->where('id','=',$appointment_id)->find();
      $success[$record[1]] = $appObj->refappfromid_c;
      $completed_record[$record[1]] = $tracker_id;
      file_put_contents($success_file_name, "<?php defined ('SYSPATH'); return array( 'report' => " . var_export($success, true) . ");?>");

    }
  }

  public function action_ovulationdetails(){
    $caseArray = include_once("/var/www/html/ayushman/db/out/SterileCasesSuccess.php");
    $handle = fopen("/var/www/html/ayushman/db/Ovulation details.csv", "r");
    $success_file_name = "/var/www/html/ayushman/db/out/OvulationDetailsSuccess.php";
    $errors_file_name = "/var/www/html/ayushman/db/out/OvulationDetailsErrors.php";

    $caseArray = $caseArray['report'];
    $success = array();
    $errors = array();
    $completed_record = array();

    $cols = fgetcsv($handle);
    $tracker_cols = array();
    foreach($cols as $key=>$value){
      if($key >= 2 && $key != 14)
        array_push($tracker_cols, $value);
    }
    $tracker_param_object = new Model_Trackparameter;
    $parameter_details = $tracker_param_object->get_parameter_ids($tracker_cols);
    while(($record = fgetcsv($handle)) != False){
      $tracker_data = array_slice($record, 2);
      $tracker_data[0] = strtotime(date('Y-m-d',strtotime(str_replace('/','-',$tracker_data[0]))));
      $sterile_id = $record[1];
      if(!isset($caseArray[$sterile_id])){
        array_push($errors, $record[0]);
        file_put_contents($errors_file_name, "<?php defined ('SYSPATH'); return array( 'report' => " . var_export($errors, true) . ");?>");
	continue;
      }
      $app_info = $caseArray[$sterile_id];
      foreach($app_info as $key=>$value){
        $appointment_id = $key;
      }
      if(isset($completed_record[$sterile_id])){
        $tracker_id = $completed_record[$sterile_id];
      }
      else{
        $tracker_id = $this->create_tracksheet($appointment_id);
        $tracksheet_param_object = new Model_Tracksheetparameter;
        $tracksheet_param_object->update_tracker_parameters($tracker_id, $parameter_details);
      }

      $tracker_val_object = new Model_Trackvalue;
      $tracker_val_object->add_tracker_record($tracker_id, $tracker_data, $parameter_details);
      $appObj = ORM::factory('appointment')->where('id','=',$appointment_id)->find();
      $success[$record[1]] = $appObj->refappfromid_c;
      $completed_record[$record[1]] = $tracker_id;
      file_put_contents($success_file_name, "<?php defined ('SYSPATH'); return array( 'report' => " . var_export($success, true) . ");?>");
    }
  }

  public function action_sterilecases(){
    $patientArray = include_once("/var/www/html/ayushman/db/out/Patient.php");
    $success_file_name = "/var/www/html/ayushman/db/out/SterileCasesSuccess.php";
    $errors_file_name = "/var/www/html/ayushman/db/out/SterileCasesErrors.php";
    $patientArray = $patientArray["report"];
    $handle = fopen("/var/www/html/ayushman/db/Sterile cases.csv", "r");

    $errors = array();
    $success=array();
    $result = array();
    $cols = fgetcsv($handle);
    while(($record = fgetcsv($handle)) != False){
      $record_patient_id = $record[1];
      if(!isset($patientArray[$record_patient_id])){
	array_push($errors, $record[0]);
        file_put_contents($errors_file_name, "<?php defined ('SYSPATH'); return array( 'report' => " . var_export($errors, true) . ");?>");
	continue;
      }
      $patientId =  $patientArray[$record_patient_id];
      $app_start_time = $record[11];
      $app_start_time = date('Y-m-d',strtotime(str_replace('/','-',$app_start_time)));
      $appObj = ORM::factory('appointment');
      $appObj->refappfromid_c = $patientId;
      $appObj->refappwithid_c = 85;
      $appObj->reasonsymptom_c = "Sterile";
      $appObj->scheduledstarttime_c = $app_start_time;
      $appObj->displaytime_c 	    = $app_start_time;
      $appObj->refappointmentstatusesid_c = 1;
      $appObj->refincidentid_c = 3011;
      $appObj->consultationmode_c = "In-clinic";
      $appointment_id		  =      $appObj->save();

      $main_complaint_obj = ORM::factory('textcomplaint');
      $main_complaint_obj->ref_app_id = $appointment_id;
      $main_complaint_obj->text = $record[6];
      $main_complaint_obj->visibility = 1;
      $main_complaint_obj->save();

      $exam_data = $this->prepare_sterile_data($record);
      $examObj = ORM::factory('textexamination');
      $examObj->ref_app_id = $appointment_id;
      $examObj->text 	   = $exam_data;
      $examObj->visibility = 1;
      $examObj->save();

      $diagnosisObj = ORM::factory('textdiagnosisnote');
      $diagnosisObj->ref_app_id = $appointment_id;
      $diagnosisObj->text = $record[52];
      $diagnosisObj->visibility = 1;
      $diagnosisObj->save();
      
      if(!file_exists("/var/www/html/ayushman/db/sterilefollowcsv/$record[0]/"))
        continue;
      $follow_up_file_name = "/var/www/html/ayushman/db/sterilefollowcsv/$record[0]/Sheet1.csv";
      $follow_appointments = array();
      $empty_count = 0;
      if(file_exists($follow_up_file_name)){
	    $follow_handle = fopen($follow_up_file_name, "r");
            $follow_cols = fgetcsv($follow_handle);
      	    while(($follow_record = fgetcsv($follow_handle)) != False){
	        if($follow_record[0] == "" && $follow_record[1] == "" && $follow_record[2] == ""){
		  if($empty_count > 2){
		    break;
		  }
		  else{
		    $empty_count++;
		    continue;
		  }
		}
                $follow_app_start_time = date('Y-m-d',strtotime(str_replace('/','-',$record[0])));
         	$follow_appObj = ORM::factory('appointment');
		$follow_appObj->refappfromid_c = $patientId;
		$follow_appObj->refappwithid_c = 85;
		$follow_appObj->reasonsymptom_c = "Sterile";
		$follow_appObj->scheduledstarttime_c = $follow_app_start_time;
		$follow_appObj->displaytime_c 	    = $follow_app_start_time;
		$follow_appObj->refappointmentstatusesid_c = 1;
		$follow_appObj->refincidentid_c = 3011;
		$follow_appObj->consultationmode_c = "In-clinic";
		$follow_appointment_id		  =      $follow_appObj->save();
		array_push($follow_appointments, $follow_appointment_id->id);

		$follow_diagnosisObj = ORM::factory('textdiagnosisnote');
		$follow_diagnosisObj->ref_app_id = $follow_appointment_id;
		$follow_diagnosisObj->text = $follow_record[1];
		$follow_diagnosisObj->visibility = 1;
		$follow_diagnosisObj->save();

		$follow_preObj = ORM::factory('textprescription');
		$follow_preObj->ref_app_id = $follow_appointment_id;
		$follow_preObj->text = $follow_record[2];
		$follow_preObj->visibility = 1;
		$follow_preObj->save();
	    }
	}
	$success[$record[0]][$appointment_id->id] = $follow_appointments;
	file_put_contents($success_file_name, "<?php defined ('SYSPATH'); return array( 'report' => " . var_export($success, true) . ");?>");
    }  
  }


  public function action_gynaeccases(){
    $patientArray = include_once("/var/www/html/ayushman/db/out/Patient.php");
    $success_file_name = "/var/www/html/ayushman/db/out/GyanecCasesSuccess.php";
    $errors_file_name = "/var/www/html/ayushman/db/out/GyanecCasesError.php";
    $patientArray = $patientArray["report"];
    $handle = fopen("/var/www/html/ayushman/db/Gynaec cases.csv", "r");
    $success = array();
    $errors = array();

    $cols = fgetcsv($handle);
    while(($record = fgetcsv($handle)) != False){
      $record_patient_id = $record[1];
      if(!isset($patientArray[$record_patient_id])){
        array_push($errors, $record[0]);
        file_put_contents($errors_file_name, "<?php defined ('SYSPATH'); return array( 'report' => " . var_export($errors, true) . ");?>");
	continue;
      }
      $patientId =  $patientArray[$record_patient_id];
      $app_start_time = $record[8];
      if($record[8] == ""){
        $app_start_time = $record[2];
      }	
      $app_start_time = date('Y-m-d',strtotime(str_replace('/','-',$app_start_time)));
      $appObj = ORM::factory('appointment');
      $appObj->refappfromid_c = $patientId;
      $appObj->refappwithid_c = 85;
      $appObj->reasonsymptom_c = "Gynaec";
      $appObj->scheduledstarttime_c = $app_start_time;
      $appObj->displaytime_c 	    = $app_start_time;
      $appObj->refappointmentstatusesid_c = 1;
      $appObj->refincidentid_c = 3009;
      $appObj->consultationmode_c = "In-clinic";
      $appointment_id		  =      $appObj->save();

      $main_complaint_obj = ORM::factory('textcomplaint');
      $main_complaint_obj->ref_app_id = $appointment_id;
      $main_complaint_obj->text = $record[3];
      $main_complaint_obj->visibility = 1;
      $main_complaint_obj->save();

      $exam_data = $this->prepare_gynaec_data($record);
      $examObj = ORM::factory('textexamination');
      $examObj->ref_app_id = $appointment_id;
      $examObj->text 	   = $exam_data;
      $examObj->visibility = 1;
      $examObj->save();

      $diagnosisObj = ORM::factory('textdiagnosisnote');
      $diagnosisObj->ref_app_id = $appointment_id;
      $diagnosisObj->text = $record[41];
      $diagnosisObj->visibility = 1;
      $diagnosisObj->save();

      if(!file_exists("/var/www/html/ayushman/db/gynaecfollowcsv/$record[0]/"))
        continue;
      $follow_up_file_name = "/var/www/html/ayushman/db/gynaecfollowcsv/$record[0]/Sheet1.csv";
      $follow_handle = fopen($follow_up_file_name, "r");
      $follow_appointments = array();
      $follow_cols = fgetcsv($follow_handle);
      while(($follow_record = fgetcsv($follow_handle)) != False){
        $follow_app_start_time = date('Y-m-d',strtotime(str_replace('/','-',$follow_record[0])));
      	$follow_appObj = ORM::factory('appointment');
      	$follow_appObj->refappfromid_c = $patientId;
      	$follow_appObj->refappwithid_c = 85;
      	$follow_appObj->reasonsymptom_c = "Gynaec";
      	$follow_appObj->scheduledstarttime_c = $app_start_time;
      	$follow_appObj->displaytime_c 	    = $app_start_time;
      	$follow_appObj->refappointmentstatusesid_c = 1;
      	$follow_appObj->refincidentid_c = 3009;
      	$follow_appObj->consultationmode_c = "In-clinic";
      	$follow_appointment_id		  =      $follow_appObj->save();

	$follow_diagnosisObj = ORM::factory('textdiagnosisnote');
	$follow_diagnosisObj->ref_app_id = $follow_appointment_id;
      	$follow_diagnosisObj->text = $follow_record[1];
      	$follow_diagnosisObj->visibility = 1;
      	$follow_diagnosisObj->save();

	$follow_preObj = ORM::factory('textprescription');
	$follow_preObj->ref_app_id = $follow_appointment_id;
      	$follow_preObj->text = $follow_record[2];
      	$follow_preObj->visibility = 1;
      	$follow_preObj->save();
	array_push($follow_appointments, $follow_appointment_id->id);
      }
      $success[$record[0]][$appointment_id->id] = $follow_appointments;

      file_put_contents($success_file_name, "<?php defined ('SYSPATH'); return array( 'report' => " . var_export($success, true) . ");?>");
    }
  }
  public function action_antenatalcases(){
    $patientArray = include_once("/var/www/html/ayushman/db/out/Patient.php");
    $success_file_name = "/var/www/html/ayushman/db/out/AntenatalCasesSuccess.php";
    $errors_file_name = "/var/www/html/ayushman/db/out/AntenatalCasesErrors.php";
    $patientArray = $patientArray["report"];
    $handle = fopen("/var/www/html/ayushman/db/Antenatal cases.csv", "r");
    $cols = fgetcsv($handle);
    $errors = Array();
    $success = Array();

    while(($record = fgetcsv($handle)) != False){
      $record_patient_id = $record[1];
      if(!isset($patientArray[$record_patient_id])){
	array_push($errors, $record[0]);
        file_put_contents($errors_file_name, "<?php defined ('SYSPATH'); return array( 'report' => " . var_export($errors, true) . ");?>");
	continue;
      }
      $patientId =  $patientArray[$record_patient_id];

      $app_start_time = $record[8];
      if($record[8] == ""){
        $app_start_time = $record[13];
      }	
      $app_start_time = date('Y-m-d',strtotime(str_replace('/','-',$app_start_time)));
      $appObj = ORM::factory('appointment');
      $appObj->refappfromid_c = $patientId;
      $appObj->refappwithid_c = 85;
      $appObj->reasonsymptom_c = "Antenatal";
      $appObj->scheduledstarttime_c = $app_start_time;
      $appObj->displaytime_c 	    = $app_start_time;
      $appObj->refappointmentstatusesid_c = 1;
      $appObj->refincidentid_c = 3007;
      $appObj->consultationmode_c = "In-clinic";
      $first_appointment_id		  =      $appObj->save();

      $exam_data = $this->prepare_antenatal_data($record);
      $examObj = ORM::factory('textexamination');
      $examObj->ref_app_id = $first_appointment_id;
      $examObj->text 	   = $exam_data;
      $examObj->visibility = 1;
      $examObj->save();

      $app_start_time = $record[26];
      $app_start_time = date('Y-m-d',strtotime(str_replace('/','-',$app_start_time)));
      $appObj = ORM::factory('appointment');
      $appObj->refappfromid_c = $patientId;
      $appObj->refappwithid_c = 85;
      $appObj->reasonsymptom_c = "Delivery";
      $appObj->scheduledstarttime_c = $app_start_time;
      $appObj->displaytime_c 	    = $app_start_time;
      $appObj->refappointmentstatusesid_c = 1;
      $appObj->refincidentid_c = 3008;
      $appObj->consultationmode_c = "In-clinic";
      $appointment_id		  =      $appObj->save();

      $exam_data = $this->prepare_delivery_data($record);
      $examObj = ORM::factory('textexamination');
      $examObj->ref_app_id = $appointment_id;
      $examObj->text 	   = $exam_data;
      $examObj->visibility = 1;
      $examObj->save();

      if($record[43] != ""){
      $obj = ORM::factory('patientriskfactor');
      $obj->refpatientsid_c = $patientId;
      $obj->refwriterid_c = 383;
      $obj->risktext_c = 'Antenatal: '.$record[43];
      $obj->save();
      }
      $success[$record[0]] = $first_appointment_id->id;
      file_put_contents($success_file_name, "<?php defined ('SYSPATH'); return array( 'report' => " . var_export($success, true) . ");?>");
    }
  }

  public function action_antenatalcharts(){
    $caseArray = include_once("/var/www/html/ayushman/db/out/AntenatalCasesSuccess.php");
    $handle = fopen("/var/www/html/ayushman/db/Antenatal chart.csv", "r");
    $success_file_name = "/var/www/html/ayushman/db/out/AntenatalChartsSuccess.php";
    $errors_file_name = "/var/www/html/ayushman/db/out/AntenatalChartsErrors.php";

    $caseArray = $caseArray['report'];
    $success = array();
    $errors = array();
    $completed_record = array();

    $cols = fgetcsv($handle);
    $tracker_cols = array();
    array_push($tracker_cols, "Date");
    foreach($cols as $key=>$value){
      if($key > 2 && $key != 14)
        array_push($tracker_cols, $value);
    }

    $tracker_param_object = new Model_Trackparameter;
    $parameter_details = $tracker_param_object->get_parameter_ids($tracker_cols);

    while(($record = fgetcsv($handle)) != False){
      $tracker_data = array_slice($record, 2);
      $risk = array_pop($tracker_data);
      $tracker_data[0] = strtotime(date('Y-m-d',strtotime(str_replace('/','-',$tracker_data[0]))));
      $antenatal_case_id = $record[1];
      if(!isset($caseArray[$antenatal_case_id])){
        array_push($errors, $record[0]);
        file_put_contents($errors_file_name, "<?php defined ('SYSPATH'); return array( 'report' => " . var_export($errors, true) . ");?>");
	continue;
      }
      $appointment_id = $caseArray[$antenatal_case_id];
      if(isset($completed_record[$antenatal_case_id])){
        $tracker_id = $completed_record[$antenatal_case_id];
      }
      else{
        $tracker_id = $this->create_tracksheet($appointment_id);
        $tracksheet_param_object = new Model_Tracksheetparameter;
        $tracksheet_param_object->update_tracker_parameters($tracker_id, $parameter_details);
      }

      $tracker_val_object = new Model_Trackvalue;
      $tracker_val_object->add_tracker_record($tracker_id, $tracker_data, $parameter_details);
      $appObj = ORM::factory('appointment')->where('id','=',$appointment_id)->find();
      if(trim($risk) != ""){
        $obj = ORM::factory('patientriskfactor');
      	$obj->refpatientsid_c = $appObj->refappfromid_c;
      	$obj->refwriterid_c = 383;
      	$obj->risktext_c = 'Antenatal Problems: '.$risk;
      	$obj->save();
      }
      $success[$record[1]] = $appObj->refappfromid_c;
      $completed_record[$record[1]] = $tracker_id;
      file_put_contents($success_file_name, "<?php defined ('SYSPATH'); return array( 'report' => " . var_export($success, true) . ");?>");

    }
  }
  private function create_tracksheet($app_id){
    $app_object = ORM::factory('appointment')->where('id','=',$app_id)->find();
    $incident_object = ORM::factory('incident')->where('id', '=', $app_object->refincidentid_c)->find();
    $all_tracksheets = ORM::factory('tracksheet')->where('refincidentid_c', '=', $app_object->refincidentid_c)->where('refpatientid_c','=',$app_object->refappfromid_c)->find_all();
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
    $new_tracksheet->refcreaterid_c = 383;
    $new_tracksheet_id = $new_tracksheet->save()->id;
    return ($new_tracksheet_id);
  }

  public function action_migrate(){
    $handle = fopen("/var/www/html/ayushman/db/Patients.csv", "r");
    $file_name = "/var/www/html/ayushman/db/out/Patient.php";
    $patientCols = fgetcsv($handle);
    $count = 0;
    $result = array();
    while(($record = fgetcsv($handle)) != False){
      $user_id = $this->create_user($record);
      $result[$record[0]] = $user_id;
      $this->adddoctortofavoritetotable(85, $user_id);
      $this->save_personal_habits($record, $user_id);
      $this->save_address($record, $user_id);
      $this->save_family_history($record, $user_id);
      $this->save_habits($record, $user_id);
      $this->save_surgeries($record, $user_id);
      $this->save_past_medical($record, $user_id);
      $this->save_risk($record, $user_id, 383);
      file_put_contents($file_name, "<?php defined ('SYSPATH'); return array( 'report' => " . var_export($result, true) . ");?>");
    }
  }

  private function prepare_delivery_data($record){
    $label = array( 27 => "Time of Admission", 28 => "Mode of Induction", 29 => "Stage 1", 30 => "Stage 2", 31 => "Stage 3", 32 => "Mode Of Delivery",33 => "Date Of Delivery", 34 => "Time of Delivery", 35 => "Sex", 36 => "Weight", 37 => "REsuscitation", 38 => "Puerperium", 39 => "OTHERS", 40 => "FTT", 41 => "STT", 42 => "Discharge Date");

    $exam_text = "";
    foreach($label as $key=>$value){
      if($record[$key])
        $exam_text = $exam_text . "  ●  " .$value . "-> " . $record[$key]. ". ";
    }
    return $exam_text;
  }

  private function prepare_operation_data($record){
    $label = array( 3 => "Name", 4 => "Indication", 5 => "Ans Detail", 7 => "Notes", 8 => "Recovery", 9 => "Admit Date", 10 => "Discharge date", 11 => "Advice");

    $exam_text = "";
    foreach($label as $key=>$value){
      if($record[$key])
        $exam_text = $exam_text . "  ●  " .$value . "-> " . $record[$key]. ". ";
    }
    return $exam_text;
  }

  private function prepare_antenatal_data($record){
    $label = array(2 => "Contraceptives",3 => "Menstural Data",4 => "LMP", 5 => "EDD" , 6 => "EDD by USG" ,7 => "Date of Examination" ,8 => "CVS",9 => "RS",10 => "Breast", 11 => "Height", 12 => "Pelvic Assesment",13 => "First Investigation", 14 => "Haemoglobin" ,15 => "BloodGroup", 16 => "Husband's BloodGroup", 17 => "BSL F", 18 => "BSL PP", 19 => "BL UREA", 20 => "VDRL", 21 => "HIV", 22 => "HBSAG", 23 => "Urine", 24 => "Stool",25 => "Other Investigations");
    
    $exam_text = "";
    foreach($label as $key=>$value){
      if($record[$key])
        $exam_text = $exam_text . "  ●  " .$value . "-> " . $record[$key]. ". ";
    }
    return $exam_text;
  }

  private function prepare_sterile_data($record){
    $label = array(2 => "Sex History", 3 => "Married For", 4 => "Infertility Type", 5 => "Impression", 7 => "Menarche", 8 => "PMC", 9 => "PRMC", 10 => "LMP", 12 => "Vulva", 13 => "Vagina", 14 => "Cervix", 15 => "Descent", 16 => "Size", 17 => "Shape", 18 => "Mobility", 19 => "Fornices", 20 => "CVS", 21 => "RS", 22 => "Breast", 23 => "Height", 24 => "Pulse", 25 => "BP", 26 => "Palor", 27 => "OtherExamDetails", 28 => "PCT", 29 => "D&C", 30 => "EndoHP", 31 => "Others", 32 => "Lap", 33 => "HSG", 35 => "PapsDate", 36 => "Paps", 37 => "UsgDate", 38 => "USG", 39 => "Haemoglobin", 40 => "BloodGroup", 41 => "BSL_F", 42 => "BSL_PP", 43 => "BL_UREA", 44 => "VDRL", 45 => "HIV", 46 => "HBSAG", 47 => "Urine", 48 => "Stool", 49 => "Other Investigations", 50 => "Notes", 53 => "Plan", 54 => "FSH Date", 55 => "FSH", 56 => "LH Date", 57 => "LH", 58 => "Serum PRL Date", 59 => "Serum PRL", 60 => "Other Hormones", 62 => "Husband's Bl group", 63 => "VDRl Husband", 64 => "HIV Husband", 65 => "Others Husband");
    
    $exam_text = "";
    foreach($label as $key=>$value){
      if($record[$key])
        $exam_text = $exam_text . "  ●  " .$value . "-> " . $record[$key]. ". ";
    }
    return $exam_text;
  }

  private function prepare_gynaec_data($record){
    $label = array(4 => "Menarche",5 => "PMC" , 6 => "PRMC" , 7 => "LMP" , 9 => "Vulva" , 10 => "Vagina" , 11 => "Cervix" , 12 => "Descent" , 13 => "Size" , 14 => "Shape", 15 => "Mobility" , 16 => "Fornices" , 17 => "CVS" , 18 => "RS" , 19 => "Breast" , 20 => "Height" , 21 => "Pulse" , 22 => "BP" , 23 => "Palor" , 24 => "Other Exam Details" , 25 => "First Investigation" , 26 => "Paps Date" , 27 => "Paps" , 28 => "Haemoglobin" , 29 => "BloodGroup" , 30 => "BSL_F" , 31 => "BSL_PP" , 32 => "BL_UREA" , 33 => "VDRL" , 34 => "HIV" , 35 => "HBSAG" , 36 => "Urine" , 37 => "Stool" , 38 => "Other Investigations" , 39 => "Usg Date" , 40 => "USG" , 42 => "Plan" );
    $exam_text = "";
    foreach($label as $key=>$value){
      if($record[$key])
        $exam_text = $exam_text . "  ●  " .$value . "-> " . $record[$key]. ". ";
    }
    return $exam_text;
  }

  private function save_risk($record, $user_id, $doctor_id){
    if($record[44] != ""){
      $obj = ORM::factory('patientriskfactor');
      $obj->refpatientsid_c = $user_id;
      $obj->refwriterid_c = $doctor_id;
      $obj->risktext_c = 'Anasthetic Problems: '.$record[44];
      $obj->save();
    }
  }

  private function save_past_medical($record, $user_id){
    if(trim($record[54]) != ""){
      $obj = ORM::factory('pathistoryquestionanswer');
      $obj->ref_patientid_c = $user_id;
      $obj->ref_questionid_c = 7;
      $obj->answer_c = $record[54];
      $obj->save();
    }
  }

  private function save_surgeries($record, $user_id){
      if(trim($record[55]) != ""){
        $patientobj = ORM::factory('patient')->where('repatientsuserid_c','=', $user_id)->find();
      	$obj = ORM::factory('pathistorysurgerydetail');
      	$obj->patientid_c = $patientobj->id;
      	$obj->surgeryname_c = $record[55];
      	$obj->save();
      }	
  }
  private function save_habits($record, $user_id){
    $patientobj = ORM::factory('patient')->where('repatientsuserid_c','=', $user_id)->find();
    $patientobj->smoking_c = (strtolower($record[49])=='true') ? 'Yes': 'No';
    $patientobj->alcohol_c = (strtolower($record[50])=='true') ? 'Yes': 'No';
    $patientobj->save();
  }
  private function save_family_history($record, $user_id){
    $patientobj = ORM::factory('patient')->where('repatientsuserid_c','=', $user_id)->find();
    $string = "";
    if(trim($record[45]) != ""){
      $val = ((strtolower($record[45])=='true') ? 'Yes': 'No');
      $string = $string . "Congenital Anomalies: " . $val . '. ';
    }
    if(trim($record[46]) != ""){
      $val = ((strtolower($record[46])=='true') ? 'Yes': 'No');
      $string = $string . "Diabetes: " . $val . '. ';
    }
    if(trim($record[47]) != ""){
      $val = ((strtolower($record[47])=='true') ? 'Yes': 'No');
      $string = $string . "Hypertension: " . $val . '. ';
    }
    if(trim($record[48]) != ""){
      $val = ((strtolower($record[48])=='true') ? 'Yes': 'No');
      $string = $string . "Others: " . $val . '. ';
    }
    $obj = ORM::factory("patientrelativehistory");
    $obj->refpatrelhistpatientsid_c = $patientobj->id;
    $obj->relationship_c = "Mother";
    $obj->medicalhistory_c = $string;
    $obj->save();

    $obj = ORM::factory("patientrelativehistory");
    $obj->refpatrelhistpatientsid_c = $patientobj->id;
    $obj->relationship_c = "Father";
    $obj->save();
  }

  private function save_address($record, $user_id){
    $obj = ORM::factory('address');
    $obj->line1_c = $record[4] . ', ' . $record[5];
    $obj->city_c = $record[6];
    $obj->state_c = $record[7];
    $obj->country_c = $record[8];
    $obj->pin_c = $record[9];
    $address_id = $obj->save();
    $user = ORM::factory('user')->where('id', '=', $user_id)->find();
    $user->refaddresshome1_c = $address_id;
    $user->save();
  }
  private function save_personal_habits($record, $user_id){
    $obj = ORM::factory('patmedicalproblem');
    $obj->ref_patientid_c = $user_id;
    $obj->disease_c = 11; //Hypertension
    $obj->status_c = ((strtolower($record[38]) == 'true') ? 2 : 1);
    $obj->save();
    $obj = ORM::factory('patmedicalproblem');
    $obj->ref_patientid_c = $user_id;
    $obj->disease_c = 12; //Diabetes
    $obj->status_c = ((strtolower($record[40]) == 'true') ? 2 : 1);
    $obj->save();
    $obj = ORM::factory('patmedicalproblem');
    $obj->ref_patientid_c = $user_id;
    $obj->disease_c = 14; //Sickle
    $obj->status_c = ((strtolower($record[41]) == 'true') ? 2 : 1);
    $obj->save();
    $obj = ORM::factory('patmedicalproblem');
    $obj->ref_patientid_c = $user_id;
    $obj->disease_c = 13;//Renal
    $obj->status_c = ((strtolower($record[39]) == 'true') ? 2 : 1);
    $obj->save();
    $obj = ORM::factory('patmedicalproblem');
    $obj->ref_patientid_c = $user_id;
    $obj->disease_c = 15; //Blood Transfusion
    $obj->status_c = ((strtolower($record[37]) == 'true') ? 2 : 1);
    $obj->save();
    $obj = ORM::factory('patmedicalproblem');
    $obj->ref_patientid_c = $user_id;
    $obj->disease_c = 10; //Others
    $obj->status_c = ($record[42] ? 2 : 1);
    $obj->remark_c = $record[42];
    $obj->save();
  }

  private function create_user($record){
	$password = md5(uniqid(rand()));//create 6 chara password
	$password = substr($password,-8);
	$initialusername = strtolower($this->clean(($record[1])).$this->clean(($record[2])));
	$initialusername = substr($initialusername,0,25);
	$username = $initialusername;
	$userCount = 0;
	while(ORM::factory('user')->where('username','=',$username)->find()->id != null){
	  $userCount++;
	  $username = $initialusername . $userCount;
	}
	$arrPost['username']= $username;
	$arrPost['password']= $password;
	$arrPost['password_confirm'] = $password;
	$activationcode	=  md5(uniqid(rand(), true));
	$user = ORM::factory('user')->create_user($arrPost, array('username','password','email'));
	$user->add('roles', ORM::factory('role', array('name' => 'login')));
	$user->add('roles', ORM::factory('role', array('name' => 'patient')));
	$user->Firstname_c	= trim($record[1]);
	$user->lastname_c 	= trim($record[2]);
	$user->phonenohome_c	= trim($record[10]);
	$user->DOB_c 		= date('Y-m-d',strtotime(str_replace('/','-',$record[13])));
	$user->maritalstatus_c 	= ((strtolower($record[14])=='true') ? "Married" : "Single");
	$user->activationcode_c	= $activationcode;
	$user->activationstatus_c	= 'inactive';
	$user->accountcreatedby_c ="staff";
	$user->xmpppassword_c = $user->password ;
	$obj_patient=ORM::factory('patient');
	$obj_patient->repatientsuserid_c = $user->id;
	$obj_patient->save();				
	$user->save();
	return($user->id);
  }

  private function clean($string) {
   $string = str_replace(' ', '', $string); // Replaces all spaces with hyphens.
   $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

   return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
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
}

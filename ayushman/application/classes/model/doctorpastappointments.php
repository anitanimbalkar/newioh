<?php defined('SYSPATH') or die('No direct script access.');
class Model_Doctorpastappointments extends kohana_Ayushmanorm {
	protected $_table_name = 'doctorpastappointments';	

	public function get_pastapps($user_id,$status,$count = null){
		$appcount = $this->where('doctoruserid','=',$user_id)->where('Appointmentstatuses','=',$status)->order_by('unixtimestamp', 'DESC')->count_all();
		if($count == null){
			$apps = $this->where('doctoruserid','=',$user_id)->where('Appointmentstatuses','=',$status)->order_by('unixtimestamp', 'DESC')->find_all();
		}else{
			$apps = $this->where('doctoruserid','=',$user_id)->where('Appointmentstatuses','=',$status)->order_by('unixtimestamp', 'DESC')->limit($count)->find_all();
		}
			
		$arr_apps = array();
				$visibility = 0;
				$visibility = array(1,0);
				
		foreach($apps as $app){	
			$temp = array();
			$temp['appointment_id'] = $app->id;
			//$billGenerated=$app->reftransactionid_c;	
			$billGenerated=$app->pdffilename;	
			$temp['pdffilename'] =  $app->pdffilename;
			// Check if bill generated
			if($billGenerated == NULL){
				$temp['billGenerated'] = 'no';
			}
			else{
				$temp['billGenerated'] = 'yes';
			}
			$user	= new Model_User;
			$patientinfo = $user->get_info($app->patuserid);
			$temp['PatientContactNumber'] = $patientinfo['mobile'];
			$temp['PatientGender'] 	= $patientinfo['PatientGender'];
			$temp['PatientPhoto'] 	= $patientinfo['PatientPhoto'];
			$temp['age'] 			= $patientinfo['age'];
			
			
			$temp['refappfromid_c'] = $app->patuserid;
			$temp['mode'] 			= $app->mode;
			$temp['place'] 			= $app->Place;
			$temp['DateAndTime'] 	= $app->DateAndTime;
			$temp['Patientname'] 	= $app->patientname;
			$temp['incidentsname_c'] = $app->incidentsname_c;			
			$temp['id'] 			= $app->id;
			$temp['status'] 		= $app->status_c;
			$temp['incidentid'] 	= $app->incidentsid_c;
			$temp['incidentname'] 	= $app->incidentsname_c;
			$temp["maincomplaint"] 	= preg_replace('#<br\s*/?>#i', "\n", $app->maincomplaint);
			$temp["examinationsummary"] = preg_replace('#<br\s*/?>#i', "\n", $app->examinationsummary); 
			$temp["diagnosis"] 			= preg_replace('#<br\s*/?>#i', "\n",  $app->diagnosis);
			$temp["investigation"] 		= str_replace('\\n',' \n',  $app->investigation);
			$temp["medicine"] 			= str_replace('\\n',' \n',  $app->medicine);
			$temp["followup"] 			=  $app->followup;
			$temp["examination"] 		=  json_decode($app->examination);
			
			$temp["text_reportparameter"] = $app->reportdata;
			$temp["parameterids"] = $app->reportids;
			
			$prescriptionpath 		= ORM::factory('patientprescriptionsnapshot')->where('refappointmentidforprescriptionsnapshots_c','=',$app->id)->find()->pdfpath_c;
            $temp['prescription'] 	= ($prescriptionpath == null)?'Informationnotyetfilled':$prescriptionpath;
			
			$date 			= new DateTime($app->displaytime_c);
			$temp['date'] 	=  $date->format('d M Y');
			array_push($arr_apps, $temp);
		}
		$temp = array();
		$temp['count'] = $appcount;
		array_push($arr_apps, $temp);
		return $arr_apps;
	}
	
	public function get_pastappcount($user_id,$status){
		$appcount = $this->where('doctoruserid','=',$user_id)->where('Appointmentstatuses','=',$status)->order_by('unixtimestamp', 'DESC')->count_all();
		$arr_apps = array();
		$arr_apps['count'] = $appcount;
		return $arr_apps;
	}
		public function get_pastallappsdata($user_id,$status){
		$appcount = $this->where('doctoruserid','=',$user_id)->where('Appointmentstatuses','=',$status)->order_by('unixtimestamp', 'DESC')->count_all();
		$apps = $this->where('doctoruserid','=',$user_id)->where('Appointmentstatuses','=',$status)->find_all();
		
			
		$arr_apps = array();
				$visibility = 0;
				$visibility = array(1,0);
				
		foreach($apps as $app){	
			$temp = array();
			$temp['appointment_id'] = $app->id;
			//$billGenerated=$app->reftransactionid_c;	
			$billGenerated=$app->pdffilename;	
			$temp['pdffilename'] =  $app->pdffilename;
			// Check if bill generated
			if($billGenerated == NULL){
				$temp['billGenerated'] = 'no';
			}
			else{
				$temp['billGenerated'] = 'yes';
			}
			$user	= new Model_User;
			$patientinfo = $user->get_info($app->patuserid);
			$temp['PatientContactNumber'] = $patientinfo['mobile'];
			$temp['PatientGender'] 	= $patientinfo['PatientGender'];
			$temp['PatientPhoto'] 	= $patientinfo['PatientPhoto'];
			$temp['age'] 			= $patientinfo['age'];
			
			
			$temp['refappfromid_c'] = $app->patuserid;
			$temp['mode'] 			= $app->mode;
			$temp['place'] 			= $app->Place;
			$temp['DateAndTime'] 	= $app->DateAndTime;
			$temp['Patientname'] 	= $app->patientname;
			$temp['incidentsname_c'] = $app->incidentsname_c;			
			$temp['id'] 			= $app->id;
			$temp['status'] 		= $app->status_c;
			$temp['incidentid'] 	= $app->incidentsid_c;
			$temp['incidentname'] 	= $app->incidentsname_c;
			$temp["maincomplaint"] 	= preg_replace('#<br\s*/?>#i', "\n", $app->maincomplaint);
			$temp["examinationsummary"] = preg_replace('#<br\s*/?>#i', "\n", $app->examinationsummary); 
			$temp["diagnosis"] 			= preg_replace('#<br\s*/?>#i', "\n",  $app->diagnosis);
			$temp["investigation"] 		= str_replace('\\n',' \n',  $app->investigation);
			$temp["medicine"] 			= str_replace('\\n',' \n',  $app->medicine);
			$temp["followup"] 			=  $app->followup;
			$temp["examination"] 			=  json_decode($app->examination);
			
			$prescriptionpath 		= ORM::factory('patientprescriptionsnapshot')->where('refappointmentidforprescriptionsnapshots_c','=',$app->id)->find()->pdfpath_c;
            $temp['prescription'] 	= ($prescriptionpath == null)?'Informationnotyetfilled':$prescriptionpath;
			
			$date 			= new DateTime($app->displaytime_c);
			$temp['date'] 	=  $date->format('d M Y');
			array_push($arr_apps, $temp);
		}
		$temp = array();
		$temp['count'] = $appcount;
		array_push($arr_apps, $temp);
		return $arr_apps;
	}	
}
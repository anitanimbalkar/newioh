<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Cdisplayprescriptions extends Controller_Ctemplatewithmenu  {

	public function action_view(){		
		$obj_user 	= Auth::instance()->get_user();
		$content 	= View::factory('vuser/vpatient/vdisplayprescriptions');
		$appid 	= $_GET["appid"];
		
		$objfile = ORM::factory('Appointmentupload')->where('refappuploadappointmentsid_c','=',$appid)->find();
		
		if($objfile->fileid_c != null){
			$file = new helper_Files();
			$return = $file->getFilePath($objfile->fileid_c);
			if($return != ''){
				$arrPrescriptions = array();
				array_push($arrPrescriptions,'<iframe src="/ayushman/'.$return['abspath'].'" style="width:900px; height:600px; padding:10px;"></iframe>');
				$content->bind('arrPrescriptions', $arrPrescriptions);
				$this->template->content = $content;
			}else{
				throw new exception('File Not found');
			}
		}else{
			$objPrescriptions = new Model_Patientprescriptionsnapshot;
			$objPrescriptions = $objPrescriptions->where('refappointmentidforprescriptionsnapshots_c','=',$appid)->find();
			$prescriptionPages = ORM::factory('patientprescriptionfilessnapshot')->where('refpatientprescriptionsnapshotsid','=',	$objPrescriptions->id)->find_all()->as_array();

			$arrPrescriptions = array();
			foreach($prescriptionPages as $objPrescriptions){
				array_push($arrPrescriptions,'<iframe onload="setwidth(this);" src="/'.$objPrescriptions->path_c.'" style="width:1024px; height:768px; padding:10px;"></iframe>');
			}
			$content->bind('arrPrescriptions', $arrPrescriptions);
			$this->template->content = $content;
		}
	}

	public function action_viewfromsystem(){		
	  $app_id = $_GET['appid'];
	  $prescription = array();
	  $prescription['complaint'] = ORM::factory('textcomplaint')->where('ref_app_id', '=', $app_id)->find()->text;
	  $prescription['vitals'] = ORM::factory('textvital')->where('ref_app_id', '=', $app_id)->find()->text;
	  $prescription['symptoms'] = ORM::factory('textsymptom')->where('ref_app_id', '=', $app_id)->find()->text;
	  $prescription['examinations'] = ORM::factory('textexamination')->where('ref_app_id', '=', $app_id)->find()->text;
	  $prescription['diagnosis'] = ORM::factory('textdiagnosisnote')->where('ref_app_id', '=', $app_id)->find()->text;
	  $prescription['investigation'] = ORM::factory('textinvestigation')->where('ref_app_id', '=', $app_id)->find()->text;
	  $prescription['prescription'] = ORM::factory('textprescription')->where('ref_app_id', '=', $app_id)->find()->text;
	  $prescription['follow'] = ORM::factory('textfollowupnote')->where('ref_app_id', '=', $app_id)->find()->text;
	  
	  $content 	= View::factory('vtemplates/vprescription');
	  $content->bind('prescription', $prescription);
	  $this->template->content = $content;
	}
}

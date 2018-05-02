<?php defined('SYSPATH') or die('No direct script access.');
include_once('simple_html_dom.php');
class Cpdfcreater{
	public function createpdf($appid, $timestamp)
	{
		$response_getemrbyidforpdf = $this->getemrbyidforpdf($appid);
		$pdf_path = $this->placepdfvalue($response_getemrbyidforpdf,"visitsummary".$timestamp,"vtemplatevisitsummary.php",true,true,"appointment summary",$appid);
		//$this->placepdfvalue($response_getemrbyidforpdf,"prescription".$timestamp,"vtemplateprescription.php",false,true,"appointment prescription",$appid);
		//$this->	placepdfvalue($response_getemrbyidforpdf,"investigations".$timestamp,"vtemplateinvestigations.php",false,true,"appointment Diagnosis",$appid);
		//$this->placepdfvalue($response_getemrbyidforpdf,"appointmentsummary".$timestamp,"vtemplateappointmentsummary.php",false,false,"subject",$appid);
		return($pdf_path);
	}
	public function getemrbyidforpdf($appid)
	{
		$data = $this-> fgetemrbyidforpdf($appid);
		return (json_encode($data));
	}
	public function fgetemrbyidforpdf($appid)
	{
		$objApp = new Model_Appointment;
		$objApp->where('id','=',$appid)->find();
		
		$data['lbldate']=date('d-M-Y', strtotime($objApp->scheduledstarttime_c));
	//	$data['lbldate']=date('d M Y h:i', time());
		$objdoctors =  ORM::factory('Doctor')->where("id","=",$objApp->refappwithid_c )->find();
		$objPatient = ORM::factory('User')->where('id','=',$objApp->refappfromid_c)->find();
		$data["imgpatientphoto"] = $objPatient->photo_c;
		$data["lblregdnumber"] = $objdoctors->RMPnumber_c;

		$objusers =  ORM::factory('User')->where("id","=",$objdoctors->refdoctorsid_c )->find();
		$data['lblpatientAIN'] = $objPatient->id;
		$data['lbldoctorname'] = 'Dr. '.$objusers->Firstname_c.' '.$objusers->lastname_c;

		
		$objEducation =  ORM::factory('doctoreducation')->where("refdocedudoctorsid_c","=",$objdoctors->id )->findAll();
		$data['lblqualification'] = '';
		foreach($objEducation as $education){
			$objEd = ORM::factory('educationmaster')->where("id","=",$education->refeducationid_c )->find();
			$data['lblqualification'] =$data['lblqualification']." ".$objEd->education_c;
		}
		
		$objSpecialization =  ORM::factory('doctorpracticedomain')->where("refdocpracticedomainddoctorid_c","=",$objdoctors->id )->findAll();
		$data['lblqualification'] = $data['lblqualification'].' (';
		foreach($objSpecialization as $specialization){
			$objDom = ORM::factory('doctordomainmaster')->where("id","=",$specialization->refdoctordomainmasterdomainid_c )->find();
			$data['lblqualification'] =$data['lblqualification']." ".$objDom->domain_c;
		}
		$data['lblqualification'] = $data['lblqualification'].')';
		



	$data["lblcontactnumber"] =  ($objusers->mobileno1_c != "")? "Mob.-".$objusers->mobileno1_c : '';
		$data["lblcontactnumber"] =  ($objusers->phonenohome_c != "")? $data["lblcontactnumber"]." Home(Ph).-".$objusers->phonenohome_c : $data["lblcontactnumber"].'';
		$data["lblcontactnumber"] =  ($objusers->phonenohome_c != "")? $data["lblcontactnumber"]." Work(Ph).-".$objusers->phonenowork_c : $data["lblcontactnumber"].'';
		
		$objaddress =  ORM::factory('Address')->where("id","=",$objusers->refaddresswork_c )->find();
		$objclinic =  ORM::factory('doctorclinic')->where("refdoctorclinicdoctorid_c","=",$objdoctors->id )->where('mode_c','=','In-Clinic')->find();
		$objaddress =  ORM::factory('Address')->where("id","=",$objclinic->refclinicaddressid_c )->find();
		$data['lbladdress'] = $objaddress->line1_c.", ".$objaddress->nearlandmark_c.", ".$objaddress->location_c.", ".$objaddress->city_c." - ".$objaddress->pin_c." (".$objaddress->state_c.", ".$objaddress->country_c.").";
		
		
		$data['lblage'] = "";
		$data['lblnumber'] = $appid;
		$objUsers =  ORM::factory('User')->where("id","=",$objApp->refappfromid_c )->find();
		$data['lblpatientname'] = $objUsers->Firstname_c.' '.$objUsers->lastname_c;
		$objAppointmentInfo = new Model_Doctorappointment;
		$objAppointmentInfo=$objAppointmentInfo->where('appointment_id','=',$appid)->find();
		$data['lblpatientage']=$objAppointmentInfo->age;
		$data['lblpatientbloodgrp'] = $objUsers->bloodgroup_c;
		
		//get vital parameters
		$model = new Model_Textvital;
		$record=$model->where('ref_app_id','=',$appid)->find();
		if($record->visibility == 1)
			$data['lblgeneral'] = nl2br($record->text);
			
		//get symptomatic review of systems
		$model = new Model_Textsymptom;
		$record=$model->where('ref_app_id','=',$appid)->find();
		if($record->visibility == 1)
			$data['lblsymptomaticdtls'] = nl2br($record->text);
		
		$data['lblexamination'] = '';
		//get examinations
		$model = new Model_Textexaminationsummary;
		$record=$model->where('ref_app_id','=',$appid)->find();
		if($record->visibility == 1){
			$data['lblexamination'] = nl2br($record->text);
		}
		
		//get examinations
		$model = new Model_Textexamination;
		$record=$model->where('ref_app_id','=',$appid)->find();
		if($record->visibility == 1){
			$data['lblexamination'] = nl2br($data['lblexamination'].$record->text);
		}
			
		// get symptoms
		$model = new Model_Textcomplaint;
		$record=$model->where('ref_app_id','=',$appid)->find();
		if($record->visibility == 1)
			$data['lblsymptoms'] = nl2br($record->text);
		
		//get diagnosis
		$model = new Model_Textdiagnosisnote;
		$record=$model->where('ref_app_id','=',$appid)->find();
		if($record->visibility == 1)
			$data['lblpatientdiagnosis'] = nl2br($record->text);
		
		//get test
		$model = new Model_Textinvestigation;
		$record=$model->where('ref_app_id','=',$appid)->find();
		if($record->visibility == 1)
			$data['lblpatienttest'] = nl2br($record->text);
		
		//get prescriptions
		$model = new Model_Textprescription;
		$record=$model->where('ref_app_id','=',$appid)->find();
		if($record->visibility == 1)
			$data['lblpatientprescription'] = nl2br($record->text);

		//get follow up notes
		$model = new Model_Textfollowupnote;
		$record=$model->where('ref_app_id','=',$appid)->find();
		if($record->visibility == 1)
			$data['lblpatientfollowup'] = nl2br($record->text);
			
		//get summary
		$model = new Model_Textsummarynote;
		$record=$model->where('ref_app_id','=',$appid)->find();
		if($record->visibility == 1)
			$data['lblpatientsummary'] = nl2br($record->text);
		return $data;
	}
	
	public function placepdfvalue($response_getemrbyidforpdf,$pdfname,$template,$visible,$email,$subject,$appid)
	{
		$arr_wk = include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/config/application.php');
		$data 	= json_decode($response_getemrbyidforpdf,true);
		
		$data = str_replace('●', '&bull;', $data);
		$data = str_replace('►', '&rarr;', $data);
		$html 	= new simple_html_dom();
		$html->load_file("application/views/vtemplates/".$template);
		$labels = $html->find('label');
		
		foreach($labels as $label) {
			if(isset($data[$label->id])){
				$label->innertext  = $data[$label->id];
				$parent = $label->parent;
				if($parent->tag == 'div' && $label->innertext != '')
					$parent->attr['style'] = $parent->attr['style'].';display:block;';
			}
		}
		
		foreach($html->find('img') as $image) {
			$image->src = $_SERVER['DOCUMENT_ROOT'].$data['imgpatientphoto'];
		} 
		
		$files = new helper_Files();
		$return = $files->savePdfFile($html);
		if($return != ''){
			$response_savepdf = $this->savepdf($return["filename"],$appid,$return["id"]);
			$return = $files->getFilePath($return['id']);
			return $return['abspath'];
		}else{
			return '';
		}		
	}
	
	public function savepdf($name,$appid,$id)
	{
		$strname	= $name;
		$intAppId	= $appid;

		$objfile = ORM::factory('Appointmentupload')->where('refappuploadappointmentsid_c','=',$intAppId)->find();
		$objfile->refappuploadappointmentsid_c = $intAppId;
		$objfile->uploadedfile_c = $strname;
		$objfile->fileid_c = $id;
		$objfile->save();
		return ($strname);
	}
	public function getpatientinfo($appid,$url)
	{
		$intAppId=$appid;
		$filepath=$url;
		$objApp = new Model_Appointment;
		$objApp = $objApp->where('id','=',$intAppId)->find();
		$objUsers =  ORM::factory('User')->where("id","=",$objApp->refappfromid_c )->find();
		$data['patientname'] = $objUsers->Firstname_c.' '.$objUsers->lastname_c;
		$data['patientemail'] = $objUsers->email;
		$data['filepath']=$filepath;
		return($data);
	}
	
}

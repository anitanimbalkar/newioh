<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Doctors extends Controller_Service {
	
	public function action_specforms(){
		$id = $_GET['id'];
		{	//get all forms
			$objSpecs	= ORM::factory('examinationform')->find_all();
			$examinationAllViews	= array();
			foreach($objSpecs as $examinationFormObj)
			{
				$temp = array();
				$temp['id'] = $examinationFormObj->id;
				$temp['label'] =$examinationFormObj->formlabel_c;
				$temp['name'] = $examinationFormObj->formname_c;
				array_push($examinationAllViews,$temp);
			}
			$response['examinationallforms'] = $examinationAllViews;
		}
		
		
		{	//get all forms for the Speciality
			$objSpecs	= ORM::factory('examinationform')->where('refdoctorspecializationmasters_c','=',$id)->find_all();
			$examinationViews	= array();
			foreach($objSpecs as $examinationFormObj)
			{
				$temp = array();
				$temp['id'] = $examinationFormObj->id;
				$temp['label'] =$examinationFormObj->formlabel_c;
				$temp['name'] = $examinationFormObj->formname_c;
				array_push($examinationViews,$temp);
			}
			$response['examination'] = $examinationViews;
		}
		
		{ //get selected forms by doctor
			$session= Session::instance();
			$profileid = $session->get('consultationprofile');
			$examinationViews	= array();
			$symptomaticViews	= array();
			$object_user = new Model_User;
			$user = $object_user->get_user_info();
			
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
					$temp = array();
					$temp['id'] = $symptomaticFormObj->id;
					$temp['label'] =$symptomaticFormObj->formlabel_c;
					$temp['name'] = $symptomaticFormObj->formname_c;
					array_push($symptomaticViews,$temp);
				}
			}
			if($examinationViewIds != ""){
				$examinationViewIds = explode(',',$examinationViewIds);
				foreach($examinationViewIds as $examinationViewId){
					$examinationFormObj = ORM::factory('examinationform')->where('id','=',$examinationViewId)->mustFind();
					$temp = array();
					$temp['id'] = $examinationFormObj->id;
					$temp['label'] =$examinationFormObj->formlabel_c;
					$temp['name'] = $examinationFormObj->formname_c;
					array_push($examinationViews,$temp);
				}
			}
			$response['examinationselectedforms'] = $examinationViews;
			$response['symptomaticselectedforms'] = $symptomaticViews;
		}
			
		$this->content = $response;
		
	}
		
	public function action_allspecialities()
	{
		try{
			$doctorId 	= Auth::instance()->get_user()->id;
			
			{	//get all Specialities
				$objSpecs	= ORM::factory('doctorspecializationmaster')->order_by('specialization_c','asc')->find_all();
				$specialities	= array();
				foreach($objSpecs as $objSpec)
				{
					$speciality	= array();
					$speciality['id'] 	= $objSpec->id;
					$speciality['name'] = $objSpec->specialization_c;
					array_push($specialities,$speciality);
				}
				$return['speciality'] = $specialities;
			}
			
			{ //get selected Specialities by doctor
				$objDoctorProfile	= ORM::factory('doctorprofile')
						-> where('userid','=',$doctorId)
						-> find();
							
				$objDoctorSpecs	= ORM::factory('doctorspecialization')
						-> where('refdoctorspecializationdoctorid_c','=',$objDoctorProfile->doctorid)
						-> find_all();
				$specialities	= array();		
				foreach($objDoctorSpecs as $result)
				{
					$objSpec	= ORM::factory('doctorspecializationmaster')->where('id','=',$result->refdoctorspecializationid_c)->mustFind();

					$speciality	= array();
					$speciality['id'] 	= $objSpec->id;
					$speciality['name'] = $objSpec->specialization_c;

					array_push($specialities,$speciality);
				}				
				$return['doctorspeciality'] = $specialities;				
			}
			
			$this->content = $return;
		}catch(Exception $e){
			$this->content = $e->getMessage();
			return $this->content;
		}
	}
	
	public function action_specialityforms()
	{
		try{
			$id = $_GET['specialityid'];
			$examinationViews	= array();
			$examinationFormObjs = ORM::factory('examinationform')->where('refdoctorspecializationmasters_c','=',$id)->find_all();
			foreach($examinationFormObjs as $examinationFormObj){
				$temp = array();
				$temp['id'] = $examinationFormObj->id;
				$temp['label'] =$examinationFormObj->formlabel_c;
				$temp['name'] = $examinationFormObj->formname_c;
				array_push($examinationViews,$temp);
			}
			{	//get all forms
				$objSpecs	= ORM::factory('examinationform')->find_all();
				$examinationAllViews	= array();
				foreach($objSpecs as $examinationFormObj)
				{
					$temp = array();
					$temp['id'] = $examinationFormObj->id;
					$temp['label'] =$examinationFormObj->formlabel_c;
					$temp['name'] = $examinationFormObj->formname_c;
					array_push($examinationAllViews,$temp);
				}
				$response['examinationallforms'] = $examinationAllViews;
			}
			$symptomaticViews	= array();
			$symptomaticFormObjs = ORM::factory('symptomaticform')->find_all();
			foreach($symptomaticFormObjs as $symptomaticFormObj){
				$temp = array();
				$temp['id'] = $symptomaticFormObj->id;
				$temp['label'] =$symptomaticFormObj->formlabel_c;
				$temp['name'] = $symptomaticFormObj->formname_c;
				array_push($symptomaticViews,$temp);
			}
			$response['examination'] = $examinationViews;
			$response['symptomatic'] = $symptomaticViews;
			
			{ //get selected forms by doctor
				$session= Session::instance();
				$profileid = $session->get('consultationprofile');
				$examinationViews	= array();
				$symptomaticViews	= array();
				$object_user = new Model_User;
				$user = $object_user->get_user_info();
				
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
						$temp = array();
						$temp['id'] = $symptomaticFormObj->id;
						$temp['label'] =$symptomaticFormObj->formlabel_c;
						$temp['name'] = $symptomaticFormObj->formname_c;
						array_push($symptomaticViews,$temp);
					}
				}
				if($examinationViewIds != ""){
					$examinationViewIds = explode(',',$examinationViewIds);
					foreach($examinationViewIds as $examinationViewId){
						$examinationFormObj = ORM::factory('examinationform')->where('id','=',$examinationViewId)->mustFind();
						$temp = array();
						$temp['id'] = $examinationFormObj->id;
						$temp['label'] =$examinationFormObj->formlabel_c;
						$temp['name'] = $examinationFormObj->formname_c;
						array_push($examinationViews,$temp);
					}
				}
				$response['examinationselectedforms'] = $examinationViews;
				$response['symptomaticselectedforms'] = $symptomaticViews;
			}
			$this->content = $response;
		}catch(Exception $e){$this->content = $e->getMessage();}
	}

	public function action_saveselectedforms(){
		try{
			$ids = $_POST['ids'];
			$object_doctor = new Model_Doctor();
			$doctor_id = $object_doctor->get_doctor_id(Auth::instance()->get_user()->id);
	
			$views = ORM::factory('consultationview')->where('refdoctorid_c','=',$doctor_id)->find();
			if($views->id != null){
				$views->refdoctorid_c = $doctor_id;
				$views->profilename_c = 'General';
				$views->examinationviews = $ids;
				$views->update();
			}else{
				$objviews = ORM::factory('consultationview');
				$objviews->refdoctorid_c = $doctor_id;
				$views->profilename_c = 'General';
				$objviews->examinationviews = $ids;
				$objviews->save();
			}
			$this->content = $_POST['ids'];
		}catch(Exception $e){
			echo $e->getMessage();die;
		}
		
	}
	
//Created by ravi

public function action_history()
	{
		$session= Session::instance();
		$profileid = $session->get('consultationprofile');
		$examinationViewsa	= array();
		$object_user = new Model_User;
		$user = $object_user->get_user_info();
		if($profileid != ''){
				$con = ORM::factory('consultationview')->where('id','=',$profileid)->find();
				if(!($con->loaded())){
					$con = ORM::factory('consultationview')->where('refdoctorid_c','=','-1')->mustFind();
				}
			}
			else{
				$object_doctor = new Model_Doctor();
				$doctor_id = $object_doctor->get_doctor_id($user['id']);
				$examinationViewsa	= array();
				$examViewsa	= array();
				
				$con = ORM::factory('consultationview')->where('refdoctorid_c','=',$doctor_id)->find();
				if(!($con->loaded())){
					$con = ORM::factory('consultationview')->where('refdoctorid_c','=','-1')->mustFind();
				}
			}		
			$examViewIds = $con->examinationviews;
							
			if($examViewIds != ""){
				$examViewIds = explode(',',$examViewIds);
				foreach($examViewIds as $examViewId){
					$examFormObja = ORM::factory('examinationform')->where('id','=',$examViewId)->mustFind();
					$temp = array();
					$temp['id'] = $examFormObja->id;
					$temp['label'] =$examFormObja->formlabel_c;
					$temp['name'] = $examFormObja->formname_c;
					array_push($examViewsa,$temp);
				}
			}
			
			$examinationViewIds = $con->medicalhistoryviews;
							
			if($examinationViewIds != ""){
				$examinationViewIds = explode(',',$examinationViewIds);
				foreach($examinationViewIds as $examinationViewId){
					$examinationFormObja = ORM::factory('medicalhistoryform')->where('id','=',$examinationViewId)->mustFind();
					$temp = array();
					$temp['id'] = $examinationFormObja->id;
					$temp['label'] =$examinationFormObja->formlabel_c;
					$temp['name'] = $examinationFormObja->formname_c;
					array_push($examinationViewsa,$temp);
				}
			}
			$response['selectedhistoryform'] = $examinationViewsa;
			$response['selectedexamform'] = $examViewsa;
			$this->content = $response;
	}

	public function action_examination(){
		try{
			
			$session= Session::instance();
			$profileid = $session->get('consultationprofile');
			$examinationViews	= array();
			$symptomaticViews	= array();
			$examViewsa = array();
			$examformview = array();
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
				$examinViewIds = $consultationViewObj->symptomaticviews;
				$symptomaticViewIds = $consultationViewObj->symptomaticviews;
				
				if($symptomaticViewIds != ""){
					$symptomaticViewIds = explode(',',$symptomaticViewIds);
					foreach($symptomaticViewIds as $symptomaticViewId){
						$symptomaticFormObj = ORM::factory('symptomaticform')->where('id','=',$symptomaticViewId)->mustFind();
						$symptomaticViews[$symptomaticFormObj->formlabel_c] = $symptomaticFormObj->formname_c;
					}
				}
				if($examinationViewIds != ""){
					$examform = array();
					$examinationViewIds = explode(',',$examinationViewIds);
					foreach($examinationViewIds as $examinationViewId){
						$examinationFormObj = ORM::factory('examinationform')->where('id','=',$examinationViewId)->mustFind();
						$examinationViews[$examinationFormObj->formlabel_c] = $examinationFormObj->formname_c;						
						$examform['id'] = $examinationFormObj->id;
						$examform['label'] =$examinationFormObj->formlabel_c;
						$examform['name'] = $examinationFormObj->formname_c;
						array_push($examformview,$examform);
					}
				}				
				if($examinViewIds != ""){
					$examinViewIds = explode(',',$examinViewIds);
					foreach($examinViewIds as $examinaViewId){					
					$examFormObj = ORM::factory('symptomaticform')->where('id','=',$examinaViewId)->mustFind();	
					$temp = array();					
					$temp['id'] = $examFormObj->id;
					$temp['label'] =$examFormObj->formlabel_c;
					$temp['name'] = $examFormObj->formname_c;						
					array_push($examViewsa,$temp);	
					}
				}			
				
				$response['examform'] = $examViewsa;
				$response['examination'] = $examinationViews;
				$response['examinationforms'] = $examformview;
				$response['symptomatic'] = $symptomaticViews;
				header("Cache-Control: no-cache, must-revalidate");
				echo json_encode($response);die;

			default:
				throw new HTTP_Exception_405;
			}
		}catch(Exception $e){throw new Exception($e);}
	}
	
	
		public function action_allhistory()
	{
		{	//get all forms label
			$objSpecs	= ORM::factory('medicalhistoryform')->find_all();
			$examinationAllform	= array();
			foreach($objSpecs as $examinationFormObja)
			{
				$temp1 = array();
				$temp1['id'] = $examinationFormObja->id;
				$temp['label'] =$examinationFormObja->formlabel_c;
				$temp1['name'] =$examinationFormObja->formname_c;
				array_push($examinationAllform,$temp1);
			}
			$response['allform'] = $examinationAllform;
		}		
		$session= Session::instance();
		$profileid = $session->get('consultationprofile');
		$examinationViewsa	= array();
		$object_user = new Model_User;
		$user = $object_user->get_user_info();
		if($profileid != ''){
				$con = ORM::factory('consultationview')->where('id','=',$profileid)->find();
				if(!($con->loaded())){
					$con = ORM::factory('consultationview')->where('refdoctorid_c','=','-1')->mustFind();
				}
			}
			else{
				$object_doctor = new Model_Doctor();
				$doctor_id = $object_doctor->get_doctor_id($user['id']);
				$examinationViewsa	= array();
				
				$con = ORM::factory('consultationview')->where('refdoctorid_c','=',$doctor_id)->find();
				if(!($con->loaded())){
					$con = ORM::factory('consultationview')->where('refdoctorid_c','=','-1')->mustFind();
				}
			}		
			$examinationViewIds = $con->medicalhistoryviews;
							
			if($examinationViewIds != ""){
				$examinationViewIds = explode(',',$examinationViewIds);
				foreach($examinationViewIds as $examinationViewId){
					$examinationFormObja = ORM::factory('medicalhistoryform')->where('id','=',$examinationViewId)->mustFind();
					$temp = array();
					$temp['id'] = $examinationFormObja->id;
					$temp['label'] =$examinationFormObja->formlabel_c;
					$temp['name'] = $examinationFormObja->formname_c;
					array_push($examinationViewsa,$temp);
				}
			}
			$response['historyselectedforms'] = $examinationViewsa;
			$this->content = $response;
	}
	
	public function action_allspecialitiesa()
	{
		try{
			$doctorId 	= Auth::instance()->get_user()->id;
			
			{	//get all Specialities
				$objSpecs	= ORM::factory('doctorspecializationmaster')->order_by('specialization_c','asc')->find_all();
				$specialities	= array();
				foreach($objSpecs as $objSpec)
				{
					$speciality	= array();
					$speciality['id'] 	= $objSpec->id;
					$speciality['name'] = $objSpec->specialization_c;
					array_push($specialities,$speciality);
				}
				$return['specialitya'] = $specialities;
			}
			
			{ //get selected Specialities by doctor
				$objDoctorProfile	= ORM::factory('doctorprofile')
						-> where('userid','=',$doctorId)
						-> find();
							
				$objDoctorSpecs	= ORM::factory('doctorspecialization')
						-> where('refdoctorspecializationdoctorid_c','=',$objDoctorProfile->doctorid)
						-> find_all();
				$specialities	= array();		
				foreach($objDoctorSpecs as $result)
				{
					$objSpec	= ORM::factory('doctorspecializationmaster')->where('id','=',$result->refdoctorspecializationid_c)->mustFind();

					$speciality	= array();
					$speciality['id'] 	= $objSpec->id;
					$speciality['name'] = $objSpec->specialization_c;

					array_push($specialities,$speciality);
				}				
				$return['doctorspecialitya'] = $specialities;	
			}
			
			$this->content = $return;
		}catch(Exception $e){
			$this->content = $e->getMessage();
			return $this->content;
		}
	}	

	public function action_saveselectedformsa(){
		try{
			$ids = $_POST['ids'];
			$object_doctor = new Model_Doctor();
			$doctor_id = $object_doctor->get_doctor_id(Auth::instance()->get_user()->id);
	
			$views = ORM::factory('consultationview')->where('refdoctorid_c','=',$doctor_id)->find();
			if($views->id != null){
				$views->refdoctorid_c = $doctor_id;
				$views->profilename_c = 'General';
				$views->medicalhistoryviews = $ids;
				$views->update();
			}else{
				$objviews = ORM::factory('consultationview');
				$objviews->refdoctorid_c = $doctor_id;
				$views->profilename_c = 'General';
				$objviews->medicalhistoryviews = $ids;
				$objviews->save();
			}
			$this->content = $_POST['ids'];
		}catch(Exception $e){
			echo $e->getMessage();die;
		}
		
	}	
}


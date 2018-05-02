<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cdoctorprofile extends Controller_Ctemplatewithmenu  {
	public function action_displaytopatient(){		
		$doctorId=$_GET['userid'];
		
		$objDoctorProfile	= ORM::factory('doctorprofile')
							-> where('userid','=',$doctorId)
							-> find();
		$objDoctorProfiles = ORM::factory('doctorprofile')
							-> where('userid','=',$doctorId)
							-> find_all();
		$objDoctorLangs		= ORM::factory('doctorknownlanguage')
							-> where('refdocknownlangdoctorid_c','=',$objDoctorProfile->doctorid)
							-> find_all();
		$doctorLangs		= '';
		foreach($objDoctorLangs as $result)
		{
			$objLang 	= ORM::factory('languagemaster')->where('id','=',$result->refdocknownlanglanguageid_c)->mustFind();
			$lang		= $objLang->language_c;
		  	if($doctorLangs=='')
			{
				$doctorLangs=$lang;
			}
			else
			{
				$doctorLangs=$doctorLangs.", ".$lang;
			}
		}
		
		$objDoctorTime	=ORM::factory('doctorclinictimetable')
						->where('doctorclinictimetable.refdoctorclinctimedoctorsid_c','=',$objDoctorProfile->doctorid)
						->find_all();
		$doctorTimes	='';
		foreach($objDoctorTime as $result) 
		{
			if($doctorTimes=='' and !($result->starttime_c== NULL) and ($result->endtime_c== NULL ))
			{
				$doctorTimes=$result->weekday_c." ".date("H:i",strtotime($result->starttime_c))." to ".date("H:i",strtotime($result->endtime_c))." hrs (IST)<br/>";
			}
			elseif(!(($result->starttime_c==NULL )AND($result->endtime_c==NULL )))
			{
				$doctorTimes=$doctorTimes.$result->weekday_c." ".date("H:i",strtotime($result->starttime_c)) ." to ".date("H:i",strtotime($result->endtime_c))." hrs (IST)<br/>";
			}
		}
		
		$objDoctorDomains	=ORM::factory('doctorpracticedomain')
							->where('refdocpracticedomainddoctorid_c','=',$objDoctorProfile->doctorid)
							->find_all();
		$doctorDomains		="";
		foreach($objDoctorDomains as $result)
		{
			$objDomain	= ORM::factory('doctordomainmaster')->where('id','=',$result->refdoctordomainmasterdomainid_c)->mustFind();
			$domain 	= $objDomain->domain_c;
		  	if($doctorDomains=='')
			{
				$doctorDomains=$domain;
			}
			else
			{
				$doctorDomains=$doctorDomains.", ".$domain;
			}
		}
		
		$objDoctorSpecs	= ORM::factory('doctorspecialization')
						-> where('refdoctorspecializationdoctorid_c','=',$objDoctorProfile->doctorid)
						-> find_all();
		$doctorSpecs	= "";
		foreach($objDoctorSpecs as $result)
		{
			$objSpec	= ORM::factory('doctorspecializationmaster')->where('id','=',$result->refdoctorspecializationid_c)->mustFind();
			$spec		= $objSpec->specialization_c;
		  	if($doctorSpecs=='')
			{
				$doctorSpecs=$spec;
			}
			else
			{
				$doctorSpecs=$doctorSpecs.", ".$spec;
			}
		}
		$objDoctorEdus	= ORM::factory('doctoreducation')
						-> where('refdocedudoctorsid_c','=',$objDoctorProfile->doctorid)
						-> find_all();
		
		$doctorEdus		= "";
		foreach($objDoctorEdus as $result)
		{
			$objEdu = ORM::factory('educationmaster')->where('id','=',$result->refeducationid_c)->mustFind();
			$edu 	= $objEdu->education_c;
		  	if($doctorEdus=='')
			{
				$doctorEdus=$edu;
			}
			else
			{
				$doctorEdus=$doctorEdus.", ".$edu;
			}
		}
		
		$obj_user 	= Auth::instance()->get_user();
		
		$content 	= View::factory('vuser/vpatient/vdoctorprofileforpatient');
		
		$content	->bind('docotrlanguage'			, $doctorLangs);
		$content	->bind('doctortime'				, $doctorTimes);
		$content	->bind('doctordomain'			, $doctorDomains);
		$content	->bind('doctoreducation'		, $doctorEdus);
		$content	->bind('doctorspecialization'	, $doctorSpecs);
		$content	->bind('obj_doctorprofile'		, $objDoctorProfile);
		$content	->bind('obj_clinicprofiles'		, $objDoctorProfiles);
		$this->template->breadcrumb = "Home>>";
		$this->template->content = $content;
		$this->template->user = $obj_user->Firstname_c;
		$this->template->urole = "patient";
	}
	
	public function action_editprofile(){	
		$errors = array();
		$messages = array();
		$this->displayPage($errors,$messages);
	}
	public function action_getdocprofile(){
		$userId 		= $_GET['userid'];
		$objUser 		= ORM::factory("user")->where('id', '=', $userId)->find()->as_array();
		
		$objDoctor		= ORM::factory('doctor')->where('refdoctorsid_c','=',$userId)->mustFind()->as_array();
		$doctorId 		= $objDoctor['id'];
		$objDoctor['RMPnumberdateofexpiry_c']=date('d-M-Y', strtotime( $objDoctor['RMPnumberdateofexpiry_c']));
		$objDoctor['RMPnumberdateofissue_c']=date('d-M-Y', strtotime( $objDoctor['RMPnumberdateofissue_c']));
		$objUser['DOB_c']=date('d-M-Y', strtotime($objUser['DOB_c']));
		//var_dump($objDoctor); die;
		$objAllLanguages 	= ORM::factory('languagemaster')->where("validate_c","=","true")->ORDER_BY ('language_c', 'asc')->mustFindAll();
		$arrAllLanguages 	= array();
		foreach($objAllLanguages as $objLanguage)
		{
			$arrAllLanguages[$objLanguage->id] = $objLanguage->language_c;
		}	
		
		$objAllSpecializations = ORM::factory('doctorspecializationmaster')->where("validate_c","=","true")->ORDER_BY ('specialization_c', 'asc') ->mustFindAll();
		$arrAllSpecializations = array();
		foreach($objAllSpecializations as $objSpecialization)
		{
			$arrAllSpecializations[$objSpecialization->id] = $objSpecialization->specialization_c;
		}
		
		$objAllDomains = ORM::factory('doctordomainmaster')->where("validate_c","=","true")->ORDER_BY ('domain_c', 'asc') ->mustFindAll();
		$arrAllDomains = array();
		foreach($objAllDomains as $objDomain)
		{
			$arrAllDomains[$objDomain->id] = $objDomain->domain_c;
		}
		
		$objAllEducations = ORM::factory('educationmaster')->where("validate_c","=","true")->ORDER_BY ('education_c', 'asc') -> mustFindAll();
		$arrAllEducations = array();
		foreach($objAllEducations as $objEducation)
		{
			$arrAllEducations[$objEducation->id] = $objEducation->education_c;
		}
		
		$objDocSpecializations = ORM::factory('doctorspecialization')->where('refdoctorspecializationdoctorid_c','=',$doctorId)->findAll();
		$arrDocSpecializations = array();
		foreach($objDocSpecializations as $objDocSpecialization)
		{
			$arrDocSpecializations[$objDocSpecialization->refdoctorspecializationid_c] = $arrAllSpecializations[$objDocSpecialization->refdoctorspecializationid_c];
		}
		
		$objDocDomains = ORM::factory('doctorpracticedomain')->where('refdocpracticedomainddoctorid_c','=',$doctorId)->findAll();
		$arrDocDomains = array();
		foreach($objDocDomains as $objDocDomain)
		{
			$arrDocDomains[$objDocDomain->refdoctordomainmasterdomainid_c] = $arrAllDomains[$objDocDomain->refdoctordomainmasterdomainid_c];
		}
		
		$objDocEducations = ORM::factory('doctoreducation')->where('refdocedudoctorsid_c','=',$doctorId)->findAll();
		$arrDocEducations = array();
		foreach($objDocEducations as $objDocEducation)
		{
			$arrDocEducations[$objDocEducation->refeducationid_c] = $arrAllEducations[$objDocEducation->refeducationid_c];
		}
		
		$objDocLang	 = ORM::factory('doctorknownlanguage')->where('refdocknownlangdoctorid_c','=',$doctorId)->findAll();
		$arrDocLangs = array();
		foreach($objDocLang as $objDocLang)
		{
			$arrDocLangs[$objDocLang->refdocknownlanglanguageid_c] = $arrAllLanguages[$objDocLang->refdocknownlanglanguageid_c];
		}
		
		$objCountries  = ORM::factory('countrymaster')
							->find_all()
							->as_array();
		$result= array();
		$result=[$objDoctor,$arrAllLanguages,$arrAllSpecializations,$arrAllDomains,$arrAllEducations,$arrDocSpecializations,$arrDocDomains,$arrDocEducations,$arrDocLangs,$objUser];
		echo(json_encode($result)); die;
	}
	public function action_editdocprofile(){
		$user			= Auth::instance()->get_user();
		if(isset($_GET['userid'])){
			$userId 		= $_GET['userid'];
		}else{
			$userId=$user->id;
		}
		$objUser 		= ORM::factory("user")->where('id', '=', $userId)->find()->as_array();
		
		$objDoctor		= ORM::factory('doctor')->where('refdoctorsid_c','=',$userId)->mustFind()->as_array();
		$doctorId 		= $objDoctor['id'];
		$objDoctor['RMPnumberdateofexpiry_c']=date('d-M-Y', strtotime( $objDoctor['RMPnumberdateofexpiry_c']));
		$objDoctor['RMPnumberdateofissue_c']=date('d-M-Y', strtotime( $objDoctor['RMPnumberdateofissue_c']));
		$objUser['DOB_c']=date('d-M-Y', strtotime($objUser['DOB_c']));
		//var_dump($objDoctor); die;
		$objAllLanguages 	= ORM::factory('languagemaster')->where("validate_c","=","true")->ORDER_BY ('language_c', 'asc')->mustFindAll();
		$arrAllLanguages 	= array();
		foreach($objAllLanguages as $objLanguage)
		{
			$arrAllLanguages[$objLanguage->id] = $objLanguage->language_c;
		}	
		
		$objAllSpecializations = ORM::factory('doctorspecializationmaster')->where("validate_c","=","true")->ORDER_BY ('specialization_c', 'asc') ->mustFindAll();
		$arrAllSpecializations = array();
		foreach($objAllSpecializations as $objSpecialization)
		{
			$arrAllSpecializations[$objSpecialization->id] = $objSpecialization->specialization_c;
		}
		
		$objAllDomains = ORM::factory('doctordomainmaster')->where("validate_c","=","true")->ORDER_BY ('domain_c', 'asc') ->mustFindAll();
		$arrAllDomains = array();
		foreach($objAllDomains as $objDomain)
		{
			$arrAllDomains[$objDomain->id] = $objDomain->domain_c;
		}
		
		$objAllEducations = ORM::factory('educationmaster')->where("validate_c","=","true")->ORDER_BY ('education_c', 'asc') -> mustFindAll();
		$arrAllEducations = array();
		foreach($objAllEducations as $objEducation)
		{
			$arrAllEducations[$objEducation->id] = $objEducation->education_c;
		}
		
		$objDocSpecializations = ORM::factory('doctorspecialization')->where('refdoctorspecializationdoctorid_c','=',$doctorId)->findAll();
		$arrDocSpecializations = array();
		foreach($objDocSpecializations as $objDocSpecialization)
		{
			$arrDocSpecializations[$objDocSpecialization->refdoctorspecializationid_c] = $arrAllSpecializations[$objDocSpecialization->refdoctorspecializationid_c];
		}
		
		$objDocDomains = ORM::factory('doctorpracticedomain')->where('refdocpracticedomainddoctorid_c','=',$doctorId)->findAll();
		$arrDocDomains = array();
		foreach($objDocDomains as $objDocDomain)
		{
			$arrDocDomains[$objDocDomain->refdoctordomainmasterdomainid_c] = $arrAllDomains[$objDocDomain->refdoctordomainmasterdomainid_c];
		}
		
		$objDocEducations = ORM::factory('doctoreducation')->where('refdocedudoctorsid_c','=',$doctorId)->findAll();
		$arrDocEducations = array();
		foreach($objDocEducations as $objDocEducation)
		{
			$arrDocEducations[$objDocEducation->refeducationid_c] = $arrAllEducations[$objDocEducation->refeducationid_c];
		}
		
		$objDocLang	 = ORM::factory('doctorknownlanguage')->where('refdocknownlangdoctorid_c','=',$doctorId)->findAll();
		$arrDocLangs = array();
		foreach($objDocLang as $objDocLang)
		{
			$arrDocLangs[$objDocLang->refdocknownlanglanguageid_c] = $arrAllLanguages[$objDocLang->refdocknownlanglanguageid_c];
		}
		
		$objCountries  = ORM::factory('countrymaster')
							->find_all()
							->as_array();
		$result= array();
		$result=[$objDoctor,$arrAllLanguages,$arrAllSpecializations,$arrAllDomains,$arrAllEducations,$arrDocSpecializations,$arrDocDomains,$arrDocEducations,$arrDocLangs,$objUser];
		echo(json_encode($result)); die;
	}
	private function displayPage($errors, $messages){
		$user			= Auth::instance()->get_user();
		$userId 		= $user->id;
		
		$content		= View::factory('vuser/vdoctor/vdoctoreditprofile')
						-> bind('errors', $errors);
		
		$objUser 		= ORM::factory("user")->where('id', '=', $userId)->find();
		
		$objDoctor		= ORM::factory('doctor')->where('refdoctorsid_c','=',$userId)->mustFind();
		$doctorId 		= $objDoctor->id;
		
		$objAllLanguages 	= ORM::factory('languagemaster')->where("validate_c","=","true")->ORDER_BY ('language_c', 'asc')->mustFindAll();
		$arrAllLanguages 	= array();
		foreach($objAllLanguages as $objLanguage)
		{
			$arrAllLanguages[$objLanguage->id] = $objLanguage->language_c;
		}	
		
		$objAllSpecializations = ORM::factory('doctorspecializationmaster')->where("validate_c","=","true")->ORDER_BY ('specialization_c', 'asc') ->mustFindAll();
		$arrAllSpecializations = array();
		foreach($objAllSpecializations as $objSpecialization)
		{
			$arrAllSpecializations[$objSpecialization->id] = $objSpecialization->specialization_c;
		}
		
		$objAllDomains = ORM::factory('doctordomainmaster')->where("validate_c","=","true")->ORDER_BY ('domain_c', 'asc') ->mustFindAll();
		$arrAllDomains = array();
		foreach($objAllDomains as $objDomain)
		{
			$arrAllDomains[$objDomain->id] = $objDomain->domain_c;
		}
		
		$objAllEducations = ORM::factory('educationmaster')->where("validate_c","=","true")->ORDER_BY ('education_c', 'asc') -> mustFindAll();
		$arrAllEducations = array();
		foreach($objAllEducations as $objEducation)
		{
			$arrAllEducations[$objEducation->id] = $objEducation->education_c;
		}
		
		$objDocSpecializations = ORM::factory('doctorspecialization')->where('refdoctorspecializationdoctorid_c','=',$doctorId)->findAll();
		$arrDocSpecializations = array();
		foreach($objDocSpecializations as $objDocSpecialization)
		{
			$arrDocSpecializations[$objDocSpecialization->refdoctorspecializationid_c] = $objDocSpecialization->refdoctorspecializationid_c;
		}
		
		$objDocDomains = ORM::factory('doctorpracticedomain')->where('refdocpracticedomainddoctorid_c','=',$doctorId)->findAll();
		$arrDocDomains = array();
		foreach($objDocDomains as $objDocDomain)
		{
			$arrDocDomains[$objDocDomain->refdoctordomainmasterdomainid_c] = $objDocDomain->refdoctordomainmasterdomainid_c;
		}
		
		$objDocEducations = ORM::factory('doctoreducation')->where('refdocedudoctorsid_c','=',$doctorId)->findAll();
		$arrDocEducations = array();
		foreach($objDocEducations as $objDocEducation)
		{
			$arrDocEducations[$objDocEducation->refeducationid_c] = $objDocEducation->refeducationid_c;
		}
		
		$objDocLang	 = ORM::factory('doctorknownlanguage')->where('refdocknownlangdoctorid_c','=',$doctorId)->findAll();
		$arrDocLangs = array();
		foreach($objDocLang as $objDocLang)
		{
			$arrDocLangs[$objDocLang->refdocknownlanglanguageid_c] = $objDocLang->refdocknownlanglanguageid_c;
		}
		
		$objCountries  = ORM::factory('countrymaster')
							->find_all()
							->as_array();
							
		$content->bind('objuser'				, $objUser);
		$content->bind('objdoctor'				, $objDoctor);
		$content->bind('arrlanguage'			, $arrAllLanguages);
		$content->bind('arrspecializationmaster', $arrAllSpecializations);
		$content->bind('arrdoctordomainmaster'	, $arrAllDomains);
		$content->bind('arrdoctoreducation'		, $arrAllEducations);
		$content->bind('arrspecialization'		, $arrDocSpecializations);
		$content->bind('arrdocdomain'			, $arrDocDomains);
		$content->bind('arrdoctoreducations'	, $arrDocEducations);
		$content->bind('arrdoclang'				, $arrDocLangs);
		$content->bind('address'				, $objAddress);
		$content->bind('errors'					, $errors);
		$content->bind('messages'				, $messages);
		$content->bind('objcountries', $objCountries);
		
		$this->template->breadcrumb = "Home>>";
        $this->template->user 		= "Dr. ".trim($objUser->Firstname_c);
		$this->template->content 	= $content;
		$this->template->urole 		= "doctor";
	}
	public function action_savedocname()
	{
		
			$objUser 	= Auth::Instance()->get_user();
			if(isset($_GET['userid'])){
				$userId = $_GET['userid'];
			}else{
				$userId=$objUser->id;
			}
			//$userId = $objUser->id;
			$objUser = ORM::factory('user')->where('id','=',$userId)->find();
			$objUser ->Firstname_c=$_GET['Firstname_c'];
			$objUser ->middlename_c=$_GET['middlename_c'];
			$objUser ->lastname_c=$_GET['lastname_c'];
			$objUser->save();
			echo("Name Changed Successfully"); die;

	}
	
	public function action_savedocedu()
	{
		
			$objUser 	= Auth::Instance()->get_user();
			if(isset($_GET['userid'])){
				$userId = $_GET['userid'];
			}else{
				$userId=$objUser->id;
			}
			$objDoctor = ORM::factory('doctor')->where('refdoctorsid_c','=',$userId)->find();
			$objDoctor->saveRecord($_POST);

			$doctorId = $objDoctor->id;
			$objDocEdus = ORM::factory('doctoreducation')->where('refdocedudoctorsid_c','=',$doctorId)->find_all();
				foreach($objDocEdus as $objDocEdu)
				{
					$objDocEdu->delete();
				}
				
				$arrDocEdus = json_decode($_GET['arrayDocEdus']);
				foreach($arrDocEdus as $key=> $val)
				{
					if($key !== "others" && $val != null)
					{
						$objDoctorEducation = new Model_Doctoreducation;
						$objDoctorEducation->refdocedudoctorsid_c=$doctorId;
						$objDoctorEducation-> refeducationid_c= $key; 
						$objDoctorEducation->save(); 
					}
					else
					{
						if(!empty($arrDocEdus['others']))
						{
							$arrOtherEdus = explode(",",$arrDocEdus['others']);
							foreach($arrOtherEdus as $otherEdu)
							{
								$objEducationMaster = new Model_Educationmaster;
								$objEducationMaster->education_c = $otherEdu;
								$objEducationMaster->validate_c = FALSE;
								$educationId = $objEducationMaster->save();
								$objDoctorEducation = new Model_Doctoreducation;
								$objDoctorEducation->refdocedudoctorsid_c=$doctorId;
								$objDoctorEducation-> refeducationid_c= $educationId; 
								$objDoctorEducation->save(); 
							}	
						}
					}
					
				}
			die;
	}
	public function action_savedocspecs()
	{		
			$objUser 	= Auth::Instance()->get_user();
			if(isset($_GET['userid'])){
				$userId = $_GET['userid'];
			}else{
				$userId=$objUser->id;
			}
			$objDoctor = ORM::factory('doctor')->where('refdoctorsid_c','=',$userId)->find();
			$objDoctor->saveRecord($_POST);

			$doctorId = $objDoctor->id;
			
			$objDocSpecs = ORM::factory('doctorspecialization')->where('refdoctorspecializationdoctorid_c','=',$doctorId)->find_all();
				foreach($objDocSpecs as $objDocSpec)
				{
					$objDocSpec->delete();
				}
				$arrDocSpecs = json_decode($_GET['arrayDocSpecs']);
				//var_dump($arrDocSpecs); die;
				foreach($arrDocSpecs as $key=> $val)
				{
					if($key !== "others" && $val != null)
					{
						$objDocSpec = ORM::factory('doctorspecialization');
						$objDocSpec->refdoctorspecializationdoctorid_c=$doctorId;
						$objDocSpec-> refdoctorspecializationid_c= $key; 
						$objDocSpec->save(); 
					}
					else
					{
						if(!empty($arrDocSpecs['others']))
						{
							$arrOtherSpecs = explode(",",$arrDocSpecs['others']);
							foreach($arrOtherSpecs as $otherSpecs)
							{
								$objSpecsMaster = new Model_Doctorspecializationmaster;
								$objSpecsMaster->specialization_c = $otherSpecs;
								$objSpecsMaster->validate_c = FALSE;
								$objSpecsMaster->description_c = NULL;
								$specsId = $objSpecsMaster->save();
								$objDocSpec = ORM::factory('doctorspecialization');
								$objDocSpec->refdoctorspecializationdoctorid_c=$doctorId;
								$objDocSpec-> refdoctorspecializationid_c= $specsId; 
								$objDocSpec->save(); 
							}	
						}
					}
					
				}
				die;
	}
	public function action_savedocdomains()
	{
		
			$objUser 	= Auth::Instance()->get_user();
			if(isset($_GET['userid'])){
				$userId = $_GET['userid'];
			}else{
				$userId=$objUser->id;
			}			
			$objDoctor = ORM::factory('doctor')->where('refdoctorsid_c','=',$userId)->find();
			$objDoctor->saveRecord($_POST);

			$doctorId = $objDoctor->id;
			$objDocDomains = ORM::factory('doctorpracticedomain')->where('refdocpracticedomainddoctorid_c','=',$doctorId)->find_all();
				foreach($objDocDomains as $objDocDomain)
				{
					$objDocDomain->delete();
				}
				
				$arrDocDomains = json_decode($_GET['arrayDocDomains']);
				foreach($arrDocDomains as $key=> $val)
				{
					if($key !== "others" && $val != null)
					{
						$objDoctorDomain = new Model_Doctorpracticedomain;
						$objDoctorDomain->refdocpracticedomainddoctorid_c=$doctorId;
						$objDoctorDomain->refdoctordomainmasterdomainid_c= $key; 
						$objDoctorDomain->save(); 
					}
					else
					{
						if(!empty($arrDocDomains['others']))
						{
							$arrOtherDomains = explode(",",$arrDocDomains['others']);
							foreach($arrOtherDomains as $otherDomain)
							{
								$objDomainMaster = new Model_Doctordomainmaster;
								$objDomainMaster->domain_c = $otherDomain;
								$objDomainMaster->validate_c = FALSE;
								$objDomainMaster->description_c = NULL;
								$domainId = $objDomainMaster->save();
								$objDoctorDomain = new Model_Doctorpracticedomain;
								$objDoctorDomain->refdocpracticedomainddoctorid_c=$doctorId;
								$objDoctorDomain->refdoctordomainmasterdomainid_c= $domainId; 
								$objDoctorDomain->save(); 
							}	
						}
					}
					
				}die;
	}
	public function action_savedoclangs()
	{
		$objUser 	= Auth::Instance()->get_user();
			if(isset($_GET['userid'])){
				$userId = $_GET['userid'];
			}else{
				$userId=$objUser->id;
			}
			
			$objDoctor = ORM::factory('doctor')->where('refdoctorsid_c','=',$userId)->find();
			$objDoctor->saveRecord($_POST);

			$doctorId = $objDoctor->id;
			$objDocLangs = ORM::factory('doctorknownlanguage')->where('refdocknownlangdoctorid_c','=',$doctorId)->find_all();
				foreach($objDocLangs as $objDocLang)
				{
					$objDocLang->delete();
				}
				
				$arrDocLangs = json_decode($_GET['arrayDocLangs']);
				foreach($arrDocLangs as $key=> $val)
				{
					if($key !== "others" && $val != null)
					{
						$objLang = ORM::factory('doctorknownlanguage');
						$objLang->refdocknownlangdoctorid_c=$doctorId;
						$objLang-> refdocknownlanglanguageid_c= $key; 
						$objLang->save(); 
					}
					else
					{
						if(!empty($arrDocLangs['others']))
						{
							$arrOtherLangs = explode(",",$arrDocLangs['others']);
							foreach($arrOtherLangs as $otherLang)
							{
								$objLangMaster = new Model_Languagemaster;
								$objLangMaster->language_c = $otherLang;
								$objLangMaster->validate_c = FALSE;
								$langId = $objLangMaster->save();
								$objLang = ORM::factory('doctorknownlanguage');
								$objLang->refdocknownlangdoctorid_c=$doctorId;
								$objLang-> refdocknownlanglanguageid_c= $langId; 
								$objLang->save(); 
							}	
						}
					}
				}
				die;
	}
	public function action_savedocsummary(){
		$objUser 	= Auth::Instance()->get_user();
			$userId = $objUser->id;
			
			$objDoctor = ORM::factory('doctor')->where('refdoctorsid_c','=',$userId)->find();
			

			$doctorId = $objDoctor->id;
			$objDoctor->doctorprofile_c=$_GET['summary'];
			$objDoctor->save();
	die;
	}
	//By Vijay
	public function action_saveheaderfooterflag(){
			$objUser 	= Auth::Instance()->get_user();
			if(isset($_GET['userid'])){
				$userId = $_GET['userid'];
			}else{
				$userId=$objUser->id;
			}
			$objDoctor = ORM::factory('doctor')->where('refdoctorsid_c','=',$userId)->find();

			$doctorId = $objDoctor->id;
			//var_dump($_GET['headerfooterSysGenflag_c']);die;
			$objDoctor->headerfooterSysGenflag_c=$_GET['headerfooterSysGenflag_c'];
			$objDoctor->save();
	die;
	}
	public function action_savepinfo(){
			$objUser 	= Auth::Instance()->get_user();
			if(isset($_GET['userid'])){
				$userId = $_GET['userid'];
			}else{
				$userId=$objUser->id;
			}		
			if(isset($_GET['gender_c']))
				$objUser->gender_c=$_GET['gender_c'];
			if(isset($_GET['DOB_c']))
				$objUser->DOB_c=date("Y-m-d",strtotime($_GET['DOB_c']));
			if(isset($_GET['uid']))
				$objUser->uid=$_GET['uid'];
			if(isset($_GET['email']))
				$objUser->email=$_GET['email'];
			if(isset($_GET['mobileno']))
				$objUser->mobileno1_c=$_GET['mobileno'];
			$objUser->save();
			//var_dump($objUser->DOB_c); die;
			$objDoctor = ORM::factory('doctor')->where('refdoctorsid_c','=',$userId)->find();
			

			$doctorId = $objDoctor->id;
			$objDoctor->practicesince_c=$_GET['practicesince_c'];
			
			$objDoctor->save();
			$uspstepuser = ORM::factory('uspstepuser')->where('refuseruspstepsid_c','=','2')->where('refuspuserid_c','=',$userId)->find();
				if($uspstepuser->refuseruspstepsid_c=='2'){
				$uspstepuser->update();
			}
			else{
				$uspstepuser->refuseruspstepsid_c='2';
				$uspstepuser->refuspuserid_c=$userId;
				$uspstepuser->save();
			}
	die;
	}
	public function action_savedoctordetails(){
		try
		{
			$errors = array();
			$messages = array();
			$objUser 	= Auth::Instance()->get_user();
			if(isset($_GET['userid'])){
				$userId = $_GET['userid'];
			}else{
				$userId=$objUser->id;
			}
			
			$objDoctor = ORM::factory('doctor')->where('refdoctorsid_c','=',$userId)->find();
			$objDoctor->saveRecord($_POST);

			$doctorId = $objDoctor->id;
			
			if(isset($_POST['arrayDocSpecs']))
			{
				$objDocSpecs = ORM::factory('doctorspecialization')->where('refdoctorspecializationdoctorid_c','=',$doctorId)->find_all();
				foreach($objDocSpecs as $objDocSpec)
				{
					$objDocSpec->delete();
				}
				$arrDocSpecs = $_POST['arrayDocSpecs'];
				foreach($arrDocSpecs as $key=> $val)
				{
					if($key !== "others")
					{
						$objDocSpec = ORM::factory('doctorspecialization');
						$objDocSpec->refdoctorspecializationdoctorid_c=$doctorId;
						$objDocSpec-> refdoctorspecializationid_c= $val; 
						$objDocSpec->save(); 
					}
					else
					{
						if(!empty($arrDocSpecs['others']))
						{
							$arrOtherSpecs = explode(",",$arrDocSpecs['others']);
							foreach($arrOtherSpecs as $otherSpecs)
							{
								$objSpecsMaster = new Model_Doctorspecializationmaster;
								$objSpecsMaster->specialization_c = $otherSpecs;
								$objSpecsMaster->validate_c = FALSE;
								$objSpecsMaster->description_c = NULL;
								$specsId = $objSpecsMaster->save();
								$objDocSpec = ORM::factory('doctorspecialization');
								$objDocSpec->refdoctorspecializationdoctorid_c=$doctorId;
								$objDocSpec-> refdoctorspecializationid_c= $specsId; 
								$objDocSpec->save(); 
							}	
						}
					}
					
				}
			}
			else
			{
				$objDocSpecs = ORM::factory('doctorspecialization')->where('refdoctorspecializationdoctorid_c','=',$doctorId)->find_all();
				foreach($objDocSpecs as $objDocSpec)
				{
					$objDocSpec->delete();
				}
			}
			
			if(isset($_POST['arrayDocLangs']))
			{
				$objDocLangs = ORM::factory('doctorknownlanguage')->where('refdocknownlangdoctorid_c','=',$doctorId)->find_all();
				foreach($objDocLangs as $objDocLang)
				{
					$objDocLang->delete();
				}
				
				$arrDocLangs = $_POST['arrayDocLangs'];
				foreach($arrDocLangs as $key=> $val)
				{
					if($key !== "others")
					{
						$objLang = ORM::factory('doctorknownlanguage');
						$objLang->refdocknownlangdoctorid_c=$doctorId;
						$objLang-> refdocknownlanglanguageid_c= $val; 
						$objLang->save(); 
					}
					else
					{
						if(!empty($arrDocLangs['others']))
						{
							$arrOtherLangs = explode(",",$arrDocLangs['others']);
							foreach($arrOtherLangs as $otherLang)
							{
								$objLangMaster = new Model_Languagemaster;
								$objLangMaster->language_c = $otherLang;
								$objLangMaster->validate_c = FALSE;
								$langId = $objLangMaster->save();
								$objLang = ORM::factory('doctorknownlanguage');
								$objLang->refdocknownlangdoctorid_c=$doctorId;
								$objLang-> refdocknownlanglanguageid_c= $langId; 
								$objLang->save(); 
							}	
						}
					}
				}
			}
			else
			{
				$objDocLangs = ORM::factory('doctorknownlanguage')->where('refdocknownlangdoctorid_c','=',$doctorId)->find_all();
				foreach($objDocLangs as $objDocLang)
				{
					$objDocLang->delete();
				}
			}
			
			if(isset($_POST['arrayDocEdus']))
			{
				$objDocEdus = ORM::factory('doctoreducation')->where('refdocedudoctorsid_c','=',$doctorId)->find_all();
				foreach($objDocEdus as $objDocEdu)
				{
					$objDocEdu->delete();
				}
				
				$arrDocEdus = $_POST['arrayDocEdus'];
				foreach($arrDocEdus as $key=> $val)
				{
					if($key !== "others")
					{
						$objDoctorEducation = new Model_Doctoreducation;
						$objDoctorEducation->refdocedudoctorsid_c=$doctorId;
						$objDoctorEducation-> refeducationid_c= $val; 
						$objDoctorEducation->save(); 
					}
					else
					{
						if(!empty($arrDocEdus['others']))
						{
							$arrOtherEdus = explode(",",$arrDocEdus['others']);
							foreach($arrOtherEdus as $otherEdu)
							{
								$objEducationMaster = new Model_Educationmaster;
								$objEducationMaster->education_c = $otherEdu;
								$objEducationMaster->validate_c = FALSE;
								$educationId = $objEducationMaster->save();
								$objDoctorEducation = new Model_Doctoreducation;
								$objDoctorEducation->refdocedudoctorsid_c=$doctorId;
								$objDoctorEducation-> refeducationid_c= $educationId; 
								$objDoctorEducation->save(); 
							}	
						}
					}
					
				}
			}
			else
			{
				$objDocEdus = ORM::factory('doctoreducation')->where('refdocedudoctorsid_c','=',$doctorId)->find_all();
				foreach($objDocEdus as $objDocEdu)
				{
					$objDocEdu->delete();
				}
			}
			
			if(isset($_POST['arrayDocDomains']))
			{
				$objDocDomains = ORM::factory('doctorpracticedomain')->where('refdocpracticedomainddoctorid_c','=',$doctorId)->find_all();
				foreach($objDocDomains as $objDocDomain)
				{
					$objDocDomain->delete();
				}
				
				$arrDocDomains = $_POST['arrayDocDomains'];
				foreach($arrDocDomains as $key=> $val)
				{
					if($key !== "others")
					{
						$objDoctorDomain = new Model_Doctorpracticedomain;
						$objDoctorDomain->refdocpracticedomainddoctorid_c=$doctorId;
						$objDoctorDomain->refdoctordomainmasterdomainid_c= $val; 
						$objDoctorDomain->save(); 
					}
					else
					{
						if(!empty($arrDocDomains['others']))
						{
							$arrOtherDomains = explode(",",$arrDocDomains['others']);
							foreach($arrOtherDomains as $otherDomain)
							{
								$objDomainMaster = new Model_Doctordomainmaster;
								$objDomainMaster->domain_c = $otherDomain;
								$objDomainMaster->validate_c = FALSE;
								$objDomainMaster->description_c = NULL;
								$domainId = $objDomainMaster->save();
								$objDoctorDomain = new Model_Doctorpracticedomain;
								$objDoctorDomain->refdocpracticedomainddoctorid_c=$doctorId;
								$objDoctorDomain->refdoctordomainmasterdomainid_c= $domainId; 
								$objDoctorDomain->save(); 
							}	
						}
					}
					
				}
			}
			else
			{
				$objDocDomains = ORM::factory('doctorpracticedomain')->where('refdocpracticedomainddoctorid_c','=',$doctorId)->find_all();
				foreach($objDocDomains as $objDocDomain)
				{
					$objDocDomain->delete();
				}
			}
			
			$objUser ->Firstname_c=$_POST['Firstname_c'];
			$objUser ->middlename_c=$_POST['middlename_c'];
			$objUser ->lastname_c=$_POST['lastname_c'];
			$objUser ->DOB_c = date('Y-m-d',strtotime($_POST['dob']));
			$objUser ->gender_c=$_POST['gender_c'];
			$objUser ->profileeditdate_c=date('Y-m-d');
			$objUser->save();
			$messages['success'] = "Profile Updated Successfully!";
			
	
			$uspstepuser = ORM::factory('uspstepuser')->where('refuseruspstepsid_c','=','2')->where('refuspuserid_c','=',$userId)->find();
				if($uspstepuser->refuseruspstepsid_c=='2'){
				$uspstepuser->update();
			}
			else{
				$uspstepuser->refuseruspstepsid_c='2';
				$uspstepuser->refuspuserid_c=$userId;
				$uspstepuser->save();
			}
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
		$this->displayPage($errors,$messages);
	}
	
	public function action_displayToStaff(){
		$doctorId=$_GET['docid'];
		$backurl = $_GET['backurl'];
		$objDoctorProfile= ORM::factory('doctorprofile')-> where('userid','=',$doctorId)-> find();
		$objDoctorLangs	= ORM::factory('doctorknownlanguage')-> where('refdocknownlangdoctorid_c','=',$objDoctorProfile->doctorid)-> find_all();
		$doctorLangs		= '';
		foreach($objDoctorLangs as $result){
			$objLang 	= ORM::factory('languagemaster')->where('id','=',$result->refdocknownlanglanguageid_c)->mustFind();
			$lang		= $objLang->language_c;
		  	if($doctorLangs==''){
				$doctorLangs=$lang;
			}
			else{
				$doctorLangs=$doctorLangs.", ".$lang;
			}
		}
		
		$objDoctorTime	=ORM::factory('doctorclinictimetable')->where('doctorclinictimetable.refdoctorclinctimedoctorsid_c','=',$objDoctorProfile->doctorid)->find_all();
		$doctorTimes	='';
		foreach($objDoctorTime as $result) {
			if($doctorTimes=='' and !($result->starttime_c== NULL) and ($result->endtime_c== NULL )){
				$doctorTimes=$result->weekday_c." ".date("H:i",strtotime($result->starttime_c))." to ".date("H:i",strtotime($result->endtime_c))." hrs (IST)<br/>";
			}
			elseif(!(($result->starttime_c==NULL )AND($result->endtime_c==NULL ))){
				$doctorTimes=$doctorTimes.$result->weekday_c." ".date("H:i",strtotime($result->starttime_c)) ." to ".date("H:i",strtotime($result->endtime_c))." hrs (IST)<br/>";
			}
		}
		
		$objDoctorDomains=ORM::factory('doctorpracticedomain')->where('refdocpracticedomainddoctorid_c','=',$objDoctorProfile->doctorid)
							->find_all();
		$doctorDomains	="";
		foreach($objDoctorDomains as $result){
			$objDomain= ORM::factory('doctordomainmaster')->where('id','=',$result->refdoctordomainmasterdomainid_c)->mustFind();
			$domain 	= $objDomain->domain_c;
		  	if($doctorDomains==''){
				$doctorDomains=$domain;
			}
			else{
				$doctorDomains=$doctorDomains.", ".$domain;
			}
		}
		
		$objDoctorSpecs	= ORM::factory('doctorspecialization')-> where('refdoctorspecializationdoctorid_c','=',$objDoctorProfile->doctorid)-> find_all();
		$doctorSpecs	= "";
		foreach($objDoctorSpecs as $result){
			$objSpec= ORM::factory('doctorspecializationmaster')->where('id','=',$result->refdoctorspecializationid_c)->mustFind();
			$spec	= $objSpec->specialization_c;
		  	if($doctorSpecs==''){
				$doctorSpecs=$spec;
			}
			else{
				$doctorSpecs=$doctorSpecs.", ".$spec;
			}
		}
		$objDoctorEdus	= ORM::factory('doctoreducation')-> where('refdocedudoctorsid_c','=',$objDoctorProfile->doctorid)-> find_all();
		$doctorEdus		= "";
		foreach($objDoctorEdus as $result){
			$objEdu = ORM::factory('educationmaster')->where('id','=',$result->refeducationid_c)->mustFind();
			$edu 	= $objEdu->education_c;
		  	if($doctorEdus==''){
				$doctorEdus=$edu;
			}
			else{
				$doctorEdus=$doctorEdus.", ".$edu;
			}
		}
		
		$obj_user 	= Auth::instance()->get_user();
		$content 	= View::factory('vuser/vstaff/vdoctorprofileforstaff');
		$content	->bind('docotrlanguage'			, $doctorLangs);
		$content	->bind('doctortime'				, $doctorTimes);
		$content	->bind('doctordomain'			, $doctorDomains);
		$content	->bind('doctoreducation'		, $doctorEdus);
		$content	->bind('doctorspecialization'	, $doctorSpecs);
		$content	->bind('obj_doctorprofile'		, $objDoctorProfile);
		$content	->bind('backurl',$backurl);
		
		$this->template->breadcrumb = "Home>>";
		$objDoctorSpecs	= ORM::factory('doctorspecialization')-> where('refdoctorspecializationdoctorid_c','=',$objDoctorProfile->doctorid)-> find_all();
		$doctorSpecs	= "";
		foreach($objDoctorSpecs as $result){
			$objSpec= ORM::factory('doctorspecializationmaster')->where('id','=',$result->refdoctorspecializationid_c)->mustFind();
			$spec	= $objSpec->specialization_c;
		  	if($doctorSpecs==''){
				$doctorSpecs=$spec;
			}
			else{
				$doctorSpecs=$doctorSpecs.", ".$spec;
			}
		}
		$objDoctorEdus	= ORM::factory('doctoreducation')-> where('refdocedudoctorsid_c','=',$objDoctorProfile->doctorid)-> find_all();
		$doctorEdus		= "";
		foreach($objDoctorEdus as $result){
			$objEdu = ORM::factory('educationmaster')->where('id','=',$result->refeducationid_c)->mustFind();
			$edu 	= $objEdu->education_c;
		  	if($doctorEdus==''){
				$doctorEdus=$edu;
			}
			else{
				$doctorEdus=$doctorEdus.", ".$edu;
			}
		}
		
		$obj_user 	= Auth::instance()->get_user();
		$content 	= View::factory('vuser/vstaff/vdoctorprofileforstaff');
		$content	->bind('docotrlanguage'			, $doctorLangs);
		$content	->bind('doctortime'				, $doctorTimes);
		$content	->bind('doctordomain'			, $doctorDomains);
		$content	->bind('doctoreducation'		, $doctorEdus);
		$content	->bind('doctorspecialization'	, $doctorSpecs);
		$content	->bind('obj_doctorprofile'		, $objDoctorProfile);
		$content	->bind('backurl',$backurl);
		
		$this->template->breadcrumb = "Home>>";
		$this->template->content = $content;
		$this->template->user = $obj_user->Firstname_c;
		$this->template->urole = "staff";
	}
}

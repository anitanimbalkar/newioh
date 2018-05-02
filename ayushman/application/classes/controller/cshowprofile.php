<?php defined('SYSPATH') or die('No direct script access.') ;

class Controller_Cshowprofile extends Controller_Ctemplatewithmenu {

	public function action_showprofile()
	{
		if($_GET)
		{
			$userId = $_GET['userid'];
			$objViewUsers=ORM::factory('viewusers')->where('id','=',$userId)->find();
			$role = $objViewUsers->role;
			$activationstatus=$objViewUsers->activationstatus;
		}
		
		$refer = $_SERVER['HTTP_REFERER'];
		//var_dump($refer); die();
		$findme = '/ayushman/cdashboard/view';
		//$findme1= 'ayushman/cayushusers/search';
		$pos = strpos($refer, $findme);
		//$pos1 = strpos($refer, $findme1);
		if($pos == 0 )
		{$pos ="0";
		$session = Session::instance();
		$session->set('backaction', TRUE);
		}
		else{$pos ="1";}
		//var_dump($pos); die();
		$objUser = ORM::factory('user')->where('id','=',$userId)->find();
		
		switch($role)
		{
			case 'Doctor': 
					switch($activationstatus)
					{
					case 'Suspended':
						$objDoctor	= ORM::factory('doctor')->where('refdoctorsid_c','=',$userId)->mustFind();	
						$objusers = ORM::factory('flowofstatus')->where('refuserid_c','=',$userId)->find_all()->as_array();
						//$reason =$objuser->suspensionreason_c;
						$arrayflow= array();
						$timearray = array();
						$flag =0;
					foreach($objusers as $objuser )
					{	if($flag== 0)
						{
						array_push($arrayflow,$objuser->old_value);
						array_push($timearray,$objuser->updatetime_c);
						$flag=1;
						}
						
						array_push($arrayflow,trim($objuser->new_value));
						array_push($timearray,trim($objuser->updatetime_c));
					}
						
						$objDoctorcertificate = ORM::factory('doctorcertificate')->where('refdoctorid_c','=',$objDoctor->id)->mustFind();	
						$content 	= View::factory('vuser/vshowdoctorprofile');
						$content	->bind('objDoctor', $objDoctor);
						$content	->bind('objDoctorcertificate', $objDoctorcertificate);
						$content     ->bind('refer',$refer);
						$content     ->bind('reason',$reason);
						$content     ->bind('pos',$pos);
						$content     ->bind('timearray',$timearray);
						$content     ->bind('arrayflow',$arrayflow);
						break;
					
					case 'Unverified':
						
						$objDoctor	= ORM::factory('doctor')->where('refdoctorsid_c','=',$userId)->mustFind();	
						$objusers = ORM::factory('flowofstatus')->where('refuserid_c','=',$userId)->find_all()->as_array();
						//$reason =$objuser->suspensionreason_c;
						$arrayflow= array();
						$timearray = array();
						$flag =0;
						foreach($objusers as $objuser )
						{	if($flag== 0)
							{
							array_push($arrayflow,$objuser->old_value);
							array_push($timearray,$objuser->updatetime_c);
							$flag=1;
							}
							
							array_push($arrayflow,trim($objuser->new_value));
							array_push($timearray,trim($objuser->updatetime_c));
						}
						$objDoctorcertificate = ORM::factory('doctorcertificate')->where('refdoctorid_c','=',$objDoctor->id)->mustFind();	
						$content 	= View::factory('vuser/vshowdoctorprofile');
						$content	->bind('objDoctor', $objDoctor);
						$content	->bind('objDoctorcertificate', $objDoctorcertificate);
						$content     ->bind('refer',$refer);
						$content     ->bind('pos',$pos);
						$content     ->bind('timearray',$timearray);
						$content     ->bind('arrayflow',$arrayflow);
						break;
					
					case 'New':
						$objDoctor	= ORM::factory('doctor')->where('refdoctorsid_c','=',$userId)->mustFind();	
						$objusers = ORM::factory('flowofstatus')->where('refuserid_c','=',$userId)->find_all()->as_array();
						//$reason =$objuser->suspensionreason_c;
						$arrayflow= array();
						$timearray = array();
						$flag =0;
						foreach($objusers as $objuser )
						{	if($flag== 0)
							{
							array_push($arrayflow,$objuser->old_value);
							array_push($timearray,$objuser->updatetime_c);
							$flag=1;
							}
							
							array_push($arrayflow,trim($objuser->new_value));
							array_push($timearray,trim($objuser->updatetime_c));
						}
						$objDoctorcertificate = ORM::factory('doctorcertificate')->where('refdoctorid_c','=',$objDoctor->id)->mustFind();	
						$content 	= View::factory('vuser/vshowdoctorprofile');
						$content	->bind('objDoctor', $objDoctor);
						$content	->bind('objDoctorcertificate', $objDoctorcertificate);
						$content     ->bind('refer',$refer);
						$content     ->bind('pos',$pos);
						$content     ->bind('timearray',$timearray);
						$content     ->bind('arrayflow',$arrayflow);
						break;
				case 'Verified':
				$doctorId=$_GET['userid'];
		
		$objDoctorProfile	= ORM::factory('doctorprofile')
							-> where('userid','=',$doctorId)
							-> find();
		
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
		$objusers = ORM::factory('flowofstatus')->where('refuserid_c','=',$userId)->find_all()->as_array();
						//$reason =$objuser->suspensionreason_c;
						$arrayflow= array();
						$timearray = array();
						$flag =0;
						foreach($objusers as $objuser )
						{	if($flag== 0)
							{
							array_push($arrayflow,$objuser->old_value);
							array_push($timearray,$objuser->updatetime_c);
							$flag=1;
							}
							
							array_push($arrayflow,trim($objuser->new_value));
							array_push($timearray,trim($objuser->updatetime_c));
						}
		$obj_user 	= Auth::instance()->get_user();
		
		$content 	= View::factory('vuser/vactivedoctorprofile');
		
		$content	->bind('docotrlanguage'			, $doctorLangs);
		$content	->bind('doctortime'				, $doctorTimes);
		$content	->bind('doctordomain'			, $doctorDomains);
		$content	->bind('doctoreducation'		, $doctorEdus);
		$content	->bind('doctorspecialization'	, $doctorSpecs);
		$content	->bind('obj_doctorprofile'		, $objDoctorProfile);
		$content     ->bind('pos',$pos);
		$content     ->bind('timearray',$timearray);
						$content     ->bind('arrayflow',$arrayflow);
	
				
			    $content     ->bind('refer',$refer);
				
		break;
			}
			break;
			case 'Chemist' :
				$objChemist = ORM::factory('chemist')->where('refchemistsuserid_c','=',$userId)->mustFind();
				$objuser = ORM::factory('user')->where('id','=',$userId)->find();
						$reason =$objuser->suspensionreason_c;
				$objusers = ORM::factory('flowofstatus')->where('refuserid_c','=',$userId)->find_all()->as_array();
						//$reason =$objuser->suspensionreason_c;
						$arrayflow= array();
						$timearray = array();
						$flag =0;
						foreach($objusers as $objuser )
						{	if($flag== 0)
							{
							array_push($arrayflow,$objuser->old_value);
							array_push($timearray,$objuser->updatetime_c);
							$flag=1;
							}
							
							array_push($arrayflow,trim($objuser->new_value));
							array_push($timearray,trim($objuser->updatetime_c));
						}		
				$content 	= View::factory('vuser/vshowchemistprofile');
				$content	->bind('chemist', $objChemist);
				$content     ->bind('refer',$refer);
				$content     ->bind('pos',$pos);
				$content     ->bind('timearray',$timearray);
						$content     ->bind('arrayflow',$arrayflow);
			break;
			
			case 'Pathologist' :
				$objpathologist = ORM::factory('pathologist')->where('refpathologistsuserid_c','=',$userId)->mustFind();
				$objuser = ORM::factory('user')->where('id','=',$userId)->find();
						$reason =$objuser->suspensionreason_c;
					$objusers = ORM::factory('flowofstatus')->where('refuserid_c','=',$userId)->find_all()->as_array();
						//$reason =$objuser->suspensionreason_c;
						$arrayflow= array();
						$timearray = array();
						$flag =0;
						foreach($objusers as $objuser )
						{	if($flag== 0)
							{
							array_push($arrayflow,$objuser->old_value);
							array_push($timearray,$objuser->updatetime_c);
							$flag=1;
							}
							
							array_push($arrayflow,trim($objuser->new_value));
							array_push($timearray,trim($objuser->updatetime_c));
						}	
				$content 		= View::factory('vuser/vshowpathologistprofile');
				$content		->bind('pathologist', $objpathologist);
				$content     ->bind('refer',$refer);
				$content     ->bind('reason',$reason);
				$content     ->bind('pos',$pos);
				$content     ->bind('timearray',$timearray);
						$content     ->bind('arrayflow',$arrayflow);
			break;
			
			case 'Patient' :
				
				$obj_user = ORM::factory('user')->where('id','=',$userId)->Find();
				$objuser = ORM::factory('user')->where('id','=',$userId)->find();
						$reason =$objuser->suspensionreason_c;
						
				$objdoctor = ORM::factory('doctor');
				$doctor = $objdoctor->where('refdoctorsid_c','=',$obj_user->id)->find();
				if($doctor->id != null)
				{
				$patientid = $_GET['patientid'];
				$obj_patient = ORM::factory('user');
				$obj_patient = $obj_patient->where('id','=',$patientid)->find();
				$urole = "doctor";
				}
				else{
				$obj_patient = $obj_user;
				$urole = "patient";
				}
				$objPatientInfo = new Model_Patient;
				$objPatientInfo->where('repatientsuserid_c','=',$obj_patient->id)->find();
				$patientid = $objPatientInfo->id;
				$objusers = ORM::factory('flowofstatus')->where('refuserid_c','=',$userId)->find_all()->as_array();
						//$reason =$objuser->suspensionreason_c;
						$arrayflow= array();
						$timearray = array();
						$flag =0;
						foreach($objusers as $objuser )
						{	if($flag== 0)
							{
							array_push($arrayflow,$objuser->old_value);
							array_push($timearray,$objuser->updatetime_c);
							$flag=1;
							}
							
							array_push($arrayflow,trim($objuser->new_value));
							array_push($timearray,trim($objuser->updatetime_c));
						}
				//$objpatient = ORM::factory('patient')->where('repatientsuserid_c','=',$userId)->mustFind();
				$content 		= View::factory('vuser/vshowpatientprofile');
				$objaddhome = ORM::factory('address')
 							->where('id','=',$obj_patient->refaddresshome1_c)
							->find();
				$objaddwork = ORM::factory('address')
 							->where('id','=',$obj_patient->refaddresswork_c)
							->find();
				$content->bind('patientid', $patientid);
				$content->bind('user', $obj_user);
				$content->bind('patient', $obj_patient);
				$content->bind('patientinfo', $objPatientInfo);
				$content->bind('objaddhome', $objaddhome);
				$content->bind('objaddwork', $objaddwork);
				$content     ->bind('reason',$reason);
				$content ->bind('refer',$refer);
				$content     ->bind('pos',$pos);
				$content     ->bind('timearray',$timearray);
						$content     ->bind('arrayflow',$arrayflow);
			break;
			case 'staff' :
				
				$objstaffInfo = ORM::factory('staff')->where('refstaffuserid_c','=',$userId)->mustFind();
				$obj_user =  ORM::factory('user')->where('id','=',$userId)->Find();
				$objuser = ORM::factory('user')->where('id','=',$userId)->find();
						$reason =$objuser->suspensionreason_c;
						
				$staffid = $objstaffInfo->id;
				$obj_staff = $obj_user;
				$objusers = ORM::factory('flowofstatus')->where('refuserid_c','=',$userId)->find_all()->as_array();
						//$reason =$objuser->suspensionreason_c;
						$arrayflow= array();
						$timearray = array();
						$flag =0;
						foreach($objusers as $objuser )
						{	if($flag== 0)
							{
							array_push($arrayflow,$objuser->old_value);
							array_push($timearray,$objuser->updatetime_c);
							$flag=1;
							}
							
							array_push($arrayflow,trim($objuser->new_value));
							array_push($timearray,trim($objuser->updatetime_c));
						}
				//$objpatient = ORM::factory('patient')->where('repatientsuserid_c','=',$userId)->mustFind();
				$content 		= View::factory('vuser/vshowstaffprofile');
				$objaddhome = ORM::factory('address')
 							->where('id','=',$obj_staff->refaddresshome1_c)
							->find();
				$objaddwork = ORM::factory('address')
 							->where('id','=',$obj_staff->refaddresswork_c)
							->find();
				$content->bind('staffid', $staffid);
				$content->bind('user', $obj_user);
				$content->bind('staff', $obj_staff);
				$content->bind('staffinfo', $objstaffInfo);
				$content->bind('objaddhome', $objaddhome);
				$content->bind('objaddwork', $objaddwork);
				$content ->bind('refer',$refer);
				$content     ->bind('reason',$reason);
				$content ->bind('pos',$pos);
				$content     ->bind('timearray',$timearray);
						$content     ->bind('arrayflow',$arrayflow);
			break;
			
			
		}
		if($role != "Doctor")
		{
			$objAddress = ORM::factory('address')->where('id','=',$objUser->refaddresswork_c)->mustFind();
			
			$content->bind('address',$objAddress);	
		}
		$content->bind('objUser',$objUser);
		
		$user = Auth::instance()->get_user();
        $this->template->breadcrumb = "";
        $this->template->user = $user->Firstname_c; ;
		$this->template->content = $content;
		$this->template->urole = "admin";
		
	}

public function action_displaydemographic()
	{
		try
		{	
			$obj_user = Auth::instance()->get_user();
			if(empty($_GET['patientid']) == false )//patient id is present then add in varible
			{
				$patientid = $_GET['patientid'];
			}
			else
			{
				$patientid = "";
			}
			$userRole = $this->getuserrole();	
			$objUserForPatient = $this->getpatient($patientid);
			$objPatient = new Model_Patient;
			$objPatient ->where('repatientsuserid_c','=',$objUserForPatient->id)->find();
			$patientid = $objPatient->id;
			$objaddhome = ORM::factory('address')
 							->where('id','=',$objUserForPatient->refaddresshome1_c)
							->find();
			$objaddwork = ORM::factory('address')
 							->where('id','=',$objUserForPatient->refaddresswork_c)
							->find();
			$showall = $_GET['showall'] ;
			$content = View::factory('vuser/vpatient/vpatienthistorydemographic');
			$content->bind('objUserForPatient', $objUserForPatient);
			$content->bind('objPatient', $objPatient);
			$content->bind('objaddhome', $objaddhome);
			$content->bind('objaddwork', $objaddwork);
			$content->bind('showall',$showall);
			$breadcrumb = "Home>>";
            $this->template->breadcrumb = $breadcrumb;
			$this->template->content = $content;
			$this->template->user = $obj_user->Firstname_c;
			$this->template->urole = $userRole;
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
	}
}
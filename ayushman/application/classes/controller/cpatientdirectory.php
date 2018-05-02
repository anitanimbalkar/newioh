<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/notificationsender.php');
class Controller_Cpatientdirectory extends Controller_Ctemplatewithmenu {
	
	public function action_view()
	{
		$this->displaypatientlist();
	}
	public function action_getsearchdata(){
			$array_specialization=array();
			$array_city=array();
			$array_language=array();
			$response=array();
			$firstelem=array();
			$objDoctorSpecializationMaster = ORM::factory('doctorspecializationmaster')
											->mustFindAll();
			$objDoctorlanguageMaster = ORM::factory('languagemaster')
											->mustFindAll();
			$firstelem['name']='Select Specialization';
			array_push($array_specialization, $firstelem);
			
			foreach($objDoctorSpecializationMaster as $result)
			{
				$array=array();
				if(! empty($result->specialization_c)){
					$array['name']=$result->specialization_c;
					array_push($array_specialization, $array);
				}	
			}

			$firstelem['name']='Select Language';
			array_push($array_language, $firstelem);
			foreach($objDoctorlanguageMaster as $result)
			{
				$array=array();
				if(! empty($result->language_c) && ($result->validate_c=='true' ) && (!(in_array($result->language_c,$array_language)))){
					$array['name']=$result->language_c;
					array_push($array_language, $array);
				}
			}

			$objSearchDoctors = ORM::factory('doctorcity')->find_all();
			$firstelem['name']='Select City';
			array_push($array_city, $firstelem);

			foreach($objSearchDoctors as $result)
			{
					$array=array();
					$array['name']=(trim(ucfirst($result->doctorcity)));
					array_push($array_city,$array);
			}

		//	$array_city=array_unique($array_city);
	
			$response['specialization']=$array_specialization;
			$response['city']=$array_city;
			$response['language']=$array_language;
			
		echo(json_encode($response));die;
	}	
public function action_addremovedoctor()
{
	$favdocid=$_POST['docid'];
	$option=$_POST['option'];
	$response=array();
	$objUser = Auth::instance()->get_user();
	
	if($option=='add'){
		$objfavoritedoctorbydoctor=new Model_Favoritedoctorbydoctor;
		$objfavoritedoctorbydoctor->reffavdoctorsid_c=$favdocid;
		$objfavoritedoctorbydoctor->refdoctorsid_c=$objUser->id;
		$objfavoritedoctorbydoctor->save();
	}
	else{
		$objfavoritedoctorbydoctor=ORM::factory('favoritedoctorbydoctor')->where('reffavdoctorsid_c','=',$favdocid)->where('refdoctorsid_c','=',$objUser->id)->find();
		$objfavoritedoctorbydoctor->delete();
	}
		echo(json_encode($response));die;
}
	public function action_mypatientlist()
	{
		$objUser = Auth::instance()->get_user();
			//$content = View::factory('vuser/vdoctor/vpatientlist');
			$userid = $objUser->id;
			$obj_doctor = ORM::factory('doctor')
					->where('refdoctorsid_c','=',$userid)
					->mustFind();
			$doctorid = $obj_doctor->id;
		$whereclause = '[doctorid,=,'.$doctorid.']';
		
		$columns = 'doctorid,patientid,patientuserid,patientname,age,city_c,corporatename_c,location_c,date';
		//echo $columns;
		//$whereclause = $_GET["whereclause"];
		$groupby = "";
		
		$page = "1"; 
        	$limit = "15"; 
		$sidx = "patientid"; 
		$sord = 'asc'; 	
		
			$table = 'selecteddoctorbypatient';
			
			$jqgriddata=new Model_xjqgridgetdata;
			$result=$jqgriddata->getjsondata($page,$limit,$sidx,$sord,$table,$columns,$whereclause,$groupby);
			
			$header=$result[0];
			$response=array();
			$temp=array();
			$i=0;
			foreach($result as $res)
			{
				if($i>0)
				{
					$temp[$header[0]]=$res[0];
					$temp[$header[1]]=$res[1];
					$temp[$header[2]]=$res[2];
					$temp[$header[3]]=$res[3];
					$temp[$header[4]]=$res[4];
					$temp[$header[5]]=$res[5];
					$temp[$header[6]]=$res[6];
					$temp[$header[7]]=$res[7];
					$temp[$header[8]]=$res[8];
					
					array_push($response,$temp);
					
				}
				$i++;
			}
			
			echo(json_encode($response));die;
	
	
	}
	public function action_mydoctorlist()
	{
		$objUser = Auth::instance()->get_user();
			//$content = View::factory('vuser/vdoctor/vpatientlist');
			$userid = $objUser->id;
			$obj_doctor = ORM::factory('doctor')
					->where('refdoctorsid_c','=',$userid)
					->mustFind();
			$doctorid = $obj_doctor->id;
		$whereclause = '[doctorsid,=,'.$userid.']';
		
		$columns = 'favdoctorsid,experience,doctorname,languages_c,domain_c,specialization_c,education_c,city_c,location_c';
		//echo $columns;
		//$whereclause = $_GET["whereclause"];
		$groupby = "";
		
		$page = "1"; 
        	$limit = "5"; 
		$sidx = "favdoctorsid"; 
		$sord = 'asc'; 	
		
			$table = 'selecteddoctorbydoctor';
			
			$jqgriddata=new Model_xjqgridgetdata;
			$result=$jqgriddata->getjsondata($page,$limit,$sidx,$sord,$table,$columns,$whereclause,$groupby);
			
			$header=$result[0];
			$response=array();
			$temp=array();
			$i=0;
			foreach($result as $res)
			{
				if($i>0)
				{
					$temp[$header[0]]=$res[0];
					$temp[$header[1]]=$res[1];
					$temp[$header[2]]=$res[2];
					$temp[$header[3]]=$res[3];
					$temp[$header[4]]=$res[4];
					$temp[$header[5]]=$res[5];
					$temp[$header[6]]=$res[6];
					$temp[$header[7]]=$res[7];
					$temp[$header[8]]=$res[8];
					
					array_push($response,$temp);
					
				}
				$i++;
			}
			
			echo(json_encode($response));die;
	
	
	}
	public function action_searchdoctors()
	{
		$objUser = Auth::instance()->get_user();
			//$content = View::factory('vuser/vdoctor/vpatientlist');
			$userid = $objUser->id;
			$obj_doctor = ORM::factory('doctor')
					->where('refdoctorsid_c','=',$userid)
					->mustFind();
			$doctorid = $obj_doctor->id;

			if(isset($_POST['searchname'])){
				$searchname=$_POST['searchname'];
			}
			else{
				$searchname='';
			}
			if(isset($_POST['selectspec'])){
				$selectspec=$_POST['selectspec'];
			}
			else{
				$selectspec='';
			}
			if(isset($_POST['selectcity'])){
				$selectcity=$_POST['selectcity'];
			}
			else{
				$selectcity='';
			}
			if(isset($_POST['selectlang'])){
				$selectlang=$_POST['selectlang'];
			}
			else{
				$selectlang='';
			}
//			var_dump($_POST['searchname'].'   '.$_POST['selectspec'].'     '.$_POST['selectcity'].'   '.$_POST['selectlang']);
//			die;

		if($searchname == "" && ($selectspec =='Select Specialization' || $selectspec =='') && ($selectlang=='Select Language' || $selectlang =='') && ($selectcity =='Select City' || $selectcity =='')){
			$whereclause = "";
		}
		else{
			$whereclause = "";
			if($searchname != "")
				$whereclause = $whereclause."[doctorname,like,%".$searchname."%]";
			if($selectspec != "" && $selectspec !='Select Specialization')
				$whereclause = $whereclause."[specialization_c,like,% ".$selectspec."%]";
			if ($selectlang != "" && $selectlang !='Select Language')
				$whereclause = $whereclause."[languages_c,like,%".$selectlang."%]";
			if ($selectcity != "" && $selectcity != "City" && $selectcity !='Select City')
				$whereclause = $whereclause."[city_c,like,%".$selectcity."%]";
		}
		$columns = 'userid,experience,doctorname,languages_c,domain_c,specialization_c,education_c,city_c,location_c';
		//echo $columns;
		//$whereclause = $_GET["whereclause"];
		$groupby = "";
		
		$page = "1"; 
        	$limit = "10"; 
		$sidx = "userid"; 
		$sord = 'asc'; 	
		
			$table = 'searchdoctorsonline';
			
			$jqgriddata=new Model_xjqgridgetdata;
			$result=$jqgriddata->getjsondata($page,$limit,$sidx,$sord,$table,$columns,$whereclause,$groupby);
			
			$header=$result[0];
			$response=array();
			$temp=array();
			$i=0;
			foreach($result as $res)
			{
				if($i>0)
				{
					$temp[$header[0]]=$res[0];
					$temp[$header[1]]=$res[1];
					$temp[$header[2]]=$res[2];
					$temp[$header[3]]=$res[3];
					$temp[$header[4]]=$res[4];
					$temp[$header[5]]=$res[5];
					$temp[$header[6]]=$res[6];
					$temp[$header[7]]=$res[7];
					$temp[$header[8]]=$res[8];
					
					array_push($response,$temp);
					
				}
				$i++;
			}
			
			echo(json_encode($response));die;
	
	
	}
	
	public function action_searchpatients()
	{
		$this->displaypatientlist();
	}
	
	private function displaypatientlist()
	{
		try
		{
			$objUser = Auth::instance()->get_user();
			$content = View::factory('vuser/vdoctor/vpatientlist');
			$userid = $objUser->id;
			$obj_doctor = ORM::factory('doctor')
					->where('refdoctorsid_c','=',$userid)
					->mustFind();
			$doctorid = $obj_doctor->id;
			$_POST['doctorid'] = $doctorid;
			$content->bind('userid', $userid);
			$content->bind('doctorid',$doctorid);
			$content->bind('whereclause', $whereclause);
			$urole = "doctor";
			$breadcrumb = "Home>>";
			$this->template->breadcrumb = $breadcrumb;
			$this->template->content = $content;
			$this->template->user = $objUser->Firstname_c;
			$this->template->urole = $urole;
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}	
	}
	
	public function action_previousincidence()
	{
		try
		{
			$patientuserid= $_GET["patientuserid"];
			if($patientuserid != "")
			{
				$objUser = Auth::instance()->get_user();
				$userid = $objUser->id;
				$obj_doctor = ORM::factory('doctor')
						->where('refdoctorsid_c','=',$userid)
						->mustFind();
				$objincident = ORM::factory('incident')
					->join('appointments')
					->on('appointments.refincidentid_c','=','incident.id')
					->where('appointments.refappfromid_c','=',$patientuserid)
					->where('appointments.refappwithid_c','=',$obj_doctor->id)
					->find_all();
				$result = $objincident;
				$previnciarray=array();
				$patientincidents = array();
				$i = -1;
				foreach($result as $res)
				{
					$incidentdt="";
					if(! empty( $res->incidentdate_c))
						$incidentdt= date('d M Y',strtotime( $res->incidentdate_c));
					$incident=trim($res->incidentsname_c." ".$incidentdt);
					if (!in_array($incident,$patientincidents))
					{	
						$i=$i + 1;
						array_push($patientincidents,trim($res->incidentsname_c." ".$incidentdt));
						$previnciarray[$i][0]=$res->id;
						$previnciarray[$i][1]=$res->incidentsname_c." ".$incidentdt;
					}
				}
				die(json_encode($previnciarray));
			}
			else{
				throw new Exception('Patient user id is not set for finding previous incident.');
			}	
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}	
	}
	public function action_oldincidence()
	{
		try
		{
			$patientuserid= $_GET["patientuserid"];
			if($patientuserid != "")
			{
				$objUser = Auth::instance()->get_user();
				$userid = $objUser->id;
				$obj_doctor = ORM::factory('doctor')
						->where('refdoctorsid_c','=',$userid)
						->mustFind();
				$objincident = ORM::factory('incident')
					->join('appointments')
					->on('appointments.refincidentid_c','=','incident.id')
					->where('appointments.refappfromid_c','=',$patientuserid)
					->where('appointments.refappwithid_c','=',$obj_doctor->id)
					->find_all();
				$result = $objincident;
				$previnciarray=array();
				$patientincidents = array();
				$i = -1;
				foreach($result as $res)
				{
					$incidentdt="";
					if(! empty( $res->incidentdate_c))
						$incidentdt= date('d M Y',strtotime( $res->incidentdate_c));
					$incident=trim($res->incidentsname_c." ".$incidentdt);
					if (!in_array($incident,$patientincidents))
					{	
						$i=$i + 1;
						array_push($patientincidents,trim($res->incidentsname_c." ".$incidentdt));
						$previnciarray[$i]["id"]=$res->id;
						$previnciarray[$i]["name"]=$res->incidentsname_c." ".$incidentdt;
					
						
					}
				}
				die(json_encode($previnciarray));
			}
			else{
				throw new Exception('Patient user id is not set for finding previous incident.');
			}	
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}	
	}
	public function action_viewpatientvalidation()
	{
		$errors = array();
		$messages = array();
		$this->display($errors,$messages);
	}
	
	//Common function for displaying company profile page. $errors and $messages will be shown on page if it contains any data.
	private function display($errors, $messages)
	{
		try{
			$content 	= View::factory('vuser/vpatient/vpatientvalidation');
			$content->bind('errors', $errors);
			$content->bind('messages', $messages);
			$this->template->content = $content;
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
		
	// validate patient
	public function action_validate()
	{
		$messages = array();
		$errors = array();
		try{
			if($_POST){
				$iohid		= $_POST['iohid'];
				$emailid 	= $_POST['emailid'];

				//user cannot add himself as patient. check with iohid entered on validation page with logged in user.
				if(Auth::instance()->get_user()->id == $iohid){
					$messages['message'] = 'You cannot add yourself as patient';
					$this->display($errors, $messages);
				}else{

					//Check iohid and emailid entered on validation page in users table.
					$objUser = ORM::factory('user')->where('email','=',$emailid)->where('id','=',$iohid)->find();
					if($objUser->id != null){
						//check that user is patient or not
						//$obj_patient= ORM::factory('patient')->where('repatientsuserid_c','=',$objUser->id)->find();
						$obj_patient= ORM::factory('patient')
										->where('repatientsuserid_c','=',$objUser->id)
										->where('refhospitalid_c','=',null)
										->find();
						if($obj_patient->id != null){
							$_POST['patientid'] = $iohid;
							$patientid=$obj_patient->id;
							$obj_user = Auth::instance()->get_user();
							$obj_doctor=ORM::factory('doctor')-> where('refdoctorsid_c','=',$obj_user->id)->find();
							//Check patient is already in network of doctor.
							$obj_favoritedocterbypatients = ORM::factory('favoritedocterbypatient')
															->where('reffavdocbypatpatientsid_c','=',$patientid)
															->where('reffavdocbypatdoctorsid_c','=',$obj_doctor->id)
															->find();
							$array_favoritedocterbypatients=$obj_favoritedocterbypatients->as_array();
							if($array_favoritedocterbypatients['id'] == NULL){
								$this->showPatientProfile($errors, $messages, $iohid);
							}
							else{
								$errors['error'] = 'Patient is already in your network';
								$this->display($errors, $messages);
							}
						}
						else
						{
							$messages['message'] = 'IOH id '.$iohid.' is not patient';
							$this->display($errors, $messages);
						}
					}
					else{
						$errors['error'] = 'Could not find a person matching with information provided by you.';
						$this->display($errors, $messages);
					}
				}
			}else{
				$errors['error'] = '$_Post is null';
				$this->display($errors, $messages);
			}
		}catch(Exception $e){
		
			throw new Exception($e);
		}
	}

	//Action to display patient profile
	private function showPatientProfile($errors, $messages, $patientUserId)
	{
		try
		{	
			$obj_user = Auth::instance()->get_user();
			$objUserForPatient 	= ORM::factory('user')->where('id','=',$patientUserId)->find();
			$content = View::factory('vuser/vpatient/vpatientlistprofile');
			$content->bind('objUserForPatient', $objUserForPatient);
			$content->bind('errors', $errors);
			$content->bind('messages', $messages);
			$this->template->content = $content;
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
	}
	
	public function action_sendacesscode()
	{
		try{
			$obj_user = Auth::instance()->get_user();
			if($obj_user->id != NULL )
			{
				$patientuserid = $_GET['patientuserid'];
				$accesscode = ORM::factory('accesscode')->where('generatedbyuserid_c','=', $obj_user->id)->where('generatedforuserid_c','=',$patientuserid)->find();
				if(($accesscode->id == NULL) or ($accesscode->status_c=="pending"))
				{
					$code = substr(md5(microtime()),rand(0,26),6);
					$accesscode->generatedbyuserid_c = $obj_user->id;
					$accesscode->generatedforuserid_c = $patientuserid;
					$accesscode->accesscode_c=$code;
					$accesscode->status_c="pending";
					$accesscode->save();
					$drname= $obj_user->Firstname_c;
					$notification['id']=$patientuserid;$notification['template']='patientaddedbydoctor';$notification['sms']='true'; $notification['code']=$code;$notification['drname']=$drname;
					helper_notificationsender::sendnotification($notification);
				}
				else
				{
					if($accesscode->status_c== "completed" )
					{
						die();
					}
				}
				die("sucess");
			}
			else
			{
				throw new Exception("You are log out from system");
			}
			
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
	
	public function action_verifycode()
	{
		try{
			$obj_user = Auth::instance()->get_user();
			if($obj_user->id != NULL )
			{
				$patientuserid = $_GET['patientuserid'];
				$code =$_GET['code'];
				$objUser = Auth::instance()->get_user();
				$accesscode = ORM::factory('accesscode')->where('generatedbyuserid_c','=', $objUser->id)->where('generatedforuserid_c','=',$patientuserid)->where('accesscode_c','=',$code)->find();
				if($accesscode->id != NULL)
				{
					if($accesscode->status_c="pending")
					{
						$accesscode->status_c="completed";
						$obj_doctor=ORM::factory('doctor')-> where('refdoctorsid_c','=',$objUser->id)->find();
						$obj_patient=ORM::factory('patient')-> where('repatientsuserid_c','=',$patientuserid)->find();
						$obj_favoritedocterbypatients = ORM::factory('favoritedocterbypatient')
															->where('reffavdocbypatpatientsid_c','=',$obj_patient->id)
															->where('reffavdocbypatdoctorsid_c','=',$obj_doctor->id)
															->find();
						$array_favoritedocterbypatients=$obj_favoritedocterbypatients->as_array();
						if($array_favoritedocterbypatients['id']==NULL){
							$obj_favoritedocterbypatients->reffavdocbypatpatientsid_c = $obj_patient->id;
							$obj_favoritedocterbypatients->reffavdocbypatdoctorsid_c = $obj_doctor->id;
							$obj_favoritedocterbypatients->save();
						}
						$accesscode->save();
						die("sucess");
					}
					{
						die("unsucess");
					}
				}
				else
				{
					die("unsucess");
				}
				die("sucess");
			}
			else
			{
				throw new Exception("You are log out from system");
			}
			
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
	
}

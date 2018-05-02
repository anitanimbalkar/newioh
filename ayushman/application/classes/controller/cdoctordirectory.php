<?php defined('SYSPATH') or die('No direct script access.');
include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/xmpp.php');
class Controller_Cdoctordirectory extends Controller_Ctemplatewithmenu {

	public function action_view()//called to display doctor panel view
	{		
		$whereclause = "";
		$message = array();
		$this->displayfavoritedoctors($whereclause,$message);
	}

	public function action_adddoctortofavorite()//adds doctor to patient's favorite doctors' panek
	{
		try
			{
							
				$doctorId=$_GET["doctorid"];
				$userId=$_GET["userid"];
				$doctorUserId=$_GET["doctoruserid"];
				$role=$_GET["role"];
				$arr_xmpp =Kohana::$config->load('xmpp');
				$objUser = Auth::instance()->get_user();	
				
				try{
					$var = 'success';
					$var = xmpp::addRosterContact($doctorUserId.'@'.$arr_xmpp['servername'],'',$userId.'@'.$arr_xmpp['servername'],$objUser->xmpppassword_c);
				
				}catch(Exception $e){
				
				}
				
				if($var != 'success')//error while adding in xmpp contact list 
				{
					throw new Exception($var["ERROR"]);
				}
				else //successfully added in xmpp contat now add it in "favoritedocterbypatient" table 
				{
					switch($role)
					{
					
						case 'patient': $objPatient = ORM::factory('patient')
													->where('repatientsuserid_c','=',$userId)
													->mustFind();
										$patientId=$objPatient->id;
								
										$objFavoriteDocterByPatients = ORM::factory('favoritedocterbypatient')
																		->where('reffavdocbypatpatientsid_c','=',$patientId)
																		->where('reffavdocbypatdoctorsid_c','=',$doctorId)
																		->find()
																		->as_array();
										if($objFavoriteDocterByPatients['id']==NULL){
											$objFavoriteDocterByPatients = ORM::factory('favoritedocterbypatient');
											$objFavoriteDocterByPatients->reffavdocbypatpatientsid_c=$patientId;
											$objFavoriteDocterByPatients->reffavdocbypatdoctorsid_c=$doctorId;
											$objFavoriteDocterByPatients->save();
										}
										break;
						default: throw new Exception ("Role not found");
									break;
				}
				Request::current()->redirect('cdoctordirectory/view');
			}
	}
		catch(Exception $e)
		{
			throw new Exception($e);
		}	
	}

	public function action_removefromfavorite()//removes doctor from patient's favorite doctors' panel
	{
		try
		{
			$doctorId=$_GET["doctorid"];
			$userId=$_GET["userid"];
			if(isset($_GET["doctoruserid"])){
				$doctorUserId=$_GET["doctoruserid"];
			}else{
				$doctorUserId = ORM::factory('doctor')->where('id','=',$doctorId)->find()->refdoctorsid_c;
			}
			
			$role=$_GET["role"];
			$objUser = Auth::instance()->get_user();
			$objPatientAppointments = ORM::factory('patientappointments')
										->where('refappwithid_c', '=',$doctorId)
										->where('userid', '=',$objUser->id)
										->where('Appointmentstatus','=','schedule')
										->find();
			$message = array();
			$whereclause = "";
			if($objPatientAppointments->id == NULL)//if record found in upcoming appointment then dont delete 
			{		
				$arr_xmpp =Kohana::$config->load('xmpp');
				try{
					$var = 'success';
					$var = xmpp::deleteRosterContact($doctorUserId.'@'.$arr_xmpp['servername'],$userId.'@'.$arr_xmpp['servername'],$objUser->xmpppassword_c);
				}catch(Exception $e){
				
				}
				if($var != 'success')//error while removing from xmpp contact list 
				{
					throw new Exception($var["ERROR"]);
				}
				else //successfully removed from xmpp contat now remove it from "favoritechemist" table 
				{
					
					switch($role)
					{
						case 'patient': $objPatient = ORM::factory('patient')
													->where('repatientsuserid_c','=',$userId)
													->mustFind();
										$patientId=$objPatient->id;
										$objFavoriteDocter = ORM::factory('favoritedocterbypatient')//would produce the SQL:select * from favoritedocterbypatients where reffavdocbypatpatientsid_c=userid and reffavdocbypatdoctorsid_c=doctorid
																->where('reffavdocbypatdoctorsid_c','=',$doctorId)
																->where('reffavdocbypatpatientsid_c','=',$patientId)
																->find_all();
										break;
						default: throw new Exception ("Role not found");
										break;
					}	
					foreach ($objFavoriteDocter as $orm)
					{
						$orm->delete();
					}
					$objaccesscode = ORM::factory('accesscode')//would produce the SQL:select * from favoritedocterbypatients where reffavdocbypatpatientsid_c=userid and reffavdocbypatdoctorsid_c=doctorid
										->where('generatedbyuserid_c','=',$doctorUserId)
										->where('generatedforuserid_c','=',$userId)
										->find();
					if($objaccesscode->id != NUll)
						$objaccesscode->delete();
					$this->displayfavoritedoctors($whereclause,$message);						
				}
			}	
			else//record is present so send message
			{
				$message['notremove'] = "Appointments with this doctor, are not completed yet. Please complete all appointments or cancel all appointments.";
				$this->displayfavoritedoctors($whereclause,$message);
			}
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}	
	}
	
	public function action_searchbuttononclick()//displays search result
	{
	
		$name=$_POST['textfield'];
		$specialization=$_POST['specialization'];
		$city=$_POST['city'];
		$language=$_POST['language'];
		$location=$_POST['location'];
		$whereclause ="";
		if($name != "")
			$whereclause = $whereclause."[doctorname,like,%".$name."%]";
		if($specialization != "")
			$whereclause = $whereclause."[specialization_c,like,% ".$specialization."%]";
		if ($language != "")
			$whereclause = $whereclause."[languages_c,like,%".$language."%]";
		if ($city != "" && $city != "City")
			$whereclause = $whereclause."[city_c,like,%".$city."%]";
		if ($location != "Locality" && $location != "")
		   	$whereclause = $whereclause."[location_c,like,%".$location."%]";
		$message = array();

		$this->displayfavoritedoctors($whereclause,$message);
	}

	public function action_selectlocation()//displays location based on city selection
	{
		try
		{
			$city = $_GET['city'];
			$objSearchdoctors = ORM::factory('address')
							->join('doctorclinics')
							->on('doctorclinics.refclinicaddressid_c','=','address.id')
							->where('address.city_c','=',$city)
							->find_all();
			$result = $objSearchdoctors;
			$array_location=array();
			foreach($result as $res)
			{
				if(! empty($res->location_c))
				array_push($array_location,trim(ucfirst($res->location_c)));
			}
			$array_location=array_unique($array_location);
			sort($array_location);
			$result = array();
			$i=0;
			foreach ( $array_location as $key => $val )
			{
				$result[$i] = $val;
				$i++;
			}
			$obj=json_encode ($result);
			die($obj);
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}	
	}
	
	private function displayfavoritedoctors($whereclause,$message)//used by action_displaydoctorfindergrid() to display doctor panel view
	{	
		try
		{
			$objUser = Auth::instance()->get_user();
			$array_domain=array();
			$array_specialization=array();
			$array_city=array();
			$array_language=array();
			$objDoctorSpecializationMaster = ORM::factory('doctorspecializationmaster')
											->mustFindAll();
			$objDoctorlanguageMaster = ORM::factory('languagemaster')
											->mustFindAll();
			foreach($objDoctorSpecializationMaster as $result)
			{
				if(! empty($result->specialization_c))
					array_push($array_specialization, $result->specialization_c);
			}
			foreach($objDoctorlanguageMaster as $result)
			{
				if(! empty($result->language_c) && ($result->validate_c=='true' ) && (!(in_array($result->language_c,$array_language))))
					array_push($array_language, $result->language_c);
			}
			$objSearchDoctors = ORM::factory('doctorcity')->find_all();
			foreach($objSearchDoctors as $result)
			{
					array_push($array_city, (trim(ucfirst($result->doctorcity))));
			}

			
		//patient related doctors
			 $usid = $objUser->id;
			 $objSearchuser = ORM::factory('patient')->where('repatientsuserid_c','=',$usid)->find();
			$userid = $objSearchuser->id;
			 $urole = "patient";
			 $whereclausetopat = $whereclause."[patientid,=,".$userid."]";
			//  var_dump($userid);
			    $searchResult = $this->request->post('search');
                $columns = 'doctorid,doctoruserid,doctorname,specialization_c,education_c,city_c,languages_c,experience,appcalid,[View{'.urlencode("/ayushman/cdoctorprofile/displaytopatient?userid=<doctoruserid>&back=cpatientfavoritedoctor").'}],[Remove{'.urlencode("/ayushman/cdoctordirectory/removefromfavorite?userid=".$userid."&doctorid=<doctorid>&doctoruserid=<doctoruserid>&role=".$urole).'}]';
                $string = "Not Yet set";                
                $object_patient_orderfrompresc = new Model_Xjqgridgetdata;
                $result = $object_patient_orderfrompresc->getfootablejsondata('', '', 'doctorname', 'DESC', 'favoritedoctorsbypatientdetails', $columns, $whereclausetopat, '');
           
			   //END: 	
				
				
		//patient searh doctors
			    $searchResult = $this->request->post('search');
                $columns = 'doctorid,userid,appcalid,doctorname,specialization_c,education_c,city_c,languages_c,experience,[Add{'.urlencode("/ayushman/cdoctordirectory/adddoctortofavorite?userid=".$userid."&doctorid=<doctorid>&doctoruserid=<userid>&role=".$urole).'}],[View{'.urlencode("/ayushman/cdoctorprofile/displaytopatient?userid=<userid>&back=cpatientfavoritedoctor").'}]';
                $string = "Not Yet set";
                
                $object_patient_orderfrompresc = new Model_Xjqgridgetdata;
                $search_result = $object_patient_orderfrompresc->getfootablejsondata('', '', 'doctorid', 'DESC', 'searchdoctorsonline', $columns, $whereclause, '');
                //END: 
				
			$searchresult_json = json_encode($search_result);
			$array_city=array_unique($array_city);
			$content = View::factory('vuser/vdoctor/vuserfavouritedoctor');
			$userid = $objUser->id;
			$obj_patients = ORM::factory('patient')
					->where('repatientsuserid_c','=',$userid)
					->find();
			$patientid=$obj_patients->id;
			$content->bind('patientid', $patientid);	
			$content->bind('userid', $userid);
			
			$content->bind('result', $result);
			$content->bind('searchresult_json', $searchresult_json);
			$content->bind('array_specialization', $array_specialization);
			$content->bind('array_city', $array_city);
			$content->bind('array_language', $array_language);
			$content->bind('whereclause', $whereclause);
			$content->bind('message', $message);
			
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
	
	public function action_getmydoctors()
	{
		if(isset($_GET['pid'])){
			$user = ORM::factory('user')->where('id','=',$_GET['pid'])->find();
		}else{
			$user = Auth::instance()->get_user();
		}
		
		$patient = ORM::factory('patient')->where('repatientsuserid_c','=',$user->id)->find();
		$objdoctors = ORM::factory('favoritedoctorsbypatientdetails')->where('patientid','=',$patient->id)->find_all();
		
		
		$doctors = array();
		$i = -1;
		foreach($objdoctors as $doctor)
		{
			$i=$i + 1;
			$doctors[$i]  = array();
			$doctors[$i][0] = $doctor->doctorid; 
			$doctors[$i][1] = ucwords($doctor->doctorname); 
			$doctors[$i][2] = ucwords($doctor->education_c); 
			$doctors[$i][3] = ucwords($doctor->specialization_c); 
			$doctors[$i][4] = ucwords($doctor->city_c);  
		}
		die(json_encode($doctors));
	}
	public function action_getalldoctors()
	{
		$hospitalid = NULL;
		$user = Auth::instance()->get_user();
		if (($user->has('roles', ORM::factory('role', array('name' => 'staff')))) OR
		($user->has('roles', ORM::factory('role', array('name' => 'ipdstaff')))) )
		{
			// Select hospitalid from staffs table
			$objstaff = ORM::factory('staff')->where('refstaffuserid_c','=',$user->id)->find();
			$hospitalid =	$objstaff->refhospitalid_c;
		}
		elseif ($user->has('roles', ORM::factory('role', array('name' => 'doctor'))))
		{
				// Select hospitalid from doctors table
			$objdoctor = ORM::factory('doctor')->where('refdoctorsid_c','=',$user->id)->find();
			$hospitalid =	$objdoctor->refhospitalid_c;
		}
		
		$objdoctors = ORM::factory('listofdoctor')
							->where('refhospitalid_c','<=>',$hospitalid)
							->find_all();
		$doctors = array();
		$i = -1;
		foreach($objdoctors as $doctor)
		{
			$i=$i + 1;
			$doctors[$i]  = array();
			$doctors[$i]['doctorid'] = $doctor->doctorid; 
			$doctors[$i]['doctoruserid'] = $doctor->userid; 
			$doctors[$i]['doctorname'] = $doctor->doctorname;
			$doctors[$i]['specialization'] = ucwords($doctor->specialization_c); 
			$doctors[$i]['education'] = ucwords($doctor->education_c); 
			$doctors[$i]['domain'] = ucwords($doctor->domain_c); 			
			$doctors[$i]['city'] = ucwords($doctor->city_c); 
			$doctors[$i]['location'] = ucwords($doctor->location_c); 
		}
		die(json_encode($doctors));
	}
} // End Welcome

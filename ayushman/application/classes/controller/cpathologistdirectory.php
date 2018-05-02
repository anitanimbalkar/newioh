<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/xmpp.php');
class Controller_Cpathologistdirectory extends Controller_Ctemplatewithmenu {
	public function action_view()
	{		
		$whereclause = "";
		$this->displayfavoritepathologists($whereclause);
	}
	
	public function action_addtofavorite()
	{
		try
		{
			$pathologistid=$_GET["pid"];
			
			if(isset($_GET['userid'])){
				$userid=$_GET["userid"];
			}else{
				$userid = Auth::instance()->get_user()->id;
			}
			$pathologistuserid=$_GET["pathologistuserid"];
			$role=$_GET["role"];
			$arr_xmpp =Kohana::$config->load('xmpp');
			
			$obj_user = ORM::factory('user')->where('id','=',$userid)->find();
			
			$pathologist = ORM::factory('user')->where('id','=',$pathologistuserid)->find(); 
			//register a pathologist if he is not registered on xmpp server
			try{
				$op = xmpp::register($pathologist->id,$pathologist->xmpppassword_c,$pathologist->email);
				$op = xmpp::register($obj_user->id,$obj_user->xmpppassword_c,$obj_user->email);
				$var = xmpp::addRosterContact($pathologistuserid.'@'.$arr_xmpp['servername'],$pathologistuserid.'@'.$arr_xmpp['servername'],$userid.'@'.$arr_xmpp['servername'],$obj_user->xmpppassword_c);
			}catch(Exception $e){
			
			}
			
			//if($var != 'success')//error while adding in xmpp contact list 
			//{
			//	throw new Exception($var["ERROR"]);
			//}
			//else //successfully added in xmpp contat now add it in "favoritepathologistbypatient" table 
			{
				switch($role)
				{
					case 'doctor': $objDoctor = ORM::factory('doctor')
													->where('refdoctorsid_c','=',$userid)
													->mustFind();
									$doctorid=$objDoctor->id;
									$objFavoritePathologistByDoctor = ORM::factory('favoritepathologistsbydoctor')
																		->where('reffavpathdoctorsid_c','=',$doctorid)
																		->where('reffavpathpathologistsid_c','=',$pathologistid)
																		->find()
																		->as_array();;
									if($objFavoritePathologistByDoctor["id"] == null)//if "pathologist and doctor pair" is not present then add. 
									{
										$objMaxPreference = ORM::factory('favoritepathologistsbydoctor')
																		->select('prefered_c')
																		->where('reffavpathdoctorsid_c','=',$doctorid)
																		->order_by('prefered_c','Desc')
																		->find()
																		->as_array();;
										if($objMaxPreference["prefered_c"]== null)
											{
												$maxpreference = 0;
											}
										else
											{
												$maxpreference = $objMaxPreference["prefered_c"][0] + 1;
											}
																		
										$objFavoritePathologistByDoctor = ORM::factory('favoritepathologistsbydoctor');
										$objFavoritePathologistByDoctor->reffavpathdoctorsid_c=$doctorid;
										$objFavoritePathologistByDoctor->reffavpathpathologistsid_c=$pathologistid;
										$objFavoritePathologistByDoctor->prefered_c=$maxpreference;
																				
										$objFavoritePathologistByDoctor->save();
									}
									break;
					case 'patient': $objPatient = ORM::factory('patient')
													->where('repatientsuserid_c','=',$userid)
													->mustFind();
									$patientid=$objPatient->id;
									$objFavoritePathologistByPatients = ORM::factory('favoritepathologistbypatient')
																		->where('reffavpathopatientsid_c','=',$patientid)
																		->where('reffavpathopathologistsid_c','=',$pathologistid)
																		->find()
																		->as_array();;
									if($objFavoritePathologistByPatients["id"] == null)//if "pathologist and patient pair" is not present then add. 
									{
										$objFavoritePathologistByPatients = ORM::factory('favoritepathologistbypatient');
										$objFavoritePathologistByPatients->reffavpathopatientsid_c=$patientid;
										$objFavoritePathologistByPatients->reffavpathopathologistsid_c=$pathologistid;
										$objFavoritePathologistByPatients->save();
									}
									break;
					case 'staff': $objStaff = ORM::factory('staff')
												->where('refstaffuserid_c','=',$userid)
												->mustFind();
									$staffid=$objStaff->id;
									$objFavoritePathologistBystaff = ORM::factory('favoritepathologistbystaff')
																->where('reffavstaffid_c','=',$staffid)
																->where('reffavpathologistid_c','=',$pathologistid)
																->find()
																->as_array();;
									if($objFavoritePathologistBystaff["id"] == null)//if "pathologist and staff" pair is not present then add. 
									{
										$objFavoritePathologistBystaff = ORM::factory('favoritepathologistbystaff');
										$objFavoritePathologistBystaff->reffavstaffid_c=$staffid;
										$objFavoritePathologistBystaff->reffavpathologistid_c=$pathologistid;
										$objFavoritePathologistBystaff->save();
									}
									break;
					default: throw new Exception ("Role not found");
									break;
				}
				Request::current()->redirect('cpathologistdirectory/view');
			}
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}	
	}
	
	public function action_removefromfavorite()
	{
		try
		{
			$pathologistid=$_GET["pid"];
			if(isset($_GET['userid'])){
				$userid = ORM::factory('user')->where('id','=',$_GET['userid'])->find()->id;
			}else{
				$userid = Auth::instance()->get_user()->id;
			}
			$pathologistuserid=ORM::factory('pathologist')->where('id','=',$pathologistid)->find()->refpathologistsuserid_c;
			$urole = '';
			$obj_user =ORM::factory('user')->where('id','=',$userid)->find();
			
			if (!$obj_user)
				Request::current()->redirect('/home/index.shtml');
			else{
				if($obj_user->activationstatus_c == 'active' || $obj_user->activationstatus_c == 'inactivedoctor' || $obj_user->activationstatus_c == 'inactivepathologist' || $obj_user->activationstatus_c == 'inactivechemist' || $obj_user->activationstatus_c == 'inactive' || $obj_user->activationstatus_c == 'activatedoctor')
				{
					if ($obj_user->has('roles', ORM::factory('role', array('name' => 'doctor'))))
						$urole = "doctor";
					else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'patient'))))
						$urole = "patient";	
					else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'admin'))))
						$urole = "admin";
					else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'chemist'))))
						$urole = "chemist";
					else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'pathologist'))))
						$urole = "pathologist";
					else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'staff'))))
						$urole = "staff";
					else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'corporate'))))
						$urole = "corporate";
					else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'serviceadmin'))))
						$urole = "serviceadmin";
				}
				else
					Request::current()->redirect('/home/index.shtml');
			}
			$role = $urole;
				
			$arr_xmpp =Kohana::$config->load('xmpp');
			
			$var = xmpp::deleteRosterContact($pathologistuserid.'@'.$arr_xmpp['servername'],$userid.'@'.$arr_xmpp['servername'],$obj_user->xmpppassword_c);
			if($var != 'success')//error while removing from xmpp contact list 
			{
				throw new Exception($var["ERROR"]);
			}
			else //successfully removed from xmpp contat now remove it from "favoritepathologist" table 
			{
				switch($role)
				{
					case 'doctor': $objDoctor = ORM::factory('doctor')
													->where('refdoctorsid_c','=',$userid)
													->mustFind();
									$doctorid=$objDoctor->id;
									$objFavoritepathologist = ORM::factory('favoritepathologistsbydoctor')
																->where('reffavpathdoctorsid_c','=',$doctorid)
																->where('reffavpathpathologistsid_c','=',$pathologistid)
																->find_all();
										
									break;
					case 'patient': $objPatient = ORM::factory('patient')
												->where('repatientsuserid_c','=',$userid)
												->mustFind();
									$patientid=$objPatient->id;
									$objFavoritepathologist = ORM::factory('favoritepathologistbypatient')
																->where('reffavpathopatientsid_c','=',$patientid)
																->where('reffavpathopathologistsid_c','=',$pathologistid)
																->find_all();
									break;
					case 'staff': $objStaff = ORM::factory('staff')
												->where('refstaffuserid_c','=',$userid)
												->mustFind();
									$staffid=$objStaff->id;
									$objFavoritepathologist = ORM::factory('favoritepathologistbystaff')
																->where('reffavstaffid_c','=',$staffid)
																->where('reffavpathologistid_c','=',$pathologistid)
																->find_all();
									break;
					default: throw new Exception ("Role not found");
									break;
				}	
				foreach ($objFavoritepathologist as $orm)
				{
					
					$orm->delete();


				}
				Request::current()->redirect('cpathologistdirectory/view');
			}
			
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}	
	}
	
	private function displayfavoritepathologists($whereclause)
	{	
		try
		{
			$objUser = Auth::instance()->get_user();
			$userid = $objUser->id;
			
			
			 $urole = "patient";
			 $searchResult = $this->request->post('search');
			 $columns = 'pathologistid,pathologistname,city_c,location_c,testsoffered_c,workinghours_c,pickupfacility_c,accreditation_c,pathologistuserid,[Add{'.urlencode("/ayushman/cpathologistdirectory/addtofavorite?userid=".$userid."&pid=<pathologistid>&pathologistuserid=<pathologistuserid>&role=".$urole).'}],pathologistuserid';
                $string = "Not Yet set";                
                $object_patient_orderfrompresc = new Model_Xjqgridgetdata;
                $resultgrid = $object_patient_orderfrompresc->getfootablejsondata('', '', 'pathologistid', 'DESC', 'searchedpathologist', $columns, $whereclause, '');
                //END: 		
			
			
			$objSearchedpathologists = ORM::factory('searchedpathologist')
										->distinct(TRUE)
										->find_all()
										->as_array();
			$result = $objSearchedpathologists;
			$array_city=array();
			$array_accreditation=array();
			$array_workinghours=array();
			$array_testsoffered=array();
			foreach($result as $res)
			{
				if(! empty($res->city_c))
				{
					array_push($array_city, (trim(ucfirst($res->city_c))));
				}
				if((!empty($res->accreditation_c)) && ($res->accreditation_c != '')  && (!(in_array($res->accreditation_c,$array_accreditation))))
				{
					array_push($array_accreditation, (trim(ucfirst($res->accreditation_c))));
				}
				if((!empty($res->workinghours_c)) && ($res->workinghours_c != '') && (!(in_array($res->workinghours_c,$array_workinghours))))
				{
					array_push($array_workinghours, (trim(ucfirst($res->workinghours_c))));
				}
			}
			$objPathologisttypeoftestmaster = ORM::factory('pathologisttypeoftestmaster')
												->findAll()
												->as_array();
			$result = $objPathologisttypeoftestmaster;
			foreach($result as $res)
			{
				if((!empty($res->master_c)) && ($res->master_c != '') && (!(in_array($res->master_c,$array_testsoffered))))
				{
					array_push($array_testsoffered, $res->master_c);
				}
			}
			$content = View::factory('vuser/vpathologist/vuserfavouritepathologists');
			
			
			
			$array_city=array_unique($array_city);
			
			$content->bind('userid', $userid);
			$content->bind('array_city', $array_city);
			$content->bind('array_accreditation', $array_accreditation);
			$content->bind('array_workinghours', $array_workinghours);
			$content->bind('array_testsoffered', $array_testsoffered);
			$content->bind('whereclause', $whereclause);
			$objRolesUser = ORM::factory('roleuser')
							->where('user_id','=',$userid)
							->mustFindAll()
							->as_array();
			foreach($objRolesUser as $role)
			{
				$objRole = ORM::factory('role')
							->where('id','=',$role->role_id)
							->mustFind();
				switch($objRole->name)
				{
					case 'Login' :break;
					case 'doctor': 	$urole= 'doctor';
									$obj = ORM::factory($urole)
											->where('refdoctorsid_c','=',$userid)
											->mustFind();
									$tablename ="favouritepathologistsbydoctordetails";
									
									
									$user = Auth::instance()->get_user();
									$doctor = ORM::factory('doctor')->where('refdoctorsid_c','=',$user->id)->find();
									$pathologists = ORM::factory('favouritepathologistsbydoctordetails')->where('roleid','=',$doctor->id)->order_by('priority','ASC')->find_all();
									$permission = 0;
									$content->bind('pathologists',$pathologists);
									$content->bind('permission',$permission);
									
									
									break;
					case 'staff': 	$urole= 'staff';
									$obj = ORM::factory($urole)
											->where('refstaffuserid_c','=',$userid)
											->mustFind();
									$tablename ="favoritepathologistbystaffdetails";
									
									$pathologists = ORM::factory('favoritepathologistbystaffdetails')->where('roleid','=',$obj->id)->order_by('priority','ASC')->find_all();

									$content->bind('pathologists',$pathologists);
									$permission = 0;
									$content->bind('permission',$permission);
									
									
									break;
					case 'patient': $urole= 'patient';
									$obj = ORM::factory($urole)
											->where('repatientsuserid_c','=',$userid)
											->mustFind();
									$tablename = "favouritepathologistsbypatientdetails";
									
									$user = Auth::instance()->get_user();
									$patient = ORM::factory('patient')->where('repatientsuserid_c','=',$user->id)->find();
									$pathologists = ORM::factory('favouritepathologistsbypatientdetail')->where('roleid','=',$patient->id)->order_by('priority','ASC')->find_all();
									$permission = $patient->allowedtoplacepathorder_c;
									$content->bind('pathologists',$pathologists);
									$content->bind('permission',$permission);
									
									break;
					case 'chemist': $urole= 'chemist';
									break;
					default: throw new Exception ("Role not found");
									break;
				}
			}
			$objid= $obj->id;
			
			$content->bind('resultgrid', $resultgrid);	
			$content->bind('userRoleId', $objid);	
			$content->bind('tablename', $tablename);
			$content->bind('urole', $urole);
			$breadcrumb = "Home>>";
			$this->template->breadcrumb = $breadcrumb;
			$this->template->content = $content;
			if($urole =="doctor")
			{
				$this->template->user = "Dr. ".trim($objUser->Firstname_c);
			}
			else
			{
				$this->template->user = $objUser->Firstname_c;
			}
			$this->template->urole = $urole;
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}	
	}
	
	public function action_searchbuttononclick()
	{
		$name=$_POST['centername'];
		$city=$_POST['city'];
		$location=$_POST['location'];
		$accreditation=$_POST['accreditation'];
		$testsoffered=$_POST['testsoffered'];
		$whereclause ="";
		if($name != "")
			$whereclause = "[pathologistname,like,".$name."%]";
		if($city != "")
			$whereclause = $whereclause."[city_c,like,%".$city."%]";
		if($location != "Locality")
			$whereclause = $whereclause."[location_c,like,%".$location."%]";
		if($accreditation != '')
			$whereclause = $whereclause."[accreditation_c,like,%".$accreditation."%]";
		if($testsoffered != '')
			$whereclause = $whereclause."[testsoffered_c,like,%".$testsoffered."%]";
		$this->displayfavoritepathologists($whereclause);
	}
	
	public function action_selectlocation()
	{
		try
		{
			$city = $_GET['city'];
			$objSearchedPathologist = ORM::factory('searchedpathologist')
							->where('city_c','=',$city)
							->Find_All();
			$result = $objSearchedPathologist;
			$array_location=array();
			foreach($result as $res)
			{
				if(! empty($res->location_c))
				array_push($array_location,trim(ucfirst($res->location_c)));//Returns a string with the first character of str capitalized
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
		
} 

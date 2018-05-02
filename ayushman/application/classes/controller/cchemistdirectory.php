<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/xmpp.php');
class Controller_Cchemistdirectory extends Controller_Ctemplatewithmenu  {

	public function action_view()
	{		
		$whereclause = "";
		$this->displayfavoritechemists($whereclause);
	}
	
	
	
	private function displayfavoritechemists($whereclause)
	{	
		try
		{
			$objUser = Auth::instance()->get_user();
			$objChemistDetails = ORM::factory('chemistdetail')
								->distinct(TRUE)
								->find_all()
								->as_array();
			$result = $objChemistDetails;
			$array_city=array();
			foreach($result as $res)
			{ 
				if(!(empty($res->city)))
				{
					array_push($array_city, $res->city);
				}
			}
			$array_city=array_unique($array_city);
			$content = View::factory('vuser/vchemist/vuserfavouritechemist');
			$userid = $objUser->id;
			$content->bind('userid', $userid);
			$content->bind('array_city', $array_city);
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
									$tablename ="favoritechemistbydoctordetail";
									
									$chemists = ORM::factory('favoritechemistbydoctordetail')->where('roleid','=',$obj->id)->order_by('priority','ASC')->find_all();
									$permission = 0;
									$content->bind('chemists',$chemists);
									$content->bind('permission',$permission);
									
									
									break;
					case 'staff': 	$urole= 'staff';
									$obj = ORM::factory($urole)
											->where('refstaffuserid_c','=',$userid)
											->mustFind();
									$tablename ="favoritechemistbystaffdetail";
									
									
									$chemists = ORM::factory('favoritechemistbystaffdetail')->where('roleid','=',$obj->id)->order_by('priority','ASC')->find_all();
									$permission = 0;
									$content->bind('chemists',$chemists);
									$content->bind('permission',$permission);
									
									
									break;
					case 'patient': $urole= 'patient';
									$obj = ORM::factory($urole)
											->where('repatientsuserid_c','=',$userid)
											->mustFind();
									$tablename = "favoritechemistbypatientdetail";
									
									$chemists = ORM::factory('favoritechemistbypatientdetail')->where('roleid','=',$obj->id)->order_by('priority','ASC')->find_all();
									$permission = $obj->allowedtoplacemedicineorder_c;
									$content->bind('chemists',$chemists);
									$content->bind('permission',$permission);
									break;
					case 'chemist': $urole= 'chemist';
									break;
					default: throw new Exception ("Role not found");
									break;
				}
			}
			
			
				$userid = $objUser->id;
				$urole = "patient";
				$searchResult = $this->request->post('search');
				$columns = 'chemistuserid,chemistid,medicalname,city,location,workinghours,homedeliveryfacility,WeeklyOffday,[Add {'.urlencode("/ayushman/cchemistdirectory/addtofavorite?userid=".$userid."&chemistid=<chemistid>&chemistuserid=<chemistuserid>&role=".$urole).'}]';
                $string = "Not Yet set";
                
                $object_patient_orderfrompresc = new Model_Xjqgridgetdata;
                $resultgrid = $object_patient_orderfrompresc->getfootablejsondata('', '', 'chemistuserid', 'DESC', 'chemistdetail', $columns, $whereclause, '');
                //END: 
			
			
			
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
	
	public function action_addtofavorite()
	{
		try
		{
			$chemistId	=	$_GET["chemistid"];
			
			
			if(isset($_GET['userid'])){
				$userId		=	$_GET["userid"];
			}else{
				$userId = Auth::instance()->get_user()->id;
			}
			
			$chemistUserId	=	$_GET["chemistuserid"];
			
			$chemist = ORM::factory('user')->where('id','=',$chemistUserId)->find(); 
			
			$role=$_GET["role"];
			$arr_xmpp =Kohana::$config->load('xmpp');
			$objUser = ORM::factory('user')->where('id','=',$userId)->find();		
			
			try{
				//register a chemist if he is not registered on xmpp server
				$op = xmpp::register($chemist->id,$chemist->xmpppassword_c,$chemist->email);
				$op = xmpp::register($objUser->id,$objUser->xmpppassword_c,$objUser->email);
				
				//var_dump($op);die;
				$var = xmpp::addRosterContact($chemistUserId.'@'.$arr_xmpp['servername'],$chemistUserId.'@'.$arr_xmpp['servername'],$userId.'@'.$arr_xmpp['servername'],$objUser->xmpppassword_c);
			}catch(Exception $e){
			
			}
			
			//if($var != 'success')//error while adding in xmpp contact list 
			//{
			//	var_dump($var);die;
			//	throw new Exception($var["ERROR"]);
			//}
			//else //successfully added in xmpp contat now add it in "favoritepathologistbypatient" table 
			{
				switch($role)
				{
					case 'doctor': $objDoctor = ORM::factory('doctor')
												->where('refdoctorsid_c','=',$userId)
												->mustFind();
									$doctorId=$objDoctor->id;
									$objFavoriteChemistByDoctors = ORM::factory('favoritechemistbydoctor')
																	->where('reffavchembydocdoctorsid_c','=',$doctorId)
																	->where('reffavchembydocchemistsid_c','=',$chemistId)
																	->find()
																	->as_array();
									if($objFavoriteChemistByDoctors["id"] == null)//if "chemist and doctor" pair is not present then add. 
									{
											$objMaxPreference = ORM::factory('favoritechemistbydoctor')
																->select('prefered_c')
																->where('reffavchembydocdoctorsid_c','=',$doctorId)
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
										
										$objFavoriteChemistByDoctors = ORM::factory('favoritechemistbydoctor');
										$objFavoriteChemistByDoctors->reffavchembydocdoctorsid_c=$doctorId;
										$objFavoriteChemistByDoctors->reffavchembydocchemistsid_c=$chemistId;
										$objFavoriteChemistByDoctors->prefered_c=$maxpreference;
										
										$objFavoriteChemistByDoctors->save();
									}
									break;
					case 'patient': $objPatient = ORM::factory('patient')
													->where('repatientsuserid_c','=',$userId)
													->mustFind();
									$patientId=$objPatient->id;
									$objFavoriteChemistByPatients = ORM::factory('favoritechemistbypatient')
																		->where('reffavchembypatpatientid_c','=',$patientId)
																		->where('reffavchembypatchemistsid_c','=',$chemistId)
																		->find()
																		->as_array();	
									if($objFavoriteChemistByPatients["id"] == null)//if "chemist and patient" pair is not present then add. 
									{
										$objFavoriteChemistByPatients = ORM::factory('favoritechemistbypatient');
										$objFavoriteChemistByPatients->reffavchembypatpatientid_c=$patientId;
										$objFavoriteChemistByPatients->reffavchembypatchemistsid_c=$chemistId;
										$objFavoriteChemistByPatients->save();
									}
									break;
					case 'staff': $objStaff = ORM::factory('staff')
												->where('refstaffuserid_c','=',$userId)
												->mustFind();
									$staffId=$objStaff->id;
									$objFavoriteChemistByStaffs = ORM::factory('favoritechemistbystaff')
																	->where('reffavstaffid_c','=',$staffId)
																	->where('reffavchemistid_c','=',$chemistId)
																	->find()
																	->as_array();	;
									if($objFavoriteChemistByStaffs["id"] == null)//if "chemist and staff" pair is not present then add. 
									{
										$objFavoriteChemistByStaffs = ORM::factory('favoritechemistbystaff');
										$objFavoriteChemistByStaffs->reffavstaffid_c=$staffId;
										$objFavoriteChemistByStaffs->reffavchemistid_c=$chemistId;
										$objFavoriteChemistByStaffs->save();
									}
									break;
					default: throw new Exception ("Role not found");
									break;
				}
				Request::current()->redirect('cchemistdirectory/view');
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
			$chemistId=$_GET["chemistid"];
			
			if(isset($_GET['userid'])){
				$userId = ORM::factory('user')->where('id','=',$_GET['userid'])->find()->id;
			}else{
				$userId = Auth::instance()->get_user()->id;
			}
			
			$chemistUserId=ORM::factory('chemist')->where('id','=',$chemistId)->find()->refchemistsuserid_c;
			
			$urole = '';
			
			$obj_user = ORM::factory('user')->where('id','=',$userId)->find();
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
			try{
				$var='success';
				$arr_xmpp =Kohana::$config->load('xmpp');
				$var = xmpp::deleteRosterContact($chemistUserId.'@'.$arr_xmpp['servername'],$userId.'@'.$arr_xmpp['servername'],$obj_user->xmpppassword_c);
			}catch(Exception $e){
			
			}
			
			if($var != 'success')//error while removing from xmpp contact list 
			{
				//throw new Exception($var["ERROR"]);
			}
			else //successfully removed from xmpp contat now remove it from "favoritechemist" table 
			{
				switch($role)
				{
					case 'doctor': $objDoctor = ORM::factory('doctor')
													->where('refdoctorsid_c','=',$userId)
													->mustFind();
									$doctorId=$objDoctor->id;
									$objFavoritechemist = ORM::factory('favoritechemistbydoctor')
															->where('reffavchembydocdoctorsid_c','=',$doctorId)
															->where('reffavchembydocchemistsid_c','=',$chemistId)
															->find_all();
									break;
					case 'patient': $objPatient = ORM::factory('patient')
												->where('repatientsuserid_c','=',$userId)
												->mustFind();
									$patientId=$objPatient->id;
									$objFavoritechemist = ORM::factory('favoritechemistbypatient')
															->where('reffavchembypatpatientid_c','=',$patientId)
															->where('reffavchembypatchemistsid_c','=',$chemistId)
															->find_all();
									break;
					case 'staff': $objStaff = ORM::factory('staff')
												->where('refstaffuserid_c','=',$userId)
												->mustFind();
									$staffId=$objStaff->id;
									$objFavoritechemist = ORM::factory('favoritechemistbystaff')
															->where('reffavstaffid_c','=',$staffId)
															->where('reffavchemistid_c','=',$chemistId)
															->find_all();
									break;
					default: throw new Exception ("Role not found");
									break;
				}
				foreach ($objFavoritechemist as $orm)
				{
					$orm->delete();
				}
				Request::current()->redirect('cchemistdirectory/view');
			}
			
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}	
	}
	
	public function action_searchbuttononclick()
	{
		$name=$_POST['StoreName'];
		$city=$_POST['city'];
		$location=$_POST['location'];
		$homedeliveryfacility=$_POST['homedeliveryfacility'];
		$whereclause ="";
		if($name != "")
			$whereclause = $whereclause."[medicalname,like,".$name."%]";
		if($city != "")
			$whereclause = $whereclause."[city,like,%".$city."%]";
		if($location != "Locality")
			$whereclause = $whereclause."[location,like,%".$location."%]";
		if($homedeliveryfacility != "")
			$whereclause = $whereclause."[homedeliveryfacility,like,%".$homedeliveryfacility."%]";
		$this->displayfavoritechemists($whereclause);
	}
	
	public function action_selectlocation()
	{
		try
		{
			$city = $_GET['city'];
			$objChemistDetail = ORM::factory('chemistdetail')
							->where('city','=',$city)
							->find_all();
			$result = $objChemistDetail;
			$array_location=array();
			foreach($result as $res)
			{
				if(! empty($res->location))
				array_push($array_location,trim(ucfirst($res->location)));
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
<?php defined('SYSPATH') or die('No direct script access.');
require_once('simple_html_dom.php');
class Controller_Cuploadpastvisit extends Controller_Ctemplatewithmenu  {
	public function action_uploadpastvisit()
	{	$session= Session::instance();
		$session->set('html', "");
		$obj_user = Auth::instance()->get_user();
		$content = View::factory('vuser/vpatient/vuploadpastvisit2');
		$urole = "patient";
		$breadcrumb = "Home>>";
		$userid = $obj_user->id;
		$objvisit = ORM::factory('appointment')->where('refappfromid_c','=', $userid)->order_by('scheduledstarttime_c','desc')->find_all();

		$visitarray=array();
		foreach($objvisit as $visit)
		{
			$drname=ORM::factory('user')
			->join('doctors')
			->on('user.id','=','doctors.refdoctorsid_c')->where('doctors.id','=',$visit->refappwithid_c)->find();
			$my_date = date('d-M-y', strtotime($visit->scheduledstarttime_c));
			
			$visitarray[$visit->id]= array("On ".$my_date." with Dr.".$drname->Firstname_c ." ".$drname->lastname_c,"Dr.".$drname->Firstname_c ." ".$drname->lastname_c, $visit->refincidentid_c,$visit->id);
		}
		
		$objincident = ORM::factory('incident')
			->join('appointments')
			->on('appointments.refincidentid_c','=','incident.id')
			->where('refappfromid_c','=',$userid)
			->find_all();
		$result = $objincident;
		$previnciarray=array();
		$previnciarray[0]=array("New Incidence",0);
		foreach($result as $res)
		{
			$incidentdt="";
			if(! empty( $res->incidentdate_c))
			$incidentdt= date('Y-m-d',strtotime( $res->incidentdate_c));
			$res->incidentsname_c." ".$incidentdt;
			$previnciarray[$res->id]= array($res->incidentsname_c." ".$incidentdt, $res->id);
		}	
		$objusers = ORM::factory('user')
			->join('doctors')
			->on('user.id','=','doctors.refdoctorsid_c')
			->find_all();
		$result =$objusers;
		$arr_doctorname=array();
		foreach($result as $res)
		{
			$drname="Dr. ".$res->Firstname_c." ".$res->lastname_c;
			array_push($arr_doctorname, $drname);
		}	
		$objconsultationmode = ORM::factory('billingconsultationmode')
			->find_all();
		$result=$objconsultationmode;
		$array_mode=array();
		foreach($result as $res)
		{
			if(! empty($res->name_c))
			array_push($array_mode, $res->name_c);
		}
		$username = $obj_user->Firstname_c;
		$content->bind('userid', $userid);
		$content->bind('username', $username);
		$content->bind('previnciarray',$previnciarray);
		$content->bind('visitarray',$visitarray);
		$content->bind('arr_doctorname',$arr_doctorname);
		$content->bind('array_mode',$array_mode);
		$this->template->breadcrumb = $breadcrumb;
		$this->template->content = $content;
		$this->template->user = $obj_user->Firstname_c;
		$this->template->urole = $urole;
	}
	public function action_orderreports(){
		$session= Session::instance();
		$session->set('html', "");
		
		$content = View::factory('vuser/vpatient/vorderupload');
		$orderid = $_GET["id"];
		
		// Delete Previously attached and not saved Reports
			$testreportObj=ORM::factory("patienttestreport")
						->where("refpatreportdiagnosticlaborderid_c","=",$orderid)
						->find_all();
			foreach($testreportObj as $testreport)
			{
				$testreport->active_c=0;
				$testreport->save();
			}
		
		$orderedtests = ORM::factory('orderedtest')->where('diagnosticlabsorderid_c','=',$orderid)->find_all();
		foreach($orderedtests as $ordredtest){
			$session->set($ordredtest->testid_c.'html', "");
			$session->set($ordredtest->testid_c.'fileid', "");
		}
		
		$userid = ORM::factory('orderedtest')->where('diagnosticlabsorderid_c','=',$orderid)->find()->customeruserid_c;
		$user = ORM::factory('user')->where('id','=',$userid)->find();
		$mobilenumber = $user->isdmobileno1_c.'-'.$user->mobileno1_c;
		$name = $user->Firstname_c.' '.$user->lastname_c;
		$IOHid = $user->id;
		$gender = $user->gender_c;
		$dob = $user->DOB_c;
		// Find the Doctors name in reference by name if prescribed by doctor
		$docuserid = ORM::factory('orderedtest')->where('diagnosticlabsorderid_c','=',$orderid)->find()->refdoctoruserid_c;
		
		if($docuserid){
			$docuser = ORM::factory('user')->where('id','=',$docuserid)->find();
			$referenceby = 'Dr. '.$docuser->Firstname_c.' '.$docuser->lastname_c;
			}
		else{$referenceby = 'Self' ;}
		//$referenceby = $order->referenceBy_c;
		$order = ORM::factory('diagnosticlabsorder')->where('id','=',$orderid)->find();
		$orderdeliverydate = date('d M Y', strtotime($order->deliverydate_c));
		$orderdate = date('d M Y', strtotime($order->orderdate_c));
		$referenceid = $order->referenceId_c;
		
		$samplecollectionplace = $order->sampleCollectionPlace_c;
		$samplecollectiondate = $order->sampleCollectionDate_c;
		$sampleid = $order->sampleId;
		
		
		$content->bind('orderid', $orderid);
		$content->bind('mobilenumber', $mobilenumber);
		$content->bind('name', $name);
		$content->bind('IOHid', $IOHid);
		$content->bind('gender', $gender);
		$content->bind('dob', $dob);
		$content->bind('orderdeliverydate', $orderdeliverydate);
		$content->bind('orderdate', $orderdate);
		$content->bind('referenceid', $referenceid);
		$content->bind('referenceby', $referenceby);
		$content->bind('samplecollectionplace', $samplecollectionplace);
		$content->bind('samplecollectiondate', $samplecollectiondate);
		$content->bind('sampleid', $sampleid);
		
		$this->template->content = $content;
	}
// Action defined for the radiologist to upload Reports....
	public function action_radiologistorderreports(){
		$session= Session::instance();
		$session->set('html', "");
		
		$content = View::factory('vuser/vpatient/vradiologistorderupload');
		$orderid = $_GET["id"];
		
		$orderedtests = ORM::factory('orderedtest')->where('diagnosticlabsorderid_c','=',$orderid)->find_all();
		foreach($orderedtests as $ordredtest){
			$session->set($ordredtest->testid_c.'html', "");
			$session->set($ordredtest->testid_c.'fileid', "");
		}
		
		$userid = ORM::factory('orderedtest')->where('diagnosticlabsorderid_c','=',$orderid)->find()->customeruserid_c;
		$user = ORM::factory('user')->where('id','=',$userid)->find();
		$mobilenumber = $user->isdmobileno1_c.'-'.$user->mobileno1_c;
		$name = $user->Firstname_c.' '.$user->lastname_c;
		$IOHid = $user->id;
		$gender = $user->gender_c;
		$dob = $user->DOB_c;
		// Find the Doctors name in reference by name if prescribed by doctor
		$docuserid = ORM::factory('orderedtest')->where('diagnosticlabsorderid_c','=',$orderid)->find()->refdoctoruserid_c;
		
		if($docuserid){
			$docuser = ORM::factory('user')->where('id','=',$docuserid)->find();
			$referenceby = 'Dr. '.$docuser->Firstname_c.' '.$docuser->lastname_c;
			}
		else{$referenceby = 'Self' ;}
		//$referenceby = $order->referenceBy_c;
		$order = ORM::factory('diagnosticlabsorder')->where('id','=',$orderid)->find();
		$orderdeliverydate = date('d M Y', strtotime($order->deliverydate_c));
		$orderdate = date('d M Y', strtotime($order->orderdate_c));
		$referenceid = $order->referenceId_c;
		
		$samplecollectionplace = $order->sampleCollectionPlace_c;
		$samplecollectiondate = $order->sampleCollectionDate_c;
		$sampleid = $order->sampleId;
		
		
		$content->bind('orderid', $orderid);
		$content->bind('mobilenumber', $mobilenumber);
		$content->bind('name', $name);
		$content->bind('IOHid', $IOHid);
		$content->bind('gender', $gender);
		$content->bind('dob', $dob);
		$content->bind('orderdeliverydate', $orderdeliverydate);
		$content->bind('orderdate', $orderdate);
		$content->bind('referenceid', $referenceid);
		$content->bind('referenceby', $referenceby);
		$content->bind('samplecollectionplace', $samplecollectionplace);
		$content->bind('samplecollectiondate', $samplecollectiondate);
		$content->bind('sampleid', $sampleid);
		
		$this->template->content = $content;
	}
//-----------------------------------------------------------------------------//

	public function action_getvisit()
	{
		$obj_user = Auth::instance()->get_user();
		$userid=$obj_user->id;
		$objvisit = ORM::factory('appointment')->where('refappfromid_c','=', $userid)->order_by('scheduledstarttime_c','desc')->find_all();

		$visitarray=array();
		foreach($objvisit as $visit)
		{
			$drname=ORM::factory('user')
			->join('doctors')
			->on('user.id','=','doctors.refdoctorsid_c')->where('doctors.id','=',$visit->refappwithid_c)->find();
			$my_date = date('d-M-y', strtotime($visit->scheduledstarttime_c));
			
			$visitarray[$visit->id]= array("On ".$my_date." with Dr.".$drname->Firstname_c ." ".$drname->lastname_c,"Dr.".$drname->Firstname_c ." ".$drname->lastname_c, $visit->refincidentid_c,$visit->id);
		}
		echo(json_encode($visitarray)); die;
		
	}
	public function action_getincidence()
	{
		$obj_user = Auth::instance()->get_user();
		$userid=$obj_user->id;
		$objincident = ORM::factory('incident')
			->join('appointments')
			->on('appointments.refincidentid_c','=','incident.id')
			->where('refappfromid_c','=',$userid)
			->find_all();
		$result = $objincident;
		$previnciarray=array();
		$temp=array();
		$temp["id"]=0;
		$temp["name"]="New incidence";
		array_push($previnciarray,$temp);
		foreach($result as $res)
		{
			$incidentdt="";
			if(! empty( $res->incidentdate_c))
			$incidentdt= date('Y-m-d',strtotime( $res->incidentdate_c));
			$temp["id"]=$res->id;
			$temp["name"]=$res->incidentsname_c." ".$incidentdt;
			array_push($previnciarray,$temp);
		}
		echo(json_encode($previnciarray)); die;
	}
	public function action_uploadpastprescription()
	{	$session= Session::instance();
		$session->set('html', "");
		$obj_user = Auth::instance()->get_user();
		$content = View::factory('vuser/vpatient/vuploadpastprescription');
		$urole = "patient";
		$breadcrumb = "Home>>";
		$userid = $obj_user->id;
		$objvisit = ORM::factory('appointment')->where('refappfromid_c','=', $userid)->order_by('scheduledstarttime_c','desc')->find_all();

		$visitarray=array();
		foreach($objvisit as $visit)
		{
			$drname=ORM::factory('user')
			->join('doctors')
			->on('user.id','=','doctors.refdoctorsid_c')->where('doctors.id','=',$visit->refappwithid_c)->find();
			$my_date = date('d-M-y', strtotime($visit->scheduledstarttime_c));
			
			$visitarray[$visit->id]= array("On ".$my_date." with Dr.".$drname->Firstname_c ." ".$drname->lastname_c,"Dr.".$drname->Firstname_c ." ".$drname->lastname_c, $visit->refincidentid_c,$visit->id);
		}
		
		$objincident = ORM::factory('incident')
			->join('appointments')
			->on('appointments.refincidentid_c','=','incident.id')
			->where('refappfromid_c','=',$userid)
			->find_all();
		$result = $objincident;
		$previnciarray=array();
		$previnciarray[0]=array("New Incidence",0);
		foreach($result as $res)
		{
			$incidentdt="";
			if(! empty( $res->incidentdate_c))
			$incidentdt= date('Y-m-d',strtotime( $res->incidentdate_c));
			$res->incidentsname_c." ".$incidentdt;
			$previnciarray[$res->id]= array($res->incidentsname_c." ".$incidentdt, $res->id);
		}	
		$objusers = ORM::factory('user')
			->join('doctors')
			->on('user.id','=','doctors.refdoctorsid_c')
			->find_all();
		$result =$objusers;
		$arr_doctorname=array();
		foreach($result as $res)
		{
			$drname="Dr. ".$res->Firstname_c." ".$res->lastname_c;
			array_push($arr_doctorname, $drname);
		}	
		$objconsultationmode = ORM::factory('billingconsultationmode')
			->find_all();
		$result=$objconsultationmode;
		$array_mode=array();
		foreach($result as $res)
		{
			if(! empty($res->name_c))
			array_push($array_mode, $res->name_c);
		}
		$username = $obj_user->Firstname_c;
		$content->bind('userid', $userid);
		$content->bind('username', $username);
		$content->bind('previnciarray',$previnciarray);
		$content->bind('visitarray',$visitarray);
		$content->bind('arr_doctorname',$arr_doctorname);
		$content->bind('array_mode',$array_mode);
		$this->template->breadcrumb = $breadcrumb;
		$this->template->content = $content;
		$this->template->user = $obj_user->Firstname_c;
		$this->template->urole = $urole;
	}
	public function action_autocomplete()
	{	
		$strQuery=$_GET['term'];
		$column=$_GET['column'];
		$table=$_GET['table'];
		$strQuery=$strQuery."%";
		$arrayreturn=array();
		if($table =="address")
		{
			$city=$_GET['city'];
			$query = "select ".$column." from ".$table." where city_c = '".$city."' and location_c like '".$strQuery."';";
		}
		else{
			$query = "select ".$column." from ".$table." where ".$column." like'".$strQuery."';";
		}
	
		$result = Db::query(Database::SELECT, $query)
			 ->execute()
			  ->as_array();
		var_dump($result);
		foreach($result as $data)
		{
			if(! empty($data[$column]))
			{
				if (!in_array($data[$column],$arrayreturn))
				array_push($arrayreturn,trim(($data[$column])));
			}
		}
		
		die(json_encode($arrayreturn));
	}
	public function action_appointmnetdetalis()
	{
		$appid=$_GET['appid'];
		$obj_dr = ORM::factory('archivevisit')
				->where('appointmentid','=',$appid)
				->find()
				->as_array();
		die(json_encode($obj_dr));		
	}
	public function action_savevisit()
	{	
		$objappointment;
		if(isset($_GET['appid']))
		{
			$appid=$_GET['appid'];
			$objappointment = ORM::factory('appointment')
				->where('id','=',$appid)
				->find();
		}
		else
		{
			$objappointment = new Model_appointment;
		}
		$obj_user = Auth::instance()->get_user();
		$userid = $obj_user->id;
		$incidentid;
		$drid;
		$incidentdate =$_GET['incidentdate'];
		$incidentdate = date('Y-m-d',strtotime($incidentdate));
		$Incidenttxt;
		if(isset($_GET['incidenttxt'])&& $_GET['incidenttxt'] !="")
		{
			$Incidenttxt=$_GET["incidenttxt"];
		}
		else 
		{
			$Incidenttxt="";
		}
		if(isset($_GET['drid']) && $_GET['drid'] !="")//dr from system
		{
			$drid=$_GET['drid'];
		}
		else//dr not from system
		{
		
			$obj_dr = ORM::factory('doctor')
				->join('users')
				->on('users.id','=','doctor.refdoctorsid_c')
				->where('username','=',"notfromsystem@gmail.com")
				->where('activationstatus_c','=',"inactivedoctor")
				->find();
			$drid=$obj_dr->id;
		}
		$objconsultationmode = ORM::factory('billingconsultationmode')
			->where('name_c','=',$_GET['mode'])
			->find();
		if(isset($_GET['incidentcombo']) && $_GET['incidentcombo'] !="")//incident from system
		{
			$incidentid=$_GET['incidentcombo'];
		}
		else//incident not from system
		{
			$objincident = new Model_incident;
			$objincident->incidentsname_c=$Incidenttxt;
			$objincident->incidentdate_c=$incidentdate;
			$objincident->save();
			$incidentid=$objincident->id;
		}
		$obj_appointmentstatuse = ORM::factory('appointmentstatuse')
			->where('appointmentstatuses_c','=','completed')
			->find();
		$objappointment->refappfromid_c=$userid;
		$objappointment->refappwithid_c=$drid;
		$objappointment->scheduledstarttime_c=$incidentdate;
		$objappointment->displaytime_c=$incidentdate;
		$objappointment->refappointmentstatusesid_c=$obj_appointmentstatuse->id;
		$objappointment->refincidentid_c=$incidentid;
		$objappointment->refmode_c=$objconsultationmode->id;
		$objappointment->status_c = 'notfromsystem';
		$objappointment->consultationmode_c = 'notfromsystem';
		if(isset($_GET['chknewincident']))
		{
			if($_GET['chknewincident']=="checkbox")
			$objappointment->type_c="first time";
		}
		else
		{
			$objappointment->type_c="follow up";
		}
		$objappointment->save();
		$intAppId=$objappointment->id;
		$drid=$_GET['drid'];
		if(($drid == "") or ($drid == "-1"))//dr not from system
		{   echo "here";
			if(isset($_GET['appid']))
			{	
				$obj_outsidedoctor = ORM::factory('outsidedoctor')
					->where('refappointment_c','=',$intAppId)
					->find();
				if(isset($obj_outsidedoctor->id))
				{	
					$drname=$_GET['drname'];
					$result = substr($drname, 0, 4);
					if($result== "Dr. ")
					{$drname = substr($drname, 4);}
					$obj_outsidedoctor->name_c=$drname;
					$obj_outsidedoctor->city_c=$_GET['drcity'];
					$obj_outsidedoctor->location_c=$_GET['drlocality'];
					$obj_outsidedoctor->RMPnumber_c=$_GET['drrsgnumber'];
					$obj_outsidedoctor->save();
				}
				else
				{	
					$drname=$_GET['drname'];
					$result = substr($drname, 0, 4);
					if($result== "Dr. ")
					{$drname = substr($drname, 4);}
					$obj_outsidedoctor=new Model_outsidedoctor;
					$obj_outsidedoctor->name_c=$drname;
					$obj_outsidedoctor->city_c=$_GET['drcity'];
					$obj_outsidedoctor->location_c=$_GET['drlocality'];
					$obj_outsidedoctor->RMPnumber_c=$_GET['drrsgnumber'];
					$obj_outsidedoctor->refappointment_c=$intAppId;
					$obj_outsidedoctor->save();
				}
			}
			else
			{
				$obj_outsidedoctor=new Model_outsidedoctor;
				$obj_outsidedoctor->name_c=$_GET['drname'];
				$obj_outsidedoctor->city_c=$_GET['drcity'];
				$obj_outsidedoctor->location_c=$_GET['drlocality'];
				$obj_outsidedoctor->RMPnumber_c=$_GET['drrsgnumber'];
				$obj_outsidedoctor->refappointment_c=$intAppId;
				$obj_outsidedoctor->save();
			}
		}
		die();
	}
	public function action_saveprescription()
	{ 
		$obj_user = Auth::instance()->get_user();
		$pages=$_POST["prescriptionpagesno"];
		$appid=$_GET["appid"];
		$objOrm = ORM::factory('patientprescriptionsnapshot');
			$objOrm->where('refappointmentidforprescriptionsnapshots_c','=',$appid);
			foreach ($objOrm->find_all() as $orm)
			{
				$orm->delete();
			}
		$createimg="";
		for($page=0;$page< $pages;$page++)
		{
			if($_FILES["file".$page]["name"])
			{
				for($i=0;$i<count($_FILES["file".$page]['name']);$i++)
				{	
					if($_FILES["file".$page]["name"] != "")
					{ 
						if ((($_FILES["file".$page]["type"] == "image/gif") || ($_FILES["file".$page]["type"] == "image/jpeg") || ($_FILES["file".$page]["type"] == "image/x-png") || ($_FILES["file".$page]["type"] == "image/png") || ($_FILES["file".$page]["type"] == "application/pdf") || ($_FILES["file".$page]["type"] == "image/pjpeg")) && ($_FILES["file".$page]["size"] < 10485760))
						{
							if ($_FILES["file".$page]["error"] > 0)
							{
								echo "Return Code: " . $_FILES["file".$page]["error"][$i] . "<br />";
							}

							else
						{
								  
							if(!is_dir(DOCROOT."pastvisit/"))
							{
								mkdir(DOCROOT."pastvisit/");
								if(!is_dir(DOCROOT."pastvisit/prescription"))
								mkdir(DOCROOT."pastvisit/prescription");
							}
							else
							{
								if(!is_dir(DOCROOT."pastvisit/prescription"))
								mkdir(DOCROOT."pastvisit/prescription");
							}
							$uploaddestination =  DOCROOT."pastvisit/prescription/";
							$a=  getdate();
							$timestamp = $a[0];
							if( move_uploaded_file($_FILES["file".$page]["tmp_name"], $uploaddestination.$timestamp."_".$_FILES["file".$page]["name"]))
								{
									$filenm =$_FILES["file".$page]["name"];
									$fileext = explode('.',$filenm);
									rename($uploaddestination.$timestamp."_".$_FILES["file".$page]["name"],$uploaddestination.$timestamp."_".$_FILES["file".$page]["name"]);
									$objpatientprescriptionsnapshot = new Model_patientprescriptionsnapshot;
									$objpatientprescriptionsnapshot->refappointmentidforprescriptionsnapshots_c=$appid;
									$objpatientprescriptionsnapshot->pastvisitprescriptionpath_c = "ayushman/pastvisit/prescription/".$timestamp."_".$_FILES["file".$page]["name"];
									$objpatientprescriptionsnapshot->save();
									$createimg=$createimg."<div style='border:1px solid;height:700px;width:100%'><img id='imgpatientphoto'src='http://localhost:".$_SERVER['SERVER_PORT']."/ayushman/pastvisit/prescription/".$timestamp."_".$_FILES["file".$page]["name"]."' style='height: 800px; width: 500px;align:center;'></img><h1 class='break'></h1><br/></div>";
								}
								else
								echo "ERROR";
							  }
						}
						else
						{
							echo "Invalid file should be less than 1 mb";
						}
					}
				}
			}
			if($createimg !="")
			{
							
				$html = new simple_html_dom();
				$html->load_file("application/views/vtemplates/vtemplateprescriptionpdf.php");
				
				//$objQueryExe = new Model_Mqueryexecution;
				//$data = $objQueryExe->executequery('call '.$storedproc.'('.$spparam.')');
		
				$ret = $html->find('div');
				foreach($ret as $element) {
					if($element->id=="image"){
						$element->innertext=$createimg;
						}
					}
				$array_files = Kohana::$config->load('application');
				
				$files = new helper_Files();
				$return = $files->savePdfFile($html);
				
				$response_savepdf =$return["filename"];
				
				$patientprescriptionsnapshot = ORM::factory('patientprescriptionsnapshot')
					->where('refappointmentidforprescriptionsnapshots_c','=',312)
					->find_all()
					->as_array();
				foreach($patientprescriptionsnapshot as $orm){
					$orm->pdfpath_c=$response_savepdf;
					$orm->save();
				}
			}	
		}
		
		Request::current()->redirect("/cuploadpastvisit/uploadpastvisit");
	}
	public function action_getreportdetails()
	{
		$id = $_GET["appid"];
		$objorders = ORM::factory('archivereport')->where('appid','=',$id);
		$objorders = $objorders->find();
		if(!file_exists($_SERVER['DOCUMENT_ROOT'].'/'.$objorders->path))
		{
			die();
		}
		$result = array();
		$result[$objorders->testname] = array();
		$temp = array();
		$temp['file'] = $objorders->path;
		$temp['thumb'] = '/ayushman/assets/thumbs/pdf_icon.svg';
		array_push($result[$objorders->testname], $temp);
		$response[$id] = $result;
		die(json_encode($response));
	}
	public function action_showreport()
	{
		$obj_user = Auth::instance()->get_user();$user = Auth::instance()->get_user();
		if (!$user)
			Request::current()->redirect('cuser/login');
		else
		{	
			if ($user->has('roles', ORM::factory('role', array('name' => 'doctor'))))
				$urole = "doctor";
			else if ($user->has('roles', ORM::factory('role', array('name' => 'patient'))))
				$urole = "patient";	
				$patientuserid = $obj_user->id;
		}
		
		$appid=$_GET['appid'];
		if(isset($_GET['back']))
		{
			$page=$_GET['back'];
			if(($page=="pastvisit" ) and ($urole =="patient") )
			{
				$backlink="/ayushman/cpatientpastvisits/display";
			}
			elseif(($page=="cpatientemrtodoc" ) and ($urole =="doctor") )
			{
				$patientuserid=$_GET['patientuserid'];
				$backlink="/ayushman/cpatientemrtodoc/viewpatientemr?patientuserid=".$patientuserid;
			}
		}
		else
		{
			$backlink="/ayushman/cuploadpastvisit/uploadpastvisit";
		}
		$objappointment=ORM::factory('appointment')
			->where('id','=',$appid)
			->find();
			$drname="";
		if($objappointment->refappwithid_c=="-1")
		{
			$objdoctor=ORM::factory('outsidedoctor')
			->where('refappointment_c','=',$appid)
			->find();
			$drname=$objdoctor->name_c;
		}
		else
		{
			$objdoctor = ORM::factory('user')//send notification to doctor
				->join('doctors')
				->on('user.id','=','doctors.refdoctorsid_c')
				->where('doctors.id','=',$objappointment->refappwithid_c)
				->find();
			$drname="Dr. ".trim($objdoctor->Firstname_c)." ".trim($objdoctor->lastname_c);
		}
		$content = View::factory('vuser/vpatient/varchivereportview');
		$breadcrumb = "Home>>";
		
		$objpatient = ORM::factory('patient')
			->where('repatientsuserid_c','=',$patientuserid)
			->find();
		$objarchivevisit = ORM::factory('archivevisit')
			->where('appointmentid','=',$appid)
			->find();
		$incidentname=$objarchivevisit->incidentsname_c;
		$link=$objarchivevisit->reportpath;
		$dateandtime =$objappointment->scheduledstarttime_c;
		$dateandtime = date('d M Y',strtotime($dateandtime));
		$username = $obj_user->Firstname_c;
		$patientid=$objpatient->id;
		$content->bind('userid', $patientuserid);
		$content->bind('username', $username);
		$content->bind('objpatient', $objpatient);
		$content->bind('drname', $drname);
		$content->bind('dateandtime', $dateandtime);
		$content->bind('appid', $appid);
		$content->bind('link', $link);
		$content->bind('backlink', $backlink);
		$content->bind('incidentname', $incidentname);
		$this->template->breadcrumb = $breadcrumb;
		$this->template->content = $content;
		$this->template->user = $obj_user->Firstname_c;
		$this->template->urole = $urole;
	}
	public function action_getreportinfo()
	{
		$id = $_GET["id"];
		$objorders = ORM::factory('archivereport')->where('patientarchivereportid','=',$id);
		$objorders = $objorders->find();
		echo "$objorders->path";
		if(!file_exists($objorders->path))
		{
			die("");
		}else
			$this->response->body($objorders->path);
		
		$this->response->body($objorders->path);
	}
	public function action_getprescriptioninfo()
	{
		$appid = $_GET["appid"];
		$objorders = ORM::factory('archivevisit')->where('appointmentid','=',$appid);
		$objorders = $objorders->find();
		$path="ayushman/".$objorders->prescriptionpath;

		if(!file_exists(str_replace("ayushman/","",$objorders->prescriptionpath)))
		{
			die("");
		}else
			die("ayushman/".$objorders->prescriptionpath);
	}
	public function action_removeprescriptioninfo()
	{
		$appid = $_GET["appid"];
		$completePrescriptions = ORM::factory('patientprescriptionsnapshot');
		$completePrescriptions->where('refappointmentidforprescriptionsnapshots_c','=',$appid)->find();
		
		$prescriptionPages = ORM::factory('patientprescriptionfilessnapshot')->where('refpatientprescriptionsnapshotsid','=',	$completePrescriptions->id)->find_all();
		
		foreach ($prescriptionPages as $orm)
		{
			$orm->delete();
		}
		$completePrescriptions = ORM::factory('patientprescriptionsnapshot');
		$completePrescriptions->where('refappointmentidforprescriptionsnapshots_c','=',$appid)->find();
		
		if($completePrescriptions->loaded())
			$completePrescriptions->delete();
		
		
		$objfile = ORM::factory('Appointmentupload')->where('refappuploadappointmentsid_c','=',$appid)->find();
	
		$files = new helper_Files();
		$return = $files->deleteFile($objfile->fileid_c);
							
		die("");
	}
	public function action_removereportinfo()
	{
		$appid = $_GET["appid"];
		$objpatientarchivereports = ORM::factory('patientarchivereport')->where('refappointmentidforreports_c','=',$appid);
		foreach ($objpatientarchivereports->find_all() as $orm)
		{
			$orm->delete();
		}
		$objpatientarchivereportsspanshots = ORM::factory('patientarchivereportsspanshot')->where('refarchiveappointmentid_c','=',$appid);
		foreach ($objpatientarchivereportsspanshots->find_all() as $orm)
		{
			$orm->delete();
		}
		die("");
	}
	public function action_removevisitinfo()
	{
		$appid = $_GET["appid"];
		$objappointment = ORM::factory('appointment')->where('id','=',$appid)->find();
		if($objappointment->refappwithid_c== "-1")
		{
			
			$objoutsidedoctor = ORM::factory('outsidedoctor')->where('refappointment_c','=',$appid)->find();
			if(isset($objoutsidedoctor->id))
			{
				$objoutsidedoctor->delete();
			}
		}
		
		$objpatientprescriptionsnapshot = ORM::factory('patientprescriptionsnapshot')->where('refappointmentidforprescriptionsnapshots_c','=',$appid)->find() ;
		if(isset($objpatientprescriptionsnapshot->id))
		{
			$objpatientprescriptionsnapshot->delete();
		}
		$objpatientarchivereports = ORM::factory('patientarchivereport')->where('refappointmentidforreports_c','=',$appid);
		foreach ($objpatientarchivereports->find_all() as $orm)
		{
			$orm->delete();
		}
		$objpatientarchivereportsspanshots = ORM::factory('patientarchivereportsspanshot')->where('refarchiveappointmentid_c','=',$appid);
		foreach ($objpatientarchivereportsspanshots->find_all() as $orm)
		{
			$orm->delete();
		}
		if(isset($objappointment->id))
		{
			$objappointment->delete();
		}
		die("");
	}
}
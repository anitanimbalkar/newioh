<?php defined('SYSPATH') or die('No direct script access.');
include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/xmpp.php');
include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/notificationsender.php');

class Controller_Cpatientfavoritedoctor extends Controller_Ctemplatewithmenu {

	public function action_fixappointment()
	{
		$obj_user 	= Auth::instance()->get_user();
		$content 	= View::factory('vuser/vpatient/vpatienttakeappointment');
		$userid 	= $obj_user->id;
		$appcalid	= $_GET["appcalid"];
		$userid		= $_GET["userid"];
		$doctorid	= $_GET["doctorid"];
		$objIndividualPlans = new Model_Billingindividualplan;
		$objIndividualPlans->where('refusersid_c','=', $userid)->where('status_c','=', 'active')->find();
		if($objIndividualPlans->id == null){
			$this->showmessage();
		}else{
			$objdoctor = new Model_Doctor;
			$objdoctor->where('id','=', $doctorid)->find();
			$objdoccalendar = new Model_Doctorcalendar;				
			$objdoccalendar -> where('refdoctorcalendardoctorid_c','=',$objdoctor->id)->find();
			$doccalendarid = $objdoccalendar->id;
			$objdocuser = new Model_User;
			$objdocuser->where('id','=',$objdoctor->refdoctorsid_c )->find();
			$rescheduledappid=$_GET["rescheduledappointmentid"];
			$this->adddoctortofavoritetotable($doctorid,$userid);
			$objincident = ORM::factory('incident')
				->join('appointments')
				->on('appointments.refincidentid_c','=','incident.id')
				->where('refappfromid_c','=',$userid)
				->find_all();
			$result = $objincident;
			$previnciarray=array();
			foreach($result as $res)
			{
				$incidentdt="";
				if(! empty( $res->incidentdate_c))
					$incidentdt= date('Y-m-d',strtotime( $res->incidentdate_c));
					$res->incidentsname_c." ".$incidentdt;
				$previnciarray[$res->id]= $res->incidentsname_c." ".$incidentdt;
			}
			$docnm = "with Dr. ". $objdocuser->Firstname_c." ".$objdocuser->lastname_c;
			$content->bind('userid', $userid);
			$content->bind('appcalid', $appcalid);
			$content->bind('doctorid', $doctorid);
			$content->bind('doctornm',$docnm );
			$content->bind('previnciarray',$previnciarray);
			$content->bind('rescheduledappid',$rescheduledappid);
			$content->bind('doccalid', $doccalendarid);	 
			$urole = "patient";
			//$content->bind('user',$user);
			$breadcrumb = "Home>>DashBoard>>Favorite Doctor";
			$this->template->breadcrumb = $breadcrumb;
			$this->template->content = $content;
			$this->template->user = $obj_user->Firstname_c;
			$this->template->urole = $urole;
		}
	}
	
	private function showmessage()
	{
		$content = View::factory('vuser/vpatient/vappointmentmessage');
		$obj_user = Auth::instance()->get_user();
		$greet = 'Hello, '.ucfirst($obj_user->Firstname_c).' '.ucfirst($obj_user->lastname_c);
		$content->bind('greet', $greet);
		$this->template->content = $content;
	}
	
	public function action_adddoctortofavorite()
	{
		$doctorid=$_GET["doctorid"];
		$userid=$_GET["userid"];
		$doctoruserid=$_GET["doctoruserid"];
		$this->adddoctortofavoritetotable($doctorid,$userid);
		$arr_xmpp = include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/config/xmpp.php');
		$obj_user = Auth::instance()->get_user();	
		$var = xmpp::addRosterContact($doctoruserid.'@'.$arr_xmpp['servername'],'',$userid.'@'.$arr_xmpp['servername'],$obj_user->xmpppassword_c);
		Request::current()->redirect('cdoctordirectory/view');
	}
	public function action_remove()
	{
		$did=$_GET["did"];
		$userid=$_GET["userid"];
		$doctoruserid=$_GET["doctoruserid"];
		
		$obj_patients = ORM::factory('patient')
			->where('repatientsuserid_c','=',$userid)
			->find();
 		$patientid=$obj_patients->id;
		$obj_favoritepathologistbypatients = ORM::factory('favoritedocterbypatient')//would produce the SQL:select * from favoritedocterbypatients where reffavdocbypatpatientsid_c=userid and reffavdocbypatdoctorsid_c=doctorid
 										->where('reffavdocbypatdoctorsid_c','=',$did)
 										->where('reffavdocbypatpatientsid_c','=',$patientid);
		foreach ($obj_favoritepathologistbypatients->find_all() as $orm)
		{
			$orm->delete();
		}
		$obj_user = Auth::instance()->get_user();		
		$arr_xmpp = include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/config/xmpp.php');
		$var = xmpp::deleteRosterContact($doctoruserid.'@'.$arr_xmpp['servername'],$userid.'@'.$arr_xmpp['servername'],$obj_user->password);
		Request::current()->redirect('cdoctordirectory/view');
	}
 	public function adddoctortofavoritetotable($doctorid,$userid)
	{
		$obj_patients = ORM::factory('patient')
 				->where('repatientsuserid_c','=',$userid)
 				->find();
 		$patientid=$obj_patients->id;
		$obj_favoritedocterbypatients = ORM::factory('favoritedocterbypatient')//would produce the SQL:select * from favoritedocterbypatients where reffavdocbypatpatientsid_c=userid and reffavdocbypatdoctorsid_c=doctorid
 										->where('reffavdocbypatpatientsid_c','=',$patientid)
 										->where('reffavdocbypatdoctorsid_c','=',$doctorid)
 										->find();
 		$array_favoritedocterbypatients=$obj_favoritedocterbypatients->as_array();
 		if($array_favoritedocterbypatients['id']==NULL){
			$obj_favoritedocterbypatients = ORM::factory('favoritedocterbypatient');
			$obj_favoritedocterbypatients->reffavdocbypatpatientsid_c=$patientid;
			$obj_favoritedocterbypatients->reffavdocbypatdoctorsid_c=$doctorid;
			$obj_favoritedocterbypatients->save();
		}
		else{
			
		}
	}
	public function action_displayfavoritedoctos()
	{
		$whereclause = "[doctorname,like,%](or)[domain_c,like,%](or)[specialization_c,like,%](or)[city_c,like,%](or)[languages_c,like,%](or)[location_c,like,%]";
		$this->dispalypatientdashboard($whereclause);
	}
	
	public function action_displaydoctorfindergrid()
	{
		$whereclause = "[doctorname,like,%](or)[domain_c,like,%](or)[specialization_c,like,%](or)[city_c,like,%](or)[languages_c,like,%](or)[location_c,like,%]";
		$this->dispalypatientdashboard($whereclause);
	}
public function dispalypatientdashboard($whereclause)
	{
		$obj_authuser = Auth::instance()->get_user();
		$obj_doctordomainmaster = ORM::factory('doctordomainmaster')
								->find_all();
		$obj_doctorspecializationmaster = ORM::factory('doctorspecializationmaster')
										->find_all();
		$obj_searchdoctors = ORM::factory('searchdoctors')
							->distinct(TRUE)
							->find_all()
							->as_array();
		$result = $obj_doctordomainmaster;
		$array_domain=array();
		foreach($result as $res)
		{
			if(! empty($res->domain_c))
			array_push($array_domain, $res->domain_c);
		}
		$result = $obj_doctorspecializationmaster;
		$array_specialization=array();
		foreach($result as $res)
		{
			if(! empty($res->specialization_c))
			array_push($array_specialization, $res->specialization_c);
		}
		$objcitymaster = new Model_Citymaster;
		$result=$objcitymaster->find_all();		
		$array_city=array();
		foreach($result as $res)
		{
			if(! empty($res->city_c))
			array_push($array_city, $res->city_c);
		}
		$array_city=array_unique($array_city);
		$objlanguagemaster = new Model_Languagemaster;
		$result = $objlanguagemaster->find_all();
		$array_language=array();
		foreach($result as $res)
		{
			if(! empty($res->language_c))
			array_push($array_language, $res->language_c);
		}
		$array_language=array_unique($array_language);
		$content = View::factory('vuser/vpatient/vpatientfavoritedoctor');
		$userid = $obj_authuser->id;
		$obj_patients = ORM::factory('patient')
 				->where('repatientsuserid_c','=',$userid)
 				->find();
 		$patientid=$obj_patients->id;
		$content->bind('patientid', $patientid);	
		$content->bind('userid', $userid);
		$content->bind('array_domain', $array_domain);
		$content->bind('array_specialization', $array_specialization);
		$content->bind('array_city', $array_city);
		$content->bind('array_language', $array_language);
		$content->bind('whereclause', $whereclause);
		$urole = "patient";
		$breadcrumb = "Home>>";
		$this->template->breadcrumb = $breadcrumb;
		$this->template->content = $content;
		$this->template->user = $obj_authuser->Firstname_c;
		$this->template->urole = $urole;
	}
	public function action_searchbuttononclick()
	{
		//take all values.
		if(!($_POST['textfield']=='Name'))	
		{
			$name=$_POST['textfield'];
		}
		else
		{
			$name="";
		}
		$domain=$_POST['domain'];
		$specialization=$_POST['specialization'];
		$city=$_POST['city'];
		$language=$_POST['language'];
		//$location=$_POST['location'];
		if(!($_POST['location']=='Locality'))	
		{
			$location=$_POST['location'];
		}
		else
		{
			$location="";
		}
		$whereclause ="";
		if( empty ($name) && empty($specialization) && empty($domain) && empty($specialization) && empty($language)&&empty($city) && empty ($location))
		{
			$whereclause = "[doctorname,like,%](or)[domain_c,like,%](or)[specialization_c,like,%](or)[city_c,like,%](or)[languages_c,like,%](or)[location_c,like,%]";
		}
		else
		{
		
			if(!($name== ""))
			{
				$whereclause = "[doctorname,like,%".$name."%]";
			}
			if(!($specialization== ""))
			{
			 
				$whereclause = $whereclause."[specialization_c,like,%".$specialization."%]";
			}
			if(!($domain== ""))
			{
				$whereclause = $whereclause."[domain_c,like,%".$domain."%]";
			}
			if(!($language== ""))
			{
				$whereclause = $whereclause."[languages_c,like,".$language."%]";
			}
			if(!($city== ""))
			{
			  if((($location== "") or ($location== "Locality")))//only city seleted not location
			  { 
			     $whereclause = $whereclause."[city_c,like,".$city."%]";
			  }
			 else//location also selected
			  {	
			  	$whereclause = $whereclause."[location_c,like,".$location."%]";
			  }
			}
		}
		$this->dispalypatientdashboard($whereclause);
	}
	public function action_selectedcity()
	{
		$city = $_GET['city'];
		$obj_address = ORM::factory('address')
						->where('city_c','=',$city)
						->find_all();
		$result = $obj_address;
		$array_location=array();
		foreach($result as $res)
		{
			if(! empty($res->location_c))
			array_push($array_location, $res->location_c);
		}
		$array_location=array_unique($array_location);
		$obj=json_encode ($array_location);
		die($obj);
	}
	
	public function action_getslots()
	{
		$date 		= date( 'Y-m-d g:i:s l',strtotime($_GET['date']));
		$doctorid 	= $_GET['id'];
		$type		= $_GET['type'];
		$mode		= $_GET['mode'];
		$longvisit	= $_GET['longvisit'];
		if($mode=='phone')
			$mode = 'online';
		switch($type)
		{
			case 0: 
				$typename = 'Any';
				break;
			case 1: 
				$typename = 'Standard';
				break;
			case 2: 
				$typename = 'Premium';
				break;
			case 3: 
				$typename = 'Concessional';
				break;
			case 4:
				$typename = 'Free';
		}
		$objCalendar = ORM::factory('doctorcalendar')
						->where('refdoctorcalendardoctorid_c','=',$doctorid)->find();
		if( $typename== "Any" &&  $mode== "Any")
		{
			$objSlots = ORM::factory('doctorslot')
						->where('calendarid','=',$objCalendar->id)							
						->where('startdate','=',date( 'Y-m-d',strtotime($date)))
						-> find_all();
		}
		else if( $typename== "Any" &&  $mode!= "Any")
		{
			$query = ORM::factory('doctorslot')
						->where('calendarid','=',$objCalendar->id)							
						->where('startdate','=',date( 'Y-m-d',strtotime($date)))						
						->where_open();						
			$objSlots = $query						
					->where('modetype','=',$mode)
					->or_where('modetype','=',"both")		
					->where_close()-> find_all();
		}
		else if( $typename != "Any" &&  $mode== "Any")
		{
			$objSlots = ORM::factory('doctorslot')
						->where('calendarid','=',$objCalendar->id)							
						->where('startdate','=',date( 'Y-m-d',strtotime($date)))
						->where('chargetype','=',$typename)
						-> find_all();
		}
		else
		{
			
		$query = ORM::factory('doctorslot')
						->where('calendarid','=',$objCalendar->id)							
						->where('startdate','=',date( 'Y-m-d',strtotime($date)))
						->where('chargetype','=',$typename)
						->where_open();						
		$objSlots = $query						
					->where('modetype','=',$mode)
					->or_where('modetype','=',"both")		
					->where_close()-> find_all();				
		}			
		
		$slots = '';
		$shortvisitduration="1";
		$longvisitduration="";
		$blockval = "";
		$blockofminutes="";
		$arrestricteddates = array();
		$restricteddates = "";
		foreach($objSlots as $slot)
		{	
			if((date( 'Y-m-d',strtotime($_GET['date'])) >= $slot->startdate) && (date( 'Y-m-d',strtotime($_GET['date'])) <= $slot->enddate) && (date( 'l',strtotime($_GET['date'])) == $slot->day))
			{
				
				$blockval = $slot->type;
				$shortvisitduration = $slot->shortvisitduration_c;
				$longvisitduration = $slot->longvisitduration_c;
				$blockofminutes = $slot->blockofminutes;
				$restricteddates = $slot->restricteddates;
				if(!(strpos($restricteddates, ',') === false ))
					$arrestricteddates = explode(',', $restricteddates );
				else
					array_push($arrestricteddates,$restricteddates);
				$arrestricteddates = array_unique($arrestricteddates);
				//dont show slots for restricted dates	
				for($i=0;$i<sizeof($arrestricteddates);$i++ )
				{
					if( strtotime(date('Y-m-d',strtotime($arrestricteddates[$i]) ) ) != strtotime($_GET['date']) )
					{
						if($slots == '')
							$slots = $slot->slots;
						else
							$slots = $slots.','.$slot->slots;
					}
				}
				
			}
		}
		if($longvisit == 'true' )
		{
			$endtimemins = $longvisitduration;
			$noofslots = $longvisitduration/$shortvisitduration;
		}			
		else
		{
			$endtimemins = $shortvisitduration;
			$noofslots = 1;
		}
		$time = date('Y-m-d H:i');
		$objappointments = ORM::factory('appointmenttime')
						->where('date','=',date( 'Y-m-d',strtotime($_GET['date'])))->where('type','=',$type)->find_all();
						
		$appdatetime = array();
		foreach($objappointments as $appointment)
		{
			if( date( 'Y-m-d', strtotime($appointment->datetime)) == date( 'Y-m-d',strtotime($_GET['date']))  )
			{
				for($k=0;$k<$appointment->noofslots;$k++ )
				{	
					if(trim($blockval) == "fixedslot")			
					{
						$m1 = explode(':',date('H:i', strtotime($appointment->datetime)));
						$starttime = date( 'H:i', mktime( (int) $m1[0],(int) $m1[1]+($endtimemins*$k),0 ,date( 'm',strtotime($time)) ,date( 'd',strtotime($time)) ,date( 'Y',strtotime($time))));
						array_push($appdatetime, $starttime);	
					}
					else
					{
						array_push($appdatetime, date('H:i', strtotime($appointment->datetime)));	
					}				
				}				
			}			
		}
		
		$array1 = explode(",", $slots);
		$appdatetimearr = $appdatetime;
		for($i=0; $i<count($array1);$i++)
		{
			for($j=0; $j<count($appdatetime);$j++)
			{
				if($array1[$i] == $appdatetime[$j])
				{
					$array1[$i] = '';
					$appdatetime[$j] = '';
					break;
				}
			}
		}		
		$diffarray = array_diff($array1,$appdatetime);
		//$slots = array_unique($diffarray);
		$slots = $diffarray;
		
		$trimedslots = array();
		$longvisitarray = array();		
		foreach($slots as $slot)
		{
			if($slot != '')
			{
				array_push($trimedslots,$slot);
				$m1 = explode(':',$slot);
				$starttime = date( 'H:i', mktime( (int) $m1[0],(int) $m1[1]+$endtimemins,0 ,date( 'm',strtotime($time)) ,date( 'd',strtotime($time)) ,date( 'Y',strtotime($time))));
				array_push($longvisitarray,$starttime);
			}
				
		}
	
		$actualslots = array();
		$actualslotsdtls = array();	
		$j=0;		
		foreach($trimedslots as $s)
		{
			$m1 = explode(':',$s);
			$slottime = date( 'Y-m-d H:i', mktime( (int) $m1[0],(int) $m1[1],0 ,date( 'm',strtotime( $_GET['date'])) ,date( 'd',strtotime($_GET['date'])) ,date( 'Y',strtotime($_GET['date']))));
			$starttime = date( 'Y-m-d H:i', mktime( (int) $m1[0],(int) $m1[1],0 ,date( 'm',strtotime($time)) ,date( 'd',strtotime($time)) ,date( 'Y',strtotime($time))));
			
			if( strtotime($slottime) >= strtotime($time)  )
			{				
				$endtime = date( 'H:i', mktime( (int) $m1[0],(int) $m1[1]+$endtimemins,0 ,date( 'm',strtotime($time)) ,date( 'd',strtotime($time)) ,date( 'Y',strtotime($time))));	
				
				if( trim($blockval) == "fixedslot" )
				{				
					$st = date('Y-m-d H:i',strtotime($starttime) );
					$m2 = explode(':',$longvisitarray[$j] );
					$ed =  date( 'Y-m-d H:i', mktime( (int) $m2[0],(int) $m2[1],0 ,date( 'm',strtotime($time)) ,date( 'd',strtotime($time)) ,date( 'Y',strtotime($time))));
					$flag = false;
					foreach($appdatetimearr as $apt)
					{
						
						$t = explode(':',$apt);
						$search = date( 'Y-m-d H:i', mktime( (int) $t[0],(int) $t[1],0 ,date( 'm',strtotime($time)) ,date( 'd',strtotime($time)) ,date( 'Y',strtotime($time))));
						
						if($this->check_in_range($st,$ed,$search ) == 1)
						{	$flag = true;
							break;
							}
						
					}
					if(!$flag)
						array_push($actualslots,$s);
				}
				else{
					if((($shortvisitduration * $this ->array_count_this_value($trimedslots,$s)) ) >= $endtimemins)
					{
						array_push($actualslots,$s);	
							
					}					
				}										
			}
			$j++;				
		}
		
		$actualslots = array_unique($actualslots);
		$finalslots = array();
		foreach($actualslots as $actualslot)
		{
			array_push($finalslots,$actualslot );
			
		}
		$actualslotsdtls = array();
		$actualslotsdtls["shortvisitduration"] = $shortvisitduration;
		$actualslotsdtls["longvisitduration"] = $longvisitduration;
		$actualslotsdtls["noofslots"] = $noofslots;
		$actualslotsdtls["blockslotduration"] = $blockofminutes;
		$actualslotsdtls["appstrategytype"] = trim($blockval);
		$actualslotsdtls["slots"] = $finalslots;
		
		die(json_encode($actualslotsdtls));
	}
	public function check_in_rangeeuqls($start_date, $end_date, $date_from_user)
	{
		
		$start_ts = strtotime($start_date);
		$end_ts = strtotime($end_date);
		$user_ts = strtotime($date_from_user);
		
		// Check that user date is between start & end
		return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));
	}
	public function check_in_range($start_date, $end_date, $date_from_user)
	{
		
		$start_ts = strtotime($start_date);
		$end_ts = strtotime($end_date);
		$user_ts = strtotime($date_from_user);
		
		// Check that user date is between start & end
		return (($user_ts > $start_ts) && ($user_ts < $end_ts));
	}
	public function array_count_this_value($array, $value) { 
	  $values=array_count_values($array);
	  
	  return $values[$value]; 
	} 
	public function action_getrestricteddates()
	{
		$doctorid 	= $_GET['id'];

		$objCalendar = ORM::factory('doctorcalendar')
						->where('refdoctorcalendardoctorid_c','=',$doctorid)->find();
		$objSlots = ORM::factory('doctorslot')
						->where('calendarid','=',$objCalendar->id)
						->find_all();
		$restricteddates = '';
		foreach($objSlots as $slot)
		{
				if($restricteddates == '')
					$restricteddates = $slot->restricteddates;
				else
					$restricteddates = $restricteddates.','.$slot->restricteddates;
		}
		$restricteddates = array_unique(explode(",", $restricteddates));
		$trimeddates = array();
		foreach($restricteddates as $restricteddate)
		{
			if($restricteddates != '')
				array_push($trimeddates,$restricteddate);
		}
		die(json_encode($trimeddates));
	}
	public function action_saveappointment()
	{
		$arr_accounts = include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/config/accounts.php');
    var_dump($_GET);die();
		$doctorid 		= $_GET['id'];
		$type			= $_GET['type'];
		$mode			= $_GET['mode'];
		$selecteddates	= $_GET['dates'];
		$incidentid		= $_GET['incidenceid'];
		$incidentname	= $_GET['incidencename'];
		$paymentmode	=  $_GET["paymentmode"];
		$noofslots	=  $_GET["noofslots"];
		$rescheduledappid	=  $_GET["rescheduledappid"];
		$shortvisitduration	=  $_GET["shortvisitduration"];
		$longvisit	=  $_GET["longvisit"];
		$appstrategytype = $_GET["appstrategytype"];
		$blockslotduration = $_GET["blockslotduration"];
		$currentlocation="";
		if($_GET["currentlocation"])
		{
			$currentlocation= $_GET["currentlocation"];
			$currentlocation = strstr($currentlocation, '/ayushman/');
			$currentlocation = str_replace('ayushman/', '', $currentlocation);
		}
		$fees = 0;
		$onlinecharges = 0;
		$objFees = ORM::factory('Billingdoctorfee')->where('ref_doctorid_c','=',$doctorid)->where('ref_slottypeid_c','=',$type)->where('status_c','=','active')->find();
		if(isset($_GET['userid']))
			$obj_user 		= ORM::factory('user')->where('id','=',$_GET['userid'])->find();
		else
			$obj_user 		= Auth::instance()->get_user();
		$objAccounts	= ORM::factory('billingaccount');
		$objAccounts 	= $objAccounts->where('refaccountuserid_c','=',$obj_user->id)->find();
		
		//Deduct service charges
		$objCorporateMember 	= ORM::factory('corporatemember')->where('emailid_c','=',$obj_user->email)->where('status_c','=','active')->find();
		$isCorporateMember = false;
		if($objCorporateMember->id != null){
			$planid = $objCorporateMember->refplanid_c;
			$isCorporateMember = true;
		}else{
			$isCorporateMember = false;
			$objPlans 	= ORM::factory('billingindividualplan')->where('refusersid_c','=',$obj_user->id)->where('status_c','=','active')->find();
			$planid 	= null;
			if($objPlans->id == NULL){
				$messages['noplan'] = "You have not selected plan yet, Please Select plan and move ahead.";
			}else{
				$planid  	= $objPlans->refplanid_c;
			}
		}
		$objPlans = ORM::factory('viewbillingplan');
		$objPlans = $objPlans->where('id','=',$planid)->find()->as_array();
		if(strtolower($mode) == 'in-clinic')
			$onlinecharges = $objPlans['servicecharges'];
		else
			$onlinecharges = $objPlans['onlinecharges'] + $objPlans['servicecharges'];

		// if user is rescheduling the appointment, cancel current appointment and take new one.
		if($rescheduledappid !="" || $rescheduledappid !=NULL )
		{
			$obj_appointments = ORM::factory('appointment')//create appointment object
						->where('id','=',$rescheduledappid)
						->find();
			$obj_appointments->refappointmentstatusesid_c = 3;
			$obj_appointments->save();
			if($obj_appointments->paid_c == 1)
				$result = transaction::transfer( ORM::factory('billingaccount')->where('refaccountuserid_c','=',$arr_accounts['provisionaccountuserid'])->find()->accountcode_c,$objAccounts->accountcode_c,1,$obj_appointments->rate_c,7);
		}
		if($incidentid == "")
		{
			$objinc = ORM::factory('incident');
			$objinc->incidentsname_c	= $incidentname;
			$objinc->incidentdate_c		= date('Y-m-d g:i:s a');
			$objinc->save();
			$incidentid = $objinc->id;
		}

		$selecteddates	= json_decode($selecteddates);
				
		$time = '';
		//foreach($selecteddates as $selecteddate)
		{
			//if(! strpos($selecteddates[0], '-') === false )
			//	$appstdate= substr($selecteddates[0], 0, strrpos( $selecteddates[0],'-'));
			//else
				$appstdate = $selecteddates[0];
			
			$objapp = ORM::factory('appointment');

			switch($longvisit)
			{
				case 'true':
						if(strtolower($mode) == 'in-clinic')
							$fees = $fees + $objFees->firsttimefeesinclinic_c;
						else
							$fees = $fees + $objFees->firsttimefees_c;
					break;
				case 'false':
					if(strtolower($mode) == 'in-clinic')
						$fees = $fees + $objFees->followupfeesinclinic_c;
					else
						$fees = $fees + $objFees->followupfees_c;
					break;
			}
			if($paymentmode == 0){
				$netbalance = $objAccounts->netbalance_c;
				if(($fees + $onlinecharges) <= $netbalance){
					$result = transaction::transfer($objAccounts->accountcode_c,ORM::factory('billingaccount')->where('refaccountuserid_c','=',$arr_accounts['ayushmanincomeuserid'])->find()->accountcode_c,1, ($onlinecharges),1);
					$result = transaction::transfer($objAccounts->accountcode_c,ORM::factory('billingaccount')->where('refaccountuserid_c','=',$arr_accounts['provisionaccountuserid'])->find()->accountcode_c,1, ($fees),2);
					if($result['type'] == 'error'){
						die($result['message']);
					}else
						$objapp->paid_c = 1;
				}else{
					$session = Session::instance();
					$link= $currentlocation;
					$session->set('followlink', $link);
					die('insufficientbalance');
				}
			}else{
				$netbalance = $objAccounts->netbalance_c;
				if(($onlinecharges) <= $netbalance){
					$result = transaction::transfer($objAccounts->accountcode_c,ORM::factory('billingaccount')->where('refaccountuserid_c','=',$arr_accounts['ayushmanincomeuserid'])->find()->accountcode_c,1, ($onlinecharges),1);
					if($result['type'] == 'error'){
						die($result['message']);
					}
				}else{
					$session = Session::instance();
					$link= $currentlocation;
					$session->set('followlink', $link);
					die('insufficientbalance');
				}
				$objapp->paid_c = 0;
			}				
			$objapp->refappfromid_c 			= $obj_user->id;
			$objapp->refappwithid_c 			= $doctorid;
			$objapp->scheduledstarttime_c 		= date( 'Y-m-d H:i:s l',strtotime($appstdate));
			$objapp->refincidentid_c	 		= $incidentid;
			$objapp->refappointmentstatusesid_c = 2;
			$objapp->status_c					= "fromsystem";
			$objapp->slottype_c					= $type;
			$objapp->rate_c						= $fees;
			$objapp->paymentmode_c				= ($paymentmode == 0)?'online':"In-Clinic";
			$objapp->consultationmode_c			= $mode;
			$objapp->noofappslots_c				= $noofslots;
			$objapp->slotduration_c				= $shortvisitduration;
			if($appstrategytype == "blockslot")
				$time = date(' g:i A',strtotime($appstdate) ). ' on ' . date( 'j S F Y l',strtotime($appstdate))."<br>Maximum waiting time could be ".$blockslotduration." minutes." ;
			else
				$time = date(' g:i A',strtotime($appstdate) ). ' on ' . date( 'j S F Y l',strtotime($appstdate));
			$time = $time.", Your appointment is through <u>".$mode."</u> mode. ";
			$objapp->save();
		}
		//collect information for send notification 
		$notification=  array();
		$objdoctorinfo = ORM::factory('user')
			->join('doctors')
			->on('user.id','=','doctors.refdoctorsid_c')
			->where('doctors.id','=',$doctorid)
			->find();
		$drname=$objdoctorinfo->Firstname_c." ".$objdoctorinfo->lastname_c;
		$starttime= $objapp->scheduledstarttime_c ;
		$date = date_format(date_create($starttime),'d M Y' ); 
    	$time = date(' g:i A',strtotime($appstdate) );
    	$notification=  array();
		$notification['id']=$objapp->refappfromid_c ; $notification['template']='take_appointment_patientmsg'; $notification['sms']='true'; $notification['drname']=$drname; $notification['time']=$time; $notification['date']=$date;  $notification['mode']=$objapp->consultationmode_c;
		if($rescheduledappid !="" || $rescheduledappid !=NULL )
		{
			$obj_beforeRescheduleappointment = ORM::factory('appointment')//create rescheduled appointment object
						->where('id','=',$rescheduledappid)
						->find();
			$obj_afterRescheduleappointment = ORM::factory('appointment')//create rescheduled appointment object
						->where('id','=',$objapp->id)
						->find();
			$obj_beforeRescheduleappointment->refappointmentstatusesid_c = 3;
			$obj_beforeRescheduleappointment->save();
			$starttime= $obj_beforeRescheduleappointment->scheduledstarttime_c ;
			$datebefore = $obj_beforeRescheduleappointment->scheduledstarttime_c;
    		$timebefore = $obj_beforeRescheduleappointment->scheduledstarttime_c;
    		$dateafter = $obj_afterRescheduleappointment->scheduledstarttime_c;
    		$timeafter = $obj_afterRescheduleappointment->scheduledstarttime_c;
			$datebefore = date_format(date_create( $datebefore),'d M Y' ); 
    		$timebefore = date(' g:i A',strtotime($timebefore));
    		$dateafter = date_format(date_create( $dateafter),'d M Y' ); 
    		$timeafter = date(' g:i A',strtotime($timeafter));
			$notification['id']=$obj_beforeRescheduleappointment->refappfromid_c ; $notification['template']='rescheduled_appointment'; $notification['sms']='true'; $notification['drname']=$drname; $notification['timeafter']=$timeafter; $notification['dateafter']=$dateafter;  $notification['beforeresheduletime']=$timebefore;$notification['beforeresheduledate']=$datebefore;$notification['modebefore']=$obj_beforeRescheduleappointment->consultationmode_c;$notification['modeafter']=$obj_afterRescheduleappointment->consultationmode_c;
		}
		//send notification by sms to patient
		helper_notificationsender::sendnotification($notification);
		die($time);
	}
	
	Private function getPlanDetails(){
	
	}
	
	public function action_getearliestappointment()
	{
		$doctorid 	= $_GET['id'];
		$type		= $_GET['type'];
		$mode		= $_GET['mode'];
		$longvisit	= $_GET['longvisit'];
		if($mode=='phone')
			$mode = 'online';
		$serachall = FALSE;
		switch($type)
		{
			case 0: 
				$typename = 'Any';
				break;
			case 1: 
				$typename = 'Standard';
				break;
			case 2: 
				$typename = 'Premium';
				break;
			case 3: 
				$typename = 'Concessional';
				break;
			case 4:
				$typename = 'Free';
		}
		$today = date("Y-m-d");
		$objCalendar = ORM::factory('doctorcalendar')
						->where('refdoctorcalendardoctorid_c','=',$doctorid)->find();
						
		if( $typename== "Any" &&  $mode== "Any")
		{
			$objSlots = ORM::factory('doctorslot')
						->where('calendarid','=',$objCalendar->id)							
						->where('startdate','>=',date( 'Y-m-d',strtotime($today)))
						-> find_all();
			$serachall = TRUE;
		}
		else if( $typename== "Any" &&  $mode!= "Any")
		{
			$query = ORM::factory('doctorslot')
						->where('calendarid','=',$objCalendar->id)							
						->where('startdate','>=',date( 'Y-m-d',strtotime($today)))						
						->where_open();						
			$objSlots = $query						
					->where('modetype','=',$mode)
					->or_where('modetype','=',"both")		
					->where_close()-> find_all();
		}
		else if( $typename != "Any" &&  $mode== "Any")
		{
			$objSlots = ORM::factory('doctorslot')
						->where('calendarid','=',$objCalendar->id)							
						->where('startdate','>=',date( 'Y-m-d',strtotime($today)))
						->where('chargetype','=',$typename)
						-> find_all();
		}
		else
		{
			
		$query = ORM::factory('doctorslot')
						->where('calendarid','=',$objCalendar->id)							
						->where('startdate','>=',date( 'Y-m-d',strtotime($today)))
						->where('chargetype','=',$typename)
						->where_open();						
		$objSlots = $query						
					->where('modetype','=',$mode)
					->or_where('modetype','=',"both")		
					->where_close()-> find_all();				
		}	
		
		$objDocSchedules = ORM::factory('doctorschedule')
						->where('refdocschedulecalendarid_c','=',$objCalendar->id)
						->where('status_c','=','active')
						->where('startdate_c','>=',$today)
						->ORDER_BY('startdate_c','ASC')
						->find_all();
		foreach($objDocSchedules as $objDocSchedule)
		{		
			$today = date("Y-m-d");
			
			$flag = true;
			$arrestricteddates = array();
			while($flag){
				if(($today == $objDocSchedule->startdate_c) )
				{	
					$slots = '';
					$shortvisitduration="1";
					$longvisitduration="";
					$blockval = "";
					$blockofminutes="";
					$restricteddates="";
					foreach($objSlots as $slot)
					{
						if((date( 'Y-m-d',strtotime($today)) == $slot->startdate) && (date( 'l',strtotime($today)) == $slot->day))
						{
							$blockval = $slot->type;
							$shortvisitduration = $slot->shortvisitduration_c;
							$longvisitduration = $slot->longvisitduration_c;
							$blockofminutes = $slot->blockofminutes;
							$restricteddates = $slot->restricteddates;
							if(!(strpos($restricteddates, ',') === false ))
								$arrestricteddates = explode(',', $restricteddates );
							else
								array_push($arrestricteddates,$restricteddates);
							$arrestricteddates = array_unique($arrestricteddates);
							//dont show slots for restricted dates
							for($i=0;$i<sizeof($arrestricteddates);$i++ )
							{							
								if( strtotime(date('Y-m-d',strtotime($arrestricteddates[$i]) ) ) != strtotime($today ))
								{
									if($slots == '')
										$slots = $slot->slots;
									else
										$slots = $slots.','.$slot->slots;
								}
							}
							
						}
					}
					$time = date('Y-m-d H:i');
					if($longvisit == 'true' )
					{
						$endtimemins = $longvisitduration;
						$noofslots = $longvisitduration/$shortvisitduration;
					}			
					else
					{
						$endtimemins = $shortvisitduration;
						$noofslots = 1;
					}
					$objappointments = ORM::factory('appointmenttime')
									->where('date','=',date( 'Y-m-d',strtotime($today)))->find_all();
					$appdatetime = array();
					foreach($objappointments as $appointment)
					{
						if( date( 'Y-m-d', strtotime($appointment->datetime)) == date( 'Y-m-d',strtotime($today))  )
						{
							for($k=0;$k<$appointment->noofslots;$k++ )
							{	
								if(trim($blockval) == "fixedslot")			
								{
									$m1 = explode(':',date('H:i', strtotime($appointment->datetime)));
									$starttime = date( 'H:i', mktime( (int) $m1[0],(int) $m1[1]+($endtimemins*$k),0 ,date( 'm',strtotime($time)) ,date( 'd',strtotime($time)) ,date( 'Y',strtotime($time))));
									array_push($appdatetime, $starttime);	
								}
								else
								{
									array_push($appdatetime, date('H:i', strtotime($appointment->datetime)));	
								}				
							}				
						}					
					}
					$array1 = explode(",", $slots);
					$appdatetimearr = $appdatetime;
					for($i=0; $i<count($array1);$i++)
					{
						for($j=0; $j<count($appdatetime);$j++)
						{
							if($array1[$i] == $appdatetime[$j])
							{
								$array1[$i] = '';
								$appdatetime[$j] = '';
								break;
							}
						}
					}
					
					$diffarray = array_diff($array1,$appdatetime);
				
					$slots = $diffarray;
					
					$trimedslots = array();
					$longvisitarray = array();		
					foreach($slots as $slot)
					{
						if($slot != '')
						{
							array_push($trimedslots,$slot);
							$m1 = explode(':',$slot);
							$starttime = date( 'H:i', mktime( (int) $m1[0],(int) $m1[1]+$endtimemins,0 ,date( 'm',strtotime($time)) ,date( 'd',strtotime($time)) ,date( 'Y',strtotime($time))));
							array_push($longvisitarray,$starttime);
						}
							
					}
					
					$actualslots = array();
					$actualslotsdtls = array();
					
					$j=0;
					foreach($trimedslots as $s)
					{
						$m1 = explode(':',$s);
						$slottime = date( 'Y-m-d H:i', mktime( (int) $m1[0],(int) $m1[1],0 ,date( 'm',strtotime( $today)) ,date( 'd',strtotime($today)) ,date( 'Y',strtotime($today))));
						$starttime = date( 'Y-m-d H:i', mktime( (int) $m1[0],(int) $m1[1],0 ,date( 'm',strtotime($time)) ,date( 'd',strtotime($time)) ,date( 'Y',strtotime($time))));
						
						if( strtotime($slottime) >= strtotime($time)  )
						{				
							$endtime = date( 'H:i', mktime( (int) $m1[0],(int) $m1[1]+$endtimemins,0 ,date( 'm',strtotime($time)) ,date( 'd',strtotime($time)) ,date( 'Y',strtotime($time))));	
							
							if( trim($blockval) == "fixedslot" )
							{				
								$st = date('Y-m-d H:i',strtotime($starttime) );
								$m2 = explode(':',$longvisitarray[$j] );
								$ed =  date( 'Y-m-d H:i', mktime( (int) $m2[0],(int) $m2[1],0 ,date( 'm',strtotime($time)) ,date( 'd',strtotime($time)) ,date( 'Y',strtotime($time))));
								$flag = false;
								foreach($appdatetimearr as $apt)
								{
									
									$t = explode(':',$apt);
									$search = date( 'Y-m-d H:i', mktime( (int) $t[0],(int) $t[1],0 ,date( 'm',strtotime($time)) ,date( 'd',strtotime($time)) ,date( 'Y',strtotime($time))));
									
									if($this->check_in_range($st,$ed,$search ) == 1)
									{	$flag = true;
										break;
										}
									
								}
								if(!$flag)
									array_push($actualslots,$s);
							}
							else{
								if((($shortvisitduration * $this ->array_count_this_value($trimedslots,$s)) ) >= $endtimemins)
								{
									array_push($actualslots,$s);	
										
								}					
							}										
						}
						$j++;				
					}
			
					$actualslots = array_unique($actualslots);
					$finalslots = array();
					foreach($actualslots as $actualslot)
					{
						array_push($finalslots,$actualslot );
					}
					
					if(count($finalslots) > 0)
					{
						if( $typename== "Any" &&  $mode== "Any")
						{
							$objSlotstoday = ORM::factory('doctorslot')
										->where('calendarid','=',$objCalendar->id)							
										->where('startdate','=',$today)
										-> find_all();
						}
						else if( $typename== "Any" &&  $mode!= "Any")
						{
							$query = ORM::factory('doctorslot')
										->where('calendarid','=',$objCalendar->id)							
										->where('startdate','=',$today)
										->where_open();						
							$objSlotstoday = $query						
									->where('modetype','=',$mode)
									->or_where('modetype','=',"both")		
									->where_close()-> find_all();
						}
						else if( $typename != "Any" &&  $mode== "Any")
						{
							$objSlotstoday = ORM::factory('doctorslot')
										->where('calendarid','=',$objCalendar->id)							
										->where('startdate','=',$today)
										->where('chargetype','=',$typename)
										-> find_all();
						}
						else
						{
							
						$query = ORM::factory('doctorslot')
										->where('calendarid','=',$objCalendar->id)							
										->where('startdate','=',$today)
										->where('chargetype','=',$typename)
										->where_open();						
						$objSlotstoday = $query						
									->where('modetype','=',$mode)
									->or_where('modetype','=',"both")		
									->where_close()-> find_all();				
						}
						$arearliestapp = array();
						
						$earliesttime = $finalslots[0];
						$artime = explode(':',$earliesttime);
						$earliestapp = date( 'Y-m-d H:i', mktime( (int) $artime[0],(int) $artime[1],0 ,date( 'm',strtotime($today)) ,date( 'd',strtotime($today)) ,date( 'Y',strtotime($today))));
						
						foreach($objSlotstoday as $slot)
						{
							$artime = explode(':',$slot->starttime);
							$startlimit = date( 'Y-m-d H:i', mktime( (int) $artime[0],(int) $artime[1],0 ,date( 'm',strtotime($today)) ,date( 'd',strtotime($today)) ,date( 'Y',strtotime($today))));
							$artime = explode(':',$slot->endtime);
							$endlimit = date( 'Y-m-d H:i', mktime( (int) $artime[0],(int) $artime[1],0 ,date( 'm',strtotime($today)) ,date( 'd',strtotime($today)) ,date( 'Y',strtotime($today))));
						 
							if($this->check_in_rangeeuqls($startlimit,$endlimit,$earliestapp ) == 1)
							{
								$arearliestapp['date']= $today;
								$arearliestapp['time']= $earliesttime;
								$arearliestapp['mode']= $slot->modetype;
								$arearliestapp['chargetype']= $slot->chargetype;
								
								die(json_encode( $arearliestapp));
							}
						}
						
					}
					$today = date("Y-m-d", strtotime(date("Y-m-d", strtotime($today)) . " +1 day"));
				}else if($today < $objDocSchedule->startdate_c){
					$today =  date("Y-m-d", strtotime(date("Y-m-d", strtotime($today)) . " +1 day"));
				}
				else if($today > $objDocSchedule->enddate_c){
					break;
				}
			}
		}
		if( $serachall)			
			die('notset');
		else
			die('notfound');
		
	}

	public function action_getayushmancharges()
	{
		$obj_user = Auth::instance()->get_user();
		$objAccounts=ORM::factory('billingaccount');
		$objAccounts->where('refaccountuserid_c','=',$obj_user->id)->find();
		$objaccountplan = ORM::factory('billingaccountplan');
		$objaccountplan->where('refmyaccountid_c','=',$objAccounts->id)->find();
		$objbillingplan = ORM::factory('billingplancharge');
		$objbillingplan ->where('ref_planid_c','=',$objaccountplan->refplanid_c)->find();
		$arbillingplan = array();
		$arbillingplan['online'] = $objbillingplan -> usagechargesonline_c;
		$arbillingplan['phone'] = $objbillingplan -> usagechargesphone_c;
		$arbillingplan['inclinic'] = $objbillingplan -> usagechargesinclinic;
		
		die(json_encode($arbillingplan));
		
	}
	public function action_rescheduleappointmentdtls()
	{
		$rescheduledappointmentid=$_GET["id"];
		$obj_appointments = ORM::factory('appointment')//create appointment object
						->where('id','=',$rescheduledappointmentid)
						->find();
		$arrescheduledtls = array();
		$arrescheduledtls['id']=$obj_appointments->id;
		$arrescheduledtls['incidentid']=$obj_appointments->refincidentid_c;
		$arrescheduledtls['consultationmode']=$obj_appointments->consultationmode_c;
		$arrescheduledtls['slottype']=$obj_appointments->slottype_c;
		die(json_encode($arrescheduledtls));
	}
} // End Welcome

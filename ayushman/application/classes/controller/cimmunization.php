<?php defined('SYSPATH') or die('No direct script access.');
include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/controller/catjob.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/notificationsender.php');

class Controller_Cimmunization extends Controller_Ctemplatewithmenu{
	public function action_view()
	{
		try
		{
			$objUser = Auth::instance()->get_user();
			if (!$objUser)
				Request::current()->redirect('cuser/login');
			else if ($objUser->has('roles', ORM::factory('role', array('name' => 'patient')))){
			     $content = $this->getContent($objUser, $objUser);
			}
			else if ($objUser->has('roles', ORM::factory('role', array('name' => 'doctor')))){
			     $patientId = $_GET['patientUserId'];
			     $objPatient = ORM::factory('user')->where('id','=',$patientId)->find();
			     $content = $this->getContent($objUser, $objPatient);
			}
			$this->template->content = $content;
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
	}
	public function action_setreminder()
	{		
		$reminderjson=json_decode($_POST['reminderjson']);
		$objUser = Auth::instance()->get_user();
		$drname=$objUser->Firstname_c;
		$duedate=strtotime($_POST['reminder']."+ 9 hours");
		$duedate=date('H:i m/d/Y',$duedate);
		//var_dump($duedate); die;
		
					$notification=  array();
					// Id was not added so was giving 
					// error while seding vaccination reminders
					$notification['id']=$_POST['patient_id'];
					
					$notification['template']='setvaccinationreminder';
					$notification['email']='true'; 
					$notification['sms']='true'; 
					$notification['drname']=$drname;
					$notification['duedate']=$duedate;
					$notification['agegroup']=$reminderjson[0][2];
					$notification['clinic']="";
					$notification['previousagegroup']="";
					$notification['previousdate']="";
					helper_notificationsender::sendnotificationattime($notification,$duedate);
					
		die;
	}
	/**
	  * Used as a api from client side to get the list of immunization grouped according to the age group.
	  * 
	  * Creates a json grouped according to the immunization duration.
	  */
	
	public function action_getimmunizationlist()
	{
		try
		{
			$objUser = Auth::instance()->get_user();
			if (!$objUser)
				Request::current()->redirect('cuser/login');
			else
			{
					$result=array();
					$i=0;
					$immunizationmasterages= ORM::factory('immunizationmaster')->group_by('recommendedage_c')->order_by('id','ASC')->find_all()->as_array();
					$agegroups = array();
					foreach($immunizationmasterages as $immunizationmasterage )
					{
						array_push($agegroups,$immunizationmasterage->recommendedage_c);
					}
					
					foreach($agegroups as $agegroup)
					{
						$result[$i]=array();
						$immunizationmasterobjs= ORM::factory('immunizationmaster')->where('recommendedage_c','=',$agegroup)->find_all()->as_array();
					
					foreach($immunizationmasterobjs as $immunizationmasterobj)
					{
						$temp=array($immunizationmasterobj->id,$immunizationmasterobj->Immunizationname_c,$agegroup,$i);
						
						array_push($result[$i],$temp);
						
					}
					$i++;
					}
					
					echo(json_encode($result));
					die;
			}
			
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
	}

	private function getContent($objUser, $objPatient){
		$temp_result = array();
		$patientId = ORM::factory('patient')->where('repatientsuserid_c','=',$objPatient->id)->mustFind()->id;
		$objImmunizationmasters = ORM::factory('immunizationmaster')->find_all()->as_array();
		$dob = $objPatient->DOB_c;
		$result = array();
		$dateofbirth = (int)strtotime($dob); 
		if($dateofbirth != '-62170005200'){
			foreach($objImmunizationmasters as $immunization){
				$temp	= array();
				$temp['id'] = $immunization->id;
				$temp['due_age'] = $immunization->recommendedage_c;
				$date = date_create($dob);
				date_add($date, date_interval_create_from_date_string($immunization->recommendedage_c));
				$temp['due_date'] = date_format($date, 'd-m-Y');
				$temp['timestamp'] = strtotime($temp['due_date']);;
				$temp['name'] = $immunization->Immunizationname_c;
				$patient_immune = ORM::factory('patientimmunizations')->where("refpatimmpatientsid_c","=",$patientId)->where('refpatimmunizationid_c','=',$immunization->id)->find();
				if($patient_immune->id != NULL){
					$temp['status']=$patient_immune->status_c;
					if($patient_immune->datewhentaken_c != NULL)
						$temp['date']=date_format(date_create($patient_immune->datewhentaken_c),'d-m-Y');
					else
						$temp['date']=NULL;
				}
				else{
					$temp['status']='0';
					$temp['date']=NULL;
				}
				array_push($temp_result,$temp);
			}
			uasort($temp_result, create_function('$a, $b','if ($a["timestamp"] == $b["timestamp"]) return 0; return ($a["timestamp"] < $b["timestamp"]) ? -1 : 1;'));//sort array on due date order
			$current_time = 0;
			$previous_time= 0;
			$elements=array();
			$temp_element=array();
			foreach($temp_result as $temp){
				$previous_time = $current_time;
				$current_time = $temp['timestamp'];
				if($current_time != $previous_time){
					$temp_element['elements']=$elements;
					array_push($result,$temp_element);
					$temp_element=array();
					$temp_element['due_age']=$temp['due_age'];
					$temp_element['due_date']=$temp['due_date'];
					$elements = array();
					array_push($elements,$temp);
				}
				else{
					array_push($elements,$temp);
				}
			}
			$temp_element['elements']=$elements;
			array_push($result,$temp_element);
			array_shift($result);
		}	
		else{
			//date of birth is not valid or not set 
		}
		$curr_date = date('Y').",".date('m').",".date('d');
		$dob = date_create($dob);
		$dob = $dob->format('Y').",".$dob->format('m').",".$dob->format('d');
		$content = View::factory('/vuser/vpatient/vimmunization');
		$content->bind('curr_date',$curr_date);
		$content->bind('dob',$dob);
		$content->bind('result',$result);
		$content->bind('patientid', $objPatient);
		return($content);
	}
	
	public function action_save()
	{
		try
		{
			$objUser = Auth::instance()->get_user();
			if (!$objUser)
				Request::current()->redirect('cuser/login');
			else if ($objUser->has('roles', ORM::factory('role', array('name' => 'patient')))){
			     $content = $this->saveImmnunization($objUser, $objUser);
			}
			else if ($objUser->has('roles', ORM::factory('role', array('name' => 'doctor')))){
			     $patientId = $_POST['patientUserId'];
			     $objPatient = ORM::factory('user')->where('id','=',$patientId)->find();
			     $content = $this->saveImmnunization($objUser, $objPatient);
			}

		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
	}
	
	private function saveImmnunization ($objUser, $objPatient){
		$patientId = ORM::factory('patient')->where('repatientsuserid_c','=',$objPatient->id)->mustFind()->id;
		$obj_immunizationmasters = ORM::factory('immunizationmaster')->find_all()->as_array();
		foreach($obj_immunizationmasters as $immunization){
			$prefix = $immunization->id;
			$current_info = ORM::factory('patientimmunizations')->where("refpatimmpatientsid_c","=",$patientId)->where("refpatimmunizationid_c","=",$prefix)->find();
			if($current_info->id == NULL){
				$current_info->refpatimmpatientsid_c = $patientId;
				$current_info->refpatimmunizationid_c = $prefix;
				if($_POST[$prefix."_status"] == 1){
					if($_POST[$prefix."_actual_date"] != '')
						$current_info->datewhentaken_c = date('Y-m-d',strtotime($_POST[$prefix."_actual_date"]));
					else
						$current_info->datewhentaken_c = NULL;
				}
				else
					$current_info->datewhentaken_c = NULL;
				$current_info->status_c = $_POST[$prefix."_status"];
				$current_info->save();
			}
			else{
				if($_POST[$prefix."_status"] == 1){
					if($_POST[$prefix."_actual_date"] != '')
						$current_info->datewhentaken_c = date('Y-m-d',strtotime($_POST[$prefix."_actual_date"]));
					else
						$current_info->datewhentaken_c = NULL;
				}
				else
					$current_info->datewhentaken_c = NULL;
				$current_info->status_c = $_POST[$prefix."_status"];
				$current_info->update();
			}
		}
		Request::current()->redirect("cimmunization/view?patientUserId=$objPatient->id");
	}
}
?>
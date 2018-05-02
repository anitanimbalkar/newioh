<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cpatientemrtodoc extends Controller_Ctemplatewithmenu {
	public function action_viewpatientemr()
	{
			$obj_user = Auth::instance()->get_user();
			$obj_patient;$backstring;
			
			if(isset($_GET['back']))
				$back = $_GET['back'];
			else
				$back = "true";
			if(isset($_GET['appointmentid']))
			{
			$appointmentid = $_GET['appointmentid'];
			
			$obj_patient = ORM::factory('user')
							->join('appointments')
							->on('user.id','=','appointments.refappfromid_c')
							->where('appointments.id','=',$appointmentid)
							->find();
			if(isset($_GET['controller'])){
				$backstring="/ayushman/cdoctordashboard/view";
			}else{
				$backstring="/ayushman/cdoctorpastappointments/viewpastappointments";
			}
			}
			elseif(isset($_GET['patientuserid'])){
			$patientuserid=$_GET['patientuserid'];
			$obj_patient = ORM::factory('user')
							->where('id','=',$patientuserid)
							->find();
			//$backstring="/ayushman/cselecteddoctorbypatient/displaypatient";
			}
			$patientinfo = ORM::factory('patient')
				->where('repatientsuserid_c','=',$obj_patient->id)
				->find();
			$objaddhome = ORM::factory('address')
 							->where('id','=',$obj_patient->refaddresshome1_c)
							->find();
			$objaddwork = ORM::factory('address')
 							->where('id','=',$obj_patient->refaddresswork_c)
							->find();
			$patientid = $patientinfo->id;
			//show allergy and social habbits
			$objpatallergy=new Model_Viewpatientallergie;
			
			$food= $objpatallergy->where('patientid','=',$patientid)->where('type_c','=','food')->find_all();
			$drug= $objpatallergy->where('patientid','=',$patientid)->where('type_c','=','drug')->find_all();
			$animal= $objpatallergy->where('patientid','=',$patientid)->where('type_c','=','animal')->find_all();
			$plant= $objpatallergy->where('patientid','=',$patientid)->where('type_c','=','plant')->find_all();
			$food = $this->getarray($food);
			$drug = $this->getarray($drug);
			$animal = $this->getarray($animal);
			$plant = $this->getarray($plant);
			//end allery and social habbits region
			
			//show immunization
			$temp_result = array();			
			$obj_immunizationmasters = ORM::factory('immunizationmaster')->find_all()->as_array();
			$dob = $obj_patient->DOB_c;
			foreach($obj_immunizationmasters as $immunization)
			{
				$temp	= array();
				$temp['id'] = $immunization->id;
				$temp['due_age'] = $immunization->recommendedage_c;
				$date = date_create($dob);date_add($date, date_interval_create_from_date_string($immunization->recommendedage_c));
				$temp['due_date'] = date_format($date, 'd-m-Y');
				$temp['timestamp'] = strtotime($temp['due_date']);;
				$temp['name'] = $immunization->Immunizationname_c;
				$patient_immune = ORM::factory('patientimmunizations')->where("refpatimmpatientsid_c","=",$patientid)->where('refpatimmunizationid_c','=',$immunization->id)->find();
				if($patient_immune->id != NULL)
				{
					$temp['status']=$patient_immune->status_c;
					if($patient_immune->datewhentaken_c != NULL)
						$temp['date']=date_format(date_create($patient_immune->datewhentaken_c),'d-m-Y');
					else
						$temp['date']=NULL;
				}
				else
				{
					$temp['status']='0';
					$temp['date']=NULL;
				}
				array_push($temp_result,$temp);
			}
			uasort($temp_result, create_function('$a, $b','if ($a["timestamp"] == $b["timestamp"]) return 0; return ($a["timestamp"] < $b["timestamp"]) ? -1 : 1;'));
			$element_result = array();
			$current_time = 0;
			$previous_time= 0;
			$elements=array();
			$temp_element=array();
			foreach($temp_result as $temp)
			{
				$previous_time = $current_time;
				$current_time = $temp['timestamp'];
				if($current_time != $previous_time)
				{
					$temp_element['elements']=$elements;
					array_push($element_result,$temp_element);
					$temp_element=array();
					$temp_element['due_age']=$temp['due_age'];
					$temp_element['due_date']=$temp['due_date'];
					$elements = array();
					array_push($elements,$temp);
				}
				else
				{
					array_push($elements,$temp);
				}
			}
			
			$temp_element['elements']=$elements;
			array_push($element_result,$temp_element);
			array_shift($element_result);
			
			$curr_date = date('Y').",".date('m').",".date('d');
			$dob = date_create($dob);
			$dob = $dob->format('Y').",".$dob->format('m').",".$dob->format('d');
			//end immunization region
			//show personal history (when cpatientpastillness is refactored apply changes here as well)
			$objdisease = ORM::factory('pathistorydisease')
				->find_all()
				->as_array();
			
			$array_disease=array();
			foreach($objdisease as $res)
			{
				if(! empty($res->disease_c))
				array_push($array_disease, $res->disease_c);
			}
			$objquestion = ORM::factory('pathistoryquestion')
							->find_all()
							->as_array();
			
			$array_question=array();
			foreach($objquestion as $res)
			{
				if(! empty($res->question_c))
				array_push($array_question, $res->question_c);
			}
			
			$objanswer = ORM::factory('pathistoryquestionanswer')
							->where('ref_patientid_c','=',$obj_patient->id)
							->find_all()
							->as_array();
			
			$array_answer=array();
			$dbset=0;
			$noofques=0;
			foreach($objanswer as $res)
			{
				if(! empty($res->ref_questionid_c)){
				array_push($array_answer, $res->answer_c);
				$dbset=1;
				$noofques++;
				}
				
			}
			if($dbset==0)
			{
				foreach($array_question as $dis)
				{
					array_push($array_answer, "");
				
				}
			}
			$len=count($array_answer);
			
			if(($dbset==1) and (count($array_question)>$noofques))
			{
			   for($y=1;$y<=(count($array_question)-$noofques);$y++)
			   {
				   $array_answer[$len]="";
				  
				   $len++;
			   }
			}
			
			
			$objpatmedical = ORM::factory('patmedicalproblem')
							->where('ref_patientid_c','=',$obj_patient->id)
							->find_all()
							;
			
			$array_remark=array();
			$array_status=array();
			$dbset=0;
			$x=0;
			foreach($objpatmedical as $res)
			{
				if(! empty($res->disease_c))
				{
				
				array_push($array_remark, $res->remark_c);
				array_push($array_status, $res->status_c);
				$dbset=1;
				$x++;
				}
			
			}
			if($dbset==0)
			{
			foreach($array_disease as $dis)
			{
			array_push($array_remark, "");
			array_push($array_status, "");
			}
			}
			$len=count($array_remark);
			
		   if(($dbset==1) and (count($array_disease)>$x))
		   {
			   for($y=1;$y<=(count($array_disease)-$x);$y++)
			   {
				   $array_remark[$len]="";
				   $array_status[$len]="";
				   $len++;
			   }
			}
			
			$objpatill = ORM::factory('patientillnesses')
					->where('refpatdiseasepatientsid_c','=',$patientid)
					->find_all()
					->as_array();
			$result = $objpatill;
			$array_pastillness=array();
			foreach($result as $res)
				{
					
					$ar_res = array();
					$ar_res['0'] = ORM::factory('diseasemaster')->where('id','=',$res->refpatdiseasedieseasid_c)->find()->diseasename_c;					
					$ar_res['1'] = $res->from_c;					
					$ar_res['2'] = $res->medicationtaken_c;
					
				
					array_push($array_pastillness,$ar_res);
				}
				
			$objpatsurgery= ORM::factory('pathistorysurgerydetail')
							->where('patientid_c','=',$patientid)
							->find_all()
							->as_array();
			$result = $objpatsurgery;
			$array_pastsurgery=array();
			foreach($result as $res)
				{
					
					$surgery = array();
					$surgery['0'] =$res->surgeryname_c;					
					$surgery['1'] = $res->surgerydate_c;					
					$surgery['2'] = $res->surgerydescription_c;			
				
					array_push($array_pastsurgery,$surgery);
				}
			
			//end region personal history
			//show family history
			$objPatientRelativeHistory = new Model_Patientrelativehistory;
			$objPatientRelativeHistory = $objPatientRelativeHistory->where('refpatrelhistpatientsid_c','=',$patientid)->find_all();
			
			$array_relativeFather=array();
			$array_relativeMother=array();
			$array_relative=array();
			foreach($objPatientRelativeHistory as $res)
			{
				switch ($res->relationship_c) {
							 case 'Father': $array_relativeFather['id']=$res->id;
											$array_relativeFather['relation']="Father";
											$array_relativeFather['birthyear']=$res->birthyear_c;
											$array_relativeFather['medicalhistory']=$res->medicalhistory_c;
											$array_relativeFather['deathcause']=$res->deathcause_c;
											$array_relativeFather['deathage']=$res->deathage_c;
											break;
							 case 'Mother': $array_relativeMother['id']=$res->id;
											$array_relativeMother['relation']="Mother";
											$array_relativeMother['birthyear']=$res->birthyear_c;
											$array_relativeMother['medicalhistory']=$res->medicalhistory_c;
											$array_relativeMother['deathcause']=$res->deathcause_c;
											$array_relativeMother['deathage']=$res->deathage_c;
											break;
							default:$length=count($array_relative);
									$array_relative[$length]['id']=$res->id;
									$array_relative[$length]['relation']=$res->relationship_c;
									$array_relative[$length]['birthyear']=$res->birthyear_c;
									$array_relative[$length]['medicalhistory']=$res->medicalhistory_c;
									$array_relative[$length]['deathcause']=$res->deathcause_c;
									$array_relative[$length]['deathage']=$res->deathage_c;
									break;	
						}
			}
			$obj_relationmasters = ORM::factory('relationmaster')->find_all();
			$array_relationmaster		= array();
			
			foreach($obj_relationmasters as $result){
				if((! empty($result->relationname_c))and ($result->relationname_c!="Father") and($result->relationname_c!="Mother"))
					{	
							array_push($array_relationmaster, $result->relationname_c);
					}
			}
			
			sort($array_relationmaster);
			//end region family history
			$content = View::factory('vuser/vdoctor/vpatientemrtodoc');
			$content->bind('obj_user', $obj_user);
			$content->bind('obj_patient', $obj_patient);
			$content->bind('patientinfo', $patientinfo);
			$content->bind('objaddhome', $objaddhome);
			$content->bind('objaddwork', $objaddwork);
			//allergy
			$content->bind('food', $food);
			$content->bind('drug', $drug);
			$content->bind('plant', $plant);
			$content->bind('animal', $animal);
			//immunization
			$content->bind('curr_date',$curr_date);
			$content->bind('dob',$dob);
			$content->bind('result',$element_result);
			//personal history
			$content->bind('array_disease', $array_disease);
			$content->bind('array_question', $array_question);
			$content->bind('array_answer', $array_answer);
			$content->bind('array_remark', $array_remark);
			$content->bind('array_status', $array_status);	
			$content->bind('array_pastsurgery', $array_pastsurgery);	
			$content->bind('array_pastillness', $array_pastillness);	
			//family hostory
			$content->bind('array_relativeFather', $array_relativeFather);
			$content->bind('array_relationmaster', $array_relationmaster);
			$content->bind('array_relativeMother', $array_relativeMother);
			$content->bind('array_relative', $array_relative);
			
			$content->bind('backstring', $backstring);
			$content->bind('back', $back);
			$username = "Dr. ".trim($obj_user->Firstname_c);
			$content->bind('username', $username);
			$urole = "doctor";
			$breadcrumb = "Home>>";
            $this->template->breadcrumb = $breadcrumb;
			$this->template->content = $content;
			$this->template->user = $username;
			$this->template->urole = $urole;	
	}
	
	public function getarray($object)
	{
		$arr= array();
			foreach($object as $res)
			{
				$arr[$res->id]=$res->allergyname_c;
			}
		return $arr;
	}
} // End Welcome

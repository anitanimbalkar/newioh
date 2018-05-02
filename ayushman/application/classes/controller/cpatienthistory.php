<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/controller/cpdfcreater.php');

class Controller_Cpatienthistory extends Controller {

	public function action_foodallergies(){
		$obj_foodallergy=new Model_Allergymaster;
		
		$allergies = array();
		$allergies=$obj_foodallergy->get_foodallergy();

		echo json_encode($allergies);
		die;
		
	}
	public function action_putstatus(){		
		$patienId = $_GET['patid'];
		$statusid = $_GET['statusid'];
	}
	public function action_drugallergies(){
		$obj_drugallergy=new Model_Allergymaster;
		
		$allergies = array();
		$allergies=$obj_drugallergy->get_drugallergy();

		echo json_encode($allergies);
		die;
		
	}
	public function action_plantallergies(){
		$obj_plantallergy=new Model_Allergymaster;
		
		$allergies = array();
		$allergies=$obj_plantallergy->get_plantallergy();

		echo json_encode($allergies);
		die;
		
	}
	public function action_animalallergies(){
		$obj_animalallergy=new Model_Allergymaster;
		
		$allergies = array();
		$allergies=$obj_animalallergy->get_animalallergy();

		echo json_encode($allergies);
		die;
		
	}

	public function action_savesocialhabbits()
	{
		$obj_user	= Auth::instance()->get_user();
		$objPatient 	= new Model_Patient;
		if (!$obj_user)
		   Request::current()->redirect('cuser/login');
		else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'doctor')))){
   		     $objPatient = $objPatient->where('id','=',$_GET['patientId'])->find();
		}
		else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'patient'))))
		     $objPatient = $objPatient->where('repatientsuserid_c','=',$obj_user->id)->find();
		$objPatient ->tobacco_c	= $_GET['tobacco'];
		$objPatient ->alcohol_c	= $_GET['alcohol'];
		$objPatient ->smoking_c	= $_GET['smoking'];
		$objPatient ->diet_c	= $_GET['diet'];
		$objPatient ->exercisepatterns_c = $_GET['exercise'];
		$objPatient ->outdoorsport_c = $_GET['outdoorsports'];
		$objPatient->save();
	}
	
	public function action_saveallergies()
	{
		$obj_user	= Auth::instance()->get_user();
		$objPatient 	= new Model_Patient;
		if (!$obj_user)
		   Request::current()->redirect('cuser/login');
		else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'doctor'))))
		     $objPatient = $objPatient->where('id','=',$_GET['patientId'])->find();
		else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'patient'))))
		     $objPatient	= $objPatient->where('repatientsuserid_c','=',Auth::instance()->get_user())->find();

		$allergies	= explode(',',$_GET["allergies"]);
		$objpatallergy	= new Model_Patientallergy;

		//delete all allergies if exists
		$objpatallergy->where('refpatallergypatientsid_c','=',$objPatient->id);
		foreach($objpatallergy->find_all() as $res){
			$res->delete();
		}

		//save allergy
		foreach( $allergies as $allergy){
			if($allergy != ''){
				$objpatallergy = new Model_Patientallergy;
				$objpatallergy->refpatallergypatientsid_c = $objPatient->id;
				$objpatallergy->refpatallergyid_c= $allergy;
				$objpatallergy->save();
			}
		}
	}
	public function action_addnewfamilydtls()
	{	
		$content= View::factory('vuser/vpatient/familydetailtemplate');
		$userid = $_GET['userid'];
		$patientid = $_GET['patientid'];
		$tablename = $_GET['tablename'];
		$patrelativeid = $_GET['patrelativeid'];
		$viewnm = $_GET['viewnm'];
		$xjqgridname = $_GET['xjqgridname'];
		
		
		
		$patrelative = new Model_Patientrelative;
		$patrelative->where('id','=',$patrelativeid)->find();
		$objrelations = new Model_Relationmaster;
			$objrelations= $objrelations->ORDER_BY ('id', 'asc') ->find_all();
			$relations =array();
			foreach($objrelations as $res)
			{
				$relations[$res->id]=$res->relationname_c;
			}
		
		$val = "edit";
		$content->bind('userid',$userid);
		$content->bind('patientid',$patientid);
		$content->bind('tablename',$tablename);
		$content->bind('patrelativeid',$patrelativeid);
		$content->bind('viewnm',$viewnm);
		$content->bind('xjqgridname',$xjqgridname);
		$content->bind('patrelative',$patrelative);
		$content->bind('relations',$relations);
		$content->bind('operation',$val);
		$this->response->body($content);
	}
	public function action_showfamilydtls()
	{
		$content= View::factory('vuser/vpatient/familydetailtemplate');
		$userid = $this->request->post('userid');
		$patientid = $this->request->post('patientid');
		$tablename = $this->request->post('tablename');
		$xjqgridname = $this->request->post('xjqgridname');
		$patrelativeid = $this->request->post('patrelativeid');
		$viewnm = $this->request->post('viewnm');
		$operation = $this->request->post('operation');
		$relations = $this->request->post('relations');
		$patrelative = $this->request->post('patrelative');
		$content->bind('userid',$userid);
		$content->bind('patientid',$patientid);
		$content->bind('xjqgridname',$xjqgridname);
		$content->bind('tablename',$tablename);
		$content->bind('patrelativeid',$patrelativeid);
		$content->bind('viewnm',$viewnm);
		$content->bind('operation',$operation);
		$content->bind('relations',$relations);
		$content->bind('patrelative',$patrelative);
		$this->response->body($content);
	}
	public function action_showfamilyhistory()
	{
		$content= View::factory('vuser/vpatient/vfamilyhistory');
		
		$userid = $this->request->post('userid');
		$patientid = $this->request->post('patientid');
		$tablename = $this->request->post('tablename');
		$xjqgridname = $this->request->post('xjqgridname');
		$patrelativeid = $this->request->post('patrelativeid');
		$viewnm = $this->request->post('viewnm');
		$operation = $this->request->post('operation');
		$relations = $this->request->post('relations');
		$patrelative = $this->request->post('patrelative');
	
		$content->bind('userid',$userid);
		$content->bind('patientid',$patientid);
		$content->bind('xjqgridname',$xjqgridname);
		$content->bind('tablename',$tablename);
		$content->bind('patrelativeid',$patrelativeid);
		$content->bind('viewnm',$viewnm);
		$content->bind('operation',$operation);
		$content->bind('relations',$relations);
		$content->bind('patrelative',$patrelative);
		
		$this->response->body($content);
	}
	public function action_editfamilymemberdetails()
	{		
		$arraydata = $_GET["arrdata"];
		$patrelativeid = $_GET["patrelativeid"];
		$objpatientrelative = new Model_Patientrelative;
		$objpatientrelative->where('id','=',$patrelativeid)->find();
		
		foreach(json_decode($arraydata) as $item){
			$objpatientrelative->$item[0] =$item[1] ;		
		}
		$result = $objpatientrelative->save();			
	}
	public function action_savepatientrelative()
	{
		$userid = $_GET["userid"];
		$patientid = $_GET["patientid"];
		$arraydata = $_GET["arrdata"];
		$patrelativeid = $_GET["patrelativeid"];
		$objpatientrelative = new Model_Patientrelative;
		
		
		foreach(json_decode($arraydata) as $item){	
				$data[$item[0]] = $item[1];	
				if($item[0]=='refpatrelrelationshipid_c')		
					$col = $item[1];
		}
		$data['refpatrelativepatientid_c']=$patientid;
	
			foreach(json_decode($arraydata) as $item){
				$objpatientrelative->$item[0] =$item[1] ;		
			}
		$objpatientrelative->refpatrelativepatientid_c=$patientid;
			$result = $objpatientrelative->save();
			
		$objtmppatientrelative = new Model_Tmppatientrelative;
		$objtmppatientrelative->find($patrelativeid);
		//var_dump ($objtmppatientrelative);
		$objtmppatientrelative->delete();
		echo $result;
	}
	public function action_savepatientrelativeillness()
	{
		$patientid = $_GET["patientid"];
		$patrelativeid = $_GET["patrelativeid"];
		$tmppatrelid = $_GET["tmppatrelid"];
		$objtmppatrel = new Model_Tmppatientrelativepastillnesses;
		$result= $objtmppatrel->where('refpatrelativepatientid_c','=',$patientid)->where('refpatrelpastillnesspatrelaiveid_c','=',$tmppatrelid)->find_all();
		
		foreach($result as $res)
		{
				$objpatrelativeillness = new Model_Patientrelativepastillnesses;
				 $objpatrelativeillness ->refpatrelpastillnesspatrelaiveid_c = $patrelativeid;
				 $objpatrelativeillness ->refpatrelativepatientid_c = $patientid;
				 $objpatrelativeillness->refpatrelpastillnessdiseaseasid_c = $res->refpatrelpastillnessdiseaseasid_c;
				 $objpatrelativeillness->ageatthattime_c = $res->ageatthattime_c;
				 $objpatrelativeillness->medicationtaken_c = $res->medicationtaken_c;
				 $objpatrelativeillness->diseaseduration_c = $res->diseaseduration_c;
				 $objpatrelativeillness->remark_c = $res->remark_c;
				 $objpatrelativeillness->save();	
			
		}		
		
		$objtmppatrel= ORM::factory('tmppatientrelativepastillnesses')->where('refpatrelativepatientid_c','=',$patientid)->where('refpatrelpastillnesspatrelaiveid_c','=',$tmppatrelid);
		//$objtmppatrel->delete_all();
		
		foreach($objtmppatrel->find_all() as $res)
		{
			$res->delete();
			//echo "deleted";
		}		
		
	}
	public function getarray($object)
	{
		$arr= array();
			foreach($object as $res)
			{
				$arr[$res->id]=$res->Allergyname_c;
			}
		return $arr;
	}

	public function action_getEmrSnapshot(){
	  try{
	    $obj_user = new Model_User;
	    $response = array();

		$user = Auth::instance()->get_user();
		
		if ($user->has('roles', ORM::factory('role', array('name' => 'doctor')))){
			$patient_user_id = $_GET['patient_id'];

			$patient = ORM::factory('patient')->where('repatientsuserid_c','=',$patient_user_id)->find();
			$doctor = ORM::factory('doctor')->where('refdoctorsid_c','=',$user->id)->find();
			$network = ORM::factory('favoritedocterbypatient')->where('reffavdocbypatpatientsid_c','=',$patient->id)->where('reffavdocbypatdoctorsid_c','=',$doctor->id)->find();
			if($network->id != null){
				
			}else{
				echo 'Access denied';die;
			}
		}else{
			$patient_user_id = $user->id;
		}
		$user = $obj_user->get_user_info();

		$response['user_info']=$obj_user->get_healthinfo($patient_user_id);
		
		$obj_roles=new Model_roleuser;
		
		$response['user_role']=$obj_roles->get_userRole($user['id']);
		
	    $obj_patient = new Model_Patient;
	    $patient_id = $obj_patient->get_patient_id($patient_user_id);

	    //get allergies
	    $obj_allergy=new Model_Viewpatientallergie;
	    //$response['allergies'] = $obj_allergy->get_all_allergies($patient_id);
		$response['allergieswithtype'] = $obj_allergy->get_all_allergieswithtype($patient_id);
	    $obj_allergy=new Model_Allergy;
	    $response['allergies'] = $obj_allergy->get_allergies($patient_id);
	  
	    //get past diseases
	    $object_patient_medical = new Model_Patmedicalproblem;
	    $past_diseases_ids = $object_patient_medical->get_past_diseases_ids($patient_id);
	    $object_past_diseases = new Model_Pathistorydisease;
	    $response['past_diseases'] = $object_past_diseases->get_diseases($past_diseases_ids);
	
		//$response['past_diseases_history']=$object_patient_medical->get_past_diseasesinfo($patient_user_id);
	   // $past_diseases_ids = $object_patient_medical->get_past_diseasesinfo($patient_user_id);
		//$response['past_diseases_history']=$object_past_diseases->get_diseases_history($past_diseases_ids);
		$past_diseases=$object_past_diseases->get_all_diseases();
		$response['all_diseases']=$past_diseases;
		$response['past_diseases_history']=$object_patient_medical->get_diseases_history_new($past_diseases,$patient_id);
	    
	    //get major illness
	    $object_past_illness = new Model_Patientillnesses;
//	    $past_illness_ids = $object_past_illness->get_illness_ids($patient_id);
	    $response['past_illness']= $object_past_illness->get_all_illness($patient_id);
//	    $object_disease_master = new Model_Diseasemaster;
//	    $response['past_illness'] = $object_disease_master->get_disease_names($past_illness_ids);

	    //get past surgery
	    $object_surgeries = new Model_Pathistorysurgerydetail;
	    $response['past_surgeries'] = $object_surgeries->get_surgeries($patient_id);

	    //get demographichs
	    $object_address = new Model_Address;
	    $patient_user_info = $obj_user->get_info($patient_user_id);
	    $response['demographics'] = $object_address->get_address($patient_user_info['home_address_id']);

	    //get social habits
	    $response['social_habits'] = $obj_patient->get_patient_info($patient_user_id);

	    //get immunization
	    $obj_immune = new Model_Patientimmunizations;
	    $immune_ids = $obj_immune->get_immunization_ids($patient_id);
	    $obj_imm_master = new Model_Immunizationmaster;
	    $response['immunizations'] = $obj_imm_master->get_immunizations($immune_ids);
	    $response['all_immunizations'] = $obj_imm_master->get_all_immunizations();
  		$response['immunizations_details'] = $obj_immune->get_immunization_details($patient_id,$response['all_immunizations']);
  		
	    //get family history
	    $obj_patient_relative_history = new Model_Patientrelativehistory;
	    $response['family_history'] = $obj_patient_relative_history->get_relative_histories($patient_id);
	    $obj_patient_relative_history = new Model_Relationmaster;
	    $response['all_relations'] = $obj_patient_relative_history->get_all_relations();
	    //get other medical observation
	    $obj_quesanswer=new Model_Pathistoryquestionanswer;
	    $response['ques_answer'] = $obj_quesanswer->get_ques_answers($patient_user_id);
	    
	    
	    	
		$objpatient = new Model_Patient;
		$objpatient=$objpatient->where('repatientsuserid_c','=',$patient_user_id)->mustfind();
		$objPatientRelativeHistory = new Model_Patientrelativehistory;
		$objPatientRelativeHistory = $objPatientRelativeHistory->where('refpatrelhistpatientsid_c','=',$objpatient->id)->find();
		if(!$objPatientRelativeHistory->id)
		{
			$objPatientRelativeHistory = new Model_Patientrelativehistory;
			$objPatientRelativeHistory->refpatrelhistpatientsid_c =$objpatient->id;
			$objPatientRelativeHistory->relationship_c ="Father";
			$objPatientRelativeHistory->save();
			$objPatientRelativeHistory = new Model_Patientrelativehistory;
			$objPatientRelativeHistory->refpatrelhistpatientsid_c =$objpatient->id;
			$objPatientRelativeHistory->relationship_c ="Mother";
			$objPatientRelativeHistory->save();
		}
		$objPatientRelativeHistory = new Model_Patientrelativehistory;
		$objPatientRelativeHistory = $objPatientRelativeHistory->where('refpatrelhistpatientsid_c','=',$objpatient->id)->find_all();
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
		$response['array_relativeFather']= $array_relativeFather;
		$response['array_relationmaster']= $array_relationmaster;
		$response['array_relativeMother']= $array_relativeMother;
		$response['array_relative']= $array_relative;
		$response['patient_id']= $patient_id;
		
	    
    	    header("Cache-Control: no-cache, must-revalidate");
	    echo json_encode($response);die;
	  }catch(Exception $e){}
	}

	public function action_profile(){
		try{
			switch($_SERVER['REQUEST_METHOD']){
				case 'POST':
					if(!( isset($_POST['patient_id']))){
						throw new HTTP_Exception_400;
					}
					
					$patient_user_id = $_POST['patient_id'];
					$user = ORM::factory('user')->where('id','=',$patient_user_id)->find();
					
					if(isset($_POST['gender'])){
						$gender = $_POST['gender'];
						$user->gender_c = $gender;
						$response['gender'] = $user->gender_c;
					}
					if(isset($_POST['age'])){
						$age = $_POST['age'];
						$user->DOB_c = date("Y-m-d",strtotime($age));
						$response['DOB'] = $user->DOB_c;
					}
					$user->save();
					$response['patient_id'] = $user->id;
					echo json_encode($response);
					die;
				default:
					throw new HTTP_Exception_405;
			}
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
	public function action_allergy(){
	  try{
		$object_allergie = new Model_Allergy;		    
	    switch($_SERVER['REQUEST_METHOD']){
        case 'POST' :
          if(!(isset($_POST['allergies']) && isset($_POST['patient_id']))){
            throw new HTTP_Exception_400;
          }
		  $user = Auth::instance()->get_user();
			if ($user->has('roles', ORM::factory('role', array('name' => 'doctor')))){
				$patient_user_id = $_POST['patient_id'];
				$patient = ORM::factory('patient')->where('repatientsuserid_c','=',$patient_user_id)->find();
				$doctor = ORM::factory('doctor')->where('refdoctorsid_c','=',$user->id)->find();
				$network = ORM::factory('favoritedocterbypatient')->where('reffavdocbypatpatientsid_c','=',$patient->id)->where('reffavdocbypatdoctorsid_c','=',$doctor->id)->find();
				if($network->id != null){
					
				}else{
					echo 'Access denied';die;
				}
			}else{
				$patient_user_id = $user->id;
			}
			$_POST['patient_id'] = $patient_user_id;
      	    $obj_patient = new Model_Patient;
		    $patient_id = $obj_patient->get_patient_id($_POST['patient_id']);
			$allergies=json_decode($_POST['allergies']);
			$patallergies=array();
			foreach($allergies as $item){
				array_push($patallergies,$item);
			}
			$past_allergies=array();
			$k=0;
			for($i=0;$i<(count($patallergies)/2);$i++){
				$past_allergies[$i]=array();
				for($j=0;$j<2;$j++){
					array_push($past_allergies[$i],$patallergies[$k++]);	
				}
			}
			for($i=0;$i<(count($patallergies)/2);$i++){
				$allergy=explode(",",$past_allergies[$i][0]);
				foreach($allergy as $item){
					$item = trim($item);
					if($item !=''){
					$allergymaster=new Model_Allergymaster;
						$exist=$allergymaster->check_allergyexist($item);
						if($exist==0){
							$allergytypes=new Model_Allergytype;
							$allergytype=$allergytypes->get_allergytype($past_allergies[$i][1]);
							$allergymaster->Allergyname_c=$item;
							$allergymaster->type_c=$allergytype;
							$allergymaster->active_c=-1;
							$allergymaster->save();
						}
					}					
				}
			}
       		$object_allergie->save_allergy($patient_id, $past_allergies);
 	        $response = array();
 			$response['patient_id']=$patient_id;
 			$response['allergies']=$patallergies;
     	    echo json_encode($response);
          	die;
        case 'GET' :
          if(!(isset($_GET['patient_id']))){
            throw new HTTP_Exception_400;
          }
          $patient_id = $_GET['patient_id'];
          $allergies = $object_allergie->get_allergies($patient_id);
          $response['allergies'] = $allergies;
          echo json_encode($response);die;
        default:
          throw new HTTP_Exception_405;
      }
    }catch(Exception $e){throw new Exception($e);}
}
	public function action_othermedobserv(){
	  try{
	    $obj_quesanswer=new Model_Pathistoryquestionanswer;
	    switch($_SERVER['REQUEST_METHOD']){
        case 'POST' :
          if(!(isset($_POST['othermedobserv']) && isset($_POST['patient_id']))){
            throw new HTTP_Exception_400;
          }
			$user = Auth::instance()->get_user();
			if ($user->has('roles', ORM::factory('role', array('name' => 'doctor')))){
				$patient_user_id = $_POST['patient_id'];
				$patient = ORM::factory('patient')->where('repatientsuserid_c','=',$patient_user_id)->find();
				$doctor = ORM::factory('doctor')->where('refdoctorsid_c','=',$user->id)->find();
				$network = ORM::factory('favoritedocterbypatient')->where('reffavdocbypatpatientsid_c','=',$patient->id)->where('reffavdocbypatdoctorsid_c','=',$doctor->id)->find();
				if($network->id != null){
					
				}else{
					echo 'Access denied';die;
				}
			}else{
				$patient_user_id = $user->id;
			}
			
          	$patient_id = $_POST['patient_id'];
			$othermedobserv=json_decode($_POST['othermedobserv']);
			$questions=ORM::factory('pathistoryquestion')->find_all();
			$quesanswerarray=array();
			foreach($othermedobserv as $item){
				array_push($quesanswerarray,$item);
			}
			$obj_medicalobs=array();
			$k=0;
			for($i=0;$i<count($questions);$i++){
				$obj_medicalobs[$i]=array();
				for($j=0;$j<2;$j++){
					array_push($obj_medicalobs[$i],$quesanswerarray[$k++]);
				}
			}

       		$obj_quesanswer->save_othermedobserv($patient_id, $obj_medicalobs);
 	        $response = array();
 			$response['patient_id']=$patient_id;
 			$response['othermedobserv']=$obj_medicalobs;
     	    echo json_encode($response);
          	die;
        case 'GET' :
          if(!(isset($_GET['patient_id']))){
            throw new HTTP_Exception_400;
          }
          $patient_id = $_GET['patient_id'];
          $allergies = $object_allergie->get_allergies($patient_id);
          $response['allergies'] = $allergies;
          echo json_encode($response);die;
        default:
          throw new HTTP_Exception_405;
      }
    }catch(Exception $e){throw new Exception($e);}
}

	public function action_healthinfo(){
	  try{
	    $obj_user=new Model_User;
	    switch($_SERVER['REQUEST_METHOD']){
        case 'POST' :
          if(!(isset($_POST['healthinfo']) && isset($_POST['patient_id']))){
            throw new HTTP_Exception_400;
          }
			$user = Auth::instance()->get_user();
			if ($user->has('roles', ORM::factory('role', array('name' => 'doctor')))){
				$patient_user_id = $_POST['patient_id'];
				$patient = ORM::factory('patient')->where('repatientsuserid_c','=',$patient_user_id)->find();
				$doctor = ORM::factory('doctor')->where('refdoctorsid_c','=',$user->id)->find();
				$network = ORM::factory('favoritedocterbypatient')->where('reffavdocbypatpatientsid_c','=',$patient->id)->where('reffavdocbypatdoctorsid_c','=',$doctor->id)->find();
				if($network->id != null){
					
				}else{
					echo 'Access denied';die;
				}
			}else{
				$patient_user_id = $user->id;
			}
			
			$healthinfo=json_decode($_POST['healthinfo']);
			$healthinfoarray=array();
			foreach($healthinfo as $item){
				array_push($healthinfoarray,$item);
			}
			$obj_user->save_healthinfo($healthinfoarray,$patient_user_id);
	        $response = array();
 			$response['patient_id']=$patient_user_id;
 			$response['healthinfo']=$healthinfoarray;
     	    echo json_encode($response);
          	die;
        default:
          throw new HTTP_Exception_405;
      }
    }catch(Exception $e){throw new Exception($e);}
}

	public function action_socialhabits(){
	  try{
		$object_socialhabits = new Model_Patient;	
	    
	    switch($_SERVER['REQUEST_METHOD']){
        case 'POST' :
          if(!(isset($_POST['socialhabits']) && isset($_POST['patient_id']))){
            throw new HTTP_Exception_400;
          }
          	$patient_id = $_POST['patient_id'];
			$socialhabits=json_decode($_POST['socialhabits']);
       		$object_socialhabits->save_socialhabits($patient_id, $socialhabits);
 	        $response = array();
 			$response['patient_id']=$patient_id;
 			$response['socialhabits']=$socialhabits;
     	    echo json_encode($response);
          	die;
        case 'GET' :
          if(!(isset($_GET['patient_id']))){
            throw new HTTP_Exception_400;
          }
          $patient_id = $_GET['patient_id'];
          $socialhabits = $object_socialhabits->get_socialhabits($patient_id);
          $response['socialhabits'] = $socialhabits;
          echo json_encode($response);die;
        default:
          throw new HTTP_Exception_405;
      }
    }catch(Exception $e){throw new Exception($e);}
}
	public function action_pastdiseases(){
	  try{
		$object_pastdiseases = new Model_Patmedicalproblem;	
	    
	    switch($_SERVER['REQUEST_METHOD']){
        case 'POST' :
          if(!(isset($_POST['pastdiseases']) && isset($_POST['patient_id']))){
            throw new HTTP_Exception_400;
          }
			
			$user = Auth::instance()->get_user();
			if ($user->has('roles', ORM::factory('role', array('name' => 'doctor')))){
				$patient_user_id = $_POST['patient_id'];
				$patient = ORM::factory('patient')->where('repatientsuserid_c','=',$patient_user_id)->find();
				$doctor = ORM::factory('doctor')->where('refdoctorsid_c','=',$user->id)->find();
				$network = ORM::factory('favoritedocterbypatient')->where('reffavdocbypatpatientsid_c','=',$patient->id)->where('reffavdocbypatdoctorsid_c','=',$doctor->id)->find();
				if($network->id != null){
					
				}else{
					echo 'Access denied';die;
				}
			}else{
				$patient_user_id = $user->id;
			}
			$_POST['patient_id'] = $patient_user_id;
			
      	    $obj_patient = new Model_Patient;
		    $patient_id = $obj_patient->get_patient_id($_POST['patient_id']); // $_POST['patient_id'] is user id from users table
			$pastdiseases=json_decode($_POST['pastdiseases']);
			$diseasesarray=array();	
			foreach($pastdiseases as $var){
				array_push($diseasesarray,$var);
			}
			$patdiseaseshis=array();
			$k=0;
			for($i=0;$i<(count($diseasesarray)/3);$i++){
				$patdiseaseshis[$i]=array();
				for($j=0;$j<3;$j++){
					array_push($patdiseaseshis[$i],$diseasesarray[$k++]);	
				}
			}
       		$object_pastdiseases->save_pastdiseases($patient_id, $patdiseaseshis);
 	        $final_text='';
 	        foreach($patdiseaseshis as $item){
 	        	if($item[0]=='Yes'){
 	        		$obj_disease=ORM::factory('pathistorydisease')->where('id','=',$item[2])->find();
 	        		if($obj_disease->id){
 	        			if($obj_disease->disease_c=='Others'){
 	        				$str=$item[1].', ';
							$final_text=$final_text.$str;							 
 	        			}
 	        			else{
 	        				$str=$obj_disease->disease_c.', ';
							$final_text=$final_text.$str;							 
						}	        	
 	        		}
 	        	}
 	        }
 	        $response = array();
 			$response['pastdiseases']=$final_text;
     	    echo json_encode($response);
          	die;
        default:
          throw new HTTP_Exception_405;
      }
    }catch(Exception $e){throw new Exception($e);}
}
public function action_immunizationdates(){

$user = Auth::instance()->get_user();
			if ($user->has('roles', ORM::factory('role', array('name' => 'doctor')))){
				$patient_user_id = $_GET['patient_id'];
				$patient = ORM::factory('patient')->where('repatientsuserid_c','=',$patient_user_id)->find();
				$doctor = ORM::factory('doctor')->where('refdoctorsid_c','=',$user->id)->find();
				$network = ORM::factory('favoritedocterbypatient')->where('reffavdocbypatpatientsid_c','=',$patient->id)->where('reffavdocbypatdoctorsid_c','=',$doctor->id)->find();
				if($network->id != null){
					
				}else{
					echo 'Access denied';die;
				}
			}else{
				$patient_user_id = $user->id;
			}
			$_GET['patient_id'] = $patient_user_id;
			
          	$patient_user_id = $_GET['patient_id'];
    	    $obj_patient = new Model_Patient;
		    $patient_id = $obj_patient->get_patient_id($patient_user_id);
			$object_immunizationdates = ORM::factory('patientimmunizations')->where('refpatimmpatientsid_c','=',$patient_id)->find_all()->as_array();
			$result= array();
			foreach($object_immunizationdates as $object_immunizationdate)
			{
				// Date formatted in dd Mon YYYY format for display
				// If date is null then do not create date object
				if ($object_immunizationdate->datewhentaken_c != null)
					$temp[$object_immunizationdate->refpatimmunizationid_c]=date_format(date_create($object_immunizationdate->datewhentaken_c),"d M Y");
				//array_push($result,$temp);
			}
			if(isset($temp))
			{
			echo(json_encode($temp));
			}
			die;
			
}
public function action_saveimmunization(){
try{
	    $immunizationdate=strtotime($_POST['immunization']);
	    $immunizationdate=date('Y-m-d',$immunizationdate);
		
	    $patient_user_id=$_POST['patient_id'];
		$immunizationarray=json_decode($_POST['immunizationarray']);
		//var_dump($patient_user_id); die;
	    switch($_SERVER['REQUEST_METHOD']){
        case 'POST' :
          if(!(isset($_POST['immunization']) && isset($_POST['patient_id']))){
            throw new HTTP_Exception_400;
          }
          	$patient_user_id = $_POST['patient_id'];
    	    $obj_patient = new Model_Patient;
		    $patient_id = $obj_patient->get_patient_id($patient_user_id);
			$immunizationrecord=ORM::factory('patientimmunizations')->where('refpatimmpatientsid_c','=',$patient_id)->where('refpatimmunizationid_c',"=",$immunizationarray[0])->find();
			if($immunizationrecord->id != null)
			{
				$immunizationrecord->datewhentaken_c=$immunizationdate;
				$immunizationrecord->refpatimmunizationid_c=$immunizationarray[0];
				$immunizationrecord->refpatimmpatientsid_c=$patient_id;
				$immunizationrecord->status_c="2";
				$immunizationrecord->save();
			}
			else
			{
				$object_immunization = new Model_Patientimmunizations;	
				$object_immunization->datewhentaken_c=$immunizationdate;
				$object_immunization->refpatimmunizationid_c=$immunizationarray[0];
				$object_immunization->refpatimmpatientsid_c=$patient_id;
				$object_immunization->status_c="2";
				$object_immunization->save();			
			}	
			die;
      }
    }catch(Exception $e){throw new Exception($e);}

}
public function action_deleteimmunization(){
try{
	    switch($_SERVER['REQUEST_METHOD']){
        case 'POST' :
			if(!(isset($_POST['immunizationarray']) && isset($_POST['patient_id']))){
				throw new HTTP_Exception_400;
			}
			$patient_user_id=$_POST['patient_id'];
			$immunizationarray=json_decode($_POST['immunizationarray']);
          	$patient_user_id = $_POST['patient_id'];
    	    $obj_patient = new Model_Patient;
		    $patient_id = $obj_patient->get_patient_id($patient_user_id);
			$immunizationrecord=ORM::factory('patientimmunizations')
							->where('refpatimmpatientsid_c','=',$patient_id)
							->where('refpatimmunizationid_c',"=",$immunizationarray[0])->find();
			if($immunizationrecord)
			{
				$immunizationrecord->delete();
			}
			die ("Success");
		}
    }catch(Exception $e){throw new Exception($e);}
}
	public function action_immunization(){
	  try{
		$object_immunization = new Model_Patientimmunizations;	
	    
	    switch($_SERVER['REQUEST_METHOD']){
        case 'POST' :
          if(!(isset($_POST['immunization']) && isset($_POST['patient_id']))){
            throw new HTTP_Exception_400;
          }
			$user = Auth::instance()->get_user();
			if ($user->has('roles', ORM::factory('role', array('name' => 'doctor')))){
				$patient_user_id = $_POST['patient_id'];
				$patient = ORM::factory('patient')->where('repatientsuserid_c','=',$patient_user_id)->find();
				$doctor = ORM::factory('doctor')->where('refdoctorsid_c','=',$user->id)->find();
				$network = ORM::factory('favoritedocterbypatient')->where('reffavdocbypatpatientsid_c','=',$patient->id)->where('reffavdocbypatdoctorsid_c','=',$doctor->id)->find();
				if($network->id != null){
					
				}else{
					echo 'Access denied';die;
				}
			}else{
				$patient_user_id = $user->id;
			}
			$_POST['patient_id'] = $patient_user_id;
			
          	$patient_user_id = $_POST['patient_id'];
    	    $obj_patient = new Model_Patient;
		    $patient_id = $obj_patient->get_patient_id($patient_user_id);
			$immunization=json_decode($_POST['immunization']);
			$immunizationarray=array();	
			foreach($immunization as $var){
				array_push($immunizationarray,$var);
			}
			$patimmunization=array();
			$k=0;
			for($i=0;$i<(count($immunizationarray)/3);$i++){
				$patimmunization[$i]=array();
				for($j=0;$j<3;$j++){
					array_push($patimmunization[$i],$immunizationarray[$k++]);	
				}
			}
       		$object_immunization->save_immunization($patient_id, $patimmunization);
 	        $final_text='';
 	        foreach($patimmunization as $item){
 	        	if($item[0]=='Yes'){
 	        		$obj_immunization=ORM::factory('immunizationmaster')->where('id','=',$item[2])->find();
 	        		if($obj_immunization->id){
 	        				$str=$obj_immunization->Immunizationname_c.', ';
							$final_text=$final_text.$str; 
 	        		}
 	        	}
 	        }
 	        $response = array();
 			$response['immunization']=$final_text;
 			
     	    echo json_encode($response);
          	die;
        default:
          throw new HTTP_Exception_405;
      }
    }catch(Exception $e){throw new Exception($e);}
}
	
	public function action_risk(){
	  try{
	    $object_user = new Model_User;
	    $user = $object_user->get_user_info();
	    $risk_object = new Model_Patientriskfactor();
	    
	    switch($_SERVER['REQUEST_METHOD']){
        case 'GET':
			$user = Auth::instance()->get_user();
			if ($user->has('roles', ORM::factory('role', array('name' => 'doctor')))){
				 $patient_user_id = $_GET['patient_id'];
			}else{
				$patient_user_id = $user->id;
			}
          if(!(isset($_GET['patient_id']))){
            throw new HTTP_Exception_400;
          }
          $risks = $risk_object->get_risks($patient_user_id);
          $response['risks'] = $risks;
	  header("Cache-Control: no-cache, must-revalidate");
          echo json_encode($response);die;

        case 'DELETE':
          $DELETE = Request::current()->query();
          if(!(isset($DELETE['id']))){
            throw new HTTP_Exception_400;
          }
          $risk_id = $DELETE['id'];
          $risk_object->delete_risk($risk_id, $user['id']);
          die;

        case 'POST':
          if(!(isset($_POST['risk_text']) && isset($_POST['patient_id']))){
            throw new HTTP_Exception_400;
          }
          $patient_user_id = $_POST['patient_id'];
          $object_doctor = new Model_Doctor;
          $doctor_id = $object_doctor->get_doctor_id($user['id']);
          $object_patient = new Model_Patient();
          $patient_id = $object_patient->get_patient_id($patient_user_id);
          $fav_doc_object = new Model_Favoritedocterbypatient;
          $is_fav = $fav_doc_object->check_if_fav($patient_id, $doctor_id);
          if(!($is_fav)){
            throw new HTTP_Exception_401;
          }
          if(isset($_POST['risk_id'])){
            $risk_id = $_POST['risk_id'];
          }
          else{
            $risk_id = null;
          }
          $id = $risk_object->save_risk($patient_user_id, $user['id'], $_POST['risk_text'], $risk_id);
          $response = array();
          $response['risk_id'] = $id;
          $response['writer_id'] = $user['id'];
          echo json_encode($response);
          die;

        default:
          throw new HTTP_Exception_405;
      }
    }catch(Exception $e){throw new Exception($e);}
	}

	public function action_appointments(){
	  try{
    	$object_user = new Model_User;
    	$user = $object_user->get_user_info();
    	switch($_SERVER['REQUEST_METHOD']){
        case 'GET':
          if((isset($_GET['patient_id']))){
            $patient_user_id = $_GET['patient_id'];
          }
		  else
		  {
          $patient_user_id = Auth::instance()->get_user()->id;
          }
		  $appointment_object = new Model_Patientappointments;
          $appointments = $appointment_object->get_past_appointments($patient_user_id);
          echo json_encode($appointments);die;

        default:
          throw new HTTP_Exception_405;
        }
      }catch(Exception $e){throw new Exception($e);}
	}

	public function action_reports(){
	  try{
    	$object_user = new Model_User;
    	$user = $object_user->get_user_info();
    	switch($_SERVER['REQUEST_METHOD']){
        case 'GET':
          if(!(isset($_GET['patient_id']))){
            throw new HTTP_Exception_400;
          }
          $puserid = $_GET['patient_id'];
	  $status = "'reportsuploaded','reportscollected'";
	  $ip_data = array();
	  $ip_data['puserid'] = $puserid;
	  $ip_data['status'] = $status;
	  $data_source_obj = new helper_datagenerator();
	  $final_data = $data_source_obj->executeQuery($ip_data, "diagnosticorders");
          echo json_encode($final_data);die;

        default:
          throw new HTTP_Exception_405;
        }
      }catch(Exception $e){throw new Exception($e);}
	}

  public function action_appointmentSummary(){
  	try{
      $object_user = new Model_User;
      $user = $object_user->get_user_info();
      switch($_SERVER['REQUEST_METHOD']){
        case 'GET':
          if(!(isset($_GET['app_id']))){
            throw new HTTP_Exception_400;
          }
          $app_id = $_GET['app_id'];
          $upload_object = new Model_Appointmentupload;
          $file_name = $upload_object->get_summary($app_id);
	  if(!file_exists($file_name)){
	    $datestring = htmlspecialchars(date ("dmYHis"), ENT_QUOTES);
	    $pdfCreaterObj = new Cpdfcreater;
	    $file_name = $pdfCreaterObj->createpdf($app_id, $datestring);
	  }
          $response['file_name'] = $file_name;
          echo json_encode($response);die;

        default:
          throw new HTTP_Exception_405;
      }
    }catch(Exception $e){throw new Exception($e);}
  }
}

	
 // End Welcome
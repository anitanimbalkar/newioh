<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cpatientpastillness extends Controller_Ctemplatewithmenu{

	public function action_patientpastillness()
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

	private function getContent($objUser, $objPatient){
		$content = View::factory('vuser/vpatient/vpatientpastillness');	
		$objpatient = new Model_Patient;
		$objpatient->where('repatientsuserid_c','=',$objPatient->id)->find();
		$all_diseases = ORM::factory('pathistorydisease')->order_by('sequence_c')->find_all()->as_array();

		$patDiseases = ORM::factory('patmedicalproblem')->where('ref_patientid_c','=', $objPatient->id)->find_all()->as_array();
		$patdiseasemap = array();
		foreach($patDiseases as $patdisease){
		  $patdiseasemap[$patdisease->disease_c] = $patdisease;	
		}

		$array_disease = array();
		$array_remark = array();
		$array_status = array();

		foreach($all_diseases as $disease){
		  array_push($array_disease, $disease->disease_c);
		  if(isset($patdiseasemap[$disease->id])){
		    array_push($array_remark, $patdiseasemap[$disease->id]->remark_c);
		    array_push($array_status, $patdiseasemap[$disease->id]->status_c);
		  }
		  else{
		    array_push($array_remark, "");
		    array_push($array_status, 0);
		  }
		}
		$objquestion = ORM::factory('pathistoryquestion')->find_all()->as_array();
		$result = $objquestion;
		$array_question=array();
		foreach($result as $res){
			if(! empty($res->question_c))
			array_push($array_question, $res->question_c);
		}
		
		$objanswer = ORM::factory('pathistoryquestionanswer')->where('ref_patientid_c','=',$objPatient->id)->find_all()->as_array();
		$array_answer=array();
		$dbset=0;
		$noofques=0;
		foreach($objanswer as $res){
			if(! empty($res->ref_questionid_c)){
			array_push($array_answer, $res->answer_c);
			$dbset=1;
			$noofques++;
			}
			
		}
		if($dbset==0){
			foreach($array_question as $dis){
				array_push($array_answer, "");
			}
		}
		$len=count($array_answer);
		
		if(($dbset==1) and (count($array_question)>$noofques)){
		   for($y=1;$y<=(count($array_question)-$noofques);$y++){
			   $array_answer[$len]="";
			   $len++;
		   }
		}
		$content->bind('user', $objUser);		
		$content->bind('objpatient', $objPatient);
		$content->bind('array_disease', $array_disease);
		$content->bind('array_question', $array_question);
		$content->bind('array_answer', $array_answer);
		$content->bind('array_remark', $array_remark);
		$content->bind('array_status', $array_status);	
		return($content);
	}	
	public function action_savebasics()
	{
	
		$userid = $_GET["userid"];
		$i=1;
		$status=array();
		$remark=array();
		$disease=array();
		$objUser=ORM::factory('user')
			->where('id','=',$userid)->find();
		if(isset($_GET["bloodgroup"]))
			$objUser->bloodgroup_c = $_GET["bloodgroup"];
		if(isset($_GET["handicap"]))
		{
			$objUser ->handicap_c 			= $_GET["handicap"];
			$objUser ->handicapby_c 		= $_GET["handicapby"];
		}
		else
		{
			echo "here";
			$objUser ->handicap_c 			= NULL;
			$objUser ->handicapby_c 		= NULL;
		}
		$objUser->save();
		$objdisease = ORM::factory('pathistorydisease')
				->find_all()
				->as_array();
					
		foreach($objdisease as $dis)
		{
			$status[$i]=$_GET["status".$i];
			$remark[$i]=$_GET["remark".$i];
			$disease[$i]=$_GET["disease".$i];
			$i++;
		}
		
		$objprevdis=ORM::factory('patmedicalproblem')
			->where('ref_patientid_c','=',$userid)
			->find_all();
		
		foreach($objprevdis as $prev)
		{
			$objOrm=ORM::factory('patmedicalproblem')->where('ref_patientid_c','=',$userid);
			foreach ($objOrm->find_all() as $orm)
			{
				$orm->delete();
			}
		}
		
		$i=1;
		foreach($objdisease as $dis)
		{
			$objdiseaseid = ORM::factory('pathistorydisease')
					->where('disease_c','=',$disease[$i] )
					->find();
								
			$objpat = ORM::factory('patmedicalproblem');
			$objpat->ref_patientid_c=$userid ;
			$objpat->disease_c=$objdiseaseid ->id;
			$objpat->status_c=$status[$i] ;
			$objpat->remark_c=$remark[$i]; 
			$objpat->save();
			$i++;
		}
		die();
	}
	
	
	public function action_savebasicsquest()
	{
	$userid = $_GET["userid"];

	$objques=ORM::factory('pathistoryquestion')
			->find_all();
	$i=1;
	foreach($objques as $prev)
		{
			$answer[$i]=$_GET["answer".$i];
			$questid[$i]=$_GET["questid".$i];
			$i++;
		}
	
	$objprevans=ORM::factory('pathistoryquestionanswer')
					->where('ref_patientid_c','=',$userid)
					->find_all();
		
	foreach($objprevans as $prev)
		{
			$objOrm=ORM::factory('pathistoryquestionanswer')->where('ref_patientid_c','=',$userid);
			foreach ($objOrm->find_all() as $orm)
			{
				$orm->delete();
			}
		}
	$i=1;
	foreach($objques as $prev)
	{
	$objans = ORM::factory('pathistoryquestionanswer');
	$objans->ref_patientid_c=$userid ;
	$objans->ref_questionid_c=$questid[$i] ;
	$objans->answer_c=$answer[$i] ;
    $objans->save();
	$i++;
	}
	
	die();
	
}
	public function action_savesurgery()
	{
        $strIds=$_GET['ids'];
		$patrefid=$_GET['patid'];
		$columns=$_GET['columns'];
		$ids = json_decode($strIds);
		$objPat=ORM::factory('patient')
					->where('repatientsuserid_c','=',$patrefid)
					->find();
		$patid=$objPat->id;
		
		
		//Deleting previouss illness record
		$objprev=ORM::factory('pathistorysurgerydetail')
					->where('patientid_c','=',$patid)
					->find_all();
		foreach($objprev as $prev)
		{
			$objOrm=ORM::factory('pathistorysurgerydetail')->where('patientid_c','=',$patid);
			foreach ($objOrm->find_all() as $orm)
			{
				$orm->delete();
			}
		}
		
		

		//Adding the new record
		for($i=0; $i< count($ids); $i=$i+3)
		{$x=trim($ids[$i][0]);
	         if(!empty($x)){
				$objillnesssave	= ORM::factory('pathistorysurgerydetail');
				$objillnesssave->patientid_c	= $patid;
				$objillnesssave->surgeryname_c	= $ids[$i][0];
				$objillnesssave->surgerydate_c	= $ids[$i+1][0];
				$objillnesssave->surgerydescription_c=$ids[$i+2][0];
				$objillnesssave->save();
				}	
		}
		die();
		}
	public function action_saveillness()
	{
        $strIds		= $_GET['ids'];
		$patrefid	= $_GET['patid'];
		$columns	= $_GET['columns'];
		$ids = json_decode($strIds);
		$objPat = ORM::factory('patient')
					->where('repatientsuserid_c','=',$patrefid)
					->find();
		$patid = $objPat->id;

		//Deleting previouss illness record
		$objprev=ORM::factory('patientillnesses')
					->where('refpatdiseasepatientsid_c','=',$patid)
					->find_all();
		foreach($objprev as $prev)
		{
			$objOrm=ORM::factory('patientillnesses')->where('refpatdiseasepatientsid_c','=',$patid);
			foreach ($objOrm->find_all() as $orm)
			{
				$orm->delete();
			}
		}

		//Adding the new record
		for($i=0; $i< count($ids); $i=$i+3)
		{
	         if(($ids[$i][1]!=-1) or ($ids[$i][0]!="")){
				if($ids[$i][1] == -1){
					$objDisease	= ORM::factory('diseasemaster');
					$objDisease->diseasename_c	= $ids[$i][0];
					$objDisease->save();
					$ids[$i][1] = $objDisease->id;
				}
				$objillnesssave	= ORM::factory('patientillnesses');
				$objillnesssave->refpatdiseasepatientsid_c	= $patid;
				$objillnesssave->refpatdiseasedieseasid_c	= $ids[$i][1];
				$objillnesssave->from_c	= $ids[$i+1][0];
				$objillnesssave->medicationtaken_c=$ids[$i+2][0];
				$objillnesssave->save();
			}	
		}
		die();
	}
	public function action_getpastdata()
	{
	$patid=$_GET["patid"];
	$objpatient = new Model_Patient;
	$objpatient->where('repatientsuserid_c','=',$patid)->find();

	$objpatill = ORM::factory('patientillnesses')
						->where('refpatdiseasepatientsid_c','=',$objpatient->id)
						->find_all()
						->as_array();
	$result = $objpatill;
	$array_pastillness=array();
	foreach($result as $res)
		{
			
			$ar_res = array();
			$ar_res['0'] = ORM::factory('diseasemaster')->where('id','=',$res->refpatdiseasedieseasid_c)->find()->diseasename_c;
			$ar_res['1'] =$res->refpatdiseasedieseasid_c;
			$ar_res['2'] = $res->from_c;
			$ar_res['3'] = NULL;
			$ar_res['4'] = $res->medicationtaken_c;
			$ar_res['5'] = NULL;
		
			array_push($array_pastillness,$ar_res);
		}
		
		
		
			$objpatsurgery= ORM::factory('pathistorysurgerydetail')
						->where('patientid_c','=',$objpatient->id)
						->find_all()
						->as_array();
	$result = $objpatsurgery;
	$array_pastsurgery=array();
	foreach($result as $res)
		{
			
			$surgery = array();
			$surgery['0'] =$res->surgeryname_c;
			$surgery['1'] =NULL;
			$surgery['2'] = $res->surgerydate_c;
			$surgery['3'] = NULL;
			$surgery['4'] = $res->surgerydescription_c;
			$surgery['5'] = NULL;
		
			array_push($array_pastsurgery,$surgery);
		}
	
	
$abc=array();
		$abc['pastillness'] = $array_pastillness;
		$abc['pastsurgery'] = $array_pastsurgery;
		$pastdata = json_encode($abc);
		die($pastdata);

	
	}
} // End Welcome

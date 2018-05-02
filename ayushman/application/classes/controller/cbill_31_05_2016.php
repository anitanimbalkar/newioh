<?php defined('SYSPATH') or die('No direct script access.');
include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');
//include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/rcpttransaction.php');

include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/export.php');

class Controller_Cbill extends Controller_Ctemplatewithmenu  {

	public function action_generate(){		
		try{
			$obj_user = Auth::instance()->get_user();
			$appid=$_GET["id"];
			
			$objApp= ORM::factory('appointment')->where('id','=',$appid)->find();
			$doctorid=$objApp->refappwithid_c;
			$toaccount=ORM::factory('doctor')->where('id', '=', $doctorid)->find()->refdoctorsid_c;
			
			/*$obj_alternatebill =  ORM::factory('alternatebill')->where("refiohid","=",$toaccount )->find();
			
			if($obj_alternatebill->refiohid)
			{
			$content = View::factory('vuser/vdoctor/vbill');
			}
			else
			{
			$content = View::factory('vuser/vdoctor/vbill2');
			}*/
			$content = View::factory('vuser/vdoctor/vbill');
			$totalamt=0;
			//$diagnosis=null;
			$transactionid=$objApp->reftransactionid_c;
			if($transactionid != null)
			{
				$objStatements	= ORM::factory('billingstatement')->where('statementcode_c','=',$transactionid)->find();
				$totalamt=  intval($objStatements->ammount_c);
				$diagnosis=$objStatements->reftransactiontype_c;
				$bill = ORM::factory('bill')->where('statementcode_c','=',$transactionid)->find();
				$newBillId = $bill->billid_c;
			
			}else{
				 $newBillId = transaction::getLatestBillId($toaccount);
			}
			$search_doctor_object = ORM::factory('searchdoctors')->where('doctorid', '=', $doctorid)->find();
			
			$edit = $_GET["edit"];
			$response =$this->getdetails($appid);
			$urole = "patient";
			$breadcrumb = "Home>>";
			$userid = $obj_user->id;
			$username = $obj_user->Firstname_c;
			$content->bind('userid', $userid);
			$content->bind('username', $username);
			$content->bind('details', $response);
			$content->bind('newBillId', $newBillId);
			$content->bind('appid', $appid);
			$content->bind('totalamt', $totalamt);
			$content->bind('diagnosis',$diagnosis);
			$content->bind('edit',$edit);
			$content->bind('search_doctor_object', $search_doctor_object);
			//var_dump($content);
			$this->template->breadcrumb = $breadcrumb;
			$this->template->content = $content;
			$this->template->user = $obj_user->Firstname_c;
			$this->template->urole = $urole;
		}catch(Exception $e){throw new Exception($e);}
	}

	public function action_save(){
	
		if($_POST)
		{
			try{
				$objApp = new Model_Appointment;
				$objApp->where('id','=',$_POST['appid'])->find();
				$objApp->charges_ecg_c 		= $_POST['ecgfees'];
				$objApp->charges_bandage_c	= $_POST['bandagefees'];
				$objApp->charges_xray_c		= $_POST['xrayfees'];
				$objApp->charges_others_c	= $_POST['others'];
				$objApp->save();
				$data = array();
				$data['type'] ="done";
				$data['message'] = 'Bill saved successfully';
				die(json_encode($data));
			}catch(Exception $e){
				$data = array();
				$data['type'] ="error";
				$data['message'] = 'Exception Message: '.$e->getMessage().'<br/><br/> Please report this as a bug.';
				die(json_encode($data));
			}
		}
	}
	public function action_getbills()
	{
		$user = Auth::instance()->get_user();
		$whereclause = '[foruserid,=,'.$user->id.']';
		
		$columns = 'AccountCode,PaidBy,TransactionId,Reason,Amount,cashpaymentflag,Date';
		//echo $columns;
		//$whereclause = $_GET["whereclause"];
		$groupby = "";
		
		$page = "1"; 
        	$limit = "15"; 
		$sidx = "TransactionId"; 
		$sord = 'asc'; 	
		
			$table = 'exportbill';
			
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
					
					array_push($response,$temp);
					
				}
				$i++;
			}
			
			echo(json_encode($response));die;
	
	
		
	}
	public function action_saveReceipt()
	{
		try
		{
			$docid = $_GET['docId'];
			$patid = $_GET['patId'];
			$amount = $_GET['amount'];
			rcpttransaction::saveRcpt($patid,$docid,$amount);
		}
		catch(Exception $e){
			$data = array();
			$data['type'] ="error";
			$data['message'] = 'Exception Message: '.$e->getMessage().'<br/><br/> Please report this as a bug.';
			die(json_encode($data));
		}
	}
	
	public function action_savehospBill()
	{
		try
		{
			if (isset($_GET['patId']))
			{
				$fromuserid = $_GET['patId'];
			}
			if (isset($_GET['amount']))
			{
				$amount = $_GET['amount'];
			}
			if (isset($_GET['caseno']))
			{
				$caseno = $_GET['caseno'];
			}
			if (isset($_GET['billid']))
			{
				$billid= $_GET['billid'];
			}
			if (isset($_GET['other1']))
			{
				$other1=$_GET['other1'];
			}
			if (isset($_GET['other2']))
			{
				$other2=$_GET['other2'];
			}
			if (isset($_GET['other3']))
			{
				$other3=$_GET['other3'];
			}
			if (isset($_GET['value1']))
			{
				$value1=$_GET['value1'];
			}
			if (isset($_GET['value2']))
			{
				$value2=$_GET['value2'];
			}
			if (isset($_GET['value3']))
			{
				$value3=$_GET['value3'];
			}
			if (isset($_GET['hospitalid']))
			{
				$touserid=$_GET['hospitalid'];
			}

			//$touserid = -5;
			
			$paymentmode=1;
			$toaccountCode = ORM::factory('billingaccount')->where('refaccountuserid_c','=',$touserid)->find()->accountcode_c;
			$fromaccountCode = ORM::factory('billingaccount')->where('refaccountuserid_c','=',$fromuserid)->find()->accountcode_c;
			
			//$billid = transaction::getLatestBillId($touserid);
			$result=transaction::saveBill($fromaccountCode,$toaccountCode,$paymentmode, $amount,'Bill',$billid,null,$caseno);		
			$objBill	= ORM::factory('bill')->where('statementcode_c','=',$result['data']['code'])->find();
			var_dump($result['data']['code']);
			$objBill->otherlabel1_c    = $other1;
			$objBill->otherlabel2_c    = $other2;
			$objBill->otherlabel3_c    = $other3;
			$objBill->hospvalue1_c  	   = $value1;
			$objBill->hospvalue2_c   	   = $value2;
			$objBill->hospvalue3_c  	   = $value3;
			$objBill->save();
		}
		
		catch(Exception $e)	
		{
			$data = array();
			$data['type'] ="error";
			$data['message'] = 'Exception Message: '.$e->getMessage().'<br/><br/> Please report this as a bug.';
			die(json_encode($data));
		}
	}

	public function action_save2()
	{
		if($_POST){
			
				try
				{
					$objApp = new Model_Appointment;
					$objApp->where('id','=',$_POST['appid'])->find();
					$amount=$_POST['totalamt'];
					$diagnosis=$_POST['diagnosis'];
					$billid=$_POST['billid'];
					$paymentmode=1;
					$doctorid=$objApp->refappwithid_c;
					$toaccount=ORM::factory('doctor')->where('id', '=', $doctorid)->find()->refdoctorsid_c;
					$fromaccount=$objApp->refappfromid_c;
					$fromaccountCode = ORM::factory('billingaccount')->where('refaccountuserid_c','=',$fromaccount)->find()->accountcode_c;
					if($fromaccountCode == null){
						transaction::createaccount($fromaccount);
						$fromaccountCode = ORM::factory('billingaccount')->where('refaccountuserid_c','=',$fromaccount)->find()->accountcode_c;
					}
					
					//var_dump('patient account');
					//var_dump($fromaccountCode);
					//var_dump(ORM::factory('billingaccount')->where('refaccountuserid_c','=',$toaccount)->find()->accountcode_c);
					$result=transaction::saveBill($fromaccountCode, ORM::factory('billingaccount')->where('refaccountuserid_c','=',$toaccount)->find()->accountcode_c, $paymentmode, $amount,$diagnosis,$billid,$objApp->reftransactionid_c);
					$objApp->reftransactionid_c=$result['data']['code'];
					$objApp->save();
					if($_POST['extrabillfields']==true){
						$objBill	= ORM::factory('bill')->where('statementcode_c','=',$result['data']['code'])->find();
						if(isset($_POST['charge_injection'])){
							$objBill->charge_injection = $_POST['charge_injection'];
						}
						if(isset($_POST['charge_dressing'])){
							$objBill->charge_dressing = $_POST['charge_dressing'];	
						}
						if(isset($_POST['charge_labtest'])){
							$objBill->charge_labtest = $_POST['charge_labtest'];	
						}
						if(isset($_POST['charge_reconsultation'])){
							$objBill->charge_reconsultation = $_POST['charge_reconsultation'];	
						}
						
						if(isset($_POST['charge_ecg'])){
							$objBill->charge_ecg = $_POST['charge_ecg'];
						}
						if(isset($_POST['charge_visit'])){
							$objBill->charge_visit = $_POST['charge_visit'];
						}
						if(isset($_POST['charge_misc'])){
							$objBill->charge_misc = $_POST['charge_misc'];
						}
						if(isset($_POST['patrelative'])){
							$objBill->patrelative = $_POST['patrelative'];
						}
						if(isset($_POST['treatmentfrom'])){
							$objBill->treatmentfrom = $_POST['treatmentfrom'];
						}
						if(isset($_POST['treatmentto'])){
							$objBill->treatmentto = $_POST['treatmentto'];
						}
						
						// dental bill
						if(isset($_POST['charge_silverfilling'])){
							$objBill->charge_silverfilling = $_POST['charge_silverfilling'];
						}
						if(isset($_POST['charge_compositefilling'])){
							$objBill->charge_compositefilling = $_POST['charge_compositefilling'];
						}
						if(isset($_POST['charge_rootcanal'])){
							$objBill->charge_rootcanal = $_POST['charge_rootcanal'];
						}
						if(isset($_POST['charge_periodental'])){
							$objBill->charge_periodental = $_POST['charge_periodental'];
						}
						if(isset($_POST['charge_oralsurgery'])){
							$objBill->charge_oralsurgery = $_POST['charge_oralsurgery'];
						}
						if(isset($_POST['charge_orthodentic'])){
							$objBill->charge_orthodentic = $_POST['charge_orthodentic'];
						}
						if(isset($_POST['charge_metalcapping'])){
							$objBill->charge_metalcapping = $_POST['charge_metalcapping'];
						}
						if(isset($_POST['charge_ceramiccrown'])){
							$objBill->charge_ceramiccrown = $_POST['charge_ceramiccrown'];
						}
						if(isset($_POST['charge_ceramicbridge'])){
							$objBill->charge_ceramicbridge = $_POST['charge_ceramicbridge'];
						}
						if(isset($_POST['charge_metalbridge'])){
							$objBill->charge_metalbridge = $_POST['charge_metalbridge'];
						}
					
						$objBill->save();
					}
					$data = array();
					
					$data['type'] ="done";
					$data['message'] = 'Bill saved successfully';
				die(json_encode($data));
				}catch(Exception $e){
				$data = array();
				$data['type'] ="error";
				$data['message'] = 'Exception Message: '.$e->getMessage().'<br/><br/> Please report this as a bug.';
				die(json_encode($data));
			}				
			}
	}
	public function action_changestatus(){
		try{
			$objApp = new Model_Appointment;
			$objApp->where('id','=',$_GET['appid'])->find();		
			$objApp->charges_ecg_c 		= $_GET['ecgfees'];
			$objApp->charges_bandage_c	= $_GET['bandagefees'];
			$objApp->charges_xray_c		= $_GET['xrayfees'];
			$objApp->charges_others_c	= $_GET['others'];
			$objApp->paid_c				= 1;
			$objApp->save();
			$data = array();
			$data['type'] ="done";
			$data['message'] = 'Bill saved successfully';
			die(json_encode($data));
		}catch(Exception $e){
			$data = array();
			$data['type'] ="error";
			$data['message'] = 'Exception Message: '.$e->getMessage().'<br/><br/> Please report this as a bug.';
			die(json_encode($data));
		}
	}
	public function getdetails($appid){
		$objApp = new Model_Appointment;
		$objApp->where('id','=',$appid)->find();
		$data['lblrate']		= $objApp->rate_c;
		$data['lblmode']		= 'Payment mode : '.$objApp->paymentmode_c;
		$data['mode'] 			= $objApp->paymentmode_c;
		$data['ecgfees'] 		= $objApp->charges_ecg_c;
		$data['bandagefees'] 	= $objApp->charges_bandage_c;
		$data['xrayfees'] 		= $objApp->charges_xray_c;
		$data['others'] 		= $objApp->charges_others_c;		
		$data['paid'] 			= $objApp->paid_c;
		$data['lbldate']		= $objApp->scheduledendtime_c;
		$data['consultationtype']		= $objApp->consultationtype_c;
		$data['lbldate']		= date('d M Y h:i A', time());
		
		$objdoctors = ORM::factory('Doctor')->where("id","=",$objApp->refappwithid_c )->find();
		$data["lblregdnumber"] = $objdoctors->RMPnumber_c;
		$data["lblnumber"] = $appid;
		$objusers =  ORM::factory('User')->where("id","=",$objdoctors->refdoctorsid_c )->find();
		
		$data['lbldoctorname'] = 'Dr. '.$objusers->Firstname_c.' '.$objusers->lastname_c;

		$data["lblcontactnumber"] =  ($objusers->mobileno1_c != "")? "Mob.-".$objusers->mobileno1_c : '';
		$data["lblcontactnumber"] =  ($objusers->phonenohome_c != "")? $data["lblcontactnumber"]." Home(Ph).-".$objusers->phonenohome_c : $data["lblcontactnumber"].'';
		$data["lblcontactnumber"] =  ($objusers->phonenohome_c != "")? $data["lblcontactnumber"]." Work(Ph).-".$objusers->phonenowork_c : $data["lblcontactnumber"].'';
		$objaddress =  ORM::factory('Address')->where("id","=",$objusers->refaddresswork_c )->find();
		$objclinic =  ORM::factory('doctorclinic')->where("refdoctorclinicdoctorid_c","=",$objdoctors->id )->find();
		$objaddress =  ORM::factory('Address')->where("id","=",$objclinic->refclinicaddressid_c )->find();
		$data['lbladdress'] = $objaddress->line1_c.", ".$objaddress->nearlandmark_c.", ".$objaddress->location_c.", ".$objaddress->city_c." - ".$objaddress->pin_c." (".$objaddress->state_c.", ".$objaddress->country_c.").";
		
		$objUsers =  ORM::factory('User')->where("id","=",$objApp->refappfromid_c )->find();
		$data['lblpatientname'] = $objUsers->Firstname_c.' '.$objUsers->lastname_c;
		// get symptoms
		$appsymps = new Model_Appointmentsymptom;
		$appsympsdata=$appsymps->where('refappsymappointmentsid_c','=',$appid)->find_all();
		$strsymps="";
		foreach($appsympsdata as $appsymp)
		{
			$arrsymps =	DB::select()->from('symptommasters')->where('id', '=', $appsymp->refappsymptomid_c)->execute()->current();
			$strsymps =$strsymps.$arrsymps['symptomname_c'].'; ';
		}
		$data['lblsymptoms'] = $strsymps;
		//get diseases
		$apptreatments = new Model_treatment;
		$apptreatments = $apptreatments->where('reftreatappointmentsid_c','=',$appid)->find_all();
		$strdisease="";
		foreach($apptreatments as $apptreatment)
		{
			$arrdiseases =	DB::select()->from('diseasemasters')->where('id', '=', $apptreatment->reftreatdieseasid_c)->execute()->current();
			$strdisease =$strdisease.$arrdiseases['diseasename_c'].'; ';
		}
		$data['lblpatientdiagnosis'] = $strdisease;
		//get test
		$apptests = new Model_recommendedtest;
		$apptests =	$apptests->where('refrecomtestappointmentsid_c','=',$appid)->group_by('refrecomtestpathologists1id_c')->find_all();

		//get notes
		$appnotes = new Model_appointmentnote;
		$appnotes = $appnotes->where('refnotesappid_c','=',$appid)->find_all();
		$strnotes="";
		foreach($appnotes as $appnote)
		{
			$arrnotes =	DB::select()->from('notes')->where('id', '=', $appnote->reffollowupnotesid_c)->execute()->current();
			$strnotes =$strnotes.$arrnotes['notesvalue_c'].'; ';
		}
		$data['lblpatientfollowup'] = '';
		if(trim($strnotes) != ';')
		$data['lblpatientfollowup'] = $strnotes;

		//get vital parameters
		$objvitalsigns = new Model_Vitalsign;
		$objvitalsigns->where('refappid_c','=',$appid)->find();
		$data['lblgeneral'] = $objvitalsigns->systolicbloodpressure_c > 0 ? 'Bp ='.$objvitalsigns->systolicbloodpressure_c.'; ' : '';	
		$data['lblgeneral'] = $objvitalsigns->pluse_c > 0 ? $data['lblgeneral'].'Pulse ='.$objvitalsigns->pluse_c.'; ' : $data['lblgeneral'].'';		
		$data['lblgeneral'] = $objvitalsigns->temperature_c > 0 ? $data['lblgeneral'].'temperature='.$objvitalsigns->temperature_c.'; ' : $data['lblgeneral'].'';	
		$data['lblgeneral'] = $objvitalsigns->heartrate_c > 0 ? $data['lblgeneral'].'Heart Rate='.$objvitalsigns->heartrate_c.'; ' : $data['lblgeneral'].'';
		$data['lblgeneral'] = $objvitalsigns->height_c > 0 ? $data['lblgeneral'].'Height ='.$objvitalsigns->height_c.'; ' : $data['lblgeneral'].''; 
		$data['lblgeneral'] = $objvitalsigns->weight_c > 0 ? $data['lblgeneral'].'Weight ='.$objvitalsigns->weight_c.'; ' : $data['lblgeneral'].'';
		$data['lblgeneral'] = $objvitalsigns->bmi_c > 0 ? $data['lblgeneral'].'BMI='.$objvitalsigns->bmi_c.'; ' : $data['lblgeneral'].'';		
		$data['lblgeneral'] = $objvitalsigns->whr_c > 0 ? $data['lblgeneral'].'WHR ='.$objvitalsigns->whr_c.'; ' : $data['lblgeneral'].''; 
		
	
		return $data;
		
	}
	public function action_list()
	{
		$errors = array();
		$messages = array();
		$user = Auth::instance()->get_user();
		$whereclause = '[exportedbyconsumer,=,no][foruserid,=,'.$user->id.']';
		$this->display($errors,$messages,$whereclause);
	}
	private function display($errors, $messages,$whereclause)
	{	$user = Auth::instance()->get_user();
		$userId = $user->id;
		$objViewUsers=ORM::factory('viewusers')->where('id','=',$userId)->find();
			$role = $objViewUsers->role;
		$pos=1;
		if($role=='staff')
		{$pos=0;
		}
		$objStaff = ORM::factory('staff') //find the staff with help of userId.
						->where('refstaffuserid_c','=',$userId)
						->mustFind();
			$staffId=$objStaff->id;
			$objFavoriteStaffByDoctors = ORM::factory('favoritestaffbydoctordetail')// find all doctors who selected that staff.
									->where('staffid','=',$staffId)
									->where('status','=','accepted')
									->find_all()
									->as_array();
			$array_doctor=array();
			if(count($objFavoriteStaffByDoctors != 0))// get all doctor's name.
			{
				$result=$objFavoriteStaffByDoctors;
				foreach($result as $res)
				{
					if((!empty($res->doctorName)) && ($res->doctorName != ' ') && !(in_array($res->doctorName,$array_doctor)))
					$array_doctor[$res->doctorUserId]=$res->doctorName ;
				}
			}
		try{
			$content = View::factory('vuser/vdoctor/vlistofbills');
			$content->bind('errors', $errors);
			$content->bind('messages', $messages);
			$content->bind('whereclause',$whereclause);
			$content->bind('pos',$pos);
			$content->bind('array_doctor',$array_doctor);
			$this->template->content = $content;
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
	public function action_search(){
		$user = Auth::instance()->get_user();
		$userId = $user->id;
		$objViewUsers=ORM::factory('viewusers')->where('id','=',$userId)->find();
			$role = $objViewUsers->role;
		if($role=='staff')
		$doctorUserId = $_POST['selectedDoctor'];
		else
		$doctorUserId=$userId;
		$errors = array();
		$messages = array();
		$whereclause = '[exportedbyconsumer,=,no][foruserid,=,'.$doctorUserId.']';
		if($_POST){
			$search = $_POST['search'];
			$type 	= $_POST['type'];
			$from 	= $_POST['from'];
			$to	= $_POST['to'];
			$date 	= '';
			if($type == 'All'){
				$whereclause = '[foruserid,=,'.$doctorUserId.']';
			}
			if($type == 'New'){
				$whereclause = '[exportedbyconsumer,=,no][foruserid,=,'.$doctorUserId.']';
			}
			if($type == 'AllBetween'){
				$whereclause 	= '[foruserid,=,'.$doctorUserId.'][timestamp,<,'.strtotime($to. "+1 days").'][timestamp,>,'.strtotime($from).']';
				
			}	
			if($search != ''){
				$whereclause = '[foruserid,=,'.$doctorUserId.'][AccountCode,like,%'.$search.'%]'.$whereclause.'(or)[foruserid,=,'.$doctorUserId.'][PaidBy,=,%'.$search.'%]'.$whereclause.'(or)[foruserid,=,'.$doctorUserId.'][TransactionId,like,%'.$search.'%]'.$whereclause.'(or)[foruserid,=,'.$doctorUserId.'][Reason,like,%'.$search.'%]'.$whereclause.'(or)[foruserid,=,'.$doctorUserId.'][Credit,like,%'.$search.'%]'.$whereclause.'(or)[foruserid,=,'.$doctorUserId.'][Debit,like,%'.$search.'%]'.$whereclause;
			}
			$this->display($errors,$messages,$whereclause);	
		}else{
			$errors['error'] = 'Could not search your query';
			$this->display($errors,$messages,$whereclause);
		}
	}
	public function action_export()
	{
		//$user = Auth::instance()->get_user();
		$user = Auth::instance()->get_user();
		$userId = $user->id;
		$objViewUsers=ORM::factory('viewusers')->where('id','=',$userId)->find();
		$role = $objViewUsers->role;
		
		if($role=='staff'){
			$doctorUserId = $_POST['selectedDoctor'];
		}
		else{
			$doctorUserId=$userId;
		}
		$errors = array();
		$messages = array();
		$whereclause = '[exportedbyconsumer,=,no][foruserid,=,'.$doctorUserId.']';
		if($_POST){
			$search = $_POST['search'];
			$type 	= $_POST['type'];
			$from 	= $_POST['from'];
			$to	= $_POST['to'];
			$date 	= '';
			if($type == 'All'){
				$whereclause = '[foruserid,=,'.$doctorUserId.']';
			}
			if($type == 'New'){
				$whereclause = '[exportedbyconsumer,=,no][foruserid,=,'.$doctorUserId.']';
			}
			if($type == 'AllBetween'){
				$whereclause 	= '[foruserid,=,'.$doctorUserId.'][timestamp,<,'.strtotime($to. "+1 days").'][timestamp,>,'.strtotime($from).']';
				
			}	
			if($search != ''){
				$whereclause = '[foruserid,=,'.$doctorUserId.'][AccountCode,like,%'.$search.'%]'.$whereclause.'(or)[foruserid,=,'.$doctorUserId.'][PaidBy,=,%'.$search.'%]'.$whereclause.'(or)[foruserid,=,'.$doctorUserId.'][TransactionId,like,%'.$search.'%]'.$whereclause.'(or)[foruserid,=,'.$doctorUserId.'][Reason,like,%'.$search.'%]'.$whereclause.'(or)[foruserid,=,'.$doctorUserId.'][Credit,like,%'.$search.'%]'.$whereclause.'(or)[foruserid,=,'.$doctorUserId.'][Debit,like,%'.$search.'%]'.$whereclause;
			}
			$table = "exportbill";
			$columns = "PaidBy,TransactionId,Amount,Reason,Date";
			$groupby = '';
			$sidx = 'PaidBy'; 
			$sord = 'desc'; 		
			$jqgriddata=new Model_xjqgridgetdata;
			$result=$jqgriddata->exportdata(1,0,$sidx,$sord,$table,$columns,$whereclause,$groupby);
			$date = date_create();
		
			if(isset($result[1]))
			{
				if($_POST['exportto'] == 'excel'){
					if($type == 'New'){
						DB::update(ORM::factory('billingstatement')->table_name())
						->set(array('isexportedbyconsumer_c' => 'yes'))
						->where('isexportedbyconsumer_c', '=', 'no')
						->execute();
					}
					$messages['message'] = 'Exported all records into excel. Please check your download folder';
					$arr = $result;

					$result = array();
					$str	= orm::factory('billconfiguration')->where('refdoctorid_c','=',$doctorUserId)->find()->desiredcoloumns_c;
					if(!$str)
					{ 
						$str	= orm::factory('billconfiguration')->where('refdoctorid_c','=',-1)->find()->desiredcoloumns_c;
					}
					$str1	= explode(",",$str);
					$a		= array();
					foreach($str1 as $str)
					{ 
						$b=array_search($str,$arr[0]);
						array_push($a,$b);
					}
					foreach ($arr as $data) {
						$id = $data[4];
						$res=array();
						if (isset($result[$id])) 
						{ 
							foreach($a as $b)
							{
								array_push($res,$data[$b]);
							}	 
							$result[$id][] = $res;
						}else{
							foreach($a as $b)
							{
								array_push($res,$data[$b]);
								$result[$id] = array($res);
							}
						}
					}
					$timestamp=time();
					$filename='temp/bill_'.$timestamp.'.csv';	
					$fp = fopen($filename, 'w');
					$grandtotal = 0;
					$flag=1;
					$flag1=1;
					foreach($result as $key=>$fields){
						$array = array($key,'','','','');
						fputcsv($fp, $array);
						$total = 0;
						if($flag1==1)
						{
							$x	= array_search('Amount',$fields[0]);
							$flag1	= 0;
						}
						foreach ($fields as $field) {
							$field = array('')+$field;
							fputcsv($fp, $field);
							$total = $total+$field[$x];
						}
						if($flag==0)
						{
							$array = array('','total =',$total,'');
							$grandtotal = $grandtotal + $total;
							fputcsv($fp, $array);
						}
						$flag=0;
					}
					$array = array('','Grand Total =',$grandtotal,'');
					fputcsv($fp, $array);
					fclose($fp);
					$file = 'bill_'.$timestamp.'.xls';
					//export::csvtoexcel($filename,$file);
					//$filename = $file;
					if (file_exists($filename)) 
					{
						header('Content-Description: File Transfer');
						header('Content-Type: application/octet-stream');
						header('Content-Disposition: attachment; filename='.basename($filename));
						header('Expires: 0');
						header('Cache-Control: must-revalidate');
						header('Pragma: public');
						header('Content-Length: ' . filesize($filename));
						ob_clean();
						flush();
						readfile($filename);
						exit;
					}
				}
			}else{
				$errors['error'] = 'There is no record to export.';
				$this->display($errors,$messages,$whereclause);
			}
		}
	}
	public function action_saveBillPdf(){
		$htmlfile = $_POST['htmlfile'];
		$patientuserid = $_POST['patientuserid'];
		$doctoruserid = $_POST['doctoruserid'];
		$billid = $_POST['billid'];
		$caseno = $_POST['caseno'];
		//$htmlfile = str_replace('/ayushman/assets/doctorsignature/',$_SERVER['DOCUMENT_ROOT'].'/ayushman/assets/doctorsignature/',$htmlfile);
		$htmlfile = str_replace('/ayushman/assets/',$_SERVER['DOCUMENT_ROOT'].'/ayushman/assets/',$htmlfile);
		var_dump($htmlfile);
		$objHtml 	= new simple_html_dom();
		$objHtml->load($htmlfile);
		$files = new helper_Files();
		$temp=$files->savePdfFile($objHtml);
		//var_dump($patientuserid,$doctoruserid,$billid,$caseno);die;
		$objbill=ORM::factory('bill')->where('refbillsuserid_c','=',$doctoruserid)
									->where('refpatuserid_c','=',$patientuserid)
									->where('billid_c','=',$billid)
									->where('caseregno_c','=',$caseno)->mustFind();
		$objbill->reffileid_c=$temp["id"];
		If($objbill->id != null)
		{
			$objbill->save();
		}
		echo(json_encode($temp));
		die();
	}
	
	public function action_saveRcptPdf(){
		$htmlfile = $_POST['htmlfile'];
		$patientuserid = $_POST['patientuserid'];
		$doctoruserid = $_POST['doctoruserid'];
		$rcptid = $_POST['rcptid'];
		$caseno = $_POST['caseno'];
		//$htmlfile = str_replace('/ayushman/assets/doctorsignature/',$_SERVER['DOCUMENT_ROOT'].'/ayushman/assets/doctorsignature/',$htmlfile);
		$htmlfile = str_replace('/ayushman/assets/',$_SERVER['DOCUMENT_ROOT'].'/ayushman/assets/',$htmlfile);
		$objHtml 	= new simple_html_dom();
		$objHtml->load($htmlfile);
		$files = new helper_Files();
		$temp=$files->savePdfFile($objHtml);
		
		$objrcpt=ORM::factory('receipt')->where('refDocuserid_c','=',$doctoruserid)
									->where('refRCPTuserid_c','=',$patientuserid)
									->where('rcptid_c','=',$rcptid)
									->where('caseregno_c','=',$caseno)->mustFind();
		$objrcpt->reffileid_c=$temp["id"];
		If($objrcpt->id != null)
		{
			var_dump("Saving");
			$objrcpt->save();
		}	
		echo(json_encode($temp));
		die();
	}
}

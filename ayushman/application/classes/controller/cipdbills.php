<?php defined('SYSPATH') or die('No direct script access.');
include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/export.php');

class Controller_Cipdbills extends Controller_Ctemplatewithmenu  {
		
	
public function action_viewbill()
	{

		$patientsid=$_GET['id'];
		$bednumber=$_GET['bednumber'];
		$caseno=$_GET['caseno'];

		try
		{
			$objUser = Auth::instance()->get_user();
			if (!$objUser){
				Request::current()->redirect('cuser/login');
			}	
			$userId = $objUser->id;
			$objStaff = ORM::factory('staff')->where('refstaffuserid_c','=',$userId)->find();
			$staffId=$objStaff->id;
			$hospitalid=$objStaff->refhospitalid_c;
			$header_cashier=$objStaff->header_c;
			$footer_cashier=$objStaff->footer_c;
		

			$patuser = ORM::factory('hospitalpatient')->where('id','=',$patientsid)->find();
			$user = ORM::factory('ipdpatientsdetail')->where('patientsid','=',$patientsid)
													 ->where('refid','=',$caseno)
													 ->find();
			 $hospital_id = ORM::factory('hospital')->where('id','=',$hospitalid)->find();
			$hospid=$hospital_id->refuserid_c;
			
			
			$content	= View::factory('vuser/vstaff/vipdbills');
				
			$mobileno = $patuser->mobileno1;
			$age = $patuser->age;
			$gender=$patuser->gender;
			$onlypatientname = $user->onlypatientname;
			$admitdate_c = $user->admitdate_c;
			$refid = $user->refid;
			$currentdate=$user->dischargedate_c;
			$dischargedate_c = $user->dischargedate_c;
			if($currentdate=='' || $currentdate==null)
			{
				$currentdate=date("d M Y");
			}
			
			$result=$this->getipdbills($refid,$admitdate_c, $currentdate, $patientsid);
			$content->bind('onlypatientname', $onlypatientname);
			 $content->bind('patientsid', $patientsid);
			 $content->bind('refid', $refid);
			 $content->bind('dischargedate_c', $dischargedate_c);
			 $content->bind('currentdate', $currentdate);
			$content->bind('admitdate_c', $admitdate_c);
			$content->bind('bednumber', $bednumber);
			$content->bind('result', $result);
			$content->bind('mobileno1',$mobileno);
			$content->bind('age',$age);
			$content->bind('gender',$gender);
			$content->bind('hospitalid',$hospid);
			$content->bind('header_cashier',$header_cashier);
			$content->bind('footer_cashier',$footer_cashier);

			$this->template->content= $content;
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
	}
	
public function action_wardlist()
	{
		$user = Auth::instance()->get_user();
		if (!$user){
			Request::current()->redirect('cuser/login');
		}
			$userid=$user->id;
			$staffobj=ORM::factory('staff')->where('refstaffuserid_c','=',$userid)->find();
			$header_cashier=$staffobj->header_c;
			$footer_cashier=$staffobj->footer_c;
			$hospitalid=$staffobj->refhospitalid_c;
		$patientsid=$_GET['patId'];
		$patName=$_GET['patName'];
		 //$hospitalid=$_GET['hospitalid'];
		$namearray=array();
		$ward=array();
		$objgeneral = ORM::factory('wardbedroomdetail')->where('hospitalid','=',$hospitalid)
													   ->where('statusflag','=','Active')
													   ->group_by('wardname')
													   ->find_all();

		 foreach ($objgeneral as $wardvalue)
		  {
	
				$namearray['wardname']=$wardvalue->wardname;
				$namearray['wardid']=$wardvalue->warduserid;
				$namearray['wardlist']=$this->getgeneralList($namearray['wardid'],$hospitalid);
				array_push($ward, $namearray);

		  }
//var_dump($ward);

		$content	= View::factory('vuser/vipdward/vwarddetail');

		$content->bind('ward',$ward);
		$content->bind('hospitalid',$hospitalid);
		$content->bind('patName',$patName);
		$content->bind('patientsid',$patientsid);
		$content->bind('header_cashier',$header_cashier);	
		$content->bind('footer_cashier',$footer_cashier);	

		
		$this->template->content= $content;


	}

	private function getgeneralList($wardid,$hospitalid)
	{
		$objUser = Auth::instance()->get_user();
		if (!$objUser){
			Request::current()->redirect('cuser/login');
		}
		//var_dump($wardid);		
		$wardlist=array();
		$wardarray=array();
				$objwardlist = ORM::factory('wardbedroomdetail')->where('warduserid','=',$wardid)
																->where('hospitalid','=',$hospitalid)
																->where('statusflag','=','Active')
																->find_all();
		foreach ($objwardlist as $wardvalue)
		  {
	
				$wardlist['bednumber']=$wardvalue->bednumber;
				$wardlist['roomno']=$wardvalue->roomno;
				$wardlist['patientname']=$wardvalue->patientname;
				$wardlist['bedstatus']=$wardvalue->bedstatus;
				$wardlist['admitdate']=$wardvalue->admitdate;
				$wardlist['patuserid']=$wardvalue->patuserid;
				$wardlist['caseno']=$wardvalue->caseno;

				array_push($wardarray, $wardlist);

		  }										
		   //var_dump($wardarray);
		return $wardarray;
		
	}
	public function action_getbilldata(){
		$objUser = Auth::instance()->get_user();
		if (!$objUser){
			Request::current()->redirect('cuser/login');
		}
		if (isset($_GET['appointmentid']))
		{
				$appointmentid = $_GET['appointmentid'];
				$objapp=ORM::factory('appointment')->where('id','=',$appointmentid)->find();
				$doctorid = $objapp->refappwithid_c;
				$statementcode = $objapp->reftransactionid_c;
				$patid = $objapp->refappfromid_c; /// Patient userid
					// if statementcode is not generated then bill not generated
				
				$objdoc = ORM::factory('doctor')->where('id','=',$doctorid)->find();
				$accountuserid = $objdoc->refdoctorsid_c; // Doctors Id
			   
				$objbill=ORM::factory('bill')->where('statementcode_c','=',$statementcode)
									 ->find();
				$billno = $objbill->billid_c;				
		}
		if (isset($_GET['id']))
		{
				$patid = $_GET['id'];
		}
		
		if (isset($_GET['billno']))
		{
				$billno = $_GET['billno'];
		}
		if (isset($_GET['accountuserid']))
		{
				$accountuserid = $_GET['accountuserid'];
		}
		if (isset($_GET['statementcode']))
		{
				$statementcode = $_GET['statementcode'];
		}

		$user = Auth::instance()->get_user();
			$userid=$user->id;
			$staffobj=ORM::factory('staff')->where('refstaffuserid_c','=',$userid)->find();
			$header_cashier=$staffobj->header_c;
			$footer_cashier=$staffobj->footer_c;
			
							   
		$objdoctor = ORM::factory('doctorprofile')->where('userid','=',$accountuserid)
												->where('clinicname_c','!=','Online')
										   		->find();
			$doctorname = $objdoctor->doctorname;
			$header_c = $objdoctor->header_c;
			$signature_c = $objdoctor->signature_c;
			$footer_c = $objdoctor->footer_c;
			$headerfooterSysGenflag_c = $objdoctor->headerfooterSysGenflag_c;
			$clinicname_c = $objdoctor->clinicname_c;
			$pin_c = $objdoctor->pin_c;
			$location_c = $objdoctor->location_c;
			$city_c = $objdoctor->city_c;
			$phone = $objdoctor->phone;
			$state_c = $objdoctor->state_c;
			$nearlandmark_c = $objdoctor->nearlandmark_c;
			$education_c = $objdoctor->education_c;

		
		$objbill=ORM::factory('bill')->where('statementcode_c','=',$statementcode)
									 ->where('billid_c','=',$billno)
									 ->find();

		 $user = ORM::factory('user')->where('id','=',$patid)
												  ->find();
					
		$onlypatientname = $user->Firstname_c." ".$user->lastname_c;

	 $objbillingstmt = ORM::factory('billingstatement')->where('accountuserid_c','=',$accountuserid)
													   ->where('statementcode_c','=',$statementcode)
					   				                  ->find();
		
		$ammount_c = $objbillingstmt->ammount_c;
	
		
		// New Bill defined with 25 labels and Charges
		if($objbill->editedon_c==null){
			$billdate1=$objbill->createdon_c;
		}
		else{
		$billdate1=$objbill->editedon_c;
		}
		
		// $billdate=date('d m Y',strtotime($billdate));
		$label1_c=$objbill->label1_c;
		$label2_c=$objbill->label2_c;
		$label3_c=$objbill->label3_c;
		$label4_c=$objbill->label4_c;
		$label5_c=$objbill->label5_c;
		$label6_c=$objbill->label6_c;
		$label7_c=$objbill->label7_c;
		$label8_c=$objbill->label8_c;
		$label9_c=$objbill->label9_c;
		$label10_c=$objbill->label10_c;
		$label11_c=$objbill->label11_c;
		$label12_c=$objbill->label12_c;
		$label13_c=$objbill->label13_c;
		$label14_c=$objbill->label14_c;
		$label15_c=$objbill->label15_c;
		$label16_c=$objbill->label16_c;
		$label17_c=$objbill->label17_c;
		$label18_c=$objbill->label18_c;
		$label19_c=$objbill->label19_c;
		$label20_c=$objbill->label20_c;
		$label21_c=$objbill->label21_c;
		$label22_c=$objbill->label22_c;
		$label23_c=$objbill->label23_c;
		$label24_c=$objbill->label24_c;
		$label25_c=$objbill->label25_c;
			/////// 25 Qty//////////////////////////////

		$quantity1_c=$objbill->quantity1_c;
		$quantity2_c=$objbill->quantity2_c;
		$quantity3_c=$objbill->quantity3_c;
		$quantity4_c=$objbill->quantity4_c;
		$quantity5_c=$objbill->quantity5_c;
		$quantity6_c=$objbill->quantity6_c;
		$quantity7_c=$objbill->quantity7_c;
		$quantity8_c=$objbill->quantity8_c;
		$quantity9_c=$objbill->quantity9_c;
		$quantity10_c=$objbill->quantity10_c;
		$quantity11_c=$objbill->quantity11_c;
		$quantity12_c=$objbill->quantity12_c;
		$quantity13_c=$objbill->quantity13_c;
		$quantity14_c=$objbill->quantity14_c;
		$quantity15_c=$objbill->quantity15_c;
		$quantity16_c=$objbill->quantity16_c;
		$quantity17_c=$objbill->quantity17_c;
		$quantity18_c=$objbill->quantity18_c;
		$quantity19_c=$objbill->quantity19_c;
		$quantity20_c=$objbill->quantity20_c;
		$quantity21_c=$objbill->quantity21_c;
		$quantity22_c=$objbill->quantity22_c;
		$quantity23_c=$objbill->quantity23_c;
		$quantity24_c=$objbill->quantity24_c;
		$quantity25_c=$objbill->quantity25_c;

	/////// 25 Charges//////////////////////////////
		$charge1_c=$objbill->charge1_c;
		$charge2_c=$objbill->charge2_c;
		$charge3_c=$objbill->charge3_c;
		$charge4_c=$objbill->charge4_c;
		$charge5_c=$objbill->charge5_c;
		$charge6_c=$objbill->charge6_c;
		$charge7_c=$objbill->charge7_c;
		$charge8_c=$objbill->charge8_c;
		$charge9_c=$objbill->charge9_c;
		$charge10_c=$objbill->charge10_c;
		$charge11_c=$objbill->charge11_c;
		$charge12_c=$objbill->charge12_c;
		$charge13_c=$objbill->charge13_c;
		$charge14_c=$objbill->charge14_c;
		$charge15_c=$objbill->charge15_c;
		$charge16_c=$objbill->charge16_c;
		$charge17_c=$objbill->charge17_c;
		$charge18_c=$objbill->charge18_c;
		$charge19_c=$objbill->charge19_c;
		$charge20_c=$objbill->charge20_c;
		$charge21_c=$objbill->charge21_c;
		$charge22_c=$objbill->charge22_c;
		$charge23_c=$objbill->charge23_c;
		$charge24_c=$objbill->charge24_c;
		$charge25_c=$objbill->charge25_c;
//var_dump($charge1_c,$quantity1_c);die;
		/////////////////////Rate///////////////////////
		if ($charge1_c!=null && $quantity1_c>0) {
					$rate1_c=(float)($charge1_c/$quantity1_c);

		}
		//var_dump($rate1_c);die;
		if ($charge2_c!=null && $quantity2_c>0) {
					$rate2_c=$charge2_c/$quantity2_c;

		}
		if ($charge3_c!=null && $quantity3_c>0) {
					$rate3_c=$charge3_c/$quantity3_c;

		}
		if ($charge4_c!=null && $quantity4_c>0) {
					$rate4_c=$charge4_c/$quantity4_c;

		}
		if ($charge5_c!=null && $quantity5_c>0) {
					$rate5_c=$charge5_c/$quantity5_c;

		}
		if ($charge6_c!=null && $quantity6_c>0) {
					$rate6_c=$charge6_c/$quantity6_c;

		}
		if ($charge7_c!=null && $quantity7_c>0) {
					$rate7_c=$charge7_c/$quantity7_c;

		}
		if ($charge8_c!=null && $quantity8_c>0) {
					$rate8_c=$charge8_c/$quantity8_c;

		}
		if ($charge9_c!=null && $quantity9_c>0) {
					$rate9_c=$charge9_c/$quantity9_c;

		}
		if ($charge10_c!=null && $quantity10_c>0) {
					$rate10_c=$charge10_c/$quantity10_c;

		}
		if ($charge11_c!=null && $quantity11_c>0) {
					$rate11_c=$charge11_c/$quantity11_c;

		}
		if ($charge12_c!=null && $quantity12_c>0) {
					$rate12_c=$charge12_c/$quantity12_c;

		}
		if ($charge13_c!=null && $quantity13_c>0) {
					$rate13_c=$charge13_c/$quantity13_c;

		}
		if ($charge14_c!=null && $quantity14_c>0) {
					$rate14_c=$charge14_c/$quantity14_c;

		}
		if ($charge15_c!=null && $quantity15_c>0) {
					$rate15_c=$charge15_c/$quantity15_c;

		}
		if ($charge16_c!=null && $quantity16_c>0) {
					$rate16_c=$charge16_c/$quantity16_c;

		}
		if ($charge17_c!=null && $quantity17_c>0) {
					$rate17_c=$charge17_c/$quantity17_c;

		}
		if ($charge18_c!=null && $quantity18_c>0) {
					$rate18_c=$charge18_c/$quantity18_c;

		}
		if ($charge19_c!=null && $quantity19_c>0) {
					$rate19_c=$charge19_c/$quantity19_c;

		}
		if ($charge20_c!=null && $quantity20_c>0) {
					$rate20_c=$charge20_c/$quantity20_c;

		}
		if ($charge21_c!=null && $quantity21_c>0) {
					$rate21_c=$charge21_c/$quantity21_c;

		}
		if ($charge22_c!=null && $quantity22_c>0) {
					$rate22_c=$charge22_c/$quantity22_c;

		}
		if ($charge23_c!=null && $quantity23_c>0) {
					$rate23_c=$charge23_c/$quantity23_c;

		}if ($charge24_c!=null && $quantity24_c>0) {
					$rate24_c=$charge24_c/$quantity24_c;

		}
		if ($charge25_c!=null && $quantity25_c>0) {
					$rate25_c=$charge25_c/$quantity25_c;

		}


		
		$reffileid_c=$objbill->reffileid_c;
		// Find if receipt made against this bill
		$objrcpt=ORM::factory('receipt')->where('billstatementcode_c','=',$objbill->statementcode_c)->find();
		if($objrcpt->id !=null)
		{
			$amount =$objrcpt->amount_c;
			$rcptid_c =$objrcpt->rcptid_c;
			$extradesc_c=$objrcpt->extradesc_c;
			$chequedate_c =$objrcpt->chequedate_c;
			$chequeno_c= $objrcpt->chequeno_c;
			$cardtrnxno_c= $objrcpt->cardtrnxno_c;
			$refmodeofpayment_c= $objrcpt->refmodeofpayment_c;
		}
		else
		{
			$amount_c =null;
			$extradesc_c =null;
			$chequedate_c =null;
			$chequeno_c= null;
			$cardtrnxno_c= null;
			$refmodeofpayment_c= null;	
		}

		$content	= View::factory('vuser/vdoctor/vbill');
	$content->bind('charge1_c',$charge1_c);
	$content->bind('charge2_c',$charge2_c);
	$content->bind('charge3_c',$charge3_c);
	$content->bind('charge4_c',$charge4_c);
	$content->bind('charge5_c',$charge5_c);
	$content->bind('charge6_c',$charge6_c);
	$content->bind('charge7_c',$charge7_c);
	$content->bind('charge8_c',$charge8_c);
	$content->bind('charge9_c',$charge9_c);
	$content->bind('charge10_c',$charge10_c);
	$content->bind('charge11_c',$charge11_c);
	$content->bind('charge12_c',$charge12_c);
	$content->bind('charge13_c',$charge13_c);
	$content->bind('charge14_c',$charge14_c);
	$content->bind('charge15_c',$charge15_c);
	$content->bind('charge16_c',$charge16_c);
	$content->bind('charge17_c',$charge17_c);
	$content->bind('charge18_c',$charge18_c);
	$content->bind('charge19_c',$charge19_c);
	$content->bind('charge20_c',$charge20_c);
	$content->bind('charge21_c',$charge21_c);
	$content->bind('charge22_c',$charge22_c);
	$content->bind('charge23_c',$charge23_c);
	$content->bind('charge24_c',$charge24_c);
	$content->bind('charge25_c',$charge25_c);

	$content->bind('label1_c',$label1_c);
	$content->bind('label2_c',$label2_c);
	$content->bind('label3_c',$label3_c);
	$content->bind('label4_c',$label4_c);
	$content->bind('label5_c',$label5_c);
	$content->bind('label6_c',$label6_c);
	$content->bind('label7_c',$label7_c);
	$content->bind('label8_c',$label8_c);
	$content->bind('label9_c',$label9_c);
	$content->bind('label10_c',$label10_c);
	$content->bind('label11_c',$label11_c);
	$content->bind('label12_c',$label12_c);
	$content->bind('label13_c',$label13_c);
	$content->bind('label14_c',$label14_c);
	$content->bind('label15_c',$label15_c);
	$content->bind('label16_c',$label16_c);
	$content->bind('label17_c',$label17_c);
	$content->bind('label18_c',$label18_c);
	$content->bind('label19_c',$label19_c);
	$content->bind('label20_c',$label20_c);
	$content->bind('label21_c',$label21_c);
	$content->bind('label22_c',$label22_c);
	$content->bind('label23_c',$label23_c);
	$content->bind('label24_c',$label24_c);
	$content->bind('label25_c',$label25_c);	
/////////////////qty////////////////////
	$content->bind('quantity1_c',$quantity1_c);
	$content->bind('quantity2_c',$quantity2_c);
	$content->bind('quantity3_c',$quantity3_c);
	$content->bind('quantity4_c',$quantity4_c);
	$content->bind('quantity5_c',$quantity5_c);
	$content->bind('quantity6_c',$quantity6_c);
	$content->bind('quantity7_c',$quantity7_c);
	$content->bind('quantity8_c',$quantity8_c);
	$content->bind('quantity9_c',$quantity9_c);
	$content->bind('quantity10_c',$quantity10_c);
	$content->bind('quantity11_c',$quantity11_c);
	$content->bind('quantity12_c',$quantity12_c);
	$content->bind('quantity13_c',$quantity13_c);
	$content->bind('quantity14_c',$quantity14_c);
	$content->bind('quantity15_c',$quantity15_c);
	$content->bind('quantity16_c',$quantity16_c);
	$content->bind('quantity17_c',$quantity17_c);
	$content->bind('quantity18_c',$quantity18_c);
	$content->bind('quantity19_c',$quantity19_c);
	$content->bind('quantity20_c',$quantity20_c);
	$content->bind('quantity21_c',$quantity21_c);
	$content->bind('quantity22_c',$quantity22_c);
	$content->bind('quantity23_c',$quantity23_c);
	$content->bind('quantity24_c',$quantity24_c);
	$content->bind('quantity25_c',$quantity25_c);

	//////////////////////Rate//////////////////

	$content->bind('rate1_c',$rate1_c);
	$content->bind('rate2_c',$rate2_c);
	$content->bind('rate3_c',$rate3_c);
	$content->bind('rate4_c',$rate4_c);
	$content->bind('rate5_c',$rate5_c);
	$content->bind('rate6_c',$rate6_c);
	$content->bind('rate7_c',$rate7_c);
	$content->bind('rate8_c',$rate8_c);
	$content->bind('rate9_c',$rate9_c);
	$content->bind('rate10_c',$rate10_c);
	$content->bind('rate11_c',$rate11_c);
	$content->bind('rate12_c',$rate12_c);
	$content->bind('rate13_c',$rate13_c);
	$content->bind('rate14_c',$rate14_c);
	$content->bind('rate15_c',$rate15_c);
	$content->bind('rate16_c',$rate16_c);
	$content->bind('rate17_c',$rate17_c);
	$content->bind('rate18_c',$rate18_c);
	$content->bind('rate19_c',$rate19_c);
	$content->bind('rate20_c',$rate20_c);
	$content->bind('rate21_c',$rate21_c);
	$content->bind('rate22_c',$rate22_c);
	$content->bind('rate23_c',$rate23_c);
	$content->bind('rate24_c',$rate24_c);
	$content->bind('rate25_c',$rate25_c);	
	
	$content->bind('onlypatientname',$onlypatientname);	
	$content->bind('patid',$patid);	
	$content->bind('billdate1',$billdate1);	
	$content->bind('billno',$billno);	
	$content->bind('ammount_c',$ammount_c);
	$content->bind('doctorname',$doctorname);
	$content->bind('header_c',$header_c);
	$content->bind('signature_c',$signature_c);	
	$content->bind('footer_c',$footer_c);
	$content->bind('headerfooterSysGenflag_c',$headerfooterSysGenflag_c);
	$content->bind('clinicname_c',$clinicname_c);
	$content->bind('location_c',$location_c);
	$content->bind('city_c',$city_c);
	$content->bind('state_c',$state_c);
	$content->bind('phone',$phone);	
	$content->bind('nearlandmark_c',$nearlandmark_c);	
	$content->bind('phone',$phone);	
	$content->bind('education_c',$education_c);	
	$content->bind('pin_c',$pin_c);	
	$content->bind('amount',$amount);
	$content->bind('extradesc_c',$extradesc_c);
	$content->bind('chequedate_c',$chequedate_c);
	$content->bind('chequeno_c',$chequeno_c);
	$content->bind('cardtrnxno_c',$cardtrnxno_c);	
	$content->bind('refmodeofpayment_c',$refmodeofpayment_c);	
	$content->bind('accountuserid',$accountuserid);	
	$content->bind('rcptid_c',$rcptid_c);	
	$content->bind('header_cashier',$header_cashier);	
	$content->bind('footer_cashier',$footer_cashier);	

		$this->template->content= $content;
			
	
		
	}	


public function action_showRcpt(){

	$objUser = Auth::instance()->get_user();
	if (!$objUser){
			Request::current()->redirect('cuser/login');
	}
	$creditamount = $_GET["creditamount"];
	$creditdate	= $_GET["creditdate"];
	$rcptId=$_GET['rcptId'];
	$patName=$_GET['patName'];
	$patId=$_GET['patId'];
		$caseno=$_GET['caseno'];

	if($caseno=="null")
	{	
		$caseno=null;
	}
	$hospitalid=$_GET['hospitalid'];
	$header_cashier=$_GET['header_cashier'];
	$footer_cashier=$_GET['footer_cashier'];
	$creditdesc = $_GET["creditdesc"];
			$cheqno = $_GET["cheqno"];
			$cheqdate	= $_GET["cheqdate"];
			$trxrefno	= $_GET["trxrefno"];
			$payment	= $_GET["payment"];
			$wordamt= $_GET["wordamt"];
			
	$content	= View::factory('vuser/vstaff/vdepositrecpt');
	$content->bind('creditamount',$creditamount);
	$content->bind('creditdate',$creditdate);
	$content->bind('rcptId',$rcptId);
	$content->bind('patName',$patName);
	$content->bind('patId',$patId);
	$content->bind('caseno',$caseno);
	$content->bind('hospitalid',$hospitalid);
	$content->bind('header_cashier',$header_cashier);
	$content->bind('footer_cashier',$footer_cashier);
	$content->bind('creditdesc',$creditdesc);
	$content->bind('cheqno',$cheqno);
	$content->bind('cheqdate',$cheqdate);
	$content->bind('trxrefno',$trxrefno);
	$content->bind('payment',$payment);
	$content->bind('wordamt',$wordamt);
		
		$this->template->content= $content;
			
		}


function getipdbill($refid, $admitdate_c, $currentdate, $patientsid)
	{
		$objUser = Auth::instance()->get_user();
		if (!$objUser){
			Request::current()->redirect('cuser/login');
		}		
		$page = "1"; 
        $limit = "15"; 
		$sidx = "tdate"; 
		$sord = 'asc'; 	
		$columns='patid,tdate,testname,amt,quantity,totalamt,rcptno,amt,amt,pdffilename,flag';
		$whereclause="[patid,=,$patientsid]";
		$groupby="";
		$class="IPDpatientsService";
		$data='[caseno:'.$refid.'][admitdate:'.$admitdate_c.'][dischargedate:'.$currentdate.'][patid:'.$patientsid.']';
			$class = new helper_datagenerator($page,$limit,$sidx,$sord,$class,$columns,$whereclause,$groupby,$data);
			$result = $class->exportdata();
			//var_dump($result);die;
			return $result;
			//var_dump($result);die;
	}


	function getipdbills($refid, $admitdate_c, $currentdate, $patientsid)
	{
		$objUser = Auth::instance()->get_user();
		if (!$objUser){
			Request::current()->redirect('cuser/login');
		}	
		$page = "1"; 
        $limit = "15"; 
		$sidx = "tdate"; 
		$sord = 'asc'; 	
		$columns='patid,tdate,testname,amt,quantity,totalamt,rcptno,amt,amt,pdffilename,flag';
		$whereclause="[patid,=,$patientsid]";
		$groupby="";
		$class="IPDpatientsService";
		$data='[caseno:'.$refid.'][admitdate:'.$admitdate_c.'][dischargedate:'.$currentdate.'][patid:'.$patientsid.']';
			$class = new helper_datagenerator($page,$limit,$sidx,$sord,$class,$columns,$whereclause,$groupby,$data);
			$result = $class->exportdata();
			return $result;
	}

	public function action_printipdbill()
	{
		try
		{
		//$header_cashier=$_GET['header_cashier'];
		$patientsid=$_GET['patientsid'];
		$caseno=$_GET['caseno'];
		//var_dump($patientsid);
		$billid=$_GET['billid'];
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

			$objUser = Auth::instance()->get_user();
			if (!$objUser){
				Request::current()->redirect('cuser/login');
			}
			$userId = $objUser->id;
			$objStaff = ORM::factory('staff')->where('refstaffuserid_c','=',$userId)->find();
			$staffId=$objStaff->id;
			$hospitalid=$objStaff->refhospitalid_c;
			$hospital_id = ORM::factory('hospital')->where('id','=',$hospitalid)->find();
			$hospid=$hospital_id->refuserid_c;
			$header_cashier=$objStaff->header_c;
			$footer_cashier=$objStaff->footer_c;
		

			$patuser = ORM::factory('hospitalpatient')->where('id','=',$patientsid)->find();
			$user = ORM::factory('ipdpatientsdetail')->where('patientsid','=',$patientsid)
													 ->where('refid','=',$caseno)
													 ->find();
			//var_dump($user->patientsid);die;
			$content	= View::factory('vuser/vstaff/ipdbill');

			$mobileno = $patuser->mobileno1;
			$age = $patuser->age;
			$gender=$patuser->gender;

//var_dump($age);die;

			$dischargedate_c = $user->dischargedate_c;
			$onlypatientname = $user->onlypatientname;
			$admitdate_c = $user->admitdate_c;
			$refid = $user->refid;
			$currentdate=$user->dischargedate_c;
			$result =$this->getipdbill($refid, $admitdate_c, $currentdate, $patientsid);
			//$testname = $user->testname;
			//var_dump($result);die;
			if($currentdate=='' || $currentdate==null)
			{
				$currentdate=date("d M Y");
			}
			
			$content->bind('onlypatientname', $onlypatientname);
			 $content->bind('patientsid', $patientsid);
			 $content->bind('refid', $refid);
			 $content->bind('dischargedate_c', $dischargedate_c);
			 $content->bind('currentdate', $currentdate);
			$content->bind('admitdate_c', $admitdate_c);
			$content->bind('result', $result);
			$content->bind('billid', $billid);
			$content->bind('other1', $other1);
			 $content->bind('other2', $other2);
			 $content->bind('other3', $other3);
			$content->bind('value1', $value1);
			$content->bind('value2', $value2);
			$content->bind('value3', $value3);
			$content->bind('header_cashier', $header_cashier);
			$content->bind('footer_cashier', $footer_cashier);
			$content->bind('mobileno1',$mobileno);
			$content->bind('age',$age);
			$content->bind('gender',$gender);
			$content->bind('refuserid_c',$hospid);
			$this->template->content= $content;
			
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
	}

	// OLD CODE....Not In Use
	
	public function viewipdbill($caseno, $admitdate, $patid)
	{

		$query='select C.patid as patid,C.amt as amt,C.tdate as tdate,C.testname as testname,C.refid as refid,C.rcptno as rcptno,C.pdffilename as pdffilename,C.quantity as quantity, C.totalamt as totalamt,C.flag as flag,C.sortdate as sortdate
					from (
							select receipts.refRCPTuserid_c as patid, 
									receipts.amount_c as amt,
									date_format(receipts.createdon_c,"%d %b %Y") as tdate,
									receipts.extradesc_c as testname,
									receipts.caseregno_c as refid,
									receipts.rcptid_c as rcptno,
									files.filename_c as pdffilename,
									1 as quantity,
									receipts.amount_c as totalamt,
									"RCPT" as flag,
									STR_TO_DATE(receipts.createdon_c,"%Y-%m-%d %H:%i:%s") as sortdate
							from receipts left join files on (receipts.reffileid_c = files.id)
							where receipts.caseregno_c like "'.$caseno.'" and
								receipts.refRCPTuserid_c = $patid 
							Union
							select  orderedtests.customeruserid_c as patid,
								orderedtests.rate_c as amt,
								date_format(orderedtests.createdon_c,"%d %b %Y") as tdate,
								testmasters.testname_c  as testname,
								"" as refid,
								"" as rcptno,
								"" as pdffilename,
								1 as quantity,
								orderedtests.rate_c as totalamt,
								"CHARGE" as flag,
								STR_TO_DATE(orderedtests.createdon_c,"%Y-%m-%d %H:%i:%s") as sortdate
							from orderedtests,testmasters
							where orderedtests.testid_c = testmasters.id and
								orderedtests.caseregno_c =  "'.$caseno.'" and
								orderedtests.customeruserid_c = '.$patid.'
							Union
							select ipdwardcharges.refpatientuserid_c as patid,
									ipdwardcharges.rate_c as amt,
									ipdwardcharges.chrgdate_c as tdate,
									testmasters.testname_c as testname,
									"" as refid,
									"" as rcptno,
									"" as pdffilename,
									ipdwardcharges.quantity_c as quantity,
									ipdwardcharges.amount_c as totalamt,
									"CHARGE" as flag,
									STR_TO_DATE(ipdwardcharges.createdon_c,"%Y-%m-%d %H:%i:%s") as sortdate
							from ipdwardcharges,testmasters
							where ipdwardcharges.reftestid_c =.$testmasters.$id
							) as C
							C.patid='.$patid.'
							order by C.tdate,C.sortdate';

			$result=DB::query(Database::SELECT,$query)->execute()->as_array();
	
	return $result;		
	}

	public function action_setwhereclause()
	{
		var_dump();
		if(isset($_GET["patId"]) && $_GET["patId"] !== '' ){
				$patId = $_GET["patId"];
				$whereclause="['patientsid','=',".$patId."]";
				var_dump($patId);
				$content = View::factory('vuser/vstaff/vlistofipdbills');
				$content->bind('patientsid',$patId);
				$content->bind('whereclause',$whereclause);

		}			
	}

	

	public function action_list()
	{
		$errors = array();
		$messages = array();
		$whereclause = '';
		$this->display($errors,$messages,$whereclause);
	}
	private function display($errors, $messages,$whereclause)
	{	 	
		$objUser = Auth::instance()->get_user();
		if (!$objUser){
			Request::current()->redirect('cuser/login');
		}
			$objFavoriteStaffByPatient = ORM::factory('ipdpatientsdetail')// find all patients who selected that staff.
									->find_all()
									->as_array();
			$array_patient=array();
			if(count($objFavoriteStaffByPatient != 0))// get all doctor's name.
			{
				$result=$objFavoriteStaffByPatient;
				foreach($result as $res)
				{
					if((!empty($res->onlypatientname)) && ($res->onlypatientname != ' ') && !(in_array($res->onlypatientname,$array_patient)))
					$array_patient[$res->patientsid]=$res->onlypatientname;
									}
			}
		try{
			$content = View::factory('vuser/vstaff/vlistofipdbills');
			$content->bind('errors', $errors);
			$content->bind('messages', $messages);
			$content->bind('whereclause',$whereclause);
			$content->bind('pos',$pos);
			$content->bind('array_patient',$array_patient);
			$this->template->content = $content;
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
	


	public function action_view()
	{
		$errors = array();
		$messages = array();
		$id = '';
		$patName = '';
		$caseno = '';
		$this->searchAndDisplay($errors, $messages, '','','');
	}

	
	private function searchAndDisplay($errors, $messages,$id,$patName,$caseno)
	{
		try{
			$content = View::factory('vuser/vstaff/vlistofipdbills');
			$result = $this->getList($id,$patName,$caseno);
			$content->bind('result',$result);
			$content->bind('errors',$errors);
			$content->bind('messages',$messages);
			$this->template->content = $content;
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
	public function action_search()
	{
		try{
			$errors = array();
			$messages = array();
			$id = $_POST['id'];
			$patName = $_POST['patName'];
			$caseno = $_POST['caseno'];
			$this->searchAndDisplay($errors, $messages, $id,$patName,$caseno);
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
	private function getList($searchstring,$patName,$caseno)
	{
		$objUser = Auth::instance()->get_user();
		if (!$objUser){
			Request::current()->redirect('cuser/login');
		}
		
		$objProcess = ORM::factory('ipdpatientsdetail');
		if($searchstring!=null){
			$objProcess =$objProcess->where('patientsid','=',$searchstring);
		}
		if($patName!=null){
			$objProcess =$objProcess->where('onlypatientname','like','%'.$patName.'%');
		}
		if($caseno!=null){
			$objProcess =$objProcess->where('refid','like','%'.$caseno.'%');
		}

		$objProcess =$objProcess->find_all();
		return $objProcess;
	}
 }





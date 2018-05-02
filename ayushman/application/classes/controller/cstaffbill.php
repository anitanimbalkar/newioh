<?php defined('SYSPATH') or die('No direct script access.');
include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/export.php');

class Controller_Cstaffbill extends Controller_Ctemplatewithmenu  {


	public function action_getbilldata(){
		
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
				$doctorid = $objdoc->id ;
			   
				$objbill=ORM::factory('bill')->where('statementcode_c','=',$statementcode)
									 ->find();
				if ($objbill->id == null)
				{
					// Bill not generated hence
					// get new bill id and get template from doctors personalisation list
					$billno= transaction::getLatestBillId($accountuserid);
						
					$objbill=ORM::factory('doctorservice')->where('refdoctorid','=',$doctorid)->find();
					if($objbill->id == null)
					{
						$objbill=ORM::factory('doctorservice')->where('refdoctorid','=',-1)->find();					
					}
						
						$quantity1_c=1;
						$quantity2_c=0;
						$quantity3_c=0;
						$quantity4_c=0;
						$quantity5_c=0;
						$quantity6_c=0;
						$quantity7_c=0;
						$quantity8_c=0;
						$quantity9_c=0;
						$quantity10_c=0;
						$quantity11_c=0;
						$quantity12_c=0;
						$quantity13_c=0;
						$quantity14_c=0;
						$quantity15_c=0;
						$quantity16_c=0;
						$quantity17_c=0;
						$quantity18_c=0;
						$quantity19_c=0;
						$quantity20_c=0;
						$quantity21_c=0;
						$quantity22_c=0;
						$quantity23_c=0;
						$quantity24_c=0;
						$quantity25_c=0;
						
						
						$charge1_c=$objbill->charge1_c;
						$charge2_c=0;
						$charge3_c=0;
						$charge4_c=0;
						$charge5_c=0;
						$charge6_c=0;
						$charge7_c=0;
						$charge8_c=0;
						$charge9_c=0;
						$charge10_c=0;
						$charge11_c=0;
						$charge12_c=0;
						$charge13_c=0;
						$charge14_c=0;
						$charge15_c=0;
						$charge16_c=0;
						$charge17_c=0;
						$charge18_c=0;
						$charge19_c=0;
						$charge20_c=0;
						$charge21_c=0;
						$charge22_c=0;
						$charge23_c=0;
						$charge24_c=0;
						$charge25_c=0;

						$rate1_c=$objbill->charge1_c; 
						$rate2_c=$objbill->charge2_c;
						$rate3_c=$objbill->charge3_c;
						$rate4_c=$objbill->charge4_c;
						$rate5_c=$objbill->charge5_c;
						$rate6_c=$objbill->charge6_c;
						$rate7_c=$objbill->charge7_c;
						$rate8_c=$objbill->charge8_c;
						$rate9_c=$objbill->charge9_c;
						$rate10_c=$objbill->charge10_c;
						$rate11_c=$objbill->charge11_c;
						$rate12_c=$objbill->charge12_c;
						$rate13_c=$objbill->charge13_c;
						$rate14_c=$objbill->charge14_c;
						$rate15_c=$objbill->charge15_c;
						$rate16_c=$objbill->charge16_c;
						$rate17_c=$objbill->charge17_c;
						$rate18_c=$objbill->charge18_c;
						$rate19_c=$objbill->charge19_c;
						$rate20_c=$objbill->charge20_c;
						$rate21_c=$objbill->charge21_c;
						$rate22_c=$objbill->charge22_c;
						$rate23_c=$objbill->charge23_c;
						$rate24_c=$objbill->charge24_c;
						$rate25_c=$objbill->charge25_c;

						$billdate1= date("d M Y",time());
						
						$amount_c =null;
						$extradesc_c =null;
						$chequedate_c =null;
						$chequeno_c= null;
						$cardtrnxno_c= null;
						$refmodeofpayment_c= null;	
						$ammount_c = $objbill->charge1_c;
					
				}
				else
				{
					// If bill already exists 
					//----------------------
					$objbill=ORM::factory('bill')->where('statementcode_c','=',$statementcode)->find();
					$billno = $objbill->billid_c;
					
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
					
					/////////////////////Rate///////////////////////
					if ($charge1_c!=null && $quantity1_c>0) 
					{$rate1_c=(float)($charge1_c/$quantity1_c);}
					if ($charge2_c!=null && $quantity2_c>0) 
					{$rate2_c=$charge2_c/$quantity2_c;}
					if ($charge3_c!=null && $quantity3_c>0)
					{$rate3_c=$charge3_c/$quantity3_c;}
					if ($charge4_c!=null && $quantity4_c>0) 
					{$rate4_c=$charge4_c/$quantity4_c;}
					if ($charge5_c!=null && $quantity5_c>0)
					{$rate5_c=$charge5_c/$quantity5_c;}
					if ($charge6_c!=null && $quantity6_c>0) 
					{$rate6_c=$charge6_c/$quantity6_c;}
					if ($charge7_c!=null && $quantity7_c>0) 
					{$rate7_c=$charge7_c/$quantity7_c;}
					if ($charge8_c!=null && $quantity8_c>0) 
					{$rate8_c=$charge8_c/$quantity8_c;}
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

					if($objbill->editedon_c==null){
						$billdate1=$objbill->createdon_c;
					}
					else
					{
						$billdate1=$objbill->editedon_c;
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
					
					
					 $objbillingstmt = ORM::factory('billingstatement')->where('accountuserid_c','=',$accountuserid)
													   ->where('statementcode_c','=',$statementcode)
					   				                  ->find();
		
					$ammount_c = $objbillingstmt->ammount_c;
				}
					
		}
							   
		$objdoctor = ORM::factory('doctorprofile')->where('userid','=',$accountuserid)
												->where('clinicname_c','!=','Online')
										   		->find();
			$doctorname = $objdoctor->doctorname;
			$header_c = $objdoctor->header_c;
			$footer_c = $objdoctor->footer_c;
			$signature_c = $objdoctor->signature_c;
			$headerfooterSysGenflag_c = $objdoctor->headerfooterSysGenflag_c;
			$clinicname_c = $objdoctor->clinicname_c;
			$pin_c = $objdoctor->pin_c;
			$location_c = $objdoctor->location_c;
			$city_c = $objdoctor->city_c;
			$phone = $objdoctor->phone;
			$state_c = $objdoctor->state_c;
			$nearlandmark_c = $objdoctor->nearlandmark_c;
			$education_c = $objdoctor->education_c;

		
		

		$user = ORM::factory('user')->where('id','=',$patid)->find();
					
		$onlypatientname = $user->Firstname_c." ".$user->lastname_c;
	
		
		
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
		

	$content	= View::factory('vuser/vdoctor/vbilledit');
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
	$content->bind('footer_c',$footer_c);
	$content->bind('signature_c',$signature_c);
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
	
	$content->bind('appid',$appointmentid);	
	
		$this->template->content= $content;
					
	}	


public function action_showRcpt(){

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
 }





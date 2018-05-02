<?php defined('SYSPATH') or die('No direct script access.');
include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');
//include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/rcpttransaction.php');

include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/export.php');

class Controller_Cbill extends Controller_Ctemplatewithmenu  {

	public function action_generate(){		
		try{
			$obj_user = Auth::instance()->get_user();
			if (!$obj_user){
				Request::current()->redirect('cuser/login');
			}
			$appid=$_GET["id"];	
			//$billno = $_GET['billno'];
			//$accountuserid = $_GET['accountuserid'];
			//var_dump($accountuserid);die;
			//$statementcode = $_GET['statementcode'];
		
			$objapp=ORM::factory('appointment')->where('id','=',$appid)->find();
			$doctorid = $objapp->refappwithid_c;
			$patientid = $objapp->refappfromid_c;
			$statementcode = $objapp->reftransactionid_c;
					// if statementcode is not generated then bill not generated
				
			$objdoc = ORM::factory('doctor')->where('id','=',$doctorid)->find();
			$accountuserid = $objdoc->refdoctorsid_c; // Doctors Id
								   
			$objdoctor = ORM::factory('doctorprofile')->where('userid','=',$accountuserid)
													->where('clinicname_c','=','Online')
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

		// where('billid_c','=',$billno)
		// Can find bill from transaction code
		
		$objbill=ORM::factory('bill')->where('statementcode_c','=',$statementcode)
									 ->find();
		if($objbill->id != null)
		{
			$billid = $objbill->billid_c;
			$objbillingstmt = ORM::factory('billingstatement')->where('accountuserid_c','=',$accountuserid)
													   ->where('statementcode_c','=',$statementcode)
					   				                  ->find();		
			$ammount_c = $objbillingstmt->ammount_c;
			// New Bill defined with 25 labels and Charges
			$billdate1=$objbill->createdon_c;
			//$billdate=date_format($billdate1,"%d %b %Y");
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
			
			//// 25 quantity values 
			
			$quantity1_c = $objbill->quantity1_c;
			$quantity2_c = $objbill->quantity2_c;
			$quantity3_c = $objbill->quantity3_c;
			$quantity4_c = $objbill->quantity4_c;
			$quantity5_c = $objbill->quantity5_c;
			$quantity6_c = $objbill->quantity6_c;
			$quantity7_c = $objbill->quantity7_c;
			$quantity1_c = $objbill->quantity1_c;
			$quantity1_c = $objbill->quantity1_c;
			$quantity1_c = $objbill->quantity1_c;
			$quantity1_c = $objbill->quantity1_c;
			$quantity1_c = $objbill->quantity1_c;
			$quantity1_c = $objbill->quantity1_c;
			$quantity1_c = $objbill->quantity1_c;
			$quantity1_c = $objbill->quantity1_c;
			$quantity1_c = $objbill->quantity1_c;
			$quantity1_c = $objbill->quantity1_c;
			$quantity1_c = $objbill->quantity1_c;
			$quantity1_c = $objbill->quantity1_c;
			$quantity1_c = $objbill->quantity1_c;
			$quantity1_c = $objbill->quantity1_c;
			$quantity1_c = $objbill->quantity1_c;
			$quantity1_c = $objbill->quantity1_c;
			$quantity1_c = $objbill->quantity1_c;
			$quantity1_c = $objbill->quantity1_c;
			$quantity1_c = $objbill->quantity1_c;
			
			//// 25 rates to be calculated as
			$rate1_c=$objbill->charge1_c / $objbill->quantity1_c;
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
			
			
			/// Whether PDF generated
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
		}
		else
		{
			$billid = null;
			$ammount_c = 0;
			$billdate1=$objbill->createdon_c;
			//$billdate=date_format($billdate1,"%d %b %Y");
			$label1_c=null;
			$label2_c=null;
			$label3_c=null;
			$label4_c=null;
			$label5_c=null;
			$label6_c=null;
			$label7_c=null;
			$label8_c=null;
			$label9_c=null;
			$label10_c=null;
			$label11_c=null;
			$label12_c=null;
			$label13_c=null;
			$label14_c=null;
			$label15_c=null;
			$label16_c=null;
			$label17_c=null;
			$label18_c=null;
			$label19_c=null;
			$label20_c=null;
			$label21_c=null;
			$label22_c=null;
			$label23_c=null;
			$label24_c=null;
			$label25_c=null;
				/////// 25 Charges//////////////////////////////
			$charge1_c=null;
			$charge2_c=null;
			$charge3_c=null;
			$charge4_c=null;
			$charge5_c=null;
			$charge6_c=null;
			$charge7_c=null;
			$charge8_c=null;
			$charge9_c=null;
			$charge10_c=null;
			$charge11_c=null;
			$charge12_c=null;
			$charge13_c=null;
			$charge14_c=null;
			$charge15_c=null;
			$charge16_c=null;
			$charge17_c=null;
			$charge18_c=null;
			$charge19_c=null;
			$charge20_c=null;
			$charge21_c=null;
			$charge22_c=null;
			$charge23_c=null;
			$charge24_c=null;
			$charge25_c=null;
			/// Whether PDF generated
			$reffileid_c=null;					
		}
		
		$user = ORM::factory('user')->where('id','=',$patientid)
												  ->find();
					
		$onlypatientname = $user->Firstname_c.' '.$user->lastname_c;
	
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
			$content->bind('onlypatientname',$onlypatientname);	
			$content->bind('patid',$patientid);	
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

			$this->template->content= $content;	
		}	
	catch(Exception $e){throw new Exception($e);}
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
		if (!$user){
			Request::current()->redirect('cuser/login');
		}
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
			$objUser = Auth::instance()->get_user();
			if (!$objUser){
				Request::current()->redirect('cuser/login');
			}
		
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
		try
		{
			die($this->action_savingBill());
		}
		catch(Exception $e){
				$data = array();
				$data['type'] ="error";
				$data['message'] = 'Exception Message: '.$e->getMessage().'<br/><br/> Please report this as a bug.';
				die(json_encode($data));
		}				
	}
	public function action_savingBill()
	{
		if($_POST){
				try
				{
					$objApp = new Model_Appointment;
					$objApp->where('id','=',$_POST['appid'])->find();
					$amount=$_POST['totalamt'];
					$diagnosis=$_POST['diagnosis'];
					$creditdesc=$_POST['diagnosis'];
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
						// 25 Charges Doctor can define
						if(isset($_POST['charge1_c'])){
							$objBill->charge1_c = $_POST['charge1_c'];
						}
						if(isset($_POST['charge2_c'])){
							$objBill->charge2_c = $_POST['charge2_c'];
						}
						if(isset($_POST['charge3_c'])){
							$objBill->charge3_c = $_POST['charge3_c'];
						}
						if(isset($_POST['charge4_c'])){
							$objBill->charge4_c = $_POST['charge4_c'];
						}
						if(isset($_POST['charge5_c'])){
							$objBill->charge5_c = $_POST['charge5_c'];
						}
						if(isset($_POST['charge6_c'])){
							$objBill->charge6_c = $_POST['charge6_c'];
						}
						if(isset($_POST['charge7_c'])){
							$objBill->charge7_c = $_POST['charge7_c'];
						}
						if(isset($_POST['charge8_c'])){
							$objBill->charge8_c = $_POST['charge8_c'];
						}
						if(isset($_POST['charge9_c'])){
							$objBill->charge9_c = $_POST['charge9_c'];
						}
						if(isset($_POST['charge10_c'])){
							$objBill->charge10_c = $_POST['charge10_c'];
						}
						if(isset($_POST['charge11_c'])){
							$objBill->charge11_c = $_POST['charge11_c'];
						}
						if(isset($_POST['charge12_c'])){
							$objBill->charge12_c = $_POST['charge12_c'];
						}
						if(isset($_POST['charge13_c'])){
							$objBill->charge13_c = $_POST['charge13_c'];
						}
						if(isset($_POST['charge14_c'])){
							$objBill->charge14_c = $_POST['charge14_c'];
						}
						if(isset($_POST['charge15_c'])){
							$objBill->charge15_c = $_POST['charge15_c'];
						}
						if(isset($_POST['charge16_c'])){
							$objBill->charge16_c = $_POST['charge16_c'];
						}
						if(isset($_POST['charge17_c'])){
							$objBill->charge17_c = $_POST['charge17_c'];
						}
						if(isset($_POST['charge18_c'])){
							$objBill->charge18_c = $_POST['charge18_c'];
						}
						if(isset($_POST['charge19_c'])){
							$objBill->charge19_c = $_POST['charge19_c'];
						}
						if(isset($_POST['charge20_c'])){
							$objBill->charge20_c = $_POST['charge20_c'];
						}
						if(isset($_POST['charge21_c'])){
							$objBill->charge21_c = $_POST['charge21_c'];
						}
						if(isset($_POST['charge22_c'])){
							$objBill->charge22_c = $_POST['charge22_c'];
						}
						if(isset($_POST['charge23_c'])){
							$objBill->charge23_c = $_POST['charge23_c'];
						}
						if(isset($_POST['charge24_c'])){
							$objBill->charge24_c = $_POST['charge24_c'];
						}
						if(isset($_POST['charge25_c'])){
							$objBill->charge25_c = $_POST['charge25_c'];
						}
						if(isset($_POST['label1_c']) && $objBill->charge1_c > 0){
							$objBill->label1_c = $_POST['label1_c'];
						}
						if(isset($_POST['label2_c'])&& $objBill->charge2_c > 0){
							$objBill->label2_c = $_POST['label2_c'];
						}
						if(isset($_POST['label3_c'])&& $objBill->charge3_c > 0){
							$objBill->label3_c = $_POST['label3_c'];
						}
						if(isset($_POST['label4_c'])&& $objBill->charge4_c > 0){
							$objBill->label4_c = $_POST['label4_c'];
						}
						if(isset($_POST['label5_c'])&& $objBill->charge5_c > 0){
							$objBill->label5_c = $_POST['label5_c'];
						}
						if(isset($_POST['label6_c'])&& $objBill->charge6_c > 0){
							$objBill->label6_c = $_POST['label6_c'];
						}
						if(isset($_POST['label7_c'])&& $objBill->charge7_c > 0){
							$objBill->label7_c = $_POST['label7_c'];
						}
						if(isset($_POST['label8_c'])&& $objBill->charge8_c > 0){
							$objBill->label8_c = $_POST['label8_c'];
						}
						if(isset($_POST['label9_c'])&& $objBill->charge9_c > 0){
							$objBill->label9_c = $_POST['label9_c'];
						}
						if(isset($_POST['label10_c'])&& $objBill->charge10_c > 0){
							$objBill->label10_c = $_POST['label10_c'];
						}
						if(isset($_POST['label11_c'])&& $objBill->charge11_c > 0){
							$objBill->label11_c = $_POST['label11_c'];
						}
						if(isset($_POST['label12_c'])&& $objBill->charge12_c > 0){
							$objBill->label12_c = $_POST['label12_c'];
						}
						if(isset($_POST['label13_c'])&& $objBill->charge13_c > 0){
							$objBill->label13_c = $_POST['label13_c'];
						}
						if(isset($_POST['label14_c'])&& $objBill->charge14_c > 0){
							$objBill->label14_c = $_POST['label14_c'];
						}
						if(isset($_POST['label15_c'])&& $objBill->charge15_c > 0){
							$objBill->label15_c = $_POST['label15_c'];
						}
						if(isset($_POST['label16_c'])&& $objBill->charge16_c > 0){
							$objBill->label16_c = $_POST['label16_c'];
						}
						if(isset($_POST['label17_c'])&& $objBill->charge17_c > 0){
							$objBill->label17_c = $_POST['label17_c'];
						}
						if(isset($_POST['label18_c'])&& $objBill->charge18_c > 0){
							$objBill->label18_c = $_POST['label18_c'];
						}
						if(isset($_POST['label19_c'])&& $objBill->charge19_c > 0){
							$objBill->label19_c = $_POST['label19_c'];
						}
						if(isset($_POST['label20_c'])&& $objBill->charge20_c > 0){
							$objBill->label20_c = $_POST['label20_c'];
						}
						if(isset($_POST['label21_c'])&& $objBill->charge21_c > 0){
							$objBill->label21_c = $_POST['label21_c'];
						}
						if(isset($_POST['label22_c'])&& $objBill->charge22_c > 0){
							$objBill->label22_c = $_POST['label22_c'];
						}
						if(isset($_POST['label23_c'])&& $objBill->charge23_c > 0){
							$objBill->label23_c = $_POST['label23_c'];
						}
						if(isset($_POST['label24_c'])&& $objBill->charge24_c > 0){
							$objBill->label24_c = $_POST['label24_c'];
						}
						if(isset($_POST['label25_c'])&& $objBill->charge25_c > 0){
							$objBill->label25_c = $_POST['label25_c'];
						}
						
						if(isset($_POST['quantity1_c'])){
							$objBill->quantity1_c = $_POST['quantity1_c'];
						}
						if(isset($_POST['quantity2_c'])){
							$objBill->quantity2_c = $_POST['quantity2_c'];
						}
						if(isset($_POST['quantity3_c'])){
							$objBill->quantity3_c = $_POST['quantity3_c'];
						}
						if(isset($_POST['quantity4_c'])){
							$objBill->quantity4_c = $_POST['quantity4_c'];
						}
						if(isset($_POST['quantity5_c'])){
							$objBill->quantity5_c = $_POST['quantity5_c'];
						}
						if(isset($_POST['quantity6_c'])){
							$objBill->quantity6_c = $_POST['quantity6_c'];
						}
						if(isset($_POST['quantity7_c'])){
							$objBill->quantity7_c = $_POST['quantity7_c'];
						}
						if(isset($_POST['quantity8_c'])){
							$objBill->quantity8_c = $_POST['quantity8_c'];
						}
						if(isset($_POST['quantity9_c'])){
							$objBill->quantity9_c = $_POST['quantity9_c'];
						}
						if(isset($_POST['quantity10_c'])){
							$objBill->quantity10_c = $_POST['quantity10_c'];
						}
						if(isset($_POST['quantity11_c'])){
							$objBill->quantity11_c = $_POST['quantity11_c'];
						}
						if(isset($_POST['quantity12_c'])){
							$objBill->quantity12_c = $_POST['quantity12_c'];
						}
						if(isset($_POST['quantity13_c'])){
							$objBill->quantity13_c = $_POST['quantity13_c'];
						}
						if(isset($_POST['quantity14_c'])){
							$objBill->quantity14_c = $_POST['quantity14_c'];
						}
						if(isset($_POST['quantity15_c'])){
							$objBill->quantity15_c = $_POST['quantity15_c'];
						}
						if(isset($_POST['quantity16_c'])){
							$objBill->quantity16_c = $_POST['quantity16_c'];
						}
						if(isset($_POST['quantity17_c'])){
							$objBill->quantity17_c = $_POST['quantity17_c'];
						}
						if(isset($_POST['quantity18_c'])){
							$objBill->quantity18_c = $_POST['quantity18_c'];
						}
						if(isset($_POST['quantity19_c'])){
							$objBill->quantity19_c = $_POST['quantity19_c'];
						}
						if(isset($_POST['quantity20_c'])){
							$objBill->quantity20_c = $_POST['quantity20_c'];
						}
						if(isset($_POST['quantity21_c'])){
							$objBill->quantity21_c = $_POST['quantity21_c'];
						}
						if(isset($_POST['quantity22_c'])){
							$objBill->quantity22_c = $_POST['quantity22_c'];
						}
						if(isset($_POST['quantity23_c'])){
							$objBill->quantity23_c = $_POST['quantity23_c'];
						}
						if(isset($_POST['quantity24_c'])){
							$objBill->quantity24_c = $_POST['quantity24_c'];
						}
						if(isset($_POST['quantity25_c'])){
							$objBill->quantity25_c = $_POST['quantity25_c'];
						}
						
						
						$objBill->save();
						// Now save receipt if receipt data is entered for the bill
						// billstatementcode
						// 
						var_dump("Trans code");
						var_dump($result['data']['code']);
						$objRcpt = ORM::factory('receipt')->where('billstatementcode_c','=',$result['data']['code'])->find();
						if($objRcpt->id == null)	
						{// New Receipt
							$rcptid=null;
						}
						else
						{
							$rcptid=$objRcpt->rcptid_c;
						}
						$rcptamt=0;
						if(isset($_POST['amount_c'])){
							$rcptamt = $_POST['amount_c'];
						}
						$creditdesc = $diagnosis;
						if(isset($_POST['extradesc_c'])){
							$creditdesc = $_POST['extradesc_c'];
						}
						$cheqdate = "";
						if(isset($_POST['chequedate_c'])){
							$cheqdate = $_POST['chequedate_c'];
						}
						$cheqno = "";
						if(isset($_POST['chequeno_c'])){
							$cheqno = $_POST['chequeno_c'];
						}
						$trxrefno = "";
						if(isset($_POST['cardtrnxno_c'])){
							$trxrefno = $_POST['cardtrnxno_c'];
						}
						var_dump("Old Receipt".$rcptid);
						var_dump($rcptid);
						$rcptid=rcpttransaction::saveRcpt($fromaccount, $toaccount, $rcptamt,null, $creditdesc, $cheqno, $cheqdate, $trxrefno,$rcptid);		
						// Now receipt got created against bill
												
						$objRcpt	= ORM::factory('receipt')->where('rcptid_c','=',$rcptid)
												->where('refRCPTuserid_c','=',$fromaccount)->find();
									
						if(isset($_POST['refmodeofpayment_c'])){
							$objRcpt->refmodeofpayment_c = $_POST['refmodeofpayment_c'];
						}
						$objRcpt->billstatementcode_c = $result['data']['code'];						
						$objRcpt->save();
					}
					$data = array();
					
					$data['type'] ="done";
					$data['message'] = 'Bill saved successfully';
				return(json_encode($data));
				}catch(Exception $e){
				$data = array();
				$data['type'] ="error";
				$data['message'] = 'Exception Message: '.$e->getMessage().'<br/><br/> Please report this as a bug.';
				die(json_encode($data));
			}				
			}
	}
	
	public function action_savebillAndpdf()
	{
		try
		{
			var_dump("Saving");
			$this->action_savingBill();
			var_dump("PDF");
			$this->action_saveBillPdf();
		}
		catch(Exception $e)
		{
				$data = array();
				$data['type'] ="error";
				$data['message'] = 'Exception Message: '.$e->getMessage().'<br/><br/> Please report this as a bug.';
				die(json_encode($data));			
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
		$objUser = Auth::instance()->get_user();
		if (!$objUser){
			Request::current()->redirect('cuser/login');
		}
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
		if (!$user){
			Request::current()->redirect('cuser/login');
		}
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
		if (!$user){
			Request::current()->redirect('cuser/login');
		}
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
		if (!$user){
			Request::current()->redirect('cuser/login');
		}
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
		$objUser = Auth::instance()->get_user();
		if (!$objUser){
			Request::current()->redirect('cuser/login');
		}
		
		$htmlfile = $_POST['htmlfile'];
		$patientuserid = $_POST['patientuseridPDF'];
		$doctoruserid = $_POST['doctoruseridPDF'];
		$billid = $_POST['billidPDF'];
		$caseno = $_POST['caseno'];
		//$htmlfile = str_replace('/ayushman/assets/doctorsignature/',$_SERVER['DOCUMENT_ROOT'].'/ayushman/assets/doctorsignature/',$htmlfile);
		$htmlfile = str_replace('/ayushman/assets/',$_SERVER['DOCUMENT_ROOT'].'/ayushman/assets/',$htmlfile);
		var_dump($htmlfile);
		$objHtml 	= new simple_html_dom();
		$objHtml->load($htmlfile);
		$files = new helper_Files();
		$temp=$files->savePdfFile($objHtml);
		var_dump($patientuserid,$doctoruserid,$billid);
		$objbill=ORM::factory('bill')->where('refbillsuserid_c','=',$doctoruserid)
									->where('refpatuserid_c','=',$patientuserid)
									->where('billid_c','=',$billid)->mustFind();
		//							->where('caseregno_c','<=>',$caseno)->mustFind();
		$objbill->reffileid_c=$temp["id"];
		var_dump($objbill->id);
		if($objbill->id != null)
		{
			var_dump("Saving PDF");
			$objbill->save();
		}
		echo(json_encode($temp));
		die();
	}
	
	public function action_saveRcptPdf(){
		$objUser = Auth::instance()->get_user();
		if (!$objUser){
			Request::current()->redirect('cuser/login');
		}
		
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
									->where('rcptid_c','=',$rcptid)->mustFind();
									//->where('caseregno_c','<=>',$caseno)->mustFind();
		$objrcpt->reffileid_c=$temp["id"];
		If($objrcpt->id != null)
		{
			$objrcpt->save();
		}	
		echo(json_encode($temp));
		die();
	}
	public function action_saveOpdRcpt(){
	try{
			$objUser = Auth::instance()->get_user();
			if (!$objUser){
				Request::current()->redirect('cuser/login');
			}
		
			$patientuserid = $_GET["patuserid"];
			$doctoruserid	= $_GET["docuserid"];
			$creditamount = $_GET["creditamount"];
			$creditdate	= $_GET["creditdate"];
			$creditdesc = $_GET["creditdesc"];
			$cheqno = $_GET["cheqno"];
			$cheqdate= $_GET["cheqdate"];
			$trxrefno= $_GET["trxrefno"];
			// modeofpayment
			rcpttransaction::saveRcpt($patientuserid, $doctoruserid, $creditamount,null, $creditdesc, $cheqno, $cheqdate, $trxrefno);		
		}
		catch(Exception $e){throw new Exception($e);}
	}
}

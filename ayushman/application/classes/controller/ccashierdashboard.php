<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/export.php');
include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');

class Controller_Ccashierdashboard extends Controller_Ctemplatewithmenu  {
	public function action_removetest()
	{
		$user = Auth::instance()->get_user();
		if (!$user){
			Request::current()->redirect('cuser/login');
		}
			$rownumber = $_GET["rownumber"];
			$patid = $_GET["patid"];
			$caseno = $_GET["caseno"];
			$testid = $_GET["testid"];
			
			$objOrder = ORM::factory('ipdwardcharge')->where('reftestid_c','=',$testid)
													 ->where('refpatientuserid_c','=',$patid)
													 ->where('caseregno_c','=',$caseno)
													 ->find();
			$objOrder->delete(); 
			die();
	}

	public function action_viewpatientaddedservices()
	{
		try
		{
			$user = Auth::instance()->get_user();
			if (!$user){
				Request::current()->redirect('cuser/login');
			}
		
			$array_taxes = Kohana::$config->load('taxes');

			$objUser = Auth::instance()->get_user();
			$userid = $objUser->id;
			$wardid = $_GET["wardid"];
			$caseno = $_GET["caseno"];
			$patid = $_GET["patid"];
			$arrservices = (Array)(json_decode($_GET['testarray']));
			$testarray=$arrservices['tests'];

			$tests = $arrservices['tests'];
			$i = 0;
			foreach($tests as $test)
			{
				$tests[$i] = array();
				$testmasters = ORM::factory('testmaster')->where('id','=',$test->id)->find();
				$tests[$i]["id"] = $testmasters->id;
				$tests[$i]["testname"] = $testmasters->testname_c;
				//$tests[$i]["testreqdate"] = date('d M Y',strtotime($test->orderrequestdate_c));
				// $objpathologist = ORM::factory('pathologist')->where('id','=',$test->refprovideruserid_c)->find();
				// $pathologistid = $test->refprovideruserid_c;
				$tests[$i]["qty"]= 1;
				$tests[$i]["rate"] = $test->rate;
				$discount = new helper_Discount();
				$discount = $discount->getDiscount(6,$testmasters->id);
				$tests[$i]["discountedrate"] = $tests[$i]["rate"] * (100 - $discount)/100;	
				//$tests[$i]["pathologistList"]= $this->getpathologists($pathologistid,$testmasters->id);
				$tests[$i]["discountedpercent"]=$discount;
				$i = $i + 1;
			}
			$objpatient = ORM::factory('patient')->where('repatientsuserid_c','=',$patid)->find();
			$objbillingaccount = ORM::factory('billingaccount')->where('refaccountuserid_c','=',$userid)->find();
			$netbalance = $objbillingaccount->netbalance_c;
			$objbillingplancharge = ORM::factory('billingplancharge')->join('billingindividualplans')->on('billingplancharge.ref_planid_c','=','billingindividualplans.refplanid_c')->where('billingindividualplans.status_c','=','active')->where('billingindividualplans.refusersid_c','=',$userid)->find();
			$servicecharges =$objbillingplancharge->servicecharges_c;
			$servicecharges=number_format($servicecharges);
			$servicetax = $array_taxes['servicetax'];			
			$servicetaxonservicecharges = round($servicecharges * $servicetax / 100, 2);
			
			$diagnosticlabsservicetax = $array_taxes['diagnosticlabservicetax'];
			
			$referer = $_SERVER['HTTP_REFERER'];
			
			if(!strpos($referer,'viewbill')){
				$referer = "/ayushman/ccashierdashboard/viewbill?id=".$patid."&caseno=".$caseno;
			}
			$discount = new helper_Discount();
			//$discount = $discount->getDiscount();
			$content = View::factory('vuser/vcashier/vpatientcart');
			$content->bind('userid', $userid);
			$content->bind('servicetax', $servicetax);
			$content->bind('servicetaxonservicecharges', $servicetaxonservicecharges);
			$content->bind('diagnosticlabsservicetax', $diagnosticlabsservicetax);
			$content->bind('tests',$tests);
			$content->bind('netbalance',$netbalance);
			$content->bind('servicecharges',$servicecharges);
			$content->bind('referer',$referer);
			$content->bind('wardid',$wardid);
			$content->bind('patid',$patid);
			$content->bind('caseno',$caseno);
			$content->bind('arr_favoritepathologist',$arr_favoritepathologist);
			$this->template->content = $content;
			$this->template->user =  $objUser->Firstname_c;
		}catch(Exception $e){throw new Exception($e);}
	}

	public function action_saveorder()
	{
		try
		{		
			$user = Auth::instance()->get_user();
			if (!$user){
				Request::current()->redirect('cuser/login');
			}
			$wardid = $_GET["wardid"];
			$patid = $_GET["patid"];
			$refid = $_GET["caseno"];
			$acceptdate = $_GET["acceptdate"];
			$arrservices = (Array)(json_decode($_GET['testarray']));
			$testarray=$arrservices['tests'];
			
			foreach($testarray as $testrecord)
			{
				$objOrder = ORM::factory('ipdwardcharge');
				$objOrder->refwardsid_c=$wardid;
				$objOrder->caseregno_c=$refid;
				$objOrder->reftestid_c=$testrecord->id;
				$objOrder->quantity_c=$testrecord->quantity;
				$objOrder->rate_c=$testrecord->rate;
				$totalamt=$objOrder->quantity_c*$objOrder->rate_c;
				$objOrder->amount_c=$totalamt;
				$objOrder->chrgdate_c=$acceptdate;
				$objOrder->refpatientuserid_c=$patid;
			
				$objOrder->save(); 
			}
			die;
		}catch(Exception $e){throw new Exception($e);}
	}

	public function action_saveorderold()
	{
		try
		{
			$user = Auth::instance()->get_user();
			if (!$user){
				Request::current()->redirect('cuser/login');
			}
			$wardid = $_GET["wardid"];
			$patid = $_GET["patid"];
			$refid = $_GET["caseno"];
			//$acceptdate = $_GET["acceptdate"];
			$testarray=json_decode($_GET['test']);
			//$testarray=$arrservices['test'];
			$i=0;
				foreach($testarray as $testrecord)
				{	
						$objOrder = ORM::factory('ipdwardcharge');
						$objOrder->refwardsid_c=$wardid;
						$objOrder->caseregno_c=$refid;
						$objOrder->reftestid_c=$testarray[$i][1];
						$objOrder->quantity_c=$testarray[$i][0];
						$objOrder->rate_c=$testarray[$i][2];
						$totalamt=$objOrder->quantity_c*$objOrder->rate_c;
						$objOrder->amount_c=$totalamt;
						$objOrder->chrgdate_c=date('d M Y');
						$objOrder->refpatientuserid_c=$patid;
						$objOrder->save(); 
						$i++;
				}		
				die();
		}catch(Exception $e){throw new Exception($e);}
	}

	public function action_orderipdservices(){
		try{
			$user = Auth::instance()->get_user();
			if (!$user){
				Request::current()->redirect('cuser/login');
			}
			//$patid = (int)$_GET["patientsid"];
			$warduid = (int)$_GET["wardid"];
			$wardobj=ORM::factory('pathologist')->where('refpathologistsuserid_c','=',$warduid)->find();
			$wardid=$wardobj->id;
			$pathtests=ORM::factory('catalog')->where('pathologistid','=',$wardid)->find_all();
		
			$results = array();
			$order= array();
			foreach($pathtests as $pathtest){
				
				$result['id'] = $pathtest->id;
				$result['testname'] = $pathtest->testname;
				$result['rate'] = $pathtest->rate;
				array_push($order, $result);
				$response['orderipdservices'] = $order;
			}
			echo(json_encode($response));die;
		}catch(Exception $e){throw new Exception($e);}
	}

	public function action_createbill()
	{
		try{
			$user = Auth::instance()->get_user();
			if (!$user){
				Request::current()->redirect('cuser/login');
			}			
			$userId = $user->id;
			
			$content = View::factory('vuser/vcashier/vipdservices');
			$content->bind('objuser', $user);
			$arr_xmpp = Kohana::$config->load('xmpp');
			$content->bind('arr_xmpp' , $arr_xmpp);
			$content->bind('priviousvalues' , $priviousvalues);
			$this->template->content = $content;	
		}catch(Exception $e){throw new Exception($e);}
	}

	public function action_view()
	{
		try{
			$user = Auth::instance()->get_user();
			if (!$user){
				Request::current()->redirect('cuser/login');
			}			
			$userid=$user->id;
			$staffobj=ORM::factory('staff')->where('refstaffuserid_c','=',$userid)->find();
			 $hospitalid=$staffobj->refhospitalid_c;
			$staffId=$staffobj->id;
		
			$errors = array();
			$messages= array();
			$_POST['selectname'] = '';
			$_POST['durationtype'] = '';
			$_POST['searchcaseno'] = '';
			$_POST['radiobtn'] = '';
			$_POST['radiobtnvalue'] = 'ipd';
			$duration['to'] ='';
			$duration['from'] ='';
			$_POST['checkboxbtn'] = 'active';
			$_POST['searchButton'] = '';
			$_POST['patName1'] = '';
			$_POST['searchcaseno1'] = '';
			$_POST['patId1'] = '';
			$_POST['patEmail1'] = '';
			$_POST['patContact1'] = '';
			$transactiontype ='';
			//$whereclause = '[staffid,=,'.$staffId.'][status,=,admitted]';
			$whereclause = '[staffid,=,'.$staffId.']';
			$this->display($errors,$messages,$whereclause,$hospitalid);
		}catch(Exception $e){throw new Exception($e);}
	}
	
	public function action_export(){
	try{
			$user = Auth::instance()->get_user();
			if (!$user){
				Request::current()->redirect('cuser/login');
			}			
		$userid=$user->id;
		$staffobj=ORM::factory('staff')->where('refstaffuserid_c','=',$userid)->find();
		$hospitalid=$staffobj->refhospitalid_c;
		$staffId=$staffobj->id;
		$errors = array();
		$messages = array();
		$whereclause = '';
		$checkboxbtn = $_POST['checkboxbtn'];
		$radiobtnvalue = $_POST['radiobtn'];
		$selectname = $_POST['selectname'];
		$searchcaseno = $_POST['searchcaseno'];
		$patName = $_POST['patName'];
		$patId = $_POST['patId'];
		$patContact = $_POST['patContact'];
		$patEmail = $_POST['patEmail'];
		$searchcaseno1 = $_POST['searchcaseno1'];
		$patName1 = $_POST['patName1'];
		$patId1 = $_POST['patId1'];
		$patContact1 = $_POST['patContact1'];
		$patEmail1 = $_POST['patEmail1'];
		
		if(isset ($_POST['radiobtn']))
		{			
			if(($_POST['radiobtn'])=="ipd")
			{
				$whereclause = '[staffid,=,'.$staffId.'][status,=,admitted](or)[staffid,=,'.$staffId.'][status,=,discharged]';
				if(($_POST['checkboxbtn'])=="active")
				{
					$whereclause ='[staffid,=,'.$staffId.'][status,=,admitted]';
					if($_POST['selectname']!='')
					{			
						$whereclause =$whereclause.'[patientname,like,'.$selectname.'%]';
					}
					if($_POST['searchcaseno']!='')
					{			
					$whereclause =$whereclause.'[staffid,=,'.$staffId.'][caseno,=,'.$searchcaseno.']';
					}
				}
			
				else if(($_POST['checkboxbtn'])=="all")
				{
					$whereclause = '[staffid,=,'.$staffId.'][status,=,admitted](or)[staffid,=,'.$staffId.'][status,=,discharged]';
					if($_POST['selectname']!='')
					{			
						$whereclause ='[staffid,=,'.$staffId.'][patientname,like,'.$selectname.'%]';
					}
					if($_POST['searchcaseno']!='')
					{			
					$whereclause ='[staffid,=,'.$staffId.'][caseno,=,'.$searchcaseno.']';
					}
				}
			}
			else if(($_POST['radiobtn'])=="opd")
			{
				$whereclause = '[staffid,=,'.$staffId.'][status,!=,admitted]';
					if($_POST['patName']!='')
					{			
						$whereclause =$whereclause.'[patientname,like,'.$patName.'%]';
					}
					if($_POST['patId']!='')
					{			
						$whereclause =$whereclause.'[id,=,'.$patId.']';
					}
					if($_POST['patEmail']!='')
					{			
						$whereclause =$whereclause.'[email,like,'.$patEmail.'%]';
					}
					if($_POST['patContact']!='')
					{			
						$whereclause =$whereclause.'[mobileno1,=,'.$patContact.']';
					}
			}
			else if(($_POST['radiobtn'])=="ipdopd")
			{
			$whereclause = '[staffid,=,'.$staffId.'][status,=,discharged](or)[staffid,=,'.$staffId.'][status,=,admitted]';
					if($_POST['patName1']!='')
					{			
						$whereclause ='[staffid,=,'.$staffId.'][status,=,discharged][patientname,like,'.$patName1.'%](or)[staffid,=,'.$staffId.'][status,=,admitted][patientname,like,'.$patName1.'%]';
					}
					if($_POST['patId1']!='')
					{			
						$whereclause ='[staffid,=,'.$staffId.'][status,=,discharged][id,=,'.$patId1.'](or)[staffid,=,'.$staffId.'][status,=,admitted][id,=,'.$patId1.']';
					}
					if($_POST['patEmail1']!='')
					{			
						$whereclause ='[staffid,=,'.$staffId.'][status,=,discharged][email,like,'.$patEmail1.'%](or)[staffid,=,'.$staffId.'][status,=,admitted][email,like,'.$patEmail1.'%]';
					}
					if($_POST['patContact1']!='')
					{			
						$whereclause ='[staffid,=,'.$staffId.'][status,=,discharged][mobileno1,=,'.$patContact1.'](or)[staffid,=,'.$staffId.'][status,=,admitted][mobileno1,=,'.$patContact1.']';
					}
					if($_POST['searchcaseno1']!='')
					{			
					$whereclause ='[staffid,=,'.$staffId.'][status,=,discharged][caseno,=,'.$searchcaseno1.'](or)[staffid,=,'.$staffId.'][status,=,admitted][caseno,=,'.$searchcaseno1.']';
					}
			}
		}
		
		
		if (isset ($_POST['durationtype']))
		$durationtype= $_POST['durationtype'];
		else
		if($durationtype='')
		{
			$duration['to'] ='';
			$duration['from'] ='';
		}
			if($durationtype == 'daily')
			{
				$duration['to'] = strtotime(date('d M Y'). "+24 hours");
				$duration['from'] = strtotime(date('d M Y'). "0 days");
			}
			if($durationtype == 'weekly'){
				$duration['to'] = strtotime(date('d M Y'). "+1 days");
				$duration['from'] = strtotime(date('d M Y'). "-7 days");
			}
			if($durationtype == 'monthly'){
				$duration['to'] = strtotime(date('d M Y'). "+1 days");
				$duration['from'] = strtotime(date('d M Y'). "-30 days");
			}
			if($durationtype == 'monthtodate'){
				$duration['to'] = strtotime(date('d M Y'). "+1 days");
				$duration['from'] = strtotime(date('d M Y'). "-1 year");
				
			}
			if($durationtype == 'yeartodate')
			{
				$duration['to'] = strtotime(date('d M Y'). "+1 days");
				$duration['from'] = strtotime(date('d M Y'). "-1 year");
			}
			if($durationtype == 'custom')
			{
				$from 	= $_POST['from'];
				$to	= $_POST['to'];
				$duration['to'] = strtotime($to. "+1 days");
				$duration['from'] = strtotime($from);
			}
			if($durationtype !='')
			{
				$whereclause=$whereclause."[displaydate, >= ,".date('d M Y',$duration['from'])."][displaydate, <= ,".date('d M Y',$duration['to'])."][staffid,=,".$staffId."]";
			}
		
			$table = "hospitalpatient";
			$columns = "displaydate,caseno,patientname,debitamount,creditamount";
			$groupby = '';
			$sidx = 'id'; 
			$sord = 'desc'; 		
			$jqgriddata=new Model_xjqgridgetdata;
			$result=$jqgriddata->exportdata(1,0,$sidx,$sord,$table,$columns,$whereclause,$groupby);
			
			$result[0][0]="Date";
			$result[0][1]="Caseno";
			$result[0][2]="Name";
			$result[0][3]="Debit";
			$result[0][4]="Credit";
			//$result[0][5]="Balance";

			$date = date_create();
			$date = date('Y_m_d_H_i');
			$i = 0;
						//var_dump($result);die;

			if($_POST['exportto'] == 'excel'){
				export::toexcel($result,'UsersList_'.$date.'.xls');
			}
			$this->display($errors,$messages,$whereclause,$hospitalid);	
			
			// else{
			// $errors['error'] = 'Could not search your query';
			// $this->display($errors,$messages,$whereclause,$hospitalid);
			// }
		}catch(Exception $e){throw new Exception($e);}
	}
	
	public function action_search(){
	try{
		$user = Auth::instance()->get_user();
		if (!$user){
			Request::current()->redirect('cuser/login');
		}			
		$userid=$user->id;
		$staffobj=ORM::factory('staff')->where('refstaffuserid_c','=',$userid)->find();
        $hospitalid=$staffobj->refhospitalid_c;
		$staffId=$staffobj->id;
		
		$errors = array();
		$messages = array();
		$whereclause = '';
		$checkboxbtn = $_POST['checkboxbtn'];
		$radiobtnvalue = $_POST['radiobtn'];
		$selectname = $_POST['selectname'];
		$searchcaseno = $_POST['searchcaseno'];
		$patName = $_POST['patName'];
		$patId = $_POST['patId'];
		$patContact = $_POST['patContact'];
		$patEmail = $_POST['patEmail'];
		$searchcaseno1 = $_POST['searchcaseno1'];
		$patName1 = $_POST['patName1'];
		$patId1 = $_POST['patId1'];
		$patContact1 = $_POST['patContact1'];
		$patEmail1 = $_POST['patEmail1'];
		
		if(isset ($_POST['radiobtn']))
		{			
			if(($_POST['radiobtn'])=="ipd")
			{
				$whereclause = '[staffid,=,'.$staffId.'][status,=,admitted](or)[staffid,=,'.$staffId.'][status,=,discharged]';
				if(($_POST['checkboxbtn'])=="active")
				{
					$whereclause ='[staffid,=,'.$staffId.'][status,=,admitted]';
					if($_POST['selectname']!='')
					{			
						$whereclause =$whereclause.'[patientname,like,'.$selectname.'%]';
					}
					if($_POST['searchcaseno']!='')
					{			
					$whereclause =$whereclause.'[staffid,=,'.$staffId.'][caseno,=,'.$searchcaseno.']';
					}
				}
			
				else if(($_POST['checkboxbtn'])=="all")
				{
					$whereclause = '[staffid,=,'.$staffId.'][status,=,admitted](or)[staffid,=,'.$staffId.'][status,=,discharged]';
					if($_POST['selectname']!='')
					{			
						$whereclause ='[staffid,=,'.$staffId.'][patientname,like,'.$selectname.'%]';
					}
					if($_POST['searchcaseno']!='')
					{			
					$whereclause ='[staffid,=,'.$staffId.'][caseno,=,'.$searchcaseno.']';
					}
				}
			}
			else if(($_POST['radiobtn'])=="opd")
			{
				$whereclause = '[staffid,=,'.$staffId.'][status,!=,admitted](or)[staffid,=,'.$staffId.'][status,=,OPD]';
					if($_POST['patName']!='')
					{			
						$whereclause ='[staffid,=,'.$staffId.'][status,!=,admitted][patientname,like,'.$patName.'%](or)[staffid,=,'.$staffId.'][status,=,OPD][patientname,like,'.$patName.'%]';
					}
					if($_POST['patId']!='')
					{			
						$whereclause ='[staffid,=,'.$staffId.'][status,!=,admitted][id,=,'.$patId.'](or)[staffid,=,'.$staffId.'][status,=,OPD][id,=,'.$patId.']';
					}
					if($_POST['patEmail']!='')
					{			
						$whereclause ='[staffid,=,'.$staffId.'][status,!=,admitted][email,like,'.$patEmail.'%](or)[staffid,=,'.$staffId.'][status,=,OPD][email,like,'.$patEmail.'%]';
					}
					if($_POST['patContact']!='')
					{			
						$whereclause ='[staffid,=,'.$staffId.'][status,!=,admitted][mobileno1,=,'.$patContact.'](or)[staffid,=,'.$staffId.'][status,=,OPD][mobileno1,=,'.$patContact.']';
					}
			}
			else
			{
				$whereclause = '[staffid,=,'.$staffId.'][status,=,discharged](or)[staffid,=,'.$staffId.'][status,=,admitted](or)[staffid,=,'.$staffId.'][status,=,OPD]';
					if($_POST['patName1']!='')
					{			
						$whereclause ='[staffid,=,'.$staffId.'][status,=,discharged][patientname,like,'.$patName1.'%](or)[staffid,=,'.$staffId.'][status,=,admitted][patientname,like,'.$patName1.'%](or)[staffid,=,'.$staffId.'][status,=,OPD][patientname,like,'.$patName1.'%]';
					}
					if($_POST['patId1']!='')
					{			
						$whereclause ='[staffid,=,'.$staffId.'][status,=,discharged][id,=,'.$patId1.'](or)[staffid,=,'.$staffId.'][status,=,admitted][id,=,'.$patId1.'](or)[staffid,=,'.$staffId.'][status,=,OPD][id,=,'.$patId1.']';
					}
					if($_POST['patEmail1']!='')
					{			
						$whereclause ='[staffid,=,'.$staffId.'][status,=,discharged][email,like,'.$patEmail1.'%](or)[staffid,=,'.$staffId.'][status,=,admitted][email,like,'.$patEmail1.'%](or)[staffid,=,'.$staffId.'][status,=,OPD][email,like,'.$patEmail1.'%]';
					}
					if($_POST['patContact1']!='')
					{			
						$whereclause ='[staffid,=,'.$staffId.'][status,=,discharged][mobileno1,=,'.$patContact1.'](or)[staffid,=,'.$staffId.'][status,=,admitted][mobileno1,=,'.$patContact1.'](or)[staffid,=,'.$staffId.'][status,=,OPD][mobileno1,=,'.$patContact1.']';
					}
					if($_POST['searchcaseno1']!='')
					{			
					$whereclause ='[staffid,=,'.$staffId.'][status,=,discharged][caseno,=,'.$searchcaseno1.'](or)[staffid,=,'.$staffId.'][status,=,admitted][caseno,=,'.$searchcaseno1.'](or)[staffid,=,'.$staffId.'][status,=,OPD][caseno,=,'.$searchcaseno1.']';
					}
			}
		}
		
		
		if (isset ($_POST['durationtype']))
		$durationtype= $_POST['durationtype'];
		else
		if($durationtype='')
		{
			$duration['to'] ='';
			$duration['from'] ='';
		}
		if($durationtype == 'daily')
			{
				$duration['to'] = strtotime(date('d M Y'). "+24 hours");
				$duration['from'] = strtotime(date('d M Y'). "0 days");
				
			}
			if($durationtype == 'weekly'){
				$duration['to'] = strtotime(date('d M Y'). "+1 days");
				$duration['from'] = strtotime(date('d M Y'). "-7 days");

			}
			if($durationtype == 'monthly'){
				$duration['to'] = strtotime(date('d M Y'). "+1 days");
				$duration['from'] = strtotime(date('d M Y'). "-30 days");
			}
			if($durationtype == 'monthtodate'){
				$duration['to'] = strtotime(date('d M Y'). "+1 days");
				$duration['from'] = strtotime(date('d M Y'). "-1 year");
				
			}
			if($durationtype == 'yeartodate'){
				$duration['to'] = strtotime(date('d M Y'). "+1 days");
				$duration['from'] = strtotime(date('d M Y'). "-1 year");
				
			}
			if($durationtype == 'custom'){
				//$type 	= $_POST['type'];
				$from 	= $_POST['from'];
				$to	= $_POST['to'];
				$duration['to'] = strtotime($to. "+1 days");
				$duration['from'] = strtotime($from);
				
			}
			if($durationtype !=''){
				$whereclause=$whereclause."[displaydate, >= ,".date('d M Y',$duration['from'])."][displaydate, <= ,".date('d M Y',$duration['to'])."][staffid,=,".$staffId."]";
						// $this->display($errors,$messages,$whereclause);
					}
		
			$errors['error'] = 'Could not search your query';
			$patId = $_POST['patId'];
			$patName = $_POST['patName'];
			$patContact = $_POST['patContact'];
			$patEmail = $_POST['patEmail'];
			
			$this->display($errors,$messages,$whereclause,$hospitalid);
		}catch(Exception $e){throw new Exception($e);}
	}
	private function display($errors, $messages, $whereclause,$hospitalid){
			$durationtype=$_POST['durationtype'];
			$radiobtnvalue = $_POST['radiobtnvalue'];
			$content = View::factory('vuser/vcashier/vcashierdashboard');
			$docnamearray=array();
			$array_status= array();
			$previousvalues="";
			$objUser = Auth::instance()->get_user();
			$userId = $objUser->id;
			$objStaff = ORM::factory('staff')->where('refstaffuserid_c','=',$userId)->find();
			$staffId=$objStaff->id;
			$hospitalid=$objStaff->refhospitalid_c;

	    	$rcptId = rcpttransaction::getLatestRcptId($hospitalid);
	    	$header_cashier=$objStaff->header_c;
			$footer_cashier=$objStaff->footer_c;
			 // var_dump($whereclause);
			$content->bind('header_cashier',$header_cashier);
			$content->bind('footer_cashier',$footer_cashier);
			$content->bind('hospitalid',$hospitalid);
			$content->bind('errors',$errors);
			$content->bind('messages',$messages);
			$content->bind('rcptId',$rcptId);
			$content->bind('whereclause',$whereclause);
			$content->bind('radiobtnvalue',$radiobtnvalue);
			$content->bind('previousvalues',$previousvalues);
			$this->template->content = $content;
	}
	
	public function action_viewbill()
	{
		$patientsid=$_GET['id'];
		//$bednumber=$_GET['bednumber'];
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
			//$patuser = ORM::factory('hospitalpatient')->where('id','=',$patientsid)->find();
			$patuser = ORM::factory('admittedpatient')->where('id','=',$patientsid)->find();
			$user = ORM::factory('ipdpatientsdetail')->where('patientsid','=',$patientsid)
													 ->where('refid','=',$caseno)
													 ->find();
			 $hospital_id = ORM::factory('hospital')->where('id','=',$hospitalid)->find();
			$hospid=$hospital_id->refuserid_c;
			
		//Ward Details
		
			$namearray=array();
			$ward=array();
			/*$objgeneral = ORM::factory('wardbedroomdetail')->where('hospitalid','=',$hospitalid)
													   ->where('statusflag','=','Active')
													   ->group_by('wardname')
													   ->find_all();*/
			$objgeneral = ORM::factory('hospitalward')->where('refhospitalid','=',$hospitalid)
								->find_all();
		 	foreach ($objgeneral as $wardvalue)
		 	 {	
				$namearray['wardname']=$wardvalue->wardname;
				$namearray['wardid']=$wardvalue->iohID;
				//$namearray['wardlist']=$this->getgeneralList($namearray['wardid'],$hospitalid);
				array_push($ward, $namearray);
		  	}		
		  	$referer = $_SERVER['HTTP_REFERER'];
			
			if(!strpos($referer,'viewbill')){
				$referer = "/ayushman/ccashierdashboard/view";
			}	
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
			$content->bind('result', $result);
			$content->bind('mobileno1',$mobileno);
			$content->bind('age',$age);
			$content->bind('gender',$gender);
			$content->bind('hospitalid',$hospid);
			$content->bind('header_cashier',$header_cashier);
			$content->bind('footer_cashier',$footer_cashier);
			$content->bind('ward',$ward);
			$content->bind('referer',$referer);
			$this->template->content= $content;
		}catch(Exception $e){throw new Exception($e);}
	}

	function getipdbills($refid, $admitdate_c, $currentdate, $patientsid)
	{
		try{
			$objUser = Auth::instance()->get_user();
			if (!$objUser){
				Request::current()->redirect('cuser/login');
			}			
			$page = "1"; 
			$limit = "15"; 
			$sidx = "tdate"; 
			$sord = 'asc'; 	
			$columns='patid,tdate,testname,amt,quantity,totalamt,rcptno,amt,amt,pdffilename,flag,testid,wardid';
			$whereclause="[patid,=,$patientsid]";
			$groupby="";
			$class="IPDpatientsService";
			$data='[caseno:'.$refid.'][admitdate:'.$admitdate_c.'][dischargedate:'.$currentdate.'][patid:'.$patientsid.']';
				$class = new helper_datagenerator($page,$limit,$sidx,$sord,$class,$columns,$whereclause,$groupby,$data);
			$result = $class->exportdata();
			return $result;
		}catch(Exception $e){throw new Exception($e);}
	}
	function getaccount($caseno, $id, $hospuserid, $staffid)
	{
		try{
			$objUser = Auth::instance()->get_user();
			if (!$objUser){
				Request::current()->redirect('cuser/login');
			}			
			$page = "1"; 
			$limit = "15"; 
			$sidx = ""; 
			$sord = ''; 	
			$columns='accountuserid,billcaseno,rcptcaseno,transdate,transtype,billno,credit,rcptno,debit,rcptpdffilename,statementcode,accountuseridto,billpdffilename,bedid';
			$whereclause="[accountuserid,=,$id][cashflag,=,1]";
			$groupby="";
			$class="hospbillrcpt";
			$data='[caseno:'.$caseno.'][patientuserid:'.$id.'][hospitaluserid:'.$hospuserid.'][staffid:'.$staffid.']';
			$class = new helper_datagenerator($page,$limit,$sidx,$sord,$class,$columns,$whereclause,$groupby,$data);
			$result = $class->exportdata();
			return $result;
		}catch(Exception $e){throw new Exception($e);}
	}
}
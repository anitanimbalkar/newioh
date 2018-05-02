<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');

class Controller_Cpathologistorder extends Controller_Ctemplatewithmenu  {
	public function action_ordertest()
	{		$i=0;
			$tests=json_decode($_GET["test"]);
			$requestdate =$_GET["reqdate"];
			$testid = $_GET["testid"];
			$rate = $_GET["rate"];
			$patid = $_GET["patid"];
			$objUser = Auth::instance()->get_user();
			$userId = $objUser->id;
			$objpatient = ORM::factory('patient')->where('id','=',$patid)->find();
			$patientid = $objpatient->repatientsuserid_c;
			$objpathologist = ORM::factory('pathologist')->where('refpathologistsuserid_c','=',$userId)->find();
			$pathologistId=$objpathologist->id;
			var_dump($tests);
			$objtestorder = ORM::factory('diagnosticlabsorder');
				$objtestorder->orderrequestdate_c=date('Y-m-d',strtotime($requestdate));
				$objtestorder->status_c = 'requested'; 
				$objtestorder->orderdate_c =date('Y-m-d'); 
				$objtestorder->refdiaglabsorderspathologistsid_c =$pathologistId; 
				$objtestorder->save();
				$orderid = $objtestorder->id;//get order id 

				//$testid=$tests[1];
			foreach ($tests as $order) {
				
				$objtest = ORM::factory('orderedtest');
					
					$objtest->testid_c= $testid;
					$objtest->diagnosticlabsorderid_c= $orderid;
					$objtest->customeruserid_c= $patientid;
					$objtest->rate_c= $tests[$i][1];
					$objtest->status_c= "requested";
					$objtest->save();
					$i++;
				}
				//echo $objtestorder;
					die();
	}

	public function action_gettestsusingtestid()
	{
		try
		{
			$objUser = Auth::instance()->get_user();
			$userId = $objUser->id;
			$objpathologist = ORM::factory('pathologist')->where('refpathologistsuserid_c','=',$userId)->find();
			$pathologistId=$objpathologist->id;
			
			$testid = $_GET['testid'];
			$objtests = ORM::factory('pathologistcatalog')->where('test_code','=',$testid )
														  ->where('refpathcatalogpathologistsid_c','=',$pathologistId )
														  ->find_all();
			$tests = array();
			$i = 0;
			foreach($objtests as $test)
			{
				$tests[$i] = array();
				$testmasters = ORM::factory('pathologistcatalog')->where('test_code','=',$testid)->find();
				$tests[$i]["id"] = $testmasters->test_code;
				$tests[$i]["testname"] = $testmasters->test_name;
				$tests[$i]["pathologistid"]= "";
				$tests[$i]["rate"]=  $this->gettestrate($testid,$pathologistId);
				//$tests[$i]["pathologistList"]= $this->getmynetworkpathologists();
				$i = $i + 1;
			}
			die(json_encode($tests));
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
	}
	
	public function action_editorder()
	{
			$requestdate = $_GET["date"];
			$tests=json_decode($_GET['test']);
			$orderid = $_GET["orderid"];
			$editreason = $_GET["editreason"];
			$patid = $_GET["patid"];
			$objUser = Auth::instance()->get_user();
			$userId = $objUser->id;
			$objpatient = ORM::factory('patient')->where('id','=',$patid)->find();
			$patientid = $objpatient->repatientsuserid_c;
			$objtestorder = ORM::factory('diagnosticlabsorder')->where('id','=',$orderid)->find();
				$objtestorder->orderrequestdate_c=date('Y-m-d',strtotime($requestdate));
				$objtestorder->status_c = 'edited'; 
				$objtestorder->editreason_c = $editreason; 
				$objtestorder->update();
// var_dump($objtestorder);
				$testid=$tests[0];
			foreach ($testid as $order) {
				
				$objtest = ORM::factory('orderedtest');
					
					$objtest->testid_c= $order[0];
					$objtest->diagnosticlabsorderid_c= $orderid;
					$objtest->customeruserid_c= $patientid;
					$objtest->rate_c= $order[1];
					$objtest->status_c= "edited";

					$objtest->save();
				}
				echo $objtestorder;
					die();
	}

	public function action_addtestusingorderid()
	{

			$testid = $_GET["testid"];
			$patid = $_GET["patid"];
			$orderid = $_GET["orderid"];
			$objUser = Auth::instance()->get_user();
			$userId = $objUser->id;
			$objpatient = ORM::factory('patient')->where('id','=',$patid)->find();
			$patientid = $objpatient->repatientsuserid_c;
			
			$objtest = ORM::factory('orderedtest');
					
					$objtest->testid_c= $testid;
					$objtest->diagnosticlabsorderid_c= $orderid;
					$objtest->customeruserid_c= $patientid;
					$objtest->save();
					die();

	}

	public function action_selectsearchandorder()
	{
		if( $_POST)
		{
			$patid = $_POST['patid'];
			$orderid = $_POST["orderid"];
			$where = $_POST['search'];
		}
		else
		{
			$patid = $_GET["patid"];
			$orderid = $_GET["orderid"];
			$where="";
		}
		$this->displaytest($where,$patid,$orderid);
	}

	private function displaytest($where,$patid,$orderid)
	{
		try
		{	
			$objUser = Auth::instance()->get_user();
			$userid = $objUser->id;
			$objpathologist = ORM::factory('pathologist')->where('refpathologistsuserid_c','=',$userid)->find();
			$pathologistId=$objpathologist->id;
				
				// $number = ORM::factory('cart')->where('refconsumeruserid_c', '=', $userid)->where('status_c','=','pending')->count_all();
				$viewname = 'vselecttest';
				$viewpath ='vuser/vpathologist/'.$viewname;
				$content = View::factory($viewpath);
				$content->bind('pathologistId', $pathologistId);
				// $content->bind('number',$number);
				$content->bind('where',$where);
				if($where!="")
					$whereclause = "[test_name,like,$where][refpathcatalogpathologistsid_c,=,$pathologistId]";
				else
				 	$whereclause="[refpathcatalogpathologistsid_c,=,$pathologistId]";
				$content->bind('whereclause',$whereclause);
				$content->bind('patid',$patid);
				$content->bind('orderid',$orderid);
				$breadcrumb = "Home>>";
				$this->template->breadcrumb = $breadcrumb;
				$this->template->content = $content;
				
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
	
	}
	public function action_selecttest()
	{
		try
		{
			$patid = $_GET["patid"];
			$orderid = $_GET["orderid"];
			$objUser = Auth::instance()->get_user();
				$userid = $objUser->id;
	
				$viewname = 'vselecttest';
				$viewpath ='vuser/vpathologist/'.$viewname;
				$content = View::factory($viewpath);
				$content->bind('userid', $userid);
				// $content->bind('number',$number);
				$content->bind('where',$where);
				if($where!="")
					$whereclause = "[test_name,like,$where][refpathcatalogpathologistsid_c,=,$userid]";
				else
				 	$whereclause="";
				$content->bind('whereclause',$whereclause);
				$Objtestcategorymaster = ORM::factory('pathologistcatalog')->where('refpathcatalogpathologistsid_c', '=', $userid)->find();
				$arrayTestcatagarty=array();
				foreach($Objtestcategorymaster  as $testcategorymaster)
				{
					array_push($arrayTestcatagarty,$testcategorymaster->test_name);
				}
				$content->bind('arrayTestcatagarty',$arrayTestcatagarty);
				$content->bind('patid',$patid);
				$content->bind('orderid',$orderid);
				$breadcrumb = "Home>>";
				$this->template->breadcrumb = $breadcrumb;
				$this->template->content = $content;
				// $this->template->user =  $objUser->Firstname_c;
				// $this->template->urole = $urole;
			
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
	
	}

	public function action_removetest()
	{
		try{
			$orderid = $_GET['orderid'];
			$patid = $_GET['patid'];
			$testid = $_GET['testid'];
			$objUser = Auth::instance()->get_user();
			$userid = $objUser->id;
			$objpatient = ORM::factory('patient')->where('id','=',$patid)->find();
			$patientid = $objpatient->repatientsuserid_c;
			
			if($testid != "")
			{
			$objtest = ORM::factory('orderedtest')->where('diagnosticlabsorderid_c','=',$orderid)
												   ->where('customeruserid_c','=',$patientid)
												   ->where('testid_c','=',$testid)
												   ->find();
					
					$objtest->status_c= 'remove';
					$objtest->save();
				
			}
			die();
		} catch (Exception $e) {
			throw new Exception($e);
		}
	}
	

	public function action_removeorder()
	{
		try{
			$arr_accounts = include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/config/accounts.php');
			$orderid = $_GET['orderid'];
			 $patid = $_GET['patid'];
			// $testid = $_GET['testid'];
			$objUser = Auth::instance()->get_user();
			$userid = $objUser->id;
			$objpatient = ORM::factory('patient')->where('id','=',$patid)->find();
			$patientid = $objpatient->repatientsuserid_c;
			
			$objtest = ORM::factory('diagnosticlabsorder')->where('id','=',$orderid)
														  ->find();
			if($objtest->status_c == 'accepted')
			{
					$from_account 	= ORM::factory('billingaccount')->where('refaccountuserid_c','=',$arr_accounts['provisionaccountuserid'])->find()->accountcode_c;
			
					$to_account 	= ORM::factory('billingaccount')->where('refaccountuserid_c','=',$patientid)->find()->accountcode_c;
			
				if($objtest->cashpaymentflag_c == 0)
				{	
					if($objtest->paid_c)
					{
						$amount = $objtest->rate_c;
						$result = transaction::transfer($from_account,$to_account,1,$objtest->rate_c,8);
						$objtest->status_c= 'rejected';
						$objtest->save();
					}
				}
			}
			else
			{
					$objtest->status_c= 'rejected';
					$objtest->save();
				
			}
					$objtest->status_c= 'remove';
					$objtest->save();
			
			die();
		} catch (Exception $e) {
			throw new Exception($e);
		}
	}
	

	public function action_gettestsdatausingorderid()
	{
		try
		{
			$orderid = $_GET['orderid'];
			$patid = $_GET['patid'];
			$objUser = Auth::instance()->get_user();
			$userid = $objUser->id;
			$objpatient = ORM::factory('patient')->where('id','=',$patid)->find();
			$patientid = $objpatient->repatientsuserid_c;
			
			$objtests = ORM::factory('orderedtest')->where('diagnosticlabsorderid_c','=',$orderid)->where('customeruserid_c','=',$patientid)->find_all();
			$tests = array();
			$i = 0;
			//var_dump($orderid);
			foreach($objtests as $test)
			{
				$tests[$i] = array();
				$testmasters = ORM::factory('testmaster')->where('id','=',$test->testid_c)->find();
				$tests[$i]["id"] = $testmasters->id;
				$tests[$i]["testname"] = $testmasters->testname_c;
				$objdiagnosticlabsorders =ORM::factory('diagnosticlabsorder')->where('id','=',$orderid)->find();
				if($objdiagnosticlabsorders->refdiaglabsorderspathologistsid_c != NULL)
				{
					$pathologistid= $objdiagnosticlabsorders->refdiaglabsorderspathologistsid_c;
					$tests[$i]["pathologistid"]= $pathologistid;
					$testID= $testmasters->id;
					$tests[$i]["originalrate"] = $this->gettestrate($testID,$pathologistid);
					
					$discount = new helper_Discount();
					$tests[$i]["rate"] =  $tests[$i]["originalrate"] * (100 - $discount->getDiscount($pathologistid,$testID))/100;
					
				}
				else
				{
					$tests[$i]["pathologistid"]= "";
					$tests[$i]["rate"]= "Not provided";
				}
				$tests[$i]['previoustestrate']= $test->rate_c;
				$objdiagnosticlabsorders =ORM::factory('diagnosticlabsorder')->where('id','=',$orderid)->find();
				$tests[$i]['totalorderrate']=$objdiagnosticlabsorders->rate_c;
				$i = $i + 1;
			}
			
			die(json_encode($tests));
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
	
	}
	

	private function gettestrate($testid,$pathologistid)
	{
		try
		{
			$objCatalog = ORM::factory('pathologistcatalog')->where('refpathcatalogtestid_c','=',$testid)->where('refpathcatalogpathologistsid_c','=',$pathologistid)->find();
			if($objCatalog->id != NULL)
			{
				return $objCatalog->test_rate_c;
			}
			else
			{
				return "Not provided";
			}
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
	}
	public function action_displaytest()
	{
		$patid = $_GET['patid'];
		$where="";
				
		$this->displaysearchandorderorderedtests($where,$patid);
	}
	public function action_searchandorder()
	{
		if( $_POST)
		{
		$patid = $_POST['patid'];
		$where = $_POST['search'];
		}
		else{
			$patid = $_GET['patid'];
		    $where="";
			
		}
		$this->displaysearchandorderorderedtests($where,$patid);
	}


	function gettest($pathologistId,$where)
	{
			
		$page = "1"; 
        $limit = "15"; 
		$sidx = "test_name"; 
		$sord = 'asc'; 	
		$columns='refpathcatalogtestid_c,test_name,test_rate_c,discountpercent_c';
		if($where!="")
			{
			$whereclause="[refpathcatalogpathologistsid_c,=,$pathologistId][test_name,=,$where]";
			}else
			{
			$whereclause="[refpathcatalogpathologistsid_c,=,$pathologistId]";
			}
		$groupby="";
		$table="pathologistcatalog";
		$jqgriddata=new Model_xjqgridgetdata;
			$result=$jqgriddata->exportdata($page,$limit,$sidx,$sord,$table,$columns,$whereclause,$groupby);
			return $result;
	}

	private function displaysearchandorderorderedtests($where,$patid)
	{
		try
		{
				$objUser = Auth::instance()->get_user();
				if (!$objUser)
					Request::current()->redirect('cuser/login');
						
				$userid = $objUser->id;
				$objpathologist = ORM::factory('pathologist')->where('refpathologistsuserid_c','=',$userid)->find();
				$pathologistId=$objpathologist->id;
				$result=$this->gettest($pathologistId,$where);
				$viewname = 'vpathcatalog';
				$viewpath ='vuser/vpathologist/'.$viewname;
				$content = View::factory($viewpath);
				$content->bind('pathologistId', $pathologistId);
				$content->bind('patid',$patid);
				$content->bind('result',$result);
				$breadcrumb = "Home>>";
				$this->template->breadcrumb = $breadcrumb;
				$this->template->content = $content;
				$this->template->user =  $objUser->Firstname_c;
			
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
	}
	
public function action_searchForPatientbypathologist(){
		try{
			// Do not search whole database 
			// Search for the patient that are registered by pathologist and the 
			
			$objUser = Auth::instance()->get_user();
			if (!$objUser)
				Request::current()->redirect('cuser/login');
			$patId = $_GET["patId"];
			$userId = $objUser->id;
			$objpathologist = ORM::factory('pathologist')->where('refpathologistsuserid_c','=',$userId)->find();
			$pathologistId=$objpathologist->id;
			
			$patObjs = ORM::factory('patientbypathologist')->where('pathologistid','=',$pathologistId)->find();
			
			if(isset($_GET["patId"]) && $_GET["patId"] !== '' ){
				$patId = $_GET["patId"];
				if($patId !== ''){
					$patObjs =$patObjs->where('patientuserid', '=', $patId)->where('pathologistid','=',$pathologistId);
				}	
			}else{
				if(isset($_GET["patName"])){
					$patName = $_GET["patName"];
					if($patName !== ''){
						$patObjs = $patObjs->where('firstname', 'like', '%'.$patName.'%')->where('pathologistid','=',$pathologistId);
					}
				}	
				if(isset($_GET["patLastName"])){
					$patLastName = $_GET["patLastName"];
					if($patLastName !== ''){
						$patObjs = $patObjs->where('lastname', 'like', '%'.$patLastName.'%')->where('pathologistid','=',$pathologistId);
					}				
				}	
				if(isset($_GET["patContact"])){
					$patContact = $_GET["patContact"];
					if($patContact !== ''){
						$patObjs = $patObjs->where('mobileno1', 'like', '%'.$patContact.'%')->where('pathologistid','=',$pathologistId);
					}	
				}
				if(isset($_GET["patEmail"])){
					$patEmail = $_GET["patEmail"];
					if($patEmail !== ''){
						$patObjs = $patObjs->where('email', 'like', '%'.$patEmail.'%')->where('pathologistid','=',$pathologistId);
					}	
				}
				if(isset($_GET["patId"])){
					$patId = $_GET["patId"];
					if($patEmail !== ''){
						$patObjs = $patObjs->where('patientuserid', 'like', '%'.$patId.'%')->where('pathologistid','=',$pathologistId);
					}	
				}
				$dob = '--';
				if(isset($_GET["dob"])){
					$dateInfo = date_parse_from_format('d M Y', trim($_GET['dob']));
					$dob = $dateInfo['year'].'-'.$dateInfo['month'].'-'.$dateInfo['day'];
					if($dob != '--'){
						$patObjs = $patObjs->where('dob', '=', $dob)->where('pathologistid','=',$pathologistId);
					}
				}
			}

			$patObjs = $patObjs->find_all();
			$searchResults = array();
			foreach($patObjs as $patObj){
					$searchResult = array();
					$searchResult["name"] = $patObj->patientname;
					$searchResult["contact"] = $patObj->mobileno1 != null?$patObj->mobileno1:'Not Provided';
					$searchResult["id"] = $patObj->patientuserid;
					if($patObj->dob != '0000-00-00'){
						$searchResult["dob"] = date("d M Y", strtotime($patObj->dob));
					}else{
						$searchResult["dob"] = 'Not Provided';
					}
					//$searchResult["photo"] = $patObj->photo_c;
					array_push($searchResults, $searchResult);
				}
			die(json_encode($searchResults));
		}
		catch(Exception $e){throw new Exception($e);}	
	}

	public function action_edittestorder()
	{
		try
		{
			$objUser = Auth::instance()->get_user();
			if (!$objUser)
				Request::current()->redirect('cuser/login');
			
			if(isset($_GET["orderid"]))
				$orderid = $_GET["orderid"];
			$where = "";
			$userid = $objUser->id;
			$objpathologist = ORM::factory('pathologist')->where('refpathologistsuserid_c','=',$userid)->find();
			$pathologistId=$objpathologist->id;
			$result=$this->gettest($pathologistId,$where);
			$viewname = 'vpathcatalogedit';
			$viewpath ='vuser/vpathologist/'.$viewname;
			$content = View::factory($viewpath);
			$content->bind('pathologistId', $pathologistId);
			
			//--------------------------------------------------------//
			// Get order details for the orderid and pass to view     //
			$objLaborder = ORM::factory("diagnosticlabsorder")
							->where("id","=",$orderid)->find();
			
			$atcenterflag = $objLaborder->atcenterflag_c;
			$status = $objLaborder->status_c ;
			$requestdate = date_format(date_create($objLaborder->orderrequestdate_c),"d M Y");
			
			$objOrderDetails = ORM::factory("orderedtest")
							->where("diagnosticlabsorderid_c","=",$orderid)->find_all();
			$nameArray = [0];
			$idArray = [0];
			$rateArray = [0];
			$nameStr = "0";
			$idStr = "0";
			$rateStr = "0";
			$i = 1;
			foreach ( $objOrderDetails as $objOrder)
			{				
				$objpathCatalog = ORM::factory("pathologistcatalog")
									->where ("refpathcatalogtestid_c","=",$objOrder->testid_c)
									->where ("refpathcatalogpathologistsid_c","=",$pathologistId)
									->find();
				if ($objpathCatalog->id != null)
				{									
					$patid = $objOrder->customeruserid_c;
					$idArray[$i]= $objOrder->testid_c;
					$idStr = $idStr.",".$objOrder->testid_c;
				
					$rateArray[$i] = $objOrder->rate_c;
					$rateStr = $rateStr.",".$objOrder->rate_c;
				
					$nameArray[$i] = $objpathCatalog->test_name;
					$nameStr = $nameStr."***".$objpathCatalog->test_name;
					$i++;
				}
			}
			$content->bind('atcenterflag',$atcenterflag);
			$content->bind('status',$status);
			$content->bind('requestdate',$requestdate);
			$content->bind('idArray',$idArray);
			$content->bind('rateArray',$rateArray);
			$content->bind('nameArray',$nameArray);
			$content->bind('orderid',$orderid);
		
			$content->bind('idStr',$idStr);
			$content->bind('rateStr',$rateStr);
			$content->bind('nameStr',$nameStr);
		
			$content->bind('patid',$patid);
			$content->bind('result',$result);
			$breadcrumb = "Home>>";
			$this->template->breadcrumb = $breadcrumb;
			$this->template->content = $content;
			$this->template->user =  $objUser->Firstname_c;
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
	}
}
?>
<?php defined('SYSPATH') or die('No direct script access.');
require_once('simple_html_dom.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/notificationsender.php');

class Controller_Cpathologist extends Controller {
	public function action_getpathologists()
	{
		$objpathologist = ORM::factory('pathologist');
		$objpathologists = $objpathologist->find_all();
		$pathologists = array();
		$i = -1;
		foreach($objpathologists as $pathologist)
		{
			$i=$i + 1;
			$pathologists[$i]  = array();
			$pathologists[$i][0] = $pathologist->id; 
						
			$objuser = ORM::factory('user')->where('id','=',$pathologist->refpathologistsuserid_c)->find();
			$pathologists[$i][1] = $pathologist->nameofcenter_c; 
		}
		die(json_encode($pathologists));
	}
	
	// Allow users to book order with / without paying online.
	public function action_setpermission()
	{
		if($_POST){
			$objpathologist = ORM::factory('pathologist')->where('refpathologistsuserid_c','=',Auth::instance()->get_user()->id)->find();
			$objpathologist->onlinepayment_c = $_POST['flag'];
			$objpathologist->save();
			die('done');
		}else{
			die('Access denied');
		}
		
	}
	
	public function action_getmypathologists()
	{
		if(isset($_GET['pid'])){
			$user = ORM::factory('user')->where('id','=',$_GET['pid'])->find();
		}else{
			$user = Auth::instance()->get_user();
		}
		
		$patient = ORM::factory('patient')->where('repatientsuserid_c','=',$user->id)->find();
		$objpathologists = ORM::factory('favouritepathologistsbypatientdetail')->where('roleid','=',$patient->id)->order_by('priority','asc')->find_all();
		
		
		$pathologists = array();
		$i = -1;
		foreach($objpathologists as $pathologist)
		{
			$i=$i + 1;
			$pathologists[$i]  = array();
			$pathologists[$i][0] = $pathologist->pathologistid; 
			$pathologists[$i][1] = ucwords($pathologist->pathologistname); 
			$pathologists[$i][2] = ucwords($pathologist->city_c); 
			$pathologists[$i][3] = ucwords($pathologist->location_c); 
			$pathologists[$i][4] = ucwords($pathologist->pickupfacility_c) == 'True' ? 'Available':'Not Available';;  
		}
		die(json_encode($pathologists));
	}
	public function action_getdoctorpathologists()
	{
		$user = Auth::instance()->get_user();
		
		$doctor = ORM::factory('doctor')->where('refdoctorsid_c','=',$user->id)->find();

		$objpathologists = ORM::factory('favoritepathologistsbydoctor')->where('reffavpathdoctorsid_c','=',$doctor->id)->order_by('prefered_c','Asc')->find_all();
		
		$pathologists = array();
		$i = -1;
		foreach($objpathologists as $pathologist)
		{
			$objPathologist = ORM::factory('pathologist')->where('id','=',$pathologist->reffavpathpathologistsid_c)->find();
			$user = ORM::factory('user')->where('id','=',$objPathologist->refpathologistsuserid_c)->find();
			$address = ORM::factory('address')->where('id','=',$user->refaddresswork_c)->find();
			
			$i=$i + 1;
			$pathologists[$i]  = array();
			$pathologists[$i][0] = $objPathologist->id; 
			$pathologists[$i][1] = ucwords($objPathologist->nameofcenter_c); 
			$pathologists[$i][2] = ucwords($address->city_c); 
			$pathologists[$i][3] = ucwords($address->location_c); 
			$pathologists[$i][4] = ucwords($objPathologist->homedeliveryfacility_c) == 'True' ? 'Available':'Not Available';;  
		}
		die(json_encode($pathologists));
	}
	
	public function action_getallpathologists()
	{
		// Exclude pathologist defined for the hospital
		$hospitalid = NULL;
		$user = Auth::instance()->get_user();
		if (($user->has('roles', ORM::factory('role', array('name' => 'staff')))) OR
		($user->has('roles', ORM::factory('role', array('name' => 'ipdstaff')))) )
		{
			// Select hospitalid from staffs table
			$objstaff = ORM::factory('staff')->where('refstaffuserid_c','=',$user->id)->find();
			$hospitalid =	$objstaff->refhospitalid_c;
		}
		elseif ($user->has('roles', ORM::factory('role', array('name' => 'doctor'))))
		{
				// Select hospitalid from doctors table
			$objdoctor = ORM::factory('doctor')->where('refdoctorsid_c','=',$user->id)->find();
			$hospitalid =	$objdoctor->refhospitalid_c;
		}
		
		$objpathologist = ORM::factory('pathologist');
		$objpathologists = $objpathologist
										->join('users')->on('pathologist.refpathologistsuserid_c','=','users.id')
										->join('favoritepathologistsbydoctors','LEFT')->on('pathologist.id','=','favoritepathologistsbydoctors.reffavpathpathologistsid_c')
										->where('users.activationstatus_c','=','active')
										->where('pathologist.refhospitalid_c','<=>',$hospitalid)
										->order_by('favoritepathologistsbydoctors.prefered_c','Asc')
										->find_all();
		$pathologists = array();
		$i = -1;
		foreach($objpathologists as $pathologist)
		{
			$i=$i + 1;
			$pathologists[$i]  = array();
			$pathologists[$i]['pathologistid'] = $pathologist->id; 
			$pathologists[$i]['pathologistuserid'] = $pathologist->refpathologistsuserid_c; 
			$pathologists[$i]['centername'] = $pathologist->nameofcenter_c; 
			$pathologists[$i]['homepickeup'] = ucwords($pathologist->homedeliveryfacility_c) == 'True' ? 'Available':'Not Available'; 
			$pathologists[$i]['areacovered'] = $pathologist->areacoverforhomedelivery_c; 
			
			$user = ORM::factory('user')->where('id','=',$pathologist->refpathologistsuserid_c)->find();
			$address = ORM::factory('address')->where('id','=',$user->refaddresswork_c)->find();
			$pathologists[$i]['city'] = ucwords($address->city_c); 
			$addressline = ucwords($address->line1_c) == ""?"":ucwords($address->line1_c).', ';
			$nearlandmark = ucwords($address->nearlandmark_c) == ""?"":ucwords($address->nearlandmark_c).', ';
			$location = ucwords($address->location_c) == ""?"":ucwords($address->location_c);
			$pathologists[$i]['location'] = $addressline.$nearlandmark.$location; 
		}
		die(json_encode($pathologists));
	}

	public function action_getdocname()
	{
		$id = $_GET["orderid"];
		
		$docuserid = ORM::factory('orderedtest')->where('diagnosticlabsorderid_c','=',$id)->find()->refdoctoruserid_c;
		
		if($docuserid){
			$docuser = ORM::factory('user')->where('id','=',$docuserid)->find();
			$referenceby = 'Dr. '.$docuser->Firstname_c.' '.$docuser->lastname_c;
			}
		else{$referenceby ='Self';}
		echo $referenceby;
		die;
	}
	
	public function action_acceptorder()
	{
		$obj_user 		= Auth::instance()->get_user();
		if (!$obj_user)
				Request::current()->redirect('cuser/login');
			
		$arr_accounts	= include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/config/accounts.php');
		$id 			= $_GET["id"];
		$date 			= $_GET["date"];
		$time 			= strtotime( $date );
		$date 			= date( 'y-m-d', $time );

		$objorder = ORM::factory('diagnosticlabsorder')->where('id','=',$id)->find();
		
		if($objorder->status_c == 'requested')
		{
			//Create billing account -start
			$objAccounts=ORM::factory('billingaccount');
			$objAccounts = $objAccounts->where('refaccountuserid_c','=',$obj_user->id)->find();
			if($objAccounts->id == '')
			{
				$objAccounts=ORM::factory('billingaccount');
				$objAccounts->accountcode_c 		= 'IOH'.rand(10000,99999);
				$objAccounts->refaccountuserid_c 	= $obj_user->id;
				$objAccounts->createddate_c 		= date('Y-m-d g:i:s a');
				$objAccounts->debitedamount_c 		= 0;
				$objAccounts->creditedamount_c 		= 0;
				$objAccounts->netbalance_c	 		= 0;
				$objAccounts->lastupdateddate_c		= date('Y-m-d g:i:s a');
				$objAccounts->lastupdatedby_c 		= $obj_user->id;
				$objAccounts->save();
				$postfix = '';
				for($i=0;$i<(10-strlen($objAccounts->id));$i++)
				{
					$postfix = $postfix.'0';
				}
				$accountcode = 'IOH'.$postfix.$objAccounts->id;

				$objAccounts->accountcode_c			= $accountcode;	
				$objAccounts->update();
			}
			
			//create billing account - end
			$from_account 	= ORM::factory('billingaccount')->where('refaccountuserid_c','=',$arr_accounts['provisionaccountuserid'])->find()->accountcode_c;
			$to_account 	= ORM::factory('billingaccount')->where('refaccountuserid_c','=',$obj_user->id)->find()->accountcode_c;
	
		if($objorder->cashpaymentflag_c == 0)
		{
			if($objorder->paid_c){
				$amount = $objorder->rate_c;
				$result = transaction::transfer($from_account,$to_account,1,$objorder->rate_c,8);
				if($result['type'] == "success"){
					$objorder->orderrequestdate_c = $date;
					$objorder->status_c = 'accepted'; 
					$objorder->update();
					//send notification
					
					$obj_orderedtest= ORM::factory('orderedtest')
						->where('diagnosticlabsorderid_c','=',$objorder->id)
						->find();
					$obj_pathologist= ORM::factory('pathologist')
						->where('id','=',$objorder->refdiaglabsorderspathologistsid_c)
						->find();
					$obj_pathologistuser= ORM::factory('user')
						->where('id','=',$obj_pathologist->refpathologistsuserid_c)
						->find();
					$labname = $obj_pathologist->nameofcenter_c;
					$date=$objorder->orderrequestdate_c;
					$time=$objorder->orderrequestdate_c;
					$date = date_format(date_create( $date),'d M Y' );
					$time = date(' g:i A',strtotime($time) );
					$notification=  array();
					$notification['id']=$obj_orderedtest->customeruserid_c;$notification['template']='pathologist_order_conformation';$notification['sms']='true';$notification['time']=$time; $notification['date']=$date; $notification['contactnumber']=$obj_pathologistuser->phonenowork_c; $notification['labname']=$labname;
					helper_notificationsender::sendnotification($notification);
					$data = array();
					$data['type']		= "data";
					$data['data'] 		= "Order is accepted and your account has been credited by Rs. ".$amount."/-. Now your available balance is Rs.".ORM::factory('billingaccount')->where('refaccountuserid_c','=',$obj_user->id)->find()->netbalance_c."/-";
					die(json_encode($data));
				}else{
					$data = array();
					$data['type']			="error";
					$data['message'] 		= $result['message'];
					die(json_encode($data));
				}
			}else{
				$data = array();
				$data['type']			="data";
				$data['data'] 			= 'Amount for an order is not paid.';
				die(json_encode($data));
			}
		}
		else
		{
			// Order is cash Order Patient and Pathologist only
			// So just update status of the order as accepted order no 
			// transactions taking place
			$objorder->orderrequestdate_c = $date;
			$objorder->status_c = 'accepted'; 
			$objorder->update();	
			
			//send notification
					
				$obj_orderedtest= ORM::factory('orderedtest')
					->where('diagnosticlabsorderid_c','=',$objorder->id)
					->find();
				$obj_pathologist= ORM::factory('pathologist')
					->where('id','=',$objorder->refdiaglabsorderspathologistsid_c)
					->find();
				$obj_pathologistuser= ORM::factory('user')
					->where('id','=',$obj_pathologist->refpathologistsuserid_c)
					->find();
				$labname = $obj_pathologist->nameofcenter_c;
				$date=$objorder->orderrequestdate_c;
				$time=$objorder->orderrequestdate_c;
				$date = date_format(date_create( $date),'d M Y' );
				$time = date(' g:i A',strtotime($time) );
				$notification=  array();
				$notification['id']=$obj_orderedtest->customeruserid_c;$notification['template']='pathologist_order_conformation';$notification['sms']='true';$notification['time']=$time; $notification['date']=$date; $notification['contactnumber']=$obj_pathologistuser->phonenowork_c; $notification['labname']=$labname;
				helper_notificationsender::sendnotification($notification);
					
			$data = array();
			$data['type']		= "data";
			$data['data'] 		= "Order is accepted";
			die(json_encode($data));		
		}
			
		}else{
			$data = array();
			$data['type']			="data";
			$data['data'] 			= 'This order is not in requested status. Order is cancelled or reassigned to other diagnostic center.';
			die(json_encode($data));
		} 
	}
	
	public function action_rejectorder()
	{
		$obj_user 		= Auth::instance()->get_user();
		if (!$obj_user)
			Request::current()->redirect('cuser/login');

		$arr_accounts = include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/config/accounts.php');
		$id = $_GET["id"];
		$reason = $_GET["reason"];
		
		$objorder = ORM::factory('diagnosticlabsorder')->where('id','=',$id)->find();
		if(($objorder->status_c == 'requested')||($objorder->status_c == 'edited') ||($objorder->status_c == 'accepted'))
		{				
			if($objorder->cashpaymentflag_c == 0)
			{	// Online Order Rejected 
				// So credit back consumers account		
				// Find consumer of this order 
				$objOrderDetail = ORM::factory("orderedtest")->where("diagnosticlabsorderid_c","=",$id)
									->find();
				$consumeruserid = $objOrderDetail->customeruserid_c;
				$from_account 	= ORM::factory('billingaccount')->where('refaccountuserid_c','=',$arr_accounts['provisionaccountuserid'])->find()->accountcode_c;
				$to_account 	= ORM::factory('billingaccount')->where('refaccountuserid_c','=',$consumeruserid)->find()->accountcode_c;
				$amount = $objorder->rate_c;
			}		
			
			$objorder->rejectreason_c = $reason; 
			$objorder->status_c = 'rejected';
			$objorder->update();
			$obj_pathologisttest= ORM::factory('pathologisttest')
				->where('requisitionno','=',$objorder->id)
				->find();
			$obj_pathologist=ORM::factory('pathologist')
					->where('id','=',$obj_pathologisttest->pathologistid)
					->find();
			$labname = $obj_pathologist->nameofcenter_c;
			$notification=  array();
			$notification['id']=$obj_pathologisttest->patientuserid;$notification['template']='pathologist_order_rejection';$notification['sms']='true'; $notification['orderId']=$id.' placed on '.$obj_pathologisttest->date; $notification['labname']=$labname;
			helper_notificationsender::sendnotification($notification);
			$data = array();
			$data['type']		= "data";
			$data['data'] 		= "Order is rejected";
			die(json_encode($data));		
		}
		else{
			$data = array();
			$data['type']		= "data";
			$data['data'] 		= "This order is not in requested status. Order is cancelled or reassigned to other diagnostic center.";
			die(json_encode($data));		
		}
	}
	
	public function action_collectorder()
	{
		$id = $_GET["id"];
		$objorder = ORM::factory('diagnosticlabsorder')->where('id','=',$id)->find();
		if($objorder->status_c == 'reportsuploaded')
		{
			$objorder->status_c = 'reportscollected'; 
			$objorder->update();
		}else{
			
		}
	}
	
	public function action_getpathologistinfo()
	{
		$id = $_GET["id"];
		$objpathologist = ORM::factory('pathologist')->where('id','=',$id);
		$pathologist = $objpathologist->find();
		$objuser = ORM::factory('user')->where('id','=',$pathologist->refpathologistsuserid_c)->find();
		$pathologistinfo = array();
		$pathologistinfo['lastname_c'] = $objuser->lastname_c;
		$pathologistinfo['Firstname_c'] = $objuser->Firstname_c;
		$pathologistinfo['email'] = $objuser->email;
		$pathologistinfo['DOB_c'] = $objuser->DOB_c;
		$pathologistinfo['gender_c'] = $objuser->gender_c;
		$pathologistinfo['bloodgroup_c'] = $objuser->bloodgroup_c;
		$pathologistinfo['phonenohome_c'] = $objuser->phonenohome_c;
		$pathologistinfo['phonenowork_c'] = $objuser->phonenowork_c;
		$pathologistinfo['mobileno1_c'] = $objuser->mobileno1_c;
		$pathologistinfo['mobileno2_c'] = $objuser->mobileno2_c;
		$pathologistinfo['languages_c'] = $objuser->languages_c;
		$pathologistinfo['photo_c'] = $objuser->photo_c;
		$this->response->body(json_encode($pathologistinfo));
	}
	
	public function action_pathologistdetailreport()
	{
		$id = $_GET["id"];
		$obj_user = Auth::instance()->get_user();
		$content = View::factory('vuser/vpathologist/vpathologistdetailreport');
		$content->bind('id', $id);
		
		$this->response->body($content);
	}
	
	public function action_getdetailedreport()
	{
		$id = $_GET["orderid"];
		$objtestreport = new Model_Patienttestreport;
		$objtestreport->where('id','=',$id)->find();
		if(!file_exists(str_replace("ayushman/","",$objtestreport->filepath_c)))
		{
			die("");
		}else
			$this->response->body($objtestreport->filepath_c);
		
		$this->response->body($objtestreport->filepath_c);
	}
	
	public function action_getpathologistorderinfo()
	{
		$id = $_GET["orderid"];
		$objorders = ORM::factory('diagnosticlabsorder')->where('id','=',$id);
		$objorders = $objorders->find();
		
		if(!file_exists(str_replace("ayushman/","",$objorders->report_c)))
		{
			die("");
		}else
			$this->response->body($objorders->report_c);
		
		$this->response->body($objorders->report_c);
	}
	
	public function action_gettests()	
	{
		$id = $_GET["orderid"];
		$objtests = new Model_Orderedtest;
		$objtests = $objtests->where('diagnosticlabsorderid_c','=',$id) -> find_all();
		
		$objDiagLab = ORM::factory('Diagnosticlabsorder')->where('id','=',$id)->find();
	
		$pathologistid = $objDiagLab->refdiaglabsorderspathologistsid_c;
		$arrtest =array();$i=0;
		foreach ($objtests as $test)
		{
			$artest = array();
			// Check if test is defined by pathologist
			// If defined pick test details from pathologistcatalog   refdiaglabsorderspathologistsid_c
			//$objtest = ORM::factory('pathologistcatalog')->where('refpathcatalogpathologistsid_c','=',$pathologistid)
			//		->where('refpathcatalogtestid_c','=',$test->testid_c)
			//		->find_all();
			$objtest = new Model_pathologistcatalog;
			$objtest->where('refpathcatalogtestid_c','=',$test->testid_c )->where('refpathcatalogpathologistsid_c','=',$pathologistid)->find();
			//var_dump($objtest->refpathcatalogtestid_c);die;
			if ($objtest->id != null){
			
				$artest["id"]=$objtest->refpathcatalogtestid_c ;
				$artest["value"]=$objtest->test_name ;
				$artest["parameters"] = array();
				//$artest["testfile"] = "";
				$currTestid = $objtest->refpathcatalogtestid_c ;
				//var_dump($objtest->refpathcatalogtestid_c);die;
				// Get test parameter data if defined 
				$pathTestParameters = new Model_pathologistparameter;
				$tempobj=$pathTestParameters->getPathtestparameter($objtest->refpathcatalogtestid_c,$pathologistid);
				//var_dump($objtest->refpathcatalogtestid_c);
				//var_dump($tempobj);
				if($tempobj)
				{
					$artest["parameters"] = $tempobj;
				}
				else
				{
					// Get data of IOH Parameters
					$universaltracker = new helper_Universaltracker();
					//$tempobj=$universaltracker->getTestParameter($objtest->id);
					$tempobj=$universaltracker->getTestParameter($currTestid);
					if($tempobj)
					{
						$artest["parameters"] = $tempobj;
					}
				}
			}
			else
			{
				$objtest = new Model_Testmaster;
				$objtest->where('id','=',$test->testid_c )->find();
				$artest["id"]=$objtest->id ;
				$artest["value"]=$objtest->testname_c ;
				$artest["parameters"] = array();
				$artest["testfile"] = "";
				$currTestid = $objtest->id;
			
				$universaltracker = new helper_Universaltracker();
				//$tempobj=$universaltracker->getTestParameter($objtest->id);
				$tempobj=$universaltracker->getTestParameter($currTestid);
				if($tempobj)
				{
					$artest["parameters"] = $tempobj;
				}
			}
			$arrtest[$i]= $artest;
			$i++;
		}
		
		die(json_encode($arrtest));
		
	}
	public function action_gettestandbattery()
	{
		// Function returns test and battery test i.e group of tests 
		// while uploading reports from DC
		
		$id = $_GET["orderid"];
		$objtests = new Model_Orderedtestdetail;
		$objtests = $objtests->where('diagnosticlabsorderid_c','=',$id) -> find_all();
		
		$objDiagLab = ORM::factory('Diagnosticlabsorder')->where('id','=',$id)->find();
	
		$pathologistid = $objDiagLab->refdiaglabsorderspathologistsid_c;
		$arrtest =array();$i=0;
		foreach ($objtests as $test)
		{
			$artest = array();
			// Check if test is defined by pathologist
			// If defined pick test details from pathologistcatalog   refdiaglabsorderspathologistsid_c
			//$objtest = ORM::factory('pathologistcatalog')->where('refpathcatalogpathologistsid_c','=',$pathologistid)
			//		->where('refpathcatalogtestid_c','=',$test->testid_c)
			//		->find_all();
			$objtest = new Model_pathologistcatalog;
			$objtest->where('refpathcatalogtestid_c','=',$test->testid_c )->where('refpathcatalogpathologistsid_c','=',$pathologistid)->find();
			//var_dump($objtest->refpathcatalogtestid_c);die;
			if ($objtest->id != null){
			
				$artest["id"]=$objtest->refpathcatalogtestid_c ;
				$artest["value"]=$objtest->test_name ;
				$artest["parameters"] = array();
				//$artest["testfile"] = "";
				$currTestid = $objtest->refpathcatalogtestid_c ;
				//var_dump($objtest->refpathcatalogtestid_c);die;
				// Get test parameter data if defined 
				$pathTestParameters = new Model_pathologistparameter;
				$tempobj=$pathTestParameters->getPathtestparameter($objtest->refpathcatalogtestid_c,$pathologistid);
				//var_dump($objtest->refpathcatalogtestid_c);
				//var_dump($tempobj);
				if($tempobj)
				{
					$artest["parameters"] = $tempobj;
				}
				else
				{
					// Get data of IOH Parameters
					$universaltracker = new helper_Universaltracker();
					//$tempobj=$universaltracker->getTestParameter($objtest->id);
					$tempobj=$universaltracker->getTestParameter($currTestid);
					if($tempobj)
					{
						$artest["parameters"] = $tempobj;
					}
				}
			}
			else
			{
				$objtest = new Model_Testmaster;
				$objtest->where('id','=',$test->testid_c )->find();
				$artest["id"]=$objtest->id ;
				$artest["value"]=$objtest->testname_c ;
				$artest["parameters"] = array();
				$artest["testfile"] = "";
				$currTestid = $objtest->id;
			
				$universaltracker = new helper_Universaltracker();
				//$tempobj=$universaltracker->getTestParameter($objtest->id);
				$tempobj=$universaltracker->getTestParameter($currTestid);
				if($tempobj)
				{
					$artest["parameters"] = $tempobj;
				}
			}
			$arrtest[$i]= $artest;
			$i++;
		}
		
		die(json_encode($arrtest));
		
	}
	
	//this function is written in file upload.php (public function action_saveorderreports();)
	/*public function action_savereports()
	{
		//var_dump($_FILES); die;
		$session= Session::instance();
		$session->set('html', "");
		$i=0; $j=0;
		$orderid		= $_POST["selectedappid"];
		$patientuserid= ORM::factory('orderedtest')
			->where('diagnosticlabsorderid_c','=',$orderid)
			->find()->customeruserid_c;
		$testid= ORM::factory('orderedtest')
			->where('diagnosticlabsorderid_c','=',$orderid)
			->find_all();
		$testnames=array();
		foreach($testid as $test_id){
			$testname=ORM::factory('testmaster')->where('id','=',$test_id->testid_c)->find()->testname_c;		
			array_push($testnames,$testname);
		}
		while ( $i < $_POST["testnumberselect"]) {
			$session= Session::instance();
			$session->set('html', "");
			$j=0;
			while($j<$_POST["selectreport".$i."pages"])
			{
				$tempPath = $_FILES[ "report".$i."page".$j ][ 'tmp_name' ];
				$uploadPath = dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $_FILES[ "report".$i."page".$j ][ 'name' ];

				$files = new helper_Files();
				$return = $files->saveTempFile($_FILES["report".$i."page".$j]);
				$html = "<img src='".$_SERVER["DOCUMENT_ROOT"]."/ayushman/".$return["abspath"]."' style='width:100%;height:auto;'/>";
				$var=$session->get('html');
				if(isset($var))
				{
					$temp=$session->get('html').$html;
					$session->set('html', $temp);
				}
				else
				{
					$session->set('html', $html);
				}
				$j++;
			}
			
			$temp= $session->get('html'); 
			$objHtml 	= new simple_html_dom();
			$objHtml->load($temp);	
			$files = new helper_Files();
			$return = $files->savePdfFile($objHtml);
			
			$id=$return['id'];
			
			
			$objfile = ORM::factory('patienttestreport');
			$objfile->refpatreportdiagnosticlaborderid_c	= $orderid;
			$objfile->refpatreporttestid_c		= $_POST["htestname".$i];
			$objfile->refpatientuserid_c=$patientuserid;
			//$objfile->refpatreportpathologistsid_c		= $objpathologists->id;
			$objfile->dateoftest_c = date("Y-m-d") ;
			$objfile->testparameters = '{'.'"Date"'.': "'.$objfile->dateoftest_c.'"'.','.'"testname"'.': "'.$testnames[$i].'" }';
			$objfile->fileid_c = $id;
			$objfile->save();
			$i++;
		}
		
		//$numberoftest	= $_POST["testnumberselect"];
		$orderid		= $_POST["selectedappid"];
		$objorders = ORM::factory('diagnosticlabsorder')->where('id','=',$orderid)->find();	
		$objorders->status_c = 'reportsuploaded';
		//$objorders->report_c = $response_savepdf;
		$objorders->saveRecord();
		
		
		$objuser = Auth::instance()->get_user();
		$obj_pathologist=ORM::factory('pathologist')
			->where('refpathologistsuserid_c','=',$objuser->id)
			->find();

		$labname = $obj_pathologist->nameofcenter_c;
		$notification=  array();
		
		$notification['id']	=	$patientuserid;
		$notification['template']='pathologist_order_uploaded';
		$notification['sms']='true'; 
		$notification['orderId']=$orderid; 
		$notification['labname']=$labname;
		helper_notificationsender::sendnotification($notification);
		
		Request::current()->redirect("/cpathologistdashboard/view");
	}*/
	
	//this function is not in use.
	/*public function action_savereportstemp()	
	{
		try{
			$arr_wk = Kohana::$config->load('application');
			$obj_user = Auth::instance()->get_user();
			$userid=$obj_user->id;
			
			$numberoftest	= $_POST["testnumberselect"];
			$orderid		= $_POST["selectedappid"];
			$objtestreport 	= new Model_Patienttestreport;
			$objtestreport 	= $objtestreport ->where('refpatreportdiagnosticlaborderid_c', '=',$orderid) ->findAll();
			foreach($objtestreport as $res )
			{
				$res->delete();
			}	
			$creatallreportfile="";
			$createdpdf = array();
			if(!is_dir(DOCROOT."reports/".$obj_user->id))
				mkdir(DOCROOT."reports/".$obj_user->id);
			if(!is_dir(DOCROOT."reports/".$obj_user->id."/order_".$orderid))
				mkdir(DOCROOT."reports/".$obj_user->id."/order_".$orderid);
			
			$uploaddestination =  DOCROOT."reports/".$obj_user->id."/order_".$orderid."/";
			
			for($testnumber=0;$testnumber < $_POST["testnumberselect"];$testnumber++)
			{
				$createimg="";
				for($page=0;$page< $_POST["selectreport".$testnumber."pages"];$page++)
				{
					if($_FILES["report".$testnumber."page".$page]["name"])
					{					
						for($i=0;$i<count($_FILES["report".$testnumber."page".$page]['name']);$i++)
						{	
							if($_FILES["report".$testnumber."page".$page]["name"] != "")
							{ 
								if ((($_FILES["report".$testnumber."page".$page]["type"] == "application/pdf") || ($_FILES["report".$testnumber."page".$page]["type"] == "image/gif") || ($_FILES["report".$testnumber."page".$page]["type"] == "image/jpeg") || ($_FILES["report".$testnumber."page".$page]["type"] == "image/x-png") || ($_FILES["report".$testnumber."page".$page]["type"] == "image/png") || ($_FILES["report".$testnumber."page".$page]["type"] == "image/pjpeg")) && ($_FILES["report".$testnumber."page".$page]["size"] < 10485760))
								{
									if ($_FILES["report".$testnumber."page".$page]["error"] > 0)
									{
										echo "Return Code: " . $_FILES["report".$testnumber."page".$page]["error"][$i] . "<br />";
									}
									else
									{
										$a=  getdate();
										$timestamp = $a[0];

										if( move_uploaded_file($_FILES["report".$testnumber."page".$page]["tmp_name"], $uploaddestination.$timestamp."_".str_replace(' ', "_",$_FILES["report".$testnumber."page".$page]["name"])))
										{
											$objpathologists 	= ORM::factory('pathologist')
																->where('refpathologistsuserid_c','=',$obj_user->id)
																->find();
											$objtestreport = new Model_Patienttestreport;
											$objtestreport->refpatreportdiagnosticlaborderid_c	= $orderid;
											$objtestreport->refpatreporttestid_c				= $_POST["htestname".$testnumber];
											$objtestreport->dateoftest_c						= date("Y-m-d") ;
											$objtestreport->refpatreportpathologistsid_c		= $objpathologists->id;
											$objtestreport->filepath_c							= "ayushman/reports/".$obj_user->id."/order_".$orderid.'/'.$timestamp."_".str_replace(' ', "_",$_FILES["report".$testnumber."page".$page]["name"]);
											$objtestreport->filename_c							= $_FILES["report".$testnumber."page".$page]["name"];
											$objtestreport->save();
										}
										else
											throw new Exception($e);
									}
								}else{
									echo "Invalid file should be less than 1 mb";
								}
							}
						}
					}
				}
			}
			$objorders = ORM::factory('diagnosticlabsorder')->where('id','=',$orderid)->find();	
			$objorders->status_c = 'reportsuploaded';
			//$objorders->report_c = $response_savepdf;
			$objorders->saveRecord();
			$obj_pathologisttest= ORM::factory('pathologisttest')
				->where('requisitionno','=',$orderid)
				->find();
			$obj_pathologist=ORM::factory('pathologist')
					->where('id','=',$obj_pathologisttest->pathologistid)
					->find();
			$labname = $obj_pathologist->nameofcenter_c;
			$notification=  array();
			$notification['id']=$obj_pathologisttest->patientuserid;$notification['template']='pathologist_order_uploaded';$notification['sms']='true'; $notification['orderId']=$obj_pathologisttest->requisitionno; $notification['labname']=$labname;
			helper_notificationsender::sendnotification($notification);
			
			Request::current()->redirect("/cpathologistdashboard/view");
		}catch(Exception $e){
			throw new Exception($e);
		}
	}*/
	
} // End Welcome

<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/xmpp.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');
class Controller_Ccheckout extends Controller_Ctemplatewithmenu {
	public function action_autoplaceorder()
        {
        	try
			{
				$users = ORM::factory('user')->where('username','like','coep2013_%')->find_all();
				foreach($users as $user)
				{	
					$userid = $user->id;
					//add patient to favorite
					$objPatient= ORM::factory('patient')->where('repatientsuserid_c','=',$userid)->find();
					$patientid =$objPatient->id;
					$objFavoritePathologistByPatients = ORM::factory('favoritepathologistbypatient')///if "pathologist and patient pair" is  present 
													->where('reffavpathopatientsid_c','=',$patientid)
													->where('reffavpathopathologistsid_c','=','22')
													->find()
													->as_array();
					if($objFavoritePathologistByPatients["id"] == null)//if "pathologist and patient pair" is not present then add. 
					{
						$objFavoritePathologistByPatients = ORM::factory('favoritepathologistbypatient');
						$objFavoritePathologistByPatients->reffavpathopatientsid_c=$patientid;
						$objFavoritePathologistByPatients->reffavpathopathologistsid_c='22';
						$objFavoritePathologistByPatients->save();
					}
					
					$objOrders = ORM::factory('Diagnosticlabsorder');
					$today = date('Y-m-d g:i:s a');
					$objOrders->orderdate_c = $today;
					$objOrders->status_c = 'requested';
					$objOrders->refdiaglabsorderspathologistsid_c = '22';
					$objOrders->updatestatusdate_c = $today;
					$objOrders->rate_c = '0';
					$objOrders->paid_c= 1;
					$objOrders->save();
					$orderid = $objOrders->id;//get order id 
					
					//place record in orderedtest table
					$objordertest = ORM::factory('orderedtest');
					$objordertest->customeruserid_c = $userid;
					$objordertest->testid_c = '2562';
					$objordertest->diagnosticlabsorderid_c = $orderid;
					$objordertest->rate_c='0';
					$objordertest->save();
					var_dump("sucess_order for user ".$userid."<br/>");
				}
				
			}
			catch(Exception $e)
			{
				throw new Exception($e);
			}
			die('done');
        }
	public function action_view()
	{
	//var_dump($_SERVER['HTTP_REFERER']); die;
		try
		{
			$array_taxes = Kohana::$config->load('taxes');

			$objUser = Auth::instance()->get_user();
			$userid = $objUser->id;
			$objRolesUser = ORM::factory('roleuser')
								->where('user_id','=',$userid)
								->mustFindAll()
								->as_array();
			foreach($objRolesUser as $role)
			{
				$objRole = ORM::factory('role')
							->where('id','=',$role->role_id)
							->mustFind();
				switch($objRole->name)
				{
					case 'Login' :break;
					case 'patient': $urole= 'patient';
									break;
					default: throw new Exception ("Role not found");
									break;
				}
			}
			$objCart = ORM::factory('cart')->where('refconsumeruserid_c', '=', $userid)->where('status_c','=','pending')->find_all();
			$objselectedtests = ORM::factory('cart')->where('refconsumeruserid_c','=',$userid)->where('status_c','=','pending')->find_all();
			$tests = array();
			$i = 0;
			foreach($objselectedtests as $test)
			{
				$tests[$i] = array();
				$testmasters = ORM::factory('testmaster')->where('id','=',$test->itemid_c)->find();
				$tests[$i]["id"] = $testmasters->id;
				$tests[$i]["cartid"]= $test->id;
				$tests[$i]["testname"] = $testmasters->testname_c;
				$tests[$i]["testreqdate"] = date('d M Y',strtotime($test->orderrequestdate_c));
				$objpathologist = ORM::factory('pathologist')->where('id','=',$test->refprovideruserid_c)->find();
				$pathologistid = $test->refprovideruserid_c;
				$tests[$i]["pathologistid"]= $objpathologist->id;
				$tests[$i]["rate"] = $this->gettestrate($testmasters->id,$pathologistid);
				
				$discount = new helper_Discount();
				$discount = $discount->getDiscount($pathologistid,$testmasters->id,$objUser->id);
				$tests[$i]["discountedrate"] = $tests[$i]["rate"] * (100 - $discount)/100;	
				$tests[$i]["pathologistList"]= $this->getpathologists($pathologistid,$testmasters->id);
				$tests[$i]["discountedpercent"]=$discount;
				$i = $i + 1;
			}
			$objpatient = ORM::factory('patient')->where('repatientsuserid_c','=',$objUser->id)->find();
			$objfavoritepathologistbypatient = ORM::factory('favoritepathologistbypatient')->where('reffavpathopatientsid_c','=',$objpatient->id)->find_all();
			$arr_favoritepathologist = array();
			foreach($objfavoritepathologistbypatient as$objfavoritepathologist)
			{	
				if(! empty($objfavoritepathologist->reffavpathopathologistsid_c))
					array_push($arr_favoritepathologist,trim(ucfirst($objfavoritepathologist->reffavpathopathologistsid_c)));
			}
			$arr_favoritepathologist=array_unique($arr_favoritepathologist);
			$arr_favoritepathologist=json_encode($arr_favoritepathologist);
			$objbillingaccount = ORM::factory('billingaccount')->where('refaccountuserid_c','=',$userid)->find();
			$netbalance = $objbillingaccount->netbalance_c;
			$objbillingplancharge = ORM::factory('billingplancharge')->join('billingindividualplans')->on('billingplancharge.ref_planid_c','=','billingindividualplans.refplanid_c')->where('billingindividualplans.status_c','=','active')->where('billingindividualplans.refusersid_c','=',$userid)->find();
			$servicecharges =$objbillingplancharge->servicecharges_c;
			$servicecharges=number_format($servicecharges);
			$servicetax = $array_taxes['servicetax'];			
			$servicetaxonservicecharges = round($servicecharges * $servicetax / 100, 2);
			
			$diagnosticlabsservicetax = $array_taxes['diagnosticlabservicetax'];
			
			$referer = $_SERVER['HTTP_REFERER'];
			
			if(!strpos($referer,'cpatientrequistiontests')){
				$referer = "/ayushman/cpatientrequistiontests/view";
			}
			$discount = new helper_Discount();
			//$discount = $discount->getDiscount();
			$content = View::factory('vuser/vpatient/vcheckout');
			$content->bind('userid', $userid);
			$content->bind('servicetax', $servicetax);
			$content->bind('servicetaxonservicecharges', $servicetaxonservicecharges);
			$content->bind('diagnosticlabsservicetax', $diagnosticlabsservicetax);
			$content->bind('tests',$tests);
			$content->bind('netbalance',$netbalance);
			$content->bind('servicecharges',$servicecharges);
			$content->bind('referer',$referer);
			$content->bind('arr_favoritepathologist',$arr_favoritepathologist);
			$this->template->content = $content;
			$this->template->user =  $objUser->Firstname_c;
			$this->template->urole = $urole;
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
	}

    public function action_viewDTFootable()
    {
        //var_dump($_SERVER['HTTP_REFERER']); die;
        try
        {
            $array_taxes = Kohana::$config->load('taxes');

            $objUser = Auth::instance()->get_user();
            $userid = $objUser->id;
            $objRolesUser = ORM::factory('roleuser')
                ->where('user_id','=',$userid)
                ->mustFindAll()
                ->as_array();
            foreach($objRolesUser as $role)
            {
                $objRole = ORM::factory('role')
                    ->where('id','=',$role->role_id)
                    ->mustFind();
                switch($objRole->name)
                {
                    case 'Login' :break;
                    case 'patient': $urole= 'patient';
                        break;
                    default: throw new Exception ("Role not found");
                        break;
                }
            }
            $objCart = ORM::factory('cart')->where('refconsumeruserid_c', '=', $userid)->where('status_c','=','pending')->find_all();
            $objselectedtests = ORM::factory('cart')->where('refconsumeruserid_c','=',$userid)->where('status_c','=','pending')->find_all();
            $tests = array();
            $i = 0;
            foreach($objselectedtests as $test)
            {
                $tests[$i] = array();
                $testmasters = ORM::factory('testmaster')->where('id','=',$test->itemid_c)->find();
                $tests[$i]["id"] = $testmasters->id;
                $tests[$i]["cartid"]= $test->id;
                $tests[$i]["testname"] = $testmasters->testname_c;
                $tests[$i]["testreqdate"] = date('d M Y',strtotime($test->orderrequestdate_c));
                $objpathologist = ORM::factory('pathologist')->where('id','=',$test->refprovideruserid_c)->find();
                $pathologistid = $test->refprovideruserid_c;
                $tests[$i]["pathologistid"]= $objpathologist->id;
                $tests[$i]["rate"] = $this->gettestrate($testmasters->id,$pathologistid);

                $discount = new helper_Discount();
                $discount = $discount->getDiscount($pathologistid,$testmasters->id,$objUser->id);
                $tests[$i]["discountedrate"] = $tests[$i]["rate"] * (100 - $discount)/100;
                $tests[$i]["pathologistList"]= $this->getpathologistsFootable($pathologistid,$testmasters->id);
                $tests[$i]["discountedpercent"]=$discount;
                $i = $i + 1;
            }
            $objpatient = ORM::factory('patient')->where('repatientsuserid_c','=',$objUser->id)->find();
            $objfavoritepathologistbypatient = ORM::factory('favoritepathologistbypatient')->where('reffavpathopatientsid_c','=',$objpatient->id)->find_all();
            $arr_favoritepathologist = array();
            foreach($objfavoritepathologistbypatient as$objfavoritepathologist)
            {
                if(! empty($objfavoritepathologist->reffavpathopathologistsid_c))
                    array_push($arr_favoritepathologist,trim(ucfirst($objfavoritepathologist->reffavpathopathologistsid_c)));
            }
            $arr_favoritepathologist=array_unique($arr_favoritepathologist);
            $arr_favoritepathologist=json_encode($arr_favoritepathologist);
            $objbillingaccount = ORM::factory('billingaccount')->where('refaccountuserid_c','=',$userid)->find();
            $netbalance = $objbillingaccount->netbalance_c;
            $objbillingplancharge = ORM::factory('billingplancharge')->join('billingindividualplans')->on('billingplancharge.ref_planid_c','=','billingindividualplans.refplanid_c')->where('billingindividualplans.status_c','=','active')->where('billingindividualplans.refusersid_c','=',$userid)->find();
            $servicecharges =$objbillingplancharge->servicecharges_c;
            $servicecharges=number_format($servicecharges);
            $servicetax = $array_taxes['servicetax'];
            $servicetaxonservicecharges = round($servicecharges * $servicetax / 100, 2);

            $diagnosticlabsservicetax = $array_taxes['diagnosticlabservicetax'];

            $referer = $_SERVER['HTTP_REFERER'];

            if(!strpos($referer,'cpatientrequistiontests')){
                $referer = "/ayushman/cpatientrequistiontests/viewFootable";
            }
            $discount = new helper_Discount();
            //$discount = $discount->getDiscount();

            $ts = (object)$tests;
            $tests_json = array();
            foreach ($ts as $ts1) {
                array_push($tests_json, $ts1);
            }
            $tests_json = json_encode($tests_json);

            $content = View::factory('vuser/vpatient/vcheckout');
            $content->bind('userid', $userid);
            $content->bind('tests_json',$tests_json);
            $content->bind('servicetax', $servicetax);
            $content->bind('servicetaxonservicecharges', $servicetaxonservicecharges);
            $content->bind('diagnosticlabsservicetax', $diagnosticlabsservicetax);
            $content->bind('tests',$tests);
            $content->bind('netbalance',$netbalance);
            $content->bind('servicecharges',$servicecharges);
            $content->bind('referer',$referer);
            $content->bind('arr_favoritepathologist',$arr_favoritepathologist);
            $this->template->content = $content;
            $this->template->user =  $objUser->Firstname_c;
            $this->template->urole = $urole;
        }
        catch(Exception $e)
        {
            throw new Exception($e);
        }
    }

    private function getpathologistsFootable($appid, $testid)
    {
        try {
            $pathologists = $this->getpathologists($appid, $testid);
            $pathologists = (object)$pathologists;
            $patho = array();
            foreach ($pathologists as $pathologist) {
                array_push($patho, $pathologist);
            }
            $patho_encode = json_encode($patho);

            return $patho_encode;
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }
	
public function action_viewmycart()
	{
	//var_dump($_SERVER['HTTP_REFERER']); die;
		try
		{
			$array_taxes = Kohana::$config->load('taxes');

			$objUser = Auth::instance()->get_user();
			$userid = $objUser->id;
			$objRolesUser = ORM::factory('roleuser')
								->where('user_id','=',$userid)
								->mustFindAll()
								->as_array();
			foreach($objRolesUser as $role)
			{
				$objRole = ORM::factory('role')
							->where('id','=',$role->role_id)
							->mustFind();
				switch($objRole->name)
				{
					case 'Login' :break;
					case 'patient': $urole= 'patient';
									break;
					default: throw new Exception ("Role not found");
									break;
				}
			}
			$objCart = ORM::factory('cart')->where('refconsumeruserid_c', '=', $userid)->where('status_c','=','pending')->find_all();

			$objselectedtests = ORM::factory('cart')->where('refconsumeruserid_c','=',$userid)->where('status_c','=','pending')->find_all();
				// var_dump($objCart->orderrequestdate_c);die;

			$tests = array();
							// $testreqdate = $objselectedtests->orderrequestdate_c;

			$i = 0;
			foreach($objselectedtests as $test)
			{
				$tests[$i] = array();
				$testmasters = ORM::factory('testmaster')->where('id','=',$test->itemid_c)->find();
				$tests[$i]["id"] = $testmasters->id;
				$tests[$i]["cartid"]= $test->id;
				$tests[$i]["testname"] = $testmasters->testname_c;
				$tests[$i]["testreqdate"] = date('d M Y',strtotime($test->orderrequestdate_c));
				$objpathologist = ORM::factory('pathologist')->where('id','=',$test->refprovideruserid_c)->find();
				$pathologistid = $test->refprovideruserid_c;
				$tests[$i]["pathologistid"]= $objpathologist->id;
				$tests[$i]["rate"] = $this->gettestrate($testmasters->id,$pathologistid);
				
				$discount = new helper_Discount();
				$discount = $discount->getDiscount($pathologistid,$testmasters->id,$objUser->id);
				$tests[$i]["discountedrate"] = $tests[$i]["rate"] * (100 - $discount)/100;	
				$tests[$i]["pathologistList"]= $this->getpathologists($pathologistid,$testmasters->id);
				$tests[$i]["discountedpercent"]=$discount;
				$i = $i + 1;
			}
			$objpatient = ORM::factory('patient')->where('repatientsuserid_c','=',$objUser->id)->find();
			$objfavoritepathologistbypatient = ORM::factory('favoritepathologistbypatient')->where('reffavpathopatientsid_c','=',$objpatient->id)->find_all();
			$arr_favoritepathologist = array();
			foreach($objfavoritepathologistbypatient as$objfavoritepathologist)
			{	
				if(! empty($objfavoritepathologist->reffavpathopathologistsid_c))
					array_push($arr_favoritepathologist,trim(ucfirst($objfavoritepathologist->reffavpathopathologistsid_c)));
			}
			$arr_favoritepathologist=array_unique($arr_favoritepathologist);
			$arr_favoritepathologist=json_encode($arr_favoritepathologist);
			$objbillingaccount = ORM::factory('billingaccount')->where('refaccountuserid_c','=',$userid)->find();
			$netbalance = $objbillingaccount->netbalance_c;
			$objbillingplancharge = ORM::factory('billingplancharge')->join('billingindividualplans')->on('billingplancharge.ref_planid_c','=','billingindividualplans.refplanid_c')->where('billingindividualplans.status_c','=','active')->where('billingindividualplans.refusersid_c','=',$userid)->find();
			$servicecharges =$objbillingplancharge->servicecharges_c;
			$servicecharges=number_format($servicecharges);
			$servicetax = $array_taxes['servicetax'];			
			$servicetaxonservicecharges = round($servicecharges * $servicetax / 100, 2);
			
			$diagnosticlabsservicetax = $array_taxes['diagnosticlabservicetax'];
			
			$referer = $_SERVER['HTTP_REFERER'];
			
			if(!strpos($referer,'cpatientrequistiontests')){
				$referer = "/ayushman/cpatientrequistiontests/view";
			}
			$discount = new helper_Discount();
			//$discount = $discount->getDiscount();
			$content = View::factory('vuser/vpatient/vmycart');
			$content->bind('userid', $userid);
			$content->bind('servicetax', $servicetax);
			$content->bind('servicetaxonservicecharges', $servicetaxonservicecharges);
			$content->bind('diagnosticlabsservicetax', $diagnosticlabsservicetax);
			$content->bind('tests',$tests);
			$content->bind('netbalance',$netbalance);
			$content->bind('servicecharges',$servicecharges);
			$content->bind('referer',$referer);
			$content->bind('arr_favoritepathologist',$arr_favoritepathologist);
			$this->template->content = $content;
			$this->template->user =  $objUser->Firstname_c;
			$this->template->urole = $urole;
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
	
	private function getpathologists($pathologistid,$testid)
	{
		try
		{
			$objUser = Auth::instance()->get_user();
			$objpatient = ORM::factory('patient')->where('repatientsuserid_c','=',$objUser->id)->mustFind();
			$objfavoritepathologistbypatient = ORM::factory('favoritepathologistbypatient')->where('reffavpathopatientsid_c','=',$objpatient->id)->find_all();
			$pathologists = array();
			$count = -1;
			foreach($objfavoritepathologistbypatient as $favoritepathologistpathologist)
			{
				$count=$count + 1;
				$pathologists[$count]  = array();
				$pathologists[$count]["centerid"] = $favoritepathologistpathologist->reffavpathopathologistsid_c; 	
				$objpathologist = ORM::factory('pathologist')->where('id','=',$favoritepathologistpathologist->reffavpathopathologistsid_c)->find();
				$pathologists[$count]["centername"] = $objpathologist->nameofcenter_c; 
			}
			$ispresent= 0;
			$i = 0;
			$pathologistsfromfav= $pathologists;
			$valuepresent = $this->checkvaluepresent($pathologists,'centerid',$pathologistid);
			if (($valuepresent == false )&&($pathologistid != null)) 
			{
				$count=$count + 1;
				$pathologists[$count]  = array();
				$pathologists[$count]["centerid"] = $pathologistid; 	
				$objpathologist = ORM::factory('pathologist')->where('id','=',$pathologistid)->find();
				$pathologists[$count]["centername"] = $objpathologist->nameofcenter_c; 
			}
			$count =count($pathologists); 
			if(($count == 0) && ($pathologistid !=NULL ))
			{
				
					$count=$count + 1;
					$pathologists[$count]  = array();
					$pathologists[$count]["centerid"] = $pathologistid; 	
					$objpathologist = ORM::factory('pathologist')->where('id','=',$pathologistid)->find();
					$pathologists[$count]["centername"] = $objpathologist->nameofcenter_c; 
			}
			return $pathologists;
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
	}
	
	public function action_removetest()
	{
		try{
			$testid=$_GET['testid'];
			$objUser = Auth::instance()->get_user();
			$userid = $objUser->id;
			if($testid != "")
			{
				$objtest = ORM::factory('cart')->where('refconsumeruserid_c','=',$userid)->where('status_c','=','pending')->where('itemid_c','=',$testid)->find();
				if($objtest->id != "")
				{	
					$objtest->status_c= 'remove';
					$objtest->save();
				}
			}
			die();
		} catch (Exception $e) {
			throw new Exception($e);
		}
	}
	
	public function action_setfollowuplink()
	{
		try
		{
			$currentlocation="";
			if($_GET["currentlocation"])
			{
				$currentlocation= $_GET["currentlocation"];
				$currentlocation = strstr($currentlocation, '/ayushman/');
				$currentlocation = str_replace('ayushman/', '', $currentlocation);
			}
			$session = Session::instance();
			$link= $currentlocation;
			$session->set('followlink', $link);
			die();
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
	}
	
	public function action_addnewpathologist()
	{
		try{
			$arr_pathologistId =json_decode($_GET['arr_pathologistId']);
			
			$objUser = Auth::instance()->get_user();
			$userid=$objUser->id;
			$objPatient = ORM::factory('patient')->where('repatientsuserid_c','=',$userid)->mustFind();
			$patientid=$objPatient->id;
			foreach($arr_pathologistId as $pathologistid)
			{
				$objpathologist = ORM::factory('pathologist')->where('id','=',$pathologistid)->find();
				$pathologistuserid= $objpathologist->refpathologistsuserid_c;
				//1st add into xmpp network
				$arr_xmpp =Kohana::$config->load('xmpp');
				$obj_user = Auth::instance()->get_user();		
				$var = xmpp::addRosterContact($pathologistuserid.'@'.$arr_xmpp['servername'],$pathologistuserid.'@'.$arr_xmpp['servername'],$userid.'@'.$arr_xmpp['servername'],$objUser->xmpppassword_c);
				if($var != 'success')//error while adding in xmpp contact list 
				{
					throw new Exception($var["ERROR"]);
				}
		
				$objFavoritePathologistByPatients = ORM::factory('favoritepathologistbypatient')///if "pathologist and patient pair" is  present 
													->where('reffavpathopatientsid_c','=',$patientid)
													->where('reffavpathopathologistsid_c','=',$pathologistid)
													->find()
													->as_array();
				if($objFavoritePathologistByPatients["id"] == null)//if "pathologist and patient pair" is not present then add. 
				{
					$objFavoritePathologistByPatients = ORM::factory('favoritepathologistbypatient');
					$objFavoritePathologistByPatients->reffavpathopatientsid_c=$patientid;
					$objFavoritePathologistByPatients->reffavpathopathologistsid_c=$pathologistid;
					$objFavoritePathologistByPatients->save();
				}
			}
			die();
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
		
	}
	
	private function checkvaluepresent($array, $key, $val) {
    foreach ($array as $item)
        if (isset($item[$key]) && $item[$key] == $val)
            return true;
    return false;
	}
	
	private function checkvaluepresentpostion($array, $key, $val) {
		$i=0;
		foreach ($array as $item)
		{
			if (isset($item[$key]) && $item[$key] == $val)
			 {   
				return $i;
			 }
			 else
			 {
			 	$i++;
			 }
		}
	}	
	
	public function action_ordertest()
	{
		try
		{
			$array_taxes = Kohana::$config->load('taxes');
			$arr_returntestsinfo = array();
			$objUser = Auth::instance()->get_user();
			$userid = $objUser->id;
			$tests=json_decode($_GET['test']);
			$radiobtn=$_GET['radiobtn'];
			$payment_mode=$_GET['payment_mode'];
			$requestdate = $_GET['requestdate'];

			$testcharges = 0;
			foreach($tests as $test)
			{
				$objCart = ORM::factory('cart')->where('id', '=', $test[0])->where('refconsumeruserid_c','=',$userid)->where('status_c','=','pending')->find();
				if($objCart->id == null){
					$arr_returntestsinfo['error'] = 'Access denied.';
					die(json_encode($arr_returntestsinfo));
				}
				$rate = $this->gettestrate($objCart->itemid_c,$test[1]);
				if($rate != "Not Provided"){
					$discount = new helper_Discount();
					$testcharges = $testcharges + ($rate * (100 - $discount->getDiscount($test[1],$objCart->itemid_c,$objUser->id))/100);
				}else{
					$arr_returntestsinfo['error'] = 'Selected Diagnostic lab does not provide some of the selected tests.';
					die(json_encode($arr_returntestsinfo));
				}
			}

			$testchargesfromclient = floatval($_GET['testcharges']);
			if(strval($testcharges) != strval($testchargesfromclient)){
				$arr_returntestsinfo['error'] = 'Test charges not matching.';
				die(json_encode($arr_returntestsinfo));
			}
			
			$objIndividualPlan = ORM::factory('billingindividualplan')->where('refusersid_c','=',$userid)->where('status_c','=','active')->find();
			$planid = $objIndividualPlan->refplanid_c;
			
			$objbillingplancharge = ORM::factory('billingplancharge')->join('billingindividualplans')->on('billingplancharge.ref_planid_c','=','billingindividualplans.refplanid_c')->where('billingindividualplans.status_c','=','active')->where('billingindividualplans.refusersid_c','=',$userid)->find();
			$servicecharges =$objbillingplancharge->servicecharges_c;
			$servicecharges=number_format($servicecharges);
			
			$servicetax = $array_taxes['servicetax'];		
			$diagnosticlabsservicetax = $array_taxes['diagnosticlabservicetax'];
	
			$servicetaxonservicecharges = $servicecharges * $servicetax / 100;

			$servicetaxonfees = $testcharges * $diagnosticlabsservicetax / 100;		

			// payment from patient
			// Payment offline so no transaction generated 
			// Only orders placed 
			if($payment_mode=="0")
			{
			$array_accounts = include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/config/accounts.php');
			$obj_user 	= Auth::instance()->get_user();
			$objAccounts	= ORM::factory('billingaccount');
			$objAccounts 	= $objAccounts->where('refaccountuserid_c','=',$obj_user->id)->find();

				if($objAccounts->netbalance_c < ($servicetaxonfees + $testcharges + $servicecharges + $servicetaxonservicecharges))
				{
					$arr_returntestsinfo['error'] = 'You have insufficient balance in your account please recharge account and proceed to payment';
					$session = Session::instance();
					$session->set('followlink', '/ccheckout/view');
					Request::current()->redirect("/crecharge/displayinsufficientbalance?curbalance=$objAccounts->netbalance_c&reqbalance=".round($servicetaxonfees + $testcharges + $servicecharges + $servicetaxonservicecharges, 2));
					die(json_encode($arr_returntestsinfo));
				}
			}
			// else
			// {
			// 	die(json_encode($arr_returntestsinfo));
			// }
			$ordertests = array();
			$i= 0;
			$arr_cart = array();
			$j=0;
			//if "pathologistid"  change then save it cart. 
			foreach($tests as $test)
			{
				$objCart = ORM::factory('cart')->where('id', '=', $test[0])->find();
				$objCart->refprovideruserid_c =$test[1];
				$objCart->save();
				
				if($objCart->appid_c!= null)
				{
					$objAppointmenttest = ORM::factory('appointmenttest')->where('refrecomtestappointmentsid_c','=',$objCart->appid_c)->where('refrecomtestrecommtestid_c','=',$objCart->itemid_c)->find();
					$objAppointmenttest->refselectedpathologistsid_c= $test[1];
					$arr_cart[$j]['cartid']=$test[0];
					$arr_cart[$j]['appid']=$objCart->appid_c;
					$arr_cart[$j]['pathid']=$test[1];
					$arr_cart[$j]['testid']=$objCart->itemid_c;
					$arr_cart[$j]['reqdate']=$requestdate;
					$j++;
				}
			}
			$objCartitems = ORM::factory('cart')->where('refconsumeruserid_c', '=', $userid)->where('status_c','=','pending')->find_all();
			//create order id depend on order pathologist
			foreach($objCartitems as $cartitem)
			{
				$matchpostion="";
				$valuleisset = $this->checkvaluepresent($ordertests, 'pathid', $cartitem->refprovideruserid_c);
				if($valuleisset == true)
				{
					$matchpostion = $this->checkvaluepresentpostion($ordertests, 'pathid', $cartitem->refprovideruserid_c);
				}
				if($valuleisset != true)
				{
					$ordertests[$i]['pathid']=$cartitem->refprovideruserid_c;
					$testidarray= array();
					array_push($testidarray,$cartitem->itemid_c);
					$ordertests[$i]['testid']=$testidarray;
					$ordertests[$i]['reqdate']=$requestdate;
					$i++;
				}
				else
				{
					$ordertests[$matchpostion]['pathid']=$cartitem->refprovideruserid_c;
					$newtestidarray=$ordertests[$matchpostion]['testid'];
					
					array_push($newtestidarray,$cartitem->itemid_c);
					$ordertests[$matchpostion]['testid']=$newtestidarray;
					$ordertests[$matchpostion]['reqdate']=$requestdate;
				}
			}
			//pace order in "diagnosticlabsorders" table and "orderedtest" table
			$arraycount=0;

			foreach($ordertests as $test)
			{
				$objOrders = ORM::factory('Diagnosticlabsorder');
				$today = date('Y-m-d g:i:s a');
				$objOrders->orderdate_c = $today;
				$objOrders->orderrequestdate_c = date('Y-m-d H:i:s',strtotime($test['reqdate']));
				$objOrders->status_c = 'requested';
				$objOrders->refdiaglabsorderspathologistsid_c = $test['pathid'];
				$objOrders->updatestatusdate_c = $today;
				$objOrders->rate_c = $testcharges;
				$objOrders->atcenterflag_c = $radiobtn;
				$objOrders->cashpaymentflag_c = $payment_mode; // Offline / online payments
				$objOrders->paid_c= 1;
				$objOrders->save();
				$orderid = $objOrders->id;//get order id 
				$reqdate = $objOrders->orderrequestdate_c;//get request date 
				$testids = $test['testid'];
				$precount = "not set";
				$ratefororder=0;
				foreach($testids as $testid)
				{
					$objordertest = ORM::factory('orderedtest');
					$objordertest->customeruserid_c = $userid;
					$objordertest->testid_c = $testid;
					$objordertest->diagnosticlabsorderid_c = $orderid;
					$objCatalog = ORM::factory('pathologistcatalog')->where('refpathcatalogtestid_c','=',$testid)->where('refpathcatalogpathologistsid_c','=',$test['pathid'])->find();
					//$objordertest->rate_c=$objCatalog->test_rate_c;
					//$objordertest->save();
					$valuleInAppCart = $this->checkvaluepresent($arr_cart, 'testid', $testid);
					if($valuleInAppCart == true )//this test is from recommended by dr during appointment.
					{
						$count = $this->findcorrectposition($arr_cart,$testid,$test['pathid'],$precount);
						$precount = $count;
						$objAppointmenttest = ORM::factory('appointmenttest')->where('refrecomtestappointmentsid_c','=',$arr_cart[$count]['appid'])->where('refrecomtestrecommtestid_c','=',$testid)->where('refrecomtestdiaglabsordersid_c','=',null)->find();
						if($objAppointmenttest->id !=NULL)
						{
							$objAppointmenttest->refrecomtestdiaglabsordersid_c=$orderid;//place orderid in recommendedtest table
							$objAppointmenttest->save();
						}
					}
					$arr_returntestsinfo[$arraycount]['id']=$orderid ;
					$testmasters = ORM::factory('testmaster')->where('id','=',$testid)->find();
					$arr_returntestsinfo[$arraycount]['testname']=$testmasters->testname_c;
					$objpathologist = ORM::factory('pathologist')->where('id','=',$test['pathid'])->find();
					$arr_returntestsinfo[$arraycount]["centername"] = $objpathologist->nameofcenter_c; 
					$arr_returntestsinfo[$arraycount]['rate']=$objCatalog->test_rate_c;
					$arr_returntestsinfo[$arraycount]['reqdate']=$reqdate;
					
					$discount = new helper_Discount();
					$discount = $discount->getDiscount($objpathologist->id,$testid,$objUser->id);
					
					$arr_returntestsinfo[$arraycount]['discountedrate']=$objCatalog->test_rate_c * (100 - $discount)/100;
					
					$arraycount++;
					$ratefororder=$ratefororder+$objCatalog->test_rate_c;
					$objordertest->rate_c=$objCatalog->test_rate_c * (100 - $discount)/100;
					//$objordertest->rate_c =$ratefororder;//total cost for that orderid.
					$objordertest->save();
				}
			}
			//change status requested in cart table.
			foreach($tests as $test)
			{
				$objCart = ORM::factory('cart')->where('id', '=', $test[0])->find();
				$objCart->status_c='requested';
				$objCart->save();
			}
			
			// transfer balance
			// Payment online so transfer amount in provisional account
		if($payment_mode=="0")
		{
			if($objAccounts->netbalance_c < ($servicetaxonfees + $testcharges + $servicecharges + $servicetaxonservicecharges)){
				$arr_returntestsinfo['error'] = 'You have insufficient balance in your account please recharge account and proceed to payment';
				die(json_encode($arr_returntestsinfo));
			}
			else
			{
				// deduct service provider charges and tax	
				$testsresult = transaction::transfer( $objAccounts->accountcode_c,ORM::factory('billingaccount')->where('refaccountuserid_c','=',$array_accounts['provisionaccountuserid'])->find()->accountcode_c,1,$testcharges,8);
				$servicetaxontestsresult = transaction::transfer( $objAccounts->accountcode_c,ORM::factory('billingaccount')->where('refaccountuserid_c','=',$array_accounts['provisionaccountuserid'])->find()->accountcode_c,1,$servicetaxonfees,13);
				$return = transaction::savedetails($testsresult,$planid,$testcharges,$userid,$array_accounts['provisionaccountuserid'],$servicetaxonfees,$diagnosticlabsservicetax,$servicetaxontestsresult);
				if($return != 'success'){
					throw new exception($return);
				}
				
				//deduct IOH service charges and tax
				$servicechargesresult = transaction::transfer($objAccounts->accountcode_c, ORM::factory('billingaccount')->where('refaccountuserid_c','=',$array_accounts['ayushmanincomeuserid'])->find()->accountcode_c,1,$servicecharges,1);
				$servicetaxresult = transaction::transfer($objAccounts->accountcode_c, ORM::factory('billingaccount')->where('refaccountuserid_c','=',$array_accounts['ayushmanincomeuserid'])->find()->accountcode_c,1,$servicetaxonservicecharges,12);
				$return = transaction::savedetails($servicechargesresult,$planid,$servicecharges,$userid,$array_accounts["ayushmanincomeuserid"],$servicetaxonservicecharges,$servicetax,$servicetaxresult);
				if($return != 'success')
				{
					throw new exception($return);
				}
					die(json_encode($arr_returntestsinfo));

			  }
		}
		else
		{
			die(json_encode($arr_returntestsinfo));
		}
	}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
	
}
	
	private function findcorrectposition($arr_cart,$testid,$pathid,$precount)
	{
		try{
			$count = 0;
			foreach ($arr_cart as $item)
			{
				if (($item['testid'] == $testid) && ($item['pathid'] == $pathid))
				 {  
				 	if(($precount==0)or ($count != $precount))
				 		{ 
							return $count;
							break;
						}
					
				 }
				 else
				 {
					$count++;
				 }
			}
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
	}
					
	
}
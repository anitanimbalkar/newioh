<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cpatientmedicinesorder extends Controller_Ctemplatewithmenu {
public function action_printmedicineorder()
{
			$content = View::factory('vuser/vpatient/vprintmedicineorder');
			$this->template->content = $content;

}	

public function action_removeorder()
{
	try{
			$array_accounts  = include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/config/accounts.php');
			$orderno=$_GET['orderno'];
			$objUser = Auth::instance()->get_user();
			$userid = $objUser->id;
			if($orderno != "")
			{
							
				$objtest = ORM::factory('chemistmedicineorder')->where('id','=',$orderno)->find();
				if($objtest->id != "")
				{	

					$objtest->status_c= 'Cancelled';
					$objtest->save();
				}
			}
		
	
			die();
		} catch (Exception $e) {
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
				$objpathologist = ORM::factory('chemist')->where('id','=',$pathologistid)->find();
				$pathologistuserid= $objpathologist->refchemistsuserid_c;
				//1st add into xmpp network
				$arr_xmpp =Kohana::$config->load('xmpp');
				$obj_user = Auth::instance()->get_user();		
				$var = xmpp::addRosterContact($pathologistuserid.'@'.$arr_xmpp['servername'],$pathologistuserid.'@'.$arr_xmpp['servername'],$userid.'@'.$arr_xmpp['servername'],$objUser->xmpppassword_c);
				if($var != 'success')//error while adding in xmpp contact list 
				{
					throw new Exception($var["ERROR"]);
				}
		
				$objFavoritePathologistByPatients = ORM::factory('favoritechemistbypatient')///if "pathologist and patient pair" is  present 
													->where('reffavchembypatpatientid_c','=',$patientid)
													->where('reffavchembypatchemistsid_c','=',$pathologistid)
													->find()
													->as_array();
				if($objFavoritePathologistByPatients["id"] == null)//if "pathologist and patient pair" is not present then add. 
				{
					$objFavoritePathologistByPatients = ORM::factory('favoritechemistbypatient');
					$objFavoritePathologistByPatients->reffavchembypatpatientid_c=$patientid;
					$objFavoritePathologistByPatients->reffavchembypatchemistsid_c=$pathologistid;
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
					
	
public function action_ordertest()
	{
		try
		{
			$arr_returntestsinfo = array();
			$objUser = Auth::instance()->get_user();
			$userid = $objUser->id;
			$tests=json_decode($_GET['test']);
			//$orderrequestdate=$_GET['orderrequestdate'];
			$testcharges = 0;
			foreach($tests as $test)
			{
				$objCart = ORM::factory('medicinecart')->where('id', '=', $test[0])->where('refconsumeruserid_c','=',$userid)->where('status_c','=','pending')->find();
				if($objCart->id == null){
					$arr_returntestsinfo['error'] = 'Access denied.';
					die(json_encode($arr_returntestsinfo));
				}
				//$rate = $this->gettestrate($objCart->itemid_c,$test[1]);
				// if($rate != "Not Provided"){
				// 	$discount = new helper_Discount();
				// 	$testcharges = $testcharges + ($rate * (100 - $discount->getDiscount($test[1],$objCart->itemid_c))/100);
				// }else{
				// 	$arr_returntestsinfo['error'] = 'Selected Diagnostic lab does not provide some of the selected tests.';
				// 	die(json_encode($arr_returntestsinfo));
				// }
			}
			
			// $objIndividualPlan = ORM::factory('billingindividualplan')->where('refusersid_c','=',$userid)->where('status_c','=','active')->find();
			// $planid = $objIndividualPlan->refplanid_c;
			
			// $objbillingplancharge = ORM::factory('billingplancharge')->join('billingindividualplans')->on('billingplancharge.ref_planid_c','=','billingindividualplans.refplanid_c')->where('billingindividualplans.status_c','=','active')->where('billingindividualplans.refusersid_c','=',$userid)->find();
			//$servicetax = $array_taxes['servicetax'];		
			// $diagnosticlabsservicetax = $array_taxes['diagnosticlabservicetax'];
	
			// $servicetaxonservicecharges = $servicecharges * $servicetax / 100;

			// $servicetaxonfees = $testcharges * $diagnosticlabsservicetax / 100;		

			
			$ordertests = array();
			$i= 0;
			$arr_cart = array();
			$j=0;
			//if "pathologistid"  change then save it cart. 
			foreach($tests as $test)
			{
				$objCart = ORM::factory('medicinecart')->where('id', '=', $test[0])->find();
				$objCart->refprovideruserid_c =$test[1];
				$objCart->save();
				
				
					//$objAppointmenttest = ORM::factory('appointmenttest')->where('refrecomtestappointmentsid_c','=',$objCart->appid_c)->where('refrecomtestrecommtestid_c','=',$objCart->itemid_c)->find();
					//$objAppointmenttest->refselectedpathologistsid_c= $test[1];
					$arr_cart[$j]['cartid']=$test[0];
					$arr_cart[$j]['reqdate']=$objCart->requestdeliverydate_c;
					$arr_cart[$j]['pathid']=$test[1];
					$arr_cart[$j]['testid']=$objCart->itemid_c;
					$j++;
				//}
			}
			$objCartitems = ORM::factory('medicinecart')->where('refconsumeruserid_c', '=', $userid)->where('status_c','=','pending')->find_all();
			//create order id depend on order chemist
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
					$ordertests[$i]['reqdate']=$cartitem->requestdeliverydate_c;
					$ordertests[$i]['testid']=$testidarray;
					$i++;
				}
				else
				{
					$ordertests[$matchpostion]['pathid']=$cartitem->refprovideruserid_c;
					$newtestidarray=$ordertests[$matchpostion]['testid'];
					
					array_push($newtestidarray,$cartitem->itemid_c);
					$ordertests[$matchpostion]['testid']=$newtestidarray;
					$ordertests[$matchpostion]['reqdate']=$cartitem->requestdeliverydate_c;
				}
			}
			//pace order in "diagnosticlabsorders" table and "orderedtest" table
			$arraycount=0;

			foreach($ordertests as $test)
			{
				$objOrders = ORM::factory('chemistmedicineorder');
				$today = date('Y-m-d g:i:s a');
				$objOrders->orderdate_c = $today;
				$objOrders->requestdeliverydate_c = $test['reqdate'];
				$objOrders->status_c = 'requested';
				$objOrders->refchemistid_c = $test['pathid'];
				$objOrders->updatestatusdate_c = $today;
				//$objOrders->rate_c = $testcharges;
				//$objOrders->paid_c= 1;
				//var_dump($test['reqdate']);
				$objOrders->save();
				$orderid = $objOrders->id;//get order id 
				$reqdate = $objOrders->requestdeliverydate_c;//get order id 
				$testids = $test['testid'];
				$precount = "not set";
				$ratefororder=0;
				foreach($testids as $testid)
				{
					$objordertest = ORM::factory('medicineorderdetail');
					//$objordertest->customeruserid_c = $userid;
					$objordertest->refdrugid_c = $testid;
					$objordertest->reforderid_c = $orderid;
					//$objCatalog = ORM::factory('pathologistcatalog')->where('refpathcatalogtestid_c','=',$testid)->where('refpathcatalogpathologistsid_c','=',$test['pathid'])->find();
					//$objordertest->rate_c=$objCatalog->test_rate_c;
					//$objordertest->save();
					$valuleInAppCart = $this->checkvaluepresent($arr_cart, 'testid', $testid);
					if($valuleInAppCart == true )//this test is from recommended by dr during appointment.
					{
						$count = $this->findcorrectposition($arr_cart,$testid,$test['pathid'],$precount);
						$precount = $count;
						
					}
					$arr_returntestsinfo[$arraycount]['id']=$orderid ;
					$testmasters = ORM::factory('drug')->where('id','=',$testid)->find();
					$arr_returntestsinfo[$arraycount]['testname']=$testmasters->drugname;
					$objpathologist = ORM::factory('chemist')->where('id','=',$test['pathid'])->find();
					$arr_returntestsinfo[$arraycount]["centername"] = $objpathologist->nameofmedical_c; 
					$arr_returntestsinfo[$arraycount]['reqdate']=$reqdate;
					
					// $discount = new helper_Discount();
					// $discount = $discount->getDiscount($objpathologist->id,$testid);
					
					// $arr_returntestsinfo[$arraycount]['discountedrate']=$objCatalog->test_rate_c * (100 - $discount)/100;
					
					 $arraycount++;
					// $ratefororder=$ratefororder+$objCatalog->test_rate_c;
					// $objordertest->rate_c=$objCatalog->test_rate_c * (100 - $discount)/100;
					//$objordertest->rate_c =$ratefororder;//total cost for that orderid.
					$objordertest->save();
				}
			}
			//change status requested in cart table.
			foreach($tests as $test)
			{
				$objCart = ORM::factory('medicinecart')->where('id', '=', $test[0])->find();
				$objCart->status_c='requested';
				$objCart->save();
			}
			
			die(json_encode($arr_returntestsinfo));
		}
		catch(Exception $e)
		{
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
	
	
public function action_removetest()
	{
		try{
			$testid=$_GET['testid'];
			$objUser = Auth::instance()->get_user();
			$userid = $objUser->id;
			if($testid != "")
			{
				$objtest = ORM::factory('medicinecart')->where('refconsumeruserid_c','=',$userid)->where('status_c','=','pending')->where('itemid_c','=',$testid)->find();
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
	
private function getpathologists($pathologistid,$testid)
	{
		try
		{
			$objUser = Auth::instance()->get_user();
			$objpatient = ORM::factory('patient')->where('repatientsuserid_c','=',$objUser->id)->mustFind();
			$objfavoritepathologistbypatient = ORM::factory('favoritechemistbypatient')->where('reffavchembypatpatientid_c','=',$objpatient->id)->find_all();
			$pathologists = array();
			$count = -1;
			foreach($objfavoritepathologistbypatient as $favoritepathologistpathologist)
			{
				$count=$count + 1;
				$pathologists[$count]  = array();
				$pathologists[$count]["centerid"] = $favoritepathologistpathologist->reffavchembypatchemistsid_c; 	
				$objpathologist = ORM::factory('chemist')->where('id','=',$favoritepathologistpathologist->reffavchembypatchemistsid_c)->find();
				$pathologists[$count]["centername"] = $objpathologist->nameofmedical_c; 
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
				$objpathologist = ORM::factory('chemist')->where('id','=',$pathologistid)->find();
				$pathologists[$count]["centername"] = $objpathologist->nameofmedical_c; 
			}
			$count =count($pathologists); 
			if(($count == 0) && ($pathologistid !=NULL ))
			{
				
					$count=$count + 1;
					$pathologists[$count]  = array();
					$pathologists[$count]["centerid"] = $pathologistid; 	
					$objpathologist = ORM::factory('chemist')->where('id','=',$pathologistid)->find();
					$pathologists[$count]["centername"] = $objpathologist->nameofmedical_c; 
			}
			return $pathologists;
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
	public function action_viewmycart()
	{
	//var_dump($_SERVER['HTTP_REFERER']); die;
		try
		{
			// $array_taxes = Kohana::$config->load('taxes');

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
			$objCart = ORM::factory('medicinecart')->where('refconsumeruserid_c', '=', $userid)->where('status_c','=','pending')->find_all();

			$objselectedtests = ORM::factory('medicinecart')->where('refconsumeruserid_c','=',$userid)->where('status_c','=','pending')->find_all();
				// var_dump($objCart->orderrequestdate_c);die;

			$tests = array();
							// $testreqdate = $objselectedtests->orderrequestdate_c;

			$i = 0;
			foreach($objselectedtests as $test)
			{
				$tests[$i] = array();
				$testmasters = ORM::factory('drug')->where('id','=',$test->itemid_c)->find();
				$tests[$i]["id"] = $testmasters->id;
				$tests[$i]["cartid"]= $test->id;
				$tests[$i]["qty"]= $test->qty_c;
				$tests[$i]["testname"] = $testmasters->drugname;
				$tests[$i]["testreqdate"] = date('d M Y',strtotime($test->requestdeliverydate_c));
				$objpathologist = ORM::factory('chemist')->where('id','=',$test->refprovideruserid_c)->find();
				$pathologistid = $test->refprovideruserid_c;
				$tests[$i]["pathologistid"]= $objpathologist->id;
				$tests[$i]["pathologistList"]= $this->getpathologists($pathologistid,$testmasters->id);

				//$tests[$i]["rate"] = $this->gettestrate($testmasters->id,$pathologistid);
				$i = $i + 1;
			}
			$objpatient = ORM::factory('patient')->where('repatientsuserid_c','=',$objUser->id)->find();
			$objfavoritepathologistbypatient = ORM::factory('favoritechemistbypatient')->where('reffavchembypatpatientid_c','=',$objpatient->id)->find_all();
			$arr_favoritepathologist = array();
			foreach($objfavoritepathologistbypatient as $objfavoritepathologist)
			{	

				if(! empty($objfavoritepathologist->reffavchembypatchemistsid_c))
					array_push($arr_favoritepathologist,trim(ucfirst($objfavoritepathologist->reffavchembypatchemistsid_c)));
									//var_dump($arr_favoritepathologist);

			}
			
			$referer = $_SERVER['HTTP_REFERER'];
			
			if(!strpos($referer,'cpatientmedicines')){
				$referer = "/ayushman/cpatientmedicines/view";
			}
			//$discount = new helper_Discount();
			//$discount = $discount->getDiscount();
			$content = View::factory('vuser/vpatient/vmedicinecart');
			$content->bind('userid', $userid);
			$content->bind('tests',$tests);
			$content->bind('arr_favoritepathologist',$arr_favoritepathologist);
			$content->bind('referer',$referer);
			$this->template->content = $content;
			$this->template->user =  $objUser->Firstname_c;
			$this->template->urole = $urole;
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
	}
	
public function action_savetocart()
	{
		try
		{	
			$tests=json_decode($_GET['test']);
			$testreqdate=strtotime($_GET['testreqdate']);
			$qty=$_GET['qty'];

//var_dump($testreqdate);
			$objUser = Auth::instance()->get_user();
			foreach($tests as $test)
			{
				$objcart = ORM::factory('medicinecart')->where('refconsumeruserid_c','=',$objUser->id)->where('itemid_c','=',$test[0])->where('status_c','=','pending')->find();
				if($objcart->id != null){
					continue;
				}
				$objcart = ORM::factory('medicinecart');
				$objcart->refconsumeruserid_c = $objUser->id;
				$objcart->refprovideruserid_c = $test[1];
				$objcart->requestdeliverydate_c = date('Y-m-d H:i:s',$testreqdate);
				$objcart->itemid_c = $test[0];
				$objcart->status_c = "pending";
				$objcart->qty_c = $qty;

				if(isset($test[2])){
					$objcart->appid_c = $test[2];
					//var_dump(date('yy-mm-dd',$testreqdate));
				}
				$objcart->save();
			}
			$number = ORM::factory('medicinecart')->where('refconsumeruserid_c', '=', $objUser->id)->where('status_c','=','pending')->count_all();
			die($number);
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
	}
	

private function getmynetworkpathologists()
	{
		try
		{
			$objUser = Auth::instance()->get_user();
			$objpatient = ORM::factory('patient')->where('repatientsuserid_c','=',$objUser->id)->find();
			$objfavoritechemistbypatient = ORM::factory('favoritechemistbypatient')->where('reffavchembypatpatientid_c','=',$objpatient->id)->find_all();
			$chemist = array();
			$count = -1;
			foreach($objfavoritechemistbypatient as $favoritechemistchemist)
			{
				$count=$count + 1;
				$chemist[$count]  = array();
				$chemist[$count]["centerid"] = $favoritechemistchemist->reffavchembypatchemistsid_c; 	
				$objchemist = ORM::factory('chemist')->where('id','=',$favoritechemistchemist->reffavchembypatchemistsid_c)->find();
				$chemist[$count]["centername"] = $objchemist->nameofmedical_c; 
			}
			return $chemist;
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
	}
	
public function action_getmedicineusingid()
	{
		try
		{
			$medid = $_GET['medid'];
			$objtests = ORM::factory('drug')->where('id','=',$medid )->find_all();
			$tests = array();
			$i = 0;
			foreach($objtests as $test)
			{
				$tests[$i] = array();
				$testmasters = ORM::factory('drug')->where('id','=',$medid)->find();
				$tests[$i]["id"] = $testmasters->id;
				$tests[$i]["testname"] = $testmasters->drugname;
				$tests[$i]["pathologyid"]= "";
				$tests[$i]["rate"]= "Not provided";
			    $tests[$i]["pathologistList"]= $this->getmynetworkpathologists();
			    //var_dump($tests[$i]["pathologistList"]);
				$i = $i + 1;
			}
			die(json_encode($tests));
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
	}
	
	private function displaysearchandorderorderedtests($where)
	{
		try
		{
			$objUser = Auth::instance()->get_user();
			if (!$objUser != NULL)
				Request::current()->redirect('cuser/login');
			else
			{	
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
				
					
				$number = ORM::factory('medicinecart')->where('refconsumeruserid_c', '=', $userid)->where('status_c','=','pending')->count_all();
				$viewname = 'vmedicinesearchandorder';
				$viewpath ='vuser/vpatient/'.$viewname;
				$content = View::factory($viewpath);
				$content->bind('userid', $userid);
				$content->bind('number',$number);
				$content->bind('where',$where);
				//var_dump($number);
				if($where!="")
					$whereclause = "[drugname,like,$where]";
				// else
				// 	$whereclause="";
				// $content->bind('whereclause',$whereclause);
				// $Objtestcategorymaster = ORM::factory('doctordrugdetails')->find_all();
				// $arrayTestcatagarty=array();
				// foreach($Objtestcategorymaster  as $testcategorymaster)
				// {
				// 	array_push($arrayTestcatagarty,$testcategorymaster->testcategoryname_c);
				// }
				//$content->bind('arrayTestcatagarty',$arrayTestcatagarty);
				$content->bind('whereclause',$whereclause);
				$breadcrumb = "Home>>";
				$this->template->breadcrumb = $breadcrumb;
				$this->template->content = $content;
				$this->template->user =  $objUser->Firstname_c;
				$this->template->urole = $urole;
			}
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
	
	}
	
	public function action_searchandorder()
	{
		$where="";
		$this->displaysearchandorderorderedtests($where);
	}

public function action_view()
	{
		$content = View::factory('vuser/vpatient/vmedicineorder');
		$user = Auth::instance()->get_user();
		if (!$user)
			Request::current()->redirect('cuser/login');
		else
			if ($user->has('roles', ORM::factory('role', array('name' => 'doctor'))))
				$urole = "doctor";
			else if ($user->has('roles', ORM::factory('role', array('name' => 'patient'))))
				$urole = "patient";	
		$userid = $user->id;
		
		$content->bind('userid', $userid);		
		$breadcrumb = "Home>>Medicines";
		$maximize = true;
		$this->template->breadcrumb = $breadcrumb;
		$this->template->content = $content;
		$this->template->user =  $user->Firstname_c;
		$this->template->urole = $urole;
	}

public function action_viewmedicinecompleteorder()
	{
		$content = View::factory('vuser/vpatient/vmedicinecompleteorder');
		$user = Auth::instance()->get_user();
		if (!$user)
			Request::current()->redirect('cuser/login');
		else
			if ($user->has('roles', ORM::factory('role', array('name' => 'doctor'))))
				$urole = "doctor";
			else if ($user->has('roles', ORM::factory('role', array('name' => 'patient'))))
				$urole = "patient";	
		$userid = $user->id;
		
		$content->bind('userid', $userid);		
		$breadcrumb = "Home>>Medicines";
		$maximize = true;
		$this->template->breadcrumb = $breadcrumb;
		$this->template->content = $content;
		$this->template->user =  $user->Firstname_c;
		$this->template->urole = $urole;
	}

}
?>
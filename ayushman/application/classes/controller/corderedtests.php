<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');

class Controller_Corderedtests extends Controller_Ctemplatewithmenu {
	public function action_view()
	{
		$this->displayorderedtest();
		
	}
    public function action_viewFootable()
    {
        $this->displayorderedtestFootable();

    }
    private function displayorderedtestFootable()
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
                $objbillingaccount = ORM::factory('billingaccount')->where('refaccountuserid_c','=',$userid)->find();
                $netbalance = $objbillingaccount->netbalance_c;
                $content = View::factory('vuser/vpatient/vpatientorderedtests');

                /*START: patient View Diagnostic test  by Pooja Gujarathi*/
                $searchview = $this->request->post('search');
                $columns = 'patientuserid,drname,centername,centerphonenumber,patientphonenumber,date,testreqdate,orderid,testsname,testid,status_c,status_c,pathologistid,patientid,pathologistuserid';
                $whereclause = "[patientuserid,=,$userid]";
                if($searchview != null){
                    $whereclause = $whereclause.'[drname,like,'.'%'.$searchview.'%]'.'(or)[centername,like,'.$searchview.'%]'.'(or)[testsname,like,'.'%'.$searchview.'%]'.'(or)[status_c,like,'.'%'.$searchview.'%]';
                }
                $object_patient_searchview = new Model_Xjqgridgetdata;
                $resultsearchview = $object_patient_searchview->getfootablejsondata('','','orderid','DESC','orderedtestbypatient',$columns,$whereclause,'');

                $ts = (object)$resultsearchview;
                $tests_json = array();
                foreach ($ts as $ts1) {
                    array_push($tests_json, $ts1);
                }
                $tests_json = json_encode($tests_json);

                /*END: patient patient View Diagnostic test by Pooja Gujarathi*/

                $content->bind('resultsearchview', $resultsearchview); //by Pooja Gujarathi
                $content->bind('tests_json', $tests_json); //by Pooja Gujarathi
                $content->bind('userid', $userid);
                $content->bind('netbalance', $netbalance);
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
	private function displayorderedtest()
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
				$objbillingaccount = ORM::factory('billingaccount')->where('refaccountuserid_c','=',$userid)->find();
				$netbalance = $objbillingaccount->netbalance_c;
				$content = View::factory('vuser/vpatient/vpatientorderedtests');

                /*START: patient View Diagnostic test  by Pooja Gujarathi*/
                $searchview = $this->request->post('search');
                $columns = 'patientuserid,drname,centername,centerphonenumber,patientphonenumber,date,testreqdate,orderid,testsname,testid,status_c,status_c,pathologistid,patientid,pathologistuserid';
                $whereclause = "[patientuserid,=,$userid]";
                if($searchview != null){
                    $whereclause = $whereclause.'[drname,like,'.'%'.$searchview.'%]'.'(or)[centername,like,'.$searchview.'%]'.'(or)[testsname,like,'.'%'.$searchview.'%]'.'(or)[status_c,like,'.'%'.$searchview.'%]';
                }
                $object_patient_searchview = new Model_Xjqgridgetdata;
                $resultsearchview = $object_patient_searchview->exportdata('','','orderid','DESC','orderedtestbypatient',$columns,$whereclause,'');
                /*END: patient patient View Diagnostic test by Pooja Gujarathi*/

                $content->bind('resultsearchview', $resultsearchview); //by Pooja Gujarathi
				$content->bind('userid', $userid);
				$content->bind('netbalance', $netbalance);
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

	// When order is cancelled by Patient himself
	public function action_removetest()
	{
		try{
			$array_accounts  = include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/config/accounts.php');
			$orderno=$_GET['orderno'];
			$objUser = Auth::instance()->get_user();
			$userid = $objUser->id;
			if($orderno != "")
			{
				$objtest = ORM::factory('diagnosticlabsorder')->where('id','=',$orderno)->find();
				if($objtest->id != "")
				{	
					$from_account 	= ORM::factory('billingaccount')->where('refaccountuserid_c','=',$array_accounts['provisionaccountuserid'])->find()->accountcode_c;
					$to_account 	= ORM::factory('billingaccount')->where('refaccountuserid_c','=',$userid)->find()->accountcode_c;
					
					// If online transaction then reverted back
					if($objtest->cashpaymentflag_c == 0)
					{
						if($objtest->paid_c)
						{
							$amount = $objtest->rate_c;
							$result = transaction::transfer($from_account,$to_account,1,$objtest->rate_c,8);
							$objtest->status_c= 'Cancelled';
							$objtest->save();
						}
					}
				}
			}
			die();
		} 
		catch (Exception $e) {
		throw new Exception($e);
		}
	}

	public function action_search()
	{
		$this->displayorderedtest();
	}
    public function action_searchViewFootable()
    {
        $this->displayorderedtestFootable();
    }
	
	public function action_reassigntests()
	{
		try
		{
			$tests=json_decode($_GET['test']);
			$oldOrderId = $_GET['orderid'];
			$transactiontype =$_GET['transactiontype'];
			$transactionamount =$_GET['transactionamount'];
			$objUser = Auth::instance()->get_user();
			$userID = $objUser->id;
		
			$rate=0;$reordertests = array();$i=0;
			$array_variable=array();$array_variable[] = 'from';$array_variable[] = 'to';
			$arrTranferInfo['variable']=$array_variable;
			foreach($tests as $test)
			{
				$objOrderedtest = ORM::factory('orderedtest')->where('diagnosticlabsorderid_c', '=', $oldOrderId)->where('status_c', '=', 'assign')->where('customeruserid_c', '=', $userID)->where('testid_c', '=', $test[0])->find();
				if($objOrderedtest->id != NULL)
				{
					$objOrderedtest->status_c ='reassign';
					$objOrderedtest->save();
				}
			}
			$objOrderedtests = ORM::factory('orderedtest')->where('diagnosticlabsorderid_c', '=', $oldOrderId)->where('status_c', '=', 'assign')->where('customeruserid_c', '=', $userID)->find_all();
			foreach($objOrderedtests as $objOrderedtest)
			{
				$rate=$rate + $objOrderedtest->rate_c;
			}	
			$objDiagnosticlabsorder = ORM::factory('diagnosticlabsorder')->where('id', '=', $oldOrderId)->find();
			$objDiagnosticlabsorder->rate_c=$rate;
			$objDiagnosticlabsorder->status_c = "reassign";
			$requestdate = $objDiagnosticlabsorder->orderrequestdate_c;
			$payment_mode = $objDiagnosticlabsorder->cashpaymentflag_c;
			$objDiagnosticlabsorder->save();
			//create order id depend on order pathologist
			foreach($tests as $test)
			{
				$matchpostion="";
				$valuleisset = $this->checkvaluepresent($reordertests, 'pathid', $test[1]);
				if($valuleisset == true)
				{
					$matchpostion = $this->checkvaluepresentpostion($reordertests, 'pathid', $test[1]);
				}
				if($valuleisset != true)//pathologist id is not present add to the reordertests array
				{
					$reordertests[$i]['pathid']=$test[1];
					$testidarray= array();
					array_push($testidarray,$test[0]);
					$reordertests[$i]['testid']=$testidarray;
					$i++;
				}
				else//pathologist id is present add testid to the proper postion in reordertests array
				{
					$reordertests[$matchpostion]['pathid']=$test[1];
					$newtestidarray=$reordertests[$matchpostion]['testid'];
					array_push($newtestidarray,$test[0]);
					$reordertests[$matchpostion]['testid']=$newtestidarray;
					$i++;
				}
			}
			foreach($reordertests as $test)
			{
				$ratefororder=0;
				$objOrders = ORM::factory('Diagnosticlabsorder');
				$today = date('Y-m-d g:i:s a');
				$objOrders->orderdate_c = $today;
				$objOrders->status_c = 'requested';
				$objOrders->orderrequestdate_c = $requestdate;
				$objOrders->cashpaymentflag_c = $payment_mode;
				$objOrders->refdiaglabsorderspathologistsid_c = $test['pathid'];
				$objOrders->updatestatusdate_c = $today;
				$objOrders->paid_c= 1;
				$objOrders->save();
				$orderid = $objOrders->id;//new get order id 
				$testids = $test['testid'];
				$precount = "not set";
				$ratefororder=0;
				foreach($testids as $testid)
				{
					$objordertest = ORM::factory('orderedtest');
					$objordertest->customeruserid_c = $userID;
					$objordertest->testid_c = $testid;
					$objordertest->diagnosticlabsorderid_c = $orderid;
					$objCatalog = ORM::factory('pathologistcatalog')->where('refpathcatalogtestid_c','=',$testid)->where('refpathcatalogpathologistsid_c','=',$test['pathid'])->find();
					$objordertest->rate_c=$objCatalog->test_rate_c;
					$objordertest->save();		
					$objAppointmenttest = ORM::factory('appointmenttest')->where('refrecomtestdiaglabsordersid_c','=',$oldOrderId)->where('refrecomtestrecommtestid_c','=',$testid)->find();
					if($objAppointmenttest->id != NULL)
					{	
						$objAppointmenttest->refrecomtestdiaglabsordersid_c=$orderid;//place orderid in recommendedtest table
						$objAppointmenttest->save();
					}		
					$ratefororder=$ratefororder+$objCatalog->test_rate_c;//total cost for that orderid.
				}
				$objOrders->rate_c = $ratefororder;
				$objOrders->save();
				//get old and new pathologist center name 
				$objNewPathologist = ORM::factory('pathologist')->join('diagnosticlabsorders')->on('diagnosticlabsorders.refdiaglabsorderspathologistsid_c','=','pathologist.id')->where('diagnosticlabsorders.id','=',$orderid)->find();
				$newPathologist= $objNewPathologist->nameofcenter_c;
				$objOldPathologist = ORM::factory('pathologist')->join('diagnosticlabsorders')->on('diagnosticlabsorders.refdiaglabsorderspathologistsid_c','=','pathologist.id')->where('diagnosticlabsorders.id','=',$oldOrderId)->find();
				$oldPathologist= $objOldPathologist->nameofcenter_c;
				$arrTranferInfo['from']=$newPathologist;$arrTranferInfo['to']=$oldPathologist;
			}
			
			//transaction 
			$array_accounts = include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/config/accounts.php');
			$obj_user 		= Auth::instance()->get_user();
			$objAccounts	=ORM::factory('billingaccount');
			$objAccounts 	= $objAccounts->where('refaccountuserid_c','=',$obj_user->id)->find(); 
			
			// Transaction only for Online payments
			if($payment_mode == 0)
			{
				if($transactiontype == "Debit")
					$testsresult = transaction::transfer( $objAccounts->accountcode_c,ORM::factory('billingaccount')->where('refaccountuserid_c','=',$array_accounts['provisionaccountuserid'])->find()->accountcode_c,1,$transactionamount,9,$arrTranferInfo);
				else
					$testsresult = transaction::transfer(ORM::factory('billingaccount')->where('refaccountuserid_c','=',$array_accounts['provisionaccountuserid'])->find()->accountcode_c,$objAccounts->accountcode_c,1,$transactionamount,9,$arrTranferInfo);
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
	
}
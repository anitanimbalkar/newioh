<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cpathologistneworder extends Controller {
	public function action_ordertest()
	{	
		try
		{
			$objUser = Auth::instance()->get_user();
			if (!$objUser)
				Request::current()->redirect('cuser/login');
			
			$userId = $objUser->id;
			$tests=json_decode($_GET["test"]);
			$requestdate =$_GET["reqdate"];
			$rates = json_decode($_GET["rate"]);
			$patid = $_GET["patid"];
			$atcenterflag = $_GET["atcenterflag"];
			$totalOrdvalue = $_GET["totalOrdvalue"];

			$userId = $objUser->id;
			$objpathologist = ORM::factory('pathologist')->where('refpathologistsuserid_c','=',$userId)->find();
			$pathologistId=$objpathologist->id;
			
			$objtestorder = ORM::factory('diagnosticlabsorder');
			$objtestorder->orderrequestdate_c=date('Y-m-d',strtotime($requestdate));
			$objtestorder->rate_c = $totalOrdvalue; 
			$objtestorder->status_c = 'accepted'; 
			$objtestorder->orderdate_c =date('Y-m-d'); 
			$objtestorder->refdiaglabsorderspathologistsid_c =$pathologistId; 
			$objtestorder->atcenterflag_c = $atcenterflag;
			$objtestorder->cashpaymentflag_c = 1;	// By default cash payment - Offline
			$objtestorder->save();
			
			$orderid = $objtestorder->id;//get order id 

			for ($i=0; $i<count($tests);++$i)
			{
				$objtest = ORM::factory('orderedtest');
				$objtest->testid_c= $tests[$i];
				$objtest->diagnosticlabsorderid_c= $orderid;
				$objtest->customeruserid_c= $patid;
				$objtest->rate_c= $rates[$i];
				$objtest->status_c= "assign";
				$objtest->save();
			}
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
	}
	public function action_editordertest()
	{	
		try
		{
			$objUser = Auth::instance()->get_user();
			if (!$objUser)
				Request::current()->redirect('cuser/login');
			
			$userId = $objUser->id;
			$tests=json_decode($_GET["test"]);
			$requestdate =$_GET["reqdate"];
			$rates = json_decode($_GET["rate"]);
			$patid = $_GET["patid"];
			$atcenterflag = $_GET["atcenterflag"];
			$totalOrdvalue = $_GET["totalOrdvalue"];
			$editreason = $_GET["editreason"];
			
			// Previous order is Cancelled and
			// new created in place
			$editorderid = $_GET["orderid"];
			$objtestorder = ORM::factory('diagnosticlabsorder')
								->where("id","=",$editorderid)->find();
			if($objtestorder->id)
			{
				var_dump("Cancelling Order");
				$objtestorder->status_c = "cancelled";
				$objtestorder->save();
			}
			
			$userId = $objUser->id;
			$objpathologist = ORM::factory('pathologist')->where('refpathologistsuserid_c','=',$userId)->find();
			$pathologistId=$objpathologist->id;
			
			$objtestorder = ORM::factory('diagnosticlabsorder');
			$objtestorder->orderrequestdate_c=date('Y-m-d',strtotime($requestdate));
			$objtestorder->rate_c= $totalOrdvalue;
			$objtestorder->editreason_c= $editreason;
			$objtestorder->status_c = 'edited'; 
			$objtestorder->orderdate_c =date('Y-m-d'); 
			$objtestorder->refdiaglabsorderspathologistsid_c =$pathologistId; 
			$objtestorder->atcenterflag_c = $atcenterflag;
			$objtestorder->cashpaymentflag_c = 1;	// By default cash payment - Offline
			$objtestorder->save();
			
			$orderid = $objtestorder->id;//get order id 

			for ($i=0; $i<count($tests);++$i)
			{
				$objtest = ORM::factory('orderedtest');
				$objtest->testid_c= $tests[$i];
				$objtest->diagnosticlabsorderid_c= $orderid;
				$objtest->customeruserid_c= $patid;
				$objtest->rate_c= $rates[$i];
				$objtest->status_c= "assign";
				$objtest->save();
			}
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
	}
}
?>

<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/notificationsender.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/controller/cpdfcreater.php');
class Controller_Cemr extends controller{

	public function action_requesttests()
	{
		$array_accounts = Kohana::$config->load('accounts');
		$pathologists 	= json_decode($_GET['ids']);
		$orders			= json_decode($_GET['orderfees']);
		$obj_user 		= Auth::instance()->get_user();

		if(json_decode($_GET['ids']) != null)
		{
			$intAppId=$_GET['appid'];
			$orderid = '';
			$pathologistsid = '';
			
			$orderids = array();
			$pathids = array();
			foreach($pathologists as $pathologist)
			{
				$objOrm = ORM::factory('Appointmenttest');
				$objOrm->where('refrecomtestrecommtestid_c','=',$pathologist[0]);
				$objOrm->where('refrecomtestappointmentsid_c', '=',$intAppId);			
				$objOrm->find();
				$objOrm->refrecomtestpathologists1id_c = $pathologist[2];
				$orderid = $objOrm->refrecomtestdiaglabsordersid_c;
				$objOrm->update();
				$orders[$pathologist[2]];

				$flag = false;
				foreach($orderids as $ordid)
				{
					if($ordid == $orderid)
						$flag = true;
				}
				if(!$flag)
				{
					array_push($orderids, $orderid);
				}
				
				$flag = false;
				foreach($pathids as $pathid)
				{
					if($pathid == $pathologist[2])
						$flag = true;
				}
				if(!$flag)
				{
					array_push($pathids, $pathologist[2]);
				}
			}
			$i = 0;
			$orderid = $orderids[0];
			
			foreach($pathids as $pathid)
			{
				$result = transaction::transfer(ORM::factory('billingaccount')->where('refaccountuserid_c','=',$obj_user->id)->find()->accountcode_c,ORM::factory('billingaccount')->where('refaccountuserid_c','=',$array_accounts['provisionaccountuserid'])->find()->accountcode_c,1,$orders[$pathid],8);
				if($result['type'] == 'success' && $result['data']['dr_code'] != ''){
					if($i == 0)
					{
						
					}else{
						$objOrders = ORM::factory('Diagnosticlabsorder');
						$today = date('Y-m-d g:i:s a');
						$objOrders->orderdate_c = $today;
						$objOrders->status_c = 'request';
						$objOrders->refdiaglabsorderspathologistsid_c = $pathid;
						$objOrders->updatestatusdate_c = $today;
						$objOrders->save();
						$orderid = $objOrders->id;
					}
					if($orderid == '')
					{
						$objOrders = ORM::factory('Diagnosticlabsorder');
						$today = date('Y-m-d g:i:s a');
						$objOrders->orderdate_c = $today;
						$objOrders->status_c = 'request';
						$objOrders->refdiaglabsorderspathologistsid_c = $pathid;
						$objOrders->updatestatusdate_c = $today;
						$objOrders->save();
						$orderid = $objOrders->id;
					}
					$objOrm = ORM::factory('Appointmenttest');
					$objOrm->where('refrecomtestappointmentsid_c', '=',$intAppId);
					$objOrm->where('refrecomtestpathologists1id_c', '=',$pathid);
					$objOrm = $objOrm->find_all();
					foreach($objOrm as $obj)
					{
						$obj->refrecomtestdiaglabsordersid_c = $orderid;
						$obj->update();
					}
					$i = $i+1;
					$obj_orders = ORM::factory('Diagnosticlabsorder');
					$obj_orders = $obj_orders->where('id','=',$orderid)->find();
					$obj_orders->status_c = "requested";
					$obj_orders->rate_c = $orders[$pathid];
					$obj_orders->paid_c = true;
					$obj_orders->update();
				}else{
					die('error');
				}
			}
			die('success');
		}
	}
	
	function action_getvisitsummarypdf()
	{
		$intAppId=$_GET['appid'];
		$objfile = ORM::factory('Appointmentupload')->where('refappuploadappointmentsid_c','=',$intAppId)->find();
		
		if($objfile->fileid_c != null){
			$file = new helper_Files();
			$return = $file->getFilePath($objfile->fileid_c);
			if($return == ''){
				$datestring = htmlspecialchars(date ("dmYHis"), ENT_QUOTES);
				$pdfCreaterObj = new Cpdfcreater;
				$pdfpath = $pdfCreaterObj->createpdf($intAppId, $datestring);
				$this->response->body($pdfpath);
			}else{
				$this->response->body($return['abspath']);
			}
		}else{
			$datestring = htmlspecialchars(date ("dmYHis"), ENT_QUOTES);
			$pdfCreaterObj = new Cpdfcreater;
			$pdfpath = $pdfCreaterObj->createpdf($intAppId, $datestring);
			$this->response->body($pdfpath);
		}
	}
	
	public function action_requestmedicines()
	{
		$chemist = json_decode($_GET['ids']);
		$orders = new helper_Orders();
		$orders->placemedicineorder($chemist,$_GET['appid']);
	}

	public function action_reasignmedicines()
	{ 
		
		$chemist = json_decode($_GET['ids']);
	
		if(json_decode($_GET['ids']) != null)
		{
			$intAppId=$_GET['appid'];
			$orderid = '';
			$chemistsid = '';
			$orderid = '';
			$orderids = array();
			$chemids = array();
			
			$objOrm = ORM::factory('prescription');
			$objOrm->where('refprescriptionsappoitmentid_c','=',$intAppId);		
			$prescrtionids= $objOrm->find_all()->as_array();
			$i=0;
			$arr_chemistid=array();
			foreach($prescrtionids as $prescrtionid)
			{
				$objPrescriptionDetails = ORM::factory('prescriptiondetail')
												->where('refpdetailsprescriptionsid_c','=',$prescrtionid->id)
												->where('refpdetailsdrugid_c','=',$chemist[$i][0])->find();
				if($objPrescriptionDetails->id)//check for correct object of PrescriptionDetail
					{	
					 $orderid=$objPrescriptionDetails->refchemistordersid_c;
					}
			}
			$ormchemists = ORM::factory('chemistmedicineorder')->where('id','=',$orderid)->find();	
			if(isset($ormchemists->refchemistid_c))
			{
				$arr_chemistid=array($chemist[$i][2]=>$orderid);
			}
			
			$orederidpre=$orderid;
			
			for($i=0;$i<count($chemist);$i++)
			{ 
					$objPrescriptionDetails = ORM::factory('prescriptiondetail')
												->where('refchemistordersid_c','=',$orederidpre)
												->find_all()->as_array();
					foreach($objPrescriptionDetails as $objPrescriptionDetail)
					{ 
					
						if($objPrescriptionDetail->refpdetailsdrugid_c == $chemist[$i][0])
						{
							$ormchemists = ORM::factory('chemistmedicineorder')->where('id','=',$objPrescriptionDetail->refchemistordersid_c)->find();	
							if($ormchemists->refchemistid_c == $chemist[$i][2] )
							{ 
							
								 $orderid = $objPrescriptionDetail->refchemistordersid_c;
								 $objPrescriptionDetail->refchemistordersid_c=$orderid;
									$objPrescriptionDetail->save();
							}
							else
							{
								if (array_key_exists($chemist[$i][2], $arr_chemistid))
								{
								
									$orderid=$arr_chemistid[$chemist[$i][2]];	
									$ormchemists = ORM::factory('chemistmedicineorder')->where('id','=',$arr_chemistid[$chemist[$i][2]])->find();
									$ormchemists->refchemistid_c = $chemist[$i][2];
									$today = date('Y-m-d g:i:s a');
									$ormchemists->orderdate_c = $today;
									$ormchemists->status_c = 'requested';
									$ormchemists->updatestatusdate_c = $today;
									$ormchemists->save();
									$orderid = $ormchemists->id;
									$PrescriptionDetail = ORM::factory('prescriptiondetail')
														->where('id','=',$objPrescriptionDetail->id)->find();
									$PrescriptionDetail->refchemistordersid_c = $orderid;
									$PrescriptionDetail->save();
									
								}
								else
								{
									$ormchemists = ORM::factory('chemistmedicineorder');
									$ormchemists->refchemistid_c = $chemist[$i][2];
									$today = date('Y-m-d g:i:s a');
									$ormchemists->orderdate_c = $today;
									$ormchemists->status_c = 'requested';
									$ormchemists->updatestatusdate_c = $today;
									$ormchemists->save();
									$orderid = $ormchemists->id;
									$PrescriptionDetail = ORM::factory('prescriptiondetail')
														->where('id','=',$objPrescriptionDetail->id)->find();
							
									$PrescriptionDetail->refchemistordersid_c = $orderid;
									$PrescriptionDetail->save();
									if(! (array_key_exists($chemist[$i][2], $arr_chemistid)))
										{
										
											$arr_chemistid[$chemist[$i][2]]=$orderid;
											
										}
								}
							}
						}
					}
				
			}
		}
	}
}
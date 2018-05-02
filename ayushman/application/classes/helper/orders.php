<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');
require_once('simple_html_dom.php');

class helper_Orders {
	
	public function acceptorder($orderid,$date)
	{
		$arr_accounts	= Kohana::$config->load('accounts');
		$id 			= $orderid;
		$obj_user 		= Auth::instance()->get_user();
		$time 			= strtotime( $date );
		$date 			= date( 'y-m-d', $time );
		$pathologist = ORM::factory('pathologist')->where('refpathologistsuserid_c','=',$obj_user->id)->find();
		$objorder = ORM::factory('diagnosticlabsorder')->where('id','=',$id)->where('refdiaglabsorderspathologistsid_c','=',$pathologist->id)->find();
		if($objorder->id == NULL){
			$data = array();
			$data['type']			="error";
			$data['message'] 		= 'Order id ('.$id.') does not exist for the pathologist.';
			return $data;
		}
		$objAccounts=ORM::factory('billingaccount');
		$objAccounts = $objAccounts->where('refaccountuserid_c','=',$obj_user->id)->find();
		if($objorder->cashpaymentflag_c == 0)
		{
			// Transaction between pathologist and Ayushman Provisional Account
			$from_account 	= ORM::factory('billingaccount')->where('refaccountuserid_c','=',$arr_accounts['provisionaccountuserid'])->find()->accountcode_c;
			$to_account 	= ORM::factory('billingaccount')->where('refaccountuserid_c','=',$obj_user->id)->find()->accountcode_c;
			if($objorder->paid_c){
				$amount = $objorder->rate_c;
				$result = transaction::transfer($from_account,$to_account,1,$objorder->rate_c,8);
				if($result['type'] == "success"){
					$objorder->deliverydate_c = $date;
					$objorder->status_c = 'accepted'; 
					$objorder->issynched_c = 1; 
					$objorder->update();
			
					$data = array();
					$data['type']		= "success";
					$data['data'] 		= "status updated";
					return $data;
				}else{
					$data = array();
					$data['type']			="error";
					$data['message'] 		= $result['message'];
					return $data;
				}
			}else{
				$data = array();
				$data['type']			= "error";
				$data['message'] 		= 'Charges are not paid for this order.';
				return $data;
			}
		}
		else
		{
			// Auto Order placed so no accounts affected only changed status of Order
			$objorder->deliverydate_c = $date;
			$objorder->status_c = 'accepted'; 
			$objorder->update();
			$data = array();
			$data['type']		= "success";
			$data['data'] 		= "status updated";
			return $data;
		}
	}
	
	public function rejectorder($orderid, $rejectreason)
	{
		$arr_accounts	= Kohana::$config->load('accounts');
		$id 			= $orderid;
		$obj_user 		= Auth::instance()->get_user();

		$pathologist = ORM::factory('pathologist')->where('refpathologistsuserid_c','=',$obj_user->id)->find();
		$objorder = ORM::factory('diagnosticlabsorder')->where('id','=',$id)->where('refdiaglabsorderspathologistsid_c','=',$pathologist->id)->find();
		
		if($objorder->id == NULL){
			$data = array();
			$data['type']			="error";
			$data['message'] 		= 'Order id ('.$id.') does not exist for the pathologist.';
			return $data;
		}
		
		$orderedtests = ORM::factory('orderedtest')->where('diagnosticlabsorderid_c','=',$id)->find();
		
		$objAccounts=ORM::factory('billingaccount');
		$objAccounts = $objAccounts->where('refaccountuserid_c','=',$obj_user->id)->find();
		$from_account 	= ORM::factory('billingaccount')->where('refaccountuserid_c','=',$arr_accounts['provisionaccountuserid'])->find()->accountcode_c;
		$to_account 	= ORM::factory('billingaccount')->where('refaccountuserid_c','=',$orderedtests->customeruserid_c)->find()->accountcode_c;
//		if($objorder->paid_c){
		if($objorder->cashpaymentflag_c == 0){
			if($objorder->paid_c){
				$amount = $objorder->rate_c;
				$result = transaction::transfer($from_account,$to_account,1,$objorder->rate_c,8);
				if($result['type'] == "success"){
					$objorder->rejectreason_c = $rejectreason;
					$objorder->status_c = 'rejected'; 
					$objorder->paid_c = 0;
					$objorder->rate_c = 0;
					$objorder->issynched_c = 0; 
					$objorder->update();
				
					$data = array();
					$data['type']		= "success";
					$data['data'] 		= "status updated";
					return $data;
				}else{
					$data = array();
					$data['type']			="error";
					$data['message'] 		= $result['message'];
					return $data;
				}
			}else{
				$data = array();
				$data['type']			= "error";
				$data['message'] 		= 'Charges are not paid for this order.';
				return $data;
			}
		}
		else
		{	// Auto order placed so just update status of order
			$objorder->rejectreason_c = $rejectreason;
			$objorder->status_c = 'rejected'; 
			$objorder->paid_c = 0;
			$objorder->rate_c = 0;
			$objorder->issynched_c = 0; 
			$objorder->update();
				
			$data = array();
			$data['type']		= "success";
			$data['data'] 		= "status updated";
			return $data;
		}
	}
	public function cancelorder($orderid, $cancelreason)
	{
		$arr_accounts	= Kohana::$config->load('accounts');
		$id 			= $orderid;
		$obj_user 		= Auth::instance()->get_user();

		
		$pathologist = ORM::factory('pathologist')->where('refpathologistsuserid_c','=',$obj_user->id)->find();
		$objorder = ORM::factory('diagnosticlabsorder')->where('id','=',$id)->where('refdiaglabsorderspathologistsid_c','=',$pathologist->id)->find();
		
		if($objorder->id == NULL){
			$data = array();
			$data['type']			="error";
			$data['message'] 		= 'Order id ('.$id.') does not exist for the pathologist.';
			return $data;
		}
		
		$orderedtests = ORM::factory('orderedtest')->where('diagnosticlabsorderid_c','=',$id)->find();
		
		$objAccounts=ORM::factory('billingaccount');
		$objAccounts = $objAccounts->where('refaccountuserid_c','=',$obj_user->id)->find();
		$from_account 	= ORM::factory('billingaccount')->where('refaccountuserid_c','=',$pathologist->id)->find()->accountcode_c;
		$to_account 	= ORM::factory('billingaccount')->where('refaccountuserid_c','=',$orderedtests->customeruserid_c)->find()->accountcode_c;
//		if($objorder->paid_c){
		if ($objorder->cashpaymentflag_c == 0) {
			if($objorder->paid_c){
				$amount = $objorder->rate_c;
				$result = transaction::transfer($from_account,$to_account,1,$objorder->rate_c,8);
				if($result['type'] == "success"){
					$objorder->rejectreason_c = $cancelreason;
					$objorder->status_c = 'canceled'; 
					$objorder->paid_c = 0;
					$objorder->rate_c = 0;
					$objorder->issynched_c = 0; 
					$objorder->update();
				
					$data = array();
					$data['type']		= "success";
					$data['data'] 		= "status updated";
					return $data;
				}else{
					$data = array();
					$data['type']			="error";
					$data['message'] 		= $result['message'];
					return $data;
				}
			}else{
				$data = array();
				$data['type']			= "error";
				$data['message'] 		= 'Charges are not paid for this order.';
				return $data;
			}
		}
		else
		{
			// Auto Order palced so no accountingtransactions 
			$objorder->rejectreason_c = $cancelreason;
			$objorder->status_c = 'canceled'; 
			$objorder->paid_c = 0;
			$objorder->rate_c = 0;
			$objorder->issynched_c = 0; 
			$objorder->update();			
		}
	}
	public function completeorder($orderid, $testdetails)
	{
		$data = array();
		try{
			$obj_user 		= Auth::instance()->get_user();
			$count = count($testdetails['TEST']);

			if(!isset($testdetails['TEST'][0])){
				$count = 1;	
			}			
			// Iterate through all tests
			for($i=0;$i < ($count);$i++)
			{
				if($count == 1){
					$test = $testdetails['TEST'];
				}else{
					$test = $testdetails['TEST'][$i];
				}
				
				$filecount = count($test['FILES']['FILE']);
				if(!isset($test['FILES']['FILE'][0])){
					$filecount = 1;	
				}
				
				$pdfs = array();
				$html = '';
				//Iterate through all files for the test
				for($j=0;$j < ($filecount);$j++)
				{
					if($filecount == 1){
						$file = $test['FILES']['FILE'];
					}else{
						$file = $test['FILES']['FILE'][$j];
					}

					//get file type and binary decoded document
					$filetype = $file['TYPE'];
					$document = $file['DOCUMENT'];
						
					$document = str_replace(array('@', '_' ,'*'), array('+', '/' ,'='), $document);
					$document = str_replace(array( ' '), array( '+'), $document);
					$binary_decoded_document = base64_decode ($document);
					
					$array_files = Kohana::$config->load('application');
					$now = new DateTime();
					$timestamp = $now->getTimestamp();
					
					$tempFileName =$array_files['temp'].$timestamp.'_'.$j.'.'.trim($filetype); 
					$file = fopen ($tempFileName,'w');
					fwrite ($file,$binary_decoded_document);
					fclose ($file);
					
					if($filetype == 'pdf' || $filetype == 'PDF'){
						array_push($pdfs,$tempFileName);
					}else if($filetype=='dcm')
					{
				
				$session= Session::instance();
			    $temp= $session->get('reportid');
				if(!isset($temp))
				{
				
				$dicomfile=ORM::factory("patienttestreport");
				$dicomfile->isdicom_c=1;
				$dicomfile->save();
				$session->set('reportid', $dicomfile->id);
				$files = new helper_Files();
				$returns = $files->moveToSpecificFolder($obj_user->id,$tempFileName,"Documents");
				$dicomfileobj=ORM::factory("dicomfile");
				$dicomfileobj->fileid_c=$returns['id'];
				$dicomfileobj->refreportid_c=$dicomfile->id;
				$dicomfileobj->save();
				}
				else
				{	
				$files = new helper_Files();
				$returns = $files->moveToSpecificFolder($obj_user->id,$tempFileName,"Documents");
				$dicomfileobj=ORM::factory("dicomfile");
				$dicomfileobj->fileid_c=$returns['id'];
				$dicomfileobj->refreportid_c=$temp;
				$dicomfileobj->save();
				}
				if(isset($_GET['id'])){
					$session->set($_GET['id'].'fileid', $return['id']);
				}
				
			}
					else{
						$html = $html."<img src='"."http://localhost/ayushman/".$array_files['abs-temp'].$timestamp.'_'.$j.'.'.trim($filetype)."'/>";;
					}
					
				}
				
				if($html != ''){
					$objHtml 	= new simple_html_dom();
					$objHtml->load($html);
				
					$files = new helper_Files();
					$return = $files->createPdf($objHtml);
					
					array_push($pdfs,$return['file']);
				}
				if($filetype!='dcm')
				{
				$files = new helper_Files();
				$return = $files->mergepdf($pdfs);
				}
				
				$parametercount = count($test['PARAMETERS']['PARAMETER']);
				if(!isset($test['PARAMETERS']['PARAMETER'][0])){
					$parametercount = 1;
				}
				
				//read parameters
				$arr_parameter = array();
				
				for($k=0;$k < ($parametercount);$k++)
				{
					if($parametercount == 1){
						$parameter = $test['PARAMETERS']['PARAMETER'];
					}else{
						$parameter = $test['PARAMETERS']['PARAMETER'][$k];
					}

					$arr_parameter[$parameter['LABPARAMETERNAME']] = array();
					$arr_parameter[$parameter['LABPARAMETERNAME']]['value'] = trim($parameter['OBSERVEDVALUE']);
					if(isset($parameter['UNIT'])){
						$arr_parameter[$parameter['LABPARAMETERNAME']]['unit'] = trim($parameter['UNIT']);
					}
					$arr_parameter[$parameter['LABPARAMETERNAME']]['range'] = trim($parameter['BIOLOGICALREFERENCE']);
					$arr_parameter[$parameter['LABPARAMETERNAME']]['isabnormal'] = trim($parameter['SIGNAL']);
					
					
				}
				$jsonParameters = json_encode($arr_parameter);
				
				
				
				$objTestReport = ORM::factory('patienttestreport')->where('refpatreportdiagnosticlaborderid_c','=',$orderid)->find();
				if($objTestReport->id != null){
					$objTestReport->delete();
				}
				
				$order 	= ORM::factory('orderedtest')->where('diagnosticlabsorderid_c','=',$orderid)->find();
				
				$objpathologists 	= ORM::factory('pathologist')
									->where('refpathologistsuserid_c','=',$obj_user->id)
									->find();
				$test = ORM::factory('testmaster')->where('testcode_c','=',$test['IOHTESTCODE'])->find();
				
				$objtestreport = new Model_Patienttestreport;
				$objtestreport->refpatreportdiagnosticlaborderid_c	= $orderid;
				$objtestreport->refpatreporttestid_c				= $test->id;
				$objtestreport->dateoftest_c						= date("Y-m-d") ;
				$objtestreport->refpatreportpathologistsid_c		= $objpathologists->id;
				$objtestreport->refpatientuserid_c 					= $order->customeruserid_c;
				if(isset($return['id']))
				$objtestreport->fileid_c							= $return['id'];
				if(isset($returns['id']))
					$objtestreport->isdicom_c='1';
				$objtestreport->testparameters						= $jsonParameters;
				$objtestreport->save();

			}
			
			
			$objorders = ORM::factory('diagnosticlabsorder')->where('id','=',$orderid)->find();	
			$objorders->status_c = 'reportsuploaded';
			$objorders->saveRecord();
			
			$data['type']			= "success";
			$data['message'] 		= 'Reports are uploaded';
			
		}catch(Exception $e){
			$data['type']			= "error";
			$data['message'] 		= $e->getMessage();
			return $data;
		}
		
		return $data;
	}
	public function processbulkorder($orderid, $status)
	{
		$data = array();
		try{
			$data['type']			= "success";
			$data['message'] 		= 'bulk order is processed.';
			
			$bulkupload = ORM::factory('bulkupload')->where('id','=',$orderid)->find();	
			if($status == 'accepted' || $status == 'rejected' ){
				if($bulkupload->status_c == 'created'){
					$bulkorders = ORM::factory('bulkorder')->where('refbulkuploadid_c','=',$bulkupload->id)->find_all();	
					foreach($bulkorders as $order){
						$objorders = ORM::factory('diagnosticlabsorder')->where('id','=',$order)->find();	
						$objorders->status_c = $status;
						$objorders->save();
					}
					$bulkorders->status_c = $status;
					$bulkorders->save();
				}
			}
			return $data;
		}catch(Exception $e){
			$data['type']			= "error";
			$data['message'] 		= $e->getMessage();
			return $data;
		}
		return $data;
	}
	public function getStatus($orderid)
	{
		$id = $orderid;
		$obj_user = Auth::instance()->get_user();
		
		$pathologist = ORM::factory('pathologist')->where('refpathologistsuserid_c','=',$obj_user->id)->find();
		$objorder = ORM::factory('diagnosticlabsorder')->where('id','=',$id)->where('refdiaglabsorderspathologistsid_c','=',$pathologist->id)->find();
		
		if($objorder->id == NULL){
			$data = array();
			$data['type']			="error";
			$data['message'] 		= 'Order id ('.$id.') does not exist for the pathologist.';
			return $data;
		}else{
			$data = array();
			$data['type']		= "data";
			$data['data'] 		= $objorder->status_c;
			return $data;
		}
	}

	public function placemedicineorder($chemist, $appointmentid){
		
		if($chemist != null)
		{
			$intAppId = $appointmentid;
			$orderid = '';
			$chemistsid = '';	
			$orderid = '';
			$orderids = array();
			$chemids = array();	
			$objOrm = ORM::factory('prescription');
			$objOrm->where('refprescriptionsappoitmentid_c','=',$intAppId);
			
			$objAppointment = ORM::factory("appointment")
							->where("id","=",$intAppId)->find();
			$patientuserid = $objAppointment->refappfromid_c; 
						
			$prescrtionids= $objOrm->find_all()->as_array();
			$i=0;
			$arr_chemistid=array();
			foreach($prescrtionids as $prescrtionid)
			{
				if($i<count($chemist))
				{				
					$objPrescriptionDetails = ORM::factory('prescriptiondetail')
												->where('refpdetailsprescriptionsid_c','=',$prescrtionid->id)
												->where('refpdetailsdrugid_c','=',$chemist[$i][0])->find();
					if($objPrescriptionDetails->id)//check for correct object of PrescriptionDetail
					{				
						if(!(isset($objPrescriptionDetails->refchemistordersid_c)))//refchemistordersid_c is absent then perfrom if loop.
						{
							if($orderid == '')//order id is absent means 1st time placing order for that appiontment
							{  
							
								$ormchemists = ORM::factory('chemistmedicineorder');
								$ormchemists->refchemistid_c = $chemist[$i][2];
								$today = date('Y-m-d g:i:s a');
								$ormchemists->orderdate_c = $today;
								$ormchemists->status_c = 'requested';
								$ormchemists->updatestatusdate_c = $today;
								$ormchemists->refdoctoruserid_c  = ORM::factory("doctor")->where("id",'=',ORM::factory("appointment")->where('id','=',$intAppId)->find()->refappwithid_c)->find()->refdoctorsid_c;
								$ormchemists->refpatientuserid_c  =$patientuserid;
								$ormchemists->save();
								$orderid = $ormchemists->id;
								$PrescriptionDetail = ORM::factory('prescriptiondetail')
													->where('refpdetailsprescriptionsid_c','=',$prescrtionid->id)
													->where('refpdetailsdrugid_c','=',$chemist[$i][0])->find();
								
								$PrescriptionDetail->refchemistordersid_c = $orderid;
								
								//Medicine order details create order detail record
								$mediorderdetails = ORM::factory('medicineorderdetail');
								$mediorderdetails->reforderid_c = $orderid;
								$mediorderdetails->refdrugid_c = $chemist[$i][0];
								$mediorderdetails->save();
								
								$chemistuser = ORM::factory('chemist')->where('id','=',$ormchemists->refchemistid_c)->find();
								
								$notification=  array();
								$notification['id'] =$chemistuser->refchemistsuserid_c;
								$notification['template']='newchemistorder';
								$notification['email']='true';
								$notification['sms']='true';
								
								$user = ORM::factory('user')->where('id','=',ORM::factory('appointment')->where('id','=',$intAppId)->find()->refappfromid_c)->find();
								$notification['username']=$user->Firstname_c.' '.$user->lastname_c; 
								$notification['usernumber']= $user->mobileno1_c; 
								$notification["ordernumber"] = $orderid;
								$notification["name"] = ORM::factory('user')->where('id','=', $chemistuser->refchemistsuserid_c)->find()->Firstname_c;
								
								$notificationsender = new helper_notificationsender();
								$var = $notificationsender->sendnotification($notification);
								
								
								$PrescriptionDetail->save();
									
							}						
							else{
								$ormchemists = ORM::factory('chemistmedicineorder')->where('id','=',$orderid)->find();	
								if($ormchemists->refchemistid_c == $chemist[$i][2])
								{ 	
									$orderid = $ormchemists->id;
									$PrescriptionDetail = ORM::factory('prescriptiondetail')
													->where('refpdetailsprescriptionsid_c','=',$prescrtionid->id)
													->where('refpdetailsdrugid_c','=',$chemist[$i][0])->find();
						
									$PrescriptionDetail->refchemistordersid_c = $orderid;
									$PrescriptionDetail->save();
									//Medicine order details create order detail record
									$mediorderdetails = ORM::factory('medicineorderdetail');
									$mediorderdetails->reforderid_c = $orderid;
									$mediorderdetails->refdrugid_c = $chemist[$i][0];
									$mediorderdetails->save();																	
								}
							else{	
									$objnewprescriptions = ORM::factory('prescription')
															->where('refprescriptionsappoitmentid_c','=',$intAppId)		
															->find_all()->as_array();
									foreach($objnewprescriptions as $objnewprescription)
									{
									//check for orderid id present
										$objnewPrescriptionDetails = ORM::factory('prescriptiondetail')
												->where('refpdetailsprescriptionsid_c','=',$objnewprescription->id)
												->find_all()->as_array();
												foreach($objnewPrescriptionDetails as $objnewPrescriptionDetail)
												{
													if(isset($objnewPrescriptionDetail->refchemistordersid_c)){
														$ormchemists = ORM::factory('chemistmedicineorder')->where('id','=',$objnewPrescriptionDetail->refchemistordersid_c)->find();//get chemist oderder object and check chemist id
														if($ormchemists->refchemistid_c == $chemist[$i][2])//if found same chemist id then merege order
															{ 	
																$orderid = $ormchemists->id;
																$PrescriptionDetail = ORM::factory('prescriptiondetail')
																						->where('refpdetailsprescriptionsid_c','=',$prescrtionid->id)
																						->where('refpdetailsdrugid_c','=',$chemist[$i][0])->find();
																$PrescriptionDetail->refchemistordersid_c = $orderid;
																$PrescriptionDetail->save();
																//Medicine order details create order detail record
																$mediorderdetails = ORM::factory('medicineorderdetail');
																$mediorderdetails->reforderid_c = $orderid;
																$mediorderdetails->refdrugid_c = $chemist[$i][0];
																$mediorderdetails->save();	
															}
															else{
															}
													}
												}
												$PrescriptionDetail = ORM::factory('prescriptiondetail')
																						->where('refpdetailsprescriptionsid_c','=',$prescrtionid->id)
																						->where('refpdetailsdrugid_c','=',$chemist[$i][0])->find();
												if(!(isset($PrescriptionDetail->refchemistordersid_c )))
												{ 
													$ormchemists = ORM::factory('chemistmedicineorder');
													$ormchemists->refchemistid_c = $chemist[$i][2];
													$today = date('Y-m-d g:i:s a');
													$ormchemists->orderdate_c = $today;
													$ormchemists->status_c = 'requested';
													$ormchemists->updatestatusdate_c = $today;
													$ormchemists->refdoctoruserid_c  = ORM::factory("doctor")->where("id",'=',ORM::factory("appointment")->where('id','=',$intAppId)->find()->refappwithid_c)->find()->refdoctorsid_c;
													$ormchemists->refpatientuserid_c  =$patientuserid;
								
													$ormchemists->save();
													$orderid = $ormchemists->id;
													$PrescriptionDetail = ORM::factory('prescriptiondetail')
																		->where('refpdetailsprescriptionsid_c','=',$prescrtionid->id)
																		->where('refpdetailsdrugid_c','=',$chemist[$i][0])->find();
											
													$PrescriptionDetail->refchemistordersid_c = $orderid;
													$PrescriptionDetail->save();
													//Medicine order details create order detail record
													$mediorderdetails = ORM::factory('medicineorderdetail');
													$mediorderdetails->reforderid_c = $orderid;
													$mediorderdetails->refdrugid_c = $chemist[$i][0];
													$mediorderdetails->save();	
												}
									}
								}							
							}
							
						}
						else// in prescription detail orderid is present then 
						{}
						$i=$i+1;		
					}
			
				}
			}
		}
	}
	
	public function placetestorderfromappid($pathologist, $appointmentid){
		$userid = ORM::factory('appointment')->where('id','=',$appointmentid)->find()->refappfromid_c;
		if($pathologist != null)
		{
			$recommendedtests = ORM::factory('appointmenttest')->where('refrecomtestappointmentsid_c','=',$appointmentid)->find_all();
			if(count($recommendedtests) != 0){

				$objOrders = ORM::factory('Diagnosticlabsorder');
				$today = date('Y-m-d g:i:s a');
				$objOrders->orderdate_c = $today;
				$objOrders->status_c = 'requested';
				$objOrders->refdiaglabsorderspathologistsid_c = $pathologist;
				$objOrders->updatestatusdate_c = $today;
				$objOrders->rate_c = 0;
				$objOrders->paid_c= 1;
				$objOrders->save();
				$orderid = $objOrders->id;//get order id 
				
				
				$objpathologistsUserId = ORM::factory('pathologist')->where('id','=',$pathologist)->find()->refpathologistsuserid_c;
				$notification=  array();
				$notification['id'] =$objpathologistsUserId;
				$notification['template']='newchemistorder';
				$notification['email']='true';
				$notification['sms']='true';
				
				$user = ORM::factory('user')->where('id','=',$userid)->find();
				$notification['username']=$user->Firstname_c.' '.$user->lastname_c; 
				$notification['usernumber']= $user->mobileno1_c; 
				$notification["ordernumber"] = $orderid;
				$notification["name"] = ORM::factory('user')->where('id','=', $objpathologistsUserId)->find()->Firstname_c;
				$notificationsender = new helper_notificationsender();
				$var = $notificationsender->sendnotification($notification);
				
				
				$testcharges = 0;
				foreach($recommendedtests as $recommendedtest){
					$testid = $recommendedtest->refrecomtestrecommtestid_c;
					
					$objordertest = ORM::factory('orderedtest');
					$objordertest->customeruserid_c = $userid;
					$objordertest->testid_c = $testid;
					$objordertest->diagnosticlabsorderid_c = $orderid;
					
					$recommendedtest->refrecomtestdiaglabsordersid_c = $orderid;//place orderid in recommendedtest table
					$recommendedtest->save();
					$objordertest->save();
					
					
					/*$rate = $this->gettestrate($testid,$pathologist);
					if($rate != "Not Provided"){
						$discount = new helper_Discount();
						$testcharges = $testcharges + ($rate * (100 - $discount->getDiscount($pathologist))/100);
					}else{
						$arr_returntestsinfo['error'] = 'Selected Diagnostic lab does not provide some of the selected tests.';
						//die(json_encode($arr_returntestsinfo));
					}*/
				}
			}else{
				
			}
		}		
	}
	
	public function splittestorderfromappid($pathologists, $appointmentid){
		$userid = ORM::factory('appointment')->where('id','=',$appointmentid)->find()->refappfromid_c;
		//var_dump($pathologists);
		/*if($pathologists != null)
		{			
			$recommendedtests = ORM::factory('appointmenttest')->where('refrecomtestappointmentsid_c','=',$appointmentid)->find_all();
			//var_dump(count($recommendedtests));
			if(count($recommendedtests) != 0){																
				$temparray= array();
				foreach($pathologists as $pathologist){
					var_dump("Pathologist".$pathologist);
					$firstcounter=0;
					$flag=true;		
					foreach($recommendedtests as $recommendedtest){												
						$counter = ORM::factory('pathologistcatalog')->where('refpathcatalogpathologistsid_c','=',$pathologist)->where('refpathcatalogtestid_c','=',$recommendedtest->refrecomtestrecommtestid_c)->find();
												
						if(($counter->id != NULL)){																					
							if($flag==true){								
								$objOrders = ORM::factory('Diagnosticlabsorder');
								$today = date('Y-m-d g:i:s a');
								$objOrders->orderdate_c = $today;
								$objOrders->status_c = 'requested';
								$objOrders->refdiaglabsorderspathologistsid_c = $pathologist;
								$objOrders->updatestatusdate_c = $today;
								$objOrders->cashpaymentflag_c = 1; // Flag indicating that orders are not self placed by
								$objOrders->rate_c = 0;			   // patient so bypass the Provisional Account transaction
								$objOrders->paid_c= 1;
								$objOrders->save();
								$orderid = $objOrders->id;//get order id 
								
								
								$objpathologistsUserId = ORM::factory('pathologist')->where('id','=',$pathologist)->find()->refpathologistsuserid_c;
								$notification=  array();
								$notification['id'] =$objpathologistsUserId;
								$notification['template']='newchemistorder';
								$notification['email']='true';
								$notification['sms']='true';
								
								$user = ORM::factory('user')->where('id','=',$userid)->find();
								$notification['username']=$user->Firstname_c.' '.$user->lastname_c; 
								$notification['usernumber']= $user->mobileno1_c; 
								$notification["ordernumber"] = $orderid;
								$notification["name"] = ORM::factory('user')->where('id','=', $objpathologistsUserId)->find()->Firstname_c;
								$notificationsender = new helper_notificationsender();
								$var = $notificationsender->sendnotification($notification);
								
								$flag = false;
							}
							$testid = $recommendedtest->refrecomtestrecommtestid_c;
							
							$objordertest = ORM::factory('orderedtest');
							// Capture current Pathologist rate and store with the order.
							$objordertest->rate_c = $counter->test_rate_c;
							// Capture case no for hospital patients and store with the order.
							$objipdrecord = ORM::factory('ipdpatient')
										->where('refpatientuserid_c','=',$userid)
										->where('status_c','=','admitted')->find();
							if($objipdrecord->id != NULL)
							{
								$objordertest->caseregno_c=$objipdrecord->refid_c;
							}
							else
							{
								$objordertest->caseregno_c=null;
							}
							$objordertest->customeruserid_c = $userid;
							$objordertest->testid_c = $testid;
							$objordertest->diagnosticlabsorderid_c = $orderid;
							$objordertest->refdoctoruserid_c = ORM::factory("doctor")->where("id",'=',ORM::factory("appointment")->where('id','=',$recommendedtest->refrecomtestappointmentsid_c)->find()->refappwithid_c)->find()->refdoctorsid_c;
							
							$recommendedtest->refrecomtestdiaglabsordersid_c = $orderid;//place orderid in recommendedtest table
							$recommendedtest->save();
							var_dump("Order testid save ".$testid." ".$pathologist);
							$objordertest->save();
						}else{
							var_dump("Pushing array".$recommendedtest);
							array_push($temparray,$recommendedtest);							
						}
					}
					$recommendedtests = array();
					$recommendedtests = $temparray;		
		 			var_dump("Recommended test setting");
				}
			}else{
				
			}
		}	*/
		//By Anita 
		// For spliting orders on pathologists
		//------------------------------------
		
		$orderarray = array();
		if($pathologists != null)
		{			
			$recommendedtests = ORM::factory('appointmenttest')->where('refrecomtestappointmentsid_c','=',$appointmentid)->find_all();
			//var_dump(count($recommendedtests));
			if(count($recommendedtests) != 0)
			{																
				$generateorderflag=true;						
				foreach($recommendedtests as $recommendedtest)
				{	
					$catalogfound = false;
					$generateorderflag = true;
					foreach($pathologists as $pathologist)
					{
						if($catalogfound==false)
						{
							$counter = ORM::factory('pathologistcatalog')->where('refpathcatalogpathologistsid_c','=',$pathologist)->where('refpathcatalogtestid_c','=',$recommendedtest->refrecomtestrecommtestid_c)->find();
							if(($counter->id != NULL))
							{		
								$catalogfound = true;
								if($generateorderflag==true)
								{	// Generate Order
										
									if (key_exists($pathologist ,$orderarray ))
									{
										var_dump("Key exists".$pathologist);
										$orderid = $orderarray[$pathologist];
										// Order for that pathologist already generated;
									}
									else
									{
										// Generating new order for the recommended test
										
										$objOrders = ORM::factory('Diagnosticlabsorder');
										$today = date('Y-m-d g:i:s a');
										$objOrders->orderdate_c = $today;
										$objOrders->status_c = 'requested';
										$objOrders->refdiaglabsorderspathologistsid_c = $pathologist;
										$objOrders->updatestatusdate_c = $today;
										$objOrders->cashpaymentflag_c = 1; // Flag indicating that orders are not self placed by
										$objOrders->rate_c = 0;			   // patient so bypass the Provisional Account transaction
										$objOrders->paid_c= 1;
										$objOrders->save();
										$orderid = $objOrders->id;//get order id 
										$objpathologistsUserId = ORM::factory('pathologist')->where('id','=',$pathologist)->find()->refpathologistsuserid_c;
										$notification=  array();
										$notification['id'] =$objpathologistsUserId;
										$notification['template']='newchemistorder';
										$notification['email']='true';
										$notification['sms']='true';
										
										$user = ORM::factory('user')->where('id','=',$userid)->find();
										$notification['username']=$user->Firstname_c.' '.$user->lastname_c; 
										$notification['usernumber']= $user->mobileno1_c; 
										$notification["ordernumber"] = $orderid;
										$notification["name"] = ORM::factory('user')->where('id','=', $objpathologistsUserId)->find()->Firstname_c;
										$notificationsender = new helper_notificationsender();
										$var = $notificationsender->sendnotification($notification);
										
										$generateorderflag = false;
										$orderarray[$pathologist]=$orderid;
										var_dump("Lab order generated".$orderid);
									}
								}					
								$testid = $recommendedtest->refrecomtestrecommtestid_c;
								
								$objordertest = ORM::factory('orderedtest');
								// Capture current Pathologist rate and store with the order.
								$objordertest->rate_c = $counter->test_rate_c;
								// Capture case no for hospital patients and store with the order.
								$objipdrecord = ORM::factory('ipdpatient')
											->where('refpatientuserid_c','=',$userid)
											->where('status_c','=','admitted')->find();
								if($objipdrecord->id != NULL)
								{
									$objordertest->caseregno_c=$objipdrecord->refid_c;
								}
								else
								{
									$objordertest->caseregno_c=null;
								}
								$objordertest->customeruserid_c = $userid;
								$objordertest->testid_c = $testid;
								$objordertest->diagnosticlabsorderid_c = $orderid;
								$objordertest->refdoctoruserid_c = ORM::factory("doctor")->where("id",'=',ORM::factory("appointment")->where('id','=',$recommendedtest->refrecomtestappointmentsid_c)->find()->refappwithid_c)->find()->refdoctorsid_c;
								
								$recommendedtest->refrecomtestdiaglabsordersid_c = $orderid;//place orderid in recommendedtest table
								$recommendedtest->save();
								var_dump("Order testid save ".$testid." ".$pathologist);
								
								$objordertest->save();
							}
						}							
					}	// End of for patthologist  
				}  // End of for recommended test
			}
			else
			{	
			}
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
	
	
} // End Welcome

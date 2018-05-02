<?php

class api_Orders
{
	public function GetNewOrders($userId,$lasOrderId)
	{
		try{
				$user = Auth::instance()->get_user();
				$data = array();
				$data['pathid'] = ORM::factory('pathologist')->where('refpathologistsuserid_c','=',$user->id)->find()->id;
				$data['status'] = '';
				$orders =	ORM::factory('query')->fetchdata($data,'orderstosync');
				
				$data = array();
				$individualorders = '';
				foreach($orders as $order){
					$obj_tests=ORM::factory('test')->where('orderid','=',$order['orderid'])->find_all();
					
					if(count($obj_tests) == 0){
						continue;
						}else{
							$tests = '';
							$netamount = 0;
							$arrTests = array();
							foreach($obj_tests as $obj_test){
								$test = array();
								
								$labtest = ORM::factory('pathologistcatalog')->where('refpathcatalogpathologistsid_c','=',ORM::factory('pathologist')->where('refpathologistsuserid_c','=',$user->id)->find()->id)->where('refpathcatalogtestid_c','=',$obj_test->testid)->find();

								$test['labtestcode'] 	= $labtest->test_code;
								$test['iohtestcode'] 	= $obj_test->testid;
								$test['labtestname'] 	= $labtest->test_name;
								$test['loinc'] 			= $obj_test->loinc;
								$test['labstdprice'] 	= $obj_test->rate;

								array_push($arrTests,$test);
								$xmlstring = $this->toxmlstring($test,'tests');
								$tests = $tests.' '.$xmlstring;
								$netamount += $obj_test->rate;
							}
							$user 		= ORM::factory('user')->where('id','=',$order['userid'])->find();
							$address 	= ORM::factory('address')->where('id','=',$user->refaddresshome1_c)->find();
							$interval 	= date_diff(date_create(), date_create($user->DOB_c));
							$data['pid'] 			= $user->id;
							$data['tests'] 			= $tests;
							$data['pstreetaddress'] = $address->line1_c.' '.$address->nearlandmark_c.' '.$address->location_c;
							$data['pcity'] 			=  $address->city_c;
							$data['pstate'] 		=  $address->state_c;
							$data['ppin'] 		=  $address->pin_c;
							$data['pcountry'] 		=  $address->country_c;
							$data['ptelecom'] 		=  str_replace("+",'',$address->isdphone_c.$address->phone_c);
							$data['pmobileno'] 		= str_replace("+",'',$user->isdmobileno1_c.$user->mobileno1_c);
							$data['salutation'] 	= '';
							$data['salutation'] 	= ($user->gender_c == 'Male')?'Mr':'Ms';
							$data['firstname'] 		= $user->Firstname_c;
							$data['middlename'] 	= $user->middlename_c;
							$data['familyname'] 	= $user->lastname_c;
							$data['gendercode'] 	= $user->gender_c;
							$data['birthtime'] 		= date("Ymd", strtotime($user->DOB_c));
							$data['grossamount'] 	= $netamount;
							
							$discount = new helper_Discount();
							$data['discountpercentage'] 	= $discount->getDiscount(ORM::factory('pathologist')->where('refpathologistsuserid_c','=',$user->id)->find()->id);
							$data['netamount'] 		= $netamount - ($netamount * $data['discountpercentage']/100);
							$data['reasonfordiscount'] = "India Online Health Customer";
							$data['discountamount'] =$data['grossamount'] - $data['netamount'];
							
							$data['orderid'] 		= $order['orderid'];
							$data['birthyears'] 	= $interval->format("%Y");
							$data['birthmonths'] 	= $interval->format("%M");
							$data['birthdays'] 		= $interval->format("%d");
							$obj_order=ORM::factory('diagnosticlabsorder')->where('id','=',$order['orderid'])->find();
							$obj_order->issynched_c = 1;
							$obj_order->save();
							$individualOrder = $this->toxmlstring($data,'individualorder');
							$individualorders = $individualorders.' '.$individualOrder;
						}
				}
				return $individualorders;
		}catch(Exception $e){
			throw new exception($e);
		}
	}
	public function GetNewBulkOrders($userId,$lasOrderId)
	{
		try{
				$data = array();
				$user = Auth::instance()->get_user();
				$bulkuploads =	ORM::factory('bulkupload')->where('refuserid_c','=',$user->id)->find_all();
				$result = array();
				if(count($bulkuploads) <= 0){
					
					$result['response']['order']['statuscode'] = 'failure';
					$result['response']['order']['type'] = 'bulkorder';
					$result['response']['order']['details'] = 'Bulk orders not found';
				}else{
					$xmlbulkorder = '';
					foreach($bulkuploads as $bulkorder){
						$data = array();
						$bulkorders =	ORM::factory('bulkorder')->where('refbulkuploadid_c','=',$bulkorder->id)->where('status_c','!=','synched')->find_all();
						foreach($bulkorders as $individualorder){
							$order = ORM::factory('orderedtest')->where('diagnosticlabsorderid_c','=',$individualorder->reforderid_c)->find();
							$obj_tests=ORM::factory('test')->where('orderid','=',$order->diagnosticlabsorderid_c)->find_all();

							if(count($obj_tests) == 0){
								continue;
								}else{
									$tests = '';
									$netamount = 0;
									$arrTests = array();
									foreach($obj_tests as $obj_test){
										$test = array();
										$test['testcode'] 	= $obj_test->testcode;
										$test['testname'] 	= $obj_test->testname;
										$test['price'] 		= $obj_test->rate;
										array_push($arrTests,$test);
										$xmlstring = $this->toxmlstring($test,'tests');
										$tests = $tests.' '.$xmlstring;
										$netamount += $obj_test->rate;
									}
									$user 		= ORM::factory('user')->where('id','=',$order->customeruserid_c)->find();
									$address 	= ORM::factory('address')->where('id','=',$user->refaddresshome1_c)->find();
									$interval 	= date_diff(date_create(), date_create($user->DOB_c));
									$data['bulkorderid'] 	= $bulkorder->id;
									$data['pid'] 			= $user->id;
									$data['tests'] 			= $tests;
									$data['pstreetaddress'] = $address->line1_c.' '.$address->nearlandmark_c.' '.$address->location_c;
									$data['pcity'] 			=  $address->city_c;
									$data['pstate'] 		=  $address->state_c;
									$data['ppin'] 		=  $address->pin_c;
									$data['pcountry'] 		=  $address->country_c;
									$data['ptelecom'] 		=  $address->isdphone_c.$address->phone_c;
									$data['pmobileno'] 		= $user->isdmobileno1_c.$user->mobileno1_c;
									$data['salutation'] 	= '';
									$data['firstname'] 		= $user->Firstname_c;
									$data['middlename'] 	= $user->middlename_c;
									$data['familyname'] 	= $user->lastname_c;
									$data['gendercode'] 	= $user->gender_c;
									$data['birthtime'] 		= date("Ymd", strtotime($user->DOB_c));
									$data['netamount'] 		= $netamount;
									$data['orderid'] 		= $order->diagnosticlabsorderid_c;
									$data['birthyears'] 	= $interval->format("%Y");
									$data['birthmonths'] 	= $interval->format("%M");
									$data['birthdays'] 		= $interval->format("%d");
									$obj_order=ORM::factory('diagnosticlabsorder')->where('id','=',$order->diagnosticlabsorderid_c)->find();
									$obj_order->issynched_c = 1;
									$obj_order->save();
									$individualOrder = $this->toxmlstring($data,'bulkorder');
									$xmlbulkorder = $xmlbulkorder.' '.$individualOrder;
									
									$individualorder->status_c = 'synched';
									$individualorder->save();
								}
						}
					}
					$result = $xmlbulkorder;
				}
				
				return $result;
		}catch(Exception $e){
			throw new exception($e);
		}
	}
	
	public function Acknowlegement($xml)
	{
		try{
			$parser = new helper_Xmlparser;
			$acks = $parser->xml2array($xml);	
			$acks = $acks['indiaonlinehealth']['acknowledgements'];
		
			$result = '';
			
			if(!isset($acks['ack'])){
				throw new Exception('ack tag is not defined.');
			}
			
			foreach($acks['ack'] as $ack){
				if(isset($ack['status'])){
					if(($status = isset($ack['status']['order']['statuscode']) ? trim($ack['status']['order']['statuscode']) : null) == null){ throw new exception('status, order and statuscode is not in format');};
					if(($type = isset($ack['status']['order']['type']) ? trim($ack['status']['order']['type']) : null) == null){ throw new exception('status, order and type is not in format');};
					if(($id = isset($ack['status']['order']['id']) ? trim($ack['status']['order']['id']) : null) == null){ throw new exception('status, order and id is not in format');};
					if(($details = isset($ack['status']['order']['details']) ? $ack['status']['order']['details'] : '') == null){ throw new exception('status, order and details is not in format');};
				}else{
					if(($status = isset($ack['order']['statuscode']) ? trim($ack['order']['statuscode']) : null) == null){ throw new exception('status, order and statuscode is not in format');};
					if(($type = isset($ack['order']['type']) ? trim($ack['order']['type']) : null) == null){ throw new exception('status, order and type is not in format');};
					if(($id = isset($ack['order']['id']) ? trim($ack['order']['id']) : null) == null){ throw new exception('status, order and id is not in format');};
					if(($details = isset($ack['order']['details']) ? $ack['order']['details'] : '') == null){ throw new exception('status, order and details is not in format');};
				}
				
				
				$orders = new helper_Orders;
				$orderStatus = $orders->getStatus($id);
				if($orderStatus['type'] != 'error'){
					if($type == 'Individual'){
						$orderState = new helper_OrderState($id,$details,ucfirst(trim($orderStatus['data'])));
						$status = ucfirst(trim($status));
						$data = $orderState->changeStateTo($status);

						$ack_resp['statuscode'] = $data['type'];
						$ack_resp['details'] 	= $data['message'];
						$ack_resp['id'] 		= $id;
						$ack_resp['type'] 		= $type;
					}else if($type == 'Bulkorder'){
						$orders = new helper_Orders;
						$return = $orders->processbulkorder($id,$status);

					}else{
						$ack_resp['statuscode'] = $ack_resp = array();
						$ack_resp['details'] 	= $data['type'];
						$ack_resp['id'] 		= 'order type is not valid. It should be Individual or Bulkorder';
						$ack_resp['type'] 		= $id;
						$type;
					}
				}else{
					$ack_resp = array();
					$ack_resp['statuscode'] = $orderStatus['type'];
					$ack_resp['details'] 	= $orderStatus['message'];
					$ack_resp['id'] 		= $id;
					$ack_resp['type'] 		= $type;
				}
				
				$xml = $this->toxmlstring($ack_resp,'ack_res');
				$result = $result . $xml;
			}
			$result = '<response>'.$result.'</response>';
			return $result;
		}catch(Exception $e){
			$result = array();
			$result['response']['order']['statuscode'] = 'failure';
			$result['response']['order']['details'] = $e->getMessage();
			$result['response']['order']['id'] = 'Could not read';
			$result['response']['order']['type'] = 'Could not read';
			return $result;
		}
	}
	
	public function UploadReports($xml)
	{
		try{
			$parser = new helper_Xmlparser;
			$reports = $parser->xmltoArray($xml);	
			$reports = $reports['COM']['INDIAONLINEHEALTH']['REPORTS'];
			
			$result = '';
			
			if(!isset($reports['REPORT'])){
				throw new Exception('report tag is not defined.');
			}
			
			foreach($reports as $report){
				if(!isset($report['ORDER']['ID'])){
				
					$customer = ORM::factory('user')->where('id','=',$reports['REPORT']['RECORDTARGET']['PATIENTROLE']['ID'])->find();
					if($customer->id == null){
						$rep_resp = array();
						$rep_resp['statuscode'] ='failure';
						$rep_resp['details'] = "User id ".$reports['REPORT']['RECORDTARGET']['PATIENTROLE']['ID']." is not found in the system.";
						$rep_resp['id'] = 'Order is not placed';
						$rep_resp['type'] = 'Individualorder';

						$result = $this->toxmlstring($rep_resp,'ack_res');
						$result = '<response>'.$result.'</response>';
						return $result;
					}
					
					$objOrders = ORM::factory('Diagnosticlabsorder');
					$today = date('Y-m-d g:i:s a');
					$objOrders->orderdate_c = $today;
					$objOrders->status_c = 'accepted';
					
					$user = Auth::instance()->get_user();
					$pathologists = ORM::factory('pathologist')->where('refpathologistsuserid_c','=',$user->id)->find();
					
					$objOrders->refdiaglabsorderspathologistsid_c = $pathologists->id;
					$objOrders->updatestatusdate_c = $today;
					$objOrders->rate_c = '0';
					$objOrders->paid_c= 1;
					$objOrders->save();
					$orderid = $objOrders->id;//get order id 
					
					$testdetails = $report['TESTS'];
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
						$objordertest = ORM::factory('orderedtest');
						
						$objordertest->customeruserid_c = $reports['REPORT']['RECORDTARGET']['PATIENTROLE']['ID'] ;
						$objordertest->testid_c = $test['IOHTESTCODE'];
						$objordertest->diagnosticlabsorderid_c = $orderid;
						$objordertest->rate_c='0';
						$objordertest->save();
					}
					$report['ORDER'] = array();
					$report['ORDER']['ID'] = $orderid;
				}
				$id = $report['ORDER']['ID'];
				
				$orders = new helper_Orders;
				
				$orderStatus = $orders->getStatus($id);
				
				if($orderStatus['type'] != 'error'){

					$details = $report['TESTS'];
						
					$orderState = new helper_OrderState($id,$details,ucfirst(trim($orderStatus['data'])));
					$data = $orderState->changeStateTo('Reportsuploaded');
										
					$rep_resp['statuscode'] = $data['type'];
					$rep_resp['details'] = $data['message'];
					$rep_resp['id'] = $id;
					$rep_resp['type'] = $id;
					
					$result = $result .  $this->toxmlstring($rep_resp,'ack_res');
				}else{
					$rep_resp['statuscode'] = $orderStatus['type'];
					$rep_resp['details'] = $orderStatus['message'];
					$rep_resp['id'] = $id;
					$rep_resp['type'] = $id;

					$result = $result .  $this->toxmlstring($rep_resp,'ack_res');
				}
				
			}
			$result = '<response>'.$result.'</response>';
			return $result;
		}catch(Exception $e){
			var_dump($e);die;
			$result = array();
			$rep_resp['statuscode'] ='failure';
			$rep_resp['details'] = $e->message();
			$rep_resp['id'] = 'cannot read id';
			$rep_resp['type'] = 'cannot read type';

			$result = $result .  $this->toxmlstring($rep_resp,'ack_res');
			$result = '<response>'.$result.'</response>';
			return $result;
		}
	}
	
	public function Request($xml)
	{
		try{
			$parser = new helper_Xmlparser;
			$reqs = $parser->xml2array($xml);
			$result = array();
			
			if(!isset($acks['req'])){
				throw new Exception('req tag is not defined.');
			}			
			
			foreach($reqs['req'] as $req){
				if(($status = isset($req['status']['order']['statuscode']) ? $req['status']['order']['statuscode'] : Null) == Null){ throw new Exception('status, order and statuscode is not in format');};
				if(($type = isset($req['status']['order']['type']) ? $req['status']['order']['type'] : Null) == Null){ throw new Exception('status, order and type is not in format');};
				if(($id = isset($req['status']['order']['id']) ? $req['status']['order']['id'] : Null) == Null){ throw new Exception('status, order and id is not in format');};
				if(($details = isset($req['status']['order']['details']) ? $req['status']['order']['details'] : Null) == Null){ throw new Exception('status, order and details is not in format');};
			
				$orders = new helper_Orders;
				$orderStatus = $orders->getStatus($id);	
				if($orderStatus['type'] != 'error'){
					$orderState = new helper_OrderState($id,$details,ucfirst(trim($orderStatus['data'])));
					$status = ucfirst(trim($status));
					$data = $orderState->changeStateTo($status);

					$req_resp = array();
					$req_resp['ack']['order']['statuscode'] = $data['type'];
					$req_resp['ack']['order']['details'] = $data['message'];
					$req_resp['ack']['order']['id'] = $id;
					$req_resp['ack']['order']['type'] = $type;
				}else{
					$req_resp = array();
					$req_resp['ack']['order']['statuscode'] = $orderStatus['type'];
					$req_resp['ack']['order']['details'] = $orderStatus['message'];
					$req_resp['ack']['order']['id'] = $id;
					$req_resp['ack']['order']['type'] = $type;
				}
				array_push($result, $req_resp);
			}

			return $result;
		}catch(Exception $e){
			$result = array();
			$result['ack']['order']['statuscode'] = 'failure';
			$result['ack']['order']['details'] = $e->getMessage();
			$result['ack']['order']['id'] = 'Could not read';
			$result['ack']['order']['type'] = 'Could not read';
			return $result;
		}
	}
	
	public function Response($xml)
	{
		$result = array();
		try{

			return $result;
		}catch(Exception $e){
			
			return $result;
		}
	}
	
	private function toxmlstring($data,$templateName){
		$template = include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/xml/pathologistintegration.php');
		$result = $template[$templateName]['template'];
		$variable = $template[$templateName]['variables'];
		foreach($variable as $val)
		{
			if (array_key_exists($val , $data) == "true")//check for user given all required values.
			{
				$$val = $data[$val]; 
				$result =str_replace ('$'.$val, $$val , $result );
			}
			else 
			{
				throw new Exception("Complete Information is not provided for ".$val);
			}
		}
		return $result;
	}

	public function log($arr_log){
		if($arr_log["action_c"] == "ack"){
			$logs = ORM::factory('orderlog')->where('reqid_c','=',$arr_log['reqid_c'])->where('action_c','=',$arr_log['for'])->where('hash_at_client_c','=',"")->where('hash_at_server_c',"!=","")->find();
			if($logs->id != null){
				$logs->hash_at_client_c = $arr_log["hash_at_client_c"];
				$logs->save();
			}
			$arr_log["hash_at_client_c"] = "";
		}
		
		$logs = ORM::factory('orderlog');
		$logs->saveRecord($arr_log);
	}	
}

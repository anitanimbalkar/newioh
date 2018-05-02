<?php defined('SYSPATH') or die('No direct script access.');
include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/export.php');
class Controller_Cimportingtransactions extends Controller_Ctemplatewithmenu {
	public function action_view(){
		$errors = array();
		$messages = array();
		$this->display($errors,$messages);
	}
	private function display($errors, $messages){
		$content = View::factory('vuser/vaccountant/vimportingtransactions');
		$this->template->content = $content;
		$content->bind('errors',$errors);
		$content->bind('messages',$messages);
	}
	public function action_upload()
	{
		$errors = array();
		$messages = array();
		$obj_user = Auth::instance()->get_user();
		$objpathologist = new Model_Pathologist;
		$objpathologist = $objpathologist->where('refpathologistsuserid_c','=',$obj_user->id)->find();
		$pathologistid = $objpathologist->id;
		$resultdata = array();
		if($_POST)
		{
			if($_FILES["file"]["type"] == "text/xml")
			{
				if ($_FILES["file"]["error"] > 0)
				{
					$errors = array();
					$messages = array();
					$errors['error'] = 'Could not upload file. <br/>'.$_FILES["file"]["error"];
					$this->display($errors,$messages);
				}
				else{
					$uploaddestination =  DOCROOT."temp/";
					try
					{
						if( move_uploaded_file($_FILES["file"]["tmp_name"], $uploaddestination . $_FILES["file"]["name"]))
						{
							$filenm =$_FILES["file"]["name"];
							$fileext = explode('.',$filenm);
							rename(DOCROOT."temp/".$_FILES["file"]["name"],DOCROOT."temp/".$obj_user->id.".".$fileext[1]);
							$rows = $this->XmlImport(DOCROOT."temp/".$obj_user->id.".".$fileext[1]);
							foreach($rows['BODY']['IMPORTDATA']['REQUESTDATA']['TALLYMESSAGE'] as $tallymessage){
								if($tallymessage->VOUCHER != ''){
									if($tallymessage->VOUCHER->VOUCHERTYPENAME == 'Payment'){
										$arr_partyledgername = explode(" ",strip_tags( $tallymessage->VOUCHER->PARTYLEDGERNAME));
										$row['A'] = strip_tags( $tallymessage->VOUCHER->{'ALLLEDGERENTRIES.LIST'}[1]->{'BANKALLOCATIONS.LIST'}->PAYMENTFAVOURING);
										$row['B'] = strip_tags( $tallymessage->VOUCHER->{'ALLLEDGERENTRIES.LIST'}[1]->{'BANKALLOCATIONS.LIST'}->PAYMENTFAVOURING);
										$row['C'] = orm::factory('billingaccount')->where('accountcode_c','=',$row['A'])->find()->refaccountuserid_c;
										$row['D'] = '';//transaction id;
										$row['E'] = '';
										$row['F'] = $row['A'];
										
										$str_debitacc = (string)$tallymessage->VOUCHER->{'ALLLEDGERENTRIES.LIST'}[1]->LEDGERNAME;
																	
										
										$arr_debitacc = explode(" ", $str_debitacc);
										$row['G'] = $arr_debitacc[count($arr_debitacc)-1];
										
										$row['H'] = strip_tags( $tallymessage->VOUCHER->{'ALLLEDGERENTRIES.LIST'}[1]->{'BANKALLOCATIONS.LIST'}->AMOUNT);
										$row['I'] = '';
										$row['J'] = '';
										$row['K'] = strip_tags( $tallymessage->VOUCHER->NARRATION);
										$row['L'] = strip_tags( $tallymessage->VOUCHER->{'ALLLEDGERENTRIES.LIST'}[1]->{'BANKALLOCATIONS.LIST'}->DATE);;
										$row['M'] = '';
															  
										$data = array();
										array_push($data,$row['A']);
										array_push($data,$row['B']);
										array_push($data,$row['C']);
										array_push($data,$row['D']);
										array_push($data,$row['E']);
										array_push($data,$row['F']);
										array_push($data,$row['G']);
										array_push($data,$row['H']);
										array_push($data,$row['I']);
										array_push($data,$row['J']);
										array_push($data,$row['K']);
										array_push($data,$row['L']);
										
										$userid = $row['C'];
										$fromaccountid = $row['F'];
										$toaccountid = $row['G'];
										$creditamount = $row['H'];
										$debitamount = $row['I'];
										$servicetax = $row['J'];
										$reason = $row['K'];
										$planid = $row['E'];
										$transactiontype['variable'] = array('asitis');
										$transactiontype['asitis']=$reason;
										$amount = 0;
										if($creditamount > 0){
											$amount = $creditamount;
										}else if($debitamount > 0){
											$amount = $debitamount;
										}
										$result = transaction::transfer($fromaccountid,$toaccountid,1, $amount,18,$transactiontype);
										if($result['type'] == 'error'){
											array_push($data,$result['message']);
											array_push($resultdata, $data);
										}else{
											$objTransaction = ORM::factory('billingstatement')->where('statementcode_c','=',$result['data']['cr_code'])->find();
											$objTransaction->isexported_c = 'yes';
											$objTransaction->save();
											$objTransaction = ORM::factory('billingstatement')->where('statementcode_c','=',$result['data']['dr_code'])->find();
											$objTransaction->isexported_c = 'yes';
											$objTransaction->save();
											
											
											$servicetaxresult = transaction::transfer($fromaccountid,$toaccountid,1, $servicetax,19);
											if($servicetaxresult['type'] == 'error'){
												array_push($row,$servicetaxresult['type']);
												array_push($resultdata, $row);
												$transactiontype['asitis']='Reverted unsuccessful transaction';
												$result = transaction::transfer($toaccountid,$fromaccountid,1, $amount,18,$transactiontype);
												
												$objTransaction = ORM::factory('billingstatement')->where('statementcode_c','=',$result['data']['cr_code'])->find();
												$objTransaction->isexported_c = 'yes';
												$objTransaction->save();
												$objTransaction = ORM::factory('billingstatement')->where('statementcode_c','=',$result['data']['dr_code'])->find();
												$objTransaction->isexported_c = 'yes';
												$objTransaction->save();
											}else{
												$objTransaction = ORM::factory('billingstatement')->where('statementcode_c','=',$servicetaxresult['data']['cr_code'])->find();
												$objTransaction->isexported_c = 'yes';
												$objTransaction->save();
												$objTransaction = ORM::factory('billingstatement')->where('statementcode_c','=',$servicetaxresult['data']['dr_code'])->find();
												$objTransaction->isexported_c = 'yes';
												$objTransaction->save();
												
												$return = transaction::savedetails($result,$planid,$amount,orm::factory('billingaccount')->where('accountcode_c','=',$fromaccountid)->find()->refaccountuserid_c,orm::factory('billingaccount')->where('accountcode_c','=',$toaccountid)->find()->refaccountuserid_c,$servicetax,'',$servicetaxresult);
												$credittransaction = orm::factory('billingstatement')->where('statementcode_c','=',$result['data']['cr_code'])->find();
												$debittransaction = orm::factory('billingstatement')->where('statementcode_c','=',$result['data']['dr_code'])->find();
												$credittransaction->tallytransactionid_c = $row['D'];
												$debittransaction->tallytransactionid_c = $row['D'];
												$credittransaction->update();
												$debittransaction->update();
												array_push($data,'Successful');
												array_push($resultdata, $data);
											}
										}
									}
								}
							}
							//$rows = $this->ExcelImport(DOCROOT."temp/".$obj_user->id.".".$fileext[1]);
							//$this->validatedata($rows);
							$date = date_create();		
							export::toexcel($resultdata,'ReportForImportingTransaction_'.date_timestamp_get($date).'.xls');
						}
						else{
							$errors = array();
							$messages = array();
							$errors['error'] = "Could not upload the file.";
							$this->display($errors,$messages);
						}
					}
					catch(Exception $e)
					{
						var_dump($e);
						die;
						throw new Exception($e);
					}
				}
			}
			else{
				$errors = array();
				$messages = array();
				$errors['error'] = "Selected file is invalid. File should be in .xml format only.";
				$this->display($errors,$messages);
			}
		}else{
			$errors = array();
			$messages = array();
			$errors['error'] = 'Bad request.';
			$this->display($errors,$messages);
		}
		
	}
	public function ExcelImport($file) {
		$obj_importexcel = new helper_Import();
		$data = $obj_importexcel->excel($file);
		return $data;
	}
	public function XmlImport($file) {
		$obj_importexcel = new helper_Import();
		$data = $obj_importexcel->xml($file);
		return $data;
	}
	public function validatedata($rows)
	{
		$count = 1;
		$excel = array();
		$isvalid = true;
		foreach($rows as $row){
			if($count > 1){
				$userid = $row['C'];
				$accountcode = $row['A'];
				$transactionid = $row['D'];
				$creditamount = $row['H'];
				$debitamount = $row['I'];
				
				$data = array();
				array_push($data,$row['A']);
				array_push($data,$row['B']);
				array_push($data,$row['C']);
				array_push($data,$row['D']);
				array_push($data,$row['E']);
				array_push($data,$row['F']);
				array_push($data,$row['G']);
				array_push($data,$row['H']);
				array_push($data,$row['I']);
				array_push($data,$row['J']);
				array_push($data,$row['K']);
				array_push($data,$row['L']);
				$comment = '';
				if(orm::factory('billingaccount')->where('accountcode_c','=',$accountcode)->find()->refaccountuserid_c != $userid){
					$comment = 'User id and account code is not matching.';
					$isvalid = false;
				}
				if(orm::factory('billingstatement')->where('tallytransactionid_c','=',$transactionid)->find()->id != Null){
					$comment = 'This transaction is already commited.';
					$isvalid = false;
				}
				if(orm::factory('billingstatement')->where('statementcode_c','=',$transactionid)->find()->id != Null){
					$comment = $comment.' -- Transaction Id already exists.';
					$isvalid = false;
				}
				if(($creditamount > 0) && ($debitamount > 0)){
					$comment = $comment.' -- One of the credit or debit amount should be zero.';
					$isvalid = false;
				}

				if($debitamount > 0){
					if($accountcode != $row['F']){
						$comment = $comment.' -- FromAccountId field is not valid.';
						$isvalid = false;
					}
				}
				if($creditamount > 0){
					if($accountcode != $row['G']){
						$comment = $comment.' -- ToAccountId field is not valid.';
						$isvalid = false;
					}
				}
				array_push($data,$comment);
				array_push($excel,$data);
			}else{
				$data = array();
				array_push($data,$row['A']);
				array_push($data,$row['B']);
				array_push($data,$row['C']);
				array_push($data,$row['D']);
				array_push($data,$row['E']);
				array_push($data,$row['F']);
				array_push($data,$row['G']);
				array_push($data,$row['H']);
				array_push($data,$row['I']);
				array_push($data,$row['J']);
				array_push($data,$row['K']);
				array_push($data,$row['L']);
				array_push($data,'Comments');
				array_push($excel,$data);
			}
			$count = $count + 1;
		}
		if($isvalid){
			return $isvalid;
		}else{
			$date = date_create();		
			export::toexcel($excel,'Validation_'.date_timestamp_get($date).'.xls');
		}
	}
} // End Welcome

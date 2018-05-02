<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/export.php');
include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');

class Controller_Cinvoicesearch extends Controller_Ctemplatewithmenu  {
	public function action_view()
	{
		$whereclause = '[spnameofcenter,=,"aaaaaaaaaaaaaaaaaa"]';
		$this->display($whereclause);				
	}
	
	private function display($whereclause){
			$obj_user = Auth::instance()->get_user();
			$content = View::factory('vuser/vadmin/vinvoicesearchdashboard');
			$content->bind('obj_user', $obj_user);
			$username = $obj_user->Firstname_c;
			$content->bind('searchstat', $searchstat);
			$content->bind('username', $username);	
			$content->bind('whereclause',$whereclause);
			$urole = "data_manager";
			$breadcrumb = "Home>>";
            $this->template->breadcrumb = $breadcrumb;
			$this->template->content = $content;
			$this->template->user = $obj_user->Firstname_c;
			$this->template->urole = $urole;	
	}
	public function action_viewinvoicedetails()
	{
		$id = $_GET['spid'];
		$whereclause = '[refinvcuserid_c,!=,'.$id.']';
		$this->displayinvoicedetails($whereclause);				
	}
	private function displayinvoicedetails($whereclause){
					$objServiceProvider = ORM::factory('allserviceprovider')->where('spuserid','=',$_GET['spid'])->find();
					$spname = $objServiceProvider->spname;
					$sptype = $objServiceProvider->type;
					$id = $_GET['spid'];	
			if($_GET['tdate'] != ''){		
				/*	$receiptnoArray = [0];
					$receiptamountArray = [0];
					$receiptdtArray = [0];*/
					$fromdt = date_create($_GET['fdate']);
					$from = date_format($fromdt,"Y-m-d");
					
					$todt = date_create($_GET['tdate']);
					$to = date_format($todt,"Y-m-d");
										
					$totalrepct = 0;
					$invoicenoArray = [0];
					$invoiceamountArray = [0];
					$invoicedtArray = [0];
					$invoicetypeArray = [0];
					$totalinv = 0;			
					$i = 0;			
					$j = 0;
					$objInvoiceTran = ORM::factory('sptransaction')->where('sortdate','>=',$from)->where('sortdate','<=',$to)->where('spuserid','=',$_GET['spid'])->find_all();
					
						foreach ( $objInvoiceTran as $objinv)
						{
							if ($objinv->invrcptid != null)
								{
									$invoicenoArray[$i] = $objinv->invrcptid;
									$invoicedtArray[$i] = $objinv->invrcptdate;
									$invoiceamountArray[$i] = $objinv->netamount;
									$invoicetypeArray[$i] = $objinv->type;
									$i++;
								}
						}
						$objInvTran = ORM::factory('sptransaction')->where('spuserid','=',$_GET['spid'])->where('type','=','INVOICE')->find_all();
						foreach ( $objInvTran as $objinvoice)
						{
							if ($objinvoice->invrcptid != null)
								{
									$totalinv = $totalinv + $objinvoice->netamount;	
								}
							
						}
						$objInvoiceRecpt = ORM::factory('allreceipt')->where('payeruserid','=',$_GET['spid'])->where('status','=','invoice')->find_all();
						foreach ( $objInvoiceRecpt as $objrecpt)
						{
							if ($objrecpt->rcptno != null)
								{
									$totalrepct = $totalrepct + $objrecpt ->amount;
									$j++;
								}	
						}
			}else{
				/*	$receiptnoArray = [0];
					$receiptamountArray = [0];
					$receiptdtArray = [0];*/
					$totalrepct = 0;
					$invoicenoArray = [0];
					$invoiceamountArray = [0];
					$invoicedtArray = [0];
					$invoicetypeArray = [0];
					$totalinv = 0;			
					$i = 0;			
					$j = 0;
					$objInvoiceTran = ORM::factory('sptransaction')->where('spuserid','=',$_GET['spid'])->order_by('sortdate','desc')->find_all();
						foreach ( $objInvoiceTran as $objinv)
						{
							if ($objinv->invrcptid != null)
								{
									$invoicenoArray[$i] = $objinv->invrcptid;
									$invoicedtArray[$i] = $objinv->invrcptdate;
									$invoiceamountArray[$i] = $objinv->netamount;
									$invoicetypeArray[$i] = $objinv->type;
									$i++;
								}
						}
						$objInTran = ORM::factory('sptransaction')->where('spuserid','=',$_GET['spid'])->where('type','=','INVOICE')->find_all();
						foreach ( $objInTran as $objinvtr)
						{
							if ($objinv->invrcptid != null)
								{
									$totalinv = $totalinv + $objinvtr->netamount;										
								}								
						}
						$objInvoiceRecpt = ORM::factory('allreceipt')->where('payeruserid','=',$_GET['spid'])->where('status','=','invoice')->find_all();
						foreach ( $objInvoiceRecpt as $objrecpt)
						{
							if ($objrecpt->rcptno != null)
								{
									/*$receiptnoArra[$j] = $objrecpt ->rcptno;
									$receiptdtArra[$j] = $objrecpt ->rcptdate;
									$receiptamountArray[$j] = $objrecpt ->amount;*/
									$totalrepct = $totalrepct + $objrecpt ->amount;
									$j++;
								}	
									$totalrepct = number_format($totalrepct,2,'.',',');
						}
			}
					$obj_user = Auth::instance()->get_user();
					$content = View::factory('vuser/vadmin/vinvoicedetails');
					$content->bind('obj_user', $obj_user);
					$username = $obj_user->Firstname_c;
					$content->bind('whereclause',$whereclause);
					$content->bind('username', $username);
					$content->bind('searchstat', $searchstat);
					$content->bind('spname', $spname);
					$content->bind('sptype', $sptype);
					$content->bind('id', $id);
					$content->bind('invoicenoArray', $invoicenoArray);
					$content->bind('invoicedtArray', $invoicedtArray);
					$content->bind('invoiceamountArray', $invoiceamountArray);
					$content->bind('invoicetypeArray', $invoicetypeArray);
					/*$content->bind('receiptnoArra', $receiptnoArra);
					$content->bind('receiptdtArra', $receiptdtArra);
					$content->bind('receiptamountArray', $receiptamountArray);*/
					$content->bind('totalrepct', $totalrepct);
					$content->bind('totalinv', $totalinv);
					$urole = "data_manager";
					$breadcrumb = "Home>>";
					$this->template->breadcrumb = $breadcrumb;
					$this->template->content = $content;
					$this->template->user = $obj_user->Firstname_c;
					$this->template->urole = $urole;	
	}
	public function action_viewkart()
	{
		$_GET['selectname'] = '';
		$whereclause = '';
		$this->displaykart($whereclause);				
	}
	private function displaykart($whereclause){
		
			$objServiceProvider = ORM::factory('allserviceprovider')->where('spuserid','=',$_GET['spid'])->find();
			$spname = $objServiceProvider->spname;
			$sptype = $objServiceProvider->type;
			$id = $_GET['spid'];
			
			$i = 0;
			$descr = [0];
			$arr_count = 0;
			$taxamtper = [0];		
			
			$arr_tax = include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/config/ayushtaxes.php');
			$arr_count = count($arr_tax);
			while ($arr_count > 0)
					{						
							$j = $i + 1;
							$descr[$i] = $arr_tax['tax'.$j]['description'];
							$taxamtper[$i] = $arr_tax['tax'.$j]['taxpercent'];
							$i++;
							$arr_count--;							
					}
			
			$obj_user = Auth::instance()->get_user();
			$content = View::factory('vuser/vadmin/vinvoicekart');
			$content->bind('obj_user', $obj_user);
			$username = $obj_user->Firstname_c;
			$content->bind('whereclause',$whereclause);
			$content->bind('username', $username);
			$content->bind('searchstat', $searchstat);
			$content->bind('spname', $spname);
			$content->bind('sptype', $sptype);
			$content->bind('taxamtper', $taxamtper);
			$content->bind('descr', $descr);
			$content->bind('arr_tax', $arr_tax);
			$content->bind('id', $id);
			$urole = "data_manager";
			$breadcrumb = "Home>>";
            $this->template->breadcrumb = $breadcrumb;
			$this->template->content = $content;
			$this->template->user = $obj_user->Firstname_c;
			$this->template->urole = $urole;	
	}
	public function action_search(){
			$errors = array();
			$messages = array();
			$whereclause = '[spname,=,""]';
			if($_POST){	
					if($_POST['name'] != '' && $_POST['userselect'] != ''){		
						$serviceprovidername = $_POST['name'];
						$username = $_POST['userselect'];								
								if($username == 'consumer'){
									$serviceprovidername ='%'.$serviceprovidername.'%';
									$whereclause 	= '[spnameofcenter,like,'.$serviceprovidername.'][type,=,consumer]';	
									$this->display($whereclause);
								}else{
									$serviceprovidername ='%'.$serviceprovidername.'%';
									$whereclause 	= '[spnameofcenter,like,'.$serviceprovidername.'][type,!=,consumer]';
									$this->display($whereclause);
								}
							
					}else if($_POST['userselect'] != ''){	
								if($_POST['userselect'] == 'consumer'){
									$whereclause 	= '[type,=,consumer]';	
									$this->display($whereclause);
								}else{
									$whereclause 	= '[type,!=,consumer]';
									$this->display($whereclause);
								}
							
					}else{
						$errors['error'] = 'Could not search your query';
					}				
			}else{
					$errors['error'] = 'Could not search your query';
				}
	}
public function action_generateprint(){		
	if($_GET['per0'] != ""){
			$per0 = $_GET['per0'];
			$per1 = $_GET['per1'];
			$per2 = $_GET['per2'];
			
		}else{
			$per0 = 14;
			$per1 = 0.50;
			$per2 = 0.50;
		}
		$objinvoicet=ORM::factory('invoice')->where('invoiceid_c','=',$_GET['invid'])->find();		
		$refinvcuserid = $objinvoicet->refinvcuserid_c;
		$invoiceid = $objinvoicet->invoiceid_c;
		$description1 = $objinvoicet->description1_c;
		$description2 = $objinvoicet->description2_c;
		$description3 = $objinvoicet->description3_c;
		$description4 = $objinvoicet->description4_c;
		$description5 = $objinvoicet->description5_c;
		$description6 = $objinvoicet->description6_c;
		$description7 = $objinvoicet->description7_c;
		$description8 = $objinvoicet->description8_c;
		$description9 = $objinvoicet->description9_c;
		$description10 = $objinvoicet->description10_c;
		$charge1 = $objinvoicet->charge1_c;
		$charge2 = $objinvoicet->charge2_c;
		$charge3 = $objinvoicet->charge3_c;
		$charge4 = $objinvoicet->charge4_c;
		$charge5 = $objinvoicet->charge5_c;
		$charge6 = $objinvoicet->charge6_c;
		$charge7 = $objinvoicet->charge7_c;
		$charge8 = $objinvoicet->charge8_c;
		$charge9 = $objinvoicet->charge9_c;	
		$charge10 = $objinvoicet->charge10_c;
		$taxdesc1 = $objinvoicet->taxdesc1_c;
		$taxdesc2 = $objinvoicet->taxdesc2_c;
		$taxdesc3 = $objinvoicet->taxdesc3_c;
		$taxdesc4 = $objinvoicet->taxdesc4_c;
		$taxdesc5 = $objinvoicet->taxdesc5_c;
		$taxperc1 = $objinvoicet->taxperc1_c;
		$taxperc2 = $objinvoicet->taxperc2_c;
		$taxperc3 = $objinvoicet->taxperc3_c;
		$taxperc4 = $objinvoicet->taxperc4_c;
		$taxperc5 = $objinvoicet->taxperc5_c;
		$totalamt = $objinvoicet->totalamt_c;
		$totaltaxamt = $objinvoicet->totaltaxamt_c;
		$invoicedate = $objinvoicet->invoicedate_c;			
		
		$objServiceProvider = ORM::factory('allserviceprovider')->where('spuserid','=',$refinvcuserid)->find();
		$spneme = $objServiceProvider->spname;
		$spmobile = $objServiceProvider->mobileno;
		$spadd = $objServiceProvider->spaddress;
		$spuserid =$_GET['invid'];	
		$content = View::factory('vuser/vadmin/invoiceprint');
		$content->bind('refinvcuserid',$refinvcuserid);
		$content->bind('invoiceid',$invoiceid);
		$content->bind('invoicedate',$invoicedate);
		$content->bind('description1',$description1);
		$content->bind('description2',$description2);
		$content->bind('description3',$description3);
		$content->bind('description4',$description4);
		$content->bind('description5',$description5);
		$content->bind('description6',$description6);
		$content->bind('description7',$description7);
		$content->bind('description8',$description8);
		$content->bind('description9',$description9);
		$content->bind('description10',$description10);
		$content->bind('spuserid',$spuserid);
			$content->bind('per0',$per0);
			$content->bind('per1',$per1);
			$content->bind('per2',$per2);	
		$content->bind('charge1',$charge1);
		$content->bind('charge2',$charge2);
		$content->bind('charge3',$charge3);
		$content->bind('charge4',$charge4);
		$content->bind('charge5',$charge5);
		$content->bind('charge6',$charge6);
		$content->bind('charge7',$charge7);
		$content->bind('charge8',$charge8);
		$content->bind('charge9',$charge9);
		$content->bind('charge10',$charge10);
		$content->bind('totalamt',$totalamt);
		$content->bind('totaltaxamt',$totaltaxamt);
		$content->bind('taxdesc1',$taxdesc1);
		$content->bind('taxdesc2',$taxdesc2);
		$content->bind('taxdesc3',$taxdesc3);
		$content->bind('taxdesc4',$taxdesc4);
		$content->bind('taxdesc5',$taxdesc5);
		$content->bind('taxperc1',$taxperc1);
		$content->bind('taxperc2',$taxperc2);
		$content->bind('taxperc3',$taxperc3);
		$content->bind('taxperc4',$taxperc4);
		$content->bind('taxperc5',$taxperc5);
		$content->bind('spneme',$spneme);
		$content->bind('spmobile',$spmobile);
		$content->bind('spadd',$spadd);
		$this->template->content = $content;
	}
}
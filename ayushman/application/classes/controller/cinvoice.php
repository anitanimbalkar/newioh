<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/export.php');
include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');

class Controller_Cinvoice extends Controller_Ctemplatewithmenu  {
	public function action_view()
	{
		$whereclause = '[spnameofcenter,=,"aaaaaaaaaaaaaaaaaa"]';
		$this->display($whereclause);				
	}
	
	private function display($whereclause){
			$obj_user = Auth::instance()->get_user();
			$content = View::factory('vuser/vadmin/vinvoicedashboard');
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
					
			if((($_GET['tdate']) != '') || (($_GET['fdate']) != '')){		
				/*	$receiptnoArray = [0];
					$receiptamountArray = [0];
					$receiptdtArray = [0];*/
					$fromdt = date_create($_GET['fdate']);
					$from = date_format($fromdt,"Y-m-d");
					$todt = date_create($_GET['tdate']);
					$to = date_format($todt,"Y-m-d");
										
					$totalrepct = 0;
					/*$invoicenoArray = [0];
					$invoiceamountArray = [0];
					$invoicedtArray = [0];
					$invoicetypeArray = [0];*/
					$invoicenoArray = array();
					$invoiceamountArray = array();
					$invoicedtArray = array();
					$invoicetypeArray = array();
					$totalinv = 0;			
					$i = 0;			
					$j = 0;
					if($_GET['fdate'] != "" && $_GET['tdate'] != "")
						$objInvoiceTran = ORM::factory('sptransaction')->where('sortdate','>=',$from)->where('sortdate','<=',$to)->where('spuserid','=',$_GET['spid'])->order_by('sortdate','desc')->find_all();
					else if ($_GET['fdate'] != "")
						$objInvoiceTran = ORM::factory('sptransaction')->where('sortdate','>=',$from)->where('spuserid','=',$_GET['spid'])->order_by('sortdate','desc')->find_all();					
					else if ($_GET['tdate'] != "")
						$objInvoiceTran = ORM::factory('sptransaction')->where('sortdate','<=',$to)->where('spuserid','=',$_GET['spid'])->order_by('sortdate','desc')->find_all();
					
						foreach ( $objInvoiceTran as $objinv)
						{
							if ($objinv->invrcptid != null)
							{
								$invoicenoArray[$i] = $objinv->invrcptid;
								$invoicedtArray[$i] = $objinv->invrcptdate;
								$invoiceamountArray[$i] = number_format($objinv->netamount,2);
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
						//$objInvoiceRecpt = ORM::factory('allreceipt')->where('payeruserid','=',$_GET['spid'])->where('status','=','invoice')->find_all();
						$objInvoiceRecpt = ORM::factory('sptransaction')->where('spuserid','=',$_GET['spid'])->where('type','=','RCPT')->find_all();
						foreach ( $objInvoiceRecpt as $objrecpt)
						{
							if ($objrecpt->invrcptid != null)
								{
									$totalrepct = $totalrepct + $objrecpt ->netamount;
									$j++;
								}	
						}
			}else if(((($_GET['tdate']) != '') || (($_GET['fdate']) != '')) && ($_GET['recptinvno']) != ''){		
				/*	$receiptnoArray = [0];
					$receiptamountArray = [0];
					$receiptdtArray = [0];*/
					$fromdt = date_create($_GET['fdate']);
					$from = date_format($fromdt,"Y-m-d");
					$todt = date_create($_GET['tdate']);
					$to = date_format($todt,"Y-m-d");
										
					$totalrepct = 0;
					/*$invoicenoArray = [0];
					$invoiceamountArray = [0];
					$invoicedtArray = [0];
					$invoicetypeArray = [0];*/
					$invoicenoArray = array();
					$invoiceamountArray = array();
					$invoicedtArray = array();
					$invoicetypeArray = array();
					$totalinv = 0;			
					$i = 0;			
					$j = 0;
					if(($_GET['fdate'] != "") && ($_GET['tdate'] != "") && ($_GET['recptinvno'] != '') )
						$objInvoiceTran = ORM::factory('sptransaction')->where('sortdate','>=',$from)->where('sortdate','<=',$to)->where('invrcptid','=',$_GET['recptinvno'])->where('spuserid','=',$_GET['spid'])->order_by('sortdate','desc')->find_all();
					else if ($_GET['fdate'] != "")
						$objInvoiceTran = ORM::factory('sptransaction')->where('sortdate','>=',$from)->where('invrcptid','=',$_GET['recptinvno'])->where('spuserid','=',$_GET['spid'])->order_by('sortdate','desc')->find_all();					
					else if ($_GET['tdate'] != "")
						$objInvoiceTran = ORM::factory('sptransaction')->where('sortdate','<=',$to)->where('spuserid','=',$_GET['spid'])->order_by('sortdate','desc')->find_all();
					
						foreach ( $objInvoiceTran as $objinv)
						{
							if ($objinv->invrcptid != null)
							{
								$invoicenoArray[$i] = $objinv->invrcptid;
								$invoicedtArray[$i] = $objinv->invrcptdate;
								$invoiceamountArray[$i] = number_format($objinv->netamount,2);
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
						//$objInvoiceRecpt = ORM::factory('allreceipt')->where('payeruserid','=',$_GET['spid'])->where('status','=','invoice')->find_all();
						$objInvoiceRecpt = ORM::factory('sptransaction')->where('spuserid','=',$_GET['spid'])->where('type','=','RCPT')->find_all();
						foreach ( $objInvoiceRecpt as $objrecpt)
						{
							if ($objrecpt->invrcptid != null)
								{
									$totalrepct = $totalrepct + $objrecpt ->netamount;
									$j++;
								}	
						}
			}else if(($_GET['recptinvno']) != ''){											
					$totalrepct = 0;			
					$invoicenoArray = array();
					$invoiceamountArray = array();
					$invoicedtArray = array();
					$invoicetypeArray = array();
					$totalinv = 0;			
					$i = 0;			
					$j = 0;
					if($_GET['recptinvno'] != '')
						$objInvoiceTran = ORM::factory('sptransaction')->where('invrcptid','=',$_GET['recptinvno'])->where('spuserid','=',$_GET['spid'])->order_by('sortdate','desc')->find_all();
				
						foreach ( $objInvoiceTran as $objinv)
						{
							if ($objinv->invrcptid != null)
							{
								$invoicenoArray[$i] = $objinv->invrcptid;
								$invoicedtArray[$i] = $objinv->invrcptdate;
								$invoiceamountArray[$i] = number_format($objinv->netamount,2);
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
						//$objInvoiceRecpt = ORM::factory('allreceipt')->where('payeruserid','=',$_GET['spid'])->where('status','=','invoice')->find_all();
						$objInvoiceRecpt = ORM::factory('sptransaction')->where('spuserid','=',$_GET['spid'])->where('type','=','RCPT')->find_all();
						foreach ( $objInvoiceRecpt as $objrecpt)
						{
							if ($objrecpt->invrcptid != null)
								{
									$totalrepct = $totalrepct + $objrecpt ->netamount;
									$j++;
								}	
						}
			}else{
				/*	$receiptnoArray = [0];
					$receiptamountArray = [0];
					$receiptdtArray = [0];*/
					$totalrepct = 0;
					/*$invoicenoArray = [0];
					$invoiceamountArray = [0];
					$invoicedtArray = [0];
					$invoicetypeArray = [0];*/
					
					$invoicenoArray = array();
					$invoiceamountArray = array();
					$invoicedtArray = array();
					$invoicetypeArray = array();
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
									$invoiceamountArray[$i] = number_format($objinv->netamount,2);
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
						//$objInvoiceRecpt = ORM::factory('allreceipt')->where('payeruserid','=',$_GET['spid'])->where('status','=','invoice')->find_all();
						$objInvoiceRecpt = ORM::factory('sptransaction')->where('spuserid','=',$_GET['spid'])->where('type','=','RCPT')->find_all();						
						foreach ( $objInvoiceRecpt as $objrecpt)
						{
							if ($objrecpt->invrcptid != null)
								{
									/*$receiptnoArra[$j] = $objrecpt ->rcptno;
									$receiptdtArra[$j] = $objrecpt ->rcptdate;
									$receiptamountArray[$j] = $objrecpt ->amount;*/
									$totalrepct = $totalrepct + $objrecpt ->netamount;
									$j++;
								}										
						}
			}
			$netdeu = $totalrepct - $totalinv;
			$totalinv = number_format($totalinv,2);			
			$totalrepct = number_format($totalrepct,2);
			$netdeu = number_format($netdeu,2);
			
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
					$content->bind('netdeu', $netdeu);
					$urole = "sales_manager";
					$breadcrumb = "Home>>";
					$this->template->breadcrumb = $breadcrumb;
					$this->template->content = $content;
					$this->template->user = $obj_user->Firstname_c;
					$this->template->urole = $urole;	
	}
	public function action_viewkart()
	{
		$whereclause = '';
		$this->displaykart($whereclause);				
	}
	private function displaykart($whereclause){
		
			$objServiceProvider = ORM::factory('allserviceprovider')->where('spuserid','=',$_GET['spid'])->find();
			$spname = $objServiceProvider->spname;
			$sptype = $objServiceProvider->type;
			$id = $_GET['spid'];
			$accountantname = $_GET['invtype'];
			$objroleuserarrr = ORM::factory('invoicetypemaster')->where('invtypename_c','=',$_GET['invtype'])->find()->as_array();
				
			/*	
			$i = 0;
			$descr = [];
			$arr_count = 0;
			$taxamtper = [];	
			$descrc = [];
			$taxamtperc = [];
			
			$objroleuser = ORM::factory('invoicetypemaster')->where('id','=',1)->find();
						$arr_count = count($objroleuser);
				while ($arr_count > 0)
					{						
							$j = $i + 1;
							$descr[$i] = $objroleuser->taxlabel1_c;
							$taxamtper[$i] = $objroleuser->taxperc1_c;
							$descrc[$i] = $objroleuser->taxlabel2_c;
							$taxamtperc[$i] = $objroleuser->taxperc2_c;
							
							
							$i++;
							$arr_count--;							
					}
				
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
			*/
			$obj_user = Auth::instance()->get_user();
			$content = View::factory('vuser/vadmin/vinvoicekart');
			$content->bind('obj_user', $obj_user);
			$username = $obj_user->Firstname_c;
			$content->bind('whereclause',$whereclause);
			$content->bind('username', $username);
			$content->bind('searchstat', $searchstat);
			$content->bind('spname', $spname);
			$content->bind('accountantname', $accountantname);
			$content->bind('sptype', $sptype);
			$content->bind('objroleuserarrr', $objroleuserarrr);
			//$content->bind('taxamtper', $taxamtper);
			//$content->bind('descr', $descr);
			//$content->bind('taxamtperc', $taxamtperc);
			//$content->bind('descrc', $descrc);
			//$content->bind('arr_tax', $arr_tax);
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
public function action_generateprint()
{		
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
		
		$uprice1 = $objinvoicet->rate1_c;
		$uprice2 = $objinvoicet->rate2_c;
		$uprice3 = $objinvoicet->rate3_c;
		$uprice4 = $objinvoicet->rate4_c;
		$uprice5 = $objinvoicet->rate5_c;
		$uprice6 = $objinvoicet->rate6_c;
		$uprice7 = $objinvoicet->rate7_c;
		$uprice8 = $objinvoicet->rate8_c;
		$uprice9 = $objinvoicet->rate9_c;	
		$uprice10 = $objinvoicet->rate10_c;
		
		$quantity1 = $objinvoicet->qty1_c;
		$quantity2 = $objinvoicet->qty2_c;
		$quantity3 = $objinvoicet->qty3_c;
		$quantity4 = $objinvoicet->qty4_c;
		$quantity5 = $objinvoicet->qty5_c;
		$quantity6 = $objinvoicet->qty6_c;
		$quantity7 = $objinvoicet->qty7_c;
		$quantity8 = $objinvoicet->qty8_c;
		$quantity9 = $objinvoicet->qty9_c;	
		$quantity10 = $objinvoicet->qty10_c;
		
		$taxdesc1 = $objinvoicet->taxdesc1_c;
		$taxdesc2 = $objinvoicet->taxdesc2_c;
		$taxdesc3 = $objinvoicet->taxdesc3_c;
		$taxdesc4 = $objinvoicet->taxdesc4_c;
		$taxdesc5 = $objinvoicet->taxdesc5_c;

		if($objinvoicet->taxperc1_c != null)
			$taxperc1 = $objinvoicet->taxperc1_c;
		else	$taxperc1 = 0;
		
		if($objinvoicet->taxperc2_c != null)
			$taxperc2 = $objinvoicet->taxperc2_c;
		else	$taxperc2 = 0;
		
		if($objinvoicet->taxperc3_c != null)
			$taxperc3 = $objinvoicet->taxperc3_c;
		else	$taxperc3 = 0;
		
		if($objinvoicet->taxperc4_c != null)
			$taxperc4 = $objinvoicet->taxperc4_c;
		else	$taxperc4 = 0;
		
		if($objinvoicet->taxperc5_c != null)
			$taxperc5 = $objinvoicet->taxperc5_c;
		else	$taxperc5 = 0;

		$taxnet1 = $objinvoicet->taxnet1_c;
		$taxnet2 = $objinvoicet->taxnet2_c;
		$taxnet3 = $objinvoicet->taxnet3_c;
		$taxnet4 = $objinvoicet->taxnet4_c;
		$taxnet5 = $objinvoicet->taxnet5_c;
				
		$totalamt = $objinvoicet->totalamt_c;
		$totalnetamt = $objinvoicet->totalnetamt_c;
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
			$content->bind('per0',$taxperc1);
			$content->bind('per1',$taxperc2);
			$content->bind('per2',$taxperc3);	
			$content->bind('per3',$taxperc4);	
			$content->bind('per4',$taxperc5);
			
		$content->bind('uprice1',$uprice1);
		$content->bind('uprice2',$uprice2);
		$content->bind('uprice3',$uprice3);
		$content->bind('uprice4',$uprice4);
		$content->bind('uprice5',$uprice5);
		$content->bind('uprice6',$uprice6);
		$content->bind('uprice7',$uprice7);
		$content->bind('uprice8',$uprice8);
		$content->bind('uprice9',$uprice9);
		$content->bind('uprice10',$uprice10);
		
		$content->bind('quantity1',$quantity1);
		$content->bind('quantity2',$quantity2);
		$content->bind('quantity3',$quantity3);
		$content->bind('quantity4',$quantity4);
		$content->bind('quantity5',$quantity5);
		$content->bind('quantity6',$quantity6);
		$content->bind('quantity7',$quantity7);
		$content->bind('quantity8',$quantity8);
		$content->bind('quantity9',$quantity9);
		$content->bind('quantity10',$quantity10);
			
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
		$content->bind('totaltaxamt',$totalnetamt);
		$content->bind('taxdesc1',$taxdesc1);
		$content->bind('taxdesc2',$taxdesc2);
		$content->bind('taxdesc3',$taxdesc3);
		$content->bind('taxdesc4',$taxdesc4);
		$content->bind('taxdesc5',$taxdesc5);
		$content->bind('taxnet1',$taxnet1);
		$content->bind('taxnet2',$taxnet2);
		$content->bind('taxnet3',$taxnet3);
		$content->bind('taxnet4',$taxnet4);
		$content->bind('taxnet5',$taxnet5);
		$content->bind('spneme',$spneme);
		$content->bind('spmobile',$spmobile);
		$content->bind('spadd',$spadd);
		$this->template->content = $content;
	}
}
<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');

class Controller_Ccashreceiptdeposite extends Controller_Ctemplatewithmenu  {	
	private function display($receiptnoArray,$amountArray,$buyerArray,$crenameArray,$paymodeArray,$rctdateArray,$modeofpay,$allrecpt,$allrecptamt,$allrecptarra,$allrecptaccountant,$oldtrnid){
			$obj_user = Auth::instance()->get_user();
			$content = View::factory('vuser/vadmin/vcashreceiptdepositedashboard');
			$content->bind('obj_user', $obj_user);
			$username = $obj_user->Firstname_c;
			$content->bind('username', $username);
			$content->bind('receiptnoArray',$receiptnoArray);
			$content->bind('amountArray',$amountArray);
			$content->bind('buyerArray',$buyerArray);
			$content->bind('crenameArray',$crenameArray);
			$content->bind('paymodeArray',$paymodeArray);
			$content->bind('rctdateArray',$rctdateArray);
			$content->bind('allrecptarra',$allrecptarra);
			$content->bind('allrecptaccountant',$allrecptaccountant);
			$content->bind('allrecpt',$allrecpt);
			$content->bind('oldtrnid',$oldtrnid);
			$content->bind('allrecptamt',$allrecptamt);
			$content->bind('modeofpay',$modeofpay);
			$urole = "data_manager";
			$breadcrumb = "Home>>";
            $this->template->breadcrumb = $breadcrumb;
			$this->template->content = $content;
			$this->template->user = $obj_user->Firstname_c;
			$this->template->urole = $urole;
	
	}	
	public function action_depositerecords()
		{
			$obj_user = Auth::instance()->get_user();
			$userid = $obj_user->id;
			$modeofpay = "Cash";
			$allrecptarra = [];
			$allrecpt = '';
			$oldtrnid = '';
			$allrecptaccountant = '';
			$allrecptamt = '' ;
			$receiptnoArray = [];
			$amountArray  = [];
			$buyerArray   = [];
			$crenameArray = [];
			$paymodeArray = [];
			$rctdateArray = [];
			$i = 0;			
			$objayush = ORM::factory('allreceipt')->where('csruserid','=',$userid)->where('modeofpayment','=','Cash')->where('depositstatus','=','Notdeposit')->where('status','!=','Refunded')->find_all();
						foreach ( $objayush as $objOrder)
					{						
						if ($objOrder->rcptno != null)
						{							
							$receiptnoArray[$i] = $objOrder->rcptno;
							$amountArray[$i] = $objOrder->amount;
							$buyerArray[$i] = $objOrder->payername;
							$crenameArray[$i] = $objOrder->csrname;
							$paymodeArray[$i] = $objOrder->modeofpayment;
							$rctdateArray[$i] = $objOrder->rcptdate;
							$i++;
						}
					}					
			$this->display($receiptnoArray,$amountArray,$buyerArray,$crenameArray,$paymodeArray,$rctdateArray,$modeofpay,$allrecpt,$allrecptamt,$allrecptarra,$allrecptaccountant,$oldtrnid);				
		}
	public function action_depositerecordscheque()
		{
			$obj_user = Auth::instance()->get_user();
			$userid = $obj_user->id;
			$modeofpay = "Cheque/DD";
			$allrecptarra = [];
			$allrecpt = [];
			$allrecptamt = '' ;
			$oldtrnid = '';
			$allrecptaccountant = '';
			$receiptnoArray = [];
			$amountArray  = [];
			$buyerArray   = [];
			$crenameArray = [];
			$paymodeArray = [];
			$rctdateArray = [];
			$i = 0;			
			$objayush = ORM::factory('allreceipt')->where('csruserid','=',$userid)->where('modeofpayment','=','Cheque/DD')->where('depositstatus','=','Notdeposit')->where('status','!=','Refunded')->find_all();
						foreach ( $objayush as $objOrder)
					{						
						if ($objOrder->rcptno != null)
						{							
							$receiptnoArray[$i] = $objOrder->rcptno;
							$amountArray[$i] = $objOrder->amount;
							$buyerArray[$i] = $objOrder->payername;
							$crenameArray[$i] = $objOrder->csrname;
							$paymodeArray[$i] = $objOrder->modeofpayment;
							$rctdateArray[$i] = $objOrder->rcptdate;
							$i++;
						}
					}					
			$this->display($receiptnoArray,$amountArray,$buyerArray,$crenameArray,$paymodeArray,$rctdateArray,$modeofpay,$allrecpt,$allrecptamt,$allrecptarra,$allrecptaccountant,$oldtrnid);					
		}
	public function action_depositerecordsonline()
		{
			$obj_user = Auth::instance()->get_user();
			$userid = $obj_user->id;
			$modeofpay = "online";
			$allrecptarra = [];
			$allrecpt = [];
			$allrecptamt = '' ;
			$oldtrnid = '';
			$allrecptaccountant = '';
			$receiptnoArray = [];
			$amountArray  = [];
			$buyerArray   = [];
			$crenameArray = [];
			$paymodeArray = [];
			$rctdateArray = [];
			$i = 0;			
			$objayush = ORM::factory('allreceipt')->where('csruserid','=',$userid)->where('modeofpayment','=','online')->where('depositstatus','=','Notdeposit')->where('status','!=','Refunded')->find_all();
						foreach ( $objayush as $objOrder)
					{						
						if ($objOrder->rcptno != null)
						{							
							$receiptnoArray[$i] = $objOrder->rcptno;
							$amountArray[$i] = $objOrder->amount;
							$buyerArray[$i] = $objOrder->payername;
							$crenameArray[$i] = $objOrder->csrname;
							$paymodeArray[$i] = $objOrder->modeofpayment;
							$rctdateArray[$i] = $objOrder->rcptdate;
							$i++;
						}
					}					
			$this->display($receiptnoArray,$amountArray,$buyerArray,$crenameArray,$paymodeArray,$rctdateArray,$modeofpay,$allrecpt,$allrecptamt,$allrecptarra,$allrecptaccountant,$oldtrnid);				
		}
	public function action_depositerecordsrecreate()
		{
			$allrecpt = $_GET['allrecpt'];
			$allrecptamt = $_GET['allrecptamt'];
			$allrecptarra = explode(",",$_GET['allrecpt']);
			$allrecptaccountant = $_GET['allrecptaccountant'];
			$oldtrnid = $_GET['oldtrnid'];
			$obj_user = Auth::instance()->get_user();
			$userid = $obj_user->id;
			$modeofpay = $_GET['allrecptpaymode'];
			$receiptnoArray = [];
			$amountArray  = [];
			$buyerArray   = [];
			$crenameArray = [];
			$paymodeArray = [];
			$rctdateArray = [];
			$i = 0;			
			$objayush = ORM::factory('allreceipt')->where('csruserid','=',$userid)->where('modeofpayment','=',$modeofpay)->where('depositstatus','=','Notdeposit')->where('status','!=','Refunded')->find_all();
				foreach ( $objayush as $objOrder)
					{						
						if ($objOrder->rcptno != null)
						{							
							$receiptnoArray[$i] = $objOrder->rcptno;
							$amountArray[$i] = $objOrder->amount;
							$buyerArray[$i] = $objOrder->payername;
							$crenameArray[$i] = $objOrder->csrname;
							$paymodeArray[$i] = $objOrder->modeofpayment;
							$rctdateArray[$i] = $objOrder->rcptdate;
							$i++;
						}
					}					
			    $this->display($receiptnoArray,$amountArray,$buyerArray,$crenameArray,$paymodeArray,$rctdateArray,$modeofpay,$allrecpt,$allrecptamt,$allrecptarra,$allrecptaccountant,$oldtrnid);				
		}
}
?>
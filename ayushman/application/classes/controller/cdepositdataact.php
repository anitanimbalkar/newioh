<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/export.php');
class Controller_Cdepositdata extends Controller_Ctemplatewithmenu {
	public function action_view()
	{
		$obj_user = Auth::instance()->get_user();
		$userloginid = $obj_user->id;
		$searchstat = 'Deposited';
		$whereclause = '[status,=,Deposited][payeruserid,=,'.$userloginid.']';	
		$this->display($whereclause,$searchstat);				
	}
	public function action_deposittransaction()
	{
		$obj_user = Auth::instance()->get_user();
		$userloginid = $obj_user->id;
		$searchstat = 'Deposited';
		$whereclause = '[status,=,Deposited][payeruserid,=,'.$userloginid.']';		
		if($_POST['from'] != ''){			
			$fromdt = date_create($_POST['from']);
			$from = date_format($fromdt,"Y-m-d");
			$todt = date_create($_POST['to']);
			$to = date_format($todt,"Y-m-d");
					
				if($from != '' && $to != ''){						
						$whereclause 	= '[sortdate,<=,'.$to.'][sortdate,>=,'.$from.'][status,=,Deposited][payeruserid,=,'.$userloginid.']';											
					}
					$this->display($whereclause,$searchstat);	
		}	
		$this->display($whereclause,$searchstat);	
	}
	public function action_approvetransaction()
	{
		$obj_user = Auth::instance()->get_user();
		$userloginid = $obj_user->id;
		$searchstat = 'Approved';
		$whereclause = '[status,=,Approved][payeruserid,=,'.$userloginid.']';
		if($_POST['from'] != ''){
			$fromdt = date_create($_POST['from']);
			$from = date_format($fromdt,"Y-m-d");
			$todt = date_create($_POST['to']);
			$to = date_format($todt,"Y-m-d");	
			
				if($from != '' && $to != ''){						
						$whereclause 	= '[sortdate,<=,'.$to.'][sortdate,>=,'.$from.'][status,=,Approved][payeruserid,=,'.$userloginid.']';											
					}
					$this->display($whereclause,$searchstat);	
		}		
		$this->display($whereclause,$searchstat);				
	}
	public function action_rejecttransaction()
	{
		$obj_user = Auth::instance()->get_user();
		$userloginid = $obj_user->id;$obj_user = Auth::instance()->get_user();
		$userloginid = $obj_user->id;
		$searchstat = 'Rejected';
		$whereclause = '[status,=,Rejected][payeruserid,=,'.$userloginid.']';
		if($_POST['from'] != ''){
			$fromdt = date_create($_POST['from']);
			$from = date_format($fromdt,"Y-m-d");
			$todt = date_create($_POST['to']);
			$to = date_format($todt,"Y-m-d");		
			
				if($from != '' && $to != ''){						
						$whereclause 	= '[sortdate,<=,'.$to.'][sortdate,>=,'.$from.'][status,=,Rejected][payeruserid,=,'.$userloginid.']';											
					}
					$this->display($whereclause,$searchstat);	
		}		
		$this->display($whereclause,$searchstat);				
	}
	private function display($whereclause,$searchstat){
			$obj_user = Auth::instance()->get_user();
			$content = View::factory('vuser/vadmin/vdepositerecordsdashboard');
			$content->bind('obj_user', $obj_user);
			$username = $obj_user->Firstname_c;
			$content->bind('username', $username);
			$content->bind('whereclause',$whereclause);
			$content->bind('searchstat',$searchstat);
			$urole = "data_manager";
			$breadcrumb = "Home>>";
            $this->template->breadcrumb = $breadcrumb;
			$this->template->content = $content;
			$this->template->user = $obj_user->Firstname_c;
			$this->template->urole = $urole;
	
	}
		public function action_exportdeposit()
	{
		$obj_user = Auth::instance()->get_user();
		$userloginid = $obj_user->id;
		$errors = array();
		$messages = array();
		$searchstat = 'Deposited';
		$whereclause = '[status,=,Deposited][payeruserid,=,'.$userloginid.']';	
		if($_POST){
			$from 	= $_POST['from'];			
			$to	= $_POST['to'];		
			
				if($from != '' && $to != ''){						
						$whereclause 	= '[trxdate,<=,'.$to.'][trxdate,>=,'.$from.'][status,=,Deposited][payeruserid,=,'.$userloginid.']';											
					}		
			
			$table = "csrtrxdetail";
			$columns = "trxdate,trxamount,modeofpayment,payername,status,allreceipts";
			$groupby = '';
			$sidx = 'sortdate'; 
			$sord = 'desc'; 		
			$jqgriddata=new Model_xjqgridgetdata;
			$result=$jqgriddata->exportdata(1,0,$sidx,$sord,$table,$columns,$whereclause,$groupby);
			$date = date_create();
			$i = 0;
			
			if($_POST['exportto'] == 'excel'){
				export::toexcel($result,'csrtransactiondetail_'.date_timestamp_get($date).'.xls');
			}
		}else{
			$errors['error'] = 'Could not export data to excel';
		}
	}
		public function action_exportreject()
	{
		$obj_user = Auth::instance()->get_user();
		$userloginid = $obj_user->id;
		$errors = array();
		$messages = array();
		$searchstat = 'Approved';
		$whereclause = '[status,=,Approved][payeruserid,=,'.$userloginid.']';
		if($_POST){
			$fromdt = date_create($_POST['from']);
			$from = date_format($fromdt,"Y-m-d");
			$todt = date_create($_POST['to']);
			$to = date_format($todt,"Y-m-d");		
			
				if($from != '' && $to != ''){						
						$whereclause 	= '[sortdate,<=,'.$to.'][sortdate,>=,'.$from.'][status,=,Rejected][payeruserid,=,'.$userloginid.']';											
					}
			
			$table = "csrtrxdetail";
			$columns = "trxdate,trxamount,modeofpayment,payername,status,allreceipts";
			$groupby = '';
			$sidx = 'sortdate'; 
			$sord = 'desc'; 		
			$jqgriddata=new Model_xjqgridgetdata;
			$result=$jqgriddata->exportdata(1,0,$sidx,$sord,$table,$columns,$whereclause,$groupby);
			$date = date_create();
			$i = 0;
			
			if($_POST['exportto'] == 'excel'){
				export::toexcel($result,'csrtransactiondetail_'.date_timestamp_get($date).'.xls');
			}
		}else{
			$errors['error'] = 'Could not export data to excel';
		}
	}
	public function action_exportapprove()
	{
		$obj_user = Auth::instance()->get_user();
		$userloginid = $obj_user->id;
		$errors = array();
		$messages = array();
		$searchstat = 'Approved';
		$whereclause = '[status,=,Approved][payeruserid,=,'.$userloginid.']';
		
			if($_POST){
			$fromdt = date_create($_POST['from']);
			$from = date_format($fromdt,"Y-m-d");
			$todt = date_create($_POST['to']);
			$to = date_format($todt,"Y-m-d");	
			
				if($from != '' && $to != ''){						
						$whereclause 	= '[sortdate,<=,'.$to.'][sortdate,>=,'.$from.'][status,=,Approved][payeruserid,=,'.$userloginid.']';											
					}						
			
			$table = "csrtrxdetail";
			$columns = "trxdate,trxamount,modeofpayment,payername,status,allreceipts";
			$groupby = '';
			$sidx = 'sortdate'; 
			$sord = 'desc'; 		
			$jqgriddata=new Model_xjqgridgetdata;
			$result=$jqgriddata->exportdata(1,0,$sidx,$sord,$table,$columns,$whereclause,$groupby);
			$date = date_create();
			$i = 0;
			
			if($_POST['exportto'] == 'excel'){
				export::toexcel($result,'csrtransactiondetail_'.date_timestamp_get($date).'.xls');
			}
		}else{
			$errors['error'] = 'Could not export data to excel';
		}
	}
	
	
	
} // End Welcome
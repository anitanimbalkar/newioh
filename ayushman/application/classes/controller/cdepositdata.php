<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/export.php');
class Controller_Cdepositdata extends Controller_Ctemplatewithmenu {
	public function action_view()
	{
		
		$searchstat = 'Deposited';
		$whereclause = '[status,=,Deposited]';	
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
	public function action_deposittransaction()
	{		
		$searchstat = 'Deposited';
		$whereclause = '[status,=,Deposited]';		
		if($_POST){
			$from = null;
			$to = null;
			$trxidall = $_POST['trxidall'];
			if($_POST['from'] != ''){
				$fromdt = date_create($_POST['from']);
				$from = date_format($fromdt,"Y-m-d");
			}
			if($_POST['to'] != ''){
				$todt = date_create($_POST['to']);
				$to = date_format($todt,"Y-m-d");
			}
				if($_POST['trxidall'] != ''){						
						$whereclause 	= '[status,=,Deposited][trxid,=,'.$trxidall.']';											
					}
				
				if($from != '' && $to != ''){						
						$whereclause 	= '[sortdate,<=,'.$to.'][sortdate,>=,'.$from.'][status,=,Deposited]';											
					}
				if($from != '' && $to != '' && $_POST['trxidall'] != ''){						
						$whereclause 	= '[sortdate,<=,'.$to.'][sortdate,>=,'.$from.'][trxid,=,'.$trxidall.'][status,=,Deposited]';											
					}
					$this->display($whereclause,$searchstat);	
		}	
		$this->display($whereclause,$searchstat);	
	}
	public function action_approvetransaction()
	{	
		$searchstat = 'Approved';
		$whereclause = '[status,=,Approved]';
		if($_POST){
			$from = null;
			$to = null;
			$trxidall = $_POST['trxidall'];
			if($_POST['from'] != ''){
				$fromdt = date_create($_POST['from']);
				$from = date_format($fromdt,"Y-m-d");
			}
			if($_POST['to'] != ''){
				$todt = date_create($_POST['to']);
				$to = date_format($todt,"Y-m-d");
			}	
				if($_POST['trxidall'] != ''){						
						$whereclause 	= '[status,=,Approved][trxid,=,'.$trxidall.']';											
					}
				if($from != '' && $to != ''){						
						$whereclause 	= '[sortdate,<=,'.$to.'][sortdate,>=,'.$from.'][status,=,Approved]';											
					}
				if($from != '' && $to != '' && $_POST['trxidall'] != ''){						
						$whereclause 	= '[sortdate,<=,'.$to.'][sortdate,>=,'.$from.'][trxid,=,'.$trxidall.'][status,=,Approved]';											
					}
					$this->display($whereclause,$searchstat);	
		}		
		$this->display($whereclause,$searchstat);				
	}
	public function action_rejecttransaction()
	{
		$searchstat = 'Rejected';
		$whereclause = '[status,=,Rejected]';
		
		if($_POST){
			$from = null;
			$to = null;
			$trxidall = $_POST['trxidall'];
			if($_POST['from'] != ''){
				$fromdt = date_create($_POST['from']);
				$from = date_format($fromdt,"Y-m-d");
			}
			if($_POST['to'] != ''){
				$todt = date_create($_POST['to']);
				$to = date_format($todt,"Y-m-d");
			}	
				if($_POST['trxidall'] != ''){						
						$whereclause 	= '[status,=,Rejected][trxid,=,'.$trxidall.']';											
					}
				if($from != '' && $to != ''){						
						$whereclause 	= '[sortdate,<=,'.$to.'][sortdate,>=,'.$from.'][status,=,Rejected]';											
					}
				if($from != '' && $to != '' && $_POST['trxidall'] != ''){						
						$whereclause 	= '[sortdate,<=,'.$to.'][sortdate,>=,'.$from.'][trxid,=,'.$trxidall.'][status,=,Rejected]';											
					}
					$this->display($whereclause,$searchstat);	
		}		
		$this->display($whereclause,$searchstat);				
	}
	public function action_recreatetransaction()
	{
		$searchstat = 'Recreated';
		$whereclause = '[status,=,Recreated]';
		
		if($_POST){
			$from = null;
			$to = null;
			$trxidall = $_POST['trxidall'];
			if($_POST['from'] != ''){
				$fromdt = date_create($_POST['from']);
				$from = date_format($fromdt,"Y-m-d");
			}
			if($_POST['to'] != ''){
				$todt = date_create($_POST['to']);
				$to = date_format($todt,"Y-m-d");
			}	
				if($_POST['trxidall'] != ''){						
						$whereclause 	= '[status,=,Recreated][trxid,=,'.$trxidall.']';											
					}
				if($from != '' && $to != ''){						
						$whereclause 	= '[sortdate,<=,'.$to.'][sortdate,>=,'.$from.'][status,=,Recreated]';											
					}
				if($from != '' && $to != '' && $_POST['trxidall'] != ''){						
						$whereclause 	= '[sortdate,<=,'.$to.'][sortdate,>=,'.$from.'][trxid,=,'.$trxidall.'][status,=,Recreated]';											
					}
					$this->display($whereclause,$searchstat);	
					
		}
		$this->display($whereclause,$searchstat);			
	}
	
	//Export Functions...
		public function action_exportdeposit()
	{
		$errors = array();
		$messages = array();
		$whereclause = '[status,=,Deposited]';		
		if($_POST){
			$from = null;
			$to = null;
			$trxidall = $_POST['trxidall'];	
		if($_POST['from'] != ''){	
			$fromdt = date_create($_POST['from']);
			$from = date_format($fromdt,"Y-m-d");
		}
		if($_POST['to'] != ''){
			$todt = date_create($_POST['to']);
			$to = date_format($todt,"Y-m-d");	
		}
			if($_POST['trxidall'] != ''){						
						$whereclause 	= '[status,=,Deposited][trxid,=,'.$trxidall.']';											
					}
				if($from != '' && $to != ''){						
						$whereclause 	= '[sortdate,<=,'.$to.'][sortdate,>=,'.$from.'][status,=,Deposited]';											
					}
				if($from != '' && $to != '' && $_POST['trxidall'] != ''){						
						$whereclause 	= '[sortdate,<=,'.$to.'][sortdate,>=,'.$from.'][trxid,=,'.$trxidall.'][status,=,Deposited]';											
					}					
				
			$table = "csrtrxdetail";
			$columns = "trxdate,trxid,trxamount,modeofpayment,payername,status,allreceipts";
			$groupby = '';
			$sidx = 'trxid'; 
			$sord = 'desc'; 		
			$jqgriddata=new Model_xjqgridgetdata;
			$result=$jqgriddata->exportdata(1,0,$sidx,$sord,$table,$columns,$whereclause,$groupby);
			$date = date_create();
			$i = 0;
			
			if($_POST['exportto'] == 'excel'){
				export::toexcel($result,'Depositdata_'.date_timestamp_get($date).'.xls');
			}
		}else{
			$errors['error'] = 'Could not export data to excel';
		}
	}
		public function action_exportapprove()
	{
		$errors = array();
		$messages = array();
		$whereclause = '[status,=,Approved]';		
		if($_POST){
			$from = null;
			$to = null;
			$trxidall = $_POST['trxidall'];	
		if($_POST['from'] != ''){	
			$fromdt = date_create($_POST['from']);
			$from = date_format($fromdt,"Y-m-d");
		}
		if($_POST['to'] != ''){
			$todt = date_create($_POST['to']);
			$to = date_format($todt,"Y-m-d");	
		}
			if($_POST['trxidall'] != ''){						
						$whereclause 	= '[status,=,Approved][trxid,=,'.$trxidall.']';											
					}
				if($from != '' && $to != ''){						
						$whereclause 	= '[sortdate,<=,'.$to.'][sortdate,>=,'.$from.'][status,=,Approved]';											
					}
				if($from != '' && $to != '' && $_POST['trxidall'] != ''){						
						$whereclause 	= '[sortdate,<=,'.$to.'][sortdate,>=,'.$from.'][trxid,=,'.$trxidall.'][status,=,Approved]';											
					}					
				
			$table = "csrtrxdetail";
			$columns = "trxdate,trxid,trxamount,modeofpayment,payername,status,allreceipts";
			$groupby = '';
			$sidx = 'trxid'; 
			$sord = 'desc'; 		
			$jqgriddata=new Model_xjqgridgetdata;
			$result=$jqgriddata->exportdata(1,0,$sidx,$sord,$table,$columns,$whereclause,$groupby);
			$date = date_create();
			$i = 0;
			
			if($_POST['exportto'] == 'excel'){
				export::toexcel($result,'Depositdata_'.date_timestamp_get($date).'.xls');
			}
		}else{
			$errors['error'] = 'Could not export data to excel';
		}
	}
	public function action_exportreject()
	{
		$errors = array();
		$messages = array();
		$whereclause = '[status,=,Rejected]';		
		if($_POST){
			$from = null;
			$to = null;
			$trxidall = $_POST['trxidall'];	
		if($_POST['from'] != ''){	
			$fromdt = date_create($_POST['from']);
			$from = date_format($fromdt,"Y-m-d");
		}
		if($_POST['to'] != ''){
			$todt = date_create($_POST['to']);
			$to = date_format($todt,"Y-m-d");	
		}
			if($_POST['trxidall'] != ''){						
						$whereclause 	= '[status,=,Rejected][trxid,=,'.$trxidall.']';											
					}
				if($from != '' && $to != ''){						
						$whereclause 	= '[sortdate,<=,'.$to.'][sortdate,>=,'.$from.'][status,=,Rejected]';											
					}
				if($from != '' && $to != '' && $_POST['trxidall'] != ''){						
						$whereclause 	= '[sortdate,<=,'.$to.'][sortdate,>=,'.$from.'][trxid,=,'.$trxidall.'][status,=,Rejected]';											
					}
			$table = "csrtrxdetail";
			$columns = "trxdate,trxid,trxamount,modeofpayment,payername,status,allreceipts";
			$groupby = '';
			$sidx = 'trxid'; 
			$sord = 'desc'; 		
			$jqgriddata=new Model_xjqgridgetdata;
			$result=$jqgriddata->exportdata(1,0,$sidx,$sord,$table,$columns,$whereclause,$groupby);
			$date = date_create();
			$i = 0;
			
			if($_POST['exportto'] == 'excel'){
				export::toexcel($result,'Depositdata_'.date_timestamp_get($date).'.xls');
			}
		}else{
			$errors['error'] = 'Could not export data to excel';
		}
	}
	public function action_exportrecreate()
	{
		$errors = array();
		$messages = array();
		$whereclause = '[status,=,Recreated]';		
		if($_POST){
			$from = null;
			$to = null;
			$trxidall = $_POST['trxidall'];	
		if($_POST['from'] != ''){	
			$fromdt = date_create($_POST['from']);
			$from = date_format($fromdt,"Y-m-d");
		}
		if($_POST['to'] != ''){
			$todt = date_create($_POST['to']);
			$to = date_format($todt,"Y-m-d");	
		}
			if($_POST['trxidall'] != ''){						
						$whereclause 	= '[status,=,Recreated][trxid,=,'.$trxidall.']';											
					}
				if($from != '' && $to != ''){						
						$whereclause 	= '[sortdate,<=,'.$to.'][sortdate,>=,'.$from.'][status,=,Recreated]';											
					}
				if($from != '' && $to != '' && $_POST['trxidall'] != ''){						
						$whereclause 	= '[sortdate,<=,'.$to.'][sortdate,>=,'.$from.'][trxid,=,'.$trxidall.'][status,=,Recreated]';											
					}
			$table = "csrtrxdetail";
			$columns = "trxdate,trxid,trxamount,modeofpayment,payername,status,allreceipts";
			$groupby = '';
			$sidx = 'trxid'; 
			$sord = 'desc'; 		
			$jqgriddata=new Model_xjqgridgetdata;
			$result=$jqgriddata->exportdata(1,0,$sidx,$sord,$table,$columns,$whereclause,$groupby);
			$date = date_create();
			$i = 0;
			
			if($_POST['exportto'] == 'excel'){
				export::toexcel($result,'Depositdata_'.date_timestamp_get($date).'.xls');
			}
		}else{
			$errors['error'] = 'Could not export data to excel';
		}
	}
} // End Welcome
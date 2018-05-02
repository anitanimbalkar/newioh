<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/export.php');
class Controller_Ccresummary extends Controller_Ctemplatewithmenu {
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
		$searchstat = 'Deposited';
		$obj_user = Auth::instance()->get_user();
		$userloginid = $obj_user->id;
		$whereclause = '[status,=,Deposited][payeruserid,=,'.$userloginid.']';	
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
						$whereclause 	= '[status,=,Deposited][trxid,=,'.$trxidall.'][payeruserid,=,'.$userloginid.']';											
					}
				if($from != '' && $to != ''){						
						$whereclause 	= '[sortdate,<=,'.$to.'][sortdate,>=,'.$from.'][status,=,Deposited][payeruserid,=,'.$userloginid.']';											
					}
				if($from != '' && $to != '' && $_POST['trxidall'] != ''){						
						$whereclause 	= '[sortdate,<=,'.$to.'][sortdate,>=,'.$from.'][trxid,=,'.$trxidall.'][status,=,Deposited][payeruserid,=,'.$userloginid.']';											
					}
					$this->display($whereclause,$searchstat);	
		}	
		$this->display($whereclause,$searchstat);				
	}
	public function action_approvetransaction()
	{
		$searchstat = 'Approved';
		$obj_user = Auth::instance()->get_user();
		$userloginid = $obj_user->id;
		$whereclause = '[status,=,Approved][payeruserid,=,'.$userloginid.']';	
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
						$whereclause 	= '[status,=,Approved][trxid,=,'.$trxidall.'][payeruserid,=,'.$userloginid.']';											
					}
				if($from != '' && $to != ''){						
						$whereclause 	= '[sortdate,<=,'.$to.'][sortdate,>=,'.$from.'][status,=,Approved][payeruserid,=,'.$userloginid.']';											
					}
				if($from != '' && $to != '' && $_POST['trxidall'] != ''){						
						$whereclause 	= '[sortdate,<=,'.$to.'][sortdate,>=,'.$from.'][trxid,=,'.$trxidall.'][status,=,Approved][payeruserid,=,'.$userloginid.']';											
					}
					$this->display($whereclause,$searchstat);	
		}		
		$this->display($whereclause,$searchstat);				
	}
	public function action_rejecttransaction()
	{
		$searchstat = 'Rejected';
		$obj_user = Auth::instance()->get_user();
		$userloginid = $obj_user->id;
		$whereclause = '[status,=,Rejected][payeruserid,=,'.$userloginid.']';	
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
						$whereclause 	= '[status,=,Rejected][trxid,=,'.$trxidall.'][payeruserid,=,'.$userloginid.']';											
					}
				if($from != '' && $to != ''){						
						$whereclause 	= '[sortdate,<=,'.$to.'][sortdate,>=,'.$from.'][status,=,Rejected][payeruserid,=,'.$userloginid.']';											
					}
				if($from != '' && $to != '' && $_POST['trxidall'] != ''){						
						$whereclause 	= '[sortdate,<=,'.$to.'][sortdate,>=,'.$from.'][trxid,=,'.$trxidall.'][status,=,Rejected][payeruserid,=,'.$userloginid.']';											
					}
					$this->display($whereclause,$searchstat);	
		}		
		$this->display($whereclause,$searchstat);				
	}
	public function action_recreatedtransaction()
	{
		$searchstat = 'Recreated';
		$obj_user = Auth::instance()->get_user();
		$userloginid = $obj_user->id;
		$whereclause = '[status,=,Recreated][payeruserid,=,'.$userloginid.']';	
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
						$whereclause 	= '[status,=,Recreated][trxid,=,'.$trxidall.'][payeruserid,=,'.$userloginid.']';											
					}
				if($from != '' && $to != ''){						
						$whereclause 	= '[sortdate,<=,'.$to.'][sortdate,>=,'.$from.'][status,=,Recreated][payeruserid,=,'.$userloginid.']';											
					}
				if($from != '' && $to != '' && $_POST['trxidall'] != ''){						
						$whereclause 	= '[sortdate,<=,'.$to.'][sortdate,>=,'.$from.'][trxid,=,'.$trxidall.'][status,=,Recreated][payeruserid,=,'.$userloginid.']';											
					}
					$this->display($whereclause,$searchstat);	
		}		
		$this->display($whereclause,$searchstat);				
	}
	
	public function action_deleteddeposit()
	{
		$objtrxdata = ORM::factory('csrtransaction')->where('id','=',$_GET['trxid'])->find();
		$objtrxdata->status_c = 'deleted'; 
		$objtrxdata->update();
		$arra = explode(",",$_GET['allreceipt']);
			for($i = 0; $i < (count($arra)); $i++)
				{
					$objayushreceiptdeposit = ORM::factory('ayushreceipt')->where('rcptno_c','=',$arra[$i])->find();
						$objayushreceiptdeposit->depositstatus_c = "Notdeposit";
						$objayushreceiptdeposit->update();
				}
		$data = array();
		$data['message'] = 'success';
		die(json_encode($data));
	}
	private function display($whereclause,$searchstat){
			$obj_user = Auth::instance()->get_user();
			$content = View::factory('vuser/vadmin/vcersummarydashboard');
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
	
} // End Welcome
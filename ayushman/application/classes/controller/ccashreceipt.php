<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/export.php');
class Controller_Ccashreceipt extends Controller_Ctemplatewithmenu {
	public function action_view()
	{
		$searchstat = 'all';
		$whereclause = '[rcptno,!=,""]';
		$this->display($whereclause,$searchstat);				
	}
	private function display($whereclause,$searchstat){
			$obj_user = Auth::instance()->get_user();
			$content = View::factory('vuser/vadmin/vcashreceiptdashboard');
			$content->bind('obj_user', $obj_user);
			$username = $obj_user->Firstname_c;
			$content->bind('whereclause',$whereclause);
			$content->bind('username', $username);
			$content->bind('searchstat', $searchstat);
			$urole = "data_manager";
			$breadcrumb = "Home>>";
            $this->template->breadcrumb = $breadcrumb;
			$this->template->content = $content;
			$this->template->user = $obj_user->Firstname_c;
			$this->template->urole = $urole;	
	}
	public function action_searchall(){
		$errors = array();
		$messages = array();
		$searchstat = 'all';
		$whereclause = '[rcptno,!=,""][status,!=,Generated]';
		if($_POST){
			$from = null;
			$to = null;
			
			if($_POST['from'] != ''){	
				$fromdt = date_create($_POST['from']);
				$from = date_format($fromdt,"Y-m-d");
			}
			if($_POST['to'] != ''){
				$todt = date_create($_POST['to']);
				$to = date_format($todt,"Y-m-d");	
			}
			$payname 	= $_POST['payername'];		
			$facname	= $_POST['facname'];
			$receitno	= $_POST['receino'];
				if($from != '' && $to != '' && $payname != '' && $facname != '' && $receitno != ''){
					$payname = '%'.$payname.'%';
					$facname = '%'.$facname.'%';
					$receitno = '%'.$receitno.'%';
					$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,!=,Generated][payername,like,'.$payname.'][csrname,like,'.$facname.'][rcptno,like,'.$receitno.']';
				}else if($from != '' && $to != '' && $payname != ''){	
						$payname = '%'.$payname.'%';				
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,!=,Generated][rcptno,!=,""][payername,like,'.$payname.']';
				}else if($from != '' && $to != '' && $facname != ''){
						$facname = '%'.$facname.'%';
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,!=,Generated][rcptno,!=,""][csrname,like,'.$facname.']';
				}else if($from != '' && $to != '' && $receitno != ''){	
						$receitno = '%'.$receitno.'%';
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,!=,Generated][rcptno,like,'.$receitno.']';
				}else if($from != '' && $to != ''){			
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,!=,Generated][rcptno,!=,""]';
				}else if($from != ''){			
						$whereclause 	= '[sortdate,=,'.$from.'][status,!=,Generated][rcptno,!=,""]';
				}else if($payname != ''){
						$payname = '%'.$payname.'%';
						$whereclause 	= '[rcptno,!=,""][status,!=,Generated][payername,like,'.$payname.']';
				}else if($facname != ''){
						$facname = '%'.$facname.'%';
						$whereclause 	= '[rcptno,!=,""][status,!=,Generated][csrname,like,'.$facname.']';
				}else if($receitno != ''){
						$receitno = '%'.$receitno.'%';
						$whereclause 	= '[rcptno,like,'.$receitno.'][status,!=,Generated]';
				}				
			$this->display($whereclause,$searchstat);	
		}else{
			$errors['error'] = 'Could not search your query';
		}
		$this->display($whereclause,$searchstat);
	}
	public function action_searchopen(){
		$searchstat = 'Open';
		$errors = array();
		$messages = array();
		$whereclause = '[status,=,Open]';
		if($_POST){
			$from = null;
			$to = null;
			
		if($_POST['from'] != ''){	
			$fromdt = date_create($_POST['from']);
			$from = date_format($fromdt,"Y-m-d");
		}
		if($_POST['to'] != ''){
			$todt = date_create($_POST['to']);
			$to = date_format($todt,"Y-m-d");	
		}
			$payname 	= $_POST['payername'];			
			$facname	= $_POST['facname'];
			$receitno	= $_POST['receino'];
				if($from != '' && $to != '' && $payname != '' && $facname != '' && $receitno != ''){
					$payname = '%'.$payname.'%';
					$facname = '%'.$facname.'%';
					$receitno = '%'.$receitno.'%';
					$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Open][payername,like,'.$payname.'][csrname,like,'.$facname.'][rcptno,like,'.$receitno.']';
				}else if($from != '' && $to != '' && $payname != ''){	
						$payname = '%'.$payname.'%';				
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Open][rcptno,!=,""][payername,like,'.$payname.']';
				}else if($from != '' && $to != '' && $facname != ''){
						$facname = '%'.$facname.'%';
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Open][rcptno,!=,""][csrname,like,'.$facname.']';
				}else if($from != '' && $to != '' && $receitno != ''){	
						$receitno = '%'.$receitno.'%';
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Open][rcptno,like,'.$receitno.']';
				}else if($from != '' && $to != ''){			
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Open][rcptno,!=,""]';
				}else if($from != ''){			
						$whereclause 	= '[sortdate,=,'.$from.'][status,=,Open]';
				}else if($payname != ''){
						$payname = '%'.$payname.'%';
						$whereclause 	= '[status,=,Open][payername,like,'.$payname.']';
				}else if($facname != ''){
						$facname = '%'.$facname.'%';
						$whereclause 	= '[status,=,Open][csrname,like,'.$facname.']';
				}else if($receitno != ''){
						$receitno = '%'.$receitno.'%';
						$whereclause 	= '[status,=,Open][rcptno,like,'.$receitno.']';
				}				
			$this->display($whereclause,$searchstat);	
		}else{
			$errors['error'] = 'Could not search your query';
		}
		$this->display($whereclause,$searchstat);	
	}
	public function action_searchgenerat(){
		$searchstat = 'Generated';
		$errors = array();
		$messages = array();
		$whereclause = '[status,=,Generated]';
		if($_POST){
			$from = null;
			$to = null;
			
		if($_POST['from'] != ''){	
			$fromdt = date_create($_POST['from']);
			$from = date_format($fromdt,"Y-m-d");
		}
		if($_POST['to'] != ''){
			$todt = date_create($_POST['to']);
			$to = date_format($todt,"Y-m-d");	
		}
			$payname 	= $_POST['payername'];			
			$facname	= $_POST['facname'];
			$receitno	= $_POST['receino'];
				if($from != '' && $to != '' && $payname != '' && $facname != '' && $receitno != ''){
					$payname = '%'.$payname.'%';
					$facname = '%'.$facname.'%';
					$receitno = '%'.$receitno.'%';
					$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Generated][payername,like,'.$payname.'][csrname,like,'.$facname.'][rcptno,like,'.$receitno.']';
				}else if($from != '' && $to != '' && $payname != ''){	
						$payname = '%'.$payname.'%';				
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Generated][rcptno,!=,""][payername,like,'.$payname.']';
				}else if($from != '' && $to != '' && $facname != ''){
						$facname = '%'.$facname.'%';
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Generated][rcptno,!=,""][csrname,like,'.$facname.']';
				}else if($from != '' && $to != '' && $receitno != ''){	
						$receitno = '%'.$receitno.'%';
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Generated][rcptno,like,'.$receitno.']';
				}else if($from != '' && $to != ''){			
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Generated][rcptno,!=,""]';
				}else if($from != ''){			
						$whereclause 	= '[sortdate,=,'.$from.'][status,=,Generated]';
				}else if($payname != ''){
						$payname = '%'.$payname.'%';
						$whereclause 	= '[status,=,Generated][payername,like,'.$payname.']';
				}else if($facname != ''){
						$facname = '%'.$facname.'%';
						$whereclause 	= '[status,=,Generated][csrname,like,'.$facname.']';
				}else if($receitno != ''){
						$receitno = '%'.$receitno.'%';
						$whereclause 	= '[status,=,Generated][rcptno,like,'.$receitno.']';
				}				
			$this->display($whereclause,$searchstat);	
		}else{
			$errors['error'] = 'Could not search your query';
		}
		$this->display($whereclause,$searchstat);	
	}
	public function action_searchclaim(){
		$searchstat = 'Claimed';
		$errors = array();
		$messages = array();
		$whereclause = '[status,=,Claimed]';
		if($_POST){
			$from = null;
			$to = null;
			
		if($_POST['from'] != ''){	
			$fromdt = date_create($_POST['from']);
			$from = date_format($fromdt,"Y-m-d");
		}
		if($_POST['to'] != ''){
			$todt = date_create($_POST['to']);
			$to = date_format($todt,"Y-m-d");	
		}
			$payname 	= $_POST['payername'];			
			$facname	= $_POST['facname'];
			$receitno	= $_POST['receino'];
				if($from != '' && $to != '' && $payname != '' && $facname != '' && $receitno != ''){
					$payname = '%'.$payname.'%';
					$facname = '%'.$facname.'%';
					$receitno = '%'.$receitno.'%';
					$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Claimed][payername,like,'.$payname.'][csrname,like,'.$facname.'][rcptno,like,'.$receitno.']';
				}else if($from != '' && $to != '' && $payname != ''){	
						$payname = '%'.$payname.'%';				
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Claimed][rcptno,!=,""][payername,like,'.$payname.']';
				}else if($from != '' && $to != '' && $facname != ''){
						$facname = '%'.$facname.'%';
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Claimed][rcptno,!=,""][csrname,like,'.$facname.']';
				}else if($from != '' && $to != '' && $receitno != ''){	
						$receitno = '%'.$receitno.'%';
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Claimed][rcptno,like,'.$receitno.']';
				}else if($from != '' && $to != ''){			
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Claimed][rcptno,!=,""]';
				}else if($from != ''){			
						$whereclause 	= '[sortdate,=,'.$from.'][status,=,Claimed]';
				}else if($payname != ''){
						$payname = '%'.$payname.'%';
						$whereclause 	= '[status,=,Claimed][payername,like,'.$payname.']';
				}else if($facname != ''){
						$facname = '%'.$facname.'%';
						$whereclause 	= '[status,=,Claimed][csrname,like,'.$facname.']';
				}else if($receitno != ''){
						$receitno = '%'.$receitno.'%';
						$whereclause 	= '[status,=,Claimed][rcptno,like,'.$receitno.']';
				}				
			$this->display($whereclause,$searchstat);	
		}else{
			$errors['error'] = 'Could not search your query';
		}
		$this->display($whereclause,$searchstat);	
	}
	public function action_searchapproved(){
		$searchstat = 'Approved';
		$errors = array();
		$messages = array();
		$whereclause = '[status,=,Approved]';
		if($_POST){
			$from = null;
			$to = null;
			
		if($_POST['from'] != ''){	
			$fromdt = date_create($_POST['from']);
			$from = date_format($fromdt,"Y-m-d");
		}
		if($_POST['to'] != ''){
			$todt = date_create($_POST['to']);
			$to = date_format($todt,"Y-m-d");	
		}
			$payname 	= $_POST['payername'];			
			$facname	= $_POST['facname'];
			$receitno	= $_POST['receino'];
				if($from != '' && $to != '' && $payname != '' && $facname != '' && $receitno != ''){
					$payname = '%'.$payname.'%';
					$facname = '%'.$facname.'%';
					$receitno = '%'.$receitno.'%';
					$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Approved][payername,like,'.$payname.'][csrname,like,'.$facname.'][rcptno,like,'.$receitno.']';
				}else if($from != '' && $to != '' && $payname != ''){	
						$payname = '%'.$payname.'%';				
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Approved][rcptno,!=,""][payername,like,'.$payname.']';
				}else if($from != '' && $to != '' && $facname != ''){
						$facname = '%'.$facname.'%';
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Approved][rcptno,!=,""][csrname,like,'.$facname.']';
				}else if($from != '' && $to != '' && $receitno != ''){	
						$receitno = '%'.$receitno.'%';
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Approved][rcptno,like,'.$receitno.']';
				}else if($from != '' && $to != ''){			
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Approved][rcptno,!=,""]';
				}else if($from != ''){			
						$whereclause 	= '[sortdate,=,'.$from.'][status,=,Approved]';
				}else if($payname != ''){
						$payname = '%'.$payname.'%';
						$whereclause 	= '[status,=,Approved][payername,like,'.$payname.']';
				}else if($facname != ''){
						$facname = '%'.$facname.'%';
						$whereclause 	= '[status,=,Approved][csrname,like,'.$facname.']';
				}else if($receitno != ''){
						$receitno = '%'.$receitno.'%';
						$whereclause 	= '[status,=,Approved][rcptno,like,'.$receitno.']';
				}
				
			$this->display($whereclause,$searchstat);	
		}else{
			$errors['error'] = 'Could not search your query';
		}
		$this->display($whereclause,$searchstat);	
	}
	public function action_searchcancel(){
		$searchstat = 'Rejected';
		$errors = array();
		$messages = array();
		$whereclause = '[status,=,Rejected]';
		if($_POST){
			$from = null;
			$to = null;
			
		if($_POST['from'] != ''){	
			$fromdt = date_create($_POST['from']);
			$from = date_format($fromdt,"Y-m-d");
		}
		if($_POST['to'] != ''){
			$todt = date_create($_POST['to']);
			$to = date_format($todt,"Y-m-d");	
		}
			$payname 	= $_POST['payername'];			
			$facname	= $_POST['facname'];
			$receitno	= $_POST['receino'];
				if($from != '' && $to != '' && $payname != '' && $facname != '' && $receitno != ''){
					$payname = '%'.$payname.'%';
					$facname = '%'.$facname.'%';
					$receitno = '%'.$receitno.'%';
					$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Rejected][payername,like,'.$payname.'][csrname,like,'.$facname.'][rcptno,like,'.$receitno.']';
				}else if($from != '' && $to != '' && $payname != ''){	
						$payname = '%'.$payname.'%';				
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Rejected][rcptno,!=,""][payername,like,'.$payname.']';
				}else if($from != '' && $to != '' && $facname != ''){
						$facname = '%'.$facname.'%';
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Rejected][rcptno,!=,""][csrname,like,'.$facname.']';
				}else if($from != '' && $to != '' && $receitno != ''){	
						$receitno = '%'.$receitno.'%';
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Rejected][rcptno,like,'.$receitno.']';
				}else if($from != '' && $to != ''){			
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Rejected][rcptno,!=,""]';
				}else if($from != ''){			
						$whereclause 	= '[sortdate,=,'.$from.'][status,=,Rejected]';
				}else if($payname != ''){
						$payname = '%'.$payname.'%';
						$whereclause 	= '[status,=,Rejected][payername,like,'.$payname.']';
				}else if($facname != ''){
						$facname = '%'.$facname.'%';
						$whereclause 	= '[status,=,Rejected][csrname,like,'.$facname.']';
				}else if($receitno != ''){
						$receitno = '%'.$receitno.'%';
						$whereclause 	= '[status,=,Rejected][rcptno,like,'.$receitno.']';
				}		
			$this->display($whereclause,$searchstat);	
		}else{
			$errors['error'] = 'Could not search your query';
		}
		$this->display($whereclause,$searchstat);	
	}
	public function action_searchrefund(){
		$searchstat = 'Refunded';
		$errors = array();
		$messages = array();
		$whereclause = '[status,=,Refund]';
		if($_POST){
			$from = null;
			$to = null;
			
		if($_POST['from'] != ''){	
			$fromdt = date_create($_POST['from']);
			$from = date_format($fromdt,"Y-m-d");
		}
		if($_POST['to'] != ''){
			$todt = date_create($_POST['to']);
			$to = date_format($todt,"Y-m-d");	
		}
			$payname 	= $_POST['payername'];			
			$facname	= $_POST['facname'];
			$receitno	= $_POST['receino'];
				if($from != '' && $to != '' && $payname != '' && $facname != '' && $receitno != ''){
					$payname = '%'.$payname.'%';
					$facname = '%'.$facname.'%';
					$receitno = '%'.$receitno.'%';
					$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Refund][payername,like,'.$payname.'][csrname,like,'.$facname.'][rcptno,like,'.$receitno.']';
				}else if($from != '' && $to != '' && $payname != ''){	
						$payname = '%'.$payname.'%';				
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Refund][rcptno,!=,""][payername,like,'.$payname.']';
				}else if($from != '' && $to != '' && $facname != ''){
						$facname = '%'.$facname.'%';
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Refund][rcptno,!=,""][csrname,like,'.$facname.']';
				}else if($from != '' && $to != '' && $receitno != ''){	
						$receitno = '%'.$receitno.'%';
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Refund][rcptno,like,'.$receitno.']';
				}else if($from != '' && $to != ''){			
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Refund][rcptno,!=,""]';
				}else if($from != ''){			
						$whereclause 	= '[sortdate,=,'.$from.'][status,=,Refund]';
				}else if($payname != ''){
						$payname = '%'.$payname.'%';
						$whereclause 	= '[status,=,Refund][payername,like,'.$payname.']';
				}else if($facname != ''){
						$facname = '%'.$facname.'%';
						$whereclause 	= '[status,=,Refund][csrname,like,'.$facname.']';
				}else if($receitno != ''){
						$receitno = '%'.$receitno.'%';
						$whereclause 	= '[status,=,Refund][rcptno,like,'.$receitno.']';
				}			
			$this->display($whereclause,$searchstat);	
		}else{
			$errors['error'] = 'Could not search your query';
		}
		$this->display($whereclause,$searchstat);	
	}
	
	public function action_viewnewreceipt()
	{
		$this->displayreceiptform();				
	}
	private function displayreceiptform(){
			$obj_user = Auth::instance()->get_user();
			$content = View::factory('vuser/vadmin/vcashreceiptformdashboard');
			$content->bind('obj_user', $obj_user);
			$username = $obj_user->Firstname_c;
			$content->bind('username', $username);
			$urole = "data_manager";
			$breadcrumb = "Home>>";
            $this->template->breadcrumb = $breadcrumb;
			$this->template->content = $content;
			$this->template->user = $obj_user->Firstname_c;
			$this->template->urole = $urole;
	
	}	
	public function action_viewgeneratenewreceipt()
	{
	$this->displaygeneratereceiptform();
				
	}
	private function displaygeneratereceiptform(){
			$obj_user = Auth::instance()->get_user();
			$content = View::factory('vuser/vadmin/vgeneratecashreceiptformdashboard');
			$content->bind('obj_user', $obj_user);
			$username = $obj_user->Firstname_c;
			$content->bind('username', $username);
			$urole = "data_manager";
			$breadcrumb = "Home>>";
            $this->template->breadcrumb = $breadcrumb;
			$this->template->content = $content;
			$this->template->user = $obj_user->Firstname_c;
			$this->template->urole = $urole;
	}
	public function action_exportall()
	{
		$errors = array();
		$messages = array();
		$searchstat = 'all';
		$whereclause = '[rcptno,!=,""]';
		if($_POST){
			$from = null;
			$to = null;
			
		if($_POST['from'] != ''){	
			$fromdt = date_create($_POST['from']);
			$from = date_format($fromdt,"Y-m-d");
		}
		if($_POST['to'] != ''){
			$todt = date_create($_POST['to']);
			$to = date_format($todt,"Y-m-d");	
		}
			$payname 	= $_POST['payername'];		
			$facname	= $_POST['facname'];
			$receitno	= $_POST['receino'];
				if($from != '' && $to != '' && $payname != '' && $facname != '' && $receitno != ''){
					$payname = '%'.$payname.'%';
					$facname = '%'.$facname.'%';
					$receitno = '%'.$receitno.'%';
					$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][payername,like,'.$payname.'][csrname,like,'.$facname.'][rcptno,like,'.$receitno.']';
				}else if($from != '' && $to != '' && $payname != ''){	
						$payname = '%'.$payname.'%';				
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][rcptno,!=,""][payername,like,'.$payname.']';
				}else if($from != '' && $to != '' && $facname != ''){
						$facname = '%'.$facname.'%';
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][rcptno,!=,""][csrname,like,'.$facname.']';
				}else if($from != '' && $to != '' && $receitno != ''){	
						$receitno = '%'.$receitno.'%';
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][rcptno,like,'.$receitno.']';
				}else if($from != '' && $to != ''){			
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][rcptno,!=,""]';
				}else if($from != ''){			
						$whereclause 	= '[sortdate,=,'.$from.'][rcptno,!=,""]';
				}else if($payname != ''){
						$payname = '%'.$payname.'%';
						$whereclause 	= '[rcptno,!=,""][payername,like,'.$payname.']';
				}else if($facname != ''){
						$facname = '%'.$facname.'%';
						$whereclause 	= '[rcptno,!=,""][csrname,like,'.$facname.']';
				}else if($receitno != ''){
						$receitno = '%'.$receitno.'%';
						$whereclause 	= '[rcptno,like,'.$receitno.']';
				}				
			
			$table = "allreceipt";
			$columns = "rcptno,rcptdate,description,status,amount";
			$groupby = '';
			$sidx = 'rcptno'; 
			$sord = 'desc'; 		
			$jqgriddata=new Model_xjqgridgetdata;
			$result=$jqgriddata->exportdata(1,0,$sidx,$sord,$table,$columns,$whereclause,$groupby);
			$date = date_create();
			$i = 0;
			
			if($_POST['exportto'] == 'excel'){
				export::toexcel($result,'ayushreceipts_'.date_timestamp_get($date).'.xls');
			}
		}else{
			$errors['error'] = 'Could not export data to excel';
			$this->display($errors,$messages,$whereclause);
		}
	}
	public function action_exportgenerated()
	{
		$errors = array();
		$messages = array();
			$whereclause = '[status,=,Generated]';
		if($_POST){
			$from = null;
			$to = null;
			
		if($_POST['from'] != ''){	
			$fromdt = date_create($_POST['from']);
			$from = date_format($fromdt,"Y-m-d");
		}
		if($_POST['to'] != ''){
			$todt = date_create($_POST['to']);
			$to = date_format($todt,"Y-m-d");	
		}
			$payname 	= $_POST['payername'];			
			$facname	= $_POST['facname'];
			$receitno	= $_POST['receino'];
				if($from != '' && $to != '' && $payname != '' && $facname != '' && $receitno != ''){
					$payname = '%'.$payname.'%';
					$facname = '%'.$facname.'%';
					$receitno = '%'.$receitno.'%';
					$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Generated][payername,like,'.$payname.'][csrname,like,'.$facname.'][rcptno,like,'.$receitno.']';
				}else if($from != '' && $to != '' && $payname != ''){	
						$payname = '%'.$payname.'%';				
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Generated][rcptno,!=,""][payername,like,'.$payname.']';
				}else if($from != '' && $to != '' && $facname != ''){
						$facname = '%'.$facname.'%';
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Generated][rcptno,!=,""][csrname,like,'.$facname.']';
				}else if($from != '' && $to != '' && $receitno != ''){	
						$receitno = '%'.$receitno.'%';
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Generated][rcptno,like,'.$receitno.']';
				}else if($from != '' && $to != ''){			
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Generated][rcptno,!=,""]';
				}else if($from != ''){			
						$whereclause 	= '[sortdate,=,'.$from.'][status,=,Generated]';
				}else if($payname != ''){
						$payname = '%'.$payname.'%';
						$whereclause 	= '[status,=,Generated][payername,like,'.$payname.']';
				}else if($facname != ''){
						$facname = '%'.$facname.'%';
						$whereclause 	= '[status,=,Generated][csrname,like,'.$facname.']';
				}else if($receitno != ''){
						$receitno = '%'.$receitno.'%';
						$whereclause 	= '[status,=,Generated][rcptno,like,'.$receitno.']';
				}			
			
			$table = "allreceipt";
			$columns = "rcptno,rcptdate,description,status,amount";
			$groupby = '';
			$sidx = 'rcptno'; 
			$sord = 'desc'; 		
			$jqgriddata=new Model_xjqgridgetdata;
			$result=$jqgriddata->exportdata(1,0,$sidx,$sord,$table,$columns,$whereclause,$groupby);
			$date = date_create();
			$i = 0;
			
			if($_POST['exportto'] == 'excel'){
				export::toexcel($result,'ayushreceipts_'.date_timestamp_get($date).'.xls');
			}
		}else{
			$errors['error'] = 'Could not export data to excel';
		}
	}
	public function action_exportopen()
	{
		$errors = array();
		$messages = array();
		$whereclause = '[status,=,Open]';
		if($_POST){
			$from = null;
			$to = null;
			
		if($_POST['from'] != ''){	
			$fromdt = date_create($_POST['from']);
			$from = date_format($fromdt,"Y-m-d");
		}
		if($_POST['to'] != ''){
			$todt = date_create($_POST['to']);
			$to = date_format($todt,"Y-m-d");	
		}
			$payname 	= $_POST['payername'];			
			$facname	= $_POST['facname'];
			$receitno	= $_POST['receino'];
				if($from != '' && $to != '' && $payname != '' && $facname != '' && $receitno != ''){
					$payname = '%'.$payname.'%';
					$facname = '%'.$facname.'%';
					$receitno = '%'.$receitno.'%';
					$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Open][payername,like,'.$payname.'][csrname,like,'.$facname.'][rcptno,like,'.$receitno.']';
				}else if($from != '' && $to != '' && $payname != ''){	
						$payname = '%'.$payname.'%';				
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Open][rcptno,!=,""][payername,like,'.$payname.']';
				}else if($from != '' && $to != '' && $facname != ''){
						$facname = '%'.$facname.'%';
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Open][rcptno,!=,""][csrname,like,'.$facname.']';
				}else if($from != '' && $to != '' && $receitno != ''){	
						$receitno = '%'.$receitno.'%';
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Open][rcptno,like,'.$receitno.']';
				}else if($from != '' && $to != ''){			
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Open][rcptno,!=,""]';
				}else if($from != ''){			
						$whereclause 	= '[sortdate,=,'.$from.'][status,=,Open]';
				}else if($payname != ''){
						$payname = '%'.$payname.'%';
						$whereclause 	= '[status,=,Open][payername,like,'.$payname.']';
				}else if($facname != ''){
						$facname = '%'.$facname.'%';
						$whereclause 	= '[status,=,Open][csrname,like,'.$facname.']';
				}else if($receitno != ''){
						$receitno = '%'.$receitno.'%';
						$whereclause 	= '[status,=,Open][rcptno,like,'.$receitno.']';
				}				
			
			$table = "allreceipt";
			$columns = "rcptno,rcptdate,description,status,amount";
			$groupby = '';
			$sidx = 'rcptno'; 
			$sord = 'desc'; 		
			$jqgriddata=new Model_xjqgridgetdata;
			$result=$jqgriddata->exportdata(1,0,$sidx,$sord,$table,$columns,$whereclause,$groupby);
			$date = date_create();
			$i = 0;
			
			if($_POST['exportto'] == 'excel'){
				export::toexcel($result,'ayushreceipts_'.date_timestamp_get($date).'.xls');
			}
		}else{
			$errors['error'] = 'Could not export data to excel';
		}
	}
	public function action_exportclaim()
	{
		$errors = array();
		$messages = array();
		$whereclause = '[status,=,Claimed]';
		if($_POST){
			$from = null;
			$to = null;
			
		if($_POST['from'] != ''){	
			$fromdt = date_create($_POST['from']);
			$from = date_format($fromdt,"Y-m-d");
		}
		if($_POST['to'] != ''){
			$todt = date_create($_POST['to']);
			$to = date_format($todt,"Y-m-d");	
		}
			$payname 	= $_POST['payername'];			
			$facname	= $_POST['facname'];
			$receitno	= $_POST['receino'];
				if($from != '' && $to != '' && $payname != '' && $facname != '' && $receitno != ''){
					$payname = '%'.$payname.'%';
					$facname = '%'.$facname.'%';
					$receitno = '%'.$receitno.'%';
					$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Claimed][payername,like,'.$payname.'][csrname,like,'.$facname.'][rcptno,like,'.$receitno.']';
				}else if($from != '' && $to != '' && $payname != ''){	
						$payname = '%'.$payname.'%';				
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Claimed][rcptno,!=,""][payername,like,'.$payname.']';
				}else if($from != '' && $to != '' && $facname != ''){
						$facname = '%'.$facname.'%';
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Claimed][rcptno,!=,""][csrname,like,'.$facname.']';
				}else if($from != '' && $to != '' && $receitno != ''){	
						$receitno = '%'.$receitno.'%';
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Claimed][rcptno,like,'.$receitno.']';
				}else if($from != '' && $to != ''){			
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Claimed][rcptno,!=,""]';
				}else if($from != ''){			
						$whereclause 	= '[sortdate,=,'.$from.'][status,=,Claimed]';
				}else if($payname != ''){
						$payname = '%'.$payname.'%';
						$whereclause 	= '[status,=,Claimed][payername,like,'.$payname.']';
				}else if($facname != ''){
						$facname = '%'.$facname.'%';
						$whereclause 	= '[status,=,Claimed][csrname,like,'.$facname.']';
				}else if($receitno != ''){
						$receitno = '%'.$receitno.'%';
						$whereclause 	= '[status,=,Claimed][rcptno,like,'.$receitno.']';
				}		
			
			$table = "allreceipt";
			$columns = "rcptno,rcptdate,description,status,amount";
			$groupby = '';
			$sidx = 'rcptno'; 
			$sord = 'desc'; 		
			$jqgriddata=new Model_xjqgridgetdata;
			$result=$jqgriddata->exportdata(1,0,$sidx,$sord,$table,$columns,$whereclause,$groupby);
			$date = date_create();
			$i = 0;
			
			if($_POST['exportto'] == 'excel'){
				export::toexcel($result,'ayushreceipts_'.date_timestamp_get($date).'.xls');
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
			
		if($_POST['from'] != ''){	
			$fromdt = date_create($_POST['from']);
			$from = date_format($fromdt,"Y-m-d");
		}
		if($_POST['to'] != ''){
			$todt = date_create($_POST['to']);
			$to = date_format($todt,"Y-m-d");	
		}
			$payname 	= $_POST['payername'];			
			$facname	= $_POST['facname'];
			$receitno	= $_POST['receino'];
				if($from != '' && $to != '' && $payname != '' && $facname != '' && $receitno != ''){
					$payname = '%'.$payname.'%';
					$facname = '%'.$facname.'%';
					$receitno = '%'.$receitno.'%';
					$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Approved][payername,like,'.$payname.'][csrname,like,'.$facname.'][rcptno,like,'.$receitno.']';
				}else if($from != '' && $to != '' && $payname != ''){	
						$payname = '%'.$payname.'%';				
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Approved][rcptno,!=,""][payername,like,'.$payname.']';
				}else if($from != '' && $to != '' && $facname != ''){
						$facname = '%'.$facname.'%';
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Approved][rcptno,!=,""][csrname,like,'.$facname.']';
				}else if($from != '' && $to != '' && $receitno != ''){	
						$receitno = '%'.$receitno.'%';
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Approved][rcptno,like,'.$receitno.']';
				}else if($from != '' && $to != ''){			
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Approved][rcptno,!=,""]';
				}else if($from != ''){			
						$whereclause 	= '[sortdate,=,'.$from.'][status,=,Approved]';
				}else if($payname != ''){
						$payname = '%'.$payname.'%';
						$whereclause 	= '[status,=,Approved][payername,like,'.$payname.']';
				}else if($facname != ''){
						$facname = '%'.$facname.'%';
						$whereclause 	= '[status,=,Approved][csrname,like,'.$facname.']';
				}else if($receitno != ''){
						$receitno = '%'.$receitno.'%';
						$whereclause 	= '[status,=,Approved][rcptno,like,'.$receitno.']';
				}
				
			$table = "allreceipt";
			$columns = "rcptno,rcptdate,description,status,amount";
			$groupby = '';
			$sidx = 'rcptno'; 
			$sord = 'desc'; 		
			$jqgriddata=new Model_xjqgridgetdata;
			$result=$jqgriddata->exportdata(1,0,$sidx,$sord,$table,$columns,$whereclause,$groupby);
			$date = date_create();
			$i = 0;
			
			if($_POST['exportto'] == 'excel'){
				export::toexcel($result,'ayushreceipts_'.date_timestamp_get($date).'.xls');
			}
		}else{
			$errors['error'] = 'Could not export data to excel';
		}
	}
	public function action_exportrejected()
	{
		$errors = array();
		$messages = array();
		$whereclause = '[status,=,Rejected]';
		if($_POST){
			$from = null;
			$to = null;
			
		if($_POST['from'] != ''){	
			$fromdt = date_create($_POST['from']);
			$from = date_format($fromdt,"Y-m-d");
		}
		if($_POST['to'] != ''){
			$todt = date_create($_POST['to']);
			$to = date_format($todt,"Y-m-d");	
		}
			$payname 	= $_POST['payername'];			
			$facname	= $_POST['facname'];
			$receitno	= $_POST['receino'];
				if($from != '' && $to != '' && $payname != '' && $facname != '' && $receitno != ''){
					$payname = '%'.$payname.'%';
					$facname = '%'.$facname.'%';
					$receitno = '%'.$receitno.'%';
					$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Rejected][payername,like,'.$payname.'][csrname,like,'.$facname.'][rcptno,like,'.$receitno.']';
				}else if($from != '' && $to != '' && $payname != ''){	
						$payname = '%'.$payname.'%';				
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Rejected][rcptno,!=,""][payername,like,'.$payname.']';
				}else if($from != '' && $to != '' && $facname != ''){
						$facname = '%'.$facname.'%';
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Rejected][rcptno,!=,""][csrname,like,'.$facname.']';
				}else if($from != '' && $to != '' && $receitno != ''){	
						$receitno = '%'.$receitno.'%';
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Rejected][rcptno,like,'.$receitno.']';
				}else if($from != '' && $to != ''){			
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Rejected][rcptno,!=,""]';
				}else if($from != ''){			
						$whereclause 	= '[sortdate,=,'.$from.'][status,=,Rejected]';
				}else if($payname != ''){
						$payname = '%'.$payname.'%';
						$whereclause 	= '[status,=,Rejected][payername,like,'.$payname.']';
				}else if($facname != ''){
						$facname = '%'.$facname.'%';
						$whereclause 	= '[status,=,Rejected][csrname,like,'.$facname.']';
				}else if($receitno != ''){
						$receitno = '%'.$receitno.'%';
						$whereclause 	= '[status,=,Rejected][rcptno,like,'.$receitno.']';
				}
			
			$table = "allreceipt";
			$columns = "rcptno,rcptdate,description,status,amount";
			$groupby = '';
			$sidx = 'rcptno'; 
			$sord = 'desc'; 		
			$jqgriddata=new Model_xjqgridgetdata;
			$result=$jqgriddata->exportdata(1,0,$sidx,$sord,$table,$columns,$whereclause,$groupby);
			$date = date_create();
			$i = 0;
			
			if($_POST['exportto'] == 'excel'){
				export::toexcel($result,'ayushreceipts_'.date_timestamp_get($date).'.xls');
			}
		}else{
			$errors['error'] = 'Could not export data to excel';
		}
	}
	public function action_exportrefunded()
	{
		$errors = array();
		$messages = array();
		$whereclause = '[status,=,Refunded]';		
		if($_POST){
			$from = null;
			$to = null;
				
		if($_POST['from'] != ''){	
			$fromdt = date_create($_POST['from']);
			$from = date_format($fromdt,"Y-m-d");
		}
		if($_POST['to'] != ''){
			$todt = date_create($_POST['to']);
			$to = date_format($todt,"Y-m-d");	
		}
			$payname 	= $_POST['payername'];			
			$facname	= $_POST['facname'];
			$receitno	= $_POST['receino'];
				if($from != '' && $to != '' && $payname != '' && $facname != '' && $receitno != ''){
					$payname = '%'.$payname.'%';
					$facname = '%'.$facname.'%';
					$receitno = '%'.$receitno.'%';
					$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Refunded][payername,like,'.$payname.'][csrname,like,'.$facname.'][rcptno,like,'.$receitno.']';
				}else if($from != '' && $to != '' && $payname != ''){	
						$payname = '%'.$payname.'%';				
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Refunded][rcptno,!=,""][payername,like,'.$payname.']';
				}else if($from != '' && $to != '' && $facname != ''){
						$facname = '%'.$facname.'%';
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Refunded][rcptno,!=,""][csrname,like,'.$facname.']';
				}else if($from != '' && $to != '' && $receitno != ''){	
						$receitno = '%'.$receitno.'%';
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Refunded][rcptno,like,'.$receitno.']';
				}else if($from != '' && $to != ''){			
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Refunded][rcptno,!=,""]';
				}else if($from != ''){			
						$whereclause 	= '[sortdate,=,'.$from.'][status,=,Refunded]';
				}else if($payname != ''){
						$payname = '%'.$payname.'%';
						$whereclause 	= '[status,=,Refunded][payername,like,'.$payname.']';
				}else if($facname != ''){
						$facname = '%'.$facname.'%';
						$whereclause 	= '[status,=,Refunded][csrname,like,'.$facname.']';
				}else if($receitno != ''){
						$receitno = '%'.$receitno.'%';
						$whereclause 	= '[status,=,Refunded][rcptno,like,'.$receitno.']';
				}	
			
			$table = "allreceipt";
			$columns = "rcptno,rcptdate,description,status,amount";
			$groupby = '';
			$sidx = 'rcptno'; 
			$sord = 'desc'; 		
			$jqgriddata=new Model_xjqgridgetdata;
			$result=$jqgriddata->exportdata(1,0,$sidx,$sord,$table,$columns,$whereclause,$groupby);
			$date = date_create();
			$i = 0;
			
			if($_POST['exportto'] == 'excel'){
				export::toexcel($result,'ayushreceipts_'.date_timestamp_get($date).'.xls');
			}
		}else{
			$errors['error'] = 'Could not export data to excel';
		}
	}
	
} // End Welcome

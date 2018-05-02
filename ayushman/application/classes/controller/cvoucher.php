<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/export.php');
class Controller_Cvoucher extends Controller_Ctemplatewithmenu {
		public function action_view()
		{			
			$searchstat = 'generated';
			$whereclause = '[rcptno,!=,""][status,=,generated]';
			$this->display($whereclause,$searchstat);			
		}
		private function display($whereclause,$searchstat){
				$obj_user = Auth::instance()->get_user();
				$content = View::factory('vuser/vadmin/vvoucherdashboard');
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
	public function action_searchgenerat(){
		$searchstat = 'generated';
		$errors = array();
		$messages = array();
		$whereclause = '[status,=,generated]';
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
					$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,generated][payername,like,'.$payname.'][csrname,like,'.$facname.'][rcptno,like,'.$receitno.']';
				}else if($from != '' && $to != '' && $payname != ''){	
						$payname = '%'.$payname.'%';				
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,generated][rcptno,!=,""][payername,like,'.$payname.']';
				}else if($from != '' && $to != '' && $facname != ''){
						$facname = '%'.$facname.'%';
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,generated][rcptno,!=,""][csrname,like,'.$facname.']';
				}else if($from != '' && $to != '' && $receitno != ''){	
						$receitno = '%'.$receitno.'%';
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,generated][rcptno,like,'.$receitno.']';
				}else if($from != '' && $to != ''){			
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,generated][rcptno,!=,""]';
				}else if($from != ''){			
						$whereclause 	= '[sortdate,=,'.$from.'][status,=,generated]';
				}else if($payname != ''){
						$payname = '%'.$payname.'%';
						$whereclause 	= '[status,=,generated][payername,like,'.$payname.']';
				}else if($facname != ''){
						$facname = '%'.$facname.'%';
						$whereclause 	= '[status,=,generated][csrname,like,'.$facname.']';
				}else if($receitno != ''){
						$receitno = '%'.$receitno.'%';
						$whereclause 	= '[status,=,generated][rcptno,like,'.$receitno.']';
				}				
			$this->display($whereclause,$searchstat);	
		}else{
			$errors['error'] = 'Could not search your query';
		}
		$this->display($whereclause,$searchstat);	
	}
	
} // End Welcome
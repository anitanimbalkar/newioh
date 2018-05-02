<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/export.php');
class Controller_Ccheque extends Controller_Ctemplatewithmenu {
	public function action_view()
	{
		$type = 'all';
		$whereclause = '[chequeno_c,!=,0]';
		$this->display($whereclause,$type);				
	}
	private function display($whereclause,$type){	
			$obj_user = Auth::instance()->get_user();
			$content = View::factory('vuser/vadmin/vchequedashboard');
			$content->bind('obj_user', $obj_user);
			$username = $obj_user->Firstname_c;
			$content->bind('whereclause',$whereclause);
			$content->bind('username', $username);
			$content->bind('type', $type);
			$urole = "data_manager";
			$breadcrumb = "Home>>";
            $this->template->breadcrumb = $breadcrumb;
			$this->template->content = $content;
			$this->template->user = $obj_user->Firstname_c;
			$this->template->urole = $urole;	
	}	
	public function action_search(){
				if($_POST){
					$type 	= 'all';
					$from 	= $_POST['from'];						
					$to	= $_POST['to'];
					$date 	= '';			
					$whereclause = '[chequeno_c,!=,0]';					
					
					if($from != '' && $to != ''){
								$whereclause 	= '[chequedate_c,<=,'.$to.'][chequedate_c,>=,'.$from.'][chequeno_c,!=,0]';
					}					
					$this->display($whereclause,$type);	
				}else{
					$errors['error'] = 'Could not search your query';
					$this->display($whereclause,$type);
				}
		}
		public function action_searchbydatependding(){
				if($_POST){				
					$type 	= 'pendding';
					$from 	= $_POST['from'];						
					$to	= $_POST['to'];
					$date 	= '';
					$whereclause = '[status_c,=,pendding]';	
					if($from != '' && $to != ''){
									$whereclause 	= '[chequedate_c,<=,'.$to.'][chequedate_c,>=,'.$from.'][status_c,=,pendding]';
					}
					$this->display($whereclause,$type);	
				}else{
					$errors['error'] = 'Could not search your query';
					$this->display($whereclause,$type);
				}
		}
		public function action_searchclear(){
				if($_POST){				
					$type 	= 'cleared';
					$from 	= $_POST['from'];						
					$to	= $_POST['to'];
					$date 	= '';
					$whereclause = '[status_c,=,cleared]';	
					if($from != '' && $to != ''){
									$whereclause 	= '[chequedate_c,<=,'.$to.'][chequedate_c,>=,'.$from.'][status_c,=,cleared]';
					}
					$this->display($whereclause,$type);	
				}else{
					$errors['error'] = 'Could not search your query';
					$this->display($whereclause,$type);
				}
		}
		public function action_searchnotclear(){
				if($_POST){
					$type 	= 'notcleared';
					$from 	= $_POST['from'];						
					$to	= $_POST['to'];
					$date 	= '';		
						$whereclause = '[status_c,=,notcleared]';	
					if($from != '' && $to != ''){
								$whereclause 	= '[chequedate_c,<=,'.$to.'][chequedate_c,>=,'.$from.'][status_c,=,notcleared]';
					}
					$this->display($whereclause,$type);	
				}else{
					$errors['error'] = 'Could not search your query';
					$this->display($whereclause,$type);
				}
		}
	public function action_export(){
		$errors = array();
		$messages = array();
			$whereclause = '[isexported,=,no]';
			if($_POST){
					
					$from 	= $_POST['from'];						
					$to	= $_POST['to'];
					$date 	= '';
					if($type == 'all'){
						$whereclause = '[chequeno_c,!=,0]';
					}else if($type == 'cancelled'){
						$whereclause = '[status_c,=,cancelled]';
					}else if($type == 'cleared'){
						$whereclause = '[status_c,=,cleared]';
					}else if($type == 'bounced'){
						$whereclause = '[status_c,=,bounced]';
					}
					if($from != '' && $to != ''){
							if($type == 'all'){
								$whereclause 	= '[chequedate_c,<=,'.$to.'][chequedate_c,>=,'.$from.'][chequeno_c,!=,0]';
							}else if($type == 'cancelled'){
								$whereclause 	= '[chequedate_c,<=,'.$to.'][chequedate_c,>=,'.$from.'][status_c,=,cancelled]';
							
							}else if($type == 'cleared'){
								$whereclause 	= '[chequedate_c,<=,'.$to.'][chequedate_c,>=,'.$from.'][status_c,=,cleared]';
							
							}else if($type == 'bounced'){
								$whereclause 	= '[chequedate_c,<=,'.$to.'][chequedate_c,>=,'.$from.'][status_c,=,bounced]';
							
							}					
					}				
			
			$table = "ayushchqdd";
			$columns = "chequedate_c,chequeno_c,bankname_c,amount_c,status_c,branchname_c";
			$groupby = '';
			$sidx = 'chequedate_c'; 
			$sord = 'desc'; 		
			$jqgriddata=new Model_xjqgridgetdata;
			$result=$jqgriddata->exportdata(1,0,$sidx,$sord,$table,$columns,$whereclause,$groupby);
			$date = date_create();
			$i = 0;
			
			if($_POST['exportto'] == 'excel'){
				export::toexcel($result,'ayushchqdd_'.date_timestamp_get($date).'.xls');
			}
		}else{
			$errors['error'] = 'Could not export data to excel';
		}
	}
	
} // End Welcome

<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/export.php');
include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');

class Controller_Cinvoicesales extends Controller_Ctemplatewithmenu  {
	public function action_view()
	{
		$obj_user = Auth::instance()->get_user();
		$id = $obj_user->id;
		$searchstat = 'all';
		$whereclause = '[status,!=,""][csruserid,!=,'.$searchstat.']';
		$this->display($whereclause,$searchstat);				
	}
	private function display($whereclause,$searchstat){	
			
			$obj_user = Auth::instance()->get_user();
			$content = View::factory('vuser/vadmin/vinvoicesalesdashboard');
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
	public function action_searchbydateall(){
		$errors = array();
		$messages = array();
		$searchstat = 'all';
		$obj_user = Auth::instance()->get_user();
		$id = $obj_user->id;
		$whereclause = '[status,!=,""][csruserid,=,'.$id.']';	
		
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
			$invoiceno 	= $_POST['invno'];	
			$name = $_POST['Name'];
			$type = $_POST['userselect'];
				if($from != '' && $to != '' && $invoiceno != '' && $name != '' && $type != 'select'){	
						$invoiceno = '%'.$invoiceno.'%';
						$name = '%'.$name.'%';
						if($type == 'Consumer'){	
							$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][type,=,'.$type.'][spname,like,'.$name.'][csruserid,=,'.$id.'][status,!=,""][invoiceid,like,'.$invoiceno .']';
						}else{
							$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][type,!=,Consumer][spname,like,'.$name.'][csruserid,=,'.$id.'][status,!=,""][invoiceid,like,'.$invoiceno .']';
						}
				}else if($from != '' && $to != ''){
					$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,!=,""][csruserid,=,'.$id.']';
				}else if($from != ''){				
						$whereclause 	= '[sortdate,>=,'.$from.'][status,!=,""][csruserid,=,'.$id.']';
				}else if($invoiceno != ''){
						$invoiceno = '%'.$invoiceno.'%';
						$whereclause 	= '[status,!=,""][invoiceid,like,'.$invoiceno .'][csruserid,=,'.$id.']';
				}else if($type != 'select' && $name != ''){
					$name = '%'.$name.'%';
							if($type == 'Consumer'){
								$whereclause 	= '[type,=,'.$type.'][spname,like,'.$name.'][status,!=,""][csruserid,=,'.$id.']';	
							}else{
								$whereclause 	= '[type,!=,Consumer][spname,like,'.$name.'][status,!=,""][csruserid,=,'.$id.']';	
							}							
				}else if($name != ''){
						$name = '%'.$name.'%';
							$whereclause 	= '[spname,like,'.$name.'][status,!=,""][csruserid,=,'.$id.']';											
				}else if($type != 'select'){
							if($type == 'Consumer'){
								$whereclause 	= '[type,=,'.$type.'][status,!=,""][csruserid,=,'.$id.']';	
							}else{
								$whereclause 	= '[type,!=,Consumer][status,!=,""][csruserid,=,'.$id.']';	
							}							
				}  			
			$this->display($whereclause,$searchstat);	
		}else{
			$errors['error'] = 'Could not search your query';
		}
		$this->display($whereclause,$searchstat);	
	}
	public function action_searchgenerated(){   
		$searchstat = 'Generated';
		$obj_user = Auth::instance()->get_user();
		$id = $obj_user->id;
		$whereclause = '[status,=,Generated][csruserid,=,'.$id.']';
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
			$invoiceno 	= $_POST['invno'];	
			$name = $_POST['Name'];
			$type = $_POST['userselect'];
				if($from != '' && $to != '' && $invoiceno != '' && $name != '' && $type != 'select'){	
						$invoiceno = '%'.$invoiceno.'%';
						$name = '%'.$name.'%';
						if($type == 'Consumer'){	
							$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][type,=,'.$type.'][spname,like,'.$name.'][csruserid,=,'.$id.'][status,=,Generated][invoiceid,like,'.$invoiceno .']';
						}else{
							$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][type,!=,Consumer][spname,like,'.$name.'][csruserid,=,'.$id.'][status,=,Generated][invoiceid,like,'.$invoiceno .']';
						}
				}else if($from != '' && $to != ''){
					$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Generated][csruserid,=,'.$id.']';
				}else if($from != ''){				
						$whereclause 	= '[sortdate,>=,'.$from.'][status,=,Generated][csruserid,=,'.$id.']';
				}else if($invoiceno != ''){
						$invoiceno = '%'.$invoiceno.'%';
						$whereclause 	= '[status,=,Generated][invoiceid,like,'.$invoiceno .'][csruserid,=,'.$id.']';
				}else if($type != 'select' && $name != ''){
					$name = '%'.$name.'%';
							if($type == 'Consumer'){
								$whereclause 	= '[type,=,'.$type.'][spname,like,'.$name.'][status,=,Generated][csruserid,=,'.$id.']';	
							}else{
								$whereclause 	= '[type,!=,Consumer][spname,like,'.$name.'][status,=,Generated][csruserid,=,'.$id.']';	
							}							
				}else if($name != ''){
						$name = '%'.$name.'%';
							$whereclause 	= '[spname,like,'.$name.'][status,=,Generated][csruserid,=,'.$id.']';											
				}else if($type != 'select'){
							if($type == 'Consumer'){
								$whereclause 	= '[type,=,'.$type.'][status,=,Generated][csruserid,=,'.$id.']';	
							}else{
								$whereclause 	= '[type,!=,Consumer][status,=,Generated][csruserid,=,'.$id.']';	
							}							
				}  			
			$this->display($whereclause,$searchstat);	
		}else{
			$errors['error'] = 'Could not search your query';
		}
		$this->display($whereclause,$searchstat);	
	}
	
	public function action_searchrejected(){
		$searchstat = 'Rejected';
		$obj_user = Auth::instance()->get_user();
		$id = $obj_user->id;
		$whereclause = '[status,=,Rejected][csruserid,=,'.$id.']';	
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
			$invoiceno 	= $_POST['invno'];
			$name = $_POST['Name'];
			$type = $_POST['userselect'];			
				
				if($from != '' && $to != '' && $invoiceno != '' && $name != '' && $type != 'select'){	
						$invoiceno = '%'.$invoiceno.'%';
						$name = '%'.$name.'%';
						if($type == 'Consumer'){	
							$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][type,=,'.$type.'][spname,like,'.$name.'][csruserid,=,'.$id.'][status,=,Rejected][invoiceid,like,'.$invoiceno .']';
						}else{
							$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][type,!=,Consumer][spname,like,'.$name.'][csruserid,=,'.$id.'][status,=,Rejected][invoiceid,like,'.$invoiceno .']';
						}
				}else if($from != '' && $to != '' && $invoiceno != ''){	
						$invoiceno = '%'.$invoiceno.'%';
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][csruserid,=,'.$id.'][status,=,Rejected][invoiceid,like,'.$invoiceno .']';
				}else if($from != '' && $to != ''){
					$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Rejected][csruserid,=,'.$id.']';
				}else if($from != ''){				
						$whereclause 	= '[sortdate,>=,'.$from.'][status,=,Rejected][csruserid,=,'.$id.']';
				}else if($invoiceno != ''){
						$invoiceno = '%'.$invoiceno.'%';
						$whereclause 	= '[status,=,Rejected][invoiceid,like,'.$invoiceno .'][csruserid,=,'.$id.']';
				}else if($type != 'select' && $name != ''){
					$name = '%'.$name.'%';
							if($type == 'Consumer'){
								$whereclause 	= '[type,=,'.$type.'][spname,like,'.$name.'][status,=,Rejected][csruserid,=,'.$id.']';	
							}else{
								$whereclause 	= '[type,!=,Consumer][spname,like,'.$name.'][status,=,Rejected][csruserid,=,'.$id.']';	
							}							
				}else if($name != ''){
						$name = '%'.$name.'%';
							$whereclause 	= '[spname,like,'.$name.'][status,=,Rejected][csruserid,=,'.$id.']';											
				}else if($type != 'select'){
							if($type == 'Consumer'){
								$whereclause 	= '[type,=,'.$type.'][status,=,Rejected][csruserid,=,'.$id.']';	
							}else{
								$whereclause 	= '[type,!=,Consumer][status,=,Rejected][csruserid,=,'.$id.']';	
							}							
				} 	
					
			$this->display($whereclause,$searchstat);	
		}else{
			$errors['error'] = 'Could not search your query';
		}
		$this->display($whereclause,$searchstat);	
	}
	public function action_cancelinvoice()
	{						
			$objAccounts=ORM::factory('invoice')->where('invoiceid_c','=',$_GET['invoiceid'])->find();
						$objAccounts->status_c 	= 'Rejected';
						$objAccounts->reasonforcancel_c 	= $_GET['reasonforcancel'];
						$objAccounts->dateofcancel_c = date("d M Y");
						$objAccounts->update();
			
			$data = array();
			$data['message'] = 'success';
			die(json_encode($data));
	}
	public function action_exportall()
	{
		$errors = array();
		$messages = array();
		$obj_user = Auth::instance()->get_user();		
		
		//$whereclause = '[status,!=,""][csruserid,!=,'.$searchstat.']';
		$whereclause = '[status,!=,""][csruserid,=,'.$obj_user->id.']';
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
			$invoiceno 	= $_POST['invno'];			
				if($from != '' && $to != '' && $invoiceno != ''){	
						$invoiceno = '%'.$invoiceno.'%';
						//$whereclause 	= '[sortdate,>=,'.$from.'][csruserid,!=,'.$searchstat.'][sortdate,<=,'.$to.'][status,!=,""][invoiceid,like,'.$invoiceno .']';
						$whereclause 	= '[sortdate,>=,'.$from.'][csruserid,=,'.$obj_user->id.'][sortdate,<=,'.$to.'][status,!=,""][invoiceid,like,'.$invoiceno .']';
				}else if($from != '' && $to != ''){
					//$whereclause 	= '[sortdate,>=,'.$from.'][csruserid,!=,'.$searchstat.'][sortdate,<=,'.$to.'][status,!=,""]';
					$whereclause 	= '[sortdate,>=,'.$from.'][csruserid,=,'.$obj_user->id.'][sortdate,<=,'.$to.'][status,!=,""]';
				}else if($from != ''){				
					//	$whereclause 	= '[sortdate,>=,'.$from.'][csruserid,!=,'.$searchstat.'][status,!=,""]';
						$whereclause 	= '[sortdate,>=,'.$from.'][csruserid,=,'.$obj_user->id.'][status,!=,""]';
				}else if($invoiceno != ''){
						$invoiceno = '%'.$invoiceno.'%';
					//	$whereclause 	= '[status,!=,""][csruserid,!=,'.$searchstat.'][invoiceid,like,'.$invoiceno .']';
						$whereclause 	= '[status,!=,""][csruserid,!=,'.$obj_user->id.'][invoiceid,like,'.$invoiceno .']';
				} 
			
			$table = "allinvoice";
			$columns = "invoiceid,invoicedate,spname,csrname,status,spuserid,totalnetamt";
			$groupby = '';
			$sidx = 'sortdate'; 
			$sord = 'desc'; 		
			$jqgriddata=new Model_xjqgridgetdata;
			$result=$jqgriddata->exportdata(1,0,$sidx,$sord,$table,$columns,$whereclause,$groupby);
			$date = date_create();
			$i = 0;
			
			if($_POST['exportto'] == 'excel'){
				export::toexcel($result,'ayushinvoices_'.date_timestamp_get($date).'.xls');
			}
		}else{
			$errors['error'] = 'Could not export data to excel';
		}
	}
	public function action_exportgenerated()
	{
		$errors = array();
		$messages = array();
		$obj_user = Auth::instance()->get_user();		
		$whereclause = '[status,=,Generated][csruserid,=,'.$obj_user->id.']';
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
			$invoiceno 	= $_POST['invno'];			
				if($from != '' && $to != '' && $invoiceno != ''){	
						$invoiceno = '%'.$invoiceno.'%';
						$whereclause 	= '[sortdate,>=,'.$from.'][csruserid,=,'.$obj_user->id.'][sortdate,<=,'.$to.'][status,=,Generated][invoiceid,like,'.$invoiceno .']';
				}else if($from != '' && $to != ''){
					$whereclause 	= '[sortdate,>=,'.$from.'][csruserid,=,'.$obj_user->id.'][sortdate,<=,'.$to.'][status,=,Generated]';
				}else if($from != ''){				
						$whereclause 	= '[sortdate,>=,'.$from.'][csruserid,=,'.$obj_user->id.'][status,=,Generated]';
				}else if($invoiceno != ''){
						$invoiceno = '%'.$invoiceno.'%';
						$whereclause 	= '[status,=,Generated][csruserid,=,'.$obj_user->id.'][invoiceid,like,'.$invoiceno .']';
				}
			
			$table = "allinvoice";
			$columns = "invoiceid,invoicedate,spname,csrname,status,spuserid,totalnetamt";
			$groupby = '';
			$sidx = 'sortdate'; 
			$sord = 'desc'; 		
			$jqgriddata=new Model_xjqgridgetdata;
			$result=$jqgriddata->exportdata(1,0,$sidx,$sord,$table,$columns,$whereclause,$groupby);
			$date = date_create();
			$i = 0;
			
			if($_POST['exportto'] == 'excel'){
				export::toexcel($result,'ayushinvoices_'.date_timestamp_get($date).'.xls');
			}
		}else{
			$errors['error'] = 'Could not export data to excel';
		}
	}
	public function action_exportrejected()
	{
		$errors = array();
		$messages = array();
		$obj_user = Auth::instance()->get_user();		
		$whereclause = '[status,=,Rejected][csruserid,=,'.$obj_user->id.']';
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
			$invoiceno 	= $_POST['invno'];			
				if($from != '' && $to != '' && $invoiceno != ''){	
						$invoiceno = '%'.$invoiceno.'%';
						$whereclause 	= '[sortdate,>=,'.$from.'][csruserid,=,'.$obj_user->id.'][sortdate,<=,'.$to.'][status,=,Rejected][invoiceid,like,'.$invoiceno .']';
				}else if($from != '' && $to != ''){
					$whereclause 	= '[sortdate,>=,'.$from.'][csruserid,=,'.$obj_user->id.'][sortdate,<=,'.$to.'][status,=,Rejected]';
				}else if($from != ''){				
						$whereclause 	= '[sortdate,>=,'.$from.'][csruserid,=,'.$obj_user->id.'][status,=,Rejected]';
				}else if($invoiceno != ''){
						$invoiceno = '%'.$invoiceno.'%';
						$whereclause 	= '[status,=,Rejected][csruserid,=,'.$obj_user->id.'][invoiceid,like,'.$invoiceno .']';
				}
			
			$table = "allinvoice";
			$columns = "invoiceid,invoicedate,spname,csrname,status,spuserid,totalnetamt";
			$groupby = '';
			$sidx = 'sortdate'; 
			$sord = 'desc'; 		
			$jqgriddata=new Model_xjqgridgetdata;
			$result=$jqgriddata->exportdata(1,0,$sidx,$sord,$table,$columns,$whereclause,$groupby);
			$date = date_create();
			$i = 0;
			
			if($_POST['exportto'] == 'excel'){
				export::toexcel($result,'ayushinvoices_'.date_timestamp_get($date).'.xls');
			}
		}else{
			$errors['error'] = 'Could not export data to excel';
		}
	}
}
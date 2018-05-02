<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/export.php');
include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');

class Controller_Cinvoiceacc extends Controller_Ctemplatewithmenu  {
	public function action_view()
	{
		$searchstat = 'all';
		$whereclause = '[status,!=,""]';
		$this->display($whereclause,$searchstat);				
	}
	private function display($whereclause,$searchstat){	
			
			$obj_user = Auth::instance()->get_user();
			$content = View::factory('vuser/vadmin/vinvoiceaccountdashboard');
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
		$whereclause = '[status,!=,""]';	
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
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,!=,""][invoiceid,like,'.$invoiceno .']';
				}else if($from != '' && $to != ''){
					$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,!=,""]';
				}else if($from != ''){				
						$whereclause 	= '[sortdate,>=,'.$from.'][status,!=,""]';
				}else if($invoiceno != ''){
						$invoiceno = '%'.$invoiceno.'%';
						$whereclause 	= '[status,!=,""][invoiceid,like,'.$invoiceno .']';
				} 			
			$this->display($whereclause,$searchstat);	
		}else{
			$errors['error'] = 'Could not search your query';
		}
		$this->display($whereclause,$searchstat);	
	}
	public function action_searchgenerated(){   
		$searchstat = 'Generated';
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
			$invoiceno 	= $_POST['invno'];			
				if($from != '' && $to != '' && $invoiceno != ''){	
						$invoiceno = '%'.$invoiceno.'%';
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Generated][invoiceid,like,'.$invoiceno .']';
				}else if($from != '' && $to != ''){
					$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Generated]';
				}else if($from != ''){				
						$whereclause 	= '[sortdate,>=,'.$from.'][status,=,Generated]';
				}else if($invoiceno != ''){
						$invoiceno = '%'.$invoiceno.'%';
						$whereclause 	= '[status,=,Generated][invoiceid,like,'.$invoiceno .']';
				} 			
			$this->display($whereclause,$searchstat);	
		}else{
			$errors['error'] = 'Could not search your query';
		}
		$this->display($whereclause,$searchstat);	
	}
	
	public function action_searchrejected(){
		$searchstat = 'Rejected';
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
			$invoiceno 	= $_POST['invno'];			
				if($from != '' && $to != '' && $invoiceno != ''){	
						$invoiceno = '%'.$invoiceno.'%';
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Rejected][invoiceid,like,'.$invoiceno .']';
				}else if($from != '' && $to != ''){
					$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Rejected]';
				}else if($from != ''){				
						$whereclause 	= '[sortdate,>=,'.$from.'][status,=,Rejected]';
				}else if($invoiceno != ''){
						$invoiceno = '%'.$invoiceno.'%';
						$whereclause 	= '[status,=,Rejected][invoiceid,like,'.$invoiceno .']';
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
		$whereclause = '[status,!=,""]';
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
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,!=,""][invoiceid,like,'.$invoiceno .']';
				}else if($from != '' && $to != ''){
					$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,!=,""]';
				}else if($from != ''){				
						$whereclause 	= '[sortdate,>=,'.$from.'][status,!=,""]';
				}else if($invoiceno != ''){
						$invoiceno = '%'.$invoiceno.'%';
						$whereclause 	= '[status,!=,""][invoiceid,like,'.$invoiceno .']';
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
			$invoiceno 	= $_POST['invno'];			
				if($from != '' && $to != '' && $invoiceno != ''){	
						$invoiceno = '%'.$invoiceno.'%';
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Generated][invoiceid,like,'.$invoiceno .']';
				}else if($from != '' && $to != ''){
					$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Generated]';
				}else if($from != ''){				
						$whereclause 	= '[sortdate,>=,'.$from.'][status,=,Generated]';
				}else if($invoiceno != ''){
						$invoiceno = '%'.$invoiceno.'%';
						$whereclause 	= '[status,=,Generated][invoiceid,like,'.$invoiceno .']';
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
			$invoiceno 	= $_POST['invno'];			
				if($from != '' && $to != '' && $invoiceno != ''){	
						$invoiceno = '%'.$invoiceno.'%';
						$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Rejected][invoiceid,like,'.$invoiceno .']';
				}else if($from != '' && $to != ''){
					$whereclause 	= '[sortdate,>=,'.$from.'][sortdate,<=,'.$to.'][status,=,Rejected]';
				}else if($from != ''){				
						$whereclause 	= '[sortdate,>=,'.$from.'][status,=,Rejected]';
				}else if($invoiceno != ''){
						$invoiceno = '%'.$invoiceno.'%';
						$whereclause 	= '[status,=,Rejected][invoiceid,like,'.$invoiceno .']';
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
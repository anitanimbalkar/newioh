<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/export.php');

class Controller_Cexportingtransactions extends Controller_Ctemplatewithmenu  {
	public function action_view()
	{
		$errors = array();
		$messages = array();
		$whereclause = '[isexported,=,no]';
		$this->display($errors,$messages,$whereclause);
	}
	private function display($errors, $messages,$whereclause)
	{
		try{
			$content = View::factory('vuser/vaccountant/vexportingtransactions');
			$content->bind('errors', $errors);
			$content->bind('messages', $messages);
			$content->bind('whereclause',$whereclause);
			$this->template->content = $content;
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
	public function action_search(){
		$errors = array();
		$messages = array();
		$whereclause = '[isexported,=,no]';
		if($_POST){
			$search = $_POST['search'];
			$type 	= $_POST['type'];
			$from 	= $_POST['from'];
			$to	= $_POST['to'];
			$date 	= '';
			if($type == 'All'){
				$whereclause = '';
			}
			if($type == 'New'){
				$whereclause = '[isexported,=,no]';
			}
			if($type == 'AllBetween'){
				$whereclause 	= '[timestamp,<,'.strtotime($to. "+1 days").'][timestamp,>,'.strtotime($from).']';
				
			}	
			if($search != ''){
				$whereclause = '[AccountCode,like,%'.$search.'%]'.$whereclause.'(or)[Name,=,%'.$search.'%]'.$whereclause.'(or)[TransactionId,like,%'.$search.'%]'.$whereclause.'(or)[Reason,like,%'.$search.'%]'.$whereclause.'(or)[Credit,like,%'.$search.'%]'.$whereclause.'(or)[Debit,like,%'.$search.'%]'.$whereclause;
			}
			$this->display($errors,$messages,$whereclause);	
		}else{
			$errors['error'] = 'Could not search your query';
			$this->display($errors,$messages,$whereclause);
		}
	}
	public function action_export()
	{
		$errors = array();
		$messages = array();
		$whereclause = '[isexported,=,no]';
		if($_POST){
			$search = $_POST['search'];
			$type 	= $_POST['type'];
			$from 	= $_POST['from'];
			$to	= $_POST['to'];
			$date 	= '';
			if($type == 'All'){
				$whereclause = '';
			}
			if($type == 'New'){
				$whereclause = '[isexported,=,no]';
			}
			if($type == 'AllBetween'){
				$whereclause 	= '[timestamp,<,'.strtotime($to. "+1 days").'][timestamp,>,'.strtotime($from).']';
				
			}	
			if($search != ''){
				$whereclause = '[AccountCode,like,%'.$search.'%]'.$whereclause.'(or)[Name,=,%'.$search.'%]'.$whereclause.'(or)[TransactionId,like,%'.$search.'%]'.$whereclause.'(or)[Reason,like,%'.$search.'%]'.$whereclause.'(or)[Credit,like,%'.$search.'%]'.$whereclause.'(or)[Debit,like,%'.$search.'%]'.$whereclause;
			}
			$table = "exporttransaction";
			$columns = "AccountCode,Name,IOHId,TransactionId,PlanId,FromAccount,ToAccount,Credit,Debit,ServiceTax,Reason,Date,isexported";
			$groupby = '';
			$sidx = 'Name'; 
			$sord = 'desc'; 		
			$jqgriddata=new Model_xjqgridgetdata;
			$result=$jqgriddata->exportdata(1,0,$sidx,$sord,$table,$columns,$whereclause,$groupby);
			$date = date_create();

			if($_POST['exportto'] == 'excel'){
				export::toexcel($result,'Transactions_'.date_timestamp_get($date).'.xls');
			}else{
				if($type == 'New'){
					DB::update(ORM::factory('billingstatement')->table_name())
					->set(array('isexported_c' => 'yes'))
					->where('isexported_c', '=', 'no')
					->execute();
				}
				$messages['message'] = 'Exported all records into xml. Please check your download folder';
				export::toxmlfortally($result,'Transactions_'.date_timestamp_get($date).'.xml');
			}
		}else{
			$errors['error'] = 'Could not export data to excel';
			$this->display($errors,$messages,$whereclause);
		}
	}
}

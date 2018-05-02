<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/export.php');

class Controller_Cexportingregistrations extends Controller_Ctemplatewithmenu  {
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
			$content = View::factory('vuser/vaccountant/vexportingregistrations');
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
				$whereclause 	= '[registeredon,<,'.strtotime($to. "+1 days").'][registeredon,>,'.strtotime($from).']';
				
			}	
			if($search != ''){
				$whereclause = '[iohid,like,%'.$search.'%]'.$whereclause.'(or)[Name,=,%'.$search.'%]'.$whereclause.'(or)[EmailID,like,%'.$search.'%]'.$whereclause.'(or)[MobileNumber,like,%'.$search.'%]'.$whereclause.'(or)[Telephone,like,%'.$search.'%]'.$whereclause.'(or)[accountcode,like,%'.$search.'%]'.$whereclause;
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
				$whereclause 	= '[registeredon,<,'.strtotime($to. "+1 days").'][registeredon,>,'.strtotime($from).']';
			}	
			if($search != ''){
				$whereclause = '[iohid,like,%'.$search.'%]'.$whereclause.'(or)[Name,=,%'.$search.'%]'.$whereclause.'(or)[EmailID,like,%'.$search.'%]'.$whereclause.'(or)[MobileNumber,like,%'.$search.'%]'.$whereclause.'(or)[Telephone,like,%'.$search.'%]'.$whereclause.'(or)[accountcode,like,%'.$search.'%]'.$whereclause;
			}
			$table = "newregistration";
			$columns = "iohid,Name,accountcode,EmailID,MobileNumber,Telephone,Address,PAN,ServiceTaxRegistrationNumber,VATorTIN,RegistrationDate";
			$groupby = '';
			$sidx = 'Name'; 
			$sord = 'desc'; 		
			$jqgriddata=new Model_xjqgridgetdata;
			$result=$jqgriddata->exportdata(1,0,$sidx,$sord,$table,$columns,$whereclause,$groupby);
			$date = date_create();
			$i = 0;
			
			if($_POST['exportto'] == 'excel'){
				export::toexcel($result,'NewRegistrations_'.date_timestamp_get($date).'.xls');
			}else{
				if($type == 'New'){
					DB::update(ORM::factory('user')->table_name())
					->set(array('isexportedtoaccountingsystem' => 'yes'))
					->where('isexportedtoaccountingsystem', '=', 'no')
					->execute();
				}
				export::toxmlregfortally($result,'NewRegistrations_'.date_timestamp_get($date).'.xml');
			}
		}else{
			$errors['error'] = 'Could not export data to excel';
			$this->display($errors,$messages,$whereclause);
		}
	}
}

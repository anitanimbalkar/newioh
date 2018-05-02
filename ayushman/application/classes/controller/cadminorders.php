<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/export.php');

class Controller_Cadminorders extends Controller_Ctemplatewithmenu  {
	public function action_diagnostic(){
		$errors = array();
		$messages = array();
		$whereclause = '[status:"requested"][where: and 1]';
		$this->display($errors,$messages,$whereclause);
	}
	private function display($errors, $messages,$whereclause){
		try{
			$content = View::factory('vuser/vadmin/vpathologistorders');
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
			$lab 	= $_POST['lab'];
			$from 	= $_POST['from'];
			$to	= $_POST['to'];
			$date 	= '';
			if($type == 'accepted'){
				$whereclause = '[status:"accepted"]';
			}
			if($type == 'requested'){
				$whereclause = '[status:"requested"]';
			}
			if($type == 'reportsuploaded'){
				$whereclause = '[status:"reportsuploaded"]';
			}
			if($type == 'rejected'){
				$whereclause = '[status:"rejected"]';
			}
		
			if($lab != ''){
				$lab = ' and `diagnosticlabsorders`.`refdiaglabsorderspathologistsid_c` = '.$lab;
				$whereclause =$whereclause.'[where:'.$lab.']';
				
			}else{
				$whereclause =$whereclause.'[where: and 1 ]';
			}

			$this->display($errors,$messages,$whereclause);	
		}else{
			$errors['error'] = 'Could not search your query';
			$this->display($errors,$messages,$whereclause);
		}
	}
	public function action_export(){
		$errors = array();
		$messages = array();
		$whereclause = '[isexported,=,no]';
		if($_POST){
			$search = $_POST['search'];
			$type 	= $_POST['type'];
			$lab 	= $_POST['lab'];
			$from 	= $_POST['from'];
			$to	= $_POST['to'];
			$date 	= '';
			if($type == 'accepted'){
				$whereclause = '[status:"accepted"]';
			}
			if($type == 'requested'){
				$whereclause = '[status:"requested"]';
			}
			if($type == 'reportsuploaded'){
				$whereclause = '[status:"reportsuploaded"]';
			}
			if($type == 'rejected'){
				$whereclause = '[status:"rejected"]';
			}
			
			if($lab != ''){
				$lab = ' and `diagnosticlabsorders`.`refdiaglabsorderspathologistsid_c` = '.$lab;
				$whereclause =$whereclause.'[where:'.$lab.']';
				
			}else{
				$whereclause =$whereclause.'[where: and 1 ]';
			}
			$table = "adminpathologisttest";
			$columns = "date,lab,DoctorName,patientuserid,patientname,patientmobilenumber,requisitionno,tests,status";
			$groupby = '';
			$sidx = 'requisitionno'; 
			$sord = 'desc'; 		
			
			$class=$table;
			$class = new helper_datagenerator(0,0,$sidx,$sord,$class,$columns,$whereclause,$groupby,$whereclause);
			$result = $class->exportdata();
			
			//var_dump($result);die;
			$date = date_create();
			
			if($_POST['exportto'] == 'excel'){
				export::toexcel($result,'DiagnosticOrders_'.date_timestamp_get($date).'.xls');
			}
		}else{
			$errors['error'] = 'Could not export data to excel';
			$this->display($errors,$messages,$whereclause);
		}
	}
	
	public function action_chemist(){
		$errors = array();
		$messages = array();
		$whereclause = '[status,=,requested]';
		$this->displaychemist($errors,$messages,$whereclause);
	}
	private function displaychemist($errors, $messages,$whereclause){
		try{
			$content = View::factory('vuser/vadmin/vchemistorders');
			$content->bind('errors', $errors);
			$content->bind('messages', $messages);
			$content->bind('whereclause',$whereclause);
			$this->template->content = $content;
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
	public function action_searchchemistorders(){
		$errors = array();
		$messages = array();
		$whereclause = '';
		if($_POST){
			$search = $_POST['search'];
			$type 	= $_POST['type'];
			$chem 	= $_POST['chem'];
			$from 	= $_POST['from'];
			$to	= $_POST['to'];
			$date 	= '';
			if($type == 'accepted'){
				$whereclause = '[status,=,accepted]';
			}
			if($type == 'requested'){
				$whereclause = '[status,=,requested]';
			}
			if($type == 'completed'){
				$whereclause = '[status,=,completed]';
			}
			if($type == 'rejected'){
				$whereclause = '[status,=,rejected]';
			}
			
			if($chem != ''){
				$whereclause = $whereclause.'[chemistid,=,'.$chem.']';
			}
		
			$this->displaychemist($errors,$messages,$whereclause);	
		}else{
			$errors['error'] = 'Could not search your query';
			$whereclause = '[status,=,requested]';
			$this->displaychemist($errors,$messages,$whereclause);
		}
	}
	public function action_exportchemistorders(){
		$errors = array();
		$messages = array();
		$whereclause = '';
		if($_POST){
			$search = $_POST['search'];
			$type 	= $_POST['type'];
			$chem 	= $_POST['chem'];
			$from 	= $_POST['from'];
			$to	= $_POST['to'];
			$date 	= '';
			if($type == 'accepted'){
				$whereclause = '[status,=,accepted]';
			}
			if($type == 'requested'){
				$whereclause = '[status,=,requested]';
			}
			if($type == 'completed'){
				$whereclause = '[status,=,completed]';
			}
			if($type == 'rejected'){
				$whereclause = '[status,=,rejected]';
			}
			
			if($chem != ''){
				$whereclause = $whereclause.'[chemistid,=,'.$chem.']';
			}
			$table = "adminmedicineorder";
			$columns = "date,chemistname,doctorname,patientname,patientmobilenumber,refchemistordersid,prescriptionorder,status";
			$groupby = '';
			$sidx = 'refchemistordersid'; 
			$sord = 'desc'; 		
			
			$class=$table;
			
			$jqgriddata=new Model_xjqgridgetdata;
			$result=$jqgriddata->exportdata(1,0,$sidx,$sord,$table,$columns,$whereclause,$groupby);
			
			$result[0][0] = "Order Date";
			$result[0][1] = "Medical Name";
			$result[0][2] = "Doctor Name";
			$result[0][3] = "Patient Name";
			$result[0][4] = "Patient Mobile No.";
			$result[0][5] = "Order Id";
			$result[0][6] = "Medicines";
			$result[0][7] = "Status";
			
			$date = date_create();
			
			if($_POST['exportto'] == 'excel'){
				export::toexcel($result,'ChemistOrders_'.date_timestamp_get($date).'.xls');
			}
			$this->displaychemist($errors,$messages,$whereclause);	
		}else{
			$errors['error'] = 'Could not search your query';
			$whereclause = '[status,=,requested]';
			$this->displaychemist($errors,$messages,$whereclause);
		}
	}
	
}

<?php defined('SYSPATH') or die('No direct script access.') ;
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/export.php');
class Controller_Cdoctorwiseregistrations extends Controller_Ctemplatewithmenu  {
	public function action_view(){
		$errors = array();
		$messages= array();

		$whereclause = '';
		$_POST['durationtype'] = 'lastmonth';
		$this->display($errors,$messages,$whereclause);
	}
	
	private function display($errors, $messages,$whereclause){

		if (isset ($_POST['durationtype']))
		$durationtype= $_POST['durationtype'];
		else
		if($durationtype='')
		{
			$duration['to'] ='';
			$duration['from'] ='';
		}
		if($durationtype == 'lastmonth'){
				$duration['to'] = strtotime(date('Y-m-d'). "+1 days");
				$duration['from'] = strtotime(date('Y-m-d'). "-1 months");
			}
			if($durationtype == 'last2month'){
				$duration['to'] = strtotime(date('Y-m-d'). "+1 days");
				$duration['from'] = strtotime(date('Y-m-d'). "-2 months");
			}
			if($durationtype == 'last3month'){
				$duration['to'] = strtotime(date('Y-m-d'). "+1 days");
				$duration['from'] = strtotime(date('Y-m-d'). "-3 months");
			}
			if($durationtype == 'lastyear'){
				$duration['to'] = strtotime(date('Y-m-d'). "+1 days");
				$duration['from'] = strtotime(date('Y-m-d'). "-1 year");
				
			}
			if($durationtype == 'custom'){
				//$type 	= $_POST['type'];
			$from 	= $_POST['from'];
			$to	= $_POST['to'];
			
				$duration['to'] = strtotime($to. "+1 days");
				$duration['from'] = strtotime($from);
				
			}
		$content = View::factory('vuser/vadmin/vdoctorwiseregistrations');
	
		if($durationtype !='')
			$whereclause=$whereclause."[date, >= ,".date('Y-m-d',$duration['from'])."][date, <= ,".date('Y-m-d',$duration['to'])."]";
		
		if(isset($_POST['doctorid']) && $_POST['doctorid'] != ''){
			$whereclause=$whereclause.'[doctorid, = ,'.$_POST['doctorid'].']';
		}
		
		$content->bind('errors',$errors);
		$content->bind('messages',$messages);
		$content->bind('whereclause',$whereclause);
		$this->template->content = $content;
	}
	
	public function action_search(){
		
		$errors = array();
		$messages = array();
		$whereclause = '';
		if($_POST){
			$this->display($errors,$messages,$whereclause);	
		}else{
			$errors['error'] = 'Could not search your query';
			$this->display($errors,$messages,$whereclause);
		}
	}
	
	public function action_export(){
		
		$errors = array();
		$messages = array();
		$whereclause = '';
		if($_POST){
			$duration = array();
			$duration['to'] ='';
			$duration['from'] ='';
			
			if (isset ($_POST['durationtype'])){
				$durationtype= $_POST['durationtype'];
			}else{
				$durationtype = '';				
			}
			
			if($durationtype == 'lastmonth'){
				$duration['to'] = strtotime(date('Y-m-d'). "+1 days");
				$duration['from'] = strtotime(date('Y-m-d'). "-1 months");
			}
			if($durationtype == 'last2month'){
				$duration['to'] = strtotime(date('Y-m-d'). "+1 days");
				$duration['from'] = strtotime(date('Y-m-d'). "-2 months");
			}
			if($durationtype == 'last3month'){
				$duration['to'] = strtotime(date('Y-m-d'). "+1 days");
				$duration['from'] = strtotime(date('Y-m-d'). "-3 months");
			}
			if($durationtype == 'lastyear'){
				$duration['to'] = strtotime(date('Y-m-d'). "+1 days");
				$duration['from'] = strtotime(date('Y-m-d'). "-1 year");
				
			}
			if($durationtype == 'custom'){
				//$type 	= $_POST['type'];
				$from 	= $_POST['from'];
				$to	= $_POST['to'];
			
				$duration['to'] = strtotime($to. "+1 days");
				$duration['from'] = strtotime($from);
				
			}
			$date 	= '';
			
			if($durationtype !='')
				$whereclause=$whereclause."[date, >= ,".date('Y-m-d',$duration['from'])."][date, <= ,".date('Y-m-d',$duration['to'])."]";
			if(isset($_POST['doctorid']) && $_POST['doctorid'] != ''){
				$whereclause=$whereclause.'[doctorid, = ,'.$_POST['doctorid'].']';
			}
			$table = "doctorwiseregistration";
			$columns = "doctorname,RegisteredBy,registeredon,patientname,userid,chemistname,pathologistname";
			$groupby = '';
			$sidx = 'date'; 
			$sord = 'desc'; 		
			$jqgriddata=new Model_xjqgridgetdata;
			$result=$jqgriddata->exportdata(1,0,$sidx,$sord,$table,$columns,$whereclause,$groupby);
			
			$result[0][0]="Doctor Name";
			$result[0][1]="RegisteredBy";
			$result[0][2]="Registration Date";
			$result[0][3]="Patient Name";
			$result[0][4]="Patient IOH Id";
			$result[0][5]="Preferred Chemist Name";
			$result[0][6]="Preferred Pathologist Name";
			
			$date = date_create();
			$i = 0;
			
			if($_POST['exportto'] == 'excel'){
				export::toexcel($result,'DoctorwiseRegistrations_'.date_timestamp_get($date).'.xls');
			}
			$this->display($errors,$messages,$whereclause);	
		}else{
			$errors['error'] = 'Could not search your query';
			$this->display($errors,$messages,$whereclause);
		}
	}
	
}	

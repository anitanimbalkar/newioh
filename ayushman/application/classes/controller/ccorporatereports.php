<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/export.php');
class Controller_Ccorporatereports extends Controller_Ctemplatewithmenu{

	public function action_view()
	{
		$errors = array();
		$messages = array();
		$whereclause = '';
		$duration['to'] = strtotime(date('Y-m-d'). "+1 days");
		$duration['from'] = strtotime(date('Y-m-d'). "-1 months");
		$doctorid = 'All';
		$this->display($errors,$messages,$doctorid,$duration);
	}

	//Common function for displaying company profile page. $errors and $messages will be shown on page if it contains any data.
	private function display($errors, $messages,$doctorid,$duration)
	{
		try{
			$content 	= View::factory('vuser/vcorporate/vreport');
			$numbers = $this->getAllNumbers($duration,$doctorid);
			$content->bind('errors', $errors);
			$content->bind('messages', $messages);
			$content->bind('duration', $duration);
			$content->bind('numbers', $numbers);
			$content->bind('whereclause', $whereclause);
			$this->template->content = $content;
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
	
	public function action_search(){
		$errors = array();
		$messages = array();
		$whereclause = '';
		if($_POST){
			$search = $_POST['search'];
			$type 	= $_POST['type'];
			$from 	= $_POST['from'];
			$to	= $_POST['to'];
			$doctorid = $_POST['doctorname'];
			$date 	= '';
			if($type == 'lastmonth'){
				$duration['to'] = strtotime(date('Y-m-d'). "+1 days");
				$duration['from'] = strtotime(date('Y-m-d'). "-1 months");
			}
			if($type == 'last2months'){
				$duration['to'] = strtotime(date('Y-m-d'). "+1 days");
				$duration['from'] = strtotime(date('Y-m-d'). "-2 months");
			}
			if($type == 'last3months'){
				$duration['to'] = strtotime(date('Y-m-d'). "+1 days");
				$duration['from'] = strtotime(date('Y-m-d'). "-3 months");
			}
			if($type == 'lastyear'){
				$duration['to'] = strtotime(date('Y-m-d'). "+1 days");
				$duration['from'] = strtotime(date('Y-m-d'). "-1 year");
				
			}
			if($type == 'AllBetween'){
				$duration['to'] = strtotime($to. "+1 days");
				$duration['from'] = strtotime($from);
				
			}	
			$this->display($errors,$messages,$doctorid,$duration);	
		}else{
			$duration['to'] = strtotime(date('Y-m-d'). "+1 days");
			$duration['from'] = strtotime(date('Y-m-d'). "-1 months");
			$doctorid = 'All';
			$errors['error'] = 'Could not export to PDF';
			$this->display($errors,$messages,$doctorid,$duration);
		}
	}

	public function action_export()
	{
		$errors = array();
		$messages = array();
		$whereclause = '';
		if($_POST){
			$search = $_POST['search'];
			$type 	= $_POST['type'];
			$from 	= $_POST['from'];
			$to		= $_POST['to'];
			$doctorid = $_POST['doctorname'];
			$date 	= '';
			if($type == 'lastmonth'){
				$duration['to'] = strtotime(date('Y-m-d'). "+1 days");
				$duration['from'] = strtotime(date('Y-m-d'). "-1 months");
				
			}
			if($type == 'last2months'){
				$duration['to'] = strtotime(date('Y-m-d'). "+1 days");
				$duration['from'] = strtotime(date('Y-m-d'). "-2 months");
				
			}
			if($type == 'last3months'){
				$duration['to'] = strtotime(date('Y-m-d'). "+1 days");
				$duration['from'] = strtotime(date('Y-m-d'). "-3 months");
			}
			if($type == 'lastyear'){
				$duration['to'] = strtotime(date('Y-m-d'). "+1 days");
				$duration['from'] = strtotime(date('Y-m-d'). "-1 year");

			}
			if($type == 'AllBetween'){
				$duration['to'] = strtotime($to. "+1 days");
				$duration['from'] = strtotime($from);
			}	
			$from = date('d/m/Y', $duration['from']);
			$to = date('d/m/Y', $duration['to']);
			
			$numbers = $this->getAllNumbers($duration,$doctorid);
			
			$objCorporate = ORM::factory('corporate')->where('refusersid_c','=',Auth::instance()->get_user()->id)->find();
			
			$objaddress =  ORM::factory('Address')->where("id","=",$objCorporate->refaddressid_c )->find();
			
			
			$data = array();
			$data['lblcorporatename'] = $objCorporate->corporatename_c;
			$data['lbladdress'] = $objaddress->line1_c.", ".$objaddress->nearlandmark_c.", ".$objaddress->location_c.",<br> ".$objaddress->city_c." - ".$objaddress->pin_c." (".$objaddress->state_c.", ".$objaddress->country_c.").";;
		
			$data['lblcontactnumber'] =  $objCorporate->contactpersonname_c .'<br> Mob. No. -'. $objCorporate->contactpersonmobno_c.'<br> Email Id -'. $objCorporate->contactpersonemailid_c.'<br> Off. No. -'. $objCorporate->contactpersonoffphoneno_c;
			$data['lbldate'] = $from.' - '.$to;
			$data['lbltodaydate'] = '<br>Date : '.date('d M Y h:i A');
			$data['lblnumberofdoctors'] = $numbers['doctorcount'];
			$data['lblnumbertotalapps'] = $numbers['appstaken'];
			$data['lblnumberappscompleted'] =  $numbers['appscompleted'];
			$data['lblnumberofnoshow'] = $numbers['noshowapps'];
			
			$message = 'No one has used the system for selected duration';
			
			
			$doctorsHTML =  '<div width="100%" height="170px" style="white-space: wrap;">';
			$doctors = $numbers['doctorids'];
			if(count($doctors) == 0){
				
				$doctorsHTML = $doctorsHTML.'<div style="width:720px; border-radius:5px;border: 3px solid #eee; padding-top:1px;height:20px;vertical-align:middle;" align="center" class="bodytext_bold" >'.$message.'</div>';
			}else{
				foreach($doctors as $doctorid)
				{
					$userid = ORM::factory('doctor')->where('id','=',$doctorid)->find()->refdoctorsid_c;
					$doctorlist= Request::factory('cdoctorreportcomponent/view');
					$doctorlist->post("height",'25');
					$doctorlist->post("width",'800');
					$doctorlist->post("from",$duration['from']);
					$doctorlist->post("to",$duration['to']);
					$doctorlist->post("doctorUserId",$userid);
					$doctorlist->post("doctorid",$doctorid);
					$doctorsHTML = $doctorsHTML.$doctorlist->execute(); 
				}
			}
			$doctorsHTML = $doctorsHTML.'</div>';
			
			$data['lbldoctors'] = $doctorsHTML;
			
			$datestring = htmlspecialchars(date ("dmYHis"), ENT_QUOTES);
			$name = 'corporatereport_'.$datestring;
						
			$path = export::topdf($data,$name,'vcorporatereport.php');
			
			header("Content-Type: application/octet-stream");

			$file =	$path;
			header("Content-Disposition: attachment; filename=".$name.".pdf");   
			header("Content-Type: application/octet-stream");
			header("Content-Type: application/download");
			header("Content-Description: File Transfer");            
			header("Content-Length: " . filesize($file));
			flush(); // this doesn't really matter.
			$fp = fopen($file, "r");
			while (!feof($fp))
			{
			    echo fread($fp, 65536);
			    flush(); // this is essential for large downloads
			} 
			fclose($fp); 			

			$this->display($errors,$messages,$doctorid,$duration);	
		}else{
			$duration['to'] = strtotime(date('Y-m-d'). "+1 days");
			$duration['from'] = strtotime(date('Y-m-d'). "-1 months");
			$doctorid = 'All';
			$errors['error'] = 'Could not export to PDF';
			$this->display($errors,$messages,$doctorid,$duration);
		}
	}
	public function getAllNumbers($duration,$doctorid){
	
		if($doctorid == 'All'){
			$objCorporate = ORM::factory('corporate')->where('refusersid_c','=',Auth::instance()->get_user()->id)->find();
			$totalappointments = ORM::factory('appnumbersfordoctor')->where('corporateid','=',$objCorporate->id)->where('timestamp','>',$duration['from'])->where('timestamp','<',$duration['to'])->find_all()->as_array();
			$count_doctor = array();
			foreach($totalappointments as $totalapp){
				array_push($count_doctor,$totalapp->doctorid);
			}
			$count_doctor = array_unique($count_doctor);
			$numbers  = array();
			$numbers['doctorcount'] = count($count_doctor);
			$numbers['doctorids'] = $count_doctor;
			
			$totalappointments = ORM::factory('appnumbersfordoctor')->where('corporateid','=',$objCorporate->id)->where('timestamp','>',$duration['from'])->where('timestamp','<',$duration['to'])->count_all();
			$numbers['appstaken'] = $totalappointments;
			
			$appscompleted = ORM::factory('appnumbersfordoctor')->where('corporateid','=',$objCorporate->id)->where('status','=','1')->where('timestamp','>',$duration['from'])->where('timestamp','<',$duration['to'])->count_all();
			$numbers['appscompleted'] = $appscompleted;
			
			$noshowapps = ORM::factory('appnumbersfordoctor')->where('corporateid','=',$objCorporate->id)->where('status','=','5')->where('timestamp','>',$duration['from'])->where('timestamp','<',$duration['to'])->count_all();
			$numbers['noshowapps'] = $noshowapps;
			return $numbers;		
		}else{
			$objCorporate = ORM::factory('corporate')->where('refusersid_c','=',Auth::instance()->get_user()->id)->find();
			$totalappointments = ORM::factory('appnumbersfordoctor')->where('corporateid','=',$objCorporate->id)->where('timestamp','>',$duration['from'])->where('timestamp','<',$duration['to'])->where('doctorid','=',$doctorid)->find_all()->as_array();
			$count_doctor = array();
			foreach($totalappointments as $totalapp){
				array_push($count_doctor,$totalapp->doctorid);
			}
			$count_doctor = array_unique($count_doctor);
			$numbers  = array();
			$numbers['doctorcount'] = count($count_doctor);
			$numbers['doctorids'] = $count_doctor;
			
			$totalappointments = ORM::factory('appnumbersfordoctor')->where('corporateid','=',$objCorporate->id)->where('doctorid','=',$doctorid)->where('timestamp','>',$duration['from'])->where('timestamp','<',$duration['to'])->count_all();
			$numbers['appstaken'] = $totalappointments;
			
			$appscompleted = ORM::factory('appnumbersfordoctor')->where('corporateid','=',$objCorporate->id)->where('doctorid','=',$doctorid)->where('status','=','1')->where('timestamp','>',$duration['from'])->where('timestamp','<',$duration['to'])->count_all();
			$numbers['appscompleted'] = $appscompleted;
			
			$noshowapps = ORM::factory('appnumbersfordoctor')->where('corporateid','=',$objCorporate->id)->where('doctorid','=',$doctorid)->where('status','=','5')->where('timestamp','>',$duration['from'])->where('timestamp','<',$duration['to'])->count_all();
			$numbers['noshowapps'] = $noshowapps;
			return $numbers;		
		}
	}
}

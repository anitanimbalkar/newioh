<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Cconsultationdata extends Controller_Cservicetemplate  {
	public function action_view(){
		$errors = array();
		$messages = array();
		$serviceid = $_GET['serviceid'];
		$packageid = $_GET['packageid'];
		$this->display($errors,$messages,$serviceid,$packageid);
	}
	
	private function display($errors, $messages,$serviceid, $packageid){
		$content = View::factory('vuser/vserviceadmin/vconsultationdata');
		$content->bind('serviceid',$serviceid);
		$content->bind('packageid',$packageid);
		$content->bind('errors',$errors);
		$content->bind('messages',$messages);
		$this->response->body($content);
	}
	
	public function action_detailsforconsumer(){
		$errors = array();
		$messages = array();
		$serviceid = $_GET['serviceid'];
		$packageid = $_GET['packageid'];
		if(isset($_GET['bookingid'])){
			$bookingid = $_GET['bookingid'];
		}else{
			$bookingid = null;
		}
		
		$serviceProviderList = $this->generateServiceProvidersList($packageid,$serviceid,$bookingid);
		$numbers = '';
		if($serviceid == 1 ){
			$numbers = 'Total Number of Appointments :'.$serviceProviderList[1];
		}else if($serviceid == 2){
			$numbers = 'Total Number of Orders :'.$serviceProviderList[1];
		}
		
		$content = View::factory('vuser/vserviceadmin/vconsultationdetails');
		$content->bind('serviceProviderList',$serviceProviderList[0]);
		$content->bind('numbers',$numbers);
		
		$content->bind('serviceid',$serviceid);
		$content->bind('packageid',$packageid);
		$content->bind('errors',$errors);
		$content->bind('messages',$messages);
		$this->response->body($content);
	}
	
	private function generateServiceProvidersList($packageid,$serviceid,$bookingid){
		$helper_package = new helper_Package();
		$result = $helper_package->get_serviceproviders($packageid,$serviceid);
		$str = "<tr  class='Heading_Bg'>";
		$str =$str. '<td width="5%" align="left" style="padding:5px;" >#</td>
			<td width="95%" align="left" style="padding:5px;" >Service Providers </td>';
		$str =$str. "</tr>";
		$totalcount = 0;
		if(count($result) == 0){
			$str =$str. '<tr><td colspan="2"><div style="width:99%; border-radius:5px;border: 3px solid #eee; padding-top:1px;height:20px;vertical-align:middle;margin:1px;" align="center" class="bodytext_bold" >No service providers are assigned.</div></td></tr>';
		}else{
			for($i=0;$i<count($result);$i++){
				
				$appointments = $helper_package->getServiceProvidersAppointments($result[$i]->userid_c, $serviceid, $packageid,$bookingid);
				$totalcount = $totalcount + $appointments['count'];
				if($i%2 == 0 ){
					$str =$str. "<tr>";
				}else{
					$str =$str. "<tr style = 'background-color:#ecf8fb;'>";
				}
				$str =$str. '<td width="5%" align="left" style="padding:5px;"  class="bodytext_bold">'.($i+1).'</td>
					<td width="95%" align="left" style="padding:5px;" class="bodytext_bold">'.ORM::factory('user')->where('id','=',$result[$i]->userid_c)->find()->Firstname_c.' '.ORM::factory('user')->where('id','=',$result[$i]->userid_c)->find()->lastname_c.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email Id: '.ORM::factory('user')->where('id','=',$result[$i]->userid_c)->find()->email.'&nbsp;&nbsp;&nbsp;&nbsp;Appointments : '.$appointments['count'].'<a href="#" style="float:right;"><span style="color:blue" onclick=showdetails("/ayushman/cpackage/appointmentlist?providerid='.$result[$i]->userid_c.'&serviceid='. $serviceid.'&packageid='.$packageid.'&bookingid='.$bookingid.'");>Show Details</span></a></td>';
					
				$str =$str. "</tr>";
			}
		}
		return array($str, $totalcount);
	}

	public function action_upload(){
		try{
			$errors = array();
			$messages = array();
			if($_POST){
				$serviceid = $_GET['serviceid'] = $_POST['serviceid'];
				$packageid = $_GET['packageid'] = $_POST['packageid'];
				
				$parts = parse_url($_SERVER['HTTP_REFERER']);
				parse_str($parts['query'], $query);
				$bookingid = $query['bookingid'];
				
				$name = $_FILES["file"]["name"];
				$index = count(explode(".", $name)) - 1;
				$arr = explode(".", $name);
				$ext = $arr[$index];

				if($ext == "xls" || $ext == "xlsx")
				{		
					if ($_FILES["file"]["error"] > 0)
					{
						echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
					}
					else
					{
						$helper_import = new helper_Import();
						$rows = $helper_import->excel($_FILES['file']['tmp_name']);
						{ //iterate through each record
							for($rowindex=7;$rowindex<count($rows);$rowindex++){
								$consultationdata =  Kohana::$config->load('consultationdata');
								$appointmentdata = array();
								$consultation = array();
								if($rows[$rowindex]['K'] == '')
									continue;
								foreach($rows[$rowindex] as $key=>$value){
									if(isset($consultationdata[$key])){
										if(!isset($consultation[$consultationdata[$key][1]])){
											$consultation[$consultationdata[$key][1]] = '';
										}
										$consultation[$consultationdata[$key][1]] = ($value != '')?$consultation[$consultationdata[$key][1]].' '.$consultationdata[$key][0].' - '.$value.', ' : $consultation[$consultationdata[$key][1]];
									}
								}
								
								{//create appointment 
									$date = date('d-m-Y', strtotime(str_replace('/','-',$consultation['date'])));
									
									$appointment_object = ORM::factory('appointment');
									$appointment_object->refappfromid_c = trim(str_replace('-','',$consultation['iohid']));
									$appointment_object->refappwithid_c = trim(str_replace('-','',$consultation['doctorid']));
									$appointment_object->scheduledstarttime_c = $date;
									$appointment_object->scheduledendtime_c = $date;
									$appointment_object->displaytime_c =  $date;
									$appointment_object->refincidentid_c = '2523';
									$appointment_object->refmode_c = 3;
									$appointment_object->consultationmode_c = 'In-Clinic';
									$appointment_object->rate_c	= 0;
									$appointment_object->refappointmentstatusesid_c = 1;
									$appointment_object->status_c	= "fromsystem";
									$appointment_object->paid_c     = 1;
									$appointment_object->usagecharges_c = 0;
									$appointment_id = $appointment_object->save()->id;
								}
								{ //textcomplaints
									$obj = ORM::factory('textcomplaint');
									$obj->ref_app_id = $appointment_id;
									$obj->text =  $consultation['complaints'];
									$obj->visibility =1;
									$obj->save();								
								}		
								{ //textexaminationsummary
									$obj = ORM::factory('textexaminationsummary');
									$obj->ref_app_id = $appointment_id;
									$obj->text =  $consultation['examination'];
									$obj->visibility =1;
									$obj->save();								
								}
								{ //textvitals
									$obj = ORM::factory('textvital');
									$obj->ref_app_id = $appointment_id;
									$obj->text =  $consultation['vitals'];
									$obj->visibility =1;
									$obj->save();								
								}		
								{ //textsummarynotes
									$obj = ORM::factory('textsummarynote');
									$obj->ref_app_id = $appointment_id;
									$obj->text =  $consultation['followupnote'];
									$obj->visibility =1;
									$obj->save();								
								}		
								{ //textdiagnosisnotes
									$obj = ORM::factory('textdiagnosisnote');
									$obj->ref_app_id = $appointment_id;
									$obj->text =  $consultation['diagnosis'];
									$obj->visibility =1;
									$obj->save();								
								}		
								{ //textprescriptions
									$obj = ORM::factory('textprescription');
									$obj->ref_app_id = $appointment_id;
									$obj->text =  $consultation['prescription'];
									$obj->visibility = 1;
									$obj->save();								
								}
								{//assign to package
									$obj = ORM::factory('packageappointment');
									$obj->packageid_c = $packageid;
									$obj->serviceid_c =  $serviceid;
									$obj->appointmentid_c = $appointment_id;
									$obj->bookingid_c = $bookingid;
									$obj->save();
								}
							}
						}						
					}
				}
				Request::current()->redirect($_SERVER['HTTP_REFERER']);
			}else{
				
			}
		}catch(Exception $e){
			var_dump($e);
			die;
		}
	}
	public function CSVImport($file) {
		$handle = fopen($file, 'r');
		if (!$handle)
			die('Cannot open  file.');
		$rows = array();
		//Read the file as csv
		while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
			$rows[] =  $data;
		}

		fclose($handle);

		return $rows;
	}
}

<?php defined('SYSPATH') or die('No direct script access.');
include_once('simple_html_dom.php');

class Controller_Cpdf extends Controller{
	public function action_autogenerate(){
		$appid = $_GET['appid'];
		$datestring = htmlspecialchars(date ("dmYHis"), ENT_QUOTES);
		$pdfCreaterObj = new Cpdfcreater;
		$pdfpath = $pdfCreaterObj->createpdf($appid, $datestring);
		$appointment_object = ORM::factory('appointment')->where('id','=',$appid)->find();
		$appointment_object->refappointmentstatusesid_c=1;
		$appointment_object->save();
		echo $pdfpath.'</br>';
		die();
	}
	public function action_coeppdf(){
		$status = 'test';
		echo 'test';die;
		$obj_coepusers=ORM::factory('coepuser')->where('ispdfcreated','=',$status)->find_all();
		$arr_coepusers= array();
		foreach($obj_coepusers as $coepuser)
		{
			array_push($arr_coepusers,$coepuser->iohid);
		}
			 foreach($arr_coepusers as $coepuser){
				 try{
						$obj_coepuser=ORM::factory('coepuser')->where('iohid','=',$coepuser)->find();
						if($obj_coepuser->ispdfcreated == $status)
						{
						$appid = $obj_coepuser->appid;
						$datestring = htmlspecialchars(date ("dmYHis"), ENT_QUOTES);
						$pdfCreaterObj = new Cpdfcreater;
							
						$appointment_object = ORM::factory('appointment')->where('id','=',$appid)->find();
						echo date('Y-M-d H:i:s', strtotime( $obj_coepuser->date_c));
						$appointment_object->scheduledstarttime_c =date('Y-m-d 11:00:00', strtotime( $obj_coepuser->date_c));
						$appointment_object->displaytime_c = date('Y-m-d', strtotime( $obj_coepuser->date_c));
						$appointment_object->save();

						$pdfpath = $pdfCreaterObj->createpdf($appid, $datestring);
						$appointment_object->refappointmentstatusesid_c=1;
						$appointment_object->save();
						$obj_coepuser->ispdfcreated = 'Yes';
						$obj_coepuser->save();
						echo $appid.'</br>';
						}
					}
					catch (Exception $e)
					{
						var_dump($e);
					}
			}
			die('done');
	}
	public function action_create(){ // for printing examination form for camp
		try{
		$users = ORM::factory('coepuser')->where('file','=','false')->order_by('id','asc')->find_all();

		$arr_user = array();
		foreach($users as $user)
		{
			array_push($arr_user,$user->iohid);
		}
		echo 'before';
		foreach($arr_user as $user)
		{
			$userinfo = array();
			$coepuser = ORM::factory('coepuser')->where('iohid','=',$user)->find();
			
			if($coepuser->file == 'true'){
				break;
			}
			
			$userinfo['mis'] = str_replace("coep","",$coepuser->username);
			$userinfo['name'] = $coepuser->firstname;
			$userinfo['username'] = $coepuser->username;
			$userinfo['iohid'] =  $coepuser->iohid;
			$userinfo['password'] = $coepuser->password;
			echo ($coepuser->email == 0);
			
			$userinfo['email'] = $coepuser->email;
			$userinfo['mobileno'] = ($coepuser->MobileNumber==0)?'-':$coepuser->MobileNumber;
			$userinfo['dob'] = $coepuser->DOB;
			$userinfo['gender'] = $coepuser->gender;
			$userinfo['year'] = $coepuser->year;
			$userinfo['stream']= $coepuser->stream;
			
			 $birthDate =str_replace("-","/",$userinfo['dob']);
			 //explode the date to get month, day and year
			 $birthDate = explode("/", $birthDate);
			 //get age from date or birthdate
			 $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y")-$birthDate[2])-1):(date("Y")-$birthDate[2]));
			$userinfo['age'] = $age; 
			$userinfo['orderid'] = $coepuser->ordernumber;
			$year = trim($coepuser->year);
			$stream = trim($coepuser->div);
			//$this->placepdfvalue(json_encode($userinfo),str_replace('coep2013_', '', $user->username).'_1', 'studentinfo.php');
			$this->placepdfvalue(json_encode($userinfo),$coepuser->username, 'coephealthcard.php',$year,$stream );
			$coepuser->file = 'true';$coepuser->save();
		}
		die('done');}catch(Exception $e){
			var_dump($e);die;
		}
	}
	public function action_createforstjohn(){ // for printing examination form for camp
		try{
		$users = ORM::factory('stjohnuser')->where('file','=','false')->order_by('id','asc')->find_all();

		$arr_user = array();
		foreach($users as $user)
		{
			array_push($arr_user,$user->iohid);
		}
		echo 'before';
		foreach($arr_user as $user)
		{
			$userinfo = array();
			$coepuser = ORM::factory('stjohnuser')->where('iohid','=',$user)->find();
			
			if($coepuser->file == 'true'){
				break;
			}
			
			$userinfo['mis'] = str_replace("SJ","",$coepuser->username);
			$userinfo['name'] = $coepuser->firstname;
			$userinfo['username'] = $coepuser->username;
			$userinfo['iohid'] =  $coepuser->iohid;
			$userinfo['password'] = $coepuser->password;
			echo ($coepuser->email == 0);
			
			$userinfo['email'] = $coepuser->email;
			$userinfo['mobileno'] = ($coepuser->MobileNumber==0)?'-':$coepuser->MobileNumber;
			$userinfo['dob'] = $coepuser->DOB;
			$userinfo['gender'] = $coepuser->gender;
			$userinfo['year'] = $coepuser->stream;
			$userinfo['stream']= $coepuser->div;
			
			 $birthDate =str_replace("-","/",$userinfo['dob']);
			 //explode the date to get month, day and year
			 $birthDate = explode("/", $birthDate);
			 //get age from date or birthdate
			 $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y")-$birthDate[2])-1):(date("Y")-$birthDate[2]));
			$userinfo['age'] = $age; 
			$userinfo['orderid'] = $coepuser->ordernumber;
			$year = trim($coepuser->year);
			$stream = trim($coepuser->div);
			//$this->placepdfvalue(json_encode($userinfo),str_replace('coep2013_', '', $user->username).'_1', 'studentinfo.php');
			$this->placepdfvalue(json_encode($userinfo),$coepuser->username, 'stjohnhealthcard.php',$year,$stream );
			$coepuser->file = 'true';$coepuser->save();
		}
		die('done');}catch(Exception $e){
			var_dump($e);die;
		}
	}
	public function action_createblank(){ // for printing examination form for camp
		
			$userinfo = array();
			
			$userinfo['mis'] = '';
			$userinfo['name'] = '';
			$userinfo['username'] = '';
			$userinfo['iohid'] =  '';
			$userinfo['password'] = '';
			
			$userinfo['email'] = '';
			$userinfo['mobileno'] = '';
			$userinfo['dob'] = 'DD / MM / YYYY';
			$userinfo['gender'] = '';
			$userinfo['year'] = '';
			$userinfo['stream']= '';
			
			$userinfo['age'] = ''; 
			$userinfo['orderid'] = '';
			$year = 'blank';
			$stream = 'blank';
			//$this->placepdfvalue(json_encode($userinfo),str_replace('coep2013_', '', $user->username).'_1', 'studentinfo.php');
			$this->placepdfvalue(json_encode($userinfo),'blank', 'stjohnhealthcard.php',$year,$stream );
			die;
	}
	public function action_createRev(){ // for printing examination form for camp
		echo 'here';
		$users = ORM::factory('coepuser')->where('file','=','false')->order_by('id','desc')->find_all();

		$arr_user = array();
		foreach($users as $user)
		{
			array_push($arr_user,$user->iohid);
		}
		echo 'before';
		foreach($arr_user as $user)
		{
			$userinfo = array();
			$coepuser = ORM::factory('coepuser')->where('iohid','=',$user)->find();
			
			if($coepuser->file == 'true'){
				break;
			}
			
			$userinfo['mis'] = str_replace("coep","",$coepuser->username);
			$userinfo['name'] = $coepuser->firstname;
			$userinfo['username'] = $coepuser->username;
			$userinfo['iohid'] =  $coepuser->iohid;
			$userinfo['password'] = $coepuser->password;
			echo ($coepuser->email == 0);
			
			$userinfo['email'] = $coepuser->email;
			$userinfo['mobileno'] = ($coepuser->MobileNumber==0)?'-':$coepuser->MobileNumber;
			$userinfo['dob'] = $coepuser->DOB;
			$userinfo['gender'] = $coepuser->gender;
			$userinfo['year'] = $coepuser->year;
			$userinfo['stream']= $coepuser->stream;
			
			 $birthDate =str_replace("-","/",$userinfo['dob']);
			 //explode the date to get month, day and year
			 $birthDate = explode("/", $birthDate);
			 //get age from date or birthdate
			 $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y")-$birthDate[2])-1):(date("Y")-$birthDate[2]));
			$userinfo['age'] = $age; 
			$userinfo['orderid'] = $coepuser->ordernumber;
			$year = trim($coepuser->year);
			$stream = trim($coepuser->div);
			//$this->placepdfvalue(json_encode($userinfo),str_replace('coep2013_', '', $user->username).'_1', 'studentinfo.php');
			$this->placepdfvalue(json_encode($userinfo),$coepuser->username, 'coephealthcard.php',$year,$stream );
			$coepuser->file = 'true';$coepuser->save();
		}
		die('done');
	}


	public function placepdfvalue($response_getemrbyidforpdf,$pdfname,$template,$year,$stream)
	{
		
		$arr_wk = include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/config/application.php');
		$data 	= json_decode($response_getemrbyidforpdf,true);
		$html 	= new simple_html_dom();
		$html->load_file("application/views/vtemplates/".$template);
		$labels = $html->find('label');
		
		foreach($labels as $label) {
			if(isset($data[$label->id])){
				$label->innertext  = $data[$label->id];
				$parent = $label->parent;
				if($parent->tag == 'div' && $label->innertext != '')
					$parent->attr['style'] = $parent->attr['style'].';display:block;';
			}
		}
		
		
		if (!is_dir('Documents/coep/'.$year)) {
			mkdir('Documents/coep/'.$year);
		}
		if (!is_dir('Documents/coep/'.$year.'/'.$stream)) {
			mkdir('Documents/coep/'.$year.'/'.$stream);
		}
		
		$html->save('Documents/coep/html/'.$pdfname.'.html');
		exec($arr_wk['wkhtmltopdfpath'].'  "Documents/coep/html/'.$pdfname.'.html" "Documents/coep/'.$year.'/'.$stream.'/'.$pdfname.'.pdf"',$op);
		return true;
	}
}

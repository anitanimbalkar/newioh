<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Mobileservices extends Controller_Service {

	public function action_index()
	{
		if (isset($_SERVER['HTTP_ORIGIN'])) {
    //header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    
	header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Credentials: true');    
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); 
}   
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers:{$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

    exit(0);
} 
		try{
			if ( !empty($_GET['action']))
			{
				$result = array();
				switch($_GET['action']){
					case 'GetNewOrders':
						if(isset($_GET['token'])){
							session_id($_GET['token']);
						}else{
							throw new Exception('Authentication failure. Valid token is required.');
						}

						$user = Auth::instance()->get_user();
						if(isset($user->id))
						{
							$lastOrderId = '';
							$orders = new api_Orders;
							$result = $orders->GetNewOrders($user->id,$lastOrderId);
							$array_data['type']="success";
							$result = "<individualorders>".$result."</individualorders>";
						}
						else
						{
							$result["type"] = 'error';
							$result["data"]="Unauthorized access. Please login to the system and try again";
						}
						$this->content = $result;
						break;
					case 'GetNewBulkOrders':
						if(isset($_GET['token'])){
							session_id($_GET['token']);
						}else{
							throw new Exception('Authentication failure. Token is required.');
						}

						$user = Auth::instance()->get_user();
						if(isset($user->id))
						{
							$lastOrderId = '';
							$orders = new api_Orders;
							$result = $orders->GetNewBulkOrders($user->id,$lastOrderId);
							
							$ob = (array)simplexml_load_string('<orders>'.$result.'</orders>');
							$json = json_encode($ob);
							$result = json_decode($json, true);

							$array_data['type']="success";
							$array_data['data'] = $result;
						}
						else
						{
							$result["type"] = 'error';
							$result["data"]="Unauthorized access. Please login to the system and try again";
						}
						$this->content = $result;
						break;
					case 'Acknowledgement':
						session_id($_GET['token']);
						$user = Auth::instance()->get_user();
						if(isset($user->id))
						{
							$ack = $_POST['xml'];
							$orders = new api_Orders;
							$result = $orders->Acknowlegement($ack);
						}
						else
						{
							$result["type"] = 'error';
							$result["data"]	=	"Unauthorized access. Please login to the system and try again";
						}
						$this->content = $result;
						break;
					case 'UploadReports':
						session_id($_GET['token']);
						$user = Auth::instance()->get_user();
						if(isset($user->id))
						{
							
		
							$xml = $_POST['xml'];
						
							$orders = new api_Orders;
							$result = $orders->UploadReports($xml);
						}
						else
						{
							$result["type"] = 'error';
							$result["data"]	=	"Unauthorized access. Please login to the system and try again";
						}
						$this->content = $result;
						break;
					case 'Request':
						session_id($_GET['token']);
						$user = Auth::instance()->get_user();
						if(isset($user->id))
						{
							$req = $_POST['xml'];
						
							$orders = new api_Orders;
							$result = $orders->Request($req);
						}
						else
						{
							$result["type"] = 'error';
							$result["data"]="Unauthorized access. Please login to the system and try again";
						}
						$this->content = $result;
						break;
					case 'Login':
						$this->content = $this->Login($_GET['username'],$_GET['password'],$_GET['remember']);
						break;
					case 'GetReportData':
						$this->content = $this->GetReportData();
						break;
					case 'DeleteReport':
						$this->content = $this->DeleteReport($_GET['id']);
						break;
					case 'checkforupdate':
					$this->content =  $this->checkforupdate($_GET['version']);
					break;
					case 'searchincidents':
					$this->content =  $this->searchincidents();
					break;
					case 'getvisits' :
					$this->content =  $this->getvisits();
					break;
					case 'UploadImages':
					$this->content =  $this->UploadImages();
					break;
					default :
						$result["type"] = 'error';
						$result["data"]="Invalid action";
						$this->content = $result;
				}
				return $this->content;
			}
			else
			{
				$result["type"] = 'error';
				$result["data"]='invalid url (action is not specified)';
				$this->content = $result;
				return $this->content;
			}
		}catch(Exception $e){
			$this->content = $e->getMessage();
			return $this->content;
		}
	}
	private function DeleteReport($id)
	{
		$userid = Auth::instance()->get_user();
		$record=ORM::factory('patienttestreport')->where('id','=',$id)->find();
		$record->isvisible_c="0";
		$record->save();
	}
	private function GetReportData(){
		if(isset($_GET['id'])){
			$user = Auth::instance()->get_user();
			if ($user->has('roles', ORM::factory('role', array('name' => 'doctor')))){
				$patient = ORM::factory('patient')->where('repatientsuserid_c','=',$_GET['id'])->find();
				$doctor = ORM::factory('doctor')->where('refdoctorsid_c','=',$user->id)->find();
				$network = ORM::factory('favoritedocterbypatient')->where('reffavdocbypatpatientsid_c','=',$patient->id)->where('reffavdocbypatdoctorsid_c','=',$doctor->id)->find();
				if($network->id != null){
					$object_user = ORM::factory('user')->where('id','=',$_GET['id'])->find();
				}else{
					$object_user = Auth::instance()->get_user(); 
				}			
			}else{
				$object_user = Auth::instance()->get_user(); 
			}
		}else{
			$object_user = Auth::instance()->get_user(); 
		}

		$reportsdata= New api_UploadReports;
		echo($reportsdata->getReportData($object_user)); die;
	}
	private function UploadImages()
	{
		switch ($_SERVER['REQUEST_METHOD']) {
    case 'OPTIONS':
    case 'HEAD':
    case 'GET':
        break;
    case 'POST':
    	error_reporting(E_ALL | E_STRICT);

		require('UploadImg.php');

		$upload_handler = new UploadImg();

		header('Pragma: no-cache');
		header('Cache-Control: no-store, no-cache, must-revalidate');
		/*header('Content-Disposition: inline; filename="files.json"');
		header('X-Content-Type-Options: nosniff');*/
		header('Access-Control-Allow-Origin: *');
		/*header('Access-Control-Allow-Methods: GET, POST');
		header('Access-Control-Allow-Headers: X-File-Name, X-File-Type, X-File-Size');*/
        $upload_handler->post();
        exit();
        break;
    default:
        header('HTTP/1.1 405 Method Not Allowed');
}
}
	private function Login($username,$password,$remember)
	{
		$array_data=array();
		session_cache_limiter('private');
		session_cache_expire(1);
		$user = Auth::instance()->login($username,$password,$remember);
		if ($user=="true") 
		{
			$user = Auth::instance()->get_user();
			if($user->activationstatus_c === "active")
			{
				$array_data["type"]="success";
				$array_data["data"]= session_id();
				$array_data["firstname"] = $user->Firstname_c;
				$array_data["lastname"] = $user->lastname_c;
				$array_data["userid"] = $user->id;
				$array_data["photo"] = $user->photo_c;
				
				$userRoles= ORM::factory('roleuser')->where('user_id','=',$user->id)->where('role_id','!=','4')->find();
				$array_data["role"] = $userRoles->role_id;
				//var_dump($userRoles->role_id);
				//die;
			}
			else
			{
				$array_data["type"]="error";
				$array_data["data"]="Your account is not activated yet.";
			}
		} 
		else 
		{
			$array_data["type"]="error";
			$array_data["data"]="The username or password you entered is incorrect.";
		}
		
		return $array_data;
	}
	public function action_create()
	{
		echo 'create';
		die;
	}
	public function action_delete()
	{
		echo 'delete';
		die;
	}
	public function action_update()
	{
		echo 'update';
		die;
	}
	private function checkforupdate($appversion)
	{	$count=0; $forceupload=0;
		$appversionid=ORM::factory('versioncontrol')->where('Version_c','=',$appversion)->find()->id;
		$availableupdates=ORM::factory('versioncontrol')->where('id','>',$appversionid)->find_all();
		foreach($availableupdates as $availableupdate)
		{
			$count=$count+1;
			if($availableupdate->Majorupdate_c == 1)
			{
				
				$forceupload=1; break;
			}
		
		}
		if($count==0)
		{
			echo "No update available.";
		}
		elseif($count>0 && $forceupload==1)
		{
			echo "Update Immediately.";
			
		}
		elseif($count>0 && $forceupload==0)
		{
			echo "Updates available.";
		}
		die;
	}
	private function getvisits()
	{	$userid = Auth::instance()->get_user();
		$objvisit = ORM::factory('appointment')->where('refappfromid_c','=', $userid)->order_by('scheduledstarttime_c','desc')->find_all();
		
		$temp=array();
		$visitarray=array();
		$temp['id']=0;
		$temp['value']='Select';
		array_push($visitarray,$temp);
				foreach($objvisit as $visit)
		{
			$drname=ORM::factory('user')
			->join('doctors')
			->on('user.id','=','doctors.refdoctorsid_c')->where('doctors.id','=',$visit->refappwithid_c)->find();
			$my_date = date('d-M-y', strtotime($visit->scheduledstarttime_c));
			$temp['id']=$visit->id;
			$temp['value']="On ".$my_date." with Dr.".$drname->Firstname_c ." ".$drname->lastname_c;
			array_push($visitarray,$temp);
			//$visitarray[$visit->id]= array("On ".$my_date." with Dr.".$drname->Firstname_c ." ".$drname->lastname_c," Dr.".$drname->Firstname_c ." ".$drname->lastname_c, $visit->refincidentid_c,$visit->id);
		}
		return $visitarray;

	}
	private function searchincidents()
	{
	$userid = Auth::instance()->get_user();
		$objincident = ORM::factory('incident')
			->join('appointments')
			->on('appointments.refincidentid_c','=','incident.id')
			->where('refappfromid_c','=',$userid)
			->find_all();
		$result = $objincident;
		$previnciarray=array();
		$temp=array();
		$temp['id']=0;
		$temp['value']='New Incidence';
		array_push($previnciarray,$temp);
		foreach($result as $res)
		{
			$incidentdt="";
			if(! empty( $res->incidentdate_c))
			$incidentdt= date('Y-m-d',strtotime( $res->incidentdate_c));
			$res->incidentsname_c." ".$incidentdt;
			//$previnciarray[$res->id]= $res->incidentsname_c." ".$incidentdt;
			$temp['id']=$res->id;
			$temp['value']=$res->incidentsname_c." ".$incidentdt;
			array_push($previnciarray,$temp);
		}
		return $previnciarray;
		
	}
	}
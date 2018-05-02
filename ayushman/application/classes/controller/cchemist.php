<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/notificationsender.php');

class Controller_Cchemist extends Controller {
	public function action_getchemist()
	{
		if(isset($_GET['pid'])){
			$user = ORM::factory('user')->where('id','=',$_GET['pid'])->find();
		}else{
			$user = Auth::instance()->get_user();
		}
		$patient = ORM::factory('patient')->where('repatientsuserid_c','=',$user->id)->find();
		$objchemists = ORM::factory('favoritechemistbypatientdetail')->where('roleid','=',$patient->id)->order_by('priority','asc')->find_all();
		
		$chemists = array();
		$i = -1;
		
		foreach($objchemists as $chemist)
		{
			$i=$i + 1;
			$chemists[$i]  = array();
			$chemists[$i][0] = $chemist->chemistid; 			
			$chemists[$i][1] = ucwords($chemist->medicalname); 
			$chemists[$i][2] = ucwords($chemist->city); 
			$chemists[$i][3] = ucwords($chemist->location); 
			$chemists[$i][4] =  ucwords($chemist->homedeliveryfacility) == 'True' ? 'Available':'Not Available';; 
		}
		die(json_encode($chemists));
	}
	public function action_getdoctorchemist()
	{
		$user = Auth::instance()->get_user();
		
		$doctor = ORM::factory('doctor')->where('refdoctorsid_c','=',$user->id)->find();
		$objchemists = ORM::factory('favoritechemistbydoctor')->where('reffavchembydocdoctorsid_c','=',$doctor->id)->order_by('prefered_c','Asc')->find_all();
				
		$chemists = array();
		$i = -1;
		
		foreach($objchemists as $chemist)
		{
			$objChemist = ORM::factory('chemist')->where('id','=',$chemist->reffavchembydocchemistsid_c)->find();
			$user = ORM::factory('user')->where('id','=',$objChemist->refchemistsuserid_c)->find();
			$address = ORM::factory('address')->where('id','=',$user->refaddresswork_c)->find();
			$i=$i + 1;
			$chemists[$i]  = array();
			$chemists[$i][0] = $objChemist->id; 			
			$chemists[$i][1] = ucwords($objChemist->nameofmedical_c);
			
			$chemists[$i][2] = ucwords($address->city_c); 
			$chemists[$i][3] = ucwords($address->location_c); 
			$chemists[$i][4] =  ucwords($objChemist->homedeliveryfacility_c) == 'True' ? 'Available':'Not Available';; 
		}
		die(json_encode($chemists));
	}
	public function action_getallchemist()
	{   // Exclude chemist defined for Hospital
		
		$hospitalid = NULL;
		$user = Auth::instance()->get_user();
		if (($user->has('roles', ORM::factory('role', array('name' => 'staff')))) OR
		($user->has('roles', ORM::factory('role', array('name' => 'ipdstaff')))) )
		{
			// Select hospitalid from staffs table
			$objstaff = ORM::factory('staff')->where('refstaffuserid_c','=',$user->id)->find();
			$hospitalid =	$objstaff->refhospitalid_c;
		}
		elseif ($user->has('roles', ORM::factory('role', array('name' => 'doctor'))))
		{
				// Select hospitalid from doctors table
			$objdoctor = ORM::factory('doctor')->where('refdoctorsid_c','=',$user->id)->find();
			$hospitalid =	$objdoctor->refhospitalid_c;
		}

		$objchemists = ORM::factory('chemist')->join('users')->on('chemist.refchemistsuserid_c','=','users.id')
											->join('favoritechemistbydoctors','LEFT')->on('chemist.id','=','favoritechemistbydoctors.reffavchembydocchemistsid_c')
											->where('users.activationstatus_c','=','active')
											->where('chemist.refhospitalid_c','<=>',$hospitalid)
											->order_by('favoritechemistbydoctors.prefered_c','Asc')
											->find_all();
								
		$chemists = array();
		$i = -1;
		
		foreach($objchemists as $chemist)
		{
			$i=$i + 1;
			$chemists[$i]  = array();
			$chemists[$i]['id'] = $chemist->id; 
			$chemists[$i]['userid'] = $chemist->refchemistsuserid_c; 
			$chemists[$i]['medicalname'] = ucwords($chemist->nameofmedical_c); 
			$chemists[$i]['homedelivery'] = ucwords($chemist->homedeliveryfacility_c) == 'True' ? 'Available':'Not Available'; 
			$chemists[$i]['areacovered'] = ucwords($chemist->areacoverforhomedelivery_c); 
			$user = ORM::factory('user')->where('id','=',$chemist->refchemistsuserid_c)->find();
			$address = ORM::factory('address')->where('id','=',$user->refaddresswork_c)->find();
			$chemists[$i]['city'] = ucwords($address->city_c); 
			$addressline = ucwords($address->line1_c) == ""?"":ucwords($address->line1_c).', ';
			$nearlandmark = ucwords($address->nearlandmark_c) == ""?"":ucwords($address->nearlandmark_c).', ';
			$location = ucwords($address->location_c) == ""?"":ucwords($address->location_c);
			$chemists[$i]['location'] = $addressline.$nearlandmark.$location; 
		}
		die(json_encode($chemists));
	}
	public function action_acceptorder()
	{
		$id = $_GET["id"];
		$date = $_GET["date"];
		$dtime =$_GET["time"];
		$dtime=' '.$dtime.':00';
		$date=$date.$dtime;
		$time = strtotime( $date );
		$date = date( 'y-m-d H:i:s', $time );
		$objorder = ORM::factory('chemistmedicineorder')->where('id','=',$id)->find();
		if($objorder->status_c == 'requested')
		{
			$objorder->deliverydate_c = $date; 
			$objorder->status_c = 'accepted'; 
			$objorder->update();
			$orderId = $objorder->id;
			$time = $_GET["time"];
			$date =$_GET["date"];
			$objUser = ORM::factory('user')
				->join('chemists')
				->on('user.id','=','chemists.refchemistsuserid_c')
				->where('chemists.id','=',$objorder->refchemistid_c)->find();
			$obj_patientmedicine = ORM::factory('patientmedicine')
				->where('refchemistordersid','=',$id)
				->find();
			$contactnumber=$objUser->phonenowork_c;
			$notification= array();
			$notification['id']= $obj_patientmedicine->patientuserid; $notification['template']='chemist_order_conformation'; $notification['sms']='true'; $notification['time']=$time; $notification['date']=$date; $notification['contactnumber']=$contactnumber; $notification['orderId']=$orderId;
			helper_notificationsender::sendnotification($notification);
		}else{
			die("This order is not in requested status.");
		}
	}
	public function action_rejectorder()
	{
		$id = $_GET["id"];
		$reason = $_GET["reason"];
		$objorder = ORM::factory('chemistmedicineorder')->where('id','=',$id)->find();
		if($objorder->status_c == 'requested')
		{
			$objorder->rejectreason_c = $reason; 
			$objorder->status_c = 'rejected'; 
			$objorder->update();
			$obj_chemistuser= ORM::factory('chemist')
				->where('id','=',$objorder->refchemistid_c)
				->find();
			$medicalName = $obj_chemistuser->nameofmedical_c;
			$obj_patientmedicine = ORM::factory('patientmedicine')
				->where('refchemistordersid','=',$id)
				->find();
			$notification= array();
			$notification['id']= $obj_patientmedicine->patientuserid; $notification['template']='chemist_order_rejection'; $notification['sms']='true'; $notification['reason']=$reason; $notification['chemistname']=$medicalName; $notification['orderId']=$objorder->id;
			helper_notificationsender::sendnotification($notification);
		}else{
			
			$this->response->body("This order is not in requested status. Order is cancelled or reassigned to other diagnostic center.");
		}
	}
	public function action_completedorder()
	{
		$id = $_GET["id"];
		$objorder = ORM::factory('chemistmedicineorder')->where('id','=',$id)->find();
		if($objorder->status_c == 'accepted')
		{
			$objorder->status_c = 'completed'; 
			$objorder->update();
    		$orderId= $objorder->id;
    		$obj_chemistuser= ORM::factory('user')
				->join('chemists')
				->on('user.id','=','chemists.refchemistsuserid_c')
				->where('chemists.id','=',$objorder->refchemistid_c)
				->find();
			$obj_patientmedicine = ORM::factory('patientmedicine')
				->where('refchemistordersid','=',$id)
				->find();
			$date	= date_format( date_create($objorder->deliverydate_c ),'d M Y');
			$time	= date_format( date_create($objorder->deliverydate_c ),'H:i');
    		$contactnumber =$obj_chemistuser->phonenowork_c;
    		$notification=  array();
			$notification['id']=$obj_patientmedicine->patientuserid;$notification['template']='chemist_order_conformation';$notification['sms']='true';$notification['time']=$time; $notification['date']=$date; $notification['contactnumber']=$contactnumber; $notification['orderId']=$orderId;
			helper_notificationsender::sendnotification($notification);
		}else{
			
			$this->response->body("This order is not in requested status. Order is cancelled or reassigned to other Chemist.");
		}
	}
}
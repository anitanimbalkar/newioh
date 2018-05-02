<?php defined('SYSPATH') or die('No direct script access.');

class helper_Package  {

	public function save($package)
	{
		{//save or update package in package table
			if(isset($package['id'])){
				$result = ORM::factory('package')->where('id','=',$package['id'])->find();
			}else{
				$result = ORM::factory('package');
			}
			if(isset($package['allowedtobook_c']))
				$package['allowedtobook_c'] = 1;
			else
				$package['allowedtobook_c'] = 0;
			$result->serviceadminid_c = Auth::instance()->get_user()->id;
			
			$result = $result->saveValues($package);
			$packageid = $result->id;
		}
		
		{//remove deselected services from packageservices table
			$results = ORM::factory('packageservice')->where('packageid_c','=',$packageid)->find_all();
			foreach($results as $result){
				if(!in_array($result->serviceid_c, $package['services'])){
					$result->delete();
				}
			}
		}
		
		{//save new services in packageservices table
			foreach($package['services'] as $service){
				$result = ORM::factory('packageservice')->where('packageid_c','=',$packageid)->where('serviceid_c','=',$service)->find();
				$result->packageid_c = $packageid;
				$result->serviceid_c = $service;
				$result->save();
			}
		}
		
		return $packageid;
	}
	
	public function book_camp($camp)
	{
		{//save or update package booking
			if(isset($camp['id'])){
				$result = ORM::factory('packagebooking')->where('id','=',$camp['id'])->find();
			}else{
				$result = ORM::factory('packagebooking');
			}			
			$result->saveRecord($camp);
		}
		return 'A camp is booked';
	}
	
	public function get_assignedservices($packageid)
	{
		$results = ORM::factory('packageservice')->where('packageid_c','=',$packageid)->find_all()->as_array();
		return $results;
	}
	
	public function get_availableservices()
	{
		$result = ORM::factory('service')->find_all();
		return $result;
	}
	
	public function get_info($packageid)
	{
		$objPackage 	= ORM::factory('package')->where('id','=',$packageid)->find()->as_array();
		return $objPackage;
	}
	
	public function get_bookinginfo($bookingid)
	{
		$objBooking 	= ORM::factory('packagebooking')->where('id','=',$bookingid)->find()->as_array();
		return $objBooking;
	}
	
	public function get_serviceproviders($packageid, $serviceid)
	{
		$objServiceProviders 	= ORM::factory('packageserviceprovider')->where('packageid_c','=',$packageid)->where('serviceid_c','=',$serviceid)->find_all();
		return $objServiceProviders;
	}
	public function get_mypackages($userid)
	{
		$user 	= ORM::factory('user')->where('id','=',$userid)->find();
		$roles = $user->get_role_ids();
		$packages = array();
		if(in_array(3, $roles) || in_array(8, $roles)){
			$subscriptions 	= ORM::factory('packagesubscriber')->where('userid_c','=',$userid)->find_all()->as_array();
			foreach($subscriptions as $subscription){
				array_push($packages,ORM::factory('package')->where('id','=',$subscription->packageid_c)->find());
			}
		}
		if(in_array(9, $roles) || in_array(10, $roles)){
			$packages = array_merge($packages, ORM::factory('package')->where('serviceadminid_c','=',$userid)->find_all()->as_array()); 
		}
		if(in_array(1, $roles) || in_array(5, $roles)){
			$subscriptions 	= ORM::factory('packageserviceprovider')->where('userid_c','=',$userid)->find_all()->as_array();
			foreach($subscriptions as $subscription){
				array_push($packages,ORM::factory('package')->where('id','=',$subscription->packageid_c)->find());
			}
		}
		return $packages;
	}
	public function get_serviceid($userid, $packageid){
		$serviceId 	= ORM::factory('packageserviceprovider')->where('packageid_c','=',$packageid)->where('userid_c','=',$userid)->find()->serviceid_c;
		return $serviceId;
	}
	public function get_availablepackages($userid)
	{
		$user 	= ORM::factory('user')->where('id','=',$userid)->find();
		$roles = $user->get_role_ids();
		$packages = array();
		foreach($roles as $role){
			$packages = array_merge($packages,ORM::factory('package')->where('publishto_c','=',$role)->find_all()->as_array());
		}		
		return $packages;
	}
	public function isSubscribed($packageid)
	{
		$user 	= Auth::instance()->get_user();
		$roles = $user->get_role_ids();
		$hasAccess = false;
		foreach($roles as $role){
			$package = ORM::factory('package')->where('id','=',$packageid)->where('publishto_c','=',$role)->find();
			if($package->id != null){
				$hasAccess = true;
				break;
			}
		}
		if($hasAccess){
			$packgeSubscriber = ORM::factory('packagesubscriber')->where('packageid_c','=',$packageid)->where('userid_c','=',$user->id)->find();
			if($packgeSubscriber->id == null){
				return false;
			}else{
				return true;
			}
		}else{
			return 'Access Denied';
		}
	}
	public function subscribe($packageid)
	{
		$result = $this->isSubscribed($packageid);
		$user 	= Auth::instance()->get_user();
		if($result == false){
			$packgeSubscriber = ORM::factory('packagesubscriber');
			$packgeSubscriber->packageid_c = $packageid;
			$packgeSubscriber->userid_c = $user->id;
			$packgeSubscriber->save();
			return true;
		}else{
			return $result;
		}
	}
	public function get_subscribers($packageid)
	{
		$result = ORM::factory('packagesubscriber')->where('packageid_c','=',$packageid)->find_all();
		return $result;
	}
	
	public function get_bookings($packageid,$userid)
	{
		$result = ORM::factory('packagebooking')->where('packageid_c','=',$packageid)->where('userid_c','=',$userid)->find_all();
		return $result;
	}
	
	public function isAllowedToBook($packageid)
	{
		$result = ORM::factory('package')->where('id','=',$packageid)->find()->allowedtobook_c;
		if($result == 1){
			return true;
		}else{
			return false;
		}
	}

	public function getDoctors($query){
		$allDoctors = ORM::factory('searchdoctors')->where('doctorname','like',$query)->find_all();
		$result = array();
		foreach($allDoctors as $doctor){
			$doctorInfo = array();
			$doctorInfo['name'] = $doctor->doctorname;
			$doctorInfo['domain'] = $doctor->domain_c;
			$doctorInfo['specialization.'] = $doctor->specialization_c;
			$doctorInfo['location'] = $doctor->location_c;
			$doctorInfo['city'] = $doctor->city_c;
			$doctorInfo['userid'] = $doctor->userid;
			array_push($result, $doctorInfo);
		}
		return $result;
	}
	public function getPathologists($query){
		$allDoctors = ORM::factory('searchedpathologist')->where('pathologistname','like',$query)->find_all();
		$result = array();
		foreach($allDoctors as $doctor){
			$doctorInfo = array();
			$doctorInfo['name'] = $doctor->pathologistname;
			$doctorInfo['location'] = $doctor->location_c;
			$doctorInfo['city'] = $doctor->city_c;
			$doctorInfo['userid'] = $doctor->pathologistuserid;
			array_push($result, $doctorInfo);
		}
		return $result;
	}
	public function assignServiceProviders($userid, $serviceid,$packageid){
		$serviceProviders = ORM::factory('packageserviceprovider')->where('packageid_c','=',$packageid)->where('serviceid_c','=',$serviceid)->where('userid_c','=',$userid)->find();
		if($serviceProviders->id == Null){
			$serviceProviders->packageid_c = $packageid;
			$serviceProviders->userid_c = $userid;
			$serviceProviders->serviceid_c = $serviceid;
			$serviceProviders->save();
		}
		return 'success';
	}
	public function removeServiceProviders($userid, $serviceid,$packageid){
		$serviceProviders = ORM::factory('packageserviceprovider')->where('packageid_c','=',$packageid)->where('serviceid_c','=',$serviceid)->where('userid_c','=',$userid)->find();
		if($serviceProviders->id != Null){
			$serviceProviders->delete();
		}
		return 'success';
	}
	public function getServiceProvidersAppointments($userid, $serviceid,$packageid,$bookingid = null){
		$user 	= Auth::instance()->get_user();
		if($serviceid == 1){
			if($bookingid == null){
				$packageBookings = ORM::factory('packagebooking')->where('packageid_c','=',$packageid)->where('userid_c','=',$user->id)->find_all();
				$packageConsultations = array();
				foreach($packageBookings as $packageBooking){
					$bookingid = $packageBooking->id;
					$temp = ORM::factory('packageconsultation')->where('packageid','=',$packageid)->where('serviceid','=',$serviceid)->where('doctorid','=',$userid)->where('bookingid','=',$bookingid)->find_all()->as_array();
					$packageConsultations = array_merge($packageConsultations,$temp);
				}				
				return array('data'=>$packageConsultations,'count'=>count($packageConsultations));
			}else{
				$packageConsultations = ORM::factory('packageconsultation')->where('packageid','=',$packageid)->where('serviceid','=',$serviceid)->where('doctorid','=',$userid)->where('bookingid','=',$bookingid)->find_all()->as_array();
				return array('data'=>$packageConsultations,'count'=>count($packageConsultations));
			}
		}else if($serviceid == 2){
			if($bookingid == null){
				$packageBookings = ORM::factory('packagebooking')->where('packageid_c','=',$packageid)->where('userid_c','=',$user->id)->find_all();
				$packageOrders = array();
				foreach($packageBookings as $packageBooking){
					$bookingid = $packageBooking->id;
					$temp = ORM::factory('packagediagnosticorder')->where('packageid','=',$packageid)->where('serviceid','=',$serviceid)->where('pathologistid','=',$userid)->where('bookingid','=',$bookingid)->find_all()->as_array();
					$packageOrders = array_merge($packageOrders,$temp);
				}	
				return array('data'=>$packageOrders,'count'=>count($packageOrders));
			}else{
				$packageOrders = ORM::factory('packagediagnosticorder')->where('packageid','=',$packageid)->where('serviceid','=',$serviceid)->where('pathologistid','=',$userid)->where('bookingid','=',$bookingid)->find_all()->as_array();
				return array('data'=>$packageOrders,'count'=>count($packageOrders));
			}
		}
	}
	
	public function get_allusers($packageid,$consumerid){
		$packagebookings = $this->get_bookings($packageid,$consumerid);
		$bookingids = '';
		$users = array();
		$temp = array();
		array_push($temp,'Reference Number');
		array_push($temp,'Patient Name');
		array_push($temp,'Date Of Birth');
		array_push($temp,'Email Id');
		array_push($temp,'Mobile Number');
		array_push($users,$temp);
		$check =array();
		foreach($packagebookings as $packagebooking){
			$packageconsultations = ORM::factory('packageconsultation')->where('bookingid','=',$packagebooking->id)->find_all();
			foreach($packageconsultations as $packageconsultation){
				$temp = array();
				
				$appointment = ORM::factory('appointment')->where('id','=',$packageconsultation->appointmentid)->find();
				$corporatemembers = ORM::factory('corporatemember')->where('iohid_c','=',$appointment->refappfromid_c)->find();
				$user = ORM::factory('user')->where('id','=',$appointment->refappfromid_c)->find();
				
				array_push($temp,$corporatemembers->employeeid_c);
				
				array_push($temp,$packageconsultation->patientname);
				array_push($temp,$user->DOB_c);
				array_push($temp,$user->email);
				array_push($temp,$user->mobileno1_c);
				if(!in_array($corporatemembers->employeeid_c,$check)){
					array_push($check,$corporatemembers->employeeid_c);
					array_push($users,$temp);
				}
				
			}
			
			$packagediagnosticorders = ORM::factory('packagediagnosticorder')->where('bookingid','=',$packagebooking->id)->find_all();
			foreach($packagediagnosticorders as $packagediagnosticorder){
				$temp = array();
				
				$orderedtest = ORM::factory('orderedtest')->where('diagnosticlabsorderid_c','=',$packagediagnosticorder->orderid)->find();
				$corporatemembers = ORM::factory('corporatemember')->where('iohid_c','=',$orderedtest->customeruserid_c)->find();
				$user = ORM::factory('user')->where('id','=',$orderedtest->customeruserid_c)->find();
				
				array_push($temp,$corporatemembers->employeeid_c);
				array_push($temp,$packagediagnosticorder->patientname);
				array_push($temp,$user->DOB_c);
				array_push($temp,$user->email);
				array_push($temp,$user->mobileno1_c);
				if(!in_array($corporatemembers->employeeid_c,$check)){
					array_push($check,$corporatemembers->employeeid_c);
					array_push($users,$temp);
				}
				
			}
			
		}
		return $users;
	}
}

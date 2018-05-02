<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/export.php');
class Controller_Cpackage extends Controller_Ctemplatewithmenu  {
	
	public function action_view(){
		$errors = array();
		$messages = array();
		$packageid = $_GET['id'];
		$this->display($errors,$messages,$packageid);
	}
	
	private function display($errors, $messages, $packageid){
		
		$content = View::factory('vuser/vserviceadmin/vpackage');
		$content->bind('packageid',$packageid);
		$content->bind('errors',$errors);
		$content->bind('messages',$messages);
		$this->template->content = $content;
	}
	
	public function action_edit(){
		$packageid = $_GET['id'];
		$package = new helper_Package();
		$packageinfo = $package->get_info($id);
		$_POST = $packageinfo;
		$errors = array();
		$messages = array();
		$this->display($errors,$messages,$packageid);
	}
	
	public function action_administratebooking(){
		$bookingid = $_GET['id'];
		$errors = array();
		$messages = array();
		
		$helper_Package = new helper_Package();
		$packagebooking = $helper_Package->get_bookinginfo($bookingid);
		$package = $helper_Package->get_info($packagebooking['packageid_c']);
		$packageservices = $helper_Package->get_assignedservices($package['id']);

		$content = View::factory('vuser/vserviceadmin/vadministratebooking');
		$content->bind('packageservices',$packageservices);
		$content->bind('package',$package);
		$content->bind('packagebooking',$packagebooking);
		$content->bind('errors',$errors);
		$content->bind('messages',$messages);
		$this->template->content = $content;
	}
	
	public function action_administrate(){
		$packageid = $_GET['id'];
		//$subscriberid = $_GET['userid'];
		
		$helper_package = new helper_Package();
		$package = $helper_package->get_info($packageid);
		
		$packageservices = $helper_package->get_assignedservices($packageid);
		
		$errors = array();
		$messages = array();

		$content = View::factory('vuser/vserviceadmin/vadministratepackage');
		$content->bind('package',$package);
		$content->bind('packageservices',$packageservices);
		$content->bind('errors',$errors);
		$content->bind('messages',$messages);
		$this->template->content = $content;
	}
	
	public function action_download(){
		$packageid = $_GET['id'];
		$consumerid = Auth::instance()->get_user()->id;
		$helper_package = new helper_Package();
		$users = $helper_package->get_allusers($packageid,$consumerid);
		$date = date_create();
		export::toexcel($users,'Camp_'.date_timestamp_get($date).'.xls');
	}
	
	public function action_editbooking(){
		$bookingid = $_GET['id'];
		$errors = array();
		$messages = array();

		$helper_package = new helper_Package();
		$bookinginfo = $helper_package->get_bookinginfo($bookingid);
		$packageinfo = $helper_package->get_info($bookinginfo['packageid_c']);
		
		$_POST = $bookinginfo;
		$content = View::factory('vuser/vserviceadmin/vcampbooking');
		$content->bind('packageinfo',$packageinfo);
		$content->bind('errors',$errors);
		$content->bind('messages',$messages);
		$this->template->content = $content;
	}
	
	public function action_bookcamp(){
		$errors = array();
		$messages = array();
		if($_POST){
			$package = new helper_Package();
			$bookinginfo = $package->book_camp($_POST);
			$messages['message'] = $bookinginfo;
			$package = new helper_Package();
			$packageinfo = $package->get_info($_POST['packageid_c']);
			$content = View::factory('vuser/vserviceadmin/vcampbooking');
			$content->bind('packageinfo',$packageinfo);
			$content->bind('errors',$errors);
			$content->bind('messages',$messages);
			$this->template->content = $content;
		}else{
			$packageid = $_GET['id'];
			$subscriberuserid = $_GET['userid'];
			$_POST['packageid_c'] = $packageid;
			$_POST['userid_c'] = $subscriberuserid;
			$_POST['name_c'] = '';
			$_POST['date_c'] = '';
			
			$package = new helper_Package();
			$packageinfo = $package->get_info($packageid);
			$content = View::factory('vuser/vserviceadmin/vcampbooking');
			$content->bind('packageinfo',$packageinfo);
			$content->bind('errors',$errors);
			$content->bind('messages',$messages);
			$this->template->content = $content;
		}
	}
	
	public function action_subscribe(){
		$errors = array();
		$messages = array();
		if($_POST){
			$packageid = $_POST['id'];
			$package = new helper_Package();
			$packageinfo = $package->subscribe($packageid);
			if($packageinfo != true){
				Request::current()->redirect('cpackageslist/showavailable?error='.$packageinfo);
			}else{
				Request::current()->redirect('cpackageslist/showavailable?message='.'Subscribed to the package');
			}
		}
	}
	
	public function action_appointmentlist(){
		$providerid = $_GET['providerid'];
		$serviceid = $_GET['serviceid'];
		$bookingid = $_GET['bookingid'];
		$packageid = $_GET['packageid'];

		$package = new helper_Package();
		$appointmentslist = $package->getServiceProvidersAppointments($providerid,$serviceid,$packageid,$bookingid);
		$content = View::factory('vuser/vserviceadmin/vlistofappointments');
		$content->bind('appointmentslist',$appointmentslist);
		$this->template->content = $content;
	}
}

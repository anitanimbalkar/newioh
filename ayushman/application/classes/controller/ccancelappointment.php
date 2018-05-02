<?php defined('SYSPATH') or die('No direct script access.');
include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/xmpp.php');
class Controller_Ccancelappointment extends Controller_Ctemplatewithmenu {
	public function action_cancelsuccessfully()
	{	
		$appointmentid=$_GET["appid"];
		$role=$_GET["role"];
		$obj_user = Auth::instance()->get_user();
		$obj_appointments = ORM::factory('appointment')//create appointment object
			->where('id','=',$appointmentid)
			->find();
		$time = strtotime($obj_appointments->displaytime_c);
		$date1 = date( 'd M Y', $time ); 
		$time1 = date( 'H:i', $time );
		$objuserfornotfication="";	
		if($role=="patient")//if role is patient then notification send to doctor.Create doctor object
		{
			$objuserfornotfication = ORM::factory('user')
				->join('doctors')
				->on('user.id','=','doctors.refdoctorsid_c')
				->where('doctors.id','=',$obj_appointments->refappwithid_c)
				->find();
		}
		else if($role=="doctor")//if role is doctor then notification send to patient.Create patient object
		{
			$objuserfornotfication = ORM::factory('user')
				->where('id','=',$obj_appointments->refappfromid_c)
				->find();
		}
		$content="";
		if($role=="patient")
		{
			$content = View::factory('vuser/vpatient/vcanceledappointmentbypatient');		
		}
		else if($role=="doctor"){
			$content = View::factory('vuser/vdoctor/vcanceledappointmentbydoctor');
			$var = xmpp::sendMessage($obj_user->id,$obj_user->xmpppassword_c,$objuserfornotfication->id,'pullgriddata');
			//parent.sendmsgfromtemplate('pullgriddata',$objuserfornotfication->id);
		}
		$content->bind('obj_user', $obj_user);
		$username = $obj_user->Firstname_c;
		$cancledwithuserid=$objuserfornotfication->id;
		$content->bind('username', $username);
		$content->bind('objuserfornotfication', $objuserfornotfication);
		$content->bind('appointmentdate', $date1);
		$content->bind('appointmenttime', $time1);
		$content->bind('cancledwithuserid', $cancledwithuserid);
		$urole = $role;
		$breadcrumb = "Home>>";
        $this->template->breadcrumb = $breadcrumb;
		$this->template->content = $content;
		$this->template->user = $obj_user->Firstname_c;
		$this->template->urole = $urole;	
	}
} // End Welcome

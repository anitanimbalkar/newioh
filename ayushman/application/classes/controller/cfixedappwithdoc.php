<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');
class Controller_Cfixedappwithdoc extends Controller_Ctemplatewithmenu {
public  function action_fixedappointmet()//displays success message to user
	{
		$obj_user = Auth::instance()->get_user();
		$content = View::factory('vuser/vpatient/vfixedappwithdoc');
		$doctorid=$_GET["doctorid"];
		$appdatetime = $_GET["appdate"];
		$rescheduledappid=$_GET['id'];
		$clinicaddid = $_GET["clinicaddressid"];
		$contactclinic= ORM::factory('address')->where('id','=',$clinicaddid)->find();
		$clinicaddress=$contactclinic->line1_c.", ".$contactclinic->nearlandmark_c." ".$contactclinic->location_c.", ".$contactclinic->city_c.", ".$contactclinic->state_c.".<br/> Ph: ".$contactclinic->phone_c;
		$objdoctorinfo = ORM::factory('user')
			->join('doctors')
			->on('user.id','=','doctors.refdoctorsid_c')
			->where('doctors.id','=',$doctorid)
			->find();
		$doctornm=$objdoctorinfo->Firstname_c." ".$objdoctorinfo->lastname_c;
		$content->bind('doctornm', $doctornm);
		$doctoruserid=$objdoctorinfo->id;
		
		
	
	    $objstaffinfo = ORM::factory('doctorpanelbystaffdetail')
					->where('doctoruserid','=',$doctoruserid)
					->find_all();
					
		$result = $objstaffinfo;
		$array_staff=array();
		$len=0;
		foreach($result as $res)
		{
		$len=$len+1;
			if(! empty($res->staffuserid))
			{
			   $staffid=$res->staffuserid;
			   if (!in_array($staffid,$array_staff))
			   array_push($array_staff, $staffid);
			}
		}				
		$content->bind('array_len', $len);	
		$content->bind('array_staff', $array_staff);
		$content->bind('doctoruserid', $doctoruserid);
		$content->bind('rescheduledappid', $rescheduledappid);
		$content->bind('clinicaddress', $clinicaddress);
		$content->bind('appdatetime', $_GET["appdate"]);
		$user = $obj_user->Firstname_c;
		if ($obj_user->has('roles', ORM::factory('role', array('name' => 'staff'))))			
				{
				$urole = "staff";
				}
		else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'patient'))))
				{
				$urole = "patient";
				}
		$content->bind('urole', $urole);
		$breadcrumb = "Home>>";
		$this->template->breadcrumb = $breadcrumb;
		$this->template->content = $content;
		$this->template->user = $user;
		$this->template->urole = $urole;
	}
} // End Welcome

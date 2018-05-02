<?php defined('SYSPATH') or die('No direct script access.') ;
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/export.php');
class Controller_Cayushusers extends Controller_Ctemplatewithmenu  {
	public function action_view(){
		$errors = array();
		$messages= array();
		$_POST['role'] = 'patient';
		$_POST['activationstatus']= '';
		$_POST['search'] = '';
		$_POST['durationtype'] = '';
		$duration['to'] ='';
		$duration['from'] =''; 
		$whereclause = '[role,=,patient]';
		$this->display($errors,$messages,$whereclause);
	}
	public function action_activateprofile()
	{
		
		if($_POST)
		{ 
			$userid = $_POST['userid'];
			$objuser= ORM::factory('user')->where('id','=',$userid)->find();
			$object_user = Auth::instance()->get_user();
			$objViewUsers= ORM::factory('viewusers')->where('id','=',$userid)->find();
			$objuser->suspensionreason_c ="Activated - ".$_POST['note']." - by ".$object_user->Firstname_c." ".$object_user->lastname_c."(".$object_user->id.")";
			$objuser->activationstatus_c="active";
			
			$objuser->save();
			die;
		}
		else
		{ 
			echo("wrong iohid"); die;
		}
	}
	public function action_reset()
	{
		if($_GET)
		{ var_dump($_GET['userid']);
			$userid = $_GET['userid'];
			$password = md5(uniqid(rand()));//create 6 chara password
			$password = substr($password,-8);
			$obj_user = new Model_User;
			$obj_user->where('id','=', $userid)->find();
			$passwordarr=array('id'=>$userid,'password'=>$password,'password_confirm'=>$password);
			$obj_user->update_user($passwordarr,array('password'));
					$notification=  array();
					$notification['id']=$userid;
					$notification['template']='newresetpassword';
					$notification['sms']='false'; 
					$notification['password']=$password; 
					$notification['email']='true'; 
					$notificationsender = new helper_notificationsender();
					$notificationsender->sendnotification($notification);
			die;
		}
		else
		{ 
			echo("wrong iohid"); die;
		}
	}
	public function action_savereason()
	{	
		if($_POST)
		{var_dump($_POST['idioh']); 
		$object_user = Auth::instance()->get_user();
		
		$userId = $_POST['idioh'];
		$objuser= ORM::factory('user')->where('id','=',$userId)->find();
		$objViewUsers= ORM::factory('viewusers')->where('id','=',$userId)->find();
		$objuser->suspensionreason_c ="Suspended - ".$_POST['reason']." - by ".$object_user->Firstname_c." ".$object_user->lastname_c."(".$object_user->id.")";
		$objuser->activationstatus_c="inactive";
		$objuser->save();
		die;	
		}
		
	}
	private function display($errors, $messages,$whereclause){
		$role=$_POST['role'];
		
		
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
		$content = View::factory('vuser/vadmin/vayushusers');
		//SELECT activationstatus FROM viewusers WHERE role= "doctor" GROUP BY activationstatus ;
		
		$objViewUsers= ORM::factory('viewusers')->where ('role','=',$role)->group_by('activationstatus')->find_all()->as_array();
		$array_status= array();
		//array_push($array_status,"All");
		foreach($objViewUsers as $objViewUser )
		{
		if($objViewUser->activationstatus != '')
			array_push($array_status,trim($objViewUser->activationstatus));
		}
		
		
		if($durationtype !='')
			$whereclause=$whereclause."[date_reg, >= ,".date('Y-m-d',$duration['from'])."][date_reg, <= ,".date('Y-m-d',$duration['to'])."]";
			//$whereclause=$whereclause."[date_reg,>=,".$duration['from']."]";
	//var_dump($whereclause); die;
		$content->bind('errors',$errors);
		$content->bind('messages',$messages);
		$content->bind('whereclause',$whereclause);
		$content->bind('array_status',$array_status);
		$this->template->content = $content;
		
	}
	
	
	public function action_search(){
		
		$errors = array();
		$messages = array();
		$whereclause = '';
		if($_POST){
			
			$status = $_POST['role'];
			$search = $_POST['search'];
			if(isset($_POST['activationstatus']))
				$activationstatus = $_POST['activationstatus'];
			else
				$activationstatus= '';
				
			
			if($search != ''&& $activationstatus != ''){
				$whereclause = '[id,like,'.$search.'%][role,like,'.$status.'][activationstatus,like,'.$activationstatus.'](or)[username,like,'.$search.'%][role,like,'.$status.'][activationstatus,like,'.$activationstatus.'](or)[contactnumber,like,'.$search.'%][role,like,'.$status.'][activationstatus,like,'.$activationstatus.'](or)[registerdate,like,'.$search.'%][role,like,'.$status.'][activationstatus,like,'.$activationstatus.'](or)[activationstatus,like,'.$search.'%][role,like,'.$status.'][activationstatus,like,'.$activationstatus.'%]';
			}
			else if($search != '')
				{$whereclause = '[id,like,'.$search.'%][role,like,'.$status.'](or)[username,like,'.$search.'%][role,like,'.$status.'](or)[contactnumber,like,'.$search.'%][role,like,'.$status.'](or)[registerdate,like,'.$search.'%][role,like,'.$status.'](or)[activationstatus,like,'.$search.'%][role,like,'.$status.']';
				}
		
			else{
				$whereclause = ($activationstatus == '')?'[role,=,'.$status.']':'[role,=,'.$status.'][activationstatus,=,'.$activationstatus.']';
			}
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
			
			$status = $_POST['role'];
			$search = $_POST['search'];
			if(isset($_POST['activationstatus']))
				$activationstatus = $_POST['activationstatus'];
			else
				$activationstatus= '';
				
			
			if($search != ''&& $activationstatus != ''){
				$whereclause = '[id,like,'.$search.'%][role,like,'.$status.'][activationstatus,like,'.$activationstatus.'](or)[username,like,'.$search.'%][role,like,'.$status.'][activationstatus,like,'.$activationstatus.'](or)[contactnumber,like,'.$search.'%][role,like,'.$status.'][activationstatus,like,'.$activationstatus.'](or)[registerdate,like,'.$search.'%][role,like,'.$status.'][activationstatus,like,'.$activationstatus.'](or)[activationstatus,like,'.$search.'%][role,like,'.$status.'][activationstatus,like,'.$activationstatus.'%]';
			}
			else if($search != '')
				{$whereclause = '[id,like,'.$search.'%][role,like,'.$status.'](or)[username,like,'.$search.'%][role,like,'.$status.'](or)[contactnumber,like,'.$search.'%][role,like,'.$status.'](or)[registerdate,like,'.$search.'%][role,like,'.$status.'](or)[activationstatus,like,'.$search.'%][role,like,'.$status.']';
				}
		
			else{
				$whereclause = ($activationstatus == '')?'[role,=,'.$status.']':'[role,=,'.$status.'][activationstatus,=,'.$activationstatus.']';
			}
			$table = "viewusers";
			$columns = "id,username,gender,dob,contactnumber,email,activationstatus,registerdate";
			$groupby = '';
			$sidx = 'id'; 
			$sord = 'desc'; 		
			$jqgriddata=new Model_xjqgridgetdata;
			$result=$jqgriddata->exportdata(1,0,$sidx,$sord,$table,$columns,$whereclause,$groupby);
			
			$result[0][0]="IOH Id (Login Username)";
			$result[0][1]="Name Of User";
			$result[0][2]="Gender";
			$result[0][3]="Date of Birth";
			$result[0][4]="Contact Number";
			$result[0][5]="Email";
			$result[0][6]="Activation Status";
			$result[0][7]="Registered On";

			$date = date_create();
			$date = date('Y_m_d_H_i');
			$i = 0;
			
			if($_POST['exportto'] == 'excel'){
				export::toexcel($result,'UsersList_'.$date.'.xls');
			}
			$this->display($errors,$messages,$whereclause);	
		}else{
			$errors['error'] = 'Could not search your query';
			$this->display($errors,$messages,$whereclause);
		}
	}
	
}	

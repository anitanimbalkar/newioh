<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/export.php');
class Controller_Ccashieraccounts extends Controller_Ctemplatewithmenu  {
	

	public function action_export(){
		
		$errors = array();
		$messages = array();
		$whereclause = '';
		if($_POST){
		
		$search = $_POST['selectname'];
		$transactiontype = $_POST['transactiontype'];
		$role = $_POST['role'];
		if(isset ($_POST['radiobtn']))
		{			
			if(($_POST['radiobtn'])=="receipt")
			{
			if ($_POST['transactiontype']!='')
				{
						$whereclause = '[modeid,=,'.$transactiontype.'][cr_dr_type,=,cr]';
				}
				else
				{
						$whereclause = '[cr_dr_type,=,cr]';
				}
			}
		
		
		if($_POST['radiobtn']=="bill")
		{			
			if ($_POST['transactiontype']==$transactiontype)
			{
				$whereclause = '[modeid,=,'.$transactiontype.'][cr_dr_type,=,cr]';
			}
			$whereclause = '[cr_dr_type,=,dr]';
		}
	}
		
		if(isset($_POST['searchtext']))
		{			
			$searchtext = $_POST['searchtext'];
		}

if (isset ($_POST['selectname']))
		$selectname= $_POST['selectname'];
		else
		if (isset ($_POST['role']))
		{
			$role = $_POST['role'];
		}
		if (isset ($_POST['selectname']))
		{
			$search = $_POST['selectname'];
		}

		if($role==2)
		{
			if($selectname !='')
			{
				$whereclause=$whereclause.'[patuid,=,'.$search.']';
			}
			else
			{
				$whereclause=$whereclause.'[patname,like,'.$searchtext.'%]';
			}
		}

		if($role==1)
		{
			if($selectname !='')
			{

				$whereclause=$whereclause.'[doctoruid,=,'.$search.']';
			}
			else
			{
				$whereclause=$whereclause.'[doctorname,like,'.$searchtext.'%]';
			}
		}
		

		if (isset ($_POST['durationtype']))
		$durationtype= $_POST['durationtype'];
		else
		if($durationtype='')
		{
			$duration['to'] ='';
			$duration['from'] ='';
		}
		if($durationtype == 'daily')
			{
				$duration['to'] = strtotime(date('d M Y'). "+24 hours");
				$duration['from'] = strtotime(date('d M Y'). "0 days");
			}
			if($durationtype == 'weekly'){
				$duration['to'] = strtotime(date('d M Y'). "+1 days");
				$duration['from'] = strtotime(date('d M Y'). "-7 days");
			}
			if($durationtype == 'monthly'){
				$duration['to'] = strtotime(date('d M Y'). "+1 days");
				$duration['from'] = strtotime(date('d M Y'). "-30 days");
			}
			if($durationtype == 'monthtodate'){
				$duration['to'] = strtotime(date('d M Y'). "+1 days");
				$duration['from'] = strtotime(date('d M Y'). "-1 year");
				
			}
			if($durationtype == 'yeartodate')
			{
				$duration['to'] = strtotime(date('d M Y'). "+1 days");
				$duration['from'] = strtotime(date('d M Y'). "-1 year");
			}
			if($durationtype == 'custom')
			{
				$from 	= $_POST['from'];
				$to	= $_POST['to'];
				$duration['to'] = strtotime($to. "+1 days");
				$duration['from'] = strtotime($from);
			}
			if($durationtype !='')
			{
				$whereclause=$whereclause."[txndate, >= ,".date('Y-m-d h:m:s',$duration['from'])."][txndate, <= ,".date('Y-m-d h:m:s',$duration['to'])."]";
			}
		
			$table = "allbillingdetail";
			$columns = "txndate,doctorname,amount,patname,caseno,amount,amount";
			$groupby = '';
			$sidx = 'txndate'; 
			$sord = 'desc'; 		
			$jqgriddata=new Model_xjqgridgetdata;
			$result=$jqgriddata->exportdata(1,0,$sidx,$sord,$table,$columns,$whereclause,$groupby);
			
			$result[0][0]="Date";
			$result[0][1]="Name";
			$result[0][2]="Bed No";
			$result[0][3]="Patient Name";
			$result[0][4]="Caseno";
			$result[0][5]="Bill No";
			$result[0][6]="Amount";

			$date = date_create();
			$date = date('Y_m_d_H_i');
			$i = 0;
						//var_dump($result);die;

			if($_POST['exportto'] == 'excel'){
				export::toexcel($result,'UsersList_'.$date.'.xls');
			}
			$this->display($errors,$messages,$whereclause);	
		}else{
			$errors['error'] = 'Could not search your query';
			$this->display($errors,$messages,$whereclause);
		}
	}
	

	public function action_view()
	{
		$errors = array();
		$messages= array();
		$_POST['role'] = '1';
		$_POST['selectname'] = '';
		$_POST['durationtype'] = '';
		$_POST['selectname1'] = '';
		$_POST['radiobtn'] = '';
		$duration['to'] ='';
		$duration['from'] ='';
		$_POST['transactiontype'] = '';
		$_POST['searchtext'] = '';
		$_POST['searchtext1'] = '';
		$transactiontype ='';
		$whereclause = '[cr_dr_type,=,dr]';
		$this->display($errors,$messages,$whereclause);
	}
	
	public function action_search()
	{
		$errors = array();
		$messages = array();
		$whereclause = '';
		$objProcess = ORM::factory('allbillingdetail');
		$search = $_POST['selectname'];
		$transactiontype = $_POST['transactiontype'];
		$role = $_POST['role'];
		
		if(isset ($_POST['radiobtn']))
		{			
			if(($_POST['radiobtn'])=="receipt")
			{
			if ($_POST['transactiontype']!='')
				{
						$whereclause = '[modeid,=,'.$transactiontype.'][cr_dr_type,=,cr]';
				}
				else
				{
						$whereclause = '[cr_dr_type,=,cr]';
				}
			}
		
		
		if($_POST['radiobtn']=="bill")
		{			
			if ($_POST['transactiontype']==$transactiontype)
			{
						$whereclause = '[modeid,=,'.$transactiontype.'][cr_dr_type,=,cr]';
			}
			$whereclause = '[cr_dr_type,=,dr]';
		}
	}
		
		if(isset($_POST['searchtext']))
		{			
			$searchtext = $_POST['searchtext'];
		}

		if (isset ($_POST['selectname']))
			$selectname= $_POST['selectname'];
		else
		if (isset ($_POST['role']))
		{
			$role = $_POST['role'];
		}
		if (isset ($_POST['selectname']))
		{
			$search = $_POST['selectname'];
		}

		if($role==2)
		{
			if($selectname !='')
			{
				$whereclause=$whereclause.'[patuid,=,'.$search.']';
			}
			else
			{
				$whereclause=$whereclause.'[patname,like,'.$searchtext.'%]';
			}
		}

		if($role==1)
		{
			if($selectname !='')
			{
				$whereclause=$whereclause.'[doctoruid,=,'.$search.']';
			}
			else
			{
				$whereclause=$whereclause.'[doctorname,like,'.$searchtext.'%]';
			}
		}
		

		if (isset ($_POST['durationtype']))
		$durationtype= $_POST['durationtype'];
		else
		if($durationtype='')
		{
			$duration['to'] ='';
			$duration['from'] ='';
		}
		if($durationtype == 'daily')
			{
				$duration['to'] = strtotime(date('d M Y'). "+24 hours");
				$duration['from'] = strtotime(date('d M Y'). "0 days");
				
			}
			if($durationtype == 'weekly'){
				$duration['to'] = strtotime(date('d M Y'). "+1 days");
				$duration['from'] = strtotime(date('d M Y'). "-7 days");

			}
			if($durationtype == 'monthly'){
				$duration['to'] = strtotime(date('d M Y'). "+1 days");
				$duration['from'] = strtotime(date('d M Y'). "-30 days");
			}
			if($durationtype == 'monthtodate'){
				$duration['to'] = strtotime(date('d M Y'). "+1 days");
				$duration['from'] = strtotime(date('d M Y'). "-1 year");
				
			}
			if($durationtype == 'yeartodate'){
				$duration['to'] = strtotime(date('d M Y'). "+1 days");
				$duration['from'] = strtotime(date('d M Y'). "-1 year");
				
			}
			if($durationtype == 'custom'){
				//$type 	= $_POST['type'];
				$from 	= $_POST['from'];
				$to	= $_POST['to'];
				$duration['to'] = strtotime($to. "+1 days");
				$duration['from'] = strtotime($from);
				
			}
			if($durationtype !=''){
				$whereclause=$whereclause."[txndate, >= ,".date('Y-m-d h:m:s',$duration['from'])."][txndate, <= ,".date('Y-m-d h:m:s',$duration['to'])."]";
						// $this->display($errors,$messages,$whereclause);
					}
		
			$errors['error'] = 'Could not search your query';
			$this->display($errors,$messages,$whereclause);
			}

	private function display($errors, $messages, $whereclause){
		$user = Auth::instance()->get_user();
			$userid=$user->id;
			$staffobj=ORM::factory('staff')->where('refstaffuserid_c','=',$userid)->find();
			 $hospitalid=$staffobj->refhospitalid_c;
		
		$role=$_POST['role'];
		$durationtype=$_POST['durationtype'];
				//var_dump($whereclause);
	
		$content = View::factory('vuser/vstaff/vcashieraccountstatement');
		//SELECT activationstatus FROM viewusers WHERE role= "doctor" GROUP BY activationstatus ;
		$docnamearray=array();
				$array_status= array();

		if($role=="1")
		{
		$objViewUsers= ORM::factory('allbillingdetail')->where('hospitalid','=',$hospitalid)
													   ->group_by('doctoruid')->find_all();

		//array_push($array_status,"All");
		foreach($objViewUsers as $objViewUser )
		{
			$docnamearray['docname']=$objViewUser->doctorname;
			$docnamearray['docid']=$objViewUser->doctoruid;
						array_push($array_status, $docnamearray);
						//var_dump($array_status);

			
		}
	}
			else if($role=='2')
		 	{
						$objViewUsers= ORM::factory('allbillingdetail')->where('hospitalid','=',$hospitalid)
																	   ->group_by('patuid')
																	   ->find_all();
				foreach($objViewUsers as $objViewUser )
				{
					$docnamearray['docname']=$objViewUser->patname;
					$docnamearray['docid']=$objViewUser->patuid;
						array_push($array_status, $docnamearray);

			}

		}
		
		$content->bind('errors',$errors);
		$content->bind('messages',$messages);
		$content->bind('whereclause',$whereclause);
		$content->bind('array_status',$array_status);
		$this->template->content = $content;
		
	}
	





}
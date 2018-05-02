<?php defined('SYSPATH') or die('No direct script access.');
include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/export.php');

class Controller_Cipdwarddetail extends Controller_Ctemplatewithmenu  {

public function action_wardlist()
	{
		$user = Auth::instance()->get_user();
			$userid=$user->id;
			$staffobj=ORM::factory('staff')->where('refstaffuserid_c','=',$userid)->find();
			$header_cashier=$staffobj->header_c;
			$footer_cashier=$staffobj->footer_c;
			$hospitalid=$staffobj->refhospitalid_c;
		$patientsid=$_GET['patId'];
		$patName=$_GET['patName'];
		 //$hospitalid=$_GET['hospitalid'];
		$namearray=array();
		$ward=array();
		$objgeneral = ORM::factory('wardbedroomdetail')->where('hospitalid','=',$hospitalid)
													   ->where('statusflag','=','Active')
													   ->group_by('wardname')
													   ->find_all();

		 foreach ($objgeneral as $wardvalue)
		  {
	
				$namearray['wardname']=$wardvalue->wardname;
				$namearray['wardid']=$wardvalue->warduserid;
				$namearray['wardlist']=$this->getgeneralList($namearray['wardid'],$hospitalid);
				array_push($ward, $namearray);

		  }
//var_dump($ward);

		$content	= View::factory('vuser/vipdward/vwarddetail');

		$content->bind('ward',$ward);
		$content->bind('hospitalid',$hospitalid);
		$content->bind('patName',$patName);
		$content->bind('patientsid',$patientsid);
		$content->bind('header_cashier',$header_cashier);	
		$content->bind('footer_cashier',$footer_cashier);	

		
		$this->template->content= $content;


	}

	private function getgeneralList($wardid,$hospitalid)
	{
		//var_dump($wardid);		
		$wardlist=array();
		$wardarray=array();
				$objwardlist = ORM::factory('wardbedroomdetail')->where('warduserid','=',$wardid)
																->where('hospitalid','=',$hospitalid)
																->where('statusflag','=','Active')
																->find_all();
		foreach ($objwardlist as $wardvalue)
		  {
	
				$wardlist['bednumber']=$wardvalue->bednumber;
				$wardlist['roomno']=$wardvalue->roomno;
				$wardlist['patientname']=$wardvalue->patientname;
				$wardlist['bedstatus']=$wardvalue->bedstatus;
				$wardlist['admitdate']=$wardvalue->admitdate;
				$wardlist['patuserid']=$wardvalue->patuserid;
				$wardlist['caseno']=$wardvalue->caseno;

				array_push($wardarray, $wardlist);

		  }										
		   //var_dump($wardarray);
		return $wardarray;
		
	}

public function action_view()
	{
		$user = Auth::instance()->get_user();
			$userid=$user->id;
			$staffobj=ORM::factory('staff')->where('refstaffuserid_c','=',$userid)->find();
			$header_cashier=$staffobj->header_c;
			$footer_cashier=$staffobj->footer_c;
			 $hospitalid=$staffobj->refhospitalid_c;
		
		$patientsid=null;
		$patName=null;
		 //$hospitalid=null;
		//var_dump($patName);
		$namearray=array();
		$ward=array();
		$objgeneral = ORM::factory('wardbedroomdetail')->where('statusflag','=','Active')
														->where('hospitalid','=',$hospitalid)
														->group_by('wardname')
														->find_all();

		 foreach ($objgeneral as $wardvalue)
		  {
	
				$namearray['wardname']=$wardvalue->wardname;
				$namearray['wardid']=$wardvalue->warduserid;
				$namearray['wardlist']=$this->getList($namearray['wardid'],$hospitalid);
				array_push($ward, $namearray);

		  }
//var_dump($ward);

		$content	= View::factory('vuser/vipdward/vwarddetail');

		$content->bind('ward',$ward);
		$content->bind('hospitalid',$hospitalid);
		$content->bind('patName',$patName);
		$content->bind('patientsid',$patientsid);
		$content->bind('header_cashier',$header_cashier);	
		$content->bind('footer_cashier',$footer_cashier);	

		$this->template->content= $content;


	}

	private function getList($wardid,$hospitalid)
	{
		//var_dump($wardid);		
		$wardlist=array();
		$wardarray=array();
				$objwardlist = ORM::factory('wardbedroomdetail')->where('warduserid','=',$wardid)
																->where('hospitalid','=',$hospitalid)
                											    ->where('statusflag','=','Active')
																->find_all();
		foreach ($objwardlist as $wardvalue)
		  {
	
				$wardlist['bednumber']=$wardvalue->bednumber;
				$wardlist['roomno']=$wardvalue->roomno;
				$wardlist['patientname']=$wardvalue->patientname;
				$wardlist['bedstatus']=$wardvalue->bedstatus;
				$wardlist['admitdate']=$wardvalue->admitdate;
				$wardlist['patuserid']=$wardvalue->patuserid;
				$wardlist['caseno']=$wardvalue->caseno;

				array_push($wardarray, $wardlist);

		  }										
		   //var_dump($wardarray);
		return $wardarray;
		
	}



}
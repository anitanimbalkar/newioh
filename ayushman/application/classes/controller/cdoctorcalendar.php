<?php defined('SYSPATH') or die('No direct script access.');
 require_once 'WebRequest.php';
class Controller_Cdoctorcalendar extends Controller {
		
	public function action_getappcal()
	{	
		$doctorid = $_GET['doctorid'];		
		
		$objdoc = new Model_Doctor;
		$result = $objdoc ->where ('refdoctorsid_c', '=', $doctorid)-> find_all();
		foreach($result as $res)
		{
			$doccalid= $res->refappointmentscalid_c;
		}
		if(is_null($doccalid))
		{
			
		
			$url = "http://".$_SERVER["HTTP_HOST"]."/TDE_AppCalendar/admin/admin.php";
			$data = array('passAdmin' => 'pass', 'Submit' => 'Enter','newcal' => 'cal','newuser' => 'test','newpass' =>'test','newlang' =>'ENG','newnpages' =>'1','newctype'=>'2','newmessage'=>'Please select your appointment.','send'=>'Add');			
			
			$webRequest = new WebRequest();			
			$appcal = $webRequest->get($url,$data);
			
			$dom = new DOMDocument;
    		 @ $dom->loadHTML($appcal);
			 $xpath = new DOMXPath( $dom );
			$links = $xpath->query( "//input[@name='appointmentid']" );
			foreach ( $links as $link )
			{			
				$appointmentid= $link->getAttribute('value');
			}
			
			$objdoc = new Model_Doctor;
		 	$objdoc ->where ('refdoctorsid_c', '=', $doctorid)-> find();
		
			if ($objdoc->loaded())
			{
				$objdoc->refappointmentscalid_c= $appointmentid;
				$objdoc->save();				
			}
			else{
					die("error");
			}
			echo $appointmentid;
		}
		else
		{
			echo $doccalid;
		}
	}	
	
}
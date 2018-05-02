<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cdoctorscheduleviewer extends Controller_Ctemplatewithmenu {
		
	public function action_view()
	{	
		$objuser = Auth::instance()->get_user();
		$objdoc = new Model_Doctor;
		$objdoc ->where ('refdoctorsid_c', '=', $objuser->id)-> find();
		$docid = $objdoc->id;
		$objdoccalendar = new Model_Doctorcalendar;
		$objdoccalendar -> where('refdoctorcalendardoctorid_c','=',$docid)->find();
		
		if(is_null( $objdoccalendar->id))
		{
			$objdoccalendar = new Model_Doctorcalendar;
			$objdoccalendar->refdoctorcalendardoctorid_c = $objdoc->id;
			$doccalendarid = $objdoccalendar->save();
		}
		else
		$doccalendarid = $objdoccalendar->id;	
		
		$objdoctorschedule = new Model_Doctorschedule;
		$objdoctorschedule=$objdoctorschedule-> where('refdocschedulecalendarid_c','=',$doccalendarid )->where('status_c','=','active')->find_all() ;
		$schedules =array();
		foreach($objdoctorschedule as $res)	
		{
			$schedules[$res->id]=$res->schedulename_c;
		}
		$schedules = array_unique($schedules);
		
		$content = View::factory('vuser/vdoctor/vdoctorsetschedule')
							->bind('errors', $errors);
		
		$content->bind('doccalid', $doccalendarid);
		$content->bind('docid', $docid);					
		$content->bind('schedules', $schedules);					
		$username = "Dr. ".trim($objuser->Firstname_c);
		$urole = "doctor";
		$breadcrumb = "Home>>Set Schedule";
        $this->template->breadcrumb = $breadcrumb;
        $this->template->user = $username;
		$this->template->content = $content;
		$this->template->urole = $urole;
	}	
	
	public function action_showschedule()
	{
		$objuser = Auth::instance()->get_user();							
		$doccalendarid = $_GET["calid"];
		$objdoctorschedule = new Model_Doctorschedule;
		$objdoctorschedule=$objdoctorschedule-> where('refdocschedulecalendarid_c','=',$doccalendarid )->where('status_c','=','active') ->find_all();
		$slotsarray = array();$i=0;
		$removelabel = FALSE;
		if(! array_key_exists( 'viewer',$_GET))
		{
			$content = View::factory('vuser/vdoctor/vshowoctorschedule')
							->bind('errors', $errors);			
		}			
		else
		{
			$content = View::factory('vuser/vdoctor/vshowoctorscheduleforpatient')
							->bind('errors', $errors);
			$removelabel = TRUE;
		}
			
		foreach($objdoctorschedule as $res)
		{			
			$objdoctorscheduleslots = new Model_Doctorscheduleslot;
			$objdoctorscheduleslots = $objdoctorscheduleslots->where("refdoctorscheduleslotid_c","=",$res->id)->find_all();
			$startdate = date( 'Y-m-d l',strtotime($res->startdate_c ));
			$enddate = date( 'Y-m-d l',strtotime($res->enddate_c ));
			$diff =strtotime( $enddate) - strtotime( $startdate);				
			$diff =  floor($diff/(60*60*24));
			$restdates = $res->restricteddates_c;
			$restdates = explode(',',$restdates);
			$restricteddates = array();
			for($i=0;$i<count($restdates );$i++)
			{					
				array_push($restricteddates ,date('Y-m-d', strtotime($restdates[$i] )));
			}
			for($d= 0 ;$d<=$diff; $d++) 
			{				
				$date = date( 'Y-m-d l',strtotime($startdate .$d." days"));		
				if(! in_array(date('Y-m-d',strtotime($date)) ,$restricteddates ))			
				{				
					foreach($objdoctorscheduleslots as $slots)
					{										
						if($date <=$enddate && $slots->weekday_c == date( 'l',strtotime($date)) )
						{
							$eventarray = array();
							if($removelabel)
								$eventarray['title'] = " ".$slots->refchargetype_c ." & ".$slots->modetype_c."" ;
							else
								$eventarray['title'] = " ". $res->schedulename_c." & ". $slots->refchargetype_c ." & ".$slots->modetype_c ;
							$sttime = $slots->slotstarttime_c;						
							$sttime = explode(":",$sttime );						
							$eventarray['start'] = date( 'Y-m-d H:i', mktime( (int) $sttime[0],(int) $sttime[1],0 ,date( 'm',strtotime($date)) ,date( 'd',strtotime($date)) ,date( 'Y',strtotime($date))));
							$edtime = $slots->slotendtime_c;
							$edtime = explode(":",$edtime );
							$eventarray['end'] =  date( 'Y-m-d H:i', mktime( (int) $edtime[0],(int)$edtime[1],0 ,date( 'm',strtotime($date)) ,date( 'd',strtotime($date)) ,date( 'Y',strtotime($date)))) ;
							$eventarray['allDay'] = false ;
							array_push($slotsarray,$eventarray);;
						}
					}
				}				
			}				
		}
		
			
		if(! array_key_exists( 'scheduleid',$_GET))
			$scheduleid="";
		else
			$scheduleid = $_GET['scheduleid'];
		if(! is_null($scheduleid) && (! empty($scheduleid) )) 
		{
			$objscheduledata = new Model_Doctorschedule;
			$objscheduledata->where('id','=',$scheduleid)->find();
			$calstartdate = date( 'Y-m-d',strtotime($objscheduledata->startdate_c));		
		}
		else
			$calstartdate = date("Y-m-d") ;
		
		$username = "Dr. ".trim($objuser->Firstname_c);
		$urole = "doctor";
		
		$content->bind('slotsarray', $slotsarray);
		$content->bind('startdate', $calstartdate);
		$breadcrumb = "Home>>View Schedule";
        $this->template->breadcrumb = $breadcrumb;
        $this->template->user = $username;
		$this->template->content = $content;
		$this->template->urole = $urole;
	}
}
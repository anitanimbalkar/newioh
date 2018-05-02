<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cdoctorscheduler extends Controller {

	public function action_saveschedule()
	{	
		//get all data from $_POST variable
		$startdate = $_POST["startdate"];
		$startdate = date('Y-m-d',strtotime($startdate));
		$enddate = $_POST["enddate"];
		$enddate = date('Y-m-d',strtotime($enddate));
		$doccalendarid = $_POST["calid"];
		$docid = $_POST["docid"];
		$shortvisit = $_POST["shortvisit"];
		$longvisit = $_POST["longvisit"];
		$appstartegy = $_POST["appstartegy"];
		$restricteddates = $_POST["restricteddates"];		
		$mondaydata = $_POST["monday"];		
		$tuesdaydata = $_POST["tuesday"];
		$wednesdaydata = $_POST["wednesday"];
		$thursdaydata = $_POST["thursday"];
		$fridaydata = $_POST["friday"];
		$saturdaydata = $_POST["saturday"];
		$sundaydata = $_POST["sunday"];
		$chargetype = $_POST["chargetype"];
		$schedulename = $_POST["schedulename"];
		if($appstartegy == "blockslot")
			$blockval = $_POST["blockval"];
		else
			$blockval ="";		
		
		//get actual dates in the range of start date and end date
		$completearr = $this->getdatesinrange($startdate,$enddate) ;
		
		//find all active schedules of the doctor
		$objdoctorschedule = new Model_Doctorschedule;
		$objdoctorschedule=$objdoctorschedule-> where('refdocschedulecalendarid_c','=',$doccalendarid )->where('status_c','=','active') ->find_all();
		
		//if any previous schedule overlaps then delete it		
		foreach($objdoctorschedule as $res)
		{
			for($i=0;$i<sizeof($completearr);$i++ )
			{
				if($res->startdate_c <= $completearr[$i] && $completearr[$i]<=$res->enddate_c )
				{
					$oldscheduleid =$res->id;
					$objdoctorschedule = new Model_Doctorschedule;
					$objdoctorschedule-> where('id','=',$oldscheduleid );
					
					foreach($objdoctorschedule->find_all() as $res)
					{
						$objdoctorscheduleslots = new Model_Doctorscheduleslot;			
						$objdoctorscheduleslots = $objdoctorscheduleslots->where('refdoctorscheduleslotid_c','=',$res->id)->find_all();
						foreach($objdoctorscheduleslots as $r )
						{
							$r->delete();							
						}
						$res->delete();
					}
				}
			}
		}	
		
		//push all new restricted dates in $newresticteddates
		$arrresdates= explode(",", $restricteddates);
		$newresticteddates = array();
		
		for($j=0;$j<sizeof($arrresdates);$j++ )
		{
			if( strtotime($startdate)<= strtotime($arrresdates[$j]  )  && strtotime($arrresdates[$j]) <= strtotime( $enddate) )
			{
				array_push( $newresticteddates, date('Y-m-d',strtotime( $arrresdates[$j])));
			}			
		}
		
		//set new scheule and save it
		for($i=0;$i<sizeof($completearr);$i++ )
		{
			$result = $this->savedocschedule($doccalendarid,$completearr[$i] ,$completearr[$i] ,$shortvisit,$longvisit,$blockval,$appstartegy,$restricteddates,$schedulename);
			if( array_search($completearr[$i],( $newresticteddates)) == FALSE)
			{
				
				$this->adddayschedule($result,date('l',strtotime($completearr[$i] )) ,$mondaydata,$tuesdaydata,$wednesdaydata,$thursdaydata,$fridaydata,$saturdaydata,$sundaydata );
			}
		}
		echo $result;	
	}
	
	//get calendar data for view calendar 
	public function action_getschedulefromdb()
	{
		$doccalendarid = $_GET["calid"];
		$schedulenm = trim($_GET["schedulenm"]);
		$objdoctorschedule = new Model_Doctorschedule;		
		$objdoctorschedule=$objdoctorschedule->where('refdocschedulecalendarid_c','=',$doccalendarid )->where('status_c','=','active')->where('schedulename_c','=',$schedulenm) ->find_all();
		$arscheduledata = array();
		$calstart="";
		$calend="";
		$j=0;
		$arscheduledatafromdb = array();
		foreach($objdoctorschedule as $res)
		{
			$objdoctorscheduleslots = new Model_Doctorscheduleslot;	
			$objdoctorscheduleslots = $objdoctorscheduleslots->where('refdoctorscheduleslotid_c','=',$res->id);
			$objdoctorscheduleslots->reset(FALSE);
			$rowcount = $objdoctorscheduleslots->count_all();
			$objdoctorscheduleslots->find_all();
			$objdoctorscheduleslots = $objdoctorscheduleslots->where('refdoctorscheduleslotid_c','=',$res->id)->find_all();
			if($j==0)
				$calstart = $res->startdate_c;
			if( $rowcount >= 1 )
			{				
				$arslots = array();
				$arslots['startdate']=$res->startdate_c ;
				$arslots['shortvisit']=$res-> shortvisitduration_c;
				$arslots['longvisit']=$res->longvisitduration_c ;
				$arslots['blockofminutes']=$res-> blockofminutes_c;
				$arslots['restricteddates']=$res-> restricteddates_c;
				$arslots['appstrategytype']=$res-> appstrategytype_c;
				$slots = array();
				$i=0;
				$day = date('l',strtotime($res->startdate_c) );
				foreach($objdoctorscheduleslots as $r)
				{
					$arslots[$i] = array();
					$slots['charge'] = $r->refchargetype_c;
					$slots['mode'] = $r->modetype_c;
					$day = $r->weekday_c;
					$slots['day'] = $r->weekday_c;
					$slots['slotstart'] = date('H:i', strtotime($r->slotstarttime_c));
					$slots['slotend'] =date('H:i', strtotime($r->slotendtime_c));
					$slots['slots'] = $r->slots_c;
					$arslots['slotdtls'][$i] = $slots;
					$i++;
				}				
				$arslots['day']=$day;				
				array_push($arscheduledata,$arslots);
			}
			$j++;		
			$calend =  $res->startdate_c;
		}
		$arscheduledatafromdb['scheduldatafromdb'] = $arscheduledata;
		$arscheduledatafromdb['calstart']= date( 'd M Y', strtotime( $calstart));
		$arscheduledatafromdb['calend']=date( 'd M Y',strtotime($calend));
		//var_dump($arscheduledatafromdb);
		die(json_encode($arscheduledatafromdb));
	}
	
	public function action_checkscheduleavailability()
	{
		//get required info from $_GET
		$startdate = $_GET["startdate"];
		$startdate = date('Y-m-d',strtotime($startdate));
		$enddate = $_GET["enddate"];
		$enddate = date('Y-m-d',strtotime($enddate));		
		$doccalendarid = $_GET["calid"];
		
		//find all active schedules for the doctor
		$objdoctorschedule = new Model_Doctorschedule;
		$objdoctorschedule=$objdoctorschedule-> where('refdocschedulecalendarid_c','=',$doccalendarid )->where('status_c','=','active') ->find_all();
		
		//check if any previous appointments are getting affected
		$arscheduledapps =  array();
		$ardocscheduledapps =  array();$i=0;
		foreach($objdoctorschedule as $res)
		{
			$availability = $this->check_in_range($res->startdate_c,$res->enddate_c,$startdate);	
			if($availability == 1)
			{
				$objdocscheduleovrlappingapps = new Model_Docscheduleoverlappingapp;
				$objdocscheduleovrlappingapps=$objdocscheduleovrlappingapps->where('startdate_c',">=", $startdate)->where('enddate_c','<=',$enddate)->where('refdocschedulecalendarid_c','=',$doccalendarid )->find_all();
				
				foreach($objdocscheduleovrlappingapps as $result)
				{
					$ardocscheduledapps[$i]=array();
					$arscheduledapps['id']=$result->id;
					$arscheduledapps['startdate_c']=$result->startdate_c;
					$arscheduledapps['enddate_c']=$result->enddate_c;
					$arscheduledapps['scheduledstarttime_c']=$result->scheduledstarttime_c;
					$arscheduledapps['ptname']=$result->ptname;
					$ardocscheduledapps[$i] = $arscheduledapps;
					$i++;
				}
			}
		}	
		
		//return array of affected appointments
		echo json_encode(($ardocscheduledapps));
	}

	public function action_cancelapps()
	{
		//get all info from $_POST
		$startdate = $_POST["startdate"];
		$startdate = date('Y-m-d',strtotime($startdate));
		$enddate = $_POST["enddate"];
		$enddate = date('Y-m-d',strtotime($enddate));
		$doccalendarid = $_POST["calid"];
		$docid = $_POST["docid"];
		$shortvisit = $_POST["shortvisit"];
		$longvisit = $_POST["longvisit"];
		$appstartegy = $_POST["appstartegy"];
		$restricteddates = $_POST["restricteddates"];		
		$mondaydata = $_POST["monday"];		
		$tuesdaydata = $_POST["tuesday"];
		$wednesdaydata = $_POST["wednesday"];
		$thursdaydata = $_POST["thursday"];
		$fridaydata = $_POST["friday"];
		$saturdaydata = $_POST["saturday"];
		$sundaydata = $_POST["sunday"];
		$chargetype = $_POST["chargetype"];
		$schedulename = $_POST["schedulename"];
		if($appstartegy == "blockslot")
			$blockval = $_POST["blockval"];
		else
			$blockval ="";		
			
		//find all active schedules for the doctor
		$objdoctorschedule = new Model_Doctorschedule;
		$objdoctorschedule=$objdoctorschedule-> where('refdocschedulecalendarid_c','=',$doccalendarid )->where('status_c','=','active') ->find_all();
		
		//find all overlapping appointments and send email to patients regarding cancelltaion
		$arscheduledapps =  array();
		$ardocscheduledapps =  array();$i=0;
		foreach($objdoctorschedule as $res)
		{
			$availability = $this->check_in_range($res->startdate_c,$res->enddate_c,$startdate);	
			if($availability == 1)
			{
				$objdocscheduleovrlappingapps = new Model_Docscheduleoverlappingapp;
				$objdocscheduleovrlappingapps=$objdocscheduleovrlappingapps->where('startdate_c',">=", $startdate)->where('enddate_c','<=',$enddate)->where('refdocschedulecalendarid_c','=',$doccalendarid )->find_all();
				$arappids =array();
				foreach($objdocscheduleovrlappingapps as $result)
				{					
					if(! (array_key_exists($result->id ,$arappids) ))
					{
						$objappointments = new Model_Appointment;
						$objappointments->where('id','=',$result->id)->find();
						$objappointments->refappointmentstatusesid_c='3';
						$objappointments->save();
						$email = $result->email;
						$emailbody = "Your Appointment with Dr. ".$result->docnm." at ".$result->scheduledstarttime_c ." has been cancelled by doctor ";
						$subject = "Your Appointment with Dr. ".$result->docnm." at ".$result->scheduledstarttime_c ." has been cancelled by doctor " ;
						$name="";
						$emailsendrequest=Request::factory('cemailsender/emailwithoutattachement');
						$emailsendrequest->post('email',$email);
						$emailsendrequest->post('emailbody',$emailbody);
						$emailsendrequest->post('subject',$subject);
						$emailsendrequest->post('name',$name);
						$emailsendrequest->execute();
						array_push($arappids,$result->id);
					}						
				}
			}
		}
		
		//get all dates in range
		$completearr = $this->getdatesinrange($startdate,$enddate) ;
		
		//delete all previous schedules of doctor
		$objdoctorschedule = new Model_Doctorschedule;
		$objdoctorschedule=$objdoctorschedule-> where('refdocschedulecalendarid_c','=',$doccalendarid )->where('status_c','=','active') ->find_all();
				
		foreach($objdoctorschedule as $res)
		{
			for($i=0;$i<sizeof($completearr);$i++ )
			{
				if($res->startdate_c <= $completearr[$i] && $completearr[$i]<=$res->enddate_c )
				{
					$oldscheduleid =$res->id;
					$objdoctorschedule = new Model_Doctorschedule;
					$objdoctorschedule-> where('id','=',$oldscheduleid );
					
					foreach($objdoctorschedule->find_all() as $res)
					{
						$objdoctorscheduleslots = new Model_Doctorscheduleslot;			
						$objdoctorscheduleslots = $objdoctorscheduleslots->where('refdoctorscheduleslotid_c','=',$res->id)->find_all();
						foreach($objdoctorscheduleslots as $r )
						{
							$r->delete();							
						}
						$res->delete();
					}
				}
			}
		}	
		
		//put all restricted dates into $newresticteddates
		$arrresdates= explode(",", $restricteddates);
		$newresticteddates = array();
		
		for($j=0;$j<sizeof($arrresdates);$j++ )
		{
			if( strtotime($startdate)<= strtotime($arrresdates[$j]  )  && strtotime($arrresdates[$j]) <= strtotime( $enddate) )
			{
				array_push( $newresticteddates, date('Y-m-d',strtotime( $arrresdates[$j])));
			}			
		}
		
		
		//set new schedule for doctor
		for($i=0;$i<sizeof($completearr);$i++ )
		{
			$result = $this->savedocschedule($doccalendarid,$completearr[$i] ,$completearr[$i] ,$shortvisit,$longvisit,$blockval,$appstartegy,$restricteddates,$schedulename);
			if( array_search($completearr[$i],( $newresticteddates)) == FALSE)
			{
				$this->adddayschedule($result,date('l',strtotime($completearr[$i] )) ,$mondaydata,$tuesdaydata,$wednesdaydata,$thursdaydata,$fridaydata,$saturdaydata,$sundaydata );
			}
		}
		echo $result;
	}

	public function action_retainapps()
	{	
		//get all info from $_POST	
		$startdate = $_POST["startdate"];
		$startdate = date('Y-m-d',strtotime($startdate));
		$enddate = $_POST["enddate"];
		$enddate = date('Y-m-d',strtotime($enddate));
		$doccalendarid = $_POST["calid"];
		$docid = $_POST["docid"];
		$shortvisit = $_POST["shortvisit"];
		$longvisit = $_POST["longvisit"];
		$appstartegy = $_POST["appstartegy"];
		$restricteddates = $_POST["restricteddates"];		
		$mondaydata = $_POST["monday"];		
		$tuesdaydata = $_POST["tuesday"];
		$wednesdaydata = $_POST["wednesday"];
		$thursdaydata = $_POST["thursday"];
		$fridaydata = $_POST["friday"];
		$saturdaydata = $_POST["saturday"];
		$sundaydata = $_POST["sunday"];
		$chargetype = $_POST["chargetype"];
		$schedulename = $_POST["schedulename"];
		if($appstartegy == "blockslot")
			$blockval = $_POST["blockval"];
		else
			$blockval ="";		
	
		//get all dates in the range of start date and end date	
		$completedatearr = $this->getdatesinrange($startdate,$enddate) ;
		
		//find all overlapping appointments	
		$objdocscheduleovrlappingapps = new Model_Docscheduleoverlappingapp;
		$objdocscheduleovrlappingapps=$objdocscheduleovrlappingapps->where('startdate_c',">=", $startdate)->where('enddate_c','<=',$enddate)->where('refdocschedulecalendarid_c','=',$doccalendarid )->find_all();
		
		//put info of overlapping appointments in $arapps and $arappdate
		$arapps = array();
		$arappdate = array();
		foreach($objdocscheduleovrlappingapps as $result)
		{
			//array_push($arapps,($result->scheduledstarttime_c));					
			$arappdtls['apptime'] = $result->scheduledstarttime_c;
			$arappdtls['appduration'] = $result->appdurationinmins_c;
			$arappdtls['slottype'] = ucwords($result->slottype_c);
			$arappdtls['consultationmode'] = ucwords($result->consultationmode_c);
			array_push($arapps,$arappdtls);
			array_push($arappdate,date('Y-m-d', strtotime($result->scheduledstarttime_c)));					
		}
		$arappdate = (array_unique($arappdate));
		
		//get all non overlapping dates and put it in $ardiff
		$arrdiff=array();
		$arrdiff = array_diff($completedatearr,$arappdate);
		$ardiff = array();
		foreach($arrdiff as $ad)
		{
			array_push( $ardiff,$ad);
		}
		
		//put all dates from $arappdate to $arappdates
		$arappdates =array();
		foreach($arappdate as $d )
		{
			array_push($arappdates,$d);
		}
		
		//find all overlapping schedules and delete them
		$objdoctorschedule = new Model_Doctorschedule;
		$objdoctorschedule=$objdoctorschedule-> where('refdocschedulecalendarid_c','=',$doccalendarid )->where('status_c','=','active')->where('startdate_c' ,'>=',$startdate) ->find_all();
		
		
		foreach($objdoctorschedule as $res)
		{
			for($i=0;$i<sizeof($completedatearr);$i++ )
			{
				if($res->startdate_c <= $completedatearr[$i] && $completedatearr[$i]<=$res->enddate_c )
				{
					
					$oldscheduleid =$res->id;
					$objdoctorschedule = new Model_Doctorschedule;
					$objdoctorschedule-> where('id','=',$oldscheduleid );
					
					foreach($objdoctorschedule->find_all() as $res)
					{
						$objdoctorscheduleslots = new Model_Doctorscheduleslot;			
						$objdoctorscheduleslots->where('refdoctorscheduleslotid_c','=',$res->id);
						foreach($objdoctorscheduleslots->find_all() as $r )
						{
							$r->delete();
						}
						$res->delete();
					}
				}
			}
		}
		$arrappointmenttime =array();
		//save and check schedule for all dates between start and end date
		for($i=0;$i<sizeof($completedatearr);$i++ )
		{
			$arnewdaydata =array();
			$ardaydata =array();
			$daynm = date('l',strtotime($completedatearr[$i] ) );
			//get day data for specific [$completedatearr] date
		
			$ardaydata= json_decode( $this->getdayscheduleslots($daynm,$mondaydata,$tuesdaydata,$wednesdaydata,$thursdaydata,$fridaydata,$saturdaydata,$sundaydata));
			$result = $this->savedocschedule($doccalendarid,$completedatearr[$i] ,$completedatearr[$i] ,$shortvisit,$longvisit,$blockval,$appstartegy,$restricteddates,$schedulename);
			
			$a = 0;
			$finaldatedataarr 		= array();
			$finaldatedataarr[$completedatearr[$i]]	= array();
			$arrappointmentdata= array();
			
			for($j=0;$j<sizeof($arapps);$j++ )
			{
				$appointmenttime = $arapps[$j]['apptime'];
				$appointmentduration = $arapps[$j]['appduration'];
				array_push($arrappointmenttime, date('H:i', strtotime($appointmenttime )) );
				if(strtotime($completedatearr[$i])== strtotime( date('Y-m-d', strtotime( $appointmenttime ) ) ) )
				{
					$today = $completedatearr[$i];
					
					if(sizeof($ardaydata)>=1 || !empty($ardaydata) )
					{
						if(! array_key_exists($completedatearr[$i],$arrappointmentdata ))
						{
							$arrappointmentdata[$completedatearr[$i]]=$ardaydata;
						}
						
						$arslots = array();
						$duparray= array();
						$time = date('H:i',strtotime($appointmenttime));
						$m1 = explode(":",$time);
						$t= date( 'Y-m-d H:i', mktime( (int) $m1[0],(int) $m1[1],0 ,date( 'm',strtotime($today)) ,date( 'd',strtotime($today)) ,date( 'Y',strtotime($today)))); //appointment time
						foreach ( $ardaydata as $daydata)
						{
							$timeinternal1 = $daydata[0];//slot start time
							$timeinternal2 = $daydata[1];//slot end time
							
							$timeinternal = explode(':', $timeinternal1);
							$timeinternal3 = explode(':', $timeinternal2);
							
							$newdaydata = array();
							$newdaydata = $daydata;
							$arslots = $daydata[4];
							
							$enddurationarslots = $this->create_endtimeslots($arslots,$appointmentduration) ;
							
							$starttime = date( 'Y-m-d H:i',mktime( (int) $timeinternal[0] ,(int) $timeinternal[1],0 , date('m',strtotime($today)) ,date( 'd',strtotime($today)),date('Y',strtotime($today))));
							$endtime = date( 'Y-m-d H:i',mktime( (int) $timeinternal3[0] ,(int) $timeinternal3[1],0 , date('m',strtotime($today)) ,date( 'd',strtotime($today)),date('Y',strtotime($today))));
							$flag = false;
							$arslotsnew = $arslots;
							if( $this->check_in_range($starttime,$endtime, $t) )
							{
								
								for($n=0;$n<sizeof($arslots);$n++ )
								{
									$m1 = explode(":",$arslots[$n] );			
									$m2 = explode(":",$enddurationarslots[$n] );	
									
									$stt1= date( 'Y-m-d H:i',mktime( (int) $m1[0] ,(int) $m1[1],0 , date('m',strtotime($today)) ,date( 'd',strtotime($today)),date('Y',strtotime($today))));
									$edt2 = date('Y-m-d H:i',mktime( (int) $m2[0] ,(int) $m2[1] ,0 , date('m',strtotime($today)) ,date( 'd',strtotime($today)),date('Y',strtotime($today))));
									if(strtotime($t) != strtotime($stt1) )
									{
										if($this->check_in_range($stt1,$edt2,$t ) == 1)
										{	
											$flag = true;
											array_push($duparray ,$arslotsnew[$n]);	
											$arslotsnew[$n] ="";
											if( $n+1 <=sizeof($arslots)  )
											{											
												$m1 = explode(":",$arslots[$n+1] );	
												if( ((strtotime( date( 'Y-m-d H:i',mktime( (int) $m1[0] ,(int) $m1[1],0 , date('m',strtotime($today)) ,date( 'd',strtotime($today)),date('Y',strtotime($today))))) - strtotime($t) ) /60) <$appointmentduration && ((strtotime( date( 'Y-m-d H:i',mktime( (int) $m1[0] ,(int) $m1[1],0 , date('m',strtotime($today)) ,date( 'd',strtotime($today)),date('Y',strtotime($today))))) - strtotime($t) ) /60)>0 )
												{										
													array_push($duparray ,$arslotsnew[$n+1]);
													$arslotsnew[$n+1] ="";	
												}											
													
											}											
											else if($n-1 > 0  )
											{
												$m1 = explode(":",$arslots[$n-1] );	
												if( (( strtotime($t) - strtotime( date( 'Y-m-d H:i',mktime( (int) $m1[0] ,(int) $m1[1],0 , date('m',strtotime($today)) ,date( 'd',strtotime($today)),date('Y',strtotime($today)))))  ) /60) <$appointmentduration && (( strtotime($t) - strtotime( date( 'Y-m-d H:i',mktime( (int) $m1[0] ,(int) $m1[1],0 , date('m',strtotime($today)) ,date( 'd',strtotime($today)),date('Y',strtotime($today)))))  ) /60)>0 )	
												{
													array_push($duparray ,$arslotsnew[$n-1]);
													$arslotsnew[$n-1] ="";
												}
													
											}
											array_push($arslotsnew,$time);
										}
									}								
								}								
							}							
							else if(strtotime( $starttime)> strtotime( $t) )
							{
								array_push($arslotsnew,date('h:i',strtotime($t)));
							}
							elseif( strtotime($endtime)< strtotime($t))
							{
								array_push($arslotsnew,date('h:i',strtotime($t)));
							}	
							
							array_push($finaldatedataarr[$completedatearr[$i]],array_unique($arslotsnew));//slots with blocked time for retaining apps
							array_push($finaldatedataarr[$completedatearr[$i]],array_unique($duparray));//slots with appoitnment
							
						}
						
					}
					// save schedule for restricted dates
					else
					{
						$slotstartime =date('H:i',strtotime( $arapps[$j]['apptime']));
						$t1time = strtotime( $arapps[$j]['apptime']);
						$t1time = $t1time+(60*$appointmentduration);
						$slotendtime = date('H:i',$t1time);
						$modetype = $arapps[$j]['consultationmode'];
						$chargetype = $arapps[$j]['slottype'];
						$slot = date('h:i',strtotime($appointmenttime));
							
						$this->saveschedulefornonsetdate($slotstartime,$slotendtime,$modetype,$chargetype,$slot,$daynm ,$result);
					}					
				}	
				
			}
			
			$arslotsunique=array();
			$arslotsuniquedup=array();
			foreach($finaldatedataarr as $fkey => $finaldates )
			{
				if( !empty($finaldates) && in_array($fkey, $arappdate ))
				{				
					for($k=0;$k<sizeof($finaldates); $k=$k+2)
					{
						//merge array both slots (arslots) and retained apps ( duparray)				
						$arslotsunique = array_unique( array_merge($arslotsunique, $finaldates[$k]));
						$arslotsuniquedup = array_unique( array_merge($arslotsuniquedup,$finaldates[$k+1]));
						
					}			
					
					$arslotsunique =array_diff( array_unique($arslotsunique),array_unique($arslotsuniquedup));
					
					$arslotsuniquenew = array();
					$arslotsuniquenew1 = array();
					array_push($arslotsuniquenew,'');
					$arslotsuniquenew = array_diff($arslotsunique ,$arslotsuniquenew);
					foreach($arslotsuniquenew as $arsnew )
					{
						array_push($arslotsuniquenew1, strtotime($arsnew) );
					}
					arsort($arslotsuniquenew1);
					$arslotsuniquenew = array();
					foreach($arslotsuniquenew1 as $arsnew )
					{
						array_push($arslotsuniquenew, date('H:i', $arsnew) );
					}
					$arslotsuniquenew = array_reverse($arslotsuniquenew);	
					
					foreach($arrappointmentdata as $key=> $arappsdata)
					{
						if(sizeof($arappsdata)>0 || ! empty($arappsdata) )
						{	
							$x = 0;					
							foreach($arappsdata as $arddata )
							{
								$arrappointmentdatanew =array();
							
								for($y=0;$y<sizeof($arslotsuniquenew);$y++ )
								{
									if($arslotsuniquenew[$y]!="" )
									{
										//seperate entire array according to its time slots									
										if((strtotime($arddata[0]) <= strtotime($arslotsuniquenew[$y] ) && strtotime($arslotsuniquenew[$y] ) <=  strtotime($arddata[1]) )  )
										{
											array_push($arrappointmentdatanew,$arslotsuniquenew[$y]);
											$arslotsuniquenew[$y]="";
										}
										
										else if( (strtotime($arddata[0]) < strtotime($arslotsuniquenew[$y] ) && strtotime($arslotsuniquenew[$y] ) >  strtotime($arddata[1]) ) && in_array($arslotsuniquenew[$y],$arrappointmenttime) )	
										{
											array_push($arrappointmentdatanew,$arslotsuniquenew[$y]);
											$arslotsuniquenew[$y]="";
										} 
										else if((strtotime($arddata[0]) >strtotime($arslotsuniquenew[$y] ) && strtotime($arslotsuniquenew[$y] ) <  strtotime($arddata[1]) ) && in_array($arslotsuniquenew[$y],$arrappointmenttime))
										{
											array_push($arrappointmentdatanew,$arslotsuniquenew[$y]);
											$arslotsuniquenew[$y]="";
										}
									}
									
								}			
								$arappsdata[$x][4] =$arrappointmentdatanew;							
								$x++;
							}						
							//var_dump($arappsdata);
							$this->saveschedule($arappsdata,$daynm,$result );
						}				
						
					}
				}
				
						
			}
			//save schedule for dates with no appointment that date
			for($x=0;$x< sizeof($ardiff);$x++ )
			{
				if( strtotime($completedatearr[$i])== strtotime($ardiff[$x] ) )
				{
					$this->adddayschedule($result,date('l',strtotime($completedatearr[$i] )) ,$mondaydata,$tuesdaydata,$wednesdaydata,$thursdaydata,$fridaydata,$saturdaydata,$sundaydata );
				}
							
			}
		}
		
	}

	private function create_endtimeslots($arslots,$appointmentduration) // adds appointment duration to start time and returns array of end time of slots
	{
		$today = date('Y-m-d');
		$arenddurationslots  =array();
		for($n=0;$n<sizeof($arslots);$n++ )
		{
			$m1 = explode(":",$arslots[$n] );
			$time = date( 'H:i',mktime( (int) $m1[0] ,(int) $m1[1]+$appointmentduration,0 , date('m',strtotime($today)) ,date( 'd',strtotime($today)),date('Y',strtotime($today))));
			array_push($arenddurationslots , $time);
		}
		return $arenddurationslots;
	}

	private function getdayscheduleslots($daynm,$mondaydata,$tuesdaydata,$wednesdaydata,$thursdaydata,$fridaydata,$saturdaydata,$sundaydata)
	{
		switch(strtolower($daynm))
		{
			case "monday" : return $mondaydata;
			case "tuesday" : return $tuesdaydata;
			case "wednesday": return $wednesdaydata;
			case "thursday" : return $thursdaydata;
			case "friday" : return $fridaydata;
			case "saturday" : return $saturdaydata;
			case "sunday" : return $sundaydata;

		}

	}
	
	private function saveschedulefornonsetdate($slotstartime,$slotendtime,$modetype,$chargetype,$slot,$daynm ,$slotid)
	{	
			$objdoctorscheduleslots = new Model_Doctorscheduleslot;			
			$objdoctorscheduleslots->refdoctorscheduleslotid_c=$slotid;
			$objdoctorscheduleslots->slotstarttime_c=$slotstartime;
			$objdoctorscheduleslots->slotendtime_c= $slotendtime;
			$objdoctorscheduleslots->weekday_c= $daynm;
			$objdoctorscheduleslots->modetype_c=trim($modetype);
			$objdoctorscheduleslots->refchargetype_c=trim($chargetype) ;					
			$objdoctorscheduleslots->slots_c=$slot;
			$objdoctorscheduleslots->save();
	}
	
	private function saveschedule($daydata,$daynm ,$slotid)
	{
		foreach($daydata as $item){
			$objdoctorscheduleslots = new Model_Doctorscheduleslot;			
			$objdoctorscheduleslots->refdoctorscheduleslotid_c=$slotid;
			$objdoctorscheduleslots->slotstarttime_c=$item[0];
			$objdoctorscheduleslots->slotendtime_c= $item[1];
			$objdoctorscheduleslots->weekday_c= $daynm;
			$objdoctorscheduleslots->modetype_c=trim($item[3]);
			$objdoctorscheduleslots->refchargetype_c=trim($item[2]) ;					
			$objdoctorscheduleslots->slots_c= implode (",", $item[4]);
			$objdoctorscheduleslots->save();
		}
	}
	
	private function adddayschedule($slotid,$daynm,$mondaydata,$tuesdaydata,$wednesdaydata,$thursdaydata,$fridaydata,$saturdaydata,$sundaydata )
	{
		switch(strtolower($daynm))
		{
			case "monday" 	: 	$this->saveschedule(json_decode($mondaydata),"Monday",$slotid);
								break;
			case "tuesday" 	: 	$this->saveschedule(json_decode($tuesdaydata),"Tuesday",$slotid);
								break;
			case "wednesday": 	$this->saveschedule(json_decode($wednesdaydata),"Wednesday",$slotid);
								break;
			case "thursday" : 	$this->saveschedule(json_decode($thursdaydata),"Thursday",$slotid);
								break;
			case "friday" 	: 	$this->saveschedule(json_decode($fridaydata),"Friday",$slotid);
								break;
			case "saturday" : 	$this->saveschedule(json_decode($saturdaydata),"Saturday",$slotid);
								break;
			case "sunday" 	: 	$this->saveschedule(json_decode($sundaydata),"Sunday",$slotid);
								break;

		}
	}
	
	private function getdatesinrange($startdate,$enddate)//returns array of dates within range
	{
		$days = strtotime($enddate) -strtotime($startdate) ;
		$days = floor($days/(60*60*24));
		$completearr = array();
		for($j=0;$j<=$days;$j++)
		{
			array_push($completearr,date('Y-m-d',strtotime($startdate .$j." day"))  );
		}
		
		return ($completearr);
	}
	
	private function savedocschedule($doccalendarid,$startdate,$enddate,$shortvisit,$longvisit,$blockval,$appstartegy,$restricteddates,$schedulename)
	{
		$objdoctorschedule = new Model_Doctorschedule;
		$objdoctorschedule-> refdocschedulecalendarid_c=$doccalendarid ;
		$objdoctorschedule-> startdate_c=$startdate ;
		$objdoctorschedule-> enddate_c=$enddate ;
		$objdoctorschedule-> shortvisitduration_c=$shortvisit ;
		$objdoctorschedule-> longvisitduration_c=$longvisit ;
		$objdoctorschedule-> blockofminutes_c=$blockval ;
		$objdoctorschedule-> appstrategytype_c=$appstartegy ;
		
		$objdoctorschedule-> restricteddates_c=$restricteddates ;
		$objdoctorschedule-> schedulename_c=$schedulename ;
		$objdoctorschedule-> status_c="active" ;
		$result = $objdoctorschedule->save();
		return $result;
	}
	
	private function check_in_range($start_date, $end_date, $date)
	{
		$start_ts = strtotime($start_date);
		$end_ts = strtotime($end_date);
		$user_ts = strtotime($date);
		
		// Check that user date is between start & end
		return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));
	}
	
}

	
 // End Welcome

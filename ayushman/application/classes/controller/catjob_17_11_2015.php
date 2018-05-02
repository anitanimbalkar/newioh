<?php defined('SYSPATH') or die('No direct script access.');
class Catjob {
	public static function setAppointmentRemider($apptime,$appid)
	{
		$appointmentTime=date('h:i A m/d/y',strtotime($apptime));
		$appointmentId= $appid;
		$currentTime= date('h:i A m/d/y', time());
		$start_time = strtotime($appointmentTime);$end_time = strtotime($currentTime); // or use date('Y-m-d H:i:s') for current time
		$timeDifferenceInMin=round(abs($start_time - $end_time) / 60,2);
		if($timeDifferenceInMin <= 30)//if time diff is smaller than 30 min
		{
			//Do not set any at Command 
		}
		else//set reminder
		{
			$atjobtime = date('h:i A m/d/y',strtotime('-30 minutes', strtotime($apptime)));
        		$objAppointment = orm::factory('appointment')->where('appointment.id','=',$appointmentId)->find();
			//$command = "echo 'php ".DOCROOT."index.php --uri=csendsmsbyatjob/send/".$appointmentId."' | at ".$atjobtime." 2>&1";
			$command = "echo 'php ".DOCROOT."index.php --uri=csendsmsbyatjob/send/".$appointmentId."' | at now 2>&1";
			$output = shell_exec($command);
			if (strpos($output,'warning: commands will be executed using /bin/sh job') == false) 
			{		
				$array_output = explode(" ", $output);
				if(isset($array_output[13]))
				{
					$jobId = $array_output[7];
					$string = $array_output[10]." ".$array_output[11]." ".$array_output[12]." ".$array_output[13];
					$time = date('h:i A m/d/y',strtotime($string));
					$objAtjob = ORM::factory('atjob');
					$objAtjob->jobid_c = $jobId;
					$objAtjob->refatjobnameid_c = '1';
					$objAtjob->status_c = 'active';
					$objAtjob->refappointmentid_c = $appointmentId;
					$objAtjob->save();
				}
				else
				{
					$objAtjob = ORM::factory('atjob');
				
					$objAtjob->refatjobnameid_c = '1';
					$objAtjob->status_c = 'failed';
					$objAtjob->refappointmentid_c = $appointmentId;
					$objAtjob->save();
				
				}
			}
			else{
				$objAtjob = ORM::factory('atjob');
				$objAtjob->refatjobnameid_c = '1';
				$objAtjob->status_c = 'failed';
				$objAtjob->refappointmentid_c = $appointmentId;
				$objAtjob->save();
			}
		}
	}
	
	public static function cancelAppointmentRemider($appid)
	{
		$appointmentId= $appid;
		$objAtjob = ORM::factory('atjob')->where('refatjobnameid_c', '=','1')
		->where('status_c', '=', 'active')
		->where('refappointmentid_c', '=', $appointmentId)->find();
		if($objAtjob->id != NULL)
		{
			$command = "atrm ". $objAtjob->jobid_c;
			$output = shell_exec($command);
			$objAtjob->status_c = 'deleted';
			$objAtjob->save();
		}
	}
}

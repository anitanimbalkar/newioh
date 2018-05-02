<?php defined('SYSPATH') or die('No direct script access.');
class helper_atjobmanager  {
	public static function setjob($url,$time,$refjobnameid,$columnname,$columnid)
	{
		try
		{
			$command = "echo 'php ".DOCROOT."index.php --uri=".$url."' | at ".$time." 2>&1";
			$output = shell_exec($command);
			if (strpos($output,'warning: commands will be executed using /bin/sh job') == false) 
			{		
				$array_output = explode(" ", $output);

				if(isset($array_output[1]))
				{
					$jobId = $array_output[1];
					$objAtjob = ORM::factory('atjob');
					$objAtjob->jobid_c = $jobId;
					$objAtjob->refatjobnameid_c = $refjobnameid;
					$objAtjob->status_c = 'active';
					$objAtjob->$columnname = $columnid;
					$objAtjob->save();
					return 'set';
				}
				else
				{
					$objAtjob = ORM::factory('atjob');
					$objAtjob->refatjobnameid_c = $refjobnameid;
					$objAtjob->status_c = 'failed-'.$output;
					$objAtjob->$columnname = $columnid;
					$objAtjob->save();
					return 'failed';
				}
			}
			
		}
		catch(Exception $e1)
		{
			return $e1->getMessage();
		}
	}
	public static function unsetjob($jobid)
	{
			$command = "atrm ".$jobid;
			$output = shell_exec($command);
			$objAtjob = ORM::factory('atjob')->where('refatjobnameid_c','=',$jobid)->find();
			helper_atjobmanager::setstatus($objAtjob->id,'deleted');
	}
	
	
	public static function setstatus($atjobid,$status)
	{
		try
		{
			$objAtjob = ORM::factory('atjob')->where('id','=',$atjobid)->find();
			$objAtjob->status_c = $status;
			$objAtjob->save();
		}
		catch(Exception $e1)
		{
			return $e1->getMessage();
		}
	}
}

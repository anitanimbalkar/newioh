<?php 
class helper_cron  {
	private $crontab;
	function __construct()
	{
		$server = Kohana::$config->load('servercredentials');
		$this->crontab = new helper_crontabmanager($server['host'], $server['port'], $server['username'], $server['password']); 
	}
	
	// Activate the cron using process id.
	public function start($pid)
	{
		try{
			$objProcess 	= ORM::factory('process')->where('id','=',$pid)->mustFind();
			$command 	= $objProcess->pathtoscript_c;
			$schedule 	= $objProcess->schedule_c;
			$objCronJob = ORM::factory('cronjob')->where('refprocessid_c','=',$pid)->find();
			if($objCronJob->id == Null){
				$objCronJob = ORM::factory('cronjob');
			}
			$objCronJob->refprocessid_c = $pid;
			$objCronJob->jobid_c = 'CRON_'.$pid;
			$objCronJob->status_c = 'active';
			
			$new_cronjobs = array(  
				$schedule.' '.$command.' # CRONJOB_'.$pid		    
			);  
			$this->crontab->append_cronjob($new_cronjobs); 
			$this->writelog($objCronJob->id,'Success', $objProcess->name_c.' process is started', 'started',$objProcess->name_c);	
			$objCronJob->results_c = 'Scheduled on '.date("d M Y H:i ");
			$objCronJob->save();
	
		}catch(Exception $e)
		{
			throw new Exception ($e);
		}
	}
	
	// Execute the commad 
	public function execute($pid)
	{
		$objProcess 	= ORM::factory('process')->where('id','=',$pid)->mustFind();
		$command 	= $objProcess->pathtoscript_c;
		$this->crontab->exec($command); 
		$objCronJob = ORM::factory('cronjob')->where('refprocessid_c','=',$pid)->mustFind();
		$objCronJob->results_c = 'Executed on '.date("d M Y H:i ");
		$objCronJob->executiontime_c = date("d-m-Y h:i A");
		$objCronJob->save();
		$this->writelog($objCronJob->id,'Success', $objProcess->name_c.' process is executed', 'Executed Process',$objProcess->name_c);	
	}

	//deactivate the cron
	public function stop($pid)
	{
		$objProcess 	= ORM::factory('process')->where('id','=',$pid)->mustFind();
		$command 	= $objProcess->pathtoscript_c;
		$schedule 	= $objProcess->schedule_c;
		$cron_regex = '/CRONJOB_'.$pid.'/';  
		$this->crontab->remove_cronjob($cron_regex); 
		$objCronJob = ORM::factory('cronjob')->where('refprocessid_c','=',$pid)->mustFind();
		if($objCronJob->id != null){
			$this->writelog($objCronJob->id,'Success', $objProcess->name_c.' process is stopped', 'stopped',$objProcess->name_c);	
		}else{
			$objCronJob = ORM::factory('cronjob');
			$objCronJob->refprocessid_c = $pid;
		}
		$objCronJob->jobid_c = 'CRON_'.$pid;				
		$objCronJob->status_c = 'inactive';
		$objCronJob->results_c = 'stopped on '.date("d M Y H:i ");
		$objCronJob->save();
	}

	//write logs in database
	public function writelog($cronid,$status,$description,$result,$processname)
	{
		$objLog	= ORM::factory('log');
		$objLog->refcronid_c 	= $cronid;
		$objLog->result_c 	= $result;
		$objLog->status_c 	= $status;
		$objLog->description_c 	= $description;
		$objLog->time_c 	= date("d M Y H:i ");
		$objLog->processname_c 	= $processname;
		$objLog->save();
	}
}

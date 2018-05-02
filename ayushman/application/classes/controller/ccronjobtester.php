<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Ccronjobtester extends Controller {
	public function action_testcronjob()
	{
		if(php_sapi_name() == 'cli'){
			$cronid = CLI::options('CRONID');
                }else{
                	$cronid = $_GET['CRONID'];
                }
                $now = date('d-m-Y H:i:s');
                $myFile = "cronjobtestFile.txt";
                $fh = fopen($myFile, 'a') or die("can't open file");
                $stringData = "\n".$now." and hello";
                fwrite($fh, $stringData);
                fclose($fh);
                $cron = new helper_cron();
		$cron->writelog($cronid,'SUCCESS','testing of cron job at '.$now,'testing of cron job','testing of cron job');
	}
	
}

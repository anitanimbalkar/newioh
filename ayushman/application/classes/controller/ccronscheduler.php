<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Ccronscheduler extends Controller_Ctemplatewithmenu  {
	public function action_view()
	{
		$errors = array();
		$messages = array();
		$encrypt = Encrypt::instance('default');
		$pid	= urldecode($encrypt->decode($_GET['p']));
		$this->display($errors, $messages,$pid);
	}
	private function display($errors, $messages,$pid)
	{
		try{
			$content = View::factory('vuser/vadmin/vcronscheduler');
			$content->bind('errors',$errors);
			$content->bind('messages',$messages);
			$result = ORM::factory('process')->where('id','=',$pid)->mustFind();
			$content->bind('result',$result);		
			$this->template->content = $content;
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
	public function action_schedule()
	{
		$errors = array();
		$messages = array();
		try{
			if($_POST){
				$pid 		= $_POST['processid'];
				$schedule 	= $_POST['cronschedule'];
				$active 	= $_POST['active'];
				$command 	= $_POST['command'];
				$description 	= $_POST['description'];

				$objProcess = ORM::factory('process')->where('id','=',$pid)->mustFind();
				$objProcess->schedule_c 	= $schedule;
				$objProcess->active_c 		= ($active == 'true')?1:0;
				$objProcess->status_c 		= ($active == 'true')?'Active':'Inactive';
				$objProcess->description_c 	= $description;
				$objProcess->update();
				$cron = new helper_cron();
				if($active == 'true'){
					$cron->stop($pid);
					$cron->start($pid);	
					$messages['message'] = '"'.$objProcess->name_c.'" process is scheduled and it is active.';
	
				}else{
					$cron->stop($pid);
					$messages['message'] = '"'.$objProcess->name_c.'" process is scheduled and it is inactive.';

				}
				$this->display($errors,$messages,$pid);
			}
		}catch(Exception $e){
			throw new Exception($e);
		}	
	}
	public function action_start()
	{
		$encrypt = Encrypt::instance('default');
		$pid = 	urldecode($encrypt->decode($_GET['p']));
		$objProcess = ORM::factory('process')->where('id','=',$pid)->mustFind();
		$objProcess->active_c = 1;
		$objProcess->status_c = 'Active';
		$objProcess->update();
		$cron = new helper_cron();
		$cron->start($pid);
		Request::current()->redirect('cbackgroundprocesses/view');	

	}
	public function action_execute()
	{
		$encrypt = Encrypt::instance('default');
		$cron = new helper_cron();
		$cron->execute(urldecode($encrypt->decode($_GET['p'])));

		Request::current()->redirect('cbackgroundprocesses/view');	

	}

	public function action_stop()
	{
		$encrypt = Encrypt::instance('default');
		$pid = 	urldecode($encrypt->decode($_GET['p']));
		$objProcess = ORM::factory('process')->where('id','=',$pid)->mustFind();
		
		$objProcess->active_c = 0;
		
		$objProcess->status_c = 'Inactive';
		$objProcess->save();
		$cron = new helper_cron();
		$cron->stop($pid);
		
		Request::current()->redirect('cbackgroundprocesses/view');	

	}
}

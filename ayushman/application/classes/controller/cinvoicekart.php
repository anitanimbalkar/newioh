<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/export.php');
include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');

class Controller_Cinvoicekart extends Controller_Ctemplatewithmenu  {
	public function action_view()
	{
		$searchstat = 'all';
		$whereclause = '';
		$this->display($whereclause,$searchstat);				
	}
	private function display($whereclause,$searchstat){
			$obj_user = Auth::instance()->get_user();
			$content = View::factory('vuser/vadmin/vinvoicedashboard');
			$content->bind('obj_user', $obj_user);
			$username = $obj_user->Firstname_c;
			$content->bind('whereclause',$whereclause);
			$content->bind('username', $username);
			$content->bind('searchstat', $searchstat);
			$urole = "data_manager";
			$breadcrumb = "Home>>";
            $this->template->breadcrumb = $breadcrumb;
			$this->template->content = $content;
			$this->template->user = $obj_user->Firstname_c;
			$this->template->urole = $urole;
	
	}
	public function action_search(){
		$errors = array();
		$messages = array();
		$whereclause = '[rcptno,=,""]';
		if($_POST){		
			$serviceprovidername 	= $_POST['name'];	
				if($serviceprovidername != ''){
					$payname = '%'.$payname.'%';
					$whereclause 	= '[payername,like,'.$serviceprovidername.']';
				}				
			$this->display($whereclause,$searchstat);	
		}else{
			$errors['error'] = 'Could not search your query';
		}
		$this->display($whereclause,$searchstat);
	}
}
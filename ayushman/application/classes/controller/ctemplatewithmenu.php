<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Ctemplatewithmenu extends Controller_Template
{
	public $template = 'vtemplates/vblanktemplate';

	/**
	* Initialize properties before running the controller methods (actions),
	* so they are available to our action.
	*/
	public function before()
	{
		// Run anything that need to run before this.
		parent::before();
		
		if(strpos((isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:""),$_SERVER['HTTP_HOST']) !== false ){
			
		}else{
			//Request::current()->redirect('/home/index.shtml');
		}
		$protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] =='on')?'https':'http';
        $url = URL::site(Request::detect_uri(),$protocol);
		if($this->request->method() == 'GET'){
			$params = URL::query();
			$url = $url.$params;
			$session = Session::instance();
			$back = $session->get('backurls');
			
			if($back == null){
				$back = array();
				array_push($back,$url);
			}
			$key = array_search($url, $back);
			if($key != null){
				for($i=$key+1;$i<count($back);$i++){
					unset($back[$i]);
				}
				$back = array_values($back);
			}
			if(isset($back[count($back)-2]) && ($back[count($back)-2] == $url)){
				unset($back[count($back)-1]);
				$back = array_values($back);
			}
			if(($back[count($back)-1] != $url)){
				array_push($back,$url);
			}
			$session->set('backurls', $back);
		}
		if($this->auto_render)
		{
			// Initialize empty values
			$this->template->content 	= '';
			$this->template->styles 	= array();
			$this->template->scripts 	= array();
			$arr_xmpp = include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/config/xmpp.php');
			$this->template->arr_xmpp = $arr_xmpp;
		}
	}

	/**
	* Fill in default values for our properties before rendering the output.
	*/
	public function after()
	{
		if($this->auto_render)
		{
			$view = new helper_View();
			$params = URL::query();
			$response = $view->generate($this->request->controller().'/'.$this->request->action(),$params);
			$this->template->plugin = $response;
		
			// Define defaults
			$styles = array( 'assets/css/ui.multiselect.css' => 'screen','assets/css/ayushman fn 1.css' => 'screen',
			'assets/css/ui.jqgrid.css' => 'screen', 'assets/css/jquery-ui-1.8.16.redmond.css' => 'screen','assets/css/jquery-ui-1.8.17.custom.css' => 'screen');
		
			$scripts = array('assets/js/jquery.jqGrid.min.js'=> 'script','assets/js/i18n/grid.locale-en.js'=> 'script','assets/js/jquery-ui-1.8.17.custom.min.js'=> 'script');
			// Add defaults to template variables.
			$this->template->styles = array_reverse(array_merge($this->template->styles, $styles));			
			$this->template->scripts = array_reverse(array_merge($this->template->scripts, $scripts));
	
			$previousvalues = array();
			if($_POST){
				$previousvalues = $_POST;
			}
			$this->template->content->bind('previousvalues', $previousvalues);
			$wizard = new helper_wizard();
			$wizardStatus = $wizard->isCompleted();
			$this->template->content->bind('wizardStatus', $wizardStatus);			
			$obj_user = Auth::instance()->get_user();
			if ($obj_user != null){
				$userid = $obj_user->id;
				$this->template->content->bind('userid', $userid);
				$this->template->content->bind('urole', $urole);
				$this->template->objuser 	= $obj_user;
			
				if ($obj_user->has('roles', ORM::factory('role', array('name' => 'doctor')))){
					$urole = "doctor";
					$this->template->objuser = "Dr. ".$obj_user->Firstname_c." ".$obj_user->lastname_c;
				}
				else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'patient')))){
					$urole = "patient";	
				}
				else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'admin')))){
					$urole = "admin";
				}
				else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'chemist')))){
					$urole = "chemist";
				}
				else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'pathologist')))){
					$urole = "pathologist";
				}
				else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'staff')))){
					$urole = "staff";
				}
				else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'corporate')))){
					$urole = "corporate";
				}
				else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'ipdstaff')))){
					$urole = "ipdstaff";
				}
				else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'radiologist')))){
					$urole = "radiologist";
				}
				else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'physiologist')))){
					$urole = "physiologist";
				}
				else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'ipdward')))){
					$urole = "ipdward";
				}
				else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'hospitaladmin')))){
					$urole = "hospitaladmin";
				}           
				else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'sp_manager')))){
					$urole = "sp_manager";
				}
				else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'cons_EMR_manage')))){
					$urole = "cons_EMR_manage";
				}
				else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'data_manager')))){
					$urole = "data_manager";
				}
				else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'cons_support_ma')))){
					$urole = "cons_support_ma";
				}
				else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'mrkt_manager')))){
					$urole = "mrkt_manager";
				}
				else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'acct_manager')))){
					$urole = "acct_manager";
				}
				else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'sales_manager')))){
					$urole = "sales_manager";
				}
				else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'healthcare_exei')))){
					$urole = "healthcare_exei";
				}
				else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'healthcare_exew')))){
					$urole = "healthcare_exew";
				}
				$this->template->urole 		= $urole;
			}else{
				throw new Exception("You are logged out from the system, Please login again.");
			}
			
			$this->template->maximize = false;
		}
		// Run anything that needs to run after this.
		parent::after();
	}
}

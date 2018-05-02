<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Acl extends Controller {
	public $_hasAccess;
	public function before()
	{
		$this->a2 = A2::instance('menu-demo');
		$this->user = $this->a2->get_user();
		if(! $this->a2->allowed($this->request->controller(),$this->request->action())){
			$this->_hasAccess = false;
		}else{
			$this->_hasAccess = true;
		}
	}
}

<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cwelcome extends Controller {

	public function action_index()
	{
    $object_user = Auth::instance()->get_user();
    if (!($object_user)){
      Request::current()->redirect('/home/index.shtml');
    }
    else{
      Request::current()->redirect('cdashboard/view');
    }
	}

} // End Welcome

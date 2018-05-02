<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Crolechecker extends Controller{

	
	public function action_index()
	{
		$user = Auth::instance()->get_user();
		if (!$user)
		{
			// if a user is not logged in, redirect to login page
			Request::current()->redirect('cuser/login');
		}
		else
		{
			
			if ($user->has('roles', ORM::factory('role', array('name' => 'doctor'))))
			{
				Request::current()->redirect('cdashboard/view');
			}
			else if ($user->has('roles', ORM::factory('role', array('name' => 'patient'))))
			{	
				try{
					Request::current()->redirect('cdashboard/view?url='.$_GET['redirection']);
				}catch(Exception $e){
					Request::current()->redirect('cdashboard/view');
				}
			}
			else if ($user->has('roles', ORM::factory('role', array('name' => 'pathologist'))))
			{	
				Request::current()->redirect('cdashboard/view');				
			}
			else if ($user->has('roles', ORM::factory('role', array('name' => 'chemist'))))
			{	
				Request::current()->redirect('cdashboard/view');				
			}
			else if ($user->has('roles', ORM::factory('role', array('name' => 'admin'))))
			{	
				Request::current()->redirect('cdashboard/view');				
			}
			else if ($user->has('roles', ORM::factory('role', array('name' => 'staff'))))
			{	
				try{
					Request::current()->redirect('cdashboard/view?url='.$_GET['redirection']);
				}catch(Exception $e){
					Request::current()->redirect('cdashboard/view');
				}			
			}else if ($user->has('roles', ORM::factory('role', array('name' => 'corporate'))))
			{	
				Request::current()->redirect('cdashboard/view');
			}
		}
	}

} // End Welcome

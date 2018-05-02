<?php defined('SYSPATH') or die('No direct script access.');

class helper_Serviceview  {
	
	public function generate($url,$param,$serviceid)
	{
		$user 	= ORM::factory('user')->where('id','=',Auth::instance()->get_user()->id)->find();
		$roles = $user->get_role_ids();
		foreach($roles as $role){
			$objComponents 	= ORM::factory('servicecomponent')->where('url_c','=',$url)->where('serviceid_c','=',$serviceid)->where('role_c','=',$role)->find();
			$objSiblings 	= ORM::factory('serviceviewsibling')->where('servicecomponentid_c','=',$objComponents->id)->find_all();
			$response = '';
			foreach($objSiblings as $sibling){
				$component = ORM::factory('servicecomponent')->where('id','=',$sibling->siblingcomponentid_c)->where('role_c','=',$role)->find();
				if($component->url_c == null){
					$response = 'Access Denied';
				}else{
					$request = Request::factory($component->url_c.$param);
					$response = $response.$request->execute(); 
				}
			}
		}
		return $response;
	}
}

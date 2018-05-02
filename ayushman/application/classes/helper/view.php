<?php defined('SYSPATH') or die('No direct script access.');

class helper_View  {
	
	public function generate($url,$param)
	{
		$user = Auth::instance()->get_user();
		$roles = $user->get_role_ids();
		foreach($roles as $role){
			$objComponents 	= ORM::factory('component')->where('url_c','=',$url)->where('role_c','=',$role)->find();
			$objSiblings 	= ORM::factory('viewsibling')->where('componentid_c','=',$objComponents->id)->find_all();
			$response = '';
			foreach($objSiblings as $sibling){
				$component = ORM::factory('component')->where('id','=',$sibling->siblingcomponentid_c)->where('role_c','=',$role)->find();
				if($component->url_c == null){
					$response = 'Access Denied';
				}else{
					$request= Request::factory($component->url_c.$param);
					$response = $response.$request->execute(); 
				}
				
			}
		}
		return $response;
	}
}

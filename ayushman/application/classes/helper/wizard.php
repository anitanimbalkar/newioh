<?php

Class helper_wizard {
	function __construct()
	{		

	}
	public function changestatus()
	{
		$objUser 	= Auth::instance()->get_user();
		$status 	= $objUser->wizardstatus_c;
		
		$wizardid 	= $objUser->refintrowizardid_c;
		$wizardpaths	= ORM::factory('introductorywizard')->where('id','=',$wizardid)->find()->flowdetail_c;
		$arr_wizardpaths = explode(',',$wizardpaths);
		$flag = 0;
		
		foreach($arr_wizardpaths as $wizardpath){
			if($flag == 1){
				$objUser->wizardstatus_c = $wizardpath;
				$objUser->save();
				$flag = 2;
				break;
			}
			if($wizardpath == $status){
				$flag = 1;	
			}			
		}
		if($flag == 1){
			$objUser->refintrowizardid_c = 1;
			$objUser->wizardstatus_c = 1;
			$objUser->save();
		}
	}
	public function redirect()
	{
		$objUser 	= Auth::instance()->get_user();
		$path	= ORM::factory('wizardpaths')->where('id','=',$objUser->wizardstatus_c)->find()->path_c;
		if($objUser->wizardstatus_c != '1')
		{
			$url = '/ayushman/'.$path;	
			Request::current()->redirect($path);
		}
	}
	public function isCompleted()
	{
		$objUser 	= Auth::instance()->get_user();
		$path	= ORM::factory('wizardpaths')->where('id','=',$objUser->wizardstatus_c)->find()->path_c;
		if($objUser->wizardstatus_c != '1')
		{
			return false;
		}else{
			return true;
		}
	}
}	

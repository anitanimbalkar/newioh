<?php defined('SYSPATH') or die('No direct script access.');
class helper_Menu {
	protected $roles;
	public function __construct($id) 
    {
		$this->roles = $id;
    }
	public function generate(){
		$aclObject = new Model_Aclobject;
		$objects = $aclObject->getObjects('Menu',$this->roles);
		$menus = array();
		foreach($objects as $object){
			$profile = new Model_Aclobjectprofile;
			$attributes = $profile->getProfile($object->id);
			$menu = array();
			foreach($attributes as $attribute){
				$menu[$attribute->attributename_c] = $attribute->attributevalue_c;
			}
			if(!isset($menu['category'])){
				continue;
			}
			$category = $menu['category'];
			if(!isset($menus[$category]))
			$menus[$category] = array();
			
			$link = '<a href="javascript:void(0);" style="padding:5px;" onclick=getcontent("'.$menu['link'].'"); ><img src="'.$menu['icon'].'" width="11" height="8" />'.$menu['displayname'].'</a>';
			array_push($menus[$category],$link);
		}
		
		return $menus;
	}
}

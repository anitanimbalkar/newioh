<?php defined('SYSPATH') or die('No direct script access.');
class Model_Textfollowupnote extends kohana_Ayushmanorm {
	protected $_table_name = 'textfollowupnotes';
	public function saveText($text, $app_id, $visibility) {
	  $text_object = $this->where('ref_app_id','=', $app_id)->find();
	  if(!$text_object->loaded()){
	    $text_object = $this;
	    $text_object->ref_app_id = $app_id;
	  }
	  $text_object->text = $text;
	  $text_object->visibility = $visibility;  
	  $text_object->save();
	}
}
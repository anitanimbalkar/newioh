<?php defined('SYSPATH') or die('No direct script access.');
class Model_Doctor extends kohana_Ayushmanorm {
	protected $_table_name = 'doctors';
	//protected $_has_many = array('favoritedocterbypatients' => array('model' => 'favoritedocterbypatient', 'foreign_key' => 'reffavdocbypatdoctorsid_c')

  public function get_doctor_id($doctor_user_id){
    try{
      return $this->where('refdoctorsid_c','=', $doctor_user_id)->find()->id;
    }catch(Exception $e){throw new Exception($e);}
  }
}
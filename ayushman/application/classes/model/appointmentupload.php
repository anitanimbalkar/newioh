<?php defined('SYSPATH') or die('No direct script access.');
class Model_Appointmentupload extends kohana_Ayushmanorm {
	protected $_table_name = 'appointmentuploads';
	//protected $_has_many = array('appointments' => array('model' => 'appointment', 'foreign_key' => 'id '));

	public function get_summary($appointment_id){
	  $uploads = $this->where('refappuploadappointmentsid_c','=',$appointment_id)->find_all();
	  $fname = '';
    foreach($uploads as $upload){
    	if(strpos($upload->uploadedfile_c,'visitsummary') || strpos($upload->uploadedfile_c,'appointmentsummary'))
    	  $fname = $upload->uploadedfile_c;
    }
    return($fname);
  }
}
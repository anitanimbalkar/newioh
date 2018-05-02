<?php defined('SYSPATH') or die('No direct script access.');
class Model_Appointment extends kohana_Ayushmanorm {
	protected $_table_name = 'appointments';
	protected $_has_many = array('appointmentsymptoms' => array('model' => 'appointmentsymptom', 'foreign_key' => 'refappsymappointmentsid_c'),
									'treatments' => array('model' => 'treatment', 'foreign_key' => 'reftreatappointmentsid_c'),
									'recommendedtests' => array('model' => 'recommendedtest', 'foreign_key' => 'refrecomtestappointmentsid_c'),
									'prescriptions' => array('model' => 'mprescription', 'foreign_key' => 'refprescriptionsappoitmentid_c'),
									'appointmentnotes' => array('model' => 'appointmentnote', 'foreign_key' => 'refnotesappid_c'),
									'emrexaminations' => array('model' => 'emrexamination', 'foreign_key' => 'refappointmentid_c'));

	public function get_appointment_info($appointment_id){
	  $appointment = $this->where('id','=',$appointment_id)->find()->as_array();
	  return($appointment);
	}
}
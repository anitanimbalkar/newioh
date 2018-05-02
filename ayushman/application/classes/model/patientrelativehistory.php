<?php defined('SYSPATH') or die('No direct script access.');
class Model_Patientrelativehistory extends kohana_Ayushmanorm {
	protected $_table_name = 'patientrelativehistories';
	
	public function get_relative_histories($patient_id){
	  $object = new $this;
	  $patient_relative_histories = $object->where('refpatrelhistpatientsid_c','=',$patient_id)->find_all();
	  $result = array();
	  foreach($patient_relative_histories as $patient_relative_history){
	    $temp = array();
	    $temp['yob'] = $patient_relative_history->birthyear_c;
	    $temp['medhis'] = $patient_relative_history->medicalhistory_c;
	    $temp['yod'] = $patient_relative_history->deathage_c;
	    $temp['cod'] = $patient_relative_history->deathcause_c;
	    $temp['relation'] = $patient_relative_history->relationship_c;
	    array_push($result, $temp);
	  }	  
	  return($result);
	}
}

/*

delimiter $$

CREATE TABLE `patientrelativehistories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `refpatrelhistpatientsid_c` int(11) NOT NULL,
  `relationship_c` varchar(45) DEFAULT NULL,
  `coffee_c` varchar(10) DEFAULT NULL,
  `tobacco_c` varchar(45) DEFAULT NULL,
  `alcohol_c` varchar(45) DEFAULT NULL,
  `sleeppatterns_c` varchar(45) DEFAULT NULL,
  `exercisepatterns_c` varchar(45) DEFAULT NULL,
  `birthyear_c` varchar(45) DEFAULT NULL,
  `medicalhistory_c` varchar(1500) DEFAULT NULL,
  `deathcause_c` varchar(1500) DEFAULT NULL,
  `deathage_c` varchar(45) DEFAULT NULL,
  `createdon_c` varchar(45) DEFAULT NULL,
  `createdby_c` varchar(45) DEFAULT NULL,
  `editedon_c` varchar(45) DEFAULT NULL,
  `editedby_c` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `refpatrelhistpatientsid_c` (`refpatrelhistpatientsid_c`),
  KEY `refpatrelhistrelationshipid_c` (`relationship_c`),
  CONSTRAINT `refpatrelhistpatientsid_c` FOREIGN KEY (`refpatrelhistpatientsid_c`) REFERENCES `patients` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8$$

*/
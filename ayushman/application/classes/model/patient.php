<?php defined('SYSPATH') or die('No direct script access.');
class Model_Patient extends kohana_Ayushmanorm {
	protected $_table_name = 'patients';
	protected $_has_many = array('favoritedocterbypatients' => array('model' => 'favoritedocterbypatient', 'foreign_key' => 'reffavdocbypatpatientsid_c'));

	public function get_patient_id($patient_user_id){
	$object = new $this;
	  $patient_object = $object->where('repatientsuserid_c','=',$patient_user_id)->find();
	  return($patient_object->id);
	}
	public function get_patient_info($patient_user_id){
	  $object = new $this;
	  $patient_object = $object->where('repatientsuserid_c','=',$patient_user_id)->find()->as_array();
	  return($patient_object);
	}
	
	public function save_socialhabits($patient_id, $socialhabits){
	
	    $objPatient = $this->where('repatientsuserid_c','=',$patient_id)->find();
	    if($objPatient){
			$habits=array();
	    	foreach($socialhabits as $habit){
	    		array_push($habits,$habit);
	    	}
			$objPatient ->diet_c	= $habits[0];
			$objPatient ->smoking_c	= $habits[1];
			$objPatient ->alcohol_c	= $habits[2];
			$objPatient ->tobacco_c	=$habits[3];
			$objPatient ->exercisepatterns_c = $habits[4];
			$objPatient ->outdoorsport_c = $habits[5];
			$objPatient->save();
		}
	}
}

/*
  delimiter $$

  CREATE TABLE `patients` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `repatientsuserid_c` int(11) NOT NULL,
    `coffe_c` varchar(45) DEFAULT NULL,
    `tobacco_c` varchar(45) DEFAULT NULL,
    `alcohol_c` varchar(45) DEFAULT NULL,
    `sleeppatterns_c` varchar(45) DEFAULT NULL,
    `exercisepatterns_c` varchar(45) DEFAULT NULL,
    `searbelt_use_c` varchar(45) DEFAULT NULL,
    `occupation_c` varchar(45) DEFAULT NULL,
    `salary_c` double DEFAULT NULL,
    `employername_c` varchar(45) DEFAULT NULL,
    `employeraddress_c` varchar(45) DEFAULT NULL,
    `designation_c` varchar(45) DEFAULT NULL,
    `refbillsplanesid_c` int(11) DEFAULT NULL,
    `smoking_c` varchar(45) DEFAULT NULL,
    `diet_c` varchar(45) DEFAULT NULL,
    `outdoorsport_c` varchar(45) DEFAULT NULL,
    `createdon_c` varchar(45) DEFAULT NULL,
    `createdby_c` varchar(45) DEFAULT NULL,
    `editedon_c` varchar(45) DEFAULT NULL,
    `editedby_c` varchar(45) DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `repatientsuserid_c` (`repatientsuserid_c`),
    KEY `refbillsplanesid_c` (`refbillsplanesid_c`),
    CONSTRAINT `refbillsplanesid_c` FOREIGN KEY (`refbillsplanesid_c`) REFERENCES `billingplanes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `repatientsuserid_c` FOREIGN KEY (`repatientsuserid_c`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
  ) ENGINE=InnoDB AUTO_INCREMENT=178 DEFAULT CHARSET=utf8$$

*/
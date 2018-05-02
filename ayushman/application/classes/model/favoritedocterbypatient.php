<?php defined('SYSPATH') or die('No direct script access.');
class Model_Favoritedocterbypatient extends kohana_Ayushmanorm {
	protected $_table_name = 'favoritedocterbypatients';

	public function check_if_fav($patient_id, $doctor_id){
	  $object = $this->where('reffavdocbypatpatientsid_c', '=', $patient_id)->where('reffavdocbypatdoctorsid_c','=',$doctor_id)->find();
	  if($object->loaded()){
	    return true;
	  }
	  return false;
	}

}

/*
	  delimiter $$

    CREATE TABLE `favoritedocterbypatients` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `reffavdocbypatpatientsid_c` int(11) NOT NULL,
      `reffavdocbypatdoctorsid_c` int(11) NOT NULL,
      `note_c` varchar(255) DEFAULT NULL,
      `createdon_c` varchar(45) DEFAULT NULL,
      `createdby_c` varchar(45) DEFAULT NULL,
      `editedon_c` varchar(45) DEFAULT NULL,
      `editedby_c` varchar(45) DEFAULT NULL,
      PRIMARY KEY (`id`),
      KEY `reffavdocbypatdoctorsid_c` (`reffavdocbypatdoctorsid_c`),
      KEY `reffavdocbypatpatientsid_c` (`reffavdocbypatpatientsid_c`),
      CONSTRAINT `reffavdocbypatdoctorsid_c` FOREIGN KEY (`reffavdocbypatdoctorsid_c`) REFERENCES `doctors` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
      CONSTRAINT `reffavdocbypatpatientsid_c` FOREIGN KEY (`reffavdocbypatpatientsid_c`) REFERENCES `patients` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
    ) ENGINE=InnoDB AUTO_INCREMENT=189 DEFAULT CHARSET=utf8$$

*/
<?php defined('SYSPATH') or die('No direct script access.');
class Model_Address extends kohana_Ayushmanorm{
	protected $_table_name = 'address';
	public function get_address($address_id){
	  return $this->where('id','=',$address_id)->find()->as_array();
	}
}

/*

delimiter $$

CREATE TABLE `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `line1_c` varchar(400) CHARACTER SET latin1 DEFAULT NULL,
  `nearlandmark_c` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `location_c` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `city_c` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `state_c` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `pin_c` varchar(45) DEFAULT NULL,
  `zip_c` varchar(45) DEFAULT NULL,
  `country_c` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `phone_c` varchar(45) DEFAULT NULL,
  `isdphone_c` varchar(45) DEFAULT NULL,
  `createdon_c` varchar(45) DEFAULT NULL,
  `createdby_c` varchar(45) DEFAULT NULL,
  `editedon_c` varchar(45) DEFAULT NULL,
  `editedby_c` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=542 DEFAULT CHARSET=utf8$$

*/
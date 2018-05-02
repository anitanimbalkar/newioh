<?php defined('SYSPATH') or die('No direct script access.');
class Model_Certificate extends kohana_Ayushmanorm{
	protected $_table_name = 'certificates';

	}

/*

delimiter $$
CREATE TABLE `certificates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref_userid_c` int(11) NOT NULL,
  `reffileid_c` int(11) NOT NULL,
  `cerficatetype` varchar(45) DEFAULT NULL,
  `createdby_c` varchar(45) DEFAULT NULL,
  `createdon_c` varchar(45) DEFAULT NULL,
  `editedon_c` varchar(45) DEFAULT NULL,
  `editedby_c` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ref_userid_c` (`ref_userid_c`),
  KEY `reffileid_c` (`reffileid_c`),
  KEY `id` (`id`),
  CONSTRAINT `ref_userid_c` FOREIGN KEY (`ref_userid_c`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `reffileid_c` FOREIGN KEY (`reffileid_c`) REFERENCES `files` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
*/
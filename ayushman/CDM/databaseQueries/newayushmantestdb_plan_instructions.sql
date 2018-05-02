CREATE DATABASE  IF NOT EXISTS `newayushmantestdb` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `newayushmantestdb`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: newayushmantestdb
-- ------------------------------------------------------
-- Server version	5.6.12-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `plan_instructions`
--

DROP TABLE IF EXISTS `plan_instructions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plan_instructions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plan_id` int(11) NOT NULL,
  `instruction_type_id` int(11) NOT NULL,
  `instruction_number` int(11) NOT NULL,
  `createdon_c` varchar(45) DEFAULT NULL,
  `createdby_c` varchar(45) DEFAULT NULL,
  `editedon_c` varchar(45) DEFAULT NULL,
  `editedby_c` varchar(45) DEFAULT NULL,
  `rowver` int(11) DEFAULT '1',
  `rowid` char(36) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `plan_id_fk_idx` (`plan_id`),
  KEY `instr_type_id_fk_idx` (`instruction_type_id`),
  CONSTRAINT `instr_type_id_fk` FOREIGN KEY (`instruction_type_id`) REFERENCES `categorywithinstructiontypes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `plan_id_fk` FOREIGN KEY (`plan_id`) REFERENCES `patient_plans` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plan_instructions`
--

LOCK TABLES `plan_instructions` WRITE;
/*!40000 ALTER TABLE `plan_instructions` DISABLE KEYS */;
-- INSERT INTO `plan_instructions` VALUES (101,306,2,1,'2015-08-03 5:08:42 pm','587',NULL,NULL,1,'3040974c-39d4-11e5-b3de-00ff90065e86'),(102,308,2,1,'2015-08-03 5:23:06 pm','587',NULL,NULL,1,'333cf99e-39d6-11e5-b3de-00ff90065e86'),(103,310,2,1,'2015-08-03 6:30:39 pm','587',NULL,NULL,1,'a345388c-39df-11e5-b3de-00ff90065e86'),(104,312,2,1,'2015-08-04 10:37:07 am','587',NULL,NULL,1,'a7484f11-3a66-11e5-a437-00ffc0495d86'),(105,315,2,1,'2015-08-04 10:54:43 am','587',NULL,NULL,1,'1cbf8ee0-3a69-11e5-a437-00ffc0495d86'),(106,316,2,1,'2015-08-04 10:56:17 am','587',NULL,NULL,1,'54fdc1f1-3a69-11e5-a437-00ffc0495d86'),(107,317,2,1,'2015-08-04 10:58:45 am','587',NULL,NULL,1,'ace0b280-3a69-11e5-a437-00ffc0495d86'),(108,318,3,1,'2015-08-04 10:59:44 am','587',NULL,NULL,1,'d0093b75-3a69-11e5-a437-00ffc0495d86'),(109,319,2,1,'2015-08-04 11:21:02 am','587',NULL,NULL,1,'ca3a06b1-3a6c-11e5-a437-00ffc0495d86'),(110,320,2,1,'2015-08-04 11:21:51 am','587',NULL,NULL,1,'e75bbd0e-3a6c-11e5-a437-00ffc0495d86'),(111,321,5,1,'2015-08-04 11:22:32 am','587',NULL,NULL,1,'ff83e28e-3a6c-11e5-a437-00ffc0495d86'),(112,322,2,1,'2015-08-04 11:24:01 am','587',NULL,NULL,1,'34601a3d-3a6d-11e5-a437-00ffc0495d86'),(113,323,2,1,'2015-08-05 9:54:35 am','587',NULL,NULL,1,'e104779a-3b29-11e5-af1d-00ff980c6986'),(114,344,2,1,'2015-08-05 7:02:46 pm','587',NULL,NULL,1,'74ec9b98-3b76-11e5-9911-00ffe85a5386'),(115,344,4,1,'2015-08-05 7:02:47 pm','587',NULL,NULL,1,'757f9f91-3b76-11e5-9911-00ffe85a5386'),(116,344,11,1,'2015-08-05 7:02:47 pm','587',NULL,NULL,1,'75df3fa5-3b76-11e5-9911-00ffe85a5386'),(117,344,3,1,'2015-08-05 7:02:49 pm','587',NULL,NULL,1,'76ca54dc-3b76-11e5-9911-00ffe85a5386'),(118,344,1,1,'2015-08-05 7:02:50 pm','587',NULL,NULL,1,'7746820c-3b76-11e5-9911-00ffe85a5386'),(119,344,5,1,'2015-08-05 7:03:03 pm','587',NULL,NULL,1,'7f39eab5-3b76-11e5-9911-00ffe85a5386'),(120,349,2,1,'2015-08-06 11:07:05 am','587',NULL,NULL,1,'2c1cb081-3bfd-11e5-9eea-00ff982c7a86'),(121,349,3,1,'2015-08-06 11:07:06 am','587',NULL,NULL,1,'2c63bdba-3bfd-11e5-9eea-00ff982c7a86'),(122,349,1,1,'2015-08-06 11:07:06 am','587',NULL,NULL,1,'2cc04863-3bfd-11e5-9eea-00ff982c7a86'),(123,349,10,1,'2015-08-06 11:07:07 am','587',NULL,NULL,1,'2d2308a8-3bfd-11e5-9eea-00ff982c7a86'),(124,349,5,1,'2015-08-06 11:07:08 am','587',NULL,NULL,1,'2d8ad054-3bfd-11e5-9eea-00ff982c7a86'),(125,349,4,1,'2015-08-06 11:07:08 am','587',NULL,NULL,1,'2df6278a-3bfd-11e5-9eea-00ff982c7a86'),(126,349,11,1,'2015-08-06 11:07:09 am','587',NULL,NULL,1,'2e5a3863-3bfd-11e5-9eea-00ff982c7a86'),(127,350,2,1,'2015-08-18 11:45:53 am','587',NULL,NULL,1,'94e8f3e0-4570-11e5-b7f6-00ffb0698086'),(128,350,5,1,'2015-08-18 11:45:54 am','587',NULL,NULL,1,'9535c76b-4570-11e5-b7f6-00ffb0698086'),(129,351,2,1,'2015-08-27 11:44:48 am','587',NULL,NULL,1,'eb647af2-4c82-11e5-845e-00ffd0aa7c86'),(130,351,4,1,'2015-08-27 11:44:48 am','587',NULL,NULL,1,'ebb5fe05-4c82-11e5-845e-00ffd0aa7c86'),(131,351,3,1,'2015-08-27 11:44:49 am','587',NULL,NULL,1,'ec049b5f-4c82-11e5-845e-00ffd0aa7c86'),(132,351,11,1,'2015-08-27 11:44:49 am','587',NULL,NULL,1,'ec4153a9-4c82-11e5-845e-00ffd0aa7c86'),(133,351,5,1,'2015-08-27 11:44:50 am','587',NULL,NULL,1,'eca16816-4c82-11e5-845e-00ffd0aa7c86');
/*!40000 ALTER TABLE `plan_instructions` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = latin1 */ ;
/*!50003 SET character_set_results = latin1 */ ;
/*!50003 SET collation_connection  = latin1_swedish_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger `prmerge_plan_instructionsinsert` before insert on `plan_instructions` for each row
begin
-- =============================================
-- author:	sqlite-sync.com tomasz dziemidowicz//all right reserved
-- =============================================

	if (new.rowid is null) then
		set new.rowid = uuid();	
	end if;
	
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = latin1 */ ;
/*!50003 SET character_set_results = latin1 */ ;
/*!50003 SET collation_connection  = latin1_swedish_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger `prmerge_plan_instructionsupdate` before update on `plan_instructions` for each row
begin
-- =============================================
-- author:	sqlite-sync.com tomasz dziemidowicz//all right reserved
-- =============================================

	set new.rowver = ifnull(new.rowver,1)+1;		

end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-09-03 12:12:31

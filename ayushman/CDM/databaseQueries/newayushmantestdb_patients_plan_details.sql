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
-- Table structure for table `patients_plan_details`
--

DROP TABLE IF EXISTS `patients_plan_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patients_plan_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plan_instruction_id` int(11) NOT NULL,
  `instruction_attribute` varchar(45) NOT NULL,
  `instruction_attribute_value` varchar(45) NOT NULL,
  `createdon_c` varchar(45) DEFAULT NULL,
  `createdby_c` varchar(45) DEFAULT NULL,
  `editedon_c` varchar(45) DEFAULT NULL,
  `editedby_c` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `plan_instruction_id_fk_idx` (`plan_instruction_id`),
  CONSTRAINT `plan_instructions_id_fk` FOREIGN KEY (`plan_instruction_id`) REFERENCES `plan_instructions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=369 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patients_plan_details`
--

LOCK TABLES `patients_plan_details` WRITE;
/*!40000 ALTER TABLE `patients_plan_details` DISABLE KEYS */;
-- INSERT INTO `patients_plan_details` VALUES (272,101,'exercise_name','Abs','2015-08-03 5:08:42 pm','587',NULL,NULL),(273,101,'repetitions','55555','2015-08-03 5:08:42 pm','587',NULL,NULL),(274,101,'sets','1','2015-08-03 5:08:42 pm','587',NULL,NULL),(275,102,'exercise_name','Abs','2015-08-03 5:23:06 pm','587',NULL,NULL),(276,102,'repetitions','55555','2015-08-03 5:23:06 pm','587',NULL,NULL),(277,102,'sets','1','2015-08-03 5:23:06 pm','587',NULL,NULL),(278,103,'exercise_name','Abs','2015-08-03 6:30:40 pm','587',NULL,NULL),(279,103,'repetitions','654456','2015-08-03 6:30:40 pm','587',NULL,NULL),(280,103,'sets','1','2015-08-03 6:30:40 pm','587',NULL,NULL),(281,104,'exercise_name','Abs','2015-08-04 10:37:07 am','587',NULL,NULL),(282,104,'repetitions','45454','2015-08-04 10:37:07 am','587',NULL,NULL),(283,104,'sets','1','2015-08-04 10:37:07 am','587',NULL,NULL),(284,105,'exercise_name','Abs','2015-08-04 10:54:43 am','587',NULL,NULL),(285,105,'repetitions','12345','2015-08-04 10:54:43 am','587',NULL,NULL),(286,105,'sets','1','2015-08-04 10:54:43 am','587',NULL,NULL),(287,106,'exercise_name','Abs','2015-08-04 10:56:18 am','587',NULL,NULL),(288,106,'repetitions','12345','2015-08-04 10:56:18 am','587',NULL,NULL),(289,106,'sets','1','2015-08-04 10:56:18 am','587',NULL,NULL),(290,107,'exercise_name','Abs','2015-08-04 10:58:45 am','587',NULL,NULL),(291,107,'repetitions','12345','2015-08-04 10:58:45 am','587',NULL,NULL),(292,107,'sets','1','2015-08-04 10:58:45 am','587',NULL,NULL),(293,108,'exercise_name','Calf-raises','2015-08-04 10:59:44 am','587',NULL,NULL),(294,108,'weight_in_kgs','10','2015-08-04 10:59:44 am','587',NULL,NULL),(295,108,'repetitions','10','2015-08-04 10:59:44 am','587',NULL,NULL),(296,108,'sets','1','2015-08-04 10:59:44 am','587',NULL,NULL),(297,109,'exercise_name','Abs','2015-08-04 11:21:03 am','587',NULL,NULL),(298,109,'repetitions','12345','2015-08-04 11:21:03 am','587',NULL,NULL),(299,109,'sets','1','2015-08-04 11:21:03 am','587',NULL,NULL),(300,110,'exercise_name','Abs','2015-08-04 11:21:52 am','587',NULL,NULL),(301,110,'repetitions','12345','2015-08-04 11:21:52 am','587',NULL,NULL),(302,110,'sets','1','2015-08-04 11:21:52 am','587',NULL,NULL),(303,111,'food_based_nutrition_action','Avoid','2015-08-04 11:22:32 am','587',NULL,NULL),(304,111,'food_based_nutrition_options','milk,lemon','2015-08-04 11:22:32 am','587',NULL,NULL),(305,112,'exercise_name','Abs','2015-08-04 11:24:01 am','587',NULL,NULL),(306,112,'repetitions','12345','2015-08-04 11:24:01 am','587',NULL,NULL),(307,112,'sets','1','2015-08-04 11:24:01 am','587',NULL,NULL),(308,113,'exercise_name','Abs','2015-08-05 9:54:36 am','587',NULL,NULL),(309,113,'repetitions','12345','2015-08-05 9:54:36 am','587',NULL,NULL),(310,113,'sets','1','2015-08-05 9:54:36 am','587',NULL,NULL),(311,114,'exercise_name','Abs','2015-08-05 7:02:47 pm','587',NULL,NULL),(312,114,'repetitions','','2015-08-05 7:02:47 pm','587',NULL,NULL),(313,114,'sets','1','2015-08-05 7:02:47 pm','587',NULL,NULL),(314,115,'number_of_calories','','2015-08-05 7:02:48 pm','587',NULL,NULL),(315,115,'mealtime','Breakfast','2015-08-05 7:02:48 pm','587',NULL,NULL),(316,116,'health_param_name','Diastolic Blood Pressure','2015-08-05 7:02:49 pm','587',NULL,NULL),(317,116,'minimum_value','','2015-08-05 7:02:49 pm','587',NULL,NULL),(318,116,'maximum_value','','2015-08-05 7:02:49 pm','587',NULL,NULL),(319,117,'exercise_name','Calf-raises','2015-08-05 7:02:50 pm','587',NULL,NULL),(320,117,'weight_in_kgs','10','2015-08-05 7:02:50 pm','587',NULL,NULL),(321,117,'repetitions','10','2015-08-05 7:02:50 pm','587',NULL,NULL),(322,117,'sets','1','2015-08-05 7:02:50 pm','587',NULL,NULL),(323,119,'food_based_nutrition_action','Avoid','2015-08-05 7:03:04 pm','587',NULL,NULL),(324,119,'food_based_nutrition_options','milk,lemon','2015-08-05 7:03:04 pm','587',NULL,NULL),(325,118,'exercise_name','Jogging','2015-08-05 7:03:08 pm','587',NULL,NULL),(326,118,'duration','','2015-08-05 7:03:08 pm','587',NULL,NULL),(327,118,'duration_unit','hours','2015-08-05 7:03:08 pm','587',NULL,NULL),(328,118,'frequency','every 2 weeks','2015-08-05 7:03:08 pm','587',NULL,NULL),(329,120,'exercise_name','Pull-ups','2015-08-06 11:07:06 am','587','2015-08-21 11:35:33 am','587'),(330,120,'repetitions','22','2015-08-06 11:07:06 am','587','2015-08-21 11:35:33 am','587'),(331,120,'sets','4','2015-08-06 11:07:06 am','587','2015-08-21 11:35:33 am','587'),(332,121,'exercise_name','Hammer','2015-08-06 11:07:06 am','587','2015-08-21 11:35:33 am','587'),(333,121,'weight_in_kgs','20','2015-08-06 11:07:06 am','587','2015-08-21 11:35:33 am','587'),(334,121,'repetitions','15','2015-08-06 11:07:06 am','587','2015-08-21 11:35:33 am','587'),(335,121,'sets','2','2015-08-06 11:07:06 am','587','2015-08-21 11:35:33 am','587'),(336,122,'exercise_name','Running','2015-08-06 11:07:07 am','587','2015-08-21 11:35:33 am','587'),(337,122,'duration','20','2015-08-06 11:07:07 am','587','2015-08-21 11:35:33 am','587'),(338,122,'duration_unit','minutes','2015-08-06 11:07:07 am','587','2015-08-21 11:35:33 am','587'),(339,122,'frequency','everyweek','2015-08-06 11:07:07 am','587','2015-08-21 11:35:33 am','587'),(340,123,'health_param_name','Diastolic Blood Pressure','2015-08-06 11:07:07 am','587',NULL,NULL),(341,123,'minimum_value','','2015-08-06 11:07:08 am','587',NULL,NULL),(342,123,'maximum_value','','2015-08-06 11:07:08 am','587',NULL,NULL),(343,124,'food_based_nutrition_action','Avoid','2015-08-06 11:07:08 am','587',NULL,NULL),(344,124,'food_based_nutrition_options','non-veg,coconut-water,milk,lemon','2015-08-06 11:07:08 am','587','2015-08-21 11:35:33 am','587'),(345,125,'number_of_calories','1000','2015-08-06 11:07:09 am','587','2015-08-21 11:35:33 am','587'),(346,125,'mealtime','Dinner','2015-08-06 11:07:09 am','587','2015-08-21 11:35:33 am','587'),(347,126,'health_param_name','Diastolic Blood Pressure','2015-08-06 11:07:10 am','587',NULL,NULL),(348,126,'minimum_value','','2015-08-06 11:07:10 am','587',NULL,NULL),(349,126,'maximum_value','','2015-08-06 11:07:10 am','587',NULL,NULL),(350,127,'exercise_name','Pull-ups','2015-08-18 11:45:54 am','587','2015-08-21 11:40:39 am','587'),(351,127,'repetitions','33345','2015-08-18 11:45:54 am','587','2015-08-21 11:15:00 am','587'),(352,127,'sets','2','2015-08-18 11:45:54 am','587','2015-08-21 11:40:39 am','587'),(353,128,'food_based_nutrition_action','Avoid','2015-08-18 11:45:54 am','587','2015-08-21 11:40:39 am','587'),(354,128,'food_based_nutrition_options','non-veg,coconut-water,milk,lemon,brown-rice','2015-08-18 11:45:54 am','587','2015-08-21 11:15:00 am','587'),(355,129,'exercise_name','Push-ups','2015-08-27 11:44:49 am','587',NULL,NULL),(356,129,'repetitions','','2015-08-27 11:44:49 am','587',NULL,NULL),(357,129,'sets','1','2015-08-27 11:44:49 am','587',NULL,NULL),(358,130,'number_of_calories','','2015-08-27 11:44:49 am','587',NULL,NULL),(359,130,'mealtime','Breakfast','2015-08-27 11:44:49 am','587',NULL,NULL),(360,131,'exercise_name','Calf-raises','2015-08-27 11:44:49 am','587',NULL,NULL),(361,131,'weight_in_kgs','10','2015-08-27 11:44:49 am','587',NULL,NULL),(362,131,'repetitions','10','2015-08-27 11:44:49 am','587',NULL,NULL),(363,131,'sets','1','2015-08-27 11:44:49 am','587',NULL,NULL),(364,132,'health_param_name','Diastolic Blood Pressure','2015-08-27 11:44:50 am','587',NULL,NULL),(365,132,'minimum_value','','2015-08-27 11:44:50 am','587',NULL,NULL),(366,132,'maximum_value','','2015-08-27 11:44:50 am','587',NULL,NULL),(367,133,'food_based_nutrition_action','Avoid','2015-08-27 11:44:51 am','587',NULL,NULL),(368,133,'food_based_nutrition_options','','2015-08-27 11:44:51 am','587',NULL,NULL);
/*!40000 ALTER TABLE `patients_plan_details` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-09-03 12:12:46

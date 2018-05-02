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
-- Table structure for table `genericconstants`
--

DROP TABLE IF EXISTS `genericconstants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genericconstants` (
  `id` int(11) NOT NULL,
  `param_name` varchar(45) NOT NULL,
  `param_value` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genericconstants`
--

LOCK TABLES `genericconstants` WRITE;
/*!40000 ALTER TABLE `genericconstants` DISABLE KEYS */;
INSERT INTO `genericconstants` VALUES (1,'duration','10'),(2,'duration','20'),(3,'duration','30'),(4,'duration','40'),(5,'exercise_name','Walking'),(6,'exercise_name','Running'),(7,'exercise_name','Swimming'),(8,'exercise_name','Jogging'),(9,'duration_units','minutes'),(10,'duration_units','hours'),(11,'weight_based_exercise','Weight-lifting'),(12,'weight_based_exercise','Lat-pull-down'),(13,'weight_based_exercise','Closed-grip-pull-down'),(14,'weight_based_exercise','Shrugs'),(15,'weight_based_exercise','Overhead'),(16,'weight_based_exercise','Hammer'),(17,'weight_based_exercise','Leg-press'),(18,'weight_based_exercise','Calf-raises'),(19,'body_weight_exercise','Abs'),(20,'body_weight_exercise','Push-ups'),(21,'body_weight_exercise','Pull-ups'),(22,'body_weight_exercise','Sit-ups'),(23,'sets','1'),(24,'sets','2'),(25,'sets','3'),(26,'sets','4'),(27,'sets','5'),(28,'sets','6'),(29,'sets','7'),(30,'sets','8'),(31,'repetitions','5'),(32,'repetitions','10'),(33,'repetitions','15'),(34,'repetitions','20'),(35,'repetitions','25'),(36,'repetitions','30'),(37,'repetitions','35'),(38,'repetitions','40'),(39,'repetitions','45'),(40,'repetitions','50'),(41,'frequency','everyday'),(42,'frequency','everyweek'),(43,'frequency','everymonth'),(44,'frequency','every alternate day'),(45,'frequency','every 2 weeks'),(46,'frequency','every 3 weeks'),(47,'mealtimes','Breakfast'),(48,'mealtimes','Lunch'),(49,'mealtimes','Snack'),(50,'mealtimes','Dinner'),(51,'food_based_nutrition_dd_options','Avoid'),(52,'food_based_nutrition_dd_options','Must Have'),(53,'food_based_nutrition_dd_options','Good To Have'),(54,'health_param_name','Systolic Blood Pressure'),(55,'health_param_name','Diastolic Blood Pressure'),(56,'health_param_name','Fasting Blood Sugar'),(57,'health_param_name','Post Prandial Blood Sugar'),(58,'test_name','RBC'),(59,'test_name','Platelet count'),(60,'acceptable_range','60-180'),(61,'acceptable_range','7-14'),(62,'acceptable_range','135000-200000'),(63,'acceptable_range','80-140'),(64,'timeframe_options','Past 3 months'),(65,'timeframe_options','Past 4 months'),(66,'timeframe_options','Past 5 months'),(67,'timeframe_options','Past 6 months');
/*!40000 ALTER TABLE `genericconstants` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-09-03 12:12:47

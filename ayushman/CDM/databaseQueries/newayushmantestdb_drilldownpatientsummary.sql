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
-- Table structure for table `drilldownpatientsummary`
--

DROP TABLE IF EXISTS `drilldownpatientsummary`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `drilldownpatientsummary` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `timeframe_id` int(11) DEFAULT NULL,
  `dimension_id` int(11) DEFAULT NULL,
  `group_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drilldownpatientsummary`
--

LOCK TABLES `drilldownpatientsummary` WRITE;
/*!40000 ALTER TABLE `drilldownpatientsummary` DISABLE KEYS */;
-- INSERT INTO `drilldownpatientsummary` VALUES (1,384,99,1,1,'0-25%'),(2,385,99,1,1,'26-50%'),(3,386,99,1,1,'26-50%'),(4,387,99,1,1,'51-75%'),(5,388,99,1,1,'0-25%'),(6,389,99,1,1,'26-50%'),(7,390,99,1,1,'0-25%'),(8,391,99,1,1,'0-25%'),(9,392,99,1,1,'51-75%'),(10,393,99,1,1,'26-50%'),(11,394,99,1,1,'51-75%'),(12,395,99,1,1,'0-25%'),(13,396,99,1,1,'51-75%'),(14,397,99,1,1,'76-100%'),(15,398,99,1,1,'51-75%'),(16,399,99,1,1,'76-100%'),(17,400,99,1,1,'51-75%'),(18,401,99,1,1,'0-25%'),(19,402,99,1,1,'26-50%'),(20,403,99,1,1,'76-100%'),(21,384,99,1,2,'0-25%'),(22,385,99,1,2,'0-25%'),(23,386,99,1,2,'26-50%'),(24,387,99,1,2,'51-75%'),(25,388,99,1,2,'0-25%'),(26,389,99,1,2,'26-50%'),(27,390,99,1,2,'76-100%'),(28,391,99,1,2,'0-25%'),(29,392,99,1,2,'0-25%'),(30,393,99,1,2,'0-25%'),(31,394,99,1,2,'26-50%'),(32,395,99,1,2,'51-75%'),(33,396,99,1,2,'51-75%'),(34,397,99,1,2,'0-25%'),(35,398,99,1,2,'51-75%'),(36,399,99,1,2,'0-25%'),(37,400,99,1,2,'0-25%'),(38,401,99,1,2,'26-50%'),(39,402,99,1,2,'51-75%'),(40,403,99,1,2,'76-100%'),(41,384,99,1,3,'76-100%'),(42,385,99,1,3,'0-25%'),(43,386,99,1,3,'76-100%'),(44,387,99,1,3,'26-50%'),(45,388,99,1,3,'51-75%'),(46,389,99,1,3,'26-50%'),(47,390,99,1,3,'76-100%'),(48,391,99,1,3,'51-75%'),(49,392,99,1,3,'0-25%'),(50,393,99,1,3,'76-100%'),(51,394,99,1,3,'26-50%'),(52,395,99,1,3,'0-25%'),(53,396,99,1,3,'76-100%'),(54,397,99,1,3,'26-50%'),(55,398,99,1,3,'51-75%'),(56,399,99,1,3,'0-25%'),(57,400,99,1,3,'76-100%'),(58,401,99,1,3,'26-50%'),(59,402,99,1,3,'51-75%'),(60,403,99,1,3,'0-25%'),(61,384,99,1,4,'51-75%'),(62,385,99,1,4,'26-50%'),(63,386,99,1,4,'51-75%'),(64,387,99,1,4,'76-100%'),(65,388,99,1,4,'0-25%'),(66,389,99,1,4,'26-50%'),(67,390,99,1,4,'51-75%'),(68,391,99,1,4,'76-100%'),(69,392,99,1,4,'26-50%'),(70,393,99,1,4,'51-75%'),(71,394,99,1,4,'0-25%'),(72,395,99,1,4,'76-100%'),(73,396,99,1,4,'26-50%'),(74,397,99,1,4,'76-100%'),(75,398,99,1,4,'26-50%'),(76,399,99,1,4,'0-25%'),(77,400,99,1,4,'51-75%'),(78,401,99,1,4,'26-50%'),(79,402,99,1,4,'76-100%'),(80,403,99,1,4,'51-75%'),(81,384,99,1,5,'Normal'),(82,385,99,1,5,'Normal'),(83,386,99,1,5,'Abnormal'),(84,387,99,1,5,'Close To Normal'),(85,388,99,1,5,'Critical'),(86,389,99,1,5,'Normal'),(87,390,99,1,5,'Abnormal'),(88,391,99,1,5,'Normal'),(89,392,99,1,5,'Normal'),(90,393,99,1,5,'Close To Normal'),(91,394,99,1,5,'Critical'),(92,395,99,1,5,'Abnormal'),(93,396,99,1,5,'Close To Normal'),(94,397,99,1,5,'Normal'),(95,398,99,1,5,'Abnormal'),(96,399,99,1,5,'Close To Normal'),(97,400,99,1,5,'Close To Normal'),(98,401,99,1,5,'Abnormal'),(99,402,99,1,5,'Close To Normal'),(100,403,99,1,5,'Critical');
/*!40000 ALTER TABLE `drilldownpatientsummary` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-09-03 12:12:53

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
-- Table structure for table `instructiontype_attributes`
--

DROP TABLE IF EXISTS `instructiontype_attributes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instructiontype_attributes` (
  `id` int(11) NOT NULL,
  `instructiontype_id` int(11) NOT NULL,
  `sequence_number` int(11) NOT NULL,
  `parameter_type` varchar(45) NOT NULL,
  `attribute` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instructiontype_attributes`
--

LOCK TABLES `instructiontype_attributes` WRITE;
/*!40000 ALTER TABLE `instructiontype_attributes` DISABLE KEYS */;
INSERT INTO `instructiontype_attributes` VALUES (1,1,1,'select','exercise_name'),(2,1,2,'text','duration'),(3,1,3,'select','duration_unit'),(4,1,4,'select','frequency'),(5,2,1,'select','exercise_name'),(6,2,2,'text','weight_in_kgs'),(7,2,3,'text','repetitions'),(8,2,4,'select','sets'),(9,3,1,'select','exercise_name'),(10,3,2,'text','repetitions'),(11,3,3,'select','sets');
/*!40000 ALTER TABLE `instructiontype_attributes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-09-03 12:12:25

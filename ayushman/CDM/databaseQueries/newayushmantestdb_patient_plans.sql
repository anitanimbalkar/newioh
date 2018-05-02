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
-- Table structure for table `patient_plans`
--

DROP TABLE IF EXISTS `patient_plans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patient_plans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `start_date` varchar(45) DEFAULT NULL,
  `end_date` varchar(45) DEFAULT NULL,
  `createdon_c` varchar(45) DEFAULT NULL,
  `createdby_c` varchar(45) DEFAULT NULL,
  `editedon_c` varchar(45) DEFAULT NULL,
  `editedby_c` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=352 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patient_plans`
--

LOCK TABLES `patient_plans` WRITE;
/*!40000 ALTER TABLE `patient_plans` DISABLE KEYS */;
-- INSERT INTO `patient_plans` VALUES (305,384,99,'2015-08-03','2015-11-01','2015-08-03 4:58:48 pm','587',NULL,NULL),(306,385,99,'2015-08-03','2015-11-01','2015-08-03 5:07:53 pm','587',NULL,NULL),(307,386,99,'2015-08-03','2015-11-01','2015-08-03 5:11:08 pm','587',NULL,NULL),(308,387,99,'2015-08-03','2015-11-01','2015-08-03 5:21:17 pm','587',NULL,NULL),(309,388,99,'2015-08-03','2015-11-01','2015-08-03 5:25:19 pm','587',NULL,NULL),(310,389,99,'2015-08-03','2015-11-01','2015-08-03 6:29:03 pm','587',NULL,NULL),(311,390,99,'2015-08-03','2015-11-01','2015-08-03 6:34:40 pm','587',NULL,NULL),(312,391,99,'2015-08-04','2015-11-02','2015-08-04 10:36:35 am','587',NULL,NULL),(313,392,99,'2015-08-05','2015-11-03','2015-08-04 10:38:08 am','587',NULL,NULL),(314,393,99,'2015-08-04','2015-11-02','2015-08-04 10:51:16 am','587',NULL,NULL),(315,394,99,'2015-08-04','2015-11-02','2015-08-04 10:53:37 am','587',NULL,NULL),(316,395,99,'2015-08-04','2015-11-02','2015-08-04 10:55:58 am','587',NULL,NULL),(317,396,99,'2015-08-04','2015-11-02','2015-08-04 10:58:19 am','587',NULL,NULL),(318,397,99,'2015-08-04','2015-11-02','2015-08-04 10:59:39 am','587',NULL,NULL),(319,398,99,'2015-08-04','2015-11-02','2015-08-04 11:20:21 am','587',NULL,NULL),(320,399,99,'2015-08-04','2015-11-02','2015-08-04 11:21:51 am','587',NULL,NULL),(321,400,99,'2015-08-05','2015-11-03','2015-08-04 11:22:32 am','587',NULL,NULL),(322,401,99,'2015-08-04','2015-11-02','2015-08-04 11:24:00 am','587',NULL,NULL),(323,402,99,'2015-08-05','2015-11-03','2015-08-05 9:54:34 am','587',NULL,NULL),(324,403,99,'2015-08-05','2015-11-03','2015-08-05 3:01:27 pm','587',NULL,NULL),(325,397,99,'2015-08-05','2015-11-03','2015-08-05 3:07:25 pm','587',NULL,NULL),(326,399,99,'2015-08-05','2015-11-03','2015-08-05 3:10:03 pm','587',NULL,NULL),(327,399,99,'2015-08-05','2015-11-03','2015-08-05 3:12:55 pm','587',NULL,NULL),(328,397,99,'2015-08-05','2015-11-03','2015-08-05 3:14:32 pm','587',NULL,NULL),(329,399,99,'2015-08-05','2015-11-03','2015-08-05 3:16:28 pm','587',NULL,NULL),(330,400,99,'2015-08-05','2015-11-03','2015-08-05 3:22:50 pm','587',NULL,NULL),(331,397,99,'2015-08-05','2015-11-03','2015-08-05 3:32:00 pm','587',NULL,NULL),(332,399,99,'2015-08-05','2015-11-03','2015-08-05 3:38:36 pm','587',NULL,NULL),(333,397,99,'2015-08-05','2015-11-03','2015-08-05 3:42:34 pm','587',NULL,NULL),(334,397,99,'2015-08-05','2015-11-03','2015-08-05 3:42:44 pm','587',NULL,NULL),(335,397,99,'2015-08-05','2015-11-03','2015-08-05 3:42:57 pm','587',NULL,NULL),(336,397,99,'2015-08-05','2015-11-03','2015-08-05 3:43:07 pm','587',NULL,NULL),(337,397,99,'2015-08-05','2015-11-03','2015-08-05 3:47:26 pm','587',NULL,NULL),(338,397,99,'2015-08-05','2015-11-03','2015-08-05 3:50:43 pm','587',NULL,NULL),(339,397,99,'2015-08-05','2015-11-03','2015-08-05 4:23:43 pm','587',NULL,NULL),(340,397,99,'2015-08-05','2015-11-03','2015-08-05 5:29:26 pm','587',NULL,NULL),(341,399,99,'2015-08-05','2015-11-03','2015-08-05 5:37:47 pm','587',NULL,NULL),(342,397,99,'2015-08-05','2015-11-03','2015-08-05 5:39:55 pm','587',NULL,NULL),(343,399,99,'2015-08-05','2015-11-03','2015-08-05 5:54:03 pm','587',NULL,NULL),(344,397,99,'2015-08-05','2015-11-03','2015-08-05 7:02:44 pm','587',NULL,NULL),(345,397,99,'2015-08-05','2015-11-03','2015-08-05 7:06:03 pm','587',NULL,NULL),(346,397,99,'2015-08-05','2015-11-03','2015-08-05 7:06:26 pm','587',NULL,NULL),(347,397,99,'2015-08-05','2015-11-03','2015-08-05 7:06:52 pm','587',NULL,NULL),(348,397,99,'2015-08-05','2015-11-03','2015-08-05 7:08:07 pm','587',NULL,NULL),(349,397,99,'2015-08-06','2015-11-04','2015-08-06 11:07:04 am','587',NULL,NULL),(350,384,99,'2015-08-18','2015-11-16','2015-08-18 11:45:53 am','587',NULL,NULL),(351,384,99,'2015-08-27','2015-11-25','2015-08-27 11:44:47 am','587',NULL,NULL);
/*!40000 ALTER TABLE `patient_plans` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-09-03 12:12:35
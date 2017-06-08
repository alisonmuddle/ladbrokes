-- MySQL dump 10.13  Distrib 5.5.54, for Linux (x86_64)
--
-- Host: localhost    Database: ladbrokes
-- ------------------------------------------------------
-- Server version	5.5.54

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
-- Table structure for table `competitor`
--

DROP TABLE IF EXISTS `competitor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `competitor` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `competitor`
--

LOCK TABLES `competitor` WRITE;
/*!40000 ALTER TABLE `competitor` DISABLE KEYS */;
INSERT INTO `competitor` VALUES (1,'Shes the One'),(2,'Bob the Builder'),(3,'Top Cat'),(4,'Freddie Flintstone'),(5,'Limelight'),(6,'Barney Rubble'),(7,'Jumping Jack Flash'),(8,'Cruise Missile'),(9,'Scooby Doo'),(10,'Mike the Monkey'),(11,'Doodlebug'),(12,'Peter PAn'),(13,'Peter Rabbit'),(14,'Jack Spratt'),(15,'Loonie Tunes'),(16,'Bugs Bunny'),(17,'Daffy Duck'),(18,'Mickey Mouse'),(19,'Minnie Mouse'),(20,'Phar Lap');
/*!40000 ALTER TABLE `competitor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meeting`
--

DROP TABLE IF EXISTS `meeting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meeting` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `race_type_id` int(9) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meeting`
--

LOCK TABLES `meeting` WRITE;
/*!40000 ALTER TABLE `meeting` DISABLE KEYS */;
INSERT INTO `meeting` VALUES (1,'Albion Park',1),(2,'Eagle Farm',2);
/*!40000 ALTER TABLE `meeting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `race`
--

DROP TABLE IF EXISTS `race`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `race` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `closing_time` datetime DEFAULT NULL,
  `race_type_id` int(9) NOT NULL,
  `meeting_id` int(9) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `race`
--

LOCK TABLES `race` WRITE;
/*!40000 ALTER TABLE `race` DISABLE KEYS */;
INSERT INTO `race` VALUES (1,'2017-06-09 08:00:00',1,1),(2,'2017-06-09 08:30:00',2,2),(3,'2017-06-09 08:45:00',1,1),(4,'2017-06-09 10:45:00',2,2),(5,'2017-06-08 21:10:00',3,1),(6,'2017-06-08 20:51:00',1,1),(7,'2017-06-08 20:55:00',2,1);
/*!40000 ALTER TABLE `race` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `race_competitor`
--

DROP TABLE IF EXISTS `race_competitor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `race_competitor` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `race_id` int(9) NOT NULL,
  `competitor_id` int(9) NOT NULL,
  `position` int(9) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `race_competitor`
--

LOCK TABLES `race_competitor` WRITE;
/*!40000 ALTER TABLE `race_competitor` DISABLE KEYS */;
INSERT INTO `race_competitor` VALUES (1,1,1,2),(2,1,2,1),(3,1,3,4),(4,1,4,3),(5,2,5,2),(6,2,6,4),(7,2,7,3),(8,2,8,1),(9,3,9,1),(10,3,10,4),(11,3,11,2),(12,3,12,3),(13,4,13,1),(14,4,14,2),(15,4,15,3),(16,4,16,4),(17,5,17,4),(18,5,18,3),(19,5,19,2),(20,5,20,1),(21,6,3,1),(22,6,5,2),(23,6,10,3),(24,6,12,4),(25,7,15,4),(26,7,7,3),(27,7,3,2),(28,7,4,1),(29,7,1,5);
/*!40000 ALTER TABLE `race_competitor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `race_type`
--

DROP TABLE IF EXISTS `race_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `race_type` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `race_type`
--

LOCK TABLES `race_type` WRITE;
/*!40000 ALTER TABLE `race_type` DISABLE KEYS */;
INSERT INTO `race_type` VALUES (1,'Thoroughbred'),(2,'Greyhounds'),(3,'Harness');
/*!40000 ALTER TABLE `race_type` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-06-08 21:48:25

-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: localhost    Database: support
-- ------------------------------------------------------
-- Server version	5.7.36

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `acceso_sistema`
--

DROP TABLE IF EXISTS `acceso_sistema`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `acceso_sistema` (
  `id_acceso_s` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_sistema` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_acceso_s`),
  KEY `id_user` (`id_user`),
  KEY `id_sistema` (`id_sistema`)
) ENGINE=MyISAM AUTO_INCREMENT=259 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acceso_sistema`
--

LOCK TABLES `acceso_sistema` WRITE;
/*!40000 ALTER TABLE `acceso_sistema` DISABLE KEYS */;
INSERT INTO `acceso_sistema` VALUES (1,244,1,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(2,244,2,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(3,244,3,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(4,244,4,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(5,244,5,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(6,244,6,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(7,244,7,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(8,244,9,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(9,244,10,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(10,244,11,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(11,244,12,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(12,244,13,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(13,244,14,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(14,244,15,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(15,244,15,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(16,244,17,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(17,244,18,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(18,62,1,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(19,62,2,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(20,62,9,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(21,62,15,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(22,459,17,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(23,264,1,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(24,264,2,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(25,39,3,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(26,39,7,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(27,4,3,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(28,4,4,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(29,4,5,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(30,4,6,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(31,4,7,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(32,4,10,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(33,4,17,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(34,252,9,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(35,38,7,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(36,38,10,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(37,92,11,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(38,92,12,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(39,92,13,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(40,362,1,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(41,79,9,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(42,79,15,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(43,121,18,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(44,37,2,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(45,423,15,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(46,417,17,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(47,423,18,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(48,277,2,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(49,277,3,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(50,277,4,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(51,277,5,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(52,277,6,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(53,277,7,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(54,277,9,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(55,277,10,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(56,277,11,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(57,277,12,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(58,277,13,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(59,277,14,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(60,277,15,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(61,277,15,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(62,277,17,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(63,277,18,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(64,277,1,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(65,149,2,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(66,149,1,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(67,149,15,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(68,177,11,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(69,177,12,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(70,177,13,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(71,126,1,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(72,126,2,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(73,126,3,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(74,126,4,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(75,126,5,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(76,126,6,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(77,126,7,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(78,126,9,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(79,126,10,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(80,126,11,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(81,126,12,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(82,126,13,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(83,126,15,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(84,126,15,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(85,126,17,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(86,126,18,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(87,108,18,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(88,349,1,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(89,349,2,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(90,349,3,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(91,349,4,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(92,349,5,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(93,349,6,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(94,349,7,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(95,349,9,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(96,349,10,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(97,349,11,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(98,349,12,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(99,349,13,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(100,349,14,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(101,349,15,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(102,349,15,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(103,349,17,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(104,349,18,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(105,92,18,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(106,255,5,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(107,255,4,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(108,255,6,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(109,415,3,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(110,244,8,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(111,244,8,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(112,62,8,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(113,62,8,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(114,423,11,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(115,423,12,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(116,453,11,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(117,453,12,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(118,422,2,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(119,423,13,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(120,453,13,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(121,453,15,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(122,453,18,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(123,255,17,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(124,415,18,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(125,121,1,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(126,121,2,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(127,121,3,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(128,121,4,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(129,121,5,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(130,121,6,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(131,121,7,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(132,121,9,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(133,121,10,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(134,121,11,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(135,121,12,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(136,121,13,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(137,121,14,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(138,121,15,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(139,121,15,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(140,121,17,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(141,121,18,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(142,121,8,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(143,258,1,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(144,258,2,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(145,258,3,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(146,258,4,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(147,258,5,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(148,258,6,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(149,258,9,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(150,258,10,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(151,258,11,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(152,258,12,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(153,258,13,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(154,258,14,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(155,258,15,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(156,258,15,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(157,258,17,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(158,258,18,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(159,258,8,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(160,258,7,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(161,459,5,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(162,252,11,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(163,252,12,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(164,252,13,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(165,252,1,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(166,252,2,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(167,252,3,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(168,252,4,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(169,252,5,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(170,252,6,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(171,252,7,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(172,252,10,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(173,252,14,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(174,252,15,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(175,252,15,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(176,252,17,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(177,252,18,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(178,252,8,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(179,252,8,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(180,423,1,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(181,423,2,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(182,423,3,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(183,423,4,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(184,423,5,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(185,423,6,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(186,423,7,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(187,423,9,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(188,423,10,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(189,423,14,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(190,423,15,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(191,423,17,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(192,423,8,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(193,423,8,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(194,423,8,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(195,432,2,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(196,111,11,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(197,111,12,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(198,244,16,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(199,39,16,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(200,367,17,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(201,367,15,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(202,227,4,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(203,227,5,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(204,227,6,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(205,227,7,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(206,227,9,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(207,245,18,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(208,423,16,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(209,111,13,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(210,469,18,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(211,37,15,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(212,164,7,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(213,367,5,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(214,290,2,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(215,290,1,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(216,290,11,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(217,290,12,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(218,426,1,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(219,426,2,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(220,426,3,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(221,426,4,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(222,426,5,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(223,426,6,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(224,426,7,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(225,426,9,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(226,426,10,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(227,426,11,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(228,426,12,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(229,426,13,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(230,426,15,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(231,426,15,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(232,426,17,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(233,426,18,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(234,426,8,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(235,426,16,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(236,413,17,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(237,62,1,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(238,62,2,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(239,62,3,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(240,62,4,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(241,62,5,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(242,62,6,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(243,62,7,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(244,62,9,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(245,62,10,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(246,62,11,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(247,62,12,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(248,62,13,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(249,62,15,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(250,62,17,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(251,62,18,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(252,62,8,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(253,62,16,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(254,244,12,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(255,367,12,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(256,177,18,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(257,79,18,'2024-01-29 22:11:54','2024-01-29 22:11:54'),(258,4,14,'2024-03-05 21:33:14','2024-03-05 21:33:14');
/*!40000 ALTER TABLE `acceso_sistema` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-03-05 17:24:08

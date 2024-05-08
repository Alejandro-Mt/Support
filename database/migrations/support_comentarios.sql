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
-- Table structure for table `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `folio` varchar(100) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `comentario` text,
  `tipo` enum('padre','hijo') DEFAULT NULL,
  `id_estatus` int(11) DEFAULT NULL,
  `fecha_seg` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_comentario`),
  KEY `id_user` (`id_user`),
  KEY `id_estatus` (`id_estatus`),
  KEY `folio` (`folio`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentarios`
--

LOCK TABLES `comentarios` WRITE;
/*!40000 ALTER TABLE `comentarios` DISABLE KEYS */;
INSERT INTO `comentarios` VALUES (1,'SPIP-001-24',244,'TEST','padre',1,NULL,'2024-02-21 17:56:58','2024-02-21 17:56:58'),(2,'SPIP-002-24',244,'TEST2','padre',5,NULL,'2024-02-21 17:56:58','2024-02-21 17:56:58'),(3,'EXT-001-24',367,'test de seguimiento','padre',1,NULL,'2024-02-21 18:00:45','2024-02-21 18:00:45'),(4,'CC-001-24',367,'ejemplo','padre',1,NULL,'2024-02-21 18:22:22','2024-02-21 18:22:22'),(5,'CC-001-24',244,'Comentario de PIP','hijo',1,'2024-02-22 12:24:00','2024-02-21 18:26:25','2024-02-21 18:26:25'),(6,'CC-001-24',244,'cierre','hijo',1,'2024-02-22 12:27:00','2024-02-21 18:28:04','2024-02-21 18:28:04'),(7,'SPIP-003-24',244,'TEST','padre',1,NULL,'2024-02-21 18:37:51','2024-02-21 18:37:51'),(8,'SPIP-004-24',244,'TEST2','padre',5,NULL,'2024-02-21 18:37:51','2024-02-21 18:37:51'),(9,'CC-002-24',367,'test','padre',1,NULL,'2024-03-05 20:37:42','2024-03-05 20:37:42');
/*!40000 ALTER TABLE `comentarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-03-05 17:24:07

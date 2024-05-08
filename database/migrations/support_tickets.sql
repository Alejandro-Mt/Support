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
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tickets` (
  `id_ticket` int(11) NOT NULL AUTO_INCREMENT,
  `folio` varchar(100) NOT NULL,
  `nivel` int(11) DEFAULT '2',
  `fecha_reporte` timestamp NULL DEFAULT NULL,
  `id_departamento` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_estatus` int(11) DEFAULT NULL,
  `id_incidencia` int(11) DEFAULT NULL,
  `id_solicitante` int(11) DEFAULT NULL,
  `id_localidad` int(11) DEFAULT NULL,
  `id_sistema` int(11) DEFAULT NULL,
  `id_so` int(11) DEFAULT NULL,
  `id_cc` int(11) DEFAULT NULL,
  `id_pip` int(11) DEFAULT NULL,
  `id_op` int(11) DEFAULT NULL,
  `id_arq` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_ticket`),
  KEY `id_departamento` (`id_departamento`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_estatus` (`id_estatus`),
  KEY `id_incidencia` (`id_incidencia`),
  KEY `id_solicitante` (`id_solicitante`),
  KEY `id_localidad` (`id_localidad`),
  KEY `id_sistema` (`id_sistema`),
  KEY `id_so` (`id_so`),
  KEY `id_cc` (`id_cc`),
  KEY `id_op` (`id_op`),
  KEY `id_arq` (`id_arq`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tickets`
--

LOCK TABLES `tickets` WRITE;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
INSERT INTO `tickets` VALUES (1,'SPIP-001-24',2,'2024-01-01 06:00:00',NULL,19,1,69,108,1,14,1,0,244,NULL,NULL,'2024-02-21 17:56:58','2024-02-21 17:56:58'),(2,'SPIP-002-24',2,'2024-02-01 06:00:00',NULL,23,5,66,415,3,14,1,0,244,NULL,NULL,'2024-02-21 17:56:58','2024-02-21 17:56:58'),(3,'EXT-001-24',1,'2024-02-21 18:00:45',NULL,1,1,NULL,367,1,1,NULL,NULL,NULL,NULL,NULL,'2024-02-21 18:00:45','2024-02-21 18:00:45'),(4,'CC-001-24',1,'2024-02-21 18:20:00',NULL,25,5,69,4,1,14,1,399,244,NULL,367,'2024-02-21 18:22:22','2024-02-21 18:28:04'),(5,'SPIP-003-24',2,'2024-01-01 06:00:00',NULL,19,1,69,108,1,14,1,0,244,NULL,NULL,'2024-02-21 18:37:51','2024-02-21 18:37:51'),(6,'SPIP-004-24',2,'2024-02-01 06:00:00',NULL,23,5,66,415,3,14,1,0,244,NULL,NULL,'2024-02-21 18:37:51','2024-02-21 18:37:51'),(7,'CC-002-24',1,'2024-03-05 20:37:00',NULL,25,1,62,367,3,18,1,21,NULL,NULL,NULL,'2024-03-05 20:37:42','2024-03-05 20:37:42');
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;
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

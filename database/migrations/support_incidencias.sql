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
-- Table structure for table `incidencias`
--

DROP TABLE IF EXISTS `incidencias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `incidencias` (
  `id_incidencia` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `id_sistema` int(11) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_incidencia`),
  KEY `id_sistema` (`id_sistema`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `incidencias`
--

LOCK TABLES `incidencias` WRITE;
/*!40000 ALTER TABLE `incidencias` DISABLE KEYS */;
INSERT INTO `incidencias` VALUES (1,'NO SE MUESTRA MENÚ COMPLETO',1,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(2,'GESTOR NO VISUALIZA A SU COLABORADOR',1,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(3,'MENSAJE HORARIO ROTATIVO',1,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(4,'NO VISUALIZA SU CURSO POR REALIZAR',2,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(5,'EL CURSO NO CAMBIA DE ESTATUS ',2,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(6,'NO PUEDE INGRESAR A PLATAFORMA',2,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(7,'ASIGNACIÓN DE FOLIOS',5,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(8,'ALMACENAMIENTO',5,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(9,'ASIGNACIÓN DE USUARIO PARA NOTIFICACIONES',5,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(10,'RUTA NO CORRESPONDE',5,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(11,'DATOS MOVILES',5,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(12,'SINCRONIZACIÓN',5,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(13,'DESCARGA DE INFORMACIÓN',5,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(14,'GPS',5,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(15,'FOLIO NO EXISTE',5,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(16,'NO SE MUESTRAN PRODUCTOS',5,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(17,'REVISIÓN DE REGISTROS',5,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(18,'ASIGNACIÓN DE MENÚ',5,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(19,'ACCESO',6,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(20,'NO SE MUESTRAN LAS MANIOBRAS',6,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(21,'NO PERMITE CAPTURAR',6,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(22,'NO PERMITE SINCRONIZAR',6,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(23,'REASIGNACIÓN DE MANIOBRAS',6,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(24,'CANCELACIÓN DE MANIOBRAS',6,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(25,'PROYECTO',7,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(26,'FLUJO DE TRABAJO',7,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(27,'NOTIFICACIONES',7,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(28,'VACANTES / SOLICITUDES',7,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(29,'SOLICITUDES ADMINISTRATIVAS',7,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(30,'DATA',7,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(31,'MI RECLU',7,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(32,'GENERAL',7,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(33,'ERROR USUARIO',7,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(34,'NO SE VISUALIZA EL USUARIO OBJETIVO PARA NOTIFICACIÓN',9,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(35,'NO APARECE EL CURSO PARA DETONAR NOTIFICACIONES',9,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(36,'NO PUEDE INGRESAR',15,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(37,'NO PUEDE CAMBIAR LA CONTRASEÑA',15,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(38,'NO RECIBE LOS CÓDIGOS DE SEGURIDAD',15,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(39,'ERROR EN CONFIRMACIÓN',15,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(40,'NO PUEDE PEDIR PRÉSTAMOS',15,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(41,'NO VISUALIZA SUS RECIBOS DE NÓMINA',15,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(42,'NO RECIBE NOTIFICACIONES',15,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(43,'ASIGNACIÓN DE FOLIOS',17,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(44,'CONFIGURACIÓN FECHA Y HORA',17,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(45,'ALMACENAMIENTO',17,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(46,'ASIGNACIÓN DE USUARIO PARA NOTIFICACIONES',17,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(47,'RUTA NO CORRESPONDE',17,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(48,'DATOS MOVILES',17,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(49,'SINCRONIZACIÓN',17,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(50,'DESCARGA DE INFORMACIÓN',17,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(51,'GPS',17,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(52,'FOLIO NO EXISTE',17,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(53,'NO SE MUESTRAN PRODUCTOS',17,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(54,'ACTUALIZACIÓN DE VERSIÓN TEAM',17,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(55,'NOTIFICACIONES TEAM',17,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(56,'REVISIÓN DE REGISTROS',17,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(57,'ASIGNACIÓN DE MENÚ',17,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(58,'Demora en loguear',18,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(59,'Demora en captar el dashboard o la sección de favoritos o recientes',18,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(60,'La configuración de los perfiles no se actualiza correctamente',18,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(61,'No están bien dimensionados los tableros de acuerdo a la plataforma donde se visualizan',18,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(62,'Mal diseño de banners',18,1,'2024-01-09 17:15:49','2024-01-09 17:15:49'),(63,'ACTUALIZACION DE ACCESOS',14,1,'2024-01-31 20:05:30','2024-01-31 20:05:30'),(64,'ACTUALIZACION DE CATALOGOS',14,1,'2024-01-31 20:05:30','2024-01-31 20:05:30'),(65,'AJUSTE DE RESPONSABLES',14,1,'2024-01-31 20:05:30','2024-01-31 20:05:30'),(66,'BUG EN SISTEMA',14,1,'2024-01-31 20:05:30','2024-01-31 20:05:30'),(67,'ERROR EN CARGA DE ARCHIVOS',14,1,'2024-01-31 20:05:30','2024-01-31 20:05:30'),(68,'NUEVO USUARIO',14,1,'2024-01-31 20:05:30','2024-01-31 20:05:30'),(69,'OTRA',14,1,'2024-01-31 20:05:30','2024-01-31 20:05:30'),(70,'SOLICITUD DE SCRIPT',14,1,'2024-01-31 20:05:30','2024-01-31 20:05:30');
/*!40000 ALTER TABLE `incidencias` ENABLE KEYS */;
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

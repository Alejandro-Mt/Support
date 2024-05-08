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
-- Table structure for table `puestos`
--

DROP TABLE IF EXISTS `puestos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `puestos` (
  `id_puesto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `activo` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_puesto`)
) ENGINE=MyISAM AUTO_INCREMENT=146 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `puestos`
--

LOCK TABLES `puestos` WRITE;
/*!40000 ALTER TABLE `puestos` DISABLE KEYS */;
INSERT INTO `puestos` VALUES (1,'DIRECTOR TI',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(2,'ABOGADO A',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(3,'ABOGADO B',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(4,'ABOGADO JR',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(5,'ABOGADO LABORAL LITIGANTE',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(6,'ADMINISTRADOR DE TICS',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(7,'AGENTE DE VENTAS',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(8,'ANALISTA CONTABLE',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(9,'ANALISTA DE BD JR',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(10,'ANALISTA DE INFORMACION',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(11,'ANALISTA DE INTELIGENCIA DE NEGOCIOS',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(12,'ANALISTA DE MESA DE AYUDA',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(13,'ANALISTA DE NEGOCIOS',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(14,'ANALISTA DE NOMINAS',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(15,'ANALISTA DE OPERACIONES',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(16,'ANALISTA DE PROCESOS TI',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(17,'ARQUITECTO DE SOLUCIONES TECNOLOGICAS',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(18,'ASESOR COMERCIAL',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(19,'AUDITOR INTERNO A',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(20,'AUXILIAR ADMINISTRATIVO',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(21,'AUXILIAR DE ALMACEN',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(22,'AUXILIAR DE CAPACITACION Y COMUNICACION',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(23,'AUXILIAR DE CAPACITACION Y DO',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(24,'AUXILIAR DE MENSAJERIA Y PAQUETERIA',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(25,'AUXILIAR DE MESA DE CONTROL',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(26,'AUXILIAR DE MESA DE CONTROL SR',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(27,'AUXILIAR DE RECURSOS MATERIALES',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(28,'AUXILIAR DE TALENTO HUMANO',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(29,'AUXILIAR DE TESORERIA',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(30,'AUXILIAR JURIDICO',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(31,'AUXILIAR TI',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(32,'BECARIO',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(33,'BUSINESS PARTNER',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(34,'CAPACITACION DE OPERACIONES',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(35,'CAPITAN DE MESEROS',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(36,'CHOFER DE ALMACEN',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(37,'CONSULTOR DE TALENTO HUMANO',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(38,'CONSULTOR TECNOLOGICO',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(39,'CONTROL DE ACTIVO FIJO',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(40,'COORDINADOR DE ALMACEN',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(41,'COORDINADOR DE ATENCION A CLIENTES TI',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(42,'COORDINADOR DE CALIDAD',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(43,'COORDINADOR DE CAPACITACION Y DO',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(44,'COORDINADOR DE CENTRO DE CONTACTO',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(45,'COORDINADOR DE CUENTAS',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(46,'COORDINADOR DE DOCUMENTACION',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(47,'COORDINADOR DE INFORMACION',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(48,'COORDINADOR DE MANTENIMIENTO',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(49,'COORDINADOR DE MESA DE AYUDA',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(50,'COORDINADOR DE PROYECTOS',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(51,'COORDINADOR DE PROYECTOS JR',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(52,'COORDINADOR DE RECLUTAMIENTO',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(53,'COORDINADOR DE SOPORTE TECNICO',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(54,'COORDINADOR DE TESTER',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(55,'COORDINADOR DISEÑO GRAFICO INSTITUCIONAL',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(56,'COORDINADOR JURIDICO',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(57,'COORDINADOR MESA DE CONTROL',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(58,'COORDINADORA DE INFORMACION AL CLIENTE Y CUENTAS',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(59,'DATA MANAGER',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(60,'DBA',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(61,'DIRECTOR DE ADMINISTRACION',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(62,'DIRECTOR DE INFRAESTRUCTURA CLOUD',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(63,'DIRECTOR DE OPERACIONES',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(64,'DIRECTOR DE SISTEMAS DE INFORMACION',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(65,'DIRECTOR GENERAL',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(66,'DISEÑADOR',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(67,'DISEÑADOR GRAFICO INSTITUCIONAL',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(68,'DISEÑADOR UX',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(69,'DOCUMENTADOR',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(70,'EJECUTIVO COMERCIAL',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(71,'EJECUTIVO DE ATENCION A CLIENTES',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(72,'EJECUTIVO DE COBRANZA',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(73,'EJECUTIVO DE COMPRAS',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(74,'EJECUTIVO DE CUENTA',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(75,'EJECUTIVO DE CUENTA JR',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(76,'EJECUTIVO DE CUENTA SR',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(77,'EJECUTIVO DE CUENTAS POR PAGAR',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(78,'EJECUTIVO DE CUENTAS TI JR',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(79,'EJECUTIVO DE CUENTAS TI SR',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(80,'EJECUTIVO DE ESTRATEGIA EN PUNTO DE VENTA',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(81,'EJECUTIVO DE FACTURACION',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(82,'EJECUTIVO DE NOMINA',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(83,'EJECUTIVO DE NOMINA JR.',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(84,'EJECUTIVO DE NOMINA SR.',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(85,'EJECUTIVO DE NOMINA Y TALENTO HUMANO',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(86,'EJECUTIVO DE PROYECTOS BI',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(87,'EJECUTIVO DE RECLUTAMIENTO',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(88,'EJECUTIVO DE RECLUTAMIENTO ',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(89,'EJECUTIVO DE RECLUTAMIENTO SR',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(90,'EJECUTIVO DE SEGURO SOCIAL',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(91,'EJECUTIVO DE TELEFONIA',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(92,'EJECUTIVO DE TESORERIA',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(93,'EJECUTIVO DE TESORERIA SR',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(94,'EJECUTIVO DE VENTAS',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(95,'EJECUTIVO DEL CONSEJO DE ADMINISTRACION',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(96,'EJECUTIVO TI',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(97,'EJECUTIVO TI JR',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(98,'EJECUTIVO TI SR',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(99,'GERENTE DE ADMINISTRACION',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(100,'GERENTE DE ATENCION EJECUTIVA Y ALTA DIRECCION',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(101,'GERENTE DE CAPITAL HUMANO',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(102,'GERENTE DE OPERACIONES',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(103,'GERENTE DE PLANEACION DE PROYECTOS',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(104,'GERENTE DE RECLUTAMIENTO',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(105,'GERENTE DE RELACIONES LABORALES',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(106,'GERENTE DE TESORERIA',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(107,'GERENTE DE TI',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(108,'GERENTE DE UNIDAD DE NEGOCIO',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(109,'INTENDENCIA',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(110,'JEFE DBA',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(111,'JEFE DE CALIDAD Y PROCESOS',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(112,'JEFE DE CENTRO DE CONTACTO',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(113,'JEFE DE FACTURACION Y COBRANZA',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(114,'JEFE DE JURIDICO CORPORATIVO',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(115,'JEFE DE JURIDICO LABORAL',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(116,'JEFE DE NOMINAS',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(117,'JEFE DE SECTOR',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(118,'JEFE DE SEGURO SOCIAL',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(119,'JEFE DE SOPORTE TECNICO',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(120,'JEFE DE TESORERIA',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(121,'LIDER TECNICO',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(122,'MENSAJERO',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(123,'PROGRAMADOR',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(124,'PROGRAMADOR ',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(125,'PROGRAMADOR .NET',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(126,'PROGRAMADOR E-LEARNING',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(127,'PROGRAMADOR REACTS JS',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(128,'PROGRAMADOR SQL',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(129,'PROGRAMADOR SQL  ',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(130,'PROGRAMADOR SQL SR',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(131,'PROGRAMADOR SR',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(132,'QUALITY ASSURANCE',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(133,'QUALITY ASSURANCE JR',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(134,'REGIONAL',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(135,'SOPORTE TECNICO',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(136,'SOPORTE TECNICO 4to NIVEL',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(137,'SOPORTE TECNICO SR.',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(138,'SUBGERENTE DE ATENCION EJECUTIVA Y ALTA DIRECCION',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(139,'SUBGERENTE DE PLANEACION E IMPLEMENTACION DE PROYECTOS',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(140,'SUBREGIONAL',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(141,'SUPERVISOR CONTABLE',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(142,'SUPERVISOR DE OPERACIONES',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(143,'TALENT EXECUTIVE IT',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(144,'TESTER',1,'2024-01-23 22:05:01','2024-01-23 22:05:01'),(145,'VIGILANTE',1,'2024-01-23 22:05:01','2024-01-23 22:05:01');
/*!40000 ALTER TABLE `puestos` ENABLE KEYS */;
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

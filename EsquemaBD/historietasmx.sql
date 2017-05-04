CREATE SCHEMA IF NOT EXISTS `historietasmx` DEFAULT CHARACTER SET utf8 ;
USE historietasmx;
-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: historietasmx
-- ------------------------------------------------------
-- Server version	5.6.34-log

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
-- Table structure for table `administrador`
--

DROP TABLE IF EXISTS `administrador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administrador` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(70) NOT NULL,
  `correo_usuario` varchar(70) NOT NULL,
  `contrasena` varchar(70) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrador`
--

LOCK TABLES `administrador` WRITE;
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
INSERT INTO `administrador` VALUES (1,'Administrador','admin@historietas.mx','1'),(2,'Andrew','andrew@historietas.mx','1ola');
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catalogo`
--

DROP TABLE IF EXISTS `catalogo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catalogo` (
  `id_catalogo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_catalogo` varchar(70) NOT NULL,
  `descripcion_catalogo` varchar(140) NOT NULL DEFAULT '',
  `imagen_catalogo` varchar(70) NOT NULL DEFAULT '',
  `carpeta_cat_revistas` varchar(150) NOT NULL,
  PRIMARY KEY (`id_catalogo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalogo`
--

LOCK TABLES `catalogo` WRITE;
/*!40000 ALTER TABLE `catalogo` DISABLE KEYS */;
INSERT INTO `catalogo` VALUES (1,'Las Chambeadoras','Las chambeadoras																																												','Catalogo/elteo.jpg','Revistas/1_Chambeadoras'),(2,'Erótika','Descripcion Catlogo 2 weroticq','Catalogo/reubir.png','Revistas/2_Erotika'),(3,'Erótika 2','Este es un catalogo numero 3','Catalogo/402897.jpg','Revistas/3_Catalogo3'),(4,'Catalogo 4','Prueba','Catalogo/402897.jpg','Revistas/4_Catalogo4');
/*!40000 ALTER TABLE `catalogo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `muestras`
--

DROP TABLE IF EXISTS `muestras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `muestras` (
  `id_muestra` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL DEFAULT '',
  `descripcion` varchar(140) NOT NULL DEFAULT '',
  `imagen` varchar(140) NOT NULL DEFAULT '',
  `documento` varchar(140) NOT NULL DEFAULT '',
  `activo` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_muestra`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `muestras`
--

LOCK TABLES `muestras` WRITE;
/*!40000 ALTER TABLE `muestras` DISABLE KEYS */;
INSERT INTO `muestras` VALUES (1,'Muestra chambeadoras','Muestra chambeadoras','Prueba/imagen/Chambeadoras.jpg','Prueba/documento/Chambeadoras.pdf',1),(2,'Muestra erotika 1','Muestra erotika 1','Prueba/imagen/Erotika1.jpg','muestra2.pdf',1),(3,'Muestra erotika 2','Muestra erotika 2','Prueba/imagen/Erotika2.jpg','muestra3.pdf',1),(4,'Muestra 4','Descripcion de la muestra 4','muestra4.png','Prueba/documento/Curricula_Completa cisco ccna explorer 4.pdf',1);
/*!40000 ALTER TABLE `muestras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `revistas`
--

DROP TABLE IF EXISTS `revistas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `revistas` (
  `id_revista` int(11) NOT NULL AUTO_INCREMENT,
  `id_catalogo` int(11) NOT NULL,
  `nombre_revista` varchar(70) NOT NULL,
  `numero_revista` int(11) NOT NULL,
  `info_revista` text NOT NULL,
  `img_revista` varchar(120) NOT NULL,
  `pdf_revista` varchar(120) NOT NULL,
  `activo` int(2) NOT NULL,
  PRIMARY KEY (`id_revista`),
  KEY `id_catalogo` (`id_catalogo`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `revistas`
--

LOCK TABLES `revistas` WRITE;
/*!40000 ALTER TABLE `revistas` DISABLE KEYS */;
INSERT INTO `revistas` VALUES (1,2,'Piel de Ébano en Apareamiento x',90,'Prueba de información extra de la revista x','Revistas/2_Erotika/img/Erotika2.jpg','Revistas/2_Erotika/pdf/Chambeadoras.pdf',1),(2,2,'Olores Íntimos',6,'Otra información de la revista.','Revistas/2_Erotika/img/Erotika2.jpg','Revistas/2_Erotika/pdf/Erotika2.pdf',0),(6,4,'Prueba revista c4',100,'Descripcion de la revista de catalogo 4','Revistas/4_Catalogo4/img/310795.jpg','Revistas/2_Erotika/pdf/Erotika2.pdf',1);
/*!40000 ALTER TABLE `revistas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suscriptores_mail`
--

DROP TABLE IF EXISTS `suscriptores_mail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `suscriptores_mail` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(140) NOT NULL DEFAULT '',
  `nombre` varchar(140) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_usuario`,`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suscriptores_mail`
--

LOCK TABLES `suscriptores_mail` WRITE;
/*!40000 ALTER TABLE `suscriptores_mail` DISABLE KEYS */;
/*!40000 ALTER TABLE `suscriptores_mail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(70) NOT NULL,
  `correo_usuario` varchar(70) NOT NULL,
  `contrasena` varchar(70) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `edad` int(20) NOT NULL,
  `premium` int(2) NOT NULL,
  `API` varchar(70) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `API` (`API`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (4,'Richard VelRo','rvelazquez@devworms.com','abcdefg','2',27,1,'10055'),(5,'Juan','juan@1234.com','abcdefg','2',25,0,'68585'),(6,'Pepe Mujica','pep@jicama.com','12345','2',48,0,'22143'),(7,'Juan Perez','correo@1234.com','1234','2',17,0,'ac18cee5b94c53344d24cd501911835f'),(8,'Prueba','admin@historietas.mx','1234','2',30,0,'38995'),(9,'OtroUsuario','andrewala@laala.com','aBc124','2',50,0,'66373'),(11,'Andy','correoPrueba@correo.com','ola90','2',20,1,'47955');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wallett`
--

DROP TABLE IF EXISTS `wallett`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wallett` (
  `id_wallet` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `numero_tarjeta` varchar(16) NOT NULL,
  `fecha_caducidad` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_wallet`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wallett`
--

LOCK TABLES `wallett` WRITE;
/*!40000 ALTER TABLE `wallett` DISABLE KEYS */;
INSERT INTO `wallett` VALUES (1,1,'4444555599998888','2016-11-30 02:49:10'),(2,8,'0','2016-12-12 23:13:11'),(3,9,'0','2016-12-12 23:24:03'),(4,10,'0','2016-12-12 23:47:21'),(5,11,'4444555599998888','2017-12-12 23:49:26');
/*!40000 ALTER TABLE `wallett` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'historietasmx'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-03 22:40:20

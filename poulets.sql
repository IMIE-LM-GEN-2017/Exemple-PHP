DROP DATABASE vagrant;
CREATE DATABASE  IF NOT EXISTS `vagrant` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `vagrant`;
-- MySQL dump 10.13  Distrib 5.7.19, for Linux (x86_64)
--
-- Host: localhost    Database: vagrant
-- ------------------------------------------------------
-- Server version	5.7.19

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
-- Table structure for table `adresses`
--

DROP TABLE IF EXISTS `adresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `cp` varchar(10) NOT NULL,
  `ville` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adresses`
--

LOCK TABLES `adresses` WRITE;
/*!40000 ALTER TABLE `adresses` DISABLE KEYS */;
INSERT INTO `adresses` VALUES (1,'1084 Rommi Square','73630','Hesfokiv'),(2,'775 Oviku Key','20108','Kimutilez'),(3,'69 Revoh Terrace','50366','Wajebpu'),(4,'32 Giban Highway','94137','Rejseke'),(5,'472 Nelhus Circle','29299','Jiljizco'),(6,'1561 Iratoh Mill','73630','Hesfokiv'),(7,'184 Enwu River','20108','Kimutilez'),(8,'1141 Duemi Place','50366','Wajebpu'),(9,'1724 Jegaw Loop','94137','Rejseke'),(10,'1511 Solde Glen','29299','Jiljizco'),(11,'661 Oweuwi Ridge','73630','Hesfokiv'),(12,'115 Fuzfuf Square','20108','Kimutilez'),(13,'508 Dolwi Mill','50366','Wajebpu'),(14,'1398 Guoc Center','94137','Rejseke'),(15,'446 Dajig Terrace','29299','Jiljizco'),(16,'1993 Lungu Terrace','50366','Wajebpu'),(17,'867 Awacol Terrace','94137','Rejseke'),(18,'706 Afcil Glen','29299','Jiljizco'),(19,'qsdfq','qsdfq','qsdf'),(20,'kqkldsjf','sdfkj','qsflkj'),(21,'L\'enclave','9999','Bordeaux');
/*!40000 ALTER TABLE `adresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dirigeants`
--

DROP TABLE IF EXISTS `dirigeants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dirigeants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `id_adresse` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_dirigeants_adresses1_idx` (`id_adresse`),
  CONSTRAINT `fk_dirigeants_adresses1` FOREIGN KEY (`id_adresse`) REFERENCES `adresses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dirigeants`
--

LOCK TABLES `dirigeants` WRITE;
/*!40000 ALTER TABLE `dirigeants` DISABLE KEYS */;
INSERT INTO `dirigeants` VALUES (1,'Marion','Turner','uzoowi@da.sa','(819) 288-2291',10),(2,'Jose','Singleton','dafgu@sudosur.net','(353) 484-3116',9),(3,'Cory','Bryant','gavorivo@dijuhud.pf','(689) 808-8748',8),(4,'Bess','Tucker','tun@babarlan.ga','(359) 306-3470',7),(5,'Jesus','Gregory','ki@zap.mv','(211) 734-3905',6),(6,'Miguel','Frank','sob@fire.bj','(400) 803-8094',5),(7,'Pauline','Lane','nupvever@vu.tw','(414) 815-2923',4),(8,'Edward','Atkins','cigokhov@odna.fr','(749) 493-7524',3),(9,'Chris','Gonzales','hepilos@gic.bo','(284) 721-9388',2),(10,'Roger','Jenkins','fe@locilgi.jm','(722) 511-6435',1);
/*!40000 ALTER TABLE `dirigeants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employes`
--

DROP TABLE IF EXISTS `employes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(15) NOT NULL,
  `id_adresse` int(11) NOT NULL,
  `id_ferme` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_employes_adresses1_idx` (`id_adresse`),
  KEY `fk_employes_fermes1_idx` (`id_ferme`),
  CONSTRAINT `fk_employes_adresses1` FOREIGN KEY (`id_adresse`) REFERENCES `adresses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_employes_fermes1` FOREIGN KEY (`id_ferme`) REFERENCES `fermes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employes`
--

LOCK TABLES `employes` WRITE;
/*!40000 ALTER TABLE `employes` DISABLE KEYS */;
INSERT INTO `employes` VALUES (1,'Bernice','Cox',8,1),(2,'Jane','Schwartz',9,2),(3,'Douglas','Hunt',10,3),(4,'Stephen','Fowler',11,4),(5,'Myra','Harvey',12,5),(6,'Vernon','Chambers',13,1),(7,'Carolyn','Richards',14,2),(8,'Nancy','Garner',15,3),(9,'Manuel','Watson',16,6),(10,'Juan','McLaughlin',17,7),(11,'Melvin','Harrington',18,8);
/*!40000 ALTER TABLE `employes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fermes`
--

DROP TABLE IF EXISTS `fermes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fermes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `surface` float NOT NULL DEFAULT '0',
  `id_adresse` int(11) NOT NULL,
  `id_dirigeant` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_fermes_dirigeants_idx` (`id_dirigeant`),
  KEY `fk_fermes_adresses1_idx` (`id_adresse`),
  CONSTRAINT `fk_fermes_adresses1` FOREIGN KEY (`id_adresse`) REFERENCES `adresses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_fermes_dirigeants` FOREIGN KEY (`id_dirigeant`) REFERENCES `dirigeants` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fermes`
--

LOCK TABLES `fermes` WRITE;
/*!40000 ALTER TABLE `fermes` DISABLE KEYS */;
INSERT INTO `fermes` VALUES (1,'La ferme des Baker',15.6,18,10),(2,'La ferme des Lane',58.5,17,1),(3,'La ferme des Gross',0.6,16,2),(4,'La ferme des Rhodes',32.5,15,3),(5,'La ferme des Yates',57.8,14,4),(6,'La ferme des Miller',69.5,13,5),(7,'La ferme des Adams',8.5,12,6),(8,'La ferme des Rodriguez',1.8,11,7),(9,'La ferme des Singleton',26.8,10,8),(10,'La ferme des Ramos',89.2,9,9),(11,'La ferme des Bridges',14.5,8,10);
/*!40000 ALTER TABLE `fermes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `poulets`
--

DROP TABLE IF EXISTS `poulets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `poulets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `race` varchar(20) NOT NULL,
  `id_ferme` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_poulets_fermes1_idx` (`id_ferme`),
  CONSTRAINT `fk_poulets_fermes1` FOREIGN KEY (`id_ferme`) REFERENCES `fermes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `poulets`
--

LOCK TABLES `poulets` WRITE;
/*!40000 ALTER TABLE `poulets` DISABLE KEYS */;
INSERT INTO `poulets` VALUES (1,'Sebright',1),(2,'Bourbonnaise',2),(3,'Charolaise',3),(4,'Sebright',4),(5,'Poule soie',5),(6,'Sebright',6),(7,'Sebright',7),(8,'Sebright',8),(9,'Charolaise',9),(10,'Sebright',10),(11,'Charolaise',11),(12,'Poule soie',1),(13,'Sebright',2),(14,'Sebright',3),(15,'Bourbonnaise',4),(16,'Sebright',5),(17,'Bourbonnaise',6),(18,'Bourbonnaise',7),(19,'Poule soie',8),(20,'Sebright',9),(21,'Bourbonnaise',10),(22,'Poule soie',11),(23,'Poule soie',12),(24,'Sebright',13),(25,'Bourbonnaise',1),(26,'Charolaise',2),(27,'Bourbonnaise',3),(28,'Poule soie',4),(29,'Poule soie',5),(30,'Charolaise',6),(31,'Poule soie',7),(32,'Poule soie',8),(33,'Charolaise',9),(34,'Sebright',10),(35,'Poule soie',11),(36,'Charolaise',12),(37,'Poule soie',13),(38,'Charolaise',1),(39,'Poule soie',2),(40,'Charolaise',3),(41,'Bourbonnaise',4),(42,'Bourbonnaise',5),(43,'Sebright',6),(44,'Bourbonnaise',7),(45,'Bourbonnaise',8),(46,'Bourbonnaise',9),(47,'Bourbonnaise',10),(48,'Poule soie',11),(49,'Sebright',12),(50,'Sebright',13),(51,'Charolaise',1),(52,'Sebright',2),(53,'Sebright',3),(54,'Poule soie',4),(55,'Sebright',5),(56,'Sebright',6),(57,'Poule soie',7),(58,'Charolaise',8),(59,'Charolaise',9),(60,'Charolaise',10),(61,'Charolaise',11),(62,'Poule soie',12),(63,'Bourbonnaise',13),(64,'Sebright',1),(65,'Charolaise',2),(66,'Poule soie',3),(67,'Bourbonnaise',4),(68,'Bourbonnaise',5),(69,'Sebright',6),(70,'Bourbonnaise',7),(71,'Sebright',8),(72,'Poule soie',9),(73,'Poule soie',10),(74,'Charolaise',11),(75,'Poule soie',12),(76,'Bourbonnaise',13),(77,'Poule soie',1),(78,'Charolaise',2),(79,'Poule soie',3),(80,'Charolaise',4),(81,'Poule soie',5),(82,'Sebright',6),(83,'Bourbonnaise',7),(84,'Charolaise',8),(85,'Charolaise',9),(86,'Charolaise',10),(87,'Charolaise',11),(88,'Poule soie',12),(89,'Poule soie',13),(90,'Bourbonnaise',1),(91,'Sebright',2),(92,'Sebright',3),(93,'Bourbonnaise',4),(94,'Bourbonnaise',5),(95,'Charolaise',6),(96,'Poule soie',7),(97,'Charolaise',8),(98,'Charolaise',9),(99,'Bourbonnaise',10),(100,'Bourbonnaise',11),(101,'Charolaise',12),(102,'Sebright',13);
/*!40000 ALTER TABLE `poulets` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-07-31 13:22:46

ALTER TABLE `dirigeants` ADD `mdp` VARCHAR(50) NOT NULL AFTER `id_adresse`;
ALTER TABLE `dirigeants` ADD UNIQUE(`email`);

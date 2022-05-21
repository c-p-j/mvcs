-- MariaDB dump 10.19  Distrib 10.4.21-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: mvcsensory
-- ------------------------------------------------------
-- Server version	10.4.21-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `apartment`
--

DROP TABLE IF EXISTS `apartment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apartment` (
  `apartment_code` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `active_implants` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`apartment_code`),
  CONSTRAINT `CONSTRAINT_1` CHECK (`active_implants` >= 0),
  CONSTRAINT `CONSTRAINT_2` CHECK (`address` <> ''),
  CONSTRAINT `CONSTRAINT_3` CHECK (`apartment_code` <> '')
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apartment`
--

LOCK TABLES `apartment` WRITE;
/*!40000 ALTER TABLE `apartment` DISABLE KEYS */;
INSERT INTO `apartment` VALUES ('DC516','285 Corben Park',1),('IK838','54 Anniversary Trail',1),('JR436','38139 Marquette Park',1),('LL806','05 Dayton Hill',1),('OC555','09680 Farwell Plaza',1),('QB930','85752 Pearson Road',2),('RT020','4 Boyd Park',1),('SA600','1 Talmadge Junction',1),('UN070','541 Tennyson Point',1),('XI798','4855 Express Plaza',1);
/*!40000 ALTER TABLE `apartment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `installation`
--

DROP TABLE IF EXISTS `installation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `installation` (
  `dateTime` date NOT NULL,
  `plant_id` int(11) NOT NULL,
  `operator_id` int(11) NOT NULL,
  `status` enum('Pending','Done') NOT NULL,
  PRIMARY KEY (`plant_id`,`operator_id`),
  KEY `operator_id` (`operator_id`),
  KEY `dateTime` (`dateTime`),
  CONSTRAINT `installation_ibfk_1` FOREIGN KEY (`plant_id`) REFERENCES `plant` (`plant_id`) ON UPDATE CASCADE,
  CONSTRAINT `installation_ibfk_2` FOREIGN KEY (`operator_id`) REFERENCES `operator` (`operator_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `installation`
--

LOCK TABLES `installation` WRITE;
/*!40000 ALTER TABLE `installation` DISABLE KEYS */;
/*!40000 ALTER TABLE `installation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `operator`
--

DROP TABLE IF EXISTS `operator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `operator` (
  `operator_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  PRIMARY KEY (`operator_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `operator`
--

LOCK TABLES `operator` WRITE;
/*!40000 ALTER TABLE `operator` DISABLE KEYS */;
INSERT INTO `operator` VALUES (1,'Melesa','MacPhaden'),(2,'Beatrix','Trollope'),(3,'Kristien','Scotney'),(4,'Ludovico','Walles'),(5,'Sukey','Turgoose'),(6,'Valentijn','Covelle'),(7,'Gualterio','Attenborrow'),(8,'Vasily','Bakhrushkin'),(9,'Barnie','Grayshon'),(10,'Lorilyn','Carbery'),(11,'Westbrook','Holby'),(12,'Duff','Tassell'),(13,'Clemens','Donnett'),(14,'Brinn','Sebyer'),(15,'Sherlock','Sneden'),(16,'Freemon','Conkey'),(17,'Bernard','Gainforth'),(18,'Bea','Battie'),(19,'Libbey','Matschke'),(20,'Caresa','Lipscomb');
/*!40000 ALTER TABLE `operator` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plant`
--

DROP TABLE IF EXISTS `plant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plant` (
  `plant_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` tinyint(1) NOT NULL,
  `name` varchar(30) NOT NULL,
  `NOR` varchar(500) DEFAULT NULL,
  `model_name` varchar(50) NOT NULL,
  `apartment_code` varchar(30) NOT NULL,
  `active_sensors` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`plant_id`),
  UNIQUE KEY `name` (`name`),
  KEY `model_name` (`model_name`),
  KEY `apartment_code` (`apartment_code`),
  CONSTRAINT `plant_ibfk_1` FOREIGN KEY (`model_name`) REFERENCES `plantmodel` (`model_name`) ON UPDATE CASCADE,
  CONSTRAINT `plant_ibfk_2` FOREIGN KEY (`apartment_code`) REFERENCES `apartment` (`apartment_code`) ON UPDATE CASCADE,
  CONSTRAINT `statusNor` CHECK (`status` = (`NOR` is null)),
  CONSTRAINT `CONSTRAINT_1` CHECK (`active_sensors` >= 0),
  CONSTRAINT `CONSTRAINT_2` CHECK (`name` <> '')
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plant`
--

LOCK TABLES `plant` WRITE;
/*!40000 ALTER TABLE `plant` DISABLE KEYS */;
INSERT INTO `plant` VALUES (1,1,'CCTV',NULL,'Security','QB930',3),(2,1,'Sprinkler',NULL,'Fire Extinguishing System','QB930',3),(3,1,'Name1',NULL,'Security','XI798',0),(4,1,'Name2',NULL,'Security','OC555',0),(5,1,'Name3',NULL,'Security','SA600',0),(6,1,'Name4',NULL,'Security','UN070',0),(7,1,'Name5',NULL,'Security','IK838',0),(8,1,'Name6',NULL,'Security','JR436',0),(9,1,'Name7',NULL,'Security','RT020',0),(10,1,'Name8',NULL,'Security','DC516',0),(11,1,'Name9',NULL,'Security','LL806',0);
/*!40000 ALTER TABLE `plant` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER FillActiveImplantsInsert AFTER INSERT  
ON plant FOR EACH ROW    
  UPDATE Apartment set active_implants = (SELECT COUNT(*) FROM plant WHERE status = 1 AND apartment_code = new.apartment_code) where apartment_code = new.apartment_code */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER FillActiveImplantsUpdateNew AFTER UPDATE  
ON plant FOR EACH ROW 
BEGIN   
  UPDATE Apartment set active_implants = (SELECT COUNT(*) FROM plant WHERE status = 1 AND apartment_code = old.apartment_code) where apartment_code = old.apartment_code;  
  UPDATE Apartment set active_implants = (SELECT COUNT(*) FROM plant WHERE status = 1 AND apartment_code = new.apartment_code) where apartment_code = new.apartment_code;  
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER FillActiveImplantsDelete AFTER DELETE  
ON plant FOR EACH ROW    
  UPDATE Apartment set active_implants = (SELECT COUNT(*) FROM plant WHERE status = 1 AND apartment_code = old.apartment_code) where apartment_code = old.apartment_code */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `plantmodel`
--

DROP TABLE IF EXISTS `plantmodel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plantmodel` (
  `model_name` varchar(50) NOT NULL,
  PRIMARY KEY (`model_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plantmodel`
--

LOCK TABLES `plantmodel` WRITE;
/*!40000 ALTER TABLE `plantmodel` DISABLE KEYS */;
INSERT INTO `plantmodel` VALUES ('Fire Extinguishing System'),('Security');
/*!40000 ALTER TABLE `plantmodel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sensor`
--

DROP TABLE IF EXISTS `sensor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sensor` (
  `sensor_SN` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `NOR` varchar(500) DEFAULT NULL,
  `plant_id` int(11) NOT NULL,
  `model_name` varchar(50) NOT NULL,
  PRIMARY KEY (`sensor_SN`),
  KEY `fk1` (`plant_id`),
  KEY `fk2` (`model_name`),
  CONSTRAINT `fk1` FOREIGN KEY (`plant_id`) REFERENCES `plant` (`plant_id`) ON UPDATE CASCADE,
  CONSTRAINT `fk2` FOREIGN KEY (`model_name`) REFERENCES `sensormodel` (`model_name`) ON UPDATE CASCADE,
  CONSTRAINT `statusNorSensor` CHECK (`status` = (`NOR` is null)),
  CONSTRAINT `CONSTRAINT_1` CHECK (`sensor_SN` <> '')
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sensor`
--

LOCK TABLES `sensor` WRITE;
/*!40000 ALTER TABLE `sensor` DISABLE KEYS */;
INSERT INTO `sensor` VALUES ('ABC123',1,NULL,1,'Camera'),('ABC124',1,NULL,2,'Fire Sensor'),('ABC125',1,NULL,1,'Camera'),('ABC126',1,NULL,1,'Camera'),('ABC127',0,'malfunzionamento dipositivo',1,'Camera'),('ABC129',1,NULL,2,'Fire Sensor'),('ABC140',1,NULL,2,'Fire Sensor');
/*!40000 ALTER TABLE `sensor` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER FillActiveSensorsInsert AFTER INSERT  
ON Sensor FOR EACH ROW    
  UPDATE Plant set active_sensors = (SELECT COUNT(*) FROM sensor WHERE status = 1 AND plant_id = new.plant_id) where plant_id = new.plant_id */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER FillActiveSensorsUpdate AFTER UPDATE  
ON Sensor FOR EACH ROW    
  UPDATE Plant set active_sensors = (SELECT COUNT(*) FROM sensor WHERE status = 1 AND plant_id = new.plant_id) where plant_id = new.plant_id */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER FillActiveSensorsDelete AFTER DELETE  
ON Sensor FOR EACH ROW    
  UPDATE Plant set active_sensors = (SELECT COUNT(*) FROM sensor WHERE status = 1 AND plant_id = old.plant_id) where plant_id = old.plant_id */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `sensormodel`
--

DROP TABLE IF EXISTS `sensormodel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sensormodel` (
  `model_name` varchar(50) NOT NULL,
  PRIMARY KEY (`model_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sensormodel`
--

LOCK TABLES `sensormodel` WRITE;
/*!40000 ALTER TABLE `sensormodel` DISABLE KEYS */;
INSERT INTO `sensormodel` VALUES ('Camera'),('Fire Sensor');
/*!40000 ALTER TABLE `sensormodel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','$2y$12$tVuQaqrZ4JJSK3BNl2ommubM9KGR/5f2hznI3/DIlY8iehNcXoQZS',1),(2,'operator','$2y$12$9ZT1KIzU1fRTCencvcugO.7abdcgJjVnGUlgsSxubjg2eTdEvRh9W',0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-21 18:52:32

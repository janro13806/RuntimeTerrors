CREATE DATABASE  IF NOT EXISTS `runtimeterrors_golf` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `runtimeterrors_golf`;
-- MariaDB dump 10.19  Distrib 10.7.3-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: runtimeterrors_golf
-- ------------------------------------------------------
-- Server version	10.7.3-MariaDB

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
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `town` varchar(10) NOT NULL,
  `city` varchar(10) NOT NULL,
  `length` int(11) NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course`
--

LOCK TABLES `course` WRITE;
/*!40000 ALTER TABLE `course` DISABLE KEYS */;
INSERT INTO `course` VALUES
(1,'Augusta National Golf Culb','Augusta','Georgia',6870),
(2,'The Country Club','Brookline','Boston',7000),
(3,'The Royal St George Golf Club','Kent','England',6500);
/*!40000 ALTER TABLE `course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dinner_attendees`
--

DROP TABLE IF EXISTS `dinner_attendees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dinner_attendees` (
  `player_id` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  PRIMARY KEY (`player_id`,`year`),
  CONSTRAINT `player_attend` FOREIGN KEY (`player_id`) REFERENCES `player` (`player_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dinner_attendees`
--

LOCK TABLES `dinner_attendees` WRITE;
/*!40000 ALTER TABLE `dinner_attendees` DISABLE KEYS */;
INSERT INTO `dinner_attendees` VALUES
(2,2018),
(2,2019),
(2,2020),
(2,2022),
(5,2018),
(5,2019),
(5,2020),
(9,2019),
(9,2020),
(9,2021),
(10,2019),
(11,2022),
(13,2019),
(13,2020),
(13,2021),
(16,2021),
(16,2022),
(17,2022),
(19,2021),
(22,2018),
(23,2018),
(23,2019),
(23,2020),
(23,2021),
(23,2022),
(24,2021),
(27,2018),
(28,2018),
(28,2022),
(30,2018),
(30,2019),
(30,2020),
(30,2021),
(30,2022);
/*!40000 ALTER TABLE `dinner_attendees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hole`
--

DROP TABLE IF EXISTS `hole`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hole` (
  `hole_nr` int(11) NOT NULL,
  `hole_name` varchar(30) NOT NULL,
  `distance` double NOT NULL,
  `par` int(11) NOT NULL,
  `num_bunkers` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  PRIMARY KEY (`hole_nr`),
  KEY `course_idx` (`course_id`),
  CONSTRAINT `course` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hole`
--

LOCK TABLES `hole` WRITE;
/*!40000 ALTER TABLE `hole` DISABLE KEYS */;
INSERT INTO `hole` VALUES
(1,'Tea Olive',445,4,2,1),
(2,'Pink Dogwood',575,5,3,1),
(3,'Flowering Peach',350,4,5,1),
(4,'Flowering Crab Apple',240,3,2,1),
(5,'Magnolia',495,4,3,1),
(6,'Juniper',180,3,1,1),
(7,'Pampass',450,4,5,1),
(8,'Yellow Jasmine',570,5,1,1),
(9,'Carolina Cherry',460,4,2,1),
(10,'Camellia',495,4,2,1),
(11,'White Dogwood',520,4,1,1),
(12,'Golden Bell',115,3,3,1),
(13,'Azalea',510,5,7,1),
(14,'Chinese Fir',440,4,0,1),
(15,'Firethorn',550,5,1,1),
(16,'Redbud',170,3,3,1),
(17,'Nandina',440,4,2,1),
(18,'Holly',465,4,4,1);
/*!40000 ALTER TABLE `hole` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `participates`
--

DROP TABLE IF EXISTS `participates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `participates` (
  `tournament_id` year(4) NOT NULL,
  `player_id` int(11) NOT NULL,
  PRIMARY KEY (`tournament_id`,`player_id`),
  KEY `player_participate_idx` (`player_id`),
  CONSTRAINT `player_participate` FOREIGN KEY (`player_id`) REFERENCES `player` (`player_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tournament_participate` FOREIGN KEY (`tournament_id`) REFERENCES `tournament` (`tournament_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `participates`
--

LOCK TABLES `participates` WRITE;
/*!40000 ALTER TABLE `participates` DISABLE KEYS */;
INSERT INTO `participates` VALUES
(2018,2),
(2018,15),
(2018,16),
(2018,19),
(2018,20),
(2018,22),
(2018,28),
(2018,29),
(2018,30),
(2019,9),
(2019,11),
(2019,13),
(2019,18),
(2019,23),
(2019,24),
(2019,25),
(2019,26),
(2019,27),
(2019,28),
(2020,4),
(2020,6),
(2020,8),
(2020,11),
(2020,12),
(2020,13),
(2020,14),
(2020,15),
(2020,16),
(2020,26),
(2021,4),
(2021,7),
(2021,15),
(2021,16),
(2021,17),
(2021,18),
(2021,19),
(2021,20),
(2021,21),
(2021,22),
(2022,1),
(2022,2),
(2022,3),
(2022,4),
(2022,5),
(2022,6),
(2022,7),
(2022,8),
(2022,9),
(2022,10);
/*!40000 ALTER TABLE `participates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `person`
--

DROP TABLE IF EXISTS `person`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `person` (
  `person_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `surname` varchar(80) NOT NULL,
  `nationality` varchar(80) NOT NULL,
  `weight` varchar(10) DEFAULT NULL,
  `height` varchar(10) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  PRIMARY KEY (`person_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `person`
--

LOCK TABLES `person` WRITE;
/*!40000 ALTER TABLE `person` DISABLE KEYS */;
INSERT INTO `person` VALUES
(1,'Scottie','Scheffler','USA','200lbs','6ft, 3in',25),
(2,'Rory','McIlroy','IRL','160lbs','5ft, 10in',33),
(3,'Shane','Lowry','IRL','216lbs','6ft, 1in',35),
(4,'Cameron','Smith','AUS','172lbs','5ft, 11in',28),
(5,'Collin','Morikawa','USA','160lbs','5ft, 9in',25),
(6,'Corey','Conners','CAN','190lbs','6ft, 0in',30),
(7,'Will','Zalatoris','USA','175lbs','6ft, 2in',25),
(8,'Sung-jae','Im','KOR','200lbs','6ft, 0in',24),
(9,'Justin','Thomas','USA','160lbs','5ft, 10in',29),
(10,'Cameron','Champ','USA','175lbs','6ft, 0in',26),
(11,'Dustin','Johnson','USA','190lbs','6ft, 4in',37),
(12,'Dylan','Frittelli','RSA','179lbs','6ft, 2in',31),
(13,'Brooks','Koepka','USA','205lbs','6ft, 0in',32),
(14,'Pan','Cheng-tsung','TPE','145lbs','5ft, 6in',30),
(15,'Jon','Rahm','ESP','220lbs','6ft, 2in',27),
(16,'Patrick','Reed','USA','200lbs','6ft, 0in',31),
(17,'Hideki','Matsuyama','JPN','198lbs','5ft, 11in',30),
(18,'Xander','Schauffele','USA','175lbs','5ft, 10in',28),
(19,'Jordan','Spieth','USA','175lbs','6ft, 1in',28),
(20,'Marc','Leishman','AUS','200lbs','6ft, 2in',38),
(21,'Justin','Rose','ENG','195lbs','6ft, 3in',41),
(22,'Tony','Finau','USA','200lbs','6ft, 4in',32),
(23,'Tiger','Woods','USA','185lbs','6ft, 1in',46),
(24,'Jason','Day','AUS','195lbs','6ft, 0in',34),
(25,'Francesco','Molinari','ITA','159lbs','5ft, 8in',39),
(26,'Webb','Simpson','USA','185lbs','6ft, 2in',36),
(27,'Patrick','Cantlay','USA','190lbs','6ft, 0in',30),
(28,'Rickie','Fowler','USA','150lbs','5ft, 9in',33),
(29,'Henrik','Stenson','SWE','190lbs','6ft, 2in',46),
(30,'Bubba','Watson','USA','180lbs','6ft, 3in',43),
(31,'Louis','Oosthuizen','RSA','180lbs','5ft, 10in',39),
(32,'Verne','Lundquist','American','226kg','175cm',81),
(33,'Jim','Nantz','American','75kg','191cm',63),
(34,'Scott','Van Pelt','American','86kg','198cm',55),
(35,'Nick','Faldo','British','88kg','191cm',64),
(36,'Curtis','Strange','American','82kg','180cm',67),
(37,'Dottie','Pepper','American','70kg','165cm',56),
(38,'Ruben','Garcia','American',NULL,NULL,NULL),
(39,'James','Armstrong','American',NULL,NULL,NULL),
(40,'Bill','Macatee','American',NULL,NULL,66);
/*!40000 ALTER TABLE `person` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `player`
--

DROP TABLE IF EXISTS `player`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `player` (
  `player_id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  `rank` int(11) NOT NULL,
  PRIMARY KEY (`player_id`,`person_id`),
  KEY `player_person_idx` (`person_id`),
  CONSTRAINT `player_person` FOREIGN KEY (`person_id`) REFERENCES `person` (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `player`
--

LOCK TABLES `player` WRITE;
/*!40000 ALTER TABLE `player` DISABLE KEYS */;
INSERT INTO `player` VALUES
(1,1,1),
(2,2,2),
(3,3,3),
(4,4,3),
(5,5,5),
(6,6,6),
(7,7,6),
(8,8,8),
(9,9,8),
(10,10,10),
(11,11,1),
(12,12,5),
(13,13,7),
(14,14,7),
(15,15,7),
(16,16,10),
(17,17,14),
(18,18,3),
(19,19,3),
(20,20,5),
(21,21,7),
(22,22,10),
(23,23,1),
(24,24,5),
(25,25,5),
(26,26,5),
(27,27,9),
(28,28,9),
(29,29,5),
(30,30,5);
/*!40000 ALTER TABLE `player` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `previous_won`
--

DROP TABLE IF EXISTS `previous_won`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `previous_won` (
  `player_id` int(11) NOT NULL,
  `year_won` year(4) NOT NULL,
  PRIMARY KEY (`player_id`,`year_won`),
  CONSTRAINT `player_won` FOREIGN KEY (`player_id`) REFERENCES `player` (`player_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `previous_won`
--

LOCK TABLES `previous_won` WRITE;
/*!40000 ALTER TABLE `previous_won` DISABLE KEYS */;
INSERT INTO `previous_won` VALUES
(1,2022),
(11,2020),
(16,2018),
(17,2021),
(23,2019);
/*!40000 ALTER TABLE `previous_won` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `round`
--

DROP TABLE IF EXISTS `round`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `round` (
  `round_nr` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `tournament_id` year(4) NOT NULL,
  `score` int(11) NOT NULL,
  PRIMARY KEY (`round_nr`,`player_id`,`tournament_id`),
  KEY `player_round_idx` (`player_id`),
  KEY `tournament_round_idx` (`tournament_id`),
  CONSTRAINT `player_round` FOREIGN KEY (`player_id`) REFERENCES `player` (`player_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tournament_round` FOREIGN KEY (`tournament_id`) REFERENCES `tournament` (`tournament_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `round`
--

LOCK TABLES `round` WRITE;
/*!40000 ALTER TABLE `round` DISABLE KEYS */;
INSERT INTO `round` VALUES
(1,1,2022,69),
(1,2,2018,69),
(1,2,2020,75),
(1,2,2022,73),
(1,3,2022,73),
(1,4,2018,71),
(1,4,2020,67),
(1,4,2022,68),
(1,5,2022,73),
(1,6,2020,74),
(1,6,2021,73),
(1,6,2022,70),
(1,7,2021,70),
(1,7,2022,71),
(1,8,2020,66),
(1,8,2022,67),
(1,9,2020,66),
(1,9,2022,76),
(1,10,2022,72),
(1,11,2019,68),
(1,11,2020,65),
(1,12,2020,65),
(1,13,2019,66),
(1,13,2020,70),
(1,14,2020,70),
(1,15,2018,75),
(1,15,2020,69),
(1,15,2021,72),
(1,16,2018,69),
(1,16,2021,70),
(1,17,2021,69),
(1,18,2019,73),
(1,18,2021,72),
(1,19,2018,66),
(1,19,2021,71),
(1,20,2018,70),
(1,20,2021,72),
(1,21,2021,65),
(1,22,2018,68),
(1,22,2019,71),
(1,22,2021,74),
(1,23,2019,70),
(1,24,2019,70),
(1,25,2019,70),
(1,26,2019,72),
(1,27,2019,73),
(1,28,2018,70),
(1,28,2019,70),
(1,29,2018,69),
(1,30,2018,73),
(2,1,2022,67),
(2,2,2018,71),
(2,2,2020,66),
(2,2,2022,73),
(2,3,2022,68),
(2,4,2018,72),
(2,4,2020,68),
(2,4,2022,74),
(2,5,2022,70),
(2,6,2020,65),
(2,6,2021,69),
(2,6,2022,73),
(2,7,2021,68),
(2,7,2022,72),
(2,8,2020,70),
(2,8,2022,74),
(2,9,2020,69),
(2,9,2022,67),
(2,10,2022,75),
(2,11,2019,70),
(2,11,2020,70),
(2,12,2020,73),
(2,13,2019,71),
(2,13,2020,69),
(2,14,2020,66),
(2,15,2018,68),
(2,15,2020,66),
(2,15,2021,72),
(2,16,2018,66),
(2,16,2021,75),
(2,17,2021,71),
(2,18,2019,65),
(2,18,2021,69),
(2,19,2018,74),
(2,19,2021,68),
(2,20,2018,67),
(2,20,2021,67),
(2,21,2021,72),
(2,22,2018,74),
(2,22,2019,70),
(2,22,2021,66),
(2,23,2019,68),
(2,24,2019,67),
(2,25,2019,67),
(2,26,2019,71),
(2,27,2019,73),
(2,28,2018,72),
(2,28,2019,71),
(2,29,2018,70),
(2,30,2018,69),
(3,1,2022,71),
(3,2,2018,65),
(3,2,2020,67),
(3,2,2022,71),
(3,3,2022,73),
(3,4,2018,70),
(3,4,2020,69),
(3,4,2022,68),
(3,5,2022,74),
(3,6,2020,71),
(3,6,2021,68),
(3,6,2022,72),
(3,7,2021,71),
(3,7,2022,75),
(3,8,2020,68),
(3,8,2022,71),
(3,9,2020,71),
(3,9,2022,72),
(3,10,2022,71),
(3,11,2019,70),
(3,11,2020,65),
(3,12,2020,67),
(3,13,2019,69),
(3,13,2020,69),
(3,14,2020,74),
(3,15,2018,65),
(3,15,2020,72),
(3,15,2021,72),
(3,16,2018,67),
(3,16,2021,70),
(3,17,2021,65),
(3,18,2019,70),
(3,18,2021,68),
(3,19,2018,71),
(3,19,2021,72),
(3,20,2018,73),
(3,20,2021,70),
(3,21,2021,72),
(3,22,2018,73),
(3,22,2019,64),
(3,22,2021,73),
(3,23,2019,67),
(3,24,2019,73),
(3,25,2019,66),
(3,26,2019,64),
(3,27,2019,64),
(3,28,2018,65),
(3,28,2019,68),
(3,29,2018,70),
(3,30,2018,68),
(4,1,2022,71),
(4,2,2018,74),
(4,2,2020,69),
(4,2,2022,64),
(4,3,2022,69),
(4,4,2018,66),
(4,4,2020,69),
(4,4,2022,73),
(4,5,2022,67),
(4,6,2020,69),
(4,6,2021,74),
(4,6,2022,70),
(4,7,2021,70),
(4,7,2022,67),
(4,8,2020,69),
(4,8,2022,75),
(4,9,2020,70),
(4,9,2022,72),
(4,10,2022,70),
(4,11,2019,68),
(4,11,2020,68),
(4,12,2020,72),
(4,13,2019,70),
(4,13,2020,70),
(4,14,2020,68),
(4,15,2018,69),
(4,15,2020,71),
(4,15,2021,66),
(4,16,2018,71),
(4,16,2021,69),
(4,17,2021,73),
(4,18,2019,68),
(4,18,2021,72),
(4,19,2018,64),
(4,19,2021,70),
(4,20,2018,70),
(4,20,2021,73),
(4,21,2021,74),
(4,22,2018,66),
(4,22,2019,72),
(4,22,2021,72),
(4,23,2019,70),
(4,24,2019,67),
(4,25,2019,74),
(4,26,2019,70),
(4,27,2019,68),
(4,28,2018,67),
(4,28,2019,69),
(4,29,2018,70),
(4,30,2018,69);
/*!40000 ALTER TABLE `round` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `round_statistic`
--

DROP TABLE IF EXISTS `round_statistic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `round_statistic` (
  `player_id` int(11) NOT NULL,
  `statistic_id` int(11) NOT NULL,
  `round_nr` int(11) NOT NULL,
  PRIMARY KEY (`player_id`,`statistic_id`,`round_nr`),
  KEY `statistic_roundstat_idx` (`statistic_id`),
  KEY `round_roundstat_idx` (`round_nr`),
  CONSTRAINT `player_roundstat` FOREIGN KEY (`player_id`) REFERENCES `player` (`player_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `round_roundstat` FOREIGN KEY (`round_nr`) REFERENCES `round` (`round_nr`),
  CONSTRAINT `statistic_roundstat` FOREIGN KEY (`statistic_id`) REFERENCES `statistic` (`statistic_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `round_statistic`
--

LOCK TABLES `round_statistic` WRITE;
/*!40000 ALTER TABLE `round_statistic` DISABLE KEYS */;
INSERT INTO `round_statistic` VALUES
(1,1,1),
(1,2,2),
(1,3,3),
(1,4,4),
(2,5,1),
(2,6,2),
(2,7,3),
(2,8,4),
(3,9,1),
(3,10,2),
(3,11,3),
(3,12,4),
(4,13,1),
(4,14,2),
(4,15,3),
(4,16,4),
(5,17,1),
(5,18,2),
(5,19,3),
(5,20,4),
(6,21,1),
(6,22,2),
(6,23,3),
(6,24,4),
(7,25,1),
(7,26,2),
(7,27,3),
(7,28,4),
(8,29,1),
(8,30,2),
(8,31,3),
(8,32,4),
(9,33,1),
(9,34,2),
(9,35,3),
(9,36,4),
(10,37,1),
(10,38,2),
(10,39,3),
(10,40,4),
(11,41,1),
(11,42,2),
(11,43,3),
(11,44,4),
(12,45,1),
(12,46,2),
(12,47,3),
(12,48,4),
(13,49,1),
(13,50,2),
(13,51,3),
(13,52,4),
(14,53,1),
(14,54,2),
(14,55,3),
(14,56,4),
(15,57,1),
(15,58,2),
(15,59,3),
(15,60,4),
(16,61,1),
(16,62,2),
(16,63,3),
(16,64,4),
(17,65,1),
(17,66,2),
(17,67,3),
(17,68,4),
(18,69,1),
(18,70,2),
(18,71,3),
(18,72,4),
(19,73,1),
(19,74,2),
(19,75,3),
(19,76,4),
(20,77,1),
(20,78,2),
(20,79,3),
(20,80,4),
(21,81,1),
(21,82,2),
(21,83,3),
(21,84,4),
(22,85,1),
(22,86,2),
(22,87,3),
(22,88,4),
(23,89,1),
(23,90,2),
(23,91,3),
(23,92,4),
(24,93,1),
(24,94,2),
(24,95,3),
(24,96,4),
(25,97,1),
(25,98,2),
(25,99,3),
(25,100,4),
(26,101,1),
(26,102,2),
(26,103,3),
(26,104,4),
(27,105,1),
(27,106,2),
(27,107,3),
(27,108,4),
(28,109,1),
(28,110,2),
(28,111,3),
(28,112,4),
(29,113,1),
(29,114,2),
(29,115,3),
(29,116,4),
(30,117,1),
(30,118,2),
(30,119,3),
(30,120,4);
/*!40000 ALTER TABLE `round_statistic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  `job_description` varchar(100) NOT NULL,
  PRIMARY KEY (`staff_id`,`person_id`),
  KEY `staff_person_idx` (`person_id`),
  CONSTRAINT `staff_person` FOREIGN KEY (`person_id`) REFERENCES `person` (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff`
--

LOCK TABLES `staff` WRITE;
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` VALUES
(1,32,'Play-by-play Commentator'),
(2,33,'Play-by-play Commentator'),
(3,34,'Play-by-play Commentator'),
(4,35,'Analyst'),
(5,36,'Analyst'),
(6,37,'On-course Reporter'),
(7,38,'Executive Chief'),
(8,39,'Executive Director'),
(9,40,'Play-by-play Commentator');
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statistic`
--

DROP TABLE IF EXISTS `statistic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statistic` (
  `statistic_id` int(11) NOT NULL,
  `tournament_id` year(4) NOT NULL,
  `round_nr` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `pars` int(11) NOT NULL,
  `birdies` int(11) NOT NULL,
  `bogeys` int(11) NOT NULL,
  PRIMARY KEY (`statistic_id`,`tournament_id`,`round_nr`),
  KEY `round_stat_idx` (`round_nr`),
  KEY `tournament_stat_idx` (`tournament_id`),
  CONSTRAINT `round_stat` FOREIGN KEY (`round_nr`) REFERENCES `round` (`round_nr`),
  CONSTRAINT `tournament_stat` FOREIGN KEY (`tournament_id`) REFERENCES `tournament` (`tournament_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statistic`
--

LOCK TABLES `statistic` WRITE;
/*!40000 ALTER TABLE `statistic` DISABLE KEYS */;
INSERT INTO `statistic` VALUES
(1,2022,1,69,13,4,1),
(2,2022,2,67,9,7,2),
(3,2022,3,71,7,6,5),
(4,2022,4,71,12,4,1),
(5,2022,1,73,13,2,3),
(6,2022,2,73,12,3,2),
(7,2022,3,71,11,4,3),
(8,2022,4,64,12,6,0),
(9,2022,1,73,13,1,2),
(10,2022,2,68,12,5,1),
(11,2022,3,73,13,2,3),
(12,2022,4,69,10,7,1),
(13,2022,1,68,8,8,0),
(14,2022,2,74,12,2,4),
(15,2022,3,68,10,6,2),
(16,2022,4,73,7,6,4),
(17,2022,1,73,13,2,3),
(18,2022,2,70,12,4,2),
(19,2022,3,74,10,3,5),
(20,2022,4,67,8,6,3),
(21,2022,1,70,14,3,1),
(22,2022,2,73,11,3,4),
(23,2022,3,72,10,4,4),
(24,2022,4,70,8,6,4),
(25,2022,1,71,13,3,2),
(26,2022,2,72,14,4,4),
(27,2022,3,75,6,5,6),
(28,2022,4,67,9,7,2),
(29,2022,1,67,10,5,2),
(30,2022,2,74,10,3,5),
(31,2022,3,71,12,6,2),
(32,2022,4,75,9,3,6),
(33,2022,1,76,10,2,6),
(34,2022,2,67,11,6,1),
(35,2022,3,72,14,4,4),
(36,2022,4,72,9,6,4),
(37,2022,1,72,10,5,5),
(38,2022,2,75,13,1,4),
(39,2022,3,71,13,3,2),
(40,2022,4,70,12,4,2),
(41,2020,1,65,12,5,0),
(42,2020,2,70,12,4,2),
(43,2020,3,65,12,5,0),
(44,2020,4,68,10,6,2),
(45,2020,1,65,10,6,1),
(46,2020,2,73,9,4,5),
(47,2020,3,67,13,5,0),
(48,2020,4,72,12,3,3),
(49,2020,1,70,13,2,2),
(50,2020,2,69,9,6,3),
(51,2020,3,69,12,3,2),
(52,2020,4,70,14,3,1),
(53,2020,1,70,14,3,1),
(54,2020,2,66,13,4,0),
(55,2020,3,74,16,0,2),
(56,2020,4,68,12,6,2),
(57,2020,1,69,10,4,3),
(58,2020,2,66,12,6,0),
(59,2020,3,72,13,4,1),
(60,2020,4,71,9,4,3),
(61,2020,1,68,6,8,4),
(62,2020,2,68,8,7,3),
(63,2020,3,71,8,6,3),
(64,2020,4,72,12,3,3),
(65,2021,1,69,14,2,1),
(66,2021,2,71,12,2,3),
(67,2021,3,65,12,5,0),
(68,2021,4,73,9,4,5),
(69,2021,1,72,12,3,3),
(70,2021,2,69,11,5,2),
(71,2021,3,68,11,4,2),
(72,2021,4,72,7,8,2),
(73,2021,1,71,12,3,1),
(74,2021,2,68,12,5,1),
(75,2021,3,72,11,4,2),
(76,2021,4,70,8,6,4),
(77,2021,1,72,10,4,4),
(78,2021,2,67,11,6,1),
(79,2021,3,70,12,4,2),
(80,2021,4,73,11,4,3),
(81,2021,1,65,8,7,2),
(82,2021,2,72,10,4,4),
(83,2021,3,72,12,3,3),
(84,2021,4,74,8,4,6),
(85,2021,1,74,9,4,4),
(86,2021,2,66,9,6,2),
(87,2021,3,73,13,2,3),
(88,2021,4,72,10,4,4),
(89,2019,1,70,12,4,2),
(90,2019,2,68,10,6,2),
(91,2019,3,67,11,6,1),
(92,2019,4,70,8,6,4),
(93,2019,1,70,13,4,2),
(94,2019,2,67,11,6,1),
(95,2019,3,73,12,4,2),
(96,2019,4,67,11,6,1),
(97,2019,1,70,14,3,1),
(98,2019,2,67,13,5,0),
(99,2019,3,66,12,6,0),
(100,2019,4,74,12,3,1),
(101,2019,1,72,11,2,4),
(102,2019,2,71,15,2,1),
(103,2019,3,64,9,7,1),
(104,2019,4,70,14,3,1),
(105,2019,1,73,12,3,2),
(106,2019,2,73,13,2,3),
(107,2019,3,64,10,8,0),
(108,2019,4,68,9,3,5),
(109,2019,1,70,14,3,1),
(110,2019,2,71,13,3,2),
(111,2019,3,68,9,5,3),
(112,2019,4,69,9,6,3),
(113,2018,1,69,11,5,2),
(114,2018,2,70,10,5,3),
(115,2018,3,70,14,3,1),
(116,2018,4,70,10,5,3),
(117,2018,1,73,15,1,2),
(118,2018,2,69,11,5,2),
(119,2018,3,68,8,7,3),
(120,2018,4,69,12,3,2),
(121,2018,1,71,7,6,5),
(122,2018,2,71,13,3,2),
(123,2018,3,71,13,3,2),
(124,2018,4,69,10,6,1);
/*!40000 ALTER TABLE `statistic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tournament`
--

DROP TABLE IF EXISTS `tournament`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tournament` (
  `tournament_id` year(4) NOT NULL,
  `win_score` int(11) NOT NULL,
  `winner` varchar(80) NOT NULL,
  `course_id` int(11) NOT NULL,
  PRIMARY KEY (`tournament_id`),
  KEY `played_on_idx` (`course_id`),
  CONSTRAINT `played_on` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tournament`
--

LOCK TABLES `tournament` WRITE;
/*!40000 ALTER TABLE `tournament` DISABLE KEYS */;
INSERT INTO `tournament` VALUES
(2018,-15,'Patrick Reed',1),
(2019,-13,'Tiger Woods',1),
(2020,-20,'Dustin Johnson',1),
(2021,-10,'Hideki Matsuyama',1),
(2022,-10,'Scottie Scheffler',1);
/*!40000 ALTER TABLE `tournament` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `email` varchar(100) NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `password` varchar(150) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
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

-- Dump completed on 2022-06-07 10:25:35

-- MySQL dump 10.13  Distrib 8.0.17, for macos10.14 (x86_64)
--
-- Host: 172.20.15.34    Database: library_db
-- ------------------------------------------------------
-- Server version	8.0.17

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
-- Table structure for table `Assets`
--

DROP TABLE IF EXISTS `Assets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Assets` (
  `AssetsID` int(11) NOT NULL AUTO_INCREMENT,
  `Category` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `BookName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Manufacturer` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `AcquiredDate` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `PurchasedPrice` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `CurrentValue` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `BookCondition` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `Location` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`AssetsID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Assets`
--

LOCK TABLES `Assets` WRITE;
/*!40000 ALTER TABLE `Assets` DISABLE KEYS */;
INSERT INTO `Assets` VALUES (8,'General works','How to be a follower','Cambridge','2019-11-25','2000','2000','good','second'),(9,'Technology [Applied Science]','Advanced Java','MIT','2019-11-25','2000','2000','good','third'),(10,'Geography & History','Burmese Civil War','Yangon','2008-12-09','1000','1000','fair','second');
/*!40000 ALTER TABLE `Assets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Comments`
--

DROP TABLE IF EXISTS `Comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Comments` (
  `CommentsID` int(11) NOT NULL AUTO_INCREMENT,
  `AssetsID` int(11) NOT NULL,
  `Comments` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`CommentsID`),
  KEY `fk_Comments_Assets1_idx` (`AssetsID`),
  CONSTRAINT `fk_Comments_Assets1` FOREIGN KEY (`AssetsID`) REFERENCES `Assets` (`AssetsID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Comments`
--

LOCK TABLES `Comments` WRITE;
/*!40000 ALTER TABLE `Comments` DISABLE KEYS */;
INSERT INTO `Comments` VALUES (6,8,'A first step to be a leader.'),(7,9,'Advanced tips and tutorials in Java programming.'),(9,10,'Truth behind unending civil war.');
/*!40000 ALTER TABLE `Comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Contacts`
--

DROP TABLE IF EXISTS `Contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Contacts` (
  `ContactsID` int(11) NOT NULL AUTO_INCREMENT,
  `IDNumber` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `FirstName` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `LastName` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `DateofBirth` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Gender` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `MaritalStatus` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `SpouseName` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Citizen` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `MobilePhone` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `HomePhone` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Address` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ContactsID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Contacts`
--

LOCK TABLES `Contacts` WRITE;
/*!40000 ALTER TABLE `Contacts` DISABLE KEYS */;
INSERT INTO `Contacts` VALUES (6,'201600280','Jino','Kuplee','1993-02-09','Male','Divorced','Hehe','TH','jino@apiu.edu','193-111-1111','232-898-8719','Tak, Thailand'),(7,'201700185','Sumitr','Moradakuaekun','1993-07-14','Male','Complicated',NULL,'TH','sumitr@apiu.edu','333-333-3333',NULL,'Mae Sod, Tak');
/*!40000 ALTER TABLE `Contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Transactions`
--

DROP TABLE IF EXISTS `Transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Transactions` (
  `TransactionsID` int(11) NOT NULL AUTO_INCREMENT,
  `ContactsID` int(11) NOT NULL,
  `AssetsID` int(11) NOT NULL,
  `CheckedOutDate` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `DueDate` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `CheckedInDate` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CheckedOutCondition` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `CheckedInCondition` varchar(7) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`TransactionsID`),
  KEY `fk_Transactions_Contacts_idx` (`ContactsID`),
  KEY `fk_Transactions_Assets1_idx` (`AssetsID`),
  CONSTRAINT `fk_Transactions_Assets1` FOREIGN KEY (`AssetsID`) REFERENCES `Assets` (`AssetsID`),
  CONSTRAINT `fk_Transactions_Contacts` FOREIGN KEY (`ContactsID`) REFERENCES `Contacts` (`ContactsID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Transactions`
--

LOCK TABLES `Transactions` WRITE;
/*!40000 ALTER TABLE `Transactions` DISABLE KEYS */;
INSERT INTO `Transactions` VALUES (5,6,8,'2019-12-11','2019-12-24','2019-12-11','good','good'),(6,6,9,'2019-12-11','2019-12-24',NULL,'good',NULL),(7,7,10,'2019-12-12','2019-12-25','2019-12-12','good','good'),(8,6,10,'2019-12-12','2019-12-25',NULL,'good',NULL),(9,7,9,'2020-03-16','2020-03-25','2020-03-16','good','good');
/*!40000 ALTER TABLE `Transactions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-14  1:44:36

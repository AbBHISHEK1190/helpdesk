-- MySQL dump 10.13  Distrib 8.0.17, for Linux (x86_64)
--
-- Host: localhost    Database: helpdesk_new
-- ------------------------------------------------------
-- Server version	8.0.17

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `assign_ticket`
--

DROP TABLE IF EXISTS `assign_ticket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assign_ticket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_id` varchar(20) DEFAULT NULL,
  `user_id` int(8) DEFAULT NULL,
  `sla` varchar(20) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assign_ticket`
--

LOCK TABLES `assign_ticket` WRITE;
/*!40000 ALTER TABLE `assign_ticket` DISABLE KEYS */;
INSERT INTO `assign_ticket` VALUES (1,'598883',2,'2020-05-29 21:53:09','2020-05-29 14:23:09'),(2,'673379',1,'2020-06-03 20:31:19','2020-06-01 15:01:19'),(3,'550149',2,'2020-06-01 22:34:24','2020-06-01 15:04:24'),(4,'196464',3,'2020-06-02 15:16:37','2020-06-02 07:46:37'),(5,'452809',1,'2020-06-24 11:52:32','2020-06-22 06:22:32');
/*!40000 ALTER TABLE `assign_ticket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(200) DEFAULT NULL,
  `department_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Loan',1),(2,'Wifi',2),(3,'Ethernet',2);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `create_ticket`
--

DROP TABLE IF EXISTS `create_ticket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `create_ticket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_id` varchar(10) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile` bigint(12) DEFAULT NULL,
  `department` varchar(50) NOT NULL,
  `help_topic` varchar(100) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `sub_category` varchar(100) DEFAULT NULL,
  `faq` varchar(100) DEFAULT NULL,
  `subjects` varchar(100) DEFAULT NULL,
  `others` varchar(200) DEFAULT NULL,
  `messages` varchar(500) DEFAULT NULL,
  `attachments` varchar(80) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `priority` int(6) DEFAULT '1',
  `status` int(6) DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sla` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `create_ticket`
--

LOCK TABLES `create_ticket` WRITE;
/*!40000 ALTER TABLE `create_ticket` DISABLE KEYS */;
INSERT INTO `create_ticket` VALUES (1,'598883','Test','Test@gmail.com',9898765432,'Finance','Loan',NULL,'Home Loan','Can Existing borrowers avils the benefits of new interset rate?','Test','','TestTestTestTestTestTestTest.','1590761039Work From Home Policy ver 1 0.',1,1,'2020-05-29 14:03:59','2020-05-29 14:03:59'),(2,'984230','Test','test@gmail.com',9999999999,'Hardware','Ethernet',NULL,'Ethernet wire','What is an 802.3 network?','tset','','tset','1591008403img-5.jpg',3,0,'2020-06-01 10:46:43','2020-06-01 10:46:43'),(3,'673379','testjune','testjune@gmail.com',9898765432,'Hardware','Wifi',NULL,'Wifi light','What security steps should i take during using the network?','testjunetestjune','','testjunetestjunetestjunetestjune','1591023317download2.jpg',1,1,'2020-06-01 14:55:17','2020-06-01 14:55:17'),(4,'550149','shivani','shivani.bansal@csc.gov.in',8800711903,'Finance','Loan',NULL,NULL,'','test subject','','test message','1591023794img-3.jpg',1,1,'2020-06-01 15:03:14','2020-06-01 15:03:14'),(5,'196464','test','test@gmail.com',8888888888,'Finance','Loan',NULL,NULL,'','test','','test','1591083215',1,0,'2020-06-02 07:33:35','2020-06-02 07:33:35'),(6,'452809','kumar','kumar@gmail.com',9898987654,'Hardware','Wifi',NULL,'Wifi light','I cant\'t see the wireless network what can i do?\r\n','my wifi is not working.','','my wifi is not working.my wifi is not working.my wifi is not working.my wifi is not working.my wifi is not working.','1592806505download2.jpg',1,1,'2020-06-22 06:15:06','2020-06-22 06:15:06');
/*!40000 ALTER TABLE `create_ticket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` VALUES (1,'Finance'),(2,'Hardware');
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faq`
--

DROP TABLE IF EXISTS `faq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `faq` varchar(300) DEFAULT NULL,
  `subcategory_id` int(8) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faq`
--

LOCK TABLES `faq` WRITE;
/*!40000 ALTER TABLE `faq` DISABLE KEYS */;
INSERT INTO `faq` VALUES (1,'I cant\'t see the wireless network what can i do?\r\n',1),(2,'What security steps should i take during using the network?',1),(3,'What is an 802.3 network?',2),(4,' What is CSMA/CD?',2),(5,'Can Existing borrowers avils the benefits of new interset rate?',3),(6,'What is EBLR?',3);
/*!40000 ALTER TABLE `faq` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_id` varchar(20) DEFAULT NULL,
  `message` varchar(600) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  `user_id` int(8) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `department` varchar(50) NOT NULL,
  `attachments` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message`
--

LOCK TABLES `message` WRITE;
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
INSERT INTO `message` VALUES (1,'673379','hello','anonumus',0,'2020-06-01 14:58:45','Hardware',NULL),(2,'673379','hghhghghg','admin',1,'2020-06-01 15:07:14','Hardware',NULL),(3,'984230','cgfvb','anonumus',0,'2020-06-02 07:35:07','Hardware',NULL),(4,'196464','zsxdcfvghb','staff',3,'2020-06-02 07:47:45','Finance',NULL),(5,'196464','thanks','anonumus',0,'2020-06-02 07:49:49','Finance',NULL),(6,'452809','fwf','admin',1,'2020-06-22 06:31:38','Hardware',NULL),(7,'452809','hello','admin',1,'2020-06-22 07:04:51','Hardware',''),(8,'452809','solve fast.','anonumus',0,'2020-06-22 08:37:24','Hardware','');
/*!40000 ALTER TABLE `message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sign_up`
--

DROP TABLE IF EXISTS `sign_up`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sign_up` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile` bigint(10) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `state` varchar(30) DEFAULT NULL,
  `district` varchar(30) DEFAULT NULL,
  `block` varchar(30) DEFAULT NULL,
  `gp` varchar(30) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  `department` varchar(50) NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `p_pic` varchar(80) NOT NULL,
  `status` int(6) NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sign_up`
--

LOCK TABLES `sign_up` WRITE;
/*!40000 ALTER TABLE `sign_up` DISABLE KEYS */;
INSERT INTO `sign_up` VALUES (1,'admin','',0,'','','','','','admin','','21232f297a57a5a743894a0e4a801fc3','',1,'0000-00-00 00:00:00'),(2,'test',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'teamleader','Finance','098f6bcd4621d373cade4e832627b4f6','',1,'0000-00-00 00:00:00'),(3,'staff','tset123@gmail.com',0,'','','','','','staff','Finance','1253208465b1efa876f982d8a9e73eef','',1,'0000-00-00 00:00:00');
/*!40000 ALTER TABLE `sign_up` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sla`
--

DROP TABLE IF EXISTS `sla`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sla` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department` varchar(30) DEFAULT NULL,
  `sla` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sla`
--

LOCK TABLES `sla` WRITE;
/*!40000 ALTER TABLE `sla` DISABLE KEYS */;
INSERT INTO `sla` VALUES (1,'Finance','2'),(2,'Hardware','48');
/*!40000 ALTER TABLE `sla` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_category`
--

DROP TABLE IF EXISTS `sub_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sub_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_category` varchar(200) DEFAULT NULL,
  `category_id` int(8) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_category`
--

LOCK TABLES `sub_category` WRITE;
/*!40000 ALTER TABLE `sub_category` DISABLE KEYS */;
INSERT INTO `sub_category` VALUES (1,'Wifi light',2),(2,'Ethernet wire',3),(3,'Home Loan',1);
/*!40000 ALTER TABLE `sub_category` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-06-22 15:47:33

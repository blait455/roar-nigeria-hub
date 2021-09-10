-- MySQL dump 10.13  Distrib 8.0.26, for Linux (x86_64)
--
-- Host: localhost    Database: roar_db
-- ------------------------------------------------------
-- Server version	8.0.26-0ubuntu0.20.04.2

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
-- Table structure for table `abouts`
--

DROP TABLE IF EXISTS `abouts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `abouts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image1_3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image2_3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image3_3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `abouts`
--

LOCK TABLES `abouts` WRITE;
/*!40000 ALTER TABLE `abouts` DISABLE KEYS */;
INSERT INTO `abouts` VALUES (1,'roar-nigeria-hub-2021-04-26-608748303c5fb.png','<p><strong>WHO WE ARE</strong><br />Roar Nigeria Hub is a community that provides professional support to technology enabled startups, researchers, entrepreneurs and SME&rsquo;s.<br />Her programs are designed to develop a new generation of innovators and creators that will provide local technology based solutions with a global perspective</p>\r\n<p><strong>OUR VISSION</strong><br />To create homegrown technology solutions with global impact.</p>\r\n<p><strong>OUR MISSION</strong><br />To produce the next generation of entrepreneurs by creating an enabling environment, support systems and relevant skills to succeed with technology entrepreneurship</p>','roar-nigeria-hub-2021-04-29-608aa22e5f16b.png','roar-nigeria-hub-2021-04-29-608aa2823ab11.jpg','roar-nigeria-hub-2021-04-29-6089ff3d23ae1.jpg','2021-04-26 15:36:36','2021-04-29 12:11:46');
/*!40000 ALTER TABLE `abouts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `albums`
--

DROP TABLE IF EXISTS `albums`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `albums` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `albums_user_id_foreign` (`user_id`),
  CONSTRAINT `albums_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `albums`
--

LOCK TABLES `albums` WRITE;
/*!40000 ALTER TABLE `albums` DISABLE KEYS */;
/*!40000 ALTER TABLE `albums` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aspect_startup`
--

DROP TABLE IF EXISTS `aspect_startup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aspect_startup` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `startup_id` int unsigned NOT NULL,
  `aspect_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aspect_startup`
--

LOCK TABLES `aspect_startup` WRITE;
/*!40000 ALTER TABLE `aspect_startup` DISABLE KEYS */;
/*!40000 ALTER TABLE `aspect_startup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aspects`
--

DROP TABLE IF EXISTS `aspects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aspects` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aspects`
--

LOCK TABLES `aspects` WRITE;
/*!40000 ALTER TABLE `aspects` DISABLE KEYS */;
INSERT INTO `aspects` VALUES (1,'Information & Communication tech',NULL,'this is just a description','2021-04-26 15:36:36','2021-04-26 15:36:36'),(2,'Medical & Health Science',NULL,'this is just a description','2021-04-26 15:36:36','2021-04-26 15:36:36'),(3,'Biotech/Biomedical',NULL,'this is just a description','2021-04-26 15:36:36','2021-04-26 15:36:36'),(4,'Idustrial electronics',NULL,'this is just a description','2021-04-26 15:36:36','2021-04-26 15:36:36'),(5,'Environmental tech & waste management',NULL,'this is just a description','2021-04-26 15:36:36','2021-04-26 15:36:36'),(6,'Food/Agro Innovations',NULL,'this is just a description','2021-04-26 15:36:36','2021-04-26 15:36:36'),(7,'Home autoation and services',NULL,'this is just a description','2021-04-26 15:36:36','2021-04-26 15:36:36'),(8,'Drone tech',NULL,'this is just a description','2021-04-26 15:36:36','2021-04-26 15:36:36'),(9,'e-commerce and fintech',NULL,'this is just a description','2021-04-26 15:36:36','2021-04-26 15:36:36'),(10,'Blockchain tech',NULL,'this is just a description','2021-04-26 15:36:36','2021-04-26 15:36:36'),(11,'Artificial Intelligence',NULL,'this is just a description','2021-04-26 15:36:36','2021-04-26 15:36:36'),(12,'IOT',NULL,'this is just a description','2021-04-26 15:36:36','2021-04-26 15:36:36');
/*!40000 ALTER TABLE `aspects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `backgrounds`
--

DROP TABLE IF EXISTS `backgrounds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `backgrounds` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `f1_bg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `f2_bg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `f3_bg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `f4_bg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `f5_bg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `a1_bg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `a2_bg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `b1_bg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `b2_bg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `c_bg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `e1_bg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `e2_bg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `s1_bg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `s2_bg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `backgrounds`
--

LOCK TABLES `backgrounds` WRITE;
/*!40000 ALTER TABLE `backgrounds` DISABLE KEYS */;
INSERT INTO `backgrounds` VALUES (1,'default.png','def.png','roar-nigeria-hub-2021-04-26-6087412ad69d7.jpg','roar-nigeria-hub-2021-04-26-6087432dca1dc.jpg','roar-nigeria-hub-2021-04-26-60874faeb18d0.jpg','roar-nigeria-hub-2021-04-26-60874d0da4e1a.jpg','shdgjds','roar-nigeria-hub-2021-04-26-6087524d63faf.jpg','sjgdsg','khsdjfd','roar-nigeria-hub-2021-06-24-60d3cddd9b2e9.jpg','sisgdis','roar-nigeria-hub-2021-04-26-60874ea37b27a.jpg','sodusgd',NULL,'2021-06-24 00:12:14');
/*!40000 ALTER TABLE `backgrounds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blaits`
--

DROP TABLE IF EXISTS `blaits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blaits` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pop` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blaits`
--

LOCK TABLES `blaits` WRITE;
/*!40000 ALTER TABLE `blaits` DISABLE KEYS */;
/*!40000 ALTER TABLE `blaits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Technology','technology','technology-2021-04-26-608750e058e39.jpeg','2021-04-26 23:46:40','2021-04-26 23:46:40');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category_post`
--

DROP TABLE IF EXISTS `category_post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category_post` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int unsigned NOT NULL,
  `post_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_post`
--

LOCK TABLES `category_post` WRITE;
/*!40000 ALTER TABLE `category_post` DISABLE KEYS */;
INSERT INTO `category_post` VALUES (1,1,1,'2021-04-26 23:50:34','2021-04-26 23:50:34'),(2,1,2,'2021-06-27 22:44:00','2021-06-27 22:44:00');
/*!40000 ALTER TABLE `category_post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentable_id` int NOT NULL,
  `commentable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  `parent` int NOT NULL DEFAULT '0',
  `parent_id` int DEFAULT NULL,
  `approved` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `communities`
--

DROP TABLE IF EXISTS `communities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `communities` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dept` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `communities`
--

LOCK TABLES `communities` WRITE;
/*!40000 ALTER TABLE `communities` DISABLE KEYS */;
INSERT INTO `communities` VALUES (1,'Chukwuka Kamsiyochukwu Gideon','gchukwuka12@gmail.com','08424873822','Computer Science','robotics & ai','intermediate','2021-07-03 12:35:49','2021-07-03 12:35:49'),(2,'Odinaka Ogbujiagba','odinakachiogbujiagba@gmail.com','07081461839','Computer Science','web development','beginner','2021-07-03 12:37:08','2021-07-03 12:37:08'),(3,'Ugwuanyi Ikechukwu Thaddeus','ik.ugwuanyi@gmail.com','08100532234','Computer Science','web development','intermediate','2021-07-03 12:41:35','2021-07-03 12:41:35'),(4,'Ozigbo Chidera Okwukweka','chideraozigbo@gmail.com','08115731094','Computer Science','mobile app development','beginner','2021-07-03 12:53:57','2021-07-03 12:53:57'),(5,'Enwerem Udemezua Patrick','enweremeric9@gmail.com','09013684550','Computer science','web development','intermediate','2021-07-03 12:56:31','2021-07-03 12:56:31'),(6,'Uchechukwu Orji','uchechukwu.orji.242682@unn.edu.ng','0806601940','Electronic Engineering','web development','intermediate','2021-07-03 13:07:46','2021-07-03 13:07:46'),(7,'Kenechukwu Nwobodo','nwobodokenechukwu2@gmail.com','08168789414','Computer Science','web development','intermediate','2021-07-03 13:14:23','2021-07-03 13:14:23'),(8,'Kelo Uchendu','Uchendukelo@gmail.com','07035701317','Mechanical Engineering','ui/ux','beginner','2021-07-03 13:23:37','2021-07-03 13:23:37'),(9,'Igwebuike Canice Chiadika','caniceigwebuike@gmail.com','08025432922','Computer science','web development','beginner','2021-07-03 13:47:50','2021-07-03 13:47:50'),(10,'Ugwuja Anthony Chinedu','anthony.ugwuja.244154@unn.edu.ng','09032570130','Pharmacy','web development','beginner','2021-07-03 14:01:13','2021-07-03 14:01:13'),(11,'Onyema Anthony chibuike','anthonychibuike246@gmail.com','09032627367','Computer science','mobile app development','intermediate','2021-07-03 14:16:16','2021-07-03 14:16:16'),(12,'Añulugwo Ogochukwu Emilia','emiliaogochukwu41@gmail.com','09031988502','Pharmacy','data science','yet to start','2021-07-03 14:22:36','2021-07-03 14:22:36'),(13,'Abraham Eriba','eribainc@gmail.com','07056781254','Computer Science','robotics & ai','yet to start','2021-07-03 14:42:14','2021-07-03 14:42:14'),(14,'Iloka Nadia','ilokanadia@gmail.com','08101802510','Pharmacy','content creation/blogging','beginner','2021-07-03 15:01:21','2021-07-03 15:01:21'),(15,'Chidi Franklin Orih','chidifranklin40@gmail.com','09034193538','Computer science','web development','intermediate','2021-07-03 15:09:17','2021-07-03 15:09:17'),(16,'Nnaji Chinedu Benjamin','chinedubenj@gmail.com','09069213395','Computer and Robotics Education','web development','yet to start','2021-07-03 15:32:18','2021-07-03 15:32:18'),(17,'Chukwu Chidiebere John','chukwuchidieberejohn@outlook.com','08085547358','Mathematics','web development','intermediate','2021-07-03 15:33:15','2021-07-03 15:33:15'),(18,'Chukwu Chidiebere John','johndivinesmart@gmail.com','08107565155','Mathematics','web development','intermediate','2021-07-03 15:34:44','2021-07-03 15:34:44'),(19,'Godswill Chibuzor','godswillchibuzororie@gmail.com','09090413739','computer science','web development','yet to start','2021-07-03 16:05:40','2021-07-03 16:05:40'),(20,'Idoko Stanistus Chibuzo','idokostan4@gmail.com','08088781410','Human Physiology','mobile app development','yet to start','2021-07-03 16:44:30','2021-07-03 16:44:30'),(21,'Ukwuaba Rita Chinecherem','ukwuabaneche1997@gmail.com','08064633078','PHARMACY','ui/ux','yet to start','2021-07-03 17:45:39','2021-07-03 17:45:39'),(22,'Ukwuaba Rita Chinecherem','ukwuabaneche1997@gmail.com','08064633078','PHARMACY','ui/ux','yet to start','2021-07-03 17:51:47','2021-07-03 17:51:47'),(23,'Kanu Rowland Okechukwu','kanurowland92@gmail.com','08143358911','Economics','data science','intermediate','2021-07-03 19:34:01','2021-07-03 19:34:01'),(24,'Mmerichukwu Nnaebuka Anosike','mmerichukwuanosike@gmail.com','08110671481','Civil engineering','robotics & ai','beginner','2021-07-03 20:30:13','2021-07-03 20:30:13'),(25,'EGBO, C Emmanuel','emmanuelhills255@gmail.com','07065289273','Computer Statistics','web development','intermediate','2021-07-04 04:36:19','2021-07-04 04:36:19'),(26,'Ifeanyi Christwin','ichristwin@gmail.com','08081147003','Food science and technology','data science','intermediate','2021-07-04 04:43:24','2021-07-04 04:43:24'),(27,'Alvin Okoro','alvinuchenna14@gmail.com','08145075442','Computer Science','web development','intermediate','2021-07-04 04:44:36','2021-07-04 04:44:36'),(28,'Eze Stanley Ifeanyi','stanleyeze758@gmail.com','08169316451','Computer and Robotics Education','web development','intermediate','2021-07-04 06:03:43','2021-07-04 06:03:43'),(29,'Eze Stanley Ifeanyi','stanleyeze758@gmail.com','08169316451','Computer and Robotics Education','web development','intermediate','2021-07-04 07:43:24','2021-07-04 07:43:24'),(30,'Njoku Nneka Sandra','njokunnekasandra@gmail.com','08100759193','Science laboratory technology','web development','beginner','2021-07-04 14:15:24','2021-07-04 14:15:24'),(31,'Orji Michael Ugochukwu','princemikeorji@gmail.com','08188124485','Computer Education','web development','intermediate','2021-07-04 14:39:40','2021-07-04 14:39:40'),(32,'Ukwuaba Rita Chinecherem','ukwuabaneche1997@gmail.com','08064633078','PHARMACY','ui/ux','yet to start','2021-07-04 15:42:47','2021-07-04 15:42:47'),(33,'Munachi Brian Umeh','munachiumeh@gmail.com','09019022273','Computer science','mobile app development','beginner','2021-07-04 21:30:16','2021-07-04 21:30:16'),(34,'okoli clifford chima','chimaclifford360@yahoo.com','09030575221','Statistics Department','data science','intermediate','2021-07-06 01:55:10','2021-07-06 01:55:10'),(35,'OJOBOR JOVITA UCHENNA','jovitauchenna1997@gmail.com','08105505187','Pharmacy','web development','yet to start','2021-07-06 22:28:50','2021-07-06 22:28:50'),(36,'Gospel Chukwuka Onu','onugospel@yahoo.com','09037929641','Electrical Engineering','data science','beginner','2021-07-07 14:01:06','2021-07-07 14:01:06'),(37,'Gospel Chukwuka Onu','onugospel@yahoo.com','09037929641','Electrical Engineering','data science','beginner','2021-07-07 14:07:04','2021-07-07 14:07:04'),(38,'Ejiofor Samuel Chidozie','ejioforsamuelchidozie@gmail.com','07047828114','Pharmacy','mobile app development','yet to start','2021-07-11 10:43:46','2021-07-11 10:43:46'),(39,'Eleje Ejike Joel','joelineleje@gmail.com','08136368471','Pharmacy','graphic design','beginner','2021-07-11 10:44:08','2021-07-11 10:44:08'),(40,'Okoro Amarachi Maureen','mirandahk17@gmail.com','08110447995','Pharmacy','web development','yet to start','2021-07-11 10:52:04','2021-07-11 10:52:04'),(41,'Ubulom A Edward','cyreniusthegreat@gmail.com','08097329402','Mechanical engineering','data science','yet to start','2021-07-11 10:53:37','2021-07-11 10:53:37'),(42,'Ukwuaba Rita Chinecherem','ukwuabaneche1997@gmail.com','08064633078','PHARMACY','ui/ux','yet to start','2021-07-11 11:02:15','2021-07-11 11:02:15'),(43,'Ugbome Chukwunonso Rita','ugbomerita@gmail.com','09024593518','Medical Radiography and Radiological Sciences','content creation/blogging','yet to start','2021-07-11 11:14:29','2021-07-11 11:14:29'),(44,'Ukwuta Ifunanya Thecla','ukwutathecla@gmail.com','08143160282','Pharmacy','graphic design','yet to start','2021-07-11 11:18:42','2021-07-11 11:18:42'),(45,'Gloria Ebubechukwu Okeke','okekeebubechukwu08@gmail.com','07033609159','Pharmacy','copywriting','beginner','2021-07-11 11:23:33','2021-07-11 11:23:33'),(46,'Genevieve N  Ezerioha','gene.ezerioha@yahoo.com','08068868838','Psychology','graphic design','yet to start','2021-07-11 11:37:12','2021-07-11 11:37:12'),(47,'Genevieve N  Ezerioha','gene.ezerioha@yahoo.com','08068868838','Psychology','graphic design','yet to start','2021-07-11 11:38:09','2021-07-11 11:38:09'),(48,'OKECHUKWU EMMANUEL OSITADINMMA','emmanuel.okechukwu.249062@unn.edu.ng','09027330060','MECHANICAL ENGINEERING','web development','yet to start','2021-07-11 11:58:10','2021-07-11 11:58:10'),(49,'Anyaene kelechi','Anyaenekelechi@gmail.com','09011792046','English and literary studies','graphic design','yet to start','2021-07-11 12:13:24','2021-07-11 12:13:24'),(50,'Chimbo Udochukwu Enyinnaya','Chimboudo@gmail.com','08130341225','Mechanical Engineering','robotics & ai','yet to start','2021-07-11 12:50:40','2021-07-11 12:50:40'),(51,'ONUH PHILIP ONYEDIKACHI','onuhphiliponyedikachi@gmail.com','08082277454','Pharmacy','robotics & ai','yet to start','2021-07-11 12:52:13','2021-07-11 12:52:13'),(52,'Kalu-Whyte Godson O','godsonwhyte07@gmail.com','09096895960','Mechanical Engineering','data science','beginner','2021-07-11 13:04:16','2021-07-11 13:04:16'),(53,'Marty Abigail Chiamara','martinsabigailaeerex@gmail.com','08082378056','Mechanical engineering','ui/ux','beginner','2021-07-11 13:13:06','2021-07-11 13:13:06'),(54,'Chukwuemeka Paul Ekwealor','Ekwealorp@gmail.com','07052724934','Mechanical engineering','data science','beginner','2021-07-11 13:17:22','2021-07-11 13:17:22'),(55,'Ujoh Daniel Nwachukwu','jeddybrown1@gmail.com','08168679380','Slt','data science','beginner','2021-07-11 13:25:47','2021-07-11 13:25:47'),(56,'Richard Divine Chinaeke','divinerichard007@gmail.com','08105619928','Mechanical Engineering','robotics & ai','yet to start','2021-07-11 15:00:31','2021-07-11 15:00:31'),(57,'Ogochukwu Evangeline Ekweozor','evaanthony2803@gmail.com','08169505228','Pharmacy','web development','yet to start','2021-07-11 16:24:32','2021-07-11 16:24:32'),(58,'Emesowum George Chidozie','emesowumchidozie@gmail.com','08161823096','Mechanical Engineering','data science','yet to start','2021-07-11 17:00:47','2021-07-11 17:00:47'),(59,'Onwunyirigbo Francis Chinedu','francis.onwunyirigbo.250214@unn.edu.ng','08096481198','Mechanical Engineering','robotics & ai','yet to start','2021-07-11 17:45:05','2021-07-11 17:45:05'),(60,'Samuel Chukwudi Achinihu','samachix@gmail.com','07081458485','Human Physiology','web development','intermediate','2021-07-11 19:06:59','2021-07-11 19:06:59'),(61,'Ani, Nnaemeka Kingsley','mekkykinzzy55@gmail.com','07039754755','Social work','graphic design','beginner','2021-07-11 21:11:56','2021-07-11 21:11:56'),(62,'Moyongho, Matthew Ndifon','moyonghomatthew@gmail.com','08087603763','Computer science','mobile app development','beginner','2021-07-11 21:22:48','2021-07-11 21:22:48'),(63,'Chijiuba Onyedikachukwu Victory','chijiubaonyedikachukwu@gmail.com','08132547926','Computer Science','web development','intermediate','2021-07-11 21:23:17','2021-07-11 21:23:17'),(64,'Epunam ikechukwu','epunami@yahoo.com','09024542493','Engineering','robotics & ai','yet to start','2021-07-12 07:13:16','2021-07-12 07:13:16'),(65,'Odugu Christian Onyebuchi','buchitronics@gmail.com','08144662612','Electronic Engineering','robotics & ai','beginner','2021-07-12 07:42:40','2021-07-12 07:42:40'),(66,'Igwe Ebele Blessing','igweebele6@gmail.com','08108572125','Computer Science','ui/ux','beginner','2021-07-12 08:34:52','2021-07-12 08:34:52'),(67,'Onuorah Okechukwu Cosmas','onuorahokechukwu001@gmail.com','09064064489','Mechanical engineering','robotics & ai','beginner','2021-07-12 17:05:03','2021-07-12 17:05:03'),(68,'Onwualu Ogadinma Sarah','onwualuogadinma243@gmail.com','08063350921','Archaeology and Tourism','graphic design','yet to start','2021-07-15 22:32:14','2021-07-15 22:32:14'),(69,'Igwe Chidimma Ruth','mmaadaku1@gmail.com','08066512324','Pharmacy','content creation/blogging','yet to start','2021-07-19 06:25:52','2021-07-19 06:25:52'),(70,'Nnamani Collins','collinswilliams396@gmail.com','07060761127','Pharmacy','mobile app development','yet to start','2021-07-19 08:59:50','2021-07-19 08:59:50'),(71,'Ikevude Chukwuka Ifeanyi','ikevudechukwuka@gmail.com','08109008334','Agricultural and Bioresourses Engineering','quantum computing','yet to start','2021-07-19 12:09:18','2021-07-19 12:09:18'),(72,'Enoch Chinwoke Onyema','enochchinwoke@gmail.com','08168575245','Electronic Engineering','mobile app development','beginner','2021-07-20 12:45:05','2021-07-20 12:45:05'),(73,'Princewill Azorom','princewhiilz@gmail.com','08186755261','Electronic Engineering','graphic design','yet to start','2021-07-21 03:15:33','2021-07-21 03:15:33'),(74,'Chiamaka Onwujuobi Victoria','lesleytechh@gmail.com','08147651873','Nutrition & Dietetics','mobile app development','intermediate','2021-07-28 01:33:46','2021-07-28 01:33:46'),(75,'Ukpai Cordelia','elemdelia@gmail.com','07010996740','Computer science','web development','intermediate','2021-08-01 20:59:48','2021-08-01 20:59:48'),(76,'Ukpai Cordelia','elemdelia@gmail.com','07010996740','Computer science','web development','intermediate','2021-08-01 21:18:01','2021-08-01 21:18:01'),(77,'Adukwu Nnamdi Kizito','rexkozy0@gmail.com','08106437707','Mechanical Engineering','web development','intermediate','2021-08-16 08:49:15','2021-08-16 08:49:15'),(78,'Onoja Godswill','Onojagodswill@gmail.com','08130488508','Mathematics','web development','advanced','2021-08-19 12:11:39','2021-08-19 12:11:39'),(79,'Chukwuka Ibekam','ambassadorchux@gmail.com','08133434262','Mechanical Engineering','graphic design','advanced','2021-08-19 14:03:25','2021-08-19 14:03:25'),(80,'Onuh Onyinye','onuhonyinye7@gmail.com','08143008603','Economics','data science','yet to start','2021-08-20 12:14:12','2021-08-20 12:14:12'),(81,'Anarah Peace Oluebubechukwu','sweetsouth222@gmail.com','07087553253','Archaeology and Tourism','web development','beginner','2021-08-21 06:14:33','2021-08-21 06:14:33'),(82,'Obi Emmanuella','obiemmanuella345@gmail.com','9055978322','Mechanical engineering','web development','yet to start','2021-08-21 11:25:40','2021-08-21 11:25:40'),(83,'Ezeano chinedu Samuel','neduezeano@gmail.com','08133594185','Graphics design= Intermediate.     , UI/UX design newbie','graphic design','intermediate','2021-08-21 16:29:32','2021-08-21 16:29:32'),(84,'Ezeano chinedu Samuel','neduezeano@gmail.com','08133594185','Met and mat Engineering','ui/ux','yet to start','2021-08-22 07:25:16','2021-08-22 07:25:16'),(85,'Chima Roland Obiora','rolandobiora@gmail.com','08167366577','Computer science','web development','beginner','2021-08-22 20:18:24','2021-08-22 20:18:24'),(86,'Nweze Daniel','flashdaniel0@gmail.com','08167644956','Agricultural and Bio resources Engineering','web development','intermediate','2021-08-28 12:21:45','2021-08-28 12:21:45');
/*!40000 ALTER TABLE `communities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contacts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` VALUES (1,'Emmanuel Obije','obijeemmanuel2017@gmail.com','+2348060683754','More knowledge','I want a platform were I can communicate with a customer service easily on any of the social media platforms please.\r\nI have a lot to ask, and understand before I dive into this.',0,'2021-05-04 13:10:01','2021-05-04 13:10:01'),(2,'Donaldrhimb','no-replyCex@gmail.com','82157113128','A new method of email distribution.','Hi!  roarnigeriahub.com \r\n \r\nDid you know that it is possible to send appeal absolutely lawful? \r\nWe sell a new method of sending appeal through feedback forms. Such forms are located on many sites. \r\nWhen such proposals are sent, no personal data is used, and messages are sent to forms specifically designed to receive messages and appeals. \r\nalso, messages sent through contact Forms do not get into spam because such messages are considered important. \r\nWe offer you to test our service for free. We will send up to 50,000 messages for you. \r\nThe cost of sending one million messages is 49 USD. \r\n \r\nThis offer is created automatically. Please use the contact details below to contact us. \r\n \r\nContact us. \r\nTelegram - @FeedbackMessages \r\nSkype  live:contactform_18 \r\nWhatsApp - +375259112693 \r\n \r\nWe only use chat.',0,'2021-05-05 22:45:17','2021-05-05 22:45:17'),(3,'Mike King','no-reply@google.com','84365273427','whitehat monthly SEO plans','Hi \r\n \r\nI have just analyzed  roarnigeriahub.com for its SEO Trend and saw that your website could use a push. \r\n \r\nWe will enhance your SEO metrics and ranks organically and safely, using only whitehat methods, while providing monthly reports and outstanding support. \r\n \r\nPlease check our services below, we offer SEO at cheap rates. \r\nhttps://www.hilkom-digital.de/cheap-seo-packages/ \r\n \r\nStart increasing your sales and leads with us, today! \r\n \r\nregards \r\nMike King\r\n \r\nHilkom Digital Team \r\nsupport@hilkom-digital.de',0,'2021-05-10 23:32:25','2021-05-10 23:32:25'),(4,'Mike Taft','see-email-in-message@monkeydigital.co','88345357322','Increase Domain Strength for roarnigeriahub.com','Hi there \r\n \r\nDo you want a quick boost in ranks and sales for your roarnigeriahub.com website? \r\nHaving a high DA score, always helps \r\n \r\nGet your roarnigeriahub.com to have a DA between 50 to 60 points in Moz with us today and rip the benefits of such a great feat. \r\n \r\nSee our offers here: \r\nhttps://www.monkeydigital.co/product/moz-da50-seo-plan/ \r\n \r\nNEW: \r\nhttps://www.monkeydigital.co/product/ahrefs-DR50-UR70/ \r\n \r\n \r\nthank you \r\nMike Taft\r\n \r\nsupport@monkeydigital.co',0,'2021-05-11 12:39:24','2021-05-11 12:39:24'),(5,'Yahoo','press@yahoo.com','85824956944','Most profitable cryptocurrency miners released','Most profitable cryptocurrency miners has been released : \r\nDBT Miner: $7,500 (Bitcoin), $13,000 (Litecoin), $13,000 (Ethereum), and $15,000 (Monero) \r\n \r\nGBT Miner: $22,500 (Bitcoin), $39,000 (Litecoin), $37,000 (Ethereum), and $45,000 (Monero) \r\nRead more here : \r\nhttps://www.yahoo.com/now/bitwats-release-most-profitable-asic-195600764.html',0,'2021-05-11 13:21:16','2021-05-11 13:21:16'),(6,'Mike Parson','no-replyrag@gmail.com','81945991469','Local SEO for more business','Good Day \r\n \r\nI have just took a look on your SEO for  roarnigeriahub.com for  the current Local search visibility and seen that your website could use a push. \r\n \r\nWe will enhance your Local Ranks organically and safely, using only whitehat methods, while providing Google maps and website offsite work at the same time. \r\n \r\nPlease check our services below, we offer SEO at cheap rates. \r\nhttps://speed-seo.net/product/local-seo-package/ \r\n \r\nStart improving your local visibility with us, today! \r\n \r\nregards \r\nMike Parson\r\n \r\nSpeed SEO Digital Agency \r\nsupport@speed-seo.net',0,'2021-05-12 05:55:35','2021-05-12 05:55:35'),(7,'Mazlan Selvi','no-replykt@gmail.com','83226157495','Please I need your urgent response','Dear Friend, \r\n \r\nMy names are Mr. Mezlan Selvi, a lawyer base in Kuala Lumpur - Malaysia. I have previously sent you an email regarding a transaction of US$13.5 Million left behind by my late client before his tragic death but no response from you. \r\n \r\nHowever, I am contacting you once again with strong believe that you will work /partner with me to execute this business transaction in good faith. Please if you are interested in proceeding with me, kindly respond to me via my private email mselvi@ponnusamylawassociates-my.com for more detailed information. \r\n \r\nAs a matter of fact, this transaction is 100% risk free and I look forward to your acknowledgement. \r\n \r\nRegards, \r\nMr. Mazlan Selvi \r\nEmail: mselvi@ponnusamylawassociates-my.com',0,'2021-05-12 22:08:49','2021-05-12 22:08:49'),(8,'Mike Brickman','no-replyrag@gmail.com','84129673262','Local SEO for more business','Hi \r\n \r\nI have just took an in depth look on your  roarnigeriahub.com for the Local ranking keywords and seen that your website could use a push. \r\n \r\nWe will enhance your Local Ranks organically and safely, using only whitehat methods, while providing Google maps and website offsite work at the same time. \r\n \r\nPlease check our services below, we offer SEO at cheap rates. \r\nhttps://speed-seo.net/product/local-seo-package/ \r\n \r\nStart increasing your local visibility with us, today! \r\n \r\nregards \r\nMike Brickman\r\n \r\nSpeed SEO Digital Agency \r\nsupport@speed-seo.net',0,'2021-05-18 00:58:39','2021-05-18 00:58:39'),(9,'Sambo Dasuki','mmzxxz288@gmail.com','89863189796','Business Partner','Dear Partner; \r\n \r\nI came across your email contact on Database; Where i was searching for a competent Partner who can handle a lucrative business for me as trustee and manager. I anticipate to read from you soon so I can provide you with more details. \r\n \r\nYours Sincerely, \r\nAlh. Sambo Dasuki \r\nmmzxxz288@gmail.com',0,'2021-05-19 11:51:24','2021-05-19 11:51:24'),(10,'Eric Jones','eric.jones.z.mail@gmail.com','555-555-1212','Strike when the iron’s hot','Hey there, I just found your site, quick question…\r\n\r\nMy name’s Eric, I found roarnigeriahub.com after doing a quick search – you showed up near the top of the rankings, so whatever you’re doing for SEO, looks like it’s working well.\r\n\r\nSo here’s my question – what happens AFTER someone lands on your site?  Anything?\r\n\r\nResearch tells us at least 70% of the people who find your site, after a quick once-over, they disappear… forever.\r\n\r\nThat means that all the work and effort you put into getting them to show up, goes down the tubes.\r\n\r\nWhy would you want all that good work – and the great site you’ve built – go to waste?\r\n\r\nBecause the odds are they’ll just skip over calling or even grabbing their phone, leaving you high and dry.\r\n\r\nBut here’s a thought… what if you could make it super-simple for someone to raise their hand, say, “okay, let’s talk” without requiring them to even pull their cell phone from their pocket?\r\n  \r\nYou can – thanks to revolutionary new software that can literally make that first call happen NOW.\r\n\r\nTalk With Web Visitor is a software widget that sits on your site, ready and waiting to capture any visitor’s Name, Email address and Phone Number.  It lets you know IMMEDIATELY – so that you can talk to that lead while they’re still there at your site.\r\n  \r\nYou know, strike when the iron’s hot!\r\n\r\nCLICK HERE https://talkwithwebvisitors.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nWhen targeting leads, you HAVE to act fast – the difference between contacting someone within 5 minutes versus 30 minutes later is huge – like 100 times better!\r\n\r\nThat’s why you should check out our new SMS Text With Lead feature as well… once you’ve captured the phone number of the website visitor, you can automatically kick off a text message (SMS) conversation with them. \r\n \r\nImagine how powerful this could be – even if they don’t take you up on your offer immediately, you can stay in touch with them using text messages to make new offers, provide links to great content, and build your credibility.\r\n\r\nJust this alone could be a game changer to make your website even more effective.\r\n\r\nStrike when  the iron’s hot!\r\n\r\nCLICK HERE https://talkwithwebvisitors.com to learn more about everything Talk With Web Visitor can do for your business – you’ll be amazed.\r\n\r\nThanks and keep up the great work!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – you could be converting up to 100x more leads immediately!   \r\nIt even includes International Long Distance Calling. \r\nStop wasting money chasing eyeballs that don’t turn into paying customers. \r\nCLICK HERE https://talkwithwebvisitors.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitors.com/unsubscribe.aspx?d=roarnigeriahub.com',0,'2021-05-21 17:22:23','2021-05-21 17:22:23'),(11,'Jamesadole','no-replyCex@gmail.com','85168355421','A new method of email distribution.','Good day!  roarnigeriahub.com \r\n \r\nDo you know the easiest way to state your product or services? Sending messages using feedback forms will permit you to easily enter the markets of any country (full geographical coverage for all countries of the world).  The advantage of such a mailing  is that the emails that will be sent through it\'ll end up in the mailbox that is meant for such messages. Sending messages using Contact forms is not blocked by mail systems, which suggests it is sure to reach the client. You\'ll be able to send your provide to potential customers who were previously unprocurable due to spam filters. \r\nWe offer you to test our service without charge. We\'ll send up to 50,000 message for you. \r\nThe cost of sending one million messages is us $ 49. \r\n \r\nThis letter is created automatically. Please use the contact details below to contact us. \r\n \r\nContact us. \r\nTelegram - @FeedbackMessages \r\nSkype  live:contactform_18 \r\nWhatsApp - +375259112693 \r\nWe only use chat.',0,'2021-05-22 07:44:58','2021-05-22 07:44:58'),(12,'Basil Njoku','wideopen@openarmsoutreachorganization.com','82358969336','Financial support for our mission!','We at Open Arms Outreach Organization are proud to tell you of our recent work to provide help to local communities in Africa. \r\nOur mission is to extend the hand of compassion through charity to those in African Nations. We are working tirelessly to fulfill this. \r\nThe following are the things we do: \r\n \r\n1) We provide boreholes for clean drinking water and providing power generators. \r\n2) We partner with local professionals to train them on different skills. \r\n3) We partner with local medical practitioners to provide medical treatment. \r\n4) We provide scholarship to children. \r\n5) WIDOWS are actually at-risk in this part of world, you will help in providing skills and self reliant to start earning something. \r\n \r\nYour support will help us carry out our mission of saving and improving lives. \r\nOur past campaign enabled us provide water. Skills and medical \r\nThis later part of the year, we hope to reach some other  communities left behind especially WIDOWS. \r\nPlease visit us online to learn more about what we do and how you can help, you can put smile on the faces of someone. \r\nAs a nonprofit organization, we rely on the support of people like you. Our personal efforts are not enough. \r\nWe need your help as donors and volunteers. Please visit: http://www.openarmsoutreachorganization.com/ \r\nBasil Njoku, \r\nChairman, board of trustees of Open Arms Outreach Organization',0,'2021-05-22 12:00:09','2021-05-22 12:00:09'),(13,'Mike Arthurs','no-reply@google.com','88169113859','quality monthly SEO plans','Hi there \r\n \r\nI have just took a look on your SEO for  roarnigeriahub.com for  the current search visibility and saw that your website could use an upgrade. \r\n \r\nWe will improve your SEO metrics and ranks organically and safely, using only whitehat methods, while providing monthly reports and outstanding support. \r\n \r\nPlease check our services below, we offer SEO at cheap rates. \r\nhttps://www.hilkom-digital.de/cheap-seo-packages/ \r\n \r\nStart increasing your sales and leads with us, today! \r\n \r\nregards \r\nMike Arthurs\r\n \r\nHilkom Digital Team \r\nsupport@hilkom-digital.de',0,'2021-05-24 19:52:41','2021-05-24 19:52:41'),(14,'Rajiv Michael','rajiindian3@gmail.com','83658571462','Do you need funding?','Hello Dear, \r\n \r\nI am working directly with a private family portfolio that can provide funding for credible clients with feasible projects. Currently, we have investment funds for viable projects. \r\n \r\nThey are interested in the following: Institution, Library, Hospitals, Green energy, \r\nPower projects, Agriculture and Real Estate. They can also partner with your company on other projects of value. The interest rate and tenure are fantastic. \r\n \r\nYour response is most anticipated if this is of interest to you. Reach me on email: financial@eurocleargroups.email or rajiindian3@gmail.com \r\n \r\n \r\nKind regards, \r\n \r\nRajiv Michael \r\nFinancial Consultant \r\nWhatsApp: +15183802182 \r\nTelegram@ +12092482370 \r\nEuroclear Groups \r\nfinancial@eurocleargroups.email \r\nUrl: http://euroclear.com',0,'2021-05-25 20:43:33','2021-05-25 20:43:33'),(15,'Ngwu Amos Chibuikem','amoschibuikeisgreat@gmail.com','08130161689','Science park Support, Intervention, Follow-up and mentorship','I am into internet marketing, and communication tools and  and other internet technologies- web building, graphics, foreign exchange, content creations, social Media/global communication technologies and  marketing, affiliate marketing, etc\r\nIneed science park for support, intervention, sponsorship and advertisement.',0,'2021-05-28 13:12:10','2021-05-28 13:12:10'),(16,'Ngwu Amos Chibuikem','amoschibuikeisgreat@gmail.com','08130161689','Science park Support, Intervention, Follow-up and mentorship','I am into internet marketing, and communication tools and  and other internet technologies- web building, graphics, foreign exchange, content creations, social Media/global communication technologies and  marketing, affiliate marketing, etc\r\nIneed science park for support, intervention, sponsorship and advertisement.',0,'2021-05-28 13:13:47','2021-05-28 13:13:47'),(17,'Ngwu Amos Chibuikem','amoschibuikeisgreat@gmail.com','08130161689','Science park Support, Intervention, Follow-up and mentorship','I am into internet marketing, and communication tools and  and other internet technologies- web building, graphics, foreign exchange, content creations, social Media/global communication technologies and  marketing, affiliate marketing, etc\r\nIneed science park for support, intervention, sponsorship and advertisement.',0,'2021-05-28 13:14:08','2021-05-28 13:14:08'),(18,'Charlie','charliecool1000@gmail.com','08121857281','More information about roar hub','Roar hub as explained in this site is to offer support for technology enabled startups, researchers, entrepreneurs and SME’s. But how is this support to take place, what type of support or in what form, our gain from this hub? I\'d like answers to these questions to enable my team and I participate with this program',0,'2021-05-31 18:31:32','2021-05-31 18:31:32'),(19,'Charles','charlesonah023@gmail.com','0905 099 6837','Question on roarhub','How does roarhub function?',0,'2021-05-31 18:34:49','2021-05-31 18:34:49'),(20,'Mike Faber','no-replykt@gmail.com','88316687658','SEO Metrics Boost','Hi there \r\n \r\nIncrease your roarnigeriahub.com SEO metrics values with us and get more visibility and exposure for your website. \r\n \r\nMore info: \r\nhttps://www.monkeydigital.org/product/moz-da50-seo-plan/ \r\n \r\nNEW: \r\nhttps://www.monkeydigital.org/product/ahrefs-dr50-ur70-seo-plan/ \r\nhttps://www.monkeydigital.org/product/trust-flow-seo-package/ \r\n \r\n \r\nthank you \r\nMike Faber',0,'2021-06-07 23:28:50','2021-06-07 23:28:50'),(21,'Ashlay Hazalton','ashlayhazalton36145@gmail.com','86843755225','How to win casino by free bonus','Hi, this is Chris. \r\nWho win all online casinos by using FREE BONUS. \r\n \r\nWitch mean, I don’t really spend money in online casinos. \r\n \r\nBut I win every time, and actually, everybody can win by following my directions. \r\n \r\neven you can win! \r\n \r\nSo, if you’re the person, who can listen to someone really smart, you should just try!! \r\n \r\nThe best online casino, that I really recommend is, Vera&John. \r\nEstablished in 2010 and became best online casino in the world. \r\n \r\nThey give you free bonus when you charge more than $50. \r\nIf you charge $50, your bonus is going to be $50. \r\n \r\nIf you charge $500, you get $500 Free bonus. \r\nYou can bet up to $1000. \r\n \r\nJust try roulette, poker, black jack…any games with dealers. \r\nBecause dealers always have to make some to win and, only thing you need to do is to be chosen. \r\n \r\nDon’t ever spend your bonus at slot machines. \r\nYOU’RE GONNA LOSE YOUR MONEY!! \r\n \r\nNext time, I will let you know how to win in online casino against dealers!! \r\n \r\nDon’t forget to open your VERA&JOHN account, otherwise you’re gonna miss even more chances!! \r\n \r\n \r\n \r\nOpen Vera&John account (free) \r\nhttps://bit.ly/3wZkpco',0,'2021-06-11 07:54:32','2021-06-11 07:54:32'),(22,'Eric Jones','eric.jones.z.mail@gmail.com','555-555-1212','Strike when the iron’s hot','Hey there, I just found your site, quick question…\r\n\r\nMy name’s Eric, I found roarnigeriahub.com after doing a quick search – you showed up near the top of the rankings, so whatever you’re doing for SEO, looks like it’s working well.\r\n\r\nSo here’s my question – what happens AFTER someone lands on your site?  Anything?\r\n\r\nResearch tells us at least 70% of the people who find your site, after a quick once-over, they disappear… forever.\r\n\r\nThat means that all the work and effort you put into getting them to show up, goes down the tubes.\r\n\r\nWhy would you want all that good work – and the great site you’ve built – go to waste?\r\n\r\nBecause the odds are they’ll just skip over calling or even grabbing their phone, leaving you high and dry.\r\n\r\nBut here’s a thought… what if you could make it super-simple for someone to raise their hand, say, “okay, let’s talk” without requiring them to even pull their cell phone from their pocket?\r\n  \r\nYou can – thanks to revolutionary new software that can literally make that first call happen NOW.\r\n\r\nTalk With Web Visitor is a software widget that sits on your site, ready and waiting to capture any visitor’s Name, Email address and Phone Number.  It lets you know IMMEDIATELY – so that you can talk to that lead while they’re still there at your site.\r\n  \r\nYou know, strike when the iron’s hot!\r\n\r\nCLICK HERE https://talkwithwebvisitors.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nWhen targeting leads, you HAVE to act fast – the difference between contacting someone within 5 minutes versus 30 minutes later is huge – like 100 times better!\r\n\r\nThat’s why you should check out our new SMS Text With Lead feature as well… once you’ve captured the phone number of the website visitor, you can automatically kick off a text message (SMS) conversation with them. \r\n \r\nImagine how powerful this could be – even if they don’t take you up on your offer immediately, you can stay in touch with them using text messages to make new offers, provide links to great content, and build your credibility.\r\n\r\nJust this alone could be a game changer to make your website even more effective.\r\n\r\nStrike when  the iron’s hot!\r\n\r\nCLICK HERE https://talkwithwebvisitors.com to learn more about everything Talk With Web Visitor can do for your business – you’ll be amazed.\r\n\r\nThanks and keep up the great work!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – you could be converting up to 100x more leads immediately!   \r\nIt even includes International Long Distance Calling. \r\nStop wasting money chasing eyeballs that don’t turn into paying customers. \r\nCLICK HERE https://talkwithwebvisitors.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitors.com/unsubscribe.aspx?d=roarnigeriahub.com',0,'2021-06-18 18:17:19','2021-06-18 18:17:19'),(23,'Mike Keat','no-replyrag@gmail.com','84179994731','Local SEO for more business','Howdy \r\n \r\nWe will improve your Local Ranks organically and safely, using only whitehat methods, while providing Google maps and website offsite work at the same time. \r\n \r\nPlease check our plans here, we offer Local SEO at cheap rates. \r\nhttps://speed-seo.net/product/local-seo-package/ \r\n \r\nNEW: \r\nhttps://www.speed-seo.net/product/zip-codes-gmaps-citations/ \r\n \r\nregards \r\nMike Keat\r\n \r\nSpeed SEO Digital Agency',0,'2021-06-20 02:05:04','2021-06-20 02:05:04'),(24,'Jamesadole','no-replyCex@gmail.com','84423171245','The best advertising of your products and services!','Good day!  roarnigeriahub.com \r\n \r\nDo you know the best way to talk about your merchandise or services? Sending messages through contact forms will permit you to easily enter the markets of any country (full geographical coverage for all countries of the world).  The advantage of such a mailing  is that the emails that will be sent through it\'ll find yourself within the mailbox that\'s intended for such messages. Sending messages using Contact forms isn\'t blocked by mail systems, which means it is guaranteed to reach the client. You may be ready to send your provide to potential customers who were antecedently unavailable because of spam filters. \r\nWe offer you to check our service without charge. We\'ll send up to fifty thousand message for you. \r\nThe cost of sending one million messages is us $ 49. \r\n \r\nThis offer is created automatically. Please use the contact details below to contact us. \r\n \r\nContact us. \r\nTelegram - @FeedbackMessages \r\nSkype  live:contactform_18 \r\nWhatsApp - +375259112693 \r\nWe only use chat.',0,'2021-06-23 09:48:06','2021-06-23 09:48:06'),(25,'Tom Martino','baasiminvestment@gmail.com','85371453529','DO YOU NEED A BUSINESS INVESTOR?','We have business partners who are willing to invest any amount into your business. \r\nFor more information contact: info@baasim.com',0,'2021-06-24 14:52:02','2021-06-24 14:52:02'),(26,'Mike Brooks','no-reply@google.com','82626244823','quality monthly SEO plans','Hi \r\n \r\nI have just took an in depth look on your  roarnigeriahub.com for  the current search visibility and saw that your website could use an upgrade. \r\n \r\nWe will increase your SEO metrics and ranks organically and safely, using only whitehat methods, while providing monthly reports and outstanding support. \r\n \r\nPlease check our services below, we offer SEO at cheap rates. \r\nhttps://www.hilkom-digital.de/cheap-seo-packages/ \r\n \r\nStart increasing your sales and leads with us, today! \r\n \r\nregards \r\nMike Brooks\r\n \r\nHilkom Digital Team \r\nsupport@hilkom-digital.de',0,'2021-06-25 04:00:31','2021-06-25 04:00:31'),(27,'Yasuhiro Yamada','info.rohtopharmaceutical@gmail.com','89736159238','Representative Request','Hello, \r\n \r\n \r\nWith all due respect. I write to inform you that we need you to serve as our Spokesperson/Financial Coordinator for our company ROHTO PHARMACEUTICAL CO., LTD. and its clients in the United States and Canada. It\'s a part-time job and will only take few minutes of your time daily and it will not bring any conflict of interest in case you are working with another company. If interested reply me using this email address: admin@rohtopharmaceutical.jp \r\n \r\n \r\nYasuhiro Yamada \r\nSenior Executive Officer, \r\nROHTO Pharmaceutical Co.,Ltd. \r\n1-8-1 Tatsumi-nishi, \r\nIkuno-Ku, Osaka, 544-8666, \r\nJapan.',1,'2021-06-27 15:03:20','2021-07-07 14:11:27'),(28,'SEO X Press Digital Agency','mablepaulding032@gmail.com','82847532415','Ultimate SEO Solutions for roarnigeriahub.com','Hello \r\n \r\n \r\nI have just took an in depth look on your  roarnigeriahub.com for its SEO Trend and saw that your website could use a push. \r\n \r\n \r\nWe will improve your Ranks organically and safely, using only whitehat methods, \r\n \r\n \r\nIf interested, please email us \r\n \r\nsupport@digital-x-press.com \r\n \r\n \r\nregards \r\nMike Gardner\r\n \r\nSEO X Press Digital Agency \r\nhttps://www.digital-x-press.com',0,'2021-07-08 06:04:55','2021-07-08 06:04:55'),(29,'Mike Otis','corradolan32@gmail.com','87439848179','Increase sales for roarnigeriahub.com','Hi there \r\n \r\nDo you want a quick boost in ranks and sales for your roarnigeriahub.com website? \r\nHaving a high DA score, always helps \r\n \r\nGet your roarnigeriahub.com to have a DA between 50 to 60 points in Moz with us today and rip the benefits of such a great feat. \r\n \r\nSee our offers here: \r\nhttps://www.monkeydigital.co/product/moz-da50-seo-plan/ \r\n \r\nNEW: \r\nhttps://www.monkeydigital.co/product/ahrefs-dr60/ \r\n \r\n \r\nthank you \r\nMike Otis\r\n \r\nsupport@monkeydigital.co',0,'2021-07-10 04:38:02','2021-07-10 04:38:02'),(30,'Nick Wilson','nick@saaytext.com','86549667363','Not sure who to contact','Hi Its Nick, \r\n \r\nWe have a business texting platform that will help your team engage customers, leads & past clients through texting. \r\n \r\nRates are $49 for 30,000 texts, which is under 0.002 per message. \r\n \r\nYou can bulk text your WHOLE LIST or send two-way texts and get replies. \r\n \r\n \r\nCheck it out @ http://SaayText.com \r\n \r\nThank you, \r\nNick',0,'2021-07-15 17:51:48','2021-07-15 17:51:48'),(31,'Mike Brooks','camimag32@gmail.com','82833193294','Local SEO for more business','Howdy \r\n \r\nWe will enhance your Local Ranks organically and safely, using only whitehat methods, while providing Google maps and website offsite work at the same time. \r\n \r\nPlease check our services below, we offer Local SEO at cheap rates. \r\nhttps://speed-seo.net/product/local-seo-package/ \r\n \r\nNEW: \r\nhttps://www.speed-seo.net/product/zip-codes-gmaps-citations/ \r\n \r\nregards \r\nMike Brooks\r\n \r\nSpeed SEO Digital Agency',0,'2021-07-17 09:57:40','2021-07-17 09:57:40'),(32,'Jamie Benson','ten.fast@outlook.com','555-555-5555','The Magic of 10,000 Instagram Followers','Hi there,\r\n\r\nDo you know the magic of 10K Instagram followers?\r\n\r\nA 10k follower count on Instagram isn’t just an awareness metric. \r\nThe milestone comes with an immediate, tangible benefit. \r\n\r\nOnce you have 10k followers, Instagram will make it easier for you to get people\r\nto your website via Stories with the swipe up to link feature.\r\n\r\nSwipe up is the only way to get a direct link from your Instagram to your other web properties. \r\nAnd, it’s available in STORIES, if you have 10k followers.\r\n\r\nThe swipeable link in stories lets you send people to your blog, your ecommerce page, or your email signup list, \r\nwithout requiring the visitor to click to your bio first. The feature alone is a game changer!\r\n\r\nTestimonial:\r\n“Before this, Instagram rarely showed up as a traffic source for my shop or blog. \r\nSince that feature was added, I’m able to get more traffic to my websites directly from IG.”\r\n\r\nTo order and see all other packages please go to https://social-media-blast.com\r\n\r\nBest regards,\r\nJamie \r\nSMB',0,'2021-07-20 14:29:35','2021-07-20 14:29:35'),(33,'Mike Day','joaniecm32@gmail.com','81875112288','whitehat monthly SEO plans','Hi \r\n \r\nI have just checked  roarnigeriahub.com for  the current search visibility and saw that your website could use a boost. \r\n \r\nWe will enhance your SEO metrics and ranks organically and safely, using only whitehat methods, while providing monthly reports and outstanding support. \r\n \r\nPlease check our pricelist here, we offer SEO at cheap rates. \r\nhttps://www.hilkom-digital.de/cheap-seo-packages/ \r\n \r\nStart improving your sales and leads with us, today! \r\n \r\nregards \r\nMike Day\r\n \r\nHilkom Digital Team \r\nsupport@hilkom-digital.de',0,'2021-07-24 03:43:05','2021-07-24 03:43:05'),(34,'SEO X Press Digital Agency','abelsolis7162@gmail.com','88312942829','Ultimate SEO Solutions for roarnigeriahub.com','Good Day \r\n \r\n \r\nI have just took a look on your SEO for  roarnigeriahub.com for its SEO Trend and saw that your website could use a boost. \r\n \r\n \r\nWe will enhance your Ranks organically and safely, using only whitehat methods, \r\n \r\n \r\nIf interested, please email us \r\n \r\nsupport@digital-x-press.com \r\n \r\n \r\nregards \r\nMike Lawman\r\n \r\nSEO X Press Digital Agency \r\nhttps://www.digital-x-press.com',0,'2021-08-05 10:46:49','2021-08-05 10:46:49'),(35,'Mike Miller','tylerfong7162@gmail.com','83774864845','Get DA50+ for roarnigeriahub.com','Good Day \r\n \r\nI have just analyzed  roarnigeriahub.com  Moz DA Score and saw that its pretty weak. \r\n \r\nTop Benefits of Domain authority: \r\n \r\n1. You will get increased SERP position. \r\n2. You will attract guest posts and comments. \r\n3. Attract advertisers on a large scale. \r\n4. You will be able to attract sponsored posts. \r\n5. There will be increase in the affiliate sales. \r\n \r\nIncrease your roarnigeriahub.com Moz DA Score with us and get more visibility and exposure for your website. \r\n \r\nMore info: \r\nhttps://www.monkeydigital.org/product/moz-da-seo-plan/ \r\n \r\nNEW: \r\nhttps://www.monkeydigital.org/product/ahrefs-dr50-ur70-seo-plan/ \r\n \r\nthank you \r\nMike Miller',0,'2021-08-07 02:13:35','2021-08-07 02:13:35'),(36,'Mike Bargeman','abelsolis7162@gmail.com','85723944443','Local SEO for more business','Greetings \r\n \r\nWe will improve your Local Ranks organically and safely, using only whitehat methods, while providing Google maps and website offsite work at the same time. \r\n \r\nPlease check our plans here, we offer Local SEO at cheap rates. \r\nhttps://speed-seo.net/product/local-seo-package/ \r\n \r\nNEW: \r\nhttps://www.speed-seo.net/product/zip-codes-gmaps-citations/ \r\n \r\nregards \r\nMike Bargeman\r\n \r\nSpeed SEO Digital Agency',0,'2021-08-09 08:44:54','2021-08-09 08:44:54'),(37,'Adam Jensen','adam789bright@gmail.com','88166356475','Get more Facebook likes','Need Facebook likes or Instagram followers? \r\nWe can help you. For more info please visit https://1000-likes.com',0,'2021-08-12 05:58:41','2021-08-12 05:58:41'),(38,'Mike MacDonald','miltonbarrientes7162@gmail.com','87288214851','whitehat monthly SEO plans','Howdy \r\n \r\nI have just checked  roarnigeriahub.com for  the current search visibility and saw that your website could use a push. \r\n \r\nWe will enhance your SEO metrics and ranks organically and safely, using only whitehat methods, while providing monthly reports and outstanding support. \r\n \r\nPlease check our services below, we offer SEO at cheap rates. \r\nhttps://www.hilkom-digital.de/cheap-seo-packages/ \r\n \r\nStart increasing your sales and leads with us, today! \r\n \r\nregards \r\nMike MacDonald\r\n \r\nHilkom Digital Team \r\nsupport@hilkom-digital.de',0,'2021-08-20 01:51:18','2021-08-20 01:51:18'),(39,'Eric Jones','eric.jones.z.mail@gmail.com','555-555-1212','Strike when the iron’s hot','Hey there, I just found your site, quick question…\r\n\r\nMy name’s Eric, I found roarnigeriahub.com after doing a quick search – you showed up near the top of the rankings, so whatever you’re doing for SEO, looks like it’s working well.\r\n\r\nSo here’s my question – what happens AFTER someone lands on your site?  Anything?\r\n\r\nResearch tells us at least 70% of the people who find your site, after a quick once-over, they disappear… forever.\r\n\r\nThat means that all the work and effort you put into getting them to show up, goes down the tubes.\r\n\r\nWhy would you want all that good work – and the great site you’ve built – go to waste?\r\n\r\nBecause the odds are they’ll just skip over calling or even grabbing their phone, leaving you high and dry.\r\n\r\nBut here’s a thought… what if you could make it super-simple for someone to raise their hand, say, “okay, let’s talk” without requiring them to even pull their cell phone from their pocket?\r\n  \r\nYou can – thanks to revolutionary new software that can literally make that first call happen NOW.\r\n\r\nTalk With Web Visitor is a software widget that sits on your site, ready and waiting to capture any visitor’s Name, Email address and Phone Number.  It lets you know IMMEDIATELY – so that you can talk to that lead while they’re still there at your site.\r\n  \r\nYou know, strike when the iron’s hot!\r\n\r\nCLICK HERE https://talkwithwebvisitors.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nWhen targeting leads, you HAVE to act fast – the difference between contacting someone within 5 minutes versus 30 minutes later is huge – like 100 times better!\r\n\r\nThat’s why you should check out our new SMS Text With Lead feature as well… once you’ve captured the phone number of the website visitor, you can automatically kick off a text message (SMS) conversation with them. \r\n \r\nImagine how powerful this could be – even if they don’t take you up on your offer immediately, you can stay in touch with them using text messages to make new offers, provide links to great content, and build your credibility.\r\n\r\nJust this alone could be a game changer to make your website even more effective.\r\n\r\nStrike when  the iron’s hot!\r\n\r\nCLICK HERE https://talkwithwebvisitors.com to learn more about everything Talk With Web Visitor can do for your business – you’ll be amazed.\r\n\r\nThanks and keep up the great work!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – you could be converting up to 100x more leads immediately!   \r\nIt even includes International Long Distance Calling. \r\nStop wasting money chasing eyeballs that don’t turn into paying customers. \r\nCLICK HERE https://talkwithwebvisitors.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitors.com/unsubscribe.aspx?d=roarnigeriahub.com',0,'2021-08-20 21:09:10','2021-08-20 21:09:10'),(40,'Gabriel Angelo','gafinan.cier@gmail.com','89237828591','Project/Business financing','Dear Entrepreneur, \r\n \r\nI\'m Gabriel Angelo, My company can bridge funds for your new or ongoing business. do let me know when you receive this message for further procedure. \r\n \r\nWe also pay 1% commission to brokers and friends who introduce project owners for finance or other opportunities. \r\n \r\nYou can reach me directly using this email address: gabriel_angelo@nestalconsultants.com \r\n \r\nRegards, \r\nGabriel Angelo',0,'2021-08-28 18:46:23','2021-08-28 18:46:23');
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `events` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galleries`
--

DROP TABLE IF EXISTS `galleries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `galleries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `event_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `galleries_event_id_foreign` (`event_id`),
  CONSTRAINT `galleries_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galleries`
--

LOCK TABLES `galleries` WRITE;
/*!40000 ALTER TABLE `galleries` DISABLE KEYS */;
/*!40000 ALTER TABLE `galleries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `incubations`
--

DROP TABLE IF EXISTS `incubations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `incubations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idea_duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `motivation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medium_aware` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `problem` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fav_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fav_subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biz_experience` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aspect_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `incubations_aspect_id_foreign` (`aspect_id`),
  CONSTRAINT `incubations_aspect_id_foreign` FOREIGN KEY (`aspect_id`) REFERENCES `aspects` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `incubations`
--

LOCK TABLES `incubations` WRITE;
/*!40000 ALTER TABLE `incubations` DISABLE KEYS */;
INSERT INTO `incubations` VALUES (3,'Lionshare','maduafamdaniel@gmail.com','123','4','Test','friend','Test','software','1234','Black','Yeah yeah','Math','Test',1,'2021-04-29 07:48:22','2021-04-29 07:48:22'),(4,'Samantha','Test','66509','Test','Test','social media','Test','non software','58','Test','Test','Test','Test',10,'2021-04-29 07:52:59','2021-04-29 07:52:59'),(5,'Diamond','weed@email.com','09038821990','20 years','weed','social media','i dont know','both','24','Blue','Mechanical engineering','Mathematics','i don sell weed before',11,'2021-04-29 11:55:14','2021-04-29 11:55:14'),(6,'Mazi','mazicross@gmail.com','08032127173','2years','To improve health care system','friend','Health','software','25','Blue','Mass communication','English','It\'s been good so far just in need of funding to be in the market',2,'2021-04-29 14:32:44','2021-04-29 14:32:44'),(7,'The test','maduafamdaniel@gmail.com','080','Test','Test','social media','Test','software','80','Te at','Test','Ye st','Test',2,'2021-04-29 16:53:17','2021-04-29 16:53:17'),(8,'OBTECH AUTOMATION','simeon.clinton.249299@unn.edu.ng','07062983162','Four (4) years','The comfort and easy or stress-free living we offer to people is our key motivation','friend','The problem of Stress and Inconveniences people face on daily basis for to do almost everything by themselves which results into lost of time and energy','both','23','Blue','COMPUTER Science','Basic Programming','True customers satisfaction from great products is what brings about the speedy growth of a company',12,'2021-05-04 23:09:00','2021-05-04 23:09:00'),(9,'TOS tv (the other side)','ezechiderajacinta@gmail.com','08120090562','Two months','At first it was majorly to create a practicing avenue for the mass communication student who unfortunately are faced with basically only theories but now it more.  The desire has grown beyond that to wanting to create a standard TV station','social media','Giving out the acurrate information and reducing to a certain degree the case of unemployment on our country','both','21','White','Mass communication','Literature','Its not been easy but we are you doing it. One step lead\'s to the other and we are still pushing',1,'2021-05-05 08:48:36','2021-05-05 08:48:36'),(10,'Mivedia','Info.darlinx@gmail.com','08169571146','3 months, Site up and almost done.','The desire, to one day, purchase goods and services effortlessly from any where in the world.','friend','The need for a seamless global marketplace, has become inevitable, one not restricted by Fiat currencies, slower delivery, etc, these we intend to address, using modern blockchain technologies.','both','19','Red','Mechanical Engineering','Physics','Do not have a business experience, from working in the industry previously, but little experiences as a client. So I understand what is needed for a better user experience.',9,'2021-05-06 01:04:37','2021-05-06 01:04:37'),(11,'Switch','ichristwin@gmail.com','08081147003','10 months','A 3 month blackout during one of my code sprints','friend','Switch is connecting homes and businesses to reliable and affordable solar powered electricity','both','22','Green','Food Science and Technology','physics','two-time Startup founder',12,'2021-05-06 04:23:00','2021-05-06 04:23:00'),(12,'Uzu Uchechukwu Joseph','uchechukwu.uzu@unn.edu.ng','07011862236','2 1/2 yrs','My motivation towards start-up is for skill acquisition and profit making benefits.','advert','I\'m trying to provide solutions on how best to troubleshoots motherboard for business growth, and the approaches used were to trace power supply fault,RAM state, CPU heat sink state for absolute performances, peripheral slots and check for compatibility.','both','32','Red','B.engr.','mathematics','I\'m into KEKE N\' PEPE balance and take business',1,'2021-05-06 13:58:49','2021-05-06 13:58:49'),(13,'Uzu Uchechukwu Joseph','uchechukwu.uzu@unn.edu.ng','07011862236','2 1/2 yrs','My motivation towards start-up is for skill acquisition and profit making benefits.','advert','I\'m trying to provide solutions on how best to troubleshoots motherboard for business growth, and the approaches used were to trace power supply fault,RAM state, CPU heat sink state for absolute performances, peripheral slots and check for compatibility.','both','32','Red','B.engr.','mathematics','I\'m into KEKE N\' PEPE balance and take business',1,'2021-05-06 14:04:30','2021-05-06 14:04:30'),(14,'Fiber','emma1obiechina@gmail.com','09065018777','2 weeks','I do love songs and sometimes I hear an awesome song playing in my environment but I find it hard to get the song. My motivation is to solve this problem for me and every other person like me in my society','friend','Creating a stress-free way to quickly find songs playing in your environment and quickly download them for free','software','21','None','Electronic engineering','Mathematics','So far none',12,'2021-05-16 13:14:50','2021-05-16 13:14:50'),(15,'EnerTron','godsdelightjude2001@gmail.com','09065787011','A year and 2 months','I want to provide a lasting solution to identification and data logging problems which I have personally experienced, I discovered a solution wasn\'t far fetched and I could attain that solution. That\'s my motivation','social media','Low attendance data logging, identification and  data management','both','19','Black','Electronics engineering','Physics','I have been in the business of marketing solar Inverters, I have taken courses in some business marketing and handling sectors.',12,'2021-05-17 11:41:18','2021-05-17 11:41:18'),(16,'Sir Kenzy','nzekwekene2@gmail.com','09068350680','I have over 5 years experience in my field','To Improve and facilitate communication efficiency among humans','social media','I help people to get immediate and verified news / update /information at their comfort zone through the internet','software','19','That was when I was child. Situations have made me not to focus more on Colour','Medical Rehabilitation','Physics','I\'m a professional blogger and I have over 5 years writing experience from many news platforms.',1,'2021-05-21 20:22:05','2021-05-21 20:22:05'),(17,'Sir Kenzy','nzekwekene2@gmail.com','09068350680','I have over 5 years experience in my field','To Improve and facilitate communication efficiency among humans','social media','I help people to get immediate and verified news / update /information at their comfort zone through the internet','software','19','That was when I was child. Situations have made me not to focus more on Colour','Medical Rehabilitation','Physics','I\'m a professional blogger and I have over 5 years writing experience from many news platforms.',1,'2021-05-21 20:22:18','2021-05-21 20:22:18'),(18,'Dressbook','samachix@gmail.com','07081458485','1 year','Clothing is a necessity that we cannot do without and also the way you dress determines how you would be addressed. So, as the need for good clothing rises, the need to dress right also rises.','advert','Dressbook eliminates the worries of not knowing the right dress or cloth to put on for various occasions by providing an e-commerce solution which categorizes clothing to very sub-units of occasions and by this she also aims to tackle indecent dressing.','both','17','Blue, Orange and Green','Human Physiology','Physics, Computer and Mathematics','I worked as Co-manager in Exborne Computer Services located No. 379 Rumuagholu Road, Port Harcourt, Rivers state',9,'2021-05-22 13:26:44','2021-05-22 13:26:44'),(19,'Intelligent traffi light system','onugospel@yahoo.com','09037929641','One month','Nigerian traffic light system','advert','To develop a traffic light system that could capture the pictures of defaulters and send their image to a database which also has a density sensor.','both','19','White','Electrical Engineering','None','None',11,'2021-05-24 11:21:58','2021-05-24 11:21:58'),(20,'Inverter with finger print lock and start up','joel.onah.247270@unn.edu.ng','09030067995','During lockdown','For security reasons','advert','For protection and secured usage','non software','26','Brown','Electrical Engineering','Physics','None',4,'2021-05-24 11:36:15','2021-05-24 11:36:15'),(21,'Automatic incubator,','Sommydalu63 @gmail.com','07059865233','9 months','Lowering unnecessary high cost of chicks for poultry farmers','advert','Problem of high cost chicks due to lack and cost of facilities, and reducing the cost of running a fukky automated chicken incubator for local farmers','both','21','Oxblood or wine red','Electrical engineering','Digital electronics','Ok I reared chicks before the covid , from about January, that was my first time . The turn out was not so great but it was fine .',6,'2021-05-24 13:03:24','2021-05-24 13:03:24'),(22,'Afrikan\'s Stylez Events','ogbodomichael367@gmail.com','08064839040','Two years','I enjoy the work','friend','Showing African\'s cultural value through events decoration','non software','25','Pink','Pharmacy','Chemistry','Our customers always want there own marriage decoration to be more beautified than their friends own, giving us reason to work more on ourselves',7,'2021-05-25 10:13:51','2021-05-25 10:13:51'),(23,'Afrikan\'s Stylez Events','ogbodomichael367@gmail.com','08064839040','Two years','I enjoy the work','friend','Showing African\'s cultural value through events decoration','non software','25','Pink','Pharmacy','Chemistry','Our customers always want there own marriage decoration to be more beautified than their friends own, giving us reason to work more on ourselves',7,'2021-05-25 10:13:54','2021-05-25 10:13:54'),(24,'Stability in drug prices.','Justinojohnnet@gmail.com','07067446750','3 years now, since I entered into the tertiary level','I lost someone dear to me because the cost of the drug to be administered was high','social media','To build an industry that will checkmate increase in cost rates of drugs in the market which have killed so many in my country because they can\'t afford some drug.','both','22','Blue','Pharmacy','Chemistry','Worked part time in a pharmacy shop, there is steady increase in drug costs there.',2,'2021-05-26 07:45:11','2021-05-26 07:45:11'),(25,'Covenant Bookstores','ebukaonuorah@gmail.com','08164424779','5years','Ignorance','social media','Curb the problem of ignorance starting from the African community by providing quality resource materials that would carter for, sustain and rebuild Healthy flow of mainstream information among the African people','both','28','White','Pharmacy','Chemistry','Our current demographic area of operations is Eastern Nigeria and we have had to go on massive campaign both online and physically to provide the quality kind of resources people need for their mental health',2,'2021-05-26 08:21:09','2021-05-26 08:21:09'),(26,'Poultry','harrisonugwuoke72@gmail.com','08135324975','3years','I used #50000 to start the business and I got #120000','friend','M','software','23','White','Pharmacy','Biochemistry','Poultry is an excellent moving business that must people use to start up life',6,'2021-05-26 15:59:23','2021-05-26 15:59:23'),(27,'Pinnacle','ugolochukwudiebube@gmail.com','08100327512','We have been working on the project for 2 years','My motivation for the start up is the satisfaction of our different and varied clients','social media','We provide computer and internet service to people. We also aid academic research by guiding people through their presentations and research','both','26','Red','Pharmacy','Mathematics','It has been challenging and inspiring. We receive different requests from people daily and the work can get overwhelming due to lack of manpower',1,'2021-05-26 20:14:57','2021-05-26 20:14:57'),(28,'Michoice organics','perpetualesther440@gmail.com','08145549070','2 years now','Seeing so many ladies isolating and disguising themselves because they have skin challenges motivated me to fine solutions','friend','To restore the beauty of man especially those already tampered with some skin challenges like pimples and the likes','non software','24','Pink','Pharmacy','Clinical pharmacy','I have produced some soaps locally,people bought it,used it and were testifying but I have challenges too',2,'2021-05-27 05:47:21','2021-05-27 05:47:21'),(29,'Agro-ish','emiliaogochukwu41@gmail.com','09031988502','3 months now','Making sure that everyone gets food of ur health status','friend','Problem of food scarcity, we want to make sure that there are always varieties even when some food products are out of season','both','23','Red and pink','Pharmacy','Chemistry','Demanding, stressful',6,'2021-05-27 18:18:33','2021-05-27 18:18:33'),(30,'InvenTrack','anthony.ugwuja.244154@unn.edu.ng','09032570130','For about 6 Months','The need to cut down Out of Stock syndrome of medicents to the lowest minimum, because this can cost patient\'s life.','friend','Reducing Out of Stock/Expired medicaments to lowest minimum through automated Inventory Management.','both','24','Blue','Pharmacy','Chemistry','None',3,'2021-05-27 21:54:20','2021-05-27 21:54:20'),(31,'Smart phone graphics design','favourezugwu827@gmail.com','08126577136','I have been practicing for more than six months','I like designs','advert','I have need for a better phone to work with','software','20','Blue','RADIOGRAPHY','Biology','I am yet to venture into business because of my phone',1,'2021-05-28 12:53:51','2021-05-28 12:53:51'),(32,'Smart phone graphics design','favourezugwu827@gmail.com','08126577136','I have been practicing for more than six months','I like designs','advert','I have need for a better phone to work with','software','20','Blue','RADIOGRAPHY','Biology','I am yet to venture into business because of my phone',1,'2021-05-28 12:54:39','2021-05-28 12:54:39'),(33,'UnTouchable Digitals','amoschibuikeisgreat@gmail.com','08130161689','Start-up / Internship','To see people exploiting the gift of the internet to ease their daily lives.','advert','To foster the welfare of internet technologies-Build stonger internet communication systems(applications and websites) for a better global economy, education, and welfare.','both','25','White','Medicine','Chemistry/Biology','Start-up/Internship',1,'2021-05-28 13:30:13','2021-05-28 13:30:13'),(34,'Onyx cake','onyinyeanigbogu0@gmail.com','08126803725','Since August 2020','My love for baking and making a beautiful whole out of different parts (ingredients)','friend','Production of healthy and affordable well-baked cakes','non software','19','Yellow','Pharmacy','Biology','I’ve noticed been able to practice my business in school due to lack of space and necessary materials.',6,'2021-05-28 15:18:23','2021-05-28 15:18:23'),(35,'Baking.','jovitauchenna1997@gmail.com','08105505187','1 year.','Skill pays.','friend','I provide people with their demands for different baked foods and snacks.','non software','24','Pink','Pharmacy','Food and nutrition','Sometimes it becomes uneasy to meet up with the orders placed and some other time there might not be an order to work on.',6,'2021-05-28 20:27:44','2021-05-28 20:27:44'),(36,'Omeke Vitalis Izuchukwu','omevitalis@gmail.com','08103087613','3 years','Success is not final','advert','changing the globe into computer applications','both','24','Pink','Pharmacy','chemistry','Bringing in more technologies globally',2,'2021-05-28 22:08:36','2021-05-28 22:08:36'),(37,'Production of Gudigudi Biscuits and using the by-products to produce quality groundnut oil','ejioforsamuelchidozie@gmail.com','07047828114','2 years','To establish indeginous company using indeginous science and technology.','friend','Production of quality biscuits from groundnut and sweet potatoes and also using the by-products to produce other products.','non software','28','Red','Pharmacy','Agricultural Science','Agricultural Production, science of the Production and marketing.',6,'2021-05-29 06:09:15','2021-05-29 06:09:15'),(38,'E-learning Hub','kevinemmanuel573@gmail.com','08166216108','Four months now','Bad economy','friend','I want to save the students if the time and stress of solving their assignment and at the same time help them eais money for their tuition','software','28','Yellow','Pharmacy','Physics','For the past 2years , I have been involved in block chain technology and with my knowledge so far I believe with what I have students can learn and warn to help them in their program',10,'2021-05-29 13:13:29','2021-05-29 13:13:29'),(39,'Skills Innovation Project','onahifebuchechukwu2@gmail.com','08104996572','A year ago','There are people who are willing to work hard but there is was no opportunity for them','friend','Helping people especially young ones on acquiring new skills','non software','23','Purple','Pharmacy','English','I teach communication  skills, sometimes I feel stressed out talking to people who find it very difficult to get what say',1,'2021-05-29 21:39:53','2021-05-29 21:39:53'),(40,'The ARC EMPIRE','mmaadaku1@gmail.com','08066512324','Three years','My love for footwears and to be listed amongst Gucci, Hermes, etc.','advert','I solve the problem of men and women of all ages not having to walk barefooted with my handmade footwears','non software','29','Pink','Pharmacy','Biology','It\'s been Wonderful, Exploring, New Discoveries and also Challenging.',2,'2021-05-30 09:20:32','2021-05-30 09:20:32'),(41,'Chustan health links','idokostan4@gmail.com','08088781410','Just started this year','To curb patients aparty to good medical care due to difficulty in accessing the right skilled medical personnel at the time of need besides emergency','advert','I connect the patient to the right skilled medical personnel to attend to the patients at their convenience','software','22','White','Human Physiology','Biology','Have not done much due to poor access to the facilities and skills',2,'2021-05-30 23:34:40','2021-05-30 23:34:40'),(42,'Otti Israel Chukeuebuka','israelotti@yahoo.com','09077314737','1 month','People are taking it positive, testifying for my genuineness','friend','Distribution of needful goods to people (esp. Online Network) and Student Activist','both','22','White','Pharmacy','Chemistry','Locate and identify your customers, Build the trust and give out to them the best',10,'2021-05-31 15:45:08','2021-05-31 15:45:08'),(43,'Homegrown Enterprise','Catreeny425@gmail.com','08070909236','For 3years','My passion fro creating new recipes','friend','Zero Hunger','non software','24','Red','History and international studies','Home economics and literature','I plan and cater for small events or group gatherings',6,'2021-06-01 10:37:34','2021-06-01 10:37:34'),(44,'Naturals by chens','uchennagoodness247@gmail.com','09039925522','7month','Alot of african women are faced with hair challenges','friend','Hair related issues','both','19','Blue','Pharmacy','Biology','It been an up and down movement, establishing it has been very difficult',2,'2021-06-01 19:57:30','2021-06-01 19:57:30'),(45,'Tessy glamour@yourfavoritepharmacist','chinemereilo96@gmail.com','08153638133','Not too long','Never give up on your dreams','friend','Improving the health decision of man','both','23','Nude','Pharmacy','Chemistry','Is not always easy but get started first. My experience in baking was awesome don\'t give up on your passions',2,'2021-06-04 14:25:13','2021-06-04 14:25:13'),(46,'A multipurpose Cooking pot','nadiailoka@gmail.com','08101802510','1 year','Doing things with ease','friend','The problem of using a good number of utensils in making a single meal','non software','19','Green','Pharmacy','Chemistry','Sold stationeries in a school environment',7,'2021-06-05 00:17:21','2021-06-05 00:17:21'),(47,'A multipurpose website for microbiology students nationwide','christian.agboeze.242712@unn.edu.ng','07068484500','6 months','Lack of good science communication in Nigeria and very high percentage of failure among microbiology students in especially in UNN','friend','To improve science communication and boost student performance academically as well as skill-wise.','both','22','Red','Microbiology','Physics','Auto Parts business for 4 months during the lockdown, at Benin republic',2,'2021-06-05 17:15:48','2021-06-05 17:15:48'),(48,'I want to go into food business','chiekweo@gmail.com','09021006341','Not too long','I have passion for cooking','friend','To alleviate hunger and to prepare nice economical meals','both','21','White','Pharmacy','Biology','None yet',6,'2021-06-06 11:08:28','2021-06-06 11:08:28'),(49,'Agro-ish farm Produce Storage,preservation, processing and supply.','agroish.co@gmail.com','09011395080','Six months','The biggest motivation is to contribute positively towards the growth of the country’s economy; the agricultural sector precisely.','advert','We solve the problem of scarcity, adulteration and hike in prices of agricultural produce in the market and facilitate the flow of these produce from farm to the final consumers.','both','22','Blue','Pharmacy','Agriculture','I have worked in partnership with a colleague to buy and sell footwears . I have successfully managed a food processing business for four years  at New haven Market , Enugu',6,'2021-06-07 02:45:35','2021-06-07 02:45:35'),(50,'Unique life pharmacy','dianastephanie1234@gmail.com','09069393985','Three months','My motivation towards my startup is that I want to an expert in my field of study','friend','Financial issue that is low capital for startup','both','22','Pink','pharmacy','chemistry','I have worked in a hospital pharmacy ,bishop shanahan Nsukka',2,'2021-06-07 06:17:12','2021-06-07 06:17:12'),(51,'Slayonce wears','Kairashandy143@gmail.com','08137815077','1 year','2. High cost and unavailability of good/quality undies','friend','1. Out of stock  of undies, 2.2','both','25','Pink','Pharmacy','Pharmacology','Making available quality underwears at affordable and cost friendly prices for adults of all ages and classes especially students using dispatch riders when there is a great distance to cover in delivery',9,'2021-06-07 09:37:48','2021-06-07 09:37:48'),(52,'Slayonce wears','Kairashandy143@gmail.com','08137815077','1 year','2. High cost and unavailability of good/quality undies','friend','1. Out of stock  of undies, 2.2','both','25','Pink','Pharmacy','Pharmacology','Making available quality underwears at affordable and cost friendly prices for adults of all ages and classes especially students using dispatch riders when there is a great distance to cover in delivery',9,'2021-06-07 09:38:14','2021-06-07 09:38:14'),(53,'Tessycakes and pastries','chinemereilo96@gmail.com','08153638133','3months','To improve health standard using what we eat','friend','To reduce the unempolyment and reduce the cost of purchase','both','23','Nude color','Pharmacy','Chemistry','Is not always easy but get started first. My experience in baking was awesome don\'t give up on your passions',6,'2021-06-07 09:49:50','2021-06-07 09:49:50'),(54,'Amy\'s soft touch','amarachicynthia98@gmail.com','08134205509','3 years','To serve humanity through quality makeup','friend','To create a venue for affordable make-up services','both','22','Brown','Pharmacy','Physics','Starting was difficult but time goes it becomes interesting because I\'m burn with passion towards it',2,'2021-06-07 09:59:02','2021-06-07 09:59:02'),(55,'TorisGig','chisomvictoria222@gmail.com','07011175599','For a year now','High cost, unemployment, problems of digital marketing','friend','I want to help brands /organization make sales by writing more on their products through copywriting.','both','21','Black','Pharmacy','Physics','I have won a lot of awards on different social media platforms.  A lot of people have also becomes on me to guide them because I have written for various  platforms',1,'2021-06-07 10:03:09','2021-06-07 10:03:09'),(56,'Light World Agro','israelotti@yahoo.com','09077314737','2years','The farm is improving everyday','friend','Maximizing Agricultural Product through Pig farming','both','22','Green','Pharmacy','Chemistry','Make pigs available both piglets and the mature for slaughter and sales',6,'2021-06-07 20:47:43','2021-06-07 20:47:43'),(57,'Haven','sammyoziegbe@gmail.com','09037420887','A few weeks','To solve the problem of getting accommodation. Creating a direct link from the owner of the property to the individual because some middle men (agents) find ways to scam people.','friend','An app that shows available houses for rent/sale in locations specified. Also as a means  for students to get accommodation off campus.','software','23','Black','Mechanical engineering','Physics','None',1,'2021-06-10 12:11:33','2021-06-10 12:11:33'),(58,'PREVENTING PREVALENCE OF SUICIDAL BEHAVIOUR','alexifesinachinwachukwu@gmail.com','08066863798','18 Months','Growing up as a young teen, I had always have a strong desire to serve humanity.','social media','To heal humankind, discouraging suicide, by improving health, alleviating sufferings and delivering acts of kindness and make the health system work better for everyone.','both','23','Red','PHARMACY','Chemistry','Conducted a business plan and strategy, developed business model and participated in all facet of the business development.',2,'2021-06-10 17:07:33','2021-06-10 17:07:33'),(59,'Black soap','martha.eneje.235108@unn.edu.ng','08162483079','One year','The feedback','friend','Equipments','non software','24','Pink','Pharmacy','Biology','Supplying and not getting the money when expected',3,'2021-06-10 19:11:00','2021-06-10 19:11:00'),(60,'Black soap','martha.eneje.235108@unn.edu.ng','08162483079','One year','To help people have a nicer skin','friend','Equipments','non software','23','Pink','Pharmacy','Biology','I have been doing the business for a year now, customers have been appreciating it and it encourages me.',3,'2021-06-10 19:38:44','2021-06-10 19:38:44'),(61,'Abraham Phoebe Adaku','phoebe.abraham.201488@unn.edu.ng','07062128337','1year','To learn new things','social media','Skin care problem','both','23','White','Pharmacy','Mathematics','It has been tough',3,'2021-06-10 22:07:45','2021-06-10 22:07:45'),(62,'Light handpiece','Nnamdihenry667@gmail.com','7056290723','Two years','To have a diversity in fashion','friend','Bridging the gap between beads and chains','non software','18','I don\'t have one','Pharmacy','Chemistry','I partnered with a friend on this business and we speak to people about patronizing our collection',2,'2021-06-10 22:51:13','2021-06-10 22:51:13'),(63,'Eagle Movers','omotayofaith0@gmail.com','07065823360','We have been working on this project for over 5 months.','The motivation came from my roommate that lost valuable items to bad logistics system.The items wasn\'t delivered and the loss was not accounted for.','friend','The problem we want to solve is challenges associated with goods delivery and transportation. This platform will promote  reliable channel where goods are safe and delivered to the right destination and individual','both','25','Pink','Pharmacy','English','I have experience in sewing, supplying snacks to schools, and also supplied medicines to patent medicine shops.',1,'2021-06-11 01:20:48','2021-06-11 01:20:48'),(64,'A writer','emmanueljeceb@gmail.com','9067009149','2yrs','To become a renowned writer','friend','Finance','both','21','Red','Anatomy','Chem','Not really business',11,'2021-06-11 04:29:33','2021-06-11 04:29:33'),(65,'Healthbridge','okikeoma96@gmail.com','09081501000','No work done yet still an idea','For people to see the need to take their health as a priority','friend','To bridge the gap between healthcare professionals and the patients','software','24','Peach','Pharmacy','Biology and mathematics','No business experience yet',2,'2021-06-11 08:19:10','2021-06-11 08:19:10'),(66,'Transformations Venture','victor. Ita. 249041@unn.edu.ng','09039294982','2years','To have all-engaged-students\' learning, fun and interactive & benefiting classes in lecture theaters','friend','A Sound amplification device without electricity or moving parts','non software','21','Yellow','Mechanical Engineering','Physics','My business expectation is to sell the device to all departments in my faculty for use by lecturer and students in classes',4,'2021-06-11 11:59:38','2021-06-11 11:59:38'),(67,'GESPLAT','josephijoma@gmail.com','08137053842','Over 2 years','The hunger make people feel comfortable while taking drugs and do it joyfully, thus promoting healthcare.','friend','Solution to the displeasure among patients to drug dosage complains due to taste and odour','non software','25','Blue','Pharmacy','Biology','There’s business experience yet, still under the developing stage.',2,'2021-06-12 19:09:33','2021-06-12 19:09:33'),(68,'Making Africa New ( MAN )','chidera.aninze.249647@unn.edu.ng','08148806153','I started working on my idea during the lockdown when I joined Hult prize challenge for young entrepreneurs but I couldn’t finish it up.','Our country’s condition','advert','I would be solving our problem of light, water and food waste at the same time','both','20','Blue','Medical laboratory science','Biology','I do not really have a business experience as I could not venture properly into my innovation because I lacked the motivation to do so, in the sense of internet and research materials.',5,'2021-06-12 21:30:57','2021-06-12 21:30:57'),(69,'Making Africa New ( MAN )','chidera.aninze.249647@unn.edu.ng','08148806153','I started working on my idea during the lockdown when I joined Hult prize challenge for young entrepreneurs but I couldn’t finish it up.','My dream of changing Africa for the better and improving her living conditions','advert','I would be solving our problem of light, water and food waste at the same time','both','20','Blue','Medical laboratory science','Biology','I do not really have a business experience as I could not venture properly into my innovation because I lacked the motivation to do so, in the sense of internet and research materials.',5,'2021-06-12 21:33:28','2021-06-12 21:33:28'),(70,'Lady Jovial Baking and Decoration services.','jovitauchenna1997@gmail.com','08105505187','1 year','Every big innovation started with a little beginning and diversity of knowledge and investments builds a strong wealth.','friend','Providing an affordable and easily accessible services that satisfies the taste and desire of the clients to counter the problem of high cost of services and lack of quality assurance of products and services as desired by clients.','non software','24','Pink and ash','Pharmacy','Food and nutrition','Baking and Decoration services is a work that requires humility, self control, trust and hardworking because clients wants to get what they ordered and be served right at all times.',6,'2021-06-13 15:53:31','2021-06-13 15:53:31'),(71,'Racosdev','ifeanyicollinsnature@gmail.com','08133753793','3 months','free flow agricultural product supply','friend','poor food supply','non software','25','black','pharmacy','agricultural science','sells perishable',6,'2021-06-13 19:51:38','2021-06-13 19:51:38'),(72,'Xandraly','nnekasandra2016@gmail.com','08100759193','February, 2021','The motivation is helping people become better version of themselves without the excuse of lack of time.','friend','I\'m solving the problem of lack of time to read and gain knowledge by providing a platform that summarizes books in text or audio format.','software','21','Blue','Science laboratory technology','Physics','I have had experience working with teams on building a product and I have sold products and negotiated prices.',11,'2021-06-18 22:35:47','2021-06-18 22:35:47'),(73,'Robosisx','onojagodswill@gmail.com','08130488508','1year and 9months','Making life easier with robots and machines','friend','Infallible security surveillance with robots & cheapened transportation','both','27','White','Mathematics','Mathematics','I worked as a Chief Technology Officer for 3 years at a social media for students',12,'2021-07-01 23:15:04','2021-07-01 23:15:04'),(75,'Education based blockchain application/Sofe Crypto Hub','Info@sofegroup.com','07042847883','Three active years blockchain technology and two months of cultivation the idea of  an educational based blockchain application','The education sector is virgin sector to explore using the Blockchain technology to provide decentralized use cases in the sector','friend','Creating a decentralized blockchain based application for the educational sector','software','25','Blue and orange','Agricultural and Bioresources Engineering','Mathematics','The team have studied diverse aspects of the Blockchain technology for some years now and have come to observe the numerous advantages the technology can bring to the educational sector. Such as digital identity and decentralization.',10,'2021-08-31 10:01:22','2021-08-31 10:01:22');
/*!40000 ALTER TABLE `incubations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `management`
--

DROP TABLE IF EXISTS `management`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `management` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `management`
--

LOCK TABLES `management` WRITE;
/*!40000 ALTER TABLE `management` DISABLE KEYS */;
INSERT INTO `management` VALUES (1,'Prof Ozumba',NULL,NULL,NULL,'prof-ozumba-2021-04-26-60874b7caffa4.jpg','President & CEO','Benjamin Chukwuma Ozumba served as 14th Vice Chancellor of the University of Nigeria, Nsukka and a Professor of Obstetrics and Gynaecology for over twenty years. He succeeded Bath Okolo who was the 13th Vice Chancellor of the University of Nigeria.','https://facebook.com','https://instagram.com','https://twitter.com','https://linkedin.com','2021-04-26 23:23:40','2021-04-26 23:23:40');
/*!40000 ALTER TABLE `management` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2020_04_24_154452_create_events_table',1),(5,'2020_05_17_180034_create_roles_table',1),(6,'2020_05_17_180419_create_role_user_table',1),(7,'2020_05_18_013700_create_foreign_keys_for_role_user_table',1),(8,'2020_11_09_005500_create_tags_table',1),(9,'2020_11_09_005622_create_categories_table',1),(10,'2020_11_09_005730_create_posts_table',1),(11,'2020_11_09_010005_create_comments_table',1),(12,'2020_11_09_010901_create_category_post_table',1),(13,'2020_11_09_010941_create_post_tag_table',1),(14,'2020_11_09_223259_create_settings_table',1),(15,'2020_11_09_231201_create_sliders_table',1),(16,'2020_11_10_000834_create_services_table',1),(17,'2020_11_10_113619_create_albums_table',1),(18,'2021_04_17_120918_create_aspects_table',1),(19,'2021_04_18_195558_create_startups_table',1),(20,'2021_04_18_201632_create_management_table',1),(21,'2021_04_18_204021_create_abouts_table',1),(22,'2021_04_18_213141_create_backgrounds_table',1),(23,'2021_04_19_122215_create_incubations_table',1),(24,'2021_04_21_111009_create_partners_table',1),(25,'2021_04_21_121917_create_aspect_startup_table',1),(26,'2021_04_23_062053_create_contacts_table',1),(27,'2021_04_24_180944_create_galleries_table',1),(28,'2021_04_26_103500_create_blaits_table',1),(29,'2021_04_28_151654_create_team_members_table',2),(30,'2021_05_11_151937_create_startups_teams_table',3),(31,'2021_06_23_215625_create_communities_table',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partners`
--

DROP TABLE IF EXISTS `partners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `partners` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partners`
--

LOCK TABLES `partners` WRITE;
/*!40000 ALTER TABLE `partners` DISABLE KEYS */;
/*!40000 ALTER TABLE `partners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES ('emmanuel.okechukwu.249062@unn.edu.ng','$2y$10$SjdPK21RDrrzdNNnr2wUd..wSRZM0FU08PQzlXBewT4VyGPOCquhy','2021-07-17 08:10:45');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_tag`
--

DROP TABLE IF EXISTS `post_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `post_tag` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int unsigned NOT NULL,
  `tag_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_tag`
--

LOCK TABLES `post_tag` WRITE;
/*!40000 ALTER TABLE `post_tag` DISABLE KEYS */;
INSERT INTO `post_tag` VALUES (1,1,1,'2021-04-26 23:50:34','2021-04-26 23:50:34'),(2,1,2,'2021-04-26 23:50:34','2021-04-26 23:50:34'),(3,2,2,'2021-06-27 22:44:00','2021-06-27 22:44:00');
/*!40000 ALTER TABLE `post_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `view_count` int NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `is_approved` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`),
  KEY `posts_user_id_foreign` (`user_id`),
  CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,1,'Science, Engineering and Technology','science-engineering-and-technology','science-engineering-and-technology-2021-04-26-608751ca2f0ef.jpg','<p>The distinction between science, engineering, and technology is not always clear.&nbsp;<a title=\"Science\" href=\"https://en.wikipedia.org/wiki/Science\">Science</a>&nbsp;is systematic knowledge of the physical or material world gained through observation and experimentation.<sup id=\"cite_ref-16\" class=\"reference\"><a href=\"https://en.wikipedia.org/wiki/Technology#cite_note-16\">[16]</a></sup>&nbsp;Technologies are not usually exclusively products of science, because they have to satisfy requirements such as&nbsp;<a title=\"Utility\" href=\"https://en.wikipedia.org/wiki/Utility\">utility</a>,&nbsp;<a title=\"Usability\" href=\"https://en.wikipedia.org/wiki/Usability\">usability</a>, and&nbsp;<a title=\"Safety\" href=\"https://en.wikipedia.org/wiki/Safety\">safety</a>.<sup id=\"cite_ref-17\" class=\"reference\"><a href=\"https://en.wikipedia.org/wiki/Technology#cite_note-17\">[17]</a></sup></p>\r\n<blockquote>\r\n<p>Engineering is the&nbsp;<a class=\"mw-redirect\" title=\"Goal-oriented\" href=\"https://en.wikipedia.org/wiki/Goal-oriented\">goal-oriented</a>&nbsp;process of designing and making tools and systems to exploit natural phenomena for practical human means, often (but not always) using results and techniques from science. The development of technology may draw upon many fields of knowledge, including scientific, engineering,&nbsp;<a title=\"Mathematics\" href=\"https://en.wikipedia.org/wiki/Mathematics\">mathematical</a>,&nbsp;<a title=\"Language\" href=\"https://en.wikipedia.org/wiki/Language\">linguistic</a>, and&nbsp;<a title=\"History\" href=\"https://en.wikipedia.org/wiki/History\">historical</a>&nbsp;knowledge, to achieve some practical result.</p>\r\n</blockquote>\r\n<p>Technology is often a consequence of science and engineering, although technology as a human activity precedes the two fields. For example, science might study the flow of&nbsp;<a title=\"Electron\" href=\"https://en.wikipedia.org/wiki/Electron\">electrons</a>&nbsp;in&nbsp;<a title=\"Electrical conductor\" href=\"https://en.wikipedia.org/wiki/Electrical_conductor\">electrical conductors</a>&nbsp;by using already-existing tools and knowledge. This new-found knowledge may then be used by engineers to create new tools and machines such as&nbsp;<a title=\"Semiconductor\" href=\"https://en.wikipedia.org/wiki/Semiconductor\">semiconductors</a>,&nbsp;<a title=\"Computer\" href=\"https://en.wikipedia.org/wiki/Computer\">computers</a>, and other forms of advanced technology. In this sense, scientists and engineers may both be considered&nbsp;<a class=\"mw-disambig\" title=\"Technologist\" href=\"https://en.wikipedia.org/wiki/Technologist\">technologists</a><sup class=\"noprint Inline-Template\">[<em><a title=\"Wikipedia:WikiProject Disambiguation/Fixing links\" href=\"https://en.wikipedia.org/wiki/Wikipedia:WikiProject_Disambiguation/Fixing_links\"><span title=\"Link needs disambiguation (March 2021)\">disambiguation needed</span></a></em>]</sup>; the three fields are often considered as one for the purposes of research and reference.<sup id=\"cite_ref-18\" class=\"reference\"><a href=\"https://en.wikipedia.org/wiki/Technology#cite_note-18\">[18]</a></sup></p>\r\n<p>The exact relations between science and technology, in particular, have been debated by scientists, historians, and policymakers in the late 20th century, in part because the debate can inform the funding of basic and applied s<strong>cience.</strong> In the immediate wake of&nbsp;<a title=\"World War II\" href=\"https://en.wikipedia.org/wiki/World_War_II\">World War II</a>, for example, it was widely considered in the United States that technology was simply \"applied science\" and that to fund basic science was to reap technological results in due time. An articulation of this philosophy could be found explicitly in&nbsp;<a title=\"Vannevar Bush\" href=\"https://en.wikipedia.org/wiki/Vannevar_Bush\">Vannevar Bush</a>\'s treatise on postwar science policy,&nbsp;<em>Science &ndash; The Endless Frontier</em>: \"New products, new industries, and more jobs require continuous additions to knowledge of the laws of nature&nbsp;... This essential new knowledge can be obtained only through basic scientific research.\"<sup id=\"cite_ref-19\" class=\"reference\"><a href=\"https://en.wikipedia.org/wiki/Technology#cite_note-19\">[19]</a></sup>&nbsp;In the late-1960s, however, this view came under direct attack, leading towards initiatives to fund science for specific tasks (initiatives resisted by the scientific community).</p>',107,1,1,'2021-04-26 23:50:34','2021-08-31 10:20:26'),(2,1,'Building a United States of Africa','building-a-united-states-of-africa','building-a-united-states-of-africa-2021-06-27-60d8ff2f96cfe.jpg','<p id=\"6a5b\" class=\"hz ia fq ib b ic id ie if ig ih ii ij ik il im in io ip iq ir is it iu iv iw fj co\" data-selectable-paragraph=\"\">Nigeria has one of the highest population growth rates in the world. If current trends continue, the<span id=\"rmm\">n</span>&nbsp;the future may be overwhelming. By the time a child born today turns 30 (about 2050), there will be about 400 million Nigerians and when she is 80 (about 2100), and there will be about 752 million Nigerians (third largest population in the world). All these people will have to survive and prosper in a tiny but declining land mass (923,000 sqkm) - declining due to desertification and erosion, and Nigeria will have the highest population density in the world among the top ten most populous countries. All these people will need land, housing, water, food, power, education and health facilities, sewage and waste disposal, transportation, and yes, job, jobs! The population is very youthful with 43% between 0-14 years old; 53% between 15-65 years and 4% over 65 years. So what can we do?<br />Economic restructuring of the future is about positioning Nigeria to compete and win in an increasingly complex world thereby guaranteeing the security, prosperity and happiness of the 400 or 752 million Nigerians, in a world without oil. Put differently, if we target to be a middle-income country of say, US$7,500 per capita by 2100 (from about $1,930 currently), then we need a GDP of over US$5.5 trillion by 2100 (thereby requiring double digit annual growth). The agenda to do this won\'t just require thinking outside of the box - it would require thinking without the box at all: big, bold plan and action!&nbsp;<br />I believe that God has blessed Nigeria with everything to be the most prosperous home for the black race. The point here is that for every one big challenge, there are possibly more than ten opportunities out there. Nigeria\'s people/youths remain its potentially greatest asset - potentially renewable resource for productivity, huge market, and even export. Yes, the next bigger than oil export earner for Nigeria will (potentially) be its human capital. But we cannot export illiterates in a world driven by digital revolution. The easiest way to waste the future is to continue to churn out millions of semi-illiterate, largely unemployable citizens, most of whom see criminality as the only route to escape the poverty trap or drug as the opium for solace. With an urbanization rate of over 5%, the conflagration that might ensure when hundreds of millions surge to the cities but can\'t find jobs, housing, water and food can only be imagined. Soon, the rich won\'t be able to sleep because the poor, homeless and hungry are awake.<br />By the way, who says that we can\'t have smart population policy that encourages people to have the number of children that they can train, and also ensure reliable population census using biometrics rather than the political population figures we have? Whatever the case, the challenge is how to deliberately optimize the potentials of the huge youthful population to be highly productive at home and competitive/exportable abroad. An educational system with 21st&nbsp;century curricula powered by technology that guarantees one youth, one to three skills might be a winning strategy.&nbsp;<br />We need to unleash the creative geniuses in our people by designing the appropriate institutions to power a 21st&nbsp;century economy, this is because, if you want to change a persisting economic structure, change the underling institutions and once the focus is wealth creation rather than sharing and consumption of oil rents, we need a new national business model.<br />As a political holder, to remain relevant and enable emerging thinkers to pursue surer pathways to success the difference I will make is, I will adopt the Silicon Valley model, which seems to be the only method of addressing the Sustainable Development Goals by building Business Incubator Hubs in all institutions of higher learning in Nigeria, this, fortunately is replicated by the Roar Nigeria Hub situated in the University of Nigeria Nsukka.<br />Business incubators came into the scene in the 1950s and they have played a dynamic role in advancing the innovation and growth of some developed economies in the world. Wikipedia defines Business incubator&nbsp;as an organization that helps&nbsp;startup companies&nbsp;and individual entrepreneurs to develop their businesses by providing full-scale range of services starting with&nbsp;management training&nbsp;and&nbsp;office space&nbsp;and ending with venture capital financing. That is, they are dedicated to offering business assistance services to&nbsp;startup&nbsp;and early-stage companies.<br />The first high-tech incubator, Catalyst Technologies started by&nbsp;Nolan Bushnell&nbsp;after he left&nbsp;Atari is located in Silicon Valley,&nbsp;the area is now home to many of the world\'s largest&nbsp;high-tech corporations, including the headquarters of more than 30 businesses in the&nbsp;Fortune 1000, and thousands of&nbsp;startup companies. Silicon Valley also accounts for one-third of all of the&nbsp;venture capital&nbsp;investment in the United States, which has helped it to become a leading hub and&nbsp;startup ecosystem&nbsp;for high-tech innovation. It was in Silicon Valley that the silicon-based&nbsp;integrated circuit, the&nbsp;microprocessor, and the&nbsp;microcomputer, among other technologies, were developed.<br />For decades, the Silicon Valley model has progressively transformed the way innovation and entrepreneurship is viewed globally. This has inspired technology-minded individuals to form clusters, across various geographical regions, to collectively shape the world with technological innovation that mirrors that of Silicon Valley. In Nigeria, the revolution is moving at a progressive pace.<br />As a case study, the Roar Nigeria Business Incubator Hubs embedded in the University of Nigeria Nsukka, has successfully incubated different startups to reality like:<br />Alphontazi Farms: which helps farmers in rural areas to process their cassava products more hygienically and efficiently by delivering well packaged, healthy garri to the market thereby boosting the agricultural sector and addressing the Sustainable Development Goal 2, 3, 8, and 11 which are No Hunger, Good Health, Good Jobs and Economic Growth and Sustainable Cities and Communities respectively.<br />Arone: is building a future of personalized drone delivery in Africa. It applies high-tech to solve problem encountered with traditional delivery systems by providing fast, secure, cost effective and eco-friendly delivery. Though on a small scale, but if financed, can save us the cost of importing drones from other countries and will improve supply chain thereby boosting our economy.<br />VIOS Tech: is a Digital Healthcare company that provides an excellent patient&rsquo;s data base, which is healthcare information for easy access to health care institutions, care givers and patients wherever and whenever. They use this software to capture and exchange health care data information for easy interaction between patients and care-givers and also reduction of mortality rate due to an updated history of patients&rsquo; health. Hence, with this revolutionary technology, the analog method of using papers in hospitals will be a thing of the past and the health sector will be boosted<br />Upskill: a web platform where users can acquire relevant skills needed to solve global problems, track their learning process, create portfolio, join learning communities and also apply for job opportunities. It bridges digital gaps by creating virtual learning space which was very impactful during the pandemic&rsquo;s lockdown, as a lot of students were home-schooled through it thereby boosting the educational sector<br />And many more are currently being incubated, of which I&rsquo;m a member (a Co-Founder of Voltan, a renewable energy startup) of Cohort 4.<br />It is worthy to note that all these companies were started by students of the University of Nigeria Nsukka. So, if Roar Nigeria Hub can single handedly do this, then a replication in every educational institution in Nigeria, will be of great impact, as:<br />Students who are participants of the Hubs will be learning digital skills needed for us to catch up with the 4th Industrial Revolution of which Nigeria is currently behind.<br />It will increase productivity and competition in our economy, as every sector will have to sit up to the budding local competitive market, thereby reducing unemployment and crime rate by 70%.<br />The workforce will be decentralized as 53% of the population earn their income remotely<br />Also, the tax generated from these companies will increase our internally generated revenue, thereby increasing our nation&rsquo;s gross domestic profit (GDP) and boosting our economy.<br />HOW WILL I ACHIEVE THIS?<br />As a political holder in our dear country Nigeria and with the approval of Mr. President and the Educational Boards, I will introduce a well connected Incubation programme in schools of higher learning, that is, the Nigerian academic curriculum will have to give room for startups to carry out their activities in the Incubator Hubs, this should not affect their classroom activities but should work together in building the Nigeria of our dream.<br />Hence, I will be, connecting these startups with Venture Capitalist from overseas, networking them with investors and allocate funds to them for them to scale up and be a fully fledged company and fast track their productivity. In the long run, as a political leader, I will be taxing them appropriately and use the revenue generated to create more businesses and generate employment for the growing population of those that could not catch up with the Incubator Hubs and also improve the infrastructure of our dear nation, which will in turn enhance the productivity of these businesses as there would be emergence of smart cities, conducive educational institutions, equipped health sectors, good road networks etc, hence we will achieve a great number of the Sustainable Development Goals in our country and we can even start empowering other neighboring countries with our exportable products and services as The Giant of Africa .<br />When all these are in place, the now fertile Nigerian economy will start attracting foreign investors, thereby increasing the value of the Naira, our national currency and making it an internationally recognized currency. This is because, the investments will force the investors to trade in our currency, and thereby strengthening the Naira in the stock market and making Nigeria a better place.<br />This model will even bring about a positive change and integration in the Eastern, Western, Northern and Southern regions of Nigeria, as everyone will be treated fairly and there would be unity in our diversity. This will even lead to a secured Nigeria, as all ethnic groups are working on making their motherland a more secured and fertile place, with the military fully funded as well as every sector in the economy.<br />If this model had been in place during the pandemic we would have had a running economy even with the lockdown, as we would have been making use of the internet space from the tech skills gotten from the Hubs.<br />I for one am a Co-Founder of a startup that is being incubated in the Roar Nigeria Hub, my team and I are solving the problem of power in the energy sector. Given that the sole revenue of the Nigerian economy, crude oil, is not renewable and going out of style in the nearest future of the 4th Industrial Revolution, we are working on building renewable systems with clean and affordable energy that will not only power our houses but also power every sector that needs energy to run, including transportation vessels. Hence, our startup, if well funded and managed will sustain all other sectors, as 95% of all sectors of the economy need power to work efficiently.<br />The relationship between institutions of higher learning and business incubators cannot be overemphasized as these institutions are the source of knowledge, research, resources and today&rsquo;s innovation-driven centers, and can provide links to the industry, society and government entities, also, every sector of the economy (political, health, education, agriculture, etc) is represented in them. In such a scenario, we would witness a longer queue of job providers than job seekers.</p>\r\n<p id=\"fbfb\" class=\"hz ia fq ib b ic id ie if ig ih ii ij ik il im in io ip iq ir is it iu iv iw fj co\" data-selectable-paragraph=\"\">Why Should We Have Business Incubator Hubs on Campuses?<br />If every institution had a Business Incubator and it was run properly, we could really start to change Nigeria&rsquo;s economy and entrepreneurial culture. These business incubators have helped universities in the developed world to rethink their place in preparing the next generation, creating entrepreneurial environments that facilitate connections and speed innovative ideas from concept to reality and we can achieve that in Nigeria.</p>\r\n<p id=\"65c3\" class=\"hz ia fq ib b ic id ie if ig ih ii ij ik il im in io ip iq ir is it iu iv iw fj co\" data-selectable-paragraph=\"\">Imagine a hub of students from different disciplines, representing different sectors of the economy, meeting each other, exchanging ideas, sharing connections and resources. Even better if this extends to the wider business community!<br />We know that many co-founders meet at College or University and often come from different disciplines, what a great way to increase the chance of these positive &ldquo;spontaneous collisions&rdquo;! Think about how useful the contacts one make here can be, socially and professionally<br />Students benefit from this, whether they intend on launching their own business or go on to work for someone else to add value after graduating.<br />With the increase in the demand of softer skills that claim real gaps in certain areas: problem solving, communication skills (other than on smart phones!), leadership, creative thinking and many more by employers &ndash; the business Incubators can bridge the gap created by lack of these digital learning tools in classrooms and more.<br />I dream of a future United States of Africa, and possibly with Nigeria as its California. I see our huge problems but I focus on the solutions. The choice is ours, and I believe that if we (together) choose to work hard at them, the next Nigeria of our dream is possible!</p>\r\n<p class=\"hz ia fq ib b ic id ie if ig ih ii ij ik il im in io ip iq ir is it iu iv iw fj co\" data-selectable-paragraph=\"\">&nbsp;</p>\r\n<p class=\"hz ia fq ib b ic id ie if ig ih ii ij ik il im in io ip iq ir is it iu iv iw fj co\" data-selectable-paragraph=\"\">Written by;</p>\r\n<p class=\"hz ia fq ib b ic id ie if ig ih ii ij ik il im in io ip iq ir is it iu iv iw fj co\" data-selectable-paragraph=\"\">Madu Afam Daniel</p>\r\n<p class=\"hz ia fq ib b ic id ie if ig ih ii ij ik il im in io ip iq ir is it iu iv iw fj co\" data-selectable-paragraph=\"\">and</p>\r\n<p class=\"hz ia fq ib b ic id ie if ig ih ii ij ik il im in io ip iq ir is it iu iv iw fj co\" data-selectable-paragraph=\"\">Amadife Glory Uchechi</p>',51,1,1,'2021-06-27 22:44:00','2021-08-31 07:29:50');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_user` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_user_user_id_foreign` (`user_id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` VALUES (1,1,1,NULL,NULL),(2,2,2,NULL,NULL),(3,3,3,NULL,NULL),(4,3,4,NULL,NULL),(5,3,5,NULL,NULL),(6,3,6,NULL,NULL),(7,3,7,NULL,NULL),(8,3,8,NULL,NULL),(9,3,9,NULL,NULL),(10,3,10,NULL,NULL),(11,3,11,NULL,NULL),(12,3,12,NULL,NULL),(13,3,13,NULL,NULL),(14,3,14,NULL,NULL),(15,3,15,NULL,NULL),(16,3,16,NULL,NULL),(17,3,17,NULL,NULL),(18,3,18,NULL,NULL),(19,3,19,NULL,NULL),(20,3,20,NULL,NULL),(21,3,21,NULL,NULL);
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','admin','2021-04-26 15:36:36','2021-04-26 15:36:36'),(2,'author','author','2021-04-26 15:36:36','2021-04-26 15:36:36'),(3,'user','user','2021-04-26 15:36:36','2021-04-26 15:36:36');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `services` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_order` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slogan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fav` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'Roar Nigeria Hub','Where technology lives','roarnghub@outlook.com','roar-nigeria-hub-logo.png','default.png','2348066610922','Beside CEC, UNN','Roar Nigeria Hub','Roar Nigeria Hub is a community that provides professional support to technology enabled startups, researchers, entrepreneurs and SME’s.','https://facebook.com','https://twitter.com','https://linkedin.com','https://instagram.com','2021-04-26 15:36:36','2021-07-03 12:58:26');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sliders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `v_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sliders`
--

LOCK TABLES `sliders` WRITE;
/*!40000 ALTER TABLE `sliders` DISABLE KEYS */;
INSERT INTO `sliders` VALUES (1,'Let your idea come alive','We can help you build your dream','let-your-idea-come-alive-2021-04-26-6087231fd5091.jpg',NULL,NULL,NULL,'2021-04-26 20:31:28','2021-04-26 20:31:28'),(2,'.','.','-2021-04-26-60872c1ab3a46.jpg',NULL,NULL,NULL,'2021-04-26 21:09:47','2021-04-26 21:09:47');
/*!40000 ALTER TABLE `sliders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `startups`
--

DROP TABLE IF EXISTS `startups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `startups` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `aspect_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `idea` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `startups_aspect_id_foreign` (`aspect_id`),
  CONSTRAINT `startups_aspect_id_foreign` FOREIGN KEY (`aspect_id`) REFERENCES `aspects` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `startups`
--

LOCK TABLES `startups` WRITE;
/*!40000 ALTER TABLE `startups` DISABLE KEYS */;
/*!40000 ALTER TABLE `startups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `startups_teams`
--

DROP TABLE IF EXISTS `startups_teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `startups_teams` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `startup_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skill` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `startups_teams`
--

LOCK TABLES `startups_teams` WRITE;
/*!40000 ALTER TABLE `startups_teams` DISABLE KEYS */;
/*!40000 ALTER TABLE `startups_teams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tags` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (1,'Craft','craft','2021-04-26 23:47:04','2021-04-26 23:47:04'),(2,'Innovation','innovation','2021-04-26 23:47:54','2021-04-26 23:47:54');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team_members`
--

DROP TABLE IF EXISTS `team_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `team_members` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `startup_id` bigint unsigned DEFAULT NULL,
  `incubation_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skill` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `team_members_startup_id_foreign` (`startup_id`),
  KEY `team_members_incubation_id_foreign` (`incubation_id`),
  CONSTRAINT `team_members_incubation_id_foreign` FOREIGN KEY (`incubation_id`) REFERENCES `incubations` (`id`) ON DELETE CASCADE,
  CONSTRAINT `team_members_startup_id_foreign` FOREIGN KEY (`startup_id`) REFERENCES `startups` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team_members`
--

LOCK TABLES `team_members` WRITE;
/*!40000 ALTER TABLE `team_members` DISABLE KEYS */;
INSERT INTO `team_members` VALUES (3,NULL,3,'Ytfgh','hygfmadu@gmail.com','Yoga','08096610922','2021-04-29 07:48:22','2021-04-29 07:48:22'),(4,NULL,4,'Yuuuu','yuuh@gmail.com','Trrru','25558','2021-04-29 07:52:59','2021-04-29 07:52:59'),(5,NULL,5,'me','me@email.com','Developer','08022813626','2021-04-29 11:55:14','2021-04-29 11:55:14'),(6,NULL,6,'Daniel madu','maduafamdaniel@gmail.com','Software','08066635467','2021-04-29 14:32:44','2021-04-29 14:32:44'),(7,NULL,6,'Solomon nwafor','nwaforsolomon@gmail.com','Hardware','07034111768','2021-04-29 14:32:44','2021-04-29 14:32:44'),(8,NULL,6,'Mazi cross','mazicross@gmail.com','Web designer','08032127173','2021-04-29 14:32:44','2021-04-29 14:32:44'),(9,NULL,7,'Ha vv','hygfmadu@gmail.com','Hgcv','6288','2021-04-29 16:53:17','2021-04-29 16:53:17'),(10,NULL,8,'Obanijesu oluwasheye Israel','obanijesuIsrael@gmail.com','Hardware and a software developer (Embedded systems Engineer)','2349048464766','2021-05-04 23:09:00','2021-05-04 23:09:00'),(11,NULL,9,'Eze Chidera Jacinta','ezechiderajacinta@gmail.com','Managing and presenting','08120090562','2021-05-05 08:48:36','2021-05-05 08:48:36'),(12,NULL,9,'Okafor Amarachi Patricia','amarachi0399@gmail.com','Presenting','08111645640','2021-05-05 08:48:36','2021-05-05 08:48:36'),(13,NULL,9,'Kalu Smith','smithkalu47@gmail.com','Sports presenting','08130750784','2021-05-05 08:48:36','2021-05-05 08:48:36'),(14,NULL,9,'Aniebonam Kosiso Gift','aniebonamkosiso2@gmail.com','Presenting','08140463464','2021-05-05 08:48:36','2021-05-05 08:48:36'),(15,NULL,9,'Okoro David Emeka','okorodavide77@gmail.com','Editing','07064737889','2021-05-05 08:48:36','2021-05-05 08:48:36'),(16,NULL,10,'Richard Divine chinaeke','divinerichard007@gmail.com','Graphics Designer','2348105619928','2021-05-06 01:04:38','2021-05-06 01:04:38'),(17,NULL,11,'Ifeanyi Christwin','ichristwin@gmail.com','Data science, Management, Programmer','08081147003','2021-05-06 04:23:00','2021-05-06 04:23:00'),(18,NULL,11,'Anthony Aniobi','anthonyaniobi198@gmail.com','Engineer, Programmer','09092202826','2021-05-06 04:23:00','2021-05-06 04:23:00'),(19,NULL,12,'Emmanuel ifeanyi','uchennauzh@gmail.com','hardware skill','08131225701','2021-05-06 13:58:49','2021-05-06 13:58:49'),(20,NULL,13,'Emmanuel ifeanyi','uchennauzh@gmail.com','hardware skill','08131225701','2021-05-06 14:04:30','2021-05-06 14:04:30'),(21,NULL,14,'Obiechina Emmanuel','emma1obiechina@gmail.com','Mobile development flutter','09065018777','2021-05-16 13:14:50','2021-05-16 13:14:50'),(22,NULL,15,'Isaac J.Newton','isaacjavannewton@gmail.com','Computer programing and Electronic systems design','07061626508','2021-05-17 11:41:18','2021-05-17 11:41:18'),(23,NULL,15,'Jude God\'s delight C.','godsdelightjude2001@gmail.com','Hardware electronics designing, PCB fabrication','09065787011','2021-05-17 11:41:18','2021-05-17 11:41:18'),(24,NULL,16,'Nzekwe Kenechukwu Johnbosco','nzekwekene2@gmail.com','Mainly, I\'m a Blogger. But also have an additional skill of graphic designing','09068350680','2021-05-21 20:22:05','2021-05-21 20:22:05'),(25,NULL,17,'Nzekwe Kenechukwu Johnbosco','nzekwekene2@gmail.com','Mainly, I\'m a Blogger. But also have an additional skill of graphic designing','09068350680','2021-05-21 20:22:18','2021-05-21 20:22:18'),(26,NULL,18,'Samuel Chukwudi Achinihu','samachix@gmail.com','Digital skills, Microsoft, Website development, Graphic Design, Management skills, Communication skills and Writing skills','07081458485','2021-05-22 13:26:44','2021-05-22 13:26:44'),(27,NULL,19,'Onah Nnamdi Joel','onah.joel.247270@unn.edu.ng','Hardware Engineer','09030067995','2021-05-24 11:21:58','2021-05-24 11:21:58'),(28,NULL,20,'Onu Gospel Chukwuka','onugospel@yahoo.com','Software engineer','09037929641','2021-05-24 11:36:15','2021-05-24 11:36:15'),(29,NULL,21,'None','none@gmail.com','None','09076321302','2021-05-24 13:03:24','2021-05-24 13:03:24'),(30,NULL,22,'Nwodo Florence ogechi','ogbodomichael367@gmail.com','Cake baker','08114111230','2021-05-25 10:13:51','2021-05-25 10:13:51'),(31,NULL,22,'Ogbodo Delight Ahamefula','dondelight95@gmail.com','VIDEO CONTENT CREATOR','08062113950','2021-05-25 10:13:51','2021-05-25 10:13:51'),(32,NULL,23,'Nwodo Florence ogechi','ogbodomichael367@gmail.com','Cake baker','08114111230','2021-05-25 10:13:54','2021-05-25 10:13:54'),(33,NULL,23,'Ogbodo Delight Ahamefula','dondelight95@gmail.com','VIDEO CONTENT CREATOR','08062113950','2021-05-25 10:13:54','2021-05-25 10:13:54'),(34,NULL,24,'Justin Ozomma','Jussyjohnn@gmail.com','Drug making','09022758338','2021-05-26 07:45:12','2021-05-26 07:45:12'),(35,NULL,25,'Onuorah Ebuka iyke','ebukaonuorah@gmail.com','Leadership skills, it skills','08164424779','2021-05-26 08:21:11','2021-05-26 08:21:11'),(36,NULL,26,'Chima Harrison','harrisonugwuoke72@gmail.com','Farming','08135324975','2021-05-26 15:59:23','2021-05-26 15:59:23'),(37,NULL,27,'Onwukwe Ifeanyi','uelbeegroup@gmail.com','Graphics','09037126075','2021-05-26 20:14:57','2021-05-26 20:14:57'),(38,NULL,28,'Attamah vanessa','judith.attamah.235321@unn.edu.ng','Graphic design','08106221798','2021-05-27 05:47:21','2021-05-27 05:47:21'),(39,NULL,29,'Nobul','ogochukwuemily17@gmail.com','Pharmacist','09031988502','2021-05-27 18:18:33','2021-05-27 18:18:33'),(40,NULL,30,'Ukwuaba Rita Chinecherem','king4drugs@gmail.com','Research and Marketing','09012394583','2021-05-27 21:54:20','2021-05-27 21:54:20'),(41,NULL,30,'Ugwuja Chimezie Hillary','Ugwujahillary3@gmail.com','Marketing','09096264133','2021-05-27 21:54:20','2021-05-27 21:54:20'),(42,NULL,31,'Ezugwu Favour','favourezugwu827@gmail.com','Smart phone graphics design','08126577136','2021-05-28 12:53:58','2021-05-28 12:53:58'),(43,NULL,32,'Ezugwu Favour','favourezugwu827@gmail.com','Smart phone graphics design','08126577136','2021-05-28 12:54:40','2021-05-28 12:54:40'),(44,NULL,33,'Ernest Ngwu','ernestarinze60@gmail.com','Internet surfing and marketing','08036621477','2021-05-28 13:30:14','2021-05-28 13:30:14'),(45,NULL,34,'Chiderah','chiderahorakwelu@gmail.con','Cake baker and decorator','09074369133','2021-05-28 15:18:24','2021-05-28 15:18:24'),(46,NULL,35,'Ojobor Julieth Nnenna','julietnnenna95@gmail.com','Baking','08102684683','2021-05-28 20:27:44','2021-05-28 20:27:44'),(47,NULL,36,'Vitalis Omeke','omevitalis@gmail.com','Creativity','08103087613','2021-05-28 22:08:36','2021-05-28 22:08:36'),(48,NULL,37,'Ejiofor Emmanuel Uchenna','ejioforemmanueluchenna@gmail.com','Agricultural Production and Products Marketing','08130448247','2021-05-29 06:09:15','2021-05-29 06:09:15'),(49,NULL,38,'Ejiifor Victor','ejioforsunday750@gmail.com','Photographer and film editor','07034638665','2021-05-29 13:13:29','2021-05-29 13:13:29'),(50,NULL,39,'Ozioko Cosmas Chibuike','cosmasozioko5@gmail.com','Business marketer','08050296137','2021-05-29 21:39:53','2021-05-29 21:39:53'),(51,NULL,39,'Uche Chidindu Paul','chidindupaul30@gmail.com','Artist','07032648204','2021-05-29 21:39:53','2021-05-29 21:39:53'),(52,NULL,40,'Odo Nelson Stanley Chiedozie','nelzee88@gmail.com','Shoe maker','08038476406','2021-05-30 09:20:32','2021-05-30 09:20:32'),(53,NULL,41,'Idoko STANISTUS CHIBUZO','idokostan4@gmail.com','Computer literate','08088781410','2021-05-30 23:34:40','2021-05-30 23:34:40'),(54,NULL,42,'Joel Eleje','info@roarmnigeriahub.com','Photographic designer','08066610922','2021-05-31 15:45:08','2021-05-31 15:45:08'),(55,NULL,43,'Catherine','ogbodochioma@ymail.com','Baker','09099360379','2021-06-01 10:37:34','2021-06-01 10:37:34'),(56,NULL,44,'Asogwa ebere','asogwaebereperpetua@gmail.com','Content creation','08049472715','2021-06-01 19:57:30','2021-06-01 19:57:30'),(57,NULL,45,'Eleje Joel','chinemereilo96@gmail.com','Baking','07031957816','2021-06-04 14:25:13','2021-06-04 14:25:13'),(58,NULL,46,'Nadia Iloka','nadiailoka@gmail.com','Listening skills','08101802510','2021-06-05 00:17:21','2021-06-05 00:17:21'),(59,NULL,47,'Agboeze, Christian Tochukwu','christian.agboeze.242712@unn.edu.ng','HTML, CSS, blogging','07068484500','2021-06-05 17:15:48','2021-06-05 17:15:48'),(60,NULL,47,'Okorie, Ifeoma Joy','christoochi02@gmail.com','Content creation','08103369576','2021-06-05 17:15:48','2021-06-05 17:15:48'),(61,NULL,48,'Chiekwe Onyeka','chiekweo@gmail.com','Cooking','09021006341','2021-06-06 11:08:28','2021-06-06 11:08:28'),(62,NULL,49,'Anulugwo ogochukwu','chinecheremodibeze001@gmail.com','Fashion designing','08162507605','2021-06-07 02:45:35','2021-06-07 02:45:35'),(63,NULL,50,'Ukwuaba rita','dianastephanie1234@gmail.com','Sewing skill','09069393985','2021-06-07 06:17:12','2021-06-07 06:17:12'),(64,NULL,51,'Agbo Isabella Udochinenye','Kairashandy143@gmail.com','Sewing','08137815077','2021-06-07 09:37:48','2021-06-07 09:37:48'),(65,NULL,52,'Agbo Isabella Udochinenye','Kairashandy143@gmail.com','Sewing','08137815077','2021-06-07 09:38:14','2021-06-07 09:38:14'),(66,NULL,53,'Ewelum Amarachi','amarachicynthia98@yahoo.com','Baking','08134205509','2021-06-07 09:49:50','2021-06-07 09:49:50'),(67,NULL,53,'Ewelum Ogechi','ogechi200@yahoo.com','Baking','09068582344','2021-06-07 09:49:50','2021-06-07 09:49:50'),(68,NULL,54,'Ewelum Amarachi','amarachicynthia98@gmail.com','Makeup artist','08134205509','2021-06-07 09:59:02','2021-06-07 09:59:02'),(69,NULL,54,'Ilo Chinemerem','chimemeremilo96@yahoo.com','Makeup artist','08153638133','2021-06-07 09:59:02','2021-06-07 09:59:02'),(70,NULL,54,'Ewelum Ogechi','ogechirita2000@gmail.com','Make-up artist','09068582344','2021-06-07 09:59:02','2021-06-07 09:59:02'),(71,NULL,54,'Omeje chinecherem','amarachicynthia98@gmail.com','Makeup artist','08141771623','2021-06-07 09:59:02','2021-06-07 09:59:02'),(72,NULL,55,'Aniefuna Chisom Victoria','chisomvictoria222@gmail.com','Public speaking, Research, Communication Skills, Graphic designing,computer networking, content creation, logical problem solving, leadership skills, critical and creative thinking.','07011175599','2021-06-07 10:03:09','2021-06-07 10:03:09'),(73,NULL,55,'Amandi Nancy Chinwe','amandinancy16@gmail.com','Communication skills, critical and creative thinking , content creation, story writing, research skills.','09023714613','2021-06-07 10:03:09','2021-06-07 10:03:09'),(74,NULL,56,'Otti Israel','israelotti123@gmail.com','Pig rearing','08101188905','2021-06-07 20:47:43','2021-06-07 20:47:43'),(75,NULL,57,'Oziegbe Samuel','sammyoziegbe@gmail.com','Fullstack','09037420887','2021-06-10 12:11:33','2021-06-10 12:11:33'),(76,NULL,57,'Adukwu Kizito','rexkozy0@gmail.com','Server side programming and UI/UX','08106437707','2021-06-10 12:11:33','2021-06-10 12:11:33'),(77,NULL,57,'Osunwa Nkechinyerem','osunwankechi@gmail.com','UI/UX','07061331450','2021-06-10 12:11:33','2021-06-10 12:11:33'),(78,NULL,57,'Morah Chukwuemeka','morahstephen872@gmail.com','Fullstack','08174467822','2021-06-10 12:11:33','2021-06-10 12:11:33'),(79,NULL,58,'NWACHUKWU ALEX IFESINACHI','alexifesinachinwachukwu@gmail.com','Good Health And Well Being','08066863798','2021-06-10 17:07:33','2021-06-10 17:07:33'),(80,NULL,59,'Eneje Martha Amuchechukwu','martha.eneje.235108@unn.edu.ng','Baking','08162483079','2021-06-10 19:12:00','2021-06-10 19:12:00'),(81,NULL,60,'Eneje Martha Amuchechukwu','martha.eneje.235108@unn.edu.ng','Baking','08162483079','2021-06-10 19:38:44','2021-06-10 19:38:44'),(82,NULL,61,'Abraham Chukwuka','abrahamchukwuka323@gmail.com','Designing','09054776001','2021-06-10 22:07:45','2021-06-10 22:07:45'),(83,NULL,62,'Nwokenaka Nnamdi','Nnamdihenry667@gmail.com','Bead making','07056290723','2021-06-10 22:51:13','2021-06-10 22:51:13'),(84,NULL,63,'Aniebonam Blessing','blessingeorge18@gmail.com','Creative thinking skill, critical thinking skills, innovative skill and digital skill','07064998757','2021-06-11 01:20:48','2021-06-11 01:20:48'),(85,NULL,63,'Ugwanyi Favor','favouronuabuchi79@gmail.com','Problem solving skills, IT skill, digital skill.','08103403679','2021-06-11 01:20:48','2021-06-11 01:20:48'),(86,NULL,64,'Eleje Ejike Joel','emmanueljeceb@gmail.com','Entrepreneur','9067009149','2021-06-11 04:29:33','2021-06-11 04:29:33'),(87,NULL,65,'Okike chioma goodness','okikeoma96@gmail.com','Entrepreneurship and management','09081501000','2021-06-11 08:19:10','2021-06-11 08:19:10'),(88,NULL,66,'Awharitoma Collins','Awharitoma.Collins96@gmail.com','ICT and Electronic gadgets repairs','09024578505','2021-06-11 11:59:38','2021-06-11 11:59:38'),(89,NULL,66,'Martins Abigail','martinsabigailaeerex@gmail.com','Creative writer','08082378056','2021-06-11 11:59:38','2021-06-11 11:59:38'),(90,NULL,66,'Ngozichukwu Gospel','emmanuelgospel1236@gmail.com','AutoCAD','08033063320','2021-06-11 11:59:38','2021-06-11 11:59:38'),(91,NULL,66,'Ita Victor Ukela','vectorfusion7@gmail.com','Mechanical Systems technician, Researcher and Inventor','09039294982','2021-06-11 11:59:38','2021-06-11 11:59:38'),(92,NULL,67,'Ijoma Joseph Chinagorom','josephijoma@gmail.com','Graphics design, etc','08137053842','2021-06-12 19:09:33','2021-06-12 19:09:33'),(93,NULL,67,'Okoye Christabel','bellemarch1968@gmail.com','Public speaking','07081865007','2021-06-12 19:09:33','2021-06-12 19:09:33'),(94,NULL,68,'No team member yet','chidera.aninze.249647@unn.edu.ng','Research work','09046850423','2021-06-12 21:30:57','2021-06-12 21:30:57'),(95,NULL,69,'No team member yet','chidera.aninze.249647@unn.edu.ng','Research work','09046850423','2021-06-12 21:33:28','2021-06-12 21:33:28'),(96,NULL,70,'Ekwueme Alexandra Chioma','jovitauchenna1997@gmail.com','Decorations','08136800483','2021-06-13 15:53:31','2021-06-13 15:53:31'),(97,NULL,70,'Ojobor Julieth Nnenna','julietnnenna95@gmail.com','Catering services','08102684683','2021-06-13 15:53:31','2021-06-13 15:53:31'),(98,NULL,71,'okpara Raphael','marachukwuopara@gmailcom','computer literate','07011632589','2021-06-13 19:51:38','2021-06-13 19:51:38'),(99,NULL,71,'Okafor David','davidokaforsmart18@gmail.com','auditor','08134667054','2021-06-13 19:51:38','2021-06-13 19:51:38'),(100,NULL,72,'Nwafor Livinus Anayo','livinusanayo96@gmail.com','Software Programming','08107905404','2021-06-18 22:35:47','2021-06-18 22:35:47'),(101,NULL,73,'Onoja Godswill Onoja','onojagodswill@gmail.com','Computer programming & hardware development','08130488508','2021-07-01 23:15:04','2021-07-01 23:15:04'),(103,NULL,75,'Shedrack Ekpegbue','shedrackekpegbue@sofegroup.com','Blockchain analyst and business management','09034201114','2021-08-31 10:01:22','2021-08-31 10:01:22'),(104,NULL,75,'Stanley Oguguo','stanleyoguguo@sofegroup.com','Programming','08170375147','2021-08-31 10:01:22','2021-08-31 10:01:22'),(105,NULL,75,'Elom, Esther','estherelom@sofegroup.com','Project Management and data analyst','07088982615','2021-08-31 10:01:22','2021-08-31 10:01:22'),(106,NULL,75,'Peter Omeliko','peteromeliko@sofegroup.com','Crypto trader and analyst','09031811267','2021-08-31 10:01:22','2021-08-31 10:01:22');
/*!40000 ALTER TABLE `team_members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'default.png',
  `about` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin User',NULL,'admin@admin.com',NULL,'default.png',NULL,'$2y$10$FnIUsrBv5QTRpB5.lvu1mOam9l43S6SPzo..j5wFowwdIlzYWr83a',NULL,'2021-04-26 15:36:36','2021-04-26 15:36:36'),(2,'Author User',NULL,'author@author.com',NULL,'default.png',NULL,'$2y$10$vx9bXvm5/gLS6CRoKt3rTeK8WN153O9lnU4.h5Nvf2G2c7ia6/Oxe',NULL,'2021-04-26 15:36:36','2021-04-26 15:36:36'),(3,'Generic User',NULL,'user@user.com',NULL,'default.png',NULL,'$2y$10$1iEsfwUmAvi36bmWRBLcw.rZNm3B3.6OkwbFZOgaHcwtlyo6WS8ba',NULL,'2021-04-26 15:36:36','2021-04-26 15:36:36'),(4,'Madu Daniel',NULL,'maduafamdaniel@gmail.com',NULL,'default.png',NULL,'$2y$10$CjHRkWaF/.Fk1IUkHuPjv..I/X6JFmWntdfa4emm89y82BLjpEPKa',NULL,'2021-04-26 21:36:43','2021-04-26 21:36:43'),(5,'Emmanuel Obije',NULL,'obijeemmanuel2017@gmail.com',NULL,'default.png',NULL,'$2y$10$rZPecqlNmK29sH3EnZM.yu6Q54MPa84bfc9o1aObEUAH0GEjiHN0C',NULL,'2021-05-04 12:55:43','2021-05-04 12:55:43'),(6,'Chisom Benjamin Nwokolo',NULL,'csavourassociates@gmail.com',NULL,'default.png',NULL,'$2y$10$ofJw5z8Wql/HXXksNurWNurDaTG9e/LLnWWjwGdgb35ikfGHrTe62',NULL,'2021-05-12 12:03:57','2021-05-12 12:03:57'),(7,'Chiamaka Onwujuobi',NULL,'lesleytechh@gmail.com',NULL,'default.png',NULL,'$2y$10$9dVT6MEYpeB1IjP2BnE.U.8yhEoE2xeEvcPJdvWdMXc0K58CZ8otC',NULL,'2021-05-12 15:36:32','2021-05-12 15:36:32'),(8,'ELUHAIWE AUGUSTINE',NULL,'eluhaiweaugustine4@gmail.com',NULL,'default.png',NULL,'$2y$10$4rsmHocHkXFr/a8WdyvUhuftXFvLuLwUMt38Qx4B8n30APVnOOf12',NULL,'2021-05-24 11:20:51','2021-05-24 11:20:51'),(9,'Ochi chimuanya',NULL,'ochiprecious23@gmail.com',NULL,'default.png',NULL,'$2y$10$en8G795Dl8g.2MV07w/Xne17yYzOD6j.Rlool0ZSt3LdNU/JEd5li',NULL,'2021-05-24 21:44:31','2021-05-24 21:44:31'),(10,'Amos Ngwu',NULL,'amoschibuikeisgreat@gmail.com',NULL,'default.png',NULL,'$2y$10$VQBzzA8wfTuJqTiflaqZcuPgammh9N1eBrPdPyO2PvzZX5gyxGSPC',NULL,'2021-05-25 00:30:47','2021-05-25 00:30:47'),(11,'Iloka Nadia',NULL,'nadiailoka@gmail.com',NULL,'default.png',NULL,'$2y$10$5pIzILJoRwo0Z/NUx15Nd.Q1/QsdnvJwa2GzUe3cRCtiGp13d7xC.',NULL,'2021-05-25 22:12:23','2021-05-25 22:12:23'),(12,'Godwin chislon',NULL,'chislongodwin@gmail.com',NULL,'default.png',NULL,'$2y$10$a0x4x44QBw9LRY5SsbMP/.cn5O3xHjiYL/iIiKjgw22B/PGsWMx4W',NULL,'2021-05-30 12:57:11','2021-05-30 12:57:11'),(13,'Hycient Onyeukwu',NULL,'onyeukwuhycient@gmail.com',NULL,'default.png',NULL,'$2y$10$Yx.CePcsS7mKXMC1kDQ/OORtBa.nYpc/hdjHTVk5Lh2X9cYKYH/.2',NULL,'2021-06-04 21:40:54','2021-06-04 21:40:54'),(14,'Ejiofor Samuel Chidozie',NULL,'ejioforsamuelchidozie@gmail.com',NULL,'default.png',NULL,'$2y$10$wIvAbYJwdlqhw2Hz8ZuanuVwyv4BWY4c5Yp5XYeZykB24sXDQX5KS',NULL,'2021-06-09 15:07:43','2021-06-09 15:07:43'),(15,'Abraham Eriba',NULL,'eribainc@gmail.com',NULL,'default.png',NULL,'$2y$10$ZpMIYwPKVc2BkQ7Ywg9b2uq7pYPQq2qGBU4DAgTOz4lgptJquAG5S',NULL,'2021-07-03 14:44:12','2021-07-03 14:44:12'),(16,'Gospel Chukwuka Onu','Gospel','unoonugospel@yahoo.com',NULL,'gospel-chukwuka-onu-admin-16-2021-07-07.jpg',NULL,'$2y$10$dPCYoLOGqhpZR02Oqci5seIsjpPiBb1kN3y..OIW2hJox4VgC00Um',NULL,'2021-07-07 14:05:08','2021-07-07 14:09:50'),(17,'OKECHUKWU EMMANUEL',NULL,'emmanuel.okechukwu.249062@unn.edu.ng',NULL,'default.png',NULL,'$2y$10$VfkdPCzAYwuS8W6d2OdlBuvD1xT.w.2u7aPA9dEYTzdE.6/.6uOy.',NULL,'2021-07-17 08:10:04','2021-07-17 08:10:04'),(18,'skyreverylog',NULL,'malinoleg91@mail.ru',NULL,'default.png',NULL,'$2y$10$7Nss07cmOOYLkrkRja3Iq.7M8N3BfiL7Qpe7n3YGHaFyHmjooCXhC',NULL,'2021-08-07 17:10:49','2021-08-07 17:10:49'),(19,'Anarah Peace Oluebubechukwu','Anarah Peace','sweetsouth222@gmail.com',NULL,'default.png','II\'m a web developer and willing to become more than that.','$2y$10$nxmOtSNkG0fIsh4sgJZ7luXECplpRjHQ7iMXC3KYjIWf9X9.HhI6O',NULL,'2021-08-21 06:19:34','2021-08-21 09:57:38'),(20,'Onuh Onyinye',NULL,'onuhonyinye7@gmail.com',NULL,'default.png',NULL,'$2y$10$8NM3yNPRJkDcl16cxYh.1.onB8oMG7moLCdH3AdiYh2dZxxtVlxk2',NULL,'2021-08-25 08:41:27','2021-08-25 08:41:27'),(21,'Obijaju Patrick',NULL,'obijajupatrick@gmail.com',NULL,'default.png',NULL,'$2y$10$54QwzE4TLOX03gKudlp.Qu.kr9.MKnhL8D4xUypD47q3oMV2ExOlu',NULL,'2021-08-31 17:05:38','2021-08-31 17:05:38');
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

-- Dump completed on 2021-09-09 22:25:07

-- MySQL dump 10.13  Distrib 8.0.28, for Linux (x86_64)
--
-- Host: localhost    Database: example_db
-- ------------------------------------------------------
-- Server version	8.0.28-0ubuntu0.20.04.3

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
-- Table structure for table `car_color`
--

DROP TABLE IF EXISTS `car_color`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `car_color` (
  `car_id` int NOT NULL,
  `color_id` int NOT NULL,
  PRIMARY KEY (`car_id`,`color_id`),
  KEY `color_id` (`color_id`),
  CONSTRAINT `car_color_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE,
  CONSTRAINT `car_color_ibfk_2` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `car_color`
--

LOCK TABLES `car_color` WRITE;
/*!40000 ALTER TABLE `car_color` DISABLE KEYS */;
INSERT INTO `car_color` VALUES (1,1),(3,1),(4,1),(6,1),(7,1),(8,1),(9,1),(11,1),(13,1),(1,2),(2,2),(4,2),(6,2),(7,2),(10,2),(11,2),(1,3),(2,3),(3,3),(4,3),(6,3),(9,3),(11,3),(1,4),(3,4),(4,4),(6,4),(7,4),(10,4),(12,4),(1,5),(2,5),(3,5),(5,5),(6,5),(7,5),(9,5),(12,5),(2,6),(5,6),(10,6),(12,6);
/*!40000 ALTER TABLE `car_color` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cars`
--

DROP TABLE IF EXISTS `cars`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cars` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL,
  `old_price` int DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cars`
--

LOCK TABLES `cars` WRITE;
/*!40000 ALTER TABLE `cars` DISABLE KEYS */;
INSERT INTO `cars` VALUES (1,'Seed',1394900,1394901,'/assets/pictures/car_ceed.png',1,'2022-04-07 15:30:28','2022-04-07 15:30:28'),(2,'Cerato',1221900,1821900,'/assets/pictures/car_cerato.png',2,'2022-04-07 15:30:28','2022-04-07 15:30:28'),(3,'K5',1577900,NULL,'/assets/pictures/car_K5-half.png',2,'2022-04-07 15:30:28','2022-04-07 15:30:28'),(4,'K900',4064900,NULL,'/assets/pictures/car_k900.png',2,'2022-04-07 15:30:28','2022-04-07 15:30:28'),(5,'Mohave',3549900,NULL,'/assets/pictures/car_mohave_new.png',4,'2022-04-07 15:30:28','2022-04-07 15:30:28'),(6,'Stinger',2409900,NULL,'/assets/pictures/car_new_stinger.png',3,'2022-04-07 15:30:28','2022-04-07 15:30:28'),(7,'Rio X',969900,NULL,'/assets/pictures/car_rio-x.png',1,'2022-04-07 15:30:28','2022-04-07 15:30:28'),(8,'Rio',849900,855592,'/assets/pictures/car_rio_new.png',2,'2022-04-07 15:30:28','2022-04-07 15:30:28'),(9,'Seltos',1224900,NULL,'/assets/pictures/car_seltos.png',5,'2022-04-07 15:30:28','2022-04-07 15:30:28'),(10,'Sorento',2219900,NULL,'/assets/pictures/car_sorento_new.png',5,'2022-04-07 15:30:28','2022-04-07 15:30:28'),(11,'Soul',1094900,NULL,'/assets/pictures/car_soul.png',5,'2022-04-07 15:30:28','2022-04-07 15:30:28'),(12,'Sportage',1644900,NULL,'/assets/pictures/car_sportage.png',5,'2022-04-07 15:30:28','2022-04-07 15:30:28'),(13,'XСeed',1714900,NULL,'/assets/pictures/car_xceed.png',5,'2022-04-07 15:30:28','2022-04-07 15:30:28'),(14,'Auto',9999999,NULL,NULL,NULL,'2022-04-07 15:55:35','2022-04-07 15:55:35');
/*!40000 ALTER TABLE `cars` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Хэтчбек'),(2,'Седан'),(3,'Лифтбэк'),(4,'Внедорожник'),(5,'Кроссовер'),(6,'Универсал');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colors`
--

DROP TABLE IF EXISTS `colors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `colors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colors`
--

LOCK TABLES `colors` WRITE;
/*!40000 ALTER TABLE `colors` DISABLE KEYS */;
INSERT INTO `colors` VALUES (1,'Белый'),(2,'Красный'),(3,'Синий'),(4,'Серый'),(5,'Черный'),(6,'Розовый');
/*!40000 ALTER TABLE `colors` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-07 18:56:34

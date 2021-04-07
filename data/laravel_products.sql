-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: localhost    Database: laravel
-- ------------------------------------------------------
-- Server version	8.0.22

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
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int NOT NULL,
  `price` double(8,2) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `category_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Jean','L',10,87.50,'1.jpeg','Beautiful Jean',5,'2021-04-07 06:59:34','2021-04-07 06:59:34'),(2,'Brown Pants','M',3,76.40,'2.jpeg','Beautiful Pant',5,'2021-04-07 07:00:32','2021-04-07 07:00:32'),(3,'Blue T-shirt','S',7,20.57,'3.jpeg','Beautiful Blue',1,'2021-04-07 07:01:35','2021-04-07 07:01:35'),(4,'Pink Sweater','XS',23,120.30,'4.jpeg','Beautiful Pink',1,'2021-04-07 07:02:50','2021-04-07 07:02:50'),(5,'Black Pants','L',4,37.23,'5.jpeg','Beautiful Black',5,'2021-04-07 07:03:43','2021-04-07 07:03:43'),(6,'Black Skirt','S',8,18.24,'6.jpeg','Beautiful Black',6,'2021-04-07 07:04:30','2021-04-07 07:04:30'),(7,'White Flip Flops','M',23,10.00,'7.jpeg','Beautiful White',7,'2021-04-07 07:05:20','2021-04-07 07:05:20'),(8,'Black Cap','M',10,15.20,'8.jpeg','Beautiful Cap',7,'2021-04-07 07:06:03','2021-04-07 07:06:03'),(9,'Black Glasses','S',10,52.30,'9.jpeg','Beautiful Glasses',7,'2021-04-07 07:06:54','2021-04-07 07:06:54'),(10,'Black Shoes','M',20,120.00,'10.jpeg','Beautiful Shoes',3,'2021-04-07 07:07:43','2021-04-07 07:07:43');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-04-06 21:42:40

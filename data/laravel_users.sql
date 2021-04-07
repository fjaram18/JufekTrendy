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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Jua','juancami98.11@hotmail.com',NULL,'admin','$2y$10$PwF8HRK0FqL4GM4ZqVblc.VYdvfdX7/hH4leSO0rsAdGrOEJOpMLe',NULL,'2021-04-06 22:11:20','2021-04-06 22:11:20'),(2,'Pedro Perez','test1@hotmail.com',NULL,'admin','$2y$10$vT0wCfhBmH1W4PNp5OGxmeH49guERMVlkMWw7YEo622T1IaP7uj8a',NULL,'2021-04-07 06:42:52','2021-04-07 06:42:52'),(3,'Batman','batman@gamil.com',NULL,'user','$2y$10$1xEkqlevg30jT3oRsdr9ae0nJcWNEoYjlEJ6Q4maNWca0rRjg82qO',NULL,'2021-04-07 06:43:38','2021-04-07 06:43:38'),(4,'Barry Alen','flash@hotmail.com',NULL,'user','$2y$10$H4KJxNozNdhUQKsYO0QwpOYvxXH6jszYbxHcl5S/iIXOoSzokB0.i',NULL,'2021-04-07 06:44:09','2021-04-07 06:44:09'),(5,'Voldemort','eltenebroso@hotmail.com',NULL,'user','$2y$10$mLjubMvA6mMu0YADvTSk9.QEd5k0UiyeJK7mJqOkjZlQTwuklIExG',NULL,'2021-04-07 06:44:51','2021-04-07 06:44:51'),(6,'Monkey D Luffy','lufffy@gmail.com',NULL,'user','$2y$10$r5ZL7RES3cOnr/iFAhZheOkmf/06F1pfPJ3PnQjRFxU8wgcUGZMeO',NULL,'2021-04-07 06:45:47','2021-04-07 06:45:47'),(7,'Daddy Yankee','daddy@gmail.com',NULL,'user','$2y$10$zQ0df1i465Bz1tR.Zfy3gOPj0IQiVN./kWiRzNxPdCsyuNUH5DrXO',NULL,'2021-04-07 06:46:25','2021-04-07 06:46:25');
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

-- Dump completed on 2021-04-06 21:42:40

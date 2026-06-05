-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: laundry_db
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

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
-- Current Database: `laundry_db`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `laundry_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `laundry_db`;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2026_05_13_124539_create_users_table',1),(2,'2026_05_14_155448_create_sessions_table',1),(3,'2026_05_23_041049_create_user_addresses_table',1),(4,'2026_05_27_091832_create_mitra_laundries_table',2),(5,'2026_05_27_092016_create_mitra_store_photos_table',2),(6,'2026_05_27_092043_create_mitra_business_photos_table',2),(7,'2026_05_27_094936_modify_mitra_laundries_nullable',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mitra_business_photos`
--

DROP TABLE IF EXISTS `mitra_business_photos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mitra_business_photos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `mitra_laundry_id` bigint(20) unsigned NOT NULL,
  `photo` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mitra_business_photos_mitra_laundry_id_foreign` (`mitra_laundry_id`),
  CONSTRAINT `mitra_business_photos_mitra_laundry_id_foreign` FOREIGN KEY (`mitra_laundry_id`) REFERENCES `mitra_laundries` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mitra_business_photos`
--

LOCK TABLES `mitra_business_photos` WRITE;
/*!40000 ALTER TABLE `mitra_business_photos` DISABLE KEYS */;
/*!40000 ALTER TABLE `mitra_business_photos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mitra_laundries`
--

DROP TABLE IF EXISTS `mitra_laundries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mitra_laundries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `owner_name` varchar(255) NOT NULL,
  `store_name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `village` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `postal_code` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `ktp` varchar(255) DEFAULT NULL,
  `nib` varchar(255) DEFAULT NULL,
  `npwp` varchar(255) DEFAULT NULL,
  `status` enum('draft','pending','approved','rejected') NOT NULL DEFAULT 'draft',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mitra_laundries_user_id_foreign` (`user_id`),
  CONSTRAINT `mitra_laundries_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mitra_laundries`
--

LOCK TABLES `mitra_laundries` WRITE;
/*!40000 ALTER TABLE `mitra_laundries` DISABLE KEYS */;
INSERT INTO `mitra_laundries` VALUES (1,3,'adzril','cuci bersih','zril@upi.edu','0811','cucian',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'draft','2026-05-27 03:04:04','2026-05-27 03:04:04'),(2,3,'adzril','cuci bersih','zril@upi.edu','0811','a','jl','jl','jl','jl','jl','jl',NULL,NULL,NULL,NULL,'draft','2026-05-27 03:08:32','2026-05-27 03:09:06'),(3,3,'adzril','cuci bersih','zril@upi.edu','0811','zz',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'draft','2026-05-27 05:47:14','2026-05-27 05:47:14');
/*!40000 ALTER TABLE `mitra_laundries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mitra_store_photos`
--

DROP TABLE IF EXISTS `mitra_store_photos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mitra_store_photos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `mitra_laundry_id` bigint(20) unsigned NOT NULL,
  `photo` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mitra_store_photos_mitra_laundry_id_foreign` (`mitra_laundry_id`),
  CONSTRAINT `mitra_store_photos_mitra_laundry_id_foreign` FOREIGN KEY (`mitra_laundry_id`) REFERENCES `mitra_laundries` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mitra_store_photos`
--

LOCK TABLES `mitra_store_photos` WRITE;
/*!40000 ALTER TABLE `mitra_store_photos` DISABLE KEYS */;
/*!40000 ALTER TABLE `mitra_store_photos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('LSxpcWy6nstiuZbQbaoPppQuFAciEOh3mZ7ZzVn2',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiZldCUmRSalpFZ2NPWFlqZVRaM3dUT2tuZ1N5ODd0bHVWamROdVZHTSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1779851267),('No1CXGpZHraFhVUx724A5FUND1QjjH5HafNIXfrs',3,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaXdMb1U1VWdLOE1pNVk3V0hzdThCWVRTcnR2TjhkYkd0QmJuY0p4dyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9taXRyYS9yZWdpc3Rlci9zdGVwLTIvMiI7czo1OiJyb3V0ZSI7czoyMDoibWl0cmEucmVnaXN0ZXIuc3RlcDIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO30=',1779876675),('uEllyJT795Yn8LYV8D1rZ1ZjSqp4DedfDYu3mmcc',2,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiV2FFcXBudG5VaFQ0d0o5SWxocGExa0JzaDUwVlNsbGhHMUthOHpwVSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9taXRyYS9sYXlhbmFuLXNheWEiO3M6NToicm91dGUiO3M6MTM6Im1pdHJhLmxheWFuYW4iO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=',1779812908),('xlyxkD2fuYiW0t0ptGw0JImZjPn5qOfBJoj3uAPl',3,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoieFpYR0xySjFyNGttc3hRc2IzMzRGckk2NDJEZ2M0OG82anhFTFdlNiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0NToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL21pdHJhL3JlZ2lzdGVyL3N0ZXAtMi8yIjt9czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9taXRyYS9yZWdpc3Rlci9zdGVwLTIvMyI7czo1OiJyb3V0ZSI7czoyMDoibWl0cmEucmVnaXN0ZXIuc3RlcDIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO30=',1779888664);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_addresses`
--

DROP TABLE IF EXISTS `user_addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_addresses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `label` varchar(255) NOT NULL,
  `recipient_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `province` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `postal_code` varchar(255) DEFAULT NULL,
  `latitude` decimal(10,7) DEFAULT NULL,
  `longitude` decimal(10,7) DEFAULT NULL,
  `is_primary` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_addresses_user_id_foreign` (`user_id`),
  CONSTRAINT `user_addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_addresses`
--

LOCK TABLES `user_addresses` WRITE;
/*!40000 ALTER TABLE `user_addresses` DISABLE KEYS */;
INSERT INTO `user_addresses` VALUES (2,4,'Kios','zril','08112222','Jalan Singosari Raya, Jalan Tarumanegara Raya, RW 015 Kelurahan Mekarjaya, Kecamatan Sukmajaya, Mekar Jaya, Depok, West Java, Java, 16411, Indonesia','Mekar','Depok 2','16412',-6.3900040,106.8356480,1,'2026-05-25 09:54:17','2026-05-25 10:38:24');
/*!40000 ALTER TABLE `user_addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `role` enum('admin','mitra','user') NOT NULL DEFAULT 'user',
  `status` enum('active','blocked') NOT NULL DEFAULT 'active',
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_phone_unique` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','admin@gmail.com','081234567890','admin','active','$2y$12$4g2AKkUBmUIKc.1oJfPpxe5zZOGApjCvrszMPkiAkCa90lW7pvFEi',NULL,'2026-05-25 09:33:59','2026-05-25 09:33:59'),(2,'Mitra','mitra@gmail.com','081111111111','mitra','active','$2y$12$hHmHhgcPpGFEacPRo0/R7uU6Mgv6BoSAwvGgWXsToQWn/tdC3bUFq',NULL,'2026-05-25 09:33:59','2026-05-25 09:33:59'),(3,'Customer','user@gmail.com','082222222222','user','active','$2y$12$0WvmXnw2kuYWiPMagzgBAu6zxJnp8/HwQqicj266prioGQuyYChaO',NULL,'2026-05-25 09:34:00','2026-05-25 09:34:00'),(4,'adzril','r@gmail.com','11','user','active','$2y$12$JFcIoPInDMe9br6SGlU0kesf78heMsbrrJLc46exLkK9ag48A.DCu',NULL,'2026-05-25 09:37:42','2026-05-25 09:37:42');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'laundry_db'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-05-28 14:05:16

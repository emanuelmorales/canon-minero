-- MySQL dump 10.13  Distrib 8.0.44, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: canonminero
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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
-- Table structure for table `estado_exps`
--

DROP TABLE IF EXISTS `estado_exps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estado_exps` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado_exps`
--

LOCK TABLES `estado_exps` WRITE;
/*!40000 ALTER TABLE `estado_exps` DISABLE KEYS */;
INSERT INTO `estado_exps` VALUES (1,'Sin mensura','2026-02-05 04:57:14','2026-02-05 04:57:14'),(2,'Mensura habilitada','2026-02-05 04:57:31','2026-02-05 04:57:31'),(3,'Mensura Aprobada','2026-02-06 05:26:02','2026-02-06 05:26:02');
/*!40000 ALTER TABLE `estado_exps` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
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
-- Table structure for table `grupo_mineros`
--

DROP TABLE IF EXISTS `grupo_mineros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grupo_mineros` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupo_mineros`
--

LOCK TABLES `grupo_mineros` WRITE;
/*!40000 ALTER TABLE `grupo_mineros` DISABLE KEYS */;
INSERT INTO `grupo_mineros` VALUES (1,'No pertenece a Grupo Minero','2026-02-05 04:58:10','2026-02-05 06:20:45'),(2,'Aguilar','2026-02-05 04:58:29','2026-02-05 06:20:11');
/*!40000 ALTER TABLE `grupo_mineros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `localidades`
--

DROP TABLE IF EXISTS `localidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `localidades` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `localidades`
--

LOCK TABLES `localidades` WRITE;
/*!40000 ALTER TABLE `localidades` DISABLE KEYS */;
INSERT INTO `localidades` VALUES (1,'ABRA PAMPA','2026-02-05 02:01:01','2026-02-05 02:01:01'),(2,'SAN SALVADOR DE JUJUY','2026-02-05 02:01:01','2026-02-05 02:01:01'),(3,'EL CARMEN','2026-02-05 02:01:01','2026-02-05 02:01:01'),(4,'HUMAHUACA','2026-02-05 02:01:01','2026-02-05 02:01:01'),(5,'LIBERTADOR GENERAL SAN MARTÍN','2026-02-05 02:01:01','2026-02-05 02:01:01'),(6,'PALPALÁ','2026-02-05 02:01:01','2026-02-05 02:01:01'),(7,'RINCONADA','2026-02-05 02:01:01','2026-02-05 02:01:01'),(8,'SAN ANTONIO','2026-02-05 02:01:01','2026-02-05 02:01:01'),(9,'SAN PEDRO DE JUJUY','2026-02-05 02:01:01','2026-02-05 02:01:01'),(10,'SANTA CATALINA','2026-02-05 02:01:01','2026-02-05 02:01:01'),(11,'SUSQUES','2026-02-05 02:01:01','2026-02-05 02:01:01'),(12,'TILCARA','2026-02-05 02:01:01','2026-02-05 02:01:01'),(13,'TUMBAYA','2026-02-05 02:01:01','2026-02-05 02:01:01'),(14,'VALLE GRANDE','2026-02-05 02:01:01','2026-02-05 02:01:01'),(15,'LA QUIACA','2026-02-05 02:01:01','2026-02-05 02:01:01');
/*!40000 ALTER TABLE `localidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2026_02_04_021245_create_localidades_table',1),(6,'2026_02_04_023442_create_grupo_mineros_table',1),(7,'2026_02_04_025615_create_minerals_table',1),(8,'2026_02_04_030412_create_propietarios_table',1),(9,'2026_02_04_210922_create_estado_exps_table',1),(10,'2026_02_05_021454_create_minas_table',2),(13,'2026_02_05_214833_create_pagos_table',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `minas`
--

DROP TABLE IF EXISTS `minas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `minas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `grupominero_id` bigint(20) unsigned NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `minas_grupominero_id_foreign` (`grupominero_id`),
  CONSTRAINT `minas_grupominero_id_foreign` FOREIGN KEY (`grupominero_id`) REFERENCES `grupo_mineros` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `minas`
--

LOCK TABLES `minas` WRITE;
/*!40000 ALTER TABLE `minas` DISABLE KEYS */;
INSERT INTO `minas` VALUES (1,1,'prueba','2026-02-05 06:12:54','2026-02-05 06:12:54'),(2,2,'Prueba2','2026-02-05 06:18:48','2026-02-05 06:18:48'),(4,2,'prueba3','2026-02-05 06:22:17','2026-02-06 03:05:34'),(5,1,'Prueba 4','2026-02-06 03:05:10','2026-02-06 03:05:51');
/*!40000 ALTER TABLE `minas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `minerals`
--

DROP TABLE IF EXISTS `minerals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `minerals` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `minerals`
--

LOCK TABLES `minerals` WRITE;
/*!40000 ALTER TABLE `minerals` DISABLE KEYS */;
INSERT INTO `minerals` VALUES (1,'Diseminado Plata- Plomo- Zinc','2026-02-05 05:02:26','2026-02-05 05:02:26'),(2,'Hierro-Zinc-Plomo-Plata','2026-02-05 05:02:39','2026-02-05 05:02:39'),(3,'Plomo-Plata-Ziinc','2026-02-05 05:02:52','2026-02-05 05:02:52');
/*!40000 ALTER TABLE `minerals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagos`
--

DROP TABLE IF EXISTS `pagos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pagos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `expte` varchar(255) NOT NULL,
  `localidad_id` bigint(20) unsigned NOT NULL,
  `mina_id` bigint(20) unsigned NOT NULL,
  `mineral_id` bigint(20) unsigned NOT NULL,
  `propietario_id` bigint(20) unsigned NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `pertenencia` varchar(255) NOT NULL,
  `superficie` decimal(10,2) NOT NULL,
  `estado_exp_id` bigint(20) unsigned NOT NULL,
  `anioPago` year(4) NOT NULL,
  `monto` decimal(15,2) NOT NULL,
  `detalle` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pagos_localidad_id_foreign` (`localidad_id`),
  KEY `pagos_mina_id_foreign` (`mina_id`),
  KEY `pagos_mineral_id_foreign` (`mineral_id`),
  KEY `pagos_propietario_id_foreign` (`propietario_id`),
  KEY `pagos_estado_exp_id_foreign` (`estado_exp_id`),
  CONSTRAINT `pagos_estado_exp_id_foreign` FOREIGN KEY (`estado_exp_id`) REFERENCES `estado_exps` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pagos_localidad_id_foreign` FOREIGN KEY (`localidad_id`) REFERENCES `localidades` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pagos_mina_id_foreign` FOREIGN KEY (`mina_id`) REFERENCES `minas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pagos_mineral_id_foreign` FOREIGN KEY (`mineral_id`) REFERENCES `minerals` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pagos_propietario_id_foreign` FOREIGN KEY (`propietario_id`) REFERENCES `propietarios` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagos`
--

LOCK TABLES `pagos` WRITE;
/*!40000 ALTER TABLE `pagos` DISABLE KEYS */;
INSERT INTO `pagos` VALUES (1,'2026-02-02','2526',11,5,2,2,'3','36',1800.00,1,2026,1800000.00,'pago 1º semestre','2026-02-06 05:50:21','2026-02-06 05:58:16'),(2,'2026-02-05','4567',7,4,1,1,'1','3',63.00,3,2025,2600000.00,'1º y 2º semestre pagado','2026-02-06 05:56:20','2026-02-06 05:56:20');
/*!40000 ALTER TABLE `pagos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `propietarios`
--

DROP TABLE IF EXISTS `propietarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `propietarios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `propietarios`
--

LOCK TABLES `propietarios` WRITE;
/*!40000 ALTER TABLE `propietarios` DISABLE KEYS */;
INSERT INTO `propietarios` VALUES (1,'CIA MINERA AGUILAR S.A.','2026-02-05 05:03:44','2026-02-05 05:03:44'),(2,'MINERA EXAR SA','2026-02-05 05:04:08','2026-02-05 05:05:18'),(3,'MINERA JEMSE','2026-02-05 05:04:48','2026-02-05 05:04:48');
/*!40000 ALTER TABLE `propietarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin@admin.com',NULL,'$2y$12$VNAPxoVJtsKwgoKyy7b.I.9rKrBXnt3cMWvgHqq1BB277C1PRuQAO',NULL,'2026-02-05 04:56:03','2026-02-05 04:56:03');
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

-- Dump completed on 2026-02-06  0:29:03

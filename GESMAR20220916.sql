-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: localhost    Database: gesmar
-- ------------------------------------------------------
-- Server version	8.0.29

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
-- Table structure for table `batiments`
--

DROP TABLE IF EXISTS `batiments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `batiments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `batiments_site_id_foreign` (`site_id`),
  CONSTRAINT `batiments_site_id_foreign` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `batiments`
--

LOCK TABLES `batiments` WRITE;
/*!40000 ALTER TABLE `batiments` DISABLE KEYS */;
INSERT INTO `batiments` VALUES (1,'BAT-000001','BAT A',1,'2022-08-11 12:58:24','2022-09-13 13:49:17');
/*!40000 ALTER TABLE `batiments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `caisses`
--

DROP TABLE IF EXISTS `caisses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `caisses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `somme_total_paiement_effectuer` int DEFAULT NULL,
  `somme_ouverture` int DEFAULT NULL,
  `somme_fermeture` int DEFAULT NULL,
  `date_heure_ouverture` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_heure_fermeture` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_payement` date DEFAULT NULL,
  `somme_payer` int DEFAULT NULL,
  `motif` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commenteur` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mode_paiement` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banque` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statut` tinyint(1) NOT NULL DEFAULT '0',
  `loyer_id` bigint unsigned DEFAULT NULL,
  `ciepaiement_id` bigint unsigned DEFAULT NULL,
  `sodecipaiement_id` bigint unsigned DEFAULT NULL,
  `gazpaiement_id` bigint unsigned DEFAULT NULL,
  `proprietepaiement_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `commerciaux_id` int DEFAULT NULL,
  `locataire_id` int DEFAULT NULL,
  `operation` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT '1' COMMENT '1:depot\n2:retrait',
  PRIMARY KEY (`id`),
  KEY `caisses_loyer_id_foreign` (`loyer_id`),
  KEY `caisses_ciepaiement_id_foreign` (`ciepaiement_id`),
  KEY `caisses_sodecipaiement_id_foreign` (`sodecipaiement_id`),
  KEY `caisses_gazpaiement_id_foreign` (`gazpaiement_id`),
  KEY `caisses_proprietepaiement_id_foreign` (`proprietepaiement_id`),
  CONSTRAINT `caisses_ciepaiement_id_foreign` FOREIGN KEY (`ciepaiement_id`) REFERENCES `ciepaiements` (`id`) ON DELETE CASCADE,
  CONSTRAINT `caisses_gazpaiement_id_foreign` FOREIGN KEY (`gazpaiement_id`) REFERENCES `gazpaiements` (`id`) ON DELETE CASCADE,
  CONSTRAINT `caisses_loyer_id_foreign` FOREIGN KEY (`loyer_id`) REFERENCES `loyers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `caisses_proprietepaiement_id_foreign` FOREIGN KEY (`proprietepaiement_id`) REFERENCES `proprietepaiements` (`id`) ON DELETE CASCADE,
  CONSTRAINT `caisses_sodecipaiement_id_foreign` FOREIGN KEY (`sodecipaiement_id`) REFERENCES `sodecipaiements` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caisses`
--

LOCK TABLES `caisses` WRITE;
/*!40000 ALTER TABLE `caisses` DISABLE KEYS */;
INSERT INTO `caisses` VALUES (1,0,0,0,'2022-08-11 16:16:10',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1'),(2,1000000,NULL,NULL,NULL,NULL,'2022-08-11',1000000,'NEANT',NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1'),(3,1010000,NULL,NULL,NULL,NULL,'2022-08-11',10000,NULL,NULL,NULL,NULL,0,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1'),(4,1022264,NULL,NULL,NULL,NULL,'2022-08-16',12264,NULL,NULL,NULL,NULL,0,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1'),(5,1022264,NULL,NULL,NULL,NULL,'2022-08-16',NULL,NULL,NULL,NULL,NULL,0,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1'),(6,1022264,NULL,NULL,NULL,NULL,'2022-08-16',NULL,NULL,NULL,NULL,NULL,0,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1'),(7,1000000,1000000,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,'2022-08-17 12:39:04','2022-08-17 12:39:04',NULL,NULL,'1'),(8,1035550,NULL,NULL,NULL,NULL,'2022-09-07',13286,NULL,NULL,NULL,NULL,0,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1'),(9,1051902,NULL,NULL,NULL,NULL,'2022-09-07',16352,NULL,NULL,NULL,NULL,0,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1'),(10,1051902,NULL,NULL,NULL,NULL,'2022-09-07',NULL,NULL,NULL,NULL,NULL,0,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1'),(11,1051902,NULL,NULL,NULL,NULL,'2022-09-07',NULL,NULL,NULL,NULL,NULL,0,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1'),(12,1051902,NULL,NULL,NULL,NULL,'2022-09-07',NULL,NULL,NULL,NULL,NULL,0,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1'),(13,1051902,NULL,NULL,NULL,NULL,'2022-09-07',NULL,NULL,NULL,NULL,NULL,0,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1'),(14,1068254,NULL,NULL,NULL,NULL,'2022-09-07',16352,NULL,NULL,NULL,NULL,0,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1'),(15,1086650,NULL,NULL,NULL,NULL,'2022-09-07',18396,NULL,NULL,NULL,NULL,0,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1'),(16,1097892,NULL,NULL,NULL,NULL,'2022-09-07',11242,NULL,NULL,NULL,NULL,0,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1'),(17,1111178,NULL,NULL,NULL,NULL,'2022-09-07',13286,NULL,NULL,NULL,NULL,0,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'1'),(18,1124464,NULL,NULL,NULL,NULL,'2022-09-07',13286,NULL,NULL,NULL,NULL,0,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'1'),(20,1175564,NULL,NULL,NULL,NULL,'2022-09-07',30660,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,'1'),(21,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,'2022-09-09 10:12:08','2022-09-09 10:12:08',NULL,NULL,'1'),(22,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,'2022-09-09 10:49:13','2022-09-09 10:49:13',NULL,NULL,'1'),(23,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,'2022-09-09 12:33:59','2022-09-09 12:33:59',NULL,NULL,'1'),(24,1188064,NULL,NULL,NULL,NULL,'2022-09-09',12500,NULL,NULL,NULL,NULL,0,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1'),(26,1388064,NULL,NULL,NULL,NULL,'2022-09-09',200000,'Neant',NULL,NULL,NULL,0,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1'),(27,1588064,NULL,NULL,NULL,NULL,'2022-09-09',200000,NULL,NULL,NULL,NULL,0,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1'),(28,1638064,NULL,NULL,NULL,NULL,'2022-09-09',50000,NULL,NULL,NULL,NULL,0,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1'),(29,1656460,NULL,NULL,NULL,NULL,'2022-09-11',18396,NULL,NULL,NULL,NULL,0,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1'),(30,1668724,NULL,NULL,NULL,NULL,'2022-09-11',12264,NULL,NULL,NULL,NULL,0,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1'),(31,1671790,NULL,NULL,NULL,NULL,'2022-09-11',3066,NULL,NULL,NULL,NULL,0,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'1'),(32,1685076,NULL,NULL,NULL,NULL,'2022-09-11',13286,NULL,NULL,NULL,NULL,0,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'1'),(34,1713692,NULL,NULL,NULL,NULL,'2022-09-11',15330,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,'1'),(35,NULL,NULL,NULL,NULL,NULL,'2022-09-12',200,NULL,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,'2022-09-12 20:37:17','2022-09-12 20:37:17',5,NULL,'1'),(36,NULL,NULL,NULL,NULL,NULL,'2022-09-12',200,NULL,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,'2022-09-12 20:37:17','2022-09-12 20:37:17',5,1,'1'),(37,NULL,NULL,NULL,NULL,NULL,'2022-09-15',200,NULL,NULL,NULL,NULL,1,1,NULL,NULL,NULL,NULL,NULL,NULL,5,1,'1'),(38,NULL,NULL,NULL,NULL,NULL,'2022-09-15',200,NULL,NULL,NULL,NULL,1,1,NULL,NULL,NULL,NULL,'2022-09-15 09:49:39','2022-09-15 09:49:39',5,1,'1'),(39,NULL,NULL,NULL,NULL,NULL,'2022-09-15',200,NULL,NULL,NULL,NULL,1,1,NULL,NULL,NULL,NULL,'2022-09-15 09:50:18','2022-09-15 09:50:18',5,1,'1'),(40,NULL,NULL,NULL,NULL,NULL,'2022-09-15',25000,NULL,NULL,NULL,NULL,1,1,NULL,NULL,NULL,NULL,'2022-09-15 09:50:18','2022-09-15 09:50:18',NULL,2,'2'),(41,NULL,NULL,NULL,NULL,NULL,'2022-09-15',80000,NULL,NULL,NULL,NULL,1,1,NULL,NULL,NULL,NULL,'2022-09-15 09:50:18','2022-09-15 09:50:18',NULL,2,'2');
/*!40000 ALTER TABLE `caisses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ciepaiements`
--

DROP TABLE IF EXISTS `ciepaiements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ciepaiements` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `index_dbt` int DEFAULT NULL,
  `index_fn` int DEFAULT NULL,
  `date_payement` date DEFAULT NULL,
  `somme_payer` int DEFAULT NULL,
  `somme_restant` int DEFAULT NULL,
  `mois_payer` date DEFAULT NULL,
  `mode_paiement` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banque` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_locataire` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_contrat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `compteur_cie_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ciepaiements_compteur_cie_id_foreign` (`compteur_cie_id`),
  CONSTRAINT `ciepaiements_compteur_cie_id_foreign` FOREIGN KEY (`compteur_cie_id`) REFERENCES `compteur_cies` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ciepaiements`
--

LOCK TABLES `ciepaiements` WRITE;
/*!40000 ALTER TABLE `ciepaiements` DISABLE KEYS */;
INSERT INTO `ciepaiements` VALUES (1,NULL,2,21,'2022-08-11',10000,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(2,NULL,21,33,'2022-08-16',12264,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(3,NULL,NULL,NULL,'2022-08-16',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(4,NULL,NULL,NULL,'2022-08-16',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(5,NULL,12,25,'2022-09-07',13286,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(6,NULL,9,25,'2022-09-07',16352,NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),(7,NULL,NULL,NULL,'2022-09-07',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(8,NULL,NULL,NULL,'2022-09-07',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(9,NULL,NULL,NULL,'2022-09-07',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(10,NULL,NULL,NULL,'2022-09-07',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(11,NULL,25,41,'2022-09-07',16352,NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),(12,NULL,0,18,'2022-09-07',18396,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(13,NULL,4,15,'2022-09-07',11242,0,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(14,NULL,15,33,'2022-09-11',18396,0,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(15,NULL,33,45,'2022-09-11',12264,0,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL);
/*!40000 ALTER TABLE `ciepaiements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `commerciauxes`
--

DROP TABLE IF EXISTS `commerciauxes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `commerciauxes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `denomination` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse_postale` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ville` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statut` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `encaissement` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commerciauxes`
--

LOCK TABLES `commerciauxes` WRITE;
/*!40000 ALTER TABLE `commerciauxes` DISABLE KEYS */;
INSERT INTO `commerciauxes` VALUES (1,'Test','Boris','Testeur','A','Abobo','Abidjan','0201040506','1',1000,NULL,NULL),(2,'COMMERCIO-1','Koffi','Nana','B','Yop','Abidjan','0105060809','1',NULL,NULL,'2022-09-11 17:23:45'),(5,'COMMERCIO-000005','Brou','Yaya','A','Marc','Abidjan','0605045070','1',NULL,'2022-09-11 16:34:09','2022-09-12 18:34:38');
/*!40000 ALTER TABLE `commerciauxes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compteur_cie_contrat`
--

DROP TABLE IF EXISTS `compteur_cie_contrat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `compteur_cie_contrat` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `contrat_id` bigint unsigned DEFAULT NULL,
  `compteur_cie_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `compteur_cie_contrat_contrat_id_foreign` (`contrat_id`),
  KEY `compteur_cie_contrat_compteur_cie_id_foreign` (`compteur_cie_id`),
  CONSTRAINT `compteur_cie_contrat_compteur_cie_id_foreign` FOREIGN KEY (`compteur_cie_id`) REFERENCES `compteur_cies` (`id`) ON DELETE CASCADE,
  CONSTRAINT `compteur_cie_contrat_contrat_id_foreign` FOREIGN KEY (`contrat_id`) REFERENCES `contrats` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compteur_cie_contrat`
--

LOCK TABLES `compteur_cie_contrat` WRITE;
/*!40000 ALTER TABLE `compteur_cie_contrat` DISABLE KEYS */;
INSERT INTO `compteur_cie_contrat` VALUES (1,1,1,'2022-08-11 13:13:17','2022-08-11 13:13:17');
/*!40000 ALTER TABLE `compteur_cie_contrat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compteur_cies`
--

DROP TABLE IF EXISTS `compteur_cies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `compteur_cies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `denomination` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `index_dbt` int DEFAULT NULL,
  `index_fn` int DEFAULT NULL,
  `som_total` int DEFAULT NULL,
  `unite_index` int DEFAULT NULL,
  `somme_restant` int DEFAULT NULL,
  `adresse_gps` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `libelle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mois_payer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statut` tinyint(1) DEFAULT NULL,
  `statut_ordonnacement` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compteur_cies`
--

LOCK TABLES `compteur_cies` WRITE;
/*!40000 ALTER TABLE `compteur_cies` DISABLE KEYS */;
INSERT INTO `compteur_cies` VALUES (1,'compteurCie-000001','CIE 1',45,57,0,NULL,0,'EMPL A','CIE 1','2022-09-13',1,0,'2022-08-11 13:06:32','2022-09-13 10:09:55'),(2,'compteurCie-000002','CIE 2',40,52,NULL,NULL,NULL,'CIE 2',NULL,'2022-09-11',1,0,'2022-09-06 15:42:38','2022-09-13 10:18:42');
/*!40000 ALTER TABLE `compteur_cies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compteur_sodeci_contrat`
--

DROP TABLE IF EXISTS `compteur_sodeci_contrat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `compteur_sodeci_contrat` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `contrat_id` bigint unsigned DEFAULT NULL,
  `compteur_sodeci_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `compteur_sodeci_contrat_contrat_id_foreign` (`contrat_id`),
  KEY `compteur_sodeci_contrat_compteur_sodeci_id_foreign` (`compteur_sodeci_id`),
  CONSTRAINT `compteur_sodeci_contrat_compteur_sodeci_id_foreign` FOREIGN KEY (`compteur_sodeci_id`) REFERENCES `compteur_sodecis` (`id`) ON DELETE CASCADE,
  CONSTRAINT `compteur_sodeci_contrat_contrat_id_foreign` FOREIGN KEY (`contrat_id`) REFERENCES `contrats` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compteur_sodeci_contrat`
--

LOCK TABLES `compteur_sodeci_contrat` WRITE;
/*!40000 ALTER TABLE `compteur_sodeci_contrat` DISABLE KEYS */;
INSERT INTO `compteur_sodeci_contrat` VALUES (1,1,1,'2022-08-11 13:13:17','2022-08-11 13:13:17'),(2,4,1,'2022-09-09 17:46:21','2022-09-09 17:46:21');
/*!40000 ALTER TABLE `compteur_sodeci_contrat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compteur_sodecis`
--

DROP TABLE IF EXISTS `compteur_sodecis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `compteur_sodecis` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `denomination` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `index_dbt` int DEFAULT NULL,
  `index_fn` int DEFAULT NULL,
  `som_total` int DEFAULT NULL,
  `unite_index` int DEFAULT NULL,
  `somme_restant` int DEFAULT NULL,
  `adresse_gps` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `libelle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mois_payer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statut` tinyint(1) DEFAULT NULL,
  `statut_ordonnacement` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compteur_sodecis`
--

LOCK TABLES `compteur_sodecis` WRITE;
/*!40000 ALTER TABLE `compteur_sodecis` DISABLE KEYS */;
INSERT INTO `compteur_sodecis` VALUES (1,'compteurSodeci-000001','SODECI 1',34,55,NULL,NULL,4088,'EMPL A','SODECI 1','2022-09-07',0,0,'2022-08-11 13:07:29','2022-09-13 10:29:40');
/*!40000 ALTER TABLE `compteur_sodecis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contrats`
--

DROP TABLE IF EXISTS `contrats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contrats` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_debut` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `locataire_id` bigint unsigned NOT NULL,
  `code_locataire` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_locataire` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse_postale` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `statut_buro1` tinyint(1) NOT NULL DEFAULT '0',
  `statut_buro2` tinyint(1) NOT NULL DEFAULT '0',
  `statut_buro3` tinyint(1) NOT NULL DEFAULT '0',
  `statut_ordonnacement` tinyint(1) NOT NULL DEFAULT '0',
  `som_cie` int NOT NULL DEFAULT '0',
  `som_sie` int NOT NULL DEFAULT '0',
  `som_gaz` int NOT NULL DEFAULT '0',
  `som_equipement` int NOT NULL DEFAULT '0',
  `som_toto` int NOT NULL DEFAULT '0',
  `som_payer_ouverture` int NOT NULL DEFAULT '0',
  `som_restant_ouverture` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contrats_locataire_id_foreign` (`locataire_id`),
  CONSTRAINT `contrats_locataire_id_foreign` FOREIGN KEY (`locataire_id`) REFERENCES `locataires` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contrats`
--

LOCK TABLES `contrats` WRITE;
/*!40000 ALTER TABLE `contrats` DISABLE KEYS */;
INSERT INTO `contrats` VALUES (1,'CONTRAT-000001','2022-08-11','avance sur echance loyer',1,'LOCATAIRE-000001','Sanchez','Cocody Angré',1,1,1,0,0,0,0,0,-155000,1000000,25000,'2022-08-11 13:13:17','2022-09-09 19:10:52'),(2,'CONTRAT-000002','2022-08-30','avance sur echance loyer',1,'LOCATAIRE-000001','Sanchez','Cocody Angré',1,1,1,0,0,0,0,0,50000,12500,50000,'2022-08-30 08:12:07','2022-09-09 12:48:44'),(4,'CONTRAT-000003','2022-09-09','avance sur echance loyer',2,'LOCATAIRE-000002','Toure','Cocody Angré',1,1,1,0,0,0,0,0,-162000,200000,-162000,'2022-09-09 17:46:21','2022-09-09 18:35:38'),(5,'CONTRAT-000004','2022-09-09','avance sur echance loyer',1,'LOCATAIRE-000001','Sanchez','Cocody Angré',1,1,1,0,0,0,0,0,1000000,50000,1000000,'2022-09-09 18:40:37','2022-09-09 18:41:38');
/*!40000 ALTER TABLE `contrats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `demandes`
--

DROP TABLE IF EXISTS `demandes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `demandes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `locataire_id` bigint unsigned NOT NULL,
  `emplacement_id` bigint unsigned NOT NULL,
  `contrat_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `demandes_locataire_id_foreign` (`locataire_id`),
  KEY `demandes_emplacement_id_foreign` (`emplacement_id`),
  KEY `demandes_contrat_id_foreign` (`contrat_id`),
  CONSTRAINT `demandes_contrat_id_foreign` FOREIGN KEY (`contrat_id`) REFERENCES `contrats` (`id`) ON DELETE CASCADE,
  CONSTRAINT `demandes_emplacement_id_foreign` FOREIGN KEY (`emplacement_id`) REFERENCES `emplacements` (`id`) ON DELETE CASCADE,
  CONSTRAINT `demandes_locataire_id_foreign` FOREIGN KEY (`locataire_id`) REFERENCES `locataires` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `demandes`
--

LOCK TABLES `demandes` WRITE;
/*!40000 ALTER TABLE `demandes` DISABLE KEYS */;
/*!40000 ALTER TABLE `demandes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emplacement_contrat`
--

DROP TABLE IF EXISTS `emplacement_contrat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `emplacement_contrat` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `contrat_id` bigint unsigned NOT NULL,
  `emplacement_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `emplacement_contrat_contrat_id_foreign` (`contrat_id`),
  KEY `emplacement_contrat_emplacement_id_foreign` (`emplacement_id`),
  CONSTRAINT `emplacement_contrat_contrat_id_foreign` FOREIGN KEY (`contrat_id`) REFERENCES `contrats` (`id`) ON DELETE CASCADE,
  CONSTRAINT `emplacement_contrat_emplacement_id_foreign` FOREIGN KEY (`emplacement_id`) REFERENCES `emplacements` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emplacement_contrat`
--

LOCK TABLES `emplacement_contrat` WRITE;
/*!40000 ALTER TABLE `emplacement_contrat` DISABLE KEYS */;
INSERT INTO `emplacement_contrat` VALUES (1,1,1,'2022-08-11 13:13:17','2022-08-11 13:13:17'),(2,2,2,'2022-08-30 08:12:07','2022-08-30 08:12:07'),(4,4,4,'2022-09-09 17:46:21','2022-09-09 17:46:21'),(5,5,5,'2022-09-09 18:40:37','2022-09-09 18:40:37');
/*!40000 ALTER TABLE `emplacement_contrat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emplacements`
--

DROP TABLE IF EXISTS `emplacements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `emplacements` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `superficie` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loyer` int DEFAULT NULL,
  `pas_porte` int DEFAULT NULL,
  `statut` tinyint(1) DEFAULT '0',
  `zone_id` bigint unsigned NOT NULL,
  `type_emplacement` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `commerciaux_id` int DEFAULT NULL,
  `paiement_journalier` int DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `emplacements_zone_id_foreign` (`zone_id`),
  CONSTRAINT `emplacements_zone_id_foreign` FOREIGN KEY (`zone_id`) REFERENCES `zones` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emplacements`
--

LOCK TABLES `emplacements` WRITE;
/*!40000 ALTER TABLE `emplacements` DISABLE KEYS */;
INSERT INTO `emplacements` VALUES (1,'EMPLAC-000001','EMPL A','4X4',25000,1000000,1,1,'Magasin','2022-08-11 13:02:22','2022-09-09 18:01:22',5,1),(2,'EMPLAC-000002','Emp B','4X4',12500,50000,1,1,'Box','2022-08-27 16:47:23','2022-08-27 16:47:23',5,1),(3,'EMPLAC-000003','EMPL C','4X4',25000,500000,1,1,'Box','2022-09-06 15:41:11','2022-09-06 15:41:11',5,0),(4,'EMPLAC-000004','EMPL D','4X5',38000,200000,1,1,'Box','2022-09-09 17:45:49','2022-09-09 17:45:49',5,0),(5,'EMPLAC-000005','EMPL E','10X5',50000,1000000,1,1,'Magasin','2022-09-09 18:40:09','2022-09-09 18:40:09',5,0);
/*!40000 ALTER TABLE `emplacements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `etages`
--

DROP TABLE IF EXISTS `etages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `etages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batiment_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `etages_batiment_id_foreign` (`batiment_id`),
  CONSTRAINT `etages_batiment_id_foreign` FOREIGN KEY (`batiment_id`) REFERENCES `batiments` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `etages`
--

LOCK TABLES `etages` WRITE;
/*!40000 ALTER TABLE `etages` DISABLE KEYS */;
INSERT INTO `etages` VALUES (1,'ETAGE-000001','ETAGE A',1,'2022-08-11 13:00:16','2022-09-13 14:26:09');
/*!40000 ALTER TABLE `etages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `etales`
--

DROP TABLE IF EXISTS `etales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `etales` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `superficie` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pass` int DEFAULT NULL,
  `statut` tinyint(1) DEFAULT '0',
  `commerciaux_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `etales_commerciaux_id_foreign` (`commerciaux_id`),
  CONSTRAINT `etales_commerciaux_id_foreign` FOREIGN KEY (`commerciaux_id`) REFERENCES `commerciauxes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `etales`
--

LOCK TABLES `etales` WRITE;
/*!40000 ALTER TABLE `etales` DISABLE KEYS */;
/*!40000 ALTER TABLE `etales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
-- Table structure for table `gaz_contrat`
--

DROP TABLE IF EXISTS `gaz_contrat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gaz_contrat` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `contrat_id` bigint unsigned DEFAULT NULL,
  `gaz_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gaz_contrat_contrat_id_foreign` (`contrat_id`),
  KEY `gaz_contrat_gaz_id_foreign` (`gaz_id`),
  CONSTRAINT `gaz_contrat_contrat_id_foreign` FOREIGN KEY (`contrat_id`) REFERENCES `contrats` (`id`) ON DELETE CASCADE,
  CONSTRAINT `gaz_contrat_gaz_id_foreign` FOREIGN KEY (`gaz_id`) REFERENCES `gazs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gaz_contrat`
--

LOCK TABLES `gaz_contrat` WRITE;
/*!40000 ALTER TABLE `gaz_contrat` DISABLE KEYS */;
/*!40000 ALTER TABLE `gaz_contrat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gazpaiements`
--

DROP TABLE IF EXISTS `gazpaiements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gazpaiements` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `index_dbt` int DEFAULT NULL,
  `index_fn` int DEFAULT NULL,
  `date_payement` date DEFAULT NULL,
  `somme_payer` int DEFAULT NULL,
  `somme_restant` int DEFAULT NULL,
  `mois_payer` date DEFAULT NULL,
  `mode_paiement` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banque` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_locataire` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_contrat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gaz_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gazpaiements_gaz_id_foreign` (`gaz_id`),
  CONSTRAINT `gazpaiements_gaz_id_foreign` FOREIGN KEY (`gaz_id`) REFERENCES `gazs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gazpaiements`
--

LOCK TABLES `gazpaiements` WRITE;
/*!40000 ALTER TABLE `gazpaiements` DISABLE KEYS */;
/*!40000 ALTER TABLE `gazpaiements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gazs`
--

DROP TABLE IF EXISTS `gazs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gazs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `denomination` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse_gps` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `index_dbt` int DEFAULT NULL,
  `index_fn` int DEFAULT NULL,
  `som_total` int DEFAULT NULL,
  `unite_index` int DEFAULT NULL,
  `somme_restant` int DEFAULT NULL,
  `libelle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mois_payer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statut` tinyint(1) DEFAULT NULL,
  `statut_ordonnacement` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gazs`
--

LOCK TABLES `gazs` WRITE;
/*!40000 ALTER TABLE `gazs` DISABLE KEYS */;
/*!40000 ALTER TABLE `gazs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locataire_contrat`
--

DROP TABLE IF EXISTS `locataire_contrat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `locataire_contrat` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `contrat_id` bigint unsigned DEFAULT NULL,
  `locataire_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `locataire_contrat_contrat_id_foreign` (`contrat_id`),
  KEY `locataire_contrat_locataire_id_foreign` (`locataire_id`),
  CONSTRAINT `locataire_contrat_contrat_id_foreign` FOREIGN KEY (`contrat_id`) REFERENCES `contrats` (`id`) ON DELETE CASCADE,
  CONSTRAINT `locataire_contrat_locataire_id_foreign` FOREIGN KEY (`locataire_id`) REFERENCES `locataires` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locataire_contrat`
--

LOCK TABLES `locataire_contrat` WRITE;
/*!40000 ALTER TABLE `locataire_contrat` DISABLE KEYS */;
/*!40000 ALTER TABLE `locataire_contrat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locataires`
--

DROP TABLE IF EXISTS `locataires`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `locataires` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `denomination` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse_postale` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `statut` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locataires`
--

LOCK TABLES `locataires` WRITE;
/*!40000 ALTER TABLE `locataires` DISABLE KEYS */;
INSERT INTO `locataires` VALUES (1,'LOCATAIRE-000001','Sanchez','Sanchez','COMMERCANT','Cocody Angré','Abidjan','44444444','1','2022-08-11 13:10:10','2022-08-30 09:26:54'),(2,'LOCATAIRE-000002','Toure','Test','MARCHE','Cocody Angré','Abidjan','5455555','1','2022-09-06 14:33:49','2022-09-06 15:41:33');
/*!40000 ALTER TABLE `locataires` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loyers`
--

DROP TABLE IF EXISTS `loyers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `loyers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_payement` date DEFAULT NULL,
  `loyer_somme_payer` int DEFAULT NULL,
  `somme_restant` int DEFAULT NULL,
  `mois_payer` date DEFAULT NULL,
  `mode_paiement` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banque` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contrat_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `loyers_contrat_id_foreign` (`contrat_id`),
  CONSTRAINT `loyers_contrat_id_foreign` FOREIGN KEY (`contrat_id`) REFERENCES `contrats` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loyers`
--

LOCK TABLES `loyers` WRITE;
/*!40000 ALTER TABLE `loyers` DISABLE KEYS */;
INSERT INTO `loyers` VALUES (1,NULL,'2022-08-11',1000000,25000,NULL,NULL,NULL,1,NULL,NULL),(2,NULL,'2022-09-09',12500,50000,NULL,NULL,NULL,2,NULL,NULL),(3,NULL,'2022-09-09',200000,38000,NULL,NULL,NULL,4,NULL,NULL),(4,NULL,'2022-09-09',200000,38000,NULL,NULL,NULL,4,NULL,NULL),(5,NULL,'2022-09-09',200000,-162000,NULL,NULL,NULL,4,NULL,NULL),(6,NULL,'2022-09-09',50000,1000000,NULL,NULL,NULL,5,NULL,NULL),(7,NULL,'2022-09-09',20000,5000,NULL,NULL,NULL,1,NULL,NULL),(8,NULL,'2022-09-09',20000,-15000,NULL,NULL,NULL,1,NULL,NULL),(9,NULL,'2022-09-09',20000,-35000,NULL,NULL,NULL,1,NULL,NULL),(10,NULL,'2022-09-09',20000,-55000,NULL,NULL,NULL,1,NULL,NULL),(11,NULL,'2022-09-09',20000,-75000,NULL,NULL,NULL,1,NULL,NULL),(12,NULL,'2022-09-09',20000,-75000,NULL,NULL,NULL,1,NULL,NULL),(13,NULL,'2022-09-09',20000,-75000,NULL,NULL,NULL,1,NULL,NULL),(14,NULL,'2022-09-09',20000,-75000,NULL,NULL,NULL,1,NULL,NULL),(15,NULL,'2022-09-09',20000,-95000,NULL,NULL,NULL,1,NULL,NULL),(16,NULL,'2022-09-09',20000,-95000,NULL,NULL,NULL,1,NULL,NULL),(17,NULL,'2022-09-09',20000,-95000,NULL,NULL,NULL,1,NULL,NULL),(18,NULL,'2022-09-09',20000,-115000,NULL,NULL,NULL,1,NULL,NULL),(19,NULL,'2022-09-09',20000,-135000,NULL,NULL,NULL,1,NULL,NULL),(20,NULL,'2022-09-09',20000,-155000,NULL,NULL,NULL,1,NULL,NULL);
/*!40000 ALTER TABLE `loyers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2021_07_26_235847_create_sites_table',1),(5,'2021_07_26_082657_create_batiments_table',2),(6,'2021_07_27_005221_create_etages_table',2),(7,'2021_07_27_005401_create_zones_table',2),(8,'2021_07_27_005426_create_emplacements_table',2),(9,'2021_08_04_035556_create_locataires_table',2),(10,'2021_08_04_045028_create_contrats_table',2),(11,'2021_08_06_101809_create_demandes_table',2),(12,'2021_09_16_103700_create_proprietes_table',2),(13,'2021_09_16_104836_create_proprietes_contrats_table',2),(14,'2021_09_19_114753_create_emplacements_contrats_table',2),(15,'2021_09_23_223847_create_gazs_table',2),(16,'2021_09_23_225458_create__gaz_contrats_table',2),(17,'2021_09_25_095428_create_compteur_cies_table',2),(18,'2021_09_25_095451_create_compteur_sodecis_table',2),(19,'2021_09_25_095749_create__compteur_sodeci_contrats_table',2),(20,'2021_09_25_095816_create__compteur_cie_contrats_table',2),(21,'2021_10_01_164146_create_locataire_contrat_table',2),(22,'2021_10_01_180827_create_loyers_table',2),(23,'2021_10_02_144702_create_pas_ports_table',2),(24,'2021_11_02_113350_create_ordonnacements_table',2),(25,'2021_11_06_113230_create_ciepaiements_table',2),(26,'2021_11_06_113716_create_sodecipaiements_table',2),(27,'2021_11_06_113805_create_gazpaiements_table',2),(28,'2021_11_06_113825_create_proprietepaiements_table',2),(29,'2021_11_18_213318_create_caisses_table',2),(30,'2021_11_22_102709_add_code_to_ordonnacements',2),(31,'2021_11_23_171350_create_ordonnacement_mensuls_table',2),(32,'2021_11_23_233153_create_ordonnacement_cies_table',2),(33,'2021_11_23_233259_create_ordonnacement_sodecis_table',2),(34,'2021_11_23_233310_create_ordonnacement_gazs_table',2),(35,'2021_11_23_233400_create_ordonnacement_proprietes_table',2),(36,'2022_01_08_091401_create_commerciauxes_table',2),(37,'2022_01_08_104537_create_etales_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ordonnacement_cies`
--

DROP TABLE IF EXISTS `ordonnacement_cies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ordonnacement_cies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_ordonnacement` date NOT NULL,
  `somme_ordonnacement` int NOT NULL,
  `commentaire` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statut` tinyint(1) DEFAULT NULL,
  `compteur_cie_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ordonnacement_cies_compteur_cie_id_foreign` (`compteur_cie_id`),
  CONSTRAINT `ordonnacement_cies_compteur_cie_id_foreign` FOREIGN KEY (`compteur_cie_id`) REFERENCES `compteur_cies` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordonnacement_cies`
--

LOCK TABLES `ordonnacement_cies` WRITE;
/*!40000 ALTER TABLE `ordonnacement_cies` DISABLE KEYS */;
INSERT INTO `ordonnacement_cies` VALUES (1,'Ordonna_cie000001','2022-08-11',10000,NULL,1,1,NULL,NULL),(2,'Ordonna_cie000002','2022-08-11',10000,NULL,1,1,NULL,NULL),(3,'Ordonna_cie000002','2022-08-12',9418,NULL,1,1,NULL,NULL),(4,'Ordonna_cie000004','2022-08-16',12264,NULL,1,1,NULL,NULL),(5,'Ordonna_cie000005','2022-08-16',3286,NULL,1,1,NULL,NULL),(6,'Ordonna_cie000005','2022-08-17',5000,NULL,1,1,NULL,NULL),(7,'Ordonna_cie000005','2022-08-18',5000,NULL,1,1,NULL,NULL),(8,'Ordonna_cie000008','2022-08-16',3286,NULL,1,1,NULL,NULL),(9,'Ordonna_cie000008','2022-08-16',10000,NULL,1,1,NULL,NULL),(10,'Ordonna_cie000010','2022-08-17',3286,NULL,1,1,NULL,NULL),(11,'Ordonna_cie000010','2022-08-18',10000,NULL,1,1,NULL,NULL),(12,'Ordonna_cie000012','2022-09-07',13286,NULL,1,1,NULL,NULL),(13,'Ordonna_cie000013','2022-09-07',16352,NULL,1,2,NULL,NULL),(14,'Ordonna_cie000014','2022-09-07',16352,NULL,1,2,NULL,NULL),(15,'Ordonna_cie000015','2022-09-07',18396,NULL,1,1,NULL,NULL),(16,'Ordonna_cie000016','2022-09-07',11242,NULL,1,1,NULL,NULL),(17,'Ordonna_cie000017','2022-09-11',18396,NULL,1,1,NULL,NULL),(18,'Ordonna_cie000018','2022-09-11',12264,NULL,1,1,NULL,NULL);
/*!40000 ALTER TABLE `ordonnacement_cies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ordonnacement_gazs`
--

DROP TABLE IF EXISTS `ordonnacement_gazs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ordonnacement_gazs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_ordonnacement` date NOT NULL,
  `somme_ordonnacement` int NOT NULL,
  `commentaire` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statut` tinyint(1) DEFAULT NULL,
  `gaz_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ordonnacement_gazs_gaz_id_foreign` (`gaz_id`),
  CONSTRAINT `ordonnacement_gazs_gaz_id_foreign` FOREIGN KEY (`gaz_id`) REFERENCES `gazs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordonnacement_gazs`
--

LOCK TABLES `ordonnacement_gazs` WRITE;
/*!40000 ALTER TABLE `ordonnacement_gazs` DISABLE KEYS */;
/*!40000 ALTER TABLE `ordonnacement_gazs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ordonnacement_mensuls`
--

DROP TABLE IF EXISTS `ordonnacement_mensuls`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ordonnacement_mensuls` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_ordonnacement` date NOT NULL,
  `somme_ordonnacement` int NOT NULL,
  `commentaire` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statut` tinyint(1) DEFAULT NULL,
  `contrat_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ordonnacement_mensuls_contrat_id_foreign` (`contrat_id`),
  CONSTRAINT `ordonnacement_mensuls_contrat_id_foreign` FOREIGN KEY (`contrat_id`) REFERENCES `contrats` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordonnacement_mensuls`
--

LOCK TABLES `ordonnacement_mensuls` WRITE;
/*!40000 ALTER TABLE `ordonnacement_mensuls` DISABLE KEYS */;
INSERT INTO `ordonnacement_mensuls` VALUES (1,'Ordonna_mensu000001','2022-09-07',25000,NULL,1,1,NULL,NULL),(2,'Ordonna_mensu000001','2022-09-08',25000,NULL,1,1,NULL,NULL),(3,'Ordonna_mensu000003','2022-09-09',20000,NULL,1,1,NULL,NULL),(4,'Ordonna_mensu000003','2022-09-10',5000,NULL,1,1,NULL,NULL);
/*!40000 ALTER TABLE `ordonnacement_mensuls` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ordonnacement_proprietes`
--

DROP TABLE IF EXISTS `ordonnacement_proprietes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ordonnacement_proprietes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_ordonnacement` date NOT NULL,
  `somme_ordonnacement` int NOT NULL,
  `commentaire` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statut` tinyint(1) DEFAULT NULL,
  `propriete_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ordonnacement_proprietes_propriete_id_foreign` (`propriete_id`),
  CONSTRAINT `ordonnacement_proprietes_propriete_id_foreign` FOREIGN KEY (`propriete_id`) REFERENCES `proprietes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordonnacement_proprietes`
--

LOCK TABLES `ordonnacement_proprietes` WRITE;
/*!40000 ALTER TABLE `ordonnacement_proprietes` DISABLE KEYS */;
INSERT INTO `ordonnacement_proprietes` VALUES (1,'Ordonna_propriete000001','2022-09-07',30660,NULL,1,1,NULL,NULL),(2,'Ordonna_propriete000002','2022-09-11',15330,NULL,1,1,NULL,NULL);
/*!40000 ALTER TABLE `ordonnacement_proprietes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ordonnacement_sodecis`
--

DROP TABLE IF EXISTS `ordonnacement_sodecis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ordonnacement_sodecis` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_ordonnacement` date NOT NULL,
  `somme_ordonnacement` int NOT NULL,
  `commentaire` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statut` tinyint(1) DEFAULT NULL,
  `compteur_sodeci_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ordonnacement_sodecis_compteur_sodeci_id_foreign` (`compteur_sodeci_id`),
  CONSTRAINT `ordonnacement_sodecis_compteur_sodeci_id_foreign` FOREIGN KEY (`compteur_sodeci_id`) REFERENCES `compteur_sodecis` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordonnacement_sodecis`
--

LOCK TABLES `ordonnacement_sodecis` WRITE;
/*!40000 ALTER TABLE `ordonnacement_sodecis` DISABLE KEYS */;
INSERT INTO `ordonnacement_sodecis` VALUES (1,'Ordonna_sodeci000001','2022-09-07',13286,NULL,1,1,NULL,NULL),(2,'Ordonna_sodeci000002','2022-09-07',13286,NULL,1,1,NULL,NULL),(3,'Ordonna_sodeci000003','2022-09-11',3066,NULL,1,1,NULL,NULL),(4,'Ordonna_sodeci000004','2022-09-11',13286,NULL,1,1,NULL,NULL);
/*!40000 ALTER TABLE `ordonnacement_sodecis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ordonnacements`
--

DROP TABLE IF EXISTS `ordonnacements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ordonnacements` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `date_ordonnacement` date NOT NULL,
  `somme_ordonnacement` int NOT NULL,
  `commentaire` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statut` tinyint(1) DEFAULT NULL,
  `contrat_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ordonnacements_contrat_id_foreign` (`contrat_id`),
  CONSTRAINT `ordonnacements_contrat_id_foreign` FOREIGN KEY (`contrat_id`) REFERENCES `contrats` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordonnacements`
--

LOCK TABLES `ordonnacements` WRITE;
/*!40000 ALTER TABLE `ordonnacements` DISABLE KEYS */;
INSERT INTO `ordonnacements` VALUES (1,'2022-08-11',1000000,NULL,1,1,NULL,NULL,'Ordonna-000001'),(2,'2022-08-12',25000,NULL,0,1,NULL,NULL,'Ordonna-000001'),(3,'2022-08-31',0,NULL,0,2,NULL,NULL,'Ordonna-000003'),(4,'2022-08-31',50000,NULL,0,2,NULL,NULL,'Ordonna-000004'),(5,'2022-09-01',12500,NULL,1,2,NULL,NULL,'Ordonna-000004'),(6,'2022-09-09',200000,NULL,1,4,NULL,NULL,'Ordonna-000006'),(7,'2022-09-10',38000,NULL,0,4,NULL,NULL,'Ordonna-000006'),(8,'2022-09-09',1000000,NULL,0,5,NULL,NULL,'Ordonna-000008'),(9,'2022-09-09',50000,NULL,1,5,NULL,NULL,'Ordonna-000008');
/*!40000 ALTER TABLE `ordonnacements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pas_ports`
--

DROP TABLE IF EXISTS `pas_ports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pas_ports` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `contrat_id` bigint unsigned NOT NULL,
  `date_payement` date DEFAULT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pas_port_somme_payer` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pas_ports_contrat_id_foreign` (`contrat_id`),
  CONSTRAINT `pas_ports_contrat_id_foreign` FOREIGN KEY (`contrat_id`) REFERENCES `contrats` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pas_ports`
--

LOCK TABLES `pas_ports` WRITE;
/*!40000 ALTER TABLE `pas_ports` DISABLE KEYS */;
/*!40000 ALTER TABLE `pas_ports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proprietepaiements`
--

DROP TABLE IF EXISTS `proprietepaiements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `proprietepaiements` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `index_dbt` int DEFAULT NULL,
  `index_fn` int DEFAULT NULL,
  `date_payement` date DEFAULT NULL,
  `somme_payer` int DEFAULT NULL,
  `somme_restant` int DEFAULT NULL,
  `mois_payer` date DEFAULT NULL,
  `mode_paiement` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banque` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_locataire` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_contrat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `propriete_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `proprietepaiements_propriete_id_foreign` (`propriete_id`),
  CONSTRAINT `proprietepaiements_propriete_id_foreign` FOREIGN KEY (`propriete_id`) REFERENCES `proprietes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proprietepaiements`
--

LOCK TABLES `proprietepaiements` WRITE;
/*!40000 ALTER TABLE `proprietepaiements` DISABLE KEYS */;
INSERT INTO `proprietepaiements` VALUES (1,NULL,1,31,'2022-09-07',30660,0,'2022-09-07',NULL,NULL,NULL,'PROPRIETE-000001',1,NULL,NULL),(2,NULL,31,46,'2022-09-11',15330,0,'2022-09-07',NULL,NULL,NULL,NULL,1,NULL,NULL);
/*!40000 ALTER TABLE `proprietepaiements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proprietes`
--

DROP TABLE IF EXISTS `proprietes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `proprietes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `denomination` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse_gps` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `index_dbt` int DEFAULT NULL,
  `index_fn` int DEFAULT NULL,
  `som_total` int DEFAULT NULL,
  `unite_index` int DEFAULT NULL,
  `somme_restant` int DEFAULT NULL,
  `libelle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mois_payer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statut` tinyint(1) DEFAULT NULL,
  `statut_ordonnacement` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proprietes`
--

LOCK TABLES `proprietes` WRITE;
/*!40000 ALTER TABLE `proprietes` DISABLE KEYS */;
INSERT INTO `proprietes` VALUES (1,'PROPRIETE-000001','TEL 1',NULL,46,0,0,NULL,0,'TEL 1','2022-09-07',1,0,'2022-08-11 13:08:56','2022-09-11 13:35:14');
/*!40000 ALTER TABLE `proprietes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proprietes_contrats`
--

DROP TABLE IF EXISTS `proprietes_contrats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `proprietes_contrats` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `contrat_id` bigint unsigned NOT NULL,
  `propriete_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `proprietes_contrats_contrat_id_foreign` (`contrat_id`),
  KEY `proprietes_contrats_propriete_id_foreign` (`propriete_id`),
  CONSTRAINT `proprietes_contrats_contrat_id_foreign` FOREIGN KEY (`contrat_id`) REFERENCES `contrats` (`id`) ON DELETE CASCADE,
  CONSTRAINT `proprietes_contrats_propriete_id_foreign` FOREIGN KEY (`propriete_id`) REFERENCES `proprietes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proprietes_contrats`
--

LOCK TABLES `proprietes_contrats` WRITE;
/*!40000 ALTER TABLE `proprietes_contrats` DISABLE KEYS */;
INSERT INTO `proprietes_contrats` VALUES (1,1,1,'2022-08-11 13:13:17','2022-08-11 13:13:17');
/*!40000 ALTER TABLE `proprietes_contrats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sites`
--

DROP TABLE IF EXISTS `sites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sites` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse_graphique` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse_postale` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ville` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commune` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sites`
--

LOCK TABLES `sites` WRITE;
/*!40000 ALTER TABLE `sites` DISABLE KEYS */;
INSERT INTO `sites` VALUES (1,'SITE-000001','Marche de Treichville','TREICHVILLE','BP12ABIDJAN','MARCHE','ABIDJAN','TREICHVILLE','2022-08-11 12:58:07','2022-08-11 12:58:14'),(2,'SITE-000002','Marche de Marcory','Marcory','BP0784MARCORY','MARCHE','Abidjan','Marcory 1','2022-09-13 13:11:13','2022-09-13 13:16:05');
/*!40000 ALTER TABLE `sites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sodecipaiements`
--

DROP TABLE IF EXISTS `sodecipaiements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sodecipaiements` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `index_dbt` int DEFAULT NULL,
  `index_fn` int DEFAULT NULL,
  `date_payement` date DEFAULT NULL,
  `somme_payer` int DEFAULT NULL,
  `somme_restant` int DEFAULT NULL,
  `mois_payer` date DEFAULT NULL,
  `mode_paiement` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banque` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_locataire` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_contrat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `compteur_sodeci_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sodecipaiements_compteur_sodeci_id_foreign` (`compteur_sodeci_id`),
  CONSTRAINT `sodecipaiements_compteur_sodeci_id_foreign` FOREIGN KEY (`compteur_sodeci_id`) REFERENCES `compteur_sodecis` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sodecipaiements`
--

LOCK TABLES `sodecipaiements` WRITE;
/*!40000 ALTER TABLE `sodecipaiements` DISABLE KEYS */;
INSERT INTO `sodecipaiements` VALUES (1,NULL,1,14,'2022-09-07',13286,0,'2022-09-07',NULL,NULL,NULL,'compteurSodeci-000001',1,NULL,NULL),(2,NULL,1,14,'2022-09-07',13286,0,'2022-09-07',NULL,NULL,NULL,'compteurSodeci-000001',1,NULL,NULL),(3,NULL,14,21,'2022-09-11',3066,4088,'2022-09-07',NULL,NULL,NULL,'compteurSodeci-000001',1,NULL,NULL),(4,NULL,21,34,'2022-09-11',13286,4088,'2022-09-07',NULL,NULL,NULL,'compteurSodeci-000001',1,NULL,NULL);
/*!40000 ALTER TABLE `sodecipaiements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
INSERT INTO `users` VALUES (1,'test','test@gmail.com',NULL,'$2y$10$lnNB9ATlFMhGBHHW6tb5qeTyusCQRUvOawGSkTkka0G.twO3Tw.76',NULL,'2022-08-11 12:55:54','2022-08-11 12:55:54');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zones`
--

DROP TABLE IF EXISTS `zones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `zones` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `etage_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `zones_etage_id_foreign` (`etage_id`),
  CONSTRAINT `zones_etage_id_foreign` FOREIGN KEY (`etage_id`) REFERENCES `etages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zones`
--

LOCK TABLES `zones` WRITE;
/*!40000 ALTER TABLE `zones` DISABLE KEYS */;
INSERT INTO `zones` VALUES (1,'ZONE-000001','ZONE A',1,'2022-08-11 13:00:55','2022-09-13 14:44:27');
/*!40000 ALTER TABLE `zones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'gesmar'
--
/*!50003 DROP PROCEDURE IF EXISTS `admin_get_commercio` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cisse`@`%` PROCEDURE `admin_get_commercio`()
BEGIN
	select 
		com.id,com.code, com.nom, com.denomination, com.ville, com.tel, ifnull(sum(cai.somme_payer), 0) som_actu,date_payement
	from 
		commerciauxes com left outer join caisses cai on com.id=cai.commerciaux_id
	-- where 
		-- datediff(now(),date_payement) =0
	group by com.id order by com.id desc ;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `admin_get_compteur_cie` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cisse`@`%` PROCEDURE `admin_get_compteur_cie`()
BEGIN
	select  
		com.id ,com.code code_compteur, contrats.code code_contrat, com.denomination, com.index_dbt,
        com.index_fn, com.mois_payer, com.statut_ordonnacement, com.statut, cast(com.created_at as date) as date 
    from 
		compteur_cies com left outer join compteur_cie_contrat con on com.id=con.compteur_cie_id 
        left outer join contrats on contrat_id = contrats.id
	where
		com.statut_ordonnacement=0
	order by com.id desc;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `admin_get_compteur_equipement` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cisse`@`%` PROCEDURE `admin_get_compteur_equipement`()
BEGIN
	select  
		com.id ,com.code code_compteur, contrats.code code_contrat, com.denomination, com.index_dbt,
        com.index_fn, com.mois_payer, com.statut_ordonnacement, com.statut, cast(com.created_at as date) as date 
    from 
		proprietes com left outer join proprietes_contrats con on com.id=con.propriete_id 
        left outer join contrats on contrat_id = contrats.id
	where
		com.statut_ordonnacement=0
	order by com.id desc;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `admin_get_compteur_gaz` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cisse`@`%` PROCEDURE `admin_get_compteur_gaz`()
BEGIN
	select  
		com.id ,com.code code_compteur, contrats.code code_contrat, com.denomination, com.index_dbt,
        com.index_fn, com.mois_payer, com.statut_ordonnacement, com.statut, cast(com.created_at as date) as date 
    from 
		gazs com left outer join gaz_contrat con on com.id=con.gaz_id 
        left outer join contrats on contrat_id = contrats.id
	where
		com.statut_ordonnacement=0
	order by com.id desc;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `admin_get_compteur_sodeci` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cisse`@`%` PROCEDURE `admin_get_compteur_sodeci`()
BEGIN
	select  
		com.id ,com.code code_compteur, contrats.code code_contrat, com.denomination, com.index_dbt,
        com.index_fn, com.mois_payer, com.statut_ordonnacement, com.statut, cast(com.created_at as date) as date 
    from 
		compteur_sodecis com left outer join compteur_sodeci_contrat con on com.id=con.compteur_sodeci_id 
        left outer join contrats on contrat_id = contrats.id
	where
		com.statut_ordonnacement=0
	order by com.id desc;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `admin_get_contrat` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cisse`@`%` PROCEDURE `admin_get_contrat`(id_ int)
BEGIN
	select 
		c.id , c.code code_contrat, c.date_debut , c.type , statut_buro1, statut_buro2,
        statut_buro3,c.statut_ordonnacement, som_toto, som_payer_ouverture,
        som_restant_ouverture,c.created_at,cie.code code_cie, sodeci.code code_sodeci,
        gazs.code code_gaz, proprietes.code code_propriete
	from 
		contrats c left outer join compteur_cie_contrat cie_contrat on c.id = cie_contrat.contrat_id
        left outer join compteur_sodeci_contrat sodeci_contrat on c.id=sodeci_contrat.contrat_id
        left outer join gaz_contrat on c.id=gaz_contrat.contrat_id 
        left outer join proprietes_contrats on c.id=proprietes_contrats.contrat_id
        left outer join compteur_cies cie on cie.id=compteur_cie_id
        left outer join compteur_sodecis sodeci on sodeci.id = compteur_sodeci_id
        left outer join gazs on gazs.id=gaz_id
        left outer join proprietes on proprietes.id = propriete_id
	where 
		locataire_id=id_ order by c.id desc;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `admin_get_contrat_list` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cisse`@`%` PROCEDURE `admin_get_contrat_list`()
BEGIN
	select 
		c.id , c.code code_contrat, c.date_debut , c.type , code_locataire, nom_locataire,adresse_postale, statut_buro1, statut_buro2,
        statut_buro3,c.statut_ordonnacement, som_toto, som_payer_ouverture,
        som_restant_ouverture,c.created_at,cie.code code_cie, sodeci.code code_sodeci,
        gazs.code code_gaz, proprietes.code code_propriete, cie_contrat.compteur_cie_id,
        sodeci_contrat.compteur_sodeci_id, gaz_contrat.gaz_id,
        proprietes_contrats.propriete_id
	from 
		contrats c left outer join compteur_cie_contrat cie_contrat on c.id = cie_contrat.contrat_id
        left outer join compteur_sodeci_contrat sodeci_contrat on c.id=sodeci_contrat.contrat_id
        left outer join gaz_contrat on c.id=gaz_contrat.contrat_id 
        left outer join proprietes_contrats on c.id=proprietes_contrats.contrat_id
        left outer join compteur_cies cie on cie.id=compteur_cie_id
        left outer join compteur_sodecis sodeci on sodeci.id = compteur_sodeci_id
        left outer join gazs on gazs.id=gaz_id
        left outer join proprietes on proprietes.id = propriete_id
	-- where 
		-- locataire_id=id_ order by c.id desc
        order by c.id desc;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `admin_get_count_loyer` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cisse`@`%` PROCEDURE `admin_get_count_loyer`()
BEGIN
	declare nbr int;
    set nbr = (select count(*) from contrats where statut_buro1=1 and statut_buro2=1 and statut_buro3=1);
	select nbr;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `admin_get_historique` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cisse`@`%` PROCEDURE `admin_get_historique`()
BEGIN
	select distinct
		cai.id num_paiement, cai.date_payement, cai.somme_payer, cai.loyer_id, cai.ciepaiement_id, cai.sodecipaiement_id,
        cai.gazpaiement_id, cai.proprietepaiement_id, cont.code code_contrat, cont.date_debut date_debut_contrat,
        cont.code_locataire, cont.nom_locataire, cont.adresse_postale
	from
		
		-- CIE
		caisses cai left outer join ciepaiements cie_p on cai.ciepaiement_id=cie_p.id
        left outer join compteur_cies com_cie on com_cie.id=cie_p.compteur_cie_id
        left outer join compteur_cie_contrat cont_cie on cont_cie.compteur_cie_id = com_cie.id
        
        -- LOER
        left outer join loyers loy on cai.loyer_id=loy.id
        
        -- SODECI
        left outer join sodecipaiements sodeci_p on cai.sodecipaiement_id=sodeci_p.id
        left outer join compteur_sodecis com_sodeci on com_sodeci.id=sodeci_p.compteur_sodeci_id
        left outer join compteur_sodeci_contrat cont_sodeci on cont_sodeci.compteur_sodeci_id = com_sodeci.id
        
        -- GAZ
        left outer join gazpaiements gaz_p on cai.gazpaiement_id=gaz_p.id
        left outer join gazs gaz on gaz.id=gaz_p.gaz_id
        left outer join gaz_contrat cont_gaz on cont_gaz.gaz_id = gaz.id
        
        -- EQUIP
        left outer join proprietepaiements propr_p on cai.proprietepaiement_id=propr_p.id
        left outer join proprietes propr on propr.id=propr_p.propriete_id
        left outer join proprietes_contrats cont_propr on cont_propr.propriete_id = propr.id
        
        left outer join contrats cont on (cont.id= cont_cie.contrat_id OR cont.id=loy.contrat_id OR
			cont.id=cont_sodeci.contrat_id OR cont.id=cont_gaz.contrat_id OR cont.id=cont_propr.id)
        -- left outer join contrats cont on 
        
	where
		cai.somme_payer is not null 
	order by cai.id desc;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `admin_get_liste_caisse` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cisse`@`%` PROCEDURE `admin_get_liste_caisse`()
BEGIN
	select * from caisses where somme_payer is not null  order by id desc limit 4;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `admin_get_liste_caisse_jr` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cisse`@`%` PROCEDURE `admin_get_liste_caisse_jr`()
BEGIN
	select distinct
		cai.id num_paiement, cai.date_payement, cai.somme_payer, cai.loyer_id, cai.ciepaiement_id, cai.sodecipaiement_id,
        cai.gazpaiement_id, cai.proprietepaiement_id, cont.code code_contrat, cont.date_debut date_debut_contrat,
        cont.code_locataire, cont.nom_locataire, cont.adresse_postale
	from
		
		-- CIE
		caisses cai left outer join ciepaiements cie_p on cai.ciepaiement_id=cie_p.id
        left outer join compteur_cies com_cie on com_cie.id=cie_p.compteur_cie_id
        left outer join compteur_cie_contrat cont_cie on cont_cie.compteur_cie_id = com_cie.id
        
        -- LOER
        left outer join loyers loy on cai.loyer_id=loy.id
        
        -- SODECI
        left outer join sodecipaiements sodeci_p on cai.sodecipaiement_id=sodeci_p.id
        left outer join compteur_sodecis com_sodeci on com_sodeci.id=sodeci_p.compteur_sodeci_id
        left outer join compteur_sodeci_contrat cont_sodeci on cont_sodeci.compteur_sodeci_id = com_sodeci.id
        
        -- GAZ
        left outer join gazpaiements gaz_p on cai.gazpaiement_id=gaz_p.id
        left outer join gazs gaz on gaz.id=gaz_p.gaz_id
        left outer join gaz_contrat cont_gaz on cont_gaz.gaz_id = gaz.id
        
        -- EQUIP
        left outer join proprietepaiements propr_p on cai.proprietepaiement_id=propr_p.id
        left outer join proprietes propr on propr.id=propr_p.propriete_id
        left outer join proprietes_contrats cont_propr on cont_propr.propriete_id = propr.id
        
        left outer join contrats cont on (cont.id= cont_cie.contrat_id OR cont.id=loy.contrat_id OR
			cont.id=cont_sodeci.contrat_id OR cont.id=cont_gaz.contrat_id OR cont.id=cont_propr.id)
        -- left outer join contrats cont on 
        
	where
		cai.somme_payer is not null 
	and 
        datediff(now(),cai.date_payement) =0  
	order by cai.id desc;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `admin_get_som_jr` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cisse`@`%` PROCEDURE `admin_get_som_jr`()
BEGIN
	declare som_loyer_jr int;
    declare som_jr int;
    declare som_cie_jr int;
    declare som_sodeci_jr int;
    declare som_gaz_jr int;
    declare som_prop_jr int;
    
	set som_jr = (select sum(somme_payer) som_jr  from caisses where datediff(now(),date_payement) =0);
    set som_cie_jr = (select sum(somme_payer) som_jr  from caisses where ciepaiement_id is not NULL and datediff(now(),date_payement) =0);
    set som_sodeci_jr = (select sum(somme_payer) som_jr  from caisses where sodecipaiement_id is not NULL and datediff(now(),date_payement) =0);
    set som_gaz_jr = (select sum(somme_payer) som_jr from caisses where gazpaiement_id!=NULL is not NULL and datediff(now(),date_payement) =0);
    set som_prop_jr =(select sum(somme_payer) som_jr from caisses where proprietepaiement_id is not NULL and datediff(now(),date_payement) =0);
    set som_loyer_jr =(select sum(somme_payer) som_jr from caisses where loyer_id is not NULL and datediff(now(),date_payement) =0);
    
    set @nbr_jr = (select count(somme_payer) som_jr  from caisses where datediff(now(),date_payement) =0);
    set @nbr_cie_jr = (select count(somme_payer) som_jr  from caisses where ciepaiement_id is not NULL and datediff(now(),date_payement) =0);
    set @nbr_sodeci_jr = (select count(somme_payer) som_jr  from caisses where sodecipaiement_id is not NULL and datediff(now(),date_payement) =0);
    set @nbr_gaz_jr = (select count(somme_payer) som_jr from caisses where gazpaiement_id!=NULL is not NULL and datediff(now(),date_payement) =0);
    set @nbr_prop_jr =(select count(somme_payer) som_jr from caisses where proprietepaiement_id is not NULL and datediff(now(),date_payement) =0);
    set @nbr_loyer_jr =(select count(somme_payer) som_jr from caisses where loyer_id is not NULL and datediff(now(),date_payement) =0);
    
    select ifnull(som_jr, 0) as  som_jr, ifnull(som_cie_jr, 0) som_cie_jr,ifnull(som_sodeci_jr, 0) som_sodeci_jr, ifnull(som_gaz_jr, 0) som_gaz_jr,
		ifnull(som_prop_jr, 0) som_prop_jr, ifnull(som_loyer_jr, 0) som_loyer_jr,
        ifnull(@nbr_jr, 0) nbr_jr, ifnull(@nbr_cie_jr, 0) nbr_cie_jr, ifnull(@nbr_sodeci_jr, 0) nbr_sodeci_jr,
        ifnull(@nbr_gaz_jr, 0) nbr_gaz_jr, ifnull(@nbr_prop_jr, 0) nbr_prop_jr, ifnull(@nbr_loyer_jr, 0) nbr_loyer_jr
        ;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `admin_update_contrat` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cisse`@`%` PROCEDURE `admin_update_contrat`(contrat_id int)
BEGIN
	select 
		con.id,con.code,date_debut,con.type,code_locataire,nom_locataire,con.adresse_postale,statut_buro1,
        statut_buro2,statut_buro3,con.statut_ordonnacement,som_toto,som_payer_ouverture,som_restant_ouverture,
        cast(con.created_at as date) created_at, em.code empl_code, pro.code prop_code, g.code gaz_code,
        cie.code cie_code, sodeci.code sodeci_code, l.denomination,l.tel, l.adresse_postale adresse_locataire, 
        em.loyer, em.pas_porte
    from
		contrats con left outer join emplacement_contrat em_c on con.id=em_c.contrat_id
        left outer join emplacements em on em.id=em_c.emplacement_id
        left outer join proprietes_contrats pro_c on con.id=pro_c.contrat_id
        left outer join proprietes pro on pro.id=pro_c.propriete_id
        left outer join gaz_contrat g_c on g_c.contrat_id=con.id
        left outer join gazs g on g.id=g_c.gaz_id
        left outer join compteur_cie_contrat cie_c on cie_c.contrat_id=con.id
        left outer join compteur_cies cie on cie.id=cie_c.compteur_cie_id
        left outer join compteur_sodeci_contrat sodeci_c on sodeci_c.contrat_id=con.id 
        left outer join compteur_sodecis sodeci on sodeci.id=sodeci_c.compteur_sodeci_id
        left outer join locataires l on con.locataire_id=l.id
	where
		con.id=contrat_id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `client_get_historique` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cisse`@`%` PROCEDURE `client_get_historique`(code_emplacement varchar(100))
BEGIN
	set @client_id=(select 
			lo.id
		from 
			emplacements em left outer join emplacement_contrat em_con on em.id=em_con.emplacement_id
			left outer join contrats con on con.id=em_con.contrat_id
			left outer join locataires lo on lo.id=con.locataire_id
			left outer join caisses c on c.locataire_id=lo.id
		where em.code COLLATE utf8mb4_unicode_ci=code_emplacement limit 1);
    select somme_payer, date_payement,locataire_id as client_id from caisses where locataire_id=@client_id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `client_get_info_paiement` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cisse`@`%` PROCEDURE `client_get_info_paiement`(code_emplacement varchar(100))
BEGIN
	select 
			lo.id client_id, code_emplacement
		from 
			emplacements em left outer join emplacement_contrat em_con on em.id=em_con.emplacement_id
			left outer join contrats con on con.id=em_con.contrat_id
			left outer join locataires lo on lo.id=con.locataire_id
			left outer join caisses c on c.locataire_id=lo.id
		where em.code COLLATE utf8mb4_unicode_ci=code_emplacement limit 1;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `creat_commerciaux` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cisse`@`%` PROCEDURE `creat_commerciaux`(nom varchar(100),denomination varchar(100),type varchar(100),adresse_postale varchar(100),ville varchar(100),tel varchar(25))
BEGIN

	set @code =concat('COMMERCIO-',(select count(id) from commerciauxes)) ;
	insert into 
		commerciauxes (code,nom ,denomination ,type,adresse_postale ,ville,tel,statut,created_at,updated_at) 
	values
		(@code,nom ,denomination ,type,adresse_postale ,ville,tel,1,now(), now());
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `dashboard` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `dashboard`()
BEGIN
	set @nbr_emplacement = (select count(*) from emplacements);
    set @nbr_locataire = (select count(*) from locataires);
    set @nbr_emplacement_occup = (select count(*) from emplacements where statut=1);
    set @nbr_emplacement_non = (select count(*) from emplacements where statut=0);
    set @nbr_site = (select count(*) from sites);
    set @nbr_bat = (select count(*) from batiments);
    set @nbr_etag = (select count(*) from etages);
    set @nbr_zone = (select count(*) from zones);
    set @nbr_contrat = (select count(*) from contrats);
    set @nbr_contrat_compl = (select count(*) from contrats where statut_buro1=1 and statut_buro2=1 and statut_buro3=1);
    set @nbr_contrat_pas_paye = (select count(*) from contrats where statut_buro1=1 and statut_buro2=1 and statut_buro3=0);
    set @nbr_contrat_pas_ordonne = (select count(*) from contrats where statut_buro1=1 and statut_buro2=0 and statut_buro3=0);
    set @nbr_cie = (select count(*) from compteur_cies);
    set @nbr_sodeci = (select count(*) from compteur_sodecis);
    set @nbr_gaz = (select count(*) from gazs);
    set @nbr_proprio = (select count(*) from proprietes);
    set @nbr_cie_occup = (select count(*) from compteur_cies where statut=1);
    set @nbr_sodeci_occup = (select count(*) from compteur_sodecis  where statut=1);
    set @nbr_gaz_occup = (select count(*) from gazs  where statut=1);
    set @nbr_proprio_occup = (select count(*) from proprietes  where statut=1);
    
    select @nbr_emplacement nbr_emplacement, @nbr_locataire nbr_locataire, @nbr_emplacement_occup nbr_emplacement_occup
    , @nbr_emplacement_non nbr_emplacement_non, @nbr_site nbr_site,@nbr_bat nbr_bat, @nbr_etag nbr_etag, @nbr_zone nbr_zone,
    @nbr_contrat nbr_contrat, @nbr_contrat_compl nbr_contrat_compl, @nbr_contrat_pas_paye nbr_contrat_pas_paye,
    @nbr_contrat_pas_ordonne nbr_contrat_pas_ordonne, @nbr_cie nbr_cie, @nbr_sodeci nbr_sodeci, @nbr_gaz nbr_gaz,
    @nbr_proprio nbr_proprio, @nbr_cie_occup nbr_cie_occup, @nbr_sodeci_occup nbr_sodeci_occup, @nbr_gaz_occup nbr_gaz_occup,
    @nbr_proprio_occup nbr_proprio_occup;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_cercle_mois` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cisse`@`%` PROCEDURE `get_cercle_mois`()
BEGIN
	declare loyer int;
    declare cie int;
    declare sodeci int;
    declare gaz int;
    declare propriete int;
    
 	set loyer = (
		select sum(somme_payer) from caisses 
		where month(date_payement)=month(now()) 
        and year(date_payement)=year(now())
        and loyer_id is not null);
        
	set cie = (
		select sum(somme_payer) from caisses 
		where month(date_payement)=month(now()) 
        and year(date_payement)=year(now())
        and ciepaiement_id is not null);
        
	set sodeci = (
		select sum(somme_payer) from caisses 
		where month(date_payement)=month(now()) 
        and year(date_payement)=year(now())
        and sodecipaiement_id is not null);
        
	set gaz = (
		select sum(somme_payer) from caisses 
		where month(date_payement)=month(now()) 
        and year(date_payement)=year(now())
        and gazpaiement_id is not null);
        
	set propriete = (
		select sum(somme_payer) from caisses 
		where month(date_payement)=month(now()) 
        and year(date_payement)=year(now())
        and proprietepaiement_id is not null);
        
	select ifnull(loyer, 0) loyer, ifnull(cie, 0) cie, ifnull(sodeci, 0) sodeci, ifnull(gaz, 0) gaz, ifnull(propriete, 0) propriete;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_cercle_semaine` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cisse`@`%` PROCEDURE `get_cercle_semaine`()
BEGIN
	declare loyer int;
    declare cie int;
    declare sodeci int;
    declare gaz int;
    declare propriete int;
    
 	set loyer = (
		select sum(somme_payer) from caisses 
		where week(date_payement)=week(now()) 
        and year(date_payement)=year(now())
        and loyer_id is not null);
        
	set cie = (
		select sum(somme_payer) from caisses 
		where week(date_payement)=week(now()) 
        and year(date_payement)=year(now())
        and ciepaiement_id is not null);
        
	set sodeci = (
		select sum(somme_payer) from caisses 
		where week(date_payement)=week(now()) 
        and year(date_payement)=year(now())
        and sodecipaiement_id is not null);
        
	set gaz = (
		select sum(somme_payer) from caisses 
		where week(date_payement)=week(now()) 
        and year(date_payement)=year(now())
        and gazpaiement_id is not null);
        
	set propriete = (
		select sum(somme_payer) from caisses 
		where week(date_payement)=week(now()) 
        and year(date_payement)=year(now())
        and proprietepaiement_id is not null);
        
	select ifnull(loyer, 0) loyer, ifnull(cie, 0) cie, ifnull(sodeci, 0) sodeci, ifnull(gaz, 0) gaz, ifnull(propriete, 0) propriete;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_diagramme_par_mois` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_diagramme_par_mois`()
BEGIN
	declare janv int;
    declare fev int;
    declare mars int;
    declare avril int;
    declare mais int;
    declare juin int;
    declare juil int;
    declare aout int;
    declare sept int;
    declare oct int;
    declare nov int;
    declare decem int;

		set janv = (select sum(somme_payer)
		from caisses
		where month(date_payement)=1 and year(date_payement)=year(now()));

		set fev = (select sum(somme_payer)
		from caisses
		where month(date_payement)=2 and year(date_payement)=year(now()));

		set mars = (select sum(somme_payer)
		from caisses
		where month(date_payement)=3 and year(date_payement)=year(now()));

		set avril = (select sum(somme_payer)
		from caisses
		where month(date_payement)=4 and year(date_payement)=year(now()));

		set mais = (select sum(somme_payer)
		from caisses
		where month(date_payement)=5 and year(date_payement)=year(now()));

		set juin = (select sum(somme_payer)
		from caisses
		where month(date_payement)=6 and year(date_payement)=year(now()));

		set juil = (select sum(somme_payer)
		from caisses
		where month(date_payement)=7 and year(date_payement)=year(now()));

		set aout = (select sum(somme_payer)
		from caisses
		where month(date_payement)=8 and year(date_payement)=year(now()));

		set sept = (select sum(somme_payer)
		from caisses
		where month(date_payement)=9 and year(date_payement)=year(now()));

		set oct = (select sum(somme_payer)
		from caisses
		where month(date_payement)=10 and year(date_payement)=year(now()));

		set nov = (select sum(somme_payer)
		from caisses
		where month(date_payement)=11 and year(date_payement)=year(now()));

		set decem = (select sum(somme_payer)
		from caisses
		where month(date_payement)=12 and year(date_payement)=year(now()));




		select IFNULL(janv, 0) as janv, IFNULL(fev, 0) as fev, IFNULL(mars, 0) as mars, IFNULL(avril, 0) as avril, IFNULL(mais, 0) as mais, IFNULL(juin, 0) as juin, IFNULL(juil, 0) as juil, IFNULL(aout, 0) as aout, IFNULL(sept, 0) as sept, IFNULL(oct, 0) as oct, IFNULL(nov, 0) as nov, IFNULL(decem, 0) as decem ;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_tva` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_tva`()
BEGIN
	declare TVAvente int;
    declare TVAachat int;
    declare rapport int;
	set @entrer = (select sum(somme_payer) from caisses where operation=1 and month(date_payement)=month(now()) and year(date_payement)=year(now()));
    set @sortir = (select sum(somme_payer) from caisses where operation=2 and month(date_payement)=month(now()) and year(date_payement)=year(now()));
    set TVAvente = (@entrer*18/100);
    set TVAachat = (@sortir*18/100);
    set rapport = (@entrer*18/100) - (@sortir*18/100);
    select @entrer entrer, @sortir sortir, TVAvente,TVAachat, rapport;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `locataire_get_diagramme_par_mois` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `locataire_get_diagramme_par_mois`()
BEGIN
	declare janv int;
    declare fev int;
    declare mars int;
    declare avril int;
    declare mais int;
    declare juin int;
    declare juil int;
    declare aout int;
    declare sept int;
    declare oct int;
    declare nov int;
    declare decem int;

		set janv = (select count(id)
		from locataires
		where month(created_at)=1 and year(created_at)=year(now()));

		set fev = (select count(id)
		from locataires
		where month(created_at)=2 and year(created_at)=year(now()));

		set mars = (select count(id)
		from locataires
		where month(created_at)=3 and year(created_at)=year(now()));

		set avril = (select count(id)
		from locataires
		where month(created_at)=4 and year(created_at)=year(now()));

		set mais = (select count(id)
		from locataires
		where month(created_at)=5 and year(created_at)=year(now()));

		set juin = (select count(id)
		from locataires
		where month(created_at)=6 and year(created_at)=year(now()));

		set juil = (select count(id)
		from locataires
		where month(created_at)=7 and year(created_at)=year(now()));

		set aout = (select count(id)
		from locataires
		where month(created_at)=8 and year(created_at)=year(now()));

		set sept = (select count(id)
		from locataires
		where month(created_at)=9 and year(created_at)=year(now()));

		set oct = (select count(id)
		from locataires
		where month(created_at)=10 and year(created_at)=year(now()));

		set nov = (select count(id)
		from locataires
		where month(created_at)=11 and year(created_at)=year(now()));

		set decem = (select count(id)
		from locataires
		where month(created_at)=12 and year(created_at)=year(now()));




		select IFNULL(janv, 0) as janv, IFNULL(fev, 0) as fev, IFNULL(mars, 0) as mars, IFNULL(avril, 0) as avril, IFNULL(mais, 0) as mais, IFNULL(juin, 0) as juin, IFNULL(juil, 0) as juil, IFNULL(aout, 0) as aout, IFNULL(sept, 0) as sept, IFNULL(oct, 0) as oct, IFNULL(nov, 0) as nov, IFNULL(decem, 0) as decem ;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `return_paiement` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cisse`@`%` PROCEDURE `return_paiement`(code_emplacement varchar(100))
BEGIN
	set @client_id=(
    select 
			lo.id
		from 
			emplacements em left outer join emplacement_contrat em_con on em.id=em_con.emplacement_id
			left outer join contrats con on con.id=em_con.contrat_id
			left outer join locataires lo on lo.id=con.locataire_id
			left outer join caisses c on c.locataire_id=lo.id
		where em.code COLLATE utf8mb4_unicode_ci=code_emplacement limit 1);
        -- select @client_id;
        
	insert into caisses (date_payement,somme_payer,statut,locataire_id,created_at, updated_at) values(now(), 200,1,@client_id, now(), now());
    
    update emplacements em set paiement_journalier=0 where em.code COLLATE utf8mb4_unicode_ci=code_emplacement;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `update_bordereaux` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cisse`@`%` PROCEDURE `update_bordereaux`(commerciaux_id int)
BEGIN
	update emplacements e set paiement_journalier=0  where e.commerciaux_id=commerciaux_id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `update_emplacement` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cisse`@`%` PROCEDURE `update_emplacement`(emplacement_id int, commerciaux_id int)
BEGIN
	update emplacements e set e.commerciaux_id=commerciaux_id where e.id=emplacement_id;
   
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `update_payer` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cisse`@`%` PROCEDURE `update_payer`(emplacement_id int)
BEGIN
	set @commercio_id = (select commerciaux_id from emplacements e where e.id=emplacement_id);
   -- select  @commercio_id;
    -- /*
	update emplacements set paiement_journalier=1 where id=emplacement_id;
    insert into 
		caisses (date_payement,somme_payer,loyer_id,created_at,updated_at,commerciaux_id)
	values(cast(now() as date), 200, 1, now(), now(), @commercio_id);
    -- */
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-09-16 18:20:19

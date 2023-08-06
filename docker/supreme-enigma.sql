-- MySQL dump 10.13  Distrib 8.0.31, for Linux (x86_64)
--
-- Host: localhost    Database: supreme-enigma
-- ------------------------------------------------------
-- Server version	8.0.31-0ubuntu0.20.04.1

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
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20220501155128','2022-05-01 17:51:50',23),('DoctrineMigrations\\Version20220501173325','2022-05-01 19:33:31',73);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `project` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `github_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_main` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project`
--

LOCK TABLES `project` WRITE;
/*!40000 ALTER TABLE `project` DISABLE KEYS */;
INSERT INTO `project` VALUES (1,'Site portfolio','Le présent site, réalisé sur Symfony pour la partie projets stockée en base de données. Le but est ici de permettre d\'accéder simplement et rapidement à mes projets ainsi qu\'à leur code. Le css est 100% fait à la main. Tous les sites y compris celui-ci sont hébergés sur un serveur perso configuré sur mon Raspberry PI.','portfolio.png','https://github.com/TristanBonnal/supreme-enigma','/',1),(2,'Ecommerce Symfony','Site ecommerce classique réalisé avec Symfony. Ce projet m\'a permis d\'apprendre à utiliser une API de paiement en ligne (Stripe), ainsi qu\'un mailer externe (Mailjet). J\'ai de plus pour la première fois utilisé Easy Admin pour réaliser le back office.','symfo-ecommerce.png\r\n','https://github.com/TristanBonnal/ecommerce-symfony','http://ecommerce.tristan-bonnal.fr',1),(3,'My Piggy Bank','Projet de fin de formation, My Piggy Bank est un site de cagnotte en ligne, permettant d\'épargner de l\'argent tout en se fixant des objectifs qui sécurisent notre argent pour une durée déterminée. Une fois inscrit, nous pouvons donc créer une cagnotte, déterminer nous même une date ou une somme à atteindre avant de pouvoir retirer, déposer de l\'argent (virtuellement pour le moment), accéder à nos cagnottes et nos transactions. La partie paiement n\'a pas encore été intégrée. Vous pouvez voir la présentation vidéo du projet sur ce <a class=\"description-link\" href=\"https://www.youtube.com/watch?v=1bJ_6vi__1s&t=2458s\" target=\"_blank\">lien youtube</a>.','mypiggybank.png','https://github.com/TristanBonnal/my-piggy-bank-api','http://my-piggy-bank.surge.sh/',1),(5,'Foodtruck Spots','Application légère permettant de réserver des emplacements pour un foodtruck. Le but était principalement de travailler l’algorithmie, tout en révisant Javascript et AJAX. Le lien github mène vers l\'API, mais n\'hésitez pas à consulter le frontend que j\'ai réalisé.','foodtruck.png','https://github.com/TristanBonnal/foodtruck-api','http://foodtruck.tristan-bonnal.fr',1),(6,'Blog Symfony','Modèle basique de blog réalisé avec Symfony durant mon temps libre quand j\'étais encore en formation. Commenter n\'est possible qu\'en tant qu\'utilisateur loggé, le contenu est géré par les modérateurs et les admins.','blog.png','https://github.com/TristanBonnal/blog-symfony','http://blog.tristan-bonnal.fr',1);
/*!40000 ALTER TABLE `project` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-15 19:50:25

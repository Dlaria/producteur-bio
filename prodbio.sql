-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: localhost    Database: prodbio
-- ------------------------------------------------------
-- Server version	8.0.31

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
-- Table structure for table `panieruser`
--

DROP TABLE IF EXISTS `panieruser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `panieruser` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Email` varchar(255) NOT NULL,
  `quantiteProduit1` int NOT NULL,
  `poidsProduit1` varchar(50) NOT NULL,
  `quantiteProduit2` int NOT NULL,
  `poidsProduit2` varchar(50) NOT NULL,
  `quantiteProduit3` int NOT NULL,
  `poidsProduit3` varchar(50) NOT NULL,
  `quantiteProduit4` int NOT NULL,
  `poidsProduit4` varchar(50) NOT NULL,
  `quantiteProduit5` int NOT NULL,
  `poidsProduit5` varchar(50) NOT NULL,
  `fraisDePort` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf32;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `panieruser`
--

LOCK TABLES `panieruser` WRITE;
/*!40000 ALTER TABLE `panieruser` DISABLE KEYS */;
INSERT INTO `panieruser` VALUES (7,'airald.73@orange.fr',3,'1 kg',3,'350 g',3,'2 kg',3,'380 g',3,'6 bouteilles','OFFERT');
/*!40000 ALTER TABLE `panieruser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produit`
--

DROP TABLE IF EXISTS `produit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produit` (
  `id` int NOT NULL AUTO_INCREMENT,
  `SrcImage` varchar(50) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Origine` varchar(50) NOT NULL,
  `Prix` float NOT NULL,
  `Poids` varchar(255) NOT NULL,
  `Prix2` float NOT NULL,
  `Poids2` varchar(255) CHARACTER SET utf32 COLLATE utf32_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf32;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produit`
--

LOCK TABLES `produit` WRITE;
/*!40000 ALTER TABLE `produit` DISABLE KEYS */;
INSERT INTO `produit` VALUES (1,'./images_site/quinoa.png','Quinoa (vrac)','ANJOU',5,'1 kg',8,'2 kg'),(2,'./images_site/sauce-tomate.png','Sauce Tomate (bocal)','BRETAGNE',2,'350 g',0,''),(3,'./images_site/riz.png','Riz de camargue (vrac)','OCCITANIE',5.5,'1 kg',9.5,'2 kg'),(4,'./images_site/confiture.png','Confiture de clemantine de corse','CORSE',3.8,'380 g',5,'660 g'),(5,'./images_site/vin.png','Vin rouge AOP Saumur','PAYS DE LA LOIRE',8,'1 bouteille',45,'6 bouteilles');
/*!40000 ALTER TABLE `produit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL,
  `Prénom` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `NumEtRue` varchar(255) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL,
  `ComplementAdresse` varchar(255) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL,
  `CodePostal` int NOT NULL,
  `Ville` varchar(255) NOT NULL,
  `NumMobile` int NOT NULL,
  `NumEtRueFact` varchar(255) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL,
  `ComplementAdresseFact` varchar(255) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL,
  `CodePostalFact` int NOT NULL,
  `VilleFact` varchar(255) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf32;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (19,'Briard','Airald','airald.73@orange.fr','50 rue des chevillards','les mésange',73250,'St Pierre D\'Albigny',650023762,'4205 route du val-gelon','chef-lieu',73390,'Villard-Léger');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-03-16 11:19:11

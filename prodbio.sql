-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 15 mars 2023 à 10:10
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `prodbio`
--

-- --------------------------------------------------------

--
-- Structure de la table `panieruser`
--

DROP TABLE IF EXISTS `panieruser`;
CREATE TABLE IF NOT EXISTS `panieruser` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Email` varchar(255) NOT NULL,
  `quantiteProduit1` int NOT NULL,
  `quantiteProduit2` int NOT NULL,
  `quantiteProduit3` int NOT NULL,
  `quantiteProduit4` int NOT NULL,
  `quantiteProduit5` int NOT NULL,
  `fraisDePort` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` int NOT NULL AUTO_INCREMENT,
  `SrcImage` varchar(50) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Origine` varchar(50) NOT NULL,
  `Prix` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf32;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `SrcImage`, `Nom`, `Origine`, `Prix`) VALUES
(1, './images_site/quinoa.png', 'Quinoa (vrac)', 'ANJOU', 5),
(2, './images_site/sauce-tomate.png', 'Sauce Tomate (bocal)', 'BRETAGNE', 2),
(3, './images_site/riz.png', 'Riz de camargue (vrac)', 'OCCITANIE', 5.5),
(4, './images_site/confiture.png', 'Confiture de clemantine de corse', 'CORSE', 3.8),
(5, './images_site/vin.png', 'Vin rouge AOP Saumur', 'PAYS DE LA LOIRE', 8);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

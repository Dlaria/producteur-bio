-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 02 mars 2023 à 13:48
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
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL,
  `Origine` varchar(50) NOT NULL,
  `Prix` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf32;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `Nom`, `Origine`, `Prix`) VALUES
(1, 'Quinoa (vrac)', 'ANJOU', 5),
(2, 'Sauce Tomate (bocal)', 'BRETAGNE', 2),
(3, 'Riz de camargue (vrac)', 'OCCITANIE', 5.5),
(4, 'Confiture de clemantine de corse', 'CORSE', 3.8),
(5, 'Vin rouge AOP Saumur', 'PAYS DE LA LOIRE', 8);

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
  `N° et rue` varchar(255) NOT NULL,
  `Complément d'adresse` varchar(255) NOT NULL,
  `Code postal` int NOT NULL,
  `Ville` varchar(255) NOT NULL,
  `N° mobile` int NOT NULL,
  `N° et rue (fact)` varchar(255) NOT NULL,
  `Complément d'adresse (fact)` varchar(255) NOT NULL,
  `Code postal (fact)` int NOT NULL,
  `Ville (fact)` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

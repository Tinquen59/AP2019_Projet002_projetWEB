-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  jeu. 14 mai 2020 à 12:18
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `formulaire`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `IdClient` int(50) NOT NULL AUTO_INCREMENT,
  `Civilite` varchar(20) NOT NULL,
  `Prenom` varchar(200) NOT NULL,
  `Nom` varchar(200) NOT NULL,
  `PosteOccupe` varchar(200) DEFAULT NULL,
  `Adresse1` varchar(200) DEFAULT NULL,
  `Adresse2` varchar(200) DEFAULT NULL,
  `TelephoneFixe` int(30) DEFAULT NULL,
  `TelephonePortable` int(30) DEFAULT NULL,
  `GUID` varchar(60) NOT NULL,
  `CodePostal` int(15) NOT NULL,
  `NomVille` varchar(50) NOT NULL,
  `NomSociete` varchar(100) DEFAULT NULL,
  `TelephoneDirect` text,
  `TelephoneSociete` int(20) DEFAULT NULL,
  PRIMARY KEY (`IdClient`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `guid`
--

DROP TABLE IF EXISTS `guid`;
CREATE TABLE IF NOT EXISTS `guid` (
  `GUID` varchar(200) NOT NULL,
  `Nom` varchar(100) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `IsSociete` tinyint(1) NOT NULL,
  PRIMARY KEY (`GUID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

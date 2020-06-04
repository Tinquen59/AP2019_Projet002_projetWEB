-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 04 juin 2020 à 13:22
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

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
  `TelephoneDirect` int(30) DEFAULT NULL,
  `TelephoneSociete` int(11) DEFAULT NULL,
  `Email` varchar(255) NOT NULL,
  PRIMARY KEY (`IdClient`),
  KEY `guid` (`GUID`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`IdClient`, `Civilite`, `Prenom`, `Nom`, `PosteOccupe`, `Adresse1`, `Adresse2`, `TelephoneFixe`, `TelephonePortable`, `GUID`, `CodePostal`, `NomVille`, `NomSociete`, `TelephoneDirect`, `TelephoneSociete`, `Email`) VALUES
(15, 'monsieur', 'Fabien', 'Dupont', 'Directeur', '3 Rue des potiers', NULL, NULL, NULL, '90776f84-94a3-492b-853b-bff77d416e6b', 62560, 'Thiembronne', 'Chez Fabien', 303030303, 606060606, 'fdupont@yahoo.fr'),
(19, 'madame', 'Lucie', 'Dupond', NULL, '14 Rue du champignon', '', 606060606, 707070707, 'c1417696-392b-4053-8864-12bf8f8d5236', 78500, 'Sartrouville', NULL, NULL, NULL, 'lucie-dupond@gmail.com'),
(20, 'madame', 'Claudine', 'Lamontagne', NULL, '25 rue du coquelicot', '', 303030303, 606060606, '699a83fe-82d1-41e8-bcfd-d9a25635e196', 59700, 'Marcq-en-BarÅ“ul', NULL, NULL, NULL, 'claudine-lamontagne@societe.fr'),
(21, 'monsieur', 'Maurice', 'Lessage', 'SecrÃ©taire', '14 Rue du champignon', NULL, NULL, NULL, '553d2066-ff19-42dc-b08e-c8ed676e8d3b', 74800, 'Etaux', 'Justin bridou', 707070707, 606060606, 'lessagemaurice@societe.com');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `guid`
--

INSERT INTO `guid` (`GUID`, `Nom`, `Email`, `IsSociete`) VALUES
('1eee4438-6095-4531-acaf-e0436caf9e81', 'Toto', 'toto@sfr.fr', 0),
('553d2066-ff19-42dc-b08e-c8ed676e8d3b', 'Lessage', 'lessagemaurice@societe.com', 1),
('699a83fe-82d1-41e8-bcfd-d9a25635e196', 'Lamontagne', 'claudine-lamontagne@societe.fr', 0),
('90776f84-94a3-492b-853b-bff77d416e6b', 'Dupont', 'fdupont@gmail.com', 1),
('99ded90e-8513-4213-adca-2332393b8aa5', 'Cailot', 'rosemarie@gmail.com', 0),
('c1417696-392b-4053-8864-12bf8f8d5236', 'Dupond', 'lucie-dupond@gmail.com', 0),
('d389bd92-acf4-4f3d-814f-7ff093a9603e', 'Dupan', 'stephane.dupan@yahoo.com', 1),
('db203954-b99b-4d41-a270-ef7d52405ea2', 'Tutu', 'e-tutu@gmial.com', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `guid` FOREIGN KEY (`GUID`) REFERENCES `guid` (`GUID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

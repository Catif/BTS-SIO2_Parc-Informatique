-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 15 déc. 2021 à 13:31
-- Version du serveur :  10.6.4-MariaDB
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `parc_informatique`
--

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

DROP TABLE IF EXISTS `classe`;
CREATE TABLE IF NOT EXISTS `classe` (
  `CLASSE` varchar(55) NOT NULL,
  PRIMARY KEY (`CLASSE`),
  UNIQUE KEY `CLASSE` (`CLASSE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`CLASSE`) VALUES
('SIO2 SISR'),
('SIO2 SLAM');

-- --------------------------------------------------------

--
-- Structure de la table `detient`
--

DROP TABLE IF EXISTS `detient`;
CREATE TABLE IF NOT EXISTS `detient` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_UTILISATEUR` int(11) DEFAULT NULL,
  `PORTABLE` tinyint(1) NOT NULL,
  `TABLETTE` tinyint(1) NOT NULL,
  `ORDI_FIXE` tinyint(1) NOT NULL,
  `ORDI_PORTABLE` tinyint(1) NOT NULL,
  `FAI` tinyint(1) NOT NULL,
  `CAMERA` tinyint(1) NOT NULL,
  `MICROPHONE` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`),
  KEY `ID_UTILISATEUR` (`ID_UTILISATEUR`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `detient`
--

INSERT INTO `detient` (`ID`, `ID_UTILISATEUR`, `PORTABLE`, `TABLETTE`, `ORDI_FIXE`, `ORDI_PORTABLE`, `FAI`, `CAMERA`, `MICROPHONE`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 2, 0, 0, 0, 0, 1, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `fai`
--

DROP TABLE IF EXISTS `fai`;
CREATE TABLE IF NOT EXISTS `fai` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_UTILISATEUR` int(11) DEFAULT NULL,
  `FAI` varchar(32) DEFAULT NULL,
  `DEBIT_ASCENDANT_FAI` double DEFAULT NULL,
  `DEBIT_DESCENDANT_FAI` double DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`),
  KEY `ID_UTILISATEUR` (`ID_UTILISATEUR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `ordi_fixe`
--

DROP TABLE IF EXISTS `ordi_fixe`;
CREATE TABLE IF NOT EXISTS `ordi_fixe` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_UTILISATEUR` int(11) DEFAULT NULL,
  `OS` varchar(64) DEFAULT NULL,
  `PROCESSEUR` varchar(32) DEFAULT NULL,
  `CARTE_GRAPHIQUE` varchar(32) DEFAULT NULL,
  `RAM` int(11) DEFAULT NULL,
  `STOCKAGE` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`),
  KEY `ID_UTILISATEUR` (`ID_UTILISATEUR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `ordi_portable`
--

DROP TABLE IF EXISTS `ordi_portable`;
CREATE TABLE IF NOT EXISTS `ordi_portable` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_UTILISATEUR` int(11) DEFAULT NULL,
  `REGION` tinyint(1) NOT NULL,
  `OS` varchar(64) DEFAULT NULL,
  `PROCESSEUR` varchar(32) DEFAULT NULL,
  `CARTE_GRAPHIQUE` varchar(32) DEFAULT NULL,
  `RAM` int(11) DEFAULT NULL,
  `STOCKAGE` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`),
  KEY `ID_UTILISATEUR` (`ID_UTILISATEUR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `portable`
--

DROP TABLE IF EXISTS `portable`;
CREATE TABLE IF NOT EXISTS `portable` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_UTILISATEUR` int(11) DEFAULT NULL,
  `MODELE` varchar(32) DEFAULT NULL,
  `OS` varchar(64) DEFAULT NULL,
  `PROCESSEUR` varchar(32) DEFAULT NULL,
  `RAM` int(11) DEFAULT NULL,
  `STOCKAGE` int(11) DEFAULT NULL,
  `FAI` varchar(32) DEFAULT NULL,
  `DATA_GO` double DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`),
  KEY `ID_UTILISATEUR` (`ID_UTILISATEUR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `tablette`
--

DROP TABLE IF EXISTS `tablette`;
CREATE TABLE IF NOT EXISTS `tablette` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_UTILISATEUR` int(11) DEFAULT NULL,
  `MODELE` varchar(32) DEFAULT NULL,
  `OS` varchar(64) DEFAULT NULL,
  `PROCESSEUR` varchar(32) DEFAULT NULL,
  `RAM` int(11) DEFAULT NULL,
  `STOCKAGE` int(11) DEFAULT NULL,
  `FAI` varchar(32) DEFAULT NULL,
  `DATA_GO` double DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`),
  KEY `ID_UTILISATEUR` (`ID_UTILISATEUR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `ID_UTILISATEUR` int(11) NOT NULL AUTO_INCREMENT,
  `CLASSE` varchar(55) DEFAULT NULL,
  `TYPE` varchar(32) NOT NULL,
  `NOM` varchar(32) DEFAULT NULL,
  `PRENOM` varchar(32) DEFAULT NULL,
  `MAIL` varchar(128) NOT NULL,
  `MOT_DE_PASSE` varchar(128) NOT NULL,
  `ROLE` varchar(32) NOT NULL,
  PRIMARY KEY (`ID_UTILISATEUR`),
  UNIQUE KEY `ID_UTILISATEUR` (`ID_UTILISATEUR`),
  KEY `CLASSE` (`CLASSE`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID_UTILISATEUR`, `CLASSE`, `TYPE`, `NOM`, `PRENOM`, `MAIL`, `MOT_DE_PASSE`, `ROLE`) VALUES
(1, NULL, 'Administrateur', 'BARBIER', 'Bradley', 'bradley.barbier@outlook.fr', 'Shiro5416', 'admin'),
(2, NULL, 'Administrateur', 'JOLIOT', 'Julien', 'julien.joliot@outlook.fr', 'Hobbaman5416', 'admin'),
(3, 'SIO2 SISR', 'Etudiant', 'John', 'Doe', 'john.doe@example.com', 'testMdp', 'user');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `detient`
--
ALTER TABLE `detient`
  ADD CONSTRAINT `detient_ibfk_1` FOREIGN KEY (`ID_UTILISATEUR`) REFERENCES `utilisateur` (`ID_UTILISATEUR`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `fai`
--
ALTER TABLE `fai`
  ADD CONSTRAINT `fai_ibfk_1` FOREIGN KEY (`ID_UTILISATEUR`) REFERENCES `utilisateur` (`ID_UTILISATEUR`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `ordi_fixe`
--
ALTER TABLE `ordi_fixe`
  ADD CONSTRAINT `ordi_fixe_ibfk_1` FOREIGN KEY (`ID_UTILISATEUR`) REFERENCES `utilisateur` (`ID_UTILISATEUR`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `ordi_portable`
--
ALTER TABLE `ordi_portable`
  ADD CONSTRAINT `ordi_portable_ibfk_1` FOREIGN KEY (`ID_UTILISATEUR`) REFERENCES `utilisateur` (`ID_UTILISATEUR`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `portable`
--
ALTER TABLE `portable`
  ADD CONSTRAINT `portable_ibfk_1` FOREIGN KEY (`ID_UTILISATEUR`) REFERENCES `utilisateur` (`ID_UTILISATEUR`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tablette`
--
ALTER TABLE `tablette`
  ADD CONSTRAINT `tablette_ibfk_1` FOREIGN KEY (`ID_UTILISATEUR`) REFERENCES `utilisateur` (`ID_UTILISATEUR`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`CLASSE`) REFERENCES `classe` (`CLASSE`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

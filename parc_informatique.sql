-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 13 déc. 2021 à 20:26
-- Version du serveur :  5.7.31
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
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CLASSE` varchar(55) DEFAULT NULL,
  `CLASSE_COMPLET` varchar(55) DEFAULT NULL,
  `SPECIALITE` varchar(10) DEFAULT NULL,
  `SPECIALITE_COMPLET` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `detient`
--

DROP TABLE IF EXISTS `detient`;
CREATE TABLE IF NOT EXISTS `detient` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_UTILISATEUR` int(11) DEFAULT NULL,
  `PORTABLE` tinyint(1) NOT NULL DEFAULT '0',
  `TABLETTE` tinyint(1) NOT NULL DEFAULT '0',
  `ORDI_FIXE` tinyint(1) NOT NULL DEFAULT '0',
  `ORDI_PORTABLE` tinyint(1) NOT NULL DEFAULT '0',
  `FAI` tinyint(1) NOT NULL DEFAULT '0',
  `CAMERA` tinyint(1) NOT NULL DEFAULT '0',
  `MICROPHONE` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `ID_UTILISATEUR` (`ID_UTILISATEUR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  KEY `ID_UTILISATEUR` (`ID_UTILISATEUR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  KEY `ID_UTILISATEUR` (`ID_UTILISATEUR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  KEY `ID_UTILISATEUR` (`ID_UTILISATEUR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  KEY `ID_UTILISATEUR` (`ID_UTILISATEUR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  KEY `ID_UTILISATEUR` (`ID_UTILISATEUR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `ID_UTILISATEUR` int(11) NOT NULL AUTO_INCREMENT,
  `ID` int(11) DEFAULT NULL,
  `ROLE` varchar(32) NOT NULL,
  `NOM` varchar(32) DEFAULT NULL,
  `PRENOM` varchar(32) DEFAULT NULL,
  `DATE_NAISSANCE` datetime DEFAULT NULL,
  `MAIL` varchar(128) NOT NULL,
  `MOT_DE_PASSE` varchar(128) NOT NULL,
  `SPECIALITE` varchar(10) DEFAULT NULL,
  `NUMERO_TEL` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`ID_UTILISATEUR`),
  KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

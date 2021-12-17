-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 17 déc. 2021 à 09:28
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
  `FAI` tinyint(1) NOT NULL,
  `CAMERA` tinyint(1) NOT NULL,
  `MICROPHONE` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`),
  KEY `ID_UTILISATEUR` (`ID_UTILISATEUR`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `detient`
--

INSERT INTO `detient` (`ID`, `ID_UTILISATEUR`, `FAI`, `CAMERA`, `MICROPHONE`) VALUES
(1, 3, 1, 1, 0),
(2, 10, 0, 0, 1),
(3, 11, 1, 1, 0),
(5, 19, 0, 0, 0);

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
  `CREATED_AT` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `EDITED_AT` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
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
  `CREATED_AT` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `EDITED_AT` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`),
  KEY `ID_UTILISATEUR` (`ID_UTILISATEUR`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `ordi_fixe`
--

INSERT INTO `ordi_fixe` (`ID`, `ID_UTILISATEUR`, `OS`, `PROCESSEUR`, `CARTE_GRAPHIQUE`, `RAM`, `STOCKAGE`, `CREATED_AT`, `EDITED_AT`) VALUES
(1, 3, 'Windows', 'dqzd', '', 0, 0, '2021-12-16 23:37:13.542250', '2021-12-16 23:37:13.542250'),
(2, 3, 'Windows', 'dqzd', '', 0, 0, '2021-12-16 23:39:23.430958', '2021-12-16 23:39:23.430958'),
(3, 3, 'Windows', 'dqzd', '', 0, 0, '2021-12-16 23:39:33.172095', '2021-12-16 23:39:33.172095'),
(4, 3, 'Windows', 'dqzd', '', 0, 0, '2021-12-16 23:39:34.416410', '2021-12-16 23:39:34.416410');

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
  `CREATED_AT` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `EDITED_AT` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`),
  KEY `ID_UTILISATEUR` (`ID_UTILISATEUR`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `ordi_portable`
--

INSERT INTO `ordi_portable` (`ID`, `ID_UTILISATEUR`, `REGION`, `OS`, `PROCESSEUR`, `CARTE_GRAPHIQUE`, `RAM`, `STOCKAGE`, `CREATED_AT`, `EDITED_AT`) VALUES
(1, 3, 0, 'Mac', '', '', 0, 0, '2021-12-16 23:36:52.703027', '2021-12-17 09:15:38.000000');

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
  `CREATED_AT` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `EDITED_AT` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`),
  KEY `ID_UTILISATEUR` (`ID_UTILISATEUR`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `portable`
--

INSERT INTO `portable` (`ID`, `ID_UTILISATEUR`, `MODELE`, `OS`, `PROCESSEUR`, `RAM`, `STOCKAGE`, `FAI`, `DATA_GO`, `CREATED_AT`, `EDITED_AT`) VALUES
(1, 9, 'Samsung', 'Android', '', 0, 0, '', 0, '2021-12-16 19:12:05.517992', '2021-12-16 19:12:05.517992'),
(5, 9, 'Samsung', 'Android', '', 0, 0, '', 0, '2021-12-16 19:12:05.517992', '2021-12-16 19:12:05.517992'),
(9, 19, 'Samsung', 'Android', '', 0, 0, '', 0, '2021-12-17 08:24:25.973913', '2021-12-17 08:24:25.973913'),
(10, 19, 'Samsung', 'Android', '', 0, 0, '', 0, '2021-12-17 08:24:39.171796', '2021-12-17 08:24:39.171796');

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
  `CREATED_AT` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `EDITED_AT` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`),
  KEY `ID_UTILISATEUR` (`ID_UTILISATEUR`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `tablette`
--

INSERT INTO `tablette` (`ID`, `ID_UTILISATEUR`, `MODELE`, `OS`, `PROCESSEUR`, `RAM`, `STOCKAGE`, `FAI`, `DATA_GO`, `CREATED_AT`, `EDITED_AT`) VALUES
(1, 3, 'dqzd', 'autre', '', 1, 0, '', 0, '2021-12-16 23:36:57.180347', '2021-12-17 09:15:31.000000');

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID_UTILISATEUR`, `CLASSE`, `TYPE`, `NOM`, `PRENOM`, `MAIL`, `MOT_DE_PASSE`, `ROLE`) VALUES
(3, 'SIO2 SLAM', 'Etudiant', 'ETUDIANT', 'Etudiant', 'etudiant@etudiant', '$2y$10$z4pZzW5/xzubZDALlY17auLjufpaKzyb1LLZYf9HzZ5Vs0xpUV2lq', 'user'),
(9, NULL, 'Administrateur', 'ADMIN', 'Admin', 'admin@admin', '$2y$10$fxzluVTKw2PIzCz0nCRUeuPmMtpENZYZZFUg9cgzw/JkyCA7YJpI2', 'admin'),
(10, 'SIO2 SISR', 'Etudiant', 'ETUDIANT2', 'Etudiant2', 'etudiant2@etudiant2', '$2y$10$dFrfnm1eqaG7P.4ppoOG7e8ajTulWah2zo7z3S.cYbZO7sU6AqT.q', 'user'),
(11, 'SIO2 SISR', 'Etudiant', 'ETUDIANT3', 'Etudiant3', 'etudiant3@etudiant3', '$2y$10$JdgvrKNVldOaKWjDGE6OB.m2c/tkx3azRGyGMJUFQGbTxNfFqf9Dq', 'user'),
(12, NULL, 'Administration', 'INFO', 'Info', 'info@info', '$2y$10$rJlbRh9rt2sqb2cY4CR22OZ/XkYunfA1B4U4TGAWZm9fV8PlvA7mK', 'reader'),
(14, 'SIO2 SLAM', 'Professeur', 'PROF', 'Prof', 'prof@prof', '$2y$10$ajyIQyHfOjXm0iZ0/pfM1ex/Dn1uHyIDJJThTGMfdYNQlU6karAl.', 'reader'),
(18, NULL, 'RegionEst', 'EST', 'Region', 'region@est', '$2y$10$ePdS2MHke4laxnLnehUSA.KbOnLwvyecVw6bZP58xwgx4KyORxjfC', 'reader'),
(19, 'SIO2 SISR', 'Etudiant', 'BARBIER', 'Bradley', 'bradley.barbier@outlook.fr', '$2y$10$IKdzbrQEikElQNPuXjSgIOMErt.J9DHvOdMKxL5Fl0iuA7.lINL3S', 'user');

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

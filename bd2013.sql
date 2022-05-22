-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le : Dim 22 Mai 2022 à 17:49
-- Version du serveur: 5.5.20
-- Version de PHP: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `bd2013`
--

-- --------------------------------------------------------

--
-- Structure de la table `eleve`
--

CREATE TABLE IF NOT EXISTS `eleve` (
  `Numero` varchar(5) NOT NULL,
  `NomPrenom` varchar(50) NOT NULL,
  `DateNaiss` date NOT NULL,
  PRIMARY KEY (`Numero`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `eleve`
--

INSERT INTO `eleve` (`Numero`, `NomPrenom`, `DateNaiss`) VALUES
('1', 'Hamouda ben abdennebi', '2002-02-04'),
('2', 'Mahmoud ben mossa', '2004-01-02'),
('3', 'montasar zouaoui', '2003-09-04'),
('4', 'Ali sami chaouch', '2004-05-04');

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE IF NOT EXISTS `matiere` (
  `Code` varchar(4) NOT NULL,
  `Libelle` varchar(60) NOT NULL,
  `Coeff` decimal(4,2) NOT NULL,
  PRIMARY KEY (`Code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `matiere`
--

INSERT INTO `matiere` (`Code`, `Libelle`, `Coeff`) VALUES
('Algo', 'Algorithme et programmation', '3.00'),
('BD', 'Bases de donnees', '1.50'),
('TIC', 'Technologie de l''informatique et de la communication', '1.50');

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE IF NOT EXISTS `note` (
  `NumEleve` varchar(5) NOT NULL,
  `CodeMatiere` varchar(4) NOT NULL,
  `DC` decimal(5,2) NOT NULL,
  `DS` decimal(5,2) NOT NULL,
  PRIMARY KEY (`NumEleve`,`CodeMatiere`),
  KEY `CodeMatiere` (`CodeMatiere`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `note_ibfk_2` FOREIGN KEY (`CodeMatiere`) REFERENCES `matiere` (`Code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `note_ibfk_1` FOREIGN KEY (`NumEleve`) REFERENCES `eleve` (`Numero`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

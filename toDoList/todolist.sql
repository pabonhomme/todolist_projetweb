-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 04 jan. 2021 à 14:31
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
-- Base de données : `todolist`
--

-- --------------------------------------------------------

--
-- Structure de la table `listetaches`
--

DROP TABLE IF EXISTS `listetaches`;
CREATE TABLE IF NOT EXISTS `listetaches` (
  `idListeTaches` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `confidentialite` tinyint(1) NOT NULL,
  `description` varchar(100) NOT NULL,
  `pseudo` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idListeTaches`),
  KEY `pseudo` (`pseudo`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `listetaches`
--

INSERT INTO `listetaches` (`idListeTaches`, `nom`, `confidentialite`, `description`, `pseudo`) VALUES
(1, 'liste de courses', 0, 'Je dois aller faire les courses, heureusement que j\'ai noté ce qu\'il me fallait', ''),
(2, 'devoirs à faire', 0, 'Ma liste de devoirs à faire est encore bien fournie', ''),
(8, 'Construire PC', 1, 'Je vais devoir créer un PC.', 'shotlouf'),
(25, 'Étudiants à noter', 1, 'ça va être long', 'sebsalva'),
(26, 'Travaux maison', 0, 'Il y a beaucoup de boulot', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tache`
--

DROP TABLE IF EXISTS `tache`;
CREATE TABLE IF NOT EXISTS `tache` (
  `idTache` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `terminee` tinyint(1) NOT NULL,
  `idListeTaches` int(11) NOT NULL,
  PRIMARY KEY (`idTache`),
  KEY `ListeDeLaTache` (`idListeTaches`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tache`
--

INSERT INTO `tache` (`idTache`, `nom`, `terminee`, `idListeTaches`) VALUES
(14, 'Nuggets', 0, 1),
(3, 'poireau', 1, 1),
(5, 'Jus d\'orange', 0, 1),
(6, 'Vodka', 0, 1),
(7, 'Explication de texte', 0, 2),
(8, 'exercice 1 d\'anglais', 0, 2),
(9, 'Mathématiques', 0, 2),
(18, 'oui', 0, 8),
(22, 'Paul et Noé', 0, 25),
(23, 'Ambroise et Sami', 0, 25);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `pseudo` varchar(20) NOT NULL,
  `motDePasse` varchar(255) NOT NULL,
  PRIMARY KEY (`pseudo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`pseudo`, `motDePasse`) VALUES
('shotlouf', '$2y$10$relHJu8U9IwDqPx6Z7QUMOlcbZGfVcF9nrx0QdWTVmVz4afqpQdqe'),
('paul_b63', '$2y$10$2e2bUWaICDpcCsZN3k9jC.9kgoBxw95avvRaCyfteZB9QDiTb1kuO'),
('sebsalva', '$2y$10$2.jeah/EZ1GBSOG69f/r6.j4DGOpOWBsldi2v033K/JOoxSUsqJbm');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

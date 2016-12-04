-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 04 Décembre 2016 à 14:03
-- Version du serveur :  10.1.19-MariaDB
-- Version de PHP :  5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `loveletterdb`
--

-- --------------------------------------------------------

--
-- Structure de la table `cards`
--

CREATE TABLE `cards` (
  `id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `path` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `cards`
--

INSERT INTO `cards` (`id`, `name`, `path`) VALUES
(1, 'Guard', 'http://localhost/LoveLetter/upload/guard.png'),
(2, 'Priestess', 'http://localhost/LoveLetter/upload/priestess.png'),
(3, 'Baron', 'http://localhost/LoveLetter/upload/baron.png'),
(4, 'Handmaid', 'http://localhost/LoveLetter/upload/handmaid.png'),
(5, 'Prince', 'http://localhost/LoveLetter/upload/prince.png'),
(6, 'King', 'http://localhost/LoveLetter/upload/king.png'),
(7, 'Countess', 'http://localhost/LoveLetter/upload/countess.png'),
(8, 'Princess', 'http://localhost/LoveLetter/upload/princess.png');

-- --------------------------------------------------------

--
-- Structure de la table `cards_stack`
--

CREATE TABLE `cards_stack` (
  `id_lobby` int(11) NOT NULL,
  `id_carte` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `cards_stack`
--

INSERT INTO `cards_stack` (`id_lobby`, `id_carte`, `quantite`) VALUES
(20, 1, 95),
(20, 2, 94),
(20, 3, 89),
(20, 4, 91),
(20, 5, 93),
(20, 6, 96),
(20, 7, 96),
(20, 8, 97);

-- --------------------------------------------------------

--
-- Structure de la table `cartesmain`
--

CREATE TABLE `cartesmain` (
  `pseudo` varchar(50) NOT NULL,
  `premiere` int(11) DEFAULT NULL,
  `deuxieme` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `cartesmain`
--

INSERT INTO `cartesmain` (`pseudo`, `premiere`, `deuxieme`) VALUES
('titi', NULL, 3),
('toto', 6, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `cartespos`
--

CREATE TABLE `cartespos` (
  `pseudo` varchar(50) NOT NULL,
  `premiere` int(11) DEFAULT NULL,
  `deuxieme` int(11) DEFAULT NULL,
  `troisieme` int(11) DEFAULT NULL,
  `quatrieme` int(11) DEFAULT NULL,
  `cinquieme` int(11) DEFAULT NULL,
  `sixieme` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `cartespos`
--

INSERT INTO `cartespos` (`pseudo`, `premiere`, `deuxieme`, `troisieme`, `quatrieme`, `cinquieme`, `sixieme`) VALUES
('titi', 3, 4, 5, 2, NULL, NULL),
('toto', 1, 2, 8, 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `lobby`
--

CREATE TABLE `lobby` (
  `id` int(11) NOT NULL,
  `player1` varchar(50) DEFAULT NULL,
  `player2` varchar(50) DEFAULT NULL,
  `player3` varchar(50) DEFAULT NULL,
  `player4` varchar(50) DEFAULT NULL,
  `aquiletour` int(11) NOT NULL DEFAULT '1',
  `finie` tinyint(4) NOT NULL DEFAULT '0',
  `apioche` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `lobby`
--

INSERT INTO `lobby` (`id`, `player1`, `player2`, `player3`, `player4`, `aquiletour`, `finie`, `apioche`) VALUES
(20, 'titi', 'toto', NULL, NULL, 1, 1, 0),
(30, 'tata', 'tete', 'tyty', NULL, 1, 0, 0),
(40, 'Premier', 'Deuxieme', 'Troisieme', 'Quatrieme', 1, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `players`
--

CREATE TABLE `players` (
  `pseudo` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `online` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `players`
--

INSERT INTO `players` (`pseudo`, `password`, `online`) VALUES
('Deuxieme', 'mdp2', 0),
('Premier', 'mdp1', 0),
('Quatrieme', 'onche', 0),
('tata', 'tata', 0),
('tete', 'tete', 0),
('titi', 'titi', 0),
('toto', 'toto', 0),
('Troisieme', 'onche', 0),
('tutu', 'tutu', 0),
('tyty', 'tyty', 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `cards_stack`
--
ALTER TABLE `cards_stack`
  ADD PRIMARY KEY (`id_lobby`,`id_carte`),
  ADD KEY `id_carte` (`id_carte`);

--
-- Index pour la table `cartesmain`
--
ALTER TABLE `cartesmain`
  ADD PRIMARY KEY (`pseudo`);

--
-- Index pour la table `cartespos`
--
ALTER TABLE `cartespos`
  ADD PRIMARY KEY (`pseudo`);

--
-- Index pour la table `lobby`
--
ALTER TABLE `lobby`
  ADD PRIMARY KEY (`id`),
  ADD KEY `player1` (`player1`),
  ADD KEY `player2` (`player2`),
  ADD KEY `player3` (`player3`),
  ADD KEY `player4` (`player4`);

--
-- Index pour la table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`pseudo`);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `cartesmain`
--
ALTER TABLE `cartesmain`
  ADD CONSTRAINT `cartesmain_ibfk_1` FOREIGN KEY (`pseudo`) REFERENCES `players` (`pseudo`);

--
-- Contraintes pour la table `cartespos`
--
ALTER TABLE `cartespos`
  ADD CONSTRAINT `cartespos_ibfk_1` FOREIGN KEY (`pseudo`) REFERENCES `players` (`pseudo`);

--
-- Contraintes pour la table `lobby`
--
ALTER TABLE `lobby`
  ADD CONSTRAINT `lobby_ibfk_1` FOREIGN KEY (`player1`) REFERENCES `players` (`pseudo`),
  ADD CONSTRAINT `lobby_ibfk_2` FOREIGN KEY (`player2`) REFERENCES `players` (`pseudo`),
  ADD CONSTRAINT `lobby_ibfk_3` FOREIGN KEY (`player3`) REFERENCES `players` (`pseudo`),
  ADD CONSTRAINT `lobby_ibfk_4` FOREIGN KEY (`player4`) REFERENCES `players` (`pseudo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

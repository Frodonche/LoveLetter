-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 17 Novembre 2016 à 18:37
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
-- Structure de la table `lobby`
--

CREATE TABLE `lobby` (
  `id` int(11) NOT NULL,
  `player1` varchar(50) NOT NULL,
  `player2` varchar(50) NOT NULL,
  `player3` varchar(50) DEFAULT NULL,
  `player4` varchar(50) DEFAULT NULL,
  `ended` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

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
-- Contraintes pour les tables exportées
--

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

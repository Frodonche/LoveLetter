-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 17 Novembre 2016 à 16:37
-- Version du serveur :  10.1.16-MariaDB
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
-- Structure de la table `cartesmain`
--

CREATE TABLE `cartesmain` (
  `pseudo` varchar(50) NOT NULL,
  `premiere` int(11) DEFAULT NULL,
  `deuxième` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `cartesmain`
--
ALTER TABLE `cartesmain`
  ADD PRIMARY KEY (`pseudo`);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `cartesmain`
--
ALTER TABLE `cartesmain`
  ADD CONSTRAINT `cartesmain_ibfk_1` FOREIGN KEY (`pseudo`) REFERENCES `players` (`pseudo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

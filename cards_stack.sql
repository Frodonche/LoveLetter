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
-- Structure de la table `cards_stack`
--

CREATE TABLE `cards_stack` (
  `id_lobby` int(11) NOT NULL,
  `id_carte` int(11) NOT NULL,
  `quantité` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `cards_stack`
--
ALTER TABLE `cards_stack`
  ADD CONSTRAINT `cards_stack_ibfk_1` FOREIGN KEY (`id_carte`) REFERENCES `cards` (`id`),
  ADD CONSTRAINT `cards_stack_ibfk_2` FOREIGN KEY (`id_lobby`) REFERENCES `lobby` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

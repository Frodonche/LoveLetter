-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 17 Novembre 2016 à 15:49
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
('Deuxieme', 'sdqqdzzqd', 0),
('Premier', 'qddqzqd', 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`pseudo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 04 Décembre 2017 à 14:40
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `raspberry`
--

-- --------------------------------------------------------

--
-- Structure de la table `album`
--

CREATE TABLE `album` (
  `idAlbum` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `album`
--

INSERT INTO `album` (`idAlbum`, `title`, `autor`, `picture`) VALUES
(1, 'Jingle Punks', 'Jingle Punks', 'Jingle Punks.png'),
(2, 'Otis McDonald', 'Otis McDonald', 'Otis McDonald.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `idCategory` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`idCategory`, `title`) VALUES
(1, 'Funk');

-- --------------------------------------------------------

--
-- Structure de la table `song`
--

CREATE TABLE `song` (
  `title` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `duration` varchar(8) NOT NULL,
  `idAlbum` int(11) DEFAULT NULL,
  `idCategory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `song`
--

INSERT INTO `song` (`title`, `autor`, `duration`, `idAlbum`, `idCategory`) VALUES
('Bayou_State_of_Mind_Sting.mp3', 'Jingle Punks', '00:06', 1, 1),
('Dusty_Road.mp3', 'Jingle Punks', '01:21', 1, 1),
('Ever_Felt_pt_1.mp3', 'Otis McDonald', '02:23', 2, 1),
('Green_Leaf_Stomp.mp3', 'Jingle Punks', '01:15', 1, 1),
('Put_It_On_The_Floor.mp3', 'Otis McDonald', '01:55', 2, 1),
('Safari_Time.mp3', 'Jingle Punks', '01:14', 1, 1),
('Scarlet_Fire.mp3', 'Otis McDonald', '02:22', 2, 1),
('Suddenly.mp3', 'Otis McDonald', '02:11', 2, 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`idAlbum`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idCategory`);

--
-- Index pour la table `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`title`),
  ADD KEY `idAlbum` (`idAlbum`),
  ADD KEY `idAlbum_2` (`idAlbum`),
  ADD KEY `idCategory` (`idCategory`);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `song`
--
ALTER TABLE `song`
  ADD CONSTRAINT `fk_song_idAlbum` FOREIGN KEY (`idAlbum`) REFERENCES `album` (`idAlbum`),
  ADD CONSTRAINT `fk_song_idCategory` FOREIGN KEY (`idCategory`) REFERENCES `category` (`idCategory`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

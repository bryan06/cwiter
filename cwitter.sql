-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 24 Janvier 2016 à 21:32
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `cwitter`
--

-- --------------------------------------------------------

--
-- Structure de la table `followers`
--

CREATE TABLE IF NOT EXISTS `followers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `image` text CHARACTER SET utf8 NOT NULL,
  `mail` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `followers`
--

INSERT INTO `followers` (`id`, `nom`, `prenom`, `image`, `mail`) VALUES
(1, 'bryan', 'choisi', '', 'bryan.choisi@gmail.com'),
(2, 'Harden', 'James', '2.jpg', 'harden@mail.com'),
(3, 'malagre', 'enora', '3.jpg', 'enora@mail.com'),
(4, 'Paillotte', 'johan', '', 'jo@han.fr'),
(5, 'DOE', 'John', '', 'jj@d.fr');

-- --------------------------------------------------------

--
-- Structure de la table `mesphotos`
--

CREATE TABLE IF NOT EXISTS `mesphotos` (
  `p_id` int(25) NOT NULL AUTO_INCREMENT,
  `p_img` varchar(255) NOT NULL,
  `p_title` varchar(255) NOT NULL,
  PRIMARY KEY (`p_id`),
  KEY `p_img` (`p_img`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `auteur` int(10) unsigned NOT NULL,
  `publication` text NOT NULL,
  `date_creation` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `auteur` (`auteur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Contenu de la table `news`
--

INSERT INTO `news` (`id`, `titre`, `auteur`, `publication`, `date_creation`) VALUES
(25, 'Salut', 6, 'Bonjour', '2016-01-24 14:58:22'),
(26, 'ALLLO', 6, 'perssonne', '2016-01-24 14:59:01'),
(27, 'Salut', 1, 'lA CAMP', '2016-01-24 14:59:39'),
(28, 'ZER', 1, 'marche', '2016-01-24 15:00:18'),
(29, 'bien', 1, 'trtee', '2016-01-24 15:04:04');

-- --------------------------------------------------------

--
-- Structure de la table `suivi`
--

CREATE TABLE IF NOT EXISTS `suivi` (
  `idutil` int(11) NOT NULL,
  `idfollow` int(11) NOT NULL,
  PRIMARY KEY (`idutil`,`idfollow`),
  KEY `suivi_ibfk_1` (`idfollow`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `suivi`
--

INSERT INTO `suivi` (`idutil`, `idfollow`) VALUES
(2, 1),
(3, 1),
(6, 1),
(1, 2),
(6, 4);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `mail` varchar(255) CHARACTER SET ascii NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `naissance` date NOT NULL,
  `sexe` enum('M','F') NOT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `profession` varchar(100) DEFAULT NULL,
  `image` text NOT NULL,
  `idfollower` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `mail`, `mdp`, `naissance`, `sexe`, `ville`, `profession`, `image`, `idfollower`) VALUES
(1, 'bryan', 'choisi', 'bryan.choisi@gmail.com', 'e0c9035898dd52fc65c41454cec9c4d2611bfb37', '2016-01-06', 'M', 'Montpellier', 'etudiant', 'default.jpg', 0),
(2, 'Harden', 'James', 'harden@mail.com', '8f123cfd664e96b0eb7358e1f4394828a60f50a5', '2016-01-07', 'M', 'Montpellier', 'etudiant', '2.jpg', 0),
(3, 'malagre', 'enora', 'enora@mail.com', 'e0c9035898dd52fc65c41454cec9c4d2611bfb37', '2016-01-11', 'M', 'lyon', 'actrice', '3.jpg', 0),
(4, 'Paillotte', 'johan', 'jo@han.fr', 'e0c9035898dd52fc65c41454cec9c4d2611bfb37', '2016-01-12', 'M', NULL, NULL, 'default.jpg', 0),
(5, 'DOE', 'John', 'jj@d.fr', 'd7dacae2c968388960bf8970080a980ed5c5dcb7', '2016-01-05', 'M', NULL, NULL, 'default.jpg', 0),
(6, 'CILENCIEUX', 'James', 'james.cilencieux@gmail.com', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', '1995-04-19', 'M', 'NICE', 'Etudiant', '6.jpg', 0);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`auteur`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `suivi`
--
ALTER TABLE `suivi`
  ADD CONSTRAINT `suivi_ibfk_1` FOREIGN KEY (`idfollow`) REFERENCES `followers` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 26 Avril 2021 à 10:44
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `annonces`
--

-- --------------------------------------------------------

--
-- Structure de la table `auto`
--

CREATE TABLE IF NOT EXISTS `auto` (
  `id_auto` int(11) NOT NULL AUTO_INCREMENT,
  `marque` varchar(20) NOT NULL,
  `modele` varchar(20) NOT NULL,
  `energie` varchar(3) NOT NULL,
  `boite` varchar(15) NOT NULL,
  `couleur` varchar(20) NOT NULL,
  `km` int(11) NOT NULL,
  `annee` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `texte` text NOT NULL,
  `telephone` int(11) NOT NULL,
  `images` blob NOT NULL,
  `datefin` varchar(10) NOT NULL,
  PRIMARY KEY (`id_auto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `auto`
--

INSERT INTO `auto` (`id_auto`, `marque`, `modele`, `energie`, `boite`, `couleur`, `km`, `annee`, `prix`, `texte`, `telephone`, `images`, `datefin`) VALUES
(3, 'Renault', 'Mégane', 'ess', 'manuelle', 'Gris', 50000, 2015, 12354, 'Renault a vendre', 642053529, 0x70686f746f2d6175746f2f3539332e706e67, '2021-12-25'),
(4, 'Renault', 'clio', 'gpl', 'manuelle', 'Bleu', 50000, 2017, 12354, 'Renault a vendre', 642053529, 0x70686f746f2d6175746f2f3535332e706e67, '2021-12-25');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

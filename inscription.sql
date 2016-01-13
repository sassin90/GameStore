-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Sam 26 Mai 2012 à 14:50
-- Version du serveur: 5.5.20
-- Version de PHP: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `jeux`
--

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE IF NOT EXISTS `inscription` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Pseudo` varchar(10) NOT NULL,
  `Mot_de_passe` varchar(255) NOT NULL,
  `Nom` varchar(30) NOT NULL,
  `Prenom` varchar(30) NOT NULL,
  `Date_de_naissance` date NOT NULL,
  `Adresse_Email` varchar(30) NOT NULL,
  `Adresse` varchar(255) NOT NULL,
  `Code_postal` int(5) NOT NULL,
  `Ville` varchar(30) NOT NULL,
  `Pays` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `inscription`
--

INSERT INTO `inscription` (`id`, `Pseudo`, `Mot_de_passe`, `Nom`, `Prenom`, `Date_de_naissance`, `Adresse_Email`, `Adresse`, `Code_postal`, `Ville`, `Pays`) VALUES
(1, 'amine', 'f54007599cd1054f8765a06354c53f10', 'amine', 'boukari', '1991-02-02', 'amine@hotmail.com', 'bab l3o9la', 93000, 'tetouan', 'Maroc'),
(2, 'karim', 'f54007599cd1054f8765a06354c53f10', 'amino', 'aminem', '2012-05-23', 'amine@gmail.com', 'bob o', 9300, 'tetoun', 'maroc'),
(3, 'aminem', 'f54007599cd1054f8765a06354c53f10', 'amine', 'boukari', '1991-02-02', 'amine@hotmail.com', 'amien zefze', 93000, 'tetouan', 'Maroc'),
(4, 'BozdBal', 'f54007599cd1054f8765a06354c53f10', 'amine', 'boukari', '1991-02-02', 'amine@hotmail.com', 'bab l3o9la', 93000, 'tetouan', 'Maroc'),
(5, 'ZORG', 'ed932b9e2c1707070823a0f56102ccf0', 'hichan', 'boukari', '1991-02-02', 'amine@hotmail.com', 'bob o', 5695, 'tetouan', 'Maroc'),
(6, 'Hchaymen', 'f54007599cd1054f8765a06354c53f10', 'ZORG', 'boukari', '1991-02-02', 'amine1@hotmail.com', 'bob', 93000, 'tetouan', 'Maroc'),
(7, 'amin', 'bf93e5f003e40c3fba44e512aecd3cdc', 'amine', 'boukari', '1991-02-02', 'amine2@hotmail.com', 'bab l3ol9a', 93900, 'tetouan', 'france');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 03 Septembre 2019 à 17:32
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `projet4`
--

-- --------------------------------------------------------

--
-- Structure de la table `billet`
--

CREATE TABLE IF NOT EXISTS `billet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `nom_redacteur` int(11) NOT NULL,
  `texte` varchar(10000) NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nom_redacteur` (`nom_redacteur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `billet`
--

INSERT INTO `billet` (`id`, `nom`, `nom_redacteur`, `texte`, `date_time`) VALUES
(17, 'Chapitre 1 ', 1, '<p><span style="font-family: ''Open Sans'', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque cursus arcu ipsum, et ultrices augue congue a. Aenean ut bibendum mi, a egestas elit. Aliquam elit eros, consequat non luctus eu, interdum vitae magna. Vestibulum a tristique tortor. Curabitur odio tellus, convallis non nisi ac, facilisis pharetra libero. Praesent id urna sed lacus accumsan scelerisque. Sed eget placerat elit, in mattis quam. Nulla eu justo ac diam condimentum sollicitudin.</span></p>', '2019-08-19 00:16:44'),
(18, 'Chapitre 2', 2, '<p><span style="font-family: ''Open Sans'', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque cursus arcu ipsum, et ultrices augue congue a. Aenean ut bibendum mi, a egestas elit. Aliquam elit eros, consequat non luctus eu, interdum vitae magna. Vestibulum a tristique tortor. Curabitur odio tellus, convallis non nisi ac, facilisis pharetra libero. Praesent id urna sed lacus accumsan scelerisque. Sed eget placerat elit, in mattis quam. Nulla eu justo ac diam condimentum sollicitudin.</span></p>', '2019-08-28 15:34:07'),
(19, 'Chapitre 3', 2, '<p><span style="font-family: ''Open Sans'', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque cursus arcu ipsum, et ultrices augue congue a. Aenean ut bibendum mi, a egestas elit. Aliquam elit eros, consequat non luctus eu, interdum vitae magna. Vestibulum a tristique tortor. Curabitur odio tellus, convallis non nisi ac, facilisis pharetra libero. Praesent id urna sed lacus accumsan scelerisque. Sed eget placerat elit, in mattis quam. Nulla eu justo ac diam condimentum sollicitudin.</span></p>', '2019-08-28 15:35:31'),
(20, 'Chapitre 4', 2, '<p><span style="font-family: ''Open Sans'', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque cursus arcu ipsum, et ultrices augue congue a. Aenean ut bibendum mi, a egestas elit. Aliquam elit eros, consequat non luctus eu, interdum vitae magna. Vestibulum a tristique tortor. Curabitur odio tellus, convallis non nisi ac, facilisis pharetra libero. Praesent id urna sed lacus accumsan scelerisque. Sed eget placerat elit, in mattis quam. Nulla eu justo ac diam condimentum sollicitudin.</span></p>', '2019-08-28 15:35:44');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(20) NOT NULL,
  `texte` varchar(1000) NOT NULL,
  `id_billet` int(20) NOT NULL,
  `signale` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_billet` (`id_billet`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `pseudo`, `texte`, `id_billet`, `signale`) VALUES
(12, 'infom', '<p><span style="font-family: ''Open Sans'', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque cursus arcu ipsum, et ultrices augue congue a. Aenean ut bibendum mi, a egestas elit. Aliquam elit eros, consequat non luctus eu, interdum vitae magna. Vestibulum a tristique tortor. Curabitur odio tellus, convallis non nisi ac, facilisis pharetra libero. Praesent id urna sed lacus accumsan scelerisque. Sed eget placerat elit, in mattis quam. Nulla eu justo ac diam condimentum sollicitudin.</span></p>', 17, ''),
(13, 'infom2', '<p><span style="font-family: ''Open Sans'', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque cursus arcu ipsum, et ultrices augue congue a. Aenean ut bibendum mi, a egestas elit. Aliquam elit eros, consequat non luctus eu, interdum vitae magna. Vestibulum a tristique tortor. Curabitur odio tellus, convallis non nisi ac, facilisis pharetra libero. Praesent id urna sed lacus accumsan scelerisque. Sed eget placerat elit, in mattis quam. Nulla eu justo ac diam condimentum sollicitudin.</span></p>', 18, ''),
(14, 'infom 3', '<p><span style="font-family: ''Open Sans'', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque cursus arcu ipsum, et ultrices augue congue a. Aenean ut bibendum mi, a egestas elit. Aliquam elit eros, consequat non luctus eu, interdum vitae magna. Vestibulum a tristique tortor. Curabitur odio tellus, convallis non nisi ac, facilisis pharetra libero. Praesent id urna sed lacus accumsan scelerisque. Sed eget placerat elit, in mattis quam. Nulla eu justo ac diam condimentum sollicitudin.</span></p>', 19, ''),
(15, 'infom 4', '<p><span style="font-family: ''Open Sans'', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque cursus arcu ipsum, et ultrices augue congue a. Aenean ut bibendum mi, a egestas elit. Aliquam elit eros, consequat non luctus eu, interdum vitae magna. Vestibulum a tristique tortor. Curabitur odio tellus, convallis non nisi ac, facilisis pharetra libero. Praesent id urna sed lacus accumsan scelerisque. Sed eget placerat elit, in mattis quam. Nulla eu justo ac diam condimentum sollicitudin.</span></p>', 20, '');

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE IF NOT EXISTS `compte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `salt` varchar(100) NOT NULL,
  `adresse_ip` varchar(30) NOT NULL,
  `statut` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `compte`
--

INSERT INTO `compte` (`id`, `pseudo`, `email`, `password`, `salt`, `adresse_ip`, `statut`) VALUES
(1, 'admin', 'matthieu.clio@gmail.com', '$2a$07$dxzamksb7p6h1r90vf5g$uOlgDpz3jJ.kzVubXskctrm5yMP4JmLi', '$2a$07$dxzamksb7p6h1r90vf5g$', '::1', 'admin'),
(2, 'test', 'matthieu.clio@laposte.net', '$2a$07$kv96b3rghuyzjx205ft1$ueK.7mFftKbqz6H/dJOmseORyhgxpiJG', '$2a$07$kv96b3rghuyzjx205ft1$', '::1', 'admin');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `billet`
--
ALTER TABLE `billet`
  ADD CONSTRAINT `billet_ibfk_1` FOREIGN KEY (`nom_redacteur`) REFERENCES `compte` (`id`);

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`id_billet`) REFERENCES `billet` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

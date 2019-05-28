-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 28 mai 2019 à 16:11
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gsb`
--

-- --------------------------------------------------------

--
-- Structure de la table `detail_frais_forfait`
--

DROP TABLE IF EXISTS `detail_frais_forfait`;
CREATE TABLE IF NOT EXISTS `detail_frais_forfait` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `frais_forfait_id` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `fiche_frais_id` int(11) NOT NULL,
  `etat_id` int(11) NOT NULL,
  `utilisateur_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `utilisateur_id` (`id`),
  KEY `fk_detail_frais_forfait_fiche_frais` (`fiche_frais_id`),
  KEY `fk_detail_frais_forfait_frais_forfait` (`frais_forfait_id`),
  KEY `fk_dff_e` (`etat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `detail_frais_forfait`
--

INSERT INTO `detail_frais_forfait` (`id`, `frais_forfait_id`, `quantite`, `fiche_frais_id`, `etat_id`, `utilisateur_id`) VALUES
(1, 1, 5, 3, 3, 3),
(2, 2, 5, 3, 3, 3),
(3, 3, 7, 3, 3, 3),
(4, 4, 1, 3, 3, 3),
(5, 1, 1, 4, 3, 4),
(6, 2, 3, 4, 3, 4),
(7, 3, 1, 4, 3, 4),
(8, 4, 2, 4, 3, 4),
(9, 1, 0, 5, 3, 3),
(10, 2, 0, 5, 3, 3),
(11, 3, 0, 5, 3, 3),
(12, 4, 0, 5, 3, 3),
(13, 1, 0, 6, 3, 4),
(14, 2, 0, 6, 3, 4),
(15, 3, 0, 6, 3, 4),
(16, 4, 0, 6, 3, 4);

-- --------------------------------------------------------

--
-- Structure de la table `detail_frais_non_forfait`
--

DROP TABLE IF EXISTS `detail_frais_non_forfait`;
CREATE TABLE IF NOT EXISTS `detail_frais_non_forfait` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `utilisateur_id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `montant` decimal(10,0) NOT NULL,
  `fiche_frais_id` int(11) NOT NULL,
  `etat_id` int(11) NOT NULL,
  `date_frais` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_detail_frais_non_forfait_fiche_frais` (`fiche_frais_id`),
  KEY `fk_dfnf_e` (`etat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `detail_frais_non_forfait`
--

INSERT INTO `detail_frais_non_forfait` (`id`, `utilisateur_id`, `libelle`, `montant`, `fiche_frais_id`, `etat_id`, `date_frais`) VALUES
(5, 3, 'resto', '50', 3, 1, '2019-04-03'),
(6, 3, 'scooter', '35', 3, 3, '2019-04-05'),
(7, 4, 'avion', '250', 4, 3, '2019-04-06');

-- --------------------------------------------------------

--
-- Structure de la table `etat`
--

DROP TABLE IF EXISTS `etat`;
CREATE TABLE IF NOT EXISTS `etat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etat`
--

INSERT INTO `etat` (`id`, `libelle`) VALUES
(1, 'Validée'),
(2, 'Refusée'),
(3, 'En cours');

-- --------------------------------------------------------

--
-- Structure de la table `fiche_frais`
--

DROP TABLE IF EXISTS `fiche_frais`;
CREATE TABLE IF NOT EXISTS `fiche_frais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mois` int(2) NOT NULL,
  `annee` int(4) NOT NULL,
  `etat_id` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  `date_modif` date DEFAULT NULL,
  `nb_justificatifs` int(11) NOT NULL,
  `montant_valid` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_fiche_frais_utilisateur` (`utilisateur_id`),
  KEY `fk_fiche_frais_etat` (`etat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `fiche_frais`
--

INSERT INTO `fiche_frais` (`id`, `mois`, `annee`, `etat_id`, `utilisateur_id`, `date_modif`, `nb_justificatifs`, `montant_valid`) VALUES
(1, 2, 2019, 1, 4, '2019-03-14', 1, '250.00'),
(2, 3, 2019, 1, 3, '2019-04-27', 1, '120.00'),
(3, 4, 2019, 1, 3, '2019-04-30', 1, '1000.00'),
(4, 4, 2019, 3, 4, '2019-04-27', 1, '0.00'),
(5, 5, 2019, 3, 3, '2019-05-26', 1, '0.00'),
(6, 5, 2019, 3, 4, '2019-05-26', 1, '0.00');

-- --------------------------------------------------------

--
-- Structure de la table `frais_forfait`
--

DROP TABLE IF EXISTS `frais_forfait`;
CREATE TABLE IF NOT EXISTS `frais_forfait` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  `montant` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `frais_forfait`
--

INSERT INTO `frais_forfait` (`id`, `libelle`, `montant`) VALUES
(1, 'Restaurant', '50.00'),
(2, 'Frais kilometrique', '0.10'),
(3, 'Forfait Etape', '110.00'),
(4, 'Nuitee Hotel', '100.00');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `libelle`) VALUES
(1, 'visiteur'),
(2, 'comptable'),
(3, 'Administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `code_postal` varchar(5) NOT NULL,
  `date_embauche` date NOT NULL,
  `nom_utilisateur` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_role` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `adresse`, `ville`, `code_postal`, `date_embauche`, `nom_utilisateur`, `mot_de_passe`, `role_id`) VALUES
(1, 'admin', 'Mark', '3 rue de la liberté', 'Charly', '69390', '2019-04-01', 'admin', 'admin', 3),
(2, 'Gates', 'Bill', '5 rue de la liberté', 'Charly', '69390', '2019-04-01', 'billG', '1234', 2),
(3, 'Russo', 'Jack', '6 rue de la liberté', 'Charly', '69000', '2018-12-11', 'jackR', '1234', 1),
(4, 'Bedos', 'Ben', '7 rue de la lieberté', 'Charly', '69390', '2019-02-13', 'benB', '1234', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `detail_frais_forfait`
--
ALTER TABLE `detail_frais_forfait`
  ADD CONSTRAINT `fk_detail_frais_forfait_fiche_frais` FOREIGN KEY (`fiche_frais_id`) REFERENCES `fiche_frais` (`id`),
  ADD CONSTRAINT `fk_detail_frais_forfait_frais_forfait` FOREIGN KEY (`frais_forfait_id`) REFERENCES `frais_forfait` (`id`),
  ADD CONSTRAINT `fk_dff_e` FOREIGN KEY (`etat_id`) REFERENCES `etat` (`id`);

--
-- Contraintes pour la table `detail_frais_non_forfait`
--
ALTER TABLE `detail_frais_non_forfait`
  ADD CONSTRAINT `fk_detail_frais_non_forfait_fiche_frais` FOREIGN KEY (`fiche_frais_id`) REFERENCES `fiche_frais` (`id`),
  ADD CONSTRAINT `fk_dfnf_e` FOREIGN KEY (`etat_id`) REFERENCES `etat` (`id`);

--
-- Contraintes pour la table `fiche_frais`
--
ALTER TABLE `fiche_frais`
  ADD CONSTRAINT `fk_fiche_frais_etat` FOREIGN KEY (`etat_id`) REFERENCES `etat` (`id`),
  ADD CONSTRAINT `fk_fiche_frais_utilisateur` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `fk_user_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 24 juin 2021 à 03:06
-- Version du serveur :  8.0.21
-- Version de PHP : 7.4.9

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sosjobadm`
--
CREATE DATABASE IF NOT EXISTS `sosjobadm` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `sosjobadm`;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `ID_CLIENT` int NOT NULL AUTO_INCREMENT,
  `NOM_ENTREPRISE` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ID_USERS` int DEFAULT NULL,
  `siret` varchar(255) NOT NULL,
  `adresse_facturation` varchar(255) NOT NULL,
  `comment_client` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_CLIENT`),
  UNIQUE KEY `UNIQ_C74404553B997DA3` (`ID_USERS`),
  KEY `fk_CLIENT_USERS` (`ID_USERS`)
) ENGINE=InnoDB AUTO_INCREMENT=192 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`ID_CLIENT`, `NOM_ENTREPRISE`, `ID_USERS`, `siret`, `adresse_facturation`, `comment_client`) VALUES
(185, 'BOUDIAF', 431, '14012141254121', '32 RUE MINIMES', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210127195412', '2021-01-27 19:56:06', 1534),
('DoctrineMigrations\\Version20210204141742', '2021-02-04 14:18:01', 1942),
('DoctrineMigrations\\Version20210205114840', '2021-02-05 11:49:59', 546),
('DoctrineMigrations\\Version20210215174144', '2021-02-15 17:53:31', 415),
('DoctrineMigrations\\Version20210215182024', '2021-02-15 18:21:08', 403),
('DoctrineMigrations\\Version20210215184355', '2021-02-15 18:44:18', 448),
('DoctrineMigrations\\Version20210221181356', '2021-02-21 18:16:43', 340),
('DoctrineMigrations\\Version20210222193200', '2021-02-22 19:32:20', 1402),
('DoctrineMigrations\\Version20210222224951', '2021-02-22 22:50:21', 195),
('DoctrineMigrations\\Version20210225103627', '2021-02-25 10:36:52', 1680),
('DoctrineMigrations\\Version20210225114913', '2021-02-25 11:49:28', 59),
('DoctrineMigrations\\Version20210226144539', '2021-02-26 14:46:07', 515),
('DoctrineMigrations\\Version20210301095253', '2021-03-01 09:53:13', 604),
('DoctrineMigrations\\Version20210301095436', '2021-03-01 09:54:43', 79),
('DoctrineMigrations\\Version20210301095750', '2021-03-01 09:57:57', 84),
('DoctrineMigrations\\Version20210301095909', '2021-03-01 09:59:14', 87),
('DoctrineMigrations\\Version20210305111528', '2021-03-05 11:15:38', 547),
('DoctrineMigrations\\Version20210311184932', '2021-03-11 18:50:14', 1010),
('DoctrineMigrations\\Version20210311194306', '2021-03-11 19:43:27', 168),
('DoctrineMigrations\\Version20210311203417', '2021-03-11 20:34:25', 111),
('DoctrineMigrations\\Version20210312102052', '2021-03-12 10:21:00', 558),
('DoctrineMigrations\\Version20210312121914', '2021-03-12 12:19:20', 61),
('DoctrineMigrations\\Version20210316165948', '2021-03-16 17:00:11', 551),
('DoctrineMigrations\\Version20210318183726', '2021-03-18 18:37:36', 466),
('DoctrineMigrations\\Version20210427114133', '2021-04-27 12:58:58', 635),
('DoctrineMigrations\\Version20210427130325', '2021-04-27 13:03:33', 78),
('DoctrineMigrations\\Version20210427130352', '2021-04-27 13:03:57', 49),
('DoctrineMigrations\\Version20210505100322', '2021-05-05 10:03:30', 210),
('DoctrineMigrations\\Version20210505102000', '2021-05-05 10:20:06', 335),
('DoctrineMigrations\\Version20210508180444', '2021-05-08 18:05:18', 3198),
('DoctrineMigrations\\Version20210508181022', '2021-05-08 18:10:33', 1500),
('DoctrineMigrations\\Version20210511182119', '2021-05-11 18:22:13', 7054),
('DoctrineMigrations\\Version20210511184930', '2021-05-11 18:50:10', 2258),
('DoctrineMigrations\\Version20210511191159', '2021-05-11 19:12:25', 2748),
('DoctrineMigrations\\Version20210511213645', '2021-05-11 21:37:44', 2475),
('DoctrineMigrations\\Version20210511214320', '2021-05-11 21:43:42', 2964),
('DoctrineMigrations\\Version20210512170850', '2021-05-12 17:10:13', 7720),
('DoctrineMigrations\\Version20210512173406', '2021-05-12 17:34:37', 1032),
('DoctrineMigrations\\Version20210517021943', '2021-05-17 02:20:10', 17849),
('DoctrineMigrations\\Version20210517023854', '2021-05-17 02:39:58', 951),
('DoctrineMigrations\\Version20210517024144', '2021-05-17 02:51:46', 4110),
('DoctrineMigrations\\Version20210517133450', '2021-05-17 13:35:10', 5176),
('DoctrineMigrations\\Version20210517142722', '2021-05-17 14:27:36', 4738),
('DoctrineMigrations\\Version20210519111445', '2021-05-19 11:15:07', 8754),
('DoctrineMigrations\\Version20210519113047', '2021-05-19 11:32:02', 5966),
('DoctrineMigrations\\Version20210519131520', '2021-05-19 13:16:05', 2662),
('DoctrineMigrations\\Version20210521235916', '2021-05-21 23:59:40', 3453),
('DoctrineMigrations\\Version20210522000104', '2021-05-22 00:01:33', 325),
('DoctrineMigrations\\Version20210522000825', '2021-05-22 00:08:44', 679),
('DoctrineMigrations\\Version20210522001720', '2021-05-22 00:17:41', 3703),
('DoctrineMigrations\\Version20210522002921', '2021-05-22 00:30:28', 2189),
('DoctrineMigrations\\Version20210522195837', '2021-05-23 00:46:56', 3317),
('DoctrineMigrations\\Version20210527235801', '2021-05-27 23:58:16', 6687),
('DoctrineMigrations\\Version20210528140935', '2021-05-28 14:11:06', 6632),
('DoctrineMigrations\\Version20210602140632', '2021-06-02 14:06:56', 21417),
('DoctrineMigrations\\Version20210602160231', '2021-06-02 16:03:02', 10087),
('DoctrineMigrations\\Version20210602165151', '2021-06-02 16:52:02', 2012),
('DoctrineMigrations\\Version20210605203933', '2021-06-05 21:27:50', 5077),
('DoctrineMigrations\\Version20210605212650', '2021-06-05 21:27:56', 422),
('DoctrineMigrations\\Version20210605213038', '2021-06-05 21:30:53', 418),
('DoctrineMigrations\\Version20210605214028', '2021-06-05 21:40:44', 492),
('DoctrineMigrations\\Version20210605214646', '2021-06-05 21:47:03', 581),
('DoctrineMigrations\\Version20210606004838', '2021-06-06 00:48:53', 579),
('DoctrineMigrations\\Version20210606023023', '2021-06-06 02:30:36', 445),
('DoctrineMigrations\\Version20210608124414', '2021-06-08 12:45:28', 5283),
('DoctrineMigrations\\Version20210609110745', '2021-06-09 11:08:16', 2182),
('DoctrineMigrations\\Version20210611084320', '2021-06-11 08:44:31', 5861),
('DoctrineMigrations\\Version20210611164558', '2021-06-11 16:46:34', 4587),
('DoctrineMigrations\\Version20210611173332', '2021-06-11 17:33:44', 1805),
('DoctrineMigrations\\Version20210611174722', '2021-06-11 17:49:00', 3156),
('DoctrineMigrations\\Version20210613212218', '2021-06-13 21:23:04', 3985),
('DoctrineMigrations\\Version20210614232518', '2021-06-14 23:26:03', 7803),
('DoctrineMigrations\\Version20210615165143', '2021-06-15 16:52:13', 6520),
('DoctrineMigrations\\Version20210615170223', '2021-06-15 17:02:36', 2529),
('DoctrineMigrations\\Version20210616205325', '2021-06-16 20:53:42', 6970),
('DoctrineMigrations\\Version20210617164758', '2021-06-17 16:48:55', 2599),
('DoctrineMigrations\\Version20210617165123', '2021-06-17 17:01:48', 3998),
('DoctrineMigrations\\Version20210617174239', '2021-06-17 17:43:38', 3343),
('DoctrineMigrations\\Version20210621152447', '2021-06-22 01:07:14', 159),
('DoctrineMigrations\\Version20210622010657', '2021-06-22 01:07:14', 193),
('DoctrineMigrations\\Version20210622133713', '2021-06-22 13:37:24', 307),
('DoctrineMigrations\\Version20210622140224', '2021-06-22 14:02:35', 141),
('DoctrineMigrations\\Version20210624030407', '2021-06-24 03:04:33', 569);

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

DROP TABLE IF EXISTS `fournisseur`;
CREATE TABLE IF NOT EXISTS `fournisseur` (
  `ID_FOURNISSEUR` int NOT NULL AUTO_INCREMENT,
  `ADRESSE_F` varchar(255) DEFAULT NULL,
  `GENRE` varchar(255) DEFAULT NULL,
  `LIEU_DE_NAISSANCE` varchar(255) DEFAULT NULL,
  `NATIONALITE` varchar(255) DEFAULT NULL,
  `PHOTO` mediumtext,
  `STATUT` varchar(255) DEFAULT NULL,
  `ID_USERS` int DEFAULT NULL,
  `numero_rcs` varchar(255) DEFAULT NULL,
  `numero_securite_sociale` int DEFAULT NULL,
  `situation` varchar(255) DEFAULT NULL,
  `is_available` tinyint(1) DEFAULT NULL,
  `nom_pere` varchar(255) DEFAULT NULL,
  `prenom_pere` varchar(255) DEFAULT NULL,
  `nom_mere` varchar(255) DEFAULT NULL,
  `prenom_mere` varchar(255) DEFAULT NULL,
  `activite_salarie` varchar(255) DEFAULT NULL,
  `etablissement_ue` varchar(255) DEFAULT NULL,
  `ressortissant_hors_ue` varchar(255) DEFAULT NULL,
  `numero_titre_sejour` varchar(255) DEFAULT NULL,
  `departement_delivrance` varchar(255) DEFAULT NULL,
  `date_expiration_titre_sejour` date DEFAULT NULL,
  `ville_delivrance` varchar(255) DEFAULT NULL,
  `ci` varchar(255) DEFAULT NULL,
  `signature` varchar(255) DEFAULT NULL,
  `justificatif_domicile` varchar(255) DEFAULT NULL,
  `accre` varchar(255) DEFAULT NULL,
  `h_pole_emploi` varchar(255) DEFAULT NULL,
  `abm` varchar(255) DEFAULT NULL,
  `ndp` varchar(255) DEFAULT NULL,
  `anc` varchar(255) DEFAULT NULL,
  `jphd` varchar(255) DEFAULT NULL,
  `zus` varchar(255) DEFAULT NULL,
  `tu_es` varchar(255) DEFAULT NULL,
  `ID_Tableau_Dispo` int DEFAULT NULL,
  `info_statut_f` varchar(255) DEFAULT NULL,
  `permis` mediumtext,
  PRIMARY KEY (`ID_FOURNISSEUR`),
  UNIQUE KEY `UNIQ_369ECA323B997DA3` (`ID_USERS`),
  KEY `fk_FOURNISSEUR_USERS` (`ID_USERS`),
  KEY `IDX_369ECA3291E4D0D5` (`ID_Tableau_Dispo`)
) ENGINE=InnoDB AUTO_INCREMENT=186 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`ID_FOURNISSEUR`, `ADRESSE_F`, `GENRE`, `LIEU_DE_NAISSANCE`, `NATIONALITE`, `PHOTO`, `STATUT`, `ID_USERS`, `numero_rcs`, `numero_securite_sociale`, `situation`, `is_available`, `nom_pere`, `prenom_pere`, `nom_mere`, `prenom_mere`, `activite_salarie`, `etablissement_ue`, `ressortissant_hors_ue`, `numero_titre_sejour`, `departement_delivrance`, `date_expiration_titre_sejour`, `ville_delivrance`, `ci`, `signature`, `justificatif_domicile`, `accre`, `h_pole_emploi`, `abm`, `ndp`, `anc`, `jphd`, `zus`, `tu_es`, `ID_Tableau_Dispo`, `info_statut_f`, `permis`) VALUES
(154, NULL, NULL, NULL, NULL, NULL, 'à_déja_un_statut_entre', 408, '45676778900000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(155, NULL, NULL, NULL, NULL, NULL, 'à_déja_un_statut_entre', 416, '45676778900000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(156, NULL, NULL, NULL, NULL, NULL, 'à_déja_un_statut_entre', 417, '45676778900000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(185, '4 Square Aquitaine', 'Femme', NULL, 'AF', NULL, 'StatutèCréer_Par_SosJOB', 446, NULL, 34567890, '1', NULL, 'Diop', 'Makha', 'Diop', 'Makha', 'Autres', 'Non', 'Non', NULL, NULL, NULL, NULL, 'intro-droit-M1-IESA-60d1e8a8c979e.pdf', 'intro-droit-M1-IESA-60d1e8a8cb0a4.pdf', 'intro-droit-M1-IESA-60d1e8a8ca3c2.pdf', 'Non', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'intro-droit-M1-IESA-60d1e8a8d4e78.pdf');

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur_certifications`
--

DROP TABLE IF EXISTS `fournisseur_certifications`;
CREATE TABLE IF NOT EXISTS `fournisseur_certifications` (
  `ID_FOURNISSEUR` int NOT NULL,
  `ID_CERTIFICATIONS` int NOT NULL,
  PRIMARY KEY (`ID_FOURNISSEUR`,`ID_CERTIFICATIONS`),
  KEY `IDX_8637E50BD4DFF869` (`ID_CERTIFICATIONS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur_formations`
--

DROP TABLE IF EXISTS `fournisseur_formations`;
CREATE TABLE IF NOT EXISTS `fournisseur_formations` (
  `ID_FOURNISSEUR` int NOT NULL,
  `ID_FORMATIONS` int NOT NULL,
  PRIMARY KEY (`ID_FOURNISSEUR`,`ID_FORMATIONS`),
  KEY `IDX_7DB57EAC45CA2CD2` (`ID_FORMATIONS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur_langages`
--

DROP TABLE IF EXISTS `fournisseur_langages`;
CREATE TABLE IF NOT EXISTS `fournisseur_langages` (
  `ID_FOURNISSEUR` int NOT NULL,
  `ID_LANGAGES` int NOT NULL,
  PRIMARY KEY (`ID_FOURNISSEUR`,`ID_LANGAGES`),
  KEY `IDX_617A050696E6E6C2` (`ID_LANGAGES`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `fournisseur_langages`
--

INSERT INTO `fournisseur_langages` (`ID_FOURNISSEUR`, `ID_LANGAGES`) VALUES
(87, 3),
(88, 3),
(87, 4),
(88, 4);

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur_langues`
--

DROP TABLE IF EXISTS `fournisseur_langues`;
CREATE TABLE IF NOT EXISTS `fournisseur_langues` (
  `ID_FOURNISSEUR` int NOT NULL,
  `ID_LANGUES` int NOT NULL,
  PRIMARY KEY (`ID_FOURNISSEUR`,`ID_LANGUES`),
  KEY `IDX_C35D79F43DE9E040` (`ID_LANGUES`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur_logiciels`
--

DROP TABLE IF EXISTS `fournisseur_logiciels`;
CREATE TABLE IF NOT EXISTS `fournisseur_logiciels` (
  `ID_FOURNISSEUR` int NOT NULL,
  `ID_LOGICIELS` int NOT NULL,
  PRIMARY KEY (`ID_FOURNISSEUR`,`ID_LOGICIELS`),
  KEY `IDX_1F510C67B8C1B6E5` (`ID_LOGICIELS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur_permis`
--

DROP TABLE IF EXISTS `fournisseur_permis`;
CREATE TABLE IF NOT EXISTS `fournisseur_permis` (
  `ID_FOURNISSEUR` int NOT NULL,
  `ID_PERMIS` int NOT NULL,
  PRIMARY KEY (`ID_FOURNISSEUR`,`ID_PERMIS`),
  KEY `IDX_DAF2C475DD95A600` (`ID_FOURNISSEUR`),
  KEY `IDX_DAF2C475BA7006CD` (`ID_PERMIS`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur_typedemission`
--

DROP TABLE IF EXISTS `fournisseur_typedemission`;
CREATE TABLE IF NOT EXISTS `fournisseur_typedemission` (
  `ID_FOURNISSEUR` int NOT NULL,
  `ID_TYPEDEMISSION` int NOT NULL,
  PRIMARY KEY (`ID_FOURNISSEUR`,`ID_TYPEDEMISSION`),
  KEY `IDX_E8EA173DDD95A600` (`ID_FOURNISSEUR`),
  KEY `IDX_E8EA173D9627B364` (`ID_TYPEDEMISSION`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `fournisseur_typedemission`
--

INSERT INTO `fournisseur_typedemission` (`ID_FOURNISSEUR`, `ID_TYPEDEMISSION`) VALUES
(43, 5),
(43, 6),
(43, 7),
(43, 8),
(44, 5),
(44, 6),
(44, 7),
(44, 8),
(45, 8),
(50, 6),
(51, 6),
(54, 5),
(55, 7),
(56, 5),
(58, 8),
(59, 8),
(60, 8),
(61, 6),
(62, 7),
(63, 6),
(64, 6),
(65, 6),
(67, 7),
(68, 7),
(69, 7),
(73, 6),
(74, 6),
(75, 5),
(76, 5),
(77, 7),
(78, 5),
(79, 6),
(80, 8),
(81, 7),
(82, 5),
(83, 6),
(84, 6),
(85, 5),
(88, 5),
(88, 6),
(88, 7),
(88, 8),
(89, 24),
(89, 25),
(90, 23),
(90, 24),
(90, 25),
(91, 6),
(91, 7),
(91, 8),
(91, 14),
(91, 17),
(91, 25),
(94, 25),
(94, 26),
(95, 25),
(95, 26),
(96, 10),
(96, 11),
(99, 16),
(99, 17),
(99, 19),
(101, 27),
(101, 28),
(106, 6),
(108, 25),
(108, 26),
(109, 26),
(109, 28),
(111, 8),
(111, 11),
(111, 13),
(118, 26),
(129, 7),
(129, 9),
(129, 12),
(129, 15),
(130, 25),
(130, 26),
(137, 24),
(137, 25),
(137, 26),
(142, 23),
(142, 24),
(142, 25),
(143, 25),
(143, 26),
(143, 28),
(148, 19),
(148, 20),
(148, 21),
(151, 23),
(151, 24),
(157, 5),
(157, 6),
(157, 12),
(161, 27),
(162, 21),
(163, 17),
(163, 19),
(164, 16),
(164, 18),
(164, 19),
(164, 30),
(165, 22),
(165, 23),
(165, 24),
(166, 22),
(166, 23),
(166, 24),
(168, 7),
(168, 8),
(168, 9),
(168, 20),
(168, 21),
(168, 22),
(169, 25),
(169, 26),
(169, 27),
(170, 8),
(170, 9),
(170, 10),
(171, 6),
(171, 7),
(171, 8),
(172, 20),
(172, 21),
(172, 22),
(174, 23),
(174, 24),
(174, 25),
(175, 25),
(175, 26),
(176, 22),
(176, 23),
(177, 16),
(177, 17),
(178, 18),
(178, 19),
(179, 21),
(179, 22),
(180, 20),
(180, 21),
(180, 22),
(180, 23),
(181, 18),
(181, 19),
(181, 20),
(184, 15),
(184, 16),
(185, 5),
(185, 6),
(185, 7);

-- --------------------------------------------------------

--
-- Structure de la table `infos_bancaires_c`
--

DROP TABLE IF EXISTS `infos_bancaires_c`;
CREATE TABLE IF NOT EXISTS `infos_bancaires_c` (
  `Titulaire_du_compte` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `IBAN` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ID_BANCAIRES_C` int NOT NULL AUTO_INCREMENT,
  `ID_CLIENT` int DEFAULT NULL,
  PRIMARY KEY (`ID_BANCAIRES_C`),
  KEY `fk_BANQUE_CLIENT` (`ID_CLIENT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `infos_bancaires_f`
--

DROP TABLE IF EXISTS `infos_bancaires_f`;
CREATE TABLE IF NOT EXISTS `infos_bancaires_f` (
  `Titulaire_Du_compte` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `IBAN` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ID_BANCAIRES_F` int NOT NULL AUTO_INCREMENT,
  `ID_FOURNISSEUR` int DEFAULT NULL,
  `siret` int DEFAULT NULL,
  PRIMARY KEY (`ID_BANCAIRES_F`),
  KEY `fk_BANQUE_FOURNISSEUR` (`ID_FOURNISSEUR`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `infos_bancaires_f`
--

INSERT INTO `infos_bancaires_f` (`Titulaire_Du_compte`, `IBAN`, `ID_BANCAIRES_F`, `ID_FOURNISSEUR`, `siret`) VALUES
('144552258844', '14555448865655', 1, 155, 11455558);

-- --------------------------------------------------------

--
-- Structure de la table `infos_certifications`
--

DROP TABLE IF EXISTS `infos_certifications`;
CREATE TABLE IF NOT EXISTS `infos_certifications` (
  `NOM_CERTIFICATION` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `NIVEAU` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `DATE_OBTENTION_CERTIF` date DEFAULT NULL,
  `ID_CERTIFICATIONS` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID_CERTIFICATIONS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `infos_formations`
--

DROP TABLE IF EXISTS `infos_formations`;
CREATE TABLE IF NOT EXISTS `infos_formations` (
  `NOM_ETABLISSEMENT` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `DOMAINE_ETUDES` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `DIPLOME` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `DEBUT` date DEFAULT NULL,
  `FIN` date DEFAULT NULL,
  `ID_FORMATIONS` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID_FORMATIONS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `infos_langages`
--

DROP TABLE IF EXISTS `infos_langages`;
CREATE TABLE IF NOT EXISTS `infos_langages` (
  `NOM_LANGAGE` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `NIVEAU` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `ID_LANGAGES` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID_LANGAGES`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `infos_langages`
--

INSERT INTO `infos_langages` (`NOM_LANGAGE`, `NIVEAU`, `ID_LANGAGES`) VALUES
('python', 'débutant', 3),
('php', 'Avancé', 4);

-- --------------------------------------------------------

--
-- Structure de la table `infos_langues`
--

DROP TABLE IF EXISTS `infos_langues`;
CREATE TABLE IF NOT EXISTS `infos_langues` (
  `NOM_LANGUE` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `NIVEAU` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `ID_LANGUES` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID_LANGUES`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `infos_langues`
--

INSERT INTO `infos_langues` (`NOM_LANGUE`, `NIVEAU`, `ID_LANGUES`) VALUES
('Français', 'Maternelle ', 1);

-- --------------------------------------------------------

--
-- Structure de la table `infos_logiciels`
--

DROP TABLE IF EXISTS `infos_logiciels`;
CREATE TABLE IF NOT EXISTS `infos_logiciels` (
  `NOM_LOGICIEL` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `NIVEAU` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `ID_LOGICIELS` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID_LOGICIELS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `infos_permis`
--

DROP TABLE IF EXISTS `infos_permis`;
CREATE TABLE IF NOT EXISTS `infos_permis` (
  `NOM_PERMIS` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `DATE_OBTENTION` date DEFAULT NULL,
  `PAYS_OBTENTION` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `ID_PERMIS` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID_PERMIS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `missions`
--

DROP TABLE IF EXISTS `missions`;
CREATE TABLE IF NOT EXISTS `missions` (
  `ID_MISSIONS` int NOT NULL AUTO_INCREMENT,
  `OBJET_MISSIONS` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DESCRIPTION_MISSIONS` tinytext NOT NULL,
  `DATE_DEBUT_MISSIONS_PR` date NOT NULL,
  `DATE_FIN_MISSIONS_PR` date NOT NULL,
  `HORAIRE_MISSIONS` time DEFAULT NULL,
  `TEMPS_PAUSE` time DEFAULT NULL,
  `PAUSE_REMUNERE` tinyint(1) DEFAULT NULL,
  `EQUIPEMENT` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `ID_CLIENT` int DEFAULT NULL,
  `ETAT` varchar(5) DEFAULT NULL,
  `nombres_jobbers_souhaite` int NOT NULL,
  `details_supplementaires` varchar(255) DEFAULT NULL,
  `informations_suplementaires` varchar(255) DEFAULT NULL,
  `nom_contact` varchar(255) NOT NULL,
  `prenom_contact` varchar(255) NOT NULL,
  `tel_contact` varchar(255) NOT NULL,
  `email_contact` varchar(255) NOT NULL,
  `adresse_contact` varchar(255) NOT NULL,
  `heures_debut_missions` time NOT NULL,
  `heures_fin_missions` time NOT NULL,
  `heures_debut_pause` time DEFAULT NULL,
  `heure_fin_pause` time DEFAULT NULL,
  `permis_mission` varchar(255) DEFAULT NULL,
  `categorie_autre` varchar(255) DEFAULT NULL,
  `ID_TYPEDEMISSION` int DEFAULT NULL,
  PRIMARY KEY (`ID_MISSIONS`),
  KEY `fk_CLIENT_MISSIONS` (`ID_CLIENT`),
  KEY `IDX_34F1D47E9627B364` (`ID_TYPEDEMISSION`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `missions`
--

INSERT INTO `missions` (`ID_MISSIONS`, `OBJET_MISSIONS`, `DESCRIPTION_MISSIONS`, `DATE_DEBUT_MISSIONS_PR`, `DATE_FIN_MISSIONS_PR`, `HORAIRE_MISSIONS`, `TEMPS_PAUSE`, `PAUSE_REMUNERE`, `EQUIPEMENT`, `ID_CLIENT`, `ETAT`, `nombres_jobbers_souhaite`, `details_supplementaires`, `informations_suplementaires`, `nom_contact`, `prenom_contact`, `tel_contact`, `email_contact`, `adresse_contact`, `heures_debut_missions`, `heures_fin_missions`, `heures_debut_pause`, `heure_fin_pause`, `permis_mission`, `categorie_autre`, `ID_TYPEDEMISSION`) VALUES
(14, 'missionD\'or', 'missionTEST', '1995-12-14', '2225-11-02', NULL, NULL, NULL, 'les gants et chass', 185, 'attr', 4, 'OK', 'testBOUDIAF', 'Laidaoui', 'Boudiaf', '655844714', 'laidaouiboudiaf@gmail.com', '40 bis Beauvoir, Rue de Turly, Bourges', '15:00:00', '00:00:00', '00:00:00', '00:00:00', 'B', NULL, NULL),
(15, 'DiopMission', 'La mise en place d\'un plan d\'action', '2021-06-03', '1014-06-25', NULL, NULL, NULL, 'Le casque', 185, 'dispo', 100, 'A voir', 'PARIS', 'BENICHOU', 'Fadéla', '655844720', 'contact@akam-agence.fr', '190 Knickerbocker Road', '17:00:00', '13:00:00', '12:00:00', '15:00:00', 'C', NULL, NULL),
(16, 'NouvelleMissionTest', 'Description de la mission *', '2021-06-07', '2021-06-07', NULL, NULL, NULL, 'les gants', 185, 'attr', 2, 'Details suplimentairesTEST', 'Description de la mission', 'Yixin', 'Sun', '655844720', 'bilardose@gmail.com', '74 Rue turly', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 'C', NULL, NULL),
(17, 'queryCRIT', 'The result of this query would be a list of User objects', '5555-05-11', '5448-04-21', NULL, NULL, NULL, 'angel', 185, 'attr', 15, 'nounou', 'query', 'BENICHOU', 'Fadéla', '64444444', 'laidaouiboudiaf@gmail.com', '137 Rue de Javel', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 'B', NULL, NULL),
(18, 'diop', 'Catégorie', '2021-06-18', '2021-06-19', NULL, NULL, NULL, 'les gants et chass', 185, 'dispo', 5, 'OK', 'OK', 'BENISTI', 'SAMAD', '655844714', 'contact@akam-agence.fr', '6 rue bonneterie-Vieux port', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 'B', NULL, NULL),
(22, 'boudiafO', 'ok', '2021-06-03', '2021-06-11', NULL, NULL, NULL, 'gans', 185, 'dispo', 4, 'ok', 'ok', 'Laidaoui', 'Boudiaf', '665844785', 'laidaouiboudiaf@gmail.com', '190 Knickerbocker Road', '08:00:00', '17:00:00', '00:00:00', '00:00:00', 'B', NULL, NULL),
(23, 'boudiaf', 'ok', '2021-06-30', '2021-07-29', NULL, NULL, NULL, 'equipement', 185, 'dispo', 7, 'pol', 'ok', 'LAID', 'Bilal', '665844785', 'bilardose@gmail.com', '137 Rue de Javel', '15:00:00', '15:00:00', '00:00:00', '00:00:00', 'B', NULL, NULL),
(24, 'boudiaf', 'Description', '2021-06-10', '2021-06-13', NULL, NULL, NULL, 'l\'admission', 185, 'dispo', 5, 'ok', 'ok', 'BENICHOU', 'Fadéla', '655844714', 'contact@akam-agence.fr', '40 bis Beauvoir, Rue de Turly, Bourges', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 'C', 'bour', NULL),
(25, 'boudiaf', 'Description', '2021-06-10', '2021-06-13', NULL, NULL, NULL, 'l\'admission', 185, 'dispo', 5, 'ok', 'ok', 'BENICHOU', 'Fadéla', '655844714', 'contact@akam-agence.fr', '40 bis Beauvoir, Rue de Turly, Bourges', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 'C', 'bour', NULL),
(26, 'bilel', 'pl', '2021-06-03', '2021-06-11', NULL, NULL, NULL, 'les gants', 185, 'dispo', 5, 'ok', 'ok', 'boudiaf', 'boudiafbilt', '658142578', 'boudiaf@gmail.com', 'rue minmimes', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 'permis', 'ok', NULL),
(27, 'bilel', 'l', '2021-06-04', '2021-06-27', NULL, NULL, NULL, 'les gants', 185, 'dispo', 5, 'pk', 'ok', 'boudiaf', 'boudiafbilt', '658142578', 'boudiaf@gmail.com', 'rue minmimes', '00:00:00', '00:00:00', '00:00:00', '00:00:00', NULL, 'ok', NULL),
(28, 'bilel', 'ok', '2021-06-12', '2021-06-12', NULL, NULL, NULL, 'les gants', 185, 'dispo', 5, NULL, 'ok', 'boudiaf', 'boudiafbilt', '658142578', 'boudiaf@gmail.com', 'rue minmimes', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 'B', 'ok', NULL),
(29, 'sdjjssjj', 'lk', '2021-06-21', '2021-06-14', NULL, NULL, NULL, NULL, 185, 'dispo', 5, NULL, 'ok', 'Laidaoui', 'Boudiaf', '665844785', 'laidaouiboudiaf@gmail.com', '40 bis Beauvoir, Rue de Turly, Bourges', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 'B', NULL, 7),
(30, 'missionD\'orok', 'ook', '2021-06-11', '2021-06-18', NULL, NULL, NULL, NULL, 185, 'dispo', 5, NULL, NULL, 'Laidaoui', 'Boudiaf', '665844785', 'laidaouiboudiaf@gmail.com', '40 bis Beauvoir, Rue de Turly, Bourges', '00:00:00', '00:00:00', '00:00:00', '00:00:00', NULL, NULL, 20),
(31, 'diop', 'ok', '2021-06-03', '2021-06-18', NULL, NULL, NULL, NULL, 185, 'dispo', 5, NULL, NULL, 'Laidaoui', 'Boudiaf', '4', 'laidaouiboudiaf@gmail.com', '40 bis Beauvoir, Rue de Turly, Bourges', '00:00:00', '00:00:00', '00:00:00', '00:00:00', NULL, NULL, 11),
(32, 'boudiaf', 'ok', '2021-06-18', '2021-06-18', NULL, NULL, NULL, NULL, 185, 'dispo', 5, NULL, NULL, 'Yixin', 'Sun', 'kh', 'bilardose@gmail.co', '6 rue bonneterie-Vieux port', '00:00:00', '00:00:00', '00:00:00', '00:00:00', NULL, NULL, 10),
(33, 'Superviseur de chantier', 'KIK', '2021-06-23', '2021-06-17', NULL, NULL, NULL, 'gants', 186, 'dispo', 5, NULL, 'II', 'Diop', 'Makha', '758488595', 'makhadiop008@gmail.com', '4 Square Aquitaine', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 'B', NULL, 15),
(34, 'Superviseur', 'superviseur', '2021-06-16', '2021-06-03', NULL, NULL, NULL, 'gants', 187, 'dispo', 2, NULL, 'aaaaa', 'Diop', 'Makha', '758488595', 'makhadiop008@gmail.com', '4 Square Aquitaine', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 'B', NULL, 13),
(35, 'Superviseur de chantier', 'missions', '2021-06-24', '2021-06-07', NULL, NULL, NULL, 'gants', 188, 'dispo', 5, NULL, NULL, 'Diop', 'Makha', '758488595', 'makhadiop008@gmail.com', '4 Square Aquitaine', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 'B', NULL, 10);

-- --------------------------------------------------------

--
-- Structure de la table `missions_attr`
--

DROP TABLE IF EXISTS `missions_attr`;
CREATE TABLE IF NOT EXISTS `missions_attr` (
  `ID_MISSIONS_ATTR` int NOT NULL,
  `DATE_DEBUT_MISSIONS_RL` date NOT NULL,
  `DATE_FIN_MISSIONS_RL` date DEFAULT NULL,
  `ID_FOURNISSEUR` int DEFAULT NULL,
  `ID_CLIENT` int DEFAULT NULL,
  `statut` varchar(255) DEFAULT NULL,
  `nb_heures` int DEFAULT NULL,
  `comment_mission_attr` varchar(255) DEFAULT NULL,
  `valid_nb_heure` tinyint(1) DEFAULT NULL,
  `montant_prestation` int DEFAULT NULL,
  `chiffre_affaire` int DEFAULT NULL,
  `facture` varchar(255) DEFAULT NULL,
  `facture_f` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_MISSIONS_ATTR`),
  KEY `fk_MISSIONS_ATTR_FOURNISSEUR` (`ID_FOURNISSEUR`),
  KEY `fk_MISSIONS_ATTR_CLIENT` (`ID_CLIENT`),
  KEY `IDX_B9A3C97F7FFC7018` (`ID_MISSIONS_ATTR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `missions_attr`
--

INSERT INTO `missions_attr` (`ID_MISSIONS_ATTR`, `DATE_DEBUT_MISSIONS_RL`, `DATE_FIN_MISSIONS_RL`, `ID_FOURNISSEUR`, `ID_CLIENT`, `statut`, `nb_heures`, `comment_mission_attr`, `valid_nb_heure`, `montant_prestation`, `chiffre_affaire`, `facture`, `facture_f`) VALUES
(17, '2021-06-10', '2021-06-18', 156, 185, 'JOB', 5, 'oui', NULL, 1544, 14555, '78887', ''),
(23, '2021-06-15', '2021-06-15', 156, 185, NULL, 14, 'ok', 1, 455, 88, 'AttestationHebergement1-60c8e6a17aa72.pdf', 'ok2-60c8e6a17f792.pdf'),
(24, '2021-06-25', '2021-06-25', 155, 185, NULL, 4, 'ok', 1, 44, 55, 'Introduction-a-l-informatique-Cours-complet-60c8e0686efa6.pdf', NULL),
(35, '2021-06-04', '2021-06-10', 182, 188, NULL, 2, NULL, 0, 200, 100, 'intro-droit-M1-IESA-60d1d6013bdd4.pdf', 'intro-droit-M1-IESA-60d1d6013d0eb.pdf');

-- --------------------------------------------------------

--
-- Structure de la table `missions_certifications`
--

DROP TABLE IF EXISTS `missions_certifications`;
CREATE TABLE IF NOT EXISTS `missions_certifications` (
  `ID_MISSIONS` int NOT NULL,
  `ID_CERTIFICATIONS` int NOT NULL,
  PRIMARY KEY (`ID_MISSIONS`,`ID_CERTIFICATIONS`),
  KEY `IDX_61A8CF8AD4DFF869` (`ID_CERTIFICATIONS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `missions_formations`
--

DROP TABLE IF EXISTS `missions_formations`;
CREATE TABLE IF NOT EXISTS `missions_formations` (
  `ID_MISSIONS` int NOT NULL,
  `ID_FORMATIONS` int NOT NULL,
  PRIMARY KEY (`ID_MISSIONS`,`ID_FORMATIONS`),
  KEY `IDX_597F0DD745CA2CD2` (`ID_FORMATIONS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `missions_langages`
--

DROP TABLE IF EXISTS `missions_langages`;
CREATE TABLE IF NOT EXISTS `missions_langages` (
  `ID_MISSIONS` int NOT NULL,
  `ID_LANGAGES` int NOT NULL,
  PRIMARY KEY (`ID_MISSIONS`,`ID_LANGAGES`),
  KEY `IDX_DB4B0B96E6E6C2` (`ID_LANGAGES`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `missions_langues`
--

DROP TABLE IF EXISTS `missions_langues`;
CREATE TABLE IF NOT EXISTS `missions_langues` (
  `ID_MISSIONS` int NOT NULL,
  `ID_LANGUES` int NOT NULL,
  PRIMARY KEY (`ID_MISSIONS`,`ID_LANGUES`),
  KEY `IDX_9ECA72A3DE9E040` (`ID_LANGUES`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `missions_logiciels`
--

DROP TABLE IF EXISTS `missions_logiciels`;
CREATE TABLE IF NOT EXISTS `missions_logiciels` (
  `ID_MISSIONS` int NOT NULL,
  `ID_LOGICIELS` int NOT NULL,
  PRIMARY KEY (`ID_MISSIONS`,`ID_LOGICIELS`),
  KEY `IDX_6181D194B8C1B6E5` (`ID_LOGICIELS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `missions_permis`
--

DROP TABLE IF EXISTS `missions_permis`;
CREATE TABLE IF NOT EXISTS `missions_permis` (
  `ID_MISSIONS` int NOT NULL,
  `ID_PERMIS` int NOT NULL,
  PRIMARY KEY (`ID_MISSIONS`,`ID_PERMIS`),
  KEY `IDX_D1EE9084BA7006CD` (`ID_PERMIS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `permis_type`
--

DROP TABLE IF EXISTS `permis_type`;
CREATE TABLE IF NOT EXISTS `permis_type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type_permis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `permis_type`
--

INSERT INTO `permis_type` (`id`, `type_permis`) VALUES
(1, 'Catégorie AM'),
(2, 'Catégorie A'),
(3, 'Catégorie B'),
(4, 'Catégorie C'),
(5, 'Catégorie D');

-- --------------------------------------------------------

--
-- Structure de la table `reset_password_request`
--

DROP TABLE IF EXISTS `reset_password_request`;
CREATE TABLE IF NOT EXISTS `reset_password_request` (
  `id` int NOT NULL AUTO_INCREMENT,
  `selector` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hashed_token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requested_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `expires_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `ID_USERS` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_7CE748A3B997DA3` (`ID_USERS`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reset_password_request`
--

INSERT INTO `reset_password_request` (`id`, `selector`, `hashed_token`, `requested_at`, `expires_at`, `ID_USERS`) VALUES
(2, '8gSf4Uva6oIXj5RMj3m4', 'rnmUz6Ch3kWcoJcOvhV/XZpKX/zIQ9BAgRk1CUaaHEs=', '2021-06-22 14:06:43', '2021-06-22 15:06:43', 446),
(4, 'MVmT3aJABFTrbzKQCntv', 'jb3hyRiB7k1MIgS3kbMKr8HEU4HCYBx1+QMnwsUi0Ds=', '2021-06-23 22:13:02', '2021-06-23 23:13:02', 446),
(5, 'o5h2GDbWrslyi3Q0We0j', 'zBIRctfMC/DgE62bmOaYrkmoil6r5GN7uHXPzeu8aTg=', '2021-06-23 22:17:47', '2021-06-23 23:17:47', 445),
(7, 'k3bZIfUeG6NFfBEITbRD', 'h0fo6Nxp/kIYQF49PC9QWBFD4qhOzFwdfQGtbi0lhF8=', '2021-06-23 23:54:02', '2021-06-24 00:54:02', 448);

-- --------------------------------------------------------

--
-- Structure de la table `tableau_disponibilite`
--

DROP TABLE IF EXISTS `tableau_disponibilite`;
CREATE TABLE IF NOT EXISTS `tableau_disponibilite` (
  `ID_Tableau_Dispo` int NOT NULL AUTO_INCREMENT,
  `lundi_matin` tinyint(1) DEFAULT NULL,
  `lund_midi` tinyint(1) DEFAULT NULL,
  `lundi_soir` tinyint(1) DEFAULT NULL,
  `mardi_matin` tinyint(1) DEFAULT NULL,
  `mardi_midi` tinyint(1) DEFAULT NULL,
  `mardi_soir` tinyint(1) DEFAULT NULL,
  `mercredi_matin` tinyint(1) DEFAULT NULL,
  `mercredi_midi` tinyint(1) DEFAULT NULL,
  `mercredi_soir` tinyint(1) DEFAULT NULL,
  `jeudi_matin` tinyint(1) DEFAULT NULL,
  `jeudi_midi` tinyint(1) DEFAULT NULL,
  `jeudi_soir` tinyint(1) DEFAULT NULL,
  `vendredi_matin` tinyint(1) NOT NULL,
  `vendredi_midi` tinyint(1) DEFAULT NULL,
  `vendredi_soir` tinyint(1) DEFAULT NULL,
  `samedi_matin` tinyint(1) DEFAULT NULL,
  `samedi_midi` tinyint(1) DEFAULT NULL,
  `samedi_soir` tinyint(1) DEFAULT NULL,
  `dimanche_matin` tinyint(1) DEFAULT NULL,
  `dimache_midi` tinyint(1) DEFAULT NULL,
  `dimanche_soir` tinyint(1) DEFAULT NULL,
  `commentaire_dispo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID_Tableau_Dispo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `type_demission`
--

DROP TABLE IF EXISTS `type_demission`;
CREATE TABLE IF NOT EXISTS `type_demission` (
  `ID_TYPEDEMISSION` int NOT NULL AUTO_INCREMENT,
  `nom_type_mission` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID_TYPEDEMISSION`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_demission`
--

INSERT INTO `type_demission` (`ID_TYPEDEMISSION`, `nom_type_mission`) VALUES
(5, 'Ouvrier d’exécution'),
(6, 'Electricien de chantier'),
(7, 'Menuisier de chantier'),
(8, 'Peintre en bâtiment'),
(9, 'Tireur de câble'),
(10, 'Plombier sanitaire'),
(11, 'Chauffagiste'),
(12, 'Plaquiste'),
(13, 'Maçon'),
(14, 'Plaquiste'),
(15, 'Carreleur'),
(16, 'Charpentier'),
(17, 'Chef de chantier'),
(18, 'Coffreur-boiseur'),
(19, 'Couvreur'),
(20, 'Echafaudeur'),
(21, 'Etanchéiste'),
(22, 'Grutier'),
(23, 'Miroitier'),
(24, 'Operateur de démolition'),
(25, 'Plâtrier'),
(26, 'Serrurier'),
(27, 'Moquettiste'),
(28, 'Terrassier'),
(29, 'Tailleur de pierre'),
(30, 'Conducteur d’engins'),
(31, 'Canalisateur'),
(32, 'Autre (à rentrer à la main)');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID_USERS` int NOT NULL AUTO_INCREMENT,
  `NOM` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `PRENOM` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ADRESSE_MAIL` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `MOT_DE_PASSE` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `IS_VERIFIED` tinyint DEFAULT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  `UPDATE_AT` datetime DEFAULT NULL,
  `NUM` varchar(255) NOT NULL,
  `ROLES` json NOT NULL,
  PRIMARY KEY (`ID_USERS`)
) ENGINE=InnoDB AUTO_INCREMENT=450 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`ID_USERS`, `NOM`, `PRENOM`, `ADRESSE_MAIL`, `MOT_DE_PASSE`, `IS_VERIFIED`, `CREATED_AT`, `UPDATE_AT`, `NUM`, `ROLES`) VALUES
(431, 'Laidaoui', 'Boudiaf', 'laidaouiboudiaf@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$LnFGU2RmcW9tSDg4MnQ2ZA$wDCZH4O69eHUy+q3cQ3C7K4DbcqYIDtMuHBp/kCvuQU', 1, NULL, NULL, '0658341586', '[\"ROLE_ADMIN\"]'),
(449, 'Diop', 'Makha', 'saraxeisaraxou@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$VG92VXlleUd3REhmd1ovWA$hyNYR/eGfMJgv+7twcFXoLt8Q9wD5AjFL9VVt+SJSKs', 1, NULL, NULL, '0758488595', '[\"ROLE_FOURNISSEUR\"]');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `fk_CLIENT_USERS` FOREIGN KEY (`ID_USERS`) REFERENCES `users` (`ID_USERS`);

--
-- Contraintes pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD CONSTRAINT `FK_369ECA3291E4D0D5` FOREIGN KEY (`ID_Tableau_Dispo`) REFERENCES `tableau_disponibilite` (`ID_Tableau_Dispo`),
  ADD CONSTRAINT `fk_FOURNISSEUR_USERS` FOREIGN KEY (`ID_USERS`) REFERENCES `users` (`ID_USERS`);

--
-- Contraintes pour la table `fournisseur_certifications`
--
ALTER TABLE `fournisseur_certifications`
  ADD CONSTRAINT `fk_CERTIFICATIONS_FOURSNISSEUR` FOREIGN KEY (`ID_CERTIFICATIONS`) REFERENCES `infos_certifications` (`ID_CERTIFICATIONS`),
  ADD CONSTRAINT `fk_FOURNISSEUR_CERTIFICATIONS` FOREIGN KEY (`ID_FOURNISSEUR`) REFERENCES `fournisseur` (`ID_FOURNISSEUR`);

--
-- Contraintes pour la table `fournisseur_formations`
--
ALTER TABLE `fournisseur_formations`
  ADD CONSTRAINT `fk_FORMATIONS_FOURNISSEUR` FOREIGN KEY (`ID_FORMATIONS`) REFERENCES `infos_formations` (`ID_FORMATIONS`),
  ADD CONSTRAINT `fk_FOURNISSEUR_FORMATIONS` FOREIGN KEY (`ID_FOURNISSEUR`) REFERENCES `fournisseur` (`ID_FOURNISSEUR`);

--
-- Contraintes pour la table `fournisseur_langages`
--
ALTER TABLE `fournisseur_langages`
  ADD CONSTRAINT `fk_FOURNISSEUR_LANGAGES` FOREIGN KEY (`ID_FOURNISSEUR`) REFERENCES `fournisseur` (`ID_FOURNISSEUR`),
  ADD CONSTRAINT `fk_LANGAGES_FOURNISSEUR` FOREIGN KEY (`ID_LANGAGES`) REFERENCES `infos_langages` (`ID_LANGAGES`);

--
-- Contraintes pour la table `fournisseur_langues`
--
ALTER TABLE `fournisseur_langues`
  ADD CONSTRAINT `fk_FOURNISSEUR_LANGUES` FOREIGN KEY (`ID_FOURNISSEUR`) REFERENCES `fournisseur` (`ID_FOURNISSEUR`),
  ADD CONSTRAINT `fk_LANGUES_FOURNISSEUR` FOREIGN KEY (`ID_LANGUES`) REFERENCES `infos_langues` (`ID_LANGUES`);

--
-- Contraintes pour la table `fournisseur_logiciels`
--
ALTER TABLE `fournisseur_logiciels`
  ADD CONSTRAINT `fk_FOURNISSEUR_LOGICIELS` FOREIGN KEY (`ID_FOURNISSEUR`) REFERENCES `fournisseur` (`ID_FOURNISSEUR`),
  ADD CONSTRAINT `fk_LOGICIELS_FOURNISSEUR` FOREIGN KEY (`ID_LOGICIELS`) REFERENCES `infos_logiciels` (`ID_LOGICIELS`);

--
-- Contraintes pour la table `fournisseur_typedemission`
--
ALTER TABLE `fournisseur_typedemission`
  ADD CONSTRAINT `FK_E8EA173D9627B364` FOREIGN KEY (`ID_TYPEDEMISSION`) REFERENCES `type_demission` (`ID_TYPEDEMISSION`),
  ADD CONSTRAINT `FK_E8EA173DDD95A600` FOREIGN KEY (`ID_FOURNISSEUR`) REFERENCES `fournisseur` (`ID_FOURNISSEUR`);

--
-- Contraintes pour la table `infos_bancaires_c`
--
ALTER TABLE `infos_bancaires_c`
  ADD CONSTRAINT `fk_BANQUE_CLIENT` FOREIGN KEY (`ID_CLIENT`) REFERENCES `client` (`ID_CLIENT`);

--
-- Contraintes pour la table `infos_bancaires_f`
--
ALTER TABLE `infos_bancaires_f`
  ADD CONSTRAINT `fk_BANQUE_FOURNISSEUR` FOREIGN KEY (`ID_FOURNISSEUR`) REFERENCES `fournisseur` (`ID_FOURNISSEUR`);

--
-- Contraintes pour la table `missions`
--
ALTER TABLE `missions`
  ADD CONSTRAINT `FK_34F1D47E9627B364` FOREIGN KEY (`ID_TYPEDEMISSION`) REFERENCES `type_demission` (`ID_TYPEDEMISSION`),
  ADD CONSTRAINT `fk_CLIENT_MISSIONS` FOREIGN KEY (`ID_CLIENT`) REFERENCES `client` (`ID_CLIENT`);

--
-- Contraintes pour la table `missions_attr`
--
ALTER TABLE `missions_attr`
  ADD CONSTRAINT `FK_B9A3C97F7FFC7018` FOREIGN KEY (`ID_MISSIONS_ATTR`) REFERENCES `missions` (`ID_MISSIONS`),
  ADD CONSTRAINT `fk_MISSIONS_ATTR_CLIENT` FOREIGN KEY (`ID_CLIENT`) REFERENCES `client` (`ID_CLIENT`),
  ADD CONSTRAINT `fk_MISSIONS_ATTR_FOURNISSEUR` FOREIGN KEY (`ID_FOURNISSEUR`) REFERENCES `fournisseur` (`ID_FOURNISSEUR`);

--
-- Contraintes pour la table `missions_certifications`
--
ALTER TABLE `missions_certifications`
  ADD CONSTRAINT `fk_CERTIFICATION_MISSIONS` FOREIGN KEY (`ID_CERTIFICATIONS`) REFERENCES `infos_certifications` (`ID_CERTIFICATIONS`),
  ADD CONSTRAINT `fk_MISSIONS_CERTIFICATIONS` FOREIGN KEY (`ID_MISSIONS`) REFERENCES `missions` (`ID_MISSIONS`);

--
-- Contraintes pour la table `missions_formations`
--
ALTER TABLE `missions_formations`
  ADD CONSTRAINT `fk_FORMATIONS_MISSIONS` FOREIGN KEY (`ID_FORMATIONS`) REFERENCES `infos_formations` (`ID_FORMATIONS`),
  ADD CONSTRAINT `fk_MISSIONS_FORMATIONS` FOREIGN KEY (`ID_MISSIONS`) REFERENCES `missions` (`ID_MISSIONS`);

--
-- Contraintes pour la table `missions_langages`
--
ALTER TABLE `missions_langages`
  ADD CONSTRAINT `fk_LANGAGES_MISSIONS` FOREIGN KEY (`ID_LANGAGES`) REFERENCES `infos_langages` (`ID_LANGAGES`),
  ADD CONSTRAINT `fk_MISSIONS_LANGAGES` FOREIGN KEY (`ID_MISSIONS`) REFERENCES `missions` (`ID_MISSIONS`);

--
-- Contraintes pour la table `missions_langues`
--
ALTER TABLE `missions_langues`
  ADD CONSTRAINT `fk_LANGUES_MISSIONS` FOREIGN KEY (`ID_LANGUES`) REFERENCES `infos_langues` (`ID_LANGUES`),
  ADD CONSTRAINT `fk_MISSIONS_LANGUES` FOREIGN KEY (`ID_MISSIONS`) REFERENCES `missions` (`ID_MISSIONS`);

--
-- Contraintes pour la table `missions_logiciels`
--
ALTER TABLE `missions_logiciels`
  ADD CONSTRAINT `fk_LOGICIELS_MISSIONS` FOREIGN KEY (`ID_LOGICIELS`) REFERENCES `infos_logiciels` (`ID_LOGICIELS`),
  ADD CONSTRAINT `fk_MISSIONS_LOGICIELS` FOREIGN KEY (`ID_MISSIONS`) REFERENCES `missions` (`ID_MISSIONS`);

--
-- Contraintes pour la table `missions_permis`
--
ALTER TABLE `missions_permis`
  ADD CONSTRAINT `fk_MISSIONS_PERMIS` FOREIGN KEY (`ID_MISSIONS`) REFERENCES `missions` (`ID_MISSIONS`),
  ADD CONSTRAINT `fk_PERMIS_MISSIONS` FOREIGN KEY (`ID_PERMIS`) REFERENCES `infos_permis` (`ID_PERMIS`);

--
-- Contraintes pour la table `reset_password_request`
--
ALTER TABLE `reset_password_request`
  ADD CONSTRAINT `FK_7CE748A3B997DA3` FOREIGN KEY (`ID_USERS`) REFERENCES `users` (`ID_USERS`);
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

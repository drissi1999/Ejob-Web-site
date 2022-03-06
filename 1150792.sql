-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 14 juil. 2020 à 00:38
-- Version du serveur :  10.3.16-MariaDB
-- Version de PHP :  7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `1150792`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `login`, `password`, `name`) VALUES
(1, 'admin', 'admin', ' houcine');

-- --------------------------------------------------------

--
-- Structure de la table `blog`
--

CREATE TABLE `blog` (
  `id_post` int(11) NOT NULL,
  `auteur` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `photo_blog` varchar(40) NOT NULL,
  `post_date` datetime NOT NULL,
  `id_candidate` int(11) NOT NULL,
  `etat` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `blog`
--

INSERT INTO `blog` (`id_post`, `auteur`, `title`, `content`, `photo_blog`, `post_date`, `id_candidate`, `etat`) VALUES
(1, 'Abdelhamid Rachidi', 'Expliquer', 'Le site est bon pour trouver du travail', 'banner-7.jpg', '2019-06-10 01:29:39', 1, 1),
(2, 'Abdelhamid Rachidi', 'Élévation', 'Ce site a un bon moteur de recherche', '2.jpg', '2019-06-10 01:37:46', 1, 1),
(4, 'Karjou abdeslam', 'Top', 'best website builder', '31.jpg', '2019-06-10 12:48:22', 2, 1),
(7, 'Carissa Shannon', 'Doloribus nisi dolor', 'Possimus non eiusmo', 'banner-7.jpg', '2019-06-13 14:45:55', 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `candidate`
--

CREATE TABLE `candidate` (
  `id_candidate` int(11) NOT NULL,
  `nom_candidate` varchar(50) NOT NULL,
  `prenom_candidate` varchar(50) NOT NULL,
  `adresse_candidate` text NOT NULL,
  `email_candidate` varchar(255) NOT NULL,
  `id_ville` int(11) NOT NULL,
  `date_naissance` date NOT NULL,
  `telephone_candidate` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `photo_candidate` varchar(255) DEFAULT NULL,
  `cv_pdf` varchar(255) DEFAULT NULL,
  `cin` varchar(255) DEFAULT NULL,
  `situation` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `etat` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `candidate`
--

INSERT INTO `candidate` (`id_candidate`, `nom_candidate`, `prenom_candidate`, `adresse_candidate`, `email_candidate`, `id_ville`, `date_naissance`, `telephone_candidate`, `password`, `photo_candidate`, `cv_pdf`, `cin`, `situation`, `created_at`, `etat`) VALUES
(1, 'Drissi ', 'El houcine', 'N 105 Kelaat M\'gouna', 'hcnid@gmail.com', 17, '1999-01-16', '0639960034', 'aaa', 'team-img-3.png', 'cvm.pdf', 'U195399', 'Celibataire', '2020-04-09 22:26:13', 0),
(6, 'HOUCINE', 'DRiSSI', 'kelaat mgouna', 'Hcnidrissi16@gmail.com', 387, '1999-09-19', '0641824783', 'MAMA0000', '', '', '', 'Celibataire', '2019-12-07 16:52:06', 0),
(7, 'DRISSI', 'HOUCINE', 'OUHFFKEAPZOKPDOAKZDA', 'DRISSIHOUCIEN@GMAIL.COM', 30, '2020-05-19', '9454584053495', 'mamaÃ Ã Ã Ã ', NULL, NULL, NULL, NULL, '2020-05-25 14:35:43', 0),
(8, 'heoghoerg', 'iejrggre', '', 'drissihoucine1999@gmail.com', 397, '1997-02-08', '9203483240923', 'ADMIN', 'Fiche exposÃ©s _ Informaticien.jpg', 'cvm.pdf', 'PA22319313', 'Celibataire', '2020-05-31 10:24:00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subj` varchar(500) NOT NULL,
  `comnt` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id_contact`, `nom`, `email`, `subj`, `comnt`, `created_at`) VALUES
(1, 'Drissi El houcine', 'drissihoucine1999@gmail.com', 'problem', 'upload avatar', '2019-06-10 09:42:47');

-- --------------------------------------------------------

--
-- Structure de la table `experience`
--

CREATE TABLE `experience` (
  `id_experience` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `entreprise` varchar(255) NOT NULL,
  `service` text NOT NULL,
  `id_candidate` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `experience`
--

INSERT INTO `experience` (`id_experience`, `type`, `date_debut`, `date_fin`, `entreprise`, `service`, `id_candidate`, `description`) VALUES
(1, 'Stage', '2019-07-05', '2019-08-06', '', 'Informatique', 1, 'Creation de site web dynamique'),
(2, 'Stage', '2018-12-07', '2018-09-08', '', 'Informatique', 1, 'Creation site web statique'),
(3, 'Stage', '2019-10-05', '2019-10-07', '', 'informatique ', 2, 'à Rabat'),
(4, 'Mission', '2017-01-01', '2019-12-01', '', 'aaaaaaaaaaa', 4, 'zazeraze');

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `id_formation` int(11) NOT NULL,
  `diplome` int(11) NOT NULL,
  `specialite` int(11) NOT NULL,
  `date_obtention` date NOT NULL,
  `id_candidate` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`id_formation`, `diplome`, `specialite`, `date_obtention`, `id_candidate`) VALUES
(1, 6, 45, '2020-01-01', 1),
(2, 5, 38, '2017-01-01', 1),
(3, 6, 45, '2019-01-01', 2),
(4, 5, 37, '2016-01-01', 2),
(5, 2, 20, '2018-01-01', 4),
(6, 1, 11, '2018-09-01', 6);

-- --------------------------------------------------------

--
-- Structure de la table `langue`
--

CREATE TABLE `langue` (
  `id_langue` int(11) NOT NULL,
  `langue` varchar(255) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `id_candidate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `langue`
--

INSERT INTO `langue` (`id_langue`, `langue`, `degree`, `id_candidate`) VALUES
(1, 'Français', 'Bon', 1),
(2, 'Anglais', 'Notions', 1),
(3, 'Français', 'Bon', 2),
(4, 'Anglais', 'Bon', 2),
(5, 'Français', 'Bon', 4),
(6, 'Anglais', 'Moyenne', 8);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id_message` int(11) NOT NULL,
  `id_candidate` int(11) NOT NULL,
  `message` text NOT NULL,
  `date_message` date NOT NULL,
  `id_recruteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `office`
--

CREATE TABLE `office` (
  `id_office` int(11) NOT NULL,
  `office` varchar(244) NOT NULL,
  `id_candidate` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `office`
--

INSERT INTO `office` (`id_office`, `office`, `id_candidate`) VALUES
(1, 'word', 1),
(2, 'excel', 1),
(3, 'power point', 1),
(4, 'word', 2),
(5, 'excel', 2),
(6, 'power point', 2),
(7, 'word', 4),
(8, 'power point', 4),
(9, 'word', 8),
(10, 'excel', 8),
(11, 'access', 8),
(12, 'power point', 8);

-- --------------------------------------------------------

--
-- Structure de la table `offre_emploi`
--

CREATE TABLE `offre_emploi` (
  `id_offre_emploi` int(11) NOT NULL,
  `id_specialite` int(11) NOT NULL,
  `salaire` int(11) NOT NULL,
  `contrat` varchar(255) NOT NULL,
  `description_poste` text NOT NULL,
  `connaissance_technique` text NOT NULL,
  `id_ville` int(11) NOT NULL,
  `id_recruteur` int(11) NOT NULL,
  `Vacancy` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `etat` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `offre_emploi`
--

INSERT INTO `offre_emploi` (`id_offre_emploi`, `id_specialite`, `salaire`, `contrat`, `description_poste`, `connaissance_technique`, `id_ville`, `id_recruteur`, `Vacancy`, `created_at`, `etat`) VALUES
(1, 11, 5000, 'CDI', 'Comment résister à pareille offre d’emploi ? Si vous êtes celui ou celle que Majorel cherche, n’hésitez pas à nous appeler sur le +212522778484 ou déposer votre candidature sur notre site: www.majorel.ma', 'D’une formation niveau bac ou plus,\r\nD’une expérience en service client est souhaitable', 171, 1, 'Freelance', '2019-06-02 10:20:57', 0),
(2, 11, 9000, 'CDD', 'CRIT Maroc, Filiale du Groupe CRIT, l\'un des leaders du travail temporaire et du recrutement en France et à l\'international.\r\n\r\nLe groupe CRIT compte aujourd’hui 600 agences dans le monde (France, Espagne, Suisse, Portugal, Irlande, Angleterre, USA, Afrique) dont 12 au Maroc (Casablanca, Rabat, Kenitra, EL Jadida, Berrechid, Marrakech, Agadir, Tanger…).\r\n\r\nCRIT Maroc est un acteur global en ressources humaines, un cabinet de recrutement et d’intérim de renom sur le marché. Notre engagement est de déléguer la juste compétence, apporter des solutions efficaces, rapides, souples et transparentes dans la gestion des ressources humaines.', 'De formation Bac+5 en informatique', 1, 2, 'Full Time', '2019-06-09 10:34:02', 1),
(3, 54, 2000, 'CTT', 'EEEEEEEEEEEEEEEEEEE', 'AAAAAAAAAAAA', 252, 3, 'Part Time', '2019-06-07 13:03:42', 1),
(4, 53, 12000, 'CDI', '??????????????', '??????????????', 20, 2, 'Freelance', '2019-06-10 17:38:59', 1),
(5, 27, 12300, 'CDD', 'eeeeeeee', 'eeeeeeee', 20, 2, 'Full Time', '2019-06-10 17:41:08', 1),
(6, 55, 2000, 'CDI', 'rrrrrrrrrrrrrrrrrrrr', 'rrrrrrrrrrrrrr', 17, 1, 'Freelance', '2019-06-10 17:42:57', 1),
(7, 22, 3000, 'CTT', 'comptabilité', 'comptabilité', 155, 1, 'Part Time', '2019-06-10 17:44:13', 1),
(8, 51, 40000, 'CTT', 'Desingner', 'Desingner', 79, 3, 'Internship', '2019-06-10 17:46:43', 1),
(9, 53, 1500, 'CUI', 'Media Manager', 'Media Manager', 103, 3, 'Internship', '2019-06-10 17:48:23', 1),
(10, 26, 3000, 'CTT', 'Formation', 'Formation', 174, 1, 'Part Time', '2019-06-10 17:50:28', 1),
(11, 30, 4000, 'CDD', 'Pêche', 'Pêche', 392, 2, 'Full Time', '2019-06-10 17:53:13', 1),
(12, 18, 32000, 'CDD', 'Banque', 'Banque', 4, 3, 'Full Time', '2019-06-10 17:54:54', 1),
(13, 27, 1200, 'CTT', 'Navugation maritime', 'Navugation maritime', 4, 2, 'Full Time', '2019-06-10 17:57:41', 1),
(14, 29, 123124, 'CDI', 'dsfsdf', 'sfsdf', 18, 4, 'Freelance', '2019-06-11 12:35:21', 0);

-- --------------------------------------------------------

--
-- Structure de la table `permis`
--

CREATE TABLE `permis` (
  `id_permis` int(11) NOT NULL,
  `permis` varchar(255) NOT NULL,
  `id_candidate` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `permis`
--

INSERT INTO `permis` (`id_permis`, `permis`, `id_candidate`) VALUES
(1, 'A', 1),
(2, 'A', 4),
(3, 'A', 8),
(4, 'B', 8),
(5, 'D', 8);

-- --------------------------------------------------------

--
-- Structure de la table `postulation`
--

CREATE TABLE `postulation` (
  `id_postulation` int(11) NOT NULL,
  `date_postulation` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_offre_emploi` int(11) NOT NULL,
  `id_candidate` int(11) NOT NULL,
  `etat` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `postulation`
--

INSERT INTO `postulation` (`id_postulation`, `date_postulation`, `id_offre_emploi`, `id_candidate`, `etat`) VALUES
(1, '2019-06-10 13:12:49', 2, 1, 0),
(2, '2019-06-10 13:13:51', 3, 1, 0),
(3, '2019-06-14 10:48:24', 2, 1, 0),
(4, '2019-06-14 10:51:27', 2, 1, 0),
(5, '2019-06-14 10:52:39', 14, 1, 0),
(6, '2019-06-14 10:55:39', 14, 2, 0),
(7, '2019-06-14 10:56:44', 14, 5, 0),
(8, '2020-05-31 11:12:42', 1, 8, 0),
(9, '2020-07-09 16:35:30', 1, 1, 0),
(10, '2020-07-09 16:44:05', 1, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `recruteur`
--

CREATE TABLE `recruteur` (
  `id_recruteur` int(11) NOT NULL,
  `nom_recruteur` varchar(50) NOT NULL,
  `secteur_recruteur` text NOT NULL,
  `raison_social` text NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `description_societe` text NOT NULL,
  `email_contact` varchar(255) NOT NULL,
  `adresse_recruteur` varchar(255) NOT NULL,
  `id_ville` int(11) NOT NULL,
  `password` text NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `etat` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `recruteur`
--

INSERT INTO `recruteur` (`id_recruteur`, `nom_recruteur`, `secteur_recruteur`, `raison_social`, `telephone`, `url`, `description_societe`, `email_contact`, `adresse_recruteur`, `id_ville`, `password`, `logo`, `etat`, `created_at`) VALUES
(1, 'Abdelhamid Rachidi', ' Centre d\'appel ', 'sarl', '22222', 'www.majorel.com', 'Nous sommes Majorel, nouvel acteur mondial né de la concrétisation', 'aaa@gmail.com', 'casabblanca', 4, 'aaa', 'campany1.png', 0, '2019-06-10 10:16:54'),
(2, ' Groupe CRIT', 'Informatique ', 'CRIT Maroc', '06634346456', 'www.CRIT .ma', 'Installer et mettre en service des systèmes de réseaux informatiques et de télécommunications en suivant les procédures établies dans le cahier des charges (raccordement de tous les appareils informatiques et téléphoniques avec le réseau externe, implantation des logiciels…),\r\nAider et conseiller les utilisateurs lors de la mise en fonctionnement des systèmes,\r\nRéaliser la maintenance préventive, effectuer la mise à jour des équipements,\r\nContribuer à faire évoluer le réseau selon les besoins,\r\nIntervenir en cas de panne, diagnostiquer et résoudre les dysfonctionnements,\r\nCommander du matériel, des câbles ou des appareils dans le cadre d’une réparation ou d’un renouvellement du système,', 'zzz@gmail.com', ' Rabat et région ', 4, 'zzz', 'logo.jpg', 0, '2019-06-10 10:27:29'),
(3, 'asima', 'aaa', 'asima', '0623434233', 'www.asima.ma', 'aaaaaaaaaaaaaaaaa', 'asima@gmail.com', 'Errachidia', 29, 'asima', 'campany3.png', 0, '2019-06-10 12:51:29'),
(4, 'Abdelhamid Rachidi', 'Centre d\'appel ', 'google', '03454562342', 'http://www.google.com', 'rabat', 'google@gmail.com', 'errachidia', 171, 'google', 'googlelogo_color_272x92dp.png', 1, '2019-06-11 11:16:50');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id_post`);

--
-- Index pour la table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`id_candidate`),
  ADD UNIQUE KEY `email_candidate` (`email_candidate`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Index pour la table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id_experience`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`id_formation`);

--
-- Index pour la table `langue`
--
ALTER TABLE `langue`
  ADD PRIMARY KEY (`id_langue`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_message`);

--
-- Index pour la table `office`
--
ALTER TABLE `office`
  ADD PRIMARY KEY (`id_office`);

--
-- Index pour la table `offre_emploi`
--
ALTER TABLE `offre_emploi`
  ADD PRIMARY KEY (`id_offre_emploi`);

--
-- Index pour la table `permis`
--
ALTER TABLE `permis`
  ADD PRIMARY KEY (`id_permis`);

--
-- Index pour la table `postulation`
--
ALTER TABLE `postulation`
  ADD PRIMARY KEY (`id_postulation`);

--
-- Index pour la table `recruteur`
--
ALTER TABLE `recruteur`
  ADD PRIMARY KEY (`id_recruteur`),
  ADD UNIQUE KEY `email_contact` (`email_contact`),
  ADD UNIQUE KEY `url` (`url`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `blog`
--
ALTER TABLE `blog`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `id_candidate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `experience`
--
ALTER TABLE `experience`
  MODIFY `id_experience` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `id_formation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `langue`
--
ALTER TABLE `langue`
  MODIFY `id_langue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `office`
--
ALTER TABLE `office`
  MODIFY `id_office` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `offre_emploi`
--
ALTER TABLE `offre_emploi`
  MODIFY `id_offre_emploi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `permis`
--
ALTER TABLE `permis`
  MODIFY `id_permis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `postulation`
--
ALTER TABLE `postulation`
  MODIFY `id_postulation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `recruteur`
--
ALTER TABLE `recruteur`
  MODIFY `id_recruteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

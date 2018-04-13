-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 13 Avril 2018 à 09:00
-- Version du serveur :  5.6.21
-- Version de PHP :  5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `newone`
--

-- --------------------------------------------------------

--
-- Structure de la table `children`
--

CREATE TABLE IF NOT EXISTS `children` (
`idChildren` int(11) NOT NULL,
  `surname` varchar(60) NOT NULL,
  `firstname` varchar(60) NOT NULL,
  `img` text NOT NULL,
  `birthdate` date NOT NULL,
  `gender` int(11) NOT NULL,
  `parent1` varchar(60) NOT NULL,
  `parent2` varchar(60) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `children`
--

INSERT INTO `children` (`idChildren`, `surname`, `firstname`, `img`, `birthdate`, `gender`, `parent1`, `parent2`) VALUES
(1, 'Sadot', 'Léa', 'app/Public/uploads/lea.jpg', '2011-10-12', 0, 'Florent', 'Adèle'),
(2, 'Sadot', 'Anna', 'app/Public/uploads/anna.jpg', '2013-11-18', 0, 'Florent', 'Adèle'),
(3, 'Deschiens', 'Eugene', 'app/Public/uploads/pic.jpg', '2018-04-02', 0, 'Paloma', NULL),
(21, 'Sadot', 'Raphaël', 'app/Public/uploads/pic.jpg', '2004-06-05', 0, 'Nicolas Sadot', 'Manon François'),
(22, 'Navarro', 'Pierre', 'app/Public/uploads/pic.jpg', '2006-12-07', 0, 'Emmanuelle Navarro', 'Mathieu Navarro'),
(24, 'Sadot', 'Nino', '', '2015-02-14', 0, 'Aurélien', 'Camille');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
`idComment` int(11) NOT NULL,
  `content` text,
  `comment_date` date NOT NULL,
  `idMember` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `idContact` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `msg` text,
  `idMember` int(11) DEFAULT NULL,
  `mailContact` varchar(255) DEFAULT NULL,
  `nameContact` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `define`
--

CREATE TABLE IF NOT EXISTS `define` (
  `idHealth` int(11) NOT NULL,
  `idMember` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `define`
--

INSERT INTO `define` (`idHealth`, `idMember`) VALUES
(1, 5),
(3, 32),
(5, 32);

-- --------------------------------------------------------

--
-- Structure de la table `defineaussi`
--

CREATE TABLE IF NOT EXISTS `defineaussi` (
  `idMember` int(11) NOT NULL,
  `idMeal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `defineaussi`
--

INSERT INTO `defineaussi` (`idMember`, `idMeal`) VALUES
(1, 1),
(32, 1),
(1, 2),
(32, 2),
(5, 3);

-- --------------------------------------------------------

--
-- Structure de la table `family`
--

CREATE TABLE IF NOT EXISTS `family` (
`idFamily` int(11) NOT NULL,
  `familyName` varchar(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `family`
--

INSERT INTO `family` (`idFamily`, `familyName`) VALUES
(1, 'Sadot'),
(2, 'Deschiens');

-- --------------------------------------------------------

--
-- Structure de la table `family_children`
--

CREATE TABLE IF NOT EXISTS `family_children` (
  `idFamily` int(11) NOT NULL,
  `idChildren` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `family_children`
--

INSERT INTO `family_children` (`idFamily`, `idChildren`) VALUES
(1, 1),
(1, 2),
(1, 21),
(1, 22);

-- --------------------------------------------------------

--
-- Structure de la table `health`
--

CREATE TABLE IF NOT EXISTS `health` (
`idHealth` int(11) NOT NULL,
  `meds` text,
  `allergies` text,
  `idChildren` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `health`
--

INSERT INTO `health` (`idHealth`, `meds`, `allergies`, `idChildren`) VALUES
(1, 'xanax 3/jour', 'Aucune allergie connue', 3),
(3, 'Aucun traitement en cours', 'blablabla', 1),
(5, 'Aucun traitement en cours', 'Aucune allergie connue', 2),
(9, 'Aucun traitement en cours', 'Les devoirs scolaires', 21),
(10, 'Aucun traitement en cours', 'Aucune allergie connue', 22),
(12, '', '', 24);

-- --------------------------------------------------------

--
-- Structure de la table `meals`
--

CREATE TABLE IF NOT EXISTS `meals` (
`idMeal` int(11) NOT NULL,
  `favorite_meal` text,
  `hated_meal` text,
  `idChildren` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `meals`
--

INSERT INTO `meals` (`idMeal`, `favorite_meal`, `hated_meal`, `idChildren`) VALUES
(1, 'chocolat\r\nbrocolis\r\npoisson', 'haricots verts\r\n', 1),
(2, 'fraises\r\nchocolat\r\nbonbons', 'banane', 2),
(3, 'glaces', 'légumes', 3),
(10, 'Viandes', 'Légumes', 21),
(11, 'Glaces', 'Haricots verts', 22),
(13, '', '', 24);

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
`idMember` int(11) NOT NULL,
  `surname` varchar(60) NOT NULL,
  `firstname` varchar(60) NOT NULL,
  `img` text NOT NULL,
  `pass` varchar(60) NOT NULL,
  `mail` varchar(60) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `city` varchar(60) DEFAULT NULL,
  `gender` int(11) NOT NULL,
  `parenthood` varchar(60) NOT NULL,
  `modo` varchar(25) DEFAULT NULL,
  `registrationDate` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `members`
--

INSERT INTO `members` (`idMember`, `surname`, `firstname`, `img`, `pass`, `mail`, `birthdate`, `city`, `gender`, `parenthood`, `modo`, `registrationDate`) VALUES
(1, '', 'Florent', '', '', '', NULL, NULL, 0, '', NULL, '0000-00-00'),
(5, '', 'Paloma', '', '', '', NULL, NULL, 0, '', NULL, '0000-00-00'),
(6, '', 'roberto', '', '', '', NULL, NULL, 0, '', NULL, '0000-00-00'),
(10, 'Sadot', 'Nicolas', '', '$2y$10$G8d3XXjO.2bh54F0G3qSguKVvwjnkn7Q8TMnpjvNpqvYuv/ut82j6', 'gogol@gmail.com', NULL, NULL, 0, '', NULL, '2018-04-05'),
(13, 'Navarro', 'Emmanuelle', '', '$2y$10$RWOXftRH6spRpwEq.75pjOotPdHFTrZESY98Skw2E2H5bJbJdxOrS', 'gogol@gmail.com', NULL, NULL, 0, '', NULL, '2018-04-05'),
(14, 'Sadot', 'Aurélien', '', '$2y$10$mMDVTsDr84q/t8kDI23osekxJTZBCmfEoBnYvgNWIcjawYB3dPwKC', 'gogol@gmail.com', NULL, NULL, 0, '1', '0', '2018-04-08'),
(18, 'Ricard', 'Alexis', '', '$2y$10$j58ttzJsH3UKoJE9HV8dVebcHvR1bWL7g.ILKvfymp0.6fv7LVWwK', 'gogol@gmail.com', NULL, NULL, 0, '1', '0', '2018-04-10'),
(32, 'Sadot', 'Florent', 'app/Public/uploads/avatarMan.png', '$2y$10$RXDRFRiRaoWnfZzQ8QW2Mu8i/BVoibBDCWEsTkiS9y2Al9V.zFGNW', 'fsadot@free.fr', NULL, NULL, 0, '1', '0', '2018-04-10'),
(33, 'Sadot', 'Rose-Marie', 'app/Public/uploads/avatarGrandMa.png', '$2y$10$FCnxGZVIvmNouPJx2s.LnOCiMsiuz0EUPnGPbioXRM6JWUEZx320y', 'gogol@gmail.com', NULL, NULL, 1, '0', '0', '2018-04-11'),
(34, 'Navarro', 'Mattieu', 'app/Public/uploads/avatarMan.png', '$2y$10$tRaYmc8JEAtNuqfA.DGVZ.iul.TVc3otaxGoMtqbX6qrB6RDzkik2', 'gogol@gmail.com', NULL, NULL, 0, '1', '0', '2018-04-11'),
(36, 'Vautier', 'Adèle', 'app/Public/uploads/avatarWoman.png', '$2y$10$0cvw12Ozj.klG2MtwUvTmuqACmKEZUUkV/pz85ssRdPYXW/J78ogS', 'adelevautier@hotmail.fr', NULL, NULL, 1, '1', '0', '2018-04-12');

-- --------------------------------------------------------

--
-- Structure de la table `member_children`
--

CREATE TABLE IF NOT EXISTS `member_children` (
  `idMember` int(11) NOT NULL,
  `idChildren` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `member_children`
--

INSERT INTO `member_children` (`idMember`, `idChildren`) VALUES
(1, 1),
(32, 1),
(36, 1),
(1, 2),
(32, 2),
(36, 2),
(5, 3),
(10, 21),
(13, 22);

-- --------------------------------------------------------

--
-- Structure de la table `member_family`
--

CREATE TABLE IF NOT EXISTS `member_family` (
  `idMember` int(11) NOT NULL,
  `idFamily` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `member_family`
--

INSERT INTO `member_family` (`idMember`, `idFamily`) VALUES
(1, 1),
(32, 1),
(5, 2);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
`idPost` int(11) NOT NULL,
  `content` text,
  `image` text,
  `title` varchar(255) DEFAULT NULL,
  `postDate` date NOT NULL,
  `idComment` int(11) NOT NULL,
  `idMember` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `children`
--
ALTER TABLE `children`
 ADD PRIMARY KEY (`idChildren`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`idComment`), ADD KEY `FK_Comments_idMember` (`idMember`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
 ADD PRIMARY KEY (`idContact`);

--
-- Index pour la table `define`
--
ALTER TABLE `define`
 ADD PRIMARY KEY (`idHealth`,`idMember`), ADD KEY `FK_Define_idMember` (`idMember`);

--
-- Index pour la table `defineaussi`
--
ALTER TABLE `defineaussi`
 ADD PRIMARY KEY (`idMember`,`idMeal`), ADD KEY `FK_DefineAussi_idMeal` (`idMeal`);

--
-- Index pour la table `family`
--
ALTER TABLE `family`
 ADD PRIMARY KEY (`idFamily`);

--
-- Index pour la table `family_children`
--
ALTER TABLE `family_children`
 ADD PRIMARY KEY (`idFamily`,`idChildren`), ADD KEY `FK_Appart_idChildren` (`idChildren`);

--
-- Index pour la table `health`
--
ALTER TABLE `health`
 ADD PRIMARY KEY (`idHealth`), ADD KEY `FK_Health_idChildren` (`idChildren`);

--
-- Index pour la table `meals`
--
ALTER TABLE `meals`
 ADD PRIMARY KEY (`idMeal`), ADD KEY `FK_Meals_idChildren` (`idChildren`);

--
-- Index pour la table `members`
--
ALTER TABLE `members`
 ADD PRIMARY KEY (`idMember`);

--
-- Index pour la table `member_children`
--
ALTER TABLE `member_children`
 ADD PRIMARY KEY (`idMember`,`idChildren`), ADD KEY `FK_Creer_idChildren` (`idChildren`);

--
-- Index pour la table `member_family`
--
ALTER TABLE `member_family`
 ADD PRIMARY KEY (`idMember`,`idFamily`), ADD KEY `FK_Build_idFamily` (`idFamily`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
 ADD PRIMARY KEY (`idPost`), ADD KEY `FK_Posts_idComment` (`idComment`), ADD KEY `FK_Posts_idMember` (`idMember`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `children`
--
ALTER TABLE `children`
MODIFY `idChildren` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
MODIFY `idComment` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `family`
--
ALTER TABLE `family`
MODIFY `idFamily` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `health`
--
ALTER TABLE `health`
MODIFY `idHealth` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `meals`
--
ALTER TABLE `meals`
MODIFY `idMeal` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `members`
--
ALTER TABLE `members`
MODIFY `idMember` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
MODIFY `idPost` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
ADD CONSTRAINT `FK_Comments_idMember` FOREIGN KEY (`idMember`) REFERENCES `members` (`idMember`);

--
-- Contraintes pour la table `define`
--
ALTER TABLE `define`
ADD CONSTRAINT `FK_Define_idHealth` FOREIGN KEY (`idHealth`) REFERENCES `health` (`idHealth`) ON DELETE CASCADE,
ADD CONSTRAINT `FK_Define_idMember` FOREIGN KEY (`idMember`) REFERENCES `members` (`idMember`) ON DELETE CASCADE;

--
-- Contraintes pour la table `defineaussi`
--
ALTER TABLE `defineaussi`
ADD CONSTRAINT `FK_DefineAussi_idMeal` FOREIGN KEY (`idMeal`) REFERENCES `meals` (`idMeal`) ON DELETE CASCADE,
ADD CONSTRAINT `FK_DefineAussi_idMember` FOREIGN KEY (`idMember`) REFERENCES `members` (`idMember`) ON DELETE CASCADE;

--
-- Contraintes pour la table `family_children`
--
ALTER TABLE `family_children`
ADD CONSTRAINT `FK_Appart_idChildren` FOREIGN KEY (`idChildren`) REFERENCES `children` (`idChildren`) ON DELETE CASCADE,
ADD CONSTRAINT `FK_Appart_idFamily` FOREIGN KEY (`idFamily`) REFERENCES `family` (`idFamily`) ON DELETE CASCADE;

--
-- Contraintes pour la table `health`
--
ALTER TABLE `health`
ADD CONSTRAINT `FK_Health_idChildren` FOREIGN KEY (`idChildren`) REFERENCES `children` (`idChildren`) ON DELETE CASCADE;

--
-- Contraintes pour la table `meals`
--
ALTER TABLE `meals`
ADD CONSTRAINT `FK_Meals_idChildren` FOREIGN KEY (`idChildren`) REFERENCES `children` (`idChildren`) ON DELETE CASCADE;

--
-- Contraintes pour la table `member_children`
--
ALTER TABLE `member_children`
ADD CONSTRAINT `FK_Creer_idChildren` FOREIGN KEY (`idChildren`) REFERENCES `children` (`idChildren`) ON DELETE CASCADE,
ADD CONSTRAINT `FK_Creer_idMember` FOREIGN KEY (`idMember`) REFERENCES `members` (`idMember`);

--
-- Contraintes pour la table `member_family`
--
ALTER TABLE `member_family`
ADD CONSTRAINT `FK_Build_idFamily` FOREIGN KEY (`idFamily`) REFERENCES `family` (`idFamily`) ON DELETE CASCADE,
ADD CONSTRAINT `FK_Build_idMember` FOREIGN KEY (`idMember`) REFERENCES `members` (`idMember`) ON DELETE CASCADE;

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
ADD CONSTRAINT `FK_Posts_idComment` FOREIGN KEY (`idComment`) REFERENCES `comments` (`idComment`),
ADD CONSTRAINT `FK_Posts_idMember` FOREIGN KEY (`idMember`) REFERENCES `members` (`idMember`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

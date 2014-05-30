-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 30 Mai 2014 à 18:13
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `mydietfit_bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `avisexercice`
--

CREATE TABLE IF NOT EXISTS `avisexercice` (
  `idAvisExercice` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `note` int(11) unsigned NOT NULL DEFAULT '0',
  `description` varchar(200) NOT NULL DEFAULT '',
  `idUtilisateur` int(11) unsigned NOT NULL DEFAULT '0',
  `idFicheExercice` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`idAvisExercice`),
  KEY `FK_avisExercice_1` (`idUtilisateur`),
  KEY `FK_avisExercice_2` (`idFicheExercice`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `avisnutrition`
--

CREATE TABLE IF NOT EXISTS `avisnutrition` (
  `idAvisConseil` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `note` int(11) unsigned NOT NULL DEFAULT '0',
  `description` varchar(500) NOT NULL DEFAULT '',
  `idUtilisateur` int(11) unsigned NOT NULL DEFAULT '0',
  `idFicheNutrition` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`idAvisConseil`),
  KEY `FK_avis_1` (`idUtilisateur`),
  KEY `FK_avis_2` (`idFicheNutrition`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `ficheexercice`
--

CREATE TABLE IF NOT EXISTS `ficheexercice` (
  `idFicheExercice` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(5000) NOT NULL DEFAULT '',
  `dateAjout` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `titre` varchar(45) NOT NULL DEFAULT '',
  `resume` varchar(1000) NOT NULL DEFAULT '',
  PRIMARY KEY (`idFicheExercice`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `ficheexercice`
--

INSERT INTO `ficheexercice` (`idFicheExercice`, `description`, `dateAjout`, `titre`, `resume`) VALUES
(1, 'Le crunch à la poulie haute pour les obliques est essentiel pour le développement des abdominaux. Attention tout de même, comme le précise cet article pour avoir une taille fine, les lourdes charges sont à proscrire pour ne pas épaissir la taille. En revanche, pour tous les athlètes qui doivent tenir des charges lourdes au-dessus de la tête ont besoin d''abdominaux puissants afin d''assurer la stabilisation du centre corporel. Dans ce cas, n''hésitez pas à augmenter la charge pour développer un maximum de force. \r\n- Fixez la corde à l’extrémité du câble relié à la poulie haute, tenez-la fermement des deux mains et agenouillez-vous à environ 60 cm devant les contrepoids.\r\n    - Descendez les mains le long de la tête, près des oreilles, les coudes fléchis. Dans cette position de départ, le buste penché en avant avec les genoux et les hanches à environ 90° : le câble devrait être bien tendu.\r\n    - Expirez en tirant contre la résistance et faites une flexion du rachis en contractant les abdominaux. À mesure que vous arrondissez le dos, pivotez le buste pour amener un coude vers le genou opposé.\r\n    - En arrivant à la position basse, videz énergétiquement vos poumons et maintenez la position un instant en contractant les abdos et les obliques.\r\n    - En inspirant, revenez lentement à la position de départ. Refaites l''exercice de l''autre côté.\r\n    - Pensez à garder la même position des mains et des coudes pendant tout l''exercice.\r\n    - Les hanches doivent rester à la verticale des genoux. Si l''on s''assied sur les mollets, on diminue l''amplitude du mouvement et les abdominaux ne sont plus en tension.\r\n Le groupe des muscles de l''abdomen comprend le grand droit, le grand oblique et le petit oblique. Long et mince, le grand droit descend verticalement le long de la paroi abdominale; il naît sur les 5, 6 et 7 côtes sur l''appendice xiphoïde du sternum et se termine plus bas sur le pubis. Les moitiés droite et gauche sont séparées par la ligne blanche, long tendon coupé d''intersections tendineuses qui forment les rainures transversales généralement visibles quand l''abdomen est "écorché".\r\nAllant du grand droit jusqu''aux dorsaux, le grand oblique recouvre les côtés et l''avant de l''abdomen. Les fibres sont disposées en diagonale depuis leurs insertions inférieures des deux côtés de l''abdomen et forme la lettre "V". Le petit oblique est logé directement sous le grand oblique. Dans sa partie haute, ses fibres sont presque perpendiculaires à celles du grand obliques et forment un "V" à l''envers. Dans sa partie basse, près du pubis, les fibres sont presque horizontales. ', '2014-04-10 00:00:00', '', ''),
(3, 'Moderniser un classique peut donner des résultats mitigés : ainsi, certains termes hybrides qu''on a inventés n''ont pas toujours eu le succès qui caractérise les modifications du rowing, mouvement de base du bodybuilding dans l''entraînement du dos. Le rowing buste penché avec haltères illustre bien un tel succès. Mais nous ne parlons pas ici de ce bon vieux tirage d''un bras avec une jambe sur le banc. Cette fois, il s''agit d''un tirage des deux bras, buste penché, avec rotation. \r\n- Les bras tendus et les coudes pointés vers l''extérieur, maintenez une paire d''haltères devant vos cuisses, les avant-bras en position neutre ou pronation (paume face à vous), les pieds juste à l''intérieur de la largeur des épaules, le menton un peu relevé et les genoux légèrement fléchis.\r\n- Penchez-vous en avant à partir des hanches jusqu''à ce que votre buste soit légèrement au-dessus de l''horizontale, les bras perpendiculaires au sol et le tête relevée. Remarque : pour réduire les contraintes au niveau du dos, fléchissez vos genoux dans une position confortable.\r\n- En maintenant la cambrure naturelle de votre colonne vertébrale, commencez le mouvement en serrant vos omoplates l''une contre l''autre et vers le bas.\r\n- Dès que la rétractation des omoplates est complète, continuez à tirer les haltères en tournant vos paumes vers l''avant et en amenant les coudes contre le corps et en arrière. Ces mouvements devront être fluides et sans à-coups.\r\n- Maintenez un instant la position en haut avant de redescendre lentement les charges en les contrôlant tout en inversant la rotation des mains.\r\n- Inspirez entre les répétitions ou pendant la partie négative et expirez une fois que vous avez passé le point délicat du mouvement.\r\n- Faites le nombre nécessaire de reps pour terminer votre série.\r\nCet exercice sollicite les muscles grands dorsaux, le grand rond, les rhomboïdes et le faisceau moyen du trapèze.', '2014-04-10 00:00:00', '', ''),
(4, '', '0000-00-00 00:00:00', 'Curl haltère au banc', 'Cette version du curl sur un banc vous permet de vous concentrer sur le travail d''un seul biceps. Cela vous apportera davantage l''intensité sur un biceps à la fois.');

-- --------------------------------------------------------

--
-- Structure de la table `fichenutrition`
--

CREATE TABLE IF NOT EXISTS `fichenutrition` (
  `idFicheNutrition` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `dateAjout` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `contenu` varchar(2000) NOT NULL DEFAULT '',
  PRIMARY KEY (`idFicheNutrition`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `partiecorps`
--

CREATE TABLE IF NOT EXISTS `partiecorps` (
  `idPartieCorps` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `libelle` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`idPartieCorps`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `partiecorps`
--

INSERT INTO `partiecorps` (`idPartieCorps`, `libelle`) VALUES
(1, 'Abdominaux'),
(2, 'Dos'),
(3, 'Pectoraux'),
(4, 'Biceps'),
(5, 'Triceps'),
(6, 'Epaules');

-- --------------------------------------------------------

--
-- Structure de la table `programme`
--

CREATE TABLE IF NOT EXISTS `programme` (
  `idProgramme` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `niveau` varchar(45) NOT NULL DEFAULT '',
  `idPartieCorps` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idProgramme`),
  KEY `idPartieCorps` (`idPartieCorps`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `programme`
--

INSERT INTO `programme` (`idProgramme`, `niveau`, `idPartieCorps`) VALUES
(1, 'Débutant', 4);

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE IF NOT EXISTS `salle` (
  `idSalle` int(11) NOT NULL AUTO_INCREMENT,
  `nomSalle` varchar(100) NOT NULL,
  `adresse` varchar(200) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `idTypeSalle` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idSalle`),
  KEY `FK_salle_1` (`idTypeSalle`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `salle`
--

INSERT INTO `salle` (`idSalle`, `nomSalle`, `adresse`, `latitude`, `longitude`, `idTypeSalle`) VALUES
(1, 'IT GYM', '3 Avenue Georges Clemenceau, Villepinte, France', 48.960307, 2.557797, 3),
(2, 'Moving Saint-Denis', '35 Boulevard Carnot, Saint-Denis, France', 48.93794631958008, 2.3509109020233154, 3),
(3, 'Piscine Auguste-Delaune', '72 Avenue Gilbert Berger, Tremblay-en-France, France', 48.949966, 2.578491, 1),
(4, 'Piscine Municipale Leclerc', '49 Avenue du Général Leclerc, Pantin, France', 48.897188, 2.403675, 1),
(5, 'Gymnase Jean Moulin', '18 Avenue Jean Moulin, 93100 Montreuil, France', 48.85877990722656, 2.450629234313965, 2),
(6, 'Piscine Paul Valeyre', '24 Rue de Rochechouart, Paris, France', 48.877707, 2.345438, 1),
(7, 'Centre Nautique Jacques Brel', '20 Rue Auguste Delaune, 93000 Bobigny, France', 48.907212, 2.46271, 1),
(8, 'Complexe Schwendi Schöneburg', 'Rue Pierre Audat, 93420 Villepinte, France', 48.959639, 2.545219, 1);

-- --------------------------------------------------------

--
-- Structure de la table `suivi`
--

CREATE TABLE IF NOT EXISTS `suivi` (
  `idSuivi` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `poids` float NOT NULL DEFAULT '0',
  `taille` int(11) unsigned NOT NULL DEFAULT '0',
  `evenement` varchar(200) DEFAULT NULL,
  `idUtilisateur` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`idSuivi`),
  KEY `FK_suivi_1` (`idUtilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `suivi`
--

INSERT INTO `suivi` (`idSuivi`, `date`, `poids`, `taille`, `evenement`, `idUtilisateur`) VALUES
(1, '2014-04-01 00:00:00', 78, 180, '1h30 de sport', 1),
(2, '2014-04-03 00:00:00', 77.8, 180, 'Jecommence l''entrainement.', 1);

-- --------------------------------------------------------

--
-- Structure de la table `typesalle`
--

CREATE TABLE IF NOT EXISTS `typesalle` (
  `idTypeSalle` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `libelleTypeSalle` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`idTypeSalle`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `typesalle`
--

INSERT INTO `typesalle` (`idTypeSalle`, `libelleTypeSalle`) VALUES
(1, 'Piscine'),
(2, 'Gymnase'),
(3, 'Salle de musculation');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `idUtilisateur` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(45) NOT NULL DEFAULT '',
  `mdp` varchar(45) NOT NULL DEFAULT '',
  `prenom` varchar(45) NOT NULL DEFAULT '',
  `nom` varchar(45) NOT NULL DEFAULT '',
  `telephone` char(10) NOT NULL DEFAULT '',
  `mail` varchar(45) NOT NULL DEFAULT '',
  `adresse` varchar(100) NOT NULL DEFAULT '',
  `dateInscription` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idUtilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`idUtilisateur`, `login`, `mdp`, `prenom`, `nom`, `telephone`, `mail`, `adresse`, `dateInscription`) VALUES
(1, 'admin', 'admin', 'Admin', 'admin', '', '', '', '0000-00-00 00:00:00'),
(2, 'test', 'test', '', '', '', '', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `x_exercice_partiecorps`
--

CREATE TABLE IF NOT EXISTS `x_exercice_partiecorps` (
  `idFicheExercice` int(10) unsigned NOT NULL DEFAULT '0',
  `idPartieCorps` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`idFicheExercice`,`idPartieCorps`),
  KEY `FK_x_exercice_partiecorps_2` (`idPartieCorps`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `x_exercice_partiecorps`
--

INSERT INTO `x_exercice_partiecorps` (`idFicheExercice`, `idPartieCorps`) VALUES
(1, 1),
(3, 2),
(4, 4);

-- --------------------------------------------------------

--
-- Structure de la table `x_programme_exercice`
--

CREATE TABLE IF NOT EXISTS `x_programme_exercice` (
  `idProgramme` int(10) unsigned NOT NULL DEFAULT '0',
  `idFicheExercice` int(11) unsigned NOT NULL DEFAULT '0',
  `serie` int(11) unsigned NOT NULL DEFAULT '0',
  `repetition` int(11) unsigned NOT NULL DEFAULT '0',
  `repos` int(11) unsigned NOT NULL DEFAULT '0',
  `ordre` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`idProgramme`,`idFicheExercice`),
  KEY `FK_x_programme_exercice_2` (`idFicheExercice`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `x_programme_exercice`
--

INSERT INTO `x_programme_exercice` (`idProgramme`, `idFicheExercice`, `serie`, `repetition`, `repos`, `ordre`) VALUES
(1, 1, 3, 10, 90, 1),
(1, 3, 3, 10, 90, 2);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `avisnutrition`
--
ALTER TABLE `avisnutrition`
  ADD CONSTRAINT `FK_avisnutrition_1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateurs` (`idUtilisateur`),
  ADD CONSTRAINT `FK_avisnutrition_2` FOREIGN KEY (`idFicheNutrition`) REFERENCES `fichenutrition` (`idFicheNutrition`);

--
-- Contraintes pour la table `programme`
--
ALTER TABLE `programme`
  ADD CONSTRAINT `programme_ibfk_1` FOREIGN KEY (`idPartieCorps`) REFERENCES `partiecorps` (`idPartieCorps`);

--
-- Contraintes pour la table `salle`
--
ALTER TABLE `salle`
  ADD CONSTRAINT `FK_salle_1` FOREIGN KEY (`idTypeSalle`) REFERENCES `typesalle` (`idTypeSalle`);

--
-- Contraintes pour la table `suivi`
--
ALTER TABLE `suivi`
  ADD CONSTRAINT `FK_suivi_1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateurs` (`idUtilisateur`);

--
-- Contraintes pour la table `x_exercice_partiecorps`
--
ALTER TABLE `x_exercice_partiecorps`
  ADD CONSTRAINT `FK_x_exercice_partiecorps_1` FOREIGN KEY (`idFicheExercice`) REFERENCES `ficheexercice` (`idFicheExercice`),
  ADD CONSTRAINT `FK_x_exercice_partiecorps_2` FOREIGN KEY (`idPartieCorps`) REFERENCES `partiecorps` (`idPartieCorps`);

--
-- Contraintes pour la table `x_programme_exercice`
--
ALTER TABLE `x_programme_exercice`
  ADD CONSTRAINT `FK_x_programme_exercice_1` FOREIGN KEY (`idProgramme`) REFERENCES `programme` (`idProgramme`),
  ADD CONSTRAINT `FK_x_programme_exercice_2` FOREIGN KEY (`idFicheExercice`) REFERENCES `ficheexercice` (`idFicheExercice`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

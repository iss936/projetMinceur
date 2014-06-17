-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 17 Juin 2014 à 14:06
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
  `idPartieCorps` int(10) unsigned DEFAULT NULL,
  `video` varchar(1000) NOT NULL DEFAULT '',
  `image1` varchar(100) NOT NULL DEFAULT '',
  `image2` varchar(100) NOT NULL DEFAULT '',
  `image3` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`idFicheExercice`),
  KEY `FK_ficheexercice_1` (`idPartieCorps`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `ficheexercice`
--

INSERT INTO `ficheexercice` (`idFicheExercice`, `description`, `dateAjout`, `titre`, `resume`, `idPartieCorps`, `video`, `image1`, `image2`, `image3`) VALUES
(1, 'Le crunch à la poulie haute pour les obliques est essentiel pour le développement des abdominaux. Attention tout de même, comme le précise cet article pour avoir une taille fine, les lourdes charges sont à proscrire pour ne pas épaissir la taille. En revanche, pour tous les athlètes qui doivent tenir des charges lourdes au-dessus de la tête ont besoin d''abdominaux puissants afin d''assurer la stabilisation du centre corporel. Dans ce cas, n''hésitez pas à augmenter la charge pour développer un maximum de force. \r\n- Fixez la corde à l’extrémité du câble relié à la poulie haute, tenez-la fermement des deux mains et agenouillez-vous à environ 60 cm devant les contrepoids.\r\n    - Descendez les mains le long de la tête, près des oreilles, les coudes fléchis. Dans cette position de départ, le buste penché en avant avec les genoux et les hanches à environ 90° : le câble devrait être bien tendu.\r\n    - Expirez en tirant contre la résistance et faites une flexion du rachis en contractant les abdominaux. À mesure que vous arrondissez le dos, pivotez le buste pour amener un coude vers le genou opposé.\r\n    - En arrivant à la position basse, videz énergétiquement vos poumons et maintenez la position un instant en contractant les abdos et les obliques.\r\n    - En inspirant, revenez lentement à la position de départ. Refaites l''exercice de l''autre côté.\r\n    - Pensez à garder la même position des mains et des coudes pendant tout l''exercice.\r\n    - Les hanches doivent rester à la verticale des genoux. Si l''on s''assied sur les mollets, on diminue l''amplitude du mouvement et les abdominaux ne sont plus en tension.\r\n Le groupe des muscles de l''abdomen comprend le grand droit, le grand oblique et le petit oblique. Long et mince, le grand droit descend verticalement le long de la paroi abdominale; il naît sur les 5, 6 et 7 côtes sur l''appendice xiphoïde du sternum et se termine plus bas sur le pubis. Les moitiés droite et gauche sont séparées par la ligne blanche, long tendon coupé d''intersections tendineuses qui forment les rainures transversales généralement visibles quand l''abdomen est "écorché".\r\nAllant du grand droit jusqu''aux dorsaux, le grand oblique recouvre les côtés et l''avant de l''abdomen. Les fibres sont disposées en diagonale depuis leurs insertions inférieures des deux côtés de l''abdomen et forme la lettre "V". Le petit oblique est logé directement sous le grand oblique. Dans sa partie haute, ses fibres sont presque perpendiculaires à celles du grand obliques et forment un "V" à l''envers. Dans sa partie basse, près du pubis, les fibres sont presque horizontales. ', '2014-04-10 00:00:00', '', '', 1, '', '', '', ''),
(3, 'Moderniser un classique peut donner des résultats mitigés : ainsi, certains termes hybrides qu''on a inventés n''ont pas toujours eu le succès qui caractérise les modifications du rowing, mouvement de base du bodybuilding dans l''entraînement du dos. Le rowing buste penché avec haltères illustre bien un tel succès. Mais nous ne parlons pas ici de ce bon vieux tirage d''un bras avec une jambe sur le banc. Cette fois, il s''agit d''un tirage des deux bras, buste penché, avec rotation. \r\n- Les bras tendus et les coudes pointés vers l''extérieur, maintenez une paire d''haltères devant vos cuisses, les avant-bras en position neutre ou pronation (paume face à vous), les pieds juste à l''intérieur de la largeur des épaules, le menton un peu relevé et les genoux légèrement fléchis.\r\n- Penchez-vous en avant à partir des hanches jusqu''à ce que votre buste soit légèrement au-dessus de l''horizontale, les bras perpendiculaires au sol et le tête relevée. Remarque : pour réduire les contraintes au niveau du dos, fléchissez vos genoux dans une position confortable.\r\n- En maintenant la cambrure naturelle de votre colonne vertébrale, commencez le mouvement en serrant vos omoplates l''une contre l''autre et vers le bas.\r\n- Dès que la rétractation des omoplates est complète, continuez à tirer les haltères en tournant vos paumes vers l''avant et en amenant les coudes contre le corps et en arrière. Ces mouvements devront être fluides et sans à-coups.\r\n- Maintenez un instant la position en haut avant de redescendre lentement les charges en les contrôlant tout en inversant la rotation des mains.\r\n- Inspirez entre les répétitions ou pendant la partie négative et expirez une fois que vous avez passé le point délicat du mouvement.\r\n- Faites le nombre nécessaire de reps pour terminer votre série.\r\nCet exercice sollicite les muscles grands dorsaux, le grand rond, les rhomboïdes et le faisceau moyen du trapèze.', '2014-04-10 00:00:00', '', '', 1, '', '', '', ''),
(4, 'Cet exercice de musculation pour biceps est excellent pour bien isoler le muscle biceps. Calé sur un banc, vous ne pourrez pas vous donner de l''élan avec un balancement du bras. Si vous n''avez pas un banc Larry Scott à disposition pour travailler vos biceps, ce mouvement unilatéral effectué debout est une assez bonne alternative. \r\nPlacez votre bras sur le dossier du banc :<br><br>\r\n\r\n- Inspirez et effectuez une flexion des avant-bras<br>\r\n- Conctractez fortement<br>\r\n- Expirez en relâchant lentement jusqu''à extension complète<br>', '2014-06-13 16:00:00', 'Curl haltère au banc', 'Cette version du curl sur un banc vous permet de vous concentrer sur le travail d''un seul biceps. Cela vous apportera davantage l''intensité sur un biceps à la fois.', 4, '', '', '', ''),
(5, '', '2014-06-02 19:50:00', 'Curl haltère supination', 'Cette  version du curl avec haltères est une des plus classiques. Les haltères permettent une fluidité au niveau des poignets qui évitent les tensions qu''une barre peut apporter.', 4, '', '', '', ''),
(6, '', '2014-06-02 19:50:01', 'Curl haltère au pupitre', 'La flexion de l''avant-bras avec haltère au pupitre vous permet d''augmenter l''intensité du travail sur chaque biceps grâce à une concentration plus importante.', 4, '', '', '', ''),
(7, 'Le "curl barre" est l''exercice le plus efficace pour développer et se muscler les biceps. C''est l''exercice qui permet de prendre les charges les plus lourdes pour prendre de la masse. Pour augmenter le volume musculaire de vos bras, réalisez ce mouvement au début de votre entraînement de musculation.', '2014-06-14 00:00:00', 'Curl barre', 'Les flexions des avant-bras debout à la barre, en anglais "Barbell Curl" travaille le biceps brachial et le brachial antérieur ainsi que le muscle long supinateur et le rond pronateur.', 4, '', '', '', '');

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
  `descEx` varchar(1000) NOT NULL DEFAULT '',
  `descPgrm` varchar(1000) NOT NULL DEFAULT '',
  PRIMARY KEY (`idPartieCorps`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `partiecorps`
--

INSERT INTO `partiecorps` (`idPartieCorps`, `libelle`, `descEx`, `descPgrm`) VALUES
(1, 'Abdominaux', 'Pour travailler les abdominaux, on retrouve trois grands types de mouvements : les relevés de jambes \r\n	(exemple relevé de jambes tendues), de buste (exemple crunch) et les gainages (exemple gainage abdos).', 'Si vous souhaitez avec un ventre plat et des muscles abdominaux en béton, il faudra non seulement suivre un programme \r\n		d''entraînement complet mais aussi avoir une alimentation équilibrée.'),
(2, 'Dos', 'Pour travailler les muscles du dos, la traction est le mouvement le plus connu. Il existe aussi des exercices appelés "rowing" \r\n	comme le rowing barre ou le rowing haltère et des exercices de tirage comme le tirage vertical.', 'La variété est importante pour prendre du muscle, surtout pour un grand groupe musculaire comme celui du dos. \r\n		Pour varier changez régulièrement d''exercice, d''angle de travail et de programme.'),
(3, 'Pectoraux', 'Pour travailler les pectoraux, l''exercice roi est le développé couché. Cet exercice polyarticulaire permet de prendre une charge \r\n	maximale. Pour exercer les pectoraux avec un mouvement d''isolation, essayez les écartés couché ou la version incliné.', 'Les pectoraux sont couramment travaillés avec le dos : mais aussi avec les triceps.'),
(4, 'Biceps', 'Il existe trois principaux mouvements appelés "curl" pour travailler les biceps (muscle biceps brachial). Les plus couramment utilisés sont le curl barre (prise en supination), le curl prise marteau et le curl en pronation.', 'L''entraînement pour avoir des biceps plus musclés et plus volumineux devra se concentrer sur des exercices à la barre avec lesquels on arrive à soulever de plus lourdes charges qu''avec des haltères. Pour bien travailler et muscler les biceps sous tous les angles, jetez un oeil sur ce programme musculation biceps.'),
(5, 'Triceps', 'Parmi les principaux mouvements de musculation pour se muscler les triceps, on retrouve les extensions couché comme le barre front et\r\n	les extensions debout à la poulie comme l''extension à la corde.', 'Pour entraîner vos triceps, vous pouvez faire une séance entièrement dédié à ces muscles. Dans le cas d''un lourd retard par \r\n		rapport au biceps par exemple.'),
(6, 'Epaules', 'Pour se muscler les épaules, les mouvements fondamentaux sont les développés, militaire ou nuque mais aussi avec haltères. \r\n	Les mouvements d''élévations, frontales ou latérales par exemple sont très efficaces pour travailler la définition musculaire.', 'Pour commencer votre entraînement pour les épaules, vous pouvez débuter avec ce programme classique avec un exercice \r\n		pour chaque faisceau du deltoïde. N''hésitez pas à varier les exercices avec d''autres variantes.');

-- --------------------------------------------------------

--
-- Structure de la table `programme`
--

CREATE TABLE IF NOT EXISTS `programme` (
  `idProgramme` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `niveau` varchar(45) NOT NULL DEFAULT '',
  `idPartieCorps` int(11) unsigned NOT NULL,
  `description` varchar(3000) NOT NULL DEFAULT '',
  PRIMARY KEY (`idProgramme`),
  KEY `idPartieCorps` (`idPartieCorps`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `programme`
--

INSERT INTO `programme` (`idProgramme`, `niveau`, `idPartieCorps`, `description`) VALUES
(1, 'Débutant', 4, 'Ce programme de biceps pour les débutants est structuré à partir de trois exercices. Si vous voulez avoir de gros bras, il faut vous familiariser avec ces trois mouvement et continuer de les pratiquer à mesure que vous étofferez votre arsenal d''exercices pour les bras. Dans chacun des exercices de biceps, efforcez-vous d''éliminer tout élan. Ne basculez pas le corps d''avant en arrière au démarrage de la rep et ne balancez pas les charges. Cette séance inclut les avant-bras; un gain de force des avant-bras est utile pour de nombreux autres exercices, notamment ceux qui ciblent le dos.');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

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
(8, 'Complexe Schwendi Schöneburg', 'Rue Pierre Audat, 93420 Villepinte, France', 48.959639, 2.545219, 1),
(9, 'Stade Nautique Maurice-Thorez', '21 Rue du Colonel Raynal, Montreuil, France', 48.8563391, 2.434814, 1);

-- --------------------------------------------------------

--
-- Structure de la table `suivi`
--

CREATE TABLE IF NOT EXISTS `suivi` (
  `idSuivi` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL DEFAULT '0000-00-00',
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
(1, '2014-04-01', 78, 180, '1h30 de sport', 1),
(2, '2014-04-03', 77.8, 180, 'Jecommence l''entrainement.', 1);

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
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Admin', 'admin', '0493827', 'admin@admin.com', '140 Rue de la Nouvelle France Montreuil', '0000-00-00 00:00:00'),
(2, 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', '', '', '', '', '', '0000-00-00 00:00:00');

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
(1, 5, 2, 10, 90, 3),
(1, 6, 3, 10, 90, 2),
(1, 7, 3, 10, 90, 1);

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
-- Contraintes pour la table `ficheexercice`
--
ALTER TABLE `ficheexercice`
  ADD CONSTRAINT `FK_ficheexercice_1` FOREIGN KEY (`idPartieCorps`) REFERENCES `partiecorps` (`idPartieCorps`);

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
-- Contraintes pour la table `x_programme_exercice`
--
ALTER TABLE `x_programme_exercice`
  ADD CONSTRAINT `FK_x_programme_exercice_1` FOREIGN KEY (`idProgramme`) REFERENCES `programme` (`idProgramme`),
  ADD CONSTRAINT `FK_x_programme_exercice_2` FOREIGN KEY (`idFicheExercice`) REFERENCES `ficheexercice` (`idFicheExercice`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

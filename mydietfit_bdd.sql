-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 20 Juin 2014 à 12:58
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
-- Structure de la table `categorienutrition`
--

CREATE TABLE IF NOT EXISTS `categorienutrition` (
  `idCategorie` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `libelleCategorie` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`idCategorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `categorienutrition`
--

INSERT INTO `categorienutrition` (`idCategorie`, `libelleCategorie`) VALUES
(1, 'Diététique'),
(2, 'Maigrir'),
(3, 'Conseils Nutrition');

-- --------------------------------------------------------

--
-- Structure de la table `ficheexercice`
--

CREATE TABLE IF NOT EXISTS `ficheexercice` (
  `idFicheExercice` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(45) DEFAULT NULL,
  `resume` varchar(1000) DEFAULT NULL,
  `description` varchar(5000) NOT NULL DEFAULT '',
  `dateAjout` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `idPartieCorps` int(10) unsigned DEFAULT NULL,
  `video` varchar(1000) NOT NULL DEFAULT '',
  `image1` varchar(100) NOT NULL DEFAULT '',
  `image2` varchar(100) NOT NULL DEFAULT '',
  `image3` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`idFicheExercice`),
  KEY `FK_ficheexercice_1` (`idPartieCorps`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Contenu de la table `ficheexercice`
--

INSERT INTO `ficheexercice` (`idFicheExercice`, `titre`, `resume`, `description`, `dateAjout`, `idPartieCorps`, `video`, `image1`, `image2`, `image3`) VALUES
(4, 'Curl haltère au banc', 'Cette version du curl sur un banc vous permet de vous concentrer sur le travail d''un seul biceps. Cela vous apportera davantage l''intensité sur un biceps à la fois.', 'Cet exercice de musculation pour biceps est excellent pour bien isoler le muscle biceps. Calé sur un banc, vous ne pourrez pas vous donner de l''élan avec un balancement du bras. Si vous n''avez pas un banc Larry Scott à disposition pour travailler vos biceps, ce mouvement unilatéral effectué debout est une assez bonne alternative. \r\nPlacez votre bras sur le dossier du banc :<br><br>\r\n\r\n- Inspirez et effectuez une flexion des avant-bras<br>\r\n- Conctractez fortement<br>\r\n- Expirez en relâchant lentement jusqu''à extension complète<br>', '2014-06-13 16:00:00', 4, '', '', '', ''),
(5, 'Curl haltère supination', 'Cette  version du curl avec haltères est une des plus classiques. Les haltères permettent une fluidité au niveau des poignets qui évitent les tensions qu''une barre peut apporter.', '', '2014-06-02 19:50:00', 4, '', '', '', ''),
(6, 'Curl haltère au pupitre', 'La flexion de l''avant-bras avec haltère au pupitre vous permet d''augmenter l''intensité du travail sur chaque biceps grâce à une concentration plus importante.', '', '2014-06-02 19:50:01', 4, '', '', '', ''),
(7, 'Curl barre', 'Les flexions des avant-bras debout à la barre, en anglais "Barbell Curl" travaille le biceps brachial et le brachial antérieur ainsi que le muscle long supinateur et le rond pronateur.', 'Le "curl barre" est l''exercice le plus efficace pour développer et se muscler les biceps. C''est l''exercice qui permet de prendre les charges les plus lourdes pour prendre de la masse. Pour augmenter le volume musculaire de vos bras, réalisez ce mouvement au début de votre entraînement de musculation.', '2014-06-14 00:00:00', 4, '', '', '', ''),
(8, 'Dips entre deux bancs', 'Le "Bench Dips" ou dips entre deux bancs est un exercice à poids de corps pour les triceps que vous pouvez facilement faire à la maison. Vous pouvez bien sûr vous lester...', 'Cet exercice de musculation pour les triceps est très efficace et techniquement facile à réaliser. Une fois que vous aurez compris le principe du mouvement, vous pourrez l''adapter sur d''autres supports, comme par exemple des chaises si vous vous entraînez à la maison. Les dips entre deux bancs permettent également de travailler la partie antérieure des épaules et supérieure des pectoraux si vous faites cet exercice en amplitude complète.', '2014-06-17 13:00:00', 5, '', '', '', ''),
(9, 'Tirage vertical en supination', 'Changez la position de vos mains pour développer l''épaisseur de vos dorsaux, tel est l''objectif de cette variante du tirage vertical pour le dos. Pour plus d''infos, lisez cet article.', 'Tractions à la barre fixe, tirage vertical, rowings et pull-over : autant d''excellents exercices pour les dorsaux, mais constatez-vous que vous faites sans cesse les mêmes mouvements, semaine après semaine ? Nous sommes nombreux à nous enliser dans la routine, souvent sans le savoir. Nous faisons du tirage vertical suivi par du rowing assis, puis du tirage d''un bras avec haltère ou du rowing à la barre en "T". Cela semble constituer un bon programme pour le dos, n''est-ce pas ? Eh bien oui et non...', '0000-00-00 00:00:00', 2, '', '', '', ''),
(10, 'Elévation avant à la poulie basse', 'Les élévations à la barre avec la poulie basse sont un excellent exercice de musculation pour travailler efficacement les faisceaux antérieures des muscles deltoïdes.', 'Si l''entraînement de vos deltoïdes antérieurs a un besoin urgent d''un bon coup de démarreur et que vous avez essayé pratiquement tout ce qui était possible avec les haltères, les barres et les machines, nous avons un exercice à vous proposer : "les élévations avant à la poulie basse".', '0000-00-00 00:00:00', 6, '', '', '', ''),
(11, 'Développé militaire guidé', 'Le développé militaire guidé et une variante de la version debout. Cet exercice permet de travailler avec des charges lourdes pour développer la masse musculaire des épaules.', 'Le développé militaire est l''un des meilleurs exercices pour développer les muscles deltoïdes en amplitude complète. Vous pouvez également le réaliser au cadre guidé. L''avantage est que vous pouvez prendre une charge plus lourde et la poser rapidement et simplement si vous manquez de force pour remonter la barre.', '0000-00-00 00:00:00', 6, '', '', '', ''),
(12, 'Élévations latérales avec haltères', 'Cet exercice est particulièrement intéressant en bodybuilding. Il donne du relief à l''arrondi de l''épaule et, en ajoutant de la carrure, accentue la forme en "V" du dos.', 'Cet exercice est certainement l''un des plus efficaces pour le développement des deltoïdes et des muscles sus-épineux. Cependant, son efficacité est largement dépendante de la qualité de son exécution. Si, par exemple, vous gardez les bras tendus et si vous travaillez en amplitude complète, en élevant les haltères au niveau de la tête, vous améliorerez la souplesse de l''articulation scapulo-humérale (épaule) et contracterez au maximum les deltoïdes. Il y aura également intervention du faisceau supérieur du grand pectoral et de la longue portion du biceps. Cependant, la plupart des pratiquants de la musculation n''exécutent pas l''exercice de cette façon. Généralement, ils fléchissent exagérément les coudes, donnent de l''élan et élèvent trop haut les bras. De cette manière, ce sont plus les parties antérieures que latérales du deltoïde qui travaillent et, en plus, en amplitude incomplète.', '0000-00-00 00:00:00', 6, '', '', '', ''),
(13, 'Élévation frontale avec haltère', 'Debout, jambes écartées de la largeur des épaules, le dos bien droit, les abdominaux contractés, un haltère reposant sur les cuisses, les mains croisées sur la poignée...', 'Debout, jambes écartées de la largeur des épaules, le dos bien droit, les abdominaux contractés, un haltère reposant sur les cuisses, les mains croisées sur la poignée, paumes face à face, les bras tendus :\r\n\r\nInspirer et élever l''haltère jusqu''au niveau des yeux.\r\nRedescendre doucement en évitant toutes secousses.\r\nExpirer en fin de mouvement.\r\nCet exercice sollicite le deltoïde et principalement ses faisceaux antérieurs ainsi que le faisceau claviculaire du grand pectoral et le chef court du biceps.', '0000-00-00 00:00:00', 6, '', '', '', ''),
(14, 'Oiseau à la poulie haute', 'L''oiseau debout à la poulie vis-à-vis est excellent pour travailler et cibler l''arrière de l''épaule. Ce mouvement est idéal pour se muscler et renforcer le deltoïde postérieur.', 'L''oiseau à la poulie haute ou écartés debout aux poulies est un excellent mouvement pour isoler la partie postérieure des muscles de l''épaule. Cet exercice est idéal en fin d''une séance d''épaule pour matraquer et renforcer la partie arrière des deltoïdes.', '0000-00-00 00:00:00', 6, '', '', '', ''),
(15, 'Développé assis avec haltères', 'Le développé assis avec haltères travaille principalement les muscles de l''articulation de l''épaule (deltoïdes) mais aussi de la partie supérieure et centrale du dos.', 'Le développé assis avec haltères est un des meilleurs exercices pour développer le deltoïde en amplitude complète et il favorise également le développement des muscles de la partie centrale du dos. Il est moins dangereux et plus efficace que des mouvements tels que les élévations latérales.', '0000-00-00 00:00:00', 6, '', '', '', ''),
(16, 'Rowing d''un bras avec haltère', 'Le rowing haltère est un exercice très efficace pour se muscler la partie moyenne du dos, particulièrement quand les deux prises, neutre et en pronation, sont utilisées.', 'Cet exercice de tirage pour le dos vous permettra de cibler les muscles dorsaux et les muscles du milieu du dos. Le rowing à un bras avec haltère est un classique pour développer le dos en épaisseur. Voici la technique de réalisation de ce mouvement et des conseils d''entraînement pour augmenter l''efficacité du rowing sans vous blesser.', '0000-00-00 00:00:00', 2, '', '', '', ''),
(17, 'Tirage menton à la barre', 'Le tirage menton à la barre est un exercice qui permet de se muscler les épaules et les trapèzes supérieurs. Il peut être effectué avec une barre libre ou guidée.', 'Cet exercice de musculation pour les épaules est aussi très efficace pour travailler la partie haute des trapèzes. Ne nécessitant qu''une barre de musculation, le rowing menton est parfait pour se muscler les épaules à la maison.', '0000-00-00 00:00:00', 2, '', '', '', ''),
(18, 'Pec deck inversé', 'Pour la musculation de l''arrière des épaules, le pec deck inversé est incontournable. Cet exercice permet de travailler avec une tension continu tout au long du mouvement.', 'Cet exercice de musculation des épaules est très efficace pour cibler l''arrière des épaules et le haut du dos.\r\n\r\nRéglez la hauteur du siège de la machine pec-deck afin que vos bras soient parallèles au sol quand vous saisirez les poignées.\r\n\r\nAsseyez-vous sur la machine et placez votre torse contre le rembourrage.\r\n\r\nSaisissez les poignées avec les paumes des mains face à face ou paumes en pronations comme sur l''illustration.\r\nEn position de départ, vos bras doivent être face à vous ou légèrement sur les côtés.\r\nInspirez et retenez votre souffle pendant que vous tirez vos bras en arrière aussi loin que vous le pouvez.\r\nIdéalement, votre bras (coudes) devrait être à 20-30° en arrière du plan de votre dos dans la position d''arrivée.\r\nMaintenez la position finale pendant 1 à 2 secondes.\r\nExpirez et revenez à la position de départ en contrôlant le mouvement.', '0000-00-00 00:00:00', 6, '', '', '', ''),
(19, 'Crunch oblique à la poulie haute', 'Le crunch à la poulie haute pour les obliques permet de travailler en tension continu des charges légères pour affiner la taille mais aussi des charges lourdes pour la force.', 'Le crunch à la poulie haute pour les obliques est essentiel pour le développement des abdominaux. Attention tout de même, comme le précise cet article pour avoir une taille fine, les lourdes charges sont à proscrire pour ne pas épaissir la taille. En revanche, pour tous les athlètes qui doivent tenir des charges lourdes au-dessus de la tête ont besoin d''abdominaux puissants afin d''assurer la stabilisation du centre corporel. Dans ce cas, n''hésitez pas à augmenter la charge pour développer un maximum de force.', '0000-00-00 00:00:00', 1, '', '', '', ''),
(20, 'Crunch décliné avec rotation', 'Le crunch décliné avec rotation est un mouvement qui permet de travailler la sangle abdominale avec beaucoup d''intensité. Il est donc réservé pour les plus expérimentés.', 'La plupart des adeptes du bodybuilding savent que pour développer une sangle abdominale complète, vous devez ajouter des mouvements de rotations à l''assortiment habituel des crunchs, de relevés de jambes inclinés, de relevés de genoux et autres mouvements pour les abdos situés dans le plan sagittal du corps. Sans aucun doute, ces exercices sont excellents pour travailler le grand droit de l''abdomen, qui est en fait un muscle long divisé en huit parties séparées par des bandes fibreuses. Mais pour également travailler les obliques interne et externe, qui permettent à votre colonne vertébrale de fléchir latéralement et tourner votre buste à droite et à gauche, vous devez effectivement faire des rotations !', '0000-00-00 00:00:00', 1, '', '', '', ''),
(21, 'Relevé de jambes au banc incliné', 'Le crunch inversé est facile à réaliser avec un banc de musculation ou sans matériel à la maison. Il permet de bien ressentir le travail de la partie inférieure des abdominaux.', 'Le crunch inversé est un exercice efficace pour bien ressentir la contraction de la partie inférieure des abdos. Il peut être exécuté sur un banc ou à plat au sol. Lorsqu''il est exécuté en amplitude complète, cet exercice fait intervenir toute la sangle abdominale.', '0000-00-00 00:00:00', 1, '', '', '', ''),
(22, 'Flexions latérales debout avec haltère', 'Cet exercice simple à exécuter vous permettra de travailler les muscles de la sangle abdominale (abdos et obliques) et les muscles extenseurs de la colonne vertébrale.', 'Les "flexions latérales debout avec haltère" sollicitent non seulement tous les muscles abdominaux, mais aussi les muscles lombaires et le carré des lombes, un muscle très important pour le dos. En effet, ce dernier est capital pour la stabilité latérale de la colonne vertébrale et les seuls exercices qui sollicitent vraiment ce muscle sont les flexions latérales et ses variantes.', '0000-00-00 00:00:00', 1, '', '', '', ''),
(23, 'Écartés à plat aux poulies basses', 'Les écartés à plat aux poulies basses sont un excellent exercice pour les pectoraux que vous pouvez pratiquer en fin de séance à titre d''exercice de finition.', 'Les écartés à plat aux poulies basses sont une variante des écartés à plat avec haltères. Comme le souligne cet article sur les poulies , l''intérêt réside dans le travail avec une tension continue. Si vous avez du mal à développer le milieu de vos pectoraux, cet exercice vous permettra de solliciter vos fibres musculaires au maximum, surtout en position haute contrairement aux haltères.', '0000-00-00 00:00:00', 3, '', '', '', ''),
(24, 'Pec deck', 'Le pec deck ou butterfly permet de travailler les pectoraux sans solliciter les triceps. Le mouvement de cet exercice est très utile pour les sports de combat.', 'Aussi appelé le butterfly, le pec peck aide à développer la partie moyenne du grand pectoral et le deltoïde antérieur. Cet exercice de musculation est important pour améliorer la performance au développé couché. La combinaison de l''adduction horizontale de l''épaule et de la protraction de la ceinture scapulaire est très importante dans toutes les actions pour tendre les bras vers l''avant. Ce mouvement est donc cruciale pour la plupart des sports de combat.', '0000-00-00 00:00:00', 3, '', '', '', ''),
(25, 'Développé décliné avec haltères', 'Comparé à la version du décliné avec la barre, cette version permet un travail des pectoraux sur une amplitude plus importante ce qui permet un développement plus important.', 'Pour les bodybuilders qui souhaitent avoir des pectoraux bien symétriques, l''intérêt de cet exercice repose sur l''augmentation de la force et de la masse de la partie inférieure (sternale) du grand pectoral. Par rapport à la version avec la barre qui permet de prendre une charge plus lourde, le développé décliné avec haltères permet de travailler avec une amplitude plus grande, ce qui permet un développement plus étendu des pectoraux.', '0000-00-00 00:00:00', 3, '', '', '', ''),
(26, 'Écartés déclinés avec haltères', 'Cet exercice de musculation est rarement pratiqué à tord car il permet de solliciter un maximum la partie inférieure et sternale des muscles pectoraux.', 'Cet exercice de musculation contribuent au développement complet de la partie basse des pectoraux et de l''avant des épaules. C''est aussi un excellent mouvement pour les dentelés. Voici les instructions pour réaliser cet exercice en toute sécurité avec nos conseils d''entraînement.', '0000-00-00 00:00:00', 3, '', '', '', ''),
(27, 'Extension couché avec haltères', 'L''exercice pour les triceps "Dumbbell Skull Crusher" est une variante des extensions couché à la barre derrière la tête. Vous pouvez aussi le faire avec les mains en pronations.', 'Comme beaucoup de personnes, vous utilisez peut-être une barre droite ou une barre corrigée pour réaliser les extensions couchées pour les triceps. Tout est bien réglé : votre partenaire vous passe la barre et vous démarrez le mouvement, presque comme si ce geste était une seconde nature. En revanche, si vous tentez de faire cet exercice classique avec haltères, vous risquez certainement d''être moins à l''aise. Plutôt difficile, c''est le moins que l''on dire ! Cette variante de l''extension couchée à la barre est à ne pas négliger si vous avez un problème de déséquilibre avec un triceps plus faible que l''autre. Pour corriger ce problème, ravalez votre fierté, prenez des charges légères et exercer vos triceps jusqu''à obtenir une brûlure digne de ce nom.', '0000-00-00 00:00:00', 5, '', '', '', ''),
(28, 'Extension assis à la poulie basse', 'Les extensions à la poulie basse assis (Rope Triceps Extension) est un mouvement d''isolation qui permet d''accentuer la stimulation sur le chef latéral du triceps.', 'Les poulies sont un choix populaire lors des séances de triceps pour des raisons évidentes : elles permettent d''effectuer toutes sortes d''extensions, assurent un mouvement extrêmement coulé ainsi qu''une tension continue du début jusqu''à la fin de chaque reps. Pourtant, certains exercices aux poulies conviennent mieux pour un travail de finition que ceux qui sont destinés à la prise de masse et que l''on pratique en début de séance pour les bras. En revanche, en voici un que vous pouvez faire en premier pour vraiment faire grossir vos bras : en les plaçant au-dessus de la tête, vous stimulerez les trois faisceaux du triceps avec la précision d''un laser, ce qui n''est pas le cas de bon nombre d''exercice où les bras sont le long du corps.', '0000-00-00 00:00:00', 5, '', '', '', ''),
(29, 'Extension horizontale à la poulie', 'Cet exercice d''extension à la barre sur une poulie haute est excellent pour isoler les triceps. Ce mouvement intensifie le travail de la longue portion du triceps brachial.', 'Fixez la barre au bout de la poulie haute et tenez les extrémités avec les mains en pronations.\r\n\r\nTournez le dos à l''appareil et incliné votre buste d''environ 45° en vous mettant en position de fente avant pour un meilleur équilibre.\r\nPlacez les bras de part et d''autre de la tête, les coudes étant dirigés vers l''avant.\r\nPoussez la barre devant la tête en faisant une extension complète des bras.\r\nContractez vos triceps.\r\nRevenez lentement à la position de départ.\r\nCet exercice permet de mieux ressentir le travail sur le chef long du triceps.', '0000-00-00 00:00:00', 5, '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `fichenutrition`
--

CREATE TABLE IF NOT EXISTS `fichenutrition` (
  `idFicheNutrition` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `dateAjout` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `contenu` varchar(2000) NOT NULL DEFAULT '',
  `titre` varchar(100) NOT NULL DEFAULT '',
  `idCategorieNutrition` int(10) unsigned NOT NULL DEFAULT '0',
  `image` varchar(60) NOT NULL DEFAULT '',
  `video` varchar(60) NOT NULL DEFAULT '',
  PRIMARY KEY (`idFicheNutrition`),
  KEY `FK_fichenutrition_1` (`idCategorieNutrition`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `fichenutrition`
--

INSERT INTO `fichenutrition` (`idFicheNutrition`, `dateAjout`, `contenu`, `titre`, `idCategorieNutrition`, `image`, `video`) VALUES
(1, '0000-00-00 00:00:00', '<p>Les prot&eacute;ines sont les nutriments les plus important pour la musculation. Ce sont elles qui assurent le fonctionnement de toutes les fonctions de l&#39;organisme. Pour les pratiquants de la musculation, elles vous permettront d&#39;avoir de plus gros muscles &agrave; condition bien s&ucirc;r, de suivre un entra&icirc;nement adapt&eacute;, d&#39;avoir une alimentation saine et une r&eacute;cup&eacute;ration suffisante. Pour tout savoir sur cette substance vitale pour tout bodybuilder, lisez cet article.</p>\r\n', 'Les protéines', 1, '', ''),
(2, '2014-06-20 14:16:54', '<p>Les lipides, il y en a des bonnes et des mauvaises. Un apport insuffisant de bonnes huiles nuit &agrave; la sant&eacute; et entrave les progr&egrave;s en musculation. En cas d&#39;abus des mauvaises graisses, vous vous retrouvez avec de gros probl&egrave;mes cardiaques. Ce qui compte, ce n&#39;est pas tant la quantit&eacute; de mati&egrave;re grasse dans notre assiette mais le type de lipides consomm&eacute;s. Quelles graisses inclure dans l&#39;alimentation et lesquelles sont dangereuses pour notre sant&eacute; ? Voici le B.A.BA sur les acides gras.</p>\r\n', 'Les lipides', 1, '', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `programme`
--

INSERT INTO `programme` (`idProgramme`, `niveau`, `idPartieCorps`, `description`) VALUES
(1, 'Débutant', 4, 'Ce programme de biceps pour les débutants est structuré à partir de trois exercices. Si vous voulez avoir de gros bras, il faut vous familiariser avec ces trois mouvement et continuer de les pratiquer à mesure que vous étofferez votre arsenal d''exercices pour les bras. Dans chacun des exercices de biceps, efforcez-vous d''éliminer tout élan. Ne basculez pas le corps d''avant en arrière au démarrage de la rep et ne balancez pas les charges. Cette séance inclut les avant-bras; un gain de force des avant-bras est utile pour de nombreux autres exercices, notamment ceux qui ciblent le dos.'),
(2, 'Débutant', 6, ''),
(3, 'Prise de masse 1', 6, ''),
(5, 'Prise de masse 2', 6, '');

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
(1, 7, 3, 10, 90, 1),
(2, 11, 3, 12, 90, 1),
(2, 12, 2, 10, 90, 2),
(2, 13, 2, 10, 90, 3),
(2, 14, 2, 10, 90, 4),
(3, 15, 4, 10, 90, 2),
(3, 16, 4, 12, 90, 3);

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
-- Contraintes pour la table `fichenutrition`
--
ALTER TABLE `fichenutrition`
  ADD CONSTRAINT `FK_fichenutrition_1` FOREIGN KEY (`idCategorieNutrition`) REFERENCES `categorienutrition` (`idCategorie`);

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

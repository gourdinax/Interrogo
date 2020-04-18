-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 20 Janvier 2020 à 12:53
-- Version du serveur :  5.7.28-0ubuntu0.16.04.2
-- Version de PHP :  7.0.33-0ubuntu0.16.04.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dutinfopw201633`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_commentaire` int(11) NOT NULL,
  `log_user` varchar(64) NOT NULL,
  `contenu` text NOT NULL,
  `id_qcm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `discipline`
--

CREATE TABLE `discipline` (
  `id_disc` bigint(20) NOT NULL,
  `intitule_disc` varchar(256) NOT NULL,
  `desc_disc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `discipline`
--

INSERT INTO `discipline` (`id_disc`, `intitule_disc`, `desc_disc`) VALUES
(1, 'SVT', 'Sciences et Vie de la Terre'),
(8, 'Français', 'Notre belle langue'),
(9, 'Mathématiques', 'CQFD'),
(10, 'Histoire', 'Les vainqueurs l\'écrivent, les vaincus racontent l\'histoire.'),
(11, 'Géographie', 'La Géographie, cela ne sert pas seulement Ã  faire la guerre.'),
(12, 'Technologie', 'La technologie peut être utilisée pour le meilleur ou le pire. Elle a transformée notre manière de vivre.');

-- --------------------------------------------------------

--
-- Structure de la table `forum`
--

CREATE TABLE `forum` (
  `id_qcm` bigint(20) NOT NULL,
  `id_commentaire` bigint(20) NOT NULL,
  `commentaire` text NOT NULL,
  `auteur` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `forum`
--

INSERT INTO `forum` (`id_qcm`, `id_commentaire`, `commentaire`, `auteur`) VALUES
(7, 1, 'Super qcm !', 'Axel'),
(1, 2, 'Incroyable qcm !', 'Axel'),
(1, 3, 'Trop dur !', 'Younamarre'),
(1, 4, 'Ce QCM Ã©tait enrichissant, mÃªme si je n\'ai pas compris certaines questions.', 'testSoutenance');

-- --------------------------------------------------------

--
-- Structure de la table `qcm`
--

CREATE TABLE `qcm` (
  `id_qcm` bigint(20) NOT NULL,
  `intitule_qcm` varchar(256) NOT NULL,
  `desc_qcm` text NOT NULL,
  `validation` tinyint(1) NOT NULL DEFAULT '0',
  `id_disc` bigint(20) NOT NULL,
  `auteur` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `qcm`
--

INSERT INTO `qcm` (`id_qcm`, `intitule_qcm`, `desc_qcm`, `validation`, `id_disc`, `auteur`) VALUES
(1, 'Energies fossiles et renouvelables', 'pour préparer le brevet', 1, 1, 'Axel'),
(6, 'Maths niveau lycée', 'questions diverses niveau TS max', 1, 9, 'Axel'),
(7, 'L\'argent, travers de la société', 'Molière, Zola etc..', 1, 8, 'Axel'),
(8, 'La république de l\'entre deux guerres, victorieuse et fragilisée', 'pour réviser le brevet.', 1, 10, 'Axel'),
(9, 'Les aires urbaines, une nouvelle géographie d\'une France mondialisée', 'pour réviser le brevet', 1, 11, 'Axel');

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE `question` (
  `id_ques` bigint(20) NOT NULL,
  `intitule_ques` varchar(256) NOT NULL,
  `reponse` int(11) NOT NULL,
  `id_qcm` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `question`
--

INSERT INTO `question` (`id_ques`, `intitule_ques`, `reponse`, `id_qcm`) VALUES
(0, 'A partir de quoi sont produites les énergies fossiles ?', 2, 1),
(1, 'Quelle affirmation est fausse ?', 4, 1),
(2, 'Le pétrole :', 1, 1),
(3, 'Quel est l’avantage d’utiliser des énergies fossiles ?', 4, 1),
(4, 'Avec les énergies fossiles :', 3, 1),
(5, 'Quelle affirmation est vraie ?', 4, 1),
(6, 'Le vent est produit :', 2, 1),
(7, 'Quelle est l’énergie renouvelable qui ne produit pas d’électricité en continu ?', 1, 1),
(8, 'La géothermie : ', 2, 1),
(9, 'Quelle affirmation est vraie pour toutes les énergies renouvelables ?', 3, 1),
(15, 'Quel est le prénom de l\'avare, dans l\'Avare de Molière ?', 4, 7),
(16, 'Où l\'argent d\'Harpagon est-il caché, dans l\'Avare de Molière ?', 1, 7),
(17, 'Où se passe l\'action de Germinal d\'Emile Zola ?', 3, 7),
(18, 'Qui mène la grève, dans Germinal de Zola ?', 2, 7),
(19, 'Comment le père Goriot a-t-il perdu tout son argent, dans le roman éponyme de Balzac ?', 4, 7),
(20, 'Que fait Aristide Saccard, dans l\'Argent de Zola, pour devenir riche ?', 2, 7),
(21, 'Dans le roman de Fitzgerald, pourquoi Gatsby étale-t-il ses richesses ?', 3, 7),
(22, 'Qui est l\'auteur de la Parure, nouvelle du XIXème siècle dans laquelle l\'argent est lié au thème du malheur ?', 1, 7),
(23, 'Comment s\'appelle le commerçant qui ruine Emma, dans Madame Bovary de Flaubert ?', 2, 7),
(24, 'Que dénonce Flaubert, en décrivant le rapport à l\'argent d\'Emma Bovary ?', 1, 7),
(25, 'Qui est le chef du nouveau gouvernement en France en 1936 ?', 2, 8),
(26, 'Quel est le slogan du Front populaire ?', 4, 8),
(27, 'Quel parti ne compose pas le Front populaire ?', 3, 8),
(28, 'Quel évènement de 1934 contribua à  la création du Front populaire ?', 2, 8),
(29, 'Quel événement est à l\'origine de la crise des années 30 ?', 4, 8),
(30, 'Dans les années 20 la France est :', 3, 8),
(31, 'Quels sont les partis de gauche après le congrès de Tours ?', 1, 8),
(32, 'Quel parti gouverne la France de 1919 à 1924 ?', 1, 8),
(33, 'Qui est le Président du Conseil à la fin de la guerre ?', 4, 8),
(34, 'De quelle année datent les rèformes du Front populaire ?', 2, 8),
(35, 'Combien d\'habitants compte l\'aire urbaine de Lyon de nos jours ?', 3, 9),
(36, 'A quelle distance s\'étendent les couronnes périurbaines de la ville de Lyon de nos jours ?', 3, 9),
(37, 'Comment se nomme le fleuve qui traverse Lyon ?', 3, 9),
(38, 'Quels espaces constituent une aire urbaine ?', 3, 9),
(39, 'Comment appelle-t-on l\'étalement des villes sur les campagnes ?', 2, 9),
(40, 'Quel pourcentage de la population francaise vit en ville de nos jours ?', 4, 9),
(41, 'Quelle conséquence a l\'étalement urbain sur les mobilités ?', 4, 9),
(42, 'Parmi les villes suivantes, laquelle est considérée comme une ville mondiale ?', 2, 9),
(43, 'Qu\'est-ce qu\'une migration pendulaire ?', 3, 9),
(59, 'Une primitive de la fonction f(x)= x² est ', 2, 6),
(60, 'Soit a= 1+i, un argument de a est ', 1, 6),
(61, 'Toujours avec a= 1+i, le module de a est égal à ', 1, 6),
(62, 'L\'ensemble de définition de la f(x) = 1/ [(x-1)(x+4)]', 4, 6),
(63, 'L\'ensemble de définition de f(x) = ln( x-3 ) est :', 3, 6),
(64, 'Les solutions réelles de l\'équation x² - 4x + 5 = 0 sont ', 1, 6),
(65, '5! = ', 1, 6),
(66, 'On pose S = 1+2+ 3 + ... + 20, S= ', 1, 6),
(67, 'La courbe représentative de la fonction qui associe à  tout réel l\'opposé de son carré :', 1, 6),
(68, 'f(x) = ln(x), f\'(5) =', 1, 6);

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE `reponse` (
  `no_res` int(11) NOT NULL,
  `intitule_res` varchar(256) NOT NULL,
  `id_ques` bigint(20) NOT NULL,
  `id_qcm` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `reponse`
--

INSERT INTO `reponse` (`no_res`, `intitule_res`, `id_ques`, `id_qcm`) VALUES
(9, 'De vent', 0, 1),
(10, 'De végétaux fossilisés\r\n', 0, 1),
(11, 'De soleil', 0, 1),
(12, 'D’eau', 0, 1),
(13, 'Les énergies fossiles rejettent du dioxyde de carbone', 1, 1),
(14, '\r\nLes énergies fossiles sont longues à produire (plusieurs millions d’années)', 1, 1),
(15, 'Les énergies fossiles sont polluantes', 1, 1),
(16, 'Les énergies fossiles sont considérées comme propres', 1, 1),
(17, '\r\nPeut produire du fioul ou même du gazole', 2, 1),
(18, '\r\nNe produit que des matières plastiques', 2, 1),
(19, '\r\nPeut produire du charbon et du gaz', 2, 1),
(20, 'Ne produit que de l’essence', 2, 1),
(21, '\r\nCela rejette beaucoup de dioxyde de carbone', 3, 1),
(22, 'Cela mettra beaucoup de temps à se reformer', 3, 1),
(23, 'Ce sont des sources illimitées', 3, 1),
(24, '\r\nCe sont des stocks d’énergie importants', 3, 1),
(25, '\r\n\r\nIl est possible de les utiliser indéfiniment', 4, 1),
(26, 'Il n’y a pas d’impact sur l’environnement', 4, 1),
(27, 'Il est possible d’en faire de multiples utilisations', 4, 1),
(28, 'Il est possible d’en créer', 4, 1),
(29, '\r\nLes énergies renouvelables rejettent du dioxyde de carbone', 5, 1),
(30, 'Les énergies renouvelables sont longues à produire (plusieurs millions d’années)', 5, 1),
(31, '\r\nLes énergies renouvelables sont polluantes', 5, 1),
(32, '\r\nLes énergies renouvelables sont considérées comme propres', 5, 1),
(33, '\r\nPar les arbres', 6, 1),
(34, 'Par les mouvements de masses d’air\r\n', 6, 1),
(35, 'Par les éoliennes', 6, 1),
(36, 'Par la Terre', 6, 1),
(37, '\r\nL’éolienne', 7, 1),
(38, 'Le barrage hydro-électrique', 7, 1),
(39, 'L’hydrolienne', 7, 1),
(40, '\r\nLe pétrole', 7, 1),
(41, 'Est la même partout dans le monde', 8, 1),
(42, 'Permet de chauffer de nombreuses habitations à moindre coût', 8, 1),
(43, 'Est dangereuse', 8, 1),
(44, 'Rejette du dioxyde de carbone', 8, 1),
(45, 'On peut avoir toutes les installations chez soi', 9, 1),
(46, 'On peut les utiliser peu importe où on vit', 9, 1),
(47, 'Elles produisent suffisamment d’énergie pour fournir de l’électricité à un foyer', 9, 1),
(48, 'Elles ne produisent pas assez d’énergie pour fournir de l’électricité à un foyer', 9, 1),
(49, ' Géronte', 0, 7),
(50, 'Sganarelle', 0, 7),
(51, 'Scapin', 0, 7),
(52, 'Harpagon', 0, 7),
(53, 'Dans une cassette', 1, 7),
(54, 'À la banque', 1, 7),
(55, 'Dans son matelas', 1, 7),
(56, 'Dans un coffre-fort', 1, 7),
(57, ' Dans l\'univers des chemins de fer', 2, 7),
(58, 'Dans un grand magasin parisien', 2, 7),
(59, 'Dans une mine de charbon', 2, 7),
(60, 'Dans un quartier défavorisé de Paris', 2, 7),
(61, ' Claude Lantier', 3, 7),
(62, ' Etienne Lantier', 3, 7),
(63, ' Maheu', 3, 7),
(64, 'Le père Goriot', 3, 7),
(65, ' En jouant aux cartes', 4, 7),
(66, ' Il s\'est fait voler', 4, 7),
(67, 'Lors d\'une crise banquière', 4, 7),
(68, 'Il a donné son argent à ses filles', 4, 7),
(69, ' Il escroque sa famille', 5, 7),
(70, 'Il monte une banque', 5, 7),
(71, 'Il vole une banque', 5, 7),
(72, ' Il organise un trafic d\'alcool', 5, 7),
(73, 'Il cherche à dilapider l\'héritage d\'un père qu\'il déteste', 6, 7),
(74, ' Il cherche à conquérir de nouveaux partenaires commerciaux', 6, 7),
(75, ' Il cherche à conquérir son amour de jeunesse, Daisy', 6, 7),
(76, ' Il veut profiter de la vie', 6, 7),
(77, 'Guy de Maupassant', 7, 7),
(78, ' Emile Zola', 7, 7),
(79, 'Balzac', 7, 7),
(80, ' Flaubert', 7, 7),
(81, ' Monsieur Malheureux', 8, 7),
(82, ' Monsieur Lheureux', 8, 7),
(83, ' Homais', 8, 7),
(84, 'Danny Ocean', 8, 7),
(85, ' La vanité et la superficialité', 9, 7),
(86, ' La lutte des classes', 9, 7),
(87, 'Les inégalités sociales', 9, 7),
(88, ' Le manque d\'intérêt d\'Emma pour la culture', 9, 7),
(89, 'Thorez', 0, 8),
(90, 'Blum', 0, 8),
(91, 'Daladier', 0, 8),
(92, 'PÃ©tain', 0, 8),
(93, 'Â« Avec la France, pour les FranÃ§ais Â»', 1, 8),
(94, 'Â« libertÃ©, Ã©galitÃ©, fraternitÃ© Â»', 1, 8),
(95, 'Â« travail, famille, patrie Â»', 1, 8),
(96, 'Â« le pain, la paix, la libertÃ© Â»', 1, 8),
(97, 'Le Parti Radical', 2, 8),
(98, 'La SFIO', 2, 8),
(99, 'Le Bloc national', 2, 8),
(100, 'Le Parti Communiste', 2, 8),
(101, 'Le congrÃ¨s de Tours', 3, 8),
(102, 'Les Ã©meutes des ligues', 3, 8),
(103, 'Le Krach de Wall-Street', 3, 8),
(104, 'La dÃ©mission de ClÃ©menceau', 3, 8),
(105, 'La rÃ©volution Russe', 4, 8),
(106, 'La montÃ©e du fascisme', 4, 8),
(107, 'La premiÃ¨re guerre mondiale', 4, 8),
(108, 'Le Krach de Wall-Street', 4, 8),
(109, 'Unie', 5, 8),
(110, 'En rÃ©conciliation avec l\'Allemagne', 5, 8),
(111, 'DivisÃ©e', 5, 8),
(112, 'En forte croissance', 5, 8),
(113, 'La SFIO et le Parti Communiste', 6, 8),
(114, 'Le Front de gauche et le PS', 6, 8),
(115, 'Le Front Populaire et le Parti Communiste', 6, 8),
(116, 'La SFIO et le Bloc national', 6, 8),
(117, 'Le Bloc National', 7, 8),
(118, 'Le Parti communiste', 7, 8),
(119, 'La SFIO', 7, 8),
(120, 'Les ligues', 7, 8),
(121, 'PÃ©tain', 8, 8),
(122, 'Blum', 8, 8),
(123, 'Daladier', 8, 8),
(124, 'ClÃ©menceau', 8, 8),
(125, '1937', 9, 8),
(126, '1936', 9, 8),
(127, '1935', 9, 8),
(128, '1934', 9, 8),
(129, '900 000 habitants', 0, 9),
(130, '1,5 million dâ€™habitants', 0, 9),
(131, '2 millions dâ€™habitants', 0, 9),
(132, '2,5 millions dâ€™habitants', 0, 9),
(133, '15 km', 1, 9),
(134, '30 km', 1, 9),
(135, '40 km', 1, 9),
(136, '50 km', 1, 9),
(137, 'Le Rhin', 2, 9),
(138, 'La Loire', 2, 9),
(139, 'Le RhÃ´ne', 2, 9),
(140, 'La Seine', 2, 9),
(141, 'Un centre-ville, ses banlieues et la couronne pÃ©riurbaine', 3, 9),
(142, 'Un centre-ville et ses banlieues', 3, 9),
(143, 'Une ville-centre, ses banlieues et la couronne pÃ©riurbaine', 3, 9),
(144, 'Une ville-centre et la couronne pÃ©riurbaine', 3, 9),
(145, 'La mÃ©tropolisation', 4, 9),
(146, 'La pÃ©riurbanisation', 4, 9),
(147, 'La mobilitÃ©', 4, 9),
(148, 'Les migrations pendulaires', 4, 9),
(149, '50%', 5, 9),
(150, '65%', 5, 9),
(151, '75%', 5, 9),
(152, '85%', 5, 9),
(153, 'Les mobilitÃ©s sont diminuÃ©es du fait de lâ€™Ã©talement urbain.', 6, 9),
(154, 'Les mobilitÃ©s se multiplient, puisque les FranÃ§ais doivent rejoindre les couronnes pÃ©riurbaines pour leur travail.', 6, 9),
(155, 'Les mobilitÃ©s sont diminuÃ©es grÃ¢ce aux transports en commun.', 6, 9),
(156, 'Les mobilitÃ©s se multiplient puisque les emplois sont majoritairement dans les villes-centres tandis que les espaces pÃ©riphÃ©riques accueillent de plus en plus de logements.', 6, 9),
(157, 'Lyon', 7, 9),
(158, 'Paris', 7, 9),
(159, 'Nantes', 7, 9),
(160, 'Lille', 7, 9),
(161, 'Une migration venue dâ€™un pays voisin de la France', 8, 9),
(162, 'Une migration rÃ©guliÃ¨re, pour le tourisme dâ€™affaire', 8, 9),
(163, 'Un dÃ©placement quotidien entre le lieu de rÃ©sidence et le lieu de travail', 8, 9),
(164, 'Un dÃ©placement rÃ©gulier Ã  lâ€™Ã©tranger', 8, 9),
(1, '2x', 0, 6),
(2, 'x³/3', 0, 6),
(3, '3x²', 0, 6),
(4, 'x²', 0, 6),
(5, ' pi/4', 1, 6),
(6, '3pi/2', 1, 6),
(7, ' pi/2', 1, 6),
(8, ' pi', 1, 6),
(9, 'racine(2)', 2, 6),
(10, '2', 2, 6),
(11, '1', 2, 6),
(12, 'racine(3/2)', 2, 6),
(13, 'R+', 3, 6),
(14, 'R*', 3, 6),
(15, 'R*+', 3, 6),
(16, 'R/{-4,1}', 3, 6),
(17, 'R+', 4, 6),
(18, 'R / {3}', 4, 6),
(19, ']3;+infini[', 4, 6),
(20, 'R*+', 4, 6),
(21, '{ -1, 5 }', 5, 6),
(22, '{-1, 0}', 5, 6),
(23, '{4,5}', 5, 6),
(24, 'Pas de solutions dans R', 5, 6),
(25, '120 ', 6, 6),
(26, '15', 6, 6),
(27, '0', 6, 6),
(28, 'CINQ', 6, 6),
(29, '210', 7, 6),
(30, '20!', 7, 6),
(31, '135', 7, 6),
(32, '200', 7, 6),
(33, 'est concave', 8, 6),
(34, 'est convexe', 8, 6),
(35, 'a une asymptote horizontale', 8, 6),
(36, 'a une asymptote verticale ', 8, 6),
(37, '0,2', 9, 6),
(38, '5', 9, 6),
(39, '50', 9, 6),
(40, '25', 9, 6);

-- --------------------------------------------------------

--
-- Structure de la table `resultat`
--

CREATE TABLE `resultat` (
  `id_qcm` bigint(20) NOT NULL,
  `log_user` varchar(64) NOT NULL,
  `note` int(11) NOT NULL DEFAULT '0',
  `new_note` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `resultat`
--

INSERT INTO `resultat` (`id_qcm`, `log_user`, `note`, `new_note`) VALUES
(7, 'Axel', 0, 0),
(6, 'Axel', 0, 0),
(1, 'Axel', 0, 0),
(1, 'Younamarre', 0, 0),
(7, 'Younamarre', 1, 1),
(8, 'Axel', 1, 1),
(9, 'Axel', 0, 0),
(1, 'TestSoutenance', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `log_user` varchar(64) NOT NULL,
  `pwd_user` text NOT NULL,
  `droit` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`log_user`, `pwd_user`, `droit`) VALUES
('Axel', '$2y$10$54ug1m1Fc9jm6FWyBAoZUOGXfHd7cVqr1ISz.rSYkJ3VMO2bHfUEO', 1),
('mehdi', '$2y$10$DBsoNyI8ptSpBWH1fjRARuruAdflVFQm3l7msfgts9jIBBhnyDa6e', 0),
('TestSoutenance', '$2y$10$QKiE233D8uogOJbcNxvZt.5mJKbB8/nXd2K9s/fBfgDMn3AKM9eZK', 0),
('Younamarre', '$2y$10$VbCM/xVuPeyVESqOWUcTL.ChY339f2I7tuydbcGhF.BYVFhXG5lKS', 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_commentaire`);

--
-- Index pour la table `discipline`
--
ALTER TABLE `discipline`
  ADD PRIMARY KEY (`id_disc`);

--
-- Index pour la table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id_commentaire`);

--
-- Index pour la table `qcm`
--
ALTER TABLE `qcm`
  ADD PRIMARY KEY (`id_qcm`);

--
-- Index pour la table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id_ques`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`log_user`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id_commentaire` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `discipline`
--
ALTER TABLE `discipline`
  MODIFY `id_disc` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `forum`
--
ALTER TABLE `forum`
  MODIFY `id_commentaire` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `qcm`
--
ALTER TABLE `qcm`
  MODIFY `id_qcm` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `question`
--
ALTER TABLE `question`
  MODIFY `id_ques` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

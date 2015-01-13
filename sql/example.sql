-- 
-- Structure de la table `wp_eewee_restaurant_devise`
-- 

CREATE TABLE `wp_eewee_restaurant_devise` (
  `ID_DEVISE` int(11) NOT NULL AUTO_INCREMENT,
  `NOM` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `ETAT` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_DEVISE`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Contenu de la table `wp_eewee_restaurant_devise`
-- 

INSERT INTO `wp_eewee_restaurant_devise` VALUES (1, '€', 0);
INSERT INTO `wp_eewee_restaurant_devise` VALUES (2, '$', 1);

-- --------------------------------------------------------

-- 
-- Structure de la table `wp_eewee_restaurant_menu`
-- 

CREATE TABLE `wp_eewee_restaurant_menu` (
  `ID_MENU` int(11) NOT NULL AUTO_INCREMENT,
  `NOM` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `PRIX` float NOT NULL,
  `ETAT` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_MENU`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Contenu de la table `wp_eewee_restaurant_menu`
-- 

INSERT INTO `wp_eewee_restaurant_menu` VALUES (1, 'Formule du midi', 15, 0);
INSERT INTO `wp_eewee_restaurant_menu` VALUES (2, 'Formule du soir', 19, 0);

-- --------------------------------------------------------

-- 
-- Structure de la table `wp_eewee_restaurant_menu_composition`
-- 

CREATE TABLE `wp_eewee_restaurant_menu_composition` (
  `ID_MENU_COMPOSITION` int(11) NOT NULL AUTO_INCREMENT,
  `ID_MENU_CATEGORIE` int(11) NOT NULL,
  `ID_MENU_TYPE` int(11) NOT NULL,
  `ID_PLAT` int(11) NOT NULL,
  PRIMARY KEY (`ID_MENU_COMPOSITION`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- 
-- Contenu de la table `wp_eewee_restaurant_menu_composition`
-- 

INSERT INTO `wp_eewee_restaurant_menu_composition` VALUES (1, 1, 1, 1);
INSERT INTO `wp_eewee_restaurant_menu_composition` VALUES (2, 1, 1, 2);
INSERT INTO `wp_eewee_restaurant_menu_composition` VALUES (3, 1, 1, 3);
INSERT INTO `wp_eewee_restaurant_menu_composition` VALUES (4, 1, 2, 4);
INSERT INTO `wp_eewee_restaurant_menu_composition` VALUES (5, 1, 2, 5);
INSERT INTO `wp_eewee_restaurant_menu_composition` VALUES (6, 1, 2, 6);
INSERT INTO `wp_eewee_restaurant_menu_composition` VALUES (7, 1, 3, 7);
INSERT INTO `wp_eewee_restaurant_menu_composition` VALUES (8, 1, 3, 8);
INSERT INTO `wp_eewee_restaurant_menu_composition` VALUES (9, 1, 3, 9);

-- --------------------------------------------------------

-- 
-- Structure de la table `wp_eewee_restaurant_menu_type`
-- 

CREATE TABLE `wp_eewee_restaurant_menu_type` (
  `ID_MENU_TYPE` int(11) NOT NULL AUTO_INCREMENT,
  `NOM` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `ETAT` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_MENU_TYPE`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Contenu de la table `wp_eewee_restaurant_menu_type`
-- 

INSERT INTO `wp_eewee_restaurant_menu_type` VALUES (1, 'Entrée', 0);
INSERT INTO `wp_eewee_restaurant_menu_type` VALUES (2, 'Plat', 0);
INSERT INTO `wp_eewee_restaurant_menu_type` VALUES (3, 'Dessert', 0);

-- --------------------------------------------------------

-- 
-- Structure de la table `wp_eewee_restaurant_plat`
-- 

CREATE TABLE `wp_eewee_restaurant_plat` (
  `ID_PLAT` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PLAT_CATEGORIE` int(11) NOT NULL,
  `NOM` varchar(255) NOT NULL,
  `INGREDIENT` text NOT NULL,
  `PRIX` float NOT NULL,
  `ETAT` tinyint(1) NOT NULL,
  `ORDER_PLAT` int(11) NOT NULL,
  PRIMARY KEY (`ID_PLAT`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- 
-- Contenu de la table `wp_eewee_restaurant_plat`
-- 

INSERT INTO `wp_eewee_restaurant_plat` VALUES (1, 1, 'Tartare de tomate au thon', 'tomate, thon', 8, 0);
INSERT INTO `wp_eewee_restaurant_plat` VALUES (2, 1, 'Nems frits à la menthe fraiche x 3', 'Nems, menthe', 7, 0);
INSERT INTO `wp_eewee_restaurant_plat` VALUES (3, 1, 'Carpaccio de boeuf mariné', 'beouf', 9, 0);
INSERT INTO `wp_eewee_restaurant_plat` VALUES (4, 2, 'Steak de boeuf mariné (180gr)', 'boeuf', 12, 0);
INSERT INTO `wp_eewee_restaurant_plat` VALUES (5, 2, 'Double filet de poulet au grill', 'poulet', 13, 0);
INSERT INTO `wp_eewee_restaurant_plat` VALUES (6, 2, 'Salade landaise', 'salade, fromage de chevre, gesier, lardon', 10, 0);
INSERT INTO `wp_eewee_restaurant_plat` VALUES (7, 3, 'Mousse au chocolat', 'chocolat', 5, 0);
INSERT INTO `wp_eewee_restaurant_plat` VALUES (8, 3, 'Coupe de glace (2 boules au choix)', 'fraise, vanille, cassis, framboise, citron, citron vert', 4, 0);
INSERT INTO `wp_eewee_restaurant_plat` VALUES (9, 3, 'Café gourmand', 'café, mufin, chocolat', 4, 0);

-- --------------------------------------------------------

-- 
-- Structure de la table `wp_eewee_restaurant_plat_categorie`
-- 

CREATE TABLE `wp_eewee_restaurant_plat_categorie` (
  `ID_PLAT_CATEGORIE` int(11) NOT NULL AUTO_INCREMENT,
  `NOM` varchar(255) NOT NULL,
  `ETAT` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_PLAT_CATEGORIE`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- 
-- Contenu de la table `wp_eewee_restaurant_plat_categorie`
-- 

INSERT INTO `wp_eewee_restaurant_plat_categorie` VALUES (1, 'Entrée', 0);
INSERT INTO `wp_eewee_restaurant_plat_categorie` VALUES (2, 'Plat', 0);
INSERT INTO `wp_eewee_restaurant_plat_categorie` VALUES (3, 'Dessert', 0);
INSERT INTO `wp_eewee_restaurant_plat_categorie` VALUES (4, 'Vin', 1);
INSERT INTO `wp_eewee_restaurant_plat_categorie` VALUES (5, 'Apéritif', 0);
INSERT INTO `wp_eewee_restaurant_plat_categorie` VALUES (6, 'Digestif', 0);
INSERT INTO `wp_eewee_restaurant_plat_categorie` VALUES (7, 'Pizza', 0);

-- --------------------------------------------------------

-- 
-- Structure de la table `wp_eewee_restaurant_taxe`
-- 

CREATE TABLE `wp_eewee_restaurant_taxe` (
  `ID_TAXE` int(11) NOT NULL AUTO_INCREMENT,
  `NOM` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `ETAT` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_TAXE`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Contenu de la table `wp_eewee_restaurant_taxe`
-- 

INSERT INTO `wp_eewee_restaurant_taxe` VALUES (1, '19.6', 0);

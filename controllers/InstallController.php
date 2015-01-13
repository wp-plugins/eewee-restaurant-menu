<?php
//namespace FrEeweePluginRestaurantMenuInstall;
//if( !class_exists(InstallController)){
	class InstallController{
		
		function __construct(){}
                
		/**
		 * install
		 */
		public function install(){
                    global $wpdb;
                    
                    $sql[] = "
                    CREATE TABLE `".EEWEE_RESTAURANT_MENU_PREFIXE_BDD."devise` (
                      `ID_DEVISE` int(11) NOT NULL AUTO_INCREMENT,
                      `NOM` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
                      `ETAT` tinyint(1) NOT NULL,
                      `LOCATION` int(11) NOT NULL,
                      `SEPARATOR` int(11) NOT NULL,
                      PRIMARY KEY (`ID_DEVISE`)
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
                    ";
                    
                    $sql[] = "
                    CREATE TABLE `".EEWEE_RESTAURANT_MENU_PREFIXE_BDD."menu` (
                      `ID_MENU` int(11) NOT NULL AUTO_INCREMENT,
                      `NOM` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
                      `PRIX` float NOT NULL,
                      `ETAT` tinyint(1) NOT NULL,
                      PRIMARY KEY (`ID_MENU`)
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
                    ";
                    
                    $sql[] = "
                    CREATE TABLE `".EEWEE_RESTAURANT_MENU_PREFIXE_BDD."menu_composition` (
                      `ID_MENU_COMPOSITION` int(11) NOT NULL AUTO_INCREMENT,
                      `ID_MENU_CATEGORIE` int(11) NOT NULL,
                      `ID_MENU_TYPE` int(11) NOT NULL,
                      `ID_PLAT` int(11) NOT NULL,
                      PRIMARY KEY (`ID_MENU_COMPOSITION`)
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
                    ";
                    
                    $sql[] = "
                    CREATE TABLE `".EEWEE_RESTAURANT_MENU_PREFIXE_BDD."menu_type` (
                      `ID_MENU_TYPE` int(11) NOT NULL AUTO_INCREMENT,
                      `NOM` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
                      `ETAT` tinyint(1) NOT NULL,
                      PRIMARY KEY (`ID_MENU_TYPE`)
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
                    ";
                    
                    $sql[] = "
                    CREATE TABLE `".EEWEE_RESTAURANT_MENU_PREFIXE_BDD."plat` (
                      `ID_PLAT` int(11) NOT NULL AUTO_INCREMENT,
                      `ID_PLAT_CATEGORIE` int(11) NOT NULL,
                      `NOM` varchar(255) NOT NULL,
                      `INGREDIENT` text NOT NULL,
                      `PRIX` float NOT NULL,
                      `ETAT` tinyint(1) NOT NULL,
                      PRIMARY KEY (`ID_PLAT`)
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
                    ";
                    
                    $sql[] = "
                    CREATE TABLE `".EEWEE_RESTAURANT_MENU_PREFIXE_BDD."plat_categorie` (
                      `ID_PLAT_CATEGORIE` int(11) NOT NULL AUTO_INCREMENT,
                      `NOM` varchar(255) NOT NULL,
                      `ETAT` tinyint(1) NOT NULL,
                      PRIMARY KEY (`ID_PLAT_CATEGORIE`)
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
                    ";
                    
                    $sql[] = "
                    CREATE TABLE `".EEWEE_RESTAURANT_MENU_PREFIXE_BDD."taxe` (
                      `ID_TAXE` int(11) NOT NULL AUTO_INCREMENT,
                      `NOM` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
                      `ETAT` tinyint(1) NOT NULL,
                      PRIMARY KEY (`ID_TAXE`)
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
                    ";
                    
                    $sql[] = "
                    CREATE TABLE `".EEWEE_RESTAURANT_MENU_PREFIXE_BDD."lang` (
                      `ID_LANG` int(11) NOT NULL AUTO_INCREMENT,
                      `NOM` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
                      `ETAT` tinyint(1) NOT NULL,
                      PRIMARY KEY (`ID_LANG`)
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
                    ";
                    
                    $sql[] = "
                    CREATE TABLE `".EEWEE_RESTAURANT_MENU_PREFIXE_BDD."lang_plat` (
                      `ID_LANG_PLAT` int(11) NOT NULL AUTO_INCREMENT,
                      `ID_LANG` int(11) NOT NULL,
                      `ID_PLAT` int(11) NOT NULL,
                      `NOM` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
                      `INGREDIENT` text NOT NULL,
                      PRIMARY KEY (`ID_LANG_PLAT`)
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
                    ";

                    foreach( $sql as $v ){ $wpdb->query($v); }
		}
                
                /**
		 * delete
		 */
		public function delete(){
                    echo "DELETE PLUGIN<br />";
                    global $wpdb;
                    $sql[] = "DROP TABLE  `".EEWEE_RESTAURANT_MENU_PREFIXE_BDD."devise`";
                    $sql[] = "DROP TABLE  `".EEWEE_RESTAURANT_MENU_PREFIXE_BDD."menu`";
                    $sql[] = "DROP TABLE  `".EEWEE_RESTAURANT_MENU_PREFIXE_BDD."menu_composition`";
                    $sql[] = "DROP TABLE  `".EEWEE_RESTAURANT_MENU_PREFIXE_BDD."menu_type`";
                    $sql[] = "DROP TABLE  `".EEWEE_RESTAURANT_MENU_PREFIXE_BDD."plat`";
                    $sql[] = "DROP TABLE  `".EEWEE_RESTAURANT_MENU_PREFIXE_BDD."plat_categorie`";
                    $sql[] = "DROP TABLE  `".EEWEE_RESTAURANT_MENU_PREFIXE_BDD."taxe`";
                    $sql[] = "DROP TABLE  `".EEWEE_RESTAURANT_MENU_PREFIXE_BDD."lang`";
                    foreach( $sql as $v ){ $wpdb->query($v); }
		}
                
				
	}//class
//}//if
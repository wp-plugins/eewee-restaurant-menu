<?php
//namespace FrEeweePluginRestaurantMenuAdmin;
if( !class_exists(AdminController)){
	class AdminController{
		
		function __construct(){}
		function init(){ 
                    //$this->getOptionsAdmin();
                }
		
		/**
		 * execute lors de l'activation du plugin
		 */
		function eewee_activate(){
                    $i = new InstallController();
                    $i->install();
                }
		
		/**
		 * execute lors de la désactivation du plugin
		 */
		function eewee_deactivate(){}
                
                /**
		 * execute lors de la désinstallation du plugin
		 */
		function eewee_uninstall(){
                    $i = new InstallController();
                    $i->delete();
                }
		
		/**
		 * Gestion des menus du site
		 */
		function eewee_adminMenu(){
			// menu principale
			add_menu_page( "Restaurant menu", "Restaurant menu", "manage_options", "idRestaurantMenu", array($this, "menu"), plugins_url("eewee-restaurant-menu/images/icones/logo.png") );
			
                        // sous menu dans le menu principale
			add_submenu_page( "idRestaurantMenu", "Menu", "Menu", "manage_options", "idSousMenu1", array($this, "sousMenu1"));
			add_submenu_page( "idRestaurantMenu", "Composition menu", "Composition menu", "manage_options", "idSousMenu2", array($this, "sousMenu2"));
                        add_submenu_page( "idRestaurantMenu", "Type menu", "Type menu", "manage_options", "idSousMenu3", array($this, "sousMenu3"));
                        add_submenu_page( "idRestaurantMenu", "Categorie plat", "Categorie plat", "manage_options", "idSousMenu4", array($this, "sousMenu4"));
                        add_submenu_page( "idRestaurantMenu", "Plat", "Plat", "manage_options", "idSousMenu5", array($this, "sousMenu5"));
                        add_submenu_page( "idRestaurantMenu", "Devise", "Devise", "manage_options", "idSousMenu6", array($this, "sousMenu6"));
                        add_submenu_page( "idRestaurantMenu", "Taxe", "Taxe", "manage_options", "idSousMenu7", array($this, "sousMenu7"));
                        add_submenu_page( "idRestaurantMenu", "Langue", "Langue", "manage_options", "idSousMenu8", array($this, "sousMenu8"));

			// appel init
			add_action('admin_init', array($this, 'init'));
		}
		
		/**
		 * Page : menu principale
		 */
		function menu(){ include(EEWEE_RESTAURANT_MENU_PLUGIN_DIR.'/view/manuel.php'); }
		function sousMenu1(){ include(EEWEE_RESTAURANT_MENU_PLUGIN_DIR.'/view/menuRoot.php'); }
		function sousMenu2(){ include(EEWEE_RESTAURANT_MENU_PLUGIN_DIR.'/view/menuCompositionRoot.php'); }
		function sousMenu3(){ include(EEWEE_RESTAURANT_MENU_PLUGIN_DIR.'/view/menuTypeRoot.php'); }
		function sousMenu4(){ include(EEWEE_RESTAURANT_MENU_PLUGIN_DIR.'/view/platCategorieRoot.php'); }
		function sousMenu5(){ include(EEWEE_RESTAURANT_MENU_PLUGIN_DIR.'/view/platRoot.php'); }
		function sousMenu6(){ include(EEWEE_RESTAURANT_MENU_PLUGIN_DIR.'/view/deviseRoot.php'); }
		function sousMenu7(){ include(EEWEE_RESTAURANT_MENU_PLUGIN_DIR.'/view/taxeRoot.php'); }
		function sousMenu8(){ include(EEWEE_RESTAURANT_MENU_PLUGIN_DIR.'/view/langRoot.php'); }
		
		/**
		 * Définition des options
		 */
		/*
                function getOptionsAdmin(){
			//assigne les valeurs par défaut aux options d'administration
			$tbl_optionsAdmin = array(
				'enabled'		=> true,
				'exclude_ips'	=> ''
			);
			//recup les options stockées en bdd
			$options = get_option($this->adminOptionsName);
			//si les options existent dans la base de données, les valeurs par défaut sont écrasées par celles de la base			
			if( !empty($options) ){
				foreach( $options as $k=>$v ){
					$tbl_optionsAdmin[$k] = $v;
				}
			}
			//les options sont stockées dans la base
			update_option($this->adminOptionsName, $tbl_optionsAdmin);
			//les options sont renvoyées pour être utilisées
			return $tbl_optionsAdmin;
		}
                */
		
		/**
		 * Panneau d'admin
		 */
		/*
                function printAdminPage(){
			echo "printAdminPage";
			$options = $this->getOptionsAdmin();
			// si le post du bouton existe (update_eewee_settings = attribut name du bouton)
			if( isset($_POST['update_eewee_settings']) ){
				if(isset($_POST['enabled'])){
					$options['enabled'] = $_POST['enabled'];
				}
				if(isset($_POST['exclude_ips'])){
					$options['exclude_ips'] = $_POST['exclude_ips'];
				}
				// maj
				update_option($this->adminOptionsName, $options);
			}
			// include du formulaire HTML
			include(EEWEE_RESTAURANT_MENU_PLUGIN_DIR.'/view/admin_settings.php');
		}
                */
		
	}//fin class
}//fin if
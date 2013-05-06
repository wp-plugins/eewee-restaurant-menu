<?php 
/*
Plugin Name: Eewee restaurant menu
Plugin URI: http://www.eewee.fr
Description: Management of restaurant menus. Composition dish of the day. Create your own dishes with ingredients, prices, ...
Version: 1.4
Author: Michael DUMONTET
Author URI: http://www.eewee.fr/wordpress/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

/**
 * Definitions
 *
 * @since 1.0.0
 */
global $wpdb;
define( 'EEWEE_VERSION', '1.4' );
define( 'EEWEE_RESTAURANT_MENU_PLUGIN_DIR', 		WP_PLUGIN_DIR . '/' . dirname( plugin_basename( __FILE__ ) ) );
define( 'EEWEE_RESTAURANT_MENU_PLUGIN_URL', 		WP_PLUGIN_URL . '/' . dirname( plugin_basename( __FILE__ ) ) );
define( 'EEWEE_RESTAURANT_MENU_PREFIXE_BDD',		$wpdb->prefix.'eewee_restaurant_');
define( 'PLUGIN_NOM_LANG',                              "eewee-restaurant-menu");
define( 'EEWEE_RESTAURANT_MENU_DEBUG',                  false);
for( $i=1 ; $i<=7 ; $i++ ){
    define( 'EEWEE_RESTAURANT_MENU_URL_SOUS_MENU_'.$i,          admin_url( 'admin.php?page=idSousMenu'.$i, 'http' ) );
    define( 'EEWEE_RESTAURANT_MENU_URL_BACK_SOUS_MENU_'.$i,	admin_url().'admin.php?page=idSousMenu'.$i);
}

load_plugin_textdomain(PLUGIN_NOM_LANG, false, dirname( plugin_basename( __FILE__ ) ) . '/lang');

/**
 * Required CSS
 *
 * @since 1.0.0
 */
function ajouterScriptsEeweeRestaurantMenu(){
	wp_enqueue_style( PLUGIN_NOM_LANG.'-style', '/wp-content/plugins/eewee-restaurant-menu/css/style.css' );
}
add_action( 'init', 'ajouterScriptsEeweeRestaurantMenu' );


/**
 * Required Files
 *
 * @since 1.0.0
 */
// MODELS
require_once ( EEWEE_RESTAURANT_MENU_PLUGIN_DIR . '/models/TMenu.php' );
require_once ( EEWEE_RESTAURANT_MENU_PLUGIN_DIR . '/models/TMenuComposition.php' );
require_once ( EEWEE_RESTAURANT_MENU_PLUGIN_DIR . '/models/TMenuType.php' );
require_once ( EEWEE_RESTAURANT_MENU_PLUGIN_DIR . '/models/TPlat.php' );
require_once ( EEWEE_RESTAURANT_MENU_PLUGIN_DIR . '/models/TPlatCategorie.php' );
require_once ( EEWEE_RESTAURANT_MENU_PLUGIN_DIR . '/models/TDevise.php' );
require_once ( EEWEE_RESTAURANT_MENU_PLUGIN_DIR . '/models/TTaxe.php' );
// FORMS
require_once ( EEWEE_RESTAURANT_MENU_PLUGIN_DIR . '/forms/FMenuSearch.php' );
require_once ( EEWEE_RESTAURANT_MENU_PLUGIN_DIR . '/forms/FMenuEdit.php' );
require_once ( EEWEE_RESTAURANT_MENU_PLUGIN_DIR . '/forms/FMenuAdd.php' );
require_once ( EEWEE_RESTAURANT_MENU_PLUGIN_DIR . '/forms/FMenuCompositionSearch.php' );
require_once ( EEWEE_RESTAURANT_MENU_PLUGIN_DIR . '/forms/FMenuCompositionEdit.php' );
require_once ( EEWEE_RESTAURANT_MENU_PLUGIN_DIR . '/forms/FMenuCompositionAdd.php' );
require_once ( EEWEE_RESTAURANT_MENU_PLUGIN_DIR . '/forms/FMenuTypeSearch.php' );
require_once ( EEWEE_RESTAURANT_MENU_PLUGIN_DIR . '/forms/FMenuTypeEdit.php' );
require_once ( EEWEE_RESTAURANT_MENU_PLUGIN_DIR . '/forms/FMenuTypeAdd.php' );
require_once ( EEWEE_RESTAURANT_MENU_PLUGIN_DIR . '/forms/FPlatSearch.php' );
require_once ( EEWEE_RESTAURANT_MENU_PLUGIN_DIR . '/forms/FPlatEdit.php' );
require_once ( EEWEE_RESTAURANT_MENU_PLUGIN_DIR . '/forms/FPlatAdd.php' );
require_once ( EEWEE_RESTAURANT_MENU_PLUGIN_DIR . '/forms/FPlatCategorieSearch.php' );
require_once ( EEWEE_RESTAURANT_MENU_PLUGIN_DIR . '/forms/FPlatCategorieEdit.php' );
require_once ( EEWEE_RESTAURANT_MENU_PLUGIN_DIR . '/forms/FPlatCategorieAdd.php' );
require_once ( EEWEE_RESTAURANT_MENU_PLUGIN_DIR . '/forms/FDeviseSearch.php' );
require_once ( EEWEE_RESTAURANT_MENU_PLUGIN_DIR . '/forms/FDeviseEdit.php' );
require_once ( EEWEE_RESTAURANT_MENU_PLUGIN_DIR . '/forms/FDeviseAdd.php' );
require_once ( EEWEE_RESTAURANT_MENU_PLUGIN_DIR . '/forms/FTaxeSearch.php' );
require_once ( EEWEE_RESTAURANT_MENU_PLUGIN_DIR . '/forms/FTaxeEdit.php' );
require_once ( EEWEE_RESTAURANT_MENU_PLUGIN_DIR . '/forms/FTaxeAdd.php' );
// CONTROLLERS
require_once( EEWEE_RESTAURANT_MENU_PLUGIN_DIR . '/controllers/InstallController.php' );
require_once( EEWEE_RESTAURANT_MENU_PLUGIN_DIR . '/controllers/ToolsController.php' );
require_once( EEWEE_RESTAURANT_MENU_PLUGIN_DIR . '/controllers/ShortcodeController.php' );
require_once( EEWEE_RESTAURANT_MENU_PLUGIN_DIR . '/controllers/AdminController.php' );
$s = new ShortcodeController();

/**
 * Instantiate Classe
 *
 * @since 1.0.0
 */
$adminController = new AdminController();


/**
 * Wordpress Activate/Deactivate
 *
 * @uses register_activation_hook()
 * @uses register_deactivation_hook()
 * @uses register_uninstall_hook()
 *
 * @since 1.0.0
 */
register_activation_hook( __FILE__, array( $adminController, 'eewee_activate' ) );
register_deactivation_hook( __FILE__, array( $adminController, 'eewee_deactivate' ) );
register_uninstall_hook( __FILE__, array( $adminController, 'eewee_uninstall' ) );


/**
 * Required action filters
 *
 * @uses add_action()
 *
 * @since 1.0.0
 */
add_action( 'admin_menu', array( $adminController, 'eewee_adminMenu' ) );


/**
 * Debug
 * 
 * Print session, post, get, files
 */
if( EEWEE_RESTAURANT_MENU_DEBUG ){	
	echo "<pre>"; 
		var_dump( $_SESSION, $_POST, $_GET, $_FILES );
	echo "</pre>"; 
}
?>
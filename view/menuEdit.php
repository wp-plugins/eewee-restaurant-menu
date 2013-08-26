<?php
global $wpdb;

// update
if( $_POST['update'] ){
	$t_menu = new TMenu();
	$r = $t_menu->update( $_POST );
        
	$tools = new ToolsControllers();
	$tools->verifMaj( $r );
}//if

$t_menu = new TMenu();
$r = $t_menu->getMenu($_GET['idMenu']);
?>

<div class="wrap">
    <div id="icon-options-general" class="icon32"><br></div>
    <h2><?php _e('Menu', PLUGIN_NOM_LANG); ?></h2>

    <?php 
    $f_menuEdit = new Form_MenuEdit();
    $f_menuEdit->menuEdit( $r );
    ?>
</div><!-- .wrap -->
 
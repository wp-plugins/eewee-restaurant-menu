<?php
global $wpdb;

// update
if( $_POST['add'] ){
	$t_menu = new TMenu();
	$r = $t_menu->add( $_POST );
	
	$tools = new ToolsControllers();
	$tools->verifMaj( $r );
}//if
?>

<div class="wrap">
    <div id="icon-options-general" class="icon32"><br></div>
    <h2><?php _e('Menu', PLUGIN_NOM_LANG); ?></h2>
	
    <?php 
    $f_menuAdd = new Form_MenuAdd();
    $f_menuAdd->menuAdd( $_POST );
    ?>
</div><!-- .wrap -->
 
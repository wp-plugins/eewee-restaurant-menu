<?php
global $wpdb;

// update
if( $_POST['add'] ){
	$t_menutype = new TMenuType();
	$r = $t_menutype->add( $_POST );
	
	$tools = new ToolsControllers();
	$tools->verifMaj( $r );
}//if
?>

<div class="wrap">
    <div id="icon-options-general" class="icon32"><br></div>
    <h2><?php _e('Menu : type', PLUGIN_NOM_LANG); ?></h2>
	
    <?php 
    $f_menutypeAdd = new Form_MenuTypeAdd();
    $f_menutypeAdd->menutypeAdd( $_POST );
    ?>
</div><!-- .wrap -->
 
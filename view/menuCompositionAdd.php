<?php
global $wpdb;

// update
if( $_POST['add'] ){
	$t_menucomposition = new TMenuComposition();
	$r = $t_menucomposition->add( $_POST );
	
	$tools = new ToolsControllers();
	$tools->verifMaj( $r );
}//if
?>

<div class="wrap">
    <div id="icon-options-general" class="icon32"><br></div>
    <h2><?php _e('Composition of the menu', PLUGIN_NOM_LANG); ?></h2>
	
    <?php 
    $f_menucompositionAdd = new Form_MenuCompositionAdd();
    $f_menucompositionAdd->menucompositionAdd( $_POST );
    ?>
</div><!-- .wrap -->
 
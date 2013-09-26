<?php
global $wpdb;

// update
if( $_POST['update'] ){
	$t_menucomposition = new TMenuComposition();
	$r = $t_menucomposition->update( $_POST );
        
	$tools = new ToolsControllers();
	$tools->verifMaj( $r );
}//if

$t_menucomposition = new TMenuComposition();
$r = $t_menucomposition->getMenuComposition($_GET['idMenuComposition']);
?>

<div class="wrap">
    <div id="icon-options-general" class="icon32"><br></div>
    <h2><?php _e('Composition of the menu', PLUGIN_NOM_LANG); ?></h2>

    <?php 
    $f_menucompositionEdit = new Form_MenuCompositionEdit();
    $f_menucompositionEdit->menucompositionEdit( $r );
    ?>
</div><!-- .wrap -->
 
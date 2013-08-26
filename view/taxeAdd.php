<?php
global $wpdb;

// update
if( $_POST['add'] ){
	$t_taxe = new TTaxe();
	$r = $t_taxe->add( $_POST );
	
	$tools = new ToolsControllers();
	$tools->verifMaj( $r );
}//if
?>

<div class="wrap">
    <div id="icon-options-general" class="icon32"><br></div>
    <h2><?php _e('Tax', PLUGIN_NOM_LANG); ?></h2>
	
    <?php 
    $f_taxeAdd = new Form_TaxeAdd();
    $f_taxeAdd->taxeAdd( $_POST );
    ?>
</div><!-- .wrap -->
 
<?php
global $wpdb;

// update
if( $_POST['update'] ){
	$t_taxe = new TTaxe();
	$r = $t_taxe->update( $_POST );
	
	$tools = new ToolsControllers();
	$tools->verifMaj( $r );
}//if

$t_taxe = new TTaxe();
$r = $t_taxe->getTaxe($_GET['idTaxe']);
?>

<div class="wrap">
    <div id="icon-options-general" class="icon32"><br></div>
    <h2><?php _e('Tax', PLUGIN_NOM_LANG); ?></h2>

    <?php 
    $f_taxeEdit = new Form_TaxeEdit();
    $f_taxeEdit->taxeEdit( $r );
    ?>
</div><!-- .wrap -->
 
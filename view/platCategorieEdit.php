<?php
global $wpdb;

// update
if( $_POST['update'] ){
	$t_platcategorie = new TPlatCategorie();
	$r = $t_platcategorie->update( $_POST );
	
	$tools = new ToolsControllers();
	$tools->verifMaj( $r );
}//if

$t_platcategorie = new TPlatCategorie();
$r = $t_platcategorie->getPlatCategorie($_GET['idPlatCategorie']);
?>

<div class="wrap">
    <div id="icon-options-general" class="icon32"><br></div>
    <h2><?php _e('Category of flat', PLUGIN_NOM_LANG); ?></h2>

    <?php 
    $f_platcategorieEdit = new Form_PlatCategorieEdit();
    $f_platcategorieEdit->platcategorieEdit( $r );
    ?>
</div><!-- .wrap -->
 
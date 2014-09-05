<?php
global $wpdb;

// update
if( $_POST['add'] ){
	$t_platcategorie = new TPlatCategorie();
	$r = $t_platcategorie->add( $_POST );
	
	$tools = new ToolsControllers();
	$tools->verifMaj( $r );
}//if
?>

<div class="wrap">
    <div id="icon-options-general" class="icon32"><br></div>
    <h2><?php _e('Category of flat', PLUGIN_NOM_LANG); ?></h2>
	
    <?php 
    $f_platcategorieAdd = new Form_PlatCategorieAdd();
    $f_platcategorieAdd->platcategorieAdd( $_POST );
    ?>
</div><!-- .wrap -->
 
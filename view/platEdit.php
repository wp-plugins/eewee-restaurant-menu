<?php
global $wpdb;

// update
if( $_POST['update'] ){
	$t_plat = new TPlat();
	$r = $t_plat->update( $_POST );
	
	$tools = new ToolsControllers();
	$tools->verifMaj( $r );
}//if

$t_plat = new TPlat();
$r = $t_plat->getPlat($_GET['idPlat']);
?>

<div class="wrap">
    <div id="icon-options-general" class="icon32"><br></div>
    <h2><?php _e('Plate', PLUGIN_NOM_LANG); ?></h2>

    <?php 
    $f_platEdit = new Form_PlatEdit();
    $f_platEdit->platEdit( $r );
    ?>
</div><!-- .wrap -->
 
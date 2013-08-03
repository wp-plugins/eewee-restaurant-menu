<?php
global $wpdb;

// update
if( $_POST['add'] ){
	$t_plat = new TPlat();
	$r = $t_plat->add( $_POST );
        
        $t_plat_plat = new TLangPlat();
	$r = $t_plat_plat->add( $_POST, $wpdb->insert_id );
    
	$tools = new ToolsControllers();
	$tools->verifMaj( $r );
}//if
?>

<div class="wrap">
    <div id="icon-options-general" class="icon32"><br></div>
    <h2><?php _e('Plate', PLUGIN_NOM_LANG); ?></h2>
	
    <?php 
    $f_platAdd = new Form_PlatAdd();
    $f_platAdd->platAdd( $_POST );
    ?>
</div><!-- .wrap -->
 
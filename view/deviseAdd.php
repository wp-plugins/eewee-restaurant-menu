<?php
global $wpdb;

// update
if( $_POST['add'] ){
	$t_devise = new TDevise();
	$r = $t_devise->add( $_POST );
	
	$tools = new ToolsControllers();
	$tools->verifMaj( $r );
}//if
?>

<div class="wrap">
    <div id="icon-options-general" class="icon32"><br></div>
    <h2><?php _e('Currency', PLUGIN_NOM_LANG); ?></h2>
	
    <?php 
    $f_deviseAdd = new Form_DeviseAdd();
    $f_deviseAdd->deviseAdd( $_POST );
    ?>
</div><!-- .wrap -->
 
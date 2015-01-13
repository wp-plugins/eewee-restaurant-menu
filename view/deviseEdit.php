<?php
global $wpdb;

// update
if( $_POST['update'] ){
	$t_devise = new TDevise();
	$r = $t_devise->update( $_POST );
	
	$tools = new ToolsControllers();
	$tools->verifMaj( $r );
}//if

$t_devise = new TDevise();
$r = $t_devise->getDevise($_GET['idDevise']);
?>

<div class="wrap">
    <div id="icon-options-general" class="icon32"><br></div>
    <h2><?php _e('Currency', PLUGIN_NOM_LANG); ?></h2>

    <?php 
    $f_deviseEdit = new Form_DeviseEdit();
    $f_deviseEdit->deviseEdit( $r );
    ?>
</div><!-- .wrap -->
 
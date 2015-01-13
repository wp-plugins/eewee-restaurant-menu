<?php
global $wpdb;

// update
if( $_POST['update'] ){
	$t_menutype = new TMenuType();
	$r = $t_menutype->update( $_POST );
	
	$tools = new ToolsControllers();
	$tools->verifMaj( $r );
}//if

$t_menutype = new TMenuType();
$r = $t_menutype->getMenuType($_GET['idMenuType']);
?>

<div class="wrap">
    <div id="icon-options-general" class="icon32"><br></div>
    <h2><?php _e('Menu : type', PLUGIN_NOM_LANG); ?></h2>

    <?php 
    $f_menutypeEdit = new Form_MenuTypeEdit();
    $f_menutypeEdit->menutypeEdit( $r );
    ?>
</div><!-- .wrap -->
 
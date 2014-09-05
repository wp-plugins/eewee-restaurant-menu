<?php
global $wpdb;

// update
if( $_POST['add'] ){
	$t_lang = new TLang();
	$r = $t_lang->add( $_POST );
	
	$tools = new ToolsControllers();
	$tools->verifMaj( $r );
}//if
?>

<div class="wrap">
    <div id="icon-options-general" class="icon32"><br></div>
    <h2><?php _e('Lang', PLUGIN_NOM_LANG); ?></h2>
	
    <?php 
    $f_langAdd = new Form_LangAdd();
    $f_langAdd->langAdd( $_POST );
    ?>
</div><!-- .wrap -->
 
<?php global $wpdb; ?>

<div class="wrap" >
    <div id="icon-options-general" class="icon32"><br></div>
    <h2><?php _e('Menu : type', PLUGIN_NOM_LANG); ?> <a href="<?php echo $_SERVER["REQUEST_URI"]."&type=add"; ?>" class="add-new-h2"><?php _e('Add', PLUGIN_NOM_LANG); ?></a></h2>
    
    <?php 
    // FORM
    $f_menutypeSearch = new Form_MenuTypeSearch();
    $f_menutypeSearch->search( $_POST );
    ?>
</div>

<?php
// UPDATE : ETAT
if( $_GET['type'] == "etat" ){
	$t_menutype = new TMenuType();
        $r = $t_menutype->updateEtat($_GET);

        $tools = new ToolsControllers();
	$tools->verifMaj( $r );
}//if
?>


<?php
// SEARCH
if( !empty( $_POST['btn_formMenuTypeSearch'] ) ){
	
	$tbl_reqSuite = array();
	
	//$tbl_reqSuite[] = " ETAT=%s";
	//$tbl_params[] = 0;		
		
	if( !empty( $_POST['formMenuTypeSearch_nom'] ) ){
		$tbl_reqSuite[] = " NOM LIKE %s";
		$tbl_params[] = "%".$_POST['formMenuTypeSearch_nom']."%";		
	}
	$reqSuite = " WHERE ";
	$reqSuite .= implode(" AND ", $tbl_reqSuite);
	$reqSuite .= " ORDER BY ID_MENU_TYPE DESC";
	
}else{
	$reqSuite = " ORDER BY ID_MENU_TYPE DESC";
	$reqSuite .= " LIMIT 50";
}

// req
$t_menutype = new TMenuType();
$r = $t_menutype->getMenuTypes( $reqSuite, $tbl_params );

// display
$render = "
<table class='eewee-table'>
	<tr>
		<th>
			".__('Id', PLUGIN_NOM_LANG)."
		</th>
		<th>
			".__('Name', PLUGIN_NOM_LANG)."
		</th>
		<th>
			".__('State', PLUGIN_NOM_LANG)."
		</th>
		<th>
			".__('Edit', PLUGIN_NOM_LANG)."
		</th>
	</tr>";

	foreach($r as $v){
		$render .= "
		<tr>
			<td class='c'>
				".$v->ID_MENU_TYPE."
			</td>
			<td>
				".$v->NOM."
			</td>
			<td class='c'>";
				
				if( $v->ETAT ){
					$render .= "
					<a href='".EEWEE_RESTAURANT_MENU_URL_SOUS_MENU_3."&type=etat&etat=0&idMenuType=".$v->ID_MENU_TYPE."'>
						<img src='".EEWEE_RESTAURANT_MENU_PLUGIN_URL."/images/icones/disabled.gif' />
					</a>";
				}else{
					$render .= "
					<a href='".EEWEE_RESTAURANT_MENU_URL_SOUS_MENU_3."&type=etat&etat=1&idMenuType=".$v->ID_MENU_TYPE."'>
						<img src='".EEWEE_RESTAURANT_MENU_PLUGIN_URL."/images/icones/enabled.gif' />
					</a>";
				}	
		
			$render .= "
			</td>
			<td class='c'>
				<a href='".EEWEE_RESTAURANT_MENU_URL_SOUS_MENU_3."&type=edit&idMenuType=".$v->ID_MENU_TYPE."'>".__('Edit', PLUGIN_NOM_LANG)."</a>
			</td>
		</tr>";
	}//fin foreach

$render .= "
</table>";
echo $render;
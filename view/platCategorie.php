<?php global $wpdb; ?>

<div class="wrap" >
    <div id="icon-options-general" class="icon32"><br></div>
    <h2><?php _e('Category of flat', PLUGIN_NOM_LANG); ?> <a href="<?php echo $_SERVER["REQUEST_URI"]."&type=add"; ?>" class="add-new-h2"><?php _e('Add', PLUGIN_NOM_LANG); ?></a></h2>
    
    <?php 
    // FORM
    $f_platcategorieSearch = new Form_PlatCategorieSearch();
    $f_platcategorieSearch->search( $_POST );
    ?>
</div>

<?php
// UPDATE : ETAT
if( $_GET['type'] == "etat" ){
	$t_platcategorie = new TPlatCategorie();
        $r = $t_platcategorie->updateEtat($_GET);

        $tools = new ToolsControllers();
	$tools->verifMaj( $r );
}//if
?>


<?php
// SEARCH
if( !empty( $_POST['btn_formPlatCategorieSearch'] ) ){
	
	$tbl_reqSuite = array();
	
	//$tbl_reqSuite[] = " ETAT=%s";
	//$tbl_params[] = 0;		
		
	if( !empty( $_POST['formPlatCategorieSearch_nom'] ) ){
		$tbl_reqSuite[] = " NOM LIKE %s";
		$tbl_params[] = "%".$_POST['formPlatCategorieSearch_nom']."%";		
	}
	$reqSuite = " WHERE ";
	$reqSuite .= implode(" AND ", $tbl_reqSuite);
	$reqSuite .= " ORDER BY ID_PLAT_CATEGORIE DESC";
	
}else{
	$reqSuite = " ORDER BY ID_PLAT_CATEGORIE DESC";
	$reqSuite .= " LIMIT 50";
}

// req
$t_platcategorie = new TPlatCategorie();
$r = $t_platcategorie->getPlatCategories( $reqSuite, $tbl_params );

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
				".$v->ID_PLAT_CATEGORIE."
			</td>
			<td>
				".$v->NOM."
			</td>
			<td class='c'>";
				
				if( $v->ETAT ){
					$render .= "
					<a href='".EEWEE_RESTAURANT_MENU_URL_SOUS_MENU_4."&type=etat&etat=0&idPlatCategorie=".$v->ID_PLAT_CATEGORIE."'>
						<img src='".EEWEE_RESTAURANT_MENU_PLUGIN_URL."/images/icones/disabled.gif' />
					</a>";
				}else{
					$render .= "
					<a href='".EEWEE_RESTAURANT_MENU_URL_SOUS_MENU_4."&type=etat&etat=1&idPlatCategorie=".$v->ID_PLAT_CATEGORIE."'>
						<img src='".EEWEE_RESTAURANT_MENU_PLUGIN_URL."/images/icones/enabled.gif' />
					</a>";
				}	
		
			$render .= "
			</td>
			<td class='c'>
				<a href='".EEWEE_RESTAURANT_MENU_URL_SOUS_MENU_4."&type=edit&idPlatCategorie=".$v->ID_PLAT_CATEGORIE."'>".__('Edit', PLUGIN_NOM_LANG)."</a>
			</td>
		</tr>";
	}//fin foreach

$render .= "
</table>";
echo $render;
<?php global $wpdb; ?>

<div class="wrap" >
    <div id="icon-options-general" class="icon32"><br></div>
    <h2><?php _e('Plate', PLUGIN_NOM_LANG); ?> <a href="<?php echo $_SERVER["REQUEST_URI"]."&type=add"; ?>" class="add-new-h2"><?php _e('Add', PLUGIN_NOM_LANG); ?></a></h2>
    
    <?php 
    // FORM
    $f_platSearch = new Form_PlatSearch();
    $f_platSearch->search( $_POST );
    ?>
</div>

<?php
// UPDATE : ETAT
if( $_GET['type'] == "etat" ){
	$t_plat = new TPlat();
        $r = $t_plat->updateEtat($_GET);

        $tools = new ToolsControllers();
	$tools->verifMaj( $r );
}//if
?>


<?php
// SEARCH
if( !empty( $_POST['btn_formPlatSearch'] ) ){
	
	$tbl_reqSuite = array();
	
	//$tbl_reqSuite[] = " ETAT=%s";
	//$tbl_params[] = 0;		
		
	if( !empty( $_POST['formPlatSearch_nom'] ) ){
		$tbl_reqSuite[] = " NOM LIKE %s";
		$tbl_params[] = "%".$_POST['formPlatSearch_nom']."%";		
	}
        if( !empty( $_POST['formPlatSearch_ingredient'] ) ){
		$tbl_reqSuite[] = " INGREDIENT LIKE %s";
		$tbl_params[] = "%".$_POST['formPlatSearch_ingredient']."%";		
	}
        if( !empty( $_POST['formPlatSearch_categorie'] ) ){
		$tbl_reqSuite[] = " ID_PLAT_CATEGORIE LIKE %s";
		$tbl_params[] = "%".$_POST['formPlatSearch_categorie']."%";		
	}
	$reqSuite = " WHERE ";
	$reqSuite .= implode(" AND ", $tbl_reqSuite);
	$reqSuite .= " ORDER BY ID_PLAT DESC";
	
}else{
	$reqSuite = " ORDER BY ID_PLAT DESC";
	$reqSuite .= " LIMIT 50";
}

// req
$t_plat = new TPlat();
$r = $t_plat->getPlats( $reqSuite, $tbl_params );

// display
$render = "
<table class='eewee-table'>
	<tr>
		<th>
			".__('Category', PLUGIN_NOM_LANG)."
		</th>
		<th>
			".__('Name', PLUGIN_NOM_LANG)."
		</th>
		<th>
			".__('Ingredient', PLUGIN_NOM_LANG)."
		</th>
                <th>
			".__('Price', PLUGIN_NOM_LANG)."
		</th>
                <th>
			".__('Order', PLUGIN_NOM_LANG)."
		</th>
                <th>
			".__('State', PLUGIN_NOM_LANG)."
		</th>
		<th>
			".__('Edit', PLUGIN_NOM_LANG)."
		</th>
	</tr>";

        $t_plat_categorie = new TPlatCategorie();
	foreach($r as $v){
                $categ = $t_plat_categorie->getPlatCategorie($v->ID_PLAT_CATEGORIE);
            
		$render .= "
		<tr>
			<td class='c'>
				".$categ[0]->NOM."
			</td>
			<td>
				".$v->NOM."
			</td>
                        <td>
				".$v->INGREDIENT."
			</td>
                        <td>
				".$v->PRIX."
			</td>
                        <td>
				".$v->ORDER_PLAT."
			</td>
			<td class='c'>";
				
				if( $v->ETAT ){
					$render .= "
					<a href='".EEWEE_RESTAURANT_MENU_URL_SOUS_MENU_5."&type=etat&etat=0&idPlat=".$v->ID_PLAT."'>
						<img src='".EEWEE_RESTAURANT_MENU_PLUGIN_URL."/images/icones/disabled.gif' />
					</a>";
				}else{
					$render .= "
					<a href='".EEWEE_RESTAURANT_MENU_URL_SOUS_MENU_5."&type=etat&etat=1&idPlat=".$v->ID_PLAT."'>
						<img src='".EEWEE_RESTAURANT_MENU_PLUGIN_URL."/images/icones/enabled.gif' />
					</a>";
				}	
		
			$render .= "
			</td>
			<td class='c'>
				<a href='".EEWEE_RESTAURANT_MENU_URL_SOUS_MENU_5."&type=edit&idPlat=".$v->ID_PLAT."'>".__('Edit', PLUGIN_NOM_LANG)."</a>
			</td>
		</tr>";
	}//fin foreach

$render .= "
</table>";
echo $render;
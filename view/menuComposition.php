<?php global $wpdb; ?>

<div class="wrap" >
    <div id="icon-options-general" class="icon32"><br></div>
    <h2><?php _e('Composition of the menu', PLUGIN_NOM_LANG); ?> <a href="<?php echo $_SERVER["REQUEST_URI"]."&type=add"; ?>" class="add-new-h2"><?php _e('Add', PLUGIN_NOM_LANG); ?></a></h2>
    
    <?php 
    // FORM
    $f_menucompositionSearch = new Form_MenuCompositionSearch();
    $f_menucompositionSearch->search( $_POST );
    ?>
</div>

<?php
// UPDATE : ETAT
if( $_GET['type'] == "etat" ){
	$t_menucomposition = new TMenuComposition();
        $r = $t_menucomposition->updateEtat($_GET);

        $tools = new ToolsControllers();
	$tools->verifMaj( $r );
}//if
?>


<?php
// SEARCH
if( !empty( $_POST['btn_formMenuCompositionSearch'] ) ){
	
	$tbl_reqSuite = array();
	
	//$tbl_reqSuite[] = " ETAT=%s";
	//$tbl_params[] = 0;		
		
	if( !empty( $_POST['formMenuCompositionSearch_menu'] ) ){
		$tbl_reqSuite[] = " ID_MENU_CATEGORIE LIKE %d";
		$tbl_params[] = $_POST['formMenuCompositionSearch_menu'];		
	}
        if( !empty( $_POST['formMenuCompositionSearch_menuType'] ) ){
		$tbl_reqSuite[] = " ID_MENU_TYPE LIKE %d";
		$tbl_params[] = $_POST['formMenuCompositionSearch_menuType'];		
	}
        if( !empty( $_POST['formMenuCompositionSearch_plat'] ) ){
		$tbl_reqSuite[] = " ID_PLAT LIKE %d";
		$tbl_params[] = $_POST['formMenuCompositionSearch_plat'];		
	}
	$reqSuite = " WHERE ";
	$reqSuite .= implode(" AND ", $tbl_reqSuite);
	$reqSuite .= " ORDER BY ID_MENU_COMPOSITION DESC";
	
}else{
	$reqSuite = " ORDER BY ID_MENU_COMPOSITION DESC";
	$reqSuite .= " LIMIT 50";
}

// req
$t_menucomposition = new TMenuComposition();
$r = $t_menucomposition->getMenuCompositions( $reqSuite, $tbl_params );

// display
$render = "
<table class='eewee-table'>
	<tr>
		<th>
			".__('Menu', PLUGIN_NOM_LANG)."
		</th>
		<th>
			".__('Type', PLUGIN_NOM_LANG)."
		</th>
		<th>
			".__('Plate', PLUGIN_NOM_LANG)."
		</th>
		<th>
			".__('Edit', PLUGIN_NOM_LANG)."
		</th>
	</tr>";

        $t_menu = new TMenu();
        $t_type = new TMenuType();
        $t_plat = new TPlat();

	foreach($r as $v){
                $menu = $t_menu->getMenu($v->ID_MENU_CATEGORIE);
                $type = $t_type->getMenuType($v->ID_MENU_TYPE);
                $plat = $t_plat->getPlat($v->ID_PLAT);
            
		$render .= "
		<tr>
			<td class='c'>
				".$menu[0]->NOM."
			</td>
                        <td class='c'>
				".$type[0]->NOM."
			</td>
                        <td class='c'>
				".$plat[0]->NOM."
			</td>
			<td class='c'>
				<a href='".EEWEE_RESTAURANT_MENU_URL_SOUS_MENU_2."&type=edit&idMenuComposition=".$v->ID_MENU_COMPOSITION."'>".__('Edit', PLUGIN_NOM_LANG)."</a>
			</td>
		</tr>";
	}//fin foreach

$render .= "
</table>";
echo $render;
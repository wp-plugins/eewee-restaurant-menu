<?php global $wpdb; ?>

<div class="wrap" >
    <div id="icon-options-general" class="icon32"><br></div>
    <h2><?php _e('Tax', PLUGIN_NOM_LANG); ?> <a href="<?php echo $_SERVER["REQUEST_URI"]."&type=add"; ?>" class="add-new-h2"><?php _e('Add', PLUGIN_NOM_LANG); ?></a></h2>
    
    <?php 
    // FORM
    $f_taxSearch = new Form_TaxeSearch();
    $f_taxSearch->search( $_POST );
    ?>
</div>

<?php
// UPDATE : ETAT
if( $_GET['type'] == "etat" ){
	$t_taxe = new TTaxe();
        $r = $t_taxe->updateEtat($_GET);

        $tools = new ToolsControllers();
	$tools->verifMaj( $r );
}//if
?>


<?php
// SEARCH
if( !empty( $_POST['btn_formTaxSearch'] ) ){
	
	$tbl_reqSuite = array();
	
	//$tbl_reqSuite[] = " ETAT=%s";
	//$tbl_params[] = 0;		
		
	if( !empty( $_POST['formTaxSearch_nom'] ) ){
		$tbl_reqSuite[] = " NOM LIKE %s";
		$tbl_params[] = "%".$_POST['formTaxSearch_nom']."%";		
	}
	$reqSuite = " WHERE ";
	$reqSuite .= implode(" AND ", $tbl_reqSuite);
	$reqSuite .= " ORDER BY ID_TAXE DESC";
	
}else{
	$reqSuite = " ORDER BY ID_TAXE DESC";
	$reqSuite .= " LIMIT 50";
}

// req
$t_tax = new TTaxe();
$r = $t_tax->getTaxes( $reqSuite, $tbl_params );

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
				".$v->ID_TAXE."
			</td>
			<td>
				".$v->NOM."
			</td>
			<td class='c'>";
				
				if( $v->ETAT ){
					$render .= "
					<a href='".EEWEE_RESTAURANT_MENU_URL_SOUS_MENU_7."&type=etat&etat=0&idTaxe=".$v->ID_TAXE."'>
						<img src='".EEWEE_RESTAURANT_MENU_PLUGIN_URL."/images/icones/disabled.gif' />
					</a>";
				}else{
					$render .= "
					<a href='".EEWEE_RESTAURANT_MENU_URL_SOUS_MENU_7."&type=etat&etat=1&idTaxe=".$v->ID_TAXE."'>
						<img src='".EEWEE_RESTAURANT_MENU_PLUGIN_URL."/images/icones/enabled.gif' />
					</a>";
				}	
		
			$render .= "
			</td>
			<td class='c'>
				<a href='".$_SERVER["REQUEST_URI"]."&type=edit&idTaxe=".$v->ID_TAXE."'>".__('Edit', PLUGIN_NOM_LANG)."</a>
			</td>
		</tr>";
	}//fin foreach

$render .= "
</table>";
echo $render;
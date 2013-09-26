<?php
if( $_GET['type'] == "edit" ){		include(EEWEE_RESTAURANT_MENU_PLUGIN_DIR.'/view/menuCompositionEdit.php');
}elseif( $_GET['type'] == "delete" ){	include(EEWEE_RESTAURANT_MENU_PLUGIN_DIR.'/view/menuCompositionDelete.php');
}elseif( $_GET['type'] == "add" ){	include(EEWEE_RESTAURANT_MENU_PLUGIN_DIR.'/view/menuCompositionAdd.php');
}else{					include(EEWEE_RESTAURANT_MENU_PLUGIN_DIR.'/view/menuComposition.php');
}
?>
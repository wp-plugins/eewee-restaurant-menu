<?php
if( $_GET['type'] == "edit" ){		include(EEWEE_RESTAURANT_MENU_PLUGIN_DIR.'/view/platCategorieEdit.php');
}elseif( $_GET['type'] == "delete" ){	include(EEWEE_RESTAURANT_MENU_PLUGIN_DIR.'/view/platCategorieDelete.php');
}elseif( $_GET['type'] == "add" ){	include(EEWEE_RESTAURANT_MENU_PLUGIN_DIR.'/view/platCategorieAdd.php');
}else{					include(EEWEE_RESTAURANT_MENU_PLUGIN_DIR.'/view/platCategorie.php');
}
?>
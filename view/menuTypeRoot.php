<?php
if( $_GET['type'] == "edit" ){		include(EEWEE_RESTAURANT_MENU_PLUGIN_DIR.'/view/menuTypeEdit.php');
}elseif( $_GET['type'] == "delete" ){	include(EEWEE_RESTAURANT_MENU_PLUGIN_DIR.'/view/menuTypeDelete.php');
}elseif( $_GET['type'] == "add" ){	include(EEWEE_RESTAURANT_MENU_PLUGIN_DIR.'/view/menuTypeAdd.php');
}else{					include(EEWEE_RESTAURANT_MENU_PLUGIN_DIR.'/view/menuType.php');
}
?>
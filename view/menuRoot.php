<?php
if( $_GET['type'] == "edit" ){		include(EEWEE_RESTAURANT_MENU_PLUGIN_DIR.'/view/menuEdit.php');
}elseif( $_GET['type'] == "delete" ){	include(EEWEE_RESTAURANT_MENU_PLUGIN_DIR.'/view/menuDelete.php');
}elseif( $_GET['type'] == "add" ){	include(EEWEE_RESTAURANT_MENU_PLUGIN_DIR.'/view/menuAdd.php');
}else{					include(EEWEE_RESTAURANT_MENU_PLUGIN_DIR.'/view/menu.php');
}
?>
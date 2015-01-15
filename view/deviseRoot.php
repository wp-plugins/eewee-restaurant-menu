<?php
if( $_GET['type'] == "edit" ){		include(EEWEE_RESTAURANT_MENU_PLUGIN_DIR.'/view/deviseEdit.php');
}elseif( $_GET['type'] == "delete" ){	include(EEWEE_RESTAURANT_MENU_PLUGIN_DIR.'/view/deviseDelete.php');
}elseif( $_GET['type'] == "add" ){	include(EEWEE_RESTAURANT_MENU_PLUGIN_DIR.'/view/deviseAdd.php');
}else{					include(EEWEE_RESTAURANT_MENU_PLUGIN_DIR.'/view/devise.php');
}
?>
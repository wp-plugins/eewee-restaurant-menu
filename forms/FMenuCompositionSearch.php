<?php
if( !class_exists(Form_MenuCompositionSearch)){
	class Form_MenuCompositionSearch extends WP_Query{
		
		private $_action;
		
		function __construct(){
			$this->_action = $_SERVER["REQUEST_URI"];
		}
		
		/**
		 * retourn form
 		 * @param $_POST $p
		 */
		public function search( $p ){ ?>
			
			<form method="post" action="<?php echo $this->_action; ?>">
		
				<div class="postbox " id="postexcerpt">
					<h3 class="hndle"><span><?php _e('Search', PLUGIN_NOM_LANG); ?></span></h3>
					<div class="inside">
					
                                            <table class='table1'>
                                                <tr>
                                                        <th>
                                                                <?php _e('Menu', PLUGIN_NOM_LANG); ?> :  
                                                        </th>
                                                        <td>
                                                                <?php 
                                                                $t_menu	= new TMenu();
                                                                $menus 	= $t_menu->getMenus();
                                                                ?><select name='formMenuCompositionSearch_menu'>
                                                                    <option></option>
                                                                    <?php foreach( $menus as $menu ){
                                                                                if( $menu->ID_MENU == $p['formMenuCompositionSearch_menu'] ){
                                                                                        $selected = "selected";
                                                                                }else{
                                                                                        $selected = "";
                                                                                }

                                                                                ?><option value="<?php echo $menu->ID_MENU; ?>" <?php echo $selected; ?>><?php echo $menu->NOM; ?></option><?php
                                                                        }
                                                                ?></select>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th>
                                                                <?php _e('Type', PLUGIN_NOM_LANG); ?> :  
                                                        </th>
                                                        <td>
                                                                <?php 
                                                                $t_menuType	= new TMenuType();
                                                                $menuTypes 	= $t_menuType->getMenuTypes();
                                                                ?><select name='formMenuCompositionSearch_menuType'>
                                                                        <option></option>
                                                                        <?php foreach( $menuTypes as $menuType ){
                                                                                if( $menuType->ID_MENU_TYPE == $p['formMenuCompositionSearch_menuType'] ){
                                                                                        $selected = "selected";
                                                                                }else{
                                                                                        $selected = "";
                                                                                }

                                                                                ?><option value="<?php echo $menuType->ID_MENU_TYPE; ?>" <?php echo $selected; ?>><?php echo $menuType->NOM; ?></option><?php
                                                                        }
                                                                ?></select>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th>
                                                                <?php _e('Plate', PLUGIN_NOM_LANG); ?> :  
                                                        </th>
                                                        <td>
                                                                <?php 
                                                                $t_plat	= new TPlat();
                                                                $plats 	= $t_plat->getPlats();
                                                                ?><select name='formMenuCompositionSearch_plat'>
                                                                        <option></option>
                                                                        <?php foreach( $plats as $plat ){
                                                                                if( $plat->ID_PLAT == $p['formMenuCompositionSearch_plat'] ){
                                                                                        $selected = "selected";
                                                                                }else{
                                                                                        $selected = "";
                                                                                }

                                                                                ?><option value="<?php echo $plat->ID_PLAT; ?>" <?php echo $selected; ?>><?php echo $plat->NOM; ?></option><?php
                                                                        }
                                                                ?></select>
                                                        </td>
                                                </tr>
                                            </table>
                                            
                                            <p>
                                                    <div class="submit">
                                                <input type="submit" name="btn_formMenuCompositionSearch" value="<?php _e('Validate the research', PLUGIN_NOM_LANG); ?>" class="button button-primary" />
                                            </div>
                                            </p>
						
					</div>
				</div>
		
			</form>
			
		<?php
		}
		
	}
}
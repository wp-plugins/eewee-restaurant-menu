<?php
if( !class_exists(Form_MenuCompositionEdit)){
	class Form_MenuCompositionEdit extends WP_Query{
		
		private $_action;
                private $_returnUrl;
		
		function __construct(){
			$this->_action      = $_SERVER["REQUEST_URI"];
                        $this->_returnUrl   = EEWEE_RESTAURANT_MENU_URL_BACK_SOUS_MENU_2;
		}
		
		/**
		 * retourn form
 		 * @param array $r
 		 */ 
		public function menucompositionEdit( $r ){ ?>
			
			<form method="post" action="<?php echo $this->_action; ?>">
				<input type='hidden' name='form_id' value='<?php echo $r[0]->ID_MENU_COMPOSITION; ?>' />
				
				<div class="submit">
		            <input type="submit" name="update" value="<?php _e('Update', PLUGIN_NOM_LANG); ?>" class="button button-primary" /> 
		            <a href='<?php echo $this->_returnUrl; ?>' class='button'><?php _e('Back', PLUGIN_NOM_LANG); ?></a>
		        </div>
		        
		        <div class="postbox " id="postexcerpt">
					<h3 class="hndle"><span><?php _e('Edit', PLUGIN_NOM_LANG); ?></span></h3>
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
                                                                ?><select name='form_menuComposition'><?php
                                                                        foreach( $menus as $menu ){
                                                                                if( $menu->ID_MENU_CATEGORIE == $r[0]->ID_MENU_CATEGORIE ){
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
                                                                ?><select name='form_menuType'><?php
                                                                        foreach( $menuTypes as $menuType ){
                                                                                if( $menuType->ID_MENU_TYPE == $r[0]->ID_MENU_TYPE ){
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
                                                                ?><select name='form_plat'><?php
                                                                        foreach( $plats as $plat ){
                                                                                if( $plat->ID_PLAT == $r[0]->ID_PLAT ){
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
					      
			       </div>
				</div><?php //postbox ?>
		       
		        <div class="submit">
		            <input type="submit" name="update" value="<?php _e('Update', PLUGIN_NOM_LANG); ?>" class="button button-primary" /> 
		            <a href='<?php echo $this->_returnUrl; ?>' class='button'><?php _e('Back', PLUGIN_NOM_LANG); ?></a>
		        </div>
		
			</form>

		<?php
		}
		
	}//class
}//if
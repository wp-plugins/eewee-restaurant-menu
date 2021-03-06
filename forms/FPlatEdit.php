<?php
if( !class_exists(Form_PlatEdit)){
	class Form_PlatEdit extends WP_Query{
		
		private $_action;
                private $_returnUrl;
		
		function __construct(){
			$this->_action      = $_SERVER["REQUEST_URI"];
                        $this->_returnUrl   = EEWEE_RESTAURANT_MENU_URL_BACK_SOUS_MENU_5;
		}
		
		/**
		 * retourn form
 		 * @param array $r
 		 */ 
		public function platEdit( $r ){
                    $t_lang = new TLang();
                    $langs = $t_lang->getLangs(); ?>
			
			<form method="post" action="<?php echo $this->_action; ?>">
                                <input type='hidden' name='form_id' value='<?php echo $r[0]->ID_PLAT; ?>' />
                                
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
                                                                <?php _e('Category', PLUGIN_NOM_LANG); ?> :  
                                                        </th>
                                                        <td>
                                                                <?php 
                                                                $t_plat_categorie	= new TPlatCategorie();
                                                                $platCategories  	= $t_plat_categorie->getPlatCategories();
                                                                ?><select name='form_categorie'><?php
                                                                        foreach( $platCategories as $platCategorie ){
                                                                                if( $platCategorie->ID_PLAT_CATEGORIE == $r[0]->ID_PLAT_CATEGORIE ){
                                                                                        $selected = "selected";
                                                                                }else{
                                                                                        $selected = "";
                                                                                }

                                                                                ?><option value="<?php echo $platCategorie->ID_PLAT_CATEGORIE; ?>" <?php echo $selected; ?>><?php echo $platCategorie->NOM; ?></option><?php
                                                                        }
                                                                ?></select>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th>
                                                             <?php _e('Name', PLUGIN_NOM_LANG); ?> : 
                                                        </th>
                                                        <td>
                                                             <input type="text" name="form_nom" value="<?php echo $r[0]->NOM; ?>" />
                                                        </td>
                                                </tr>
                                                <?php
                                                if( sizeof($langs) > 0 ){
                                                    foreach( $langs as $lang ){ 
                                                        $t_lang_plat = new TLangPlat();
                                                        $req        = " WHERE ID_LANG=%d AND ID_PLAT=%d";
                                                        $params     = array();
                                                        $params[]   = $lang->ID_LANG;
                                                        $params[]   = $r[0]->ID_PLAT;
                                                        $langPlat   = $t_lang_plat->getLangPlats($req, $params);
                                                        ?>
                                                        <tr>
                                                            <th>
                                                                 <?php _e('Name', PLUGIN_NOM_LANG); echo " (".$lang->NOM.")"; ?> : 
                                                            </th>
                                                            <td>
                                                                 <input type="text" name="form_nom_<?php echo $lang->ID_LANG; ?>" value="<?php echo $langPlat[0]->NOM; ?>" />    
                                                            </td>
                                                        </tr>
                                                    <?php
                                                    }//for
                                                }//if ?>
                                                <tr>
                                                        <th>
                                                             <?php _e('Ingredient', PLUGIN_NOM_LANG); ?> : 
                                                        </th>
                                                        <td>
                                                            <input type="text" name="form_ingredient" value="<?php echo $r[0]->INGREDIENT; ?>" /><br />
                                                            <p class="description"><?php _e('ex: xxx, yyy, zzz', PLUGIN_NOM_LANG); ?></p>
                                                        </td>
                                                </tr>
                                                <?php
                                                if( sizeof($langs) > 0 ){
                                                    foreach( $langs as $lang ){
                                                        $t_lang_plat = new TLangPlat();
                                                        $req        = " WHERE ID_LANG=%d AND ID_PLAT=%d";
                                                        $params     = array();
                                                        $params[]   = $lang->ID_LANG;
                                                        $params[]   = $r[0]->ID_PLAT;
                                                        $langPlat   = $t_lang_plat->getLangPlats($req, $params);
                                                        ?>
                                                        <tr>
                                                            <th>
                                                                 <?php _e('Ingredient', PLUGIN_NOM_LANG); echo " (".$lang->NOM.")"; ?> : 
                                                            </th>
                                                            <td>
                                                                 <input type="text" name="form_ingredient_<?php echo $lang->ID_LANG; ?>" value="<?php echo $langPlat[0]->INGREDIENT; ?>" /><br />
                                                                 <p class="description"><?php _e('ex: xxx, yyy, zzz', PLUGIN_NOM_LANG); ?></p>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                    }//for
                                                }//if ?>
                                                <tr>
                                                        <th>
                                                            <?php _e('Price', PLUGIN_NOM_LANG); ?> : 
                                                        </th>
                                                        <td>
                                                            <input type="text" name="form_prix" value="<?php echo $r[0]->PRIX; ?>" /><br />
                                                            <p class="description"><?php _e('ex: 10.50', PLUGIN_NOM_LANG); ?></p>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th>
                                                            <?php _e('Order', PLUGIN_NOM_LANG); ?> : 
                                                        </th>
                                                        <td>
                                                            <input type="text" name="form_order" value="<?php echo $r[0]->ORDER_PLAT; ?>" /><br />
                                                            <p class="description"><?php _e('ex: 10', PLUGIN_NOM_LANG); ?></p>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th>
                                                            <?php _e('State', PLUGIN_NOM_LANG); ?> :     
                                                        </th>
                                                        <td>
                                                            <?php 
                                                            $etat_on = $etat_off = "";
                                                            if( $r[0]->ETAT == 0 ){	$etat_on = "checked";
                                                            }else{			$etat_off = "checked";
                                                            } ?>

                                                            <input type="radio" id="statut_on" name="form_etat" value="0" <?php echo $etat_on; ?> /> 
                                                            <label for="etat_on">
                                                                    <img src='<?php echo EEWEE_RESTAURANT_MENU_PLUGIN_URL; ?>/images/icones/enabled.gif' />
                                                            </label>

                                                            <input type="radio" id="statut_off" name="form_etat" value="1" <?php echo $etat_off; ?> />
                                                            <label for="etat_off">
                                                                    <img src='<?php echo EEWEE_RESTAURANT_MENU_PLUGIN_URL; ?>/images/icones/disabled.gif' />
                                                            </label>    
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
<?php
if( !class_exists(Form_PlatCategorieAdd)){
	class Form_PlatCategorieAdd extends WP_Query{
		
		private $_action;
		private $_returnUrl;
		
		function __construct(){
			$this->_action      = $_SERVER["REQUEST_URI"];
                        $this->_returnUrl   = EEWEE_RESTAURANT_MENU_URL_BACK_SOUS_MENU_4;
		}
		
		/**
		 * retourn form
 		 * @param $_POST $p
 		 */ 
		public function platcategorieAdd( $p="" ){ ?>
			<form method="post" action="<?php echo $this->_action; ?>">
				<input type='hidden' name='form_id' value='<?php echo $p[0]->ID_PLAT_CATEGORIE; ?>' />
				
				<div class="submit">
		            <input type="submit" name="add" value="<?php _e('Save', PLUGIN_NOM_LANG); ?>" class="button button-primary" /> 
		            <a href='<?php echo $this->_returnUrl; ?>' class='button'><?php _e('Back', PLUGIN_NOM_LANG); ?></a>
		        </div>
		        
		        <div class="postbox " id="postexcerpt">
					<h3 class="hndle"><span><?php _e('Edit', PLUGIN_NOM_LANG); ?></span></h3>
					<div class="inside">
			
						<p>
							<?php _e('Name', PLUGIN_NOM_LANG); ?> : <input type="text" name="form_nom" value="<?php echo $p[0]->NOM; ?>" />
						</p>
						<p>
							<?php 
							$etat_on = $etat_off = "";
							if( $p[0]->ETAT == 0 ){	$etat_on = "checked";
							}else{			$etat_off = "checked";
							} ?>
		
							<?php _e('State', PLUGIN_NOM_LANG); ?> : 
							<input type="radio" id="statut_on" name="form_etat" value="0" <?php echo $etat_on; ?> /> 
							<label for="etat_on">
								<img src='<?php echo EEWEE_RESTAURANT_MENU_PLUGIN_URL; ?>/images/icones/enabled.gif' />
							</label>
							
							<input type="radio" id="statut_off" name="form_etat" value="1" <?php echo $etat_off; ?> />
							<label for="etat_off">
								<img src='<?php echo EEWEE_RESTAURANT_MENU_PLUGIN_URL; ?>/images/icones/disabled.gif' />
							</label>
						</p>
						
			       </div>
				</div><?php //postbox ?>
		       
		        <div class="submit">
		            <input type="submit" name="add" value="<?php _e('Save', PLUGIN_NOM_LANG); ?>" class="button button-primary" /> 
		            <a href='<?php echo $this->_returnUrl; ?>' class='button'><?php _e('Back', PLUGIN_NOM_LANG); ?></a>
		        </div>
		
			</form>
		<?php
		}
		
	}
}
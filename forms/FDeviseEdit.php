<?php
if( !class_exists(Form_DeviseEdit)){
	class Form_DeviseEdit extends WP_Query{
		
		private $_action;
                private $_returnUrl;
		
		function __construct(){
			$this->_action      = $_SERVER["REQUEST_URI"];
                        $this->_returnUrl   = EEWEE_RESTAURANT_MENU_URL_BACK_SOUS_MENU_6;
		}
		
		/**
		 * retourn form
 		 * @param array $r
 		 */ 
		public function deviseEdit( $r ){ ?>
			
			<form method="post" action="<?php echo $this->_action; ?>">
				<input type='hidden' name='form_id' value='<?php echo $r[0]->ID_DEVISE; ?>' />
				
				<div class="submit">
		            <input type="submit" name="update" value="<?php _e('Update', PLUGIN_NOM_LANG); ?>" class="button button-primary" /> 
		            <a href='<?php echo $this->_returnUrl; ?>' class='button'><?php _e('Back', PLUGIN_NOM_LANG); ?></a>
		        </div>
		        
		        <div class="postbox " id="postexcerpt">
					<h3 class="hndle"><span><?php _e('Edit', PLUGIN_NOM_LANG); ?></span></h3>
					<div class="inside">
			
						<p>
							<?php _e('Name', PLUGIN_NOM_LANG); ?> : 
                                                        <input type="text" name="form_nom" value="<?php echo $r[0]->NOM; ?>" />
						</p>
                                                <p>
                                                        <?php
                                                        $selected0 = $selected1 = "";
                                                        if( $r[0]->LOCATION == 0 ){ $selected0 = "selected"; }
                                                        if( $r[0]->LOCATION == 1 ){ $selected1 = "selected"; }
                                                        ?>
                                                    
							<?php _e('Location', PLUGIN_NOM_LANG); ?> : 
                                                        <select name='form_location'>
                                                            <option value='0' <?php echo $selected0; ?>><?php _e('After', PLUGIN_NOM_LANG); ?></option>
                                                            <option value='1' <?php echo $selected1; ?>><?php _e('Before', PLUGIN_NOM_LANG); ?></option>
                                                        </select>
						</p>
                                                <p>
                                                        <?php
                                                        $selected = "";
                                                        $t_devise = new TDevise();
                                                        $separator = $t_devise->getSeparator();
                                                        ?>
                                                    
							<?php _e('Separator', PLUGIN_NOM_LANG); ?> : 
                                                        <select name='form_separator'>
                                                            <?php 
                                                            foreach( $separator as $k=>$v ){ 
                                                                if( $r[0]->SEPARATOR == $k ){ $selected = "selected"; }else{ $selected = ""; }
                                                                ?>
                                                                
                                                                <option value='<?php echo $k; ?>' <?php echo $selected; ?>><?php echo $v; ?></option>
                                                                
                                                            <?php
                                                            } ?>
                                                        </select>
						</p>
						<p>
							<?php 
							$etat_on = $etat_off = "";
							if( $r[0]->ETAT == 0 ){	$etat_on = "checked";
							}else{			$etat_off = "checked";
							} ?>
		
							<?php _e('State', PLUGIN_NOM_LANG); ?> : 
							<input type="radio" id="etat_on" name="form_etat" value="0" <?php echo $etat_on; ?> /> 
							<label for="etat_on">
								<img src='<?php echo EEWEE_RESTAURANT_MENU_PLUGIN_URL; ?>/images/icones/enabled.gif' />
							</label>
							
							<input type="radio" id="etat_off" name="form_etat" value="1" <?php echo $etat_off; ?> />
							<label for="etat_off">
								<img src='<?php echo EEWEE_RESTAURANT_MENU_PLUGIN_URL; ?>/images/icones/disabled.gif' />
							</label>
						</p>
					      
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
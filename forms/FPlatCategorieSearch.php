<?php
if( !class_exists(Form_PlatCategorieSearch)){
	class Form_PlatCategorieSearch extends WP_Query{
		
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
					
						<p>
							<?php _e('Name', PLUGIN_NOM_LANG); ?> : <input type="text" name="formPlatCategorieSearch_nom" value="<?php echo $p['formPlatCategorieSearch_nom']; ?>" />
							
							<div class="submit">
					            <input type="submit" name="btn_formPlatCategorieSearch" value="<?php _e('Validate the research', PLUGIN_NOM_LANG); ?>" class="button button-primary" />
					        </div>
						</p>
						
					</div>
				</div>
		
			</form>
			
		<?php
		}
		
	}
}
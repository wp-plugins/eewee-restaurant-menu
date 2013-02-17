<?php
if( !class_exists(TMenuComposition)){
	class TMenuComposition extends WP_Query{
		
		private $_table;
		
		function __construct(){
			$this->_table = EEWEE_RESTAURANT_MENU_PREFIXE_BDD."menu_composition";
		}
		
		/**
		 * retourn rows 
		 */
		public function getMenuCompositions( $req="", $params="" ){
			global $wpdb;
			$sql	= $wpdb->prepare("SELECT * FROM ".$this->_table." ".$req, $params);
			$r		= $wpdb->get_results($sql);
			return $r;
		}
		
		/**
		 * retourn row
		 * @param int $id
		 */
		public function getMenuComposition( $id ){
			global $wpdb;
			$sql	= $wpdb->prepare("SELECT * FROM ".$this->_table." WHERE ID_MENU_COMPOSITION=%d", $id);
			$r		= $wpdb->get_results($sql);
			return $r;
		}
		
		/**
		 * Add in table
		 * @param $_POST $p
		 */
		public function add( $p ){
			global $wpdb;
			$r = $wpdb->insert(
				$this->_table,
				array(
					'ID_MENU_CATEGORIE' => $p['form_menuComposition'],
					'ID_MENU_TYPE' => $p['form_menuType'],
                                        'ID_PLAT' => $p['form_plat']
				),
				array(
					'%d',
                                        '%d',
					'%d'
				)
			);
			return $r;
		}
                
		/**
		 * update
		 * @param $_POST $p
		 */
		public function update( $p ){
			global $wpdb;
                        $r = $wpdb->update(
                                $this->_table,
                                // SET (valeur)
                                array(
                                        'ID_MENU_CATEGORIE' => $p['form_menuComposition'],
					'ID_MENU_TYPE' => $p['form_menuType'],
                                        'ID_PLAT' => $p['form_plat']
                                ),
                                // WHERE (valeur)
                                array(
                                        'ID_MENU_COMPOSITION' => $p['form_id']
                                ),
                                // SET (type)
                                array(
                                        '%d',
                                        '%d',
                                        '%d'
                                ),
                                // WHERE (type)
                                array(
                                        '%d'
                                )
                        );
			return $r;
		}
		
	}
}
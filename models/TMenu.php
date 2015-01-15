<?php
if( !class_exists(TMenu)){
	class TMenu extends WP_Query{
		
		private $_table;
		
		function __construct(){
			$this->_table = EEWEE_RESTAURANT_MENU_PREFIXE_BDD."menu";
		}
		
		/**
		 * retourn rows 
		 */
		public function getMenus( $req="", $params="" ){
			global $wpdb;
			$sql	= $wpdb->prepare("SELECT * FROM ".$this->_table." ".$req, $params);
			$r		= $wpdb->get_results($sql);
			return $r;
		}
		
		/**
		 * retourn row
		 * @param int $id
		 */
		public function getMenu( $id ){
			global $wpdb;
			$sql	= $wpdb->prepare("SELECT * FROM ".$this->_table." WHERE ID_MENU=%d", $id);
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
					'NOM' => stripslashes($p['form_nom']),
                                        'PRIX' => $p['form_prix'],
					'ETAT' => $p['form_etat']
				),
				array(
					'%s',
                                        '%f',
					'%d'
				)
			);
			return $r;
		}
                
                /**
		 * update etat
		 * @param $_POST $p
		 */
		public function updateEtat( $g ){
			global $wpdb;
                        $r = $wpdb->update(
                                $this->_table,
                                // SET (valeur)
                                array(
                                        'ETAT' => $g['etat']
                                ),
                                // WHERE (valeur)
                                array(
                                        'ID_MENU' => $g['idMenu']
                                ),
                                // SET (type)
                                array(
                                        '%d'
                                ),
                                // WHERE (type)
                                array(
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
					'NOM' => stripslashes($p['form_nom']),
					'PRIX' => $p['form_prix'],
					'ETAT' => $p['form_etat']
				),
				// WHERE (valeur)
				array(
					'ID_MENU' => $p['form_id']
				),
				// SET (type)
				array(
					'%s',
                                        '%f',
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
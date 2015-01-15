<?php
if( !class_exists(TPlatCategorie)){
	class TPlatCategorie extends WP_Query{
		
		private $_table;
		
		function __construct(){
			$this->_table = EEWEE_RESTAURANT_MENU_PREFIXE_BDD."plat_categorie";
		}
		
		/**
		 * retourn rows
		 */
		public function getPlatCategories( $req="", $params="" ){
			global $wpdb;
			$sql	= $wpdb->prepare("SELECT * FROM ".$this->_table." ".$req, $params);
			$r		= $wpdb->get_results($sql);
			return $r;
		}
		
		/**
		 * retourn row
		 * @param int $id
		 */
		public function getPlatCategorie( $id ){
			global $wpdb;
			$sql	= $wpdb->prepare("SELECT * FROM ".$this->_table." WHERE ID_PLAT_CATEGORIE=%d", $id);
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
					'ETAT' => $p['form_etat']
				),
				array(
					'%s',
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
                                        'ID_PLAT_CATEGORIE' => $g['idPlatCategorie']
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
		 * Maj de la table
		 * @param $_POST $p
		 */
		public function update( $p ){
			global $wpdb;
			$r = $wpdb->update(
				$this->_table,
				// SET (valeur)
				array(
					'NOM' => $p['form_nom'],
					'ETAT' => $p['form_etat']
				),
				// WHERE (valeur)
				array(
					'ID_PLAT_CATEGORIE' => $p['form_id']
				),
				// SET (type)
				array(
					'%s',
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
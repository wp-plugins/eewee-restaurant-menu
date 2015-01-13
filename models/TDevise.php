<?php
if( !class_exists(TDevise)){
	class TDevise extends WP_Query{
		
		private $_table;
                private $tbl_separator = array( ".", "," );
                
		
		function __construct(){
			$this->_table = EEWEE_RESTAURANT_MENU_PREFIXE_BDD."devise";
		}
		
		/**
		 * retourn rows 
		 */
		public function getDevises( $req="", $params="" ){
			global $wpdb;
			$sql	= $wpdb->prepare("SELECT * FROM ".$this->_table." ".$req, $params);
			$r		= $wpdb->get_results($sql);
			return $r;
		}
		
		/**
		 * retourn row
		 * @param int $id
		 */
		public function getDevise( $id ){
			global $wpdb;
			$sql	= $wpdb->prepare("SELECT * FROM ".$this->_table." WHERE ID_DEVISE=%d", $id);
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
					'ETAT' => $p['form_etat'],
                                        'LOCATION' => $p['form_location'],
                                        'SEPARATOR' => $p['form_separator']
				),
				array(
					'%s',
					'%d',
                                        '%d',
                                        '%s'
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
                                        'ID_DEVISE' => $g['idDevise']
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
					'NOM' => $p['form_nom'],
					'ETAT' => $p['form_etat'],
                                        'LOCATION' => $p['form_location'],
                                        'SEPARATOR' => $p['form_separator']
				),
				// WHERE (valeur)
				array(
					'ID_DEVISE' => $p['form_id']
				),
				// SET (type)
				array(
					'%s',
					'%d',
                                        '%d',
                                        '%s'
				),
				// WHERE (type)
				array(
					'%d'
				)
			);
			return $r;
		}
                
                /**
		 * getSeparator
		 */
                public function getSeparator(){
                    return $this->tbl_separator;
                }
		
	}
}
<?php
if( !class_exists(TLangPlat)){
	class TLangPlat extends WP_Query{
		
		private $_table;
		
		function __construct(){
			$this->_table = EEWEE_RESTAURANT_MENU_PREFIXE_BDD."lang_plat";
		}
		
		/**
		 * retourn rows
		 */
		public function getLangPlats( $req="", $params="" ){
			global $wpdb;
			$sql	= $wpdb->prepare("SELECT * FROM ".$this->_table." ".$req, $params);
			$r	= $wpdb->get_results($sql);
			return $r;
		}
		
		/**
		 * retourn row
		 * @param int $id
		 */
		public function getLangPlat( $id ){
			global $wpdb;
			$sql	= $wpdb->prepare("SELECT * FROM ".$this->_table." WHERE ID_LANG_PLAT=%d", $id);
			$r	= $wpdb->get_results($sql);
			return $r;
		}
		
		/**
		 * Add in table
		 * @param $_POST $p
                 * @param int $idPlat
		 */
		public function add( $p, $idPlat ){
			global $wpdb;
			
                        $t_lang = new TLang();
                        $langs = $t_lang->getLangs();
                        foreach( $langs as $lang ){
                            $r = $wpdb->insert(
                                    $this->_table,
                                    // SET (valeur)
                                    array(
                                            'ID_LANG' => $lang->ID_LANG,
                                            'ID_PLAT' => $idPlat,
                                            'NOM' => $p['form_nom_'.$lang->ID_LANG],
                                            'INGREDIENT' => $p['form_ingredient_'.$lang->ID_LANG],
                                    ),
                                    // SET (type)
                                    array(
                                            '%d',
                                            '%d',
                                            '%s',
                                            '%s'
                                    )
                            );
                        }
                        return $r;
                        
                        /*$r = $wpdb->insert(
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
                        */
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
                                        'ID_LANG_PLAT' => $g['idLangPlat']
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
                        
                        $t_lang = new TLang();
                        $langs = $t_lang->getLangs();
                        if( sizeof($langs) > 0 ){
                            foreach( $langs as $lang ){
                                $r = $wpdb->update(
                                        $this->_table,
                                        // SET (valeur)
                                        array(
                                                'NOM' => $p['form_nom_'.$lang->ID_LANG],
                                                'INGREDIENT' => $p['form_ingredient_'.$lang->ID_LANG],
                                        ),
                                        // WHERE (valeur)
                                        array(
                                                'ID_PLAT' => $p['form_id'],
                                                'ID_LANG' => $lang->ID_LANG,
                                        ),
                                        // SET (type)
                                        array(
                                                '%s',
                                                '%s'
                                        ),
                                        // WHERE (type)
                                        array(
                                                '%d',
                                                '%d'
                                        )
                                );
                            }
                        }
                        return $r;
		}
		
	}
}
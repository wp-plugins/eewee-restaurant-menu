<?php
//namespace FrEeweePluginRestaurantMenuShortcode;
//if( !class_exists(ShortcodeController)){
	class ShortcodeController{
		
		function __construct(){
			// SHORTCODE : 
			add_shortcode( 'menu', array($this, 'menu') );
			add_shortcode( 'laCarte', array($this, 'laCarte') );
		}//fin constructeur
		
		/**
		 * Menu
		 * @param array $atts
		 */
		public function menu( $atts='' ){
			extract( shortcode_atts(array('id'=>''), $atts ));
                        
                        $t_menu = new TMenu();
                        $menu = $t_menu->getMenu($id);
                        
                        $t_lang = new TLang();
                        $langs = $t_lang->getLangs();
                        $countLang = $t_lang->getLangsCount();
                        
                        // if online
                        if( $menu[0]->ETAT == 0 && !empty($id) ){
                            
                            // devise
                            $t_devise = new TDevise();
                            $devises = $t_devise->getDevises( " WHERE ETAT='0' LIMIT 1");
                            if( isset($devises[0]->NOM) ){
                                $devise = $devises[0]->NOM;
                                $location = $devises[0]->LOCATION;
                                
                                $separator_val = $devises[0]->SEPARATOR;
                                $tbl_sep = $t_devise->getSeparator();
                                $sep = $tbl_sep[$separator_val];
                            }
                        
                            // composition menu
                            $t_menuComposition = new TMenuComposition();
                            $menuCompositions = $t_menuComposition->getMenuCompositions( " WHERE ID_MENU_CATEGORIE='".$id."' ORDER BY ID_MENU_TYPE");
                            //ToolsControllers::prepre($menuCompositions);
                            $typeTemp = $composition = "";
                            foreach( $menuCompositions as $menuComposition ){
                                if( $typeTemp != $menuComposition->ID_MENU_TYPE ){
                                    // get title
                                    $t_type = new TMenuType();
                                    $type = $t_type->getMenuType($menuComposition->ID_MENU_TYPE);
                                    $composition .= "<h3 class='subtitle'>".$type[0]->NOM."</h3>";
                                    
                                    $typeTemp = $menuComposition->ID_MENU_TYPE;
                                }
                                
                                // get Plat
                                $t_plat = new TPlat();
                                $plat = $t_plat->getPlat($menuComposition->ID_PLAT);
                                if( $plat[0]->ETAT == 0 ){
                                    $ingredients = $plat[0]->INGREDIENT;
                                    $composition .= "<p><span class='plat'>";
                                        $composition .= $plat[0]->NOM." (".$ingredients.")";
                                        
                                        $tblLangPlat = array();
                                        foreach( $langs as $lang ){
                                            $t_lang_plat    = new TLangPlat();
                                            $req            = " WHERE ID_LANG=%d AND ID_PLAT=%d";
                                            $params         = array();
                                            $params[]       = $lang->ID_LANG;
                                            $params[]       = $menuComposition->ID_PLAT;
                                            $langPlats      = $t_lang_plat->getLangPlats($req, $params);
                                            
                                            
                                            foreach( $langPlats as $langPlat ){
                                                if( !empty($langPlat->NOM) ){
	                                            	$tblLangPlat[] = $langPlat->NOM;
                                                }
                                            }
                                            
                                        }
                                        $composition .= '<br><small>'.implode(" / ", $tblLangPlat).'</small>';
                                        
                                    $composition .= "</span>";
                                    if( !empty($ingredients) ){
                                        $composition .= "<span class='ingredients'>";
                                            
                                            foreach( $langs as $lang ){
                                                $t_lang_plat    = new TLangPlat();
                                                $req            = " WHERE ID_LANG=%d AND ID_PLAT=%d";
                                                $params         = array();
                                                $params[]       = $lang->ID_LANG;
                                                $params[]       = $menuComposition->ID_PLAT;
                                                $langPlats      = $t_lang_plat->getLangPlats($req, $params);

                                                foreach( $langPlats as $langPlat ){
                                                	if( !empty($langPlat->INGREDIENT) ){
	                                                	$composition .= "<br><small>(".$langPlat->INGREDIENT.")</small>";
                                                	}
                                                }

                                            }
                                        
                                        $composition .= "</span>";
                                    }
                                    $composition .= "</p>";
                                }
                            }
                            
                            $a = "
                            <div class='restaurant-menu'>
                                <h2 class='title'>".$menu[0]->NOM."<span class='f_r'>";
                            
                                if( $location == 1 ){ $a .= $devise."&nbsp;"; }
                            
                                $a .= number_format($menu[0]->PRIX, 2, $sep, '');
                                    
                                if( $location == 0 ){ $a .= "&nbsp;".$devise; }
                                
                                $a .= "</span></h2>".$composition."
                            </div>";

                            return $a;
                        }
                        return "";
		}
                
                /**
		 * La carte
		 * @param array $atts
		 */
		public function laCarte( $atts='' ){
                    extract( shortcode_atts(array('id'=>'', 'categ'=>''), $atts ));
                    
                    $t_lang = new TLang();
                    $langs = $t_lang->getLangs();
                    $countLang = $t_lang->getLangsCount();
                    
                    // devise
                    $t_devise = new TDevise();
                    $devises = $t_devise->getDevises( " WHERE ETAT='0' LIMIT 1");
                    if( isset($devises[0]->NOM) ){
                        $devise = $devises[0]->NOM;
                        $location = $devises[0]->LOCATION;
                                
                        $separator_val = $devises[0]->SEPARATOR;
                        $tbl_sep = $t_devise->getSeparator();
                        $sep = $tbl_sep[$separator_val];
                    }

                    if( isset($categ) && !empty($categ) ){
                        $t_platCateg = new TPlatCategorie();
                        $platCategs = $t_platCateg->getPlatCategorie($categ);
                    }else{
                        $t_platCateg = new TPlatCategorie();
                        $platCategs = $t_platCateg->getPlatCategories();
                    }
                    
                    $platCategTemp = $composition = "";
                    foreach( $platCategs as $platCateg ){
                        if( $platCategTemp != $platCateg->ID_PLAT_CATEGORIE ){
                            
                            if( $platCateg->ETAT == 1 ){
                                $enLigne = false;
                            }else{
                                $enLigne = true;
                            }
                            
                            if( $enLigne ){
                                // get title
                                $composition .= "<h2 class='title'>".$platCateg->NOM."</h2>";
                            }
                            
                            $platCategTemp = $platCateg->ID_PLAT_CATEGORIE;
                        }
                        
                        if( $enLigne ){
                        	$afficherLang = array();
                        	
                            // get flat
                            $t_plat = new TPlat();
                            $plats = $t_plat->getPlats( " WHERE ID_PLAT_CATEGORIE='".$platCateg->ID_PLAT_CATEGORIE."' AND ETAT='0' ORDER BY ORDER_PLAT ASC");
                            foreach($plats as $plat){
                                $composition .= "<p class='p_plat'><span class='plat'>";
                                    $composition .= $plat->NOM;
                                    
                                    $composition .= "<span class='f_r'>";
                                   		if( $location == 1 ){ $composition .= $devise."&nbsp;"; }
                                    	$composition .= number_format($plat->PRIX, 2, $sep, '');
                                    	if( $location == 0 ){ $composition .= "&nbsp;".$devise; }
                                    $composition .= "</span>";
                                    
                                    $compositionPlat = array();
                                    foreach( $langs as $lang ){
                                    	$t_lang_plat    = new TLangPlat();
                                        $req            = " WHERE ID_LANG=%d AND ID_PLAT=%d";
                                        $params         = array();
                                        $params[]       = $lang->ID_LANG;
                                        $params[]       = $plat->ID_PLAT;
                                        $langPlats      = $t_lang_plat->getLangPlats($req, $params);

                                        $tblLangPlat = array();
                                        foreach( $langPlats as $langPlat ){
                                        	if( !empty($langPlat->NOM) ){
                                        		$afficherLang[] = true;
	                                        	$compositionPlat[] = $langPlat->NOM;
                                        	}
                                        }
										
                                    }
                                    if( is_array($compositionPlat) ){
	                                    $composition .= '<br><small>'.implode(" / ", $compositionPlat).'</small> ';
                                    }
                                $composition .= "</span>";
                                
                                if( !empty($plat->INGREDIENT) ){
                                    $composition .= "<span class='ingredients'>";
                                    	if( in_array(true, $afficherLang) ){
	                                        foreach( $langs as $lang ){
	                                            $t_lang_plat    = new TLangPlat();
	                                            $req            = " WHERE ID_LANG=%d AND ID_PLAT=%d";
	                                            $params         = array();
	                                            $params[]       = $lang->ID_LANG;
	                                            $params[]       = $platCateg->ID_PLAT_CATEGORIE;
	                                            $langPlats      = $t_lang_plat->getLangPlats($req, $params);
	
	                                            foreach( $langPlats as $langPlat ){
	                                            	if( !empty($langPlat->INGREDIENT) ){
		                                                $composition .= "<br><small>(".$langPlat->INGREDIENT.")</small>";
	                                            	}
	                                            }
	                                        }//foreach
                                    	}else{
                                    		$composition .= "(".$plat->INGREDIENT.")";
                                    	}
                                    $composition .= "</span> ";
                                }//if
                                
                                $composition .= "</p>";
                            }
                        }
                    }
                    $a = "
                    <div class='restaurant-menu'>
                        ".$composition."
                    </div>";

                    return $a;
		}
                
				
	}//class
//}//if
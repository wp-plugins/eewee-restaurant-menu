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
                        
                        // if online
                        if( $menu[0]->ETAT == 0 && !empty($id) ){
                            
                            // devise
                            $t_devise = new TDevise();
                            $devises = $t_devise->getDevises( " WHERE ETAT='0' LIMIT 1");
                            if( isset($devises[0]->NOM) ){
                                $devise = $devises[0]->NOM;
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
                                
                                // get flat
                                $t_plat = new TPlat();
                                $plat = $t_plat->getPlat($menuComposition->ID_PLAT);
                                if( $plat[0]->ETAT == 0 ){
                                    $ingredients = $plat[0]->INGREDIENT;
                                    $composition .= "<p><span class='plat'>".$plat[0]->NOM."</span> <span class='ingredients'>(".$ingredients.")</span></p>";
                                }
                            }
                            
                            $a = "
                            <div class='restaurant-menu'>
                                <h2 class='title'>".$menu[0]->NOM."<span class='f_r'>".$menu[0]->PRIX."&nbsp;".$devise."</span></h2>
                                ".$composition."
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
                    extract( shortcode_atts(array('id'=>''), $atts ));
                    
                    // devise
                    $t_devise = new TDevise();
                    $devises = $t_devise->getDevises( " WHERE ETAT='0' LIMIT 1");
                    if( isset($devises[0]->NOM) ){
                        $devise = $devises[0]->NOM;
                    }

                    $t_platCateg = new TPlatCategorie();
                    $platCategs = $t_platCateg->getPlatCategories();

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
                            // get flat
                            $t_plat = new TPlat();
                            $plats = $t_plat->getPlats( " WHERE ID_PLAT_CATEGORIE='".$platCateg->ID_PLAT_CATEGORIE."' AND ETAT='0'");
                            foreach($plats as $plat){
                                $composition .= "<p><span class='plat'>".$plat->NOM."</span> <span class='ingredients'>(".$plat->INGREDIENT.")</span> <span class='f_r'>".$plat->PRIX."&nbsp;".$devise."</span></p>";
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
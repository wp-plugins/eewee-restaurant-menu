<?php
//namespace FrEeweePluginRestaurantMenuTools;
if( !class_exists(ToolsControllers)){
	class ToolsControllers{
		
		//const XXX = 5;
		//private $xxx = 5;
		
		function __construct(){}
		
		/**
		 * Verif des majs
		 * @param bool $r
		 */
		public function verifMaj( $r ){
			if( $r == 1 ){
				echo '
				<div id="setting-error-settings_updated" class="updated settings-error"> 
					<p><strong>'.__("Options recorded.", PLUGIN_NOM_LANG).'</strong></p>
				</div>';
			}else{
				echo '<div class="error"><p><strong>'.__("ERROR", PLUGIN_NOM_LANG).'</strong>&nbsp;: '.__("Update unrealized", PLUGIN_NOM_LANG).'.</p></div>';
			}	
		}
		
		static public function formatDate( $date, $type="dd/mm/yyyy" ){
			$tbl_dateHeure = explode(" ", $date );
			$tbl_date = explode( "-", $tbl_dateHeure[0]);
			$tbl_heure= explode(":", $tbl_dateHeure[1]);

			$d = "";
			switch( $type ){
				case "dd/mm/yyyy" :
					$d = $tbl_date[2]."/".$tbl_date[1]."/".$tbl_date[0];
					break;
					
				case "dd-mm-yyyy" :
					$d = $tbl_date[2]."-".$tbl_date[1]."-".$tbl_date[0];
					break;
					
				case "yyyy" :
					$d = $tbl_date[0];
					break;
					
				default :
					$d = $tbl_date[2]."/".$tbl_date[1]."/".$tbl_date[0];
			}
			
			return $d;
		}
		
		/**
		 * 
		 * retourne un mdp
		 * @param int $taille
		 * @param string $type_cryptage md5, sha1, vide
		 */
		static public function getMdpAleatoire( $taille=8, $type_cryptage="" ){
			$md5 = $sha1 = "";
			
			$chaine ="mnoTUzS5678kVvwxy9WXYZRNCDEFrslq41GtuaHIJKpOPQA23LcdefghiBMbj0";
		    srand((double)microtime()*1000000);
		    for($i=0; $i<$taille; $i++){
		    	@$pass .= $chaine[rand()%strlen($chaine)];
		    }//fin for
			$tbl_pwd[] = $pass;
		    
		    if( $type_cryptage == "md5" ){
				$tbl_pwd[] = md5($pass);
		    }elseif( $type_cryptage == "sha1" ){
		    	$tbl_pwd[] = sha1($pass);
		    }//fin elseif
		    
		    return $tbl_pwd;
		       
		}//fin function
	
		
		/**
		 * 
		 * validateur email
		 * @param string $adresse
		 */
		static public function emailValide( $adresse ){ 
			$reg = "^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]*[.][a-zA-Z]{2,4}$";
			$email = ereg( $reg, $adresse );
			if ( $email ){
				return true;
			}else{
				return false;
			}//fin else
		}//fin function

                
		/**
		 * 
		 * Envoyer la liste des gagnants sur le jeu concours x, par email
		 * @param array $email (destinataire, expediteur, sujet, corps)
		 */
		static public function envoyerEmail($tbl_email){
			
			// SOURCE : http://a-pellegrini.developpez.com/tutoriels/php/mail/
			
			// init
			if( empty( $tbl_email['corps_html'] ) ){
				$tbl_email['corps_html'] = $tbl_email['corps'];
			}
			
			// To
			$to = $tbl_email['destinataire'];
			
			// Subject
			$subject = $tbl_email['sujet'];
			
			// clé aléatoire de limite
			$boundary = md5 (uniqid (microtime (), TRUE));
			
			// Headers
			$headers = 'From: '.$tbl_email['expediteur'].' <'.$tbl_email['expediteur'].'>'."\r\n";
			$headers .= 'Mime-Version: 1.0'."\r\n";
			$headers .= 'Content-Type: multipart/mixed;boundary='.$boundary."\r\n";
			$headers .= "\r\n";
			
			// Message
			$msg = $tbl_email['corps']."\r\n\r\n";
			
			// Message HTML
			$msg .= '--'.$boundary."\r\n";
			$msg .= 'Content-type: text/html; charset=utf-8'."\r\n\r\n";
			$msg .= '
			<div style="padding:5px; width:600px; background-color:#E0EBF5; border:#000000 thin solid">
			    <div>
			    	'.$tbl_email['corps_html'].'
			    </div>
			</div>'."\r\n";
			
			// Pièce jointe 1
			$file_name = $tbl_email['fichier1'];
			if (file_exists ($file_name))
			{
				$file_type = filetype ($file_name);
				$file_size = filesize ($file_name);
			
				$handle = fopen ($file_name, 'r') or die ('File '.$file_name.'can t be open');
				$content = fread ($handle, $file_size);
				$content = chunk_split (base64_encode ($content));
				$f = fclose ($handle);
			
				$msg .= '--'.$boundary."\r\n";
				$msg .= 'Content-type:'.$file_type.';name='.$file_name."\r\n";
				$msg .= 'Content-transfer-encoding:base64'."\r\n\r\n";
				$msg .= $content."\r\n";
			}
			
			/*
			// Pièce jointe 2
			$file_name = $tbl_email['fichier2'];
			if (file_exists ($file_name))
			{
				$file_type = filetype ($file_name);
				$file_size = filesize ($file_name);
			
				$handle = fopen ($file_name, 'r') or die ('File '.$file_name.'can t be open');
				$content = fread ($handle, $file_size);
				$content = chunk_split (base64_encode ($content));
				$f = fclose ($handle);
			
				$msg .= '--'.$boundary."\r\n";
				$msg .= 'Content-type:'.$file_type.';name='.$file_name."\r\n";
				$msg .= 'Content-transfer-encoding:base64'."\r\n\r\n";
				$msg .= $content."\r\n";
			}
			*/
			
			// Fin
			$msg .= '--'.$boundary."\r\n";
			
			//echo $msg;
			
			// Envoyer mail()
			return mail ($to, $subject, $msg, $headers);


			// envoyer email
			//return mail($tbl_email['destinataire'], $tbl_email['sujet'], $tbl_email['corps'], $tbl_email['expediteur']);
			
		}//fin function
		
		
		
		/**
		 * 
		 * retourner le nb de participation
		 * @param int $idClient
		 */
		static public function nbParticipation($wpdb, $idClient){
			$nb	= $wpdb->get_var( $wpdb->prepare("
			SELECT COUNT(*) FROM 
			jeuxconcours_reponse 
			WHERE 
			ID_CLIENT=%d", $idClient));
			
			return $nb;
		}//fin function
		
		
		
		/**
		 * 
		 * retourner infos
		 * @param string $s
		 */
		public function prepre($s){
			echo "<pre>";
				var_dump($s);
			echo "</pre>";
		}
		
	}//fin class
	
}//fin if
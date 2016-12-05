<?php
class Gamemodel extends CI_Model{
    private $_cartes = array(8, 7, 6, 5, 4, 3, 2, 1);
	function __construct(){
		parent::__construct();
                $this->load->database();
	}
        
        function getCartes(){
             $query = $this->db->query('SELECT id, name, path FROM cards');
             return $query;
        }
     
        
        
        function getPlayers(){
            $query = $this->db->query('SELECT pseudo, password, online FROM players');
            return $query;
        }
		
		function getPlayersNumber($idlobby){//LOL
			
			$query= $this->db->query('
			SELECT * FROM lobby
			WHERE id ='.$idlobby.'
			');
			
			$counter=0;
			foreach($query->result() as $lobby){
				if(!empty($lobby->player1)){
					$counter++;
				}
				if(!empty($lobby->player2)){
					$counter++;
				}
				if(!empty($lobby->player3)){
					$counter++;
				}
				if(!empty($lobby->player4)){
					$counter++;
				}
			}
			return $counter;
		}
        
        function register($pseudo, $psw){
            $cpt = $this->db->query('SELECT * FROM players WHERE pseudo="'.$pseudo.'"');
            if($cpt->result() == null){
                $query = $this->db->query('INSERT INTO players VALUES ("'.$pseudo.'","'.$psw.'", 0)');
                return $query;
            }
        }
        
        function delete($pseudo){
            $query = $this->db->query('DELETE FROM players WHERE pseudo = "'.$pseudo.'"');
            //return $query;
        }
        
        function getMessages(){
            $query = $this->db->query('SELECT * FROM minichat ORDER BY id DESC LIMIT 0,10');
            return $query;
        }
		
        function getLobby($id_lobby){
                if($id_lobby > 0){
                    $query = $this->db->query('SELECT * FROM lobby WHERE id = '.$id_lobby.'');
                }
                else{ //comme ça on peut mettre 0 ou moins si on veut tout afficher
                    $query = $this->db->query('SELECT * FROM lobby'); 
                }
                return $query;
        }
        
        function accountExist($pseudo, $mdp){
            $cpt = $this->db->query('SELECT * FROM players WHERE pseudo="'.$pseudo.'" AND password="'.$mdp.'"');
            return ($cpt->result() != null);
        }

		
		function remplirPioche($id_lobby){
			$query = $this->db->query('DELETE FROM cards_stack');
			$query = $this->db->query('INSERT INTO cards_stack VALUES ('.$id_lobby.', 1, 5)');
			$query = $this->db->query('INSERT INTO cards_stack VALUES ('.$id_lobby.', 2, 2)');
			$query = $this->db->query('INSERT INTO cards_stack VALUES ('.$id_lobby.', 3, 2)');
			$query = $this->db->query('INSERT INTO cards_stack VALUES ('.$id_lobby.', 4, 2)');
			$query = $this->db->query('INSERT INTO cards_stack VALUES ('.$id_lobby.', 5, 2)');
			$query = $this->db->query('INSERT INTO cards_stack VALUES ('.$id_lobby.', 6, 1)');
			$query = $this->db->query('INSERT INTO cards_stack VALUES ('.$id_lobby.', 7, 1)');
			$query = $this->db->query('INSERT INTO cards_stack VALUES ('.$id_lobby.', 8, 1)');
		}
		
		function peutPiocher($pseudo, $idlobby){//LOL
			$bool=false;
			$query = $this->db->query('
			SELECT * FROM cartesmain
			WHERE pseudo ="'.$pseudo.'"
			');
			foreach($query->result() as $main){
				$bool = (empty($main->premiere) || empty($main->deuxieme)); //on verifie que la main du joueur peut ?tre remplie
			}
			
			$playingplayer=$this->getPlayingPlayer($idlobby);
			
			$bool2 = ($playingplayer == $pseudo); //on verifie que c'est bien le tour du joueur qui tente de piocher est bien
			
			$bool3 = !$this->APioche($idlobby); //on verifie que le joueur n'a pas d?j? pioch?
			
			return ($bool && $bool2 && $bool3);
		}
		
		function piocherCarte($pseudo, $id_lobby){

			if($this->peutPiocher($pseudo, $id_lobby)){
				$carte = rand(1,8);	
							
				$query = $this->getPioche($id_lobby);
				
				$aucuneCarte=1;
				foreach($query->result() as $carte_i){ //on regarde s'il y a des cartes dans la pioche pour ?viter une r?currence ?ternelle en cas de pioche vide
					if($carte_i->quantite!=0){
						$aucuneCarte=0;
					}
				}
				
				if($aucuneCarte==0){

							$qte = 0;
					foreach($query->result() as $pioche){
						if($pioche->id_carte==$carte){
							$qte = $pioche->quantite ;
							if($qte <= 0){
								$this->piocherCarte($pseudo, $id_lobby);
							}
							else{
								$qte=$qte-1;
								$this->db->query('
								UPDATE cards_stack 
								SET quantite = '.$qte.' 
								WHERE id_lobby = '.$id_lobby.'
								AND id_carte = '.$carte.'
								');
								
								$this->ajouterCarteMain($pseudo ,$carte);
							}
						}
					}
				}//sinon fin de la partie
				$this->setAPioche($id_lobby,1);
			}
		}
		
		function poserCarte($pseudo, $noEmpCarteMain, $idlobby){//LOL
				if($this->peutPoser($pseudo, $idlobby)){
                        if($noEmpCarteMain == 1){
                            $query = $this->db->query('SELECT premiere FROM cartesmain WHERE pseudo = "'.$pseudo.'"');
                        }elseif($noEmpCarteMain == 2){
                            $query = $this->db->query('SELECT deuxieme FROM cartesmain WHERE pseudo = "'.$pseudo.'"');
                        }
                        
                        $noEmpCartePos = $this->getEmplacementVide($pseudo);
                        
                        foreach($query->result() as $carte){
                            if($noEmpCarteMain == 1){
                                $carteNum = $carte->premiere;                                
                                $this->db->query('UPDATE cartesmain SET premiere = NULL WHERE pseudo = "'.$pseudo.'"');
                            }elseif($noEmpCarteMain == 2){
                                $carteNum = $carte->deuxieme;
                                $this->db->query('UPDATE cartesmain SET deuxieme = NULL WHERE pseudo = "'.$pseudo.'"');
                            }
                        }
                        
                        switch($noEmpCartePos){
                                 case 1:
                                     $this->db->query('UPDATE cartespos SET premiere = '.$carteNum.' WHERE pseudo = "'.$pseudo.'"');
                                     break;
                                 case 2:
                                     $this->db->query('UPDATE cartespos SET deuxieme = '.$carteNum.' WHERE pseudo = "'.$pseudo.'"');
                                     break;
                                 case 3:
                                     $this->db->query('UPDATE cartespos SET troisieme = '.$carteNum.' WHERE pseudo = "'.$pseudo.'"');
                                     break;
                                 case 4:
                                     $this->db->query('UPDATE cartespos SET quatrieme = '.$carteNum.' WHERE pseudo = "'.$pseudo.'"');
                                     break;
                                 case 5:
                                     $this->db->query('UPDATE cartespos SET cinquieme = '.$carteNum.' WHERE pseudo = "'.$pseudo.'"');
                                     break;
                                 case 6:
                                     $this->db->query('UPDATE cartespos SET sixieme = '.$carteNum.' WHERE pseudo = "'.$pseudo.'"');
                                     break;

                             }
							 
							 $this->passerLeTour($idlobby);
							 $this->setAPioche($idlobby,0);
				}      
		}
		
		function peutPoser($pseudo, $idlobby){//LOL
			
			$playingplayer=$this->getPlayingPlayer($idlobby);
			
			$bool = ($playingplayer == $pseudo); // on verifie que c'est au tour du joueur
			
			$bool2 = $this->APioche($idlobby); // on verifie que le joueur a pioch?
			
			return ($bool && $bool2);
			
		}
		
                function getEmplacementVide($pseudo){ //retourne le premier emplacement vide dans les cartes à poser
                        $noEmp=-1;
			$query = $this->db->query('
			SELECT * FROM cartespos
			WHERE pseudo ="'.$pseudo.'"
			');
                        
			foreach($query->result() as $pos){
                                
                                        if(empty($pos->premiere)){
                                            $noEmp = 1;
                                        }elseif(empty($pos->deuxieme)){
                                            $noEmp = 2;
                                        }elseif(empty($pos->troisieme)){
                                            $noEmp = 3;
                                        }elseif(empty($pos->quatrieme)){
                                            $noEmp = 4;
                                        }elseif(empty($pos->cinquieme)){
                                            $noEmp = 5;
                                        }elseif(empty($pos->sixieme)){
                                            $noEmp = 6;
                                        }else{
                                            $noEmp = 0; //cas où on n'a plus de place
                                        }
                                        
                                
			}
			
			return $noEmp; 
                }
                
		function ajouterCarteMain($player, $cartenum){
			$query = $this->db->query('
			SELECT * FROM cartesmain
			WHERE pseudo = "'.$player.'"
			');
			foreach($query->result() as $main){
				
			if(empty($main->premiere)):
			
				$this->db->query('
				UPDATE cartesmain
				SET premiere = '.$cartenum.'
				WHERE pseudo = "'.$player.'"
				');
				
			elseif(empty($main->deuxieme)):
			
				$this->db->query('
				UPDATE cartesmain
				SET deuxieme = '.$cartenum.'
				WHERE pseudo = "'.$player.'"
				');
			
			endif;
			}
		}
		
		/*function getPlayersLobby($pseudo){ // CETTE FONCTION NE FONCTIONNE PAS !!!
			$query = $this->db->query(
			'SELECT *
			FROM cartesmain INNER JOIN lobby
			ON (cartesmain.pseudo = lobby.player1) 
			AND (cartesmain.pseudo = lobby.player2) 
			AND (cartesmain.pseudo = lobby.player3)
			AND (cartesmain.pseudo = lobby.player4)
			WHERE player1="'.$pseudo.'" 
			OR player2="'.$pseudo.'" 
			OR player3="'.$pseudo.'" 
			OR player4="'.$pseudo.'"'
			);
			
			$idlobby=20;
			
			foreach($query->result() as $lobby){
				$idlobby = $lobby->id;
			}
			
			return $idlobby;
		}*/
                
		function getPioche($idlobby){
			$query = $this->db->query('
			SELECT * FROM cards_stack 
			WHERE id_lobby = '.$idlobby.'
			');
			
			return $query;
		}
		
		function distribuerCartes($idlobby){
			$query=$this->db->query('
			SELECT * FROM lobby
			WHERE id = '.$idlobby.'
			');
			
			foreach($query->result() as $lobby){
				$this->piocherCarte($lobby->player1, $idlobby);
				$this->piocherCarte($lobby->player2, $idlobby);
                                if($idlobby >= 30){
                                    $this->piocherCarte($lobby->player3, $idlobby);
                                    if($idlobby >= 40){
                                        $this->piocherCarte($lobby->player4, $idlobby);
                                    }
                                }
			}
		}
        
        function getCardsPos($id_lobby, $numPlayer){
            $query = $this->getLobby($id_lobby);
            if($numPlayer == 1){
                foreach($query->result() as $temp){
                    $player = $temp->player1;
                }
            }
            if($numPlayer == 2){
                    foreach($query->result() as $temp){
                    $player = $temp->player2;
                }
            }
            if($numPlayer == 3){
                   foreach($query->result() as $temp){
                    $player = $temp->player3;
                }
            }
            if($numPlayer == 4){
                    foreach($query->result() as $temp){
                    $player = $temp->player4;
                } 
            }
  
            $cards = $this->db->query('SELECT * FROM cartespos WHERE pseudo="'.$player.'"');
            return $cards;
        }
        
		function getPlayingPlayer($idlobby){//LOL
			$query = $this->db->query('
			SELECT * FROM lobby
			WHERE id='.$idlobby.'
			');
			
			$numturn=0;
			foreach($query->result() as $lobby){
				$numturn=$lobby->aquiletour;
			}
			
			$pseudo="error";
			
			echo $numturn;
			
			switch($numturn){
				/*case 0:
					echo "Erreur: pas de joueur !";//d?clencher une erreur
					break;*/
				
				case 1:
					$pseudo=$lobby->player1;
					break;
				
				case 2:
					$pseudo=$lobby->player2;
					break;
				
				case 3:
					$pseudo=$lobby->player3;
					break;
				
				case 4:
					$pseudo=$lobby->player4;
					break;
			}
			
			return $pseudo;
		}
		
		function APioche($idlobby){//LOL
		$query = $this->db->query('
			SELECT * FROM lobby
			WHERE id = '.$idlobby.'
			');
			
			foreach($query->result() as $lobby){
				$apioche=$lobby->apioche;
			}
			
			return ($apioche==1);
		}
		
		function setAPioche($idlobby, $etat){//LOL
			$this->db->query('
			UPDATE lobby
			SET apioche = '.$etat.'
			WHERE id = '.$idlobby.'
			');
		}
		
		function setTourDeJeu($idlobby, $numplayer){//LOL
			$this->db->query('
			UPDATE lobby
			SET aquiletour = '.$numplayer.'
			WHERE id = '.$idlobby.'
			');
		}
		
		function passerLeTour($idlobby){//LOL
			$query=$this->db->query('
			SELECT * FROM lobby
			WHERE id='.$idlobby.'
			');
			
			$numturn=0;
			foreach($query->result() as $lobby){
				$numturn=$lobby->aquiletour;
			}
			
			$nbplayers = $this->getPlayersNumber($idlobby);
			
			$nextturn = ((($numturn-1)%$nbplayers)+1)%$nbplayers+1;
			
			$this->setTourDeJeu($idlobby, $nextturn);
		}
		
        function getCardsMain($id_lobby, $numPlayer){
            $query = $this->getLobby($id_lobby);
            if($numPlayer == 1){
                foreach($query->result() as $temp){
                    $player = $temp->player1;
                }
            }
            if($numPlayer == 2){
                    foreach($query->result() as $temp){
                    $player = $temp->player2;
                }
            }
            if($numPlayer == 3){
                   foreach($query->result() as $temp){
                    $player = $temp->player3;
                }
            }
            if($numPlayer == 4){
                    foreach($query->result() as $temp){
                    $player = $temp->player4;
                } 
            }
            $cards = $this->db->query('SELECT * FROM cartesmain WHERE pseudo="'.$player.'"');
            return $cards;
        }

        function quitterLobby($player){
            // on supprime la main et le jeu du joueur 
            $this->db->query('DELETE FROM cartesmain WHERE pseudo ="'.$player.'"');
            $this->db->query('DELETE FROM cartespos WHERE pseudo ="'.$player.'"');
            
            // on sélectionne le lobby dans lequel est le joueur
            $query = $this->db->query('SELECT * FROM lobby WHERE player1="'.$player.'"'
                    . 'OR player2="'.$player.'"'
                    . 'OR player3="'.$player.'"'
                    . 'OR player4="'.$player.'"');
            
            // puis on vire le joueur du lobby
            foreach($query->result() as $lobby){
                if($lobby->player1 == $player){
                    $this->db->query('UPDATE lobby SET player1 = NULL WHERE id ="'.$lobby->id.'"');
                }elseif($lobby->player2 == $player){
                    $this->db->query('UPDATE lobby SET player2 = NULL WHERE id ="'.$lobby->id.'"');
                }elseif($lobby->player3 == $player){
                    $this->db->query('UPDATE lobby SET player3 = NULL WHERE id ="'.$lobby->id.'"');
                }elseif($lobby->player4 == $player){
                    $this->db->query('UPDATE lobby SET player4 = NULL WHERE id ="'.$lobby->id.'"');
                }
            }          
        }
        
        function entrerLobby($id_lobby, $pseudo){
            $query = $this->db->query('SELECT * FROM lobby WHERE id="'.$id_lobby.'"');
            
            foreach($query->result() as $lobby){
                
                // on créé les entrée cartesmain et cartespos du joueur
                $this->db->query('INSERT INTO cartesmain(pseudo) VALUES ("'.$pseudo.'")');
                $this->db->query('INSERT INTO cartespos (pseudo) VALUES ("'.$pseudo.'")');
                
                // on ajoute le joueur au lobby
                if(empty($lobby->player1)){
                    $this->db->query('UPDATE lobby SET player1 = "'.$pseudo.'" WHERE id="'.$id_lobby.'"');
                }elseif(empty($lobby->player2)){
                    $this->db->query('UPDATE lobby SET player2 = "'.$pseudo.'" WHERE id="'.$id_lobby.'"');
                }elseif(empty($lobby->player3)){
                    $this->db->query('UPDATE lobby SET player3 = "'.$pseudo.'" WHERE id="'.$id_lobby.'"');
                }elseif(empty($lobby->player4)){
                    $this->db->query('UPDATE lobby SET player4 = "'.$pseudo.'" WHERE id="'.$id_lobby.'"');
                }               
            }   
        }
        
        function posterMessage($pseudo, $message, $id_lobby){
            $this->db->query('INSERT INTO chat(id_lobby, pseudo, message) VALUES("'.$id_lobby.'", "'.$pseudo.'", "'.$message.'")');
        }
        
        function getChat($id_lobby){
            $query = $this->db->query('SELECT * FROM chat WHERE id_lobby = "'.$id_lobby.'" ORDER BY position');
            return $query;
        }
}
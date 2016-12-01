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
                    $query = $this->db->query('SELECT * FROM lobby WHERE id = "'.$id_lobby.'"');
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
		
		function peutPiocher($pseudo){
			$bool=false;
			$query = $this->db->query('
			SELECT * FROM cartesmain
			WHERE pseudo ="'.$pseudo.'"
			');
			foreach($query->result() as $main){
				$bool = (empty($main->premiere) || empty($main->deuxieme));
			}
			
			return $bool;
		}
		
		function piocherCarte($pseudo, $id_lobby){

			if($this->peutPiocher($pseudo)){
				$carte = rand(1,8);	
							
				$query = $this->getPioche($id_lobby);
				
				$aucuneCarte=1;
				foreach($query->result() as $carte_i){ //on regarde s'il y a des cartes dans la pioche pour ?viter une r?currence ?ternelle en cas de pioche vide
					if($carte_i->quantite!=0){
						$aucuneCarte=0;
					}
				}
				
				if($aucuneCarte==0){
					//echo "2";
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
				}
			}
		}
		
		function poserCarte($pseudo, $noEmpCarteMain){
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
		
		function getPlayersLobby($pseudo){
			$lobby = $this->db->query(
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
			
			return $lobby;
		}
		
                function getPlayersLobbyID($pseudo){
                    $lobby = $this->getPlayersLobby($pseudo);
                    $return = null;
                    foreach($lobby->result() as $toto){
                        $return = $toto->id;
                    }
                    return $return;
                }
                
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

}
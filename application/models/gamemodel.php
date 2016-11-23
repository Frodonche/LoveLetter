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
            return $query;
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
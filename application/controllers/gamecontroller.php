<?php
class GameController extends CI_Controller{
    
	function __construct(){
		parent::__construct();
		$this->load->model('gamemodel');
	}
	
	function index(){
		$this->load->view('login');
	}
        
        function game(){
            $this->load->view('game');
        }
        
        function cartes(){
            $data['array'] = $this->gamemodel->getCartes();
            $this->load->view('cartes', $data);
        }
       
       function players(){
           $data['infos'] = $this->gamemodel->getPlayers();
           $this->load->view('players', $data);
       }
       
       function register(){
           if ($_POST['pseudo']!='' && $_POST['psw']!=''){
               // $this->gamemodel->register($_POST['pseudo'], $_POST['psw']);
                $test = $this->gamemodel->register($_POST['pseudo'], $_POST['psw']);
                
                if($test != null){
                    $data['pseudo'] = $_POST['pseudo'];
                    $data['psw']  = $_POST['psw'];
                    $this->load->view('createsession', $data);
                }
                else
                    $this->erreurAccount();
           }
       }
       
       function erreurAccount(){
           $data['infos'] = $this->gamemodel->getPlayers();
           $data['erreur'] = "Account already existing";
           $this->load->view('login', $data);
       }
       
       function erreurLogin(){
           $data['erreurLogin'] = "Erreur login";
           $this->load->view('login', $data);
       }
       
       function delete($pseudo){
           if($pseudo !=''){
               $pseudo = str_replace("%20", " ", $pseudo);
               $this->gamemodel->delete($pseudo);               
           }
           $this->players();
       }
	   
        function plateau($id_lobby){//test de la vue plateau
                     $data['lobby'] = $this->gamemodel->getLobby($id_lobby);
                     if(20 <= $id_lobby && $id_lobby < 30){ //si c'est un lobby à 2
                         $data['playersCardsPos1'] = $this->gamemodel->getCardsPos($id_lobby, 1);
                         $data['playersCardsMain1'] = $this->gamemodel->getCardsMain($id_lobby, 1);
                         
                         $data['playersCardsPos2'] = $this->gamemodel->getCardsPos($id_lobby, 2);
                         $data['playersCardsMain2'] = $this->gamemodel->getCardsMain($id_lobby, 2);
                         
                         $this->load->view('plateau2', $data);
                     }
                     if(30 <= $id_lobby && $id_lobby < 40){ //si c'est un lobby à 3
                         $data['playersCardsPos1'] = $this->gamemodel->getCardsPos($id_lobby, 1);
                         $data['playersCardsMain1'] = $this->gamemodel->getCardsMain($id_lobby, 1);
                         
                         $data['playersCardsPos2'] = $this->gamemodel->getCardsPos($id_lobby, 2);
                         $data['playersCardsMain2'] = $this->gamemodel->getCardsMain($id_lobby, 2);
                         
                         $data['playersCardsPos3'] = $this->gamemodel->getCardsPos($id_lobby, 3);
                         $data['playersCardsMain3'] = $this->gamemodel->getCardsMain($id_lobby, 3);
                         
                         $this->load->view('plateau3', $data);
                     }
                     if(40 <= $id_lobby && $id_lobby < 50){ //si c'est un lobby à 4
                         $data['playersCardsPos1'] = $this->gamemodel->getCardsPos($id_lobby, 1); // les cartes posées de chaque joueur
                         $data['playersCardsMain1'] = $this->gamemodel->getCardsMain($id_lobby, 1);// les cartes en main de chaque joueur
                         
                         $data['playersCardsPos2'] = $this->gamemodel->getCardsPos($id_lobby, 2);
                         $data['playersCardsMain2'] = $this->gamemodel->getCardsMain($id_lobby, 2);
                         
                         $data['playersCardsPos3'] = $this->gamemodel->getCardsPos($id_lobby, 3);
                         $data['playersCardsMain3'] = $this->gamemodel->getCardsMain($id_lobby, 3);
                         
                         $data['playersCardsPos4'] = $this->gamemodel->getCardsPos($id_lobby, 4);
                         $data['playersCardsMain4'] = $this->gamemodel->getCardsMain($id_lobby, 4);
                         
                         $this->load->view('plateau4', $data);
                     }
                     
        }

        function piocherCarte(){
            $this->gamemodel->piocherCarte($_POST['session']);
            $this->plateau($_POST['lobby']);
        }
        
        function rooms(){
            $data['lobbies'] = $this->gamemodel->getLobby(0);
            $this->load->view('rooms', $data);
        }
        
        function logcontrol(){
            if ($_POST['pseudo']!='' && $_POST['psw']!=''){
                if($this->gamemodel->accountExist($_POST['pseudo'], $_POST['psw'])){
                    $data['pseudo'] = $_POST['pseudo'];
                    $data['psw']  = $_POST['psw'];
                    $this->load->view('createsession', $data);
                }
                else{
                    $this->erreurLogin();
                }
            }
        }
        
        function deconnexion(){
            $this->load->view('deconnexion');
        }
}
?>
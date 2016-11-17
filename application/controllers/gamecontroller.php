<?php
class GameController extends CI_Controller{
    
	function __construct(){
		parent::__construct();
		$this->load->model('gamemodel');
	}
	
	function index(){
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
                $onche = $this->gamemodel->register($_POST['pseudo'], $_POST['psw']);
                
                if($onche != null)
                    $this->players();
                else
                    $this->erreurAccount();
           }
       }
       
       function erreurAccount(){
           $data['infos'] = $this->gamemodel->getPlayers();
           $data['erreur'] = "Account already existing";
           $this->load->view('players', $data);
       }
       
       function delete($pseudo){
           if($pseudo !=''){
               $pseudo = str_replace("%20", " ", $pseudo);
               $this->gamemodel->delete($pseudo);               
           }
           $this->players();
       }
	   
	   function plateau(){//test de la vue plateau
		   $this->load->view('plateau');
	   }
}
?>
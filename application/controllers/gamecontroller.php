<?php
class GameController extends CI_Controller{
    
	function __construct(){
		parent::__construct();
		$this->load->model('gamemodel');
                $this->load->library('image_lib');

	}
	
	function index(){
		$this->load->view('game');
	}
        
        function cartes(){
            $data['array'] = $this->gamemodel->getCartes();
            $this->load->view('cartes', $data);
        }
        
       function cartesTraduites(){
           $data['array'] = $this->gamemodel->getCartes();
           $data['traduites'] = $this->gamemodel->getCartesTraduites();
           $this->load->view('cartes', $data);
       }
       
       function cartesImages(){
           $data['array'] = $this->gamemodel->getCartes();
           $data['traduites'] = $this->gamemodel->getCartesTraduites();
           $data['images'] = $this->gamemodel->getCartesImages();
           $this->load->view('cartes', $data);
       }
}
?>
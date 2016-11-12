<?php
class Gamemodel extends CI_Model{
    private $_cartes = array(8, 7, 6, 5, 5, 4, 4, 3, 3, 2, 2, 1, 1, 1, 1, 1);
       
	function __construct(){
		parent::__construct();
	}
        
        function getCartes(){
            return $this->_cartes;
        }
        
         function getCartesTraduites(){ // parce que le tableau associatif supprime les doublons
            $temp = $this->_cartes;
            $test = array();
            foreach($temp as $uneCarte){
                switch ($uneCarte){
                    case 1:  array_push ($test, "Guard ");        break;
                    case 2:  array_push ($test, "Priest ");       break;
                    case 3:  array_push ($test, "Baron ");        break;
                    case 4:  array_push ($test, "Handmaid ");     break;
                    case 5:  array_push ($test, "Prince ");       break;
                    case 6:  array_push ($test, "King ");         break;
                    case 7;  array_push ($test, "Countess ");     break;
                    case 8:  array_push ($test, "Princess ");     break;
                }
            }
            return $test;
            
        }
        
        function getCartesImages(){
             $temp = $this->_cartes;
             $images = array();
             foreach($temp as $uneCarte){
                 switch ($uneCarte){
                    case 1:  array_push ($test, "Guard ");        break;
                    case 2:  array_push ($test, "Priest ");       break;
                    case 3:  array_push ($test, "Baron ");        break;
                    case 4:  array_push ($test, "Handmaid ");     break;
                    case 5:  array_push ($test, "Prince ");       break;
                    case 6:  array_push ($test, "King ");         break;
                    case 7;  array_push ($test, "Countess ");     break;
                    case 8:  array_push ($test, "Princess ");     break;
                }
             }
             return $images;
        }
        
}
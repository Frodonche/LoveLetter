<?php
class Gamemodel extends CI_Model{
    private $_cartes = array(8, 7, 6, 5, 4, 3, 2, 1);
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
             $test = array();
             foreach($temp as $uneCarte){
                 switch ($uneCarte){
                    case 1:  array_push ($test, "http://localhost/LoveLetter/upload/guard.png");        break;
                    case 2:  array_push ($test, "http://localhost/LoveLetter/upload/priestess.png");    break;
                    case 3:  array_push ($test, "http://localhost/LoveLetter/upload/baron.png");        break;
                    case 4:  array_push ($test, "http://localhost/LoveLetter/upload/handmaid.png");     break;
                    case 5:  array_push ($test, "http://localhost/LoveLetter/upload/prince.png");       break;
                    case 6:  array_push ($test, "http://localhost/LoveLetter/upload/king.png");         break;
                    case 7;  array_push ($test, "http://localhost/LoveLetter/upload/countess.png");     break;
                    case 8:  array_push ($test, "http://localhost/LoveLetter/upload/princess.png");     break;
                }
             }
             return $test;
        }
        
}
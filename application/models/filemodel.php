<?php
class Filemodel extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function insert_string($word){
		$file = fopen('pass','a') or die("Can't open file");
		fwrite($file,"$word\n");
		fclose($file);
	}
	
	function get_strings(){
		$array = array();
		$file = fopen('pass','r') or die("Can't open file");
		while(!feof($file)){
			$array[] = fgets($file);
		}
		fclose($file);
		return $array;
	}
        
        function delete_strings(){
            $file = fopen('pass', 'w') or die("Can't open file");
            ftruncate($file,0);
        }
}
?>
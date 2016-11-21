<?php
session_start();
 
$_SESSION['user'] = $pseudo;
$_SESSION['psw'] = $psw;

header("location: http://localhost/LoveLetter/index.php/gamecontroller/game");
?>
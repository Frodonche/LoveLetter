<?php
    session_start();
    if(!isset($_SESSION['user'])){ //if login in session is not set
        header("Location: http://localhost/LoveLetter/index.php/gamecontroller/");
    }
?>
<html>
	<head>
            <link rel="stylesheet" type="text/css" href="http://localhost/LoveLetter/upload/mystyle.css">
            <title>Game</title>
	</head>
	
	<body>
            <h1> LoveLetter</h1>
            <center><a href="http://localhost/LoveLetter/index.php/gamecontroller/rooms"><img src="http://localhost/LoveLetter/upload/backCard.png" height="250" width="175" class="img-responsible"/></a></center>
        
            <center> <h2>How to Play</h2>

            <p>There are eight different types of cards show below. Each card has a number, and an effect when played.</p>

            <p>Each player holds one card in their hand. When it's your turn, you draw a card, then play a card. </p>

            <p>Some cards end the round immediately and determine who wins. Others simply have an effect on gameplay. </p>

            <p>If no one ends the round by playing a card which ends the round, then the player holding the highest-value card at the end (when the deck runs out) wins. </p>

            <p>The winner of each round earns a point. The first player to earn seven points wins the game. Happy playing!</p> <br/>
            
            
            
            <form method = 'POST' action='http://localhost/LoveLetter/index.php/gamecontroller/cartes'>
                    <h2> Cards </h2>
                    
                    <input type ='submit' value="Show me"/>
            </form>
            
            </center>
            
            <div id='boxdeco'>
                <form method = 'POST' action='http://localhost/LoveLetter/index.php/gamecontroller/deconnexion'>
                        <input type ='submit' value="Disconnect"/>
                </form>
            </div>
            
            <div id='boxid'>
                <p id='jaune'> Logged as <?php echo $_SESSION['user']; ?> </p>
            </div>
            
        </body>
        
</html>
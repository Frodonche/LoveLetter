<?php
    session_start();
    if(!isset($_SESSION['user'])){ //if login in session is not set
        header("Location: http://localhost/LoveLetter/index.php/gamecontroller/");
    }
?>

<html>

<head>
	<link rel="stylesheet" type="text/css" href="http://localhost/LoveLetter/upload/mystyle.css">
        <title>Lobby 3</title>
</head>

<body>
	<?php if(isset($lobby)){
                    foreach($lobby->result() as $row){
						
						$p1 = $row->player1;
						$p2 = $row->player2;
						$p3 = $row->player3;
					
					}
                        ?>
        <div id='boxquit'>
            <form method = 'POST' action='http://localhost/LoveLetter/index.php/gamecontroller/rooms'>	
                <td><input type ='submit' value="Quitter le lobby"/></td>
            </form>
        </div>
	<div class='boxmenu3'>
	
		<table background='http://localhost/LoveLetter/upload/fond_tableau.png'>
                    <tr>
			<td>Pioche</td>
			<td>Message</td>
                    </tr>
                    <tr>
			<td><img src='http://localhost/LoveLetter/upload/backCard.png' class='card3'/></td>
			<td>C'est au tour de [pseudo]</td>
                    </tr>
		
		</table>
	</div>
	<?php if (!empty($p1)){ ?>
	<div class='box31'>
		<table background='http://localhost/LoveLetter/upload/fond_tableau.png'>
			<tr> 
                            <td><img src='http://localhost/LoveLetter/upload/backCard.png' class='card3'/></td> 
                            <td><img src='http://localhost/LoveLetter/upload/backCard.png' class='card3'/></td>
                            <td><img src='http://localhost/LoveLetter/upload/backCard.png' class='card3'/></td>
                            <td><img src='http://localhost/LoveLetter/upload/backCard.png' class='card3'/></td>
                            <td><img src='http://localhost/LoveLetter/upload/backCard.png' class='card3'/></td>
                            <td><img src='http://localhost/LoveLetter/upload/backCard.png' class='card3'/></td>
                        </tr>
			<tr> 
                            <td colspan='3'><img src='http://localhost/LoveLetter/upload/backCard.png' class='card3'/></td> 
                            <td colspan='3'><img src='http://localhost/LoveLetter/upload/backCard.png' class='card3'/></td> 
                        </tr>
			<tr> 
                            <td>1</td>
                            <td colspan='5'><?php echo $p1 ?></td> 
                        </tr>

		</table>
        </div>
        <?php }?>   
            
	<?php if (!empty($p2)){ ?>
	<div class='box32'>
		<table background='http://localhost/LoveLetter/upload/fond_tableau.png'>
			<tr> 
                            <td><img src='http://localhost/LoveLetter/upload/backCard.png' class='card3'/></td> 
                            <td><img src='http://localhost/LoveLetter/upload/backCard.png' class='card3'/></td>
                            <td><img src='http://localhost/LoveLetter/upload/backCard.png' class='card3'/></td>
                            <td><img src='http://localhost/LoveLetter/upload/backCard.png' class='card3'/></td>
                            <td><img src='http://localhost/LoveLetter/upload/backCard.png' class='card3'/></td>
                            <td><img src='http://localhost/LoveLetter/upload/backCard.png' class='card3'/></td>
                        </tr>
			<tr> 
                            <td colspan='3'><img src='http://localhost/LoveLetter/upload/backCard.png' class='card3'/></td> 
                            <td colspan='3'><img src='http://localhost/LoveLetter/upload/backCard.png' class='card3'/></td> 
                        </tr>
			<tr> 
                            <td>1</td> 
                            <td colspan='5'><?php echo $p2 ?></td> 
                        </tr>

		</table>
	</div>
        <?php }?>
	
	<?php if (!empty($p3)){ ?>
		<div class='box33'>
		<table background='http://localhost/LoveLetter/upload/fond_tableau.png'>
			<tr> 
                            <td><img src='http://localhost/LoveLetter/upload/backCard.png' class='card3'/></td> 
                            <td><img src='http://localhost/LoveLetter/upload/backCard.png' class='card3'/></td>
                            <td><img src='http://localhost/LoveLetter/upload/backCard.png' class='card3'/></td>
                            <td><img src='http://localhost/LoveLetter/upload/backCard.png' class='card3'/></td>
                            <td><img src='http://localhost/LoveLetter/upload/backCard.png' class='card3'/></td>
                            <td><img src='http://localhost/LoveLetter/upload/backCard.png' class='card3'/></td>
                        </tr>
			<tr> 
                            <td colspan='3'><img src='http://localhost/LoveLetter/upload/backCard.png' class='card3'/></td> 
                            <td colspan='3'><img src='http://localhost/LoveLetter/upload/backCard.png' class='card3'/></td> 
                        </tr>
			<tr> 
                            <td>1</td> 
                            <td colspan='5'><?php echo $p3 ?></td> 
                        </tr>

		</table>
	</div>
	
        <?php }
        }
	?>
	
</body>

</html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="http://localhost/LoveLetter/upload/mystyle.css">
	<title>Plateau</title>
</head>

<body>
	<?php if(isset($lobby)){
                    foreach($lobby->result() as $row){
						
						$p1 = $row->player1;
						$p2 = $row->player2;
						$p3 = $row->player3;
						$p4 = $row->player4;
					
					}
                        ?>
        <div id='boxquit'>
            <form method = 'POST' action='http://localhost/LoveLetter/index.php/gamecontroller/'>	
                <td><input type ='submit' value="Quitter le lobby"/></td>
            </form>
        </div>
	<div id='boxmenu'>
	
		<table background='http://localhost/LoveLetter/upload/fond_tableau.png'>
                    <tr>
			<td>Pioche</td>
			<td>Message</td>
                    </tr>
                    <tr>
			<td><img src='http://localhost/LoveLetter/upload/backCard.png' height='155' width='100' class='img-responsible'/></td>
			<td>C'est au tour de [pseudo]</td>
                    </tr>
		
		</table>
	</div>
	<?php if (!empty($p1)){ ?>
	<div id='box1'>
		<table background='http://localhost/LoveLetter/upload/fond_tableau.png'>
			<tr> 
                            <td><img src='http://localhost/LoveLetter/upload/backCard.png' height='155' width='100' class='img-responsible'/></td> 
                            <td><img src='http://localhost/LoveLetter/upload/backCard.png' height='155' width='100' class='img-responsible'/></td> 
                            <td><img src='http://localhost/LoveLetter/upload/backCard.png' height='155' width='100' class='img-responsible'/></td> 
                            <td><img src='http://localhost/LoveLetter/upload/backCard.png' height='155' width='100' class='img-responsible'/></td> 
                        </tr>
			<tr> 
                            <td colspan='2'><img src='http://localhost/LoveLetter/upload/backCard.png' height='155' width='100' class='img-responsible'/></td> 
                            <td colspan='2'><img src='http://localhost/LoveLetter/upload/backCard.png' height='155' width='100' class='img-responsible'/></td> 
                        </tr>
			<tr> 
                            <td>1</td>
                            <td colspan='3'><?php echo $p1 ?></td> 
                        </tr>

		</table>
        </div>
        <?php }?>   
            
	<?php if (!empty($p2)){ ?>
	<div id='box2'>
		<table background='http://localhost/LoveLetter/upload/fond_tableau.png'>
			<tr> 
                            <td><img src='http://localhost/LoveLetter/upload/backCard.png' height='155' width='100' class='img-responsible'/></td> 
                            <td><img src='http://localhost/LoveLetter/upload/backCard.png' height='155' width='100' class='img-responsible'/></td> 
                            <td><img src='http://localhost/LoveLetter/upload/backCard.png' height='155' width='100' class='img-responsible'/></td> 
                            <td><img src='http://localhost/LoveLetter/upload/backCard.png' height='155' width='100' class='img-responsible'/></td> 
                        </tr>
			<tr> 
                            <td colspan='2'><img src='http://localhost/LoveLetter/upload/backCard.png' height='155' width='100' class='img-responsible'/></td> 
                            <td colspan='2'><img src='http://localhost/LoveLetter/upload/backCard.png' height='155' width='100' class='img-responsible'/></td> 
                        </tr>
			<tr> 
                            <td>1</td> 
                            <td colspan='3'><?php echo $p2 ?></td> 
                        </tr>

		</table>
	</div>
        <?php }?>
	
	<?php if (!empty($p3)){ ?>
		<div id='box3'>
		<table background='http://localhost/LoveLetter/upload/fond_tableau.png'>
			<tr> 
                            <td><img src='http://localhost/LoveLetter/upload/backCard.png' height='155' width='100' class='img-responsible'/></td> 
                            <td><img src='http://localhost/LoveLetter/upload/backCard.png' height='155' width='100' class='img-responsible'/></td> 
                            <td><img src='http://localhost/LoveLetter/upload/backCard.png' height='155' width='100' class='img-responsible'/></td> 
                            <td><img src='http://localhost/LoveLetter/upload/backCard.png' height='155' width='100' class='img-responsible'/></td>     
                        </tr>
			<tr> 
                            <td colspan='2'><img src='http://localhost/LoveLetter/upload/backCard.png' height='155' width='100' class='img-responsible'/></td> 
                            <td colspan='2'><img src='http://localhost/LoveLetter/upload/backCard.png' height='155' width='100' class='img-responsible'/></td> 
                        </tr>
			<tr> 
                            <td>1</td> 
                            <td colspan='3'><?php echo $p3 ?></td> 
                        </tr>

		</table>
	</div>
        <?php }?>
					
					
	<?php if (!empty($p4)){ ?>
	<div id='box4'>
		<table background='http://localhost/LoveLetter/upload/fond_tableau.png'>
			<tr> 
                            <td><img src='http://localhost/LoveLetter/upload/backCard.png' height='155' width='100' class='img-responsible'/></td> 
                            <td><img src='http://localhost/LoveLetter/upload/backCard.png' height='155' width='100' class='img-responsible'/></td> 
                            <td><img src='http://localhost/LoveLetter/upload/backCard.png' height='155' width='100' class='img-responsible'/></td> 
                            <td><img src='http://localhost/LoveLetter/upload/backCard.png' height='155' width='100' class='img-responsible'/></td> 
                        </tr>
			<tr> 
                            <td colspan='2'><img src='http://localhost/LoveLetter/upload/backCard.png' height='155' width='100' class='img-responsible'/></td> 
                            <td colspan='2'><img src='http://localhost/LoveLetter/upload/backCard.png' height='155' width='100' class='img-responsible'/></td> 
                        </tr>
			<tr> 
                            <td>1</td> 
                            <td colspan='3'><?php echo $p4 ?></td> 
                        </tr>

		</table>
	</div>
	
        <?php }
        }
	?>
	
</body>

</html>
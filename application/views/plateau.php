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
						
	<div id='boxmenu'>
	
		<table>
			<td>Pioche</td>
			<td>Message</td>
		<form method = 'POST' action='http://localhost/LoveLetter/index.php/gamecontroller/'>	
			<td><input type ='submit' value="Quit"/></td>
        </form>
		</table>
	</div>
	<?php if (!empty($p1)){ ?>
	<div id='box1'>
		<table align="left, top">
			<tr> <td>1</td> <td>1</td> <td>1</td> <td>1</td> </tr>
			<tr> <td colspan='2'>1</td> <td colspan='2'>1</td> </tr>
			<tr> <td>1</td> <td colspan='3'><?php echo $p1 ?></td> </tr>

		</table>
        </div>
        <?php }?>   
            
	<?php if (!empty($p2)){ ?>
	<div id='box2'>
		<table>
			<tr> <td>1</td> <td>1</td> <td>1</td> <td>1</td> </tr>
			<tr> <td colspan='2'>1</td> <td colspan='2'>1</td> </tr>
			<tr> <td>1</td> <td colspan='3'><?php echo $p2 ?></td> </tr>

		</table>
	</div>
        <?php }?>
	
	<?php if (!empty($p3)){ ?>
		<div id='box3'>
		<table>
			<tr> <td>1</td> <td>1</td> <td>1</td> <td>1</td> </tr>
			<tr> <td colspan='2'>1</td> <td colspan='2'>1</td> </tr>
			<tr> <td>1</td> <td colspan='3'><?php echo $p3 ?></td> </tr>

		</table>
	</div>
        <?php }?>
					
					
	<?php if (!empty($p4)){ ?>
	<div id='box4'>
		<table>
			<tr> <td>1</td> <td>1</td> <td>1</td> <td>1</td> </tr>
			<tr> <td colspan='2'>1</td> <td colspan='2'>1</td> </tr>
			<tr> <td>1</td> <td colspan='3'><?php echo $p4 ?></td> </tr>

		</table>
	</div>
	
        <?php }
        }
	?>
	
</body>

</html>
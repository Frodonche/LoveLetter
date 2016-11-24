<?php
    session_start();
    if(!isset($_SESSION['user'])){ //if login in session is not set
        header("Location: http://localhost/LoveLetter/index.php/gamecontroller/");
    }
    
    function getCardPath($number){
        switch($number){
            case 1:
                return "http://localhost/LoveLetter/upload/guard.png";
            case 2:
                return "http://localhost/LoveLetter/upload/priestess.png";
            case 3:
                return "http://localhost/LoveLetter/upload/baron.png";
            case 4:
                return "http://localhost/LoveLetter/upload/handmaid.png";
            case 5:
                return "http://localhost/LoveLetter/upload/prince.png";
            case 6:
                return "http://localhost/LoveLetter/upload/king.png";
            case 7:
                return "http://localhost/LoveLetter/upload/countess.png";
            case 8:
                return "http://localhost/LoveLetter/upload/princess.png";
        }
    }
    
?>

<html>

<head>
	<link rel="stylesheet" type="text/css" href="http://localhost/LoveLetter/upload/mystyle.css">
        
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">
        </script>
        <script>
            $(document).ready(function () {
                setInterval(function () {
                    $('#maj').load('http://localhost/LoveLetter/index.php/gamecontroller/plateau/20' +  ' #maj');
                }, 1000);
            });
       
       </script>
        
        <title>Lobby 2</title>
</head>

<body>
        <div id='boxid'>
                <p id='jaune'> Logged as <?php echo $_SESSION['user']; ?> </p>
        </div>
            <?php if(isset($lobby)){
                        foreach($lobby->result() as $row){

                                                    $p1 = $row->player1;
                                                    $p2 = $row->player2;

                                            }
                            ?>
        <div id='maj'>
            <div class='boxmenu2'>

                    <table background='http://localhost/LoveLetter/upload/fond_tableau.png'>
                        <tr>
                            <td>Pioche</td>
                            <td>Message</td>
                        </tr>
                        <tr>
                            <td>
                                <?php echo "<form method = 'POST' action='http://localhost/LoveLetter/index.php/gamecontroller/piocherCarte/".$_SESSION['user']."/20'>" ?>
                                    <input type='submit' class='card2' id='pioche' name='piocher'/>
                                </form> 
                            </td>
                            <td>C'est au tour de [pseudo]</td>
                        </tr>

                    </table>
            </div>

            <?php if (!empty($p1)){ //si un joueur a pris l'emplacement'?> 
                <div class='box21'>
                    <table background='http://localhost/LoveLetter/upload/fond_tableau.png'>
                            <tr> 	 
                                <?php if(isset($playersCardsPos1)){ //si le joueur a posé des cartes?>       
                                        <td  class='card2'><?php foreach($playersCardsPos1->result() as $temp){ echo '<img src="'.getCardPath($temp->premiere).'" class="card2" />'; ?></td> <!-- si le joueur a des cartes de posées, il y en a au moins une => pas de test-->

                                            <?php if(!empty($temp->deuxieme)){ ?> <!-- Si on a une deuxième carte --> 
                                                <td class='card2'><?php echo '<img src="'.getCardPath($temp->deuxieme).'" class="card2" />'; ?></td>  <!-- On l'affiche -->

                                            <?php }else{ ?>
                                                <td class='card2'></td> <!-- Sinon on affiche une case vide -->
                                            <?php } ?>   

                                            <?php if(!empty($temp->troisieme)){ ?> <!-- Si on a une troisieme carte --> 
                                                <td class='card2'><?php echo '<img src="'.getCardPath($temp->troisieme).'" class="card2" />'; ?></td>  <!-- On l'affiche -->

                                            <?php }else{ ?>
                                                <td class='card2'></td> <!-- Sinon on affiche une case vide -->
                                            <?php } ?>   

                                            <?php if(!empty($temp->quatrieme)){ ?> <!-- Si on a une quatrieme carte --> 
                                                <td class='card2'><?php echo '<img src="'.getCardPath($temp->quatrieme).'" class="card2" />'; ?></td>  <!-- On l'affiche -->

                                            <?php }else{ ?>
                                                <td class='card2'></td> <!-- Sinon on affiche une case vide -->
                                            <?php } ?>   

                                            <?php if(!empty($temp->cinquieme)){ ?> <!-- Si on a une cinquieme carte --> 
                                                <td class='card2'><?php echo '<img src="'.getCardPath($temp->cinquieme).'" class="card2" />'; ?></td>  <!-- On l'affiche -->

                                            <?php }else{ ?>
                                                <td class='card2'></td> <!-- Sinon on affiche une case vide -->
                                            <?php } ?>   

                                            <?php if(!empty($temp->sixieme)){ ?> <!-- Si on a une sixieme carte --> 
                                                <td class='card2'><?php echo '<img src="'.getCardPath($temp->sixieme).'" class="card2" />'; ?></td>  <!-- On l'affiche -->

                                            <?php }else{ ?>
                                                <td class='card2'></td> <!-- Sinon on affiche une case vide -->
                                            <?php } ?>   


                                    <?php } ?>      
                                <?php }else{ //si le joueur n'a pas posé de cartes'?>
                                    <td class='card2'></td><td class='card2'></td><td class='card2'></td><td class='card2'></td><td class='card2'></td><td class='card2'></td>
                                <?php } ?>
                            </tr>

                            <tr> 
                                <?php if(isset($playersCardsMain1)){ //si le joueur a des cartes dans la main?>
                                    <?php if($p1 == $_SESSION['user']){ ?> <!-- Encore une fois, si c'est notre espace -->
                                        <?php foreach($playersCardsMain1->result() as $temp){ ?>
                                            <?php if(!empty($temp->premiere)){ ?> <!-- Si on a une premiere carte --> 
                                                <td colspan='3' class='card2'><?php echo '<a href="http://www.google.fr"><img src="'.getCardPath($temp->premiere).'" class="card2" /></a>'; ?></td>  <!-- On l'affiche -->

                                            <?php }else{ ?>
                                                <td colspan='3' class='card2'></td> <!-- Sinon on affiche une case vide -->
                                            <?php } ?>   

                                            <?php if(!empty($temp->deuxieme)){ ?> <!-- Si on a une deuxieme carte --> 
                                                <td colspan='3' class='card2'><?php echo '<a href="http://www.google.fr"><img src="'.getCardPath($temp->deuxieme).'" class="card2" /></a>'; ?></td>  <!-- On l'affiche -->

                                            <?php }else{ ?>
                                                <td colspan='3' class='card2'></td> <!-- Sinon on affiche une case vide -->
                                            <?php } ?> 

                                        <?php } ?>

                                    <?php }else{ ?> <!-- Si c'est pas notre espace -->
                                        <?php foreach($playersCardsMain1->result() as $temp){ ?>
                                            <?php if(!empty($temp->premiere)){ ?> <!-- Si on a une premiere carte --> 
                                                <td colspan='3' class='card2'><img src='http://localhost/LoveLetter/upload/backCard.png' class='card2'/></td>  <!-- On l'affiche -->

                                            <?php }else{ ?>
                                                <td colspan='3' class='card2'></td> <!-- Sinon on affiche une case vide -->
                                            <?php } ?>   

                                            <?php if(!empty($temp->deuxieme)){ ?> <!-- Si on a une deuxième carte --> 
                                                <td colspan='3' class='card2'><img src='http://localhost/LoveLetter/upload/backCard.png' class='card2'/></td>  <!-- On l'affiche -->

                                            <?php }else{ ?>
                                                <td colspan='3' class='card2'></td> <!-- Sinon on affiche une case vide -->
                                            <?php } ?>   

                                        <?php } ?>        
                                    <?php } ?>

                                <?php }else{ ?> <!-- Si le joueur n'a pas de cartes dans la main -->
                                    <td colspan='3' class='card2'></td>
                                    <td colspan='3' class='card2'></td>
                                <?php } ?>
                            </tr>
                            <tr> 
                                <td>1</td>
                                <td colspan='5'><?php echo $p1 ?></td> 
                            </tr>
                    </table>
                </div>      

            <?php }else{?>   
                <div class='box21'>
                    <table background='http://localhost/LoveLetter/upload/fond_tableau.png'>
                            <tr> 
                                <td class='card2'></td><td class='card2'></td><td class='card2'></td><td class='card2'></td><td class='card2'></td><td class='card2'></td>
                            </tr>
                            <tr> 
                                <td colspan='3' class='card2'></td> 
                                <td colspan='3' class='card2'></td> 
                            </tr>
                            <tr> 
                                <td>[Score]</td>
                                <td colspan='5'>[Pseudo Joueur 1]</td> 
                            </tr>

                    </table>
                </div>
            <?php } ?>

            <?php if (!empty($p2)){ //si un joueur a pris l'emplacement'?> 
                <div class='box22'>
                    <table background='http://localhost/LoveLetter/upload/fond_tableau.png'>
                            <tr> 	 
                                <?php if(isset($playersCardsPos2)){ //si le joueur a posé des cartes?>       
                                        <td  class='card2'><?php foreach($playersCardsPos2->result() as $temp){ echo '<img src="'.getCardPath($temp->premiere).'" class="card2" />'; ?></td> <!-- si le joueur a des cartes de posées, il y en a au moins une => pas de test-->

                                            <?php if(!empty($temp->deuxieme)){ ?> <!-- Si on a une deuxième carte --> 
                                                <td class='card2'><?php echo '<img src="'.getCardPath($temp->deuxieme).'" class="card2" />'; ?></td>  <!-- On l'affiche -->

                                            <?php }else{ ?>
                                                <td class='card2'></td> <!-- Sinon on affiche une case vide -->
                                            <?php } ?>   

                                            <?php if(!empty($temp->troisieme)){ ?> <!-- Si on a une troisieme carte --> 
                                                <td class='card2'><?php echo '<img src="'.getCardPath($temp->troisieme).'" class="card2" />'; ?></td>  <!-- On l'affiche -->

                                            <?php }else{ ?>
                                                <td class='card2'></td> <!-- Sinon on affiche une case vide -->
                                            <?php } ?>   

                                            <?php if(!empty($temp->quatrieme)){ ?> <!-- Si on a une quatrieme carte --> 
                                                <td class='card2'><?php echo '<img src="'.getCardPath($temp->quatrieme).'" class="card2" />'; ?></td>  <!-- On l'affiche -->

                                            <?php }else{ ?>
                                                <td class='card2'></td> <!-- Sinon on affiche une case vide -->
                                            <?php } ?>   

                                            <?php if(!empty($temp->cinquieme)){ ?> <!-- Si on a une cinquieme carte --> 
                                                <td class='card2'><?php echo '<img src="'.getCardPath($temp->cinquieme).'" class="card2" />'; ?></td>  <!-- On l'affiche -->

                                            <?php }else{ ?>
                                                <td class='card2'></td> <!-- Sinon on affiche une case vide -->
                                            <?php } ?>   

                                            <?php if(!empty($temp->sixieme)){ ?> <!-- Si on a une sixieme carte --> 
                                                <td class='card2'><?php echo '<img src="'.getCardPath($temp->sixieme).'" class="card2" />'; ?></td>  <!-- On l'affiche -->

                                            <?php }else{ ?>
                                                <td class='card2'></td> <!-- Sinon on affiche une case vide -->
                                            <?php } ?>   

                                        <?php }?>        
                                <?php }else{ //si le joueur n'a pas posé de cartes'?>
                                    <td class='card2'></td><td class='card2'></td><td class='card2'></td><td class='card2'></td><td class='card2'></td><td class='card2'></td>
                                <?php } ?>
                            </tr>

                            <tr> 
                                <?php if(isset($playersCardsMain2)){ //si le joueur a des cartes dans la main?>
                                    <?php if($p2 == $_SESSION['user']){ ?> <!-- Encore une fois, si c'est notre espace -->
                                        <?php foreach($playersCardsMain2->result() as $temp){ ?>
                                            <?php if(!empty($temp->premiere)){ ?> <!-- Si on a une premiere carte --> 
                                                <td colspan='3' class='card2'><?php echo '<a href="http://www.google.fr"><img src="'.getCardPath($temp->premiere).'" class="card2" /></a>'; ?></td>  <!-- On l'affiche -->

                                            <?php }else{ ?>
                                                <td colspan='3' class='card2'></td> <!-- Sinon on affiche une case vide -->
                                            <?php } ?>   

                                            <?php if(!empty($temp->deuxieme)){ ?> <!-- Si on a une deuxieme carte --> 
                                                <td colspan='3' class='card2'><?php echo '<a href="http://www.google.fr"><img src="'.getCardPath($temp->deuxieme).'" class="card2" /></a>'; ?></td>  <!-- On l'affiche -->

                                            <?php }else{ ?>
                                                <td colspan='3' class='card2'></td> <!-- Sinon on affiche une case vide -->
                                            <?php } ?> 

                                        <?php } ?>

                                    <?php }else{ ?> <!-- Si c'est pas notre espace -->
                                        <?php foreach($playersCardsMain2->result() as $temp){ ?>
                                            <?php if(!empty($temp->premiere)){ ?> <!-- Si on a une premiere carte --> 
                                                <td colspan='3' class='card2'><img src='http://localhost/LoveLetter/upload/backCard.png' class='card2'/></td>  <!-- On l'affiche -->

                                            <?php }else{ ?>
                                                <td colspan='3' class='card2'></td> <!-- Sinon on affiche une case vide -->
                                            <?php } ?>   

                                            <?php if(!empty($temp->deuxieme)){ ?> <!-- Si on a une deuxième carte --> 
                                                <td colspan='3' class='card2'><img src='http://localhost/LoveLetter/upload/backCard.png' class='card2'/></td>  <!-- On l'affiche -->

                                            <?php }else{ ?>
                                                <td colspan='3' class='card2'></td> <!-- Sinon on affiche une case vide -->
                                            <?php } ?>   

                                        <?php } ?>        
                                    <?php } ?>

                                <?php }else{ ?> <!-- Si le joueur n'a pas de cartes dans la main -->
                                    <td colspan='3' class='card2'></td>
                                    <td colspan='3' class='card2'></td>
                                <?php } ?>
                            </tr>
                            <tr> 
                                <td>1</td>
                                <td colspan='5'><?php echo $p2 ?></td> 
                            </tr>
                    </table>
                </div>      

            <?php }else{?>   
                <div class='box22'>
                    <table background='http://localhost/LoveLetter/upload/fond_tableau.png'>
                            <tr> 
                                <td class='card2'></td><td class='card2'></td><td class='card2'></td><td class='card2'></td><td class='card2'></td><td class='card2'></td>
                            </tr>
                            <tr> 
                                <td colspan='3' class='card2'></td> 
                                <td colspan='3' class='card2'></td> 
                            </tr>
                            <tr> 
                                <td>[Score]</td>
                                <td colspan='5'>[Pseudo Joueur 2]</td> 
                            </tr>

                    </table>
                </div>
            <?php } ?>
        </div>
        <div id='boxquit'>
            <form method = 'POST' action='http://localhost/LoveLetter/index.php/gamecontroller/rooms'>	
                <td><input type ='submit' value="Quitter le lobby"/></td>
            </form>
        </div>
        <?php }?>
		
</body>

</html>
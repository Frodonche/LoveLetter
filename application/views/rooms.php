<?php
    session_start();
    if(!isset($_SESSION['user'])){ //if login in session is not set
        header("Location: http://localhost/LoveLetter/index.php/gamecontroller/");
    }
?>

<html>

    <head>
            <link rel="stylesheet" type="text/css" href="http://localhost/LoveLetter/upload/mystyle.css">
            <title>Rooms</title>
    </head>

    <body>
        <h1> Tables de jeu </h1>
        
        <div id='boxdeco'>
                <form method = 'POST' action='http://localhost/LoveLetter/index.php/gamecontroller/deconnexion'>
                        <input type ='submit' value="Disconnect"/>
                </form>
            </div>
        <center>
            <table background='http://localhost/LoveLetter/upload/fond_tableau.png'>
                <tr>
                    <th> ID </th>
                    <th> Taille </th>
                    <th> Player 1 </th>
                    <th> Player 2 </th>
                    <th> Player 3 </th>
                    <th> Player 4 </th>
                    <th> Etat </th>
                </tr>
            <?php if (isset($lobbies)){ 
                foreach($lobbies->result() as $row){ ?>
                <tr>
                    <td><?php echo $row->id; ?></td>
                    <td><?php 
                        if ($row->id >= 20 && $row->id <30){
                            echo "2";
                        }elseif ($row->id >= 30 && $row->id <40) {
                            echo "3";
                        }elseif ($row->id >= 40 && $row->id <50) {
                            echo "4";
                        }
                         ?>
                    </td>
                    <td><?php echo $row->player1; ?></td>
                    <td><?php echo $row->player2; ?></td>
                    <td>
                        <?php 
                            if(!empty($row->player3)){
                                echo $row->player3; 
                            }else{
                                echo "X";
                            }
                        ?>
                    </td>
                    <td>
                        <?php 
                            if(!empty($row->player4)){
                                echo $row->player4; 
                            }else{
                                echo "X";
                            }
                        ?>
                    </td>
                    <td> 
                        <?php
                            if($row->finie == 0){
                                echo "en cours";
                            }else{ 
                                echo "<a href='http://localhost/LoveLetter/index.php/gamecontroller/entrerLobby/".$row->id."/".$_SESSION['user']."'/> Disponible </a>";
                        
                        }
                        ?>
                    </td>
                </tr>
            <?php } }?>
            </table>
        </center>        
    
        <div id='boxid'>
                <p id='jaune'> Logged as <?php echo $_SESSION['user']; ?> </p>
        </div>
    </body>

    <footer>
        <form method = 'POST' action='http://localhost/LoveLetter/index.php/gamecontroller/game'>
                    <center><input type ='submit' value="Retour au menu"/></center>
        </form>    
    </footer>
</html>
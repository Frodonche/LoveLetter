<?php
    session_start();
    if(!isset($_SESSION['user'])){ //if login in session is not set
        header("Location: http://localhost/LoveLetter/index.php/gamecontroller/");
    }
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="http://localhost/LoveLetter/upload/mystyle.css">
        <title>Regles</title>
    </head>
    
    <body>
        <table align="center" id="jaune" >
            <caption id="jaune"> Cards </caption>
    
                <?php 
                    if(isset($array)){ // si on veut les noms              
                 ?>
                            <tr align="center">
                                <?php 
                                    foreach($array->result() as $row2){
                                    echo "<td id='ref'>".$row2->id."</td>"; 
                                    }
                                ?>
                             </tr>    
                             <tr align="center">
                                <?php 
                                    foreach($array->result() as $row2){
                                    echo "<td id='ref'>".$row2->name."</td>";
                                    }
                                ?>
                             </tr>
                             <tr align="center">
                                <?php 
                                    foreach($array->result() as $row2) {   
                                        echo "<td><img src='".$row2->path."' height='65%' width='100%' class='img-responsible'> </td>";
                                    }
                                ?>
                             </tr> 
                        <?php                                          
                    }
                        ?>
        </table>
        
        
</body>


<footer>
        <form method = 'POST' action='http://localhost/LoveLetter/index.php/gamecontroller/game'>
                    <center><input type ='submit' value="Retour au menu"/></center>
        </form>    
</footer>
</html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="http://localhost/LoveLetter/upload/mystyle.css">
        <title>Regles</title>
    </head>
    
    <body>
        <table align="center">
            <caption> Cards </caption>
            <tr align="center">
                <?php 
                    if(isset($array)){ // si on veut les numéros
                        foreach($array as $tab)
                           echo "<td id='ref'>".$tab."</td>";
                    }
                    ?>
             </tr>   
              
            <tr align="center">
            
                <?php 
                    if(isset($traduites)){ // si on veut les noms
                        foreach($traduites as $trad)
                            echo "<td id='ref'>".$trad."</td>";
                    }
                ?>

            </tr>
            <tr align="center">
                 <?php 
                    if(isset($images)){ // si on veut les noms
                        foreach($images as $im){
                            ?>
                <td> <img src="<?php echo $im; ?>" height="65%" width="100%" class="img-responsible"> </td>
                <?php
                        }
                    }
                ?>
            </tr>
        </table>
        
        <form method = 'POST' action='http://localhost/LoveLetter/index.php/gamecontroller/'>
                    <center><input type ='submit' value="Retour au menu"/></center>
        </form>
</body>
</html>
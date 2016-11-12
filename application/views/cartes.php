
        <table align="center">
            <caption> Cartes </caption>
            <tr align="center">
                <?php 
                    if(isset($array)){ // si on veut les numéros
                        foreach($array as $tab)
                           echo "<td>".$tab."</td>";
                    }
                    ?>
             </tr>   
              
            <tr align="center">
            
                <?php 
                    if(isset($traduites)){ // si on veut les noms
                        foreach($traduites as $trad)
                            echo "<td>".$trad."</td>";
                    }
                ?>

            </tr>
            <tr align="center">
                 <?php 
                    if(isset($images)){ // si on veut les noms
                        foreach($images as $im){
                            ?>
                <td> <img src="<?php echo $im; ?>" height="250" width="175" class="img-responsible"> </td>
                <?php
                        }
                    }
                ?>
            </tr>
        </table>
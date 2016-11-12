
        <table align="center">
            <caption> Cartes </caption>
            <tr align="center">
                <th> Numéro </th>
                <?php 
                    if(isset($array)){ // si on veut les numéros
                        foreach($array as $tab)
                           echo "<td>".$tab."</td>";
                    }
                    ?>
             </tr>   
              
            <tr align="center">
                <th> Traduction </th>
            
                <?php 
                    if(isset($traduites)){ // si on veut les noms
                        foreach($traduites as $trad)
                            echo "<td>".$trad."</td>";
                    }
                ?>

            </tr>
        </table>
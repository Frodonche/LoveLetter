<hmtl>
    <head>
        <link rel="stylesheet" type="text/css" href="http://localhost/LoveLetter/upload/mystyle.css">
        
 
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">
        </script>
        <script>
            $(document).ready(function () {
                setInterval(function () {
                    $('#tab').load('http://localhost/LoveLetter/index.php/gamecontroller/players/' +  ' #tab');
                }, 1000);
            });
       
       </script>
       
        <title>Players</title>
    </head>
    <body>
        <h1> Manage accounts </h1>

        <center><form method = 'POST' action='http://localhost/LoveLetter/index.php/gamecontroller/register'>
                <table>
                    <tr id="jaune">
                        <td><label>Pseudo</label></td>
                        <td><label>Password</label></td>
                    </tr>
                    <tr id="jaune">
                        <td><input type='text' name='pseudo' required/></td>
                        <td><input type='text' name='psw' required/></td>>  
                    </tr>
                </table>    
                        <center><input type ='submit' value="Add"/></center>
                
            </form>
            <?php if(isset($erreur)){ echo "<b><font color='red'>".$erreur."</font></b>";} ?>

        </center>
        
        <table align = center background='http://localhost/LoveLetter/upload/fond_tableau.png' id="tab">
            <caption> Player list </caption>
            <tr>
                <th> Pseudo </th>
                <th> Password </th>
                <th> Status </th>
                <th> Options </th>
            </tr>
                <?php if(isset($infos)){ 
                    foreach($infos->result() as $row){
                        ?>
            <tr>
                <td><?php echo $row->pseudo;?></td>
                <td><?php echo $row->password;?></td>
                <td><?php 
                        if ($row->online == 1){
                            echo "<font color='green'>online</font>";
                        }
                        else{
                            echo "<font color='red'>offline</font>";
                        }
                    ?>
                </td>
                <td>
                    <?php echo"<form method = 'POST' action='http://localhost/LoveLetter/index.php/gamecontroller/delete/".$row->pseudo."'>"; ?>
                        <input type ='submit' value="Delete" name="pseudo"/>
                    </form>    
                </td>
            </tr>
                <?php
                    }
                }             
                ?>
        </table>
        
                
    </body>
    
    <footer>
        <form method = 'POST' action='http://localhost/LoveLetter/index.php/gamecontroller/'>
                    <center><input type ='submit' value="Retour au menu"/></center>
        </form>    
    </footer>

</hmtl>
<?php
session_start();
if(isset($_SESSION['user'])){ //if login in session is set
        header("Location: http://localhost/LoveLetter/index.php/gamecontroller/game");
    }
?>

<html>

    <head>
            <link rel="stylesheet" type="text/css" href="http://localhost/LoveLetter/upload/mystyle.css">
            <title>Login</title>
    </head>

    <body>
        <h1> Login </h1>
        <center>
            <form method = 'POST' action='http://localhost/LoveLetter/index.php/gamecontroller/logcontrol'>
                <table background='http://localhost/LoveLetter/upload/fond_tableau.png'>
                    <tr>
                        <td><label>Pseudo</label></td>
                        <td><label>Password</label></td>
                    </tr>
                    <tr>
                        <td><input type='text' name='pseudo' required/></td>
                        <td><input type='text' name='psw' required/></td> 
                    </tr>
                    <tr>
                        <td colspan="2"><input type='submit' value='Login'/></td>
                    </tr>
                </table>
            </form>
             <?php if(isset($erreurLogin)){ echo "<b><font color='red'>".$erreurLogin."</font></b>";} ?>
            
            <br/><br/>
            
            <h2> Pas encore inscrit ? </h2>
            
            <form method = 'POST' action='http://localhost/LoveLetter/index.php/gamecontroller/register'>
                <table background='http://localhost/LoveLetter/upload/fond_tableau.png'>
                    <tr>
                        <td><label>Pseudo</label></td>
                        <td><label>Password</label></td>
                    </tr>
                    <tr>
                        <td><input type='text' name='pseudo' required/></td>
                        <td><input type='text' name='psw' required/></td> 
                    </tr>
                    <tr>
                        <td colspan="2"><input type='submit' value='Register'/></td>
                    </tr>
                </table>
            </form>
            <?php if(isset($erreur)){ echo "<b><font color='red'>".$erreur."</font></b>";} ?>
        </center>
    </body>
</html>
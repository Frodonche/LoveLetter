<html>
	<head>
		<title>Formulaire</title>
	</head>
	
	<body>
		<center>
		<?php
		if (isset($message)){
			echo "$message<br/>";
		}
		if(isset($comptes)){
			echo "<font color='green'><b>Liste des comptes et mot de passe</b></font><br/>";
			foreach($comptes as $word){
				echo "$word<br/>";
			}
			echo "<font color='green'><b>---------------------------------</b></font><br/>";
		}
		?>
			<form method = 'POST' action='http://localhost/LoveLetter/index.php/filecontroller/insert'>
				Compte : <input type = 'text' name = 'compte'/><br/>
				Mot de passe : <input type = 'password' name = 'mdp'/><br/>
				<input type='submit' value='Valider'/>
			</form>
                    <form method = 'POST' action='http://localhost/LoveLetter/index.php/filecontroller/delete'>
                        <input type='submit' value='Reset'/>
                    </form>
			<a href="http://localhost/LoveLetter/index.php/filecontroller/show">Afficher la liste des comptes</a>
		</center>
	</body>
</html>
<?php

$error_message='';

$bdd = new PDO("mysql:host=localhost; dbname=mydb; charset=utf8","root","");
	$entrees=$bdd->query("SELECT * FROM utilisateur");
		if(false==empty($_POST)){
			$post_username = $_POST['ID'];
			$post_password = $_POST['password'];
			while ($ligne = $entrees -> fetch()){
				if($post_username==$ligne["Nom"]&$post_password==$ligne["Mot_de_passe"]){
						session_start();
						$_SESSION['nom'] = $ligne["Nom"];
						$_SESSION['prenom'] = $ligne["Prénom"];
						$_SESSION['mail'] = $ligne["mail"];
						header ('Location: accueil.php');
			            exit();
			      }
				else{
					$error_message='Erreur de nom d\'utilisateur ou de mot de passe';
				}
				}
		}
		if (false == empty($error_message)){
			$error_message="<div class=\"alert alert-danger\" role=\"alert\">$error_message</div>";
		}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Page de connexion</title>
	<link rel="stylesheet" type="text/css" href="connexion.css">
</head>
<body>

	<header>
		<div id="logo"><img src="logorond.png" style="width:200px"></div>
		<h1>Bienvenue sur le site Connect'Home !</h1>
		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	</header>


	<section>
		<article><br>
			<div id="phrase">Veuillez vous connecter pour continuer</div>
            <form method="post" action="">
	            <?php echo $error_message;?>
				<label>Nom d'utilisateur:</label><br>
				<img src="user.png" style="width: 15px">
				<input type="text" name="ID"><br><br>
				<label>Mot de passe:</label><br>
				<img id="cadenas" src="cadenas.png" style="width: 15px">
				<input type="password" name="password"><br><br>
				<input type="submit" name="Connexion" value="Connexion">
	        </form><br>

		</article>
		<center><aside>
			<p><strong>Vous n'êtes pas encore inscrits ?</strong><br>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
			</p>
		</aside></center><br>
	</section>

	<footer>
		<p><center>Adresse : 28, rue Notre-Dame-des-Champs, 75006, Paris / Téléphone :  01 49 54 52 00 / Mail : domisep@gmail.com</center></p>
	</footer>

</body>

</html>

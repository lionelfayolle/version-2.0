<?php
$error_message='';
$bdd = new PDO("mysql:host=localhost; dbname=mydb; charset=utf8","root","");
	$entrees=$bdd->query("SELECT * FROM administrateur"); //on se place dans la table admiistrateur de la BDD
		if(false==empty($_POST)) //Si le champ d'entrée n'est pas vide
		{
			$post_username = $_POST['ID']; //On associe la valeur ntrée à $post_username
			$post_password = $_POST['password'];
			while ($ligne = $entrees -> fetch())
			{
				if($post_username==$ligne["identifiant"] & $post_password==$ligne["mdp"]) //Si l'identifiant et le mdp correspondent
				{
						session_start(); //on démarre la session
						$_SESSION['nom'] = $ligne["nom"];
						$_SESSION['prenom'] = $ligne["prenom"];
						header ('Location: backoffice_clients.php');
						exit();
				}
				else //Si c'est pas bon, erreur
				{
					$error_message='Erreur de nom d\'utilisateur ou de mot de passe';
				}
			}
		}
		if (false == empty($error_message))
		{
			$error_message="<div class=\"alert alert-danger\" role=\"alert\">$error_message</div>";
		}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Connexion Back-Office</title>
	<link rel="stylesheet" type="text/css" href="connexion_bo.css">
</head>
<body>


	<div class="titre"><center>Connexion administrateur</center></div>
	<p>Entrez votre indentifiant et votre mot de passe pour vous connecter à l'espace administrateur</p>
	<?php echo $error_message;?>
	<center><form action="" method="POST">
	<!-- création du formulaire pour entrer son identifiant et son mot de passe -->
		<input type="text" name="ID" placeholder="Identifiant"><br> <br>
		<input type="password" name="password" placeholder="Mot de passe"><br> <br>
		<input type="submit" name="bouton" class="bouton" value="Se connecter" >
	</form></center>
</body>
</html>

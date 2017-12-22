<?php
session_start();

?>
<!DOCTYPE html>
	<html>
		<head>
		<meta charset="UTF-8B" />
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="Categorie_capteurs.css"/>
		<title>Catégorie de capteurs</title>

		</head>
		<?php include("header.php"); ?>

		<body>
			<form method="post" action="traitement.php">
			<div align="right">
				<label>Veuillez entrer l'identifiant de votre commande</label> : <input type="text" name="commande" />
				<input type="submit" value="Envoyer" />
			</div> .<p>
			</form>
		</body>
		<?php include("footer.php"); ?>

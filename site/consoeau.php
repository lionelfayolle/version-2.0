<?php
session_start();
?>

<!DOCTYPE html>
	<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width">
		<title>Capteurs de consommation d'eau</title>
		<link rel="stylesheet" type="text/css" href="design_catalogue_type_capteur.css">
	</head>

<?php include("header.php"); ?>
		
	<body>


		<article>
		<center><h1>Liste des capteurs en panne</h1></center>

		<center>

			<?php
				// Connexion à la base de données
				try
				{
					$bdd = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'root', '');
				}
				catch(Exception $e)
				{
					die('Erreur : '.$e->getMessage());
				}

				//requête pour récupérer les info triées par date depuis la table pannes
				$reponse = $bdd->query('SELECT * FROM type_de_device WHERE type_de_capteur = "Consommation d\'eau"');

				// Affichage de ces informations dans un tableau
				echo "<table border=1>
				<tr>
					<td> <strong>Nom</strong> </td>
					<td> <strong>Fonction</strong> </td>
					<td> <strong>Type de capteur</strong> </td>
					<td> <strong>Prix</strong> </td>
				</tr>
				";
				
				while ($donnees = $reponse->fetch())
				{
					echo "
					<tr>
						<td>".$donnees["nom_du_device"]."</td>
						<td>".$donnees["fonction"]."</td>
						<td>".$donnees["type_de_capteur"]."</td>
						<td>".$donnees["prix"]."</td>
				     </tr>
				     	";
				}
				echo "</table>"; 
			?>

		</center>
		</article>




			<!-- Formulaire pour commander un article -->
		<form method="post" action="traitement.php">
			<div align="right">
				<label>Veuillez entrer l'identifiant de votre commande : </label><input type="text" name="commande" />
				<input type="submit" value="Envoyer" />
			</div>
		</form>
		<?php include("footer.php"); ?>
	</body>

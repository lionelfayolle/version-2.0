<?php
session_start();

?>
<!DOCTYPE html>
	<html>
		<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="catalogue.css"/>
		<title>Catégorie de capteurs</title>
		</head>

		<?php include("header.php"); ?>

		<body>
			<br>
			<div class="com_en_cours">
				<center> <table>
				<caption> <h2> Commandes en cours </h2> </caption>
				<tr>
				<th> Nom de l'article </th>
				<th> Identifiant de l'article </th>
				<th> Date de commande </th>
				</tr>
				<!-- ici on ajoutera les lignes php pour prendre les commandes de la base de données -->
				</table> </center>
			</div>

<div class="com_en_cours">
	<center> <table cellspacing="20">
	<caption> <h2> Catégories de capteurs </h2> </caption>
	<tr>
	<td>
	<a href="humidite.php"><img src="goutte.jpg" height="300" width="300" alt="Capteur d'humidité" title="Capteur d'humidité" class="pics"/><br/>
	<p>Capteur d'humidité<p></a>
	</td>
	<td>
	<a href="camera.php"><img src="camera.jpg"height="300" width="300"  alt="Camera" title="Caméra" class="pics"/><br/>
	<p>Camera<p></a>
	</td>
	<td>
	<a href="temperature.php"><img src="temp.jpg"height="300" width="300"  alt="Capteur de température" title="Capteur de température" class="pics"/><br/>
	<p>Capteur de température<p></a>
	</td>
	<td>
	<a href="mouvement.php"><img src="mouvement.jpg"height="300" width="300"  alt="Capteur de mouvement" title="Capteur de mouvement" class="pics"/><br/>
	<p>Capteur de mouvement<p></a>
	</td>
	</tr>
	<tr>
	<td>
	<a href="luminosite.php"><img src="luminosite.jpg"height="300" width="300"  alt="Capteur de luminosite" title="Capteur de luminosité" class="pics"/><br/>
	<p>Capteur de luminosité<p></a>
	</td>
	<td>
	<a href="fumee.php"><img src="feu.jpg"height="300" width="300"  alt="Capteur de fumee" title="Capteur de fumée" class="pics"/><br/>
	<p>Capteur de fumée<p></a>
	</td>
	<td>
	<a href="consoeau.php"><img src="consoeau.jpg"height="300" width="300"  alt="Capteur de consommation d'eau" title="Capteur de consommation d'eau" class="pics"/><br>
	<p>Capteur de consomation d'eau<p></a>
	</td>
	<td>
	<a href="consoelec.php"><img src="consoelec.jpg"height="300" width="300"  alt="Capteur de consommation d'électricité" title="Capteur d'électricité" class="pics"/><br>
	<p>Capteur de consomation d'électricité<p></a>
	</td>
	</tr>


	</table> </center>
</div>

		</br>


		</body>
		<?php include("footer.php"); ?>


<!DOCTYPE html>
	<html>
		<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="Categorie_capteurs.css"/>
		<title>Catégorie de capteurs</title>
		</head>
		
		<body>
		<header>
		<img class="headerimg" src="logorond.png">
		<p><ul class="headerul">
        <li class= "headerli"><a href="accueil.php" class = "headera">Accueil</a></li>
        <li class= "headerli"><a href="catalogue.php" class = "headera">Catalogue</a></li>
        <li class= "headerli"><a href="capteurs.php" class = "headera">Capteurs & Actionneurs</a></li>
        </ul>
        </p>  
    </header>
		<center> <table>
		<caption> <h2> Commandes en cours </h2> </caption>
		<tr>
		<th> Nom de l'article </th>
		<th> Identifiant de l'article </th>
		<th> Date de commande </th>
		</tr>
		<!-- ici on ajoutera les lignes php pour prendre les commandes de la base de données -->
		</table> </center>
		
		<center> <table cellspacing=20>
		<caption> <h2> Catégories de capteurs </h2> </caption>
		<tr>
		<td>
		<a href="humidite.php"><img src="goutte.jpg" height="350" width="350" alt="Capteur d'humidité" title="Capteur d'humidité"/></a>
		</td>
		<td>
		<a href="camera.php"><img src="camera.jpg"height="350" width="350"  alt="Camera" title="Caméra"/></a>
		</td>
		<td>
		<a href="temperature.php"><img src="temp.jpg"height="350" width="350"  alt="Capteur de température" title="Capteur de température"/></a>
		</td>
		<td>
		<a href="mouvement.php"><img src="mouvement.jpg"height="350" width="350"  alt="Capteur de mouvement" title="Capteur de mouvement"/></a>
		</td>
		</tr>
		<tr>
		<td>
		<a href="luminosite.php"><img src="luminosite.jpg"height="350" width="350"  alt="Capteur de luminosite" title="Capteur de luminosité"/></a>
		</td>
		<td>
		<a href="fumee.php"><img src="feu.jpg"height="350" width="350"  alt="Capteur de fumee" title="Capteur de fumée"/></a>
		</td>
		<td>
		<a href="consoeau.php"><img src="consoeau.jpg"height="350" width="350"  alt="Capteur de consommation d'eau" title="Capteur de consommation d'eau"/></a>
		</td>
		<td>
		<a href="consoelec.php"><img src="consoelec.jpg"height="350" width="350"  alt="Capteur de consommation d'électricité" title="Capteur d'électricité"/></a>
		</td>
		</tr>
		
		
		</table> </center>
		</br>
		<form method="post" action="traitement.php">
		<div align="right">
			<label>Veuillez entrer l'identifiant de votre commande</label> : <input type="text" name="commande" />
			<input type="submit" value="Envoyer" />
		</div> .<p>
		</form>
		<footer>
			<p><center>Adresse : 28 Rue Notre Dame des Champs, 75006 Paris / Téléphone : 01 49 54 52 00 / Mail : domisep@gmail.com</center>
			</p>
		</footer>
		</body>
		

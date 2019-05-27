<?php
session_start();
?>
<!DOCTYPE html>
	<html>
		<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="capteursactionneurs2.css"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<title>Catégorie de capteurs</title>
		</head>
		<?php include("header.php"); ?>

		<body>
	 <article>
	 <center><h2>Valeurs de vos capteurs<h2></center>

	 <center>
		<?php
		try
		{
																																											// On se connecte à MySQL
		$bdd = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'root', 'root');
		}
		catch(Exception $e)
		{																																				// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
		}
			$reponse = $bdd->prepare('SELECT * FROM donnees_capteurs NATURAL JOIN devices WHERE donnees_capteurs.Devices_idDevices = Devices.idDevices AND CeMac_idCeMac=?');
	  $reponse->execute(array($_SESSION['idcemac']));

		echo "<table border=1>
		<tr>
			<td>Pièce</td>
			<td>Type</td>
			<td>Valeur</td>
		</tr>
		";

		while ($donnees = $reponse->fetch())
		{

	    	echo "
	    	<tr>
				<td>".$donnees["nom_piece"]."</td>
	     	<td>".$donnees["nom_capteur"]."</td>
	     	<td>".$donnees["valeur_mesuree"]."</td>
	     	</tr>
	     	";
	  }
	  echo "</table>";

			?>
		</center>

		<br />


<?php

$reponse->closeCursor(); 																							// Termine le traitement de la requête

?>
	</article>
<center>
	<h2>Valeurs de vos actionneurs</h2>

	<?php
	try
	{																																						// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'root', 'root');
	}
	catch(Exception $e)
	{																																									// En cas d'erreur, on affiche un message et on arrête tout
			die('Erreur : '.$e->getMessage());
	}
	$reponse = $bdd->prepare('SELECT * FROM donnees_actionneurs NATURAL JOIN devices');
	$reponse->execute(array($_SESSION['idcemac']));

	echo "<table border=1>
	<tr>
		<td>Pièce</td>
		<td>Type</td>
		<td>Valeur actuelle</td>
		<td>Valeur souhaitée</td>
	</tr>
	";

	while ($donnees = $reponse->fetch())
	{

			echo "
			<tr>
				<td>".$donnees["nom_piece"]."</td>
				<td>".$donnees["nom_actionneur"]."</td>
				<td>".$donnees["consigne_temporelle_de_debut"]."</td>
				<td>".$donnees["valeur_de_consigne"]."</td>

			</tr>
			";
	}
	echo "</table>";

		?>
	</center>
	<center>

	<article>

        <div class="container">

        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" >Modifier une valeur</button> <!-- le bouton pour mofifier une valeur, le type de fenetre est le meme que pour les articles -->


        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modifier la valeur d'un actionneur</h4>
            </div>
				<form  method="post" action="../Controller/modifier.php">
        <div class="modal-body">
        <p>
        	Sélectionner une pièce, un type d'actionneur et modifier sa valeur:
            <br>
						<label>Les pièces :</label>
            <select type="piece" placeholder="nom de la pièce" name="Nom_piece">
							<option value='bureau'>Bureau</option>
 	            <option value='cuisine'>Cuisine</option>
 	            <option value='salle de bain'>Salle de bain</option>
 	            <option value='salon'>Salon</option>
 	            <option value='toilettes'>Toilettes</option>
 	            <option value='chambre'>Chambre</option>
						</select>
            </br>
						<label>Type de capteur :</label>
						<select name='type' id='type'>
	 					 <option value='luminosité'>Luminosité</option>
	 					 <option value='présence'>Présence</option>
	 					 <option value='humidité'>Humidité</option>
	 					 <option value='température'>Température</option>
	 				</select></br>
						<label>Valeur souhaitée :</label>
            <input type="number" placeholder="valeur souhaitée" name="valeur_de_consigne"></br>
						<input type="submit" value = "Modifier">
        </p>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default" data-dismiss="modal">Fermer</button>
        </div>
			</form>
      </div>
    </div>
  </div>
</div>

    </article>
	</center>


	</form>
		</body>
</html>

<!DOCTYPE html>
	<html>
		<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="capteursactionneurs.css"/>
		<title>Catégorie de capteurs</title>
		</head>
		<?php include("header.php"); ?>

		<body>
	<h2> <center> Vos capteurs et actionneurs </center> <h2>
	<center> <table>
	<tr>
	<th>Nom du capteur </th>
	<th>Dernière valeur relevée </th>
	<th>Moyenne des valeurs relevées hier </th>
	</tr>
	</table> </center>

	<form method="post" action="traitement.php">
	<center><p>
   <p>
       <label for="actionneur">Veuillez sélectionnez votre actionneur</label><br />
       <select name="actionneur" id="actionneur">
           <option value="capteur1">capteur 1</option>
           <option value="capteur2">capteur 2</option>
           <option value="capteur3">capteur 3</option>
           <option value="capteur4">capteur 4</option>
           <option value="capteur5">capteur 5</option>

       </select>

	</p>
	</form>
	<label for="commande">Veuillez entrer la valeur souhaitée</label><br />
	<input type="number" />
	<input type="submit" value="Commander" />
	 </p>  </center>
	 	<?php include("footer.php"); ?>
		</body>

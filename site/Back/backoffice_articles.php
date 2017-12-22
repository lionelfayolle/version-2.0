<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width">
	<title>Back-Office catalogue</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="backoffice_1.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> <!-- inclure les fenetres modales -->
</head>
<?php include("header_bo.php"); ?>
<body>

	<center>
		<h1> Gestion des articles en vente sur le site </h1>
		<h4> Articles disponibles à la vente </h4>

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

  $reponse = $bdd->query('SELECT reference_produit, nom_du_device, prix, identification, fonction, unite, surface_couverte FROM type_de_device ORDER BY reference_produit'); // on récupère les données de la base

  echo "<table border=1>
  <tr>
    <td> reference_produit </td>
		<td> nom_du_device </td>
    <td> prix </td>
		<td> identification</td>
		<td> fonction</td>
		<td> unite</td>
		<td> surface_couverte </td>
  </tr>
  "; // en tete du tableau
  while ($donnees = $reponse->fetch()) // quand il y a des données à inclure, on crée une nouvelle case et la remplie
  {
    echo "
    <tr>
     <td>".$donnees["reference_produit"]."
		 <td>".$donnees["nom_du_device"]."</td>
     <td>".$donnees["prix"]."</td>
		 <td>".$donnees["identification"]."</td>
		 <td>".$donnees["fonction"]."</td>
		 <td>".$donnees["unite"]."</td>
     <td>".$donnees["surface_couverte"]."</td>
     </tr>
     "; // on met les données dans les cases une par une
  }
  echo "</table>";

  $reponse->closeCursor();

  ?>
	</center>
	<p>

		<article>

        <div class="container">
				<form  method="post" action="post_articles.php">
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Ajouter un article</button> <!-- le bouton pour ajouter un article -->

        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ajouter un article</h4>
            </div>
        <div class="modal-body"> <!-- Ouverture de la fenetre modale -->
        <p>
        	Entrez les informations sur le nouvel article
            <br>

            <input type="text" placeholder="Référence produit" name="reference_produit">
            <br>

            <input type="text" placeholder="Nom" name = "nom_du_device">
            <br>

            <input type="text" placeholder="Prix" name = "prix">
            <br>

            <select name = "identification">
              <option value="Capteur">Capteur</option>
              <option value="Actionneur">Actionneur</option>
            </select>
            <br>

            <select  name = "fonction">
              <option value="Humidite">Humidité</option>
              <option value="Camera">Caméra</option>
              <option value="Temperature">Température</option>
              <option value="Luminosite">Luminosité</option>
              <option value="Fumee">Fumée</option>
              <option value="Consommation d'eau">Consommation d'eau</option>
              <option value="Electricite">Electricité</option>
            </select>

						<input type="text" placeholder="unité" name="unite">
            <br>

						<input type="text" placeholder="Surface couverte" name="surface_couverte">
            <br>
						<input type="submit" value = "Ajouter"> <!-- le bouton doit être dans la fenetre modale -->
        </p>

        </div>
        <div class="modal-footer">
          <input type="buttton" class="btn btn-default" data-dismiss="modal" value = "Fermer"> <!-- Ce bouton ne permet pas de submit correctement -->
        </div>

      </div>
    </div>
  </div>
</form>
</div>
    </article>
	</p>
	<article>

			<div class="container">

				<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2">Supprimer un article</button> <!-- Même type de bouton pour la suppression d'article -->

					<div class="modal fade" id="myModal2" role="dialog">
							<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-title">Supprimer un article</h4>
										</div>
										<form  method="post" action="del_articles.php">
										<div class="modal-body">

												<p>
														Entrez la référence de l'article à supprimer
														<br>
														<input type="text" placeholder="Référence produit" name="reference_del">
														<input type="submit" value = "Supprimer">

												</p>

										</div>

										<div class="modal-footer">
										 <input type="button" class="btn btn-default" data-dismiss="modal" value = "Fermer">
										</div>
										</form>
									</div>
								</div>
						</div>

			</div>
	</article>




</body>
</html>

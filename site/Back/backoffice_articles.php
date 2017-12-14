<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width">
	<title>Back-Office catalogue</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="backoffice_1.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<?php include("header_bo.php"); ?>
<body>


	<table>
		<caption> <center>
			Liste des articles en vente
		</center></caption>
		<!-- mettre ici un tableau avec tous les comptes utilisateurs -->

	</table>
	<p>
		<center>
			Gestion des articles en vente sur le site
		</center>
		<article>

        <div class="container">

        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Ajouter un article</button>


        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ajouter un article</h4>
            </div>
        <div class="modal-body">
        <p>
        	Entrez les informations sur le nouvel article
            <br>
            <input type="text" placeholder="Référence produit">
            <br>
            <input type="text" placeholder="Nom">
            <br>
            <input type="text" placeholder="Prix">
            <br>
            <select name="type_CA" id="type_CA">
              <option value="Capteur">Capteur</option>
              <option value="Actionneur">Actionneur</option>
            </select>
            <br>
            <select name="fonction" id="fonction">
              <option value="Humidite">Humidité</option>
              <option value="Camera">Caméra</option>
              <option value="Temperature">Température</option>
              <option value="Luminosite">Luminosité</option>
              <option value="Fumee">Fumée</option>
              <option value="Consommation d'eau">Consommation d'eau</option>
              <option value="Electricite">Electricité</option>
            </select>
        </p>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default" data-dismiss="modal">Ajouter</button>
        </div>
      </div>
    </div>
  </div>
</div>
      <!-- On ajoutera la fonction modifier et supprimer pour chaque article dans le tableau -->
    </article>
	</p>

</body>
</html>

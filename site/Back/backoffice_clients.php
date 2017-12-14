<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width">
	<title>Back-Office 1</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="backoffice_1.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php include("header_bo.php"); ?>

	<table>
		<caption> <center>
			Liste des clients
		</center></caption>
		<!-- mettre ici un tableau avec tous les comptes utilisateurs -->

	</table>
	<p>
		<center>
			Gestion des comptes uilisateurs
		</center>
		<article>

        <div class="container">

        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Créer un compte</button>


        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ajouter un utilisateur</h4>
            </div>
        <div class="modal-body">
        <p>
        	Entrez les informations sur nouvel utilisateur
            <br>
            <input type="text" placeholder="Identifiant de l'utilisateur">
            <br>
            <input type="text" placeholder="Mot de passe initial">
            <br>
            <select name="type" id="type">
           		<option value="Administrateur">Administrateur</option>
           		<option value="Client">Client</option>
           	</select>
            <br>
            <input type="text" placeholder="Nom">
            <br>
            <input type="text" placeholder="Prénom">
            <br>
            <input type="text" placeholder="Adresse mail">
        </p>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default" data-dismiss="modal">Ajouter</button>
        </div>
      </div>
    </div>
  </div>
</div>

    </article>
     <br>
    <article>

        <div class="container">
  <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2">Ajouter un domicile</button>

  <!-- Modal -->
        <div class="modal fade" id="myModal2" role="dialog">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Créer un domicile</h4>
              </div>
              <div class="modal-body">
                <p>
                Entrez les informations sur le nouveau domicile
                <br>
                <input type="text" placeholder="Identifiant de l'utilisateur associé">
                <br>
                <input type="text" placeholder="Adresse">
                <br>
                <input type="text" placeholder="Code Postal">
                <br>
                <input type="text" placeholder="Ville">
                <br>
                <select name="type_domicile" id="type_domicile" >
                  <option value="Maison">Maison</option>
                  <option value="Appartement">Appartement</option>
                </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Ajouter</button>
        </div>
      </div>
    </div>
  </div>
</div>

    </article>
	</p>

</body>
</html>

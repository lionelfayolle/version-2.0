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
<center>
	<h1> Gestion des comptes utilisateurs </h1>
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

$reponse = $bdd->query('SELECT Code_utilisateur, Mot_de_passe, Nom, Prenom,Type_utilisateur, mail FROM utilisateur ORDER BY Code_utilisateur');

echo "<table border=1>
<tr>
	<td> Code_utilisateur </td>
	<td> Nom </td>
	<td> Prénom </td>
	<td> Type d'utilisateur </td>
	<td> mail </td>
</tr>
";
while ($donnees = $reponse->fetch())
{
	echo "
	<tr>
	 <td>".$donnees["Code_utilisateur"]."</td>
	 <td>".$donnees["Nom"]."</td>
	 <td>".$donnees["Prenom"]."</td>
	 <td>".$donnees["Type_utilisateur"]."</td>
	 <td>".$donnees["mail"]."</td>

	 </tr>
	 ";
}
echo "</table>";

$reponse->closeCursor();

?>
</center>
	<p>


		<article>

        <div class="container">

        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" >Créer un compte</button> <!-- le bouton pour ajouter un compte, le type de fenetre est le meme que pour les articles -->


        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ajouter un utilisateur</h4>
            </div>
				<form  method="post" action="post_clients.php">
        <div class="modal-body">
        <p>
        	Entrez les informations sur nouvel utilisateur
            <br>
            <input type="text" placeholder="Code de l'utilisateur" name="Code_utilisateur">
            <br>
            <input type="text" placeholder="Mot de passe initial" name="Mot_de_passe">
            <br>
            <select name="Type_utilisateur" >
           		<option value="Administrateur">Administrateur</option>
           		<option value="Client">Client</option>
           	</select>
            <br>
            <input type="text" placeholder="Nom" name="nom">
            <br>
            <input type="text" placeholder="Prénom" name= "prenom">
            <br>
            <input type="text" placeholder="Adresse mail" name="mail">
						<input type="submit" value = "Ajouter">
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
		<br>
		<article>

        <div class="container">

        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal3">Supprimer un compte</button> <!-- le bouton pour supprimer un compte -->


        <div class="modal fade" id="myModal3" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Supprimer un utilisateur</h4>
            </div>
				<form  method="post" action="del_clients.php">
        <div class="modal-body">
        <p>
        	Entrez le code de l'utilisateur à effacer:
            <br>
            <input type="text" placeholder="Code de l'utilisateur" name="Code_utilisateur">

						<input type="submit" value = "Supprimer">
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
     <br>

	</p>
	<center>

		<h1> Appartements actuellement référencés </h1> <!-- table de référencement des appartements -->

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

	$reponse = $bdd->query('SELECT Code_appartement, num_de_rue, nom_de_rue, ville, Code_postal, Utilisateur_Code_utilisateur FROM appartement'); // on récupère les données de la base

	echo "<table border=1>
	<tr>
		<td> Code appartement </td>
		<td> Numéro de la rue </td>
		<td> Nom de la rue </td>
		<td> Ville</td>
		<td> Code postal</td>
		<td> Code du propriétaire</td>

	</tr>
	"; // en tete du tableau
	while ($donnees = $reponse->fetch()) // quand il y a des données à inclure
	{
		echo "
		<tr>
		 <td>".$donnees["Code_appartement"]."</td>
		 <td>".$donnees["num_de_rue"]."</td>
		 <td>".$donnees["nom_de_rue"]."</td>
		 <td>".$donnees["ville"]."</td>
		 <td>".$donnees["Code_postal"]."</td>
		 <td>".$donnees["Utilisateur_Code_utilisateur"]."</td>
		 </tr>
		 "; // on met les données dans les cases une par une
	}
	echo "</table>";

	$reponse->closeCursor();

	?>
	</center>
	<br>
	<article>

			<div class="container">
<!-- Trigger the modal with a button -->
			<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2">Ajouter un domicile</button> <!-- bouton d'ouverture de fenetre modale, ajout de domicile -->

<!-- Modal -->
			<div class="modal fade" id="myModal2" role="dialog">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Créer un domicile</h4>
						</div>
						<form  method="post" action="post_home.php">
							<div class="modal-body">
									<p>
									Entrez les informations sur le nouveau domicile
									<br>
									<input type="text" placeholder="Code appartement" name ="Code_appartement">
									<br>
									<input type="text" placeholder="Numéro" name="num_de_rue">
									<br>
									<input type="text" placeholder="Nom de rue" name="nom_de_rue">
									<br>
									<input type="text" placeholder="Ville" name="ville">
									<br>
									<input type="text" placeholder="Code postal" name="Code_postal">
									<br>
									<input type="text" placeholder="Code propriétaire" name="Utilisateur_Code_utilisateur">
									<br>
									<input type="submit" value = "Ajouter">
							</div>
						<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
						</div>
					</form>
			</div>
	</div>
</div>
</div>

	</article>
	<br>
	<article>

			<div class="container">

			<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal4">Supprimer un domicile</button> <!-- bouton d'ouverture de fenetre modale, suppression de domicile -->


			<div class="modal fade" id="myModal4" role="dialog">
					<div class="modal-dialog modal-lg">
							<div class="modal-content">
							<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Supprimer un logement</h4>
					</div>
			<form  method="post" action="del_home.php">
			<div class="modal-body">
			<p>
				Entrez le code du logement à supprimer:
					<br>
					<input type="text" placeholder="Code du logement" name="Code_appartement">

					<input type="submit" value = "Supprimer">
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

</body>
</html>

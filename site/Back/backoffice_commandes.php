<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width">
	<title>Back-Office commandes</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="tableau_bo2.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php include("header_bo.php"); ?>

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

  // Récupération des 10 derniers messages
	$reponse = $bdd->query('SELECT Utilisateur_Code_utilisateur, reference, Type_de_device_reference_produit, temps FROM utilisateur ORDER BY Code_utilisateur');

  echo "<center><table border=1><caption> <h2> Commandes en cours </h2> </caption>
  <tr>
		<td class = 'com'> Code utilisateur </td>
    <td class='com'> Numéro de commande </td>
    <td class='com'> Identifiant de l'article </td>
    <td class='com'> Date de commande </td>
  </tr>
  ";
  while ($donnees = $reponse->fetch())
  {
    echo "
    <tr>
		<td class='com'>".$donnees["Utilisateur_code_utilisateur"]."</td>
     <td class='com'>".$donnees["reference"]."</td>
     <td class='com'>".$donnees["Type_de_device_reference_produit"]."</td>
     <td class='com'>".$donnees["temps"]."</td>
     </tr>
     ";
  }
  echo "</table></center>";

  $reponse->closeCursor();

  ?>


</body>
</html>

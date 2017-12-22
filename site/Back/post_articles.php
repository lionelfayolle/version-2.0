<?php
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$req = $bdd->prepare('INSERT INTO type_de_device (reference_produit, nom_du_device, prix, identification, fonction, unite, surface_couverte) VALUES (?, ?, ?, ?, ?, ?, ?)'); //on sélectionne les colonnes dans lesquelles on va éditer
$req -> execute(array($_POST['reference_produit'], $_POST['nom_du_device'], $_POST['prix'], $_POST['identification'], $_POST['fonction'], $_POST['unite'], $_POST['surface_couverte'])); // on y met les valeur venant du formulaire
header('Location: backoffice_articles.php');
?>

<?php
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$req = $bdd->prepare('INSERT INTO utilisateur (Code_utilisateur, Mot_de_passe, Nom, Prenom, Type_utilisateur, mail) VALUES (?, ?, ?, ?, ?, ?)'); //on sélectionne les colonnes dans lesquelles on va éditer
$req -> execute(array($_POST['Code_utilisateur'], $_POST['Mot_de_passe'], $_POST['nom'], $_POST['prenom'], $_POST['Type_utilisateur'],  $_POST['mail'])); // on y met les valeur venant du formulaire
header('Location: backoffice_clients.php');
?>

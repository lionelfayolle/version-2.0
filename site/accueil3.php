<?php
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$req = $bdd->prepare('INSERT INTO capteur (reference, fonction) VALUES (?, ?)');
$req -> execute(array($_POST['reference'], $_POST['type']));
header('Location: accueil.php');
?>

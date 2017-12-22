<?php
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$req = $bdd->prepare('INSERT INTO piece (nom_piece, surface) VALUES (?, ?)');
$req -> execute(array($_POST['nompiece'], $_POST['superficie']));
header('Location: accueil.php');
?>

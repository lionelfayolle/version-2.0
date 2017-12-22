<?php
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}


$req = $bdd->prepare('DELETE FROM piece WHERE nom_piece = :nompiece');
$req -> execute(array('nompiece' => $_POST['nompiece']));
$return = $req->fetch();


header('Location: accueil.php');

?>

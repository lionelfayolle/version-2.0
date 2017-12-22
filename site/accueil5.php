<?php
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}


$req = $bdd->prepare('DELETE FROM capteur WHERE reference = :reference');
$req -> execute(array('reference' => $_POST['reference']));
$return = $req->fetch();


header('Location: accueil.php');

?>

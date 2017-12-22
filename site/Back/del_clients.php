<?php
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}


$req = $bdd->prepare('DELETE FROM utilisateur WHERE Code_utilisateur = :Code_utilisateur');
$req -> execute(array('Code_utilisateur' => $_POST['Code_utilisateur']));
$return = $req->fetch();

header('Location: backoffice_clients.php');
?>

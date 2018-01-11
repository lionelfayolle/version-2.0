<?php
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}



$req = $bdd->prepare('DELETE FROM pannes WHERE idPannes = :idPannes'); // on sélectionne le paramètre en fonction duquel on va supprimer le device
$affectedLines = $req -> execute(array('idPannes' => $_POST['idPannes'])); // on effectue la suppression
$return = $req->fetch();




header('Location: backoffice_pannes.php'); // retour à la page articles
?>

<?php
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}



$req = $bdd->prepare('DELETE FROM type_de_device WHERE reference_produit = :reference_del'); // on sélectionne le paramètre en fonction duquel on va supprimer le device
$affectedLines = $req -> execute(array('reference_del' => $_POST['reference_del'])); // on effectue la suppression
$return = $req->fetch();




header('Location: backoffice_articles.php'); // retour à la page articles
?>

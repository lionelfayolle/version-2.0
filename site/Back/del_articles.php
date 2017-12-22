<?php
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}



$req = $bdd->prepare('DELETE FROM type_de_device WHERE reference_produit = :reference_del');
$affectedLines = $req -> execute(array('reference_del' => $_POST['reference_del']));
$return = $req->fetch();




header('Location: backoffice_articles.php');
?>

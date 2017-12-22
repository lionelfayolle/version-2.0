<?php
echo "1";
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}


$req = $bdd->prepare('DELETE FROM appartement WHERE Code_appartement = :Code_appartement'); // on sélectionne le paramètre en fonction duquel on va supprimer le domicile
$req -> execute(array('Code_appartement' => $_POST['Code_appartement'])); // on effectue la suppression
$return = $req->fetch();

header('Location: backoffice_clients.php'); // retour à la page clients

echo "2";
?>

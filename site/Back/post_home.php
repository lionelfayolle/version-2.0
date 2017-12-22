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

$req = $bdd->prepare('INSERT INTO appartement (Code_appartement, num_de_rue, nom_de_rue, ville, Code_postal, Utilisateur_Code_utilisateur) VALUES (?, ?, ?, ?, ?, ?)'); //on sélectionne les colonnes dans lesquelles on va éditer
$req -> execute(array($_POST['Code_appartement'], $_POST['num_de_rue'], $_POST['nom_de_rue'], $_POST['ville'], $_POST['Code_postal'], $_POST['Utilisateur_Code_utilisateur'])); // on y met les valeur venant du formulaire
header('Location: backoffice_clients.php');
echo "2";
?>

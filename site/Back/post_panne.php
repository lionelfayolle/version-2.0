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

$req = $bdd->prepare('INSERT INTO pannes (idPannes, Date, Type_de_panne, Cout_ocasionne, Devices_idDevices) VALUES (?, ?, ?, ?, ?)'); //on sélectionne les colonnes dans lesquelles on va éditer, et permet de les vérifier
$req -> execute(array($_POST['idPannes'], $_POST['Date'], $_POST['Type_de_panne'], $_POST['Cout_ocasionne'], $_POST['Devices_idDevices'])); // on y met les valeur venant du formulaire
header('Location: backoffice_pannes.php');
echo "2";
?>

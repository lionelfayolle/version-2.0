<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width">
	<title>Back-Office commandes</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="backoffice_1.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php include("header_bo.php"); ?>

<?php /*
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'root', '');
}
catch(Exception $e)
{
				die('Erreur : '.$e->getMessage());
}

$reponse = $bdd->query('SELECT le nom d'utilisateur, le modèle et la date de commande FROM commandes ORDER BY date');




echo "<table border=1>
<tr>
	<td> nom d'utilisateur </td>
	<td> le modèle </td>
	<td> la date de commande </td>
</tr>
";
while ($donnees = $reponse->fetch())
{
	echo "
	<tr>
	 <td>".$donnees["nom d'utilisateur"]."</td>
	 <td>".$donnees["le modèle"]."</td>
	 <td>".$donnees["la date de commande"]."</td>
	 </tr>
	 ";
}
echo "</table>"; */?>

</body>
</html>

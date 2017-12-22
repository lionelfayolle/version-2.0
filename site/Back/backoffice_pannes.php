<!DOCTYPE html>
<html>
<head>
	<title>Pannes</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="backoffice_pannes.css">
</head>

<?php include("header_bo.php"); ?>

<body>

	<article>
			<center><h2>Liste des capteurs en panne</h2></center>

<center>
<?php
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'root', '');
	}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}

	$reponse = $bdd->query('SELECT idPannes, Date, Type_de_panne, Devices_idDevices FROM pannes ORDER BY Date');

	echo "<table border=1>
	<tr>
		<td> idPannes </td>
		<td> Date </td>
		<td> Type_de_panne </td>
		<td> Devices_idDevices </td>
	</tr>
	";

	while ($donnees = $reponse->fetch())
	{
		echo "
		<tr>
			<td>".$donnees["idPannes"]."</td>
			<td>".$donnees["Date"]."</td>
			<td>".$donnees["Type_de_panne"]."</td>
			<td>".$donnees["Devices_idDevices"]."</td>
	     </tr>
	     	";
	}
	echo "</table>";
?>
</center>
		</article>

</body>
</html>

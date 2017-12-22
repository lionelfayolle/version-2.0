<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
  <title>Connect'Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="accueills.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<?php include("header.php"); ?>
<body>
    <section>
    <center><h1>Accueil</h1></center>
    <article>
        <h1>Informations</h1><hr>
        <p>Identifiant : <br> Nom : <?php echo $_SESSION['nom']?><br> Prénom : <?php echo $_SESSION['prenom']?><br> Adresse : <br> Mail : <?php echo $_SESSION['mail']?></p>
    </article>

    <article>
        <h1>Pièces</h1><hr>
        <p>Liste des pièces et leur superficie :<br></p>
        <?php
        // Connexion à la base de données
        try
        {
          $bdd = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'root', '');
        }
        catch(Exception $e)
        {
                die('Erreur : '.$e->getMessage());
        }

        // Récupération des 10 derniers messages
        $reponse = $bdd->query('SELECT nom_piece, surface FROM piece ORDER BY nom_piece');

        // Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
        while ($donnees = $reponse->fetch())
        {
          echo '<p><strong>' . htmlspecialchars($donnees['nom_piece']) . '</strong> : ' . htmlspecialchars($donnees['surface']) . '</p>';
        }

        $reponse->closeCursor();

        ?>
        <div class="container">

        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" style="position:relative;bottom:150px;margin-left:5px">Ajouter une pièce</button>
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal3" style="position:relative;bottom:150px;">Supprimer une pièce</button>

        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class = "piececontent">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ajouter une pièce</h4>
            </div>

        <div class="modal-body">
            <form class = "black" method="post" action="accueil2.php">
            <p>Entrez les informations sur votre nouvelle pièce<br><input type="text" name="nompiece" id="nompiece" placeholder="Nom de la pièce"><br><input type="text" name="superficie" id="superficie" placeholder="Superficie">
            <input type="submit" name="ajouter" value="Ajouter"></p>
            </form>
        </div>

      </div>
    </div>
  </div>

  <div class="modal fade" id="myModal3" role="dialog">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Supprimer une pièce</h4>
      </div>

  <div class="modal-body">
      <form class = "black" method="post" action="accueil4.php">
      <p>Entrez les informations sur votre pièce à supprimer<br><input type="text" name="nompiece" id="nompiece" placeholder="Nom de la pièce"><br>
      <input type="submit" name="supprimer" value="Supprimer"></p>
      </form>
  </div>

</div>

    </article>

    <article>
        <h1>Capteurs & Actionneurs</h1><hr>
        <p>Liste des capteurs et actionneurs :<br></p>
        <div class="container">
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2" style="position:relative;bottom:120px; margin-left:5px">Ajouter capteurs & actionneurs</button>
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal4" style="position:relative;bottom:120px;">Supprimer un capteur</button>
  <?php
  // Connexion à la base de données
  try
  {
    $bdd = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'root', '');
  }
  catch(Exception $e)
  {
          die('Erreur : '.$e->getMessage());
  }

  // Récupération des 10 derniers messages
  $reponse = $bdd->query('SELECT reference, fonction FROM capteur ORDER BY fonction');

  echo "<table border=1>
  <tr>
    <td> Fonction </td>
    <td> Réference </td>
  </tr>
  ";
  while ($donnees = $reponse->fetch())
  {
    echo "
    <tr>
     <td>".$donnees["fonction"]."</td>
     <td>".$donnees["reference"]."</td>
     </tr>
     ";
  }
  echo "</table>";

  $reponse->closeCursor();

  ?>

  <!-- Modal -->
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Capteurs & Actionneurs</h4>
        </div>
        <div class="modal-body">
          <form class="black" method="post" action="accueil3.php">
            <p>Entrez les informations sur votre nouveau capteur<br><input type="text" name="reference" placeholder="Référence du capteur">
            <select name="type" id="type">
              <option value="Humidite">Humidité</option>
              <option value="Camera">Caméra</option>
              <option value="Temperature">Température</option>
              <option value="Luminosite">Luminosité</option>
              <option value="Fumee">Fumée</option>
              <option value="Consommation d'eau">Consommation d'eau</option>
              <option value="Electricite">Electricité</option>
            </select>
            </p>
            <input type="submit" name="ajouter" value="Ajouter">
        </form>
        </div>

        </div>

      </div>

    </div>

    <div class="modal fade" id="myModal4" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Supprimer un capteur</h4>
        </div>

    <div class="modal-body">
        <form class = "black" method="post" action="accueil5.php">
        <p>Entrez les informations sur capteur à supprimer<br><input type="text" name="reference" id="Référence" placeholder="Id du capteur"><br>
        <input type="submit" name="supprimer" value="Supprimer"></p>
        </form>
  </div>

</div>

</br>
    </article>
    </section>

  <?php include("footer.php"); ?>
  </body>
</html>

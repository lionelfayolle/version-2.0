<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
  <script>
            function showUser(str)
            {
                if (str == "")
                {
                    document.getElementById("txtHint").innerHTML = "";
                    return;
                }
                if (window.XMLHttpRequest) {
                    xmlhttp= new XMLHttpRequest();
                } else {
                    if (window.ActiveXObject)
                        try {
                            xmlhttp= new ActiveXObject("Msxml2.XMLHTTP");
                        } catch (e) {
                            try {
                                xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
                            } catch (e) {
                                return NULL;
                            }
                        }
                }

                xmlhttp.onreadystatechange = function ()
                {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                    {
                        document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET", "getuser.php?q=" + str, true);
                xmlhttp.send();
            }
        </script>
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
        <p>Identifiant : <?php echo $_SESSION['id']?><br> Nom : <?php echo $_SESSION['nom']?><br> Prénom : <?php echo $_SESSION['prenom']?><br> Adresse : <?php echo $_SESSION['num_rue'].' '. $_SESSION['nom_rue'].' '.$_SESSION['code_postal'].' '.$_SESSION['ville']?> <br> Mail : <?php echo $_SESSION['mail']?></p>
    </article>

    <article>
        <h1>Pièces</h1><hr>
        
          
        <div class="container">

        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" style="position:relative;bottom:80px;margin-left:5px">Ajouter une pièce</button>
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal3" style="position:relative;bottom:80px;">Supprimer une pièce</button>

        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
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
    </div>
</div>

        <div id="txtHint"><b>Liste des pièces :</b></div>
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
        $reponse = $bdd->prepare('SELECT Nom_piece, Surface_piece FROM piece WHERE Appartement_Code_appartement = ?');
        $reponse->execute(array($_SESSION['code_appart']));

        // Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
        ?>
        <form class="select">
          <select name='users' onchange='showUser(this.value)'>
          <option value=''>Selectionne une pièce</option>
        <?php 
        while ($donnees = $reponse->fetch())
        {
          echo "<option value='" .$donnees['Nom_piece']. "'>".$donnees['Nom_piece']."</option>";
        }

        $reponse->closeCursor();

        ?>
        </select></form>
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
  $reponse = $bdd->prepare('SELECT * FROM devices NATURAL JOIN type_de_device WHERE devices.Type_de_device_reference_produit=type_de_device.reference_produit AND CeMac_idCeMac=?');
  $reponse->execute(array($_SESSION['idcemac']));

  echo "<table border=1>
  <tr>
    <td> Nom </td>
    <td> Fonction </td>
    <td> Réference </td>
  </tr>
  ";
  while ($donnees = $reponse->fetch())
  {
    echo "
    <tr>
     <td>".$donnees["nom_du_device"]."</td>
     <td>".$donnees["fonction"]."</td>
     <td>".$donnees["reference_produit"]."</td>
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
            <p>Entrez les informations sur votre nouveau capteur<br><input type="text" id="reference" name="reference" placeholder="Référence du capteur">
            <select name="type" id="type">
              <option value="Humidite">Humidité</option>
              <option value="Camera">Caméra</option>
              <option value="Temperature">Température</option>
              <option value="Luminosite">Luminosité</option>
              <option value="Fumee">Fumée</option>
              <option value="Consommation d'eau">Consommation d'eau</option>
              <option value="Electricite">Electricité</option>
            </select>
            <input type="text" id="piece" name="piece" placeholder="Pièce">
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

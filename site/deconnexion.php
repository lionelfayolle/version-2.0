<?php
  session_start(); // la session qu'on considère
  $_SESSION = array(); // on vide les cookies
  session_destroy(); // on stoppe la session

  header('Location: connexion.php'); // retour à la page de co

 ?>

<?php

session_start();
//effacer toutes les variables
$_SESSION= array();
session_destroy();
//Nous renvoyer à la page d'accueil apres déconnexion 
header("Location:index.php");
?>
<?php
try
{                                                                                                  //servent à traquer plus precisement les erreurs
    $db = new PDO('mysql:host=localhost; dbname=magickali; charset=utf8', 'root', 'Kalikondo98', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	
	return $db;
	}

catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}


?>
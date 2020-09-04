<?php

require('connexion.php');
include('header.php');

//commnde/php
if(isset($_POST['Envoi']))
{

 $date= date("Y-m-d");
    //Insertion dans la table commande
	
	$commande= $db->query("INSERT INTO Commande(client_id,datec,prix_total)VALUES('".$_SESSION['id_client']."','".$date."','".$_SESSION['total']."')");
	
	echo'Achat effectué avec succes';
	header('Location:index.php');
	
	$id_cmmd=$db->lastInsertId();
	
	//echo $id_cmmd;
	//$selectid=$db->query("SELECT id_commande FROM Commande, Client WHERE commande.client_id='".$_SESSION['id_client']."'");
	
	
	
	$tabid_art=explode("//",$_SESSION['id_pd']);
	$tabquantite=explode("//",$_SESSION['quantite']);
	$tabprix_unit=explode("//",$_SESSION['prixinit']);
	$tabnom=explode("//",$_SESSION['artistecmd']);
	
	for($i=0;$i<count($tabid_art);$i++)
    {
     // $requete ="INSERT INTO funhtml.ligne VALUES('$id_comm','".$tab_id_article[$i]."','".$tabquantite[$i]."','".$tabprix_unit[$i]."')";
	  
	$lignes_commandes = $db->query("INSERT INTO Ligne_commande(l_commande,concert_i,qte_article)VALUES('".$id_cmmd."','".$_SESSION['id_pd']."','".$_SESSION['quantite']."')");
      //if($lignes_commandes) echo "Ligne $i inserÈe deja <br />";
    }
		}

?>
<!DOCTYPE html>
<html>
 <head>
<meta charset="utf-8" />
  	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<title>MagicKali</title>

</head>
<body>

<br

<section>
<header>
<h2>Paiement</h2>
</header>
<form action="commande.php" method="post">

Carte bancaire <input type="text" name="carte" size="16" maxlength="16" />
<input type="submit" name="Envoi" value=" Payer " />
</form>
</section>

</body>
</html>
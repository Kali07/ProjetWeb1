<?php
include('header.php');
require('connexion.php');


function estdanspanier($article)
{
	require('connexion.php');
	$req = $db->prepare('SELECT concert_i FROM ligne_commande WHERE concert_i = :concert_i');
	$req->execute(array(':concert_i'=>$article));
$doublon= $req->fetch();
if($doublon)
{
	//echo 'Le mail existe deja';
	return true;
}

}
		
if(!empty($_POST['id_pd']) and !empty($_POST['quantite']))
{
	//if(!empty($_SESSION['id_client']))
	//{
		$id_cmd = $_POST['id_pd'];
		$qte=$_POST['quantite'];
		$prixinit=$_POST['prixinit'];
		$lieucmd=$_POST['lieuxcmd'];
		$artistecmd=$_POST['artistecmd'];
		
		$_SESSION['id_pd']=$id_cmd;
		$_SESSION['quantite']=$qte;
		$_SESSION['prixinit']=$prixinit;
		$_SESSION['artistecmd']=$artistecmd;
		//$_SESSION['lieuxcmd']=$lieuxcmd;
		unset($_POST);
		$_POST=array();
		//$prixtotale=$qte*$prixinit;
		//$dateachat= date("Y-m-d");
		
		/*$leschoix=array();
		$leschoix[]=array(
		'id' => $id_cmd,
		'quantite' => $qte);*/
		
		
		
	/*}
	
	else
	{
		echo 'Veillez vous connecter sur votre compte';
		header('Location : login.php');
	}	*/
}

?>

<!DOCTYPE html>
<html>
 <head>
<meta charset="utf-8"/>
  	<link href="css/style.css" rel="stylesheet" type="text/css"/>
	<title>SiteWebShop</title>

</head>
<body>
<section>
<header>
<h2>Mon Panier</h2>
</header>



<?php
//empty($_SESSION['id_client']) and 
if(!empty($_SESSION['id_pd']))
{
$total=0;
$tabid_art=explode("//",$_SESSION['id_pd']);
$tabquantite=explode("//",$_SESSION['quantite']);
$tabprix_unit=explode("//",$_SESSION['prixinit']);
$tabnom=explode("//",$_SESSION['artistecmd']);


for($i=0;$i<count($tabid_art);$i++)
{
	//echo 'first'. $tabid_art[$i];
  $requete = $db->query('SELECT id_concert,artiste,prix,lieux, date_concert FROM Concert WHERE id_concert="'.$tabid_art[$i].'"');

  while($tab=$requete->fetch())
  {
	  ?>

    <?$tab['id_concert']?>
	<?$tab['artiste']?>
	<?$tabquantite[$i]?>
	<?$tab['prix']?>
	<?phpround($tab['prix']*$tabquantite[$i],2)?>
	
	<?php $total+=$tab['prix']*$tabquantite[$i];
	$_SESSION['total']=$total;
	?>
	

	<li class="vueconcert">
<h2><?=$tab['artiste']?></h2>
<h3><?=$tab['prix']?></h3>
<h3><i>Lieu : </i><?= $tab['lieux']?></h3>
<h3><i>Le: </i><?= $tab['date_concert']?></h3></li>

<?php if(!empty($_SESSION['id_client']))
{?>
	<a href="commande.php" onclick="window.location='commande.php'">
<button type="button"> Finaliser La reservation </button>
</a>

  <?php
}
else
{?>
	<a href="login.php" onclick="window.location='login.php'">
<button type="button"> Finaliser La reservation </button>
</a>
<?php
}
  }
}?>

<b>Prix total T.T.C</b> 
<br>
<b><?=$total?></b>
<?php
}
else
{
	?>
	<img src="images/poubelle.png" alt="image"/>
<p>Votre panier est vide</p>
<?php
}
?>


<?php
/*/affichage
if(!empty($_SESSION['id_client']))
{
$affichepanier= $db->query('SELECT id_concert,artiste,prix,lieux,date_concert FROM Concert, Ligne_commande, Client WHERE id_concert=Ligne_commande.concert_i and id_client="'.$_SESSION['id_client'].'"');
?>
<ul>

				<?php					
			while($ap= $affichepanier->fetch())
				{
				?>
 <li class="vueconcert"><img src= "<?=$ap['img_concert']?>" id="cen"alt="icone de la photo"/></a>
<h2><?=$ap['artiste']?></h2>
<h3><?=$ap['prix']?></h3>
<h3><i>Lieu : </i><?= $ap['lieux']?></h3>
<h3><i>Le: </i><?= $ap['date_concert']?></h3></li>
		
<?php
				}
				
$affichepanier->closeCursor();//pour bien terminer ma serie de fetch

}				
	</ul>

*/
?>
</section>

	


</body>
<footer>
<?=require('footer.php');?>	
</footer>

</html>
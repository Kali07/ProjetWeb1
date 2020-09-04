<!DOCTYPE html>
<html>
<head>
<?php
require('connexion.php');
	$articles= $db->query('SELECT * FROM Concert');
if(!empty($_GET['supp']))
{
	$numAr=$_GET['supp'];
	
	$supprimer = $db->query('DELETE FROM CONCERT WHERE id_concert="'.$numAr.'"');
	//$sup = $supprimer->fetch();
	//echo $rep['artiste'];	
	
}


?>
<meta charset="utf-8">
<title> Magic Kali</title>
<link href="stylesite.css" rel="stylesheet" type="text/css" />
<header>
<nav class="menu">
<div class="inner">
<div class="m-left">
<h1 class="logo">MAGICKALI</h1>
</div>
<div class="m-right">
<a href="index.php" class="m-link">Accueil</a>
<a href="admin/" class="m-link">Espace Admin</a>
</div> 
</div>
</nav>
</header>
</head>
<body>		
<section>
				<ul>

				<?php					
			while($reponse = $articles->fetch())
				{
				?>
 
<li class="vueconcert"><img src= "<?=$reponse['img_concert']?>" id="cen"alt="icone de la photo"/>
<h2><?=$reponse['artiste']?></h2>
<h3><?=$reponse['prix']?></h3>
<h3><i>Lieu : </i><?= $reponse['lieux']?></h3>
<h3><i>Le: </i><?= $reponse['date_concert']?></h3>
<a href="supprimer.php?supp=<?=$reponse['id_concert']?>">Supprimer ce produit</a></li>		
<?php
				}
				
$articles->closeCursor();//pour bien terminer ma serie de fetch
?>				
	</ul>	
	</section>
</body>
<footer>
<?=include('footer.php');?>
</footer>
</html>

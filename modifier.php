<!DOCTYPE html>
<html>
<head>

<?php
/*On selectionne un artiste pour qui on veut modifier des événement a l'aide du menu deroulant 
qui se trouve en debut du formulaire et ensuite completer par soit le lieu ou datte etc*/
require('connexion.php');
	$articles= $db->query('SELECT * FROM Concert');
	
//if(isset($_POST['lieux']) and isset($_POST['artiste']) and isset($_POST['prix'])and isset($_POST['dateconcert']))
if(isset($_POST['artiste']))
{
$lieux=$_POST['lieux'];
$date=$_POST['dateconcert'];
$id=$_POST['artiste'];
$prix=$_POST['prix'];
if(isset($_POST['lieux'])and !empty($_POST['lieux']))
{
	$modifier=$db->query("UPDATE Concert SET lieux='".$lieux."' WHERE id_concert='".$_POST['artiste']."'");
//$modifier=$db->query("UPDATE Concert SET lieux='".$lieux."',prix='".$prix."', date_concert='".$date."' WHERE id_concert='".$_POST['artiste']."'")
echo'modifié';
}
if(isset($_POST['dateconcert'])and !empty($_POST['dateconcert']))
{
$modifier=$db->query("UPDATE Concert SET date_concert='".$date."' WHERE id_concert='".$_POST['artiste']."'");
}
if(isset($_POST['prix']) and !empty($_POST['prix']))
{
	$modifier=$db->query("UPDATE Concert SET prix='".$prix."' WHERE id_concert='".$_POST['artiste']."'");
}
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

<form method="POST" action="modifier.php">
<table>
<tr>Artiste<select name="artiste">
				<?php
				//on recupère les valeurs dans la table catégorie
				while($reponse = $articles->fetch())
				{
				?>
				<option value="<?=$reponse['id_concert']?>"><?=$reponse['artiste']?></option>
				<?php
				}
				$articles->closeCursor();
				?>
				</tr>
		<br>
<br>
<tr>Lieux:<input type="text" name="lieux" require="require"></tr>
<br>
<br>
<tr>Date: <input type="date" name="dateconcert">
<br>
<br>
<tr>Prix: <input type="text" name="prix" require="require"></tr>
<br>
<br>	
<br>
<tr><input type="submit" value="Modifier"/>	</tr>
</table>
</form>
</div>
				
	</ul>	
	</section>
</body>
<footer>
<?=include('footer.php');?>
</footer>
</html>

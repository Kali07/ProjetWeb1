<!DOCTYPE html>
<html>
 <head>
<?php
//Index pour admin
require('C:\wamp64\www\MagicKali\connexion.php');
$categories= $db->query('SELECT * FROM CATEGORIE');
//repère: reste à verifier  si le fichier est bien une image, et au besoin limiter sa taille pour ne pas charger n'importe quoi.
//Marche pas sans le enctype
if(isset($_FILES['image']) and isset($_POST['lieux']) and isset($_POST['artiste']) and isset($_POST['categorie']) and isset($_POST['prix'])and isset($_POST['dateconcert']))
{
$erreur=$_FILES['image']['error'];
$lieux=$_POST['lieux'];
$date=$_POST['dateconcert'];
$artiste=$_POST['artiste'];
$categorie=$_POST['categorie'];
$prix=$_POST['prix'];
$image=$_FILES['image']['name'];
$tmp=$_FILES['image']['tmp_name'];
$chemin='/images/concert';
$retour='images/concert/'.$image;

if($erreur == UPLOAD_ERR_OK) //s'il ya pas d'erreur
{
	move_uploaded_file($tmp,$_SERVER['DOCUMENT_ROOT'].'/MagicKali/'.$chemin.'/'.$image);
	$verif=$db->query('SELECT img_concert FROM Concert WHERE img_concert ="'.$retour.'"');
	if($verif->fetch())
	{
		$msg="Ce fichier que vous voulez charger existe deja dans la base";
	}
	elseif(!$verif->fetch())
	{
	
	$fichiers= $db->query("INSERT INTO Concert (id_categorie,artiste, prix, lieux, date_concert,img_concert)VALUES('".$_POST['categorie']."','".$_POST['artiste']."','".$prix."','".$lieux."','".$date."','".$retour."')");
	
	$msg="Votre enregistrement a bien été effectué";
	
	}
	
	
//var_dump($_POST['image']);	
}
}

?>
<meta charset="utf-8" />
  	<link href="styleAdmin.css" rel="stylesheet" type="text/css" />
	<title>MagicKali2018</title>
	<div class="m-right">
<a href="http://localhost/magicKali/" class="m-link">Accueil</a>
<a href="http://localhost/magicKali/modifier.php" class="m-link">Modifier</a>
<a href="http://localhost/magicKali/supprimer" class="m-link">Supprimer</a>

</div> 
</head>
<body>

<br>
<div id="container">
<h2>Espace Admin</h2>

<h3>Ajout Evenement</h3>
<form method="POST"action="index.php" enctype="multipart/form-data" >
<table>
<tr>Lieux:<input type="text" name="lieux" require="require"></tr>
<br>
<br>
<tr>Artiste:<input type="text" name="artiste" require="require"></tr>
<br>
<br>
<tr>Date: <input type="date" name="dateconcert">
<br>
<br>
<tr>Catégorie<select name="categorie">
				<?php
				//on recupère les valeurs dans la table catégorie
				while($cate = $categories->fetch())
				{
				?>
				<option value="<?=$cate['id_categorie']?>"><?=$cate['nom']?></option>
				<?php
				}
				$categories->closeCursor();
				?>
				</tr>
		<br>
<br>
<tr>Prix: <input type="text" name="prix" require="require"></tr>
<br>
<br>
<tr>Image:<input type="file" name="image" require="require"/><tr/>	
<br>
<br>
<br>
<tr><input type="submit" value="envoyer"/>	</tr>
</table>
</form>
</div>
<?php
/*
if($msg!=0)
{
	?>
<div id="msg"><?=$msg?></div>
<?php }
*/
?>

</body>
</html>
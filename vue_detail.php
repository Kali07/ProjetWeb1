<!DOCTYPE html>
<html>
 <head>
<?php
require('connexion.php');
include('header.php');
if(!empty($_GET['article']))
{
	$numAr=$_GET['article'];
	
	$article = $db->query('SELECT * FROM CONCERT WHERE id_concert="'.$numAr.'"');
	$rep = $article->fetch();
	//echo $rep['artiste'];	
	
	echo $numAr;
}
?>
</head>
<body>
<section>


<div class="col-sm-9 padding-right">

					<div class="product-details"><!--product-details-->
					
							<div class="product-information"><!--/product-information-->
								<img src="<?=$rep['img_concert']?>" alt="image"/>
								<h2><?=$rep['artiste']?> au <?=$rep['lieux']?></h2>
								<span>
									<span><?=$rep['prix']?></span>
									<form action="panier.php" method="POST">
									<input type="hidden" name ="id_pd" value="<?=$rep['id_concert']?>">
										<input type="hidden" name ="artistecmd" value="<?=$rep['artiste']?>">
										<input type="hidden" name ="lieuxcmd" value="<?=$rep['lieux']?>">
		<label>Quantité:</label> <select name="quantite">
		<option> 1 </option>
		<option> 2 </option>
		<option> 3 </option>
		<option> 4 </option>
		<option> 5 </option> 
		</select>
		<input type="hidden" name ="client" value="<?=$_SESSION['id_client']?>">
		<input type="hidden" name ="prixinit" value="<?=$rep['prix']?>">
		<input name="Reserver" type="submit" value="Ajouter au panier">
		</form>									
								</span>
								<p><b>Disponibilité:</b> En Stock</p>
								<p><b>Brand:</b> MagicKali</p>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					</div>


</section>
</body>
</html>	


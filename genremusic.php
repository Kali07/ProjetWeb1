<!DOCTYPE html>
<html>
 <head>
<?php 
//Page genre de musique

include('header.php');
require('connexion.php');
if(!empty($_GET['genre']))
{
	$cat=$_GET['genre'];
	
	
			//setcookie("preference",$cat, time()+864000);
	$genre = $db->query('SELECT * FROM Concert WHERE id_categorie="'.$cat.'"');
		
}

?>
<meta charset="utf-8" />
  	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<title>SiteWebShop</title>
</head>
<body>
		<header>
					<h2>Categorie&nbsp<?=$cat?></h2>
		</header>
	
<div class="tab-content">

							<div class="tab-pane fade active in" id="tshirt" >
																																	<?php					
			while($categ = $genre->fetch())
				{
				?>
								<div class="col-sm-3">
		
									<div class="product-image-wrapper">

										<div class="single-products">
	
											<div class="productinfo text-center">
												<img src="<?=$categ['img_concert']?>" alt="" />
												<h2><?=$categ['prix']?></h2>
												<p><?=$categ['artiste']?></p>
												<a href="vue_detail.php?article=<?=$categ['id_concert']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Voir en detail</a>
											</div>	
											
										</div>

									
									</div>
								</div>
																	<?php
				}
$genre->closeCursor();//pour bien terminer ma serie de fetch
?>	
	
								</div>
								</div>
						
		
			
</body>
<footer>
<?=require('footer.php');?>	
</footer>
</html>
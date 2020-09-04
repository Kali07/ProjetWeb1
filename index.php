<!DOCTYPE html>
<html>
<head>
<?php
require('connexion.php');
include('header.php');
	$articles= $db->query('SELECT * FROM Concert');
?>

<body>

<div class="col-sm-9 padding-right">
			
					<div class="features_items"><!--features_items-->
					
					
						<h2 class="title text-center">Concerts</h2>
			
				<?php					
			while($reponse = $articles->fetch())
				{
				?>
				<li class="vueconcert">
		<div class="col-sm-4">
		
							<div class="product-image-wrapper">
							
	
								<div class="single-products">
																	
					
								
								
									<div class="productinfo text-center">
									
									
										<img src= "<?=$reponse['img_concert']?>"/>
										<h2><?=$reponse['prix']?></h2>
										<p><?=$reponse['artiste']?> au <?= $reponse['lieux']?> </p>
										<a href="vue_detail.php?article=<?=$reponse['id_concert']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Voir en detail</a>
									
															
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2><?=$reponse['prix']?></h2>
											<p><?=$reponse['artiste']?></p>
											<a href="vue_detail.php?article=<?=$reponse['id_concert']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Voir en detail</a>
										</div>
										
									</div>
	
	
									
							</div>
							
							
							</div>

						</div>
						
					<?php
				}
				
$articles->closeCursor();//pour bien terminer ma serie de fetch
?>	
				</div>
				
</div>
								

				
</body>
<footer>
<?=include('footer.php');?>
</footer>
</html>

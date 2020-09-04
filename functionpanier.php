//les functions pour notre panier
<?php


function creerpanier()
{
	if(!isset($_SESSION['panier']))
	{
		$_SESSION['panier']=array();
		$_SESSION['panier']['nomproduit']=array();
		$_SESSION['panier']['quantite']=array();
		$_SESSION['panier']['prixp']=array();
		$_SESSION['panier']['verrou']=false; //lors du payement
	}
	return true;
	
	
}

function ajouter_au_panier($nomp, $qteproduit, $prixproduit)
{
	if(creerpaniner())
	{
		//pour_verifier si le produit se trouve deja
		
		$emplacement= array_search($nomp,$_SESSION['panier']['nomp']);
		
		if($emplacement!== false)
		{
			$_SESSION['panier']['qteproduit'][$emplacement] +=$qteproduit;
		}
		else
		{
			array_push($_SESSION['panier']['nomp'],$nomp);
			array_push($_SESSION['panier']['qteproduit'],$qteproduit);
			array_push($_SESSION['panier']['prixp'],$prixp);
		}
	}
	else
		echo 'probleme tecnique';
	
}

?>
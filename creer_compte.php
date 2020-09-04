<?php
include('header.php');
require('connexion.php');


//verification email 
function MailDansBase($mail)
{
	require('connexion.php');
	$req = $db->prepare('SELECT email FROM client WHERE email = :email');
	$req->execute(array(':email'=>$mail));
$doublon= $req->fetch();
if($doublon)
{
	//echo 'Le mail existe deja';
	return true;
}

}

if(!empty($_POST['email']) and !empty($_POST['motdepasse']) and !empty($_POST['confmotdepasse']) and !empty($_POST['civilite']) and !empty($_POST['nomclient'])
	and !empty($_POST['prenomclient']) and !empty($_POST['adresse']) and !empty($_POST['codepostal']) and !empty($_POST['ville']) and !empty($_POST['pays'])
	and !empty($_POST['tel']))
	{
		//une case non remplie est vide par defaut(à mon avis)
		$email=$_POST['email'];
		$mp=hash('sha256',$_POST['motdepasse']);
		$confmp=hash('sha256',$_POST['confmotdepasse']);
		$civilite=$_POST['civilite'];
		$nomc=$_POST['nomclient'];
		$prenomc=$_POST['prenomclient'];
		$adresse=$_POST['adresse'];
		$codepostal=$_POST['codepostal'];
		$ville=$_POST['ville'];
		$pays=$_POST['pays'];
		$tel=$_POST['tel'];
		
		//Methode qui remplace au cas contraire par une chaine vide
		/*$email=isset($_POST['email'])?$_POST['email']:'';
		$mp=hash('sha256',$_POST['motdepasse']);
		$confmp=hash('sha256',$_POST['confmotdepasse']);
		$civilite=isset($_POST['civilite'])?$_POST['civilite']:'';
		$nomc=isset($_POST['nomclient'])?$_POST['nomclient']:'';
		$prenomc=isset($_POST['prenomclient'])?$_POST['prenomclient']:'';
		$adresse=isset($_POST['adresse'])?$_POST['adresse']:'';
		$codepostal=isset($_POST['codepostal'])?$_POST['codepostal']:'';
		$ville=isset($_POST['ville'])?$_POST['ville']:'';
		$pays=isset($_POST['pays'])?$_POST['pays']:'';
		$tel=isset($_POST['tel'])?$_POST['tel']:'';*/
		
	
		if(($mp==$confmp)and MailDansBase($email)!=true)
		{
			$client= $db->query("INSERT INTO client(email,mot_de_passe,civilite,nom,prenom,adresse,code_postal,ville,pays,telephone)VALUES('".$email."','".$mp."','".$civilite."','".$nomc."','".$prenomc."','".$adresse."','".$codepostal."','".$ville."','".$pays."','".$tel."')");
			header('Location:login.php');
		}
		else
		{
			echo"Mail déjà utilisé ou Mots de passe non identique";
		}
		
		//traitement et insertions !! 

	}
?>
<!DOCTYPE html>
<html>
 <head>
<meta charset="utf-8" />
  	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<title>SiteWebShop</title>

</head>
<body>

<section id="form"> <!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Creation Compte</h2>
						
<form method="POST"  action="creer_compte.php">
E-mail: <input type="email" name="email" require="require">
Mot de Passe : <input type="password" name="motdepasse" require="require">
Confirmation du Mot Passe : <input type="password" name="confmotdepasse" require="require">
Civilité: <select name="civilite">
<option value="M">M</option>
<option value="F">F</option> 
			
Nom :<input type="text" name="nomclient" require="require">
Prénom :<input type="text" name="prenomclient" require="require">
Adresse : <input type="text" name="adresse" require="require">
Code Postal :<input type="number" name="codepostal" require="require">
Ville :<input type="text" name="ville" require="require">
Pays :<input type="text" name="pays" require="require">

Téléphone :<input type="number" name="tel" require="require"/>
<tr><input type="submit" value="envoyer"/>
</form>

					</div><!--/login form-->
				</div>
				
			</div>
		</div>

	</section><!--/form-->
</body>
<footer>
<?=require('footer.php');?>	
</footer>

</html>
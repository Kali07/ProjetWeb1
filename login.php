<?php

include('header.php');
require('connexion.php');

//gestion de la connexion sur le compte !!
if(isset($_POST['login']) and isset($_POST['pwd']))
{
	//$req=$db->query('SELECT * FROM client WHERE email="'.$login.'" AND mot_de_passe="'.$login.'"');
	$login=$_POST['login'];
	$pwd=hash('sha256',$_POST['pwd']);
	
	if(!empty($login) and !empty($pwd))
	{
		$req=$db->prepare("SELECT * FROM client WHERE email=:email AND mot_de_passe=:mot_de_passe");
			$req->execute(array(':email'=>$login,'mot_de_passe'=>$pwd));
			$exist=$req->fetch();
			if($exist)
			{
				echo'correct';
				//$user=$req->fetch();
				//session_start();
				$_SESSION['id_client']=$exist['id_client'];
				$_SESSION['nom']=$exist['nom'];
				$_SESSION['prenom']=$exist['prenom'];
				$_SESSION['civilite']=$exist['civilite'];
				header('Location:index.php');
		
			}
			else
			{
				echo'incorrect';
			}
}
}
?>
<!DOCTYPE html>
<html>
 <head>
<meta charset="utf-8" />
  	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<title>Magickali</title>

</head>
<body>

<section id="form"> <!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Identification</h2>
						
<form method="POST" action="login.php">
Login: <input type="email" name="login">
Mot de Passe : <input type="password" name="pwd" require="require">
<input type="submit" value="Valider" class="btn btn-default"/>
</form>

					</div><!--/login form-->
				</div>
				
			</div>
		</div>
		<p>
Si vous n'avez pas de compte cliquez <a href="creer_compte.php">ici</a> pour creer <p>

	</section><!--/form-->


</body>
<footer>
<?=require('footer.php');?>	
</footer>

</html>
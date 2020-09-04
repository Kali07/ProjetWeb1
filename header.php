<?php
session_start();
if((isset($_SESSION['nom']) and isset($_SESSION['prenom']) and isset($_SESSION['civilite'])))
{
	$sessN=$_SESSION['nom'];
	$sessPN=$_SESSION['prenom'];
	$sessCiv=$_SESSION['civilite'];
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> Magic Kali</title>
<link href="css/stylesite.css" rel="stylesheet" type="text/css"/>
<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
</head>
<header id="header"> <!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +33 7 69 03 59 05</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> richardmulamba16@gmail.com.com</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		
		
<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php"><img src="images/logosite.jpg" alt="" width="105" height="40"/></a>
						</div>
						<div class="btn-group pull-right">
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									France
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">La Rochelle</a></li>
									<li><a href="#">Autre</a></li>
								</ul>
							</div>
							
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									EUROS
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Euros</a></li>
									<li><a href="#">Franc Congolais</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-user"></i> Account</a></li>
								<li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
								<li><a href="#"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a href="panier.php"><i class="fa fa-shopping-cart"></i> Panier </a></li>
								<li><a href="login.php"><i class="fa fa-lock"></i> <img src="images/profilu.png" width="25" height="27"> Login</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->

		
<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php" class="active">Accueil</a></li>
								<li class="dropdown"><a href="genremusic.php?genre=1">Rap/Hip-Hop<i class="fa fa-angle-down"></i></a>
								<li class="dropdown"><a href="genremusic.php?genre=2">Electro<i class="fa fa-angle-down"></i></a>
								<li class="dropdown"><a href="genremusic.php?genre=3">Jazz<i class="fa fa-angle-down"></i></a>
								<li class="dropdown"><a href="genremusic.php?genre=4">Rnb<i class="fa fa-angle-down"></i></a>
                                    
                                </li>
								<li><a href="contact.php">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->

		
	<?php
	if((isset($_SESSION['nom']) and isset($_SESSION['prenom']) and isset($_SESSION['civilite'])))
	{?>
	<li>Bonjour&nbsp<?=$_SESSION['civilite']?>.&nbsp <?=$_SESSION['nom']?>.&nbsp <?=$_SESSION['prenom']?></li>
	<li><a href="deconnexion.php"><img src="images/déconnexion.jpg" width="25" height="27"></a></li>
	<?php
	}?>
</nav>
</header>

			
</html>
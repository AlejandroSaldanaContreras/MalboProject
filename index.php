<?php 
	include_once($_SERVER['DOCUMENT_ROOT']."/proyecto/class/database.class.php");
	$sistema->VerificarPermiso("Indice");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cables Malbo</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link href="css/style.css" type="text/css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
	<div class="container-fluid">
		<a class="navbar-brand" href="#"><img src="assets/logo-icon.png" width="70" height="70"></a>
		<button class="navbar-toggler" type="button" data-toggler="collapse" data-target="#navbarResponsive">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/proyecto/index.php"><i class="fas fa-home"></i>   Inicio</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#productos"><i class="fas fa-gift"></i>   Productos</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-clipboard-list"></i>   Catálogos</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					
					<a class="dropdown-item" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/proyecto/categoria/categoria.php"><i class="fas fa-ellipsis-h"></i>   Categorías</a>
					<a class="dropdown-item" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/proyecto/producto/producto.php"><i class="fas fa-gift"></i>   Productos</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/proyecto/almacen/almacen.php"><i class="fas fa-warehouse"></i>   Almacén</a>
					<a class="dropdown-item" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/proyecto/inventario/inventario.php"><i class="fas fa-truck-moving"></i>   Inventario</a>
					<a class="dropdown-item" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/proyecto/distribuidor/distribuidor.php"><i class="fas fa-truck-loading"></i>   Distribuidor</a>
					</div>
				</li>
			
				<li class="nav-item">
					<a class="nav-link" href="#redes"><i class="fas fa-question-circle"></i>   Acerca de</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/proyecto/login/login.php?action=logout"><i class="fas fa-sign-out-alt"></i>   Cerrar Sesión</a>
				</li>
			</ul>
		</div>
	</div>
</nav>

<!--- Image Slider -->
<div id="slides" class="carousel slide" data-ride="carousel">
	<ul class="carousel-indicators">
		<li data-target="#slides" data-slide-to="0" class="active"></li>
		<li data-target="#slides" data-slide-to="1"></li>
		<li data-target="#slides" data-slide-to="2"></li>
		<li data-target="#slides" data-slide-to="3"></li>
	</ul>
	<div class="carousel-inner">
		<div class="carousel-item active">
			<img src="assets/background0.jpg">
			<div class="carousel-caption">
				<h1 class="display-1">Cables Malbo</h1>
				<button type="button" class="btn btn-outline-light btn-lg">Productos</button>
				<button type="button" class="btn btn-primary btn-lg">Contacto</button>
			</div>
		</div>
		<div class="carousel-item">
			<img src="assets/backgroundA.jpg">
		</div>
		<div class="carousel-item">
			<img src="assets/backgroundB.jpg">
		</div>
		<div class="carousel-item">
			<img src="assets/backgroundC.jpg">
		</div>
	</div>
</div>


<!--- Jumbotron -->
<div class="container-fluid">
	<div class="row jumbotron">
		<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10 ">
			<p class="lead">
				Somos una empresa con 30 años de experiencia en la venta de cables y extensiones eléctricas.
			</p>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-2 ">
			<a href="#"><button type="button" class="btn btn-outline-secondary btn-lg">Conocenos</button></a>
		</div>
	</div>
</div>


<!--- Welcome Section -->
<div class="container-fluid padding">
	<div class="row welcome text-center">
		<div class="col-12">
			<h1 class="display-4">Recursos eléctricos Malbo</h1>
		</div>
		<hr>
		<div class="col-12">
			<p class="lead">Es una empresa 100% mexicana dedicada a la fabricación y comercialización de conductores y productos eléctricos con mas de 40 años de experiencia en el ramo ferretero, estamos en busca de socios comerciales para la distribución de nuestros productos en todo el territorio mexicano. Nuestros conductores eléctricos son 100% seguros para la instalación de casa habitación ya que están fabricados bajo las normas mas exigentes de nuestro país.</p>
		</div>
	</div>
</div>


<!--- Three Column Section -->
<div class="container-fluid padding">
	<div class="row text-center padding">
		<div class="col-xs-12 col-sm-6 col-md-6">
			<img src="assets/accusoft-brands.svg" width="100" height="100" >
			<h3>Cables y Extensiones</h3>
			<p>Fabricación y venta de cables tipo CCA, POT y extensiones eléctricas de uso doméstico y uso rudo.</p>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6">
			<i class="fas fa-lightbulb"></i>
			<h3>Equipos e Iluminación</h3>
			<p>Comercializamos equipos de diferentes marcas al mejor precio de la región, iluminacion de todo tipo desde focos ahorradores hasta reflectores LED.</p>
		</div>
	</div>
	<hr class="my-4">
</div>


<!--- Two Column Section -->


<!--- Fixed background -->
<figure>
	<div class="fixed-wrap">
		<div class="fixed">
		</div>
	</div>
</figure>

<!--- Emoji Section -->

<!--- Meet the team -->
<div class="container-fluid padding">
	<div class="row welcome text-center">
		<div class="col-12">
			<h1 class="display-4">Conoce nuestros productos</h1>
		</div>
		<hr>
	</div>
</div>

<!--- Cards -->
<a  name="productos" id="productos" ></a>
<div class="container-fluid padding">
	<div class="row padding">
		<div class="col-md-4">
			<div class="card">
				<img class="card-img-top" src="assets/card1.jpeg">
				<div class="card-body">
					<h4 class="card-title">Cable para construcción</h4>
					<p class="card-text">Fabricamos y comercializamos cable tipo POT y THW, con la nueva tecnologíA CCA Copper Clad Aluminum, productos 100% seguros para casa habitación.</p>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="card">
				<img class="card-img-top" src="assets/card2.jpeg">
				<div class="card-body">
					<h4 class="card-title">Extensiónes Eléctricas</h4>
					<p class="card-text">Fabricamos y comercializamos extensiones eléctricas de Uso Doméstico y Uso Rudo, con la calidad de un producto Hecho en México.</p>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="card">
				<img class="card-img-top" src="assets/card3.jpeg">
				<div class="card-body">
					<h4 class="card-title">Equipos e Iluminación</h4>
					<p class="card-text">Comercialización de equipos de trabajo medio y pesado en diversas marcas de calidad además de artículos de iluminación y electricidad.</p>
				</div>
			</div>
		</div>
	</div>
	<hr class="my-4">
</div>

<!--- Two Column Section -->


<!--- Connect -->
<a  name="redes" id="redes" ></a>
<div class="container-fluid padding">
	<div class="row text-center padding">
		<div class="col-12">
			<h2>Conecta Con Nosotros</h2>
		</div>
		<div class="col-12 social padding">
			<a href="#"><i class="fab fa-facebook"></i></a>
			<a href="#"><i class="fab fa-instagram"></i></a>
			<a href="#"><i class="fab fa-pinterest"></i></a>
			<a href="#"><i class="fab fa-twitter"></i></a> 
			<a href="#"><i class="fab fa-google"></i></a>
		</div>
	</div>
</div>

<!--- Footer -->
<footer>
	<div class="container-fluid padding">
		<div class="row text-center">
			<div class="col-md-4">
				<img src="assets/logo-icon.png" width="100" height="100">
				<hr class="light">
				<p>México</p>
				<p>01-800-Malbo</p>
				<p>ventas@malbo.com.mx</p>
			</div>

			<div class="col-md-4">
				<hr class="light">
				<h5>Nuestro Horario</h5>
				<hr class="light">
				<p>Lunes a Viernes: 9am - 5pm</p>
				<p>Sábado: 9am - 2pm</p>
				<p>Domingo: Cerrado</p>
			</div>

			<div class="col-md-4">
				<hr class="light">
				<h5>Áreas de Servicio</h5>
				<hr class="light">
				<p>Apaseo el Gde: 412 690 0861</p>
				<p>Querétaro: 442 878 7845</p>
				<p>Irapuato: 462 147 5711</p>
				<p>León: 477 812 6616</p>
			</div>
			<div class="col-12">
				<div class="light">
					<h5>Recursos eléctricos Malbo®</h5>
					<hr class="light-100">
				</div>
			</div>
		</div>
	</div>
</footer>



</body>
</html>




<!-- View in Browser: Drew's #1 Trending YouTube Tutorial -->

<!-- End View in Browser: Drew's #1 Trending YouTube Tutorial -->


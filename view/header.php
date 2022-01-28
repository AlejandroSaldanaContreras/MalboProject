<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cables Malbo</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/proyecto/css/style.css" type="text/css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
	<div class="container-fluid">
		<a class="navbar-brand" href="#"><img src="../assets/logo-icon.png" width="70" height="70"></a>
		<button class="navbar-toggler" type="button" data-toggler="collapse" data-target="#navbarResponsive">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/proyecto/index.php"><i class="fas fa-home"></i>   Inicio</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/proyecto/index.php#productos"><i class="fas fa-gift"></i>   Productos</a>
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
					<a class="nav-link" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/proyecto/index.php#productos#redes"><i class="fas fa-question-circle"></i>   Acerca de</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/proyecto/login/login.php?action=logout"><i class="fas fa-sign-out-alt"></i>   Cerrar Sesión</a>
				</li>
			</ul>
		</div>
	</div>
</nav>
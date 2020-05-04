<?php
//session_start();

if (isset($_SESSION['sesion'])) {
  $nombre = $_SESSION['sesionNombre'];
  $icono = "fas fa-futbol";
}else{
  $nombre = "Login";
  $icono = "fas fa-ghost";
}



?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Practica Pagina PHP</title>
		<!--<link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet"> -->
		<link href="https://fonts.googleapis.com/css?family=Righteous|Shadows+Into+Light&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald&display=swap" rel="stylesheet">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<link rel="stylesheet" href="<?php RUTA; ?>css/estilos.css">
		<script src="https://kit.fontawesome.com/ca1ebe22a5.js" crossorigin="anonymous"></script>
	</head>
	<body onload="banner()">
		<header class="barraSuperior">
      <h1 class="tituloPagina"> <a href="index.php">Futbol Lugo</a></h1>
			<nav>
				<a href="noticias.php">Noticias</a>
				<a href="categorias.php">Equipos</a>
				<a href="marca.php">Participa!!</a>
				<a href="">Contacto</a>
        <a href="login.php"><?= $nombre;?><i class="<?= $icono;?>"></i></a>
			</nav>
			<div class="busqueda">
				<form name="busqueda" action="<?php RUTA; ?>buscar.php" method="get">
					<button type="submit" class="fas fa-search"></button>
					<input type="text" name="buscar" placeholder="buscar">
				</form>
			</div>
		</header>
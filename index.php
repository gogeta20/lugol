<?php
session_start();
require "funciones.php";
require "admin/config.php";

$conexion = conectarBD($BD);

if (!$conexion) {

	header('Location: error.php');

}

//echo paginaActual();
$articulos = traer_articulos($configPagina['post_por_pagina'], $conexion);

//var_dump($articulos);
$artTotal = totalArticulos($conexion);
$numPag = ceil($artTotal/$configPagina['post_por_pagina']);
$ruta = "index";
//$contPag = count($articulos);
//echo "<pre>";
//var_dump($contPag);
//var_dump($artTotal);
//echo "</pre>";


if (isset($_SESSION['sesion'])) {
  $nombre = $_SESSION['sesionNombre'];
}else{
  $nombre = "Login";
}
require "vistas/index.view.php";

//$fecha =  date('d');
//echo $fecha . " - ";
//echo date('m');
//echo date('y');

//alert($fecha);

?>

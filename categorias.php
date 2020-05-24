<?php
session_start();
require 'admin/config.php';
require 'funciones.php';

if (!isset($_SESSION['sesionNombre'])) {
  header('Location:login.php');
}

$conexion = conectarBD($BD);

$sentencia = $conexion->prepare("select * from categorias");
$sentencia->execute();
$resultados = $sentencia->fetchAll();

$articulosCategorias = traer_articulos($configPagina['post_por_pagina'], $conexion);
$artTotal = totalArticulos($conexion);
$numPag = ceil($artTotal/$configPagina['post_por_pagina']);
$ruta = "categorias";
//var_dump($resultados);
$actCategorias = "activarfocusNav";
require 'vistas/categorias.view.php'


?>

<?php

session_start();
require 'admin/config.php';
require 'funciones.php';

if (isset($_SESSION['sesion'])) {
  $nombre = $_SESSION['sesionNombre'];
}else{
  $nombre = "Login";
}
$ruta = "categoria";
$categoriaID = isset($_GET['c'])?$_GET['c']:1;
$conexion = conectarBD($baseDatosConfiguracion);
$nombreCategoria = traer_nombreCategoria($categoriaID, $conexion);
$articulos = traer_articulosCategoria($categoriaID, $configPagina['post_por_pagina'], $conexion);

if (!$articulos) {
  echo 'aqui';
//  header("Location: categorias.php");
}

require 'vistas/categoria.view.php';
?>

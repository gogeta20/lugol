<?php
session_start();
require "admin/config.php";
require "funciones.php";


if (!isset($_SESSION['sesionNombre'])) {
    header('Location:login.php');
}
/*
$conexion = conectarMYSQLI($BD);
$conexion->query("SET TEXT 'utf8'");
$noticias = traerResultados($conexion,"select * from noticias");
*/
$mau = "mau";
require 'vistas/noticias.view.php';
?>
<?php
session_start();
require 'admin/config.php';
require 'funciones.php';


if ($_SESSION['sesion']) {
  
  $id = $_SESSION['sesion'];
  $conexion = conectarBD($BD);
  $sentencia = $conexion->prepare("select * from articulos where usuario = :user");
  $sentencia->execute(array(":user"=>$id));
  $resultado = $sentencia->fetchAll();
  
  $sentencia2 = $conexion->prepare("select * from usuarios where id = :id");
  $sentencia2->execute(array(":id" => $id));
  $resultado2 = $sentencia2->fetch();
	$ruta = "home";
	$resultado3 = traer_articulosUser($id, $configPagina['post_por_pagina'], $conexion);
}


require 'vistas/home.view.php';
?>


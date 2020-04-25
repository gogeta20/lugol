<?php
session_start();

require 'admin/config.php';
require 'funciones.php';

if (isset($_SESSION['sesion'])) {
	
	$id = $_GET['id'];
	$conectar = conectarBD($baseDatosConfiguracion);
	$sentencia = $conectar->prepare("delete from articulos where id = :id");
	$sentencia->execute(array(":id"=>$id));
	$resultado = $sentencia->fetch();
	
	require 'vistas/eliminar.view.php';
	
	
}else{
	
	header('location: index.php');
	
}

?>
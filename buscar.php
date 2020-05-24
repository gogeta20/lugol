<?php
require './admin/config.php';
require './funciones.php';

if (isset($_GET['buscar'])) {
	
	$conx = conectarBD($BD);
	
	if (!$conx) {
		header('Location: index.php');
	}
	$dato = $_GET['buscar'];
	$sentencia = $conx->prepare("select * from equipos where nombre like :buscar");
	$sentencia->execute(array(":buscar" => "%$dato%"));
	$items = $sentencia->fetchAll();	
	
	if (empty($items)) {
		$respuesta = "No se encontraron articulos con ".$dato;
	}else{
		
		$respuesta = "Resultados de la busqueda ".$dato;
	}
}

require './vistas/busqueda.php';
?>


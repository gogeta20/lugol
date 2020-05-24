<?php
session_start();
require 'funciones.php';
require 'admin/config.php';

if (!isset($_SESSION['sesionNombre'])) {
	header('Location:login.php');
}

$idUser = $_SESSION['sesionId'];

$conexion = conectarBD($BD);

$sentencia = $conexion->prepare("select idAnuncio from anunciosrespuestas where idUser =".$idUser);
$sentencia->execute();
$respuesta = $sentencia->fetchAll();


/*
$conexion = conectarBD($baseDatosConfiguracion);
if (!$conexion) {
	echo 'aqui';
}

function conectar($h,$u,$p,$b){

	$conex = new mysqli($h,$u,$p,$b);
	if ($conex->connect_errno) {
	   return false;
	}
	return $conex;
 }
function ejecutar($sentencia,$c,$tipo){

	if ($tipo == 1) {
	   $resultados = $c->query($sentencia);
	   if ($c->errno) {
		  return false;
	   }
	   return $resultados->fetch_all(MYSQLI_ASSOC);
	}
 
 }
 $conexion = conectar($BD['host'],$BD['user'],$BD['pass'],$BD['baseDatos']);

if (!$conexion) {
    header("Location:index.php");
}else{
    $respuesta = ejecutar("select * from anuncios",$conexion,1);
}
*/
$actMarcas = "activarfocusNav";
require 'vistas/marca.view.php';
?>

<?php
require 'funciones.php';
require 'admin/config.php';
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

require 'vistas/marca.view.php';
?>

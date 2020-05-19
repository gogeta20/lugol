<?php

require "../admin/config.php";
require "funcionesBaseDatos.php";



$conexion = conectar($BD['host'],$BD['user'],$BD['pass'],$BD['baseDatos']);
if (isset($_GET['idEquipo'])) {
    $id = $_GET['idEquipo'];
}

if (!$conexion) {
   header("Location:index.php");
}else{
   $respuesta = ejecutar("select nombreImagen from imagenes where idEquipo =".$id,$conexion,1);
}

echo json_encode($respuesta);
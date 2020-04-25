<?php
require "../admin/config.php";
require "funcionesBaseDatos.php";

$conexion = conectar($BD['host'],$BD['user'],$BD['pass'],$BD['baseDatos']);

if (!$conexion) {
   header("Location:index.php");
}else{
   $respuesta = ejecutar("select * from noticias order by contador desc limit 6",$conexion,1);
}

echo json_encode($respuesta);

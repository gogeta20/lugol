<?php
require "../admin/config.php";
require "funcionesBaseDatos.php";

$conexion = conectar($BD['host'],$BD['user'],$BD['pass'],$BD['baseDatos']);

if (!$conexion) {
    header("Location:index.php");
}else{
    //$respuesta = ejecutar("select * from anuncios",$conexion,1);
    $respuesta = ejecutar("select eq.nombre as name, eq.escudo as escudo, anu.texto from equipos as eq join anuncios as anu on  eq.id = anu.equipo order by anu.id",$conexion,1);
}

echo json_encode($respuesta);
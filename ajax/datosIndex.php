<?php

require "../admin/config.php";
require "funcionesBaseDatos.php";

$conexion = conectar($BD['host'],$BD['user'],$BD['pass'],$BD['baseDatos']);

if (!$conexion) {
   header("Location:index.php");
}else{
   $respuesta = ejecutar("SELECT equipos.nombre as equipo, clasificacion.pJugados as pj, clasificacion.pGanado as ga,clasificacion.pEmpatado as em,clasificacion.pPerdido as pe, clasificacion.dGoles as dg, clasificacion.puntos as puntos FROM equipos JOIN clasificacion on equipos.id = clasificacion.id_equipo  ORDER BY clasificacion.puntos  DESC",$conexion,1);
}

echo json_encode($respuesta);
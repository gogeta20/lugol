<?php
require "../admin/config.php";
require "funcionesBaseDatos.php";

$conexion = conectar($BD['host'],$BD['user'],$BD['pass'],$BD['baseDatos']);

if (!$conexion) {
    header("Location:index.php");
}else{
    $id = (int)$_POST['idUser'];
    //$respuesta = ejecutar("select * from anuncios",$conexion,1);
    $respuesta = ejecutar('select eq.nombre as name, eq.escudo as escudo, anu.texto as texto, anu.id as idAnuncio from equipos as eq join anuncios as anu on eq.id = anu.equipo left join anunciosrespuestas as ar on anu.id = ar.idAnuncio WHERE anu.id not in(select idAnuncio from anunciosrespuestas where idUser = '.$id.') ORDER BY idAnuncio ASC',$conexion,1);
}

echo json_encode($respuesta);
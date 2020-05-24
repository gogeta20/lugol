<?php

require "../admin/config.php";
require "funcionesBaseDatos.php";

$conexion = conectar($BD['host'],$BD['user'],$BD['pass'],$BD['baseDatos']);
if (!$conexion) {
   header("Location:index.php");
}
$tipo = $_POST['tipo'];
if ($tipo == 'ok') {

    $idUsuario = (int)$_POST['usuario'];
    $idEquipo = (int)$_POST['idEquipo'];
    
    $sentenciaRespuestaMensaje = $conexion->prepare("update usuarios set equipo = ".$idEquipo." where id =".$idUsuario);
    $sentenciaRespuestaMensaje->execute();
    $sentenciaRespuestaMensaje = $conexion->prepare("delete from solicitudes where idUser =".$idUsuario);
    $sentenciaRespuestaMensaje->execute();
}

if ($tipo == 'no') {
    $idUsuario = (int)$_POST['usuario'];
    
    $sentenciaRespuestaMensaje = $conexion->prepare("delete from solicitudes where idUser =".$idUsuario);
    $sentenciaRespuestaMensaje->execute();
}
if ($tipo == 'nose') {
   
}
<?php

require "../admin/config.php";
require "funcionesBaseDatos.php";

$conexion = conectar($BD['host'],$BD['user'],$BD['pass'],$BD['baseDatos']);
if (!$conexion) {
   header("Location:index.php");
}

if (isset($_POST['tipo'])) {
   
   $tipo = $_POST['tipo'];
   $idEquipo = (int)$_POST['idEquipo'];
   $mensaje = $_POST['mensaje'];

   $sentenciaPublicarAnuncio = $conexion->prepare("insert into anuncios (equipo,texto) values (?,?)");
   $sentenciaPublicarAnuncio->bind_param("is",$idEquipo,$mensaje);
   $sentenciaPublicarAnuncio->execute();

} else {
   $mensaje = $_POST['respuesta'];
   $idRemitente = (int)$_POST['idRemitente'];
   $idDestinatario = (int)$_POST['idDestinatario'];

   $sentenciaRespuestaMensaje = $conexion->prepare("insert into mensajes(idRemitente,idDestinatario,mensaje,fecha)values(?,?,?,curdate())");
   $sentenciaRespuestaMensaje->bind_param("iis",$idRemitente,$idDestinatario,$mensaje);
   $sentenciaRespuestaMensaje->execute();
}
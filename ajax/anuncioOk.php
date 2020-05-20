<?php
require "../admin/config.php";
require "funcionesBaseDatos.php";

$conexion = conectar($BD['host'],$BD['user'],$BD['pass'],$BD['baseDatos']);

if (!$conexion) {
    header("Location:index.php");
}

if (isset($_POST['idAnuncio'])) {
    $idAnuncio = (int)$_POST['idAnuncio'];
    $idUsuario = (int)$_POST['idUser'];

    $sentencia = $conexion->prepare("insert into anunciosrespuestas (idAnuncio,idUser) values(?,?)");
    $sentencia->bind_param("ii",$idAnuncio,$idUsuario);
    $sentencia->execute();  
}

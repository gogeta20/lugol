<?php
require "../admin/config.php";
require "funcionesBaseDatos.php";



$conexion = conectar($BD['host'],$BD['user'],$BD['pass'],$BD['baseDatos']);

if (isset($_POST['idEquipo'])) {
    $idEquipo = (int)$_POST['idEquipo'];
    $idUser = (int)$_POST['idUser'];
}

if (!$conexion) {   
   header("Location:index.php");
}

$sentencia = $conexion->prepare("insert into solicitudes (idUser,idEquipo,fecha) values(?,?,curdate())");
$sentencia->bind_param("ii",$idUser,$idEquipo);
$sentencia->execute();  
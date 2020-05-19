<?php
require "../admin/config.php";
require "funcionesBaseDatos.php";



$conexion = conectar($BD['host'],$BD['user'],$BD['pass'],$BD['baseDatos']);
if (isset($_POST['idEquipo'])) {
    $idEquipo = (int)$_POST['idEquipo'];
    $idUser = (int)$_POST['idUser'];
    $mensaje = $_POST['mensaje'];
}

if (!$conexion) {   
   header("Location:index.php");
}

$sentencia = $conexion->prepare("insert into buzon(idUser,mensaje,idEquipos,fecha) values(?,?,?,curdate())");
$sentencia->bind_param("isi",$idUser,$mensaje,$idEquipo);
$sentencia->execute();


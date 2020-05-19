<?php 
session_start();

require 'admin/config.php';
require 'funciones.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$idUser = $_SESSION['sesionId'];
$conexion = conectarBD($BD);

$sentencia = $conexion->prepare("select equipos.nombre as nombre,equipos.escudo as escudo,equipos.lema as lema,equipos.imagen as imagen,(select nick from usuarios where id = equipos.presidente) as presidente,equipos.sede as sede,count(titulos.idEquipo) as titulos FROM equipos join usuarios on equipos.presidente = usuarios.id join titulos on titulos.idEquipo = equipos.id where equipos.id = $id");
$sentencia->execute();
$resultados = $sentencia->fetchAll();


$sentencia2 = $conexion->prepare("select * from usuarios where equipo = $id");
$sentencia2->execute();
$resultados2 = $sentencia2->fetchAll();

require 'vistas/presentacionEquipo.view.php';
?>
<?php

session_start();
require 'admin/config.php';
require 'funciones.php';

if (isset($_GET['id'])) {

	$id = $_GET['id'];
	$conexion = conectarBD($baseDatosConfiguracion);
	$sentencia = $conexion->prepare("select * from articulos where id = :id");
	$sentencia->execute(array(":id" => $id));
	$articulo = $sentencia->fetch();
	if (!$articulo) {
		header('Location:error.php');
	}
}

$titulo = $articulo['titulo'];
$dl = $articulo['descripcion'];
$dc = $articulo['DC'];

if (!empty($_POST)) {
	
	if ($_FILES['imagen']['name']) {
		$nombre = $_FILES['imagen']['name']; //El nombre original del fichero en la máquina del cliente.
//		$nombrer = strtolower($nombre);
		$cd = $_FILES['imagen']['tmp_name']; //El nombre temporal del fichero en el cual se almacena el fichero subido en el servidor. 
		$ruta = "imagenes/" . $_FILES['imagen']['name'];
//		$destino = "imagenes/" . $nombrer;
		$resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
		if ($resultado) {
			$sentenciaImg = $conexion->prepare("update articulos set imagen = :imagen where id = :id");
			$exec = $sentenciaImg->execute(array(":imagen" => $nombre, ":id" => $id));
		}
	}


	if (isset($_POST['nuevoTitulo']) || isset($_POST['nuevaDescripcion']) || isset($_POST['nuevaDC'])) {

		$tn = empty($_POST['nuevoTitulo']) ? $titulo : $_POST['nuevoTitulo'];
		$dc = empty($_POST['nuevoTitulo']) ? $dc : $_POST['nuevaDC'];
		$dl = empty($_POST['nuevaDescripcion']) ? $dl : $_POST['nuevaDescripcion'];
		$sentenciaNueva = $conexion->prepare("update articulos set titulo = :tn, DC = :dc , descripcion = :dl where id = :id");
		$ok = $sentenciaNueva->execute(array(":tn" => $tn, ":dc" => $dc, ":dl" => $dl, ":id" => $id));
    if ($ok) {
      header("Location: home.php");
    }
	}
}
require 'vistas/editar.view.php';
?>


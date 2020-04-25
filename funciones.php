<?php

function conectarBD($baseDatosConfiguracion) {
  try {
    $conexion = new PDO('mysql:host=localhost;dbname=' . $baseDatosConfiguracion['baseDatos']
            , $baseDatosConfiguracion['user']
            , $baseDatosConfiguracion['pass']);

    return $conexion;
  } catch (PDOException $e) {
    return $conexion = false;
  }
}
function conectarMYSQLI($baseDatosConfiguracion) {

  $conexion = new mysqli();
  $conexion->connect('localhost', $baseDatosConfiguracion['user'], $baseDatosConfiguracion['pass'], $baseDatosConfiguracion['baseDatos']);
  $error = $conexion->connect_errno;
  if ($error != null) {
    $conexion = false;
  }
  return $conexion;
}
function limpiarString($dato) {

  $dato = trim($dato);
  $dato = stripcslashes($dato);
  $dato = htmlspecialchars($dato);
  return $dato;
}

function paginaActual() {

  if (isset($_GET['p'])) {
    return (int) $_GET['p'];
  } else {
    return 1;
  }
}

function traer_articulos($n, $conexion) {

  $inicio = (paginaActual() > 1) ? paginaActual() * $n - $n : 0;

  $sentencia = $conexion->prepare("select SQL_CALC_FOUND_ROWS * from articulos order by id desc limit $inicio, $n ");
  $sentencia->execute();
  return $sentencia->fetchAll();
}

function traer_articulosUser($id, $n, $conexion) {

  $inicio = (paginaActual() > 1) ? paginaActual() * $n - $n : 0;

  $sentencia = $conexion->prepare("select * from articulos where usuario = $id order by id desc limit $inicio, $n");
  $sentencia->execute();
  return $sentencia->fetchAll();
}

function traer_articulosCategoria($id, $n, $conexion) {

  $inicio = (paginaActual() > 1) ? paginaActual() * $n - $n : 0;
//  var_dump($id);
//  var_dump($n);
//  var_dump($inicio);
//  var_dump(paginaActual());
  
  $sentencia = $conexion->prepare("select * from articulos where categoria = $id order by id desc limit $inicio, $n");
  $sentencia->execute();
  return $sentencia->fetchAll();
}
function traer_nombreCategoria($id, $conexion) {

  $sentencia = $conexion->prepare("select nombre from categorias where id = $id");
  $sentencia->execute();
  $resultado = $sentencia->fetch();
  return $resultado['nombre'];
}

function totalArticulos($conexion) {

  $sentencia = $conexion->prepare("select * FROM articulos");
  $sentencia->execute();
  $items = $sentencia->fetchAll();
  $cont = 0;
  foreach ($items as $item) {
    $cont++;
  }
  return $cont;
}

function totalArticulosUser($conexion, $id) {

  $sentencia = $conexion->prepare("select * FROM articulos where usuario = :id");
  $sentencia->execute(array(":id" => $id));
  $items = $sentencia->fetchAll();
  $cont = 0;
  foreach ($items as $item) {
    $cont++;
  }
  return $cont;
}

function totalArticulosCategoria($conexion, $id) {

  $sentencia = $conexion->prepare("select * FROM articulos where categoria = :id");
  $sentencia->execute(array(":id" => $id));
  $items = $sentencia->fetchAll();
  $cont = 0;
  foreach ($items as $item) {
    $cont++;
  }
  return $cont;
}

function verificarId($id, $conexion) {

  $sentencia = $conexion->query("select * from articulos where id = $id limit 1");
  $sentencia = $sentencia->fetch();
//	var_dump($sentencia);
  return ($sentencia) ? $sentencia : false;
//	$sentencia->execute(array(':id' => $id));
//	$item = $sentencia->fetch();		
}

function formatearFecha($f) {
  $fe = strtotime($f);
  $dia = date('d', $fe);
  $mes = date('m', $fe);
  $anho = date('Y', $fe);
  $meses = ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'];


  return $dia . " de " . $meses[$mes - 1] . " del " . $anho;
}

function subir_fichero($directorio_destino, $nombre_fichero) {
  
  $tmp_name = $_FILES[$nombre_fichero]['tmp_name'];
  if (is_dir($directorio_destino) && is_uploaded_file($tmp_name)) {

    $img_file = $_FILES[$nombre_fichero]['name'];
    $img_type = $_FILES[$nombre_fichero]['type'];

    if (((strpos($img_type, "gif") || strpos($img_type, "jpeg") || strpos($img_type, "jpg")) || strpos($img_type, "png"))) {

      if (move_uploaded_file($tmp_name, $directorio_destino . '/' . $img_file)) {
        return $nombre_fichero;
      }
    }
  }
  //Si llegamos hasta aquí es que algo ha fallado
  return false;
}

function traerMarcas($conexion){
  
  $sentencia = $conexion->prepare('select * from categorias');
  $sentencia->execute();
  $resultados = $sentencia->fetchAll();
	var_dump($resultados);
  return $resultados;
}

function traerResultados($conexion,$sentencia){
	
	$conexion->query("SET NAMES 'utf8'");
	$resultados = $conexion->query($sentencia);
	if ($conexion->errno) {
    $resultados = false;
  }
	return $resultados->fetch_All();
}
?>

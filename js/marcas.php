<?php
header('Content-type: application/json; charset=utf-8');
require 'admin/config.php';
require 'funciones.php';

$conex = conectarBD($baseDatosConfiguracion);

$marcas1 = traerMarcas($conexion);
if (!$marcas1) {
  header('Location: ../index.php');
}
$marcas = [];

while ($fila = $marcas1->fetch_assoc()){
  $marca = [
      'id'      => $fila['id'],
      'nombre'  => $fila['nombre'],
      'subcategoria'      => $fila['subcategoria'],
      'imagen'  =>$fila['imagen'],
      'depende'  =>$fila['depende']
  ];
  array_push($marcas, $marca);
}
echo json_decode($marcas);

?>

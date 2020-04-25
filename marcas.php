<?php
require 'admin/config.php';
require 'funciones.php';

$conex = conectarBD($baseDatosConfiguracion);

$marcas = traerMarcas($conexion);

echo $marca;

?>

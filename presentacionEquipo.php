<?php 
session_start();

require 'admin/config.php';
require 'funciones.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}


require 'vistas/presentacionEquipo.view.php';
?>
<?php
session_start();

if (isset($_SESSION['sesion'])) {
  header('Location: home.php');
}

require 'admin/config.php';
require 'funciones.php';

if (isset($_POST['entrar'])) {
	
	$nick = $_POST['nick'];
	$pass = $_POST['pass'];
	
	$conexion = conectarBD($baseDatosConfiguracion);
	
	$sentencia = $conexion->prepare('select * from usuarios where nick = :nick and pass = :pass');
	$sentencia->execute(array(':nick'=> $nick,':pass'=>$pass));
	$resultados = $sentencia->fetch();
  
  if ($resultados) {
    $_SESSION['sesion']=$resultados['id'];
    $_SESSION['sesionNombre']=$resultados['nombre'];
    header('Location:home.php'); 
  }else{
    $mensaje = "datos incorrectos";
  }
}



require 'vistas/login.view.php';
?>
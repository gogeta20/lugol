<?php
session_start();

if (isset($_SESSION['sesionNombre'])) {
  header('Location: home.php');
}

require 'admin/config.php';
require 'funciones.php';

if (isset($_POST['entrar'])) {
	
	$nick = $_POST['nick'];
	$pass = $_POST['pass'];
	
	$conexion = conectarBD($BD);
	
	$sentencia = $conexion->prepare('select * from usuarios where nick = :nick and pass = :pass');
	$sentencia->execute(array(':nick'=> $nick,':pass'=>$pass));
	$resultados = $sentencia->fetch();
  
  if ($resultados) {
    $_SESSION['sesionNombre']=$resultados['nick'];
    header('Location:home.php'); 
  }else{
    $mensaje = "datos incorrectos";
  }
}

if (isset($_POST['nuevoUsuario'])) {
    $regNombre = $_POST['RegNick'];
    $regPass = $_POST['RegPass'];
    $regEmail = $_POST['RegEmail'];

    $conex = conectarBD($BD);
    //insert into usuarios values(null,'mauricio','vargas','linux','linux@lite.com','cmauricio2');
    $sentencia =$conex->prepare("insert into usuarios values(null,:n,:e,:p)");
    $sentencia->execute(array(':n'=>$regNombre,':e'=>$regEmail,':p'=>$regPass));
    if ($sentencia) {
      $_SESSION['sesionNombre']=$regNombre;
      header('Location:home.php');
    }

}


require 'vistas/login.view.php';
?>
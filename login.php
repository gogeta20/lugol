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
    $_SESSION['sesionId']=$resultados['id'];
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
    $sentencia =$conex->prepare("insert into usuarios values(null,:n,:e,:p,null)");
    $sentencia->execute(array(':n'=>$regNombre,':e'=>$regEmail,':p'=>$regPass));


    $sentenciaEncontrarId = $conex->prepare("SELECT max(id) as idE from usuarios");
    $sentenciaEncontrarId->execute();
    $idEncontrado = $sentenciaEncontrarId->fetchAll();
    
    if ($sentencia) {
      $numero = (int)$idEncontrado[0]['idE'];
      $numero;
      $_SESSION['sesionNombre']=$regNombre;
      $_SESSION['sesionId']=$numero;
      header('Location:home.php?new=ok');
    }

}

$actHome = "activarfocusNav";
require 'vistas/login.view.php';
?>
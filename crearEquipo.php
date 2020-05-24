<?php 
session_start();
require 'admin/config.php';
require 'funciones.php';

if (isset($_GET['idUsuario'])) {
    $idPresidente = (int)$_GET['idUsuario'];
}
if (isset($_POST['crearNuevoEquipo'])) {

    $nombre = $_POST['CrearNombreEquipoNuevo'];
    $sede = $_POST['CrearSedeEquipoNuevo'];
    $lema = $_POST['CrearLemaEquipoNuevo'];
    $descripcion = $_POST['CrearDescripcionEquipoNuevo'];
    $idPresidente = $_POST['idPresidente'];

    $conexion = conectar($BD['host'],$BD['user'],$BD['pass'],$BD['baseDatos']);

    if ($_FILES['imagen']['name']) {

        $imagenEscudo = true;
        
        if ($_FILES['imagenEquipo']['name']) {
            
            $imagenEquipo = true;
             
            $nombreImagen = $_FILES['imagen']['name'];//este es la imagen del escudo
            $ruta = "imagenes/equipos/escudos/".$_FILES['imagen']['name'];
            $resultado = move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);
            
            $nombreImagenEquipo = $_FILES['imagenEquipo']['name'];
            $ruta2 = "imagenes/equipos/".$_FILES['imagenEquipo']['name'];
            $resultado2 = move_uploaded_file($_FILES['imagenEquipo']['tmp_name'], $ruta2);

            if ($resultado && $resultado2) {
                $sentenciaNuevoEquipo = $conexion->prepare("insert into equipos (nombre,lema,descripcion,imagen,escudo,sede,presidente) values(?,?,?,?,?,?,?)");
                $sentenciaNuevoEquipo->bind_param("ssssssi",$nombre,$lema,$descripcion,$_FILES['imagenEquipo']['name'],$_FILES['imagen']['name'],$sede,$idPresidente);
                $sentenciaNuevoEquipo->execute();

                header('Location:home.php'); 
            }
        }

    }else{
        $imagenEscudo = false;
        
        if ($_FILES['imagenEquipo']['name']) {
            
            $imagenEquipo = true;

            $img = "imagenSinDefinir.jpg";

            $nombreImagenEquipo = $_FILES['imagenEquipo']['name'];
            $ruta2 = "imagenes/equipos/".$_FILES['imagenEquipo']['name'];
            $resultado2 = move_uploaded_file($_FILES['imagenEquipo']['tmp_name'], $ruta2);

            $sentenciaNuevoEquipo = $conexion->prepare("insert into equipos (nombre,lema,descripcion,imagen,escudo,sede,presidente) values(?,?,?,?,?,?,?)");
            $sentenciaNuevoEquipo->bind_param("ssssssi",$nombre,$lema,$descripcion,$_FILES['imagenEquipo']['name'],$img,$sede,$idPresidente);
            $sentenciaNuevoEquipo->execute();
            header('Location:home.php');    

        }else{

            $imagenEquipo = false;

            if ($imagenEscudo == false && $imagenEquipo == false) {
                $img = "imagenSinDefinir.jpg";

                $sentenciaNuevoEquipo = $conexion->prepare("insert into equipos (nombre,lema,descripcion,imagen,escudo,sede,presidente) values(?,?,?,?,?,?,?)");
                $sentenciaNuevoEquipo->bind_param("ssssssi",$nombre,$lema,$descripcion,$img,$img,$sede,$idPresidente);
                $sentenciaNuevoEquipo->execute();
                header('Location:home.php');    

            }

        }
       
    }
}


require 'vistas/crearEquipo.view.php'
?>
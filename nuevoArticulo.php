<?php 
	session_start();
	require 'admin/config.php';
	require 'funciones.php';
	$volver = "home";
	if ($_POST) {
		$conexion = conectarBD($baseDatosConfiguracion);
		
		$t = $_POST['titulo']?$_POST['titulo']:"titulo sin definir";
		$dc = $_POST['dc']?$_POST['dc']:"descripcion corta sin definir";
		$dl = $_POST['dl']?$_POST['dl']:"descripcion larga sin definir";
//		$img = $_FILES['imagen']['name']? $_FILES['imagen']['name']:"imagenSinDefinir.jpg";
		$id = $_SESSION['sesion'];
		if ($_FILES['imagen']['name']) {

			$nombre = $_FILES['imagen']['name'];
			$ruta = "imagenes/".$_FILES['imagen']['name'];
			$resultado = move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);

			if ($resultado) {
				$sentenciaImgNew = $conexion->prepare("insert into articulos values(null , :titulo, curdate(),:dc,:img,:dl,:id,:categoria)");
				$exec = $sentenciaImgNew->execute(array(":titulo" => $t,":dc" => $dc,":img" => $_FILES['imagen']['name'], ":dl" => $dl ,":id" => $id,":categoria" => 4));
				header ('Location: home.php');
			}

		}else{
			$img = "imagenSinDefinir.jpg";
			$sentencia = $conexion->prepare("insert into articulos values(null , :titulo, curdate(),:dc,:img,:dl,:id,:categoria)");
			$resultados = $sentencia->execute([":titulo" => $t,":dc" => $dc,":dl" => $dl ,":img" => $img, ":id" => $id,":categoria" => 4]);
			header ('Location: index.php');
		}
    
//	  if ($resultados) {
//			header ('Location: home.php');
//		}
	}
	
	 
	require 'vistas/nuevoArticulo.view.php';
?>
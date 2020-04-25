<?php

	$conexion = mysqli("localhost","root","","blog");
	
	if ($conexion->connect_errno) {
		$respuesta = [
				"error" => true
		];
	}else{
		$conexion -> set_charset("utf8");
		$sentencia = $conexion -> prepare("select * from articulos");
		$sentencia -> execute();
		$resultados = $sentencia->get_result();
	}



?>

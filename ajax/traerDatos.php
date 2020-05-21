<?php

require "../admin/config.php";
require "funcionesBaseDatos.php";

//$conexion = conectar($BD['host'],$BD['user'],$BD['pass'],$BD['baseDatos']);
$conexion = conectarBD($BD);
if (!$conexion) {
   header("Location:index.php");
}

if (isset($_POST['tipo'])) {
    $tipo = (int)$_POST['tipo'];

    if ($tipo == "partidos") {
        
        $idEquipo = $_POST['idEquipo'];
        $sentenciaPartidos = $conexion->prepare('SELECT (select sede from equipos where id = calendario.equipoLocal) as sede,(select nombre from equipos where id = calendario.equipoLocal) as equipoL,(select nombre from equipos where id = calendario.equipoVisitante) as equipoV,calendario.hora as hora,calendario.fecha as fecha,calendario.jornada as j FROM equipos join calendario ON equipos.id = calendario.equipoLocal where equipos.id ='.$idEquipo.' UNION SELECT (select sede from equipos where id = calendario.equipoLocal) as sede,(select nombre from equipos where id = calendario.equipoLocal) as equipoL,(select nombre from equipos where id = calendario.equipoVisitante) as equipoV,calendario.hora as hora,calendario.fecha as fecha,calendario.jornada as j FROM equipos join calendario ON equipos.id = calendario.equipoVisitante where equipos.id ='.$idEquipo.' order by fecha desc');
        //$sentenciaPartidos = $conexion->prepare('SELECT (select nombre from equipos where id = calendario.equipoLocal) as equipoL,(select nombre from equipos where id = calendario.equipoVisitante) as equipoV,calendario.hora as hora,calendario.fecha as fecha,calendario.jornada as j FROM equipos join calendario ON equipos.id = calendario.equipoLocal where equipos.id = 1 UNION SELECT (select nombre from equipos where id = calendario.equipoLocal) as equipoL,(select nombre from equipos where id = calendario.equipoVisitante) as equipoV,calendario.hora as hora,calendario.fecha as fecha,calendario.jornada as j FROM equipos join calendario ON equipos.id = calendario.equipoVisitante where equipos.id =1 order by fecha desc');
        $sentenciaPartidos->execute();
        $respuesta = $sentenciaPartidos->fetchAll();


    }

}else{
    $respuesta = "nada";
}

echo json_encode($respuesta);




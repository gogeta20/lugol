<?php

require "../admin/config.php";
require "funcionesBaseDatos.php";

//$conexion = conectar($BD['host'],$BD['user'],$BD['pass'],$BD['baseDatos']);
$conexion = conectarBD($BD);
if (!$conexion) {
   header("Location:index.php");
}

if (isset($_POST['tipo'])) {
    $tipo = $_POST['tipo'];

    if ($tipo == "partidos") {
        
        $idEquipo = $_POST['idEquipo'];
        $sentenciaPartidos = $conexion->prepare('SELECT (select sede from equipos where id = calendario.equipoLocal) as sede,(select nombre from equipos where id = calendario.equipoLocal) as equipoL,(select nombre from equipos where id = calendario.equipoVisitante) as equipoV,calendario.hora as hora,calendario.fecha as fecha,calendario.jornada as j FROM equipos join calendario ON equipos.id = calendario.equipoLocal where equipos.id ='.$idEquipo.' UNION SELECT (select sede from equipos where id = calendario.equipoLocal) as sede,(select nombre from equipos where id = calendario.equipoLocal) as equipoL,(select nombre from equipos where id = calendario.equipoVisitante) as equipoV,calendario.hora as hora,calendario.fecha as fecha,calendario.jornada as j FROM equipos join calendario ON equipos.id = calendario.equipoVisitante where equipos.id ='.$idEquipo.' order by fecha desc');
        //$sentenciaPartidos = $conexion->prepare('SELECT (select nombre from equipos where id = calendario.equipoLocal) as equipoL,(select nombre from equipos where id = calendario.equipoVisitante) as equipoV,calendario.hora as hora,calendario.fecha as fecha,calendario.jornada as j FROM equipos join calendario ON equipos.id = calendario.equipoLocal where equipos.id = 1 UNION SELECT (select nombre from equipos where id = calendario.equipoLocal) as equipoL,(select nombre from equipos where id = calendario.equipoVisitante) as equipoV,calendario.hora as hora,calendario.fecha as fecha,calendario.jornada as j FROM equipos join calendario ON equipos.id = calendario.equipoVisitante where equipos.id =1 order by fecha desc');
        $sentenciaPartidos->execute();
        $respuesta = $sentenciaPartidos->fetchAll();
    }
    if ($tipo == "clasificacion") {
        
        $sentenciaClasificacion = $conexion->prepare('SELECT equipos.nombre as equipo, clasificacion.pJugados as pj, clasificacion.pGanado as ga,clasificacion.pEmpatado as em,clasificacion.pPerdido as pe, clasificacion.dGoles as dg, clasificacion.puntos as puntos FROM equipos JOIN clasificacion on equipos.id = clasificacion.id_equipo  ORDER BY clasificacion.puntos  DESC');
        $sentenciaClasificacion->execute();
        $respuesta = $sentenciaClasificacion->fetchAll();
    }
    if ($tipo == "mensajes") {

        $idUser = $_POST['idUser'];
        $sentenciaMensajes = $conexion->prepare('select mensajes.mensaje as ms,usuarios.nick as rm ,mensajes.fecha as fecha,usuarios.id as idrm from usuarios join mensajes on usuarios.id = mensajes.idRemitente where mensajes.idDestinatario = '.$idUser);
        $sentenciaMensajes->execute();
        $respuesta = $sentenciaMensajes->fetchAll();
    }

    if ($tipo == "solicitudes") {

        $idUser = $_POST['idEquipo'];

        $sentenciaSolicitudes = $conexion->prepare('SELECT 	usuarios.nick as nombre, usuarios.id as idUsuario from usuarios join solicitudes on usuarios.id = solicitudes.idUser where solicitudes.idEquipo ='.$idUser);
        $sentenciaSolicitudes->execute();
        $respuesta = $sentenciaSolicitudes->fetchAll();
    }
    if ($tipo == "respuestasAnuncios") {

        $idUser = $_POST['idEquipo'];

        $sentenciaSolicitudes = $conexion->prepare('SELECT	usuarios.nick as nombre,usuarios.id as idUsuario FROM usuarios join anunciosrespuestas on usuarios.id = anunciosrespuestas.idUser join anuncios on anunciosrespuestas.idAnuncio = anuncios.id WHERE anuncios.equipo ='.$idUser);
        $sentenciaSolicitudes->execute();
        $respuesta = $sentenciaSolicitudes->fetchAll();
    }
    
}else{
    $respuesta = "nada";
}

echo json_encode($respuesta);




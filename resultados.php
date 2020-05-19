<?php
    session_start();
    require 'admin/config.php';
    require 'funciones.php';

    $conexion = conectarBD($BD);

    if (!$conexion) {
        header("Location:index.php");// aqui tengo que mandar al 404
    }

    $sentencia = $conexion->prepare("SELECT (select equipos.nombre from equipos where id = partidos.equipoLocal)as equipolocal,partidos.golesLocal as gl,(select equipos.nombre from equipos WHERE id = partidos.equipoVisitante) as equipoVisitante,partidos.golesVisitante as gv FROM equipos JOIN partidos on equipos.id = partidos.equipoLocal and partidos.jornada = 2");
    $sentencia->execute();
    $resultados = $sentencia->fetchAll();

    $sentencia2 = $conexion->prepare("SELECT equipos.nombre as equipo, clasificacion.pJugados as pj, clasificacion.pGanado as ga,clasificacion.pEmpatado as em,clasificacion.pPerdido as pe, clasificacion.dGoles as dg, clasificacion.puntos as puntos FROM equipos JOIN clasificacion on equipos.id = clasificacion.id_equipo  ORDER BY clasificacion.puntos  DESC");
    $sentencia2->execute();
    $resultadosClasificacion = $sentencia2->fetchAll();

    $sentencia3 = $conexion->prepare("SELECT (select equipos.nombre from equipos where equipos.id = calendario.equipoLocal) as equipoL,(select equipos.nombre from equipos where equipos.id = calendario.equipoVisitante) as equipoV,calendario.hora as hora,calendario.fecha as fecha,calendario.jornada as j FROM equipos join calendario ON equipos.id = calendario.equipoLocal ORDER BY fecha ASC");
    $sentencia3->execute();
    $resultadosCalendario = $sentencia3->fetchAll();

    $sentencia4 = $conexion->prepare("select usuarios.nick as usuarios,COUNT(goles.idJugador) as goles,equipos.nombre as equipo from goles JOIN usuarios ON goles.idJugador = usuarios.id join equipos on usuarios.equipo = equipos.id GROUP BY idJugador order by goles DESC");
    $sentencia4->execute();
    $resultadosGoleadores = $sentencia4->fetchAll();
    require 'vistas/resultados.view.php';
?>
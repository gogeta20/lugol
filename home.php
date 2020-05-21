<?php
session_start();
require 'admin/config.php';
require 'funciones.php';

if (isset($_SESSION['sesionNombre'])) {

  $nombreUsuario = $_SESSION['sesionNombre'];
  $idUsuario = (int)$_SESSION['sesionId'];
  
  $conexion = conectarBD($BD);

  $sentenciaPresidente = $conexion->prepare("select * from equipos where presidente = ".$idUsuario);
  $sentenciaPresidente->execute();
  $presidente = $sentenciaPresidente->fetch();


  if ($presidente) {
    $presi = true;
    $idEquipo =(int) $presidente["id"];
    $nombreEquipo = $presidente["nombre"];
    
    $sentenciaNombre = $conexion->prepare("select nombre from equipos where id =".$idEquipo);
    $sentenciaNombre->execute();
    $nameTeam = $sentenciaNombre->fetch();

    $sentencJugadores = $conexion->prepare("select nick from usuarios WHERE equipo =".$idEquipo);
    $sentencJugadores->execute();
    $jugadores = $sentencJugadores->fetchAll();

    $sentenciaPartidos = $conexion->prepare('SELECT (select nombre from equipos where id = calendario.equipoLocal) as equipoL,(select nombre from equipos where id = calendario.equipoVisitante) as equipoV,calendario.hora as hora,calendario.fecha as fecha,calendario.jornada as j FROM equipos join calendario ON equipos.id = calendario.equipoLocal where equipos.id ='.$idEquipo.' UNION SELECT (select nombre from equipos where id = calendario.equipoLocal) as equipoL,(select nombre from equipos where id = calendario.equipoVisitante) as equipoV,calendario.hora as hora,calendario.fecha as fecha,calendario.jornada as j FROM equipos join calendario ON equipos.id = calendario.equipoVisitante where equipos.id ='.$idEquipo.' order by fecha desc');
    $sentenciaPartidos->execute();
    $partidos = $sentenciaPartidos->fetchAll();
    
    $sentenciaRespuestasAnuncios = $conexion->prepare('SELECT usuarios.nick as nombre,anunciosrespuestas.idAnuncio as numeroAnuncio from anuncios join anunciosrespuestas on anuncios.id = anunciosrespuestas.idAnuncio join usuarios on anunciosrespuestas.idUser = usuarios.id where anuncios.equipo ='.$idEquipo);
    $sentenciaRespuestasAnuncios->execute();
    $respuestasAnuncios = $sentenciaRespuestasAnuncios->fetchAll();
    
    $sentenciaMensajes = $conexion->prepare('SELECT mensajes.mensaje as ms,usuarios.nick as rm from usuarios join mensajes on usuarios.id = mensajes.idRemitente where mensajes.idDestinatario ='.$idUsuario);
    $sentenciaMensajes->execute();
    $mensajes = $sentenciaMensajes->fetchAll();
    
    if (count($mensajes) ==0) {
      $mensajes = "no tienes mensajes";
      $noMensajes = true;
    }else{
      $noMensajes = false;
    }

    $sentenciaSolicitudes = $conexion->prepare('select usuarios.nick as nombre from usuarios join solicitudes on usuarios.id = solicitudes.idUser join equipos on equipos.id = solicitudes.idEquipo where equipos.id = '.$idEquipo);
    $sentenciaSolicitudes->execute();
    $solicitudes = $sentenciaSolicitudes->fetchAll();

    $sentenciaClasificacion = $conexion->prepare('SELECT equipos.nombre as equipo, clasificacion.pJugados as pj, clasificacion.pGanado as ga,clasificacion.pEmpatado as em,clasificacion.pPerdido as pe, clasificacion.dGoles as dg, clasificacion.puntos as puntos FROM equipos JOIN clasificacion on equipos.id = clasificacion.id_equipo  ORDER BY clasificacion.puntos  DESC');
    $sentenciaClasificacion->execute();
    $clasificacion = $sentenciaClasificacion->fetchAll();

    for ($i=0; $i < count($clasificacion); $i++) { 
      if ($clasificacion[$i]['equipo'] == $nombreEquipo ) {
          $posicionTabla = $i+1;
          $puntos = $clasificacion[$i]['puntos'];
          $ganados = $clasificacion[$i]['ga'];
          $perdidos = $clasificacion[$i]['pe'];
          $empatados = $clasificacion[$i]['em'];
      }
    }

  






  }else{
      
    // preguntamos si ¿¿tiene equipo??
    $sentenciaPregunta=$conexion->prepare("select * from usuarios where id = ".$idUsuario);
    $sentenciaPregunta->execute();
    $tieneEquipo = $sentenciaPregunta->fetch();

    if ($tieneEquipo['equipo'] != null) {
      $noTieneEquipo = false;
      $suEquipo = (int)$tieneEquipo['equipo'];

      $sentenciaNombre = $conexion->prepare("select nombre from equipos where id =".$suEquipo);
      $sentenciaNombre->execute();
      $nameTeam = $sentenciaNombre->fetch();

      $sentenciaPartidos = $conexion->prepare('SELECT (select nombre from equipos where id = calendario.equipoLocal) as equipoL,(select nombre from equipos where id = calendario.equipoVisitante) as equipoV,calendario.hora as hora,calendario.fecha as fecha,calendario.jornada as j FROM equipos join calendario ON equipos.id = calendario.equipoLocal where equipos.id ='.$suEquipo.' UNION SELECT (select nombre from equipos where id = calendario.equipoLocal) as equipoL,(select nombre from equipos where id = calendario.equipoVisitante) as equipoV,calendario.hora as hora,calendario.fecha as fecha,calendario.jornada as j FROM equipos join calendario ON equipos.id = calendario.equipoVisitante where equipos.id ='.$suEquipo);
      $sentenciaPartidos->execute();
      $partidos = $sentenciaPartidos->fetchAll();
      
      $sentenciaMensajes = $conexion->prepare('SELECT mensajes.mensaje as ms,usuarios.nick as rm from usuarios join mensajes on usuarios.id = mensajes.idRemitente where mensajes.idDestinatario ='.$idUsuario);
      $sentenciaMensajes->execute();
      $mensajes = $sentenciaMensajes->fetchAll();
      
      if (count($mensajes) ==0) {
        $mensajes = "no tienes mensajes";
        $noMensajes = true;
      }else{
        $noMensajes = false;
      }
      $sentenciaClasificacion = $conexion->prepare('SELECT equipos.id as idEquipo,equipos.nombre as equipo, clasificacion.pJugados as pj, clasificacion.pGanado as ga,clasificacion.pEmpatado as em,clasificacion.pPerdido as pe, clasificacion.dGoles as dg, clasificacion.puntos as puntos FROM equipos JOIN clasificacion on equipos.id = clasificacion.id_equipo  ORDER BY clasificacion.puntos  DESC');
      $sentenciaClasificacion->execute();
      $clasificacion = $sentenciaClasificacion->fetchAll();
      
      $sentenciagoles = $conexion->prepare('SELECT COUNT(goles.idJugador) as goles from goles where goles.idJugador ='.$idUsuario);
      $sentenciagoles->execute();
      $goles = $sentenciagoles->fetch();

      for ($i=0; $i < count($clasificacion); $i++) { 
        if ($clasificacion[$i]['idEquipo'] == $suEquipo ) {
            $posicionTabla = $i+1;
            $puntos = $clasificacion[$i]['puntos'];
            $ganados = $clasificacion[$i]['ga'];
            $perdidos = $clasificacion[$i]['pe'];
            $empatados = $clasificacion[$i]['em'];
        }
      }
    }else{
      $noTieneEquipo = true;
    }
  }// else de si tiene equipo?
}

require 'vistas/home.view.php';
?>


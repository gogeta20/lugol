<?php
session_start();
require 'admin/config.php';
require 'funciones.php';
$presentarBienvenida = false;
if (isset($_GET['new']) || isset($_SESSION['new'])) {

  $nombreUsuario = $_SESSION['sesionNombre'];
  $presentarBienvenida = true;
  $_SESSION['new'] = true;
  $bienvenida = '<div class="bienvenida">
  <h3>Bienvenido '.$nombreUsuario.'</h3>
  <p>ahora que ya eres de los nuestros</p>
  <p>tenemos que encontrar equipo</p>
  <p>conoce a nuestros equipos</p>
  <p>y unete al que mas te guste</p>
  <p>o puedes comenzar tu propio equipo</p>
</div>
<div class="bienvenidaCarteles">
  <a href="" class="cartel">
    <div>
      <h3>Mira la lista de equipos</h3>
      <p>conoce donde estan sus sedes</p>
      <p>sus horios de entrenamiento</p>
      <p>mira su pocision en la liga</p>
    </div>
  </a>
  <a href="" class="cartel">
    <div>
      <h3>Crea un equipo nuevo</h3>
      <p>trae a tus amigos</p>
      <p>puedes publicar un anuncio</p>
      <p>para encontrar nuevos jugadores</p>
    </div>
  </a>
  <div class="cartel">
    <h3>Atento a los resultados</h3>
    <p>puedes seguir en vivo el partido</p>
    <p>ver los resultados y estadisticas</p>
    <p>deja tus comentarios</p>
  </div>
  <div class="cartel">
    <h3>La Liga - noticias</h3>
    <p>publicaremos todo relacionado</p>
    <p>a horarios, incidencias, inscripciones</p>
    <p>y todo lo referente a la liga</p>
    <p>en la seccion noticias</p>
  </div>
</div>';

}

if (!isset($_SESSION['new'])) {
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
  
      $sentenciaPartidos = $conexion->prepare('SELECT (select nombre from equipos where id = calendario.equipoLocal) as equipoL,(select nombre from equipos where id = calendario.equipoVisitante) as equipoV,calendario.hora as hora,calendario.fecha as fecha,calendario.jornada as j FROM equipos join calendario ON equipos.id = calendario.equipoLocal where equipos.id = '.$idEquipo.' ORDER by fecha asc');
      $sentenciaPartidos->execute();
      $partidos = $sentenciaPartidos->fetchAll();
      
      $sentenciaRespuestasAnuncios = $conexion->prepare('SELECT usuarios.nick as nombre,anunciosrespuestas.idAnuncio as numeroAnuncio from anuncios join anunciosrespuestas on anuncios.id = anunciosrespuestas.idAnuncio join usuarios on anunciosrespuestas.idUser = usuarios.id where anuncios.equipo ='.$idEquipo);
      $sentenciaRespuestasAnuncios->execute();
      $respuestasAnuncios = $sentenciaRespuestasAnuncios->fetchAll();
      
      $sentenciaMensajes = $conexion->prepare('select buzon.mensaje as mensaje,usuarios.nick as nombre from usuarios join buzon on usuarios.id = buzon.idUser join equipos on equipos.id = buzon.idEquipos WHERE equipos.id = '.$idEquipo);
      $sentenciaMensajes->execute();
      $mensajes = $sentenciaMensajes->fetchAll();
      
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
  
    }
  }
}


require 'vistas/home.view.php';
?>


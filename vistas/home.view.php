<?php require 'headerNav.php';?>
<div id="fondoHome">
<section id="sectionHome"> 
  <div class="usuario">
    <h1 class="tituloHome"><?php echo $nombreUsuario ?></h1>
    <a href=""> <button>mi equipo</button> </a>
    <a href=""> <button>buzon</button> </a>
    <a href=""> <button>calendario</button> </a>
    <a href=""> <button>cuenta</button> </a>
    <a href="cerrar.php"><button>cerrar sesion</button> </a>
  </div>
  	<div id="serHome" class="">
		<div id="cuerpoHome" class="">
			<?php if(isset($presi)){ ?>
				<div class="bienvenida">
					<h3>Bienvenido <?php echo $nombreUsuario ?></h3>

					<?php if($noMensajes){?>
					<?php }else{?>
						<p>mensajes <?= count($mensajes)?></p>
					<?php }?>
					<p>solicitudes <?= count($solicitudes)?></p>
					<p>respuestas de anuncios <?= count($respuestasAnuncios)?></p>
				</div>

				<div class="bienvenidaCarteles">
					<div class="cartel" id="siguientePartido">
						<h3>Siguiente Partido</h3>
						<p><?php echo $partidos[0]['equipoL']?></p>
						<p>vs</p>
						<p><?php echo $partidos[0]['equipoV']?></p>
					</div>
					<div class="cartel" id="clasificacion">
						<h3>Posicion en la tabla <?php echo $posicionTabla?>ro</h3>
						<p>puntos <?php echo $puntos?></p>
						<p>ganados <?php echo $ganados?></p>
						<p>perdidos <?php echo $perdidos?></p>
						<p>empatados <?php echo $empatados?></p>
					</div>
					<div class="cartel" id="mensajes">
						<?php if($noMensajes){?>
							<h3>buzon vacio</h3>
							<p><?php echo $mensajes?></p>
						<?php }else{?>
							<h3>ultimo mensaje</h3>
							<p>del Usuario: <?php echo $mensajes[count($mensajes)-1]['nombre']?></p>
							<p><?php echo $mensajes[count($mensajes)-1]['mensaje']?></p>
						<?php }?>
					</div>
					<div class="cartel" id="solicitudes">
						<h3>ultimas Solicitudes</h3>
						<?php 
							for ($i=0; $i < count($solicitudes); $i++) { 
								echo '<p>- '.$solicitudes[$i]['nombre'].'</p>';
								
							}
						?>
					</div>
					<div class="cartel" id="listaJugadores">
						<h3>lista de jugadores</h3>
						<?php 
							if (count($jugadores) > 0) {
								echo '<div class="cajaJugadores">';
								for ($i=0; $i < count($jugadores); $i++) { 
									echo '<p>- '.$jugadores[$i]['nick'].'</p>';
									
								}
								echo '</div>';
							}else{
								echo '<p>todavia no cuentas con jugadores</p>';
							}
						?>
					</div>
					<div class="cartel" id="publicarAnuncioPresi">
						<h3>publicar anuncio</h3>
						<div class="publicarAnuncioPresidente">
							<textarea name="anuncio" cols="60" rows="10" placeholder="escribe tu anuncio"></textarea>
							<button class="boton">publicar</button>
						</div>
					</div>
				</div>

			<?php }else{
				if ($noTieneEquipo) {?>
					<div class="bienvenida">
						<h3>Bienvenido <?=$nombreUsuario?></h3>
						<p>ahora que ya eres de los nuestros</p>
						<p>tenemos que encontrar equipo</p>
						<p>conoce a nuestros equipos</p>
						<p>y unete al que mas te guste</p>
						<p>o puedes comenzar tu propio equipo</p>
					</div>
					<div class="bienvenidaCarteles">
					<a href="categorias.php" class="cartel">
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
						<a href="resultados.php">
							<h3>Atento a los resultados</h3>
							<p>puedes seguir en vivo el partido</p>
							<p>ver los resultados y estadisticas</p>
							<p>deja tus comentarios</p>
						</a>
					</div>
					<div class="cartel">
						<a href="noticias.php">
							<h3>La Liga - noticias</h3>
							<p>publicaremos todo relacionado</p>
							<p>a horarios, incidencias, inscripciones</p>
							<p>y todo lo referente a la liga</p>
							<p>en la seccion noticias</p>
						</a>
					</div>
					</div>
				<?php }else{?>
				
				<div class="bienvenida">
					<h3>Bienvenido <?php echo $nombreUsuario ?></h3>
					<p><?php echo $nameTeam['nombre']?></p>
						
						<?php if($noMensajes){?>
						<?php }else{?>
							<h3>ultimo mensaje</h3>
							<p>del Usuario: <?php echo $mensajes[count($mensajes)-1]['nombre']?></p>
							<p><?php echo $mensajes[count($mensajes)-1]['mensaje']?></p>
						<?php }?>
				</div>

				<div class="bienvenidaCarteles">
					<a href="" class="cartel">
						<div>
						<h3>Siguiente Partido</h3>
						<p><?php echo $partidos[0]['equipoL']?></p>
						<p>vs</p>
						<p><?php echo $partidos[0]['equipoV']?></p>
						</div>
					</a>
					<a href="" class="cartel">
						<div>
							<h3>Posicion en la tabla <?php echo $posicionTabla?>ro</h3>
							<p>puntos <?php echo $puntos?></p>
							<p>ganados <?php echo $ganados?></p>
							<p>perdidos <?php echo $perdidos?></p>
							<p>empatados <?php echo $empatados?></p>
						</div>
					</a>
					<div class="cartel">
						<?php if($noMensajes){?>
							<h3>buzon vacio</h3>
							<p><?php echo $mensajes?></p>
						<?php }else{?>
							<h3>ultimo mensaje</h3>
							<p>del Usuario: <?php echo $mensajes[count($mensajes)-1]['nombre']?></p>
							<p><?php echo $mensajes[count($mensajes)-1]['mensaje']?></p>
						<?php }?>

					</div>
					<div class="cartel">
						<h3>Goles en la temporada</h3>
						<?php 
							echo '<p>'.$goles['goles'].'</p>';
						?>
					</div>
				</div>
			<?php }}?> <!--- fin de  -->
		</div>
		<div id="espaldaHome">
			<div class="espaldaHome" id="respuestaPartidos">
				<table id="tablaPartidosEspalda">

				</table>
			</div>
			<div class="bienvenidaCarteles">
			<a href="categorias.php" class="cartel">
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
				<a href="resultados.php">
					<h3>Atento a los resultados</h3>
					<p>puedes seguir en vivo el partido</p>
					<p>ver los resultados y estadisticas</p>
					<p>deja tus comentarios</p>
				</a>
			</div>
			<div class="cartel">
				<a href="noticias.php">
					<h3>La Liga - noticias</h3>
					<p>publicaremos todo relacionado</p>
					<p>a horarios, incidencias, inscripciones</p>
					<p>y todo lo referente a la liga</p>
					<p>en la seccion noticias</p>
				</a>
			</div>
		</div>
			<button id="volverCuerpo">volver</button>
		</div>
	</div>						
</section>
<input type="hidden" id="idEquipo" value="<?php echo $idEquipo?>">
</div>
<script src="ajax/homeCuerpo.js"></script>
<?php require 'footer.php'; ?>

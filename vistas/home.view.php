<?php require 'headerNav.php';?>
<div id="fondoHome">
<section id="sectionHome"> 
  <div class="usuario">
    <h1 class="tituloHome"><?php echo $nombreUsuario ?></h1>
    <a href="cerrar.php"><button>cerrar sesion</button> </a>
  </div>
  	<div id="serHome" class="">
		<div id="cuerpoHome" class="">
			<?php if(isset($presi)){ ?>
				<div class="bienvenida">
					<h3>Bienvenido <?php echo $nombreUsuario ?></h3>
					<p><?php// echo var_dump($nombreEquipo)?></p>
					<?php if($noMensajes){?>
					<?php }else{?>
						<p>mensajes <?= count($mensajes)?></p>
					<?php }?>
					<p>solicitudes <?= count($solicitudes)?></p>
					<p>respuestas de anuncios <?= count($respuestasAnuncios)?></p>
				</div>

				<div class="bienvenidaCarteles">
					<div class="cartel" id="siguientePartido">
					<?php if($noPartidos){?>
							<h3>Sin partidos</h3>
							<p><?php echo $mensajeNoPartidos?></p>
						<?php }else{?>
							<h3>Siguiente Partido</h3>
							<p><?php echo $partidos[0]['equipoL']?></p>
							<p>vs</p>
							<p><?php echo $partidos[0]['equipoV']?></p>
						<?php }?>
					</div>
				
					<div class="cartel" id="clasificacion">
						<?php if($noClasificado){?>
								<h3>Sin Clasificacion</h3>
								<p><?php echo $mensajeNoClasificado?></p>
							<?php }else{?>
								<h3>Posicion en la tabla <?php echo $posicionTabla?>ro</h3>
								<p>puntos <?php echo $puntos?></p>
								<p>ganados <?php echo $ganados?></p>
								<p>perdidos <?php echo $perdidos?></p>
								<p>empatados <?php echo $empatados?></p>
							<?php }?>
					</div>
					<div class="cartel" id="mensajes">
						<?php if($noMensajes){?>
							<h3>buzon vacio</h3>
							<p><?php echo $mensajes?></p>
						<?php }else{?>
							<h3>ultimo mensaje</h3>
							<p>del Usuario: <?php echo $mensajes[count($mensajes)-1]['rm']?></p>
							<p><?php echo $mensajes[count($mensajes)-1]['ms']?></p>
						<?php }?>
					</div>
					<div class="cartel" id="solicitudes">
						<h3>ultimas Solicitudes</h3>
						<?php 
							if(count($solicitudes)>=4){
								$limit = 4;
							}else{
								$limit = count($solicitudes);
							}
							for ($i=0; $i < $limit; $i++) { 
								echo '<p>- '.$solicitudes[$i]['nombre'].'</p>';
								
							}
						?>
					</div>
					<div class="cartel" id="listaJugadores">
						<h3>lista de jugadores</h3>
						<?php 
							if (count($jugadores) > 0) {
								echo '<div class="listaDeJugadores">';
								for ($i=0; $i < count($jugadores); $i++) { 
									echo '<div class="player"><p>- '.$jugadores[$i]['nick'].'</p></div>';
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
							<textarea id="contenidoPublicarAnuncio" name="anuncio" cols="60" rows="10" value=""></textarea>
							<button id="publicarAnuncio" class="boton">publicar</button>
						</div>
					</div>
					<div class="cartel" id="respuestasAnuncios">
						<h3>Respuestas de Anuncios</h3>
						<?php 
							if (count($respuestasAnuncios) > 0) {
								echo '<div class="listaDeJugadores">';
								for ($i=0; $i < count($respuestasAnuncios); $i++) { 
									echo '<div class="player"><p>- '.$respuestasAnuncios[$i]['nombre'].'</p></div>';
								}
								echo '</div>';
							}else{
								echo '<p>sin respuestas</p>';
							}
						?>
					</div>
					<div class="noDisponible" id="crearEquipo"></div>
				</div>
				<div class="firma2"><p>mauricio vargas</p></div>
				<input type="hidden" id="nombreEquipo" value="<?php echo $nombreEquipo?>">			
			<?php }else{  // fin de presi comienzo de nuevo usuario ----------------------------
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
						<div class="cartel"  id="crearEquipo">
							<a href="crearEquipo.php?idUsuario=<?php echo $idUsuario?>">
								<h3>Crear equipo</h3>
								<p>trae a tus amigos</p>
								<p>y compite en la liga</p>
								<p>mira los requisitos</p>
							</a>
						</div>
						<div class=""></div>
					</div>
					<div class="noDisponible" id="solicitudes"></div>
					<div class="noDisponible" id="listaJugadores"></div>
					<div class="noDisponible" id="publicarAnuncio"></div>
					<div class="noDisponible" id="respuestasAnuncios"></div>
					<input type="hidden" id="nombreEquipo" value="<?php echo $nombreEquipo?>">
				<?php }else{?>
				
				<div class="bienvenida">
					<h3> <?php echo $nombreUsuario ?></h3>
					<p><?php echo $nameTeam['nombre']?></p>
						
						<?php if($noMensajes){?>
						<?php }else{?>
							<p>mensajes <?= count($mensajes)?></p>
						<?php }?>
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
							<p>del Usuario: <?php echo $mensajes[count($mensajes)-1]['rm']?></p>
							<p><?php echo $mensajes[count($mensajes)-1]['ms']?></p>
						<?php }?>
					</div>
					<div class="cartel">
						<h3>Goles en la temporada</h3>
						<?php 
							echo '<p>'.$goles['goles'].'</p>';
						?>
					</div>
					<div class="cartel"  id="crearEquipo">
						<a href="crearEquipo.php?idUsuario=<?php echo $idUsuario?>">
							<h3>Crear equipo</h3>
							<p>trae a tus amigos</p>
							<p>y compite en la liga</p>
							<p>mira los requisitos</p>
						</a>
					</div>
					<div class="noDisponible" id="solicitudes"></div>
					<div class="noDisponible" id="listaJugadores"></div>
					<div class="noDisponible" id="publicarAnuncio"></div>
					<div class="noDisponible" id="respuestasAnuncios"></div>
				</div>
				<div class="firma2"><p>mauricio vargas</p></div>
				<input type="hidden" id="nombreEquipo" value="<?php echo $nombreEquipo?>">	
			<?php }}?> <!--- fin de  -->
		</div>
		<div id="espaldaHome1">
			<div class="espaldaHome" id="respuestaPartidos">
				<div class="mensajesRespuestas" id="mensajesRespuestas"><!-- no volcar-->
					<table id="tablaEspalda" class="tablaEspalda">

					</table>
					<div id="responderMensajes" class="responderMensajes" >
						<h2 id="remitenteRM"></h2>
						<p id="msjVista" class="msjVista"></p>
						<textarea name="" id="tart" cols="100" rows="7"></textarea>
						<div class="botonesResponderMensajes">
							<button class="boton" id="botonVolverMensajes">enviar</button>
							<button class="boton no" id="botonCancelarMsj">cancelar</button>
						</div>
					</div>
				</div>
				
			</div>
			
			<button id="volverCuerpo" class="botonVolverDeEspalda">volver</button>
			<div class="firma2"><p>mauricio vargas</p></div>
		</div>
		
	</div>			
	
</div>			
</section>

<input type="hidden" id="idEquipo" value="<?php echo $idEquipo?>">
<input type="hidden" id="idUser" value="<?php echo $idUsuario?>">

</div>
<script src="ajax/homeCuerpo.js"></script>
<?php ///require 'footer.php'; ?>

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
	<div id="cuerpoHome">
		<div class="bienvenida">
			<h3>Bienvenido Mauricio</h3>
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
		</div>
	</div>
</section>
</div>
<?php require 'footer.php'; ?>

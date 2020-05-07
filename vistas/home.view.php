<?php require 'headerNav.php';?>
<div id="fondoHome">
<section id="sectionHome"> 
  <div class="usuario">
    <h1 class="tituloHome"><?php echo $resultado2['nombre'] . " " . $resultado2['apellidos']; ?></h1>
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
	</div>
</section>
</div>
<?php require 'footer.php'; ?>

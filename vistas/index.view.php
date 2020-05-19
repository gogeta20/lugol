<?php
require 'headerNav.php';
?>
<div class="pFondoPrincipal">
	<div class="mensajePrincipal">
		<p class="nombrePagina">Futbol Lugo</p>
		<p>animate a participar</p>
		<a href="marca.php">encuentra equipo!! <i class="far fa-hand-point-left"></i></a>
	</div>
	<div class="contenedorVideo">
		<video onloadedmetadata="this.muted=true" autoplay loop>
			<source src="videos/uno.mp4">
		</video>
	</div>
</div>
<div class="ptable">
  <h1 class="headin">Clasificación Liga Lugogol 2020</h1>
	<table id="tablaPosiciones">
		
	</table>
</div>

<div class="indexCrearEquipo">
	<div class="indexImgCrea">
	</div>
	<div class="indexTextoCrea">
		<h2 class="headin">Crea tu equipo</h2>
		<p>
			Lorem ipsum dolor sit amet consectetur, adipisicing elit
			Modi ad eaque quos? Quam, dolores optio deleniti culpa 
			voluptatem quaerat repellendus. Unde ullam consectetur
			blanditiis! Veritatis itaque maiores dolorem quibusdam vel?
		</p>
		<p>
			Lorem ipsum dolor sit amet consectetur, adipisicing elit
			Modi ad eaque quos? Quam, dolores optio deleniti culpa 
			voluptatem quaerat repellendus. Unde ullam consectetur
			blanditiis! Veritatis itaque maiores dolorem quibusdam vel?
		</p>
		<a href="login.php"><button class="botonResultados">crea tu equipo</button></a>
	</div>
</div><!-- --->
<div class="wanted">
	<div class="indexWanted">
		<div class="indexTextoCrea">
			<h2 class="headin">Los equipos buscan jugadores</h2>
			<p>
				Lorem ipsum dolor sit amet consectetur, adipisicing elit
				Modi ad eaque quos? Quam, dolores optio deleniti culpa 
				voluptatem quaerat repellendus. Unde ullam consectetur
				blanditiis! Veritatis itaque maiores dolorem quibusdam vel?
			</p>
			<p>
				Lorem ipsum dolor sit amet consectetur, adipisicing elit
				Modi ad eaque quos? Quam, dolores optio deleniti culpa 
			</p>
			<a href="marca.php"><button class="botonResultados">participa</button></a>
		</div>
		
		<div class="indexWantedImg">
		</div>
	</div><!-- --->
</div>

<div class="informacion">
	<h2>Conoce mas del futbol amateur</h2>
	<div class="inf">
		<div class="cajaCirculo" >
			<div class="circulo" id="team">
				<i class="fas fa-users"></i>
			</div>
			<h3>Conoce a los equipos</h3>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
				 Quisquam accusantium, minus iste magnam cum sed quia neque
			</p>
		</div>
		<div class="cajaCirculo">
			<div class="circulo" id="pelota">
				<i class="fas fa-futbol"></i>
			</div>
			<h3>anima a tu favorito</h3>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
				Quisquam accusantium, minus iste magnam cum sed quia neque
			</p>
		</div>
		<div class="cajaCirculo">
			<div class="circulo" id="run">
				<i class="fas fa-running"></i>
			</div>
			<h3>participa en la liga</h3>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
				Quisquam accusantium, minus iste magnam cum sed quia neque
			</p>
		</div>
	</div>
</div>
<div class="futbolBase">
	<h2>Futbol Base</h2>
	<div class="primeraFutbolBase">
		<div class="imagenFB">
			<img src="imagenes/paraIndex/pre1.png" id="imgPre">
		</div>
		<div class="textoFB">
		<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
				Quisquam accusantium, minus iste magnam cum sed quia neque
				Lorem ipsum dolor sit amet consectetur adipisicing elit.
				Quisquam accusantium, minus iste magnam cum sed quia neque
		</p>
		<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
				Quisquam accusantium, minus iste magnam cum sed quia neque
				Lorem ipsum dolor sit amet consectetur adipisicing elit.
				Quisquam accusantium, minus iste magnam cum sed quia neque
		</p>
		<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
				Quisquam accusantium, minus iste magnam cum sed quia neque
				Lorem ipsum dolor sit amet consectetur adipisicing elit.
				Quisquam accusantium, minus iste magnam cum sed quia neque
		</p>
		<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
				Quisquam accusantium, minus iste magnam cum sed quia neque
				Lorem ipsum dolor sit amet consectetur adipisicing elit.
				Quisquam accusantium, minus iste magnam cum sed quia neque
		</p>
		</div>
	</div>
</div>
<div class="empresasColaboradoras">
	<h2>Empresas Colaboradoras</h2>
	<div class="primeraEmpresas">
		<div>
			<img src="imagenes/paraIndex/cc.jpg" id="">
		</div>
		<div>
			<img src="imagenes/paraIndex/nike.jpg" id="">
		</div>
		<div>
			<img src="imagenes/paraIndex/ps.jpg" id="">
		</div>
		<div>
			<img src="imagenes/paraIndex/xg.jpg" id="">
		</div>
	</div>
</div>
<script src="ajax/datosIndex.js"></script>
<script src="js/banner.js"></script>
<script src="js/index.view.js"></script>
<?php require 'footer.php'; ?>

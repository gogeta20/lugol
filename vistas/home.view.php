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
		<?php
			if ($presentarBienvenida) {
				echo $bienvenida;		
			}
		?>
		<?php if(isset($presi)){ ?>

			<div class="bienvenida">
				<h3>Bienvenido <?php echo $nombreUsuario ?></h3>
				<p>mensajes <?= count($mensajes)?></p>
				<p>solicitudes <?= count($solicitudes)?></p>
				<p>respuestas de anuncios <?= count($respuestasAnuncios)?></p>
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
				<h3>ultimo mensaje</h3>
				<p>del Usuario: <?php echo $mensajes[count($mensajes)-1]['nombre']?></p>
				<p><?php echo $mensajes[count($mensajes)-1]['mensaje']?></p>
			</div>
			<div class="cartel">
				<h3>ultimas Solicitudes</h3>
				<?php 
					for ($i=0; $i < count($solicitudes); $i++) { 
						echo '<p>- '.$solicitudes[$i]['nombre'].'</p>';
					}
				?>
			</div>
		</div>
		<?php }?>
	</div>
</section>
</div>
<?php require 'footer.php'; ?>

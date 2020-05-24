<?php 
	session_start();
	require 'headerNav.php';
?>
<section>
<?php	
if (!$items) {
	//require 'error.php';
}else{?>
	<h2><?= $respuesta; ?></h2>
<?php foreach ($items as $articulo):?>

		<article class="articuloPrincipal">
			<h2><?php echo $articulo['nombre'];?></h2>
			<p class="fecha"><?php //echo formatearFecha($articulo['fecha']);?></p>
				<div class="divDosImagen">
					<div>
							<img class="imagenArticuloPrincipal" src="<?php echo RUTA; ?>imagenes/equipos/<?php echo $articulo['imagen'];?>" alt="">
					</div>
				</div>
				<div>
					<p><?php echo $articulo['descripcion'];?></p>	
					<a href="<?php echo RUTA?>index.php"><button type="button">volver</button></a>
				</div>
		</article>

		<?php endforeach;?>
	<?php
	}
	?>
</section>
<?php
	require 'footer.php';
?>

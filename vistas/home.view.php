<?php
require 'headerNav.php';
$artTotal = totalArticulosUser($conexion, $resultado2['id']);
$numPag = ceil($artTotal / $configPagina['post_por_pagina']);


?>
<section> 
  <div class="usuario">
    <h1 class="tituloHome"><?php echo $resultado2['nombre'] . " " . $resultado2['apellidos']; ?></h1>
    <a href="nuevoArticulo.php"> <button>crear nuevo articulo</button> </a>
    <a href="cerrar.php"><button>cerrar sesion</button> </a>
  </div>
  <div>
    <h2>tus Articulos</h2>
		<?php
		if (count($resultado3) > 4){
			require 'paginacion.php';
		}
		foreach ($resultado3 as $item) {
			if (count($resultado3) < 2):
		?>
				<article class="oculto">
				</article>
		<?php endif; ?>
			<article>
        
				<a href="<?php echo RUTA; ?>articuloPrincipal.php?id=<?php echo $item['id'] ?>&r=<?php echo $ruta;?>&p=<?php echo paginaActual();?>"><h3><?= $item['titulo'] ?></h3></a>
				<p class='fecha'>Lanzamiento: <?= formatearFecha($item['fecha']) ?></p>
				<div class='IT'>
					<div class='divImagen'>
						<div>
							<a href="<?php echo RUTA; ?>articuloPrincipal.php?id=<?php echo $item['id'] ?>&r=<?php echo $ruta;?>&p=<?php echo paginaActual();?>">
								<img class='imagenRedimensionada' src="<?php echo RUTA; ?>imagenes/<?php echo $item['imagen'] ?>" alt=''>
							</a>
						</div>
					</div>
					<div>
						<p><?php echo $item['DC']; ?></p>	
						<a href="<?php echo RUTA; ?>articuloPrincipal.php?id=<?php echo $item['id']; ?>&r=<?php echo $ruta;?>&p=<?php echo paginaActual();?>"><button type='button'>mas detalles ..</button></a>
						<a href="<?php echo RUTA; ?>eliminar.php?id=<?php echo $item['id']; ?>"><button class="eliminar" type='button'>eliminar</button></a>
						<a href="<?php echo RUTA; ?>editar.php?id=<?php echo $item['id']; ?>&r=<?php echo $ruta;?>&p=<?php echo paginaActual();?>"><button class="editar" type='button'>editar</button></a>
					</div>
				</div>
			</article>
		<?php } ?>
	  </div>


	</section>

	<?php require 'paginacion.php'; ?>
	<?php require 'footer.php'; ?>

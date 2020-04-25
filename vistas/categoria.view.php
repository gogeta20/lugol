<?php require 'headerNav.php';
$artTotal = totalArticulosCategoria($conexion, $categoriaID);
$numPag = (ceil($artTotal / $configPagina['post_por_pagina'])== 0)?1:ceil($artTotal / $configPagina['post_por_pagina']);

?>
<section>
  <h2 class="nombreCategoria"><?php echo $nombreCategoria;?></h2>  
<?php
	require 'paginacion.php';
	foreach ($articulos as $arti):?>
    
    <article>
        
				<a href="<?php echo RUTA; ?>articuloPrincipal.php?id=<?php echo $arti['id'] ?>&r=<?php echo $ruta;?>&p=<?php echo paginaActual();?>"><h3><?= $arti['titulo'] ?></h3></a>
				<p class='fecha'>Lanzamiento: <?= formatearFecha($arti['fecha']) ?></p>
				<div class='IT'>
					<div class='divImagen'>
						<div>
							<a href="<?php echo RUTA; ?>articuloPrincipal.php?id=<?php echo $arti['id'] ?>&r=<?php echo $ruta;?>&p=<?php echo paginaActual();?>">
								<img class='imagenRedimensionada' src="<?php echo RUTA; ?>imagenes/<?php echo $arti['imagen'] ?>" alt=''>
							</a>
						</div>
					</div>
					<div>
						<p><?php echo $arti['DC']; ?></p>	
						<a href="<?php echo RUTA; ?>articuloPrincipal.php?id=<?php echo $arti['id']; ?>&r=<?php echo $ruta;?>&p=<?php echo paginaActual();?>"><button type='button'>mas detalles ..</button></a>
					</div>
				</div>
			</article>
    
  <?php endforeach;?>
  </section>
 <?php 
  require 'paginacion.php';
  require 'footer.php';
 ?>
<?php require 'headerNav.php'?>
<section>
  <?php
    if ($articulosCategorias > 2) {
     require 'paginacion.php'; 
    }
  ?>
  <div class="recuadroCategoria">
  <?php foreach ($resultados as $item):?>
    
  
    <div>
      <a href="<?php echo RUTA;?>categoria.php?c=<?php echo $item['id']?>&n=<?php echo $item['nombre']?>">
        <img src="<?= RUTA; ?>imagenes/<?= $item['imagen']?>" alt="">
      </a>
    </div>
  
  <?php endforeach;?>
  
  
  </div>
  <?php foreach ($articulosCategorias as $arti):?>
    
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

<?php require 'paginacion.php'?>
<?php require 'footer.php'?>

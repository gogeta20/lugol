<?php require 'headerNav.php';

if (isset($_GET['r'])) {
	$volver = $_GET['r'];
}else{
	$volver = "home";
}

if (isset($_GET['p'])) {
	$pagina = $_GET['p'];
}else{
	$pagina = 1;
}

?>
<section>
	<article class="articuloPrincipal">
		<h2 class="h2">Edicion de Articulo : <?php echo $articulo['titulo']?></h2>
    <form class="nuevoArticulo" action="<?php RUTA; ?>editar.php?id=<?php echo $articulo['id'];?>" method="post" enctype="multipart/form-data">
    <input class="editar2" type="text" name="nuevoTitulo" placeholder="titulo actual :<?php echo $articulo['titulo'];?>">
			<div class="divDosImagen">
				<div>
						<img class="imagenArticuloPrincipal2" src="<?php echo RUTA; ?>imagenes/<?php echo $articulo['imagen'];?>" alt="">
				</div>
			</div>
			<div>
        <input name="imagen" type="file" />
        <textarea class="editar3" name="nuevaDescripcion" placeholder="descripcion actual :<?php echo $articulo['descripcion'];?>"></textarea>
        <textarea class="editar3" name="nuevaDC" placeholder="descripcion Corta actual :<?php echo $articulo['DC'];?>"></textarea>
			</div>
		  <p>
				<input type="submit" value="Realizar cambios">
			</p>
			<p>
				<a href="<?php echo RUTA.$volver?>.php?p=<?php echo $pagina;?>"><button type="button">volver</button></a>
			</p>
		</form>
	</article>
</section>


<?php require 'footer.php';?>
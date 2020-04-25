<?php require 'headerNav.php';

if (isset($_GET['p'])) {
	$pagina = $_GET['p'];
}else{
	$pagina = 1;
}

?>
		<section>
			<article id="nuevoArticulo">
				<h2 class="h2">Nuevo Articulo</h2>
				<form  class="nuevoArticulo" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" enctype="multipart/form-data">
					<input class="editar2" type="text" name="titulo" placeholder="titulo">
					<textarea class="editar3" name="dc" placeholder="descripcion corta"></textarea>
					<textarea class="editar3" name="dl" placeholder="descripcion"></textarea>
					<input name="imagen" type="file" />
					<p> 
						<input type="submit" value="guardar Nuevo Articulo">
					</p>
					<p>
						<a href="<?php echo RUTA . $volver ?>.php?p=<?php echo $pagina; ?>"><button type="button">volver</button></a>
					</p>
				</form>
			</article>
		</section>
<?php require 'footer.php';?>

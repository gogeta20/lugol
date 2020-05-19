<?php
require 'funciones.php';
require 'admin/config.php';
require 'vistas/headerNav.php';
if (isset($_GET['r'])) {
	$volver = $_GET['r'];
}else{
	$volver = "noticias";
}

if (isset($_GET['p'])) {
	$pagina = $_GET['p'];
}else{
	$pagina = 1;
}
$conexion = conectarBD($BD);
$articulo = verificarId($_GET['id'],$conexion);?>

<section class="sectionArticuloPrincipal">
	
<?php if (!$articulo) {
	require 'error.php';
}else{

//$id = $_GET['id'];
//$articulo = $conexion->query("select * from articulos where id = $id");
//
//$prepare = $conexion->prepare('SELECT * FROM articulos WHERE id = :id');
//$prepare->execute( array(':id' => $id) );
//$articulo = $prepare->fetch();

  // aqui una funcion que sirve para respetar los espacios nl2br()
  
?>


	<article class="articuloPrincipal">
		<h2><?php echo $articulo['titulo'];?></h2>
		<p class="fecha"><?php echo formatearFecha($articulo['fecha']);?></p>
			<div class="divDosImagen">
				<div>
						<img class="imagenArticuloPrincipal" src="<?php echo RUTA; ?>imagenes/noticias/noticiasPrincipal/<?php echo $articulo['imagen'];?>" alt="">
				</div>
			</div>
			<div>
				<p><?php echo $articulo['texto'];?></p>	
				<a href="<?php echo RUTA.$volver?>.php?p=<?php echo $pagina;?>"><button type="button">volver</button></a>
			</div>
	</article>


<?php
}
?>
</section>
<?php
require 'vistas/footer.php';
?>

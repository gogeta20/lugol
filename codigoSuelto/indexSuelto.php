<section>

<?php if(count($articulos) > 2):?>
	<?php require 'paginacion.php'; ?>
<?php endif;?>
  <?php foreach ($articulos as $item):?>
	
	<article>
		<a  href='<?php echo RUTA; ?>articuloPrincipal.php?id=<?php echo $item['id'];?>&r=<?php echo $ruta;?>&p=<?php echo paginaActual();?>'><h3><?php echo $item['titulo'];?></h3></a>
		<p class='fecha'>Lanzamiento: <?php echo formatearFecha($item['fecha']);?></p>
		<div class='IT'>
			<div class='divImagen'>
				<div>
					<a href='<?php echo RUTA; ?>articuloPrincipal.php?id=<?php echo $item['id'];?>&r=<?php echo $ruta;?>&p=<?php echo paginaActual();?>'>
						<img class='imagenRedimensionada' src='<?php echo RUTA; ?>imagenes/<?php echo $item['imagen'] ?>' alt=''>
					</a>
				</div>
			</div>
			<div>
				<p><?php echo $item['DC'];?></p>	
				<a href='<?php echo RUTA; ?>articuloPrincipal.php?id=<?php echo $item['id'];?>&r=<?php echo $ruta;?>&p=<?php echo paginaActual();?>'><button type='button'>mas detalles ..</button></a>
			</div>
		</div>
	</article>
  <?php endforeach;?>
  
	<?php require 'paginacion.php'; ?>
</section>


animation: uno 2s 1;


@keyframes uno{
	0%, 50%{
	}
}



<div class="pbanner">
	<img src="" name="banner" id="banner" alt="imagenes de futbol">
</div>


/* esto es parte de noticias es la parte del articulo */
/* esto es parte de noticias es la parte del articulo */
<?php foreach ($noticias as $arti):?>
		<div class="contenedorNoticias">
			<article>
				<a href="<?php echo RUTA; ?>articuloPrincipal.php?id=<?php echo $arti['id'] ?>&r=<?php echo $ruta;?>&p=<?php echo paginaActual();?>"><h3><?= $arti[1] ?></h3></a>
				<!--<p class='fecha'>Lanzamiento: <?= formatearFecha($arti['fecha']) ?></p>-->
				<div class='IT'>
					<!--<div class='divImagen'>
						<div>
							<a href="<?php echo RUTA; ?>articuloPrincipal.php?id=<?php echo $arti['id'] ?>&r=<?php echo $ruta;?>&p=<?php echo paginaActual();?>">
								<img class='imagenRedimensionada' src="<?php echo RUTA; ?>imagenes/<?php echo $arti['imagen'] ?>" alt=''>
							</a>
						</div>
					</div>-->
					<div>
						<p><?php echo $arti[2]; ?></p>	
						<a href="<?php echo RUTA; ?>articuloPrincipal.php?id=<?php echo $arti['id']; ?>&r=<?php echo $ruta;?>&p=<?php echo paginaActual();?>"><button type='button'>mas detalles ..</button></a>
					</div>
				</div>
			</article>
		</div>
	 </div>
  <?php endforeach;?>
/* esto es parte de noticias es la parte del articulo */












<article class="articleNoticias">
				<div class="z1">
					<img src="imagenes/noticias/noticiasMin/inicioMin.jpg" alt="imagen">
				</div>
				<div class="z2">
					<h2 class="articleNoticiasTitulo titulo"> titulo titulo titulo titulo titulo titulo titulo titulo titulo titulo titulo </h2>
					<div class="noticiasFecha azul">20/02/2020</div>
					<div class="">
						<div>
							descripcion cortadescripcioncortadescripcioncdescripcion cortadescripcioncortadescripcionc
							descripcion cortadescripcioncortadescripcioncdescripcion cortadescripcioncortadescripcionc
						</div>
						<a href="" class="azul">saber mas ...</a>
					</div>
				</div>
			</article>


			<div>
				<img class="imagenAside" src="imagenes/noticias/noticiasMin/inicioMin.jpg" alt="img">
				<p>
					Lorem ipsum dolor sit amet ç
					consectetur, adipisicing elit.
				</p>
			</div>


		============================


var objetoAjax = new XMLHttpRequest();
var datos = "no";
var rutaImagenes = "imagenes/noticias/noticiasMin/";
var padre2 = document.getElementById("asideNoticias");
var titulo = document.createElement("h3");

titulo.className = "titulo";
titulo.innerHTML = "Noticias Destacadas";
padre2.appendChild(titulo);

objetoAjax.open('POST','ajax/traerNoticias.php');
objetoAjax.setRequestHeader("Content-type","application/x-www-form-urlencoded");

objetoAjax.onload = function(){

   datos = JSON.parse(objetoAjax.responseText);
   
   datos.forEach(fila => {
      $fecha = fecha(fila['fecha']);
      var padre = document.getElementById("noticiasPadre");
      var $articulo = document.createElement('div');
      var $aside = document.createElement('div');
      $articulo.innerHTML+=
      `
      <article class="articleNoticias">
         <div class="z1">
            <img src="${rutaImagenes+fila['miniatura']}" alt="imagen">
         </div>
         <div class="z2">
            <a href="articuloPrincipal.php?id=${fila['id']}"><h2 class="articleNoticiasTitulo titulo">${fila['titulo']} </h2></a>
            <div class="noticiasFecha azul"> ${$fecha}</div>
            <div class="dc">
               <div>${fila['dc']}</div>
               <a href="articuloPrincipal.php?id=${fila['id']}"><button>saber mas</button></a>
            </div>
         </div>
      </article>
      `;
      $aside.innerHTML +=
      `
         <img class="imagenAside" src="imagenes/noticias/noticiasMin/${fila['miniatura']}" alt="img">
         <a href="articuloPrincipal.php?id=${fila['id']}">
            <p>${fila['dc']}</p>
         </a>
      `;
      padre.appendChild($articulo);
      padre2.appendChild($aside);
   });
}

objetoAjax.send();



function fecha($f) {
   y = $f.substring(0,4);
   m = $f.substring(5,7);
   d = $f.substring(8,10);
   return dia = d+"/"+m+"/"+y;

}
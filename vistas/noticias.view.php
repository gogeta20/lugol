<?php require 'headerNav.php'; ?>
<section >
	<h2 class="titulo">Noticias de la liga Lugogol 2020</h2>

	<div class="paginacion" id="paginacionS">
		<div id="izqS" value="is" name="btnPagNum"><<</div>
		<div id="paginaNumerosS" class="numPag"></div>
		<div id="derS" value="ds"  name="btnPagNum">>></div>
	</div>
	
	<div class="principalNoticias" id="sectionNoticias">
		<div class="contenedorNoticias" id="noticiasPadre"></div>
		<aside id="asideNoticias"></aside>
	</div>

	<div class="paginacion" id="paginacionP">
		<div id="izqP" value="ip" name="btnPagNum"><<</div>
		<div id="paginaNumerosP" class="numPag"></div>
		<div id="derP" value="dp"  name="btnPagNum">>></div>
	</div>
<button id="up" class="up"><i class="far fa-arrow-alt-circle-up"></i></button>

</section>
<script src="ajax/traerNoticias.js"></script>
<script src="ajax/traerNoticiasAside.js"></script>
<script src="js/index.view.js"></script>


<?php 
	$_COOKIE["p"] = "foo bar";
	require 'footer.php'; 
?>

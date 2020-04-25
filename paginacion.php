<?php


//$numPag = (ceil($art/$configPagina['post_por_pagina']) > 1) ? ceil($art/$configPagina['post_por_pagina']) : 1;
//$numPag = ceil($artTotal/$configPagina['post_por_pagina']);
$categoria = isset($categoriaID)? $categoriaID:1;
$n = isset($_GET['p'])? (int)$_GET['p']:1;
if ($n > $numPag ) {
  require 'error.php';
}else{
	if (isset($ruta)) {
		$r = $ruta;
	}
?>


<div class="paginacionMau">
	
	<ul>
		<?php if(paginaActual()==1):?>
			
			<li class="desabilitado">&laquo;</li>
		
		<?php else:?>
			
        
      <li><a href="<?php echo RUTA.$r;?>.php?p=<?php echo paginaActual() - 1;?>&c=<?php echo isset($categoria)?$categoria:1 ?>">&laquo;</a></li>
		
		<?php endif;?>
		
		
		
		<?php for ($i = 1; $i <= $numPag; $i++):?>
		<?php if(paginaActual() == $i):?>
			
			<li class="activo"><?= $i?></li>
			
		<?php else:?>	
			<li><a href="<?php echo RUTA.$r;?>.php?p=<?php echo $i;?>&c=<?php echo isset($categoria)?$categoria:1 ?>"><?= $i?></a></li>
		<?php endif;?>
		<?php endfor;?>
		
		<?php if(paginaActual()== $numPag):?>
			
			<li class="desabilitado">&raquo;</li>
		
		<?php else:?>
			
			<li><a href="<?php echo RUTA.$r;?>.php?p=<?php echo paginaActual() + 1;?>&c=<?php echo isset($categoria)?$categoria:1?>">&raquo;</a></li>
		
		<?php endif;?>
			
    
	</ul>
	<?php
}
	?>
</div>


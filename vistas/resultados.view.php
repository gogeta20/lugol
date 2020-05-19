<?php
require 'headerNav.php';
$linea = 0;
?>

<div class="pcalendario pc">
<h2 class="headin">Resultados y estadisticas Liga Lugogol 2020</h2>
  <h1 class="headin">Resultados Jornada 3</h1>
	<table>
		<tr class="col">
			<th>Local</th>
			<th> -- </th>
			<th> --</th>
			<th>Visitante</th>
		</tr>
		<?php for ($i=0; $i < count($resultados); $i++) { ?>
			<tr class="wpos">
				<td><?php echo $resultados[$i]['equipolocal'];?></td>
				<td><?= $resultados[$i]['gl'];?></td>
				<td><?= $resultados[$i]['gv'];?></td>
				<td><?= $resultados[$i]['equipoVisitante'];?></td>
			</tr>
		<?php } ?><!--- fin del for -->
		
	</table>
</div>

    <div class="ptable">
       
  <h1 class="headin">Clasificación</h1>
	<table>
		<tr class="col">
			<th>#</th>
			<th>equipo</th>
			<th>PJ</th>
			<th>G</th>
			<th>E</th>
			<th>P</th>
			<th>GD</th>
			<th>PTS</th>
		</tr>
		<?php for ($i=0; $i < count($resultadosClasificacion); $i++) { ?>
			<tr class="wpos">
				<td><?= $i +1;?></td>
				<td><?= $resultadosClasificacion[$i]['equipo']?></td>
				<td><?= $resultadosClasificacion[$i]['pj']?></td>
				<td><?= $resultadosClasificacion[$i]['ga']?></td>
				<td><?= $resultadosClasificacion[$i]['em']?></td>
				<td><?= $resultadosClasificacion[$i]['pe']?></td>
				<td><?= $resultadosClasificacion[$i]['dg']?></td>
				<td><?= $resultadosClasificacion[$i]['puntos']?></td>
			</tr>
		<?php } ?>
							
	</table>
</div>

<div class="pcalendario">
  <h1 class="headin">Calendario</h1>
	<table>
		<tr class="col">
			<th>Local</th>
			<th>Visitante</th>
			<th>hora</th>
			<th>dia</th>
		</tr>
		<?php for ($i=0 ; $i < count($resultadosCalendario); $i++) {?>
			
			<?php if ($linea != $resultadosCalendario[$i]['j']) {?>
				<tr class="lineaCalendario"><td colspan="4">fecha <?= $resultadosCalendario[$i]['j']?></td></tr>
			<?php } ?>

			<tr class="wpos">
				<td><?= $resultadosCalendario[$i]['equipoL']?></td>
				<td><?= $resultadosCalendario[$i]['equipoV']?></td>
				<td><?= $resultadosCalendario[$i]['hora']?></td>
				<td><?= $resultadosCalendario[$i]['fecha']?></td>
				
			</tr>
			
		<?php $linea = $resultadosCalendario[$i]['j']; };?>
		
	</table>
</div>
<div class="pgoleadores">
  <h1 class="headin">Goleadores</h1>
	<table>
		<tr class="col">
			<th>nº</th>
			<th>jugador</th>
			<th>goles</th>
			<th>equipo</th>
		</tr>
		<?php for ($i=0; $i < count($resultadosGoleadores); $i++) { ?>
			<tr class="wpos">
				<td><?= $i+1?></td>
				<td><?= $resultadosGoleadores[$i]['usuarios']?></td>
				<td><?= $resultadosGoleadores[$i]['goles']?></td>
				<td><?= $resultadosGoleadores[$i]['equipo']?></td>
			</tr>
		<?php } ?>
	</table>
</div>

<script src="ajax/resultados.js"></script>
<script src="js/banner.js"></script>
<script src="js/index.view.js"></script>
<?php require 'footer.php'; ?>

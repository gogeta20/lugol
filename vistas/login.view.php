<?php require 'headerNav.php'; ?>
<section class="fondoLogin">

	<div class="loginContenedor"><!--tarjeta-wrap-->
		<div class="cajaRotar" id="cajaRotar"><!--tarjeta-->
			<div class="caja1"><!--delante-->
			<label class="label label2">Login</label>
				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" name="entra" method="post">
					<label for="nombre" class="label">Nombre Usuario</label>
					<input type="text" name="nick" id="nombre">
					<label for="pass" class="label">Contraseña</label>
					<input type="password" name="pass" id="pass">

					<?php if (isset($mensaje)):?>
					<p class="datosIncorrectos"><?php echo $mensaje; ?></p>
					<?php endif;?>
					
					<input type="submit" class="loginBoton" name="entrar" value="Entrar">
				</form>
				<div class="registro" >
					<p>Crea una cuenta para poder accerder a todas las secciones</p>
					<button id="registro" class="loginBoton2">Registrarme</button>
				</div>
			</div>
			<div class="caja2"><!--atras-->
				<label class="label label2">Registro de nuevo usuario</label>
				<form action="#" method="post">
					<label for="RegNombre" class="label">Nombre</label>
					<input type="text" name="RegNick" id="RegNombre">

					<label for="RegPass" class="label">Contraseña</label>
					<input type="password" name="RegPass" id="RegPass">

					<label for="RegEmail" class="label">email</label>
					<input type="password" name="RegEmail" id="RegEmail">
					
					<input type="submit" id="registrarme"  class="loginBoton blackVerde" name="entrar" value="Registrarme">
				</form>
				<button id="volverLogin" class="loginBoton naranja">volver al login</button>
			</div>
		</div>	<!-- fin tarjeta --->		
	</div><!-- fin --->

</section>
<script>
	var $cajaRotar = document.getElementById("cajaRotar");
	var $registro = document.getElementById("registro");
	var $inputNombre = document.getElementById("RegNombre");
	

	$registro.addEventListener('click',function(){
		$cajaRotar.className = "cajaRotar Rotar";
		$inputNombre.focus();
	});
	
	$inputNombre.addEventListener('focus',function(){
		document.getElementById("cajaRotar").classList.remove="cajaRotar Rotar";
		document.getElementById("cajaRotar").className="quedateRotado";
	});
	
</script>
<?php require 'footer.php' ?>

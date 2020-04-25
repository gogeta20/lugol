<?php require 'headerNav.php'; ?>
<section class="fondoLogin">
	<div class="loginContenedor">
		<h2>Login</h2>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" name="entra" method="post">
			<label for="nombre">Nombre Usuario</label>
			<input type="text" name="nick" id="nombre">
			<label for="pass">Contraseña</label>
			<input type="password" name="pass" id="pass">
      <?php if (isset($mensaje)):?>
      <p class="datosIncorrectos"><?php echo $mensaje; ?></p>
      <?php endif;?>
			<input type="submit" name="entrar" value="entrar">
		</form>
	</div>

</section>
<?php require 'footer.php' ?>

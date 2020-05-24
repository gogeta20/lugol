<?php require 'headerNav.php';?>
<section>
    <div class="bienvenida">
        <h3>Bien, vamos a crear un equipo</h3>
        <p>requisitos:</p>
        <p>minimo 18 jugadores</p>
        <p>disponer de lugar de entrenamiento </p>
        <p>inscripcion pagada</p>
        <p>dos tipos de uniforme</p>
    </div>
    <div class="bienvenidaCarteles">
        <div class="cartel">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" enctype="multipart/form-data">
                <h3>formulario de inscripcion</h3>
                <div class="formularioSub">
                    <label class="subItem" for="CrearNombreEquipoNuevo">Nombre Equipo</label>
                    <input class="subItem" type="text" name="CrearNombreEquipoNuevo" id="CrearNombreEquipoNuevo">
                    <input type="hidden" name="idPresidente" value="<?php echo $idPresidente?>">
                </div>
                
                <div class="formularioSub">
                    <label class="subItem" for="CrearNombreEquipoNuevo">Sede</label>
                    <input class="subItem" type="text" name="CrearSedeEquipoNuevo" id="CrearNombreEquipoNuevo">
                </div>

                <div class="formularioSub">
                    <label class="subItem" for="CrearNombreEquipoNuevo">lema</label>
                    <input class="subItem" type="text" name="CrearLemaEquipoNuevo" id="CrearNombreEquipoNuevo">
                </div>

                <div class="formularioSub">
                    <label class="subItem" for="CrearNombreEquipoNuevo">Descripcion</label>
                    <input class="subItem" type="text" name="CrearDescripcionEquipoNuevo" id="CrearNombreEquipoNuevo">
                </div>

                <div class="formularioSub2">
                    <p class="escudoImagen">selecciona un escudo para el equipo</p>
                    <input name="imagen" type="file" />
                </div>

                <div class="formularioSub2">
                    <p class="escudoImagen">selecciona una imagen del equipo</p>
                    <input name="imagenEquipo" type="file" />
                </div>
                
                <input class="boton" type="submit" name="crearNuevoEquipo" id="enviarNuevoEquipo" value="crear nuevo equipo">
            </form>
            <div class="detallesSub">
                <p><?= var_dump($idPresidente)?></p>
                <p>bla bla bla bla bla blab bla bla bla bla bla blab bla bl</p>
                <p>bla bla bla bla bla blab bla bla bla bla bla blab bla bl</p>
                <p>bla bla bla bla bla blab bla bla bla bla bla blab bla bl</p>
            </div>
        </div>
        <div class="cartel">
            <h3>Normas:</h3>
            <p>bla bla bla bla bla blab bla bla bla bla bla blab bla bla bla bla bla blab</p>
            <p>bla bla bla bla bla blab bla bla bla bla bla blab bla bla bla bla bla blab</p>
            <p>bla bla bla bla bla blab bla bla bla bla bla blab bla bla bla bla bla blab</p>
            <p>bla bla bla bla bla blab bla bla bla bla bla blab bla bla bla bla bla blab</p>
            <p>bla bla bla bla bla blab bla bla bla bla bla blab bla bla bla bla bla blab</p>
            <p>bla bla bla bla bla blab bla bla bla bla bla blab bla bla bla bla bla blab</p>
            <p>bla bla bla bla bla blab bla bla bla bla bla blab bla bla bla bla bla blab</p>
            <p>bla bla bla bla bla blab bla bla bla bla bla blab bla bla bla bla bla blab</p>
            <p>bla bla bla bla bla blab bla bla bla bla bla blab bla bla bla bla bla blab</p>
            <p>bla bla bla bla bla blab bla bla bla bla bla blab bla bla bla bla bla blab</p>
            <p>bla bla bla bla bla blab bla bla bla bla bla blab bla bla bla bla bla blab</p>
            <p>bla bla bla bla bla blab bla bla bla bla bla blab bla bla bla bla bla blab</p>
            <p>bla bla bla bla bla blab bla bla bla bla bla blab bla bla bla bla bla blab</p>
            <p>bla bla bla bla bla blab bla bla bla bla bla blab bla bla bla bla bla blab</p>
            <p>bla bla bla bla bla blab bla bla bla bla bla blab bla bla bla bla bla blab</p>
        </div>
    </div>
</section>
<?php require 'footer.php';?>
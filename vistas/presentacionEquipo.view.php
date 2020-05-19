<?php require 'headerNav.php'?>
<div id="fondoPreEquipo">
    <section id="sectionPresentacionEquipo">

        <div class="cabezeraEquipo">
            <div class="escudoEquipo">
                <img src="imagenes/equipos/escudos/EscEllos.png">
            </div>
            <div class="datosEquipo">
                <h2>Ellos Fc</h2>
                <h3>lema del equipo bla bla bla</h3>
                <div class="titulosEquipo">
                    <div>
                        <p>Presindente : Manolo Garcia</p>
                        <p>Sede : Gandaras</p>
                        <p>Temporadas : 7</p>
                        <p>Campeon : 1</p>
                        <p>Subcampeones : 2</p>
                    </div>
                    
                    <div class="botoneraEquipo">
                        <button class="boton">enviar mensaje</button>
                        <button class="boton">me apunto</button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="cuerpoEquipo">
            <div class="integrantesEquipo">
                <h3>Integrantes</h3>
                <span>mauricio vargas</span>
                <span>mauricio vargas</span>
                <span>mauricio vargas</span>
                <span>mauricio vargas</span>
                <span>mauricio vargas</span>
                <span>mauricio vargas</span>
                <span>mauricio vargas</span>
                <span>mauricio vargas</span>
                <span>mauricio vargas</span>
                <span>mauricio vargas</span>
                <span>mauricio vargas</span>
                <span>mauricio vargas</span>
                <span>mauricio vargas</span>
                <span>mauricio vargas</span>
                <span>mauricio vargas</span>
                <span>mauricio vargas</span>
                <span>mauricio vargas</span>
                <span>mauricio vargas</span>
            </div>
            <div>
                <img class="imagenPresentacionEquipo" src="imagenes/equipos/Pepe.jpg" alt="">
            </div>
        </div>

        <div class="galeriaEquipo">
            <h2>Galeria de fotos</h2>
            <div class="carruselEquipo">
                <div class="flechas"> <i id="fi" class="fas fa-angle-left"></i> </div>
                
                <div>
                    <img id="imagen" src="">
                </div>
                
                <div class="flechas"> <i id="fd" class="fas fa-angle-right"></i> </div>

            </div>
        </div>
    </section>
    <input type="hidden" id="id" value="<?= $id?>">
</div>
<script src="ajax/presentacionEquipo.js"></script>
<?php require 'footer.php';?>

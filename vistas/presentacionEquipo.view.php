<?php require 'headerNav.php'?>
<div id="fondoPreEquipo">
    <section id="sectionPresentacionEquipo">

        <div class="cabezeraEquipo">
            <div class="escudoEquipo">
                <img src="imagenes/equipos/escudos/<?= $resultados[0]['escudo']?>">
            </div>
            <div class="datosEquipo">
                <h2><?= $resultados[0]['nombre']?></h2>
                <h3><?= $resultados[0]['lema']?></h3>
                <div class="titulosEquipo">
                    <div>
                        <p>Presindente : <?= $resultados[0]['presidente']?></p>
                        <p>Sede : <?= $resultados[0]['sede']?></p>
                        <p>Campeon : <?= $resultados[0]['titulos']?></p>
                    </div>
                    
                    <div class="botoneraEquipo">

                        <button id="presentacionMeApunto" class="menu">me apunto</button>
                        
                        <input type="checkbox" class="check" id="checkEfecto">
                        <label class="menu" for="checkEfecto">enviar mensaje</label>
                        
                        <div class="enviarMensajeEquipo">
                            <textarea name="" id="areaMensaje" cols="50" rows="7" placeholder="escribe el mensaje"></textarea>
                            <div class="mensajeBotones">
                                <button class="menu" id="mensajeConfirmado">enviar</button>
                                <button class="menu no" id="mensajeAnulado">cancelar</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        
        <div class="cuerpoEquipo">
            <div class="integrantesEquipo">
                <h3>Integrantes</h3>
                <?php for ($i=0; $i < count($resultados2); $i++) { ?>
                    <span><?= $resultados2[$i]['nick']?></span>
                <?php } ?>
            </div>
            <div>
                <img class="imagenPresentacionEquipo" src="imagenes/equipos/<?= $resultados[0]['imagen']?>" alt="">
            </div>
        </div>
        <div class="textoPresentacionEquipo">
            <h3>hola somos el <?= $resultados[0]['nombre']?></h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae totam explicabo incidunt aspernatur laudantium in sunt iure amet reprehenderit, culpa cumque molestias laboriosam expedita ullam, omnis hic, fuga quibusdam aperiam!</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae totam explicabo incidunt aspernatur laudantium in sunt iure amet reprehenderit, culpa cumque molestias laboriosam expedita ullam, omnis hic, fuga quibusdam aperiam!</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae totam explicabo incidunt aspernatur laudantium in sunt iure amet reprehenderit, culpa cumque molestias laboriosam expedita ullam, omnis hic, fuga quibusdam aperiam!</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae totam explicabo incidunt aspernatur laudantium in sunt iure amet reprehenderit, culpa cumque molestias laboriosam expedita ullam, omnis hic, fuga quibusdam aperiam!</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae totam explicabo incidunt aspernatur laudantium in sunt iure amet reprehenderit, culpa cumque molestias laboriosam expedita ullam, omnis hic, fuga quibusdam aperiam!</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae totam explicabo incidunt aspernatur laudantium in sunt iure amet reprehenderit, culpa cumque molestias laboriosam expedita ullam, omnis hic, fuga quibusdam aperiam!</p>

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
    <input type="hidden" id="idUser" value="<?= $idUser?>">
</div>
<script src="ajax/ajaxPresentacionEquipo.js"></script>
<?php require 'footer.php';?>

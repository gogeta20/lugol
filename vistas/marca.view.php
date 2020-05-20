<?php require 'headerNav.php';?>

<section id="sectionParticipa">

  <div id="contenedorBanner">
    <div id="fondoBanner">
      <div>
        <img src="imagenes/participa/bannerParticipa3.png" alt="escudoClub">
      </div>
      <div id="textoBanner">
        <h2>Te queremos fichar!!</h2>
        <p>la liga siempre esta buscando nuevos jugadores y nuevos equipos</p>
        <p>apuntate!</p>
      </div>
    </div>
  </div>

  <div id="cuerpoParticipa">

    <!--- paginacion  -->
      <div id="participaPaginacion">
        <div id="participaIzq" class="boton"><<</div>
        <div id="participaNumPag"></div>
        <div id="participaDer" class="boton">>></div>
      </div>
    <!--- paginacion  -->
    <div id="muroEquiposParticipa">

    </div>
  </div>
  <button id="up" class="up"><i class="far fa-arrow-alt-circle-up"></i></button>
</section>
<input type="hidden" id="idUser" value="<?= $idUser?>">
<script src="ajax/participa.js"></script>  

<?php 
require 'footer.php';?>

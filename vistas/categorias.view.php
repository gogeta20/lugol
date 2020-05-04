<?php require 'headerNav.php'?>

<section id="sectionEquipos">
    <div id="divListaEquipos">
      <div id="listaEquipos">
        <h3>Equipos de la liga</h3>
        <ul>
          <li><i class="fas fa-futbol"></i>real madrid</li>
          <li><i class="fas fa-futbol"></i>real madrid</li>
          <li><i class="fas fa-futbol"></i>real madrid</li>
          <li><i class="fas fa-futbol"></i>real madrid</li>
          <li><i class="fas fa-futbol"></i>real madrid</li>
          <li><i class="fas fa-futbol"></i>real madrid</li>
          <li><i class="fas fa-futbol"></i>real madrid</li>
          <li><i class="fas fa-futbol"></i>real madrid</li>
          <li><i class="fas fa-futbol"></i>real madrid</li>
          <li><i class="fas fa-futbol"></i>real madrid</li>
          <li><i class="fas fa-futbol"></i>real madrid</li>
          <li><i class="fas fa-futbol"></i>real madrid</li>
          <li><i class="fas fa-futbol"></i>real madrid</li>
          <li><i class="fas fa-futbol"></i>real madrid</li>
        </ul>
      </div>
    </div><!-- fin de ListaEquipos-->

  <div id="presentacionEquipos">
    
      <div id="bannerEquipos">
        <h2>Encuentra equipo</h2>
        <a href="marca.php"><p>la liga te espera ..</p></a>
      </div>

      <div class="paginacion" id="paginacionS">
        <div id="izqS" value="is" name="btnPagNum"><<</div>
        <div id="paginaNumerosS" class="numPag"></div>
        <div id="derS" value="ds"  name="btnPagNum">>></div>
      </div>

      <div id="equipo">
        <h2>nombre Equipo</h2>
        <div class="divEquipo">
          <div class="imagenEquipo">
            <img src="imagenes/equipos/equipo1.jpeg" alt="">
          </div>
          <div class="divLema">
            <p>
              lema del equipo blavlaloijoijgoifjdfisofijsoifjoslema del
              equipo blavlaloijoijgoifjdfisofijsoifjoslema del equipo
              blavlaloijoijgoifjdfisofijsoifjoslema del equipo blavlal
              oijoijgoifjdfisofijsoifjoslema del equipo blavlaloijoijgo
              ifjdfisofijsoifjoslema del equipo blavlaloijoijgoifjdfiso
            
            </p>
            <button>Conoce mas del equipo</button>
            <button>Unirme al equipo!!</button>
          </div>
        </div>
      </div>
    
      <div class="paginacion" id="paginacionP">
        <div id="izqP" value="ip" name="btnPagNum"><<</div>
        <div id="paginaNumerosP" class="numPag"></div>
        <div id="derP" value="dp"  name="btnPagNum">>></div>
      </div>

      <button id="up" class="up"><i class="far fa-arrow-alt-circle-up"></i></button>
  </div><!-- fin de presentacionEquipos-->

</section>  
<script src="ajax/equipos.js"></script>
<?php require 'footer.php'?>

var objetoAjax = new XMLHttpRequest();
var $datos;
// == paginacion
var $totalAnuncios;
var $numeroPaginas;
var $paginaActual = 1;
var $paginaAnterior = 1;
var $paginacionIzquierda  =document.getElementById("participaIzq");
var $paginacionDerecha    =document.getElementById("participaDer");
var $paginacionNumeros    =document.getElementById("participaNumPag");

var $a = $paginaActual*12-12;
var $z = $a + 12;

// == paginacion
var $padreSolitudEquipo = document.getElementById("muroEquiposParticipa");
objetoAjax.open('POST','ajax/participa.php');
objetoAjax.setRequestHeader("Content-type","application/x-www-form-urlencoded");

objetoAjax.onload = function(){

    $datos = JSON.parse(objetoAjax.responseText)
    // == paginacion
    $totalAnuncios = $datos.length;
    $numeroPaginas = Math.ceil($totalAnuncios/12);// redondeo hacia arriba
    // == paginacion **
    paginacion();
    traer($a,$z);

    document.getElementById("n"+$paginaActual).style.backgroundColor="#94F2A2";//verde
}
objetoAjax.send();

/// ============================================================== eventos *********
/// ============================================================== eventos *********

$paginacionIzquierda.addEventListener('click',function(e) {
  moverPaginasIzq();// flecha izquierda
});
$paginacionDerecha.addEventListener('click',function(e) {
  moverPaginasDer();// flecha derecha
});
$paginacionNumeros.addEventListener('click',function(e) {
  $paginaAnterior = $paginaActual;
  console.log($paginaAnterior);
  cambiarNumeroPagina(e.target.value);//numero de pagina
});



/// ============================================================== funciones *********
/// ============================================================== funciones *********

function moverPaginasIzq(){
  if ($paginaActual > 1) {
    $paginaAnterior = $paginaActual;// guardo la pagina anterior para cambiar el focus
    $paginaActual = $paginaActual-1;
    focus();
    $a = $paginaActual * 12 - 12 ;
    $z = $a + 12;
    traer($a,$z);
  }
  
}//}}}}}}}}}}}}}}}}}}

function moverPaginasDer(){
  if ($paginaActual < $numeroPaginas) {
    $paginaAnterior = $paginaActual;// guardo la pagina anterior para cambiar el focus
    $paginaActual = $paginaActual+1;
    focus();
    $a = $paginaActual * 12 - 12 ;
    $z = $a + 12;
    traer($a,$z);
  }
  
}//}}}}}}}}}}}}}}}}}}


function cambiarNumeroPagina($v){
  if ($v != undefined) {
    $paginaActual = $v;
    focus();
    $a = $paginaActual * 12 - 12; 
    $z = $a + 12; 
    
    traer($a,$z);
  }

}//}}}}}}}}}}}}}}}


function paginacion() {
  for (let j = 1; j <= $numeroPaginas; j++) {
    var $pagina = document.createElement("div");
    $pagina.className = "boton";
    $pagina.innerHTML = j;
    $pagina.value = j;
    $pagina.id = "n"+j;
    $paginacionNumeros.appendChild($pagina);
  }
}//}}}}}}}}}}}}}}

function traer($inicio,$fin) {

  $padreSolitudEquipo.innerHTML = "";// aqui limpio el div padre para actualizar los anuncios

  for (let i = $inicio; i < $fin; i++) {
    var $div = document.createElement('div');
    $div.className = "solicitudEquipo";
    $div.innerHTML += 
    `
    <div>
      <h3>${$datos[i]['name']}</h3>
      <div>
        <img src="imagenes/equipos/escudos/${$datos[i]['escudo']}" alt="escudoClub">
      </div>
    </div>
    <div class="solicitudDescripcion">
      <p>${$datos[i]['texto']}</p>
      <div class="botonApuntarseEquipos">
        <button>apuntarse</button>
      </div>
    </div>
    `;
    $padreSolitudEquipo.appendChild($div);
  }
}//}}}}}}}}}}}}}}

function focus(){

  document.getElementById("n"+$paginaAnterior).style.backgroundColor="#84c2e6";//azul
  document.getElementById("n"+$paginaActual).style.backgroundColor="#94F2A2";//verde

}
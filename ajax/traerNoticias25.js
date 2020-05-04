/* esto es un backup */ 
var objetoAjax = new XMLHttpRequest();
var datos;
var datosArray = {};

var rutaImagenes = "imagenes/noticias/noticiasMin/";
var rutaImagenesPrincipal = "imagenes/noticias/noticiasPrincipal/";

var totalNoticias;
var $numeroPaginas;

var $pagS = document.getElementById("paginaNumerosS");
var $pagP = document.getElementById("paginaNumerosP");
var $izqS = document.getElementById("izqS");
var $izqP = document.getElementById("izqP");
var $derS = document.getElementById("derS");
var $derP = document.getElementById("derP");
var $ok = true;

var $padre = document.getElementById("noticiasPadre");
var $paginaAnterior;
var $paginaActual = 1;
var $f5 = true;
var $colorActualizarS = null;
var $colorActualizarP = null;
var $ir;
var $movimiento = 0;
var $aa = 1;
var $zz = $aa + 3;
var $limiteDerecho;
var $limiteIzquierdo;
var $foco = 1;
var $idColorAzul = null;
var $up = document.getElementById("up");
var $section = document.getElementById("sectionNoticias");
var $idNumerosPaginaS = new Array();
var $idNumerosPaginaP = new Array();

var $ejeYLeerMas;
var $ejeXLeerMas;

objetoAjax.open('POST','ajax/traerNoticias.php');
objetoAjax.setRequestHeader("Content-type","application/x-www-form-urlencoded");

objetoAjax.onload = function()  {
   datos = JSON.parse(objetoAjax.responseText);
   totalNoticias = datos.length;
   $numeroPaginas =Math.ceil(totalNoticias/6);
   
   paginacion();
   if ($f5) {
      if (!comprobarCookie("pag")) {
         document.cookie = `pag = 1`;
      }
      if (getCookie("pag")) {
         $pagi = getCookie("pag");
         $pagi = $pagi.substring(4,7);
         $paginaActual = Number.parseInt($pagi);

         //colorNumeroActual($paginaActual);
         
         $finish = $paginaActual*6;
         $ini = $finish-6;

         traer($ini,$finish);

         $f5 = false;
      }
   }else{
      traer(0,6);
   }
   
}

function traer($inicio, $fin){
   
   for (let i = $inicio; i < $fin; i++) {
      $fecha = fecha(datos[i]['fecha']);
      datosArray[i] = datos[i];
      var $articulo = document.createElement('div');
      $articulo.innerHTML+=
      `
      <article class="articleNoticias" id="notID${datos[i]['id']}">
         <div class="z1">
            <img src="${rutaImagenes+datos[i]['miniatura']}" alt="imagen">
         </div>
         <div class="z2">
            <a href="articuloPrincipal.php?id=${datos[i]['id']}"><h2 class="articleNoticiasTitulo titulo">${datos[i]['titulo']} </h2></a>
            <div class="noticiasFecha">${$fecha}</div>
            <div class="dc">

               <div id="desc${datos[i]['id']}"  class="visible">${datos[i]['dc']}</div>
               <div class="botonSaberMas" id="${i}">
                  <button id="b${datos[i]['id']}" value="${datos[i]['id']}">ampliar</button>
               </div>
            
            </div>
         </div>
      </article>
      `;
      $padre.appendChild($articulo);
   }//fin for
}// fin function traer()   <a href="articuloPrincipal.php?id=${datos[i]['id']}"><button value="art${datos[i]['id']}">saber mas</button></a>


objetoAjax.send();


$pagS.addEventListener('click',function (e) {

   cambiarPagina(e);
});

$pagP.addEventListener('click',function (e) {
   cambiarPagina(e);
});

$izqS.addEventListener('click',function(e){

   moverPaginas(e.target.id);
   
});

$izqP.addEventListener('click',function(e){

   moverPaginas(e.target.id);

});

$derS.addEventListener('click',function(e){

   moverPaginas(e.target.id);
   
});

$derP.addEventListener('click',function(e){
   moverPaginas(e.target.id);

});


// ===================================================== Funciones secundarias =================================
// ===================================================== Funciones secundarias =================================
// ===================================================== Funciones secundarias =================================
function moverPaginas($idDireccion) {

   
   var $mover;
   if ($idDireccion == "izqS" || $idDireccion == "izqP") {

      $v = $paginaActual-1;// aqui capturo valor de boton en paginacion
      $v = ($v < 1)? 1: $v;
      document.cookie = `pag = ${$v}`;
      if ($aa > 1) {
         --$aa
         --$zz
      }
      $mover = ($paginaActual != 1)? $paginaActual-1: $paginaActual;
      $foco = $mover;
   }else{
      
      $v = $paginaActual+1;// aqui capturo valor de boton en paginacion
      $v = $v > $numeroPaginas? $numeroPaginas:$v;
      document.cookie = `pag = ${$v}`;
      if($zz < $numeroPaginas){
         ++$aa;
         ++$zz;
      }

      $mover = ($paginaActual != $numeroPaginas)? $paginaActual+1: $paginaActual;
      $foco = $mover;
   }
   if ($limiteDerecho != $numeroPaginas) {
      if ($idDireccion == "derS" && $limiteDerecho == $paginaActual) {
         
         actualizarPaginacion();
         paginacion($foco);
      }
      if ($idDireccion == "derP" && $limiteDerecho == $paginaActual) {
         actualizarPaginacion();
         paginacion($foco);
      }
   }
   if ($limiteIzquierdo != 1) {
      
      if ($idDireccion == "izqS" && $limiteIzquierdo == $paginaActual) {
         actualizarPaginacion();
         paginacion($foco);
      }
      if ($idDireccion == "izqP" && $limiteIzquierdo == $paginaActual) {
         actualizarPaginacion();
         paginacion($foco);
      }
   }
   
   $paginaAnterior = $paginaActual;
   $paginaActual = $mover;
   $ir = $paginaActual;
   $padre.innerHTML = "";


   $inicio = ($paginaActual==1)? 0: $paginaActual*6-6;
   $fin = $inicio+6;

   if ($idColorAzul != null) {

      document.getElementById($idColorAzul).style.backgroundColor="#84c2e6";//azul
   
   }

   traer($inicio,$fin);
}


function cambiarPagina(e){
   
   if (e.target.value != undefined) {
      
      $v = e.target.value;// aqui capturo valor de boton en paginacion

      if ($idColorAzul != e.target.id && $idColorAzul != null) {

         document.getElementById($idColorAzul).style.backgroundColor="#84c2e6";//azul
      
      }
      document.getElementById(e.target.id).style.backgroundColor="#94F2A2";//verde
      $idColorAzul = e.target.id;

      document.cookie = `pag = ${$v}`;
      if ($colorActualizarS != null) {
         $colorActualizarS = null;
      }
      
      $padre.innerHTML = "";
         
      $paginaActual = e.target.value;//la pagina actual esto lo uso en la otras funciones
      $ir = e.target.value;// la pagina actual la uso en esta funcion
      
      $inicio = ($ir==1)? 0: $ir*6-6;
      $fin = $inicio+6;
      $paginaAnterior = $ir;// aqui damos el valor de pagina anterior == importante!!
   
      $ok = true;// esto es para los articulos, si cambia de pagina sin cerrar las noticias
      traer($inicio,$fin);
   }
   
}
function actualizarPaginacion(){
   $idColorAzul = null;
   $pagS.innerHTML = "";
   $pagP.innerHTML = "";
   $idNumerosPaginaS.slice(0,5);
   $idNumerosPaginaP.slice(0,5);
}
function paginacion() {
   $limiteDerecho = $zz;
   $limiteIzquierdo = $aa;

   for (let i = $aa; i <= $zz; i++) {

      var $pagSu = document.createElement('div');
      var $pagPo = document.createElement('div');
      $pagSu.innerHTML=i;
      $pagPo.innerHTML=i;
      $pagSu.id = "ps"+i;
      $pagPo.id = "pp"+i;
      $pagSu.value = i;
      $pagPo.value = i;
      $idNumerosPaginaS[i]=$pagSu.id;
      $idNumerosPaginaP[i]=$pagPo.id;
      $pagS.appendChild($pagSu);
      $pagP.appendChild($pagPo);
      
   }
   console.log($idNumerosPaginaS);
   console.log($idNumerosPaginaP);

}

function fecha($f) {
   y = $f.substring(0,4);
   m = $f.substring(5,7);
   d = $f.substring(8,10);
   return dia = d+"/"+m+"/"+y;

}

function colorNumeroActual($pagAct){

   var s = document.getElementById("paginaNumerosS").children;
   var p = document.getElementById("paginaNumerosP").children;
   s[0].style.backgroundColor="#84c2e6";//azul
   p[0].style.backgroundColor="#84c2e6";//azul
   for (let i = 0; i < s.length; i++) {
      
      if (i == $pagAct-1) {
         $colorActualizarS = s[i].id;
         $colorActualizarP = p[i].id;
         s[i].style.backgroundColor="#94F2A2";//azul
         p[i].style.backgroundColor="#94F2A2";//azul
      }
   }
}

$up.addEventListener('click',function (e) {
   window.scrollTo(0, 0);
});

$section.addEventListener('click',function(e){
   if (e.target.value != undefined) {
      
      $articulo = e.target.parentNode.parentNode.parentNode.parentNode;
      $posicion = e.target.parentNode.id;

      if (e.target.id == "cerrar"+e.target.value && $ok == false) {
         
         $articulo.innerHTML = "";
         $articulo.innerHTML = 
         `
         <div class="z1">
            <img src="${rutaImagenes+datos[$posicion]['miniatura']}" alt="imagen">
         </div>
         <div class="z2">
            <a href="articuloPrincipal.php?id=${datos[$posicion]['id']}"><h2 class="articleNoticiasTitulo titulo">${datos[$posicion]['titulo']} </h2></a>
            <div class="noticiasFecha"> ${$fecha}</div>
            <div class="dc">

               <div id="desc${datos[$posicion]['id']}"  class="visible">${datos[$posicion]['dc']}</div>
               <div class="botonSaberMas" id="${$posicion}">

                  <button id="b${datos[$posicion]['id']}" value="${datos[$posicion]['id']}">ampliar</button>

               </div>
            
            </div>
         </div>
         `;
         $articulo.className = "articleNoticias";
         $ok = true;
      }else{
         if ($ok) {
           
            $articulo.innerHTML = "";
            $articulo.innerHTML = 
            `
            
            <div class="z3">
               <a href="articuloPrincipal.php?id=${datos[$posicion]['id']}"><h2 class="articleNoticiasTitulo titulo">${datos[$posicion]['titulo']} </h2></a>
               <div class="noticiasFecha"> ${$fecha}</div>
               <div class="dc">

                  <div id="texto${datos[$posicion]['id']}">${datos[$posicion]['texto']}</div>
                  <div class="botonSaberMas" id="${$posicion}">
                     <button id="cerrar${datos[$posicion]['id']}" class="botonCerrarMostrar" value="${datos[$posicion]['id']}">cerrar</button>
                  </div>
               </div>
            </div>
            <div class="z4">
               <img src="${rutaImagenesPrincipal+datos[$posicion]['imagen']}" alt="imagen">
            </div>
            `;

            $articulo.className = "saberMasAnimacion";
            $ok = false;
         }
      }
   }
});

function getCookie (key) {
   var patron = new RegExp ( "(?:"+key+")=(.+?)(?=;|$)","g");
   return patron.exec (document.cookie) [0];
}

function crearCookie(clave, valor, diasexpiracion) {
   var d = new Date();
   d.setTime(d.getTime() + (diasexpiracion*24*60*60*1000));
   var expires = "expires="+d.toUTCString();
   document.cookie = clave + "=" + valor + "; " + expires;
}

function obtenerCookie(clave) {
   var name = clave + "=";
   var ca = document.cookie.split(';');
   for(var i=0; i<ca.length; i++) {
       var c = ca[i];
       while (c.charAt(0)==' ') c = c.substring(1);
       if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
   }
   return "";
}

function comprobarCookie(clave) {
   var clave = obtenerCookie(clave);
   if (clave!="") {
       return true;
   }else{
      return false;
   }
}
 /*
   console.log($mostrar.clientHeight);
   console.log($mostrar.offsetTop);
   console.log($mostrar.offsetParent);
   console.log($mostrar);
   console.log(e.target);
   console.log(e);
   console.log(e.x);
   console.log(e.y);
   console.log(e.pageX);
   console.log(e.pageY);
*/
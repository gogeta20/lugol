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
var $f5 = false;
var $colorActualizarS = null;
var $colorActualizarP = null;
var $ir;
var $movimento = 0;
var $limiteIzquierdo = 0;
var $limiteDerecho = 0;
var $up = document.getElementById("up");
var $section = document.getElementById("sectionNoticias");
// aqui es donde empiezo la edicion para la paginacion 

   var $_a = 1;
   var $_z = $_a +3;
   var $idNumerosnumerosnumerosS = new Array();
   var $idNumerosnumerosnumerosP = new Array();
   var $idNumeroAzul = "";
   var $idNumeroAzulPost = "";
   var $cambiarAzul = false;
   var $one = true;

// ===================================================
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
            <h2 class="articleNoticiasTitulo titulo">${datos[i]['titulo']}</h2>
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
      if ($_a > 1) {
         --$_a;
         --$_z;
      }
      $mover = ($paginaActual != 1)? $paginaActual-1: $paginaActual;
      
   }else{
      if ($one) {
         document.getElementById("ps1").style.backgroundColor ="#84c2e6";
         document.getElementById("pp1").style.backgroundColor ="#84c2e6";
         $one = false;
      }
      $v = $paginaActual+1;// aqui capturo valor de boton en paginacion
      $v = $v > $numeroPaginas? $numeroPaginas:$v;
      document.cookie = `pag = ${$v}`;
      $movimento++;
      if ($_z < $numeroPaginas) {
         ++$_a;
         ++$_z;
      }
      $mover = ($paginaActual != $numeroPaginas)? $paginaActual+1: $paginaActual;
   }

   
   
   if ($limiteDerecho != $numeroPaginas) {
      if ($idDireccion == "derS" && $limiteDerecho == $paginaActual) {
         actualizarPaginacion();
         paginacion();
      }
      if ($idDireccion == "derP" && $limiteDerecho == $paginaActual) {
         actualizarPaginacion();
         paginacion();
      }
   }
   if ($limiteIzquierdo != 1) {
      if ($idDireccion == "izqS" && $limiteIzquierdo == $paginaActual) {
         actualizarPaginacion();
         paginacion();
      }
      if ($idDireccion == "izqP" && $limiteIzquierdo == $paginaActual) {
         actualizarPaginacion();
         paginacion();
      }
   }
   
   if($idDireccion == "izqS" && $paginaActual == 1 || $idDireccion == "izqP" && $paginaActual == 1){
      //document.getElementById("ps"+$ir).style.backgroundColor="#94F2A2";
      //document.getElementById("pp"+$ir).style.backgroundColor="#94F2A2";            
   }else if($idDireccion == "derS" && $paginaActual == $numeroPaginas || $idDireccion == "derP" && $paginaActual == $numeroPaginas){
      //document.getElementById("ps"+$ir).style.backgroundColor="#94F2A2";
      //document.getElementById("pp"+$ir).style.backgroundColor="#94F2A2";    
      //document.getElementById("pp"+$ir).style.backgroundColor="#94F2A2";    
   }else{
      
      $paginaAnterior = $paginaActual;
      $paginaActual = $mover;
      $ir = $paginaActual;
      $padre.innerHTML = "";
      //document.getElementById("ps"+$ir).style.backgroundColor="#94F2A2";
      //document.getElementById("pp"+$ir).style.backgroundColor="#94F2A2";
      
      $inicio = ($paginaActual==1)? 0: $paginaActual*6-6;
      $fin = $inicio+6;
      
      //document.getElementById("ps"+$paginaAnterior).style.backgroundColor="#84c2e6";
      //document.getElementById("pp"+$paginaAnterior).style.backgroundColor="#84c2e6";


      // preparando la solucion ++++++++++++++++++++++++++++++++++++++
      
      console.log($mover +" mover");
      console.log($paginaAnterior +" paginaActual");

      if ($cambiarAzul) {
         document.getElementById($idNumeroAzul).style.backgroundColor="#84c2e6";//azul
         document.getElementById($idNumeroAzulPost).style.backgroundColor="#84c2e6";//azul
      }


      if ($idNumeroAzul != $idNumerosnumerosnumerosS[$mover]) {
         document.getElementById($idNumerosnumerosnumerosS[$mover]).style.backgroundColor="#94F2A2";//verde
         document.getElementById($idNumerosnumerosnumerosP[$mover]).style.backgroundColor="#94F2A2";//verde
         $cambiarAzul = true;
      }

      $idNumeroAzul = $idNumerosnumerosnumerosS[$mover];
      $idNumeroAzulPost = $idNumerosnumerosnumerosP[$mover];
   
      // preparando la solucion ++++++++++++++++++++++++++++++++++++++
      traer($inicio,$fin);
   }
}




function cambiarPagina(e){

   if (e.target.value != undefined) {
      if ($one) {
         document.getElementById("ps1").style.backgroundColor ="#84c2e6";
         document.getElementById("pp1").style.backgroundColor ="#84c2e6";
         $one = false;
      }
      var $n1 = e.target.id;
      $n = Number.parseInt($n1.substring(2));

      $v = e.target.value;// aqui capturo valor de boton en paginacion 1 2 3 
      document.cookie = `pag = ${$v}`;

      // esto es el codigo de cambio de color de numeros ++++++++++++++++++++++++++//////////////////77
      if ($cambiarAzul) {
         document.getElementById($idNumeroAzul).style.backgroundColor="#84c2e6";//azul
         document.getElementById($idNumeroAzulPost).style.backgroundColor="#84c2e6";//azul
      }  
      if ($idNumeroAzul != $idNumerosnumerosnumerosS[$n]) {
         document.getElementById($idNumerosnumerosnumerosS[$n]).style.backgroundColor="#94F2A2";//verde
         document.getElementById($idNumerosnumerosnumerosP[$n]).style.backgroundColor="#94F2A2";//verde
         $cambiarAzul = true;
      }
      // esto es el codigo de cambio de color de numeros ++++++++++++++++++++++++++////////////////////
      
      $idNumeroAzul = $idNumerosnumerosnumerosS[$n];
      $idNumeroAzulPost = $idNumerosnumerosnumerosP[$n];
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
   $pagS.innerHTML = "";
   $pagP.innerHTML = "";
}
function paginacion() {
   
   for (let i = $_a; i <= $_z; i++) {

      $limiteIzquierdo = $_a;
      $limiteDerecho = $_z;

      var $pagSu = document.createElement('div');
      var $pagPo = document.createElement('div');
      $pagSu.innerHTML=i;
      $pagPo.innerHTML=i;
      $pagSu.id = "ps"+i;
      $pagPo.id = "pp"+i;
      $idNumerosnumerosnumerosS[i]=$pagSu.id;
      $idNumerosnumerosnumerosP[i]=$pagPo.id;
      if ($paginaActual == 1 && i == 1) {
         $pagSu.style.backgroundColor="#94F2A2";//verde
         $pagPo.style.backgroundColor="#94F2A2";//verde
      }
      $pagSu.value = i;
      $pagPo.value = i;
      
      $pagS.appendChild($pagSu);
      $pagP.appendChild($pagPo);
   }
   
   //console.log($idNumerosnumerosnumerosS);// arrays completados
   //console.log($idNumerosnumerosnumerosP);

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
            <h2 class="articleNoticiasTitulo titulo">${datos[$posicion]['titulo']} </h2>
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
               <h2 class="articleNoticiasTitulo titulo">${datos[$posicion]['titulo']} </h2>
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
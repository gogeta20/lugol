/*
var objetoAjax = new XMLHttpRequest();
var datos;
var rutaImagenes = "imagenes/noticias/noticiasMin/";

objetoAjax.open('POST','ajax/traerNoticias.php');
objetoAjax.setRequestHeader("Content-type","application/x-www-form-urlencoded");

objetoAjax.onload = function(){

   datos = JSON.parse(objetoAjax.responseText);
   
   datos.forEach(fila => {
      $fecha = fecha(fila['fecha']);
      var padre = document.getElementById("noticiasPadre");
      var $articulo = document.createElement('div');
      $articulo.innerHTML+=
      `
      <article class="articleNoticias">
         <div class="z1">
            <img src="${rutaImagenes+fila['miniatura']}" alt="imagen">
         </div>
         <div class="z2">
            <a href="articuloPrincipal.php?id=${fila['id']}"><h2 class="articleNoticiasTitulo titulo">${fila['titulo']} </h2></a>
            <div class="noticiasFecha azul"> ${$fecha}</div>
            <div class="dc">
               <div>${fila['dc']}</div>
               <a href="articuloPrincipal.php?id=${fila['id']}"><button>saber mas</button></a>
            </div>
         </div>
      </article>
      `;
      padre.appendChild($articulo);
   });
}

objetoAjax.send();



function fecha($f) {
   y = $f.substring(0,4);
   m = $f.substring(5,7);
   d = $f.substring(8,10);
   return dia = d+"/"+m+"/"+y;

}


/*
   if(e.target.id == "izqS" && $paginaActual == 1){
      document.getElementById("ps"+$ir).style.backgroundColor="#94F2A2";
      document.getElementById("pp"+$ir).style.backgroundColor="#94F2A2";
   }else{
      $paginaAnterior = $paginaActual;
      --$paginaActual;
      $ir = $paginaActual;
      $padre.innerHTML = "";

      document.getElementById("ps"+$ir).style.backgroundColor="#94F2A2";
      document.getElementById("pp"+$ir).style.backgroundColor="#94F2A2";

      $inicio = ($paginaActual==1)? 0: $paginaActual*6-6;
      $fin = $inicio+6;
      
      document.getElementById("ps"+$paginaAnterior).style.backgroundColor="#84c2e6";
      document.getElementById("pp"+$paginaAnterior).style.backgroundColor="#84c2e6";

      traer($inicio,$fin);
   }
   */


   /*


      /*
         $ejeXCerrar = e.clientX;
         $ejeYCerrar = e.clientY;
         $res = $ejeYCerrar - $ejeYLeerMas ;
         console.log($ejeYCerrar+" cerrar");
         console.log($ejeYCerrar+" cerrar - "+$ejeYLeerMas+" leer");
         //$res = Math.sign($res) != -1 ? $res: $res*-1;
         console.log($res);
         if ($res > 120) {
            window.scrollTo($ejeXLeerMas,$ejeYLeerMas-250);
         }
         


         $ejeYLeerMas = e.clientY;
         $ejeXLeerMas = e.clientX;
         console.log($ejeYLeerMas+" leer");


         
$("#button2").click(function() {
   $('html, body').animate({
   scrollTop: $("#aqui").offset().top
   }, 2000);
  });

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js" type="text/javascript"></script>


  <script>
	var $idBoton = "13";
	
	var $section = document.getElementById("sectionNoticias");

	$section.addEventListener('click',function(e){
		if (e.target.value != undefined) {
			if (e.target.id == "b"+e.target.value) {
				$idBoton = e.target.value;
				console.log($idBoton);
				console.log($v);
			}
		}
	});
	var $v = "#cerrar"+$idBoton;
		$("#cerrar9").on("click", function(){
			console.log("#notID"+$idBoton);
			
			var posicion = $("#notID"+$idBoton).offset().top-50;
			
			$("html, body").animate({scrollTop: posicion}, 1000); 
			
		});
	
</script>


<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>



.activarClicks{
	pointer-events: all;
}*/

var objetoAjax = new XMLHttpRequest();
var datos;
var rutaImagenes = "imagenes/noticias/noticiasMin/";
var rutaImagenesPrincipal = "imagenes/noticias/noticiasPrincipal/";
var totalNoticias;
var $numeroPaginas;
var $pagS = document.getElementById("paginaNumerosS");
var $pagP = document.getElementById("paginaNumerosP");
var $ok = true;
var $izqS = document.getElementById("izqS");
var $izqP = document.getElementById("izqP");
var $derS = document.getElementById("derS");
var $derP = document.getElementById("derP");

var $padre = document.getElementById("noticiasPadre");
var $paginaAnterior;
var $paginaActual = 1;

var $up = document.getElementById("up");
var $section = document.getElementById("sectionNoticias");

var $ejeYLeerMas;
var $ejeXLeerMas;

objetoAjax.open('POST','ajax/traerNoticias.php');
objetoAjax.setRequestHeader("Content-type","application/x-www-form-urlencoded");

objetoAjax.onload = function()  {
   datos = JSON.parse(objetoAjax.responseText);
   totalNoticias = datos.length;
   $numeroPaginas =Math.ceil(totalNoticias/6);
   
   paginacion();
   traer(0,6);
   
}

function traer($inicio, $fin){

   for (let i = $inicio; i < $fin; i++) {
      $fecha = fecha(datos[i]['fecha']);
      var $articulo = document.createElement('div');
      $articulo.innerHTML+=
      `
      <article class="articleNoticias" id="notID${datos[i]['id']}">
         <div class="z1">
            <img src="${rutaImagenes+datos[i]['miniatura']}" alt="imagen">
         </div>
         <div class="z2">
            <a href="articuloPrincipal.php?id=${datos[i]['id']}"><h2 class="articleNoticiasTitulo titulo">${datos[i]['titulo']} </h2></a>
            <div class="noticiasFecha"> ${$fecha}</div>
            <div class="dc">

               <div id="desc${datos[i]['id']}"  class="visible">${datos[i]['dc']}</div>
               <div id="texto${datos[i]['id']}" class="invisible">${datos[i]['texto']}</div>
               <div class="botonSaberMas">
                  <button id="b${datos[i]['id']}" value="${datos[i]['id']}">saber mas</button>
                  <button id="cerrar${datos[i]['id']}" value="${datos[i]['id']}" class="botonCerrar">cerrar</button>
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
      
      $mover = ($paginaActual != 1)? $paginaActual-1: $paginaActual;
      
   }else{
      $mover = ($paginaActual != $numeroPaginas)? $paginaActual+1: $paginaActual;
   }

   if($idDireccion == "izqS" && $paginaActual == 1 || $idDireccion == "izqP" && $paginaActual == 1){
      document.getElementById("ps"+$ir).style.backgroundColor="#94F2A2";
      document.getElementById("pp"+$ir).style.backgroundColor="#94F2A2";            
   }else if($idDireccion == "derS" && $paginaActual == $numeroPaginas || $idDireccion == "derP" && $paginaActual == $numeroPaginas){
      document.getElementById("ps"+$ir).style.backgroundColor="#94F2A2";
      document.getElementById("pp"+$ir).style.backgroundColor="#94F2A2";    
      document.getElementById("pp"+$ir).style.backgroundColor="#94F2A2";    
   }else{
      
      $paginaAnterior = $paginaActual;
      $paginaActual = $mover;
      $ir = $paginaActual;
      $padre.innerHTML = "";
      document.getElementById("ps"+$ir).style.backgroundColor="#94F2A2";
      document.getElementById("pp"+$ir).style.backgroundColor="#94F2A2";

      $inicio = ($paginaActual==1)? 0: $paginaActual*6-6;
      $fin = $inicio+6;
      
      document.getElementById("ps"+$paginaAnterior).style.backgroundColor="#84c2e6";
      document.getElementById("pp"+$paginaAnterior).style.backgroundColor="#84c2e6";
      traer($inicio,$fin);
   }




}

function cambiarPagina(e){

   if (e.target.value != undefined) {

      document.getElementById("ps1").style.backgroundColor="#84c2e6";//ya es verde y lo paso a azul
      document.getElementById("pp1").style.backgroundColor="#84c2e6";//ya es verde y lo paso a azul
      
      if (!isNaN($paginaAnterior)) {//aqui entra a dar el fondo azul a la pagina anterior
         console.log("entro");
         document.getElementById("ps"+$ir).style.backgroundColor="#84c2e6";
         document.getElementById("pp"+$ir).style.backgroundColor="#84c2e6";
      }
      
      $padre.innerHTML = "";
         
      $paginaActual = e.target.value;//la pagina actual esto lo uso en la otras funciones
      $ir = e.target.value;// la pagina actual la uso en esta funcion
      document.getElementById("ps"+$ir).style.backgroundColor="#94F2A2";//verde
      document.getElementById("pp"+$ir).style.backgroundColor="#94F2A2";//verde
      
      $inicio = ($ir==1)? 0: $ir*6-6;
      $fin = $inicio+6;
      $paginaAnterior = $ir;// aqui damos el valor de pagina anterior == importante!!
   
      $ok = true;// esto es para los articulos, si cambia de pagina sin cerrar las noticias
      traer($inicio,$fin);
   }
   
}

function paginacion() {

   for (let i = 1; i <= $numeroPaginas; i++) {
      var $pagSu = document.createElement('div');
      var $pagPo = document.createElement('div');
      
      $pagSu.innerHTML=i;
      $pagPo.innerHTML=i;
      $pagSu.id = "ps"+i;
      $pagPo.id = "pp"+i;
      $pagSu.value = i;
      $pagPo.value = i;
      if (i == 1) {
         $pagSu.style.backgroundColor="#94F2A2";//verde
         $pagPo.style.backgroundColor="#94F2A2";//verde
      }
      $pagS.appendChild($pagSu);
      $pagP.appendChild($pagPo);
      
   }


}

function fecha($f) {
   y = $f.substring(0,4);
   m = $f.substring(5,7);
   d = $f.substring(8,10);
   return dia = d+"/"+m+"/"+y;

}

$up.addEventListener('click',function (e) {
   window.scrollTo(0, 0);
});

$section.addEventListener('click',function(e){
   if (e.target.value != undefined) {
      
      $articulo = e.target.parentNode.parentNode.parentNode.parentNode;

      if (e.target.id == "cerrar"+e.target.value && $ok == false) {
         document.getElementById("desc"+e.target.value).className = "visible";;
         document.getElementById("texto"+e.target.value).className = "invisible";;
         document.getElementById("cerrar"+e.target.value).className = "invisible";
         document.getElementById("b"+e.target.value).className = "visible";
         $articulo.firstElementChild.className = "visible";
         $articulo.className = "articleNoticias";
         $ok = true;
      }else{
         if ($ok) {
            /*
            let $modificar = document.getElementById("desc"+e.target.value);
            let $mostrar = document.getElementById("texto"+e.target.value);
            let $botonCerrar = document.getElementById("cerrar"+e.target.value);
            let $boton = document.getElementById("b"+e.target.value);// boton saberMas
            $articulo.firstElementChild.className = "invisible";
            $articulo.className = "saberMasAnimacion";//el articulo animado
            $modificar.className = "invisible";
            $mostrar.className = "visible";
            $boton.className = "invisible";// boton saberMas
            $botonCerrar.className = "botonCerrarMostrar";
            */
            $articulo.innerHTML = "";
            $articulo.innerHTML = 
            `
            
            <div class="z3">
               <a href="articuloPrincipal.php?id=${datos[1]['id']}"><h2 class="articleNoticiasTitulo titulo">${datos[1]['titulo']} </h2></a>
               <div class="noticiasFecha"> ${$fecha}</div>
               <div class="dc">

                  <div id="texto${datos[1]['id']}">${datos[1]['texto']}</div>
                  <div class="botonSaberMas">
                     <button id="cerrar${datos[1]['id']}" value="${datos[1]['id']}">cerrar</button>
                  </div>
               </div>
            </div>
            <div class="z4">
               <img src="${rutaImagenesPrincipal+datos[1]['imagen']}" alt="imagen">
            </div>
            `;

            $articulo.className = "saberMasAnimacion";
            $ok = false;
         }
      }
   }
});



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


/*
      $ver = getCookie("pag");
      if ($ver != "") {
         $n = getCookie("pag");
      }else{
         document.cookie = `pag  = ${$inicio}`;
      }
      */

      /*$galletas = document.cookie;
      console.log($galletas);*/


      /*

   for (let i = 1; i <= $numeroPaginas; i++) {
      $pagS.childElementCount
      $pagP.appendChild($pagPo);
      if (i == 1) {
         $pagSu.style.backgroundColor="#84c2e6";//azul
         $pagPo.style.backgroundColor="#84c2e6";//azul
      }
      if (i == $pagAct) {
         $pagSu.style.backgroundColor="#94F2A2";//verde
         $pagPo.style.backgroundColor="#94F2A2";//verde
      }    
   } 
*/
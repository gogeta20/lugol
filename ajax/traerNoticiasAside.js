var objetoAjax2 = new XMLHttpRequest();
var datos;

objetoAjax2.open('POST','ajax/traerNoticiasAside.php');
objetoAjax2.setRequestHeader("Content-type","application/x-www-form-urlencoded");

var padre = document.getElementById("asideNoticias");
titulo = document.createElement("h3");
titulo.className = "titulo";
titulo.innerHTML = "Noticias Destacadas";
padre.appendChild(titulo);


objetoAjax2.onload = function() {
   
   var datos = JSON.parse(objetoAjax2.responseText);
   
   datos.forEach(fila => {
      var hijo = document.createElement('div');
      hijo.innerHTML +=
      `
         <img class="imagenAside" src="imagenes/noticias/noticiasMin/${fila['miniatura']}" alt="img">
         <a href="articuloPrincipal.php?id=${fila['id']}">
            <p>${fila['titulo']}</p>
         </a>
      `;
      padre.appendChild(hijo);
   });/* fin foreach*/
}/* fin funcion anonima*/

objetoAjax2.send();
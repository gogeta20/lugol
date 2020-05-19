var objetoAjax = new XMLHttpRequest();
var $datos;
var $equiposDiv = document.getElementById("padreEquipos");
var $listaUl = document.getElementById("laLista");
var $up = document.getElementById("up");

objetoAjax.open('POST','ajax/equipos.php');
objetoAjax.setRequestHeader("Content-type","application/x-www-form-urlencoded");

objetoAjax.onload = function(){
    $datos = JSON.parse(objetoAjax.responseText);

    for (let i = 0; i < $datos.length; i++) {
        var $equipo = document.createElement('div');
        var $lista = document.createElement('li');
        $equipo.innerHTML += 
        `
            <div class="equipo">
              <a href="#"><h2>${$datos[i]['nombre']}</h2></a>
              <div class="divEquipo">
                <div class="imagenEquipo">
                  <img src="imagenes/equipos/${$datos[i]['imagen']}" alt="">
                </div>
                <div class="divLema">
                  <p> ${$datos[i]['lema']}</p>
                  <a href="presentacionEquipo.php?id=${$datos[i]['id']}"><button>Conocer mas del equipo</button></a>
                </div>
              </div>
            </div>
        `;
        $lista.innerHTML+=
        `
        <a href="presentacionEquipo.php?id=${$datos[i]['id']}"><li><i class="fas fa-futbol"></i>${$datos[i]['nombre']}</li></a>
        `;
        $listaUl.appendChild($lista);
        $equiposDiv.appendChild($equipo);
    }

}// termina el onload

objetoAjax.send();

$up.addEventListener('click',function (e) {
    window.scrollTo(0, 0);
 });
 
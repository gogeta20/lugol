var objetoAjax = new XMLHttpRequest();
var $datos;
var $padreSolitudEquipo = document.getElementById("muroEquiposParticipa");
objetoAjax.open('POST','ajax/participa.php');
objetoAjax.setRequestHeader("Content-type","application/x-www-form-urlencoded");

objetoAjax.onload = function(){
    $datos = JSON.parse(objetoAjax.responseText)
    console.log($datos);
    for (let i = 0; i < $datos.length; i++) {
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
}
objetoAjax.send();
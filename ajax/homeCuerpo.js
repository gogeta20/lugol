var $idEquipo = document.getElementById('idEquipo').value;
var $datosPartidos;

var $cuerpoHome = document.getElementById("cuerpoHome");
var $serHome = document.getElementById("serHome");
var $volverHome = document.getElementById("volverCuerpo");

var $siguientePartido = document.getElementById("siguientePartido");
var $clasificacion = document.getElementById("clasificacion");
var $mensajes = document.getElementById("mensajes");
var $solicitudes = document.getElementById("solicitudes");
var $listaJugadores = document.getElementById("listaJugadores");
var $publicarAnuncioPresi = document.getElementById("publicarAnuncioPresi");
// espalda home
var $respuestaPartidos =  document.getElementById("tablaPartidosEspalda");
var $trCabecera = document.createElement('tr');
$trCabecera.innerHTML = `<td>Local</td><td>Visitante</td><td>recinto</td><td>hora</td><td>fecha</td>`;

// fin espalda home
$siguientePartido.addEventListener('click',function(){
    var objetoAjaxPartidos = new XMLHttpRequest();

    objetoAjaxPartidos.open('POST','ajax/traerDatos.php');
    objetoAjaxPartidos.setRequestHeader("Content-type","application/x-www-form-urlencoded");

    objetoAjaxPartidos.onload = function(){
        $datosPartidos = JSON.parse(objetoAjaxPartidos.responseText);
        $respuestaPartidos.appendChild($trCabecera);
        for (let i = 0; i < $datosPartidos.length; i++) {
            if (i == 0) {
                trPartidos = document.createElement('tr');
                trPartidos.style.color = "black";
            }else{
                trPartidos = document.createElement('tr');
                trPartidos.style.color = "#3d3d3d9f";
            }
            trPartidos.innerHTML+=
            `
                <td>${$datosPartidos[i]['equipoL']}</td>
                <td>${$datosPartidos[i]['equipoV']}</td>
                <td>${$datosPartidos[i]['sede']}</td>
                <td>${$datosPartidos[i]['hora']}</td>
                <td>${$datosPartidos[i]['fecha']}</td>
            `;
            $respuestaPartidos.appendChild(trPartidos);
        }
    }

    $paramPartidos = 'idEquipo='+$idEquipo+'&tipo=partidos';
    objetoAjaxPartidos.send($paramPartidos);
    rotar();
});



$clasificacion.addEventListener('click',function(){
    rotar()
});
$mensajes.addEventListener('click',function(){
    rotar()
});
$solicitudes.addEventListener('click',function(){
    rotar()
});
$listaJugadores.addEventListener('click',function(){
    rotar()
});
$publicarAnuncioPresi.addEventListener('click',function(){
    rotar()
});








$volverHome.addEventListener('click',function(){
    $serHome.className = "cajaRotar volver";
    $respuestaPartidos.innerHTML="";
});


function rotar(){
    $serHome.className = "cajaRotar Rotar";
}
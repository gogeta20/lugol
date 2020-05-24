var $idEquipo = document.getElementById('idEquipo').value;
var $idUser = document.getElementById('idUser').value;
var $nombreEquipo = document.getElementById('nombreEquipo').value;
var $datosPartidos;

var $cuerpoHome = document.getElementById("cuerpoHome");
var $serHome = document.getElementById("serHome");
var $volverHome = document.getElementById("volverCuerpo");

var $siguientePartido = document.getElementById("siguientePartido");
var $clasificacion = document.getElementById("clasificacion");
var $mensajes = document.getElementById("mensajes");
var $solicitudes = document.getElementById("solicitudes");
var $listaJugadores = document.getElementById("listaJugadores");
var $respuestasAnuncios = document.getElementById("respuestasAnuncios");
var $publicarAnuncioPresi = document.getElementById("publicarAnuncio");

// espalda home
var $tablaEspalda =  document.getElementById("tablaEspalda");

var $mensajesRespuestas =  document.getElementById("mensajesRespuestas");
var $responderMensajes =  document.getElementById("responderMensajes");
var $botonCancelarMsj =  document.getElementById("botonCancelarMsj");
var $botonVolverMensajes =  document.getElementById("botonVolverMensajes");
var $confirm;
var $responderAlUser;
var $idAlUser;
var $msj;
//var $respuestaClasificacion =  document.getElementById("tablaClasificacionEspalda");

var $trCabecera = document.createElement('tr');

// fin espalda home
$siguientePartido.addEventListener('click',function(){
    var objetoAjaxPartidos = new XMLHttpRequest();

    objetoAjaxPartidos.open('POST','ajax/traerDatos.php');
    objetoAjaxPartidos.setRequestHeader("Content-type","application/x-www-form-urlencoded");

    objetoAjaxPartidos.onload = function(){
        $datosPartidos = JSON.parse(objetoAjaxPartidos.responseText);

        $trCabecera.innerHTML = `<td class="subrayado">Local</td><td class="subrayado">Visitante</td><td class="subrayado">recinto</td><td class="subrayado">hora</td><td class="subrayado">fecha</td>`;
        $tablaEspalda.appendChild($trCabecera);
        
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
            $tablaEspalda.appendChild(trPartidos);
        }
    }

    $paramPartidos = 'idEquipo='+$idEquipo+'&tipo=partidos';
    objetoAjaxPartidos.send($paramPartidos);
    rotar();
});



$clasificacion.addEventListener('click',function(){
    var objetoAjaxClasificacion = new XMLHttpRequest();

    objetoAjaxClasificacion.open('POST','ajax/traerDatos.php');
    objetoAjaxClasificacion.setRequestHeader("Content-type","application/x-www-form-urlencoded");

    objetoAjaxClasificacion.onload = function(){

        $datosClasificacion = JSON.parse(objetoAjaxClasificacion.responseText);

        $trCabecera.innerHTML = `<td class="subrayado">equipo</td><td class="subrayado">jugados</td><td class="subrayado">ganados</td><td class="subrayado">empatados</td><td class="subrayado">perdidos</td><td class="subrayado">dif goles</td><td class="subrayado">puntos</td>`;
        $tablaEspalda.appendChild($trCabecera);

        for (let i = 0; i < $datosClasificacion.length; i++) {
            if ($datosClasificacion[i]['equipo'] == $nombreEquipo) {
                trNew = document.createElement('tr');
                trNew.style.color = "black";
                trNew.style.backgroundColor = "#ff000014";
                trNew.innerHTML+=
                `
                    <td class="tdEspalda">${$datosClasificacion[i]['equipo']}</td>
                    <td class="tdEspalda">${$datosClasificacion[i]['pj']}</td>
                    <td class="tdEspalda">${$datosClasificacion[i]['ga']}</td>
                    <td class="tdEspalda">${$datosClasificacion[i]['em']}</td>
                    <td class="tdEspalda">${$datosClasificacion[i]['pe']}</td>
                    <td class="tdEspalda">${$datosClasificacion[i]['dg']}</td>
                    <td class="tdEspalda">${$datosClasificacion[i]['puntos']}</td>
                `;
            }else{
                trNew = document.createElement('tr');
                trNew.style.color = "#3d3d3d9f";
                trNew.innerHTML+=
                `
                    <td class="tdEspalda">${$datosClasificacion[i]['equipo']}</td>
                    <td class="tdEspalda">${$datosClasificacion[i]['pj']}</td>
                    <td class="tdEspalda">${$datosClasificacion[i]['ga']}</td>
                    <td class="tdEspalda">${$datosClasificacion[i]['em']}</td>
                    <td class="tdEspalda">${$datosClasificacion[i]['pe']}</td>
                    <td class="tdEspalda">${$datosClasificacion[i]['dg']}</td>
                    <td class="puntosEspalda tdEspalda">${$datosClasificacion[i]['puntos']}</td>
                `;
            }
           
            $tablaEspalda.appendChild(trNew);
        }
    }

    $paramClasificacion = 'tipo=clasificacion';
    objetoAjaxClasificacion.send($paramClasificacion);
    rotar()
});


$mensajes.addEventListener('click',function(){
    var objetoMensajes = new XMLHttpRequest();

    objetoMensajes.open('POST','ajax/traerDatos.php');
    objetoMensajes.setRequestHeader("Content-type","application/x-www-form-urlencoded");

    objetoMensajes.onload = function(){
        $datosMensajes = JSON.parse(objetoMensajes.responseText);
        
        for (let i = 0; i < $datosMensajes.length; i++) {
            trNew = document.createElement('tr');
            trNew.innerHTML+=`<td class="tdTableMensajes"><div class="tdMensajesEspaldaCabecera"><div>usuario : ${$datosMensajes[i]['rm']}</div>  <div>fecha : ${$datosMensajes[i]['fecha']}</div></div><div id="ms${$datosMensajes[i]['idrm']}" class="tdMensajesEspalda">${$datosMensajes[i]['ms']}</div><div class="botonEspaldaMensajes"><button id="btn${$datosMensajes[i]['rm']}"class="botonResponderTablaEspalda" value="${$datosMensajes[i]['idrm']}">responder</button></div></td>`;
            $tablaEspalda.appendChild(trNew);
        }


    }

    $paramMensajes = 'idUser='+$idUser+'&tipo=mensajes';
    objetoMensajes.send($paramMensajes);
    rotar()
});




$solicitudes.addEventListener('click',function(){
    var objetoAjaxSolicitudes =  new XMLHttpRequest();
    var $datosSolicitudes;
    objetoAjaxSolicitudes.open('POST','ajax/traerDatos.php');
    objetoAjaxSolicitudes.setRequestHeader("Content-type","application/x-www-form-urlencoded");

    objetoAjaxSolicitudes.onload = function(){
        $datosSolicitudes = JSON.parse(objetoAjaxSolicitudes.responseText);
        let $titulo = document.createElement('tr');
        $titulo.innerHTML = "Solicictudes";
        $tablaEspalda.appendChild($titulo);

        for (let i = 0; i < $datosSolicitudes.length; i++) {
            let $row = document.createElement('tr');
            $row.innerHTML=
            `
            <td class="tdSolicitudes" id="tit${$datosSolicitudes[i]['idUsuario']}" value="${$datosSolicitudes[i]['nombre']}">${$datosSolicitudes[i]['nombre']}</td>
            <td class="tdSolicitudes"><button class="transparente"><i id="okk${$datosSolicitudes[i]['idUsuario']}" class="fas fa-check-circle"></i></button></td>
            <td class="tdSolicitudes"><button class="transparente"><i id="noo${$datosSolicitudes[i]['idUsuario']}" class="fas fa-times"></i></button></td>
            <td class="tdSolicitudes"><button class="transparente"><i id="idd${$datosSolicitudes[i]['idUsuario']}" class="far fa-envelope" value="${$datosSolicitudes[i]['idUsuario']}"></button></i></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            `;

            $tablaEspalda.appendChild($row);
        }

    }
    paramSolicitudes = 'idEquipo='+$idEquipo+'&tipo=solicitudes';
    objetoAjaxSolicitudes.send(paramSolicitudes);
    rotar()
});

$respuestasAnuncios.addEventListener('click',function(){
    var objetoAjaxSolicitudes =  new XMLHttpRequest();
    var $datosSolicitudes;
    objetoAjaxSolicitudes.open('POST','ajax/traerDatos.php');
    objetoAjaxSolicitudes.setRequestHeader("Content-type","application/x-www-form-urlencoded");

    objetoAjaxSolicitudes.onload = function(){
        $datosSolicitudes = JSON.parse(objetoAjaxSolicitudes.responseText);
        let $titulo = document.createElement('tr');
        $titulo.innerHTML = "Respuestas";
        $tablaEspalda.appendChild($titulo);

        for (let i = 0; i < $datosSolicitudes.length; i++) {
            let $row = document.createElement('tr');
            $row.innerHTML=
            `
            <td class="tdSolicitudes" id="tit${$datosSolicitudes[i]['idUsuario']}" value="${$datosSolicitudes[i]['nombre']}">${$datosSolicitudes[i]['nombre']}</td>
            <td class="tdSolicitudes"><button class="transparente"><i id="okk${$datosSolicitudes[i]['idUsuario']}" class="fas fa-check-circle"></i></button></td>
            <td class="tdSolicitudes"><button class="transparente"><i id="noo${$datosSolicitudes[i]['idUsuario']}" class="fas fa-times"></i></button></td>
            <td class="tdSolicitudes"><button class="transparente"><i id="idd${$datosSolicitudes[i]['idUsuario']}" class="far fa-envelope" value="${$datosSolicitudes[i]['idUsuario']}"></button></i></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            `;

            $tablaEspalda.appendChild($row);
        }

    }
    paramSolicitudes = 'idEquipo='+$idEquipo+'&tipo=respuestasAnuncios';
    objetoAjaxSolicitudes.send(paramSolicitudes);
    rotar()
});








$listaJugadores.addEventListener('click',function(){
    //rotar()
});



$publicarAnuncioPresi.addEventListener('click',function(){
    $mensajePublicarAnuncio = document.getElementById("contenidoPublicarAnuncio").value;

    var objetoAjaxPublicarAnuncio = new XMLHttpRequest();
    objetoAjaxPublicarAnuncio.open('POST','ajax/enviarDatos.php');
    objetoAjaxPublicarAnuncio.setRequestHeader("Content-type","application/x-www-form-urlencoded");

    param = 'mensaje='+$mensajePublicarAnuncio+'&idEquipo='+$idEquipo+'&tipo=pAnuncio';
    objetoAjaxPublicarAnuncio.send(param);
    document.getElementById("contenidoPublicarAnuncio").value ="";
});








$tablaEspalda.addEventListener('click',function(e){
    

    $responderAlUser = e.target.id;
    $tipoDeMensaje = e.target.id;
    $idAlUser = e.target.value;
    $tipoDeMensaje = $tipoDeMensaje.substr(0,3)
    $responderAlUser =$responderAlUser.substr(3,20); // id de usuario
    console.log($responderAlUser);
    if($tipoDeMensaje.length != 0 || $tipoDeMensaje != null || $tipoDeMensaje != undefined){

        if ($tipoDeMensaje == 'btn') {
            document.getElementById('remitenteRM').innerHTML = "destinatario: "+$responderAlUser;
        
            $msj = document.getElementById("ms"+$idAlUser).textContent;
            document.getElementById('msjVista').innerHTML = $msj;
            $tablaEspalda.className = "rotarTabla";
            $responderMensajes.className = "rotarDivRespuesta";
            $confirm = true;
        }
        if ($tipoDeMensaje == 'okk') {
            var objectoAjax21 = new XMLHttpRequest();
            objectoAjax21.open('POST','ajax/confirmacionSolicitudes.php');
            objectoAjax21.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            paramtrosUsuario = 'usuario='+$responderAlUser+"&idEquipo="+$idEquipo+"&tipo=ok";
            objectoAjax21.send(paramtrosUsuario);
            $padre = document.getElementById('okk'+$responderAlUser).parentElement.parentElement.parentElement;
            $padre.style.display = 'none';
        }
        if ($tipoDeMensaje == 'noo') {
            var objectoAjax20 = new XMLHttpRequest();
            objectoAjax20.open('POST','ajax/confirmacionSolicitudes.php');
            objectoAjax20.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            paramtrosUsuario = 'usuario='+$responderAlUser+"&tipo=no";
            objectoAjax20.send(paramtrosUsuario);
            $padre = document.getElementById('noo'+$responderAlUser).parentElement.parentElement.parentElement;
            $padre.style.display = 'none';
        }
        if ($tipoDeMensaje == 'idd') {
            $name = document.getElementById("tit"+$responderAlUser).textContent;
            document.getElementById('msjVista').innerHTML = "mensaje a "+$name;
            $tablaEspalda.className = "rotarTabla";
            $responderMensajes.className = "rotarDivRespuesta";
            $confirm = false;
        }
    
    }

    
});

$botonVolverMensajes.addEventListener('click',function(){

    var objectoAjaxResponder = new XMLHttpRequest();
    objectoAjaxResponder.open('POST','ajax/enviarDatos.php');
    objectoAjaxResponder.setRequestHeader("Content-type","application/x-www-form-urlencoded");

    $msjR1 = document.getElementById("tart").value; // mensaje del textarea, respondiendo un mensaje en area presidente
    console.log($msjR1);
    console.log($idAlUser);
    console.log($idUser);
    if ($confirm) {
        paramResponderMensaje = 'respuesta='+$msjR1+'&idRemitente='+$idUser+'&idDestinatario='+$idAlUser;
    }else{
        paramResponderMensaje = 'respuesta='+$msjR1+'&idRemitente='+$idUser+'&idDestinatario='+$responderAlUser;
    }

    objectoAjaxResponder.send(paramResponderMensaje);

    $tablaEspalda.className = "tablaEspalda";
    $responderMensajes.className = "responderMensajes";
    document.getElementById("tart").value = "";
});






//================================================

$botonCancelarMsj.addEventListener('click',function(){
   
    $tablaEspalda.className = "tablaEspalda";
    $responderMensajes.className = "responderMensajes";
    document.getElementById("tart").value = "";
});

$volverHome.addEventListener('click',function(){
   
    $serHome.className = "cajaRotar volver";
    $tablaEspalda.innerHTML="";
});


function rotar(){
    $serHome.className = "cajaRotar Rotar";
}
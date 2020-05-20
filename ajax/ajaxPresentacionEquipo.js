var $id = document.getElementById('id').value;
var $idUser = document.getElementById('idUser').value;

var ruta = "imagenes/presentacionEquipos/";

var objetoAjax = new XMLHttpRequest();
var $datos;
var $numeroFotos = 1;
var $mover = 0;
var $flechaIzquierda = document.getElementById("fi");
var $flechaDerecha = document.getElementById("fd");
var $imagen = document.getElementById('imagen');
var $mensajeConfirmado = document.getElementById("mensajeConfirmado");
var $mensajeAnulado = document.getElementById("mensajeAnulado");
var $botonMeApunto = document.getElementById("presentacionMeApunto");


objetoAjax.open("POST","ajax/ajaxPresentacionEquipo.php?idEquipo="+$id);
objetoAjax.setRequestHeader("Content-type","application/x-www-form-urlencoded");

objetoAjax.onload = function(){
    $datos = JSON.parse(objetoAjax.responseText);
    $imagen.src=ruta+$datos[0]['nombreImagen'];
    $numeroFotos = $datos.length-1;
    /*console.log($datos[1]['nombreImagen']);*/
}
objetoAjax.send();

// ============== eventos =============================

$flechaIzquierda.addEventListener('click',function(){
    if ($mover > 0) {
        $mover--;
        $imagen.src=ruta+$datos[$mover]['nombreImagen'];
    }
    if ($mover == 0) {
        $flechaIzquierda.style.color = "#7c7c7c38";
    }else{
        $flechaDerecha.style.color = "black";
    }
});

$flechaDerecha.addEventListener('click',function(){
    if ($mover < $numeroFotos) {
        $mover++;
        $imagen.src=ruta+$datos[$mover]['nombreImagen'];
    }
    if ($mover == $numeroFotos) {
        $flechaDerecha.style.color = "#7c7c7c38";
    }else{
        $flechaIzquierda.style.color = "black";
    }
});

$mensajeConfirmado.addEventListener('click',function(){
    document.getElementById("checkEfecto").checked =  false;

    var objetoAjaxEnviar =  new XMLHttpRequest();
    objetoAjaxEnviar.open("POST","ajax/ajaxPresentacionEquipoMensaje.php");
    objetoAjaxEnviar.setRequestHeader("Content-type","application/x-www-form-urlencoded");

    var $mensaje = document.getElementById("areaMensaje").value;
    var $parametros = "mensaje="+$mensaje+"&idEquipo="+$id+"&idUser="+$idUser;

    document.getElementById("areaMensaje").value = "";
    objetoAjaxEnviar.send($parametros);
});


$mensajeAnulado.addEventListener('click',function(){
    document.getElementById("checkEfecto").checked =  false;
    document.getElementById("areaMensaje").value = "";
});

$botonMeApunto.addEventListener('click',function(){
    $botonMeApunto.innerHTML = 'registrado <i class="fas fa-check-circle"></i>';
    $botonMeApunto.className = "meApuntoDesactivado";

    var objetoAjaxApuntado = new XMLHttpRequest();
    objetoAjaxApuntado.open("POST","ajax/ajaxPresentacionEquipoApuntado.php");
    objetoAjaxApuntado.setRequestHeader("Content-type","application/x-www-form-urlencoded");

    var $datosApuntado = "idUser="+$idUser+"&idEquipo="+$id;

    objetoAjaxApuntado.send($datosApuntado);

});
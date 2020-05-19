var $id = document.getElementById('id').value;
var ruta = "imagenes/presentacionEquipos/";

var objetoAjax = new XMLHttpRequest();
var $datos;
var $numeroFotos = 1;
var $mover = 0;
var $flechaIzquierda = document.getElementById("fi");
var $flechaDerecha = document.getElementById("fd");
var $imagen = document.getElementById('imagen');

objetoAjax.open("POST","ajax/presentacionEquipo.php?idEquipo="+$id);
objetoAjax.setRequestHeader("Content-type","application/x-www-form-urlencoded");

objetoAjax.onload = function(){
    $datos = JSON.parse(objetoAjax.responseText);
    $imagen.src=ruta+$datos[0]['nombreImagen'];
    $numeroFotos = $datos.length-1;
    /*console.log($datos[1]['nombreImagen']);*/
}
objetoAjax.send();


$flechaIzquierda.addEventListener('click',function(){
    if ($mover > 0) {
        $mover--;
        $imagen.src=ruta+$datos[$mover]['nombreImagen'];
    }
    if ($mover == 0) {
        $flechaIzquierda.style.color = "white";
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
        $flechaDerecha.style.color = "white";
    }else{
        $flechaIzquierda.style.color = "black";
    }
});
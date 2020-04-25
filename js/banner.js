//window.onload = banner();

var $imagenes =  new Array();
var $contador = 0;
var $tiempo = 3000;

$imagenes[0]= "imagenes/banner/1.jpg";
$imagenes[1]= "imagenes/banner/2.jpg";
$imagenes[2]= "imagenes/banner/3.jpg";

function banner(){
   $contador++;
   $contador = $contador%3;
   document.banner.src = $imagenes[$contador];
   setTimeout("banner()",$tiempo);
}
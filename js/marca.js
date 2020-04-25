//let params = new URLSearchParams(location.search);
//var contract = params.get('contrato');


var btn = document.getElementById("botonMarcas");
btn.addEventListener('click',function(){
//  var pintar = document.getElementById('sectionss');
//  pintar.innerHTML="hola mau";
//  document.getElementById('section').appendChild(pintar);

//  console.log('mauricio');
  var peticion = new XMLHttpRequest();
  
  peticion.open('GET','js/marcas.php');
  
  peticion.onload = function(){ 
  var datos = JSON.parse(peticion.responseText);
  
    for (i = 0; i < datos.length; i++) {
      document.getElementById('sectionss').innerHTML = datos[0][0];
    }
  
  };
  
  
 peticion.send();
  
  
  
});
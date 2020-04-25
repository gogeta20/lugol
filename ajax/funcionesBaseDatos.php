<?php
// funcion que conecrta con la base de datos 
// esta funcion saca los parametros de el archivo config.php de la carpeta admin
function conectar($h,$u,$p,$b){

   $conex = new mysqli($h,$u,$p,$b);
   if ($conex->connect_errno) {
      return false;
   }
   return $conex;
}

// en esta funcion pasamos el tipo de sentencia 1 = select * from ....
// en esta funcion pasamos el tipo de sentencia 2 = insert into  ....
function ejecutar($sentencia,$c,$tipo){

   if ($tipo == 1) {
      $resultados = $c->query($sentencia);
      if ($c->errno) {
         return false;
      }
      return $resultados->fetch_all(MYSQLI_ASSOC);
   }

}
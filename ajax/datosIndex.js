var objetoAjax = new XMLHttpRequest();
var $datos;

var $divTabla = document.getElementById("tablaPosiciones");


objetoAjax.open('POST','ajax/datosIndex.php');

objetoAjax.setRequestHeader("Content-type","application/x-www-form-urlencoded");

objetoAjax.onload = function(){

    $datos = JSON.parse(objetoAjax.responseText);
    console.log($datos)
    $divTabla.innerHTML = 
    `
    <tr class="col">
        <th>#</th>
        <th>equipo</th>
        <th>PJ</th>
        <th>G</th>
        <th>E</th>
        <th>P</th>
        <th>GD</th>
        <th>PTS</th>
    </tr>
    `;
    for (let i = 0; i < $datos.length; i++) {
        $divTabla.innerHTML +=
        `
        <tr class="wpos">
            <td>${i+1}</td>
            <td>${$datos[i]['equipo']}</td>
            <td>${$datos[i]['pj']}</td>
            <td>${$datos[i]['ga']}</td>
            <td>${$datos[i]['em']}</td>
            <td>${$datos[i]['pe']}</td>
            <td>${$datos[i]['dg']}</td>
            <td>${$datos[i]['puntos']}</td>
        </tr>
        `;
    }
    $divTabla.innerHTML += `</table>`;
}

objetoAjax.send();



						
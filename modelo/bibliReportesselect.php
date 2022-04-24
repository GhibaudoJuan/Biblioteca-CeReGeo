<?php

require_once("../accesos/biblifiltrar.php");





$resultado = select($sql);

$tabla="<table id='tabla' class='display tabth' style='width:100%'>
<thead>
<tr>
<th>Nombre</th>
<th>Fecha</th>
<th>Descripcion</th>
<th>PDF</th>
<tr>
</thead>
<tbody>";

while ($mifila = pg_fetch_assoc($resultado))
{
    $tabla.="<tr>
            <td>".$mifila['nombre']."</td>
            <td>".$mifila['fecha']."</td>
            <td>".$mifila['descripcion']."</td>
            <td>
            <a href='../reportes/".$mifila['nombre']."' class='sindec'>
            <button type='submit' class='indexbutton'>Ver</button>
            </a>
            </td>
            </tr>";
    
}



$tabla.="</tbody></table>";
echo $tabla;

?>
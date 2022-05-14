<?php

require_once("../accesos/biblifiltrar.php");





$resultado = select($sql);

$tabla="<table id='reportes' class='display tabth' style='width:100%'>
<thead>
<tr>
<th>Nombre</th>
<th>Fecha</th>
<th>Descripcion</th>
<th>PDF</th>
</tr>
</thead>
<tbody>";

while ($mifila = pg_fetch_assoc($resultado))
{
    
    
    IF(file_exists('../reportes/'.$mifila['nombre'])){
    $tabla.="<tr>
             <td>".$mifila['nombre']."</td>
             <td>".$mifila['fecha']."</td>
             <td>".$mifila['descripcion']."</td>
             <td>
             <a href='../reportes/".$mifila['nombre']."' class='sindec' target='_blank' rel='noopener noreferrer'>
             <button type='submit' class='indexbutton'>Ver</button>
             </a>
             </td>
             </tr>";
    }
    else{
        $sql2="delete from reportes where nombre='".$mifila['nombre']."';";
        $res=select($sql2);
    }
}



$tabla.="</tbody></table>";
echo $tabla;

?>

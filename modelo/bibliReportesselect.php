<?php

require_once("../accesos/biblifiltrar.php");





$resultado = select($sql);

$tabla="<table id='reportes' class='display tabth' style='width:100%'>
<thead>
<tr>
<th>Nombre</th>
<th>Fecha</th>
<th>PDF</th>
<th>X</th>
</tr>
</thead>
<tbody>";

while ($mifila = pg_fetch_assoc($resultado))
{
    
    
    IF(file_exists('../reportes/'.$mifila['nombre'].'.pdf')){
    $tabla.="<tr>
             <td>".$mifila['descripcion']."</td>
             <td>".$mifila['fecha']."</td>
             <td>
             <a href='../reportes/".$mifila['nombre'].".pdf' class='sindec' target='_blank' rel='noopener noreferrer'>
             <button type='button' class='btn'>Ver</button>
             </a>
             </td>
             <td>
             <form action = '../modelo/bibliReportesBorrar.php' method='post'>
             <input type='hidden' id='dir' name='dir' value='../reportes/".$mifila['nombre'].".pdf'>
             <button type='submit' class='btn-close'/>
             </form>
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

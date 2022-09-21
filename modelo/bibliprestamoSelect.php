<?php
/*construccion de la tabla de prestamos de la vista de prestamos*/


require_once("../accesos/biblifiltrar.php");




$columnas= array (
    '1'=>'idpre',
    '2'=>'nombre',
    '3'=>'titulo',
    '4'=>'ejemplar',
    '5'=>'desde',
    '6'=>'hasta',
    '7'=>'devuelto',
    '8'=>'activo'

    
);

$resultado = select($sql);


$tabla="<table id='prestamos' class='display tabth' style='width:100%'>
<thead>
<tr>
<th>Pr&eacutestamo</th>
<th>Nombre</th>
<th>T&iacutetulo</th>
<th>Cod. Ejemplar</th>
<th>Retiro</th>
<th>Devoluci&oacuten</th>
<th>Devuelto</th>
<th>Estado</th>
</thead><tbody>";
$tabla.=tabladata($resultado, $columnas);
$tabla.="</tbody></table>";
echo $tabla;

?>


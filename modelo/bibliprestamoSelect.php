<?php



require_once("../accesos/biblifiltrar.php");




$columnas= array (
    '1'=>'idpre',
    '2'=>'nombre',
    '3'=>'ejemplar',
    '4'=>'desde',
    '5'=>'hasta',
    '6'=>'devuelto',
    '7'=>'activo'

    
);

$resultado = select($sql);


$tabla="<table id='prestamos' class='display tabth' style='width:100%'>
<thead>
<tr>
<th>Prestamo</th>
<th>Nombre</th>
<th>Ejemplar</th>
<th>Retiro</th>
<th>Devolucion</th>
<th>Devuelto</th>
<th>Estado</th>
</thead><tbody>";
$tabla.=tabladata($resultado, $columnas);
$tabla.="</tbody></table>";
echo $tabla;

?>


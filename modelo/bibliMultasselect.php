<?php



require_once("../accesos/biblifiltrar.php");



$columnas= array (
    '1'=>'idmulta',
    '2'=>'nombre',
    '3'=>'desmultado',
    '4'=>'multa_estado');

$resultado = select($sql);

$tabla="<table id='multas' class='display tabth' style='width:100%'>
<thead>
<tr>
<th>Id</th>
<th>Nombre Completo</th>
<th>Desmultado</th>
<th>Estado</th>
</thead><tbody>";
$tabla.=tabladata($resultado, $columnas);
$tabla.="<tbody></table>";
echo $tabla;

?>

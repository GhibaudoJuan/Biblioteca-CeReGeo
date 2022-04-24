<?php



require_once("../accesos/biblifiltrar.php");




$columnas= array (
    '1'=>'idpre',
    '2'=>'nombre',
    '3'=>'titulo',
    '4'=>'ejemplar',
    '5'=>'desde',
    '6'=>'hasta',
    '7'=>'devuelto',
    '8'=>'activo',
    
);

$resultado = select($sql);


$tabla="<table id='tabla' class='display tabth' style='width:100%'>
<thead>
<tr>
<th>Id</th>
<th>Nombre</th>
<th>Titulo</th>
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


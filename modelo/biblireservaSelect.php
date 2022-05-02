<?php



require_once("../accesos/biblifiltrar.php");




$columnas= array (
    '1'=>'idres',
    '2'=>'nombre',
    '3'=>'material',
    '4'=>'titulo',
    '5'=>'ejemplar',
    '6'=>'fecha',
    '7'=>'activo',

  
    
);


$resultado = select($sql);

$tabla="<table id='tabla' class='display tabth' style='width:100%'>
<thead>
<tr>
<th>Reserva</th>
<th>Nombre</th>
<th>Codigo</th>
<th>Titulo</th>
<th>Ejemplar</th>
<th>Retiro</th>
<th>Estado</th>

</thead>
<tbody>";
$tabla.=tabladata($resultado, $columnas);
$tabla.="</tbody></table>";
echo $tabla;

?>


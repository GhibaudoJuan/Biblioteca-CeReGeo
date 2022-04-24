<?php



require_once("../accesos/biblifiltrar.php");



$columnas= array (
    '1'=>'nombreuser',
    '2'=>'nombre',
    '3'=>'email',
    '4'=>'nombrecuenta');

$resultado = select($sql);

$tabla="<table id='tabla' class='display tabth' style='width:100%'>
<thead>
<tr>
<th>Nombre Usuario</th>
<th>Nombre Completo</th>
<th>Email</th>
<th>Tipo</th>
</thead><tbody>";
$tabla.=tabladata($resultado, $columnas);
$tabla.="<tbody></table>";
echo $tabla;

?>

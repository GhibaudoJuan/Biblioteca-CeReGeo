<?php



require_once("../accesos/biblifiltrar.php");



$columnas= array (
    '1'=>'idcuenta',
    '2'=>'nombreuser',
    '3'=>'nombre',
    '4'=>'email',
    '5'=>'nombrecuenta');

$resultado = select($sql);

$tabla="<table id='cuentas' class='display tabth' style='width:100%'>
<thead>
<tr>
<th>Id</th>
<th>Nombre Usuario</th>
<th>Nombre Completo</th>
<th>Email</th>
<th>Tipo</th>
</thead><tbody>";
$tabla.=tabladata($resultado, $columnas);
$tabla.="<tbody></table>";
echo $tabla;

?>

<?php
/*construccion de la tabla de reservas de la vista de reservas*/


require_once("../accesos/biblifiltrar.php");


//select de bibliotecario
$sql = "select idres, nombre, material, titulo, fecha,(CASE WHEN activo='False' THEN 'Concretado' WHEN fecha<=current_date - interval '".$atraso." days'  THEN 'Atrasado' ELSE '' END ) as activo
            from reservas re inner join material ma on (ma.idmat= re.material) ";
if(isset($_SESSION['tipouser'])&&($_SESSION['tipouser']>'1')){
    
    //select de estudiante
    $where= " where nombre = '". $_SESSION['nombre'] ."'";
    $sql.=$where;
    
}



$_SESSION['sql'] = $sql;
$delete = 'delete from reservas '.$where.';';
$retorno='reserva';

$columnas= array (
    '1'=>'idres',
    '2'=>'nombre',
    '3'=>'material',
    '4'=>'titulo',
    '5'=>'fecha',
    '6'=>'activo',
 
    
);


$resultado = select($sql);

$tabla="<table id='reservas' class='display tabth' style='width:100%'>
<thead>
<tr>
<th>Reserva</th>
<th>Nombre</th>
<th>Cod. Material</th>
<th>T&iacutetulo</th>
<th>Retiro</th>
<th>Estado</th>

</thead>
<tbody>";
$tabla.=tabladata($resultado, $columnas);
$tabla.="</tbody></table>";
echo $tabla;

?>


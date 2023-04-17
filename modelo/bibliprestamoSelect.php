<?php
/*construccion de la tabla de prestamos de la vista de prestamos*/


require_once("../accesos/biblifiltrar.php");

$sql = "select idpre,nombre, titulo, ejemplar, desde, hasta, devuelto, (CASE WHEN activo='False' THEN 'Concretado' WHEN hasta<=current_date - interval '".$atraso." days'  THEN 'Atrasado' ELSE '' END ) as activo
            from prestamos re inner join ejemplares e on (e.idejemplar=re.ejemplar) inner join material m on (e.idmaterial=m.idmat) ";
//select de bibliotecarios
if(isset($_SESSION['tipouser'])&&($_SESSION['tipouser']>'1')){
    
    //select de estudiante
    $where= " where nombre = '". $_SESSION['nombre'] ."'";
    $sql.=$where;
}




$_SESSION['sql'] = $sql;
$delete = 'delete from prestamos '.$where.';';
$retorno = 'prestamo';



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


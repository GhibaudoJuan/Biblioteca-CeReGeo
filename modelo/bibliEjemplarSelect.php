<?php 
/* construccion de la tabla de ejemplares
*/

//datos de ejemplar
$sql = "select idmaterial, idejemplar, codigo_externo, propietario,
        (CASE WHEN estado='l' THEN 'Libre' WHEN estado='p' THEN 'Prestado' when estado='o' THEN 'Obsoleto' END) as estado,
        (CASE WHEN disponibilidad ='True' THEN 'SI' ELSE 'NO' END ) as disponibilidad, condicion
        from ejemplares
        where idmaterial = '".$idej."'";
if(!isset($_SESSION['tipouser'])||$_SESSION['tipouser']>'1')
{
    $sql.=" and estado !='o' and disponibilidad = 'true' limit 1";
}


$sql.=";";
$resultado=select($sql);
$tabla="<table id='ejemplar' class='display tabth' style='width:100%'>
<thead>
<tr>
<th>Cod. Material</th>
<th>Cod. Ejemplar</th>
<th>Cod. Externo</th>
<th>Propietario</th>
<th>Estado</th>
<th>Disponibilidad</th>   	
<th>Condici&oacuten</th>   	
</tr>
</thead><tbody>";

while ($datos = pg_fetch_assoc($resultado)){
    	    
    	  
$tabla.='<tr>';
$tabla.='<td>'.$datos['idmaterial'].'</td>
         <td>'.$datos['idejemplar'].'</td>
         <td>'.$datos['codigo_externo'].'</td>';
$tabla.='<td>'.$datos['propietario'].'</td>
         <td>'.$datos['estado'].'</td>
         <td>'.$datos['disponibilidad'].'</td>
         <td>'.$datos['condicion'].'</td>';
            
$tabla.=" </tr>";

    	    
}
    	    
    	    
$tabla.=" </body>
</table>";
echo $tabla;



?>

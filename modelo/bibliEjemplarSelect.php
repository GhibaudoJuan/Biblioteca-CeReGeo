<?php 
/* construccion de la tabla de ejemplares
*/

$tabla="<table id='ejemplar' class='display tabth' style='width:100%'>
<thead>
<tr>
<th>Cod. Material</th>
<th>Cod. Ejemplar</th>
<th>Cod. Externo</th>
<th>Propietario</th>
<th>Estado</th>
<th>Disponibilidad</th>   	
<th>Condicion</th>   	
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

<?php 


$tabla="<table id='ejemplar' class='display tabth' style='width:100%'>
<thead>
<tr>
<th>Material</th>
<th>Ejemplar</th>
<th>Cod. Externo</th>
<th>Propietario</th>
<th>Estado</th>
<th>Disponibilidad</th>   		
<th>Proxima</th> 
</thead><tbody>";

while ($datos = pg_fetch_assoc($resultado)){
    	    
    	  
$tabla.='<tr>';
$tabla.='<td>'.$datos['idmaterial'].'</td>
         <td>'.$datos['idejemplar'].'</td>
         <td>'.$datos['codigo_externo'].'</td>';
$tabla.='<td>'.$datos['propietario'].'</td>
         <td>'.$datos['estado'].'</td>
         <td>'.$datos['disponibilidad'].'</td>
         <td>'.$array[$datos[idejemplar]].'</td>';
            
$tabla.=" </tr>";

    	    
}
    	    
    	    
$tabla.=" </body>
</table>";
echo $tabla;



?>
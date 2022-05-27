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


//botonreservar
/*
 if((isset($_SESSION['tipouser']))&&($datos['disponibilidad']=='SI')&&($datos['estado']!='Obsoleto')){
 $tabla.= '<td style="width:200px;"><a class="sindec" href="#miModal">	<button type="submit" class="button" onclick="valuereserva('."'reserva',";
 $tabla.="'".$datos['idmaterial']."','".$datos['idejemplar']."')" ;
 $tabla.='">Res</button> </a>';
 
 if(($_SESSION['tipouser']<'2')&&($datos['estado']!='Prestado')){
 $tabla.=' <a class="sindec" href="#miModal"> <button type="submit" class="button" onclick="valueprestamo('."'prestamo',";
 $tabla.="'".$datos['idmaterial']."','".$datos['idejemplar']."','".$limit[$datos['idejemplar']]."')" ;
 $tabla.='">Pre</button> </a>
 </td>';
 
 }
 }
 */
?>
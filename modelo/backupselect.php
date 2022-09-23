<?php
/* construccion de la tabla de backup 
 * 
 * */
require_once("../accesos/biblifiltrar.php");





$resultado = select($sql);

$tabla="<table id='backup' class='display tabth' style='width:100%'>
<thead>
<tr>
<th>Nombre</th>
<th>Fecha</th>
<th>X</th>
</tr>
</thead>
<tbody>";

while ($mifila = pg_fetch_assoc($resultado))
{
    
    
    IF(file_exists('../backup/'.$mifila['nombre'].'.zip')){
    $tabla.="<tr>
             <td>".$mifila['nombre']."</td>
             <td>".$mifila['fecha']."</td>
             <td>
             <form action = '../modelo/bibliBackupBorrar.php' method='post'>
             <input type='hidden' id='dir' name='dir' value='../backup/".$mifila['nombre'].".zip'>
             <button type='submit' class='btn-close'/>
             </form>
             </td>
             </tr>";
    }
    else{
        $sql2="delete from backup where nombre='".$mifila['nombre']."';";
        $res=select($sql2);
    }
}



$tabla.="</tbody></table>";
echo $tabla;

?>

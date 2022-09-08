<?php
/*construccion del cuadro de portada de la vista en ejemplares*/


require_once("../accesos/biblifiltrar.php");

$resultado=select($sql);

$sql=$resultado;
$galeria="";
$count=pg_affected_rows($resultado);
if($count!=0){
while ($mifila = pg_fetch_assoc($sql))
{
    
    
    $galeria.='<div class="cuadro">';
    $galeria.= '<a href="../vista/bibliEjemplares.php?cod='.$mifila['idmat'].'&tipo='.$mifila['tipo'].'">';
    $galeria.='<div class="cuadro-imagen" style="background-image:';
    
    if($mifila['portada']=='')
        switch ($mifila['tipo']){
            case "Libro": //libro
                $galeria.=" url('../imagenes/noimage.jpg');";
                break;
            case "Revista": //revista
                $galeria.=" url('../imagenes/noimage.jpg');";
                break;
            case "Mapa": //mapa
                $galeria.=" url('../imagenes/noimage.jpg');";
                break;
            case "Final": //final
                $galeria.=" url('../imagenes/descarga.png');";
                break;
    }
    else
        $galeria.="url('../imagenes/".$mifila['portada']."');";
    
    $galeria.='">';
   
    $galeria.='<div class="i-titulo elipsis"><span style="margin:10px;" title="'.$mifila['titulo'].'">'.$mifila['titulo'].'</span> </div>';
    
    $galeria.='<div class="i-tipo"><span style="margin:10px;">'.$mifila['tipo'].'</span> </div>';
   
    $galeria.='</div>';
    $galeria.='</a>';
    $galeria.=' </div>';
    
             
}
}
else{
    include("../controlador/pagsinnum.php");
}
echo $galeria;

?>
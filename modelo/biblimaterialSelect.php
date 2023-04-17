<?php
/*construccion del cuadro de portada de la vista en ejemplares*/


require_once("../accesos/biblifiltrar.php");
if($_GET['pag']==1){ //genera un error, cuando se busca y se va de la pag 2 a la pag 1 entra y no carga el post de la busqueda(solo ocurre cuando vas a la pagina 1)
    $sql = "select distinct idmat, titulo, descripcion, portada, tipo from material m left join keywords k on (k.mat_id= m.idmat) ";
    
    
    
    if(isset($_POST)){
        
        $array= $_POST;
        $sql.=armarJoin($array['tipo']);
        
        //concatenacion
        $sql.=armarWhere($array);
        
    }
    
    $sql.="order by tipo, titulo limit ".$paginacion." offset ";
    
    $mul = ($_GET['pag']-1)*$paginacion;
    
    $sql.=$mul;
    $sql.=";";
}
else{
    $s=$_SESSION['sql'];
    $array=explode('offset',$s);
    $array[0].=" offset ";
    $mul = ($_GET['pag']-1)*$paginacion;
    $array[0].=$mul.";";
    $sql=$array[0];
    
}



$_SESSION['sql'] = $sql;

$_SESSION['atras']= '../vista/biblimaterial.php?pag='.$_GET['pag'];

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
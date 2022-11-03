<?php 
/*
Update de ejemplar
El $_POST proviene de "../controlador/bibliEjemplarEdit.php"
Se utilizan los if para armar el set
*/
ob_start();
if(!isset($_SESSION))session_start();
//copio _POST a otras variable
require_once('../accesos/biblifiltrar.php');


$array=$_POST;

 
    $set="";
    $a=0;
    
        
    if($array['cce'] != $array['ce']){
        if($a==1)
            $set.=", ";
        $set.=" codigo_externo='".$array['ce']."' ";
        $a=1;
    }
    /*
    if($array['ces'] != $array['es']){
        if($a==1)
            $set.=", ";
            $set.=" estado='".$array['es']."' ";
            $a=1;
    }*/
    if($array['cprop'] != $array['propietario']){
        if($a==1)
            $set.=", ";
            $set.=" propietario='".$array['propietario']."' ";
            $a=1;
    }
    if($array['disponibilidad']!=$array['cdis']){
        if($a==1)
            $set.=", ";
            $set.=" disponibilidad='".$array['disponibilidad']."' ";
            $a=1;
    }
    if($array['condicion']!=$array['ccon']){
        if($a==1)
            $set.=", ";
            $set.=" condicion='".$array['condicion']."' ";
            $a=1;
    }
    

        
                
    $sql="update ejemplares set ".$set." where idejemplar='".$array['cidejem']."';";
    
    
  
    $res=0; //se coloca en cero para que no de un error si el set el vacio
     
  if($set!="")
        $res = select($sql);


$_SESSION['res']=$res;
if($res){
    $_SESSION['error']='Exito';
}
$g="location:../vista/bibliEjemplares.php?cod=".$array['idmaterial']."&tipo=".$array['tipo'];
header($g);
//echo '<script>window.location="'.$g.'"</script>';
            







?>

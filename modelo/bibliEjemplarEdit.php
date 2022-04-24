<?php 
if(!isset($_SESSION))session_start();
//copio _POST a otras variable
require_once('../accesos/biblifiltrar.php');


$array=$_POST;

 
    $set="";
    $a=0;
    
    if($array['cidejem'] != $array['idejemplar']){
        $set.=" idejemplar='".$array['idejemplar']."' ";
        $a=1;
    }
    
    if($array['cce'] != $array['ce']){
        if($a==1)
            $set.=", ";
        $set.=" codigo_externo='".$array['ce']."' ";
        $a=1;
    }
    if($array['ces'] != $array['es']){
        if($a==1)
            $set.=", ";
            $set.=" estado='".$array['es']."' ";
            $a=1;
    }
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
            echo "si";
    }
    
    

        
                
    $sql="update ejemplares set ".$set." where idmaterial='".$array['idmaterial']."' and idejemplar='".$array['cidejem']."';";
    
    
  
    $res=0;
     
  if($set!="")
        $res = select($sql);


$_SESSION['res']=$res;

$g="location:../vista/bibliEjemplares.php?cod=".$array['idmaterial']."&tipo=".$array['tipo'];
header($g);
            







?>
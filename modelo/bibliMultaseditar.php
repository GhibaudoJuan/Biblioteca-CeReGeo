<?php 
if(!isset($_SESSION))session_start();
//copio _POST a otras variable
require_once('../accesos/biblifiltrar.php');


$array=$_POST;

 
    $set="";
    $a=0;
    
    
    if($array['cdesmultado'] != $array['desmultado']){
        if($a==1)
            $set.=", ";
            $set.=" desmultado='".$array['desmultado']."' ";
            $a=1;
    }
    
    if($array['cest'] != $array['activo']){
        if($a==1)
            $set.=", ";
        $set.=" multa_estado='".$array['activo']."' ";
        $a=1;
    }
        
                
    $sql="update multas set ".$set." where idmulta='".$array['idmulta']."';";
    
     
  if($set!="")
        $res = select($sql);


$_SESSION['res']=$res;

header('location:../vista/bibliMultas.php');


?>
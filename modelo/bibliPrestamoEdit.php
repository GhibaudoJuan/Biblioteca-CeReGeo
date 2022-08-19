<?php 
if(!isset($_SESSION))session_start();
//copio _POST a otras variable
require_once('../accesos/biblifiltrar.php');


$array=$_POST;

 
    $set="";
    $a=0;
    
    if($array['cdesde'] != $array['desde']){
        $set.=" desde='".$array['desde']."' ";
        $a=1;
    }
    
    if($array['chasta'] != $array['hasta']){
        if($a==1)
            $set.=", ";
        $set.=" hasta='".$array['hasta']."' ";
        $a=1;
    }
    if($array['cdevuelto'] != $array['devuelto']){
        if($a==1)
            $set.=", ";
            $set.=" devuelto='".$array['devuelto']."' ";
            $a=1;
    }
    
     
                
    $sql="update prestamos set ".$set." where idpre='".$array['idpre']."' and nombre='".$array['pnom']."';";
    
     
  if($set!="")
        $res = select($sql);


$_SESSION['res']=$res;
if($res){
    $_SESSION['error']='Exito';
}
header('location:../vista/bibliPrestamos.php');
            







?>
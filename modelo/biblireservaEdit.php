<?php 
if(!isset($_SESSION))session_start();
//copio _POST a otras variable
require_once('../accesos/biblifiltrar.php');


$array=$_POST;


    $set="";
    $a=0;
    
    if($array['fecha'] != $array['resdesde']){
        $set.=" fecha='".$array['fecha']."' ";
        $a=1;
    }
   
 
                
    $sql="update reservas set ".$set." where idres='".$array['idres']."' and nombre='".$array['resnom']."';";
    

  if($set!="")
        $res = select($sql);


$_SESSION['res']=$res;

header('location:../vista/biblireserva.php');
            






?>
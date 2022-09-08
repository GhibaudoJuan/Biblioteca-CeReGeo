<?php 
/* actualizacion de la infrmacion del contenido*/
if(!isset($_SESSION))session_start();
//copio _POST a otras variable
require_once('../accesos/biblifiltrar.php');


$array=$_POST;
$compro=$_SESSION['listaactualizar'];
unset($_SESSION['listaactualizar']);




$portada=$_FILES['portada']['name'];


//tabla material
    $lista=array('portada','descripcion','titulo','mes','anio','idioma');
    $a=0;
    $b=0;
    $set1='';
    $set2='';
    foreach ($array as $clave=>$valor){
        $h=array_search($clave,$lista);
       
        if(!$h){
            //armo string para las tablas de tipo
         if($valor!=$compro[$clave]){
              if($b==1)
                 $set2.=",";
                 $set2.=$clave."='". $valor."'";
                 $b=1;
                
         }
        }
         else{
             //armo string para material
             if($valor!=$compro[$clave]){
                 if($a==1)
                     $set1.=",";
                     $set1.=$clave."='". $valor."'";
                     $a=1;
                  
             }
         }
    }
   

//portada
    if($portada!=''){
        subirimagen('portada');
        if($a==1)
            $set1.=",";
            $set1.= "portada ='".$portada."'";
    }

$sql1="update material set ".$set1." where idmat='".$compro['idmat']."'";

//tablas de tipo
switch ($array['tipo']){
    case 'Libro':
        $sql2="update libros set ".$set2." where idlibro='".$compro['idmat']."'";
        break;
    case 'Mapa':
        $sql2="update mapas set ".$set2." where idmapa='".$compro['idmat']."'";
        break;
    case 'Revista':
        $sql2="update revistas set ".$set2." where idrevista='".$compro['idmat']."'";
        break;
    case 'Final':
        $sql2="update tt set ".$set2." where idtt='".$compro['idmat']."'";
        break;
    
    
    
    
}
$sql1.=';';
$sql2.=';';

//insertar
         if($set1!=''){
    
             $res = select($sql1);
         }

         if($set2!=''){

             $res = select($sql2);
         }


$_SESSION['res']=$res;
if($res){
    $_SESSION['error']='Exito';
}


header('location:../vista/bibliEjemplares.php?cod='.$compro['idmat'].'&tipo='.$array['tipo']);
            
    







?>
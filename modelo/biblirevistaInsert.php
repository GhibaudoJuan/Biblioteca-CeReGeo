<?php
/*insertar una nueva revista*/
if(!isset($_SESSION))session_start();
//copio _POST a otras variable
require_once('../accesos/biblifiltrar.php');

include("../modelo/biblimaterialInsert.php"); 



$coleccion=$_POST['coleccion'];
$num=$_POST['num'];
$issn=$_POST['issn'];
$volumen=$_POST['volumen'];
$editorial=$_POST['editorial'];
$ejemplar=$_POST['ejemplar'];


//llamo a una funcion para limbiar datos


$issn=filtrar($issn);
$coleccion=filtrar($coleccion);
$volumen=filtrar($volumen);
$editorial=filtrar($editorial);
$ejemplar=filtrar($ejemplar);
$num=filtrar($num);




//armo un array para insertar

$seg= array(
    'idrevista'=>$id['case'],
    'issn'=>$issn,
    'volumen'=>$volumen,
    'ejemplar'=>$ejemplar,
    'reveditorial'=>$editorial,
    'coleccion'=>$coleccion,
    'num'=>$num
    
    
);



//inserto

$res = insertar('revistas',$seg);



//guardo el resultado
$_SESSION['res']=$res;
if($res){
    $_SESSION['error']='Exito';
}
//redirigo

$link='location:../vista/bibliEjemplares.php?cod='.$id['case'].'&tipo=Revista';
header($link);

?>
<?php

if(!isset($_SESSION))session_start();
//copio _POST a otras variable

require_once('../accesos/biblifiltrar.php');
include("../modelo/biblimaterialInsert.php"); 


$hoja=$_POST['hoja'];
$escala=$_POST['escala'];
$localidad=$_POST['localidad'];
$provincia=$_POST['provincia'];
$pais=$_POST['pais'];
$tipom=$_POST['tipom'];



//llamo a una funcion para limbiar datos

$localidad=filtrar($localidad);
$hoja=filtrar($hoja);
$provincia=filtrar($provincia);
$pais=filtrar($pais);
$tipom=filtrar($tipom);
$escala=filtrar($escala);




//armo un array para insertar

$seg= array(
    'idmapa'=>$id,
    'hoja'=>$hoja,
    'escala'=>$escala,
    'localidad'=>$localidad,
   'provincia'=>$provincia,
    'pais'=>$pais,
   'tipom'=>$tipom,
);



//inserto

$res = insertar('mapas',$seg);


//guardo el resultado
$_SESSION['res']=$res;
//redirigo
$link='location:../vista/bibliEjemplares.php?cod='.$id.'&tipo=Mapa';
header($link);

?>
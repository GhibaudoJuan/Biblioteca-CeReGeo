<?php
/*
Insert de ejemplar
El $_POST proviene de "../controlador/bibliEjemplarInsert.php"

*/
if(!isset($_SESSION))session_start();
//copio _POST a otras variable
require_once('../accesos/biblifiltrar.php');


$idmat=$_POST['idmaterial'];
$idejem=$_POST['idejemplar'];
$prop=$_POST['propietario'];
$dis=$_POST['disponibilidad'];
$ce=$_POST['ce'];

if($dis=='')
    $dis='false';

//llamo a una funcion para limbiar datos

$idmat=filtrar($idmat);
$idejem=filtrar($idejem);
$prop=filtrar($prop);
$ce=filtrar($ce);






    	//armo un array para insertar
    	    	
    	$seg= array(
    	    'idmaterial'=>$idmat,
    	    'idejemplar'=>$idejem,
    	    'codigo_externo'=>$ce,
    	    'propietario'=>$prop,
    	    'disponibilidad'=>$dis,
    	    'estado'=>'l'

    	);
    	
    	
    	
    //inserto
    	
    	$res = insertar('ejemplares',$seg);
    	
    	
    //guardo el resultado
    	$_SESSION['res']=$res;
    	//redirigo
   	
    	
    	    $g="location:../vista/bibliEjemplares.php?cod=".$_POST['idmaterial']."&tipo=".$_POST['tipo'];
    	    header($g);
    	
	 

?>

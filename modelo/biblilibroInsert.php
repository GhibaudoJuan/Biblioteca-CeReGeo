<?php
/* insertar un nuevo libro*/
ob_start();
if(!isset($_SESSION))session_start();
//copio _POST a otras variable
require_once('../accesos/biblifiltrar.php');
include("../modelo/biblimaterialInsert.php"); 




$autores=$_POST['autor'];
$edicion=$_POST['edicion'];
$tomo=$_POST['tomo'];
$editorial=$_POST['editorial'];
$isbn=$_POST['isbn'];



//llamo a una funcion para limbiar datos

$autores=filtrar($autores);
$edicion=filtrar($edicion);
$tomo=filtrar($tomo);
$editorial=filtrar($editorial);
$isbn=filtrar($isbn);





    	//armo un array para insertar
    	    	
    	$seg= array(
    	    'idlibro'=>$id['case'],
    	    'autor'=>$autores,
    	    'edicion'=>$edicion,
    	    'tomo'=>$tomo,
    	    'editorial'=>$editorial,
    	    'isbn'=>$isbn

    	);
    	
    	
    	
    //inserto
    	
    	$res = insertar('libros',$seg);
    	

    	
    //guardo el resultado
    	$_SESSION['res']=$res;
    	if($res){
    	    $_SESSION['error']='Exito';
    	}
    	//redirigo
    	$link='../vista/bibliEjemplares.php?cod='.$id['case'].'&tipo=Libro';
    	header('location:'.$link);
    	//echo '<script>window.location="'.$link.'"</script>';
?>
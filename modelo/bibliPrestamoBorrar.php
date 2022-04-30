<?php

if(!isset($_SESSION))session_start();
//copio _POST a otras variable
require_once('../accesos/biblifiltrar.php');


$array=$_POST;

//armo el select
$sql = "delete from prestamos where idpre='" .$array['idpre']."' and nombre ='".$array['nombre']."';";
//ejecuto funcion
	$res = select($sql);
	
   //guardo el resultado
	$_SESSION['res']=$res;
	//redirigo
	header('location:../vista/bibliPrestamos.php');	

?>
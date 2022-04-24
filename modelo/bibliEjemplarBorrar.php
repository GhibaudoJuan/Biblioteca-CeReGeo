<?php

if(!isset($_SESSION))session_start();
//copio _POST a otras variable
require_once('../accesos/biblifiltrar.php');


$array=$_POST;

//armo el select
$sql = "delete from ejemplares where idmaterial='" .$array['idmaterial']."' and idejemplar ='".$array['idejemplar']."';";
//ejecuto funcion
	$res = select($sql);
	

	
   //guardo el resultado
	$_SESSION['res']=$res;
	//redirigo

	$g="location:../vista/bibliEjemplares.php?cod=".$_POST['idmaterial']."&tipo=".$_POST['tipo'];
	header($g);

?>
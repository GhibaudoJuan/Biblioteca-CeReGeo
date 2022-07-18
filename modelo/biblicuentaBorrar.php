<?php
//inicio secion
if(!isset($_SESSION))session_start();
require_once('../accesos/validacion.php');
validaracceso(0);


//copio _POST a otras variable
$user=$_POST['id'];

require_once('../accesos/biblifiltrar.php');

/*
$sql="select nombreuser from cuenta where nombreuser ='".$user."'";

if(pg_num_rows(select($sql))=='1'){
    $_SESSION['conf3']= true;
    */
//armo el select
$sql = "delete from cuenta where nombreuser='".$user."'";
//ejecuto funcion
	$res = select($sql);
	
   //guardo el resultado
	$_SESSION['res']=$res;
	//redirigo
	header('location:../vista/bibliCuenta.php');	
/*
}
else{
    //Guargo error
	$_SESSION['conf3']= false ;
	header('location:../vista/biblicuenta.php');
}*/
?>
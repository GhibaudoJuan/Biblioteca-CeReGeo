<?php
/* borrar cuenta*/
//inicio secion
ob_start();
if(!isset($_SESSION))session_start();
require_once('../accesos/validacion.php');
validaracceso(0);


//copio _POST a otras variable
$user=$_POST['id'];

require_once('../accesos/biblifiltrar.php');


//armo el select
$sql = "delete from cuenta where idcuenta='".$user."'";
//ejecuto funcion
	$res = select($sql);
	
   //guardo el resultado
	$_SESSION['res']=$res;
	if($res){
	    $_SESSION['error']='Exito';
	}
	
	//redirigo
	header('location:../vista/bibliCuenta.php');	
//echo '<script>window.location="../vista/bibliCuenta.php"</script>';
?>
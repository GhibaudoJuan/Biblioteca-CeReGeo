<?php
/*eliminacion de un prestamo*/
ob_start();
if(!isset($_SESSION))session_start();
//copio _POST a otras variable
require_once('../accesos/biblifiltrar.php');
require_once('../accesos/validacion.php');
validaracceso(1);

$array=$_POST;

//armo el select
$sql = "delete from prestamos where idpre='" .$array['idpre']."' and nombre ='".$array['nombre']."';";
//ejecuto funcion
	$res = select($sql);
	
   //guardo el resultado
	$_SESSION['res']=$res;
	if($res){
	    $_SESSION['error']='Exito';
	}
	//redirigo
	header('location:../vista/bibliPrestamos.php');	
	//echo '<script>window.location="../vista/bibliPrestamos.php"</script>';

?>
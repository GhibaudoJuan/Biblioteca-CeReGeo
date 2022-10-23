<?php
/*borrar un reporte del servidor*/
//inicio secion
ob_start();
if(!isset($_SESSION))session_start();


unlink($_POST['dir']);

	header('location:../vista/bibliReportes.php');	
	//echo '<script>window.location="../vista/bibliReportes.php"</script>';
?>
<?php
//inicio secion
if(!isset($_SESSION))session_start();


unlink($_POST['dir']);

	header('location:../vista/bibliReportes.php');	

?>
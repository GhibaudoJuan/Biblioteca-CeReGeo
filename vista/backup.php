<?php 
if(!isset($_SESSION))session_start();


require_once("../accesos/biblifiltrar.php");



?>









<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Backup</title>

<!-- cargamos los estilos -->
<?php include("style/biblicss.html"); ?>


<body>
	
	
	
	


	<header class="titulo" ><h2>Backup</h2></header>
	<!-- separado del menu-->
	<main>
	
	<?php include("../controlador/backup.php")?>
	</main>
	
	
	
	
	
	
	
	
	
	
	
<?php #include("../modelo/backup.php"); ?>
	
	<!-- Menu -->
	<div class="fondo">  
	<?php include("../controlador/biblimenu.php"); 

	?>
	</div> 




</body>


</html>



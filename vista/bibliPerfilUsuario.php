<?php 
if(!isset($_SESSION))session_start();
require_once("../accesos/biblifiltrar.php");
require_once("../accesos/validacion.php");

?>










<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Mi Perfil</title>

<!-- cargamos los estilos -->
<?php include("style/biblicss.html"); ?>

</head>
<body>



	<header class="titulo" ><h2>Mi Perfil</h2></header>
	<!-- separado del menu-->
	<main>
	
	
	
	<div class="divicion">
	<div style="width:30rem;">
	<?php include("../controlador/bibliPerfilUsuario.php"); ?>

	</div>
	
	</div>
	
	
	
	    
	</main>
	
	<!-- Menu -->
	<div class="fondo">  
	<?php include("../controlador/biblimenu.php"); 

	?>
	</div> 
<?php include("javascript/pluginBootstrap.html"); ?>
</body>


</html>


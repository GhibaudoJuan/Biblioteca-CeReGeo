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
	
	<div class="rela" style="width:50%;left:50px;">
	
	
	
	<?php include("../controlador/bibliPerfilUsuario.php"); ?>
	<?php include("../modelo/biblimail.php"); ?>
	
	
	</div>
	
	
	
	    
	</main>
	
	<!-- Menu -->
	<div class="fondo">  
	<?php include("../controlador/biblimenu.php"); 

	?>
	</div> 

</body>


</html>

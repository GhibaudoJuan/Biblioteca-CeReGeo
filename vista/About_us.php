<?php
/*vista about us
 *muestra datos sobre el proyecto 
 */
if(!isset($_SESSION))session_start();

?>











<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>About us</title>

<!-- cargamos los estilos -->
<?php include("style/biblicss.html"); ?>

</head>
<body >



	<header class="titulo"><h2>About us</h2></header>
	<main style="text-align:center">
	<span>Proyecto de fin de carrera de Analista de Sistemas - UADER para la material Taller de Integracion.</span><br><br>
	<span>Programador Principal:</span><br>
	<span> Juan Manuel Ghibaudo</span><br><br>
	<span>Supervisores: </span><br>
	<span>Diaz Santiago Ra&uacutel</span><br>
	 <span>Francisco M. Viva Mayer</span><br>
	 <span>Sonia Vera</span><br>
	
    </main>
	<!-- Menu -->
	<div class="fondo">  
	<?php include("../controlador/biblimenu.php"); 

	?>
	</div>
	
	
	<footer style="">
	<?php include("../controlador/footer.php");?>
	</footer>
	<?php include("../controlador/vent_error.php");?>





<?php include("javascript/pluginBootstrap.html"); ?>
</body>


</html>




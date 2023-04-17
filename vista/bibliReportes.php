<?php
/*vista reportes
 * muestra la informacion sobre los reportes
 */
if(!isset($_SESSION))session_start();
require_once("../accesos/validacion.php");
validaracceso(1);

require_once("../accesos/biblifiltrar.php");



?>











<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Reportes</title>

<!-- cargamos los estilos -->
<?php include("style/biblicss.html"); ?>
<style type="text/css">
.nueva{
width:10rem!important;
left:30rem;
}

</style>
</head>
<body >



	 <header class="titulo" ><h2>Reportes</h2></header>
	 <main class="flex">
	
	<!-- Tabla -->
	<div  class="tabladiv ajuste" >
	<?php include("../modelo/bibliReportesselect.php"); ?>
	</div>
	<div class="ajuste" style="max-width: 25rem; padding-left:1rem;padding-right:1rem;">
	<?php include("../controlador/biblireportes.php")?>
	</div>
	
	
	
	
	
	
	
	</main>

	<!-- Menu -->
	<div class="fondo">  
	<?php include("../controlador/biblimenu.php"); 

	?>
	</div>
	
	<footer style="">
	<?php include("../controlador/footer.php");?>
	</footer>
	

<script type="text/javascript">
conftabla('reportes','<?php echo $_SESSION['tipouser']?>');
</script>
<?php include("javascript/pluginBootstrap.html"); ?>
</body>


</html>
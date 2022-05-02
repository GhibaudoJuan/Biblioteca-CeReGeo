<?php
if(!isset($_SESSION))session_start();
require_once("../accesos/validacion.php");


require_once("../accesos/biblifiltrar.php");

    
    
    $sql = "select nombre, fecha, descripcion
            from reportes ";

$_SESSION['sql'] = $sql;

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
	<?php include("../controlador/biblireportes.php")?>
	<div  class="tabladiv ajuste" >
	<?php include("../modelo/bibliReportesselect.php"); ?>
	
	
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
conftabla();
</script>
</body>


</html>
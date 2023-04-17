<?php 
/*vista material
 * muestra la informacion sobre el contenido de la biblioteca
 */
if(!isset($_SESSION))session_start();


require_once("../accesos/biblifiltrar.php");
require_once("../accesos/conf.php");

?>









<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Biblioteca</title>

<!-- cargamos los estilos -->
<?php include("style/biblicss.html"); ?>

<style type="text/css">
.tabladiv{
    width:77%;
}



</style>

</head>
<body>



	<header class="titulo" ><h2>Biblioteca</h2></header>
	<!-- separado del menu-->
	<main>
	
	
	<!-- Tabla -->
	<div  class="tabladiv top-20 flex" style="left:310px;">
	<?php include("../modelo/biblimaterialSelect.php"); ?>
	
	
	<!-- -------------paginacion---------------- -->
	<div class="paginacion1">
	<ul style="padding:1rem;">
  		<li><a id="ant" href="../vista/biblimaterial.php?pag=<?php echo $_GET['pag']-1;?> ">Anterior</a></li>
   		<li ><a id="sig" href="../vista/biblimaterial.php?pag=<?php echo $_GET['pag']+1;?>">Siguiente</a></li>
  	</ul>
	</div>	
	
	<!-- -------------paginacion---------------- -->
	
	
	
	
	</div>
	<!-- Buscar avanzada -->
	
	<div class="abso top-20" style="width:300px;height:100%;left:0;">
	<?php if(isset($_SESSION['tipouser'])&&($_SESSION['tipouser']<'2')):?>
	<div>
	<form action="../vista/bibliNuevo.php" method="post">
	<div style="text-align:center;">
	<button type="submit"  class="indexbutton" >Nuevo</button>
	</div>
	</form>
	
	</div>
	<?php endif;?>
	<div class="sticky top-0">
	<?php include("../controlador/biblimaterialBuscarAV.php"); ?>
	</div>
	</div>
	
	<!-- Buscar avanzada -->
	
	
	<!-- Buscar -->
	<div class="abso" style="top:0;right:0;">
	<?php include("../controlador/biblimaterialBuscar.php"); ?>
	</div>
    <!-- Buscar -->
	
	
	</main>
	
    
	
	<!-- Menu -->
	<div class="fondo">  
	<?php include("../controlador/biblimenu.php");?>
	</div> 
	<div style="padding:40px;" ></div>
	<footer>
	<?php include("../controlador/footer.php");?>
	</footer>
	
	<?php include("../controlador/vent_error.php");?>
	
	



<script type="text/javascript">
pagant('ant','<?php echo $_GET['pag'];?>');
pagsig('sig','<?php echo $count;?>');

</script>




<?php include("javascript/pluginBootstrap.html"); ?>
</body>


</html>




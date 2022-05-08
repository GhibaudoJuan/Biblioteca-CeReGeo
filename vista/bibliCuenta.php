<?php
if(!isset($_SESSION))session_start();

require_once("../accesos/validacion.php");
validaracceso(0);
require_once("../accesos/biblifiltrar.php");


$sql = "select idcuenta, nombreuser, nombre, email, nombrecuenta from cuenta c inner join tipocuenta t on (c.tipo=t.id) ";


$_SESSION['sql'] = $sql;


?>











<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Cuentas</title>

<!-- cargamos los estilos -->
<?php include("style/biblicss.html"); ?>


</head>



<body >


	<header class="titulo" ><h2>Cuenta</h2></header>
	
	<main class="flex"> 
	
	<!-- Tabla -->
	<div  class="tabladiv ajuste">
	<?php include("../modelo/biblicuentaSelect.php"); ?>

	</div>
	
		<div class="ajuste r-3 m-1">
	
		<?php if(isset($_SESSION['tipouser'])&&($_SESSION['tipouser']<'2')):?>
		
	
	<!-- Nuevo -->
	<a href="#miModal" class="sindec"><button type="submit" class="indexbutton" onclick="mostrar('insert')">Nuevo</button> </a>
	<!-- Nuevo -->
	<!-- Actualizar -->
		
		<a href="#miModal" class="sindec"><button type="submit" id="botoneditar" class="indexbutton" onclick="mostrar('actualizar')">Editar</button> </a>
	<!-- Actualizar -->	
		
	<!-- Borrar -->		
		<a href="#miModal" class="sindec"><button type="submit" id="botonborrar" class="indexbutton" onclick="mostrar('borrar')">Borrar</button> </a>
		
	<!-- Borrar -->		
		<?php endif;?>
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
	<?php include("../controlador/vent_error.php");?>
	
<div id="miModal" class="modal">
  <div class="modal-contenido modal-buscar" id="insert" style="display:none;">
    <div class="alignr"><a href="#" class="sindec negro" onclick="ocultar()">X</a></div>
    <h2>Nuevo</h2>
     <?php include("../controlador/biblicuentaInsert.php"); ?>
  </div> 
  <div class="modal-contenido modal-buscar" id="actualizar" style="display:none;">
    <div class="alignr"><a href="#" class="sindec negro" onclick="ocultar()">X</a></div>
    <h2>Actualizar</h2>
     <?php include("../controlador/biblicuentaActualizar.php"); ?>
  </div> 
 <div class="modal-contenido modal-borrar" id="borrar" style="display:none;">
    <div class="alignr"><a href="#" class="sindec negro"  onclick="ocultar()">X</a></div>
    <h2>Borrar</h2>
     <?php include("../controlador/biblicuentaBorrar.php"); ?>
  </div> 
</div>
	
<script type="text/javascript">
conftabla();

</script>



</body>


</html>




<?php
if(!isset($_SESSION))session_start();
require_once("../accesos/validacion.php");
require_once("../accesos/biblifiltrar.php");



    //select de bibliotecario
    $sql = "select idres, nombre, material, titulo, ejemplar, fecha,(CASE WHEN activo ='True' THEN 'Activo' ELSE 'Cerrado' END ) as activo
            from reservas re inner join material ma on (ma.idmat= re.material) ";
    if(isset($_SESSION['tipouser'])&&($_SESSION['tipouser']>'1')){
      
//select de estudiante
    $where= " where nombre = '". $_SESSION['nombre'] ."'";
    $sql.=$where;
    
    }



$_SESSION['sql'] = $sql;
$delete = 'delete from reservas '.$where.';';
$retorno='reserva';
?>











<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Reservas</title>

<!-- cargamos los estilos -->
<?php include("style/biblicss.html"); ?>

</head>
<body >



	<header class="titulo"><h2>Reserva</h2></header>
	<main class="flex">
	
	<!-- Tabla -->
	<div  class="tabladiv ajuste">
	<?php include("../modelo/biblireservaSelect.php"); ?>
	
	</div>
	
	<div class="ajuste r-3 m-1">
	<?php if(isset($_SESSION['tipouser'])&&($_SESSION['tipouser']<'2')):?>
	<!-- Nuevo -->
	<a href="#miModal" class="sindec"><button type="submit" id="botonnuevo" class="indexbutton" onclick="mostrar('nuevo')">Nuevo</button> </a>
	<?php endif;?>
	<!-- Editar -->	
		<a href="#miModal" class="sindec"><button type="submit" id="botoneditar" class="indexbutton" onclick="mostrar('actualizar')">Editar</button> </a>
	<!-- Borrar -->		
		<a href="#miModal" class="sindec"><button type="submit" id="botonborrar" class="indexbutton" onclick="mostrar('borrar')">Borrar</button> </a>
		
	<!-- Borrar Todo -->		
		<a href="#miModal" class="sindec"><button type="submit" class="indexbutton" onclick="mostrar('borrartodo')">Borrar Todo</button> </a>
		
	
		<?php if(isset($_SESSION['tipouser'])&&($_SESSION['tipouser']<'2')):?>
		 <!-- Pasar a Prestamo -->	
		 <a href="#miModal" class="sindec"><button type="submit" id="botonpres" class="indexbutton" onclick="mostrar('prestamo')">Prestamo</button> </a>
		 
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
   <div class="modal-contenido modal-buscar" id="nuevo" style="display:none;">
    <div class="alignr"><a href="#" class="sindec negro"  onclick="ocultar()">X</a></div>
    <h2>Nuevo</h2>
    <?php include("../controlador/biblireservaNuevo.php") ?>
  </div>  
  <div class="modal-contenido modal-buscar" id="actualizar" style="display:none;">
    <div class="alignr"><a href="#" class="sindec negro"  onclick="ocultar()">X</a></div>
    <h2>Editar</h2>
    <?php include("../controlador/biblireservaEdit.php") ?>
  </div>  
  <div class="modal-contenido modal-buscar" id="prestamo" style="display:none;">
    <div class="alignr"><a href="#" class="sindec negro"  onclick="ocultar()">X</a></div>
    <h2>Prestamo</h2>
    <?php include("../controlador/biblireservaPrestamo.php"); ?>
  </div>  

  <div class="modal-contenido modal-borrar" id="borrar" style="display:none;">
    <div class="alignr"><a href="#" class="sindec negro"  onclick="ocultar()">X</a></div>
    <h2>Borrar</h2>
    <?php include("../controlador/biblireservaBorrar.php"); ?>
  </div> 
  <div class="modal-contenido modal-borrar" id="borrartodo" style="display:none;">
    <div class="alignr"><a href="#" class="sindec negro"  onclick="ocultar()">X</a></div>
    <h2>Borrar Todo</h2>
    <?php include("../controlador/borrarTodo.php") ?>
  </div> 
</div>


<script type="text/javascript">
conftabla(<?php echo $_SESSION['tipouser'];?>);
</script>
</body>


</html>




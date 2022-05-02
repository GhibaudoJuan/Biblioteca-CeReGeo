<?php
if(!isset($_SESSION))session_start();
require_once("../accesos/validacion.php");


require_once("../accesos/biblifiltrar.php");

    
    $sql = "select idpre,nombre, titulo,ejemplar, desde, hasta, devuelto, (CASE WHEN activo ='True' THEN 'Activo' ELSE 'Cerrado' END ) as activo
            from prestamos re inner join material ma on (ma.idmat= re.material) ";
    //select de bibliotecarios
    if(isset($_SESSION['tipouser'])&&($_SESSION['tipouser']>'1')){
    
//select de estudiante
    $where= " where nombre = '". $_SESSION['nombre'] ."'";
    $sql.=$where;
    }

    
    

$_SESSION['sql'] = $sql;
$delete = 'delete from prestamos '.$where.';';
$retorno = 'prestamo';

?>











<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Prestamos</title>

<!-- cargamos los estilos -->
<?php include("style/biblicss.html"); ?>

</head>
<body >



	 <header class="titulo" ><h2>Prestamo</h2></header>
	<main class="flex">
	
	<!-- Tabla -->
	<div  class="tabladiv ajuste">
	<?php include("../modelo/bibliprestamoSelect.php"); ?>
	
	</div>
	<?php if(isset($_SESSION['tipouser'])&&($_SESSION['tipouser']<'2')):?>
	<div class="ajuste r-3 m-1">
	<!-- Nuevo -->
		<a href="#miModal" class="sindec"><button type="submit" id="botonnuevo" class="indexbutton" onclick="mostrar('nuevo')">Nuevo</button> </a>
	<!-- Actualizar -->
		<a href="#miModal" class="sindec"><button type="submit" id="botoneditar" class="indexbutton" onclick="mostrar('actualizar')">Editar</button> </a>
			
	<!-- Borrar -->		
		<a href="#miModal" class="sindec"><button type="submit" id="botonborrar" class="indexbutton" onclick="mostrar('borrar')">Borrar</button> </a>
		
		
	<!-- Borrar Todo -->		
		<a href="#miModal" class="sindec"><button type="submit" class="indexbutton" onclick="mostrar('borrartodo')">Borrar Todo</button> </a>
	<!-- Devolucion -->	
		<a href="#miModal" class="sindec"><button type="submit" class="indexbutton" onclick="mostrar('prestamo')">Devolucion</button> </a>
	
	</div>
	<?php endif;?>
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
    <a href="#" class="sindec negro"  onclick="ocultar()">X</a>
    <h2>Nuevo</h2>
    <?php include("../controlador/bibliprestamoNuevo.php") ?>
  </div>  
  
  <div class="modal-contenido modal-buscar" id="actualizar" style="display:none;">
    <a href="#" class="sindec negro"  onclick="ocultar()">X</a>
    <h2>Actualizar</h2>
    <?php include("../controlador/bibliPrestamoEdit.php") ?>
  </div>  

  <div class="modal-contenido modal-borrar" id="borrar" style="display:none;">
    <a href="#" class="sindec negro"  onclick="ocultar()">X</a>
    <h2>Borrar</h2>
    <?php include("../controlador/bibliPrestamoBorrar.php") ?>
  </div> 
  <div class="modal-contenido modal-borrar" id="borrartodo" style="display:none;">
    <a href="#" class="sindec negro"  onclick="ocultar()">X</a>
    <h2>Borrar Todo</h2>
    <?php include("../controlador/borrarTodo.php") ?>
  </div> 
  <div class="modal-contenido modal-buscar" id="prestamo" style="display:none;">
    <a href="#" class="sindec negro"  onclick="ocultar()">X</a>
    <h2>Devolucion</h2>
    <?php include("../controlador/bibliDevolucion.php") ?>
  </div>  
</div>


<script type="text/javascript">
conftabla();

</script>
</body>


</html>
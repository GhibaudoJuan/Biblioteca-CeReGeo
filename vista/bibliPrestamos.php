<?php
if(!isset($_SESSION))session_start();
require_once("../accesos/validacion.php");


require_once("../accesos/biblifiltrar.php");

    
    $sql = "select idpre,nombre, titulo,ejemplar, desde, hasta, devuelto, (CASE WHEN activo ='True' THEN 'Activo' ELSE 'Cerrado' END ) as activo
            from prestamos re inner join material ma on (ma.idmat= re.material) ";
    //select de bibliotecarios
    if(isset($_SESSION['tipouser'])&&($_SESSION['tipouser']<'2')){
       
        
        
        if(isset($_POST)){
                     
            $array= $_POST;
            //concatenacion
            
            
            $where=armarWhereprestamo($array, true);
        }
    }
    else{
    
    
//select de estudiante
    $where= " where nombre = '". $_SESSION['nombre'] ."'";


    if(isset($_POST)){

   
    $array= $_POST;
    //concatenacion
    
    
    $where.=armarWhereprestamo($array, false);
    }

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
	
	<div class="ajuste r-3 m-1">
	<!-- Actualizar -->
		<?php if(isset($_SESSION['tipouser'])&&($_SESSION['tipouser']<'2')):?>
		<a href="#miModal" class="sindec"><button type="submit" id="botoneditar" class="indexbutton" onclick="mostrar('actualizar')">Editar</button> </a>
	<!-- Actualizar -->	
		
	<!-- Borrar -->		
		<a href="#miModal" class="sindec"><button type="submit" id="botonborrar" class="indexbutton" onclick="mostrar('borrar')">Borrar</button> </a>
		
	<!-- Borrar -->		
	<!-- Borrar Todo -->		
		<a href="#miModal" class="sindec"><button type="submit" class="indexbutton" onclick="mostrar('borrartodo')">Borrar todo</button> </a>
		
	<!-- Borrar Todo-->		
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
</div>


<script type="text/javascript">
conftabla();

</script>
</body>


</html>
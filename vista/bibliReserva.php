<?php
if(!isset($_SESSION))session_start();
require_once("../accesos/validacion.php");
require_once("../accesos/biblifiltrar.php");



    //select de bibliotecario
    $sql = "select idres, nombre, material, titulo, fecha,(CASE WHEN activo ='True' THEN '' ELSE 'Concretado' END ) as activo
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
	<button type="button" id="botonnuevo"   data-bs-toggle="modal" data-bs-target="#miModal" class="indexbutton" onclick="mostrar('nuevo')">Nuevo</button> 
	<?php endif;?>
	<!-- Editar -->	
	<button type="button" id="botoneditar" data-bs-toggle="modal" data-bs-target="#miModal" disabled class="indexbutton" onclick="mostrar('actualizar')">Editar</button>
	<!-- Borrar -->		
	<button type="button" id="botonborrar"  data-bs-toggle="modal" data-bs-target="#miModal" disabled class="indexbutton" onclick="mostrar('borrar')">Borrar</button>
	<?php if(isset($_SESSION['tipouser'])&&($_SESSION['tipouser']<'2')):?>
	<!-- Borrar Todo -->	
	<?php if($_SESSION['tipouser']==0):?>
	<!-- Borrar Todo -->	
	<button type="button" class="indexbutton" data-bs-toggle="modal" data-bs-target="#miModal" onclick="mostrar('borrartodo')">Borrar Todo</button>
    <?php endif;?>
    <!-- Pasar a Prestamo -->	
	<button type="button" id="botonreserva" data-bs-toggle="modal" data-bs-target="#miModal" disabled class="indexbutton" onclick="mostrar('prestamo')">Prestamo</button>
		 
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


<div id="miModal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div  id="nuevo" style="display:none;">
   <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" >Nuevo</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="ocultar()"></button>
          </div>
          
    <?php include("../controlador/biblireservaNuevo.php") ?>

        </div>
      </div>
  </div>  
  <div  id="actualizar" style="display:none;">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" >Editar</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="ocultar()"></button>
          </div>
          
    
    <?php include("../controlador/biblireservaEdit.php") ?>
 
        </div>
      </div>
  </div>  
  <div  id="prestamo" style="display:none;">
 <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" >Prestamo</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="ocultar()"></button>
          </div>
          
    
    <?php include("../controlador/biblireservaPrestamo.php"); ?>

        </div>
      </div>
  </div>  

  <div  id="borrar" style="display:none;">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" >Borrar</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="ocultar()"></button>
          </div>
          
    
    <?php include("../controlador/biblireservaBorrar.php"); ?>
 
        </div>
      </div>
  </div> 
  <div  id="borrartodo" style="display:none;">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" >Borrar Todo</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="ocultar()"></button>
          </div>
          
    
    <?php include("../controlador/borrarTodo.php") ?>
   
        </div>
      </div>
  </div> 
</div>


<script type="text/javascript">
conftabla('reservas','<?php echo $_SESSION['tipouser']?>');
</script>
<?php include("javascript/pluginBootstrap.html"); ?>
</body>


</html>




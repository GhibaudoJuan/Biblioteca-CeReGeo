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
<button type="button" class="indexbutton" data-bs-toggle="modal" data-bs-target="#miModal" onclick="mostrar('insert')">Nuevo</button>

	<!-- Actualizar -->
		
<button type="button" id="botoneditar" disabled class="indexbutton" data-bs-toggle="modal" data-bs-target="#miModal" onclick="mostrar('actualizar')">Editar</button>
		
	<!-- Borrar -->		
<button type="button" id="botonborrar" disabled data-bs-toggle="modal" data-bs-target="#miModal" class="indexbutton" onclick="mostrar('borrar')">Borrar</button>

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
    <div id="insert" style="display:none;">	
    	<div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" >Nuevo</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="ocultar()"></button>
          </div>
          <div class="modal-body">
           <?php include("../controlador/biblicuentaInsert.php"); ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>

<div id="actualizar" style="display:none;">
   
    
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" >Actualizar</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="ocultar()"></button>
          </div>
          <div class="modal-body">
            <?php include("../controlador/biblicuentaActualizar.php"); ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
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
          <div class="modal-body">
           <?php include("../controlador/biblicuentaBorrar.php"); ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
     
     
     </div> 
      
  
  
  
  
</div>
	
	




<?php include("javascript/pluginBootstrap.html"); ?>
	
	
<script type="text/javascript">
conftabla('cuentas');


</script>



</body>


</html>




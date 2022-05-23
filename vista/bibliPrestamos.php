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



	 <header class="titulo" ><h2>Pr&eacutestamos</h2></header>
	<main class="flex">
	
	<!-- Tabla -->
	<div  class="tabladiv ajuste">
	<?php include("../modelo/bibliprestamoSelect.php"); ?>
	
	</div>
	<?php if(isset($_SESSION['tipouser'])&&($_SESSION['tipouser']<'2')):?>
	<div class="ajuste r-3 m-1">
	<!-- Nuevo -->
<button type="button" id="botonnuevo" data-bs-toggle="modal" data-bs-target="#miModal" class="indexbutton" onclick="mostrar('nuevo')">Nuevo</button>
	<!-- Actualizar -->
<button type="button" id="botoneditar" data-bs-toggle="modal" data-bs-target="#miModal" disabled class="indexbutton" onclick="mostrar('actualizar')">Editar</button>
			
	<!-- Borrar -->		
<button type="button" id="botonborrar" data-bs-toggle="modal" data-bs-target="#miModal" disabled class="indexbutton" onclick="mostrar('borrar')">Borrar</button>
		
		
	<!-- Borrar Todo -->		
<button type="button" class="indexbutton" data-bs-toggle="modal" data-bs-target="#miModal" onclick="mostrar('borrartodo')">Borrar Todo</button>
	<!-- Devolucion -->	
<button type="button" id="botonprestamo" data-bs-toggle="modal" data-bs-target="#miModal" disabled class="indexbutton" onclick="mostrar('prestamo')">Devolucion</button>
	
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
  <div id="nuevo" style="display:none;">
 
    	<div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" >Nuevo</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="ocultar()"></button>
          </div>
          <div class="modal-body">
            <?php include("../controlador/bibliprestamoNuevo.php") ?>
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
             <?php include("../controlador/bibliPrestamoEdit.php") ?>
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
            <h5 class="modal-title" >Nuevo</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="ocultar()"></button>
          </div>
          <div class="modal-body">
           <?php include("../controlador/bibliPrestamoBorrar.php") ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
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
          <div class="modal-body">
          <?php include("../controlador/borrarTodo.php") ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    
  </div> 
  <div  id="prestamo" style="display:none;">
  <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" >Devolucion</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="ocultar()"></button>
          </div>
          <div class="modal-body">
            <?php include("../controlador/bibliDevolucion.php") ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    

   
  </div>  
</div>


<script type="text/javascript">
conftabla('prestamos','<?php echo $_SESSION['tipouser']?>');
document.getElementById('reservaprox').style.display="none";

</script>
<?php include("javascript/pluginBootstrap.html"); ?>
</body>


</html>
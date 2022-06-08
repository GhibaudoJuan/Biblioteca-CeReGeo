<?php
if(!isset($_SESSION))session_start();
require_once("../accesos/validacion.php");


require_once("../accesos/biblifiltrar.php");

    
    $sql = "select idmulta, nombre, desmultado, (CASE WHEN multa_estado ='True' THEN 'Activo' ELSE 'Cerrado' END ) as multa_estado
            from multas m inner join cuenta c on m.idcuenta=c.idcuenta ";
    //select de bibliotecarios
    if(isset($_SESSION['tipouser'])&&($_SESSION['tipouser']>'1')){
    
//select de estudiante
    $where= " where nombre = '". $_SESSION['nombre'] ."'";
    $sql.=$where;
    }

    
    

$_SESSION['sql'] = $sql;

$retorno = 'multas';

?>











<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Multas</title>

<!-- cargamos los estilos -->
<?php include("style/biblicss.html"); ?>

</head>
<body >



	 <header class="titulo" ><h2>Multas</h2></header>
	<main class="flex">
	
	<!-- Tabla -->
	<div  class="tabladiv ajuste">
	<?php include("../modelo/bibliMultasselect.php"); ?>
	
	</div>
	<?php if(isset($_SESSION['tipouser'])&&($_SESSION['tipouser']<'2')):?>
	<div class="ajuste r-3 m-1">
	<!-- Nuevo -->
<button type="button" id="botonnuevo" data-bs-toggle="modal" data-bs-target="#miModal" class="indexbutton" onclick="mostrar('nuevo')">Nuevo</button>
	<!-- Actualizar -->
<button type="button" id="botoneditar" data-bs-toggle="modal" data-bs-target="#miModal" disabled class="indexbutton" onclick="mostrar('actualizar')">Editar</button>
			
	<!-- Borrar -->		
<button type="button" id="botonborrar" data-bs-toggle="modal" data-bs-target="#miModal" disabled class="indexbutton" onclick="mostrar('borrar')">Borrar</button>

	
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

<div id="miModal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div id="nuevo" style="display:none;">
 
    	<div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" >Nuevo</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="ocultar()"></button>
          </div>
            <?php include("../controlador/bibliMultasinsert.php") ?>
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
         
             <?php include("../controlador/bibliMultaseditar.php") ?>
          
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
          
           <?php include("../controlador/bibliMultasborrar.php") ?>
         
        </div>
      </div>
  
  </div> 
 
  
</div>


<script type="text/javascript">
conftabla('multas','<?php echo $_SESSION['tipouser']?>');
</script>
<?php include("javascript/pluginBootstrap.html"); ?>
</body>


</html>
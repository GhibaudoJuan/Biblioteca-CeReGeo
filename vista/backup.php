<?php 
/*vista backup
 * muestra la informacion sobre los backup
 */
if(!isset($_SESSION))session_start();

require_once("../accesos/validacion.php");
validaracceso(0);
require_once("../accesos/biblifiltrar.php");



?>









<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Copia de seguridad</title>

<!-- cargamos los estilos -->
<?php include("style/biblicss.html"); ?>

<style>
main{
width:100%!important;
margin:0!important;
}
</style>

<body>
	
	
	
	


	<header class="titulo" ><h2>Copia de seguridad</h2></header>
	<!-- separado del menu-->
	<main>
	<div class="divicion" style="border-bottom: solid 1px black;">
	<div  style="width:50%;">
	<?php include("../controlador/backup.php")?>
	</div>
	</div>
	
	<header class="titulo" ><h2>Restauraci&oacuten</h2></header>
	<div style="padding:3rem;"></div>
	<div  class="divicion">
	<div  style="width:70%;"><?php include("../modelo/backupselect.php"); ?></div>
	<div class="ajuste r-3 m-1" style="">
	
	<button type="button" id="botonrestore" data-bs-toggle="modal" data-bs-target="#miModal" class="indexbutton" onclick="mostrar('restore')" disabled>Restaurar</button>
    <a id="descargar" class='sindec' target='_blank' rel='noopener noreferrer'><button type='button' class='indexbutton'>Descargar</button></a>
             
	</div>
	</div>
	
	 
	
	
	
	</main>
	<div style="padding:3rem;"></div>
	
	
	
	
	
	
	
	
	
	

	
	<!-- Menu -->
	<div class="fondo"><?php include("../controlador/biblimenu.php");?></div> 
	<footer style="">
	<?php include("../controlador/footer.php");?>
	</footer>
	<?php include("../controlador/vent_error.php");?>

<div id="miModal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div id="restore" style="display:none;">
 
    	<div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" >Restaurar</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="ocultar()"></button>
          </div>
            <?php include("../controlador/restore.php") ?>
        </div>   
    </div>
  </div>  
</div>

<script type="text/javascript">
conftabla('backup','<?php echo $_SESSION['tipouser']?>');
</script>

<?php include("javascript/pluginBootstrap.html"); ?>

</body>


</html>



<?php 
if(!isset($_SESSION))session_start();


require_once("../accesos/biblifiltrar.php");

if($_GET['pag']==1){ //genera un error, cuando se busca y se va de la pag 2 a la pag 1 entra y no carga el post de la busqueda(solo ocurre cuando vas a la pagina 1)
$sql = "select distinct idmat, titulo, descripcion, portada, tipo from material m left join keywords k on (k.mat_id= m.idmat) ";




if(isset($_POST)){

    $array= $_POST;
    $sql.=armarJoin($array['tipo']);

    //concatenacion
   $sql.=armarWhere($array);
   
   }
$sql.="order by tipo, titulo limit 24 offset ";

$mul = ($_GET['pag']-1)*24;

$sql.=$mul;
$sql.=";";
}
else{
    $s=$_SESSION['sql'];
    $array=explode('offset',$s);
    $array[0].=" offset ";
    $mul = ($_GET['pag']-1)*24;
    $array[0].=$mul.";";
    $sql=$array[0];
    
}



$_SESSION['sql'] = $sql;

$_SESSION['atras']= '../vista/biblimaterial.php?pag='.$_GET['pag'];

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
	<div  class="tabladiv top-20 flex" style=" left:310px;background-color:rgb(202,236,137);">
	<?php include("../modelo/biblimaterialSelect.php"); ?>
	
	
	<!-- -------------paginacion---------------- -->
	<div class="paginacion1">
	<ul >
  		<li><a id="ant" href="../vista/biblimaterial.php?pag=<?php echo $_GET['pag']-1;?> ">Anterior</a></li>
   		<li ><a id="sig" href="../vista/biblimaterial.php?pag=<?php echo $_GET['pag']+1;?>">Siguiente</a></li>
  	</ul>
	</div>	
	
	<!-- -------------paginacion---------------- -->
	
	
	
	
	</div>
	<!-- Buscar avanzada -->
	
	<div class="abso top-20" style="width:300px;height:100%;left:0;">
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

	<footer style="margin-top:5rem;">
	<?php include("../controlador/footer.php");?>
	</footer>
	
	<?php include("../controlador/vent_error.php");?>
	
	
 <div id="miModal" class="modal">
  <div class="modal-contenido" id="borrar" style="display:none;">
    <a href="#" class="sindec"  onclick="ocultar()">X</a>
    <h2>Buscar</h2>
    <?php include("../controlador/biblilibroBuscar.php"); ?>
  </div> 

 </div>


<script type="text/javascript">
pagant('ant','<?php echo $_GET['pag'];?>');
pagsig('sig','<?php echo $count;?>');

</script>





</body>


</html>




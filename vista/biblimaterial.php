<?php 
if(!isset($_SESSION))session_start();


require_once("../accesos/biblifiltrar.php");
require_once("../accesos/conf.php");
if($_GET['pag']==1){ //genera un error, cuando se busca y se va de la pag 2 a la pag 1 entra y no carga el post de la busqueda(solo ocurre cuando vas a la pagina 1)
$sql = "select distinct idmat, titulo, descripcion, portada, tipo from material m left join keywords k on (k.mat_id= m.idmat) ";



if(isset($_POST)){

    $array= $_POST;
    $sql.=armarJoin($array['tipo']);

    //concatenacion
   $sql.=armarWhere($array);
   
   }

$sql.="order by tipo, titulo limit ".$paginacion." offset ";

$mul = ($_GET['pag']-1)*$paginacion;

$sql.=$mul;
$sql.=";";
}
else{
    $s=$_SESSION['sql'];
    $array=explode('offset',$s);
    $array[0].=" offset ";
    $mul = ($_GET['pag']-1)*$paginacion;
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
	<div  class="tabladiv top-20 flex" style="left:310px;">
	<?php include("../modelo/biblimaterialSelect.php"); ?>
	
	
	<!-- -------------paginacion---------------- -->
	<div class="paginacion1">
	<ul style="padding:1rem;">
  		<li><a id="ant" href="../vista/biblimaterial.php?pag=<?php echo $_GET['pag']-1;?> ">Anterior</a></li>
   		<li ><a id="sig" href="../vista/biblimaterial.php?pag=<?php echo $_GET['pag']+1;?>">Siguiente</a></li>
  	</ul>
	</div>	
	
	<!-- -------------paginacion---------------- -->
	
	
	
	
	</div>
	<!-- Buscar avanzada -->
	
	<div class="abso top-20" style="width:300px;height:100%;left:0;">
	<?php if(isset($_SESSION['tipouser'])&&($_SESSION['tipouser']<'2')):?>
	<div>
	<form action="../vista/bibliNuevo.php" method="post">
	<div style="text-align:center;">
	<button type="submit"  class="indexbutton" >Nuevo</button>
	</div>
	</form>
	
	</div>
	<?php endif;?>
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
	<div style="padding:40px;" ></div>
	<footer>
	<?php include("../controlador/footer.php");?>
	</footer>
	
	<?php include("../controlador/vent_error.php");?>
	
	



<script type="text/javascript">
pagant('ant','<?php echo $_GET['pag'];?>');
pagsig('sig','<?php echo $count;?>');

</script>




<?php include("javascript/pluginBootstrap.html"); ?>
</body>


</html>




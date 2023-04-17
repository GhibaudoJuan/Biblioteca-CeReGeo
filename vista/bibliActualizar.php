<?php 
/*vista actualizar contenido
 * muestra la informacion para actualizar los datos de un contenido
 */
if(!isset($_SESSION))session_start();
require_once("../accesos/biblifiltrar.php");
require_once("../accesos/validacion.php");
validaracceso(1);


include("../modelo/bibliactualizarselect.php");
//variable para el boton de atras
$form='"'.$_SESSION['atrasejemplar'].'"';
//variable para autocompletar

?>










<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Actualizar</title>

<!-- cargamos los estilos -->
<?php include("style/biblicss.html"); ?>

<style>
.span-2{
text-align:right;
margin-right:10rem;

}
</style>


</head>
<body>



	<header class="titulo" style="top:7rem!important"><h2>Actualizar</h2></header>
	<!-- separado del menu-->
	<main style="top:8rem!important">
	
	
	<div  class ="div-ejem">
	<?php if($array['tipo']=="Libro"):?>				
	<!-- Libro -->		
	<div id="div1" class="divicion">
	<form action = "../modelo/bibliactualizar.php" enctype="multipart/form-data" method="post" >
	<?php include("../controlador/biblilibroInsert.php"); ?>	
	<?php endif;?>
	<?php if($array['tipo']=="Mapa"):?>
	<!-- Mapa -->
	<div id="div2" class="divicion">
	<form action = "../modelo/bibliactualizar.php" enctype="multipart/form-data" method="post" >
	<?php include("../controlador/biblimapaInsert.php"); ?>	
	<?php endif;?>
	<?php if($array['tipo']=="Revista"):?>
	<!-- Revista -->
	<div id="div3" class="divicion">
	<form action = "../modelo/bibliactualizar.php" enctype="multipart/form-data" method="post" >
	<?php include("../controlador/biblirevistaInsert.php"); ?>
	<?php endif;?>
	<?php if($array['tipo']=="Final"):?>
	<!-- Final -->
	<div id="div4" class="divicion">
	<form action = "../modelo/bibliactualizar.php"  enctype="multipart/form-data" method="post" >
	<?php include("../controlador/biblittInsert.php"); ?>
	<?php endif;?>
	
	<div class="alignr"><button type="submit"  class="indexbutton">Registrar</button></div>
	</form>
	</div>
	<p style="text-align: center">* Campo Obligatorio</p>
	</div>
	
	
	    
	</main>




        <!-- Boton atras -->
   		<div  class="abso atras" >
			<form action = <?php   echo $form;?> method="post">

			<button type="submit" class="indexbutton">Atras</button>

			</form>
		</div>	
		<!-- Boton atras -->
	
	<!-- Menu -->
	<div class="fondo">  
	<?php include("../controlador/biblimenu.php"); 

	?>
	</div> 

	<footer style="">
	<?php include("../controlador/footer.php");?>
	</footer>

<script>

document.this = actualizar(<?php echo json_encode($mifila); ?>);

if(document.getElementById("librocodigo"))
		document.getElementById("librocodigo").disabled ='true';


if(document.getElementById("ttcodigo"))
		document.getElementById("ttcodigo").disabled ='true';
		
if(document.getElementById("revcodigo"))
		document.getElementById("revcodigo").disabled ='true';
		
if(document.getElementById("mapacodigo"))
		document.getElementById("mapacodigo").disabled ='true';
		


</script>
<?php include("javascript/pluginBootstrap.html"); ?>
</body>


</html>




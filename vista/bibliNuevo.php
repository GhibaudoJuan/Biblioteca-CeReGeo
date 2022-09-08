<?php 
/*vista nuevo
 * muestra la informacion para agregar un nuevo contenido a la biblioteca
 */
if(!isset($_SESSION))session_start();
require_once("../accesos/biblifiltrar.php");
require_once("../accesos/validacion.php");
validaracceso(1);

if (!isset($_SESSION['res'])){
    $_SESSION['res']=0;
}
?>








<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Nuevo</title>

<!-- cargamos los estilos -->
<?php include("style/biblicss.html"); ?>

<style>


.desplega2 li{
	text-decoration:none;
	display: inline;
	padding:7px 7px;
	cursor: pointer;
}

.desplega2 li:hover {
	background-color:#577EF6;
}

.span-2{
text-align:right;
margin-right:10rem;

}

</style>


</head>
<body>



	<header class="titulo" ><h2>Nuevo</h2></header>
	<!-- separado del menu-->
	<main> 
	
	<div class="div-ejem">
	
				<div style="text-align:center;">
					<ul class="desplega2" >
						<li id="li1" onclick="funcionnuevo(li1, div1)" style="background-color: #2957ba;color:#FFF;">Libro</li>
						<li id="li2" onclick="funcionnuevo(li2, div2)" style="color:#1C43B9;">Mapa</li>
						<li id="li3" onclick="funcionnuevo(li3, div3)" style="color:#1C43B9;">Revista</li>
						<li id="li4" onclick="funcionnuevo(li4, div4)" style="color:#1C43B9;">Final</li>
					</ul>
				</div>
				
				
	<!-- Libro -->		
	<div id="div1" class="divicion" >
	<form action = "../modelo/biblilibroInsert.php" enctype="multipart/form-data" method="post" >
	<?php include("../controlador/biblilibroInsert.php"); ?>
	<div class="alignr"><button type="submit" class="indexbutton">Registrar</button></div>
	</form>
	</div>
	<!-- Mapa -->
	<div id="div2" class="divicion"  style="display:none;">
	<form action = "../modelo/biblimapaInsert.php" enctype="multipart/form-data" method="post" >
	<?php include("../controlador/biblimapaInsert.php"); ?>
	<div class="alignr"><button type="submit" class="indexbutton">Registrar</button></div>
	</form>
	</div>
	<!-- Revista -->
	<div id="div3" class="divicion"  style="display:none;">
	<form action = "../modelo/biblirevistaInsert.php" enctype="multipart/form-data" method="post" >
	<?php include("../controlador/biblirevistaInsert.php"); ?>
	<div class="alignr"><button type="submit" class="indexbutton">Registrar</button></div>
	</form>
	</div>
	<!-- Final -->
	<div id="div4" class="divicion"  style="display:none;">
	<form action = "../modelo/biblittInsert.php"  enctype="multipart/form-data" method="post" >
	<?php include("../controlador/biblittInsert.php"); ?>
	<div class="alignr"><button type="submit" class="indexbutton">Registrar</button></div>
	</form>
	
	</div>
		<p style="text-align: center">* Campo Obligatorio</p>
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
	<?php include("javascript/pluginBootstrap.html"); ?>
</body>


</html>





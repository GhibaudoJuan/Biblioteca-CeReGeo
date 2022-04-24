<?php 
if(!isset($_SESSION))session_start();
require_once("../accesos/biblifiltrar.php");
require_once("../accesos/validacion.php");
validaracceso(1);
$material= autostring("material", "idmat");

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
.indexbutton{
margin-left:25%;
}
.w-2, .w-2 >input{
width:100%!important;
}

</style>


</head>
<body>



	<header class="titulo" ><h2>Nuevo</h2></header>
	<!-- separado del menu-->
	<main class="flex">
	
	<div class="rela div-ejem">
	
				<div style="">
					<ul class="desplega2" >
						<li id="li1" onclick="funcionnuevo(li1, div1)" style="background-color: #2957ba;color:#FFF;">Libro</li>
						<li id="li2" onclick="funcionnuevo(li2, div2)" style="color:#1C43B9;">Mapa</li>
						<li id="li3" onclick="funcionnuevo(li3, div3)" style="color:#1C43B9;">Revista</li>
						<li id="li4" onclick="funcionnuevo(li4, div4)" style="color:#1C43B9;">Final</li>
					</ul>
				</div>
				
				
	<!-- Libro -->		
	<div id="div1" class ="divicion" style="background-color: #FFE6A2;">
	<form action = "../modelo/biblilibroInsert.php" enctype="multipart/form-data" method="post" >
	<?php include("../controlador/biblilibroInsert.php"); ?>
	<button type="submit" class="indexbutton">Registrar</button>
	</form>
	</div>
	<!-- Mapa -->
	<div id="div2" class ="divicion" style="background-color: #FFE6A2;display:none;">
	<form action = "../modelo/biblimapaInsert.php" enctype="multipart/form-data" method="post" >
	<?php include("../controlador/biblimapaInsert.php"); ?>
	<button type="submit" class="indexbutton">Registrar</button>
	</form>
	</div>
	<!-- Revista -->
	<div id="div3" class ="divicion" style="background-color: #FFE6A2;display:none;">
	<form action = "../modelo/biblirevistaInsert.php" enctype="multipart/form-data" method="post" >
	<?php include("../controlador/biblirevistaInsert.php"); ?>
	<button type="submit" class="indexbutton">Registrar</button>
	</form>
	</div>
	<!-- Final -->
	<div id="div4" class ="divicion" style="background-color: #FFE6A2;display:none;">
	<form action = "../modelo/biblittInsert.php"  enctype="multipart/form-data" method="post" >
	<?php include("../controlador/biblittInsert.php"); ?>
	<button type="submit" class="indexbutton">Registrar</button>
	</form>
	</div>
		
	</div>
	
	<div class="rela div-ejem">
	
	<div style="width:100%;text-align:center;background-color: #FFFFFF;"><h2>Palabras claves</h2></div>
	<div style="background-color: #FFE6A2;"><?php include('../controlador/biblikeyword.php');?></div>
	
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
</body>


</html>




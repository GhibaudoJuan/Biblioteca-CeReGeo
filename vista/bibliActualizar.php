<?php 
if(!isset($_SESSION))session_start();
require_once("../accesos/biblifiltrar.php");
require_once("../accesos/validacion.php");
validaracceso(1);

$array= $_POST;



switch ($array['tipo']){
    case 'Libro':
        $sql = "select idmat, titulo, idcatalogo,descripcion,anio,idioma,
autor, edicion, tomo, editorial,isbn,portada,tipo
from material left join libros on (idmat=idlibro) where idmat='".$array['id']."';";
        break;
    case 'Mapa':
        $sql = "select idmat, titulo,  idcatalogo,descripcion,anio,idioma,
hoja, escala, localidad, provincia, pais, tipom,portada,tipo
from material left join mapas on (idmat=idmapa) where idmat='".$array['id']."';";
        break;
    case 'Revista':
        $sql = "select idmat, titulo,  idcatalogo,descripcion,anio,idioma,
issn, volumen, ejemplar, reveditorial, coleccion, num ,portada,tipo
from material left join revistas on (idmat=idrevista) where idmat='".$array['id']."';";
        break;
    case 'Final':
        $sql = "select idmat, titulo, idcatalogo,descripcion,anio,idioma,
tipott, autores, directores, universidad, lugar, numpag ,portada,tipo
from material mat left join tt on (mat.idmat=tt.idtt) where idmat='".$array['id']."';";
        break;
}

$resultado=select($sql);
$mifila = pg_fetch_assoc($resultado);
$_SESSION['listaactualizar']=$mifila;
//variable para el boton de atras
$form='"'.$_SESSION['atrasejemplar'].'"';
//variable para autocompletar
$material= autostring("material", "idmat");
?>










<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Actualizar</title>

<!-- cargamos los estilos -->
<?php include("style/biblicss.html"); ?>

<style>
.index{
 width: 500px;
}
</style>


</head>
<body>



	<header class="titulo" ><h2>Actualizar</h2></header>
	<!-- separado del menu-->
	<main>
	
	
	
	<?php if($array['tipo']=="Libro"):?>				
	<!-- Libro -->		
	<div id="div1" class ="divicion" style="background-color: #FFE6A2;">
	<form action = "../modelo/bibliactualizar.php" enctype="multipart/form-data" method="post" >
	<?php include("../controlador/biblilibroInsert.php"); ?>	
	<?php endif;?>
	<?php if($array['tipo']=="Mapa"):?>
	<!-- Mapa -->
	<div id="div2" class ="divicion" style="background-color: #FFE6A2;">
	<form action = "../modelo/bibliactualizar.php" enctype="multipart/form-data" method="post" >
	<?php include("../controlador/biblimapaInsert.php"); ?>	
	<?php endif;?>
	<?php if($array['tipo']=="Revista"):?>
	<!-- Revista -->
	<div id="div3" class ="divicion" style="background-color: #FFE6A2;">
	<form action = "../modelo/bibliactualizar.php" enctype="multipart/form-data" method="post" >
	<?php include("../controlador/biblirevistaInsert.php"); ?>
	<?php endif;?>
	<?php if($array['tipo']=="Final"):?>
	<!-- Final -->
	<div id="div4" class ="divicion" style="background-color: #FFE6A2;">
	<form action = "../modelo/bibliactualizar.php"  enctype="multipart/form-data" method="post" >
	<?php include("../controlador/biblittInsert.php"); ?>
	<?php endif;?>
	
	<div class="abso right-20"><button type="submit"  class="indexbutton">Registrar</button></div>
	</form>
	</div>
	
	
	    
	</main>




        <!-- Boton atras -->
   		<div  class="abso atras">
			<form action = <?php  echo $form;?> method="post">

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

</body>


</html>




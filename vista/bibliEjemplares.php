<?php 
if(!isset($_SESSION))session_start();
require_once("../accesos/biblifiltrar.php");


if(isset($_GET['cod'])){
    $idej=$_GET['cod'];
    $tipo=$_GET['tipo'];
}
else{
    $idej=$_POST['id'];
    $tipo=$_POST['tipo'];
}


$sql = "select idmaterial, idejemplar, codigo_externo, propietario,
        (CASE WHEN estado='l' THEN 'Libre' WHEN estado='r' THEN 'Reservado' WHEN estado='p' THEN 'Prestado' when estado='o' THEN 'Obsoleto' END) as estado, 
        (CASE WHEN disponibilidad ='True' THEN 'SI' ELSE 'NO' END ) as disponibilidad,
        (CASE WHEN activo='true' THEN min(fecha) ELSE NULL END )as proxima         
        from ejemplares e left join reservas r on (r.material=e.idmaterial) and(r.ejemplar=e.idejemplar) 
        where idmaterial = '".$idej."' 
        group by idmaterial, idejemplar, codigo_externo, propietario, estado, disponibilidad, activo;";
        

$resultado=select($sql);



switch($tipo){
    Case 'Libro':
        $sql2 = "select idmat, titulo,tipo, descripcion, anio, idioma, portada, autor, edicion, tomo, editorial,isbn
                from material inner join libros on (idmat=idlibro) where idmat='".$idej."';";
        $i=1;
        break;
    case 'Revista':
        $sql2 = "select idmat, titulo,tipo, descripcion, anio, idioma, portada, issn, volumen, ejemplar, reveditorial, coleccion, num
                from material inner join revistas on (idmat=idrevista) where idmat='".$idej."';";
        $i=2;
        break;
    case 'Mapa':
        $sql2 = "select idmat, titulo,tipo, descripcion, anio, idioma, portada, hoja, escala, localidad, provincia, pais, tipom
                from material inner join mapas on (idmat=idmapa) where idmat='".$idej."';";
        $i=3;
        break;
    case 'Final':
        $sql2 = "select idmat, titulo, tipo, descripcion, anio, idioma, portada, tipott, autores, directores, universidad, lugar, numpag 
                from material mat inner join tt on (mat.idmat=tt.idtt) where idmat='".$idej."';";
        $i=4;
        break;
}

$portada=pg_fetch_assoc(select($sql2));

$sql3="select descri from keywords where mat_id='".$idej."' order by word_id asc;";

$keyword=select($sql3);


$form='"'.$_SESSION['atras'].'"';
$_SESSION['atrasejemplar']="../vista/bibliEjemplares.php?cod=".$idej."&tipo=".$tipo;


?>

   

 








<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Ejemplares</title>

<!-- cargamos los estilos -->
<?php include("style/biblicss.html"); ?>

<style type="text/css">
main{
min-height:20rem!important;
}



</style>
</head>
<body>



 <div style="padding:40px;" ></div>
	<!-- separado del menu-->
	
	
	<div class="port-ejemplar" style="background-color: #FFE6A2;">     
      
      
       <?php   echo armarPortada($portada,$i,$keyword);  ?>
    	
      </div>
	
	
	<main  style="padding-top:20px;">
        <div class="flex" style="height: 100%;">
        	<!-- Tabla Ejemplares -->
			<div  class="tabladiv ajuste" style="padding-right:1rem;">
	   		<?php include("../modelo/bibliEjemplarSelect.php");?>
    		</div>
   
		    <!-- Menu Ejemplares -->
        	<div class="ajuste " style="max-width:8rem;">
        		<div class="sticky">
	            
				<?php if(isset($_SESSION['tipouser'])&&($_SESSION['tipouser']<'2')):?>
				<!-- Nuevo -->	
				<a href="#miModal" class="sindec"><button type="submit" id="botonnuevo" class="indexbutton" onclick="mostrar('insert')">Nuevo</button> </a>
	            
				<!-- Editar -->	
				<a href="#miModal" class="sindec"><button type="submit" id="botoneditar" disabled class="indexbutton" onclick="mostrar('actualizar')">Editar</button> </a>
	            
	            <!-- Borrar -->		
				<a href="#miModal" class="sindec"><button type="submit" id="botonborrar" disabled class="indexbutton"  onclick="mostrar('borrar2')">Borrar</button> </a>
				
				<?php endif;?>
				<?php if(isset($_SESSION['tipouser'])):?>
				<!-- Reserva -->
				<a href="#miModal" class="sindec"><button type="submit" id="botonreservaejemplar" disabled class="indexbutton"  onclick="mostrar('reserva')">Reserva</button> </a>
				<?php  if($_SESSION['tipouser']<'2'):?>
				<!-- Prestamo -->
				<a href="#miModal" class="sindec"><button type="submit" id="botonprestamoejemplar" disabled class="indexbutton"  onclick="mostrar('prestamo')">Prestamo</button> </a>
     			<?php endif;
     			 endif;?>
     			</div>
        	</div>
        <!-- Menu Ejemplares -->
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
	<?php  include("../controlador/biblimenu.php"); 

	?>
	</div> 

	<footer style="">
	<?php include("../controlador/footer.php");?>
	</footer>
<?php include("../controlador/vent_error.php");?>


<div id="miModal" class="modal">
  <div class="modal-contenido modal-buscar" id="reserva" style="display:none;">
    <div class="alignr"><a href="#" class="sindec negro" onclick="ocultar()">X</a></div>
    <h2>Reserva</h2>
    <?php include("../controlador/biblireservaInsert.php"); ?>
  </div> 

  <div class="modal-contenido modal-buscar" id="prestamo" style="display:none;">
    <div class="alignr"><a href="#" class="sindec negro" onclick="ocultar()">X</a></div>
    <h2>Prestamo</h2>
    <?php include("../controlador/bibliprestamoInsert.php"); ?>
  </div>


  <div class="modal-contenido modal-buscar" id="modalkeyword" style="display:none;">
    <div class="alignr"><a href="#" class="sindec negro"  onclick="ocultar()">X</a></div>
    <h2>Palabras claves</h2>
    <?php include("../controlador/biblikeywordEdit.php"); ?>
  </div> 

  <div class="modal-contenido modal-borrar" id="borrar" style="display:none;">
    <div class="alignr"><a href="#" class="sindec negro" onclick="ocultar()">X</a></div>
    <h2>Borrar</h2>
    <?php include("../controlador/biblimaterialBorrar.php"); ?>
  </div>
  <div class="modal-contenido modal-buscar" id="insert" style="display:none;">
    <div class="alignr"><a href="#" class="sindec negro"  onclick="ocultar()">X</a></div>
    <h2>Nuevo</h2>
    <?php include("../controlador/bibliEjemplarInsert.php"); ?>
  </div> 
  <div class="modal-contenido modal-buscar" id="actualizar" style="display:none;">
    <div class="alignr"><a href="#" class="sindec negro" onclick="ocultar()">X</a></div>
    <h2>Editar</h2>
    <?php include("../controlador/bibliEjemplarEdit.php"); ?>
  </div> 
  <div class="modal-contenido modal-borrar" id="borrar2" style="display:none;">
    <div class="alignr"><a href="#" class="sindec negro"  onclick="ocultar()">X</a></div>
    <h2>Borrar</h2>
    <?php include("../controlador/bibliEjemplarBorrar.php"); ?>
  </div> 

 </div>

<script type="text/javascript">
conftabla('ejemplar','<?php echo $_SESSION['tipouser']?>');

</script>

</body>




</html>


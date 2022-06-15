<?php 
if(!isset($_SESSION))session_start();
require_once("../accesos/biblifiltrar.php");


if(isset($_GET['cod']))
{
    $idej=$_GET['cod'];
    $tipo=$_GET['tipo'];
}
else
{
    $idej=$_POST['id'];
    $tipo=$_POST['tipo'];
}

//datos de ejemplar
$sql = "select idmaterial, idejemplar, codigo_externo, propietario,
        (CASE WHEN estado='l' THEN 'Libre' WHEN estado='p' THEN 'Prestado' when estado='o' THEN 'Obsoleto' END) as estado, 
        (CASE WHEN disponibilidad ='True' THEN 'SI' ELSE 'NO' END ) as disponibilidad
        from ejemplares 
        where idmaterial = '".$idej."'";
if(!isset($_SESSION['tipouser'])||$_SESSION['tipouser']>'1')
{
    $sql.=" and estado !='o' and disponibilidad = 'true'";
}


$sql.=";";
$resultado=select($sql);


//datos de portada
switch($tipo)
{
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
//palabras claves
$sql3="select descri from keywords where mat_id='".$idej."' order by word_id asc;";

$keyword=select($sql3);

//fecha proxima reserva
$sql4= "select ejemplar, min(fecha) as proxima         
        from ejemplares e inner join reservas r on (r.material=e.idmaterial) and(r.ejemplar=e.idejemplar) 
        where idmaterial = '".$idej."' and activo='true'
        group by ejemplar, activo;";

$proximo=select($sql4);

$array = array();
while ($datos = pg_fetch_assoc($proximo))
{
   $array[$datos['ejemplar']]=$datos['proxima'];
    
}

    


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

</head>
<body>



 <div style="padding:40px;" ></div>
	<!-- separado del menu-->
	
	
	<div class="port-ejemplar" style="background-color: #FFE6A2;">     
      
      
       <?php   echo armarPortada($portada,$i,$keyword);  ?>
    	
      </div>
	
	<header class="titulo"><h2>Ejemplares</h2></header>
	<main>
	
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
				<button type="button" id="botonnuevo" data-bs-toggle="modal" data-bs-target="#miModal" class="indexbutton" onclick="mostrar('insert')">Nuevo</button>
	            
				<!-- Editar -->	
				<button type="button" id="botoneditar" data-bs-toggle="modal" data-bs-target="#miModal" disabled class="indexbutton" onclick="mostrar('actualizar')">Editar</button>
	            
	            <!-- Borrar -->		
				<button type="button" id="botonborrar" data-bs-toggle="modal" data-bs-target="#miModal" disabled class="indexbutton"  onclick="mostrar('borrar2')">Borrar</button>
				
				<?php endif;?>
				<?php if(isset($_SESSION['tipouser'])):?>
				<!-- Reserva -->
				<button type="button" id="botonreservaejemplar" data-bs-toggle="modal" data-bs-target="#miModal" disabled class="indexbutton"  onclick="mostrar('reserva')">Reserva</button>
				<?php  if($_SESSION['tipouser']<'2'):?>
				<!-- Prestamo -->
				<button type="button" id="botonprestamoejemplar" data-bs-toggle="modal" data-bs-target="#miModal" disabled class="indexbutton"  onclick="mostrar('prestamo')">Prestamo</button>
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


<div id="miModal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div  id="reserva" style="display:none;">
      <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" >Reserva</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="ocultar()"></button>
              </div>
              
               <?php include("../controlador/biblireservaInsert.php"); ?>
             
            </div>
          </div>
    </div>


    <div  id="prestamo" style="display:none;">
      <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" >Prestamo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="ocultar()"></button>
              </div>
              
                 <?php include("../controlador/bibliprestamoInsert.php"); ?>
           
            </div>
          </div>
    </div>
    
    
    <div  id="modalkeyword" style="display:none;">
      
      <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" >Palabras claves</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="ocultar()"></button>
              </div>
              
               <?php include("../controlador/biblikeywordEdit.php"); ?>
             
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
              
                 <?php include("../controlador/biblimaterialBorrar.php"); ?>
             
            </div>
          </div>
       </div>
    <div  id="insert" style="display:none;">
    <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" >Nuevo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="ocultar()"></button>
              </div>
              
               <?php include("../controlador/bibliEjemplarInsert.php"); ?>
            
            </div>
          </div>
       </div>
    <div  id="actualizar" style="display:none;">
        <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" >Editar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="ocultar()"></button>
                  </div>
                  
                   <?php include("../controlador/bibliEjemplarEdit.php"); ?>
                 
                </div>
              </div>
    </div>
    <div  id="borrar2" style="display:none;">
      <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" >Borrar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="ocultar()"></button>
              </div>
              
               <?php include("../controlador/bibliEjemplarBorrar.php"); ?>
             
            </div>
       </div>
       
    </div>
</div>

<script type="text/javascript">
conftabla('ejemplar','<?php if($_SESSION['tipouser']=='') echo 4; else echo $_SESSION['tipouser'];?>');

</script>
<?php include("javascript/pluginBootstrap.html"); ?>
</body>




</html>


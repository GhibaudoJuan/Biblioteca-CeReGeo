<?php 
session_start();
session_regenerate_id(true);
require_once("accesos/biblifiltrar.php");

$_SESSION['cod']=token();

if(!isset($_SESSION['res'])){
    $_SESSION['res']=0;
}

?>







<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Biblioteca CeReGeo</title>


<!-- cargamos los estilos -->

<link rel="stylesheet" href="vista/style/styles.css">
<script type="text/javascript" src="vista/javascript/funciones.js"></script>
<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

</head>

<body style="background-color:#F6F6F6;">



<!-- Menu -->
	<div class="fondo">  
	<a href="index.php"><img src="../imagenes/logoceregeo-horizontal.jpg" alt="Logo-GeReGeo" class="logo" height="40px" width="auto"></a>
<ul id="menu0" class="desplega1" >
	<li><a href="vista/biblimaterial.php?pag=1">Biblioteca</a></li>
	
	<?php if(isset($_SESSION['tipouser'])): ?>
	<li><a href="vista/bibliReserva.php">Reservas</a></li>
	<li><a href="vista/bibliPrestamos.php">Prestamos</a></li>
	<?php endif; ?>
	<?php if(isset($_SESSION['tipouser'])&&($_SESSION['tipouser']<='1')): ?>
	<li><a href="vista/bibliNuevo.php">Nuevo</a></li>
	<?php endif; ?>
	<?php if(isset($_SESSION['tipouser'])&&($_SESSION['tipouser']=='0')): ?>
	<li><a href="vista/bibliCuenta.php">Cuentas</a></li>
	<li><a href="vista/bibliReportes.php">Reportes</a></li>
	<li><a href="vista/backup.php">Backup</a></li>
	<?php endif; ?>
	
</ul>

<div class="abso menu1">
<?php if(isset($_SESSION['tipouser'])): ?>
	<a class="perfil" style="cursor:pointer" onclick="mostrarocultar(miperfil)">
	<?php 
	$perfil=$_SESSION['user'];  
	switch($_SESSION['tipouser']){
	    case 0:
	        $perfil.=' (Administrador)';
	        break;
	    case 1:
	        $perfil.=' (Bibliotecario)';
	        break;
	    case 2:
	        $perfil.=' (Docente)';
	        break;
	    case 3:
	        $perfil.=' (Estudiante)';
	        break;	        
	}
	   
	   
	   
	   echo $perfil; ?>
	
	
	
	
	
	</a>
	
	
	
<?php else: ?>
	<a class="perfil" href="vista/iniciosesion.php">Iniciar Sesion</a>
<?php endif;?>
</div>
<div id="miperfil" class="abso menu2 ">
		<a class="pad" href="vista/bibliPerfilUsuario.php"><div class="colorperfil">Mi perfil</div></a>
		
		<a class="pad" href="vista/bibliCerrarSesion.php"><div class="colorperfil">Cerrar Sesion</div></a>
</div>
</div> 
<!-- Menu -->
<header class="titulo" ><h2>Nuevo</h2></header>
<main>

            
</main>

<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
} );</script>
</body>

</html>


<?php 
if(!isset($_SESSION))session_start();



?>



<!doctype html>
<html>

<head>

</head>
<body> 

<!-- existe una divicion que encierra a esta pagina con la class fondo -->

 <?php // echo $_SESSION['tipouser'];    ?>
<div class="abso menulogo menu-top "><a class="perfil border-right" href="../index.php">CeReGeo</a></div>

<!-- <img src="../imagenes/logoceregeo-horizontal.jpg" alt="Logo-GeReGeo"  height="40px" width="auto"> -->

<ul id="menu0" class="desplega1 menu-top" >
	
	<li><a href="../vista/biblimaterial.php?pag=1">Biblioteca</a></li>
	
	<?php if(isset($_SESSION['tipouser'])): ?>
	<li><a href="../vista/bibliReserva.php">Reservas</a></li>
	<!--<li><a href="../vista/bibliAgenda.php">Agenda</a></li>-->
	<li><a href="../vista/bibliPrestamos.php">Prestamos</a></li>
	<?php endif; ?>
	<?php if(isset($_SESSION['tipouser'])&&($_SESSION['tipouser']<='1')): ?>
	<li><a href="../vista/bibliNuevo.php">Nuevo</a></li>
	<?php endif; ?>
	<?php if(isset($_SESSION['tipouser'])&&($_SESSION['tipouser']=='0')): ?>
	<li><a href="../vista/bibliCuenta.php">Cuentas</a></li>
	<li><a href="../vista/bibliReportes.php">Reportes</a></li>
	<li><a href="../vista/backup.php">Backup</a></li>
	<?php endif; ?>
	
</ul>

<div class="abso menu1 menu-top">
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
	<a class="perfil" href="../vista/iniciosesion.php">Iniciar Sesi&oacuten</a>
<?php endif;?>
</div>
<div id="miperfil" class="abso menu2">
		<a class="pad" href="../vista/bibliPerfilUsuario.php"><div class="colorperfil">Mi perfil</div></a>
		
		<a class="pad" href="../vista/bibliCerrarSesion.php"><div class="colorperfil">Cerrar Sesi&oacuten</div></a>
</div>


</body>
</html>


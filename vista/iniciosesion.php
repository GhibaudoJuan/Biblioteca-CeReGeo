<?php 
session_start();
session_regenerate_id(true);
require_once("../accesos/biblifiltrar.php");

$_SESSION['cod']=token();



?>







<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Inicio de Sesi&oacuten</title>


<!-- cargamos los estilos -->
<?php include("style/biblicss.html"); ?>

<style type="text/css">
.index{
width:70%!important;
}

.indexbutton{
width:70%!important;
}
</style>


</head>

<body style="background-color:#F6F6F6;">


<div style='margin:auto;height:70px;'></div>
<div style=' margin:auto;width:500px; height:500px;  background-color:#8BAEFF; text-align:center; border-radius: 10px;'>



<div style=' position:relative; top: 100px ;'>
<form action ="../modelo/Inicio.php" method="post" >


<span  style='font-size:30px;'>Usuario</span>

<br>
<input type="text" name="user" autofocus class="index"  placeholder="Nombre Usuario">
<br>

<span  style='font-size:30px;' >Contraseña</span>
<br>

<input type="password" name="password" class="index"  placeholder="Contraseña">
<br>
<input type="hidden" name="codigo" value="<?= $_SESSION['cod'] ?>">


<?php if(isset($_SESSION['val'])&&($_SESSION['val']==false)): ?>
<br>
<span style="color:red;">*Usuario o contraseña incorrectos*</span> 
<?php endif; ?>


<br>
<button type="submit" class="indexbutton" >Iniciar Sesi&oacuten</button>
</form>
</div>


</div>
<!-- Menu -->
	<div class="fondo">  
	<?php include("../controlador/biblimenu.php"); 

	?>
	</div> 
</body>

</html>


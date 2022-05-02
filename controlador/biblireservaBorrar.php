
<!doctype html>
<html>
<head>
<title></title>
<meta charset="UTF-8">

</head>
<body>


<form action = "../modelo/biblireservaBorrar.php" method="post" >

<span style="font-size: 25px;">&#191Esta seguro de que quiere eliminarlo? </span>
<br><br>
<?php if ($_SESSION['tipouser']<'2'):?>
<div class="flex">
<div class="span-2 ajuste"><span>Nombre</span></div>
<div class="ajuste w-3"><input type='text' name="nombre" id="nombre1"  class="index" required></div>
</div>
<?php endif;?>

<div class="flex">
<div class="span-2 ajuste"><span>Reserva Num</span></div>
<div class="ajuste w-3"><input type='text' name="id" id="borrar1" class="index" required></div>
</div>



<button type="submit" class="indexbutton">Borrar</button>

<a href="#" class="sindec indexbutton"  onclick="ocultar()">No</a>


</form>


</body>


</html>
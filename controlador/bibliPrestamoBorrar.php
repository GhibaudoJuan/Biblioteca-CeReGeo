<!doctype html>
<html>
<head>


</head>
<body>


<form action = "../modelo/bibliPrestamoBorrar.php" method="post" >

<span style="font-size: 25px;">&#191Esta seguro de que quiere eliminarlo? </span>
<br><br>
<div class="flex">
<div class="span-2 ajuste"><label for="nombre1">Nombre</label></div>
<div class="ajuste w-3"><input type='text' name="nombre" id="nombre1" class="index" required></div>
</div>

<div class="flex">
<div class="span-2 ajuste"><label for="borrar1">Prestamo Num</label></div>
<div class="ajuste w-3"><input type='text' name="idpre" id="borrar1" class="index"  required></div>
</div>


<button type="submit" class="indexbutton">Borrar</button>

<a href="#" class="sindec indexbutton"  onclick="ocultar()">No</a>
</form>


</body>


</html>


<!doctype html>
<html>
<head>
<title></title>
<meta charset="UTF-8">

</head>
<body>


<form action = "../modelo/bibliprestamoInsert.php" method="post" >

<div class="flex">
<div class="span-2 ajuste"><label for="pasarprestamonom">Nombre</label></div>
<div class="ajuste w-2"><input type='text' name="nombre" id="pasarprestamonom" autofocus class="index"  maxlength="100" placeholder="Nombre"  required></div>
</div>

<div class="flex">
<div class="span-2 ajuste"><label for="idprestamo">Codigo Material</label></div>
<div class="ajuste w-2"><input type='text' name="material" id="idprestamo"  class="index"  maxlength="50" placeholder="Codigo material"  required></div>
</div>

<div class="flex">
<div class="span-2 ajuste"><label for="ejemprestamo">Codigo ejemplar</label></div>
<div class="ajuste w-2"><input type='text' name="ejemplar" id="ejemprestamo"  class="index"  maxlength="50" placeholder="Codigo ejemplar"  required></div>
</div>

<div class="flex">
<div class="span-2 ajuste"><label for="frp">Devolucion</label></div>
<div class="ajuste w-2"><input id ="frp" type='date' name="fecha" class="index" required></div>
</div>

<input type='hidden' id='prest' name='prest' value="" >
<div class="alignr"><button type="submit" class="indexbutton">Pasar</button></div>



</form>



</body>


</html>
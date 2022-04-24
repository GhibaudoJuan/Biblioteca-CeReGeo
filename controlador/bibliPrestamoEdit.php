
<!doctype html>
<html>
<head>
</head>
<body>


<form action = "../modelo/bibliPrestamoEdit.php" method="post" >

<input type='hidden' id="pid" name ='idpre' >
<input type='hidden' id="pnom" name ='pnom' >
<input type='hidden' id="cdesde" name ='cdesde' >
<input type='hidden' id="chasta" name ='chasta' >
<input type='hidden' id="cact" name ='cact' >
<input type='hidden' id="cdevuelto" name ='cdevuelto' >

<div class="flex">
<div class="span-2 ajuste"><label for="pdesde">Retirado</label></div>
<div class="ajuste w-2"><input type='date' id="pdesde" name="desde" class="index"></div>
</div>
<div class="flex">
<div class="span-2 ajuste"><label for="phasta">Devolucion</label></div>
<div class="ajuste w-2"><input type='date' id="phasta" name="hasta" class="index"></div>
</div>
<div class="flex">
<div class="span-2 ajuste"><label for="pdevuelto">Devuelto</label></div>
<div class="ajuste w-2"><input type='date' id="pdevuelto" name="devuelto" class="index"></div>
</div>
<div class="flex">
<div class="ajuste w-2">
<input type="radio" style="width: auto" id="pce" name="activo" value="False">
<label class="span" for="activo">Cerrado</label>

<input type="radio" style="width: auto" id="pac" name="activo" value="True">
<label class="span" for="activo">Activo</label>
</div>
</div>
<div class="alignr"><button type="submit" class="indexbutton">Actualizar</button></div>


</form>


</body>


</html>
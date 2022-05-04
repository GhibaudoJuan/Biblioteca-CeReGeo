
<!doctype html>
<html>
<head>
</head>
<body>


<form action = "../modelo/bibliDevolucion.php" method="post" >

<input type='hidden' id="bdid" name ='idpre' >
<input type='hidden' id="bdnom" name ='nombre' >


<div class="flex">
<div class="span-2 ajuste"><label>Nombre:</label></div>
<div class="span-2 ajuste"><label id="bdnombre"></label></div>
</div>
<div class="flex">
<div class="span-2 ajuste"><label>Prestamo Num:</label></div>
<div class="span-2 ajuste"><label id="bdprestamo"></label></div>
</div>


<div class="alignr"><button type="submit" class="indexbutton">Devolucion</button></div>


</form>


</body>


</html>
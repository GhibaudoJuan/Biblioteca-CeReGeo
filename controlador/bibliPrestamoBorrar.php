<!doctype html>
<html>
<head>


</head>
<body>


<form action = "../modelo/bibliPrestamoBorrar.php" method="post" >

<div class="modal-body">
<input type='hidden' id="borrar1" name ='idpre' >
<input type='hidden' id="nombre1" name ='nombre' >



<span style="font-size: 25px;">&#191Esta seguro de que quiere eliminarlo? </span>
<br><br>
<div class="flex">
<div class="span-2 ajuste"><label>Nombre:</label></div>
<div class="ajuste w-3"><input type='text' id="nombreborrar" class="index" disabled></div>

</div>
<div class="flex">
<div class="span-2 ajuste"><label>Prestamo Num:</label></div>
<div class="ajuste w-3"><input type='text' id="borrarprimero" class="index" disabled></div>
</div>
</div>
<div class="modal-footer">
<button type="submit" class="indexbutton">Borrar</button>
</div>

</form>


</body>


</html>

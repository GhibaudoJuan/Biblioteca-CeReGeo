<?php 
/*form de la vista prestamos
 * continuacion de un modal que pregunta si quiere borrar un prestamo
 * 
 */?>
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
<div class="input-group m-div">
<label class="input-group-text">Nombre:</label>
<div class="ajuste"><input type='text' id="nombreborrar" class="form-control" disabled></div>

</div>
<div class="input-group m-div">
<label class="input-group-text">Prestamo Num:</label>
<div class="ajuste"><input type='text' id="borrarprimero" class="form-control" disabled></div>
</div>
</div>
<div class="modal-footer">
<button type="submit" class="indexbutton">Borrar</button>
</div>

</form>


</body>


</html>

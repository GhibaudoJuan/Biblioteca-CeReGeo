<?php /*form de la vista prestamos
continuacion de un modal 
*/
?>
<!doctype html>
<html>
<head>
</head>
<body>


<form action = "../modelo/bibliDevolucion.php" method="post" >
<div class="modal-body">
<input type='hidden' id="bdid" name ='idpre' >
<input type='hidden' id="bdnom" name ='nombre' >


<div class="input-group m-div">
<label class="input-group-text">Nombre</label>
<div class="ajuste"><input type='text' id="bdnombre" class="form-control" disabled></div>
</div>
<div class="input-group m-div">
<label class="input-group-text">Prestamo</label>
<div class="ajuste"><input type='text' id="bdprestamo" class="form-control" disabled></div>
</div>

</div>
<div class="modal-footer"><button type="submit" class="indexbutton">Devolucion</button></div>


</form>


</body>


</html>
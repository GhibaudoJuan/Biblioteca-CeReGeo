<?php 
/*form de la vista prestamos
 * continuacion de un modal para editar un prestamo
 */?>
<!doctype html>
<html>
<head>
</head>
<body>


<form action = "../modelo/bibliPrestamoEdit.php" method="post" >
 <div class="modal-body">
<input type='hidden' id="pid" name ='idpre' >
<input type='hidden' id="pnom" name ='pnom' >
<input type='hidden' id="cdesde" name ='cdesde' >
<input type='hidden' id="chasta" name ='chasta' >
<input type='hidden' id="cact" name ='cact' >
<input type='hidden' id="cdevuelto" name ='cdevuelto' >

<div class="input-group m-div">
<label class="input-group-text" for="pdesde">Retirado</label>
<div class="ajuste"><input type='date' id="pdesde" name="desde" class="form-control"></div>
</div>
<div class="input-group m-div">
<label class="input-group-text" for="phasta">Devolucion</label>
<div class="ajuste"><input type='date' id="phasta" name="hasta" class="form-control"></div>
</div>
<div class="input-group m-div">
<label class="input-group-text" for="pdevuelto">Devuelto</label>
<div class="ajuste"><input type='date' id="pdevuelto" name="devuelto" class="form-control"></div>
</div>

</div>
<div class="modal-footer"><button type="submit" class="indexbutton">Actualizar</button></div>


</form>


</body>


</html>
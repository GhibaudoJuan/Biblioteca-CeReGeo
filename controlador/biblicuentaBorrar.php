<?php 
/*form de la vista cuenta
 * continuacion de un modal que pregunta si esta seguro de eliminar una cuenta*/
if(!isset($_SESSION))session_start(); ?>


<!doctype html>
<html>
<head>

</head>
<body>


<form action = "../modelo/biblicuentaBorrar.php" method="post" >
<div class="modal-body">
<input type='hidden' id="borrar1" name ='id' >

<label for="borrar1" style="font-size: 25px;">&#191Est&aacute seguro de que quiere eliminarlo? </label>
<br><br>
<div class="input-group m-div">
<label class="input-group-text">Id</label>
<div class="ajuste"><input type='text' id="borrarprimero" class="form-control" disabled></div>
</div>
<br>
</div>
<div class="modal-footer">
<button type="submit" class="indexbutton">Borrar</button>
</div>
</form>


</body>


</html>

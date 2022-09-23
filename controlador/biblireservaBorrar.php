<?php 
/*form de la vista reserva
 * continuacion de un modal
 */?>
<!doctype html>
<html>
<head>
<title></title>
<meta charset="UTF-8">

</head>
<body>


<form action = "../modelo/biblireservaBorrar.php" method="post" >
<div class="modal-body">
<input type='hidden' id="borrar1" name ='id' >
<input type='hidden' id="nombre1" name ='nombre' >



<span style="font-size: 25px;">&#191Est&aacute seguro de que quiere eliminarlo? </span>
<br><br>
<?php if ($_SESSION['tipouser']<'2'):?>
<div class="input-group m-div">
<label class="input-group-text">Nombre:</label>
<div class="ajuste"><input type='text' id="nombreborrar" class="form-control" disabled></div>
</div>
<?php endif;?>

<div class="input-group m-div">
<label class="input-group-text">Reserva Num:</label>
<div class="ajuste"><input type='text' id="borrarprimero" class="form-control" disabled></div>
</div>

</div>
<div class="modal-footer">
<button type="submit" class="indexbutton">Borrar</button>
</div>

</form>


</body>


</html>

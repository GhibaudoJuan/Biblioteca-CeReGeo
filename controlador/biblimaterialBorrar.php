<?php /*form de la vista ejemplar
continuacion de un modal que pregunta si esta seguro de querer borrar un contenido*/?>
<!doctype html>
<html>
<head>
</head>
<body>


<form action = "../modelo/biblimaterialBorrar.php" method="post" >

<div class="modal-body">
<?php include("getejemplar.php");?>
<span style="font-size: 25px;">&#191Est&aacute seguro de que quiere eliminarlo? </span>
</div>
<div class="modal-footer">
<button type="submit" class="indexbutton">Borrar</button>
</div>



</form>


</body>


</html>

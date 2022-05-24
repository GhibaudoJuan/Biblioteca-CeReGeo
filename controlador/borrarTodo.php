<!doctype html>
<html>
<head>


</head>
<body>


<form action = "../modelo/borrarTodo.php" method="post" >
<div class="modal-body">
<span style="font-size: 25px;">&#191Esta seguro de que quiere eliminar todo? </span>

<br>
<input type='hidden' name="delete" id="delete" value="<?php echo $delete;?>">
<input type='hidden' name="retorno" id="retorno" value="<?php echo $retorno;?>">


</div>
<div class="modal-footer">
<button type="submit" class="indexbutton">Borrar Todo</button>
</div>

</form>


</body>


</html>

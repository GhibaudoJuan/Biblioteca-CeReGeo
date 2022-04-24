<!doctype html>
<html>
<head>


</head>
<body>


<form action = "../modelo/borrarTodo.php" method="post" >

<span style="font-size: 25px;">&#191Esta seguro de que quiere eliminar todo? </span>
<br>
<span style="font-size: 20px;">*Se eliminara todo lo que se muestre en la tabla*</span>
<br>
<input type='hidden' name="delete" id="delete" value="<?php echo $delete;?>">
<input type='hidden' name="retorno" id="retorno" value="<?php echo $retorno;?>">

<button type="submit" class="indexbutton">Si</button>

<a href="#" class="sindec indexbutton"  onclick="ocultar()">No</a>
</form>


</body>


</html>

<?php if(!isset($_SESSION))session_start(); ?>


<!doctype html>
<html>
<head>

</head>
<body>


<form action = "../modelo/biblicuentaBorrar.php" method="post" >

<input type='hidden' id="borrar1" name ='id' >

<label for="borrar1" style="font-size: 25px;">&#191Esta seguro de que quiere eliminarlo? </label>
<br><br>
<div class="flex">
<div class="span-2 ajuste"><label>Nombre:</label></div>
<div class="ajuste w-3"><input type='text' id="borrarprimero" class="index" disabled></div>
</div>
<br>

<button type="submit" class="indexbutton">Borrar</button>

<a href="#" class="sindec indexbutton"  onclick="ocultar()">No</a>
</form>


</body>


</html>

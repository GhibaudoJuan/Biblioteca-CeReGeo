<?php if(!isset($_SESSION))session_start(); ?>


<!doctype html>
<html>
<head>

</head>
<body>


<form action = "../modelo/biblicuentaBorrar.php" method="post" >

<label for="borrar1" style="font-size: 25px;">&#191Esta seguro de que quiere eliminarlo? </label>
<br><br>
<input type='text' name="id" id="borrar1" class="index" placeholder="Nombre Usuario">
<br>

<button type="submit" class="indexbutton">Borrar</button>

<a href="#" class="sindec indexbutton"  onclick="ocultar()">No</a>
</form>


</body>


</html>

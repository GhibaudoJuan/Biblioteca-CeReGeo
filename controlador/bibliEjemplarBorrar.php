
<!doctype html>
<html>
<head>
</head>
<body>


<form action = "../modelo/bibliEjemplarBorrar.php" method="post" >

<input type='hidden' id="bejempplar" name ='idejemplar' >

<label for="bejempplar" style="font-size: 25px;">&#191Esta seguro de que quiere eliminarlo? </label>
<br><br>
<?php include("getejemplar.php");?>
<div class="flex">
<div class="span-2 ajuste"><label>Ejemplar</label></div>
<div class="ajuste w-3"><input type='text' id="nombreborrar" class="index" disabled></div>
</div>
<button type="submit" class="indexbutton">Borrar</button>

<a href="#" class="sindec indexbutton"  onclick="ocultar()">No</a>


</form>


</body>


</html>
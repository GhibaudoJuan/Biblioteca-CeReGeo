
<!doctype html>
<html>
<head>
</head>
<body>


<form action = "../modelo/biblimaterialBorrar.php" method="post" >


<?php include("getejemplar.php");?>
<span style="font-size: 25px;">&#191Esta seguro de que quiere eliminarlo? </span>
<br><br>
<button type="submit" class="indexbutton">Borrar</button>

<a href="#" class="sindec indexbutton"  onclick="ocultar()">No</a>


</form>


</body>


</html>
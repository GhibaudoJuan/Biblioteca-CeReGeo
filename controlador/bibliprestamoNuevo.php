<?php 

$nombre1= autostringn("select nombre from cuenta union select nombre from reservas union select nombre from prestamos;");
$material=autostring("material","idmat");

?>
<!doctype html>
<html>
<head>
</head>
<body>


<form action = "../modelo/bibliprestamoInsert.php" method="post" >



<div class="flex">
<div class="span-2 ajuste"><label for="presmaterial">Codigo Material</label></div>
<div class="ajuste w-2 autocomplete">
<input type='text' name="material" id="presmaterial" class="index"  maxlength="100" required></div>
</div>
<div class="flex">
<div class="span-2 ajuste"><label for="presejemplar">Codigo Ejemplar</label></div>
<div class="ajuste w-2 autocomplete">
<input type='text' name="ejemplar" id="presejemplar" class="index"  maxlength="100" required></div>
</div>

<div class="flex">
<div class="span-2 ajuste"><label for="nombre">Nombre</label></div>
<div class="ajuste w-2 autocomplete">
<input type='text' name="nombre" id="nombre" class="index"  maxlength="100" required></div>
</div>

<div class="flex">
<div class="span-2 ajuste"><label for="bpid">Devolucion</label></div>
<div class="ajuste w-2"><input type='date' id="bpid" name="fecha" class="index" required></div>
</div>

<div class="flex">
<div class="span-2 ajuste"><label for="reservaprox">Pr&oacutexima reserva:</label></div>
<div class="ajuste w-2"><input type='date' class="index" id="reservaprox" disabled></div>
</div>


<div class="alignr"><button type="submit" class="indexbutton">Registrar</button></div>





</form>

<script>
mindate('bpid',premindate);
autocomplete(document.getElementById("nombre"), <?php echo $nombre1;?>);
autocomplete(document.getElementById("presmaterial"), <?php echo $material;?>);
</script>
</body>


</html>
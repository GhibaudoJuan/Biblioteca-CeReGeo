<?php 

$nombre= autostringn("select nombre from cuenta union select nombre from reservas union select nombre from prestamos;");
$material=autostring("material","idmat");

?>

<!doctype html>
<html>
<head>
</head>
<body>


<form action = "../modelo/biblireservaInsert.php" method="post" >


<div class="flex">
<div class="span-2 ajuste"><label for="material">Codigo Material</label></div>
<div class="ajuste w-2 autocomplete">
<input type='text' name="material" id="resmaterial" class="index" maxlength="100" required>
</div>
</div>
<div class="flex">
<div class="span-2 ajuste"><label for="ejemplar">Codigo Ejemplar</label></div>
<div class="ajuste w-2 autocomplete">
<input type='text' name="ejemplar" id="resejemplar" class="index" maxlength="100" required>
</div>
</div>

<div class="flex">
<div class="span-2 ajuste"><label for="nombre">Nombre</label></div>
<div class="ajuste w-2 autocomplete">
<input type='text' name="nombre" id="nombre" class="index" maxlength="100" required>
</div>
</div>

<div class="flex">
<div class="span-2 ajuste"><label for="fr">Retiro</label></div>
<div class="ajuste w-2"><input id="frn" type='date' name="fecha" class="index"  required></div>
</div>

<input type='hidden' name ='activo'value='True'>

<div class="alignr"><button type="submit" class="indexbutton">Registrar</button></div>




</form>

<script>
mindate('frn',7);
autocomplete(document.getElementById("nombre"), <?php echo $nombre;?>);
autocomplete(document.getElementById("resmaterial"), <?php echo $material;?>);

</script>
</body>


</html>

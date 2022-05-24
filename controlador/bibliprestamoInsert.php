<?php 

$nombre1= autostringn("select nombre from cuenta union select nombre from reservas union select nombre from prestamos;");


?>
<!doctype html>
<html>
<head>
</head>
<body>


<form action = "../modelo/bibliprestamoInsert.php" method="post" >
<div class="modal-body">

<input type='hidden' name="material" id="presmaterial">
<input type='hidden' name="ejemplar" id="presejemplar">

<div class="flex">
<div class="span-2 ajuste"><label for="nombre2">Nombre</label></div>
<div class="ajuste w-2 autocomplete">
<input type='text' name="nombre" id="nombre2" class="index"  maxlength="100" required></div>
</div>

<div class="flex">
<div class="span-2 ajuste"><label for="bpid">Devolucion</label></div>
<div class="ajuste w-2"><input type='date' id="bpid" name="fecha" class="index" required></div>
</div>

<div class="flex">
<div class="span-2 ajuste"><label for="reservaprox">Pr&oacutexima reserva:</label></div>
<div class="ajuste w-2"><input type='date' class="index" id="reservaprox" disabled></div>
</div>

</div>
<div class="modal-footer"><button type="submit" class="indexbutton">Registrar</button></div>





</form>

<script>
mindate('bpid',premindate);
autocomplete(document.getElementById("nombre2"), <?php echo $nombre1;?>);
</script>
</body>


</html>
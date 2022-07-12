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

<input type='hidden' name="ejemplar" id="presejemplar">

<div class="input-group m-div">
<label class="input-group-text" for="nombre2">Nombre</label>
<div class="ajuste autocomplete"><input type='text' name="nombre" id="nombre2" class="form-control"  maxlength="100" required></div>
</div>

<div class="input-group m-div">
<label class="input-group-text" for="bpid">Devolucion</label>
<div class="ajuste"><input type='date' id="bpid" name="fecha" class="form-control" required></div>
</div>

<div class="input-group m-div">
<label class="input-group-text" for="reservaprox">Pr&oacutexima reserva:</label>
<div class="ajuste"><input type='date' class="form-control" id="reservaprox" disabled></div>
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
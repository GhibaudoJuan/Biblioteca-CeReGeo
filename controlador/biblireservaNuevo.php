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
<div class="modal-body">

<div class="input-group m-div">
<label class="input-group-text" for="material">Codigo Material</label>
<div class="ajuste autocomplete"><input type='text' name="material" id="resmaterial" class="form-control" maxlength="100" required>
</div>
</div>
<div class="input-group m-div">
<label class="input-group-text" for="ejemplar">Codigo Ejemplar</label>
<div class="ajuste autocomplete"><input type='text' name="ejemplar" id="resejemplar" class="form-control" maxlength="100" required>
</div>
</div>

<div class="input-group m-div">
<label class="input-group-text" for="nombre">Nombre</label>
<div class="ajuste autocomplete"><input type='text' name="nombre" id="nombre" class="form-control" maxlength="100" required>
</div>
</div>

<div class="input-group m-div">
<label class="input-group-text" for="fr">Retiro</label>
<div class="ajuste"><input id="frn" type='date' name="fecha" class="form-control"  required></div>
</div>

<input type='hidden' name ='activo'value='True'>
</div>

<div class="modal-footer"><button type="submit" class="indexbutton">Registrar</button></div>




</form>

<script>
mindate('frn',resmindate);
autocomplete(document.getElementById("nombre"), <?php echo $nombre;?>);
autocomplete(document.getElementById("resmaterial"), <?php echo $material;?>);

</script>
</body>


</html>

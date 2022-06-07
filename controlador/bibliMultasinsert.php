<?php 

$nombre1= autostringn("select nombre from cuenta;");


?>
<!doctype html>
<html>
<head>
</head>
<body>


<form action = "../modelo/bibliMultasInsert.php" method="post" >
<div class="modal-body">


<div class="input-group m-div">
<label class="input-group-text" for="nombre2">Nombre</label>
<div class="ajuste autocomplete"><input type='text' name="nombre" id="nominsert" class="form-control"  maxlength="100" required></div>
</div>

<div class="input-group m-div">
<label class="input-group-text" for="bpid">Multado hasta</label>
<div class="ajuste"><input type='date' id="desinsert" name="desmultado" class="form-control" required></div>
</div>


</div>
<div class="modal-footer"><button type="submit" class="indexbutton">Registrar</button></div>





</form>

<script>
mindate('desinsert',0);
autocomplete(document.getElementById("nominsert"), <?php echo $nombre1;?>);
</script>
</body>


</html>
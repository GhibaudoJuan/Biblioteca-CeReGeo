<?php 

$nombre= autostringn("select nombre from cuenta union select nombre from reservas union select nombre from prestamos;");

?>

<!doctype html>
<html>
<head>
</head>
<body>


<form action = "../modelo/biblireservaInsert.php" method="post" >
<div class="modal-body">
<input type='hidden' name="material" id="resmaterial">


<input type='hidden' name="ejemplar" id="resejemplar">



<?php if ($_SESSION['tipouser']<'2'):?>
<div class="input-group m-div">
<label class="input-group-text" for="nombre">Nombre</label>
<div class="ajuste autocomplete"><input type='text' name="nombre" id="nombre" class="form-control" maxlength="100" required>
</div>
</div>
<?php endif;?>
<div class="input-group m-div">
<label class="input-group-text" for="fr">Retiro</label>
<div class="ajuste"><input id="fr" type='date' name="fecha" class="form-control"  required></div>
</div>

<input type='hidden' name ='activo'value='True'>
</div>
<div class="modal-footer"><button type="submit" class="indexbutton">Registrar</button></div>




</form>

<script>
mindate('fr',resmindate);
if(document.getElementById("nombre")){
autocomplete(document.getElementById("nombre"), <?php echo $nombre;?>);
}
</script>
</body>


</html>
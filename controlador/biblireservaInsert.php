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
<div class="flex">
<div class="span-2 ajuste"><label for="nombre">Nombre</label></div>
<div class="ajuste w-2 autocomplete">
<input type='text' name="nombre" id="nombre" class="index" maxlength="100" required>
</div>
</div>
<?php endif;?>
<div class="flex">
<div class="span-2 ajuste"><label for="fr">Retiro</label></div>
<div class="ajuste w-2"><input id="fr" type='date' name="fecha" class="index"  required></div>
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
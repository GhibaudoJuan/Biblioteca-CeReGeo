<?php 
/*form de la vista prestamos
 * continuacion de un modal
 */
$nombre1= autostringn("select nombre from cuenta union select nombre from reservas union select nombre from prestamos;");
$ejemplar1=autostring("ejemplares", "idejemplar");

?>
<!doctype html>
<html>
<head>
</head>
<body>


<form action = "../modelo/bibliprestamoInsert.php" method="post" >
<div class="modal-body">



<div class="input-group m-div">
<label class="input-group-text" for="presejemplar">Codigo Ejemplar</label>
<div class="ajuste autocomplete">
<input type='text' name="ejemplar" id="presejemplar" class="form-control"  maxlength="100" required></div>
</div>

<div class="input-group m-div">
<label class="input-group-text" for="nombre">Nombre</label>
<div class="ajuste autocomplete">
<input type='text' name="nombre" id="nombre" class="form-control"  maxlength="100" required></div>
</div>

<div class="input-group m-div">
<label class="input-group-text" for="bpid">Devolucion</label>
<div class="ajuste"><input type='date' id="bpid" name="fecha" class="form-control" required></div>
</div>


</div>
 <div class="modal-footer">
<button type="submit" class="indexbutton">Registrar</button>
</div>





</form>

<script>
mindate('bpid',premindate);
autocomplete(document.getElementById("nombre"), <?php echo $nombre1;?>);
autocomplete(document.getElementById("presejemplar"),<?php echo $ejemplar1;?>);

</script>
</body>


</html>
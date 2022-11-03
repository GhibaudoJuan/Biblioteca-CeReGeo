<?php 
/*form de la vista ejemplar
 * continuacion de un modal*/
require_once('../accesos/biblifiltrar.php');
$ejempid= autostring("ejemplares", "idejemplar");
$ejempprop= autostring("ejemplares", "propietario");
?>

<!doctype html>
<html>
<head>
</head>
<body>




<form action = "../modelo/bibliEjemplarInsert.php" enctype="multipart/form-data" method="post" >
<div class="modal-body">
<?php include("getejemplar.php");?>

<div class="input-group m-div">
<label class="input-group-text" for="beice">Codigo Ejemplar</label>
<div class="ajuste autocomplete"><input type='text' id="beice"name="idejemplar"  class="form-control"  maxlength="50" min="0" max="50" placeholder="Codigo Ejemplar" required></div>
</div>

<div class="input-group m-div">
<label class="input-group-text" for="ce">Cod. Externo</label>
<div class="ajuste autocomplete"><input type='text' id="ce" name="ce"  class="form-control"  maxlength="50" min="0" max="50" placeholder="Codigo Externo"></div>
</div>


<div class="input-group m-div">
<label class="input-group-text" for="ejemprop">Propietario</label>
<div class="ajuste autocomplete"><input type='text' id="ejemprop" name="propietario"  class="form-control"  maxlength="50" min="0" max="50" placeholder="Propietario"></div>
</div>
<div class="input-group m-div">
<label class="input-group-text" for="condicion">Condicion</label>
<div class="ajuste"><input type='text' id="condicion" name="condicion"  class="form-control"  value="Buena" maxlength="500" ></div>
</div>
<div class="input-group m-div">
<div class="ajuste form-check form-switch">
<input type="checkbox" class="form-check-input" id="dis" name="disponibilidad" value="True" checked>
<label class="form-check-label" for="dis">Disponible</label>
</div>
</div>
</div>
<div class="modal-footer"><button type="submit" class="indexbutton">Registrar</button></div>
</form>
<script>
autocomplete(document.getElementById("ejemprop"), <?php echo $ejempprop;?>);
autocomplete(document.getElementById("beice"), <?php echo $ejempid;?>);

</script>
</body>


</html>

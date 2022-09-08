<?php 
/*form de la vista ejemplar
continuacion de un modal
*/

require_once('../accesos/biblifiltrar.php');



$prop= autostring("ejemplares", "propietario");
?>
<!doctype html>
<html>
<head>
</head>
<body>


<form action = "../modelo/bibliEjemplarEdit.php" method="post" >
<div class="modal-body">
<?php include("getejemplar.php");?>

<input type='hidden' id="cidejem" name ='cidejem' >
<input type='hidden' id="cce" name ='cce' >
<input type='hidden' id="ces" name ='ces' >
<input type='hidden' id="cprop" name ='cprop' >
<input type='hidden' id="cdis" name ='cdis' >
<input type='hidden' id='ccon' name='ccon'>



<div class="input-group m-div">
<label class="input-group-text" for="pce">Cod. Externo</label>
<div class="ajuste autocomplete"><input type='text' id="pce" name="ce" class="form-control"></div>
</div>
<?php /*
<div class="input-group m-div">
<label class="input-group-text" for="pes">Estado</label>
<div class="ajuste">
<select id="pes" name= "es" class="form-control" >
  <option id="l" value="l">Libre</option>
  <option id="r" value="r">Reservado</option>
  <option id="p" value="p">Prestado</option>
  <option id="o" value="o">Obsoleto</option>
</select>
</div>
</div>
*/?>
<div class="input-group m-div">
<label class="input-group-text" for="pprop">Propietario</label>
<div class="ajuste autocomplete"><input type='text' id="pprop" name="propietario" class="form-control"></div>
</div>
<div class="input-group m-div">
<label class="input-group-text" for="pcon">Condicion</label>
<div class="ajuste"><input type='text' id="pcon" name="condicion" class="form-control"></div>
</div>

<div class="input-group m-div">
<label class="input-group-text">Disponibilidad</label>
<div class="ajuste form-check form-check-inline">
<input class="form-check-input" type="radio" id="pdis1" name="disponibilidad" value="True">
<label class="form-check-label" for="activo">Si</label>
</div>
<div class="ajuste form-check form-check-inline">
<input class="form-check-input" type="radio" id="pdis2" name="disponibilidad" value="False">
<label class="form-check-label" for="activo">No</label>


</div>
</div>

</div>


<div class="modal-footer"><button type="submit" class="indexbutton">Actualizar</button></div>


</form>
<script>

autocomplete(document.getElementById("pprop"), <?php echo $prop;?>);
</script>

</body>


</html>
<?php 

require_once('../accesos/biblifiltrar.php');



$prop= autostring("ejemplares", "propietario");
?>
<!doctype html>
<html>
<head>
</head>
<body>


<form action = "../modelo/bibliEjemplarEdit.php" method="post" >

<?php include("getejemplar.php");?>

<input type='hidden' id="cidejem" name ='cidejem' >
<input type='hidden' id="cce" name ='cce' >
<input type='hidden' id="ces" name ='ces' >
<input type='hidden' id="cprop" name ='cprop' >
<input type='hidden' id="cdis" name ='cdis' >


<div class="flex">
<div class="span-2 ajuste"><label for="pidejem">Codigo Ejemplar</label></div>
<div class="ajuste w-2"><input type='text' id="pidejem" name="idejemplar" class="index"></div>
</div>
<div class="flex">
<div class="span-2 ajuste"><label for="pce">Cod. Externo</label></div>
<div class="ajuste w-2 autocomplete"><input type='text' id="pce" name="ce" class="index"></div>
</div>
<div class="flex">
<div class="span-2 ajuste"><label for="pes">Estado</label></div>
<div class="ajuste" >
<select id="pes" name= "es" class="index" >
  <option id="l" value="l">Libre</option>
  <option id="r" value="r">Reservado</option>
  <option id="p" value="p">Prestado</option>
  <option id="o" value="o">Obsoleto</option>
</select>
</div>
</div>

<div class="flex">
<div class="span-2 ajuste"><label for="pprop">Propietario</label></div>
<div class="ajuste w-2 autocomplete"><input type='text' id="pprop" name="propietario" class="index"></div>
</div>


<div class="flex">
<div class="span-2 ajuste"><label>Disponibilidad</label></div>
<div class="ajuste w-2">
<input type="radio" style="width: auto" id="pdis1" name="disponibilidad" value="True">
<label class="span" for="activo">Si</label>

<input type="radio" style="width: auto" id="pdis2" name="disponibilidad" value="False">
<label class="span" for="activo">No</label>


</div>
</div>




<div class="alignr"><button type="submit" class="indexbutton">Actualizar</button></div>


</form>
<script>

autocomplete(document.getElementById("pprop"),' <?php echo $prop;?>');
</script>

</body>


</html>